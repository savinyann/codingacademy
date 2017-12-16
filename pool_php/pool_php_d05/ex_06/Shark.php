<?php
include_once 'Animal.php';
include_once 'BlueShark.php';
include_once 'GreatWhite.php';

class Shark extends Animal
{
	protected $frenzy = FALSE;

	public function __CONSTRUCT($name)
	{
		parent::__CONSTRUCT($name,0,Animal::FISH);
		echo "A KILLER IS BORN !\n";
	}


	public function smellBlood($bool)
	{
		$this->frenzy = (is_bool($bool)) ? $bool : $this->frenzy;
	}


	public function status()
	{
		$status = ($this->frenzy) ? "$this->name is smelling blood and wants to kill" : "$this->name is swimming peacefully";
		echo "$status.\n";
	}


	public function eat($animal)
	{
		if(gettype($animal) == "object" && (get_class($animal) == "Animal" || get_parent_class($animal) == "Animal") && $animal != $this)
		{
			echo "$this->name ate a ".$animal->getType()." named ".$animal->getName().".\n";
			$this->frenzy = 0;
		}
		else
		{
			echo "$this->name: It's not worth my time.\n";
		}
	}

}
?>