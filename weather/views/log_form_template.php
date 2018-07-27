
<form class="form-horizontal" action="login.php/login" method="POST">
    <fieldset>
        <legend>Войти как зарегистрированный пользватель</legend>
        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Почта</label>
            <div class="col-lg-10">
                <input class="form-control" name="email" id="inputEmail" placeholder="Ваша почта" type="email">
            </div>
        </div>

        <div class="form-group">
            <label for="inputePassword" class="col-lg-2 control-label">Пароль</label>
            <div class="col-lg-10">
                <input class="form-control" name="password" id="inputePassword" placeholder="Ваш пароль" type="password">
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">

                <button type="submit" class="btn btn-primary">Войти</button>
<!--                <button type="reset" class="btn btn-default">Отмена (на главную)</button>-->
            </div>
        </div>
    </fieldset>
</form>