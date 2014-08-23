<form method="post" action="" >

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
{literal}
    <script type="text/javascript">

                fields = {

            "login":[
                "require",{"max":"10"},{"min":"3"},{"preg":["engInt" ,]},],
            "password":[
                {"max":"20"},{"min":"6"},"password",],
            "site":[
                {"max":"30"},{"min":"5"},{"preg":["url" ,]},],};
    </script>
{/literal}