<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 27/07/2018
 * Time: 3:10 PM
 */

class Model_User extends Model {

    private $user_data;


    function __construct($email, $password, $gender=null, $birthdate=null, $full_name=null){

        if($gender){
            $this->user_data["full_name"] = $full_name;
        }
        $this->user_data["email"] = $email;
        $this->user_data["password"] = $password;
        if($gender){
            $this->user_data["gender"] = $gender;
        }
        if ($birthdate){
            $this->user_data["birthdate"] = $birthdate;
        }
    }

    public function is_user_exist(){
        $result = $this->pre_maker(array("email" => $this->user_data["email"]));
        print_r($result[2]);
        $query = "SELECT id FROM `user_test` WHERE email = (?)";
        return  (new DB_Operations())->query_executor($query,$result[0],$result[2]);

    }

    public function save_to_db(){

        $result = $this->pre_maker($this->user_data);
        $values_mask = rtrim(str_repeat("?,",count($result[2])),', ');

        $query = "INSERT INTO user_test($result[1]) VALUES($values_mask)";
        if (!(new DB_Operations())->query_executor($query,$result[0],$result[2])){
            die("SOMETHING IS WRONG WITH QUERY");
        }
        (new DB_Operations());
    }

    private function pre_maker($user){
        $fields = "";
        $types = "";
        $data = array();
        foreach($user as $field => $value){
            $fields .= $field.",";
            array_push($data, strtolower($value));
            if (is_string($value)) $types .= "s";
            else if(is_int($value)) $types .= "i";

        }
        print($fields);
        return [$types, rtrim($fields,",")."", $data];

    }

    public function get_data(){
        return $this->user_data;
    }


}