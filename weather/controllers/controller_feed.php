<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 27/07/2018
 * Time: 1:29 AM
 */

class Controller_Feed extends Controller {
    function action_index()
    {
        $this->view->generate("views/feed_template.php","views/template_view.php");
    }
}


##todo
##валадация (клиент_сервер) форм - регистрации, логина, фида, капча
##сессии
###
###порсер
###
###