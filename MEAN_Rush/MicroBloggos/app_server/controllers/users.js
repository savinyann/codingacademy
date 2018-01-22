var userModel = require('./../models/users')
var CheckInput = require('./../module/checkInput').CheckInput
var bcrypt = require('bcrypt')

async function userReadAll(request, response)
{
	users = await userModel.readAllUsers()
	if(users.length == 0)
	{
		response.status(400).send({error: 'No users is registered'}).end()
	}
	else
	{
		response.status(200).send(users).end()
	}
}

function userReadOne(request, response)
{
	user = userModel.readUserID(request.params['userid'], response)
/*	if(user == [])
	{
		response.status(400).send({error : 'An error has occured'}).end()
	}
	else if(user.length == 0)
	{
		response.status(404).send({error : 'User not found'}).end()
	}
	else
	{
		response.status(200).send({user : user}).end()
	}
*/
}

async function userUpdateOne(request, response)
{
	form = request.body
	id = request.params['userid']
	error = {}
	isError = false
	checkInput = new CheckInput(form, 'name', 'password', 'confirm', 'old', 'email')
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
		if(userMailAlreadyExists.length != 0 && userMailAlreadyExists[0]['_id'] != id)
		{
			response.status(400).send({error : 'Email is already used'}).end()
		}
		else
		{
			userModel.UserEditedNameAlreadyExists(form, id, response)
		}
	}
}

function userDeleteOne(request, response)
{
	userModel.deleteUser(request.params['userid'], response)
}


 
/* EXPORTATION */
module.exports=
{
	usersReadAll:userReadAll,
	usersReadOne:userReadOne,
	usersUpdateOne:userUpdateOne,
	usersDeleteOne:userDeleteOne,
}