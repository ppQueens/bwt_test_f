<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25/07/2018
 * Time: 9:26 PM
 */

require_once ("weather/models/model_user.php");
class Controller_Registration extends Controller {

     private $db_connect;
//     private $content = "reg_form_template.php";
//     private $template = "template_view.php";
     #atic private $data;




    function __construct()
    {
        Controller::__construct();
        $this->content = "reg_form_template.php";
        $this->template = "template_view.php";
    }


//    function action_index()
//    {
//        $this->view->generate($this->content,$this->template,$this->data);
//    }


    function action_register(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            ###########################################print
            #print_r($_POST);
            if(!empty($_POST["first_name"]) and !empty($_POST['last_name']) and !empty($_POST['password'])
            and !empty($_POST["email"])){

                $user_model = new Model_User($_POST["email"], password_hash($_POST['password'],PASSWORD_BCRYPT),
                    $_POST["gender"],$_POST["birthdate"],$_POST["first_name"]." ".$_POST["last_name"]);

                ##todo
                ##1.проверка пользователя на уникальность(email) (на сервере) +
                ##2.проверка email на корректность (на клиенте)
                ##3.проверка на пароля на длину (на клиенте)
                ##проверка остальных  полей на длину
                print("ACTION_REGISTER");

                try{
                    $this->db_connect = (new DB_Operations())->get_connect();
                }
                catch (Exception $e){
                    print($e);
                }

                #is_user_exists()&
                if ($user_model->is_user_exist())
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
