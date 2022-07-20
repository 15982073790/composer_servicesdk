<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/6
 * Time: 11:25
 */

namespace Mrstock\Servicesdk\Test\MessageService;


use Mrstock\Mjc\Http\Request;
use Mrstock\Servicesdk\MessageService\GMessage;
use Mrstock\Servicesdk\MessageService\MessageClient;
use PHPUnit\Framework\TestCase;

class GMessageTest extends TestCase
{
    //检查GET
    public function testGet()
    {
        $gMessage = new GMessage(new MessageClient(1, 1), 'lists');

        $res = $gMessage->get($gMessage::BASE_URL . 'lists', ['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['body']['code'], -1);
    }

    //检查POST
    public function testPost()
    {
        $gMessage = new GMessage(new MessageClient(1, 1), 'lists');

        $res = $gMessage->post($gMessage::BASE_URL . 'lists', ['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['body']['code'], -1);
    }

    //检查PUT
    public function testPut()
    {
        $gMessage = new GMessage(new MessageClient(1, 1), 'lists');

        $res = $gMessage->put($gMessage::BASE_URL . 'lists', ['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['body']['code'], -1);
    }

    //检查DELETE
    public function testDelete()
    {
        $gMessage = new GMessage(new MessageClient(1, 1), 'delete');

        $res = $gMessage->delete($gMessage::BASE_URL . 'delete');

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['body']['code'], -1);
    }

    //检查请求返回处理
    public function testProcessResp()
    {
        $gMessage = new GMessage(new MessageClient(1, 1), 'delete');

        $response = new Request([]);

        $response->code = 200;
        $res = $gMessage->processResp($response);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 200);
    }
}