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
$icon_weather = $weatherArray['weather'][0]['icon'];
$weather_desc = $weatherArray['weather'][0]['description'];
$date_now = date('d M Y - G:i');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Текущая погода в <?=$city_name?></title>
    <style>
        table {
            border: 1px solid #eeeeee;
        }

        td {
            padding: 5px 15px;
            border: 1px solid #eeeeee;
        }
    </style>
</head>
<body>
	<h1>Погода в <?=$city_name?></h1>

    <h3>Текущая дата: <?=$date_now?></h3>

	<table>
        <tr>
            <td rowspan="2">Погодные условия</td>
            <td style="text-align: center;"><img src="http://openweathermap.org/img/w/<?=$icon_weather?>.png" alt="<?=$weather_desc?>"></td>
        </tr>
        <tr>
            <td><?=$weather_desc?></td>
        </tr>
		<tr>
			<td>Температура воздуха</td>
			<td><?=$temperature?> °C</td>
		</tr>
		<tr>
			<td>Атмосферное давление</td>
			<td><?=$atmo_pressure?> мм. рт. ст.</td>
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