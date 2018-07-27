<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 27/07/2018
 * Time: 3:10 PM
 */

class Model_User extends Model {

    private $user_data;


    function __construct($email=null, $password=null, $gender=null, $birthdate=null, $full_name=null){

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

    public function is_user_exist($take_this_field = "*",$clause="email",$clause_value=null){

        $f = sprintf("%s",$take_this_field);
        $c = sprintf("%s = '%s'",$clause,$clause_value == null ? $this->user_data["email"] : $clause_value);
        $query_format = sprintf("SELECT  %s FROM `user_test` WHERE %s",$f,$c);

        return  (new DB_Operations())->query_executor($query_format);

    }



    public function save_to_db(){
        $field_value = $this->pre_maker($this->user_data);
        $query_format = sprintf("INSERT INTO user_test(%s) VALUES(%s)",$field_value[0],
        $field_value[1]);
        print($query_format);

        if (!(new DB_Operations())->query_executor($query_format)){
            die("SOMETHING IS WRONG WITH QUERY");
        }
        return True;
    }

    private function pre_maker($user){
        $fields = "";
        $data = "";
        foreach($user as $field => $value){
            $fields .= $field.",";
            $data .= "'".$value."',";
        }
        return [rtrim($fields,",")."", rtrim($data,",").""];

    }

    public function get_data(){
        return $this->user_data;
    }


}