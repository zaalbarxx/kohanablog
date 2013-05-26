<?php

defined('SYSPATH') or die('No direct script access.');

class Model_Blog extends ORM
{
	protected $_table_name = 'blog';
	protected $_has_many = array(
		'comment' => array(
			'model' => 'comment',
			'foreign_key' => 'blog_id'
		)
	);

	public function rules()
	{
		return array(
			'title' => array(
				array('min_length', array(':value', 4)),
				array('max_length', array(':value', 255))
			),
			'author' => array(
				array('not_empty'),
				array('min_length', array(':value', 4)),
				array('max_length', array(':value', 100))
			),
			'blog' => array(
				array('not_empty'),
				array('min_length', array(':value', 4)),
				array('max_length', array(':value', 2500))
			),
			'image' => array(
				array('min_length', array(':value', 4)),
				array('max_length', array(':value', 64)),
			),
			'tags' => array(
				array('min_length', array(':value', 4)),
				array('max_length', array(':value', 128)),
			),
			'slug' => array(
				array('not_empty'),
				array('max_length', array(':value', 200)),
			)
		);
	}

	public function getBlog($id)
	{
		return $this->where('id', '=', $id)->find();
	}

	public function getBlogsCountComments($pagination)
	{
		$query = $this->order_by('created', 'DESC')->offset($pagination->offset)->limit($pagination->items_per_page);
		$query = $query->find_all();
		$results = array();
		foreach ($query as $q) {
			$comments_count = $q->comment->count_all();
			$results[] = array_merge($q->as_array(), array('comments' => $comments_count));
		}
		return $results;
	}

	public function search_results($query)
	{
		$results = ORM::factory('blog')->where('title', 'LIKE', '%' . $query . '%')
			->or_where('blog', 'LIKE', '%' . $query . '%')
			->or_where('author', 'LIKE', '%' . $query . '%')
			->or_where('tags', 'LIKE', '%' . $query . '%')->find_all();
		return $results;
	}

	public function slugify($text)
	{
		// replace non letter or digits by -
		$text = preg_replace('#[^\\pL\d]+#u', '-', $text);

		// trim
		$text = trim($text, '-');

		// transliterate
		if (function_exists('iconv')) {
			$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		}

		// lowercase
		$text = strtolower($text);

		// remove unwanted characters
		$text = preg_replace('#[^-\w]+#', '', $text);

		if (empty($text)) {
			return 'n-a';
		}

		return $text;
	}

}

?>
