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
	if (!is_numeric($x) || !is_numeric($y) || !strstr("+-/*%", $sign))
	{
		echo $x."|".$y."|".$sign."\n";
		echo "Incorrect Parameters\n";
	}
	else if ($sign == '+')
		echo $x + $y."\n";
	else if ($sign == '-')
		echo $x - $y."\n";
	else if ($sign == '*')
		echo $x * $y."\n";
	else if (($sign == '/' || $sign == '%') && $y == 0)
		echo "Incorrect Parameters\n";
	else if ($sign == '/')
		echo $x / $y."\n";
	else if ($sign == '%')
		echo $x % $y."\n";
?>