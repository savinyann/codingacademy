import { Injectable } from '@angular/core';
import { of } from 'rxjs/observable/of'
import { HttpClient, HttpHeaders } from '@angular/common/http'
import { Http } from '@angular/http';
import { catchError, map, tap } from 'rxjs/operators'

@Injectable()
export class PokemonService
{
	private pokemonUrl = 'https://pokeapi.co/api/v2/pokemon/'
	private httpOptions = 
	{
		headers : new HttpHeaders({ 'Content-Type' : 'application/json' })
	}

	constructor(private http: Http) {}

	getPokemon(pokemon)
	{
		console.log(this.pokemonUrl)
		console.log(pokemon)
		console.log(this.pokemonUrl+pokemon)
		return this.http.get(this.pokemonUrl+pokemon)
		.pipe(catchError(this.handleError()))
	}

	private handleError()
	{
		return function(error)
		{
			return of({error : "error"})
		}
	}
}