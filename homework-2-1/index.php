<?php
$json_import = file_get_contents(__DIR__ . '/contacts.json');
$contactsArray = json_decode($json_import, true);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Домашнее задание к лекции 2.1</title>
    <style>
        table {
            border: 1px solid #999999;
        }
        th, td {
            padding: 8px;
            text-align: center;
            border: 1px solid #999999;
        }
    </style>
</head>
<body>
    <h1>Записная книжка</h1>

    <table>
        <thead>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Город проживания</th>
            <th>Адрес</th>
            <th>Контактный телефон</th>
        </thead>
    <?php foreach ($contactsArray as $contact) { ?>
        <tr>
            <td><?=$contact['firstName']?></td>
            <td><?=$contact['lastName']?></td>
            <td><?=$contact['city']?></td>
            <td><?=$contact['address']?></td>
            <td><?=$contact['phoneNumber']?></td>
        </tr>
    <?php } ?>
    </table>
</body>
</html>