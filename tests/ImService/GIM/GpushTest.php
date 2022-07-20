<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/4
 * Time: 13:17
 */

namespace Mrstock\Servicesdk\Test\ImService\GIM;


use Mrstock\Servicesdk\ImService\GIM\Gpush;
use Mrstock\Servicesdk\ImService\GxsMessage;
use PHPUnit\Framework\TestCase;

class GpushTest extends TestCase
{
    //检查推送
    public function testSend()
    {
        $gpush = new Gpush(new GxsMessage('212112212121'));

        $res = $gpush->send(['id' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }
}