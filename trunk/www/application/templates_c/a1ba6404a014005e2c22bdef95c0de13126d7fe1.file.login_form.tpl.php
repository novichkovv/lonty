<?php /* Smarty version Smarty-3.1.19, created on 2014-08-26 04:55:16
         compiled from "/home/u191001322/public_html/application/templates/admin/login_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:35263008453fc13349bd5e7-59700558%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1ba6404a014005e2c22bdef95c0de13126d7fe1' => 
    array (
      0 => '/home/u191001322/public_html/application/templates/admin/login_form.tpl',
      1 => 1408815978,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35263008453fc13349bd5e7-59700558',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53fc13349d6ea3_53093284',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fc13349d6ea3_53093284')) {function content_53fc13349d6ea3_53093284($_smarty_tpl) {?><form method="post" action="../../admin/registrate/">
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
