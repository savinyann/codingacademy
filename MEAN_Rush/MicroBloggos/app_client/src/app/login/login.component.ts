import { Component, OnInit } from '@angular/core'
import { LoginService } from '../login.service'
import { AppComponent } from '../app.component'
import { Router} from '@angular/router'

@Component(
{
	selector: 'app-login',
	templateUrl: './login.component.html',
	styleUrls: ['./login.component.css']
})

export class LoginComponent implements OnInit
{
	login = {}
	remember_me

	constructor(private loginService : LoginService, private appComponent : AppComponent, public router: Router) {}

	ngOnInit()
	{
		if(localStorage.getItem('MicroBloggos_email') && localStorage.getItem('MicroBloggos_password'))
		{
			this.UserLogin(localStorage.getItem('MicroBloggos_password'), localStorage.getItem('MicroBloggos_email'))
		}
	}

	UserLogin(password, email)
	{
		var user = {}
		user['password'] = password
		user['email'] = email
		var echo = this

		this.loginService.Login(user).subscribe(function(log)
		{
			console.log(log)
			echo.login = log
			if(log['_id'])
			{
				sessionStorage.MicroBloggos_ID = log['_id']
				//localStorage.setItem('MicroBloggos_ID', log['_id'])
				echo.appComponent.user = log['_id']
				if(echo.remember_me)
				{
					localStorage.setItem('MicroBloggos_email', email)
					localStorage.setItem('MicroBloggos_password', password)
				}
				console.log(echo.remember_me)
				console.log(localStorage.getItem('MicroBloggos_email'))
				console.log(localStorage.getItem('MicroBloggos_password'))
				echo.router.navigate(['./follow'])

			}
		})
	}

	password_forgetted()
	{
		this.login['error'] = "Well, that's unfortunate."
	}
}