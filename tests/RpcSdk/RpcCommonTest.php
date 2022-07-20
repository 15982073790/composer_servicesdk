<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/7
 * Time: 13:43
 */

namespace Mrstock\Servicesdk\Test\RpcSdk;


use Mrstock\Helper\Config;
use Mrstock\Servicesdk\RpcSdk\RpcCommon;
use PHPUnit\Framework\TestCase;

class RpcCommonTest extends TestCase
{
    //检查RpcCommon
    public function test__callstatic()
    {
        $config['rpc_inneruse_secretkey'] = 'fjkshfkkfdk1234';
        Config::set($config);

        $rpcCommon = new RpcCommon();

        $res = $rpcCommon::gateway_Admin_selectbyadminids(['admin_ids' => '1,2,3,6']);

        //检查不为空
        $this->assertNotEmpty($res);
        //检查为数组
        $this->assertIsArray($res);
    }

    //检查before_method
    public function testBeforeMethod()
    {
        try {
            $rpcCommon = new RpcCommon();
            $res = $rpcCommon::before_method('gateway_Admin_selectbyadminids');

            //检查不为空
            $this->assertNotEmpty($res);
            //检查为数组
            $this->assertIsArray($res);
            //检查值
            $this->assertEquals($res['inneruse_secretkey'], 'fjkshfkkfdk1234');

        } catch (\Exception $e) {

            //检查不为空
            $this->assertNotEmpty($e);
            //检查为对象
            $this->assertIsObject($e);
        }
    }

    //检查run
    public function testRun()
    {
        try {
            $rpcCommon = new RpcCommon();
            $args = $rpcCommon::dealargs('gateway_Admin_selectbyadminids', ['admin_ids' => '1,2,3,6']);
            $args[0] = empty($args[0]) ? [] : $args[0];

            $res = $rpcCommon::run(array_merge($args[0], $rpcCommon::before_method('gateway_Admin_selectbyadminids')));
            //检查不为空
            $this->assertNotEmpty($res);

        } catch (\Exception $e) {

            //检查不为空
            $this->assertNotEmpty($e);
            //检查为对象
            $this->assertIsObject($e);
        }
    }

    //检查dealargs
    public function testDealargs()
    {
        $rpcCommon = new RpcCommon();

        $res = $rpcCommon::dealargs('gateway_Admin_selectbyadminids', ['admin_ids' => '1,2,3,6']);

        //检查不为空
        $this->assertNotEmpty($res);
        //检查为数组
        $this->assertIsArray($res);
        //检查为数组
        $this->assertEquals($res['admin_ids'], '1,2,3,6');
    }
}