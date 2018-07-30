<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 27/07/2018
 * Time: 3:10 PM
 */

class Model_User extends Model {


    function __construct($email=null, $password=null, $gender=null, $birthdate=null, $full_name=null){

        if($gender){
            $this->user["full_name"] = $full_name;
        }
        $this->user["email"] = $email;
        $this->user["password"] = $password;
        if($gender){
            $this->user["gender"] = $gender;
        }
        if ($birthdate){
            $this->user["birthdate"] = $birthdate;
        }
    }

    public function is_user_exist($take_this_field = "*",$clause="email",$clause_value=null){

        $f = sprintf("%s",$take_this_field);
        $c = sprintf("%s = '%s'",$clause,$clause_value == null ? $this->user["email"] : $clause_value);
        $query_format = sprintf("SELECT  %s FROM `user_test` WHERE %s",$f,$c);

        return  Db_connection::instance()->query_executor($query_format);

    }



    public function save_to_db($table = "user_test", $field_value = "user property"){
        Model::save_to_db($table,$field_value);
    }


    public function get_data(){
        return $this->user;
    }



}