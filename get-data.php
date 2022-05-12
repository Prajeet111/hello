<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
// Select weather data for given parameters-------------------
$mysqli = new mysqli("bcpyzrlybnogo1ynwbmv-mysql.services.clever-cloud.com","uknugsrrcnqhpyut","vnShzvPBDYN8Qi1Hg2ou","bcpyzrlybnogo1ynwbmv");
$sql = "SELECT *
FROM weatherdata
WHERE weather_city = '{$_GET['city']}'
AND weather_datetimes >= DATE_SUB(NOW(), INTERVAL 10 HOUR)
ORDER BY weather_datetimes DESC limit 1";
$result = $mysqli -> query($sql);

// If 0 record found
if ($result->num_rows == 0) {
$url = 'https://api.openweathermap.org/data/2.5/weather?q=' . $_GET['city'] . '&appid=2d2174ce69df0a4b6fa49b5fd83c6cd2&units=metric';
// Get data from openweathermap and store in JSON object
$data = file_get_contents($url);
$json = json_decode($data, true);
// Fetch required fields
$weather_description = $json['weather'][0]['description'];
$weather_temperature = $json['main']['temp'];
$weather_wind = $json['wind']['speed'];
$weather_datetimes = date("Y-m-d H:i:s"); // now
$weather_city = $json['name'];
$weather_maxtemp=$json['main']['temp_max'];
$weather_mintemp=$json['main']['temp_min'];
$weather_speed=$json['wind']['speed'];
$weather_humidity=$json['main']['humidity'];
$weather_icon=$json['weather'][0]['icon'];
$weather_pressure=$json['main']['pressure'];


// Build INSERT SQL statement
$sql = "INSERT INTO  weatherdata (weather_description ,weather_temperature ,weather_wind ,weather_datetimes ,weather_maxtemp ,weather_mintemp,weather_speed ,weather_city ,weather_humidity,weather_icon,weather_pressure)
VALUES('{$weather_description}', '{$weather_temperature}', '{$weather_wind}', '{$weather_datetimes}', '{$weather_maxtemp}', '{$weather_mintemp}', '{$weather_speed}', '{$weather_city}', '{$weather_humidity}','{$weather_icon}','{$weather_pressure}')";
// Run SQL statement and report errors
if (!$mysqli -> query($sql)) {
echo("<h4>SQL error description: " . $mysqli -> error . "</h4>");
}
}
?>