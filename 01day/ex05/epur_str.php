#!/usr/bin/php
<?php
	if ($argc !=  2)
		exit();
	$str = trim($argv[1]);
	$arr = array_filter(explode(" ", $argv[1]));
	$str = implode(" ", $arr);
	if (!empty($str))
		echo "$str\n";
?>