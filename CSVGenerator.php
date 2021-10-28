<?php

declare(strict_types = 1);

namespace WeatherApp;

require_once 'DataConverter.php';

// klasa generujaca plik csv

class CSVGenerator
{   
    public function generatingCSVFile(array $dataToCSV)   
    {

        $csvFile = "synoptic_data.csv";

        if (!file_exists($csvFile))
        {
            $headerParameters = ["id_stacji", "stacja", "data_pomiaru", "godzina_pomiaru", "temperatura", "predkosc_wiatru", "kierunek_wiatru", "wilgotnosc_wzgledna", "suma_opadu", "cisnienie"];
            $file = fopen($csvFile, "a+");
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            fputcsv($file, $headerParameters, $separator = ";");

            foreach ($dataToCSV as $weatherInfo)
            {
                fputcsv($file, array_values($weatherInfo), $separator = ";");
            }
            fclose($file);
        }
        header('Content-Encoding: UTF-8');
        header('Content-Type: text/csv; charset=utf-8');
        header("Content-Disposition: attachment; filename=".$csvFile);
        readfile($csvFile);
        exit();
    }
}