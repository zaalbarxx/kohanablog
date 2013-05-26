<?php
defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Comment extends Controller
{
	public $template;

	public function before()
	{
		if (!Auth::instance()->logged_in('admin')) {
			$this->redirect(Route::url('admin_auth', array('action' => 'login')));
		}
		$this->template = Kostache_Layout::factory('LayoutAdmin');
	}

	public function action_delete()
	{
		if ($this->request->param('id') !== null) {
			$comment = ORM::factory('comment', $this->request->param('id'));
			$comment->delete();
			$this->redirect(Route::url('admin_blog_index'));
		}
	}
	public function action_edit()
	{
		$comment = ORM::factory('comment', $this->request->param('id'));
		if ($this->request->method() == 'POST') {
			$comment->user = $this->request->post('user');
			$comment->comment = $this->request->post('comment');
			$comment->created = Db::expr('NOW()');
			$comment->updated = Db::expr('NOW()');
			$comment->approved = ($this->request->post('approved')=='Yes')?'1':'0';
			try {
				$comment->update();
			} catch (ORM_Validation_Exception $e) {
				$errors = $e->errors('errors');
				Session::instance()->set('errors', $errors);
			}
			$this->redirect(Route::url('admin_comment_index'));
		} else {
			$view = new View_Admin_Comment_Edit;
			$view->comment = $comment;
			$view->id = $this->request->param('id');
			$this->response->body($this->template->render($view));
		}
	}
	public function action_index()
	{
		$pagination = Pagination::factory(Kohana::$config->load('pagination')->get('admin_blogs_comments'));
		$pagination->setup(array('total_items'=>ORM::factory('comment')->count_all()));
		$comments = ORM::factory('comment')->order_by('created','DESC')->limit($pagination->items_per_page)->offset($pagination->offset)->find_all();
		$view = new View_Admin_Comment_Index;
		$view->pagination = $pagination->render();
		$view->comments = $comments;
		$this->response->body($this->template->render($view));
	}
}