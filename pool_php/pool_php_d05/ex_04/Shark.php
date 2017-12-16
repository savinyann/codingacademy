<?php
include_once 'Animal.php';

class Shark extends Animal
{
	private $frenzy = FALSE;

	public function __CONSTRUCT($name)
	{
		parent::__CONSTRUCT($name,0,Animal::FISH);
		echo "A KILLER IS BORN !\n";
	}


	public function smellBlood($bool)
	{
		$this->frenzy = $bool;
	}


	public function status()
	{
		$status = ($this->frenzy) ? "$this->name is smelling blood and wants to kill" : "$this->name is swimming peacefully";
		echo "$status.\n";
	}

}
?>