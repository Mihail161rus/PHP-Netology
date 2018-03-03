<?php
namespace Product;

class Car extends Product
{
	protected $category = 'Автомобиль';
	protected $bodyType;
    protected $enginePower;
    protected $wheelsNumber = 4;
    protected $doorsNumber;
    protected $interiorType = 'тканевый';
    protected $complectationType;
    protected $complectation;

    public function getBodyType()
    {
    	return $this->bodyType;
    }

    public function setBodyType($type)
    {
    	$this->bodyType = $type;
    }

    public function getEnginePower()
    {
    	return $this->enginePower;
    }
    public function setEnginePower($power)
    {
    	$this->enginePower = $power;
    }

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

    public function getWheelsNumber()
    {
        return $this->wheelsNumber;
    }

    public function getInteriorType()
    {
    	return $this->interiorType;
    }
}