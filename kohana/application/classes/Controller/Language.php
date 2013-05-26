<?php
defined('SYSPATH') or die('No direct script access.');

class Controller_Language extends Controller{
public function action_change(){
	Fire::dump('post',$this->request->post('language'));
	if(in_array($this->request->post('language'),array('pl','en'))){
		Cookie::set('lang',$this->request->post('language'));
		I18n::lang($this->request->post('language'));
		$this->redirect($this->request->uri());
	}
}

}