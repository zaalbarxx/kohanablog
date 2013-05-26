<?php
defined('SYSPATH') or die('No direct script access.');

class View_Admin_Comment_Edit extends View_LayoutAdmin
{
	public $id, $comment;
	public function form()
	{
		return array(
			Form::open(Route::url('admin_comment_action', array('action' => 'edit','id'=>$this->id)), array('method' => 'POST', 'class' => 'blogger')),
			Form::label('user', 'User:'),
			Form::input('user',$this->comment->user),
			Form::label('Comment', 'Comment:'),
			Form::textarea('comment',$this->comment->comment),
			Form::select('approved',array('Yes','No'),($this->comment->approved=='1')?'Yes':'No'),
			Form::submit('submit', 'Submit'),
			Form::close()
		);
	}

}