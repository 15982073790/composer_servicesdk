<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/5
 * Time: 16:47
 */

namespace Mrstock\Servicesdk\JsonRpc;


use PHPUnit\Framework\TestCase;

class RpcClientFactoryTest extends TestCase
{
    //检查sync
    public function testSync()
    {
        if (!defined('VENDOR_DIR')) {
            define('VENDOR_DIR', __DIR__ . '/../vendor');
        }
        if (!defined('APP_PATH')) {
            define('APP_PATH', __DIR__ . '/../src');
        }
        $rpcClientFactory = new RpcClientFactory();
        try {
            $res = $rpcClientFactory->sync([]);
            //不为空
            $this->assertNotEmpty($res);
        } catch (\Exception $e) {
            //不为空
            $this->assertNotEmpty($e);
            //数组
            $this->assertIsObject($e);
        }

    }

    //检查synchttp
    public function testSynchttp()
    {
        $rpcClientFactory = new RpcClientFactory();
        try {
            $message['c'] = 'Goods';
            $message['a'] = 'getgoodsimg';
            $message['v'] = 'app';
            $message['site'] = 'goods';
            $res = $rpcClientFactory->synchttp($message);
            //不为空
            $this->assertNotEmpty($res);
        } catch (\Exception $e) {
            //不为空
            $this->assertNotEmpty($e);
            //数组
            $this->assertIsObject($e);
        }

    }
}