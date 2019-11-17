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

Route::domain(env('APP_DOMAIN'))
    ->group( function () {
        // public stuff
        Route::get('/movie', 'MovieController@index')->name('movie.index');
        Route::get('/movie/show/{id}', 'MovieController@show')->name('movie.show');
        Route::get('/scard', 'ScardController@index')->name('scard.index');
        Route::post('/scard/update/{id}', 'ScardController@update')->name('scard.update');
        Route::post('/scard/destroy/{id}', 'ScardController@destroy')->name('scard.destroy');
        Route::post('/scard/increment/{id}', 'ScardController@increment')->name('scard.increment');
        Route::post('/scard/decrement/{id}', 'ScardController@decrement')->name('scard.decrement');
        Route::post('/order/store', 'OrderController@store')->name('order.store');

        Route::redirect('/', '/movie');
    });

Route::domain(env('APP_ADMIN_DOMAIN'))
    ->namespace('Admin')
    ->group( function () {
    // admin stuff
        Route::get('/', 'DashboardAdminController')->name('admin.dashboard');

        Route::get('/movie', 'AdminMovieController@index')->name('admin-movie.index');
        Route::get('/movie/show/{id}', 'AdminMovieController@show')->name('admin-movie.show');
        Route::get('/movie/edit/{id?}', 'AdminMovieController@edit')->name('admin-movie.edit');
        Route::post('/movie/store/{id?}', 'AdminMovieController@store')->name('admin-movie.store');
        Route::get('/movie/delete/{id}', 'AdminMovieController@delete')->name('admin-movie.delete');

        Route::get('/order', 'AdminOrderController@index')->name('admin-order.index');
        Route::get('/order/show/{id}', 'AdminOrderController@show')->name('admin-order.show');
        Route::get('/order/edit/{id?}', 'AdminOrderController@edit')->name('admin-order.edit');
        Route::post('/order/store/{id?}', 'AdminOrderController@store')->name('admin-order.store');
        Route::get('/order/delete/{id}', 'AdminOrderController@delete')->name('admin-order.delete');
    });

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout');
