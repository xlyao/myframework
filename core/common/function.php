<?php
/**
 * Created by PhpStorm.
 * User: xlyao
 * Date: 2017/2/22 0022
 * Time: 16:02
 */
function p($var) {
    if (is_bool($var)) {
        var_dump($var);
    } elseif (is_null($var)) {
        var_dump($var);
    } else {
        echo '<pre>' . print_r($var, true) . '</pre>';
    }
}