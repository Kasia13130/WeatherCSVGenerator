<?php

declare(strict_types = 1);

namespace WeatherApp;

session_start();

require_once 'SynopticDataReader.php';
require_once 'CSVGenerator.php';

class DataConverter
{    
    public static function jsonToArray(string $json): array
    {
        return json_decode($json, true);
    }
}

?>
