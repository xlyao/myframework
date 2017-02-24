<?php
/**
 * Created by PhpStorm.
 * User: xlyao
 * Date: 2017/2/22 0022
 * Time: 17:55
 */

namespace core\lib;

use Medoo\Medoo;

class model extends Medoo
{
    public function __construct() {
        $db = conf::get('', 'db');
        try {
            parent::__construct($db);
        } catch (\PDOException $e) {
            dump($e->getMessage());
        }
    }
}