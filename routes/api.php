<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => 'artists'], function(){
    Route::get('/', 'ArtistController@index') ;
    Route::post('/', 'ArtistController@store') ;
    Route::get('/{id}', 'ArtistController@show');
    Route::put('/{id}', 'ArtistController@edit');
    Route::patch('{id}', 'ArtistController@update') ;
    Route::delete('{id}', 'ArtistController@destroy') ;
});


Route::group(['prefix' => 'albums'], function(){
    Route::get('/', 'AlbumController@index') ;
    Route::post('/', 'AlbumController@store') ;
    Route::get('/{id}', 'AlbumController@show');
    Route::put('/{id}', 'AlbumController@edit');
    Route::patch('/{id}', 'AlbumController@update') ;
    Route::delete('/{id}', 'AlbumController@destroy') ;
});


Route::group(['prefix' => 'songs'], function(){
    Route::get('/', 'SongController@index') ;
    Route::post('/', 'SongController@store') ;
    Route::get('/{id}', 'SongController@show');
    Route::put('/{id}', 'SongController@edit');
    Route::patch('/{id}', 'SongController@update') ;
    Route::delete('/{id}', 'SongController@destroy');
    Route::get('/artist/{id}', 'SongController@artistSongs');
    Route::get('/artist/{id}/album/', 'SongController@artistAlbums');
});


