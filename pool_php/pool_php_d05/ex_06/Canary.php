<?php
include_once 'Animal.php';

class Canary extends Animal
{
	private $eggs = 0;


	public function __CONSTRUCT($name)
	{
		parent::__CONSTRUCT($name,2,Animal::BIRD);
		echo "Yellow and smart ? Here I am !\n";
	}


	public function getEggsCount()
	{
		return($this->eggs);
	}


	public function layEgg()
	{
		$this->eggs++;
	}
}
?>