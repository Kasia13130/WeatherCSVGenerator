<?php 

namespace WeatherApp;

require_once('SynopticDataReader.php');
require_once('DataConverter.php'); 
require_once('CSVGenerator.php');

$synopticDataReader = new SynopticDataReader();
$weatherData = $synopticDataReader->getWeatherData();
$weatherDataArray = DataConverter::jsonToArray($weatherData);

$csvGenerator = new CSVGenerator();

if (isset($_POST['download'])) 
{
  $csvGenerator->generatingCSVFile($weatherDataArray);
  unset($_POST['download']);
}

header("refresh: 3");
?>


<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Synoptic informations</title>
  </head>
  <body>
    
    <table class="table" >
    <thead>
        <tr>
        <th scope="col">id_stacji</th>
        <th scope="col">stacja</th>
        <th scope="col">data_pomiaru</th>
        <th scope="col">godzina_pomiaru</th>
        <th scope="col">temperatura</th>
        <th scope="col">predkosc_wiatru</th>
        <th scope="col">kierunek_wiatru</th>
        <th scope="col">wilgotnosc_wzgledna</th>
        <th scope="col">suma_opadu</th>
        <th scope="col">cisnienie</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($weatherDataArray as $row)
        {?>
            <tr>
            <?php foreach ($row as $key=>$value){ ?>
                <td><?php echo $value; ?></td>                
            <?php } ?>
            </tr>
    <?php } ?>
        <tr>        
    </tbody>
    </table>
    <form method="post">
        <input type="submit" name="download" value="downolad" />
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>