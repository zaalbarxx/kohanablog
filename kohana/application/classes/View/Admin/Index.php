<?php
defined('SYSPATH') or die('No direct script access.');

class View_Admin_Index extends View_LayoutAdmin
{

	public function options()
	{
		return array(
			array('name' => 'Manage posts', 'url' => Route::url('admin_blog_index')),
			array('name'=>'Manage commments','url'=>Route::url('admin_comment_index'))
		);
	}
}