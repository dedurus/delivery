<?php namespace Admin;

/**
* 
*/
class HomeController extends \BaseController
{
	/**
	 * [FunctionName description]
	 * @param string $value [description]
	 */
	public function index()
	{
		return \View::make('admin.layouts.master');
	}
}