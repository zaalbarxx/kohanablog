<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Maxx
 * Date: 09.05.13
 * Time: 20:28
 * To change this template use File | Settings | File Templates.
 */

class View_Blog_Show extends View_Layout
{
	public $title;
    public $id, $blog, $cycle = 'odd';
    public $comment_ok = 'Comment has been added correctly!';

    public function blog()
    {
        $result = ORM::factory('blog', $this->id);
        $this->blog = $result;
        $this->title =$result->title.$this->title;
        return $result;
    }

    public function get_comments()
    {
        $r = $this->blog->comment->order_by('created','DESC')->find_all();
        return $r;
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
	    Fire::dump('errors',Session::instance()->get('status'));
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

        return array(
            Form::open(Route::url('comment_add', array('id' => $this->id)), array('id' => 'comment_form', 'class' => 'blogger')),
            Form::label('username', 'User:'),
            Form::input('username'),
            Form::label('body', 'Body:'),
            Form::textarea('body'),
            Form::hidden('slug',$this->blog->slug),
            Form::submit('submit', 'Submit'),
            Form::close()
        );
    }


}