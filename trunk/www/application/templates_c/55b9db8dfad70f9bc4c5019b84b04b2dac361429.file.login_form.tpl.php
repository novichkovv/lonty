<?php /* Smarty version Smarty-3.1.19, created on 2014-08-22 18:48:50
         compiled from "Z:\home\lonty.sru\www\application\templates\admin\login_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2240653f74a7b425378-45729032%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55b9db8dfad70f9bc4c5019b84b04b2dac361429' => 
    array (
      0 => 'Z:\\home\\lonty.sru\\www\\application\\templates\\admin\\login_form.tpl',
      1 => 1408718925,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2240653f74a7b425378-45729032',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53f74a7b435366_30187689',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f74a7b435366_30187689')) {function content_53f74a7b435366_30187689($_smarty_tpl) {?><form method="post" action="../../admin/registrate/">
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
