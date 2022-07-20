<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020-07-03
 * Time: 10:10
 */

namespace Mrstock\Servicesdk\Rpc;


class Autoload
{
    static function autoload($class)
    {

        require basedir . "/src/" . basename($class) . ".php";
        return true;
    }
}