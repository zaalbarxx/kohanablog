<?php

class View_Page_Search extends View_Layout
{
    public $query,$results;
    protected $truncate_val = 30;

    public function results()
    {
        $search = array();
        foreach ($this->results as $res) {
            $r = $res->as_array();
            $r['title'] = $res->title;
            $r['blog'] = $this->truncatePreserveWords($res->blog,$this->query,5,'b');
            $r['created'] = $res->created;
            $r['author'] = $res->author;
            $r['tags'] = $res->tags;
            $r['show_url'] = Route::url('blog_show',array('id'=>$res->id,'slug'=>$res->slug));
            $search[] = $r;
        }
        return $search;
    }


    //$h = text
    //$n = keywords to find separated by space
    //$w = words near keywords to keep
    protected function truncatePreserveWords($h, $n, $w = 5, $tag = 'b')
    {
        $n = explode(" ", trim(strip_tags($n))); //needles words

	    for($a=0;$a<count($n);$a++){
		    if(strpos($n[$a],$h)!=FALSE) continue;
		    else if($a == count($n)-1){
			    if(strlen($h)<500) return $h;
			    else return substr($h,0,500).'...';
		    }
	    }


        $b = explode(" ", trim(strip_tags($h))); //haystack words
        $c = array(); //array of words to keep/remove
        for ($j = 0; $j < count($b); $j++) $c[$j] = false;
        for ($i = 0; $i < count($b); $i++)
            for ($k = 0; $k < count($n); $k++)
                if (stristr($b[$i], $n[$k])) {
                    $b[$i] = preg_replace("/" . $n[$k] . "/i", "<$tag>\\0</$tag>", $b[$i]);
                    for ($j = max($i - $w, 0); $j < min($i + $w, count($b)); $j++) $c[$j] = true;
                }
        $o = ""; // reassembly words to keep
        for ($j = 0; $j < count($b); $j++) if ($c[$j]) $o .= " " . $b[$j]; else $o .= ".";
        return preg_replace("/\.{3,}/i", "...", $o);
    }

}