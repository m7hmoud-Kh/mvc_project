<?php

namespace SHOP\core;

use Dcblogdev\PdoWrapper\Database;

class model
{
    public static function db()
    {

        // make a connection to mysql here
        $options = [
            //required
            'username' => 'root',
            'database' => 'testbark',
            //optional
            'password' => '',
            'type' => 'mysql',
            'charset' => 'utf8',
            'host' => 'localhost',
            'port' => '3306'
        ];

        return  $db = new Database($options);
    }
}
