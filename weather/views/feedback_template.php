
<form class="form-horizontal" action="/feedback.php" method="POST">
    <input hidden name="post" value="leave_feedback">
    <fieldset>
        <legend>Legend</legend>
        <?php
        if(!$data){
            include("html/user_feed_data.html");
        }
        else{
            print_r($data);
            echo '<input hidden type="email" name="email" value="'.$data["user"]["email"].'">';
        }
        ?>
        <div class="form-group">
            <label for="textArea" class="col-lg-2 control-label">Отзыв</label>
            <div class="col-lg-10">
                <textarea name="feedback" class="form-control" rows="3" required maxlength="250" minlength="30" id="textArea"></textarea>
                <span class="help-block">Минимальное число знаков 30, максимальное - 250</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <img src="captcha.php" />
                <input class="input" type="text" name="notrobot" />

                <button type="submit" class="btn btn-primary">Отправить</button>
                <div class="alert-danger"><?php if($message) {echo $message;}?></b></div>

            </div>
        </div>
    </fieldset>
</form>