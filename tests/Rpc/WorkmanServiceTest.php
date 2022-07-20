<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/7
 * Time: 11:27
 */

namespace Mrstock\Servicesdk\Test\Rpc;


use Mrstock\Servicesdk\Rpc\WorkmanService;
use PHPUnit\Framework\TestCase;

class WorkmanServiceTest extends TestCase
{
    //检查checkEnv
    public function testCheckEnv()
    {
        $workmanService = new WorkmanService();

        $res = $workmanService->checkEnv();

        //检查不为空
        $this->assertNotEmpty($res);
        //检查为字符串
        $this->assertIsString($res);
    }

}