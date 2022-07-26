<?php

namespace Mrstock\Servicesdk\JsonRpc;

use Mrstock\Mjc\Facade\Log;
use Mrstock\Helper\HttpRequest;
use MrstockCloud\Client\Request\RpcRequest;

class RpcClientFactory
{

    public static function sync($message)
    {
        $request = \Mrstock\Mjc\Container::get("request", []);
        $message["refer_api"] = http_build_query($request->param);
        $message["refer_site"] = $request->site;
        $message["isdebug"] = $request->isdebug;

        $client = new RpcRequest($message, false);
        return $client->request();

    }

    public static function innerusesync($message)
    {
        $request = \Mrstock\Mjc\Container::get("request", []);
        $message["refer_api"] = http_build_query($request->param);
        $message["refer_site"] = $request->site;
        $message["isdebug"] = $request->isdebug;

        $client = new RpcRequest($message, false);
        return $client->inneruserequest();

    }

    public static function synchttp($message)
    {
        $url = "http://" . $message["site"] . ".service.guxiansheng.cn";

        $rs = HttpRequest::query($url, $message, true);

        if ($rs['code'] == 1) {
            return $rs;
        } else {
            throw new \Exception($rs["message"], $rs['code']);
        }
        Log::record('RpcClientFactory_synchttp_err' . http_build_query($message));
        return false;
    }
}
