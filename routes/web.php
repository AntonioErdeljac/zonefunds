<?php


use App\Notifications\NewAd;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/postadcomplete/$id', [
	'uses' => 'AdController@postadcomplete',
	'as' => 'ad.complete'
	]);

Route::post('/postrefreshlocation', [
	'uses' => 'AdController@postrefreshlocation',
	'as' => 'refreshsession'
	]);

Route::post('/savesession', [
	'uses'=>'AdController@postsavesession',
	'as' => 'savesession'
	]);

Route::get('/welcome', [
	'uses' => 'AdController@getblank',
	'as' => 'blankroute'
	]);

Route::post('/postnotifications', [
	'uses' => 'AdController@postnotifications',
	'as' => 'postNotifications'
	]);

Route::post('/postmsg', [
	'uses' => 'AdController@postmsg',
	'as' => 'postmsg'
	]);

Route::get('/getmsg', [
	'uses' => 'AdController@getmsg',
	'as' => 'getmsg'
	]);

Route::get('/ajaxload', [
	'uses' => 'AdController@ajaxload',
	'as' => 'ajaxload'
	]);

Route::get('/ajaxtest', [
	'uses' => 'AdController@getAjaxTest',
	'as' => 'ajaxtest'
	]);

Route::get('/create_ad', [
	'uses' => 'AdController@getMobileCreateAd',
	'as' => 'createad.mobile',
	'middleware' => 'auth'
	]);

Route::post('/account_update', [
	'uses' => 'UserController@postAccountUpdate',
	'as' => 'account.update',
	'middleware' => 'auth'
	]);

Route::get('/', [
	'uses' => 'AdController@getDashboard',
	'as' => 'home',
	]);

Route::get('/account', [
	'uses' => 'UserController@getAccount',
	'as' => 'account',
	'middleware' => 'auth'
	]);

Route::get('/account_settings', [
	'uses' => 'UserController@getAccountSettings',
	'as' => 'account.settings',
	'middleware' => 'auth'
	]);



//oute::get('/account')

Route::post('/signup', [
	'uses' => 'UserController@postSignUp',
	'as' => 'signup',
	]);

Route::post('/signin', [
	'uses' => 'UserController@postSignIn',
	'as' => 'signin',
	]);

Route::post('/createad', [
	'uses' => 'AdController@postCreateAd',
	'as' => 'ad.create',
	'middleware' => 'auth'
	]);

Route::post('/updatead/{ad_id}', [
	'uses' => 'AdController@postUpdateAd',
	'as' => 'ad.update',
	'middleware' => 'auth'
	]);


Route::get('/dashboard', [
	'uses' => 'AdController@getDashboard',
	'as' => 'dashboard',                           //KASNIEJ PREMJESTI U POSTCONTROLLER
	]);

Route::get('/logout', [
	'uses' => 'UserController@getLogout',
	'as' => 'logout'
	]);

Route::get('/deletead/{ad_id}', [
	'uses' => 'AdController@getDeleteAd',
	'as' => 'ad.delete',
	'middleware' => 'auth'
	]);


Route::get('/update-{id}', [
	'uses' => 'AdController@getShowUpdate',
	'as' => 'ad.show_update',
	'auth' => 'middleware'
	]);


Route::get('/{id}', [
	'uses' => 'AdController@getShowAd',
	'as' => 'ad.show'
	]);









// PREOSTALO TI JE PRIKAZIVANJE CRVENOG OBRUBA KOD KRIVOG UNOSA, LOGOUT, CREATE POST, PRIKAZI POST I TO