#!/usr/bin/php
<?php
	$result = [];
	for ($i = 1; $i < $argc; $i++)
	{
		$arr = array_filter(explode(" ", $argv[$i]));
		$result = array_merge($result, $arr);
	}
	sort($result);
	foreach ($result as $elem)
		echo "$elem\n";
?>