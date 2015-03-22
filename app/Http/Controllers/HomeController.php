<?php namespace App\Http\Controllers;

class HomeController extends Controller {

	/**
	 * Show the application homepage to the user.
	 *
	 * @return views->base
	 */
	public function index()
	{
		return view('home');
	}

}
