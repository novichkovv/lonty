<?php
//error_reporting (E_ALL);
error_reporting(E_ALL ^ E_NOTICE);
include ('/application/core/config.php');
include (SITE_PATH . DS . 'application' . DS . 'core' . DS . 'base.php');

// Загружаем router
$registry = new Registry;

$router = new Router($registry);
// записываем данные в реестр
$registry->set ('Router', $router);
// задаем путь до папки контроллеров.
$router->setPath (SITE_PATH . DS . 'application' . DS . 'controllers');
// запускаем маршрутизатор
$router->start();
?>