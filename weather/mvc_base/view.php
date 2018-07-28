<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25/07/2018
 * Time: 8:42 PM
 */


class View {

    private $template;
    public $content;

    function __construct($content, $template)
    {
        $this->content = $content;
        $this->template = $template;
    }

    function generate($data = null){
        include 'weather/views/'.$this->template;
    }



}