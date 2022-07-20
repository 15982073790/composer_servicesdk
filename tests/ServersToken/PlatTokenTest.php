<?php
/**
 * Created by PhpStorm.
 * User: 李勇刚
 * Date: 2020/8/7
 * Time: 15:14
 */

namespace Mrstock\Servicesdk\Test\ServersToken;


use Mrstock\Servicesdk\ServersToken\PlatToken;
use PHPUnit\Framework\TestCase;

class PlatTokenTest extends TestCase
{
    //检查tokenEncode
    public function testTokenEncode()
    {
        $platToken = new PlatToken();

        $res = $platToken::tokenEncode('5af3f79712495uhuzp200rsr', '5af3f797124e4ehxuw0g279n');

        //检查不为空
        $this->assertNotEmpty($res);
        //检查字符串
        $this->assertIsString($res);
    }

    //检查tokenDncode
    public function testTokenDncode()
    {
        $platToken = new PlatToken();

        $res = $platToken::tokenDncode('3e6c7d141e32189c917761138b026b74', '5af3f797124e4ehxuw0g279n');

        //检查不为空
        $this->assertEmpty($res);
        //检查字符串
        $this->assertIsBool($res);
        //检查值
        $this->assertContains($res, [false, 0, null]);
    }
}