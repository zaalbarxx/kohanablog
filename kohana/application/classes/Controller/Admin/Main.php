<?php
defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Main extends Controller{

	public function before(){
		if(!Auth::instance()->logged_in('admin')){
			$this->redirect(Route::url('admin_auth',array('action'=>'login')));
		}
	}
	public function action_index(){
		$view = Kostache_Layout::factory('layoutadmin');
		$this->response->body($view->render(new View_Admin_Index));
	}

}