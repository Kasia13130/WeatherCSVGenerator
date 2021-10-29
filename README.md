# WeatherCSVGenerator

The program enables displying synaptic information from https://danepubliczne.imgw.pl/ in the form of a table. 
It is posiible to download the displayed data in the form of a .csv file using the button located under the data table.

## Starting the program

The program is started with the index.php in url address.


## A description of the responsibilities of the classes

SynopticDataReader.php file is responsible for retrieving data from the https address in the form of json.

DataConverter.php file is responsible for converting data to an array.

CSVGenerator.php file is responsible for generating a .csv file with synoptic data.

page.php file displays synoptic data and allows you to download them to a .csv file using the button at the end of the table.