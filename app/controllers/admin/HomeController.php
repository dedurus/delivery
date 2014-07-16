<?php namespace Admin;

/**
* 
*/
class HomeController extends BaseController
{
	/**
	 * undocumented class variable
	 *
	 * @var string
	 **/
	protected $layout = 'admin.layouts.master';

	/**
	 * [FunctionName description]
	 * @param string $value [description]
	 */
	public function index()
	{
		$this->layout->title = 'Bem-vindo';
		$this->layout->content = \View::make('admin.home');
	}
}