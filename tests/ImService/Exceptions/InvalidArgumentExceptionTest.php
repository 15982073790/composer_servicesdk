<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/4
 * Time: 9:12
 */

namespace Mrstock\Servicesdk\Test\ImService\Exceptions;

use PHPUnit\Framework\TestCase;

class InvalidArgumentExceptionTest extends TestCase
{
    //检查getErrorInfo方法
    public function testGetErrorInfo()
    {
        $res = new \InvalidArgumentException('的房价就是的分开', -202);
        //不为空
        $this->assertNotEmpty($res);
        //为对象
        $this->assertIsObject($res);
        //断言值
        $this->assertEquals($res->getMessage(), '的房价就是的分开');
    }
}