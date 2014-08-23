<?php
//error_reporting (E_ALL);
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
include (realpath($_SERVER['DOCUMENT_ROOT']).DIRECTORY_SEPARATOR. 'application'.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'Config.php');
include (SITE_PATH . DS . 'application' . DS . 'core' . DS . 'Base.php');
require_once(SITE_PATH.DS.'libs'.DS.'Smarty'.DS.'libs'.DS.'Smarty.class.php');

// Загружаем router
$registry = new Registry;

$router = new Router($registry);
// записываем данные в реестр
$registry->set ('Router', $router);
// задаем путь до папки контроллеров.
$router->setPath (SITE_PATH . DS . 'application' . DS . 'controllers');
session_start();
// запускаем маршрутизатор
$router->start();
?>