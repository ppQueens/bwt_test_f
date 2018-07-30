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
        Controller::__construct("log_form_template.php","template_view.php");
    }


    function action_index()
    {
        if(self::is_logged()){
            header("Location: /index.php");
        }
        Controller::action_index();

    }

    public function action_login(){

        if(isset($_POST["email"]) and isset($_POST["password"])){
            $user = new Model_User($_POST["email"], $_POST["password"]);
            $user_row = $user->is_user_exist("full_name, password, hash");


            if($user_row and $user_row["password"] == hash("sha256",$user->get_data()["password"]))
            {
                $hash = hash("sha256", time());
                setcookie("name",$user_row["full_name"]);
                setcookie("hash", $hash, time()+60*60*24);


                $query = sprintf("UPDATE user_test SET hash='%s' WHERE email='%s'",
                    $hash,$user->get_data()["email"]);
                print($query);

                Db_connection::instance()->query_executor($query);

                header("Location: /index.php");
            }
            else{
                $this->general_action("Неправильный email или пароль!");
//                print($user_row["password"]);
//                print("         ");
//                print(password_hash(($this->user->get_data())["password"],PASSWORD_BCRYPT));

            }

        }
        else{
            print("CHECK \$_POST ARRAY");
        }
    }

    public static function is_logged()
    {
        if (isset($_COOKIE["hash"])) {
            $user_data = (new Model_User())->is_user_exist("full_name, email, hash","hash",
                $_COOKIE["hash"]);

            if($user_data["hash"] == $_COOKIE["hash"]){
                return array("user"=>$user_data);
            }
            else{
                setcookie("name","",time()-1,"/");
                setcookie("hash", "", time()-1,"/");
            }
        }
        return false;
    }

    public function action_exit(){
        setcookie("name","",time()-1,"/");
        setcookie("hash", "", time()-1,"/");
        $this->action_index();
    }
}