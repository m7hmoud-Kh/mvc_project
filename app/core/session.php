<?php 

namespace SHOP\core;

class session
{
    public static function start()
    {
        session_start();
    }
    public static function set_session($key,$value)
    {
        $_SESSION[$key] = $value;
    }
    public static function get_session($key)
    {
        if(isset($_SESSION[$key]))
        return $_SESSION[$key];
    }
    public static function stop()
    {
        session_unset();
        session_destroy();
    }
}