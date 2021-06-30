<?php


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

Route::group(['prefix' => 'artists', "middleware"=> "auth:api"], function(){
    Route::get('/', 'ArtistController@index') ;
    Route::post('/', 'ArtistController@store') ;
    Route::get('/{id}', 'ArtistController@show');
    Route::put('/{id}', 'ArtistController@edit');
    Route::patch('/{id}', 'ArtistController@update') ;
    Route::delete('/{id}', 'ArtistController@destroy') ;

    Route::get('/{id}/songs', 'SongController@artistSongs');
    Route::get('/{id}/albums', 'SongController@artistAlbums');
});


Route::group(['prefix' => 'albums', "middleware"=> "auth:api"], function(){
    Route::get('/', 'AlbumController@index') ;
    Route::post('/', 'AlbumController@store') ;
    Route::get('/{id}', 'AlbumController@show');
    Route::put('/{id}', 'AlbumController@edit');
    Route::patch('/{id}', 'AlbumController@update') ;
    Route::delete('/{id}', 'AlbumController@destroy') ;
});


Route::group(['prefix' => 'songs', "middleware"=> "auth:api"], function(){
    Route::get('/', 'SongController@index');
    Route::post('/', 'SongController@store') ;
    Route::get('/{id}', 'SongController@show');
    Route::put('/{id}', 'SongController@edit');
    Route::patch('/{id}', 'SongController@update') ;
    Route::delete('/{id}', 'SongController@destroy');
});

Route::group(['prefix' => 'user'], function() {
    Route::post('/register', 'UserController@store');
    Route::post('/login',["as"=>"login", "uses"=> 'UserController@login'] );
    Route::get('/logout','UserController@logout')->middleware("auth:api");
    Route::get('/me/{id}', 'UserController@user')->middleware("auth:api");
});
