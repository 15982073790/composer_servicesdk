<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/4
 * Time: 11:27
 */

namespace Mrstock\Servicesdk\Test\ImService\GIM;


use Mrstock\Servicesdk\ImService\GIM\Dynamic;
use Mrstock\Servicesdk\ImService\GxsMessage;
use PHPUnit\Framework\TestCase;

class DynamicTest extends TestCase
{
    //检查添加动态
    public function testCreate()
    {
        $dynamic = new Dynamic(new GxsMessage('212112212121'));

        $res = $dynamic->create(['id' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查点赞
    public function testThumbsUp()
    {
        $dynamic = new Dynamic(new GxsMessage('212112212121'));

        $res = $dynamic->thumbsUp(['id' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查评论
    public function testComment()
    {
        $dynamic = new Dynamic(new GxsMessage('212112212121'));

        $res = $dynamic->comment(['id' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查评论回复
    public function testCommentReply()
    {
        $dynamic = new Dynamic(new GxsMessage('212112212121'));

        $res = $dynamic->commentReply(['id' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查股圈动态详情
    public function testDetail()
    {
        $dynamic = new Dynamic(new GxsMessage('212112212121'));

        $res = $dynamic->detail(['id' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查股圈动态评论列表
    public function testCommentList()
    {
        $dynamic = new Dynamic(new GxsMessage('212112212121'));

        $res = $dynamic->commentList(['id' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查股圈动态老师回复撤回
    public function testReplyRetract()
    {
        $dynamic = new Dynamic(new GxsMessage('212112212121'));

        $res = $dynamic->replyRetract(['id' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查评论审核（更改公开状态）
    public function testChangeOpenStatus()
    {
        $dynamic = new Dynamic(new GxsMessage('212112212121'));

        $res = $dynamic->changeOpenStatus(['id' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查股圈列表(用户端)
    public function testUserList()
    {
        $dynamic = new Dynamic(new GxsMessage('212112212121'));

        $res = $dynamic->userList(['id' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查股圈单条动态详情(用户端)
    public function testUserMsgDetail()
    {
        $dynamic = new Dynamic(new GxsMessage('212112212121'));

        $res = $dynamic->userMsgDetail(['id' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查股圈列表(老师端)
    public function testAdminList()
    {
        $dynamic = new Dynamic(new GxsMessage('212112212121'));

        $res = $dynamic->adminList(['id' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查新消息列表
    public function testNewNoticeList()
    {
        $dynamic = new Dynamic(new GxsMessage('212112212121'));

        $res = $dynamic->newNoticeList(['id' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查新消息提醒
    public function testNewNoticeInfo()
    {
        $dynamic = new Dynamic(new GxsMessage('212112212121'));

        $res = $dynamic->newNoticeInfo(['id' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查私股圈删除（撤回）
    public function testRetract()
    {
        $dynamic = new Dynamic(new GxsMessage('212112212121'));

        $res = $dynamic->retract(['id' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查老师私股圈最新消息
    public function testRecentMsg()
    {
        $dynamic = new Dynamic(new GxsMessage('212112212121'));

        $res = $dynamic->recentMsg(['id' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }
}