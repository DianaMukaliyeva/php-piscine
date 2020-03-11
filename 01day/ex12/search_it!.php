#!/usr/bin/php
<?php
	if ($argc < 3)
		exit();
	$key = $argv[1];
	$array = $argv;
	array_shift($array);
	array_shift($array);
	$array = array_reverse($array);
	foreach ($array as $elem)
	{
		$temp = explode(":", $elem);
		if ($temp[0] == $key)
		{
			echo $temp[1]."\n";
			exit();
		}
	}
?>