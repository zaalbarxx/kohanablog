<?php
class View_Page_Index extends View_Layout{
	public $blogs,$comments,$pagination;
	public function blogs(){
		$results = array();
		foreach($this->blogs as $r){
			$date = new DateTime($r['created']);
			$date = $date->format('Y M d h:i');
			$temp = array(
				'url' => Route::url('blog_show',array('id'=>$r['id'],'slug'=>$r['slug'])),
				'title'=>$r['title'],
				'blog'=>$this->truncate($r['blog'],500),
				'author'=>$r['author'],
				'created'=>$date,
				'tags'=>$r['tags'],
				'comments'=>$r['comments']
			);
			$results[] = $temp;
		}
		return $results;
	}


	public function pagination(){
		return $this->pagination;
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