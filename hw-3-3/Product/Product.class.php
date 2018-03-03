<?php
namespace Product;

abstract class Product implements \MainInterface
{
	protected $title;
	protected $category;
	protected $color = 'черный';
	protected $price;
	protected $discount;
    protected $discountPrice;

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

    public function getPrice()
    {
    	return $this->price;
    }

    public function getDiscountPrice()
    {
        switch ($this->category) {
            case 'Автомобиль':
                $discount = 15;
                break;

            case 'Ручка':
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

    public function __construct($title, $price)
    {
        $this->title = $title;
        $this->price = $price;
    }
}