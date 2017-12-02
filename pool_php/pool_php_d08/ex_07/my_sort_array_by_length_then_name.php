<?php
function my_sort_array_by_length_then_name($array)
{
$sort_array = array();
$strlen = array();
$sorted_array = array();

foreach ($array as $value)
{
	$sort_array[strlen($value)][] = $value;
	$strlen[strlen($value)] = strlen($value);
}
foreach($strlen as $value)
{
	asort($sort_array[$value]);
}

foreach ($strlen as $value)
{
	foreach ($sort_array[$value] as $val)
	{
		$sorted_array[] = $val;
	}
}
	return($sorted_array);
}
?>