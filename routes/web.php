<?php

use App\Notifications\ApplicationSent;
use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function() {
//     $user = User::find(2);
//     $user->notify(new ApplicationSent);
//     return redirect('home');
// 	// foreach ($user as $users) {

// 	// }
// });

Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/scholarship', 'HomeController@scholarship')->name('scholarship');
Route::get('/apply', 'HomeController@apply')->name('apply');
Route::get('/privacy', 'TermsController@privacy')->name('privacy');
Route::get('/print', 'HomeController@download')->name('print');
Route::get('/student', 'HomeController@student')->name('student');
Route::get('/status', 'HomeController@status');
Route::get('{path}','HomeController@index')->where( 'path', '([A-z\d\-/_.]+)?' );
