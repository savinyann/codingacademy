<?php
class Animal
{
	public static $numberOfAnimalsAlive = 0;
	public static $numberOfMammals = 0;
	public static $numberOfFishes = 0;
	public static $numberOfBirds = 0;
	const MAMMAL = 0;
	const FISH = 1;
	const BIRD = 2;
	private $name;
	private $legs;
	private $type;


		public static function getNumberOfAnimalsAlive()
	{
		$s = (self::$numberOfAnimalsAlive < 2) ? "" : "s";
		$v = (self::$numberOfAnimalsAlive < 2) ? "is" : "are";
		echo "There $v currently ".self::$numberOfAnimalsAlive." animal$s alive in our world.\n";
		return self::$numberOfAnimalsAlive;
	}


		public static function getNumberOfMammals()
	{
		$s = (self::$numberOfMammals < 2) ? "" : "s";
		$v = (self::$numberOfMammals < 2) ? "is" : "are";
		echo "There $v currently ".self::$numberOfMammals." mammal$s alive in our world.\n";
		return self::$numberOfMammals;
	}


		public static function getNumberOfFishes()
	{
		$s = (self::$numberOfFishes < 2) ? "" : "es";
		$v = (self::$numberOfFishes < 2) ? "is" : "are";
		echo "There $v currently ".self::$numberOfFishes." fish$s alive in our world.\n";
		return self::$numberOfFishes;
	}


		public static function getNumberOfBirds()
	{
		$s = (self::$numberOfBirds < 2) ? "" : "s";
		$v = (self::$numberOfBirds < 2) ? "is" : "are";
		echo "There $v currently ".self::$numberOfBirds." bird$s alive in our world.\n";
		return self::$numberOfBirds;
	}


	public function __CONSTRUCT($name, $nbr_legs, $type)
	{
		$this->name = $name;
		$this->legs = $nbr_legs;
		$this->type = $type;
		echo "My name is ".$this->getName()." and I am a ".$this->getType()." !\n";
		self::$numberOfAnimalsAlive++;
		switch ($type)
		{
			case 0:
			self::$numberOfMammals++;
			break;
			
			case 1:
			self::$numberOfFishes++;
			break;
			
			case 2:
			self::$numberOfBirds++;
			break;
		}
	}


	public function __DESTRUCT()
	{
		self::$numberOfAnimalsAlive--;
		switch ($this->type)
		{
			case 0:
			self::$numberOfMammals--;
			break;
			
			case 1:
			self::$numberOfFishes--;
			break;
			
			case 2:
			self::$numberOfBirds--;
			break;
		}
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

			default:
			return "inconnu";
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