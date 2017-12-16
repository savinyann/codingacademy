<?php
namespace planet\moon;
{
	include_once "Team.php";
	
	class Phobos
	{
		private $mars;


		public function __construct($mars)
		{
			if(gettype($mars) == "object" && get_class($mars) == "planet\Mars")
			{
				$this->mars = $mars;
				echo "Phobos placed in orbit.\n";
			}
			else
			{
				echo "No planet given.\n";
			}
		}


		public function getMars()
		{
			return($this->mars);
		}
	}
}
?>