<?php

	$test = array();

	$test["alpha"]["alpha"] = "alphax2";
	//$test["alpha"] = "alpha";
	$test["beta"]["beta"] = "beta";
	var_dump(implode(" ",array_map(function($a){return(implode(" ", $a));},$test)));
	echo("\n");


?>