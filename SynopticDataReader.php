<?php

declare(strict_types = 1);

namespace WeatherApp;

require_once 'DataConverter.php';

// klasa pobierająca inforamcje pogodowe 
class SynopticDataReader
{
    public function getWeatherData(): string
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://danepubliczne.imgw.pl/api/data/synop',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;        
    }
}