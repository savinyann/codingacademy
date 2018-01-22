import { Injectable } from '@angular/core'
import { Observable } from 'rxjs/Observable'
import { of } from 'rxjs/observable/of'
import { HttpClient, HttpHeaders } from '@angular/common/http'
import { catchError, map, tap } from 'rxjs/operators'


@Injectable()
export class LoginService
{
	loginUrl = 'http://localhost:3000/login'
	private httpOptions =
	{
		headers: new HttpHeaders({ 'Content-Type': 'application/json' })
	}

	constructor(private http: HttpClient) {}

	Login(user) : Observable<any>
	{
		return this.http.post<any>(this.loginUrl, user, this.httpOptions)
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