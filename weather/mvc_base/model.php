<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25/07/2018
 * Time: 8:41 PM
 */


class Model {

    protected $user;

    protected function get_data(){

    }



    protected function pre_maker($user){
        $fields = "";
        $data = "";
        foreach($user as $field => $value){
            $fields .= $field.",";
            $data .= "'".$value."',";
        }
        return [rtrim($fields,",")."", rtrim($data,",").""];

    }


    protected function save_to_db($table = "user_test", $field_value = "user property"){
        $field_value = $this->pre_maker($field_value == "user property" ? $this->user : $field_value);
        $query_format = sprintf("INSERT INTO  `%s`(%s) VALUES(%s)",$table, $field_value[0],
            $field_value[1]);
        print($query_format);

        if (!(new DB_Operations())->query_executor($query_format)){
            die("SOMETHING IS WRONG WITH QUERY");
        }
        return True;
    }

}