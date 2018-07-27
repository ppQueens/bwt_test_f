<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 27/07/2018
 * Time: 1:08 AM
 */

class Controller_Login extends Controller {
    function action_index()
    {
        $this->view->generate("views/log_form_template.php","views/template_view.php");
    }
}
