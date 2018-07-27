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


    public function __construct()
    {
        $this->view = new View();
    }

    public function action_index(){
        $this->view->generate($this->content,$this->template);
    }

    public function general_action($data = null){
        $this->view->generate($this->content,$this->template, $data);
}
}