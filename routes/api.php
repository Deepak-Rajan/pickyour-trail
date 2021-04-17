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

Route::prefix('trail')->namespace('Api')->group(function () {
    Route::get('', 'TrailController@getTrails');
    Route::get('{id}', 'TrailController@getTrail');
    Route::post('', 'TrailController@createTrail');
    Route::put('trailItem/{id}', 'TrailController@updateTrailItem');
});
