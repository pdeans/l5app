<?php namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller {

	// User model instance
	protected $user;
	// For Guard implementation
	protected $auth;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, User $user)
	{
		$this->auth = $auth;
		$this->user = $user;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	 * User registration form
	 *
	 * @return views->forms->register
	 */
	public function getRegister()
	{
		return view('forms.register');
	}

	/**
	 * User registration form handler
	 *
	 * @param  RegisterRequest $request
	 * @return redirect->'/'
	 */
	public function postRegister(RegisterRequest $request)
	{
		$this->user->name     = $request->name;
		$this->user->email    = $request->email;
		$this->user->password = bcrypt($request->password);
		$this->user->save();

		$this->auth->login($this->user);

		return redirect('/');
	}

	/**
	 * User login form
	 *
	 * @return views->forms->login
	 */
	public function getLogin()
	{
		return view('forms.login');
	}

	/**
	 * User login form handler
	 *
	 * @param  LoginRequest $request
	 * @return redirect->'/'
	 */
	public function postLogin(LoginRequest $request)
	{
		if ($this->auth->attempt($request->only('email', 'password'))) {
			return redirect('/');
		}

		return redirect('/')->withErrors();
	}

	/**
	 * Log out the user
	 *
	 * @return redirect->'/'
	 */
	public function getLogout()
	{
		$this->auth->logout();

		return redirect('/');
	}

}
