<?php
function __autoload($className)
{
    $filename = strtolower($className) . '.php';
    // ���������� ����� � ������� ��� ���� ����
    $expArr = explode('_', $className);
    if((empty($expArr[1]) OR $expArr[0]== 'Controller') && $filename != 'smarty.php' )
    {
        $folder = 'core';
    }
    else
    {
    	if(isset($expArr[1]))
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

    if($filename == 'smarty.php')
    {
        $file = 'libs' .DS. 'Smarty' .DS. 'libs' .DS. 'Smarty.class.php';
    }

    // ��������� ������� �����
    if (file_exists($file) == false) {
        return false;
    }
    // ���������� ���� � �������
    include ($file);
}
?>