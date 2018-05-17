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
Route::prefix('beat/ajout/')->group(function () {
    // Etape 1
    Route::get('/', 'AjoutController@Addbeat')->name('beats.create');
    Route::post('/', 'AjoutController@store');
    
    // Etape 2
    Route::get('etape-2/{id}', 'AjoutController@AllerSurEtape2')
            ->where('id', '[0-9]+')
            ->name('beats.create.etape2');
    Route::post('etape-2/', 'AjoutController@storeBeatFormat');
});

Route::post('/store', 'AjoutController@storebeat');