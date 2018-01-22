var messageModel = require('./../models/message')
var CheckInput = require('./../module/checkInput').CheckInput

function createMessage(request, response)
{
	form = request.body
	error = {}
	isError = false
	checkInput = new CheckInput(form, 'message', 'id')
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
		messageModel.createMessage(form, response)
	}
}

function readMessage(request, response)
{
	id = request.params['userid']
	messageModel.readMessage(request.params['userid'],response)
}

function updateMessage(request, response)
{
	id = request.params['userid']
	message = request.body
	error = {}
	isError = false

	checkInput = new CheckInput(message, 'message', '_id', 'author_id')
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
		messageModel.updateMessage(message, response)
	}
}


function deleteMessage(request, response)
{
	author_id = request.params['userid']
	message_id = request.params['messageid']
	messageModel.deleteMessage(author_id, message_id, response)
}

function readHashtag(request, response)
{
	messageModel.readHashtag('#'+request.params['hashtag'], response)
}

module.exports=
{
	create:createMessage,
	read:readMessage,
	update:updateMessage,
	delete:deleteMessage,
	hashtag:readHashtag
}

/*
{
	"_id" : ObjectId("5a5772e0144f78336d43b274"),
	"author_id" : "5a55e0add66c2c1769adde3b",
	"message" : "I like myself.",
	"__v" : 0
}

'{"_id" : "5a5772e0144f78336d43b274","author_id" : "5a55e0add66c2c1769adde3b","message" : "I like myself."}'
*/