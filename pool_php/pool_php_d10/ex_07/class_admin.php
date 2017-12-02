<?php
include_once("create_form.php");

class Admin
{
	public function add_user()
	{
		$add_user["username"] = "Name";
		$add_user["email"] = "Email";
		$add_user["password"] = "Password";
		$add_user["password_confirmation"] = "Password Confirmation";
		create_form($add_user, "Add user");
	}
	
	public function del_user()
	{
		
	}
	
	public function mod_user()
	{
		
	}
	
	public function show_user()
	{
		
	}


	public function add_prod()
	{
		
	}
	
	public function del_prod()
	{
		
	}
	
	public function mod_prod()
	{
		
	}
	
	public function show_prod()
	{
		
	}
}
>?