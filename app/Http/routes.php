<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/search', 'MusicController@search');
    Route::get('/results', 'MusicController@results');
    Route::get('/artists/new', 'ArtistController@create');
    Route::post('/artists', 'ArtistController@store');
    Route::get('/dvds/search', 'DvdController@search');
    Route::get('/dvds', 'DvdController@results');
    Route::post('/dvds', 'DvdController@store');
    Route::get('/dvds/{id}', 'DvdController@info');
    Route::post('/dvds/review', 'DvdController@review');
    Route::get('/dvd/create', 'DvdController@create');
    Route::get('/genres/{id}/dvds', 'DvdController@genres');
});






Route::get('/', function () {
    return view('welcome');
});



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
