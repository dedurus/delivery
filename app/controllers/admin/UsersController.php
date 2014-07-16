<?php namespace Admin;

use \Repositories\Admin\Interfaces\UsersInterfaceRepository;

class UsersController extends \Admin\BaseController
{
    /**
     * The user repository implementation.
     * 
     * @var \Repositories\Admin\Controllers\UsersRepository
     */
    protected $users;

    /**
     * Create a new UserRepository instance.
     * 
     * @param \Repositories\Admin\Controllers\UsersRepository $users
     * @return void
     */
    public function __construct(UsersInterfaceRepository $users)
    {
        $this->users = $users;
    }

    /**
     * The default layout of authentication
     * 
     * @var $layout
     **/
    protected $layout = 'admin.layouts.login';

    /**
     * View for authentication of users
     *
     * @return void
     **/
    public function getLogin()
    {
        $this->layout->title = 'Login';
        $this->layout->content = \View::make('admin.users.login');
    }

    /**
     * Authentication of user
     *
     * @return object redirect view
     **/
    public function postLogin()
    {
        return $this->users->logar();
    }
    
    /**
     * Logout of user
     * 
     * @return object redirect view
     */
    public function logout()
    {
        \Auth::logout();
        return \Redirect::route('admin.getLogin');
    }
}
