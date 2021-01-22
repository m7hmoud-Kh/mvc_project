<?php 

define('DS', DIRECTORY_SEPARATOR);
define("ROOT",dirname(__DIR__));
define("APP",ROOT.DS."app".DS);
define("CONTROLLERS",APP.DS."controllers".DS);
define("CORE",APP.DS."core".DS);
define("MODELS",APP.DS."models".DS);
define("VIEWS",APP.DS."views".DS);
define('DOMAIN_NAME',"http://mvc.test"."/");
define("PATH",DOMAIN_NAME."front"."/");
define("PATH_BACK",DOMAIN_NAME."backend"."/");
require_once("../vendor/autoload.php");

$app = new SHOP\core\app();
