<?php
namespace chocolate;
{
	include_once "Phobos.php";

	class Mars
	{
		private static $main_id = 0;
		private $id;

		public function __construct()
		{
			$this->id = self::$main_id;
			self::$main_id++;
		}

		public function getId()
		{
			return($this->id);
		}
	}
}


namespace planet;
{
	include_once "Phobos.php";
	
	class Mars
	{
		private $size;

		public function __construct($size = NULL)
		{
			$this->size = $size;
		}

		public function getSize()
		{
			return($this->size);
		}

		public function setSize($size)
		{
			$this->size = $size;
		}
	}
}
?>