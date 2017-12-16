<?php

abstract class AWeapon
{
	protected $name;
	protected $apcost;
	protected $damage;
	protected $isEquiped = FALSE;
	protected $melee = FALSE;


	public function __construct($name, $apcost, $damage)
	{
		if(is_string($name) && is_integer($apcost) && is_integer($damage))
		{
			$this->name = $name;
			$this->apcost = $apcost;
			$this->damage = $damage;
		}
		else
		{
			throw new Exception('Error in AWeapon constructor. Bad parameters');
		}
	}


	public function getName()
	{
		return($this->name);
	}


	public function getApcost()
	{
		return($this->apcost);
	}


	public function getDamage()
	{
		return($this->damage);
	}


	public function isMelee()
	{
		return($this->melee);
	}


	public function setIsEquiped($SpaceMarine)
	{
		$this->isEquiped = $SpaceMarine;
	}


	public function getIsEquiped()
	{
		return($this->isEquiped);
	}

	abstract public function attack();
}
?>