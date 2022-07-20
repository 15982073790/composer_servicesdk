<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/6
 * Time: 9:20
 */

namespace Mrstock\Servicesdk\Test\MessageService\GMessage;


use Mrstock\Servicesdk\ImService\GxsMessage;
use Mrstock\Servicesdk\MessageService\GMessage\SMS;
use PHPUnit\Framework\TestCase;

class SMSTest extends TestCase
{
    //检查push推送
    public function testSend()
    {
        $sms = new SMS(new GxsMessage(1));

        $sms_data['mobile'] = 13909090960;
        $sms_data['content'] = '三季度骄傲手机卡';
        $sms_data['is_voice'] = 0;
        $sms_data['template'] = '11';

        $res = $sms->send($sms_data);

        //不为空
        $this->assertNotEmpty($res);
        //数组
        $this->assertIsArray($res);
        //断言
        $this->assertEquals($res['body']['code'], -1);
    }
}