<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25/07/2018
 * Time: 9:26 PM
 */


class Controller_Registration extends Controller {

     private static $db_connect;
     private $content = "reg_form_template.php";
     private $template = "template_view.php";
     private $data;



//    function __construct($some_data=null)
//    {
//        $this->data = $some_data;
//    }


    function action_index()
    {
        $this->view->generate($this->content,$this->template,$this->data);
    }


    function action_register(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            ###########################################print
            print_r($_POST);
            if(!empty($_POST["first_name"]) and !empty($_POST['last_name']) and !empty($_POST['password'])
            and !empty($_POST["email"]) and !empty($_POST["birthdate"])){

                $user_model = new Model_Registration($_POST["first_name"]." ".$_POST["last_name"],
                    $_POST["email"], password_hash($_POST['password'],PASSWORD_BCRYPT),
                    $_POST["gender"],$_POST["birthdate"]);

                ##todo
                ##1.проверка пользователя на уникальность(email) (на сервере)
                ##2.проверка email на корректность (на клиенте)
                ##3.проверка на пароля на длину (на клиенте)
                print("ACTION_REGISTER");
                ####################################проверка на существующую почту

                $db_connect = new DB_Connect();
                try{
                    self::$db_connect = $db_connect->get_connect();
                }
                catch (Exception $e){
                    print($e);
                }


                if ($this->clean_email(array_slice($user_model->get_data(),1,1)))
                {
                    try{
                        $this->save_to_db($user_model);
                    }
                    catch (Exception $e){
                        print($e);
                    }
                }
                else{
                   # throw new Exception("User is already exists");
                    $this->data = "Пользователь с таким email уже существует";
                   # print(self::$data);

                        global $file;
                        $file = __DIR__ . parse_url($_SERVER['REQUEST_URI'])['path'];
                        #print($file);
                        if (is_file($file)) return false;

                    $this->action_index($this->content,$this->template);
//                    header("Location: /registration.php");
                }


            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET"){
            PRINT("SOMETHING IS WRONG. THE METHOD IS GET");
        }
    }


    function save_to_db($user){

        $query = "INSERT INTO user_test(full_name, email, password, gender, birthdate) VALUES(?, ?, ?, ?, ?)";

       #########
        if (!$this->querymaker($query,"sssis",$user->get_data())){
            die("SOMETHING IS WRONG WITH QUERY");
        }
        self::$db_connect->close();
    }

    function clean_email($arr_data){
        $errors = array();
        $query = "SELECT id FROM `user_test` WHERE email = (?)";
        return $this->querymaker($query,"s",$arr_data);

    }
    private function querymaker($query,$types,$data){
        $mysqli = self::$db_connect;
        $prep_stmt = $mysqli->prepare($query);
        print_r($data);
        $prep_stmt->bind_param($types,...$data);
        $res = $prep_stmt->execute();
        $prep_stmt->store_result();
        $num_rows = $prep_stmt->num_rows();
        print("<<<<<<<".$num_rows.">>>>>>>>>>");
        $prep_stmt->close();
        return $num_rows >= 1 ? null : $res;
    }
}
