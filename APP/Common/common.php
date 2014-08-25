<?php
function p($array){
	dump($array,1,'<pre>',0);
}

function replace_phiz($content){
	preg_match_all('/\[.*?\]/is', $content,$arr);
	if ($arr[0]){
		$phiz = F('phiz','','./Data/');
		foreach ($arr[0] as $v){
			foreach ($phiz as $key => $value){
				if ($v == '['.$value.']') {
					$content = str_replace($v, '<img src="/php_demo/shizhan/10/10wish/Public/Images/phiz/'.$key.'">', $content);
				}
			}
		}
	}
    return $content;
}
?>