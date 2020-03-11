#!/usr/bin/php
<?php
	function do_op($x, $y, $sign)
	{		
		if ($sign == '+')
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
	}
	if ($argc == 2)
	{
		if (preg_match_all("/^( *-?\d+ *)(\*|\+|-|\/|%)( *-?\d+ *)$/", $argv[1], $mat))
		{
			$x = trim($mat[1][0]);
			$sign = trim($mat[2][0]);
			$y = trim($mat[3][0]);
			do_op($x, $y, $sign);
		}
		else
			echo "Syntax Error\n";
	}
	else 
		echo "Incorrect Parameters\n";
?>