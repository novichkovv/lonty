<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 23.02.15
 * Time: 15:51
 */
session_start();
if(isset($_POST['login_btn']))
{
    if($_POST['login'] == 'admin' && md5($_POST['password'] == '206518b8d350b0104e3ec9c3ae3ad14c'))
    {
        $_SESSION['login'] = 'admin';
    }
    header('Location: unsubscribers_list.php');
}