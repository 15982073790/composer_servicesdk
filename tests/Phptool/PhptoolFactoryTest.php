<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/6
 * Time: 16:56
 */

namespace Mrstock\Servicesdk\Test\PhptoolFactory;


use Mrstock\Servicesdk\Phptool\PhptoolFactory;
use PHPUnit\Framework\TestCase;

class PhptoolFactoryTest extends TestCase
{
    //检查getport
    public function testGetport()
    {
        if (!defined('VENDOR_DIR')) {
            define('VENDOR_DIR', __DIR__ . '/../vendor');
        }
        if (!defined('APP_PATH')) {
            define('APP_PATH', __DIR__ . '/../src');
        }
        putenv('worker_port=9502');
        putenv('vendor_pronamespace=dexun-app');

        $phptoolFactory = new PhptoolFactory();

        $res = $phptoolFactory->getport('goods');

        //检查不为空
        $this->assertNotEmpty($res);
        //检查为字符串
        $this->assertIsString($res);
        //检查值
        $this->assertEquals($res, 9502);

    }

    //检查getallinnerusebyworkname
    public function testGetallinnerusebyworkname()
    {
        try {
            $phptoolFactory = new PhptoolFactory();

            $res = $phptoolFactory->getallinnerusebyworkname('goods');
            if ($res['code'] == 1) {
                //检查不为空
                $this->assertNotEmpty($res);
                //检查为数组
                $this->assertIsArray($res);
                //检查值
                $this->assertEquals($res['message'], 'ok');
            } else {
                //检查不为空
                $this->assertNotEmpty($res);
                //检查为数组
                $this->assertIsArray($res);
            }
        } catch (\Exception $e) {
            //检查不为空
            $this->assertNotEmpty($e);
            //检查为字符串
            $this->assertIsObject($e);
        }

    }

    //检查register
    public function testRegister()
    {
        try {
            $phptoolFactory = new PhptoolFactory();

            $res = $phptoolFactory->register('goods', 'dexun-app');

            if ($res['code'] == 1) {
                //检查不为空
                $this->assertNotEmpty($res);
                //检查为数组
                $this->assertIsArray($res);
                //检查为字符串
                $this->assertEquals($res['message'], 'ok');
            } else {
                //检查不为空
                $this->assertNotEmpty($res);
                //检查为数组
                $this->assertIsArray($res);
            }
        } catch (\Exception $e) {
            //检查不为空
            $this->assertNotEmpty($e);
            //检查为对象
            $this->assertIsObject($e);
        }
    }
}