<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/6
 * Time: 14:17
 */

namespace Mrstock\Servicesdk\Test\MessageService;


use Mrstock\Servicesdk\MessageService\MessageClient;
use PHPUnit\Framework\TestCase;

class MessageClientTest extends TestCase
{
    //检查获取认证加密串
    public function testGetAuth()
    {
        $messageClient = new MessageClient(1, 1);

        $res = $messageClient->getAuth();

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言值
        $this->assertEquals($res['servicestoken'], 1);
        $this->assertEquals($res['servicesuid'], 1);
    }
}