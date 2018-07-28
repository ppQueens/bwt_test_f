<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 27/07/2018
 * Time: 1:25 AM
 */

require 'vendor/autoload.php';
use PHPHtmlParser\Dom;
use GuzzleHttp\Client;

class Controller_Weather extends Controller {

    function __construct()
    {
        Controller::__construct("weather_template.php","template_view.php");


    }


    function action_index()
    {
        Controller::action_index();
    }



    public function action_weather_today(){
        error_reporting(E_ALL & ~E_WARNING);
        if($data = (new Controller_Login())::is_logged()){


            $client = new Client(['base_uri' => 'https://www.gismeteo.ua/']);
            $headers = ["Accept" => "text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
                "Accepting-Encoding" => "gzip, deflate, br",
                "Accepting-Language" => "ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3",
                "Host"=>"www.gismeteo.ua",
                "User-Agent"=> "Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0"];
            $response = $client->request('GET', 'weather-zaporizhia-5093',["headers" => $headers]);
            #print($response);
            $dom = new Dom();
            $dom->load($response->getBody()->getContents());
            $weather_short = $dom->find("#tab_wdaily1");
            $weather_detail = $dom->find(".wsection");
            $data["weather_short"]  = $weather_short;
            $data["weather_detail"]  = $weather_detail;
            $this->view->generate($data);
            #this->action_index();
        }
    }
}
