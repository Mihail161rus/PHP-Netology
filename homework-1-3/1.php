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

echo 'Задание 1<br>';

foreach ($continents as $continent => $animals) {
    echo '<h2>' . $continent . '</h2>';

    foreach ($animals as $animal) {
        echo $animal . ' ';
    }
}

?>