<?php
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

$cruz = new CarChevrolet('Camaro', 'купе', 400);
$cruz->complectationType = 'стандарт';

echo '<b>Модель авто:</b> ' . $cruz->carModel;
echo '<br>';
echo '<b>Тип кузова:</b> ' . $cruz->bodyType;
echo '<br>';
echo '<b>Мощность двигателя:</b> ' . $cruz->enginePower;
echo '<br>';
echo '<b>Количество колес:</b> ' . $cruz->getWheelsNumber();
echo '<br>';
echo '<b>Количество дверей:</b> ' . $cruz->setDoorsNumber();
echo '<br>';
echo '<b>Цвет авто:</b> ' . $cruz->carColor;
echo '<br>';
echo '<b>Материал салона:</b> ' . $cruz->interiorType;
echo '<br>';
echo '<b>Комплектация:</b> ' . $cruz->setComplectation();
?>