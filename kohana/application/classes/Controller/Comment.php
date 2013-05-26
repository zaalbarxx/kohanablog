<?php
defined('SYSPATH') or die('No direct script access.');

class Controller_Comment extends Controller{
	public function action_add(){
		if($this->request->method()=='POST'){
			$session = Session::instance();
				if(isset($_SESSION['lastCommentTime'])){
					$now = new DateTime();
					$diff = $now->diff($session->get('lastCommentTime'));
					if($diff->s<10){
						$session->set('status',array('You have to wait to write new comment.'));
						$this->redirect(Route::url('blog_show',array('id'=>$this->request->param('id'),'slug'=>$this->request->post('slug'))));
					}
				}
				$orm = ORM::factory('comment',$this->request->param('id'));
				$orm->user = $this->request->post('username');
				$orm->comment = $this->request->post('body');
				$orm->approved = 1;
				$orm->created = Db::expr('NOW()');
				$orm->updated = Db::expr('NOW()');
			try{
				$orm->save();
				$session->set('lastCommentTime',new DateTime());
			}
			catch(ORM_Validation_Exception $e){
				$session->set('status',$e->errors('rules'));
			}
			$this->redirect(Route::url('blog_show',array('id'=>$this->request->param('id'),'slug'=>$this->request->post('slug'))));
		}
		else{
			$this->redirect(Route::url('index'));
		}
	}

}