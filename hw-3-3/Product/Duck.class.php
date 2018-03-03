<?php
namespace Product;

class Duck extends Product
{
	protected $category = 'Утка';
	protected $age;

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