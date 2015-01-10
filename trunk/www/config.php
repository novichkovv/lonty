<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 10.12.14
 * Time: 20:36
 */

define ('DS', DIRECTORY_SEPARATOR);
define('ROOT_DIR', realpath($_SERVER['DOCUMENT_ROOT']) . DS . 'godaddy' . DS);
define ('SITE_DIR', 'http://' . ( $_SERVER['HTTP_HOST'] ? $_SERVER['HTTP_HOST'] : 'godaddy') . '/godaddy/');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'detox');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');