<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/4
 * Time: 18:24
 */

namespace Mrstock\Servicesdk\Test\ImService\GIM;


use Mrstock\Servicesdk\ImService\GIM\Member;
use Mrstock\Servicesdk\ImService\GxsMessage;
use PHPUnit\Framework\TestCase;

class MemberTest extends TestCase
{
    //检查用户登入
    public function testOnline()
    {
        $member = new Member(new GxsMessage('2'));

        $res = $member->online('jvcnjksdczx444445545as5ds4', 1);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查用户登入
    public function testOffline()
    {
        $member = new Member(new GxsMessage('2'));

        $res = $member->offline(1);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }
}