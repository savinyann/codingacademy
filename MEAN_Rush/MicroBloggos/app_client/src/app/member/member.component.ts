import { Component, OnInit } from '@angular/core';
import { MemberService } from '../member.service'
import { Router } from '@angular/router'

@Component(
{
	selector: 'app-member',
	templateUrl: './member.component.html',
	styleUrls: ['./member.component.css']
})

export class MemberComponent implements OnInit
{
	member = {}
	response = {}
	delete : boolean
	id : string
	constructor(private memberService : MemberService, public router: Router ) { }

	ngOnInit()
	{
		this.id = sessionStorage.MicroBloggos_ID
		//this.id = localStorage.getItem('MicroBloggos_ID')
		if(!this.id)
		{
			this.router.navigate(['./login'])
		}
		this.getMember()
	}

	getMember()
	{
		var echo = this
		this.memberService.Member(this.id).subscribe(function(member)
		{
			echo.member = member['user']
		})
	}

	updateMe(name, password, confirm, old, email)
	{
		var member = {}
		member['name'] = name
		member['email'] = email
		member['password'] = password
		member['confirm'] = confirm
		member['old'] = old
		if(password != "")
		{
			var echo = this
			this.memberService.updateMember(this.id, member).subscribe(function(response)
			{
				echo.response = response
			})
		}
		else
		{
			this.response = {error : "Password is empty"}
		}
	}

	deleteMe()
	{
		if(!this.delete)
		{
			this.delete = false
			this.response['error'] = 'Are you sure you want to delete your account ? All you messages will be deleted too, and it is not cancelable. Check the checkbox and repush the button to confirm.'
		}
		else
		{
			var echo = this
			this.memberService.deleteMember(this.id).subscribe(function(response)
			{
				echo.response = response
				if(response['ok'])
				{
					sessionStorage.MicroBloggos_ID = null
					//localStorage.removeItem('MicroBloggos_ID')
					echo.router.navigate(['/login'])
				}
			})
		}
	}
}
