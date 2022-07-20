<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/7
 * Time: 15:35
 */

namespace Mrstock\Servicesdk\Test\Swoole;


use Mrstock\Servicesdk\Swoole\SwooleFactory;
use PHPUnit\Framework\TestCase;

class SwooleFactoryTest extends TestCase
{
    //检查check
    public function testCheck()
    {
        $swooleFactory = new SwooleFactory();

        $res = $swooleFactory::check();

        //检查为空
        $this->assertEmpty($res);
        //检查
        $this->assertContains($res, [false, 0, 1, true, null, '']);
    }

    //检查run
    public function testRun()
    {
        $swooleFactory = new SwooleFactory();

        $res = $swooleFactory::run();

        //检查为空
        $this->assertEmpty($res);
        //检查
        $this->assertContains($res, [false, 0, 1, true, null, '']);
    }
}