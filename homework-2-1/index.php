<?php
$json_import = file_get_contents(__DIR__ . '/contacts.json');
$contactsArray = json_decode($json_import, true);

echo '<pre>';
print_r($contactsArray);
?>