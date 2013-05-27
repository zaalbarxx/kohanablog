<?php

class View_Blog_Show extends View_Layout
{
	public $title,$blog;
    public $id, $comments, $cycle = 'odd';
    public $comment_ok = 'Comment has been added correctly!';
	public function __construct(){
		parent::__construct();
		$this->__add_comment = __('Add Comment');
		$this->__user = __('User');
		$this->__body = __('Body');
		$this->__submit = __('Submit');
		$this->__commented = __('commented');
		$this->__comments = __('Comments');
		$this->__no_comments_for_post = __('There are no comments for this post. Be the first to comment.');
	}
	public function title(){
		return $this->blog->title.$this->title;
	}
    public function cycle()
    {
        if ($this->cycle == 'odd') {
            $this->cycle = 'even';
            return 'even';
        } else {
            $this->cycle = 'odd';
            return 'odd';
        }
    }

    public function status()
    {
        $a = Session::instance()->get_once('status');
        if ($a == null) {
            return false;
        } else if ($a == 'OK') {
            return $this->comment_ok;
        } else {
            $b = array();
            foreach ($a as $key => $value) {
                $b[] = ucfirst($value);
            }
            return $b;
        }
    }
	public function get_comments(){
		return $this->comments;
	}
    public function comments_form()
    {
        return array(
            Form::open(Route::url('comment_add', array('id' => $this->id)), array('id' => 'comment_form', 'class' => 'blogger')),
            Form::label('username', __('User').':'),
            Form::input('username'),
            Form::label('body', __('Body').':'),
            Form::textarea('body'),
            Form::hidden('slug',$this->blog->slug),
            Form::submit('submit', __('Submit')),
            Form::close()
        );
    }


}