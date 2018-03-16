<?php
namespace Product;

abstract class Product implements \MainInterface
{
    protected $code;
    protected $title;
    protected $category;
    protected $color = 'черный';
    protected $price;

    public function getCode()
    {
        return $this->code;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setDiscount($discount)
    {
        $this->price = ($this->price) - ($this->price * ($discount / 100));
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function __construct($code, $title, $price)
    {
        $this->code = $code;
        $this->title = $title;
        $this->price = $price;
    }
}