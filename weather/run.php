<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 26/07/2018
 * Time: 9:29 AM
 */
require_once "autoloader.php";
require 'vendor/autoload.php';

new Auto_Loader(__DIR__."/mvc_base/");
new Auto_Loader(__DIR__."/models/");
new Auto_Loader(__DIR__."/controllers/");

Route::start();