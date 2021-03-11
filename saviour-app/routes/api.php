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

// Login and registration routes
Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['jwt.verify']], function() {
    // Route::get('/tasks', 'TaskController@index');
    // Route::get('/task/{id}', 'TaskController@show');
    // Route::post('/task/{id}', 'TaskController@update');
    // Route::post('/task', 'TaskController@store');
    // Route::delete('/task/{id}', 'TaskController@destroy');
});