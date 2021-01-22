<?php

namespace SHOP\core;

class helper 
{
    public static function redirct($path)
    {
        header("location:".DOMAIN_NAME.$path);
    }
}
