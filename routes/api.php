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


Route::get('/artists', 'ArtistController@index') ;
Route::post('/artists', 'ArtistController@store') ;
Route::get('/artists/{id}', 'ArtistController@show');
Route::put('/artists/{id}', 'ArtistController@edit');
Route::patch('/artists/{id}', 'ArtistController@update') ;
Route::delete('/artists/{id}', 'ArtistController@destroy') ;

Route::get('/albums', 'AlbumController@index') ;
Route::post('/albums', 'AlbumController@store') ;
Route::get('/albums/{id}', 'AlbumController@show');
Route::put('/albums/{id}', 'AlbumController@edit');
Route::patch('/albums/{id}', 'AlbumController@update') ;
Route::delete('/albums/{id}', 'AlbumController@destroy') ;

Route::get('/songs', 'SongController@index') ;
Route::post('/songs', 'SongController@store') ;
Route::get('/songs/{id}', 'SongController@show');
Route::put('/songs/{id}', 'SongController@edit');
Route::patch('/songs/{id}', 'SongController@update') ;
Route::delete('/songs/{id}', 'SongController@destroy');
Route::get('artist/{id}/songs/', 'SongController@artistSongs');
Route::get('artist/{id}/albums/', 'SongController@artistAlbums');


//Route::middleware(['first', 'second'])->group(function () {
//    Route::get('/', function () {
//        // Uses first & second Middleware
//    });
//
//    Route::get('user/profile', function () {
//        // Uses first & second Middleware
//    });
//});
