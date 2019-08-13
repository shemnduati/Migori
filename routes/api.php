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

Route::get('kryme','API\WardController@county');
Route::apiResources(['ward' => 'API\WardController']);
Route::apiResources(['user'=>'API\UserController']);
Route::get('findUser','API\UserController@search');
Route::apiResources(['dashboard'=>'API\DashboardContoller']);
Route::put('profile','API\UserController@updateProfile');
Route::get('profile','API\UserController@profile');
Route::post('/apply','API\ApplicationController@store');
Route::apiResources(['county' => 'API\CountyController']);
Route::get('/getcounties','API\ApplicationController@getCounties');
Route::get('/getwards','API\ApplicationController@getWards');
Route::get('/getcountywards/{countyId}','API\ApplicationController@getCountyWards');
Route::get('wards','API\UserController@wards');
Route::get('subadmin','API\UserController@subadmin');
