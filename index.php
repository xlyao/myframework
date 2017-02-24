<?php
/** 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 * Created by PhpStorm.
 * User: xlyao
 * Date: 2017/2/22 0022
 * Time: 15:43
 */
define('MYPROJ', __DIR__);
define('CORE', MYPROJ . '/core');
define('APP', MYPROJ . '/app');
define('MODULE', 'app');

define('DEBUG', true);

include 'vendor/autoload.php';

if (DEBUG) {
    $whoops = new \Whoops\Run();
    $option = new \Whoops\Handler\PrettyPageHandler();
    $error_title = '框架出错了';
    $option->setPageTitle($error_title);
    $whoops->pushHandler($option);
    $whoops->register();

    ini_set('display_errors', 'On');
} else {
    ini_set('display_errors', 'Off');
}

include CORE . '/common/function.php';

include CORE . '/myproj.php';

spl_autoload_register('\core\myproj::load');

\core\myproj::run();