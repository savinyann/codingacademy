import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Observable'
import { of } from 'rxjs/observable/of'
import { HttpClient, HttpHeaders } from '@angular/common/http'
import { catchError, map, tap } from 'rxjs/operators'

@Injectable()
export class MemberService
{
	private userUrl = 'http://localhost:3000/users/'
	private httpOptions = 
	{
		headers : new HttpHeaders({ 'Content-Type' : 'application/json' })
	}

	constructor(private http: HttpClient) {}

	Member(userID)
	{
		return this.http.get(this.userUrl + userID, this.httpOptions)
		.pipe(catchError(this.handleError()))
	}

	updateMember(userID, user)
	{
		return this.http.put(this.userUrl + userID, user, this.httpOptions)
		.pipe(catchError(this.handleError()))
	}

	deleteMember(userID)
	{
//		return of({ok : "You have been deleted"})
		return this.http.delete(this.userUrl + userID, this.httpOptions)
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
