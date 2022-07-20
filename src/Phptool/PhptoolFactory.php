<?php
/*consul*/

namespace Mrstock\Servicesdk\Phptool;

use Mrstock\Helper\HttpRequest;
use Mrstock\Helper\Cache\File;

class PhptoolFactory
{
    public static function getport($service_name, $worker_port, $openfilecache = 0, $openfilecache_time = 300)
    {

        $port = 0;
        if ($openfilecache) {
            $file_key = $service_name . "_getport";
            $port = File::get($file_key);
            if (!empty($port)) return $port;
        }

        try {
            /*$url = "http://tool.guxiansheng.cn/?c=Serviceport&a=getbyservicename";
            $bodyData['servicename'] =$service_name;
            $bodyData['pronamespace'] =getenv("vendor_pronamespace");

            $rs=HttpRequest::query($url,$bodyData,1);
            if($rs['code']!=1){
                throw  new \Exception("NOT service register ".$service_name, -__LINE__);
            }
            $port=$rs['data']['port'];*/
            $port = $worker_port;

        } catch (\Exception $e) {
            throw  new \Exception($e->getMessage());
        }

        if (!empty($port) && $openfilecache) {
            File::set($file_key, $port, $openfilecache_time);
        }
        return $port;
    }

    public static function getallinnerusebyworkname($service_name)
    {


        try {
            $url = "http://tool.guxiansheng.cn/?c=Serviceport&a=getallinnerusebyworkname";
            $bodyData['servicename'] = $service_name;
            $bodyData['pronamespace'] = getenv("vendor_pronamespace");

            $rs = HttpRequest::query($url, $bodyData, 1);
            if ($rs['code'] != 1) {
                throw  new \Exception("NOT inneruseservice register " . $service_name, -__LINE__);
            }

        } catch (\Exception $e) {
            throw  new \Exception($e->getMessage());
        }
        return $rs;
    }


    public static function register($service_name, $pronamespace)
    {

        try {
            $url = "http://tool.guxiansheng.cn/?c=Serviceport&a=register";
            $bodyData['servicename'] = $service_name;
            $bodyData['pronamespace'] = $pronamespace ? $pronamespace : getenv("vendor_pronamespace");
            $rs = HttpRequest::query($url, $bodyData, 1);
            return $rs;
        } catch (\Exception $e) {
            throw  new \Exception("http://tool.guxiansheng.cn connect Error", -__LINE__);
        }

    }

}
