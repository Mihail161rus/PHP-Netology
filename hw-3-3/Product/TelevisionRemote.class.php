<?php
namespace Product;

class TelevisionRemote extends Product
{
	protected $category = 'Телевизор';
	const STANBY_OFF = 'выключен';
    const STANBY_ON = 'включен';
    protected $stanby = self::STANBY_OFF;

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