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
        session_start();
        if(($data = Controller_Login::is_logged() or  ($user_pass =(new Model_User($_POST["email"]))->is_user_exist("password"))
            and isset($_POST["feedback"]) and $user_pass["password"] == hash("sha256",$_POST["password"]))) {
            print("isede");
            if ($_SESSION['randomnr2'] == md5($_POST['notrobot'])){


            $feedback = new Model_Feed($_POST["email"],$_POST["feedback"],
                (new DateTime())->setTimezone(new DateTimeZone("Europe/Kiev")));

                if ($feedback and $id = $feedback->is_user_exist()) {
                        #$this->view->generate($data);

                    $feedback->save_to_db("feedback_test",$id);
                    if($data){
                        header("Location: /feedback.php/show_feeds");
                    }{
                        header("Location: /index.php");
                    }


                }
            }
            else {

                $this->view->generate($data,"Неправильное значение капчи");
            }
        }
        return false;

    }

    public function action_show_feeds(){
        if ($data = Controller_Login::is_logged()){
            $content  = new Controller_Feedback("all_feed_template.php");


            $query = "SELECT `email`, `text`, `time` FROM feedback_test
                    INNER JOIN user_test ON feedback_test.author = user_test.id";
            $all_feeds = Db_connection::instance()->query_executor($query);
            $data["feeds"]=$all_feeds;
            $content->view->generate($data);
            return True;

        }
         return false;


    }

}
