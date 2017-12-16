<?php
include_once 'Shark.php';

class GreatWhite extends Shark
{
	public function __CONSTRUCT($name)
	{
		parent::__CONSTRUCT($name);
	}



	public function eat($animal)
	{
		if(gettype($animal) == "object" && (get_class($animal) == "Animal" || get_parent_class($animal) == "Animal") && get_class($animal) != "Canary" && $animal != $this)
		{
			echo "$this->name ate a ".$animal->getType()." named ".$animal->getName().".\n";
			$this->frenzy = 0;
		}
		elseif(gettype($animal) && get_class($animal) == "Canary")
		{
			echo "$this->name: Next time you try to give me that to eat, I'll eat you instead.\n";
		}
		elseif (gettype($animal) == "object" && (get_parent_class($animal) == "Shark" || get_class($animal) == "Shark") && $animal != $this)
		{
			echo "$this->name: The best meal one could wish for.\n";
		}
		else
		{
			echo "$this->name: It's not worth my time.\n";
		}
	}
}
?>