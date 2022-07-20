<?php
/*consulfggg*/

namespace Mrstock\Servicesdk\Consulfabio;

use SensioLabs\Consul\ServiceFactory;
use Mrstock\Mjc\Facade\Log;

class ConsulfabioFactory
{
    public static function register($site, $ip, $port)
    {

        $service = '{
                  "ID": "' . $site . '",
                  "Name": "' . $site . '",
                  "Tags": [
                    "urlprefix-:' . $port . ' proto=tcp",
                    "type:rpc"
                  ],
                  "Address": "' . $ip . '",
                  "Port": ' . $port . ',
                  "EnableTagOverride": false,
                  "Check": {
                    "tcp": "' . $ip . ':' . $port . '",
                    "Interval": "10s",
                    "Timeout": "5s"
                  },
                  "Weights": {
                    "Passing": 10,
                    "Warning": 1
                  }
                }';
        try {
            $sf = new ServiceFactory(["base_uri" => "http://" . getenv('vendor_consul_ip')]);
            $Agent = $sf->get('agent');
            $rs = $Agent->registerService($service);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        Log::write("serviceToConsulToFabio-{$service}-" . var_export($rs, true));

        return $rs;
    }

    public static function unregister($site, $ip)
    {

        $sf = new ServiceFactory(["base_uri" => "http://" . getenv('vendor_consul_ip')]);
        $Agent = $sf->get('agent');
        $rs = $Agent->deregisterService($site);
        Log::write("serviceToConsulToFabio-unregister-{$site}-" . var_export($rs, true));
        return $rs;
    }
}
