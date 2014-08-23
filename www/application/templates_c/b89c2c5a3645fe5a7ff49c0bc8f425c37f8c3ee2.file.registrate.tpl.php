<?php /* Smarty version Smarty-3.1.19, created on 2014-08-22 17:37:44
         compiled from "Z:\home\lonty.sru\www\application\templates\admin\registrate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:502953f745687eeb30-85211724%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b89c2c5a3645fe5a7ff49c0bc8f425c37f8c3ee2' => 
    array (
      0 => 'Z:\\home\\lonty.sru\\www\\application\\templates\\admin\\registrate.tpl',
      1 => 1408714656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '502953f745687eeb30-85211724',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53f74568cd0155_46885372',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f74568cd0155_46885372')) {function content_53f74568cd0155_46885372($_smarty_tpl) {?><form method="post" action="" >

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
