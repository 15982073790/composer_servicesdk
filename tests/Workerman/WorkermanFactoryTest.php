<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/9
 * Time: 14:09
 */

namespace Mrstock\Servicesdk\Test\Workerman;


use Mrstock\Servicesdk\Workerman\WorkermanFactory;
use PHPUnit\Framework\TestCase;

class WorkermanFactoryTest extends TestCase
{
    //检查check方法
    public function testCheck()
    {
        $workermanFactory = new WorkermanFactory();

        $res = $workermanFactory::check();

        //检查不为空
        $this->assertNotEmpty($res);
        //检查为字符串
        $this->assertIsString($res);
    }

    //检查run
    public function testRun()
    {
        $workermanFactory = new WorkermanFactory();

        $res = $workermanFactory::check();

        //检查不为空
        $this->assertNotEmpty($res);
        //检查为字符串
        $this->assertIsString($res);
    }
}