<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/5
 * Time: 17:58
 */

namespace Mrstock\Servicesdk\Test\MessageService\GMessage;


use Mrstock\Servicesdk\ImService\GxsMessage;
use Mrstock\Servicesdk\MessageService\GMessage\ListInfo;
use PHPUnit\Framework\TestCase;

class ListInfoTest extends TestCase
{
    //检查获取总消息/分组消息未读条数[get]
    public function testUnread()
    {
        $listInfo = new ListInfo(new GxsMessage('1'));

        $res = $listInfo->Unread(1, '2222');

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['body']['code'], -1);
    }
}