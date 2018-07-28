<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 28/07/2018
 *
 * Time: 2:51 AM
 */


class Model_Feed extends Model {
    private $text;
    private $datetime;


    function __construct($author_email, $text, $datetime)
    {
        $this->user = new Model_User($author_email);
        $this->text = $text;
        $this->datetime = $datetime;
    }

    public  function get_data(){

    }

    public function is_user_exist(){
        return $this->user->is_user_exist("id");
    }

    public function save_to_db(){
        $query = sprintf("SELECT id FROM feedback_test WHERE email=%s",$this->user["email"]);
        $id_value = (new DB_Operations())->query_executor($query);
        Model::save_to_db("feedback_test",array("id" => $id_value["id"]));
    }







}