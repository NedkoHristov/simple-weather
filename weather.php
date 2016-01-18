<?php
// simple-weather is gathering weather information from http://www.openweathermap.org/
// Script repo - https://github.com/NedkoHristov/simple-weather

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

//Language
$lang="en";

//Parameterized URL
$url="http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&".$units.".&cnt=7&".$lang."&".$api."";

//Let's get some data :)
$json=file_get_contents($url);
$data=json_decode($json,true);

//Define sunraise & sunset converted from Unixtime to Timestamp using PHP date() function:
//Date format - F j, Y, g:i a (January 18, 2016, 7:35 am)
$sunrise = date("F j, Y, g:i a", $data['sys']['sunrise']);
$sunset = date("F j, Y, g:i a", $data['sys']['sunset']);

//Get temperature
echo "Temp: <b>" . $data['main']['temp']."</b><br>";
//Get weather
echo "Weather condition: <b>".$data['weather'][0]['main']."</b><br>";
//Get cloud percentage
echo "Cloud percentage: <b>".$data['clouds']['all']."</b><br>";
//Get wind speed
echo "Wind speed: <b>".$data['wind']['speed']."</b><br>";
//Get Humidity
echo "Humidity: <b>".$data['main']['humidity']."</b><br>";
//Get Sunrise
//echo "Sunrise: <b>".echo gmdate("Y-m-d\TH:i:s\Z", $sunrise)."</b><br>";
echo "Sunrise: <b>".$sunrise."</b><br>";
//Get Sunset
echo "Sunset: <b>".$sunset."</b><br>";

?>