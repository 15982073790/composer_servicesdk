<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020-07-02
 * Time: 17:52
 */

namespace Mrstock\Servicesdk\Rpc;

use Workerman\Worker;
use Mrstock\Middleware\Service\RpcStartDeal;
use Mrstock\Servicesdk\Consulfabio\ConsulfabioFactory;

class WorkmanService implements IrpcService
{

    public function checkEnv()
    {
        // TODO: Implement checkEnv() method.
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

    public function createWork($port, $worker_count, $worker_name, $vendor_siterpc_url)
    {
        // TODO: Implement createWork() method.
        $worker = new Worker("\Mrstock\Middleware\Service\\" . $port);
        // 启动多少服务进程
        Worker::$logFile = "/data/logs/workerman_{$worker_name}_log.log";
        Worker::$stdoutFile = "/data/logs/workerman_{$worker_name}_stdout.log";

        $worker->count = $worker_count;
        $worker->name = $worker_name;

        $worker->reloadable = false;
        Worker::$pidFile = '/tmp/workerman_' . $worker->name . '.pid';
        $worker->onWorkerStop = function ($businessWorker) use ($ip) {
            ConsulfabioFactory::unregister($businessWorker->name, $ip);
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
            $param_array = $data['param_array'];

            $param_array = $param_array[0];

            try {
                $ret = RpcStartDeal::deal($param_array);
                // 发送数据给客户端，调用成功，data下标对应的元素即为调用结果
                return $connection->send($ret);
            } // 有异常
            catch (\Exception $e) {
                // 发送数据给客户端，发生异常，调用失败
                $error['message'] = $e->getMessage();
                $code = $e->getcode();
                $status = 200;
                $response = \Mrstock\Helper\Output::response($error['message'], $code, $status);
                $data = $response->getContent();
                return $connection->send($data);
            }

        };
    }

    public function run()
    {
        // TODO: Implement run() method.
        Worker::runAll();
    }

}