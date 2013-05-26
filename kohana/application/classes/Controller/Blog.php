<?php
defined('SYSPATH') or die('No direct script access.');
class Controller_Blog extends Controller{
    
    public function action_show(){
        $id = $this->request->param('id');
	    $result = ORM::factory('blog',$id);
        $layout = Kostache_Layout::factory('layout');
        $view = new View_Blog_Show;
        $view->id = $id;
	    $view->blog = $result;
	    $view->comments = $result->comment->where('approved','=','1')->find_all();
	    $view->tags = ORM::factory('blog')->select('tags')->find_all();
	    $view->latest_comments = ORM::factory('comment')->order_by('created', 'DESC')->with('blog')->limit(3)->find_all();
        $this->response->body($layout->render($view));


    }

}