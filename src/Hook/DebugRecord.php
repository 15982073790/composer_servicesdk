<?php

namespace Mrstock\Servicesdk\Hook;

use Mrstock\Mjc\Http\Request;
use Mrstock\Orm\Model;
use Mrstock\Mjc\Facade\Debug;

class DebugRecord
{

    public function run(Request $request, $params)
    {
        if (isset($request["isdebug"]) && !empty($request["isdebug"])) {
            $debugBody = [];
            $debugBody['type'] = $params['type'];
            $debugBody['link'] = $params['link'];
            $debugBody['command'] = $params['command'];
            if (!empty($debugBody['command']) && is_array($debugBody['command'])) {
                $debugBody['command']['param_array']['access_token'] = '';
            }
            $debugBody['state'] = $params['state'];
            $debugBody['runtime'] = round((microtime(true) - $params['starttime']) * 1000, 3);
            $debugBody['result'] = isset($params['result']) ? $params['result'] : null;

            $step = Debug::getStep();
            Debug::data('Debug', $debugBody);
            if (isset($params['result_debug'])) {
                Debug::data($step . ':child', $params['result_debug']);
                unset($params['result_debug']);
            }

        }


    }
}