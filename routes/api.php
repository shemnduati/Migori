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
Route::get('findWard','API\WardController@search');
Route::get('findCounty','API\CountyController@search');
Route::get('findbursary','API\InformationController@search');
Route::apiResources(['dashboard'=>'API\DashboardContoller']);
Route::put('profile','API\UserController@updateProfile');
Route::get('dash','API\DashboardContoller@sub');
Route::get('profile','API\UserController@profile');
Route::post('/apply','API\ApplicationController@store');
Route::apiResources(['county' => 'API\CountyController']);
Route::get('status','API\ConfigurationController@getStatus');
Route::apiResources(['configuration' => 'API\ConfigurationController']);

Route::get('/getcounties','API\ApplicationController@getCounties');
Route::get('/getwards','API\ApplicationController@getWards');
Route::get('/getdetails','API\ApplicationController@getDetails');
Route::get('/getappdetails/{applicantId}','API\ApplicationController@show');
Route::get('/getcountywards/{countyId}','API\ApplicationController@getCountyWards');
Route::put('/accept/{applicantId}','API\ApplicationController@accept');
Route::put('/reject/{applicantId}','API\ApplicationController@reject');
Route::put('/send/{applicantId}','API\ApplicationController@send');

// Route::apiResources(['Information'=>'API\InformationController']);
Route::get('/getapplications','API\InformationController@getApplications');
Route::get('/getbusary','API\InformationController@getbusary');
Route::get('/gettype/{id}','API\InformationController@getType');
Route::get('/getstatus/{id}','API\InformationController@getstatus');
Route::get('wards','API\UserController@wards');
Route::get('subadmin','API\UserController@subadmin');
Route::get('counties','API\UserController@counties');
Route::get('/getcounty','API\UserController@getCounties');
Route::get('/getward','API\UserController@getWards');
Route::get('/getcountyward/{countyId}','API\UserController@getCountyWards');


// Route::apiResources(['form' => 'API\FormController']);
Route::get('/form','API\FormController@getDetails');
