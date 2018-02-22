<?php
//Создаем класс автомобиля

class CarChevrolet
{
    public $carModel;
    public $bodyType;
    public $enginePower;
    private $wheelsNumber = 4;
    public $doorsNumber;
    public $carColor = 'желтый';
    public $interiorType = 'тканевый';
    public $complectationType;
    public $complectation;

    public function setDoorsNumber()
    {
        if ($this->bodyType == 'седан' || $this->bodyType == 'хетчбек') {
            return $this->doorsNumber = 4;
        }
        elseif ($this->bodyType == 'купе') {
            return $this->doorsNumber = 2;
        }
    }

    public function setComplectation()
    {
        if ($this->complectationType == 'стандарт') {
            return $this->complectation = 'кондиционер, 2 AIRBAG, передние стеклоподъемники';
        }
        elseif ($this->complectationType == 'люкс') {
            return $this->complectation = 'кондиционер, 4 AIRBAG, полный электропакет, подогрев сидений, автомагнитола';
        }
    }

    public function __construct($carModel, $bodyType, $enginePower)
    {
        $this->carModel = $carModel;
        $this->bodyType = $bodyType;
        $this->enginePower = $enginePower;
    }

    public function getWheelsNumber()
    {
        return $this->wheelsNumber;
    }
}

//Создаем 2 объекта aveo и camaro

$aveo = new CarChevrolet('Aveo', 'седан', 116);
$aveo->complectationType = 'люкс';
$aveo->carColor = 'серый';

echo '<b>Модель авто:</b> ' . $aveo->carModel;
echo '<br>';
echo '<b>Тип кузова:</b> ' . $aveo->bodyType;
echo '<br>';
echo '<b>Мощность двигателя:</b> ' . $aveo->enginePower;
echo '<br>';
echo '<b>Количество колес:</b> ' . $aveo->getWheelsNumber();
echo '<br>';
echo '<b>Количество дверей:</b> ' . $aveo->setDoorsNumber();
echo '<br>';
echo '<b>Цвет авто:</b> ' . $aveo->carColor;
echo '<br>';
echo '<b>Материал салона:</b> ' . $aveo->interiorType;
echo '<br>';
echo '<b>Комплектация:</b> ' . $aveo->setComplectation();

$camaro = new CarChevrolet('Camaro', 'купе', 400);
$camaro->complectationType = 'стандарт';

echo '<br><br>';
echo '<b>Модель авто:</b> ' . $camaro->carModel;
echo '<br>';
echo '<b>Тип кузова:</b> ' . $camaro->bodyType;
echo '<br>';
echo '<b>Мощность двигателя:</b> ' . $camaro->enginePower;
echo '<br>';
echo '<b>Количество колес:</b> ' . $camaro->getWheelsNumber();
echo '<br>';
echo '<b>Количество дверей:</b> ' . $camaro->setDoorsNumber();
echo '<br>';
echo '<b>Цвет авто:</b> ' . $camaro->carColor;
echo '<br>';
echo '<b>Материал салона:</b> ' . $camaro->interiorType;
echo '<br>';
echo '<b>Комплектация:</b> ' . $camaro->setComplectation();
echo '<hr>';

//Создаем класс управления телевизором

class TelevisionRemote
{
    private $vendor;
    private $model;
    const STANBY_OFF = 'выключен';
    const STANBY_ON = 'включен';
    private $stanby = self::STANBY_OFF;

    public function getTvVendor()
    {
        return $this->vendor;
    }

    public function getTvModel()
    {
        return $this->model;
    }

    public function getTvStanby()
    {
        return $this->stanby;
    }

    public function setTvStanby()
    {
        if ($this->stanby === self::STANBY_ON) {
            return $this->stanby = self::STANBY_OFF;
        }
        elseif ($this->stanby === self::STANBY_OFF) {
            return $this->stanby = self::STANBY_ON;
        }
    }

    public function __construct($vendor, $model)
    {
        $this->vendor = $vendor;
        $this->model = $model;
    }
}

//Создаем объекты телевизоров

$tvPanasonic = new TelevisionRemote('Panasonic', 'HDTV-100');
$tvPanasonic->setTvStanby();
$tvSony = new TelevisionRemote('Sony', 'Bravia-200');

$formatTv = 'Телевизор марки %s %s сейчас %s';
echo sprintf($formatTv, $tvPanasonic->getTvVendor(), $tvPanasonic->getTvModel(), $tvPanasonic->getTvStanby());
echo '<br>';
echo sprintf($formatTv, $tvSony->getTvVendor(), $tvSony->getTvModel(), $tvSony->getTvStanby());
echo '<hr>';

//Создаем класс шариковая ручка

class PenBall
{
    private $penType;
    private $inkColor = 'синие';
    private $inkLevel = 100;

    public function __construct($penType)
    {
        $this->penType = $penType;
    }

    public function getPenType()
    {
        return $this->penType;
    }

    public function getInkColor()
    {
        return $this->inkColor;
    }

    public function setRedInkColor()
    {
        $this->inkColor = 'красные';
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
$autoPen->setRedInkColor();
$parkerPen = new PenBall('паркер');
$parkerPen->wrightWord();

$formatPen = 'Ручка %s имеет %s чернила, остаточный уровень чернил %d процентов';
echo sprintf($formatPen, $autoPen->getPenType(), $autoPen->getInkColor(), $autoPen->getInkLevel());
echo '<br>';
echo sprintf($formatPen, $parkerPen->getPenType(), $parkerPen->getInkColor(), $parkerPen->getInkLevel());
echo '<hr>';

//Создаем класс уток

class Duck
{
    private $species;
    private $age;
    private $color = 'серого';

    public function setSpecies()
    {
        $speciesArray = ['Пекинская', 'Московская белая', 'Башкирская'];
        shuffle($speciesArray);
        $this->species = $speciesArray[0];
    }

    public function getSpecies()
    {
        return $this->species;
    }

    public function getAge()
    {
        return $this->age = rand(2, 4);
    }

    public function setBlackColor()
    {
        $this->color = 'черного';
    }

    public function getColor()
    {
        return $this->color;
    }
}

//Создаем объекты уток

$greyDuck = new Duck();
$greyDuck->setSpecies();
$blackDuck = new Duck();
$blackDuck->setSpecies();
$blackDuck->setBlackColor();

$formatDuck = '%s утка %s цвета возрастом %d года';
echo sprintf($formatDuck, $greyDuck->getSpecies(), $greyDuck->getColor(), $greyDuck->getAge());
echo '<br>';
echo sprintf($formatDuck, $blackDuck->getSpecies(), $blackDuck->getColor(), $blackDuck->getAge());
echo '<hr>';