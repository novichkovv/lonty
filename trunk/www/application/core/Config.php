<?php
define ('DS', DIRECTORY_SEPARATOR);
$sitePath = realpath($_SERVER['DOCUMENT_ROOT'] . DS);
define ('SITE_PATH', $sitePath);
define ('SITE_DIR', 'http://'.$_SERVER['HTTP_HOST'].'/');
define ('SMARTY_DIR', SITE_PATH.DS.'libs'.DS.'Smarty'.DS.'libs'.DS);
define('DB_USER', 'u191001322_lonty');
define('DB_PASS', '228713');
define('DB_HOST', 'mysql.hostinger.ru');
?>