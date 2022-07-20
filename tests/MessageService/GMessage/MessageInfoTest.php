<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/6
 * Time: 9:19
 */

namespace Mrstock\Servicesdk\Test\MessageService\GMessage;


use Mrstock\Servicesdk\ImService\GxsMessage;
use Mrstock\Servicesdk\MessageService\GMessage\MessageInfo;
use PHPUnit\Framework\TestCase;

class MessageInfoTest extends TestCase
{
    //检查获取总消息/分组消息未读条数
    public function testUnreadNum()
    {
        $messageInfo = new MessageInfo(new GxsMessage(1));

        $res = $messageInfo->unreadNum(1, 'tag');

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['body']['code'], -1);
    }
}