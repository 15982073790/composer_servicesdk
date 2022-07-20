<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/7
 * Time: 10:24
 */

namespace Mrstock\Servicesdk\Test\Rpc;


use Mrstock\Servicesdk\Rpc\ServiceStartFactory;
use PHPUnit\Framework\TestCase;

class ServiceStartFactoryTest extends TestCase
{
    public function testCreateWork()
    {
        try {
            $serviceStartFactory = new ServiceStartFactory();

            $res = $serviceStartFactory::createWork(new \Mrstock\Servicesdk\Rpc\WorkmanService(), 'ifconfig |grep 127.0.0.1 |awk \'{print $2}\' | cut -d: -f2', 'goods', '4', 'E:\zhongtai\\', '');

            $this->assertEmpty($res);
        } catch (\Exception $e) {
            //检查不为空
            $this->assertNotEmpty($e);
            //检查不为空
            $this->assertIsObject($e);

        }

    }
}