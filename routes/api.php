<?php

use Illuminate\Http\Request;

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

// Route::middleware(['checkIp'])->group(function () {
// });
Route::get('masakan', 'ApiMasakanController@index');
Route::post('masakan', 'ApiMasakanController@create');
Route::put('/masakan/{id}', 'ApiMasakanController@update');
Route::delete('/masakan/{id}', 'ApiMasakanController@destroy');