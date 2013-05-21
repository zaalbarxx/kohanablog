<?php
defined('SYSPATH') or die('No direct script access.');
class Controller_Blog extends Controller{
    
    public function action_show(){
        $id = $this->request->param('id');
        $view = Kostache_Layout::factory('layout');
        $view_model = new View_Blog_Show;
        $view_model->id = $id;
        $this->response->body($view->render($view_model));


    }

}