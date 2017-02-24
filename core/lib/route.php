<?php
/** 路由类
 * Created by PhpStorm.
 * User: xlyao
 * Date: 2017/2/22 0022
 * Time: 16:39
 */

namespace core\lib;

class route
{
    public $ctrl;
    public $act;

    public function __construct() {
        /*
         * 1.隐藏index.php
         * 2.获取URL参数部分
         * 3.返回对应控制器和方法
         */
        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
            $path = $_SERVER['REQUEST_URI'];
            $path_arr = explode('/', trim($path, '/'));
            if (isset($path_arr[0])) {
                $this->ctrl = $path_arr[0];
                unset($path_arr[0]);
            }
            if (isset($path_arr[1])) {
                $this->act = $path_arr[1];
                unset($path_arr[1]);
            } else {
                $this->act = conf::get('action', 'route');
            }
            $count = count($path_arr) + 2;
            $i = 2;
            while ($i < $count) {
                if (isset($path_arr[$i + 1])) {
                    $_GET[$path_arr[$i]] = $path_arr[$i + 1];
                }
                $i += 2;
            }
        } else {
            $this->ctrl = conf::get('ctrl', 'route');
            $this->act = conf::get('action', 'route');
        }
    }
}