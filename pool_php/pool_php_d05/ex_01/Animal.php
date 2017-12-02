<?php
class Animal
{
	const MAMMAL = 0;
	const FISH = 1;
	const BIRD = 2;
	private $name;
	private $legs;
	private $type;


	public function __CONSTRUCT($name, $nbr_legs, $type)
	{
		$this->name = $name;
		$this->legs = $nbr_legs;
		$this->type = $type;
		echo "My name is ".$this->getName()." and I am a ".$this->getType()." !\n";
	}


	public function getName()
	{
		return($this->name);
	}


	public function getLegs()
	{
		return($this->legs);
	}


	public function getType()
	{
		switch ($this->type)
		{
			case 0:
			return("mammal");
			break;

			case 1:
			return("fish");
			break;

			case 2:
			return("bird");
			break;
		}
		return($this->type);
	}


		public function setName($name)
	{
		$this->name = $name;
	}
}
?>