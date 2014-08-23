<?php /* Smarty version Smarty-3.1.19, created on 2014-08-23 20:42:00
         compiled from "Z:\home\lonty.sru\www\application\templates\admin\login_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2099553f8c458b33bd6-22885110%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55b9db8dfad70f9bc4c5019b84b04b2dac361429' => 
    array (
      0 => 'Z:\\home\\lonty.sru\\www\\application\\templates\\admin\\login_form.tpl',
      1 => 1408801578,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2099553f8c458b33bd6-22885110',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53f8c458b7c122_05023330',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f8c458b7c122_05023330')) {function content_53f8c458b7c122_05023330($_smarty_tpl) {?><form method="post" action="../../admin/registrate/">
<div class="login-form">
    <div class="form-header">
        Вход пользователя
    </div>
    <div class="form-body">
        <div class="formEl">
            <div class="label">
                Логин:
            </div>
            <input type="text" name="login" autocomplete="none">
        </div>
        <div class="formEl">
            <div class="label">
                Пароль
            </div>
            <input type="password" name="password">
        </div>
        <br />
        <div class="form-footer">
            <input type="submit" name="auth" value="Войти" class="btn">
        </div>
    </div>
</div>
</form><?php }} ?>
