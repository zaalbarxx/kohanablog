<?php
defined('SYSPATH') or die('No direct script access.');

class Controller_Comment extends Controller{
	public function action_add(){
		if($this->request->method()=='POST'){
			$rules = Validation::factory($_POST)->rule(TRUE,'not_empty')
				->rule('username', 'max_length', array((':value'), '600'))
				->rule('body', 'max_length', array((':value'), '600'));

			if($rules->check()){
				$orm = ORM::factory('comment',$this->request->param('id'));
				$orm->user = $this->request->post('username');
				$orm->comment = $this->request->post('body');
				$orm->approved = 1;
				$orm->created = Db::expr('NOW()');
				$orm->updated = Db::expr('NOW()');
				$orm->save();
				$this->redirect(Route::url('blog_show',array('id'=>$this->request->param('id'),'slug'=>$this->request->post('slug'))));
			}
			else{
				Session::instance()->set('status',$rules->errors('rules'));
				$this->redirect(Route::url('blog_show',array('id'=>$this->request->param('id'),'slug'=>$this->request->post('slug'))));
			}
		}
		else{
			$this->redirect(Route::url('index'));
		}
	}

}