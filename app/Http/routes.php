<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middlewareGroups' => 'web'], function() {

	Route::get('/', 'PersonsController@index');

	Route::match(['get', 'post'], '/register', 'PersonsController@create');

	Route::post('/getajaxstate', 'PersonsController@ajaxGetState');

	Route::post('/get/ajaxcity', 'PersonsController@ajaxGetcity');

	Route::get('/ajax/persons', 'PersonsController@ajaxPagination');

	Route::post('/delete', 'PersonsController@delete');

	Route::match(['get', 'put'],'/edit/{id}', 'PersonsController@edit');

	Route::get('/show/person/{id}', 'PersonsController@show');

});