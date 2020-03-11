#!/usr/bin/php
<?php
	if ($argc == 1)
		exit();
	$arr = array_filter(explode(" ", $argv[1]));
	$first = array_shift($arr);
	array_push($arr, $first);
	$str = implode(" ", $arr);
	if (!empty($str))
		echo "$str\n";
?>