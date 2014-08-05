<?php
function my_autoloader($className)
{
    $filename = strtolower($className) . '.php';
    // ���������� ����� � ������� ��� ���� ����
    $expArr = explode('_', $className);
    if(empty($expArr[1]) OR $expArr[0] == 'Controller')
    {
        $folder = 'core';
    }
    else
    {    	if(isset($expArr[1]))
    	{
        	switch(strtolower($expArr[1]))
        	{
	            case 'controller':
	                $folder = 'controllers';
	                break;

	            case 'model':
	                $folder = 'models';
	                break;

                case 'ext':
                	$folder = 'extensions' . DS .$expArr[0];
                	break;

	            default:
	                $folder = 'core';
	                break;
            }
        }
    }


    // ���� �� ������
    $file = SITE_PATH . DS . 'application' . DS . $folder . DS . $filename;
    // ��������� ������� �����
    if (file_exists($file) == false) {
        return false;
    }
    // ���������� ���� � �������
    include ($file);
}
spl_autoload_register ('my_autoloader');
?>