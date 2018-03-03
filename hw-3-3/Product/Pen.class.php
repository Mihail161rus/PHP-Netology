<?php
namespace Product;

class Pen extends Product
{
	protected $category = 'Ручка';
	protected $inkColor = 'синие';
    protected $inkLevel = 100;

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