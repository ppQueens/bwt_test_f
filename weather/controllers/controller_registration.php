<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25/07/2018
 * Time: 9:26 PM
 */


class Controller_Registration extends Controller {



    function __construct()
    {
        Controller::__construct("reg_form_template.php","template_view.php");
    }


    function action_index()
    {
        if (Controller_Login::is_logged()){
            header("Location: /index.php");
        }
        Controller::action_index();

    }


    public function action_register(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            ###########################################print
            #print_r($_POST);
            if(!empty($_POST["first_name"]) and !empty($_POST['last_name']) and !empty($_POST['password'])
            and !empty($_POST["email"])){

                $user_model = new Model_User($_POST["email"], hash("sha256",$_POST['password']),
                    $_POST["gender"],$_POST["birthdate"],$_POST["first_name"]." ".$_POST["last_name"]);

                ##todo
                ##1.проверка пользователя на уникальность(email) (на сервере) +
                ##2.проверка email на корректность (на клиенте)
                ##3.проверка на пароля на длину (на клиенте)
                ##проверка остальных  полей на длину



                if (!$user_model->is_user_exist())
                {
                    try{
                        $user_model->save_to_db();
                        print("<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>");
                        header("Location: /login.php");
                    }
                    catch (Exception $e){
                        print($e);
                    }
                }
                else{
                   #throw new Exception("User is already exists");
                    unset($_POST);
                   $this->general_action("Пользователь с таким email уже существует");

                }

            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET"){
            PRINT("SOMETHING IS WRONG. THE METHOD IS GET");
        }
    }



}
