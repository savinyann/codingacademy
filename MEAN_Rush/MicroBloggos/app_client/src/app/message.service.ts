import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Observable'
import { of } from 'rxjs/observable/of'
import { HttpClient, HttpHeaders } from '@angular/common/http'
import { catchError, map, tap } from 'rxjs/operators'

@Injectable()
export class MessageService
{
	private messageUrl = 'http://localhost:3000/message/'
	private hashtagUrl = 'http://localhost:3000/hashtag/'
	private httpOptions = 
	{
		headers : new HttpHeaders({ 'Content-Type' : 'application/json' })
	}

	constructor(private http: HttpClient) { }

	newMessage(message)
	{
		return this.http.post(this.messageUrl, message, this.httpOptions)
		.pipe(catchError(this.handleError()))
	}

	readMessage(id)
	{
		return this.http.get(this.messageUrl+id, this.httpOptions)
		.pipe(catchError(this.handleError()))
	}

	editMessage(message)
	{
		return this.http.put(this.messageUrl+message['author_id'], message, this.httpOptions)
		.pipe(catchError(this.handleError()))
	}

	deleteMessage(message)
	{
		return this.http.delete(this.messageUrl+message['author_id']+'/'+message['_id'], this.httpOptions)
		.pipe(catchError(this.handleError()))
	}

	getHashtag(hashtag)
	{
		return this.http.get(this.hashtagUrl+hashtag, this.httpOptions)
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