<?php
$json_array = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Rostov-on-Don&appid=e117e6ab126792a3b7f473e009ed4984');
$weatherArray = json_decode($json_array, true);

$city_name = $weatherArray['name'];
$temperature = round(((($weatherArray['main']['temp']) / 10) - 32) / 1.8);
$atmo_pressure = round(($weatherArray['main']['pressure']) * 0.750064);
$humidity = $weatherArray['main']['humidity'];
$wind_speed = round($weatherArray['wind']['speed'], 1);
$sunrise = date_sunrise($weatherArray['sys']['sunrise']);
$sunset = date_sunset($weatherArray['sys']['sunset']);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Текущая погода в <?=$city_name?></title>
</head>
<body>
	<h1>Погода в <?=$city_name?></h1>

	<table>
		<tr>
			<td>Температура воздуха</td>
			<td><?=$temperature?> °C</td>
		</tr>
		<tr>
			<td>Атмосферное давление</td>
			<td><?=$atmo_pressure?> мм. рт. столба</td>
		</tr>
		<tr>
			<td>Влажность воздуха</td>
			<td><?=$humidity?> %</td>
		</tr>
		<tr>
			<td>Скорость ветра</td>
			<td><?=$wind_speed?> м/с</td>
		</tr>
		<tr>
			<td>Время восхода солнца</td>
			<td><?=$sunrise?></td>
		</tr>
		<tr>
			<td>Время захода солнца</td>
			<td><?=$sunset?></td>
		</tr>
	</table>
</body>
</html>