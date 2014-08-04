<?php
define ('DS', DIRECTORY_SEPARATOR); // разделитель для путей к файлам
$sitePath = realpath($_SERVER['DOCUMENT_ROOT'] . DS);
define ('SITE_PATH', $sitePath); // путь к корневой папке сайта
define ('SITE_DIR', str_replace('www.','http://',$_SERVER['HTTP_HOST']).'/');

// для подключения к бд
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_HOST', 'localhost');
?>
