<?php

class Admin extends BaseController {

	public function getIndex()
	{
		Session::put('curr', 'db');
		return View::make('admin.dashboard');
	}


	public function login()
	{
		if(!Auth::guest()) return Redirect::to('');
		return View::make('login');
	}

}
