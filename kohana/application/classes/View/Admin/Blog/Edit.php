<?php
defined('SYSPATH') or die('No direct script access.');

class View_Admin_Blog_Edit extends View_LayoutAdmin
{
	public $blog,$id;
	public function form()
	{
		return array(
			Form::open(Route::url('admin_blog_action', array('action' => 'edit','id'=>$this->id)), array('method' => 'POST', 'class' => 'blogger')),
			Form::label('author', 'Author:'),
			Form::input('author',$this->blog->author),
			Form::label('title', 'Title:'),
			Form::input('title',$this->blog->title),
			Form::label('blog', 'Body:'),
			Form::textarea('blog',$this->blog->blog),
			Form::label('tags', 'Tags:'),
			Form::input('tags',$this->blog->tags),
			Form::submit('submit', 'Submit'),
			Form::close()
		);
	}

}