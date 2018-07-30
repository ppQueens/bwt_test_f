<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 26/07/2018
 * Time: 11:21 PM
 */


final class UserFactory
{
    private static $instance;
    /**
     * Call this method to get singleton
     *
     * @return UserFactory
     */


    /**
     * Private ctor so nobody else can instantiate it
     *
     */
    public static function get_instance(){
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    private function __construct()
    {

    }

}

$obj1 = UserFactory::get_instance();
$obe2 = UserFactory::get_instance();

print($obj1 === $obe2);