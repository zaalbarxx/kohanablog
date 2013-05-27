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
		public function __construct(){
			parent::__construct();
			$this->__contact_message = __('Contact message');
			$this->__contact = __('Contact with');
		}
		public function title(){
			return __('Contact').$this->title;
		}

		public function contact_form(){
			return array(
				Form::open(Route::url('contact_add'),array('method'=>'POST','class'=>'blogger')),
				Form::label('name',__('Name:')),
				Form::input('name'),
				Form::label('email',__('Email:')),
				Form::input('email',NULL,array('type'=>'email')),
				Form::label('subject',__('Subject:')),
				Form::input('subject'),
				Form::label('body',__('Message:')),
				Form::textarea('body'),
				Form::submit('submit',__('Submit')),
				Form::close()
			);
		}
}