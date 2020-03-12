#!/usr/bin/php
<?php
	if ($argc == 2 && file_exists($argv[1]))
	{
		$file = file_get_contents($argv[1]);
		preg_match_all("/(<a.*title=)(\".*\")(.*>.*<\/a>)/i", $file, $mat);
		$i = 0;
		foreach ($mat[0] as $val) {
			$upp = $mat[1][$i].strtoupper($mat[2][$i]).$mat[3][$i];
			$file = str_replace($mat[1][$i].$mat[2][$i].$mat[3][$i], $upp, $file);
			$i++;
		}
		preg_match_all("/(<a[^<]*>)([^<]*<)/", $file, $mat);
		$i = 0;
		print_r($mat);
		foreach ($mat[0] as $val) {
			$upp = $mat[1][$i].strtoupper($mat[2][$i]);
			$file = str_replace($mat[1][$i].$mat[2][$i], $upp, $file);
			$i++;
		}
		echo $file;
	}
	else if ($argc != 2)
		echo "Wrong number of arguments\n";
	else if (!file_exists($argv[1]))
		echo "File doesnt exist!\n";
?>