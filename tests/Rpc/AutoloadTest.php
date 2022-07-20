<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/7
 * Time: 9:12
 */

namespace Mrstock\Servicesdk\Test\Rpc;


use Mrstock\Helper\Arr;
use Mrstock\Servicesdk\Rpc\Autoload;
use PHPUnit\Framework\TestCase;

class AutoloadTest extends TestCase
{
    //检查autoload
    public function testAutoload()
    {
        if (!defined('basedir')) {
            define('basedir', __DIR__ . '/../../vendor/mrstock/helper');
        }

        $autoload = new Autoload();

        $res = $autoload::autoload('Arr');

        //断言不为空
        $this->assertNotEmpty($res);
        //断言bool
        $this->assertIsBool($res);
        //断言值
        $this->assertEquals($res, 1);
    }
}