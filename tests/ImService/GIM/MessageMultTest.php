<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/5
 * Time: 11:26
 */

namespace Mrstock\Servicesdk\Test\ImService\GIM;


use Mrstock\Servicesdk\ImService\GIM\MessageMult;
use Mrstock\Servicesdk\ImService\GxsMessage;
use PHPUnit\Framework\TestCase;

class MessageMultTest extends TestCase
{

    //检查消息内容
    public function testSend()
    {
        $message = new MessageMult(new GxsMessage('2'));

        $res = $message->send(['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查群发消息用户
    public function testMsgUsers()
    {
        $message = new MessageMult(new GxsMessage('2'));

        $res = $message->msgUsers(['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查群发历史列表
    public function testSendList()
    {
        $message = new MessageMult(new GxsMessage('2'));

        $res = $message->sendList(['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查撤回消息
    public function testRetract()
    {
        $message = new MessageMult(new GxsMessage('2'));

        $res = $message->retract(['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查群发消息详情
    public function testMsgInfo()
    {
        $message = new MessageMult(new GxsMessage('2'));

        $res = $message->msgInfo(['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }
}