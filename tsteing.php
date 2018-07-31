<?php

require_once "weather/controllers/db_connection.php";
$d = Db_connection::instance();


$query = "SELECT * FROM user_test";
$res = $d->query_executor($query);
$d->close_connect();


