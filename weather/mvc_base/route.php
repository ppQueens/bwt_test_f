<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 26/07/2018
 * Time: 10:15 AM
 */

class Route{
    static function check_file_exists($file){
        if (file_exists($file)) return True;
        #print($file);
        return False;
}
    static function start(){
        $controller_name = "index";
        $action_name = "index";

        $routes = explode("/",$_SERVER["REQUEST_URI"]);

        if(!empty($routes[1])){
            $controller_name = $routes[1];
        }

        if(!empty($routes[2])){
            $action_name = $routes[2];
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $action_name = $_POST["post"];
        }
        #$model_name = "model_".$controller_name;
        $controller_name = "controller_".$controller_name;
        $action_name = "action_".$action_name;

        print_r($routes);
        if($routes[1] == "exit.php"){
            $controller_name = "controller_login.php";
            $action_name = "action_exit";
        }

        if($routes[1] == "feedback.php" and $routes[2] == "show_feeds") {
                $action_name = "action_show_feeds";

        }
        #$model_file = strtolower($model_name);
        #$model_path = "weather/models/".$model_file;


        #(Route::check_file_exists($model_path) and include($model_path)) or die("File ".$model_file." does not exists!");
        #(Route::check_file_exists($model_path) and include($model_path)) or die("File ".$model_file." does not exists!");

        $controller_file = strtolower($controller_name);
        $controller_path = "weather/controllers/".$controller_file;

        (Route::check_file_exists($controller_path) and require_once($controller_path)) or
        (die($controller_path));
//        (die("File ".$controller_name." does not exists!"));


        $class_name = explode(".",$controller_name)[0];
        #$action_name = explode(".", $action_name)[0];

        $controller = new $class_name();
        $action = $action_name;
        print($action);
        if(method_exists($controller,$action)){
            try{
                $controller->$action();
            }
            catch (Exception $e){
                print($e);
            }

           # print("OK");
        }
        else{
            Route::ErrorPage404();
            print("ERROR404");
        }
     }

    static function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'page404');
    }
}