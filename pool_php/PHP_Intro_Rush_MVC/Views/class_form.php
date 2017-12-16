<?php
class Form
{
	public function __construct($array = array(), $submit = "Submit", $action = NULL)
	{

		echo '<form action="'.$action.'" method="post">';
		foreach ($array as $key => $value)
		{
			echo '<label for='.$key.'> '.$value.': </label><input type="text" class="form-control" name='.$key.' id='.$key.' />';
		}
		echo '<div><button class="btn btn-lg btn-primary btn-block" type="submit">'.$submit.'</button></div></form>';
	}
}
?>
