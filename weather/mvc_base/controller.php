<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25/07/2018
 * Time: 8:44 PM
 */

require_once (__DIR__."/../controllers/controller_login.php");
class Controller {

    public $model;
    public $view;
    public $content;
    public $template;
    public static $data;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action_index()
    {
        $this->view->generate($this->content,$this->template,Controller_Login::is_logged());

    }

    public function general_action($data = null){
        if(!$data){
            self::$data = $data;
        }
        $this->view->generate($this->content,$this->template, $data);
    }


}