<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/7/30
 * Time: 14:20
 */

namespace Mrstock\Servicesdk\Test\Hook;


use Mrstock\Helper\Config;
use Mrstock\Mjc\Http\Request;
use Mrstock\Servicesdk\Hook\BeforeInsert;
use Mrstock\Servicesdk\Hook\BeforeInsertJ;
use PHPUnit\Framework\TestCase;

class BeforeInsertJTest extends TestCase
{
    //检查集中处理 insert insertall 公共字段
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

        $param[0]['goods_name'] = '测试商品88666';
        $param[0]['business_id'] = 1992;
        $param[1]['table'] = 'goods';
        $param[2] = 'default';
        $beforeInsert = new BeforeInsertJ();

        list($data, $options, $host) = $beforeInsert->run(new Request(), $param);

        //不为空
        $this->assertNotEmpty($data);
        $this->assertNotEmpty($options);
        $this->assertNotEmpty($host);
        //为数组
        $this->assertIsArray($data);
        $this->assertIsArray($options);
        //为字符串
        $this->assertIsString($host);
        //断言值
        $this->assertEquals($data['goods_name'], '测试商品88666');
        $this->assertEquals($options['table'], 'goods');
        $this->assertEquals($host, 'default');
    }
}