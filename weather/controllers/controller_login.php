<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 27/07/2018
 * Time: 1:08 AM
 */

class Controller_Login extends Controller {


    function __construct()
    {
        $this->content = "log_form_template.php";
        $this->template = "template_view.php";
    }


//    function action_index()
//    {
//        $this->view->generate("log_form_template.php","template_view.php");
//    }
}
