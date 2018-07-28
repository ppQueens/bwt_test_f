<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 27/07/2018
 * Time: 1:29 AM
 */


class Controller_Feedback extends Controller {

    private $feed_content;

    function __construct()
    {   Controller::__construct();

        $this->content = "feedback_template.php";
        $this->template = "template_view.php";

    }

    public function add_feed_content($author_email, $text){
        $this->feed_content = new Model_Feed($author_email,$text,new DateTime());
    }

    function action_index()
    {
        Controller::action_index();
    }



    public function leave_feedback(){
        if($this->feed_content and $this->feed_content->is_user_exist()){
            $this->feed_content->save_to_db();

        }
        return false;
    }
}

