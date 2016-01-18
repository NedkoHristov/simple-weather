<?php
// simple-weather is gathering weather information from http://www.openweathermap.org/
// Script repo - https://github.com/NedkoHristov/simple-weather
// Script demo - https://www.nedko.info/simple-weather/
echo "<h1>Simple weather script example</h1>";

echo "<h3>using <a href=http://openweathermap.org>OpenWeatherMap.org</a></h3><br>";

//Api key
//Api key is generated from here http://www.openweathermap.org/appid#get or if you don't want to register
//just go to http://www.openweathermap.org/current and copy the API key assigned under "Examples of API calls:"
$api = "appid=2de143494c0b295cca9337e1e96b00e0";

//City
$city="Varna";

//Country two digit ID
$country="BG";

//Units
$units ="metric";

//TODO - add multilanguage support
//Language
//$lang="en";

//Parameterized URL
$url="http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&units=".$units."&cnt=7&".$api."";

//Let's get some data :)
$json=file_get_contents($url);
$data=json_decode($json,true);

//Define sunraise & sunset converted from Unixtime to Timestamp using PHP date() function:
//Date format - F j, Y, g:i a (January 18, 2016, 7:35 am)
$sunrise = date("F j, Y, g:i a", $data['sys']['sunrise']);
$sunset = date("F j, Y, g:i a", $data['sys']['sunset']);

//Get current Temperature in Celsius
echo "Temp: <b>" . $data['main']['temp']."</b><br>";
//Get min temp
//Get weather condition
echo "Weather condition: <b>".$data['weather'][0]['main']."</b><br>";
//Get cloud percentage
echo "Cloud percentage: <b>".$data['clouds']['all']."</b><br>";
//Get wind speed in meter/sec
echo "Wind speed: <b>".$data['wind']['speed']."</b><br>";
//Get Humidity
echo "Humidity: <b>".$data['main']['humidity']."</b><br>";
//Additional information:

echo "<h3>Additional information:<br></h3>";

echo "Min temp: <b>" . $data['main']['temp_min']."</b><br>";
//Get max temp
echo "Max temp: <b>" . $data['main']['temp_max']."</b><br>";
//Get Sunrise
echo "Sunrise: <b>".$sunrise."</b><br>";
//Get Sunset
echo "Sunset: <b>".$sunset."</b><br>";
?>