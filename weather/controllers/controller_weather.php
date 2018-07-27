<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 27/07/2018
 * Time: 1:25 AM
 */

class Controller_Weather extends Controller {
    function action_index()
    {
        $this->view->generate("views/weather_template.php","views/template_view.php");
    }
}
