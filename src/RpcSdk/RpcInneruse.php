<?php

namespace Mrstock\Servicesdk\RpcSdk;

use Mrstock\Servicesdk\JsonRpc\RpcClientFactory;
use Mrstock\Helper\Config;
use Mrstock\Mjc\Container;

class RpcInneruse
{
    //调用demo
//$rs=\Mrstock\Servicesdk\RpcSdk\RpcCommon::gateway_Admin_selectbyadminids(['admin_ids'=>'1,2,3,6']);
//$rs=\Mrstock\Servicesdk\RpcSdk\RpcCommon::gateway_Admin_getadminidbyusername(["username"=>"3Y2FLi","ss"=>11]);
    public static function __callstatic($method, $args)
    {
        try {
            $args = static::dealargs($method, $args);
            $args[0] = empty($args[0]) ? [] : $args[0];
            $res = static::run(array_merge($args[0], static::before_method($method)));
            return $res;
        } catch (\Exception $e) {
            return ['code' => $e->getCode(), 'message' => $e->getMessage()];
        }


    }

    public static function before_method($method)
    {
        $requests = Container::get("request");

        $method_arr = explode('_', $method);
        if (count($method_arr) == 3) {
            $data['site'] = $method_arr[0];
            $data['v'] = 'inneruse';
            $data['c'] = $method_arr[1];
            $data['a'] = $method_arr[2];
        } else {
            $data['site'] = $method_arr[0];
            $data['serviceversion'] = $method_arr[1];
            $data['v'] = 'inneruse';
            $data['c'] = $method_arr[2];
            $data['a'] = $method_arr[3];
        }
        $data['appcode'] = $requests->appcode;
        $data['client'] = $requests->client;
        $data['agentserver'] = $requests->agentserver;
        return $data;
    }

    public static function run($data)
    {

        $res = RpcClientFactory::innerusesync($data);
        return $res;
    }

    public static function dealargs($method, $args)
    {
        if ($method == "message_Access_inqueue") {
            $args[0]["businessdata"] = \Mrstock\Helper\Tool::arrToStr($args[0]["businessdata"]);
        }

        return $args;
    }


}
