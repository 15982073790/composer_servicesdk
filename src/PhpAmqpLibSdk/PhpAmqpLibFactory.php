<?php
/*要求每句话之间没有关联，不能保证顺序执行*/

namespace Mrstock\Servicesdk\PhpAmqpLibSdk;

use Mrstock\Mjc\Container;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Mrstock\Helper\Config;
use Mrstock\Helper\Tool;
use Mrstock\Mjc\Facade\Hook;
use Mrstock\Mjc\Facade\Log;
use Mrstock\Mjc\Log\LogLevel;
use Mrstock\Helper\CliHelper;

class PhpAmqpLibFactory
{


    protected static function connect()
    {
        //echo "connect";echo "\n";
        $rabbitmq_config = Config::get("rabbitmq.default");

        $connection = new AMQPStreamConnection($rabbitmq_config["server"], $rabbitmq_config["port"], $rabbitmq_config["username"], $rabbitmq_config["password"]);

        $channel = $connection->channel();

        return [$connection, $channel];
    }

    protected static function close($connection, $channel)
    {
        $channel->close();
        $connection->close();
    }

    public static function say($event_name, $say_words)
    {
        if (empty($event_name) || empty($say_words)) {
            throw new \Exception("say param error", -1);
        }

        if (!empty($say_words["mq_msg_id"]) || !empty($say_words["mq_msg_time"])) {
            throw new \Exception("mq_msg_id or mq_msg_time param do not your ini", -1);
        }
        if (!is_array($say_words)) throw new \Exception("say_words param error", -1);
        $say_words = Tool::arrToStr($say_words);
        $microtime = microtime();
        $mq_msg_id = md5($event_name . $say_words . $microtime);
        $say_words = Tool::strToArr($say_words);
        $say_words["mq_msg_id"] = $mq_msg_id;
        $say_words["mq_msg_time"] = $microtime;

        if (is_array($say_words)) $say_words = Tool::arrToStr($say_words);


        Log::write(" say_begin :" . $event_name . ':' . print_r($say_words, true));

        list($connection, $channel) = self::connect();

        $requests = Container::get("request");
        $site = $requests["site"];


        try {
            $channel->exchange_declare($site, 'direct', false, true, false);

            $severity = $site . '.' . $event_name;

            $msg1 = new AMQPMessage($say_words, array('delivery_mode' => 2));

            $channel->basic_publish($msg1, $site, $severity);

        } catch (\Exception $e) {


            Log::write($e->getCode() . ' say:' . $e->getMessage() . " say_err :" . $event_name . ':' . print_r($say_words, true), LogLevel::MQERR);
            throw new \Exception($e->getMessage(), -1);
        }

        self::close($connection, $channel);

        Log::write(" say_end : " . $severity . ':' . print_r($say_words, true));
        return true;

    }

    public static function listen($fromsite, $event_name, $hook_class, $site)
    {
        $host = "listen";
        if (empty($fromsite) || empty($event_name)) {
            throw new \Exception("listen param error", -1);
        }

        list($connection, $channel) = self::connect();

        $channel->exchange_declare($fromsite, 'direct', false, true, false);

        //$requests = Container::get("request");


        list($queue_name, ,) = $channel->queue_declare($site . "." . $fromsite . "." . $event_name, false, true, false, false);
        //self::$channel[$host]->basic_qos(null, 10, null);
        $severities = [$fromsite . "." . $event_name];

        if (empty($severities)) {
            throw new \Exception("Usage: $argv[0] [info] [warning] [error]", -1);
            CliHelper::cliEcho("Usage: $argv[0] [info] [warning] [error]");
            exit(1);
        }

        foreach ($severities as $severity) {
            $channel->queue_bind($queue_name, $fromsite, $severity);
        }

        CliHelper::cliEcho(' [*] Waiting for logs. To exit press CTRL+C');

        $callback = function ($msg) use ($hook_class) {
            if (empty($hook_class)) {
                $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
                echo $msg->body;
                echo "\n";
                return;
            }
            $start_time = microtime(true);
            $deletemqmsg = "Mrstock\Servicesdk\Hook\AfterMq";
            $hook_class[] = $deletemqmsg;

            try {
                $requests = Container::get("request");
                $requests["mqinfo"] = $msg->body;
                $msgdata = json_decode($msg->body, true);
                $deal_err_hoook = "";
                CliHelper::cliEcho($msgdata["mq_msg_id"] . "_" . date("Ymd H:i:s"));
                foreach ($hook_class as $key => $value) {
                    $start_time_key = microtime(true);

                    $deal_err_hoook = $key;

                    $err_hook_num = self::get_err_hook($msg->body);
                    if (empty($err_hook_num)) {
                        $clierr_hook_num = "no";
                    } else {
                        $clierr_hook_num = $err_hook_num;
                    }
                    CliHelper::cliEcho($key . "_do_" . $clierr_hook_num);

                    if ($key < $err_hook_num) {
                        continue;
                    }


                    if (strpos($value, 'AfterMq') !== false) {
                        Hook::exec($value, $msg);
                    } else {
                        try {
                            Hook::exec($value, $msg->body);
                        } catch (\Mrstock\Mjc\Exception\MqNoDealException $e) {

                            CliHelper::cliEcho($e->getMessage());
                            self::listen_MqNoDealException($e, $msg->body);
                            Hook::exec($deletemqmsg, $msg);
                            break;
                        }
                    }
                    CliHelper::cliEcho($key . "_end_runtime_" . round(microtime(true) - $start_time_key, 6) * 1000);


                }

                //删除控制文件
                //if($err_hook_num!==false){

                self::delete_err_hook($msg->body);
                //}

                $deal_err_hoook = "";
            } catch (\Throwable $e) {

                self::listen_exception($e, $deal_err_hoook, $msg->body);
                if (strpos($e->getMessage(), 'RPCERROR') !== false) {
                    CliHelper::cliEcho('RPCERROR shutdowm');
                    exit;
                }

                //echo "err\n";exit;
            }
            $endTime = microtime(true);
            $runTime = round($endTime - $start_time, 6) * 1000;
            CliHelper::cliEcho("allruntime-" . $runTime);

        };

        $channel->basic_consume($queue_name, '', false, false, false, false, $callback);

        while (count($channel->callbacks)) {

            //echo 1;echo "\n";
            $channel->wait();
            //echo 2;echo "\n";
        }

        $channel->close();
        $connection->close();
    }

    protected static function listen_MqNoDealException($e, $msg)
    {
        self::delete_err_hook($msg);

        (new \Mrstock\Orm\Model())->closeTransaction();

        CliHelper::cliEcho($e->getMessage());

        // $error=[];
        // $error['code']=$e->getcode();
        // $error['message'] = $e->getMessage();
        // $error['file'] = $e->getFile();
        // $error['line'] = $e->getLine();
        // $error['msg'] = $msg;
        // Log::write(print_r($error, true), LogLevel::MQERR);

    }

    protected static function listen_exception($e, $deal_err_hoook, $msg)
    {
        self::write_err_hook($deal_err_hoook, $msg);

        (new \Mrstock\Orm\Model())->closeTransaction();

        CliHelper::cliEcho($e->getMessage());

        // $error=[];
        // $error['code']=$e->getcode();
        // $error['message'] = $e->getMessage();
        // $error['file'] = $e->getFile();
        // $error['line'] = $e->getLine();
        // $error['msg'] = $msg;
        // Log::write(print_r($error, true), LogLevel::MQERR);

    }

    protected static function write_err_hook($deal_err_hoook, $msg)
    {
        $msg_arr = json_decode($msg, true);
        return \Mrstock\Helper\Cache\File::set("mqdealhook_" . $msg_arr["mq_msg_id"], $deal_err_hoook, 0);

    }

    protected static function get_err_hook($msg)
    {
        $msg_arr = json_decode($msg, true);
        $err_hook_num = \Mrstock\Helper\Cache\File::get("mqdealhook_" . $msg_arr["mq_msg_id"]);

        return $err_hook_num;
    }

    protected static function delete_err_hook($msg)
    {
        $msg_arr = json_decode($msg, true);

        return \Mrstock\Helper\Cache\File::delete("mqdealhook_" . $msg_arr["mq_msg_id"]);

    }
}
