<?php
defined('SYSPATH') or die('No direct script access.');

class View_Admin_Login extends View_LayoutAdmin
{
	public function error(){
		return Session::instance()->get_once('login_error',FALSE);

	}
	public function form()
	{
		return array(
			Form::open(Route::url('admin_auth', array('action' => 'validate')), array('method' => 'POST')),
			Form::label('username', 'Username:'),
			Form::input('username',NULL,array('required'=>'required')),
			Form::label('password', 'Password:'),
			Form::password('password',NULL,array('required'=>'required')),
			Form::submit('submit','Login'),
			Form::close()
		);
	}

}