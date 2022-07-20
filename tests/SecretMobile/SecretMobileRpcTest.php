<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/7
 * Time: 15:03
 */

namespace Mrstock\Servicesdk\Test\SecretMobile;


use Mrstock\Helper\Config;
use Mrstock\Servicesdk\SecretMobile\SecretMobileRpc;
use PHPUnit\Framework\TestCase;

class SecretMobileRpcTest extends TestCase
{
    //检查encrypt
    public function testEncrypt()
    {
        $config['middlewares']['application'] = ['Mrstock\Middleware\Service\ServiceSDKRegister'];
        Config::set($config);

        $secretMobileRpc = new SecretMobileRpc();

        $res = $secretMobileRpc::encrypt([13730856862]);

        //检查不为空
        $this->assertNotEmpty($res);
        //检查为数组
        $this->assertIsArray($res);

    }

    //检查decrypt
    public function testDecrypt()
    {
        $secretMobileRpc = new SecretMobileRpc();

        $res = $secretMobileRpc::decrypt(['3e6c7d141e32189c917761138b026b74']);

        //检查不为空
        $this->assertNotEmpty($res);
        //检查为数组
        $this->assertIsArray($res);
    }

    //检查decrypt_auth_adminid
    public function testDecryptAuthAdminid()
    {
        $secretMobileRpc = new SecretMobileRpc();

        $res = $secretMobileRpc::decrypt_auth_adminid(['3e6c7d141e32189c917761138b026b74']);

        //检查不为空
        $this->assertNotEmpty($res);
        //检查为数组
        $this->assertIsArray($res);
    }
}