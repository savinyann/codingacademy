import { MessageService } from '../message.service'
import { Component, OnInit } from '@angular/core'
import { FollowService } from '../follow.service'

@Component(
{
	selector: 'app-message',
	templateUrl: './message.component.html',
	styleUrls: ['./message.component.css']
})

export class MessageComponent implements OnInit
{
	hashtagMessages = []
	messages = []
	message = ""
	response = {}
	edit : any

	constructor(private followService : FollowService, private messageService : MessageService) { }

	ngOnInit()
	{
		this.getMessage()
	}

	checkEdit()
	{
		if(this.edit.message.length > 140)
		{
			this.edit.message = this.edit.message.substring(0,140)
		}
	}

	checkMessage()
	{
		if(this.message.length > 140)
		{
			this.message = this.message.substring(0,140)
		}
	}

	getMessage()
	{
		var echo = this
		var id = sessionStorage.MicroBloggos_ID
		//var id = localStorage.getItem('MicroBloggos_ID')

		this.messageService.readMessage(id).subscribe(function(messages)
		{
			//let refinedMessages = echo.prepareMessage(messages)
			echo.messages = messages
		})
	}

	placeInEdit(message)
	{
		this.edit = 
		{
			message : message['message'],
			_id: message['_id'],
			author_id : message['author_id'],
			creationDate : message['creationDate'],
			updatedDate : message['updatedDate'],
			index : this.messages.indexOf(message),
		}
	}

	newMessage()
	{
		var echo = this
		var message = {}
		message['message'] = this.message
		message['id'] = sessionStorage.MicroBloggos_ID
		//message['id'] = localStorage.getItem('MicroBloggos_ID')
		message['hashtag'] = this.parseMessage(this.message)
		this.messageService.newMessage(message).subscribe(function(response)
		{
			echo.response = response
			if(response['_id'])
			{
				echo.messages.push(response)
			}
		})
	}

	editMessage()
	{
		var echo = this
		this.edit['hashtag'] = this.parseMessage(this.edit['message'])
		this.messageService.editMessage(this.edit).subscribe(function(response)
		{
			echo.response = response
			if(response['ok'])
			{
				echo.messages[echo.edit['index']] = 
				{
					message : echo.edit['message'],
					_id : echo.edit['_id'],
					author_id : echo.edit['author_id'],
					creationDate : echo.edit['creationDate'],
					updatedDate : new Date()
				}
			echo.edit = null
			}
		})
	}

	deleteMessage(message)
	{
		var echo = this
		var removeMessage = 
		{
			message : message['message'],
			_id: message['_id'],
			author_id : message['author_id'],
			creationDate : message['creationDate'],
			updatedDate : message['updatedDate'],
			index : this.messages.indexOf(message),
		}
		this.messageService.deleteMessage(removeMessage).subscribe(function(response)
		{
			echo.response = response
			if(response['ok'])
			{
				echo.messages.splice(removeMessage['index'],1)
			}
		})
	}

	parseMessage(message)
	{
		var hashtag = []
		var messageParsed = message.split(" ")
		messageParsed.forEach(function(word)
		{
			if(word.substring(0,1) == "#")
			{
				hashtag.push(([".",",",";","?","!",":","/"].includes(word.substring(word.length-1))) ? word.substring(0,word.length-1).toLowerCase() : word.toLowerCase())
			}
		})
		return(hashtag)
	}

	prepareMessage(messages)
	{
		var preparedMessages = []
		messages.forEach(function(message)
		{
			let preparedWords = []
			let preparedMessage = message
			let messageParsed = message['message'].split(" ")

			messageParsed.forEach(function(word)
			{
				preparedWords.push((word.substring(0,1) == "#") ? '<a href="#">'+word+'</a>' : word)
			})

			preparedMessage['message'] = preparedWords.join(" ")
			preparedMessages.push(preparedMessage)
		})
		return(preparedMessages)
	}

	getHashtag(word)
	{
		if(word == "")
			return
		word = (word.substring(0,1) == "#") ? word.substring(1) : word
		word = ([".",",",";","?","!",":","/"].includes(word.substring(word.length-1))) ? word.substring(0,word.length-1).toLowerCase() : word.toLowerCase()
		var echo = this
		this.messageService.getHashtag(word).subscribe(function(response)
		{
			console.log(response)
			if(response['error'])
			{
				echo.response = response
			}
			else if(response.length == 0)
			{
				echo.response = {ok : 'No message found'}
				echo.hashtagMessages = []
			}
			else
			{
				echo.hashtagMessages['messages'] = response
				echo.hashtagMessages['hashtag'] = word
				echo.response = {}
			}
		})
	}
}