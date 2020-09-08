<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', 'MovieController@index');
Route::get('/genre', 'GenreController@index')->name('genre.index');

Route::get('/movie', 'MovieController@index')->name('movie.index');
Route::get('/movie/{movie}/show', 'MovieController@show')->name('movie.show');
Route::get('/actor', 'ActorController@index')->name('actor.index');

Route::group(['middleware' => 'auth'], function(){
    #Genre
    Route::get('/genre/create', 'GenreController@create')->name('genre.create');
    Route::post('/genre', 'GenreController@store')->name('genre.store');
    Route::get('/genre/{genre}/edit', 'GenreController@edit')->name('genre.edit');
    Route::put('/genre/{genre}', 'GenreController@update')->name('genre.update');
    Route::get('/genre/{genre}/destroy', 'GenreController@destroy')->name('genre.destroy');

    #Movie
    Route::get('/movie/create', 'MovieController@create')->name('movie.create');
    Route::post('/movie', 'MovieController@store')->name('movie.store');
    Route::get('/movie/{movie}/edit', 'MovieController@edit')->name('movie.edit');
    Route::put('/movie/{movie}', 'MovieController@update')->name('movie.update');
    Route::get('/movie/{movie}/destroy', 'MovieController@destroy')->name('movie.destroy');

    #Actors
    Route::get('/actor/create', 'ActorController@create')->name('actor.create');
    Route::post('/actor', 'ActorController@store')->name('actor.store');
    Route::get('/actor/{actor}/edit', 'ActorController@edit')->name('actor.edit');
    Route::put('/actor/{actor}', 'ActorController@update')->name('actor.update');
    Route::get('/actor/{actor}/destroy', 'ActorController@destroy')->name('actor.destroy');
});

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
