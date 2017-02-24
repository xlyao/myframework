<?php

/**
 * Created by PhpStorm.
 * User: xlyao
 * Date: 2017/2/22 0022
 * Time: 17:29
 */
namespace app\ctrl;

class indexCtrl extends \core\myproj
{
    public function index() {
        $data['data'] = 'hello';
        $data['title'] = '这是视图文件';
        $this->assign('data', $data);
        $this->display('index.html');
    }
}