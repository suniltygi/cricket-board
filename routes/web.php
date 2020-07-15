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

Route::get('/', 'TeamController@index')->name('home');
Route::resource('team', 'TeamController')->names('team');


Route::get('create-player/{id}', 'PlayerController@create')->name('player.create');
Route::post('store-player', 'PlayerController@store')->name('player.store');
Route::get('show/{id}', 'PlayerController@show')->name('player.show');

Route::get('matches', 'MatchController@index')->name('matches.index');
Route::post('update', 'MatchController@update')->name('matches.update');
Route::get('create', 'MatchController@create')->name('matches.create');
Route::post('store', 'MatchController@store')->name('matches.store');
Route::get('get-match-details/{id}', 'MatchController@getMatchDetails')->name('get-match-details');
Route::get('fix-match', 'MatchController@fixMatch')->name('fix-match');


