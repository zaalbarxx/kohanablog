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
        $this->response->body($layout->render($view));


    }

}