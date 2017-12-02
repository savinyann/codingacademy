<?php
include_once "Mars.php";

class Astronaut
{
	private static $main_id = 0;

	private $name;
	private $snack = 0;
	private $destination = NULL;
	private $id;


	public function __construct($name)
	{
		$this->id = self::$main_id;
		self::$main_id++;
		$this->name = $name;
		echo "$this->name ready for launch !\n";
	}



	public function __destruct()
	{
		if($this->destination)
		{
			echo "$this->name: Mission aborted !\n";
		}
		else
		{
			echo "$this->name: I may have done nothing, but I have $this->snack Mars to eat at least !\n";
		}
	}


	public function getName()
	{
		return($this->name);
	}

	public function getId()
	{
		return($this->id);
	}


	public function getDestination()
	{
		return($this->destination);
	}


	public function getSnacks()
	{
		return($this->snack);
	}

	public function doActions($action = "Nothing")
	{
		
		switch ($action)
		{
			case gettype($action) == "object" && get_class($action) == "planet\Mars":
				echo "$this->name: started a mission !\n";
				$this->destination = $action;
				break;
			
			case gettype($action) == "object" && get_class($action) == "chocolate\Mars";
				echo "$this->name is eating mars number ".$action->getId().".\n";
				$this->snack++;
				break;

			case "Nothing":
				echo "$this->name: Nothing to do.\n";
				break;

			default:
			break;
			}
	}
}
?>