#!/usr/bin/php
<?php
	function upp_links($matches) {
		$res = $matches[0];
		$res = preg_replace_callback("/title=\"(.*?)\"/is", function ($text) { return "title=\"".strtoupper($text[1])."\""; }, $res);
		$res = preg_replace_callback("/>.+?</s", function ($text) { return strtoupper($text[0]); }, $res);
		return $res;
	}
	if($argc == 2 && file_exists($argv[1])) {
		$page = file_get_contents($argv[1]);
		$page = preg_replace_callback("/<a.*?<\/a>/is", "upp_links", $page);
		echo $page;
	}
?>