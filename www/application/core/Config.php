<?php
define ('DS', DIRECTORY_SEPARATOR); // ����������� ��� ����� � ������
$sitePath = realpath($_SERVER['DOCUMENT_ROOT'] . DS);
define ('SITE_PATH', $sitePath); // ���� � �������� ����� �����
define ('SITE_DIR', str_replace('www.','http://',$_SERVER['HTTP_HOST']).'/');

// ��� ����������� � ��
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_HOST', 'localhost');
?>
