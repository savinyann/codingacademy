<?php
include_once "IUnit.php";

abstract class ASpaceMarine implements IUnit
{
	protected $name;
	protected $hp = 0;
	protected $ap = 0;
	protected $weapon;
	protected $isCloseTo;
	protected $alive = TRUE;	

	public function __construct($name)
	{
			$this->name = $name;
	}


	abstract public function destruct();


	public function getName()
	{
		return($this->name);
	}


	public function getHp()
	{
		return($this->hp);
	}


	public function getAp()
	{
		return($this->ap);
	}


	public function getWeapon()
	{
		return($this->weapon);
	}


	public function equip($weapon)
	{
		if($this->alive)
		{
			if(is_object($weapon) && is_a($weapon, "AWeapon"))
			{
				if(!$weapon->getIsEquiped())
				{
					echo "$this->name has been equipped with a ".$weapon->getName().".\n";
					$this->weapon = $weapon;
					$weapon->setIsEquiped($this);
				}
			}
			else
			{
				throw new Exception('Error in ASpaceMarine. Parameter is not an AWeapon.');
			}
		}
		else
		{
			return(FALSE);
		}
	}


	public function attack($target)
	{
		if(!is_object($target) || !in_array("IUnit", class_implements($target)))
		{
			throw new Exception('Error in ASpaceMarine. Parameter is not an IUnit.');	
		}
		if(!$this->alive || $target == $this)
		{
			return(FALSE);
		}
		if($this->weapon)
		{
			if($this->weapon->isMelee() && $this->isCloseTo != $target)
			{
				echo "$this->name: I'm too far away from ".$target->getName().".\n";
			}
			else
			{
				if($this->ap >= $this->weapon->getApcost())
				{
					echo "$this->name attacks ".$target->getName()." with a ".$this->weapon->getName().".\n";
					$this->weapon->attack();
					$this->ap -= $this->weapon->getApcost();
					$target->receiveDamage($this->weapon->getDamage());
				}		
			}
		}
		else
		{
			echo "$this->name: Hey, this is crazy. I'm not going to fight this empty handed.\n";
		}
	}


		public function receiveDamage($damage)
	{
		if($this->alive)
		{
			$this->hp -= $damage;
			$this->alive = ($this->hp > 0) ? TRUE : FALSE;
			$this->destruct();
		}
		else
		{
			return(FALSE);
		}
	}


	public function moveCloseTo($target)
	{	
		if(!is_object($target) || !in_array("IUnit", class_implements($target)))
		{
			throw new Exception('Error in ASpaceMarine. Parameter is not an IUnit.');	
		}
		if(!$this->alive || $target == $this)
		{
			return(FALSE);
		}
		if(in_array("IUnit", class_implements($target)))
		{
			if($this->isCloseTo != $target)
			{
				echo "$this->name is moving closer to ".$target->getName().".\n";
				$this->isCloseTo = $target;
			}
		}
	}


	public function recoverAP()
	{
		if($this->alive)
		{
			$this->ap = ($this->ap < 41) ? $this->ap + 9 : 50;
		}
		else
		{
			return(False);
		}
	}
}
?>