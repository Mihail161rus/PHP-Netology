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

foreach ($continents as $continent => $animals) {
    echo $continent;
}

?>