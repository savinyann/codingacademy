import { Injectable } from '@angular/core'
import { Observable } from 'rxjs/Observable'
import { of } from 'rxjs/observable/of'
import { HttpClient, HttpHeaders } from '@angular/common/http'
import { catchError, map, tap } from 'rxjs/operators'


@Injectable()
export class FollowService
{
	followUrl = 'http://localhost:3000/follow/'
	private httpOptions =
	{
		headers: new HttpHeaders({ 'Content-Type': 'application/json' })
	}

	constructor(private http: HttpClient) {}

	addFollow(follow)
	{
		return this.http.put(this.followUrl+follow['id'], follow, this.httpOptions)
		.pipe(catchError(this.handleError()))
	}

	removeFollow(unfollow)
	{
		return this.http.delete(this.followUrl+unfollow['userid']+'/'+unfollow['followid'], this.httpOptions)
		.pipe(catchError(this.handleError()))	
	}

	getFollowers(userid)
	{
		return this.http.get(this.followUrl+'followers/'+userid, this.httpOptions)
		.pipe(catchError(this.handleError()))
	}

	getFollowing(userid)
	{
		return this.http.get(this.followUrl+'following/'+userid, this.httpOptions)
		.pipe(catchError(this.handleError()))
	}

	getBlockedFollowers(userid)
	{
		return this.http.get(this.followUrl+'blocked/'+userid, this.httpOptions)
		.pipe(catchError(this.handleError()))
	}

	blockFollower(blockFollower)
	{
		return this.http.post(this.followUrl+'block/', blockFollower ,this.httpOptions)
		.pipe(catchError(this.handleError()))	
	}

	unblockFollower(unblockFollower)
	{
		return this.http.post(this.followUrl+'unblock/', unblockFollower, this.httpOptions)
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