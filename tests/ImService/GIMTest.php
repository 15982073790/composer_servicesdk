<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/5
 * Time: 13:27
 */

namespace Mrstock\Servicesdk\ImService;


use Mrstock\Mjc\Http\Request;
use PHPUnit\Framework\TestCase;

class GIMTest extends TestCase
{
    //检查GET
    public function testGet()
    {
        $gim = new GIM(new GxsMessage('1'), 'message');

        $res = $gim->get($gim::BASE_URI . '/message', ['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查post
    public function testPost()
    {
        $gim = new GIM(new GxsMessage('1'), 'message');

        $res = $gim->post($gim::BASE_URI . '/message', ['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查put
    public function testPut()
    {
        $gim = new GIM(new GxsMessage('1'), 'message');

        $res = $gim->put($gim::BASE_URI . '/message', ['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查delete
    public function testDelete()
    {
        $gim = new GIM(new GxsMessage('1'), 'message');

        $res = $gim->delete($gim::BASE_URI . '/message');

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查请求返回处理
    public function testProcessResp()
    {
        $gim = new GIM(new GxsMessage('1'), 'message');

        $response = $gim->get($gim::BASE_URI . '/message', ['uid' => 1]);

        //不为空
        $this->assertNotEmpty($response);
        //数组
        $this->assertIsArray($response);
        //断言
        $this->assertEquals($response['http_code'], 503);
        try {
            $res = $gim->processResp($response);
            //为空
            $this->assertEmpty($res);
        } catch (\Exception $e) {
            //不为空
            $this->assertNotEmpty($e);
            //对象
            $this->assertIsObject($e);
        }
    }
}