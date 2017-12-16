<?php
include_once "Mars.php";

class Astronaut
{
	private static $id = 0;

	private $_name;
	private $_snack = 0;
	private $_destination = NULL;
	private $_id;


	public function __construct($name)
	{
		$this->_id = self::$id;
		self::$id++;
		$this->_name = $name;
		echo "$this->_name ready for launch !\n";
	}



	public function __destruct()
	{
		if($this->_destination)
		{
			echo "$this->_name: Mission aborted !\n";
		}
		else
		{
			echo "$this->_name: I may have done nothing, but I have $this->_snack Mars to eat at least !\n";
		}
	}


	public function getId()
	{
		return($this->_id);
	}


	public function getDestination()
	{
		return($this->_destination);
	}


	public function getSnacks()
	{
		return($this->_snack);
	}

	public function doActions($action = "Nothing")
	{
		switch ($action)
		{
			case gettype($action) == "object" && get_class($action) == "planet\Mars":
				echo "$this->_name: started a mission !\n";
				$this->_destination = $action;
				break;
			
			case gettype($action) == "object" && get_class($action) == "chocolate\Mars":
				echo "$this->_name is eating mars number ".$action->getId().".\n";
				$this->_snack++;
				break;

			case "Nothing":
				echo "$this->_name: Nothing to do.\n";
				break;

			default:
			break;
			}
	}
}
?>