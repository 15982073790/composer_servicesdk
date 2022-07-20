<?php
/*consul*/

namespace Mrstock\Servicesdk\Workerman;

use Workerman\Worker;
use Mrstock\Middleware\Service\RpcStartDeal;
use Mrstock\Mjc\Facade\Log;
use Mrstock\Servicesdk\Consulfabio\ConsulfabioFactory;

class WorkermanFactory
{
    public static function check()
    {
        $error = "";
        //检查扩展
        if (!extension_loaded('pcntl')) {
            $error = "Please install pcntl extension. See http://doc3.workerman.net/install/install.html\n";
        }
        if (!extension_loaded('posix')) {
            $error = "Please install posix extension. See http://doc3.workerman.net/install/install.html\n";
        }

        return $error;
    }

    public static function creatework($vendor_worker_ipport, $vendor_worker_count, $vendor_worker_name, $vendor_siterpc_url, $vendor_siterpc_suffix, $ip)
    {

        $worker = new Worker("\Mrstock\Middleware\Service\\" . $vendor_worker_ipport);
        // 启动多少服务进程
        Worker::$logFile = "/data/logs/workerman_{$vendor_worker_name}.log";


        $worker->count = $vendor_worker_count;
        $worker->name = $vendor_worker_name;

        $worker->reloadable = false;
        Worker::$pidFile = '/tmp/workerman_' . $worker->name . '.pid';

        $worker->onWorkerStop = function ($businessWorker) use ($ip) {
            ConsulfabioFactory::unregister($businessWorker->name, $ip);
            //判断fabio中本节点是否被注销
            // while (1) {
            //     $ishave=0;
            //     ConsulfabioFactory::unregister($businessWorker->name,$ip);
            //     sleep(1);

            //     $fabio_ip=getenv("vendor_fabio_ip");
            //     $url="http://".$fabio_ip.":9998/api/routes";
            //     $rr=json_decode(file_get_contents($url),true);
            //     foreach ($rr as $key => $value) {
            //         if(strpos($value["dst"],$ip) !== false && $value["service"]==$businessWorker->name){
            //             $ishave=1;
            //         }
            //     }

            //     if($ishave==0){
            //         break;
            //     }
            // }
            // echo "unregister end";echo "\n";
            // echo $businessWorker->name;echo "\n";
            // echo $ip;echo "\n";
            // $rd=[];
            // foreach ($rr as $key => $value) {
            //     # code...
            //     if($value["service"]==$businessWorker->name){
            //         $rd[$key]=$value;
            //     }
            // }
            // print_r($rd);
            //sleep(1);
            // echo $businessWorker->name;echo "\n";
            // echo "WorkerStop\n";
        };

        $worker->onMessage = function ($connection, $data) use ($vendor_siterpc_url) {

            $statistic_address = "";
            // 判断数据是否正确
            if (empty($data['class']) || empty($data['method']) || !isset($data['param_array'])) {
                // 发送数据给客户端，请求包错误
                return $connection->send(array('code' => 400, 'msg' => 'bad request', 'data' => null));
            }

            $data['param_array'][0]["RPC_PATH"] = PUBLIC_PATH . '/public/rpc.php';

            // 获得要调用的类、方法、及参数
            $class = $data['class'];
            $method = $data['method'];
            $param_array = $data['param_array'];

            $param_array = $param_array[0];
            $success = false;

            try {
                $ret = RpcStartDeal::deal($param_array);
                // 发送数据给客户端，调用成功，data下标对应的元素即为调用结果
                return $connection->send($ret);
            } // 有异常
            catch (Exception $e) {
                // 发送数据给客户端，发生异常，调用失败
                $code = $e->getCode() ? $e->getCode() : 500;

                return $connection->send($e);
            }

        };
    }

    public static function run()
    {
        Worker::runAll();
    }

}
