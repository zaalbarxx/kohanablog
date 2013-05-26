<?php
defined('SYSPATH') or die('No direct script access.');

class View_Admin_Comment_Index extends View_LayoutAdmin{
	public $comments;

	public function comments(){
		$results = array();
		foreach($this->comments as $c){
			$temp = array();
			$temp['id'] = $c->id;
			$temp['blog_id'] = $c->blog_id;
			$temp['user'] = $c->user;
			$temp['comment'] = Text::limit_chars($c->comment,200);
			$temp['approved'] = ($c->approved=='1')?'Yes':'No';
			$temp['editURL'] = (Route::url('admin_comment_action',array('action'=>'edit','id'=>$c->id)));
			$temp['deleteURL'] = (Route::url('admin_comment_action',array('action'=>'delete','id'=>$c->id)));
			$results[] = $temp;
		}
		return $results;
	}

}