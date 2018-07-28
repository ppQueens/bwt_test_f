<form class="form-horizontal" action="/feedback.php" method="POST">
    <fieldset>
        <legend>Legend</legend>
        <?php
        if(!$data){
            include("html/user_feed_data.html");
        }
        else{
            echo '<input hidden id="inputEmail"  type="email" value="'.$data["email"].'">';
        }
        ?>
        <div class="form-group">
            <label for="textArea" class="col-lg-2 control-label">Отзыв</label>
            <div class="col-lg-10">
                <textarea class="form-control" rows="3" required maxlength="250" minlength="30" id="textArea"></textarea>
                <span class="help-block">Минимальное число знаков 30, максимальное - 250</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </div>
    </fieldset>
</form>