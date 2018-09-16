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

Route::get('/listbeat', 'ListBeatController@Affichebeat');
Route::get('/supprimer/{bf_id}', 'ListBeatController@deleteBeat');
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
    Route::post('etape-2/', 'AjoutController@storeBeatFormat1');
});







     // CRUD SAMPLES
                     
    Route::prefix('sample/ajout/')->group(function()
{
    //Etape 1
    Route::get('/', 'AddSampleController@AddSample')->name('samples.create');
    Route::post('/', 'AddSampleController@store');

    //Etape2
    Route::get('etape-1/{id}', 'AddSampleController@AllerSurEtape1')
              ->where('id', '[0-9]+')
              ->name('samples.create.etape1');
    Route::post('etape-1/', 'AddSampleController@storeBeatSample');
   
}) ; 

Route::get('/listeSample', 'AddSampleController@checklisteSample');
Route::get('/Effacer/{sam_id}', 'AddSampleController@deleteSample');
Route::get('/modifSample/{sam_id}', 'AddSampleController@editSample');
Route::post('/rafraichirSample', 'AddSampleController@updateSample');



// CRUD Album/
Route::prefix('album/ajout/')->group(function () 
{
    // Etape 1
    Route::get('/', 'AlbumController@CreateAlbum')->name('albums.create');
    Route::post('/', 'AlbumController@store');
       
}) ; 


// CRUD Client//

Route:: prefix('client/beats/')->group(function ()
{
    Route::get('/', 'ClientController@AfficheListeBeat')->name ('beats.show');


});