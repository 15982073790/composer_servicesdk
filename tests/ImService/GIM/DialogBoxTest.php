<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/4
 * Time: 10:05
 */

namespace Mrstock\Servicesdk\Test\ImService\GIM;


use Mrstock\Servicesdk\ImService\GIM\DialogBox;
use Mrstock\Servicesdk\ImService\GxsMessage;
use PHPUnit\Framework\TestCase;

class DialogBoxTest extends TestCase
{
    //检查对话框列表
    public function testBoxList()
    {
        $DialogBox = new DialogBox(new GxsMessage('212112212121'));

        $res = $DialogBox->boxList('1', 1, 1);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查对话框消息列表
    public function testMessage()
    {
        $DialogBox = new DialogBox(new GxsMessage('212112212121'));

        $res = $DialogBox->message(['uid' => 1], 1, 1);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查对话框置顶
    public function testStick()
    {
        $DialogBox = new DialogBox(new GxsMessage('212112212121'));

        $res = $DialogBox->stick(['uid' => 1, 'group_id' => 1, 'send_uid' => 2, 'stick_type' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查对话框置顶取消
    public function testStickCancel()
    {
        $DialogBox = new DialogBox(new GxsMessage('212112212121'));

        $res = $DialogBox->stickCancel(['uid' => 1, 'group_id' => 1, 'send_uid' => 2, 'stick_type' => 0]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查对话框创建
    public function testCreate()
    {
        $DialogBox = new DialogBox(new GxsMessage('212112212121'));

        $res = $DialogBox->create(['uid' => 1, 'group_id' => 1, 'send_uid' => 2, 'stick_type' => 0]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查对话框删除
    public function testDel()
    {
        $DialogBox = new DialogBox(new GxsMessage('212112212121'));

        $res = $DialogBox->del(['uid' => 1, 'group_id' => 1, 'send_uid' => 2]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查对话框免打扰设置
    public function testDisturb()
    {
        $DialogBox = new DialogBox(new GxsMessage('212112212121'));

        $res = $DialogBox->disturb(['uid' => 1, 'group_id' => 1, 'send_uid' => 2]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查对话框免打扰，置顶状态
    public function testBoxInfo()
    {
        $DialogBox = new DialogBox(new GxsMessage('212112212121'));

        $res = $DialogBox->boxInfo(['uid' => 1, 'group_id' => 1, 'send_uid' => 2]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查清空对话框消息
    public function testEmptyMsg()
    {
        $DialogBox = new DialogBox(new GxsMessage('212112212121'));

        $res = $DialogBox->emptyMsg(['uid' => 1, 'group_id' => 1, 'send_uid' => 2]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查对话框已读
    public function testBoxRead()
    {
        $DialogBox = new DialogBox(new GxsMessage('212112212121'));

        $res = $DialogBox->boxRead(['uid' => 1, 'group_id' => 1, 'send_uid' => 2, 'stick_type' => 0]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

}