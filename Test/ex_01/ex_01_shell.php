<?php
for ($i=1; $i <= 10; $i++) 
{
	for ($j=1; $j <= 10; $j++) 
	{ 
		echo ($j != 10) ? $i*$j."\t" : $i*$j;
	}
	echo "\n";
}
?>