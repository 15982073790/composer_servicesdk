<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/7/28
 * Time: 15:15
 */

namespace Mrstock\Servicesdk\Test\Hook;

use Mrstock\Mjc\Http\Request;
use Mrstock\Servicesdk\Hook\AfterMq;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PHPUnit\Framework\TestCase;

class AfterMqTest extends TestCase
{
    //检查run方法
    public function testRun()
    {
        $aftermq = new AfterMq();

        $_REQUEST = ['id' => 12121, 'name' => 'hehe'];

        $connection = new AMQPStreamConnection('192.168.10.43', '5672', 'admin', 'admin');

        $connection->delivery_info['channel'] = new AMQPChannel($connection, 1);

        $res = $aftermq->run(new Request($_REQUEST), $connection);
        //为空
        $this->assertEmpty($res);
        //断言范围
        $this->assertContains($res, [false, null, 0]);
    }
}