<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('movies', 'MovieController@index');
Route::get('movies/{movie}', 'MovieController@show');
Route::post('movies', 'MovieController@store');
Route::put('movies/{movie}', 'MovieController@update');
Route::delete('movies/{movie}', 'MovieController@delete');

Route::get('actors', 'ActorController@index');
Route::get('actors/{actor}', 'ActorController@show');
Route::post('actors', 'ActorController@store');
Route::put('actors/{actor}', 'ActorController@update');
Route::delete('actors/{actor}', 'ActorController@delete');