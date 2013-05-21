<?php
class View_Page_Index extends View_Layout{
	public function blogs(){
		$orm = ORM::factory('blog')->find_all();
		$results = array();
		foreach($orm as $r){
			$comments = $r->comment->count_all();
			$temp = array(
				'url' => Route::url('blog_show',array('id'=>$r->id,'slug'=>$r->slug)),
				'title'=>$r->title,
				'blog'=>$this->truncate($r->blog,500),
				'author'=>$r->author,
				'created'=>$r->created,
				'tags'=>$r->tags,
				'comments'=>$comments
			);
			$results[] = $temp;
		}
		return $results;
	}



	private function truncate($string,$length){
		if(strlen($string)>$length){
			return substr($string,0,$length).'...';
		}
		else{
			return $string;
		}
	}
}