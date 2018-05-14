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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/acceuil', 'AcceuilController@index1');

Route::get('/ajout', 'AjoutController@Addbeat');
Route::post('/store', 'AjoutController@storebeat');








Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
