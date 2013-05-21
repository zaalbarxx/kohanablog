<?php
class View_Layout
{
	public $title = 'Kohana Blog';

	public function base()
	{
		return URL::base();
	}

	public function navi_bar()
	{
		return array(
			array('name' => 'Home', 'url' => Route::url('index')),
			array('name' => 'About', 'url' => Route::url('about')),
			array('name' => 'Contact', 'url' => Route::url('contact'))
		);
	}
}
