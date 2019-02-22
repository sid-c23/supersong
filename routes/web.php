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

Route::get('/', "VoteController@index");

Route::get('/songs', "SongController@index");
Route::get('/songs/create', "SongController@create");
Route::post('/songs/create', "SongController@store");
Route::get('/songs/{song}', "SongController@show");
Route::get('/songs/delete/{id}', "SongController@destroy");

Route::get('/getSongs', "VoteController@getSongs");
Route::post('/updateElo', "VoteController@updateElo");

Auth::routes();

