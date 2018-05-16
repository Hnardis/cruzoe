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

Route::get('/', 'AcceuilController@index');

// AUTH
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// CRUD BEATS
Route::get('/ajout', 'AjoutController@Addbeat')->name('beats.create');
Route::post('/store', 'AjoutController@storebeat');
Route::post('/ajout', 'AjoutController@store');