<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/7
 * Time: 15:23
 */

namespace Mrstock\Servicesdk\Test\ServersToken;


use Mrstock\Servicesdk\ServersToken\Secret;
use PHPUnit\Framework\TestCase;

class SecretTest extends TestCase
{
    //检查encrypt
    public function testEncrypt()
    {
        $vi = substr('5af3f79712495uhuzp200rsr', 0, 16);

        $secret = new Secret('5af3f797124e4ehxuw0g279n', $vi);

        $res = $secret->encrypt('13730856862');

        //检查不为空
        $this->assertNotEmpty($res);
        //检查字符串
        $this->assertIsString($res);
        //检查值
        $this->assertEquals($res, 'WUFkS3RmR2JaQTBTMmxRN0xVb2pLdz09');

    }

    public function testDecrypt()
    {
        $vi = substr('5af3f79712495uhuzp200rsr', 0, 16);

        $secret = new Secret('5af3f797124e4ehxuw0g279n', $vi);

        $res = $secret->decrypt('WUFkS3RmR2JaQTBTMmxRN0xVb2pLdz09');

        //检查不为空
        $this->assertNotEmpty($res);
        //检查字符串
        $this->assertIsString($res);
        //检查值
        $this->assertEquals($res, '13730856862');
    }
}