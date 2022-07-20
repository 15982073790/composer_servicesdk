<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/7/28
 * Time: 13:40
 */

namespace Mrstock\Servicesdk\Test\Consulfabio;


use Mrstock\Servicesdk\Consulfabio\ConsulfabioFactory;
use PHPUnit\Framework\TestCase;

class ConsulfabioFactoryTest extends TestCase
{
    //检查register方法
    public function testRegister()
    {
        if (!defined('VENDOR_DIR')) {
            define('VENDOR_DIR', __DIR__ . '/../vendor');
        }
        putenv('vendor_consul_ip=192.168.4.133:38500');
        $consulfabioFactory = new ConsulfabioFactory();

        $res = $consulfabioFactory->register('membergoods', '192.168.4.133', 38500);

        //断言不为空
        $this->assertNotEmpty($res);
        //断言为对象
        $this->assertIsObject($res);
    }

    //检查unregister方法
    public function testUnregister()
    {
        $consulfabioFactory = new ConsulfabioFactory();

        $res = $consulfabioFactory->unregister('membergoods', '192.168.4.133');

        //断言不为空
        $this->assertNotEmpty($res);
        //断言为对象
        $this->assertIsObject($res);
    }
}