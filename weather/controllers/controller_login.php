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
        Controller::__construct();
        $this->content = "log_form_template.php";
        $this->template = "template_view.php";
    }


//    function action_index()
//    {
//        $this->view->generate("log_form_template.php","template_view.php");
//    }

    public function action_login(){
        if(isset($_POST["login"]) and isset($_POST["password"])){
            $login = $_POST["login"];
            $pass = $_POST["password"];

            $user = new Model_User($login, $pass);
            $user->is_exists();

        }
    }
}