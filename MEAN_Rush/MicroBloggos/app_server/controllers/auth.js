var userModel = require('./../models/users')
var CheckInput = require('./../module/checkInput').CheckInput
var bcrypt = require('bcrypt')

async function register(request, response)
{
	form = request.body
	error = {}
	isError = false
	checkInput = new CheckInput(form, 'name', 'password', 'confirm','email')
	checkInput = checkInput.InputChecked

	Object.keys(checkInput).forEach(function(test)
	{
		if(checkInput[test] != true)
		{
			error[test] = checkInput[test]
			isError = true
		}
	})
	if(isError == true)
	{
		response.status(400).send(error).end()
	}
	else
	{
		var userMailAlreadyExists = await userModel.UserMailAlreadyExists(form)
		if(userMailAlreadyExists.length != 0)
		{
			console.log(userMailAlreadyExists)
			response.status(400).send({error : 'Email is already used'}).end()
		}
		else
		{
			userModel.UserNameAlreadyExists(form, response)
		}
	}
}

function login(request, response)
{
	user = request.body
	error = {}
	isError = false
	checkInput = new CheckInput(user, 'email', 'password')
	checkInput = checkInput.InputChecked

	Object.keys(checkInput).forEach(function(test)
	{
		if(checkInput[test] != true)
		{
			error[test] = checkInput[test]
			isError = true
		}
	})

	if(isError == true)
	{
		response.status(400).send(error).end()
		return
	}
	userModel.readUser(user, response)
}

module.exports=
{
	register:register,
	login:login,
}