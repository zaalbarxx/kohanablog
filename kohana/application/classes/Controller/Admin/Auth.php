<?php
defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Auth extends Controller{
	private $view;
	public function before(){
		$this->view = Kostache_Layout::factory('LayoutAdmin');
	}
	public function action_logout(){
		Auth::instance()->logout();
		$this->redirect(Route::url('admin_auth',array('action'=>'login')));
	}
	public function action_validate(){
		if($this->request->method()=='POST'){
			Auth::instance()->login($this->request->post('username'),$this->request->post('password'));
			if(Auth::instance()->logged_in('admin')){
				Session::instance()->set('username',$this->request->post('username'));
				$this->redirect(Route::url('admin_index'));
			}
			else{
				Session::instance()->set('login_error',TRUE);
				$this->redirect(Route::url('admin_auth',array('action'=>'login')));
			}
		}
		else{
			$this->redirect(Route::url('admin_auth',array('action'=>'login')));
		}
	}
	public function action_login(){
	$this->response->body($this->view->render(new View_Admin_Login));
	}

}