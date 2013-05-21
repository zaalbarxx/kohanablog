<?php
	/**
	 * Created by JetBrains PhpStorm.
	 * User: Maxx
	 * Date: 21.05.13
	 * Time: 19:44
	 * To change this template use File | Settings | File Templates.
	 */

	class View_Page_Contact extends View_Layout
	{
		public function title(){
			return 'Contact '.$this->title;
		}

		public function contact_form(){

//			return array(
//				Form::open(Route::url('contact'), array('id' => 'contact_form', 'class' => 'blogger')),
//				Form::label('username', 'User:'),
//				Form::input('username'),
//				Form::label('body', 'Body:'),
//				Form::submit('submit', 'Submit'),
//				Form::close()
//			);
			return array(
				Form::open(Route::url('contact_add'),array('method'=>'POST','class'=>'blogger')),
				Form::label('name','Name:'),
				Form::input('name'),
				Form::label('email','Email:'),
				Form::input('email',NULL,array('type'=>'email')),
				Form::label('subject','Subject:'),
				Form::input('subject'),
				Form::label('body','Message:'),
				Form::textarea('body'),
				Form::submit('submit','Submit'),
				Form::close()
			);
		}
}