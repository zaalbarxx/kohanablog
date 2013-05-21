<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Maxx
 * Date: 21.05.13
 * Time: 21:38
 * To change this template use File | Settings | File Templates.
 */

class View_LayoutAdmin {

	public function base(){
		return URL::base();
	}
	public function logout(){
		if(Auth::instance()->logged_in()) return array('name'=>'Logout','url'=>Route::url('admin_auth',array('action'=>'logout')));
		else
			return false;
	}

	public function username(){
		if(Auth::instance()->logged_in()){
			return Session::instance()->get('username');
		}
	}
}