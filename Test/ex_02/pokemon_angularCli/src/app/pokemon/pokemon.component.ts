import { Component, OnInit } from '@angular/core'
import { PokemonService } from '../pokemon.service'

@Component(
{
	selector: 'app-pokemon',
	templateUrl: './pokemon.component.html',
	styleUrls: ['./pokemon.component.css']
})
export class PokemonComponent implements OnInit
{
	pokemon_catched : any

	constructor(private pokemonService: PokemonService) { }

	ngOnInit()
	{
	}

	getPokemon(pokemon)
	{
		// if(pokemon != "")
		// {
			var self = this
			this.pokemonService.getPokemon(pokemon).subscribe(function(pokemon)
			{
				let pokemon_pre =
				{
					id : JSON.parse(pokemon['_body'])['order'],
					types : JSON.parse(pokemon['_body'])['types'],
					name : JSON.parse(pokemon['_body'])['name'],
				}
				self.pokemon_catched = pokemon_pre
			})
		//}
	}

	showPokemon(pokemon)
	{
		console.log(this.pokemon_catched)
		console.log(this.pokemon_catched['name'])
		console.log(this.pokemon_catched['order'])
		console.log(this.pokemon_catched['types'])
	}
}