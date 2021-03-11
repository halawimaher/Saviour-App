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

// move all this to middleware when done
Route::resource('/requestors', 'RequestorsController');
Route::resource('/providers', 'ProviderController');
Route::resource('/feedback', 'FeedbackController');
Route::resource('/bookings', 'BookingController');
Route::resource('/ratings', 'ProviderRatingController');
Route::resource('/services', 'ServiceController');
Route::resource('/provider-services', 'ProviderServicesController');
Route::resource('/available-times', 'TimeOfAvailabilityController');
Route::resource('/provider-availability', 'ProviderAvailabilityController');

Route::group(['middleware' => ['jwt.verify']], function() {

});