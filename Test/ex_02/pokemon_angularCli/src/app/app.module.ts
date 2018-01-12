import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http'
import { FormsModule } from '@angular/forms'
import { HttpModule } from '@angular/http';
import { NgModule } from '@angular/core';



import { AppComponent } from './app.component';
import { PokemonComponent } from './pokemon/pokemon.component';
import { PokemonService } from './pokemon.service';


@NgModule({
  declarations: [
    AppComponent,
    PokemonComponent,
  ],
  imports: [
	HttpModule,
	FormsModule,
    BrowserModule,
	HttpClientModule,
  ],
  providers: [ PokemonService ],
  bootstrap: [AppComponent]
})
export class AppModule { }
