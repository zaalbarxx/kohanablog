<?php
defined('SYSPATH') or die('No direct script access.');

class View_Admin_Blog_Index extends View_LayoutAdmin
{
	public $title = 'Admin Blog Management';
	public $blogs, $pagination;

	public function newblog()
	{
		Fire::dump('log', Session::instance()->get('errors'));
		return Route::url('admin_blog_action', array('action' => 'add'));
	}

	public function blogs()
	{
		$results = array();
		foreach ($this->blogs as $b) {
			$temp = array();
			$temp['id'] = $b->id;
			$temp['title'] = $b->title;
			$temp['blog'] = $this->truncate($b->blog, 150);
			$temp['editURL'] = Route::url('admin_blog_action', array('action' => 'edit', 'id' => $b->id));
			$temp['deleteURL'] = Route::url('admin_blog_action', array('action' => 'delete', 'id' => $b->id));
			$results[] = $temp;
		}
		return $results;
	}

	public function pagination()
	{
		return $this->pagination;
	}

	public function status()
	{
		$a = Session::instance()->get_once('errors');
		Fire::dump('log', $a);
		if ($a == null) {
			return false;
		} else if ($a == 'OK') {
			return $this->comment_ok;
		} else {
			$b = array();
			foreach ($a as $key => $value) {
				$b[] = ucfirst($value);
			}
			return $b;
		}
	}

	private function truncate($string, $length)
	{
		if (strlen($string) > $length) {
			return substr($string, 0, $length) . '...';
		} else {
			return $string;
		}
	}
}