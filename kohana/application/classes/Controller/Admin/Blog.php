<?php
defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Blog extends Controller
{
	public $template;
	public function before()
	{
		if(!Auth::instance()->logged_in('admin')){
			$this->redirect(Route::url('admin_auth',array('action'=>'login')));
		}
		$this->template = Kostache_Layout::factory('LayoutAdmin');
	}

	public function action_index()
	{
		$pagination = Pagination::factory(Kohana::$config->load('pagination')->get('admin_blogs_comments'));
		$pagination->setup(array('total_items'=>ORM::factory('blog')->count_all()));
		$blogs = ORM::factory('blog')->order_by('created','DESC')->limit($pagination->items_per_page)->offset($pagination->offset)->find_all();
		$view = new View_Admin_Blog_Index;
		$view->blogs = $blogs;
		$view->pagination = $pagination->render();
		$this->response->body($this->template->render($view));
	}

	public function action_delete()
	{
		if ($this->request->param('id') !== null) {
			$blog = ORM::factory('blog', $this->request->param('id'));
			Db::delete('comment')->where('blog_id', '=', $this->request->param('id'))->execute();
			$blog->delete();
			$this->redirect(Route::url('admin_blog_index'));
		}
	}

	public function action_edit()
	{
		$blog = ORM::factory('blog', $this->request->param('id'));
		if ($this->request->method() == 'POST') {
			$blog->title = $this->request->post('title');
			$blog->author = $this->request->post('author');
			$blog->blog = $this->request->post('blog');
			$blog->created = Db::expr('NOW()');
			$blog->updated = Db::expr('NOW()');
			$blog->tags = $this->request->post('tags');
			try {
				$blog->update();
			} catch (ORM_Validation_Exception $e) {
				$errors = $e->errors('errors');
				Session::instance()->set('errors', $errors);
			}
			$this->redirect(Route::url('admin_blog_index'));
		} else {
			$view = new View_Admin_Blog_Edit;
			$view->blog = $blog;
			$view->id = $this->request->param('id');
			$this->response->body($this->template->render($view));
		}
	}

	public function action_add()
	{
		if ($this->request->method() == 'POST') {
			$blog = ORM::factory('blog');
			$blog->title = $this->request->post('title');
			$blog->author = $this->request->post('author');
			$blog->blog = $this->request->post('blog');
			$blog->created = Db::expr('NOW()');
			$blog->updated = Db::expr('NOW()');
			$blog->tags = $this->request->post('tags');
			$blog->slug = $blog->slugify($this->request->post('title'));
			try {
				$blog->save();
			} catch (ORM_Validation_Exception $e) {
				$errors = $e->errors('errors');
				Session::instance()->set('errors', $errors);
			}
			$this->redirect(Route::url('admin_blog_index'));
		} else {
			$view = new View_Admin_Blog_Create;
			$this->response->body($this->template->render($view));
		}
	}

}