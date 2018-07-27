<?php

if (PHP_SAPI == 'cli-server') {
    $file = __DIR__ . parse_url($_SERVER['REQUEST_URI'])['path'];
    #print(__DIR__);
    if (is_file($file)) return false;
}


if (preg_match('/\.php/', $_SERVER["REQUEST_URI"]))
{ require_once 'weather/run.php';}
else return "PHP";
?>