<?php
class Form
{
	public function __construct($array = array(), $submit, $action = NULL)
	{
		echo '<div class="login">';


		echo '<form action="'.$action.'" method="post">';
		foreach ($array as $key => $value)
		{
			if($key == "password" || $key == "password_conf")
			{
				echo '<label for='.$key.'>'.$value.'</label><input type="password" class="form-control" name='.$key.' id='.$key.' required/></p>';
			}
			else
			{
				echo '<label for='.$key.'>'.$value.'</label><input type="text" class="form-control" name='.$key.' id='.$key.' required/>';
			}
		}
		echo '<div><button class="btn btn-lg btn-primary btn-block" type="submit">'.$submit.'</button></div></form></div>';
	}
}
?>
