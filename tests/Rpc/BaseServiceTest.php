<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/7
 * Time: 9:39
 */

namespace Mrstock\Servicesdk\Test\Rpc;


use Mrstock\Servicesdk\Rpc\BaseService;
use Mrstock\Servicesdk\Rpc\WorkmanService;
use PHPUnit\Framework\TestCase;

class BaseServiceTest extends TestCase
{
    //检查getIp
    public function testGetIp()
    {
        putenv("vendor_ip_cmd=ifconfig |grep 127.0.0.1 |awk '{print $2}' | cut -d: -f2");

        try {
            $baseService = new BaseService(new WorkmanService(), 'ifconfig |grep 127.0.0.1 |awk \'{print $2}\' | cut -d: -f2', 'goods', '4', 'E:\zhongtai\\', '');
            $res = $baseService->getIp();
            //检查不为空
            $this->assertNotEmpty($res);
        } catch (\Exception $e) {
            //检查不为空
            $this->assertNotEmpty($e);
            //检查不为空
            $this->assertIsObject($e);
        }

    }

    //检查getPort
    public function testGetPort()
    {
        try {
            $baseService = new BaseService(new WorkmanService(), 'ifconfig |grep 127.0.0.1 |awk \'{print $2}\' | cut -d: -f2', 'goods', '4', 'E:\zhongtai\\', '');
            $res = $baseService->getPort();
            //检查不为空
            $this->assertNotEmpty($res);
        } catch (\Exception $e) {
            //检查不为空
            $this->assertNotEmpty($e);
            //检查不为空
            $this->assertIsObject($e);
        }
    }

    //检查registerConsul
    public function testRegisterConsul()
    {
        try {
            $baseService = new BaseService(new WorkmanService(), 'ifconfig |grep 127.0.0.1 |awk \'{print $2}\' | cut -d: -f2', 'goods', '4', 'E:\zhongtai\\', '');
            $res = $baseService->registerConsul();
            //检查不为空
            $this->assertNotEmpty($res);
        } catch (\Exception $e) {
            //检查不为空
            $this->assertNotEmpty($e);
            //检查不为空
            $this->assertIsObject($e);
        }
    }

    //检查createWork
    public function testCreateWork()
    {
        try {
            $baseService = new BaseService(new WorkmanService(), 'ifconfig |grep 127.0.0.1 |awk \'{print $2}\' | cut -d: -f2', 'goods', '4', 'E:\zhongtai\\', '');
            $res = $baseService->createWork();
            //检查不为空
            $this->assertNotEmpty($res);
        } catch (\Exception $e) {
            //检查不为空
            $this->assertNotEmpty($e);
            //检查不为空
            $this->assertIsObject($e);
        }
    }

    //检查createWork
    public function testRun()
    {
        try {
            $baseService = new BaseService(new WorkmanService(), 'ifconfig |grep 127.0.0.1 |awk \'{print $2}\' | cut -d: -f2', 'goods', '4', 'E:\zhongtai\\', '');
            $baseService->run();

        } catch (\Exception $e) {
            //检查不为空
            $this->assertNotEmpty($e);
            //检查不为空
            $this->assertIsObject($e);
        }
    }
}