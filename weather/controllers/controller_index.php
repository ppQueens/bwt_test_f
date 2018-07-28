<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25/07/2018
 * Time: 9:26 PM
 */


class Controller_Index extends Controller {

    function __construct()
    {   Controller::__construct("main_nav_template.php","template_view.php");
    }
    function action_index()
    {
        Controller::action_index();
    }

}
