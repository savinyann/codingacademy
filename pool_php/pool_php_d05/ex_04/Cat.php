<?php
include_once 'Animal.php';
class Cat extends Animal
{
	private $color;


	public function __CONSTRUCT($name, $color = "grey")
	{
		parent::__CONSTRUCT($name,4,Animal::MAMMAL);
		$this->color = $color;
		echo "$this->name: MEEEOOWWWW\n";
	}


	public function getColor()
	{
		return($this->color);
	}


	public function setColor($color)
	{
		$this->color = $color;
	}


	public function meow()
	{
		echo $this->getName()." the ".$this->getColor()." kitty is meowing.\n";
	}
}
?>