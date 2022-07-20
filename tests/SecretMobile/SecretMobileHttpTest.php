<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/7
 * Time: 14:41
 */

namespace Mrstock\Servicesdk\Test\SecretMobile;


use Mrstock\Servicesdk\SecretMobile\SecretMobileHttp;
use Mrstock\Servicesdk\ServersToken\PlatToken;
use PHPUnit\Framework\TestCase;

class SecretMobileHttpTest extends TestCase
{
    //检查encrypt
    public function testEncrypt()
    {
        if (!defined('VENDOR_DIR')) {
            define('VENDOR_DIR', __DIR__ . '/../vendor');
        }
        if (!defined('APP_PATH')) {
            define('APP_PATH', __DIR__ . '/../src');
        }
        $secretMobileHttp = new SecretMobileHttp();
        $servicestoken = PlatToken::tokenEncode('5af3f79712495uhuzp200rsr', '5af3f797124e4ehxuw0g279n');

        $m = [13730856862];
        $res = $secretMobileHttp::encrypt($servicestoken, $m);
        //断言为空
        $this->assertEmpty($res);
        //断言booL
        $this->assertIsBool($res);
    }

    //检查decrypt
    public function testDecrypt()
    {
        $secretMobileHttp = new SecretMobileHttp();
        $servicestoken = PlatToken::tokenEncode('5af3f79712495uhuzp200rsr', '5af3f797124e4ehxuw0g279n');

        $m = ['3e6c7d141e32189c917761138b026b74'];
        $res = $secretMobileHttp::decrypt($servicestoken, $m);
        //断言为空
        $this->assertEmpty($res);
        //断言booL
        $this->assertIsBool($res);
    }
}