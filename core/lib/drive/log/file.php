<?php
/**
 * Created by PhpStorm.
 * User: xlyao
 * Date: 2017/2/23 0023
 * Time: 15:02
 */

namespace core\lib\drive\log;


use core\lib\conf;

class file
{
    public $path; //日志存储位置

    public function __construct() {
        $conf = conf::get('option', 'log');
        $this->path = $conf['path'];
    }

    /** 写日志
     * @param $message
     * @param string $file
     * @return int
     */
    public function log($message, $file = 'log') {
        if (!is_dir($this->path . date('YmdH'))) {
            mkdir($this->path . date('YmdH'), '0777', true);
        }
        if (is_array($message)) {
            $message = json_encode($message, true);
        }
        $message = date('Y-m-d H:i:s') . '   ' . $message . PHP_EOL;
        return file_put_contents($this->path . date('YmdH') . '/'. $file . '.php', $message, FILE_APPEND);
    }
}