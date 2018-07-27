<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25/07/2018
 * Time: 8:42 PM
 */


class View {

    function generate($content, $template, $data = null){
        include 'weather/views/'.$template;
        #include 'weather/views/'.$content;
    }
}