<?php
$json_array = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Rostov-on-Don&appid=e117e6ab126792a3b7f473e009ed4984');
$weatherArray = json_decode($json_array, true);

echo '<pre>';
print_r($weatherArray);

$city_name = $weatherArray['name'];
echo "<h1>$city_name</h1>";
?>