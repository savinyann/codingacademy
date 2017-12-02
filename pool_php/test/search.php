<?php
include_once "class_query.php";
include_once "form_generator.php";

	$column = array();
	$query = "DESC products";
	$SQL = new Query($query);
	$fields = $SQL->SQLquery();
	foreach ($fields as $key => $value)
	{
		if($value["Field"] == "category_id")
		{
			$value["Type"] = "var";
			$value["Field"] = "category";

		}
		if($value["Field"] != "picture" && substr($value["Field"],-2) != "id")
		{
			$column[substr($value["Type"],0,3)."_".$value["Field"]] = strtoupper(substr($value["Field"],0,1)).substr($value["Field"],1);
		}
	}
	new Form($column, "Search !");
?>