<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25/07/2018
 * Time: 9:26 PM
 */


class Controller_Registration extends Controller {

     private $db_connect;
//     private $content = "reg_form_template.php";
//     private $template = "template_view.php";
     private $data;




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

                $user_model = new Model_Registration($_POST["first_name"]." ".$_POST["last_name"],
                    $_POST["email"], password_hash($_POST['password'],PASSWORD_BCRYPT),
                    $_POST["gender"],$_POST["birthdate"]);

                ##todo
                ##1.проверка пользователя на уникальность(email) (на сервере) +
                ##2.проверка email на корректность (на клиенте)
                ##3.проверка на пароля на длину (на клиенте)
                ##проверка остальных  полей на длину
                print("ACTION_REGISTER");

                $db_connect = new DB_Connect();
                try{
                    $this->db_connect = $db_connect->get_connect();
                }
                catch (Exception $e){
                    print($e);
                }


                if ($this->clean_email(array_slice($user_model->get_data(),1,1)))
                {
                    try{
                        $this->save_to_db($user_model);
                        header("Location: http://localhost:8000/login.php");
                    }
                    catch (Exception $e){
                        print($e);
                    }
                }
                else{
                   # throw new Exception("User is already exists");
                   ;
                    $this->general_action("Пользователь с таким email уже существует");

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
        $types = "";
        foreach($user->get_data() as $value){
            if (is_string($value)) $types .= "s";
            else if(is_int($value)) $types .= "i";
        }
        if (!$this->querymaker($query,$types,$user->get_data())){
            die("SOMETHING IS WRONG WITH QUERY");
        }
        $this->db_connect->close();
    }

    function clean_email($arr_data){
        $errors = array();
        $query = "SELECT id FROM `user_test` WHERE email = (?)";
        return $this->querymaker($query,"s",$arr_data);

    }
    private function querymaker($query,$types,$data){
        $mysqli = $this->db_connect;
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
