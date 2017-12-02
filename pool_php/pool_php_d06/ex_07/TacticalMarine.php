<?php
include_once "PlasmaRifle.php";
include_once "ASpaceMarine.php";

class TacticalMarine extends ASpaceMarine
{
	public function __construct($name)
	{
		parent::__construct($name);
		echo "$this->name on duty.\n";
		parent::equip(new PlasmaRifle);
		$this->hp = 100;
		$this->ap = 20;
	}	


	public function destruct()
	{
		echo ($this->alive) ? "" : "$this->name the Tactical Marine has fallen !\n";
	}


		public function receiveDamage($damage)
	{
		parent::receiveDamage($damage);
	}
}
?>