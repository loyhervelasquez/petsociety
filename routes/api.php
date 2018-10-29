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
// Route::group(['middleware' => ['auth','acceso', 'bindings']], function (){
Route::group(['middleware' => ['acceso', 'bindings']], function (){
	Route::resource('organization', 'OrganizationController');
	Route::resource('owner', 'OwnerController');
	Route::resource('animal', 'AnimalController');
});

Route::post('/organization/login', 'OrganizationController@login')->name('organization.login');

Route::resource('organization', 'OrganizationController', ['only' => ['store']]);

Route::resource('owner', 'OwnerController', ['only' => ['show', 'index']]);

Route::resource('animal', 'AnimalController', ['only' => ['show', 'index']]);



/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
