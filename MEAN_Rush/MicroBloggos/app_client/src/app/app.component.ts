import { Component, OnInit } from '@angular/core'

@Component(
{
	selector: 'app-root',
	templateUrl: './app.component.html',
	styleUrls: ['./app.component.css']
})

export class AppComponent implements OnInit
{
	title = 'app'
	user : string

	ngOnInit()
	{
		this.updateUser()
	}

	LogOut()
	{
		sessionStorage.MicroBloggos_ID = null
		localStorage.removeItem('MicroBloggos_email')
		localStorage.removeItem('MicroBloggos_password')
		this.user = null
	}

	updateUser()
	{
		this.user = sessionStorage.MicroBloggos_ID
	}
}