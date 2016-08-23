<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */

define('KJ', realpath('./'));
define('CORE', KJ . '/core');
define('APP', KJ . '/app');
define('MODULE','app');
define('DEBUG', true);

include "vendor/autoload.php";

if (DEBUG) {
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    ini_set('display_error', 'On');
} else {
    ini_set('display_error', 'Off');
}


include CORE . '/common/function.php';

include CORE . '/bigpang.php';

spl_autoload_register('\core\bigpang::load');

\core\bigpang::run();