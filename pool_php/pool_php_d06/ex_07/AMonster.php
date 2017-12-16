<?php
include_once "IUnit.php";

abstract class AMonster implements IUnit
{
	protected $name;
	protected $hp = 0;
	protected $ap = 0;
	protected $damage = 0;
	protected $apcost = 0;
	protected $alive = TRUE;
	protected $isCloseTo;

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


	public function getDamage()
	{
		return($this->damage);
	}


	public function equip($equip = NULL)
	{
		if($this->alive)
		{
			echo "Monsters are proud and fight with their own bodies.\n";
		}
		else
		{
			return(FALSE);
		}
	}


	public function attack($target)
	{
		if(!$this->alive || $target == $this)
		{
			return(FALSE);
		}
		if(is_object($target) && in_array("IUnit", class_implements($target)))
		{
			if($this->isCloseTo == $target)
			{
				if($this->ap >= $this->apcost)
				{
					echo "$this->name attacks ".$target->getName().".\n";
					$this->ap -= $this->apcost;
					$target->receiveDamage($this->damage);
				}
			}
			else
			{
				echo "$this->name: I'm too far away from ".$target->getName().".\n";
			}
		}
		else
		{
			throw new Exception('Error in AMonster. Parameter is not an IUnit');
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
		if(!$this->alive || $target == $this)
		{
			return(FALSE);
		}
		if(is_object($target) && in_array("IUnit", class_implements($target)))
		{
			if($this->isCloseTo != $target)
			{
				echo "$this->name is moving closer to ".$target->getName().".\n";
				$this->isCloseTo = $target;
			}
		}
		else
		{
			throw new Exception('Error in AMonster. Parameter is not an IUnit');
		}
	}


	public function recoverAP()
	{
		if($this->alive)
		{
			$this->ap = ($this->ap < 43) ? $this->ap + 7 : 50;
		}
		else
		{
			return(False);
		}
	}
}
?>