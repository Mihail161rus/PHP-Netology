<?php
//Функции автозагрузки
function autoloadClass($className)
{
	$className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
	$srcClassFile = $className . '.class.php';

	if (file_exists($srcClassFile)) {
		include "$srcClassFile";
	}
}

function autoloadInterface($interfaceName)
{
	$interfaceName = str_replace('\\', DIRECTORY_SEPARATOR, $interfaceName);
	$srcInterfaceFile = 'Interface' . DIRECTORY_SEPARATOR . $interfaceName . '.interface.php';

	if (file_exists($srcInterfaceFile)) {
		include "$srcInterfaceFile";
	}
}

//Регистрируем автозагрузчики
spl_autoload_register('autoloadClass');
spl_autoload_register('autoloadInterface');

echo '<h2>Создаем 2 объекта машины</h2>';

$aveo = new \Product\Car('Chevrolet Aveo', 570000);
$aveo->setBodyType('седан');
$aveo->setEnginePower('116');
$aveo->setCoplectationType('люкс');
$aveo->setColor('серый');

echo '<b>Модель авто:</b> ' . $aveo->getTitle();
echo '<br>';
echo '<b>Тип кузова:</b> ' . $aveo->getBodyType();
echo '<br>';
echo '<b>Мощность двигателя:</b> ' . $aveo->getEnginePower();
echo '<br>';
echo '<b>Количество колес:</b> ' . $aveo->getWheelsNumber();
echo '<br>';
echo '<b>Количество дверей:</b> ' . $aveo->getDoorsNumber();
echo '<br>';
echo '<b>Цвет авто:</b> ' . $aveo->getColor();
echo '<br>';
echo '<b>Материал салона:</b> ' . $aveo->getInteriorType();
echo '<br>';
echo '<b>Комплектация:</b> ' . $aveo->getComplectation();

$camaro = new \Product\Car('Chevrolet Camaro', 2250000);
$camaro->setBodyType('купе');
$camaro->setEnginePower('400');
$camaro->setCoplectationType('стандарт');
$camaro->setColor('желтый');

echo '<br><br>';
echo '<b>Модель авто:</b> ' . $camaro->getTitle();
echo '<br>';
echo '<b>Тип кузова:</b> ' . $camaro->getBodyType();
echo '<br>';
echo '<b>Мощность двигателя:</b> ' . $camaro->getEnginePower();
echo '<br>';
echo '<b>Количество колес:</b> ' . $camaro->getWheelsNumber();
echo '<br>';
echo '<b>Количество дверей:</b> ' . $camaro->getDoorsNumber();
echo '<br>';
echo '<b>Цвет авто:</b> ' . $camaro->getColor();
echo '<br>';
echo '<b>Материал салона:</b> ' . $camaro->getInteriorType();
echo '<br>';
echo '<b>Комплектация:</b> ' . $camaro->getComplectation();
echo '<hr>';