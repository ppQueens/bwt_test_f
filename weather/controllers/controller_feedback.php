<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 27/07/2018
 * Time: 1:29 AM
 */

require_once (__DIR__."/../models/model_feed.php");

class Controller_Feedback extends Controller {


    function __construct($content = "feedback_template.php")
    {   Controller::__construct($content, "template_view.php");

    }


    function action_index()
    {
        Controller::action_index();
    }



    public function action_leave_feedback(){
        print("EEFEFK");
        if(isset($_POST["email"]) and isset($_POST["feedback"])) {
            print("EFEF");
            $feedback = new Model_Feed($_POST["email"],$_POST["feedback"],
                (new DateTime())->setTimezone(new DateTimeZone("Europe/Kiev")));;


            if ($feedback and $id = $feedback->is_user_exist()) {
                $feedback->save_to_db("feedback_test",$id);
                print("HEREF");
            }
            return false;
        }
    }

    public function action_show_feeds(){
        if ($data = Controller_Login::is_logged()){
            $content  = new Controller_Feedback("all_feed_template.php");


            $query = "SELECT `email`, `text`, `time` FROM feedback_test
                    INNER JOIN user_test ON feedback_test.author = user_test.id";
            $all_feeds = (new DB_Operations())->query_executor($query);
            $data["feeds"]=$all_feeds;
            $content->view->generate($data);

        }
        else{
            return false;
        }


}

}

