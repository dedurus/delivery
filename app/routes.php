<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Corporate
|--------------------------------------------------------------------------
|
| Description
|
 */

Route::get('/', function()
{
	return View::make('hello');
});

/*
|--------------------------------------------------------------------------
| Panel Admin
|--------------------------------------------------------------------------
 */

Route::group(['prefix' => 'admin'], function(){
	Route::group(['before' => 'admin.guest'], function(){
		Route::get('login', [
			'as'	=> 'admin.getLogin',
			'uses'	=> '\Admin\UsersController@getLogin'
		]);

		Route::group(['before' => 'crsf'], function(){
			Route::post('login', [
				'as'	=> 'admin.postLogin',
				'uses'	=> '\Admin\UsersController@postLogin'
			]);
		});
	});

	Route::group(['before' => 'admin.auth'], function(){
		Route::get('/', [
			'as'	=> 'admin.home',
			'uses'	=> '\Admin\HomeController@index'
		]);

		Route::get(trans('admin/routes.logout'), [
			'as'	=> 'admin.logout',
			'uses'	=> '\Admin\UsersController@logout'
		]);
	});
});

/*
|--------------------------------------------------------------------------
| E-commerce
|--------------------------------------------------------------------------
|
| Description
|
 */