<?php

namespace SHOP\core;

class app
{

    private $controller = "homecontroller";
    private $method = "index";
    private $param = [];
    private $url;

    public function __construct()
    {
        $this->geturl();
        $this->render();
    }

    public function geturl()
    {
        $this->url = trim($_SERVER["REQUEST_URI"], "/");
        $this->url = strtolower($this->url);
        if (!empty($this->url)) {
            $this->url = explode("/", $this->url);
            // get this controller
            $this->controller = isset($this->url[0]) ? $this->url[0]."controller" : "homecontroller";
            // get this method
            $this->method = isset($this->url[1]) ? $this->url[1] : "index";
            // unset controller and method
            unset($this->url[0], $this->url[1]);
            // get this param
            $this->param = array_values($this->url);
        }
    }
    public function render()
    {
        $controller = "SHOP\controllers\\" .$this->controller;
        if(class_exists($controller))
        {
            $controller = new $controller();
            if(method_exists($controller,$this->method))
            {
                call_user_func_array([$controller,$this->method],$this->param);
            }
            else
            {
                echo "method is not exist";
            }
        }
        else
        {
            echo "class is not exist";
        }
    }
}
