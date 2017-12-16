<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Auth;
Route::get('/', function ()
{
    return view('welcome');
});

	Route::get("/Home", "HomeController@my_index")->name("Home");
	Route::get('/home', 'HomeController@index')->name('home');
	Auth::routes();
	Route::match(['get', 'post'],"/animal/add", "AnimalController@add")->name("animal");
	Route::get("/animal/{id}", "AnimalController@index")->name("animalid");