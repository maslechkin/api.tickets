<?php
use Classes\Router;

// debug
error_reporting (E_ALL);
ini_set("display_errors","On");

<<<<<<< HEAD:dfgg/index.php
//try {
//    $redis = new Redis();
//    $redis->connect('localhost:6379');
//} catch(Exception $e) {
//    exit('Connect error');
//}

//$benchmark = microtime(true);


define ('DS', DIRECTORY_SEPARATOR);
define ('SITE_PATH', realpath(dirname(__FILE__) . DS));
=======
define('DS', DIRECTORY_SEPARATOR);
define('SITE_PATH', realpath(dirname(__FILE__) . DS));
>>>>>>> 'v2':index.php

include (SITE_PATH . '/conf/includes.php');

return json_encode((new Router())->getData());

