<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020-07-03
 * Time: 09:09
 */

namespace Mrstock\Servicesdk\Rpc;

use Mrstock\Servicesdk\Consulfabio\ConsulfabioFactory;
use Mrstock\Servicesdk\Phptool\PhptoolFactory;
use Mrstock\Servicesdk\Rpc\Exception\EnvParseException;
use Mrstock\Servicesdk\Rpc\Exception\ConnectionErrorException;

class BaseService
{
    protected $ip = "";
    protected $port = 0;
    protected $worker_name = "";
    protected $worker_count = "";
    protected $worker_port = "";
    protected $vendor_siterpc_url = "";
    protected $vendor_siterpc_suffix = "";
    protected $stratege = null;

    /**
     * BaseService constructor.
     * @param IrpcService $stratege
     * @param $vendor_ip_cmd
     * @param $worker_name
     * @param $worker_count
     * @param $vendor_siterpc_url
     * @param string $vendor_siterpc_suffix
     * @throws EnvParseException
     */
    public function __construct(IrpcService $stratege, $vendor_ip_cmd, $worker_name, $worker_count, $vendor_siterpc_url, $vendor_siterpc_suffix = "", $worker_port)
    {

        $this->stratege = $stratege;
        $check_rs = $this->stratege->checkEnv();
        if (!empty($check_rs)) throw new EnvParseException($check_rs);
        if (!$vendor_ip_cmd) {
            throw new EnvParseException("$vendor_ip_cmd param null");
        }
        if (!$worker_name || !$worker_count || !$vendor_siterpc_url) {
            throw new EnvParseException("worker params null");
        }
        $this->worker_name = $worker_name;
        $this->worker_count = $worker_count;
        $this->worker_port = $worker_port;
        $this->vendor_siterpc_url = $vendor_siterpc_url;
        $this->vendor_siterpc_suffix = $vendor_siterpc_suffix;
    }

    public function getIp()
    {
        $mingling = getenv("vendor_ip_cmd");
        $this->ip = exec($mingling);
        if (empty($this->ip)) {
            throw new EnvParseException("ip not find");
        }
        return $this;
    }

    public function getPort()
    {
        try {
            $this->port = PhptoolFactory::getport($this->worker_name, $this->worker_port);
        } catch (\Exception $e) {
            throw new ConnectionErrorException($e->getMessage());
        }
        return $this;
    }

    public function registerConsul()
    {
        ConsulfabioFactory::register($this->worker_name, $this->ip, $this->port);
        return $this;
    }

    public function createWork()
    {
        if (empty($this->stratege)) {
            throw new EnvParseException("stratege is null");
        }
        // TODO: Implement create() method.
        $this->stratege->creatework("JsonNL://0.0.0.0:" . $this->port, $this->worker_count, $this->worker_name, $this->vendor_siterpc_url, $this->vendor_siterpc_suffix, $this->ip);
        return $this;

    }

    public function run()
    {
        $this->stratege->run();
    }
}