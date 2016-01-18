<?php
//This info is got from here - http://www.openweathermap.org/current
//<head>
//<title> Weather script </title>

echo "<h1>Simple weather script example</h1>";

echo "<h3>using <a href=http://openweathermap.org>OpenWeatherMap.org</a></h3><br>";

//Api key
$api = "appid=2de143494c0b295cca9337e1e96b00e0";
//City
$city="Varna";
//Country two digit ID
$country="BG";
//Units
$units ="metric";
//Formed URL
//$url="http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&units=metric&cnt=7&lang=en&".$api."";
//Language
$lang="en";
$url="http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&".$units.".&cnt=7&".$lang."&".$api."";

$json=file_get_contents($url);
$data=json_decode($json,true);

//Define sunraise & sunset converted from Unixtime to Timestamp using date():
//Date format - F j, Y, g:i a (January 18, 2016, 7:35 am)
$sunrise = date("F j, Y, g:i a", $data['sys']['sunrise']);
$sunset = date("F j, Y, g:i a", $data['sys']['sunset']);

//Get current Temperature in Celsius
echo "Temp: <b>" . $data['main']['temp']."</b><br>";
//Get weather condition
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