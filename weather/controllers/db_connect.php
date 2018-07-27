<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 26/07/2018
 * Time: 6:58 PM
 */

require_once("config.ini.php");
class DB_Connect{
    private $USER = USERNAME;
    private $PASS = PASSWORD;
    private $DB = DATABASE;
    private $HOST = HOST;
    private $DB_CONNECT;

    function __construct()
    {
     //   $this->USER = $user;
       // $this->PASS = $pass;
       // $this->DB = $db_name;
       // $this->HOST = $host;
    }

    function get_connect(){

        if ($this->USER and $this->PASS and $this->DB and $this->HOST){
            if(!$this->DB_CONNECT){
                $this->DB_CONNECT = mysqli_connect($this->HOST,
                    $this->USER,$this->PASS,$this->DB,"3306");
            }
            return $this->DB_CONNECT;
        }
        else{
            throw new Exception("At least one of required params for db connection is missed!");
        }

    }
}