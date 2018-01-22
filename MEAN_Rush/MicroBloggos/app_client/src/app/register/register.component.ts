import { Component, OnInit } from '@angular/core'
import { RegisterService } from '../register.service'
import { Router} from '@angular/router'

@Component(
{
	selector: 'app-register',
	templateUrl: './register.component.html',
	styleUrls: ['./register.component.css']
})

export class RegisterComponent implements OnInit
{
	response = {}

	constructor(private registerService : RegisterService, private router: Router) {}

	ngOnInit()
	{
	}

	UserRegister(name, password, confirm, email)
	{
		var user = {}
		user['name'] = name
		user['password'] = password
		user['confirm'] = confirm
		user['email'] = email
		var echo = this
		this.registerService.Register(user).subscribe(function(reg)
		{
			echo.response = reg
			if(reg['ok'])
			{
				echo.router.navigate(['./login'])
			}
		})
	}
}
