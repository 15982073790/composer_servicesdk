<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020-07-03
 * Time: 08:53
 */

namespace Mrstock\Servicesdk\Rpc;


class ServiceStartFactory
{

    /**
     * @param IrpcService $stratege
     * @param $vendor_ip_cmd
     * @param $worker_name
     * @param $worker_count
     * @param $vendor_siterpc_url
     * @param string $vendor_siterpc_suffix
     */

    public static function createWork(IrpcService $stratege, $vendor_ip_cmd, $worker_name, $worker_count, $vendor_siterpc_url, $vendor_siterpc_suffix = "", $worker_port)
    {
        try {
            $obj = new BaseService($stratege, $vendor_ip_cmd, $worker_name, $worker_count, $vendor_siterpc_url, $vendor_siterpc_suffix = "", $worker_port);
            $obj->getIp()->getPort()->registerConsul()->createWork()->run();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}