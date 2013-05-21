<?php

defined('SYSPATH') or die('No direct script access.');

class Model_Blog extends ORM {
    protected $_table_name = 'blog';
    protected $_has_many = array(
        'comment' => array(
            'model' => 'comment',
            'foreign_key' => 'blog_id'
        )
    );

    public function rules() {
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
                array('max_length', array(':value', 500))
            ),
            'image' => array(
                array('min_length', array(':value', 4)),
                array('max_length', array(':value', 64)),
            ),
            'tags' => array(
                array('min_length', array(':value', 4)),
                array('max_length', array(':value', 128)),
            ),
            'created' => array(
                array('datetime')
            ), 'updated' => array(
                array('datetime')
            ), 'slug' => array(
                array('not_empty'),
                array('max_length', array(':value', 200)),
            )
        );
    }

    public function getLatestBlogs($limit = null) {
        $query = $this->order_by('created','DESC');
        if ($limit != null) {
            $query->limit($limit);
        }
        return $query->find_all();
    }

    public function getTags() {
        $results = $this->select('tags')->find_all();
        $tags = array();
        foreach ($results as $result) {
            $tags = array_merge(explode(',', $result->tags), $tags);
        }
        foreach ($tags as $tag) {
            $tag = trim($tag);
        }
        return $tags;
    }

    public function getTagsWeight($tags) {
        $tagWeights = array();
        if (empty($tags))
            return $tagWeights;

        foreach ($tags as $tag) {
            $tagWeights[$tag] = (isset($tagWeights[$tag]) ? $tagWeights[$tag] + 1 : 1);
        }
        uksort($tagWeights, function() {
            return rand() > rand();
        });

        $max = max($tagWeights);


        $multiplier = ($max > 5) ? 5 / $max : 1;
        foreach ($tagWeights as &$tag) {
            $tag = ceil($tag * $multiplier);
        }
        $arr = array();
        foreach($tagWeights as $key=>$value){
            $arr[] = array('name'=>$key,'value'=>$value);
        }
        return $arr;
    }

}

?>
