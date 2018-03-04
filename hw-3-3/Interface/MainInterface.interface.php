<?php
interface MainInterface
{
	public function getCategory();
	public function getTitle();
    public function getPrice();
    public function getColor();
    public function setColor($color);
    public function __construct($title, $price);
}