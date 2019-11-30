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

Route::get('kryme', 'API\WardController@county');
Route::apiResources(['ward' => 'API\WardController']);
Route::apiResources(['user' => 'API\UserController']);
Route::get('findUser', 'API\UserController@search');
Route::get('findWard', 'API\WardController@search');
Route::get('findCounty', 'API\CountyController@search');
Route::get('findbursary', 'API\InformationController@search');
Route::apiResources(['dashboard' => 'API\DashboardContoller']);
Route::put('profile', 'API\UserController@updateProfile');
Route::get('dash', 'API\DashboardContoller@sub');
Route::get('profile', 'API\UserController@profile');
Route::post('apply', 'API\ApplicationController@store');
Route::apiResources(['county' => 'API\CountyController']);
Route::get('status/{countyId}', 'API\ConfigurationController@getStatus');
Route::get('statuz/{countyId}', 'API\ConfigurationController@getStatuz');
Route::apiResources(['configuration' => 'API\ConfigurationController']);
Route::post('configuration/{id}', 'API\ConfigurationController@store');
Route::get('configurations/{id}', 'API\ConfigurationController@index');

Route::get('/getcounties', 'API\ApplicationController@getCounties');
Route::get('/getwards', 'API\ApplicationController@getWards');
Route::get('/getdetails', 'API\ApplicationController@getDetails');
Route::get('/getappdetails/{applicationId}', 'API\ApplicationController@show');
Route::get('/getcountywards/{countyId}', 'API\ApplicationController@getCountyWards');
Route::put('/accept/{applicantId}', 'API\ApplicationController@accept');
Route::put('/reject/{applicantId}', 'API\ApplicationController@reject');
Route::put('/send/{applicantId}', 'API\ApplicationController@send');

// Route::apiResources(['Information'=>'API\InformationController']);
Route::get('/getapplications', 'API\InformationController@getApplications');
Route::get('/getbusary', 'API\InformationController@getbusary');
Route::get('/getMyBursary', 'API\InformationController@getMyBursary');
Route::get('/getApplication', 'API\InformationController@getApplication');
Route::get('/getMyStatus', 'API\InformationController@getMyStatus');
Route::get('/getMyAmount', 'API\InformationController@getAmount');
Route::get('/getCountyBursary', 'API\InformationController@getCountyBursary');
Route::get('/getApplicants', 'API\InformationController@Applicants');
Route::get('/getApplicantz', 'API\InformationController@Applicantz');
Route::get('/getApp', 'API\InformationController@getApp');
Route::get('/getAppnts', 'API\InformationController@getAppnts');
Route::get('/gettype/{id}', 'API\InformationController@getType');
Route::get('/getWardsById/{id}', 'API\InformationController@getWardsById');
Route::get('/getWardsApp/{id}', 'API\InformationController@getWardsApp');
Route::get('/getMyCounty', 'API\InformationController@getMyCounty');
Route::get('/getstatus/{id}', 'API\InformationController@getstatus');
Route::get('/getMyWards', 'API\InformationController@getMyWards');
Route::get('/getbursarytype/{type}', 'API\InformationController@getBursaryType');
Route::post('/recommend/{applicantId}', 'API\InformationController@recommend');
Route::post('/award/{applicantId}', 'API\InformationController@award');
Route::post('/recommendAmount/{applicantId}', 'API\InformationController@recommendAmount');
Route::post('/notaward/{applicantId}', 'API\InformationController@notAward');
Route::get('/getMyWardId', 'API\InformationController@getMyWardId');
Route::get('/getMyCountyId', 'API\InformationController@getMyCountyId');

Route::get('wards', 'API\UserController@wards');
Route::get('subadmin', 'API\UserController@subadmin');
Route::get('MySubAdmin', 'API\UserController@MySubAdmin');
Route::get('official', 'API\UserController@official');
Route::post('officialUser', 'API\UserController@officialUser');
Route::get('counties', 'API\UserController@counties');
Route::get('/getMyCounty', 'API\UserController@getMyCounties');
Route::get('/getcounty', 'API\UserController@getCounties');
Route::get('/getward', 'API\UserController@getWards');
Route::get('/getMyWard', 'API\UserController@getMyWard');
Route::get('/getcountyward/{countyId}', 'API\UserController@getCountyWards');

Route::apiResources(['budget' => 'API\BudgetController']);
Route::get('/getMyWard', 'API\BudgetController@getMyWards');
// Route::apiResources(['form' => 'API\FormController']);
Route::get('/form', 'API\FormController@getDetails');

Route::post('applyScholarship', 'API\ScholarshipController@store');
Route::post('complete', 'API\ScholarshipController@complete');

Route::post('letter', 'API\ScholarshipController@uploadLetter');

Route::get('/scholarshipApps', 'API\ScholarshipController@index');

Route::get('/scholarshipRec', 'API\ScholarshipController@recommendedApp');

Route::get('/scholarshipRej', 'API\ScholarshipController@rejectedApp');

Route::get('/scholarshipdetails/{applicationId}', 'API\ScholarshipController@show');
Route::get('getfiles/{applicationId}', 'API\ScholarshipController@getFiles');
Route::get('download/{fileId}', 'API\ScholarshipController@downloadFile');
Route::post('recommendIt/{applicationId}', 'API\ScholarshipController@recommend');

Route::post('approveIt/{applicationId}', 'API\ScholarshipController@approve');


Route::get('mywards', 'API\FeatureController@getMyWards');
Route::get('/getbyward/{id}', 'API\FeatureController@getByWard');
Route::get('/getbywardscholarship/{id}', 'API\FeatureController@getByWardScholarship');
Route::get('/sortscholarship/{id}', 'API\FeatureController@sortScholarship');
Route::get('/wardname/{id}', 'API\FeatureController@wardName');
Route::get('/wardsCounty', 'API\FeatureController@wardsCounty');
Route::get('/subAdminWard', 'API\InformationController@subAdminWard');
