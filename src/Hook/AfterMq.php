<?php

namespace Mrstock\Servicesdk\Hook;

use Mrstock\Mjc\Http\Request;
use Mrstock\Orm\Model;

class AfterMq
{

    public function run(Request $request, $msg)
    {
        // echo 'AfterMq';  	echo "\r\n";
        // throw new \Exception("Error Processing Request", 1);

        return $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
    }
}