<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 26/07/2018
 * Time: 11:21 PM
 */

require 'vendor/autoload.php';
use GuzzleHttp\Client;


$client = new Client(['base_uri' => 'https://www.gismeteo.ua/']);


$headers = ["Accept" => "text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
            "Accepting-Encoding" => "gzip, deflate, br",
            "Accepting-Language" => "ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3",
            "Host"=>"www.gismeteo.ua",
            "User-Agent"=> "Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0"];
$response = $client->request('GET', 'weather-zaporizhia-5093',["headers" => $headers]);