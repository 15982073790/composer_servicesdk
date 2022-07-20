<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/5
 * Time: 18:05
 */

namespace Mrstock\Servicesdk\Test\MessageService\GMessage;


use Mrstock\Servicesdk\ImService\GxsMessage;
use Mrstock\Servicesdk\MessageService\GMessage\Lists;
use PHPUnit\Framework\TestCase;

class ListsTest extends TestCase
{
    //检查获取某个分组下消息列表[get]
    public function testGetDataList()
    {
        $lists = new Lists(new GxsMessage('1'));

        $res = $lists->getDataList(1);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['body']['code'], -1);
    }

    //检查一键全看
    public function testAllRead()
    {
        $lists = new Lists(new GxsMessage('1'));

        $res = $lists->allRead(1);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['body']['code'], -1);
    }

    //检查用户所有的消息ids
    public function testGetAllIds()
    {
        $lists = new Lists(new GxsMessage('1'));

        $res = $lists->getAllIds(1);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['body']['code'], -1);
    }

    //检查检验用户产品id是否存在
    public function testIsExistId()
    {
        $lists = new Lists(new GxsMessage('1'));

        $res = $lists->isExistId(1, '', 1);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['body']['code'], -1);
    }
}