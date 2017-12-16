<?php
include_once "ASpaceMarine.php";
include_once "PowerFist.php";

class AssaultTerminator extends ASpaceMarine
{
	public function __construct($name)
	{
		parent::__construct($name);
		echo "$this->name has teleported from space.\n";
		parent::equip(new PowerFist);
		$this->hp = 150;
		$this->ap = 30;
	}


	public function destruct()
	{
		echo ($this->alive) ? "" : "BOUUUMMMM ! $this->name has exploded.\n";
	}
}
?>