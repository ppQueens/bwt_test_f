<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25/07/2018
 * Time: 9:26 PM
 */


class Controller_Index extends Controller {

    function __construct()
    {
        $this->content = "log_form_template.php";
        $this->template = "template_view.php";
    }
//    function action_index()
//    {
//        $this->view->generate("views/main_nav_template.php","views/template_view.php");
//    }


}
