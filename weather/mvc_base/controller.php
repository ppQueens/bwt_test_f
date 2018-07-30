<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25/07/2018
 * Time: 8:44 PM
 */


class Controller {

    public $model;
    public $view;
    public $content;
    public $template;
    public static $data;

    public function __construct($content, $template)
    {
        $this->view = new View($content, $template);

        //        $this->content = ;
//        $this->template = "template_view.php";
    }

    public function action_index()
    {
        $this->view->generate(Controller_Login::is_logged());

    }

    public function general_action($data = null){
        if(!$data){
            self::$data = $data;
        }
        $this->view->generate($data);
    }


}