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


    function __construct()
    {
        $this->view = new View();
    }

    function action_index(){

    }
}