<?php /* Smarty version Smarty-3.1.19, created on 2014-08-28 17:22:49
         compiled from "/home/u191001322/public_html/application/templates/admin/registrate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:72955666453ff6569b6ce29-37144726%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbfeec8aba6f227cfc4d465d4af52dbe800db595' => 
    array (
      0 => '/home/u191001322/public_html/application/templates/admin/registrate.tpl',
      1 => 1408815978,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72955666453ff6569b6ce29-37144726',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53ff6569bc71c6_55036868',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ff6569bc71c6_55036868')) {function content_53ff6569bc71c6_55036868($_smarty_tpl) {?><form method="post" action="" >

    <div class="formEl">
        <div class="formElLabel">
            Логин
        </div>
        <div class="formField">
            <input type="text" name="user[login]" value=""
                   id="login" class="input" />
            <div class="validIcon" id="validIcon_login">
            </div>
        </div>
        <div class="validWarning" id="validWarning_login">
        </div>
    </div>

    <div class="formEl">
        <div class="formElLabel">
            Пароль
        </div>
        <div class="formField">
            <input type="password" name="user[password]"
                   id="password" class="input" />
            <div class="validIcon" id="validIcon_password">
            </div>
        </div>
        <div class="validWarning" id="validWarning_password">
        </div>
    </div>
    <div class="formEl">
        <div class="formElLabel">
            Подтвердите Пароль
        </div>
        <div class="formField">
            <input type="password" name="user[confirm_password]"
                   id="confirm_password" class="input" />
            <div class="validIcon" id="validIcon_confirm_password">
            </div>
        </div>
        <div class="validWarning" id="validWarning_confirm_password">
        </div>
    </div>

    <input type="submit" name="user[submit]" value="Сохранить">

</form>

    <script type="text/javascript">

                fields = {

            "login":[
                "require",{"max":"10"},{"min":"3"},{"preg":["engInt" ,]},],
            "password":[
                {"max":"20"},{"min":"6"},"password",],
            "site":[
                {"max":"30"},{"min":"5"},{"preg":["url" ,]},],};
    </script>
<?php }} ?>
