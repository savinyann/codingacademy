<?php
include_once "AMonster.php";

class SuperMutant extends AMonster
{
	protected static $static_id = 1;
	protected $id;

	public function __construct()
	{
		parent::__construct("SuperMutant #".SuperMutant::$static_id);
		$this->hp = 170;
		$this->ap = 20;
		$this->damage = 60;
		$this->apcost = 20;
		SuperMutant::$static_id++;
		echo "$this->name: Roaarrr !\n";
	}

	public function destruct()
	{
		echo ($this->alive) ? "" : "$this->name: Urgh!\n";
	}


	public function recoverAP()
	{
		if($this->alive)
		{
			parent::recoverAP();
			$this->hp = ($this->hp < 160) ? $this->hp + 10 : 170;

		}
	}
}
?>