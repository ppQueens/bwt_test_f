<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25/07/2018
 * Time: 9:26 PM
 */


class Controller_Index extends Controller {
    function action_index()
    {
        $this->view->generate("views/main_nav_template.php","views/template_view.php");
    }
}
