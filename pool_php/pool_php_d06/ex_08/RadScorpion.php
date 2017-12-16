<?php
include_once "AMonster.php";

class RadScorpion extends AMonster
{
	protected static $static_id = 1;
	protected $id;

	public function __construct()
	{
		parent::__construct("RadScorpion #".RadScorpion::$static_id);
		$this->hp = 80;
		$this->ap = 50;
		$this->damage = 25;
		$this->apcost = 8;
		RadScorpion::$static_id++;
		echo "$this->name: Crrr!\n";
	}

	public function destruct()
	{
		echo ($this->alive) ? "" : "$this->name: SPROTCH!\n";
	}


	public function attack($target)
	{
		if(is_object($target) && !is_a($target, "AssaultTerminator"))
		{
			$this->damage *= 2;
		}
		parent::attack($target);
		$this->damage = 25;
	}
}
?>