<?php
/*Задаем многомерный массив с животными, которые привязаны к континентам*/
$animalsArray = [
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
        'Lepus tanaiticus', 
        'Canis lupus arabs', 
        'Gazella'
    ]
];

/*Создаем многомерный массив, в который помещаем животных из 2-х слов, при этом первое слово помещаем в массив 0, второе - в массив 1*/
$sepAnimals = [
    '0' => [],
    '1' => [],
];

foreach ($animalsArray as $continent => $animals) {
    foreach ($animals as $animal) {
        $result = str_word_count($animal, 0);
        if ($result == 2) {
            $tempArray = explode(' ', $animal);
            $sepAnimals[0][] = $tempArray[0];
            $sepAnimals[1][] = $tempArray[1];
        }
    }
}

/*Функции перемешивания слов*/
shuffle($sepAnimals[0]);
shuffle($sepAnimals[1]);

/*Функция поиска континента по первому слову животного*/
function searchContinent($animalFirstWord, $animalsArray) {
    foreach ($animalsArray as $continent => $animals) {
        $result = implode(' ', $animals);
        if(is_numeric(strpos($result, $animalFirstWord))) {
            return $continent;
        } 
    }
}

/*Создаем новый массив с фантазийными животными и выводим континент по первому слову животного*/
$newAnimalsArray = [];

for ($i=0; $i < count($sepAnimals[0]); $i++) { 
    $newAnimalsArray[searchContinent($sepAnimals[0][$i], $animalsArray)][] = $sepAnimals[0][$i] . ' ' . $sepAnimals[1][$i];
}

foreach ($newAnimalsArray as $continent => $animals) {
    echo '<h2>' . $continent . '</h2>';
    $result = implode(', ', $animals);
    echo '<p>' . $result . '</p>';
}
?>