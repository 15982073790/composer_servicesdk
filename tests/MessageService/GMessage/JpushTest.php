<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/5
 * Time: 17:45
 */

namespace Mrstock\Servicesdk\Test\MessageService\GMessage;


use Mrstock\Servicesdk\ImService\GxsMessage;
use Mrstock\Servicesdk\MessageService\GMessage\Jpush;
use PHPUnit\Framework\TestCase;

class JpushTest extends TestCase
{
    //检查push推送
    public function testPostData()
    {
        $jpush = new Jpush(new GxsMessage('1'));

        $res = $jpush->postData(['config_code' => 'mx00001', 'id' => 1, 'name' => 'hehe']);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['body']['code'], -1);
    }

    //检查股信推送
    public function testGXPush()
    {
        $jpush = new Jpush(new GxsMessage('1'));

        $res = $jpush->GXPush(['config_code' => 'mx00001', 'id' => 1, 'name' => 'hehe']);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['body']['code'], -1);
    }

    //检查第三方推送
    public function testThirdPush()
    {
        $jpush = new Jpush(new GxsMessage('1'));

        $res = $jpush->ThirdPush(['config_code' => 'mx00001', 'id' => 1, 'name' => 'hehe']);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['body']['code'], -1);
    }

    //检查股信标的推送
    public function testGXstock_push()
    {
        $jpush = new Jpush(new GxsMessage('1'));

        $res = $jpush->GXstock_push(['config_code' => 'mx00001', 'id' => 1, 'name' => 'hehe']);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['body']['code'], -1);
    }
}