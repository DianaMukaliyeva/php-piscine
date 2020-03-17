#!/usr/bin/php
<?php
	if ($argc != 4)
	{
		echo "Incorrect Parameters\n";
		exit();
	}
	$x = trim($argv[1]);
	$y = trim($argv[3]);
	$sign = trim($argv[2]);
	if ($sign == '+')
		echo $x + $y."\n";
	else if ($sign == '-')
		echo $x - $y."\n";
	else if ($sign == '*')
		echo $x * $y."\n";
	else if ($sign == '/')
		echo $x / $y."\n";
	else if ($sign == '%')
		echo $x % $y."\n";
?>