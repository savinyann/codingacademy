import { Component, OnInit } from '@angular/core'
import { FollowService } from '../follow.service'
import { MessageService } from '../message.service'
import { Router} from '@angular/router'

@Component(
{
	selector: 'app-follow',
	templateUrl: './follow.component.html',
	styleUrls: ['./follow.component.css']
})

export class FollowComponent implements OnInit
{
	response = {}
	followers = []
	following = []
	blockedFollower = []
	hashtagMessages = []
	id : string
	constructor(private router : Router, private followService : FollowService, private messageService : MessageService) { }

	ngOnInit()
	{

		this.id = sessionStorage.MicroBloggos_ID
		//this.id = localStorage.getItem('MicroBloggos_ID')
		if(!this.id)
		{
			this.router.navigate(['./login'])
		}
		this.getFollowers()
		this.getFollowing()
		this.getBlockedFollowers()
	}

	getFollowers()
	{
		var echo = this
		this.followService.getFollowers(this.id).subscribe(function(response)
		{
			if(response['error'])
			{
				echo.response = response
			}
			else
			{
				console.log(response)
				echo.followers = response
			}
		})
	}

	getFollowing()
	{
		var echo = this
		this.followService.getFollowing(this.id).subscribe(function(response)
		{
			if(response['error'])
			{
				echo.response = response
			}
			else
			{
				echo.following = response
			}
		})
	}

	getBlockedFollowers()
	{
		var echo = this
		this.followService.getBlockedFollowers(this.id).subscribe(function(response)
		{
			if(response['error'])
			{
				echo.response = response
			}
			else
			{
				echo.blockedFollower = response
			}
		})
	}

	removeFollow(followed)
	{
		var echo = this
		var unfollow = { userid : this.id, followid : followed['author_id'], index : this.following.indexOf(followed)}
		this.followService.removeFollow(unfollow).subscribe(function(response)
		{
			echo.response = response
			if(response['ok'])
			{
				echo.following.splice(unfollow['index'],1)
			}
		})
	}

	block(follower)
	{
		var echo = this
		var blockFollow =
		{
			userid : this.id,
			follower : follower['_id'],
			index : this.blockedFollower.indexOf(follower['_id'])
		}
		this.followService.blockFollower(blockFollow).subscribe(function(response)
		{
			echo.response = response
			if(response['ok'])
			{
				echo.blockedFollower.push(blockFollow['follower'])
			}
		})
	}

	unblock(follower)
	{
		var echo = this
		var unblockFollow =
		{
			userid : this.id,
			follower : follower['_id'],
			index : this.blockedFollower.indexOf(follower['_id'])
		}
		this.followService.unblockFollower(unblockFollow).subscribe(function(response)
		{
			echo.response = response
			if(response['ok'])
			{
				echo.blockedFollower.splice(unblockFollow['index'],1)
			}
		})
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