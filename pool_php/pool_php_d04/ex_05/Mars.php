<?php
namespace chocolate;
{
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
}


namespace planet;
{
	class Mars
	{
		private $_size;

		public function __construct($size = NULL)
		{
			$this->_size = $size;
		}

		public function getSize()
		{
			return($this->_size);
		}

		public function setSize($size)
		{
			$this->_size = $size;
		}
	}
}
?>