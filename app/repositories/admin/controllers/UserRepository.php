<?php namespace Repositories\Admin\Controllers;

use \Repositories\Admin\Interfaces;


/**
 * clas repository regarding UsersController
 *
 * @package default
 * @author 
 **/
class UsersRepository implements Interfaces\UsersInterfaceRepository
{
	/**
	 * Authentication user
	 *
	 * @return object redirect view
	 **/
	public function logar()
	{
        if ($this->validator()->fails()) {
            return $this->routeLogin('admin/users.controller.empry_fields');
        } else {
            if (\Auth::attempt($this->credentials(), ( boolean ) \Input::get('remember') )) {
                return \Redirect::route('admin.home');
            } else {
                return $this->routeLogin('admin/users.controller.credentials');
            }
        }
	}

	/**
	 * Credentials for authentication 
	 * 
	 * @return array credentialis for authentication
	 */
	private function credentials()
	{
		return [
            'username' => \Input::get('username'),
            'password' => \Input::get('password'),
        ];
	}

	/**
	 * Validator for fields
	 * 
	 * @return \Illuminate\Validation\Validator
	 */
	private function validator()
	{
		return \Validator::make(\Input::all(), ['username' => 'required', 'password' => 'required']);
	}

	/**
	 * Route for view Login
	 * @param  string  $message language lang
	 * @param  boolean $input   if send Input for view
	 * @return \Illuminate\Http\RedirectResponse
	 */
	private function routeLogin($message = '', $input = true)
	{
		if ($input === true) {
			if ($message) {
				return \Redirect::route('admin.getLogin')
					->withGlobalMessage(trans($message))
					->withInput(\Input::except('password'));
			} else {
				return \Redirect::route('admin.getLogin')
					->withInput(\Input::except('password'));
			}
		} else {
			return \Redirect::route('admin.getLogin');
		}
	}
}