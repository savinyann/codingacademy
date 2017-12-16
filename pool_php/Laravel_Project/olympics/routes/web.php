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

use App\Http\Middleware\Admin;

Auth::routes();
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'HomeController@index')->name('home')->middleware('checkAdmin');
Route::get('/home', 'HomeController@index')->name('home')->middleware('checkAdmin');


// Teams Controller
Route::get('/teams', 'TeamsController@index')->name('teams')->middleware('checkAdmin');

Route::get('/teams/manage', 'TeamsController@manage')->name('teams_manage')->middleware('admin', 'checkAdmin');
Route::post('/teams/manage', 'TeamsController@store')->name('teams_store')->middleware('admin', 'checkAdmin');
Route::get('/teams/add', 'TeamsController@create')->name('teams_create')->middleware('admin', 'checkAdmin');
Route::post('/teams/add', 'TeamsController@store')->name('teams_store')->middleware('admin', 'checkAdmin');

Route::get('/teams/edit/{id}', 'TeamsController@edit')->name('teams_edit')->middleware('admin', 'checkAdmin');
Route::post('/teams/edit/{id}', 'TeamsController@update')->name('teams_update')->middleware('admin', 'checkAdmin');
Route::get('/teams/destroy/{id}', 'TeamsController@destroy')->name('teams_destroy')->middleware('admin', 'checkAdmin');

Route::get('/teams/{id}', 'TeamsController@show')->name('teams{id}')->middleware('checkAdmin'); // Need to be last



// Players Controller
Route::get('/players', 'PlayersController@index')->name('players')->middleware('checkAdmin');

Route::post('/players/manage', 'PlayersController@store')->name('players_store')->middleware('admin', 'checkAdmin');
Route::get('/players/manage', 'PlayersController@manage')->name('players_manage')->middleware('admin', 'checkAdmin');
Route::get('/players/add', 'PlayersController@create')->name('players_create')->middleware('admin', 'checkAdmin');

Route::get('/players/edit/{id}', 'PlayersController@edit')->name('players_edit')->middleware('admin', 'checkAdmin');
Route::post('/players/edit/{id}', 'PlayersController@update')->name('players_update')->middleware('admin', 'checkAdmin');
Route::get('/players/destroy/{id}', 'PlayersController@destroy')->name('players_destroy')->middleware('admin', 'checkAdmin');

Route::get('/players/transfert/{id}', 'PlayersController@transfert')->name('players_transfert')->middleware('admin', 'checkAdmin');
Route::post('/players/transfert/{id}', 'PlayersController@updatePlayerTeam')->name('players_transfert')->middleware('admin', 'checkAdmin');

Route::get('/players/{id}', 'PlayersController@show')->name('players{id}')->middleware('checkAdmin'); // Need to be last



// Fixtures Controller
Route::get('/fixtures', 'FixturesController@index')->name('fixtures')->middleware('checkAdmin');

//Route::get('/fixtures/add', 'FixturesController@create')->name('fixtures_create')->middleware('admin', 'checkAdmin');
Route::get('/fixtures/manage', 'FixturesController@manage')->name('fixtures_manage')->middleware('admin', 'checkAdmin');
Route::post('/fixtures/manage', 'FixturesController@store')->name('fixtures_store')->middleware('admin', 'checkAdmin');

Route::get('/fixtures/edit/{id}', 'FixturesController@edit')->name('fixtures_edit')->middleware('admin', 'checkAdmin');
Route::post('/fixtures/edit/{id}', 'FixturesController@update')->name('fixtures_update')->middleware('admin', 'checkAdmin');

Route::get('/fixtures/{id}', 'FixturesController@show')->name('fixtures{id}')->middleware('checkAdmin'); // Need to be last



// Tournament Controller 
/*
Route::get('/tournaments', 'TournamentController@index')->name('tournaments');

Route::get('/tournaments/add', 'TournamentController@create')->name('tournament_create')->middleware('admin', 'checkAdmin');
Route::post('/tournament/add', 'TournamentController@store')->name('tournament_store')->middleware('admin', 'checkAdmin');

Route::get('/tournaments/edit/{id}', 'TournamentController@edit')->name('tournament_edit')->middleware('admin', 'checkAdmin');
Route::post('/tournaments/edit/{id}', 'TournamentController@update')->name('tournament_update')->middleware('admin', 'checkAdmin');

Route::get('/tournaments/{id}', 'TournamentController@show')->name('tournament{id}');
*/

// Referees Controller
Route::get('/referees', 'RefereesController@index')->name('referees')->middleware('admin', 'checkAdmin');

Route::get('/referees/add', 'RefereesController@create')->name('referees_create')->middleware('admin', 'checkAdmin');
Route::post('/referees/add', 'RefereesController@store')->name('referees_store')->middleware('admin', 'checkAdmin');

Route::get('/referees/destroy/{id}', 'RefereesController@destroy')->name('referees_destroy')->middleware('admin', 'checkAdmin');

// Meteo Controller

Route::get('/meteo', 'MeteoController@index')->name('meteo')->middleware('admin', 'checkAdmin');

Route::get('/meteo/add', 'MeteoController@create')->name('meteo_create')->middleware('admin', 'checkAdmin');
Route::post('/meteo/add', 'MeteoController@store')->name('meteo_store')->middleware('admin', 'checkAdmin');

Route::get('/meteo/destroy/{id}', 'MeteoController@destroy')->name('meteo_destroy')->middleware('admin', 'checkAdmin');

//Bets controller
Route::get('/bets', 'BetsController@index')->name('bets')->middleware('checkAdmin');
Route::get('/bets/add', 'BetsController@create')->name('bets_create')->middleware('admin', 'checkAdmin');
Route::post('/bets/add', 'BetsController@store')->name('bets_store')->middleware('admin', 'checkAdmin');
Route::get('/bets/show', 'BetsController@show')->name('bets_show')->middleware('admin', 'checkAdmin');
Route::get('/bets/destroy/{id}', 'BetsController@destroy')->name('bets_destroy')->middleware('admin', 'checkAdmin');



Route::post('pay/{bet}', 'OrdersController@postPayWithStripe')->name('pay')->middleware('admin', 'checkAdmin');


//Orders controller
Route::get('/orders', 'OrdersController@getAllOrders')->name('orders')->middleware('admin', 'checkAdmin');
Route::get('/orders/credit/{id}/{user_id}/{amount}/{rating}', 'OrdersController@credit')->name('orders_credit')->middleware('admin', 'checkAdmin');
Route::get('/orders/destroy/{id}', 'OrdersController@destroy')->name('orders_destroy')->middleware('admin', 'checkAdmin');
Route::get('/addCard', 'OrdersController@addCard')->name('addCard')->middleware('checkAdmin');
Route::post('/addCard', 'OrdersController@addCard')->name('addCard')->middleware('checkAdmin');