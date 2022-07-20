<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/5
 * Time: 11:12
 */

namespace Mrstock\Servicesdk\Test\ImService\GIM;


use Mrstock\Servicesdk\ImService\GIM\Message;
use Mrstock\Servicesdk\ImService\GxsMessage;
use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase
{
    //检查消息内容
    public function testSend()
    {
        $message = new Message(new GxsMessage('2'));

        $res = $message->send(['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查消息回执
    public function testReceipt()
    {
        $message = new Message(new GxsMessage('2'));

        $res = $message->receipt(['uid' => 1]);

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
        $message = new Message(new GxsMessage('2'));

        $res = $message->retract(['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查search
    public function testSearch()
    {
        $message = new Message(new GxsMessage('2'));

        $res = $message->search(['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查comment
    public function testComment()
    {
        $message = new Message(new GxsMessage('2'));

        $res = $message->comment(['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查commentList
    public function testCommentList()
    {
        $message = new Message(new GxsMessage('2'));

        $res = $message->commentList(['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查retractList
    public function testRetractList()
    {
        $message = new Message(new GxsMessage('2'));

        $res = $message->retractList(['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查verifyList
    public function testVerifyList()
    {
        $message = new Message(new GxsMessage('2'));

        $res = $message->verifyList(['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查verifyStatus
    public function testVerifyStatus()
    {
        $message = new Message(new GxsMessage('2'));

        $res = $message->verifyStatus(['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查adminCommentList
    public function testAdminCommentList()
    {
        $message = new Message(new GxsMessage('2'));

        $res = $message->adminCommentList(['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查msgList
    public function testMsgList()
    {
        $message = new Message(new GxsMessage('2'));

        $res = $message->msgList(['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查群股票列表
    public function testStockList()
    {
        $message = new Message(new GxsMessage('2'));

        $res = $message->stockList(['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }


}