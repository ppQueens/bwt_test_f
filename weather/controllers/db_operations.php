<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 26/07/2018
 * Time: 6:58 PM
 */

require_once("config.ini.php");
class DB_Operations{
    private $USER = USERNAME;
    private $PASS = PASSWORD;
    private $DB = DATABASE;
    private $HOST = HOST;

    private $DB_CONNECT = null;

    function __construct()
    {
        $this->get_connect();
     //   $this->USER = $user;
       // $this->PASS = $pass;
       // $this->DB = $db_name;
       // $this->HOST = $host;
    }

    function  get_connect(){
        if (!$this->DB_CONNECT){
            if ($this->USER and $this->PASS and $this->DB and $this->HOST){

                $this->DB_CONNECT = mysqli_connect($this->HOST,
                        $this->USER,$this->PASS,$this->DB,"3306");
                }
            else{
                throw new Exception("At least one of required params for db connection is missed!");
            }

        }
        return $this->DB_CONNECT;

    }
    function __destruct()
    {
        $this->get_connect()->close();
        // TODO: Implement __destruct() method.
    }

    public function query_executor($query){
        $res = $this->get_connect()->query($query);
        if ($res === null or $res === true){
            return true;
        }
        return $res->fetch_assoc();

    }







}