<?php
defined('SYSPATH') or die('No direct script access.');
class View_Admin_Blog_Create extends View_LayoutAdmin
{
	public function form()
	{
		return array(
			Form::open(Route::url('admin_blog_action', array('action' => 'add')), array('method' => 'POST','class'=>'blogger')),
			Form::label('author','Author:'),
			Form::input('author'),
			Form::label('title','Title:'),
			Form::input('title'),
			Form::label('blog','Body:'),
			Form::textarea('blog'),
			Form::label('tags','Tags:'),
			Form::input('tags'),
			Form::submit('submit','Submit'),
			Form::close()
		);
	}
}
