<?php
include_once 'AWeapon.php';

class PlasmaRifle extends AWeapon
{
	public function __construct()
	{
		parent::__construct('Plasma Rifle', 5, 21);
	}


	public function attack()
	{
		echo "PIOU\n";
	}
}
?>