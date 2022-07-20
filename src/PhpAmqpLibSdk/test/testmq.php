<?php

// 是否开启调试模式
define("APP_DEBUG", true);

// 是否命令行
define('IS_CLI', 1);

// 是否接口模式
define('IS_API', 0);

require_once 'app.php';
$_REQUEST["site"] = "test";
\Mrstock\Helper\Config::register();
Mrstock\Mjc\Facade\App::run();
$arr = ["age" => 111];
$start_time = microtime(true);
while (1) {
    # code...
    Mrstock\Servicesdk\PhpAmqpLibSdk\PhpAmqpLibFactory::say("sss", $arr);
    $endTime = microtime(true);
    $runTime = round($endTime - $start_time, 6) * 1000;
    Mrstock\Helper\CliHelper::cliEcho("runtime-" . $runTime);

}

?>