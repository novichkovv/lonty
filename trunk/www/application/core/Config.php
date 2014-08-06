<?php
define ('DS', DIRECTORY_SEPARATOR);
$sitePath = realpath($_SERVER['DOCUMENT_ROOT'] . DS);
define ('SITE_PATH', $sitePath);
define ('SITE_DIR', 'http://'.$_SERVER['HTTP_HOST'].'/');
define ('SMARTY_DIR', SITE_PATH.DS.'libs'.DS.'Smarty'.DS.'libs'.DS);
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_HOST', 'localhost');
?>
