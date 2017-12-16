<?php
include_once "Astronaut.php";

class Team
{
	private $_name;
	private $_astronaut_team = array();
	private $_id = 0;

	public function __construct($name)
	{
		$this->_name = $name;
	}


	public function getAstronauts()
	{
		return($this->_astronaut_team);
	}


	public function getName()
	{
		return($this->_name);
	}


	public function add($astronaut)
	{
		if(gettype($astronaut) == "object" && get_class($astronaut) == "Astronaut")
		{
			if(!in_array($astronaut, $this->_astronaut_team))
				{
					$this->_astronaut_team[$this->_id] = $astronaut;
					$this->_id++;
				}
		}
		else
		{
			echo "$this->_name: Sorry, you are not part of the team.\n";
		}
	}


	public function remove($astronaut)
	{
		unset($this->_astronaut_team[array_search($astronaut, $this->_astronaut_team)]);
		foreach($this->_astronaut_team as $key => $value)
		{
			if($value == $astronaut)
			{
				unset($this->_astronaut_team[$key]);
			}
		}	
	}


	public function countMembers()
	{
		$count = 0;
		foreach ($this->_astronaut_team as $key => $value)
		{
			$count++;
		}
		return($count);
	}



	public function showMembers()
	{
		$count=0;
		$Member_state = "";
		foreach ($this->_astronaut_team as $value)
		{
			$Member_state.= ($count != 0) ? "," : "";
			if($value->getDestination())
			{
				$Member_state.= " ".$value->getName()." on mission";
			}
			else
			{
				$Member_state.= " ".$value->getName()." on standby";
			}
			$count = 1;
		}
		if($count != 0)
		{
		echo "$this->_name:$Member_state.\n";
		}
	}
}
?>