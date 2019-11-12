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

Auth::routes();
Route::get('lang/{lang}', 'LanguageController@switchLang')->name('lang.switch');

Route::get('/movie', 'MovieController@index')->name('movie.index');
Route::get('/movie/show/{id}', 'MovieController@show')->name('movie.show');
Route::get('/movie/edit/{id?}', 'MovieController@edit')->name('movie.edit')->middleware('auth');
Route::post('/movie/store/{id?}', 'MovieController@store')->name('movie.store')->middleware('auth');
Route::get('/movie/delete/{id}', 'MovieController@delete')->name('movie.delete');

Route::permanentRedirect('/','/movie');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout');
