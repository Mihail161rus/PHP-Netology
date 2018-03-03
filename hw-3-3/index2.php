<?php
//Абстрактный супер класс
abstract class SuperClass
{
    protected $color = 'черный';
    protected $title;

    public function getColor()
    {
        return $this->color;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }
}

//Создаем класс автомобиля

interface CarInterface
{
    public function getDoorsNumber();
    public function setCoplectationType($type);
    public function getComplectation();
    public function getWheelsNumber();
    public function __construct($title, $bodyType, $enginePower);
}

class Car extends SuperClass implements CarInterface
{
    public $bodyType;
    public $enginePower;
    private $wheelsNumber = 4;
    public $doorsNumber;
    public $interiorType = 'тканевый';
    public $complectationType;
    public $complectation;

    public function getDoorsNumber()
    {
        if ($this->bodyType == 'седан' || $this->bodyType == 'хетчбек') {
            return $this->doorsNumber = 4;
        }
        elseif ($this->bodyType == 'купе') {
            return $this->doorsNumber = 2;
        }
    }

    public function setCoplectationType($type)
    {
        $this->complectationType = $type;
    }

    public function getComplectation()
    {
        if ($this->complectationType == 'стандарт') {
            return $this->complectation = 'кондиционер, 2 AIRBAG, передние стеклоподъемники';
        }
        elseif ($this->complectationType == 'люкс') {
            return $this->complectation = 'кондиционер, 4 AIRBAG, полный электропакет, подогрев сидений, автомагнитола';
        }
    }

    public function __construct($title, $bodyType, $enginePower)
    {
        $this->title = $title;
        $this->bodyType = $bodyType;
        $this->enginePower = $enginePower;
    }

    public function getWheelsNumber()
    {
        return $this->wheelsNumber;
    }
}

//Создаем 2 объекта aveo и camaro

$aveo = new Car('Chevrolet Aveo', 'седан', 116);
$aveo->setCoplectationType('люкс');
$aveo->setColor('серый');

echo '<b>Модель авто:</b> ' . $aveo->getTitle();
echo '<br>';
echo '<b>Тип кузова:</b> ' . $aveo->bodyType;
echo '<br>';
echo '<b>Мощность двигателя:</b> ' . $aveo->enginePower;
echo '<br>';
echo '<b>Количество колес:</b> ' . $aveo->getWheelsNumber();
echo '<br>';
echo '<b>Количество дверей:</b> ' . $aveo->getDoorsNumber();
echo '<br>';
echo '<b>Цвет авто:</b> ' . $aveo->getColor();
echo '<br>';
echo '<b>Материал салона:</b> ' . $aveo->interiorType;
echo '<br>';
echo '<b>Комплектация:</b> ' . $aveo->getComplectation();

$camaro = new Car('Chevrolet Camaro', 'купе', 400);
$camaro->setCoplectationType('стандарт');

echo '<br><br>';
echo '<b>Модель авто:</b> ' . $camaro->getTitle();
echo '<br>';
echo '<b>Тип кузова:</b> ' . $camaro->bodyType;
echo '<br>';
echo '<b>Мощность двигателя:</b> ' . $camaro->enginePower;
echo '<br>';
echo '<b>Количество колес:</b> ' . $camaro->getWheelsNumber();
echo '<br>';
echo '<b>Количество дверей:</b> ' . $camaro->getDoorsNumber();
echo '<br>';
echo '<b>Цвет авто:</b> ' . $camaro->getColor();
echo '<br>';
echo '<b>Материал салона:</b> ' . $camaro->interiorType;
echo '<br>';
echo '<b>Комплектация:</b> ' . $camaro->getComplectation();
echo '<hr>';

//Создаем класс управления телевизором

interface TvInterface
{
    public function getTvStanby();
    public function setTvStanby($stanby);
    const STANBY_OFF = 'выключен';
    const STANBY_ON = 'включен';
    public function __construct($title);
}

class TelevisionRemote extends SuperClass implements TvInterface
{
    private $stanby = self::STANBY_OFF;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function getTvStanby()
    {
        return $this->stanby;
    }

    public function setTvStanby($stanby)
    {
        if ($stanby === 'включить') {
            return $this->stanby = self::STANBY_ON;
        }
        elseif ($stanby === 'выключить') {
            return $this->stanby = self::STANBY_OFF;
        }
    }
}

//Создаем объекты телевизоров

$tvPanasonic = new TelevisionRemote('Panasonic HDTV-100');
$tvPanasonic->setTvStanby('включить');
$tvPanasonic->setColor('белый');
$tvSony = new TelevisionRemote('Sony Bravia-200');

$formatTv = '%s телевизор марки %s сейчас %s';
echo sprintf($formatTv, $tvPanasonic->getColor(), $tvPanasonic->getTitle(), $tvPanasonic->getTvStanby());
echo '<br>';
echo sprintf($formatTv, $tvSony->getColor(), $tvSony->getTitle(), $tvSony->getTvStanby());
echo '<hr>';

//Создаем класс шариковая ручка

interface PenInterface
{
    public function __construct($title);
    public function getInkColor();
    public function setInkColor($color);
    public function getInkLevel();
    public function wrightWord();
}

class PenBall extends SuperClass implements PenInterface
{
    private $inkColor = 'синие';
    private $inkLevel = 100;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function getInkColor()
    {
        return $this->inkColor;
    }

    public function setInkColor($color)
    {
        $this->inkColor = $color;
    }

    public function getInkLevel()
    {
        return $this->inkLevel;
    }

    public function wrightWord()
    {
        $this->inkLevel = rand(10, 100);
    }
}

//Создаем объкты ручек

$autoPen = new PenBall('автоматическая');
$autoPen->wrightWord();
$autoPen->setInkColor('красные');
$parkerPen = new PenBall('паркер');
$parkerPen->wrightWord();

$formatPen = 'Ручка %s имеет %s чернила, остаточный уровень чернил %d процентов';
echo sprintf($formatPen, $autoPen->getTitle(), $autoPen->getInkColor(), $autoPen->getInkLevel());
echo '<br>';
echo sprintf($formatPen, $parkerPen->getTitle(), $parkerPen->getInkColor(), $parkerPen->getInkLevel());
echo '<hr>';

//Создаем класс уток

interface DuckInterface
{
    public function getAge();
    public function setColor($color);
}

class Duck extends SuperClass implements DuckInterface
{
    private $age;

    public function getTitle()
    {
        parent::getTitle();
        $titleArray = ['Пекинская', 'Московская белая', 'Башкирская'];
        shuffle($titleArray);
        return $this->title = $titleArray[0];
    }

    public function getAge()
    {
        return $this->age = rand(2, 4);
    }
}

//Создаем объекты уток

$greyDuck = new Duck();
$greyDuck->setColor('серый');
$blackDuck = new Duck();

$formatDuck = '%s утка возрастом %d года имеет %s окрас';
echo sprintf($formatDuck, $greyDuck->getTitle(), $greyDuck->getAge(), $greyDuck->getColor());
echo '<br>';
echo sprintf($formatDuck, $blackDuck->getTitle(), $blackDuck->getAge(), $blackDuck->getColor());
echo '<hr>';

//Создаем класс продуктов

interface ProductInterface
{
    public function getCategory();
    public function getPrice();
    public function getDiscountPrice();
    public function __construct($category, $title, $price);
}

class Product extends SuperClass implements ProductInterface
{
    private $category;
    private $price;
    private $discount;
    private $discountPrice;

    public function getCategory()
    {
        return $this->category;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDiscountPrice()
    {
        switch ($this->category) {
            case 'Фотокамера':
                $discount = 15;
                break;

            case 'Сегвей':
                $discount = 20;
                break;

            case 'Внешний аккумулятор':
                $discount = 5;
                break;
            
            default:
                $discount = 0;
                break;
        }

        return $this->discountPrice = ($this->price) - ($this->price * ($discount / 100));
    }

    public function __construct($category, $title, $price)
    {
        $this->category = $category;
        $this->vendor = $title;
        $this->price = $price;
    }
}

//Создаем объеты товаров

$smartphone = new Product('Смартфон', 'Apple iPhone 7 Plus', 45000);
$photo = new Product('Фотокамера', 'Canon EOS1100D', 28000);
$segway = new Product('Сегвей', 'Ninebot Mini Pro', 34990);
$segway->setColor('белый');
$powerBank = new Product('Внешний аккумулятор', 'Xiaomi Mi Power Bank 2', 1400);
$powerBank->setColor('серебристый');

$formatProduct = '%s %s имеет %s цвет и продается по цене %d, если оформить заказ сегодня то цена со скидкой %d';

echo sprintf($formatProduct, $smartphone->getCategory(), $smartphone->getTitle(), $smartphone->getColor(),
 $smartphone->getPrice(), $smartphone->getDiscountPrice());
echo '<br>';
echo sprintf($formatProduct, $photo->getCategory(), $photo->getTitle(), $photo->getColor(),
 $photo->getPrice(), $photo->getDiscountPrice());
echo '<br>';
echo sprintf($formatProduct, $segway->getCategory(), $segway->getTitle(), $segway->getColor(),
 $segway->getPrice(), $segway->getDiscountPrice());
echo '<br>';
echo sprintf($formatProduct, $powerBank->getCategory(), $powerBank->getTitle(), $powerBank->getColor(),
 $powerBank->getPrice(), $powerBank->getDiscountPrice());
echo '<br><br><br><br><br>';
