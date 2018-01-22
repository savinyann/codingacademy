var mongoose = require('mongoose')
var db = require('./db')

var messageSchema = mongoose.Schema(
{
	author_id: String,
	message : String,
	creationDate : { type: Date, default: Date.now},
	updatedDate : { type: Date, default: null},
	hashtag : {type: Array, default: []}
})

var Message = mongoose.model('message', messageSchema)

function createMessage(message, response)
{
	var newMessage= new Message(
	{
		author_id : message['id'],
		message : message['message'],
		hashtag : message['hashtag'],
	})

	newMessage.save(function(error, message)
	{
		if(error)
		{
			response.status(400).send({error: error}).end()
		}
		else
		{
			response.status(200).send(message)
		}
	})
}

function readMessage(id, response)
{
	Message.find({author_id : id}, function(error, messageDB)
	{
		if(error)
		{
			response.status(400).send({error : error}).end()
		}
		else
		{
			response.status(200).send(messageDB).end()
		}
	})
}

function readMessageFromFollowing(user, following, response)
{
	Message.find({}).where('author_id').in(user['following']).select('message author_id').exec(function(error, messages)
	{
		if(error)
		{
			response.status(400).send({error : error}).end()
		}
		else
		{
			var messagesToSend = []
			following.forEach(function(follow)
			{

				var index = messagesToSend.push({author_id : follow['_id'], author : follow['name'], message : []})

				let isBlocked = false
				follow['blocked'].forEach(function(element)
				{
					isBlocked = (element == user['id']) ? true : isBlocked
				})

				if(!isBlocked)
				{
					messages.forEach(function(message)
					{
						if(message['author_id'] == follow['_id'])
						{
							messagesToSend[index-1]['message'].push(message['message'])
						}
					})
				}
			})
			response.status(200).send(messagesToSend).end()
		}
	})
}

function readMessageFromHashtag(hashtag, response)
{
	Message.find({'hashtag' : hashtag}, function(error, messages)
	{
		if(error)
		{
			response.status(404).send({error : error}).end()
		}
		else
		{
			response.status(200).send(messages).end()
		}
	})
}

function updateMessage(message, response)
{
	date = new Date
	Message.update({'_id' : message['_id']}, {'$set' : {'message' : message['message'], 'updatedDate' : date, hashtag : message['hashtag']}}, function(error)
	{
		if(error)
		{
			response.status(400).send({error : error}).end()
		}
		else
		{
			response.status(200).send({ok : 'message has been updated'}).end()
		}
	})
}

function deleteMessage(author, message, response)
{
	Message.find({'_id' : message}, function(error, message)
	{
		if(error)
		{
			response.status(400).send({error : error}).send()
		}
		else if(message[0]['author_id'] != author)
		{
			response.status(404).send({error : "This is not your message"}).end()
		}
		else
		{
			Message.remove({ '_id' : message }, function(error)
			{
				if(error)
				{
					response.status(400).send({error : error}).end()
				}
				else
				{
					response.status(200).send({ok : 'Message deleted'}).end()
				}
			})
		}
	})
}

module.exports=
{
	createMessage:createMessage,
	readMessage:readMessage,
	readFollowing:readMessageFromFollowing,
	readHashtag:readMessageFromHashtag,
	updateMessage:updateMessage,
	deleteMessage:deleteMessage,
}