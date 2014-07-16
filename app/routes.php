<?php

/*
|--------------------------------------------------------------------------
| Panel Admin
|--------------------------------------------------------------------------
| 
| Routes related to the administration panel.
| Most routes relating to the administration panel, must be within the 
| admin prefix
| If there are exceptions but still refer to the adminstration panel, put 
| this code block
|
 */

/**
 * Group prefix admin
 */
Route::group(['prefix' => 'admin'], function(){

	/**
	 * Group filter admin.guest
	 * Redirect for route admin.home if the user is authenticated
	 */
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

	/**
	 * Group filter admin.auth
	 * Redirect for route admin.getLogin if the user is guest
	 */
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
| E-commerce
|--------------------------------------------------------------------------
|
| Description
|
 */