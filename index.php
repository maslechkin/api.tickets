<?php
use Classes\Router;

// debug
error_reporting (E_ALL);
ini_set("display_errors","On");

define ('DS', DIRECTORY_SEPARATOR);
define ('SITE_PATH', realpath(dirname(__FILE__) . DS));

include (SITE_PATH . '/conf/includes.php');

$data = (new Router())->getData();
if(!empty($data)){
    return $data;
}

include(SITE_PATH . '/tutorial.php');



