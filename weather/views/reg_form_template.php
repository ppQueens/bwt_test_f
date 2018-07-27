
<form class="form-horizontal" action="registration.php/register" method="POST">
    <fieldset>
        <legend>Регистрация нового пользователя</legend>
        <div class="form-group">
            <label for="inputFirstName" class="col-lg-2 control-label">Имя <upper>*</upper></label>
            <div class="col-lg-10">
                <input class="form-control" name="first_name" id="inputFirstName" placeholder="Имя" type="text" required="true">
                <div class="alert-danger"><b><?php if($data){
                        print($data);} ?></b></div>
            </div>

        </div>

        <div class="form-group">
            <label for="inputSureName" class="col-lg-2 control-label">Фамилия <upper>*</upper></label>
            <div class="col-lg-10">
                <input class="form-control" name="last_name" id="inputSureName" placeholder="Фамилия" type="text" required="true">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Email <upper>*</upper></label>
            <div class="col-lg-10">
                <input class="form-control" name="email" id="inputEmail" placeholder="Email" type="text" required="true">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Пол</label>
            <div class="col-lg-10">
                <div class="radio">
                    <label>
                        <input name="gender" id="optionsRadios1" value="1" checked="" type="radio">
                        Женский
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input name="gender" id="optionsRadios2" value="0" type="radio">
                        Мужской
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="inputDate" class="col-lg-2 control-label">Дата рождения</label>
            <div class="col-lg-10">
                <input class="form-control" name="birthdate" id="inputDate" placeholder="date" type="date">

            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-lg-2 control-label">Пароль <upper>*</upper></label>
            <div class="col-lg-10">
                <input class="form-control" name="password" id="inputPassword" placeholder="Password" type="password" required="true">

            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">

                <button type="submit" class="btn btn-primary">Регистрация</button>
                <button type="reset" class="btn btn-default">Отмена (на главную)</button>
            </div>
        </div>
    </fieldset>
</form>