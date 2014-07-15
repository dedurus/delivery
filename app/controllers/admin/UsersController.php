<?php namespace Admin;

/**
 *
 */
class UsersController extends \BaseController
{

    /**
     * undocumented class variable
     *
     * @var string
     **/
    protected $layout = 'admin.layouts.login';

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param type var Description
     **/
    public function getLogin()
    {
        $this->layout->title = 'SOS - Login';
        $this->layout->content = \View::make('admin.users.login');
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param type var Description
     **/
    public function postLogin()
    {
        $validator = \Validator::make(\Input::all(), ['username' => 'required', 'password' => 'required']);
        if ($validator->fails()) {
            return \Redirect::route('getLogin')
                ->withGlobalMessage(trans('admin/users.controller.empry_fields'))
                ->withInput(\Input::except('password'));
        } else {
            $credentials = [
                'username' => \Input::get('username'),
                'password' => \Input::get('password'),
            ];
            if (\Auth::attempt($credentials, ( boolean ) \Input::get('remember') )) {
                return \Redirect::route('home');
            } else {
                return \Redirect::route('getLogin')
                    ->withGlobalMessage(trans('admin/users.controller.credentials'))
                    ->withInput(\Input::except('password'));
            }
        }
        
    }
}
