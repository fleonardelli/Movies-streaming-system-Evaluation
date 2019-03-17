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

Route::get('movie', 'MovieController@index');
Route::get('movie/{movie}', 'MovieController@show');
Route::post('movie', 'MovieController@store');
Route::put('movie/{movie}', 'MovieController@update');
Route::delete('movie/{movie}', 'MovieController@delete');

Route::get('actor', 'ActorController@index');
Route::get('actor/{actor}', 'ActorController@show');
Route::post('actor', 'ActorController@store');
Route::put('actor/{actor}', 'ActorController@update');
Route::delete('actor/{actor}', 'ActorController@delete');