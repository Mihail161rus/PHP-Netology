<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Домашнее задание к лекции 3.3</title>

    <style>
        table {
            border: 1px solid;
        }
        th, td {
            padding: 4px 8px;
            border: 1px solid;
        }
    </style>
</head>
<body>
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

echo '<h2>Создаем объекты машин</h2>';

$aveo = new \Product\Car(100, 'Chevrolet Aveo', 570000);
$aveo->setBodyType('седан');
$aveo->setEnginePower('116');
$aveo->setCoplectationType('люкс');
$aveo->setColor('серый');
$aveo->setDiscount(15);

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
echo '<br>';
echo '<b>Цена авто:</b> ' . $aveo->getPrice();

$camaro = new \Product\Car(105, 'Chevrolet Camaro', 2250000);
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
echo '<br>';
echo '<b>Цена авто:</b> ' . $camaro->getPrice();
echo '<hr>';

echo '<h2>Создаем объекты телевизоров</h2>';

$tvPanasonic = new \Product\TelevisionRemote(120, 'Panasonic HDTV-100', 15000);
$tvPanasonic->setTvStanby('включить');
$tvPanasonic->setColor('белый');
$tvSony = new \Product\TelevisionRemote(152, 'Sony Bravia-200', 21000);
$tvSony->setDiscount(10);

$formatTv = '%s телевизор марки %s по цене %d руб. сейчас %s';
echo sprintf($formatTv, $tvPanasonic->getColor(), $tvPanasonic->getTitle(),$tvPanasonic->getPrice(), $tvPanasonic->getTvStanby());
echo '<br>';
echo sprintf($formatTv, $tvSony->getColor(), $tvSony->getTitle(), $tvSony->getPrice(), $tvSony->getTvStanby());
echo '<hr>';

echo '<h2>Создаем объкты ручек</h2>';

$autoPen = new \Product\Pen(201, 'автоматическая', 45);
$autoPen->wrightWord();
$autoPen->setInkColor('красные');
$parkerPen = new \Product\Pen(210, 'паркер', 350);
$parkerPen->wrightWord();

$formatPen = '%s %s по цене %d руб. имеет %s чернила, остаточный уровень чернил %d процентов';
echo sprintf($formatPen, $autoPen->getCategory(), $autoPen->getTitle(), $autoPen->getPrice(), $autoPen->getInkColor(), $autoPen->getInkLevel());
echo '<br>';
echo sprintf($formatPen, $parkerPen->getCategory(), $parkerPen->getTitle(), $parkerPen->getPrice(), $parkerPen->getInkColor(), $parkerPen->getInkLevel());
echo '<hr>';

echo '<h2>Создаем объекты уток</h2>';

$greyDuck = new \Product\Duck(308, 'Пекинская', 500);
$greyDuck->setColor('серый');
$blackDuck = new \Product\Duck(333, 'Башкирская', 350);

$formatDuck = '%s утка возрастом %d года по цене %d руб. имеет %s окрас';
echo sprintf($formatDuck, $greyDuck->getTitle(), $greyDuck->getAge(), $greyDuck->getPrice(), $greyDuck->getColor());
echo '<br>';
echo sprintf($formatDuck, $blackDuck->getTitle(), $blackDuck->getAge(),$blackDuck->getPrice(), $blackDuck->getColor());
echo '<hr>';

echo '<h2>Создаем объект powerbank</h2>';

$powerbank = new \Product\PowerBank(545, 'Xiaomi Mi Powerbank 2 10000', 1400);
$powerbank->setDiscount(5);

$formatPowerbank = '%s %s по цене %d имеет %s цвет';
echo sprintf($formatPowerbank, $powerbank->getCategory(), $powerbank->getTitle(), $powerbank->getPrice(), $powerbank->getColor());
echo '<hr>';

echo '<h2>Создаем корзину и кладем в нее товары</h2>';

$basket = new \Basket\Basket();
$basket->addToCart($aveo);
$basket->addToCart($camaro);
$basket->addToCart($parkerPen, 5);
$basket->addToCart($tvSony, 2);
$basket->addToCart($powerbank, 10);
$basket->addToCart($aveo, 2);
$basket->addToCart($greyDuck);
$basket->printProductsList();
echo '<hr>';

echo '<h2>Удаляем из корзины телевизор Сони и выводим содержимое корзины</h2>';

$basket->deleteFromCart($tvSony);
$basket->printProductsList();
echo '<hr>';

echo '<h2>Страница заказа</h2>';

$order = new \Order\Order($basket);
$order->changeOrderStatus(rand(1,4));
$order->printOrderInfo();
?>
</body>
</html>


