<?php

class FormGenerator
{
	public function __construct()
	{
	}


	public static function form($array = array(), $submit = "Submit", $action = NULL, $default = NULL)
	{
		$val = array();
		$textarea = array();

		$form = '<form action="'.$action.'" method="post" id="form">';
		foreach ($array as $key => $value)
		{
			$val["$key"] = (isset($default[$key]) ? $default[$key] : ""); // Allow FormGenerator to put defautl value in input


			if(is_array($value))						// type select/option
			{
				$form .= '<label for='.$key.'>'.ucfirst($key).'</label><select name='.$key.' id='.$key.'>';
				foreach ($value as $subkey => $subvalue)
				{
					$form .= '<option value='.$subvalue[0].'>'.$subvalue[1].'</option>';
				}
				$form .= '</select>';
			}
			else if(strpos($key, "password") !== FALSE)	// type password
			{
				$form .= '<label for='.$key.'> '.$value.': </label><input type="password" placeholder='.$value.' class="form-control" name='.$key.' id='.$key.' value="'.$val[$key].'">';
				echo($val[$key]);
			}
			else if(strpos($key, "content") !== FALSE)	//type textarea
			{
				$textarea[$key] = $value;
				// Add this after. textarea has to be out of <form>
			}
			else										// type text
			{
				$form .= '<label for='.$key.'> '.$value.': </label><input type="text" placeholder='.$value.' class="form-control" name='.$key.' id='.$key.' value="'.$val[$key].'">';		
			}
		}
		$form .= '<div><button class="btn btn-lg btn-primary btn-block" type="submit">'.$submit.'</button></div></form>';

		foreach ($textarea as $key => $value)			// type textarea #2
		{
			$form .='<label for='.$key.'>'.$value.': </label><textarea placeholder='.$value.' name='.$key.' form="form">'.$val[$key].'</textarea>';
		}
		
		return($form);
	}
}
?>
