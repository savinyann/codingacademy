<?php
include_once 'Shark.php';

class BlueShark extends Shark
{
	public function __CONSTRUCT($name)
	{
		parent::__CONSTRUCT($name);
	}


	public function eat($animal)
	{
		if(gettype($animal) == "object" && (get_class($animal) == "Animal" || get_parent_class($animal) == "Animal") && $animal->getType() == "fish" && $animal != $this)
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