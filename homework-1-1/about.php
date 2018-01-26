<?php
    $name = 'Михаил';
    $surname = 'Орленко';
    $age = 29;
    $email = 'mihail@mail.ru';
    $city = 'Ростов-на-Дону';
    $about_text = 'начинающий веб разработчик';
    $fullname = $name. ' ' .$surname;
    $meta_title = $name. ' - ' .$about_text;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?=$meta_title?></title>
</head>
<body>
    <h1>Страница пользователя <?=$name?></h1>

    <ul>
        <li>Фамилия и имя: <?=$fullname?></li>
        <li>Возраст: <?=$age?></li>
        <li>Адрес электронной почты: <a href="mailto:<?=$email?>"><?=$email?></a></li>
        <li>Город: <?=$city?></li>
        <li>О себе: <?=$about_text?></li>
    </ul>
</body>
</html>