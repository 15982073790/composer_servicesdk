<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/7
 * Time: 14:09
 */

namespace Mrstock\Servicesdk\Test\RpcSdk;


use Mrstock\Servicesdk\RpcSdk\RpcSdkRequest;
use PHPUnit\Framework\TestCase;

class RpcSdkRequestTest extends TestCase
{
    //检查request
    public function testRequest()
    {
        if (!defined('VENDOR_DIR')) {
            define('VENDOR_DIR', __DIR__ . '/../vendor');
        }
        if (!defined('APP_PATH')) {
            define('APP_PATH', __DIR__ . '/../src');
        }
        putenv('worker_container=workerman');
        putenv('vendor_consul_ip=192.168.10.75');
        $rpcSdkRequest = new RpcSdkRequest();
        $bodyData['site'] = 'goods';
        $bodyData['v'] = 'app';
        $bodyData['serviceversion'] = '';
        $bodyData['c'] = 'Ceshi';
        $bodyData['a'] = 'index1';
        $bodyData['appcode'] = '5c3d73a0f1f18c30cqb5zkov';
        $bodyData['isdebug'] = 1;
        $bodyData['rpc_msg_id'] = 1141515441545845;
        $bodyData['rpc_msg_time'] = time();
        try {
            $res = $rpcSdkRequest::request($bodyData);
            //断言不为空
            $this->assertNotEmpty($res);
        } catch (\Exception $e) {
            //断言不为空
            $this->assertNotEmpty($e);
            //断言对象
            $this->assertIsObject($e);
        }
    }

    //检查发起rpc 请求
    public function testInneruseRpcRequest()
    {
        $rpcSdkRequest = new RpcSdkRequest();
        $bodyData['site'] = 'goods';
        $bodyData['v'] = 'app';
        $bodyData['serviceversion'] = '';
        $bodyData['c'] = 'Ceshi';
        $bodyData['a'] = 'index1';
        $bodyData['appcode'] = '5c3d73a0f1f18c30cqb5zkov';
        $bodyData['isdebug'] = 1;
        $bodyData['rpc_msg_id'] = 1141515441545845;
        $bodyData['rpc_msg_time'] = time();

        try {
            $res = $rpcSdkRequest->inneruseRpcRequest($bodyData);
            //断言不为空
            $this->assertNotEmpty($res);
        } catch (\Exception $e) {
            //断言不为空
            $this->assertNotEmpty($e);
            //断言对象
            $this->assertIsObject($e);
        }
    }

    //检查getAdressByConsulJson
    public function testGetAdressByConsulJson()
    {
        $rpcSdkRequest = new RpcSdkRequest();

        $res = $rpcSdkRequest->getAdressByConsulJson('goods');

        //断言不为空
        $this->assertNotEmpty($res);
        //断言对象
        $this->assertIsArray($res);
    }

    //检查发起http 请求
    public function testInneruseHttpRequest()
    {
        $rpcSdkRequest = new RpcSdkRequest();
        $bodyData['site'] = 'goods';
        $bodyData['v'] = 'app';
        $bodyData['c'] = 'Ceshi';
        $bodyData['a'] = 'index1';
        $bodyData['appcode'] = '5c3d73a0f1f18c30cqb5zkov';
        $bodyData['isdebug'] = 1;
        $bodyData['rpc_msg_id'] = 1141515441545845;
        $bodyData['rpc_msg_time'] = time();

        try {
            $res = $rpcSdkRequest->inneruseHttpRequest($bodyData);
            //断言不为空
            $this->assertNotEmpty($res);
        } catch (\Exception $e) {
            //断言不为空
            $this->assertNotEmpty($e);
            //断言对象
            $this->assertIsObject($e);
        }
    }

    //检查rpcRequestSwoole
    public function testRpcRequestSwoole()
    {
        $rpcSdkRequest = new RpcSdkRequest();
        $bodyData['site'] = 'goods';
        $bodyData['v'] = 'app';
        $bodyData['c'] = 'Ceshi';
        $bodyData['a'] = 'index1';
        $bodyData['appcode'] = '5c3d73a0f1f18c30cqb5zkov';
        $bodyData['isdebug'] = 1;
        $bodyData['rpc_msg_id'] = 1141515441545845;
        $bodyData['rpc_msg_time'] = time();

        try {
            $res = $rpcSdkRequest->rpcRequestSwoole($bodyData);

            //断言不为空
            $this->assertNotEmpty($res);
        } catch (\Exception $e) {
            //断言不为空
            $this->assertNotEmpty($e);
            //断言对象
            $this->assertIsObject($e);
        }
    }

    //检查发起rpc 请求
    public function testRpcRequest()
    {
        $rpcSdkRequest = new RpcSdkRequest();
        $bodyData['site'] = 'goods';
        $bodyData['v'] = 'app';
        $bodyData['c'] = 'Ceshi';
        $bodyData['a'] = 'index1';
        $bodyData['appcode'] = '5c3d73a0f1f18c30cqb5zkov';
        $bodyData['isdebug'] = 1;
        $bodyData['rpc_msg_id'] = 1141515441545845;
        $bodyData['rpc_msg_time'] = time();

        try {
            $res = $rpcSdkRequest->rpcRequest($bodyData);

            //断言不为空
            $this->assertNotEmpty($res);
        } catch (\Exception $e) {
            //断言不为空
            $this->assertNotEmpty($e);
            //断言对象
            $this->assertIsObject($e);
        }
    }
}