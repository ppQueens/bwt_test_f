
<div class="list-group">
    <a href="#" class="list-group-item active">
        Страницы
    </a>
    <?php
        if($data){
            echo '<a href="#" class="list-group-item">Все отзывы </a>';
        }
        else{
            echo '<a href="register.php" class="list-group-item">Форма регистрации</a>';
        }
        echo '<a href="/feed.php" class="list-group-item">Оставить отзыв</a>'
        ?>


    <a href="#" class="list-group-item">Погода
    </a>
</div>
