<?php 

namespace SHOP\core;

class controller 
{
    public function view($path,$param)
    {
        extract($param);
        require_once(VIEWS.$path.".php");
    }
}