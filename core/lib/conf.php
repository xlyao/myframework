<?php
/**
 * Created by PhpStorm.
 * User: xlyao
 * Date: 2017/2/23 0023
 * Time: 14:13
 */

namespace core\lib;


class conf
{
    static public $conf = array();

    /** 获取配置文件
     * @param $name
     * @param $file
     * @return mixed
     * @throws \Exception
     */
    static public function get($name = '', $file) {
        /**
         * 1 判断配置文件是否存在
         * 2 判断配置是否存在
         * 3 缓存配置
         */
        if (isset(self::$conf[$file])) {
            return self::$conf[$file][$name];
        } else {
            $path = MYPROJ . '/core/conf/' . $file . '.php';
            if (is_file($path)) {
                $conf = include $path;
                if (empty($name)) {
                    self::$conf[$file] = $conf;
                    return $conf;
                }
                if (isset($conf[$name])) {
                    self::$conf[$file] = $conf;
                    return $conf[$name];
                } else {
                    throw new \Exception('找不到配置项' . $name);
                }
            } else {
                throw new \Exception('找不到配置文件' . $file);
            }
        }
    }
}