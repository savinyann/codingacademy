<?php
namespace "chocolate"
class Mars
{
	private static $id = 0;
	private $_id;

	public function __construct()
	{
		$this->_id = self::$id;
		self::$id++;
	}

	public function getId()
	{
		return($this->_id);
	}
}
?>