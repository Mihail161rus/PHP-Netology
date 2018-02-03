<?php
$continents = [
    'Australia' => [
        'Macropus agilis',
        'Ornithorhynchus anatinus',
        'Sarcophilus harrisii'
    ],

    'Africa' => [
        'Connochaetes',
        'Panthera leo',
        'Loxodonta',
        'Camelus'
    ],

    'Southern America' => [
        'Nasuella olivacea', 
        'Lontra felina', 
        'Cebus capucinus'
    ],

    'Asia' => [
        'Panthera tigris tigris', 
        'Canis lupus arabs', 
        'Gazella'
    ]
];

echo 'Задание 2<hr>';

foreach ($continents as $continent => $animals) {
    $continents_two_word[$continent] = preg_grep("~\s{1}~", $animals);
}
foreach ($continents_two_word as $continent => $animals) {
    echo '<h2>' . $continent . '</h2>';
    shuffle($animals);
    foreach ($animals as $animal) {
        echo $animal . ' ';
    }
}


?>