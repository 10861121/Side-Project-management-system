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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('a1')->group(function () {
    Route::prefix('v1')->group(function () {

        Route::get('Homelist','ClientController@HomeList');
        Route::get('Newslist','ClientController@Newlist');
        Route::get('Exhibitionlist','ClientController@Exhibitionlist');
        Route::get('Artistlist','ClientController@Artistlist');
        Route::get('ArtistContent','ClientController@ArtistContent');

        Route::get('AboutList','ClientController@AboutList');

    });
});
