<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 28/07/2018
 *
 * Time: 2:51 AM
 */


class Model_Feed extends Model {
    private $author_email;
    private $text;
    private $time;


    function __construct($author_email, $text, $datetime)
    {
        $this->author_email = $author_email;
        $this->text = $text;
        $this->time = $datetime;
    }

    public function get_data(){
        Model::get_data();
    }

    public function is_user_exist(){
        return (new Model_User())->is_user_exist("id","email",$this->author_email);
    }

    public function save_to_db($table = "feedback_test", $field_value = "user property"){

       return Model::save_to_db("feedback_test",array("author"=>$field_value["id"],"text"=>$this->text,
            'time'=> $this->time->format('Y-m-d H:i')));
    }







}