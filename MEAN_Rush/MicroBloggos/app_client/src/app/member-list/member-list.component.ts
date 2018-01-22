import { Component, OnInit } from '@angular/core'
import { MemberListService } from '../member-list.service'
import { FollowService } from '../follow.service'
import { Router} from '@angular/router'

@Component
({
	selector: 'app-member-list',
	templateUrl: './member-list.component.html',
	styleUrls: ['./member-list.component.css']
})

export class MemberListComponent implements OnInit
{
	response = {}
	id : string
	members = []
	constructor(private memberListService : MemberListService, private followService : FollowService, public router: Router) { }

	ngOnInit()
	{
		this.id = sessionStorage.MicroBloggos_ID
		//this.id = localStorage.getItem('MicroBloggos_ID')
		if(!this.id)
		{
			this.router.navigate(['./login'])
		}
		this.getMembers()
	}

	addFollow(followed)
	{
		var echo = this
		var follow = {id : this.id, follow_id : followed['_id'], index : this.members.indexOf(followed)}
		this.followService.addFollow(follow).subscribe(function(response)
		{
			echo.response = response
			if(response['ok'])
			{
				echo.members[follow['index']]['followers'].push(follow['id'])
			}
		})
	}

	removeFollow(unfollowed)
	{
		var echo = this
		var unfollow = { userid : this.id, followid : unfollowed['_id'], index : this.members.indexOf(unfollowed)}
		this.followService.removeFollow(unfollow).subscribe(function(response)
		{
			echo.response = response
			if(response['ok'])
			{
				let pop = echo.members[unfollow['index']]['followers'].indexOf(unfollow['userid'])
				echo.members[unfollow['index']]['followers'].splice(pop, 1)
			}
		})
	}

	getMembers()
	{
		var echo = this
		this.memberListService.MemberList().subscribe(function(members)
		{
			echo.members = members
		})
	}
}
