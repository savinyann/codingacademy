import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Observable'
import { of } from 'rxjs/observable/of'
import { HttpClient, HttpHeaders } from '@angular/common/http'
import { catchError, map, tap } from 'rxjs/operators'


@Injectable()
export class RegisterService
{
	private registerUrl = 'http://localhost:3000/register'
	private httpOptions = 
	{
		headers : new HttpHeaders({ 'Content-Type' : 'application/json' })
	}

	constructor(private http: HttpClient) {}

	Register(user)
	{
		return this.http.post(this.registerUrl, user, this.httpOptions)
		.pipe(catchError(this.handleError()))
	}

	private handleError()
	{
		return function(error)
		{
			return of(error['error'])
		}
	}
}