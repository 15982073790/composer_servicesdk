<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/7/31
 * Time: 9:33
 */

namespace Mrstock\Servicesdk\Test\Hook;


use Mrstock\Helper\Config;
use Mrstock\Mjc\Facade\Debug;
use Mrstock\Mjc\Http\Request;
use Mrstock\Servicesdk\Hook\DebugRecord;
use PHPUnit\Framework\TestCase;

class DebugRecordTest extends TestCase
{
    //检查run方法
    public function testRun()
    {
        if (!defined('VENDOR_DIR')) {
            define('VENDOR_DIR', __DIR__ . '/../vendor');
        }
        if (!defined('APP_PATH')) {
            define('APP_PATH', __DIR__ . '/../src');
        }
        if (!Config::get('db.default')) {
            $config['db']['default'] = [
                'read' => [
                    'host' => '192.168.10.230',
                    'port' => '3306'
                ],
                'write' => [
                    'host' => '192.168.10.230',
                    'port' => '3306'
                ],
                'driver' => 'mysqli',
                'name' => 'app.goods',
                'user' => 'stocksir',
                'pwd' => 'stocksir1704!',
                'charset' => 'UTF-8',
                'tablepre' => ''
            ];
            Config::set($config);
        }
        $_REQUEST['goods_name'] = '测试商品88666';
        $_REQUEST['business_id'] = 1992;
        $_REQUEST['isdebug'] = 1;
        $_SERVER['SCRIPT_NAME'] = 'index.php';

        $params['type'] = 1;
        $params['link'] = '127.0.0.1';
        $params['command'] = 1;
        $params['state'] = 2002;
        $params['starttime'] = time();
        $params['result'] = '测试试试试试';

        $DebugRecord = new DebugRecord();
        //参数不为空
        $this->assertNotEmpty($params);

        $DebugRecord->run(new Request(), $params);

        $res = Debug::getData('Debug');
        //返回参数不为空
        $this->assertNotEmpty($res);
        //返回参数为数组
        $this->assertIsArray($res);
        //断言其中一个参数的值
        $this->assertEquals($res['result'], '测试试试试试');
    }
}