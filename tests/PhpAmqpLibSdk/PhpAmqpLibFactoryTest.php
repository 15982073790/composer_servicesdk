<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/6
 * Time: 16:28
 */

namespace Mrstock\Servicesdk\Test\PhpAmqpLibFactory;


use Mrstock\Servicesdk\PhpAmqpLibSdk\PhpAmqpLibFactory;
use PHPUnit\Framework\TestCase;

class PhpAmqpLibFactoryTest extends TestCase
{
    //检查say
    public function testSay()
    {
        if (!defined('VENDOR_DIR')) {
            define('VENDOR_DIR', __DIR__ . '/../vendor');
        }
        if (!defined('APP_PATH')) {
            define('APP_PATH', __DIR__ . '/../src');
        }
        try {
            $res = PhpAmqpLibFactory::say('ceshi', ['id' => 1, 'name' => 'hehe']);
            //断言不为空
            $this->assertNotEmpty($res);
            //断言为bool
            $this->assertIsBool($res);
        } catch (\Exception $e) {
            //断言不为空
            $this->assertNotEmpty($e);
            //断言为对象
            $this->assertIsObject($e);
        }
    }

    //检查listen
    public function testListen()
    {
        try {
            $target_site = 'goods';
            $target_event = 'edit_renewal_cycle';
            $hook_class = 'V2\Common\Hook\Renewmq';
            $site = 'membergoods';
            PhpAmqpLibFactory::listen($target_site, $target_event, $hook_class, $site);

        } catch (\Exception $e) {

            //断言不为空
            $this->assertNotEmpty($e);
            //断言为对象
            $this->assertIsObject($e);
        }
    }
}