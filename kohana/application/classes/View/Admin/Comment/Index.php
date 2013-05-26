<?php
defined('SYSPATH') or die('No direct script access.');

class View_Admin_Comment_Index extends View_LayoutAdmin{
	public $comments,$pagination;

	public function comments(){
		$results = array();
		foreach($this->comments as $c){
			$temp = array();
			$temp['id'] = $c->id;
			$temp['blog_id'] = $c->blog_id;
			$temp['user'] = $c->user;
			$temp['comment'] = Text::limit_chars($c->comment,200);
			$temp['approved'] = $this->approve($c->approved);
			$temp['editURL'] = (Route::url('admin_comment_action',array('action'=>'edit','id'=>$c->id)));
			$temp['deleteURL'] = (Route::url('admin_comment_action',array('action'=>'delete','id'=>$c->id)));
			$results[] = $temp;
		}
		return $results;
	}
	public function pagination(){
		return $this->pagination;
	}
	private function approve($value){
		if($value=='1'){
			return '<option selected>yes</option><option>no</option>';
		}
		else{
			return '<option>yes</option><option selected>no</option>';
		}
	}

}