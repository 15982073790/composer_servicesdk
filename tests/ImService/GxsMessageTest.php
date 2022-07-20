<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/5
 * Time: 13:58
 */

namespace Mrstock\Servicesdk\ImService;


use PHPUnit\Framework\TestCase;

class GxsMessageTest extends TestCase
{
    //检查获取认证加密串
    public function testGetAuth()
    {
        $gxsMessage = new GxsMessage('1');

        $res = $gxsMessage->getAuth();

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['servicestoken'], 1);
    }
}