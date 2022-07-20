<?php
/*consul*/

namespace Mrstock\Servicesdk\Swoole;

use Mrstock\Middleware\Service\RpcStartDeal;

class SwooleFactory
{
    public static function check()
    {
        //......Server............... 127.0.0.1:9501......
        return;
    }

    public static function creatework($vendor_worker_ipport, $vendor_worker_count, $vendor_worker_name, $vendor_siterpc_url, $vendor_siterpc_suffix, $ip)
    {
        $serv = new \Swoole\Server("0.0.0.0", $vendor_worker_ipport);
        $serv->set(array(
            'worker_num' => 4
        ));
        //........................
        $serv->on('Connect', function ($serv, $fd) {
            echo "Client: Connect.\n";
        });

        //........................
        $serv->on('Receive', function ($serv, $fd, $from_id, $data) use ($vendor_siterpc_url) {
            $s = microtime(true);
            $statistic_address = "";
            $data = json_decode($data, true);

            // 判断数据是否正确
            if (empty($data['class']) || empty($data['method']) || !isset($data['param_array'])) {
                // 发送数据给客户端，请求包错误
                return $serv->send($fd, json_encode(array('code' => 400, 'msg' => 'bad request', 'data' => null)) . "\n");
            }

            $data['param_array'][0]["RPC_PATH"] = $vendor_siterpc_url . strtolower($data['param_array'][0]['site']) . '/public/rpc.php';

            // 获得要调用的类、方法、及参数
            $class = $data['class'];
            $method = $data['method'];
            $param_array = $data['param_array'];

            $param_array = $param_array[0];
            $success = false;

            try {
                $ret = RpcStartDeal::deal($param_array);
                // 发送数据给客户端，调用成功，data下标对应的元素即为调用结果
                $rs = $serv->send($fd, json_encode($ret) . "\n");
                $e = round((microtime(true) - $s) * 1000, 3);
                //file_put_contents('/tmp/3.txt',print_r($rs,true).$e,FILE_APPEND);
                return $rs;
            } // 有异常
            catch (Exception $e) {
                // 发送数据给客户端，发生异常，调用失败
                $code = $e->getCode() ? $e->getCode() : 500;

                return $serv->send($fd, json_encode($e) . "\n");
            }


        });

        //........................
        $serv->on('Close', function ($serv, $fd) {
            echo "Client: Close.\n";
        });

        //...............
        $serv->start();

    }

    public static function run()
    {
        return;
    }

}
