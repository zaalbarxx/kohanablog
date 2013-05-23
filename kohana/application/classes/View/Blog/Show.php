<?php

class View_Blog_Show extends View_Layout
{
	public $title,$result;
    public $id, $comments, $cycle = 'odd';
    public $comment_ok = 'Comment has been added correctly!';

//	public function title(){
//		return $this->blog->title.$this->title;
//	}


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

    public function comments_form()
    {
	    Fire::log($this->id);
        return array(
            Form::open(Route::url('comment_add', array('id' => $this->id)), array('id' => 'comment_form', 'class' => 'blogger')),
            Form::label('username', 'User:'),
            Form::input('username'),
            Form::label('body', 'Body:'),
            Form::textarea('body'),
          //  Form::hidden('slug',$this->blog->slug),
            Form::submit('submit', 'Submit'),
            Form::close()
        );
    }


}