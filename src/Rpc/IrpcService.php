<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020-07-02
 * Time: 17:49
 */

namespace Mrstock\Servicesdk\Rpc;
interface IrpcService
{
    function checkEnv();

    function createWork($port, $worker_count, $worker_name, $vendor_siterpc_url);

    function run();
}