<?php
/**
 * Created by PhpStorm.
 * User: xlyao
 * Date: 2017/2/22 0022
 * Time: 16:32
 */

namespace core;

use core\lib\log;

class myproj
{
    public static $class_map = array();
    public $assign;

    static public function run() {
        log::init();
        $route = new \core\lib\route();
        $ctrl = $route->ctrl;
        $act = $route->act;
        $ctrl_file = APP . '/ctrl/' . $ctrl . 'Ctrl.php';
        if (is_file($ctrl_file)) {
            $ctrlClass = '\\' . MODULE . '\ctrl\\' . $ctrl . 'Ctrl';
            include $ctrl_file;
            $class = new $ctrlClass();
            $class->$act();
            log::log('ctrl:' . $ctrl . '/' . 'action:' . $act);
        } else {
            throw new \Exception('找不到控制器' . $ctrl);
        }
    }

    /** 自动加载类
     * @param $class
     * @return bool
     */
    static public function load($class) {
        //自动加载类库
        //new \core\route();
        //$class = '\core\route';
        //MYPROJ . '/core/route.php';
        if (isset(self::$class_map[$class])) {
            return true;
        } else {
            $class = str_replace('\\', '/', $class);
            $file = MYPROJ . '\\' . $class . '.php';
            if (is_file($file)) {
                include $file;
                self::$class_map[$class] = $class;
            } else {
                return false;
            }
        }
    }

    /** 赋值变量
     * @param $name
     * @param $value
     */
    public function assign($name, $value) {
        $this->assign[$name] = $value;
    }

    /** 显示视图文件
     * @param $file
     */
    public function display($file) {
        $path = APP . '/views/' . $file;
        if (is_file($path)) {
            \Twig_Autoloader::register();
            $loader = new \Twig_Loader_Filesystem(APP . '/views');
            $twig = new \Twig_Environment($loader, array(
                'cache' => MYPROJ . '/log/twig',
                'debug' => DEBUG
            ));
            $template = $twig->loadTemplate($file);
            $template->display($this->assign ? $this->assign : array());
        }
    }
}