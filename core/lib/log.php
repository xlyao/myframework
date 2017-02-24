<?php
/**
 * Created by PhpStorm.
 * User: xlyao
 * Date: 2017/2/23 0023
 * Time: 14:55
 */

namespace core\lib;


class log
{
    static $class;

    static public function init() {
        //确定存储方式
        $drive = conf::get('drive', 'log');
        $class = '\core\lib\drive\log\\' . $drive;
        self::$class = new $class;
    }

    static public function log($message, $file = 'log') {
        self::$class->log($message, $file);
    }
}