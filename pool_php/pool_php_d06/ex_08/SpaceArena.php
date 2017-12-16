<?php
include_once 'TacticalMarine.php';
include_once 'AssaultTerminator.php';
include_once 'RadScorpion.php';
include_once 'SuperMutant.php';

class SpaceArena
{
	private $registered_AMonster = array();
	private $registered_AMarine = array();
	private $_idMonster = 0;
	private $_idMarine = 0;


	public function enlistMonsters($array)
	{
		foreach ($array as $value)
		{
			if(is_object($value) && is_a($value, "AMonster"))
			{
				$this->registered_AMonster[$this->_idMonster] = $value;
				$this->_idMonster++;
			}
			else
			{
				throw new Exception('Stop trying to cheat!');
			}
		}
	}


	public function enlistSpaceMarines($array)
	{
		foreach ($array as $value)
		{
			if(is_object($value) && is_a($value, "ASpaceMarine"))
			{
				if(!in_array($value, $this->registered_AMarine))
				{
					$this->registered_AMarine[$this->_idMarine] = $value;
					$this->_idMarine++;
				}
			}
			else
			{
				throw new Exception('Stop trying to cheat!');
			}
		}
	}


	public function fight()
	{
		$id_marine = 0;
		$id_monster = 0;
		$marine_fighter = NULL;
		$monster_fighter = NULL;
		if($this->_idMonster == 0)
		{
			echo "No monster available to fight.\n";
			return(FALSE);
		}
		if($this->_idMarine == 0)
		{
			echo "Those cowards ran away.\n";
			return(FALSE);
		}
		while ($marine_fighter == NULL)
		{
			if($this->registered_AMarine[$id_marine]->getAlive())
			{
				$marine_fighter = $this->registered_AMarine[$id_marine];
				echo $marine_fighter->getName()." has entered the arena.\n";
			}
			else
			{
				$id_marine++;
			}
		}
		while ($monster_fighter == NULL)
		{
			if($this->registered_AMonster[$id_monster]->getAlive())
			{
				$monster_fighter = $this->registered_AMonster[$id_monster];
				echo $monster_fighter->getName()." has entered the arena.\n";
			}
			else
			{
				$id_monster++;
			}
		}
		while(1)
		{
			$marine_fighter = $this->new_fighter($marine_fighter,$this->registered_AMarine[$id_marine]);
			$monster_fighter = $this->new_fighter($monster_fighter,$this->registered_AMonster[$id_monster]);

			$marine_fighter->attack($monster_fighter);
			$monster_fighter->attack($marine_fighter);

			if(!$marine_fighter->getAlive())
			{
				$id_marine++;
				$monster_fighter->recoverAP();
				if($id_marine >= $this->_idMarine)
				{
					echo "The monsters are victorious.\n";
					return;
				}
			}
			if(!$monster_fighter->getAlive())
			{
				$id_monster++;
				$marine_fighter->recoverAP();
				if($id_monster >= $this->_idMonster)
				{
					echo "The spaceMarines are victorious.\n";
					return;
				}
			}
		}
	}

	
	private function new_fighter($fighter,$replace)
	{
		if($fighter != $replace)
		{
			echo $replace->getName()." has entered the arena.\n";
			return($replace);
		}
		else
		{
			return($fighter);
		}
	}
}
?>