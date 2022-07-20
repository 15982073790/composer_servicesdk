<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/6
 * Time: 9:19
 */

namespace Mrstock\Servicesdk\Test\MessageService\GMessage;


use Mrstock\Servicesdk\ImService\GxsMessage;
use Mrstock\Servicesdk\MessageService\GMessage\Message;
use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase
{
    //检查获取某个分组下消息列表
    public function testGetList()
    {
        $message = new Message(new GxsMessage(1));

        $res = $message->getList(1, 'tag');

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['body']['code'], -1);
    }

    //检查标记已读
    public function testRead()
    {
        $message = new Message(new GxsMessage(1));

        $res = $message->read(1, 1, 'tag');

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['body']['code'], -1);
    }

    //检查一键全看
    public function testAllRead()
    {
        $message = new Message(new GxsMessage(1));

        $res = $message->allRead(1);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['body']['code'], -1);
    }
}