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


    public function query_executor($query, $types, $data){

        $prep_stmt = $this->get_connect()->prepare($query);
        if(!$prep_stmt){
            print("SOMETHING IS WRONG WITH query_executor");
            #return $prep_stmt;
        }
        $prep_stmt->bind_param($types,...$data);
        $res = $prep_stmt->execute();
        $prep_stmt->store_result();
        $num_rows = $prep_stmt->num_rows();
        $prep_stmt->close();
        return $num_rows >= 1 ? null : $res;
    }

}