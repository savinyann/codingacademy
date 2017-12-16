<?php
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

	public function getId()
	{
		return($this->_id);
	}

	public function getDestination()
	{
		return($this->_destination);
	}

}
?>