<?php

class AuthController extends BaseController {

	public function postCheck()
	{
		$c = array(

			'username'=>Input::get('username'),
			'password'=>Input::get('password')

		);

		if(Auth::attempt($c)){
			return Redirect::to('/');
		}
		
		return Redirect::to('login')->with('alert.danger', Alert::text('uel'));
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::guest('web')->with('alert.success', Alert::text('usl'));
	}
	
}
