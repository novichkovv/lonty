<?php
Class Router
{
    private $registry;
    private $path;
    private $args = array();

    // �������� ���������
    function __construct($registry) {
        $this->registry = $registry;
    }

    // ������ ���� �� ����� � �������������
    function setPath($path) {
        $path = trim($path, '/\\');
        $path .= DS;
        // ���� ���� �� ����������, ������������� �� ����
        if (is_dir($path) == false) {
            throw new Exception ('Invalid controller path: `' . $path . '`');
        }
        $this->path = $path;
    }

    // ����������� ����������� � ������ �� ����
    private function getController(&$file, &$controller, &$action, &$args) {
        $route = (empty($_GET['route'])) ? '' : $_GET['route'];
        unset($_GET['route']);
        if (empty($route)) {
            $route = 'index';
        }
        // �������� ����� ����
        $route = trim($route, '/\\');
        $parts = explode('/', $route);

        // ������� ����������
        $cmd_path = $this->path;
        foreach ($parts as $part) {
            $fullpath = $cmd_path . $part;
            // �������� ������������� �����
            if (is_dir($fullpath)) {
                $cmd_path .= $part . DS;
                array_shift($parts);
                continue;
            }

            // ������� ����
            if (is_file($fullpath . '.php')) {
                $controller = $part;
                array_shift($parts);
                break;
            }
        }

        // ���� ���� �� ������ ���������, �� ����������� ����������� index
        if (empty($controller)) {
            $controller = 'index';
        }

        // �������� �����
        $action = array_shift($parts);
        if (empty($action)) {
            $action = 'index';
        }
        $file = $cmd_path . $controller . '.php';
        $args = $parts;
    }

    function start() {
        // ����������� ����
        $this->getController($file, $controller, $action, $args);
        // �������� ������������� �����, ����� 404
        if (is_readable($file) == false) {
            die ('404 Not Found');
        }

        // ���������� ����
        include ($file);

        // ������ ��������� �����������
        $class = $controller.'_Controller';

        $controller = new $class($this->registry);
        $controller->view($action);
        // ���� ����� �� ���������� - 404
        if (is_callable(array($controller, $action)) == false) {
            die ('404 Not Found');
        }
        $controller->args=$args;
        // ��������� �����
        $controller->t->assign('get', $args);

        $controller->$action($args);
        $controller->t->assign('title',$controller->title);
        $controller->meta();
        $controller->style();
        $controller->scripts();
        $controller->t->display('template.tpl');
    }
}
?>
