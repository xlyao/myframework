<?php
/**
 * Created by PhpStorm.
 * User: xlyao
 * Date: 2017/2/24 0024
 * Time: 9:30
 */

namespace app\model;

use core\lib\model;

class ordersModel extends model
{
    public $table = 'orders';

    public function lists() {
        $ret = $this->select($this->table, '*');
        return $ret;
    }
}