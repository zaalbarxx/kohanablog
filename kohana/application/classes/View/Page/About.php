<?php

class View_Page_About extends View_Layout{
	public function __construct(){
		parent::__construct();
		$this->__about_message = __('about_message');
	}
    public function title(){
        return __('About').$this->title;
    }
}