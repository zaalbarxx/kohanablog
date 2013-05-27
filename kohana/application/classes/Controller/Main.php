<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Main extends Controller
{
	private $layout, $view;

	public function before()
	{
		$this->layout = Kostache_Layout::factory('layout');
		Session::instance()->set('redirect', $this->request->uri());
	}

	public function after()
	{
		$this->view->tags = ORM::factory('blog')->select('tags')->find_all();
		$this->view->latest_comments = ORM::factory('comment')->order_by('created', 'DESC')->with('blog')->limit(3)->find_all();
		$this->response->body($this->layout->render($this->view));
}

	public function action_index()
	{
		$pagination = Pagination::factory(Kohana::$config->load('pagination')->get('default'));
		$pagination->setup(array('total_items' => ORM::factory('blog')->count_all()));
		$blogs = ORM::factory('blog')->getBlogsCountComments($pagination);
		$this->view = new View_Page_Index;
		$this->view->pagination = $pagination->render();
		$this->view->blogs = $blogs;
	}


	public function action_contact_add()
	{
		if (HTTP_Request::POST == $this->request->method()) {
			Session::instance()->set('sent', 'true');

			$post = Validation::factory($_POST)
				->rule(TRUE, 'not_empty')
				->rule('email', 'email')
				->rule('subject', 'max_length', array((':value'), '50'))
				->rule('body', 'min_length', array((':value'), '20'))
				->rule('body', 'max_length', array((':value'), '800'));
			if (!$post->check()) {
				$errors = $post->errors('post');
				Session::instance()->set('status', $errors);
			} else {
				Session::instance()->set('status', 'OK');
			}
		}
		$this->redirect(Route::url('contact'));
	}

	public function action_contact()
	{
		$this->view = new View_Page_Contact;
	}

	public function action_about()
	{
		$this->view = new View_Page_About;
	}

	public function action_search()
	{
		$query = mysql_real_escape_string($this->request->query('query'));
		$results = ORM::factory('blog')->search_results($query);
		$this->view = new View_Page_Search;
		$this->view->query = $query;
		$this->view->results = $results;
	}

}

