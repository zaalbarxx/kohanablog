<?php
defined('SYSPATH') or die('No direct script access.');

class Controller_Language extends Controller{
public function action_change(){
	Fire::log(Session::instance()->get('redirect'));
	if(in_array($this->request->post('language'),array('pl','en'))){
		Cookie::set('lang',$this->request->post('language'));
		I18n::lang($this->request->post('language'));
		$this->redirect(Session::instance()->get('redirect'));
	}
}

}