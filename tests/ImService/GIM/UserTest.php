<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/5
 * Time: 13:09
 */

namespace Mrstock\Servicesdk\Test\ImService\GIM;


use Mrstock\Servicesdk\ImService\GIM\User;
use Mrstock\Servicesdk\ImService\GxsMessage;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    //检查用户最近讲话时间
    public function testLastTalkTime()
    {
        $user = new User(new GxsMessage('2'));

        $res = $user->lastTalkTime(['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查用户最近讲话时间
    public function testOnlineStatus()
    {
        $user = new User(new GxsMessage('2'));

        $res = $user->onlineStatus(['uid' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }
}