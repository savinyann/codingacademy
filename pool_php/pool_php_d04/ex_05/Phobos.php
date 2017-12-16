<?php
namespace planet\moon;
{
	include_once 'Mars.php';
	class Phobos
	{
		private $_mars;


		public function __construct($mars)
		{
			if(gettype($mars) == "object" && get_class($mars) == "planet\Mars")
			{
				$this->_mars = $mars;
				echo "Phobos placed in orbit.\n";
			}
			else
			{
				echo "No planet given.\n";
			}
		}


		public function getMars()
		{
			return($this->_mars);
		}
	}
}
?>