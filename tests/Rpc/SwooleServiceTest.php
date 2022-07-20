<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/7
 * Time: 10:30
 */

namespace Mrstock\Servicesdk\Test\Rpc;

use Mrstock\Servicesdk\Rpc\SwooleService;
use PHPUnit\Framework\TestCase;

class SwooleServiceTest extends TestCase
{
    //检查checkEnv
    public function testCheckEnv()
    {
        $swooleService = new SwooleService();

        $res = $swooleService->checkEnv();

        //检查不为空
        $this->assertNotEmpty($res);
        //检查为字符串
        $this->assertIsString($res);
    }

}