<?php
interface MainInterface
{
	public function getCategory();
	public function getTitle();
    public function setDiscount($discount);
    public function getPrice();
    public function getColor();
    public function setColor($color);
    public function __construct($code, $title, $price);
}