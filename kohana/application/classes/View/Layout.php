<?php
class View_Layout
{
	public $title = 'Kohana Blog';

	public function base()
	{
		return URL::base();
	}

	public function navi_bar()
	{
		return array(
			array('name' => 'Home', 'url' => Route::url('index')),
			array('name' => 'About', 'url' => Route::url('about')),
			array('name' => 'Contact', 'url' => Route::url('contact'))
		);
	}

	public function search_form()
	{
		return array(
			Form::open(Route::url('search'), array('method' => 'GET')),
			Form::input('query'),
			Form::submit(NULL, 'Search'),
			Form::close()
		);
	}

	public function tags()
	{
		$blogtags = ORM::factory('blog')->select('tags')->find_all();
		$tags = array();
		foreach ($blogtags as $blogTag) {
			$tags = array_merge(explode(",", $blogTag->tags), $tags);
		}

		foreach ($tags as &$tag) {
			$tag = trim($tag);
		}
		$result = $this->getTagsWeight($tags);
		return $result;
	}
	public function latest_comments(){
		$comments = ORM::factory('comment')->order_by('created','DESC')->with('blog')->limit(3)->find_all();
		$results = array();
		foreach($comments as $c){
			$results[] = array(
				'user'=>$c->user,
				'id'=>$c->id,
				'title'=>$c->blog->title,
				'comment'=>$this->strip($c->comment,120),
				'created'=>$this->time_ago($c->created),
				'url'=>Route::url('blog_show',array('id'=>$c->blog->id,'slug'=>$c->blog->slug))
			);
		}
		return $results;
	}
	private function time_ago($time){
		$now = new DateTime();
		$created = new DateTime($time);
		$diff = $now->diff($created,TRUE);
		if($diff->y>0){
			return $diff->y.' years ago';
		}
		if($diff->m>0){
			return $diff->m.' months ago';
		}
		if($diff->d>0){
			return $diff->d.' days ago';
		}
		if($diff->h>0){
			return $diff->h.' hours ago';
		}
		if($diff->i>0){
			return $diff->y.' minutes ago';
		}
		else{
			return '< 1 minute ago';
		}

	}
	private function strip($string,$limit){
		if(strlen($string)>$limit) return substr($string,0,$limit);
		return $string;
	}
	private function getTagsWeight($tags)
	{
		$tagWeights = array();
		if (empty($tags))
			return $tagWeights;

		foreach ($tags as $tag) {
			$tagWeights[$tag] = (isset($tagWeights[$tag])) ? $tagWeights[$tag] + 1 : 1;
		}
		// Shuffle the tags
		uksort($tagWeights, function () {
			return rand() > rand();
		});

		$max = max($tagWeights);

		// Max of 5 weights
		$multiplier = ($max > 5) ? 5 / $max : 1;
		foreach ($tagWeights as &$tag) {
			$tag = ceil($tag * $multiplier);
		}
		$res = array();
		foreach($tagWeights as $key=>$value){
			$res[] = array('name'=>$key,'weight'=>$value);
		}
		return $res;
	}
}
