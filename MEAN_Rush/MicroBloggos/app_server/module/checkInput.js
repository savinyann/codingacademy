class CheckInput
{
	constructor(Input, ...keys)
	{
		this.InputChecked = {}
		var CheckInput = this
		CheckInput.InputChecked['keys'] = CheckInput.CheckKeys(keys, Input)
		Object.keys(Input).forEach(function(key)
		{
			if(key == 'name')
				CheckInput.InputChecked['name'] = (CheckInput.CheckName(Input['name']))
			if(key == 'email')
				CheckInput.InputChecked['email'] = (CheckInput.CheckEmail(Input['email']))
			if(key == 'password')
				CheckInput.InputChecked['password'] = (CheckInput.CheckPassword(Input['password']))
			if(key == 'confirm')
				CheckInput.InputChecked['confirm'] = (CheckInput.CheckConfirm(Input['password'],Input['confirm']))
			if(key == 'old')
				CheckInput.InputChecked['old'] = (CheckInput.CheckOld(Input['old']))
			if(key == 'message')
				CheckInput.InputChecked['message'] = (CheckInput.CheckMessage(Input['message']))
			if(key == 'id')
				CheckInput.InputChecked['id'] = (CheckInput.CheckId(Input['id']))
		})
	}

	CheckKeys(keys, input)
	{
		var keyExist = true
		var missingKey = {}
		keys.forEach(function(key)
		{
			if(!Object.keys(input).includes(key))
			{
				missingKey[key] = key + ' is not set'
				keyExist = false
			}
		})
		return((keyExist) ? keyExist : missingKey)
	}

	CheckName(Name)
	{
		if(Name.length == "")
			return('Name is required')
		if(Name.length < 3)
			return('Name is too shord')
		return(true)
	}

	CheckEmail(Email)
	{
		if(Email == "")
			return('Email is required')
		if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(Email) == false)
			return('Invalid Email')
		return(true)
	}

	CheckPassword(Password)
	{
		if(Password == "")
			return('Password is required')
		if(Password.length < 6)
			return('Password is too short')
		return(true)
	}

	CheckConfirm(Password, Confirm)
	{
		if(Password != Confirm)
			return("Password does not match with Password Confirmation")
		return(true)
	}

	CheckOld(Old)
	{
		if(Old == "")
			return('Old Password is required')
		if(Old.length < 6)
			return('Old Password is too short')
		return(true)
	}

	CheckMessage(Message)
	{
		if(Message == "")
			return('Message is required')
		if(Message.length > 140)
			return('Message is too long')
		return(true)
	}

	CheckId(Id)
	{
		if(Id == "")
			return('Id is required')
		return(true)
	}
}


module.exports={CheckInput:CheckInput}