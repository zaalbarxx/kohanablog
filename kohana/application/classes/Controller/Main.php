<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Main extends Controller {

    public function action_index() {
        $view = Kostache_Layout::factory('layout');
        $this->response->body($view->render(new View_Page_Index));
    }

    public function action_show() {
        $id = $this->request->param('id');
        $view = new Kostache_Layout('layout');
        $view->id = $id;
        $this->response->body($view->render(new View_Blog_Show));
    }

    public function action_contact_add() {
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
            }
            else{
                Session::instance()->set('status', 'OK');
            }
        }
        $this->redirect(Route::url('contact'));
    }

    public function action_contact() {
        $view = Kostache_Layout::factory('layout')->render(new View_Page_Contact);
        $this->response->body($view);
    }

    public function action_about() {
        $view = Kostache_Layout::factory('layout')->render(new View_Page_About);
        $this->response->body($view);
    }

    public function action_search(){
        $query = mysql_real_escape_string($this->request->query('query'));
        $view = Kostache_Layout::factory('layout');
        $model = new View_Page_Search;
        $model->query = $query;
        $this->response->body($view->render($model));
    }

}

// End Welcome
