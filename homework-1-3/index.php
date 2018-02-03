<?php
echo '<h3>Задание 1 - задаем массив животных</h3><hr>';

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

echo '<pre>';
print_r($animalsArray);
echo '</pre>';

echo '<hr><h3>Задание 2 - новый массив с животными из 2-х слов</h3><hr>';

foreach ($animalsArray as $continent => $animals) {
    foreach ($animals as $animal) {
        $result = str_word_count($animal, 0);
        if ($result == 2) {
            $newAnimalsArray[] = $animal;
        }
    }
}

echo '<pre>';
print_r($newAnimalsArray);
echo '</pre>';

echo '<hr><h3>Задание 3 - случайно перемешайте между собой первые и вторые слова названий животных</h3><hr>';

foreach ($newAnimalsArray as $animal) {
    $tempArray = explode(' ', $animal);
    if (count($tempArray) == 2) {
        $sepAnimals[0][] = $tempArray[0];
        $sepAnimals[1][] = $tempArray[1];
    }
}

shuffle($sepAnimals[0]);
shuffle($sepAnimals[1]);

for ($i = 0; $i < count($sepAnimals[0]); $i++) {
    $shuffleAnimalsArr[] = $sepAnimals[0][$i] . ' ' . $sepAnimals[1][$i];
}

echo '<pre>';
print_r($shuffleAnimalsArr);
echo '</pre>';

echo '<hr><h3>Дополнительное задание</h3><hr>';

function searchContinent($animalFirstWord, $animalsArray) {
    foreach ($animalsArray as $continent => $animals) {
        $result = implode(' ', $animals);
        if(strpos($result, $animalFirstWord)) {
            return $continent;
        } 
    }
}

for ($i=0; $i < count($sepAnimals[0]); $i++) { 
    $shuffleAnimalsContinent[searchContinent($sepAnimals[0][$i], $animalsArray)][] = $sepAnimals[0][$i] . ' ' . $sepAnimals[1][$i];
}

echo '<pre>';
print_r($shuffleAnimalsContinent);
echo '</pre>';

foreach ($shuffleAnimalsContinent as $continent => $animals) {
    echo '<h2>' . $continent . '</h2>';
    $result = implode(', ', $animals);
    echo $result;
}

?>