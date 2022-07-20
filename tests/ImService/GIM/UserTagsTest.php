<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/5
 * Time: 13:12
 */

namespace Mrstock\Servicesdk\Test\ImService\GIM;


use Mrstock\Servicesdk\ImService\GIM\UserTags;
use Mrstock\Servicesdk\ImService\GxsMessage;
use PHPUnit\Framework\TestCase;

class UserTagsTest extends TestCase
{
    //检查用户打标
    public function testTagAdd()
    {
        $user_tags = new UserTags(new GxsMessage('1'));

        $res = $user_tags->tagAdd('标签1', [1, 2]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查用户去标
    public function testTagDel()
    {
        $user_tags = new UserTags(new GxsMessage('1'));

        $res = $user_tags->tagDel('标签1', [1, 2]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查用户标签获取
    public function testGetUserTags()
    {
        $user_tags = new UserTags(new GxsMessage('1'));

        $res = $user_tags->getUserTags(1, ['标签1']);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查获取标签用户
    public function testGetTagUsers()
    {
        $user_tags = new UserTags(new GxsMessage('1'));

        $res = $user_tags->getTagUsers('标签1');

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查拷贝标签
    public function testCopyTagName()
    {
        $user_tags = new UserTags(new GxsMessage('1'));

        $res = $user_tags->copyTagName('标签1', '标签copy1');

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }
}