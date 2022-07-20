<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/4
 * Time: 13:35
 */

namespace Mrstock\Servicesdk\Test\ImService\GIM;


use Mrstock\Servicesdk\ImService\GIM\GroupUser;
use Mrstock\Servicesdk\ImService\GxsMessage;
use PHPUnit\Framework\TestCase;

class GroupUserTest extends TestCase
{

    //检查添加用户
    public function testAddUser()
    {
        $groupUser = new GroupUser(new GxsMessage(111));

        $res = $groupUser->addUser(['id' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查删除用户
    public function testDelUser()
    {
        $groupUser = new GroupUser(new GxsMessage(111));

        $res = $groupUser->delUser(['id' => 1]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查更新群成员
    public function testUpdateGroupUsers()
    {
        $groupUser = new GroupUser(new GxsMessage(111));

        $res = $groupUser->updateGroupUsers(1, 1, [1, 2, 3]);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }

    //检查获取群成员
    public function testGetGroupUsers()
    {
        $groupUser = new GroupUser(new GxsMessage(111));

        $res = $groupUser->getGroupUsers(1);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['http_code'], 503);
    }
}