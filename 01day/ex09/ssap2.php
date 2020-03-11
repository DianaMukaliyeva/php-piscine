#!/usr/bin/php
<?php
	function my_sort($a, $b)
	{
		$index = -1;
		$flag = 0;
		for ($i = 0; ($i < strlen($a) && $i < strlen($b)); $i++)
		{
			$char_a = $a[$i];
			$char_b = $b[$i];
			if ($char_a == $char_b)
				continue;
			if (ctype_alpha($char_a))
			{
				if (ctype_alpha($char_b))
				{
					if (strcmp(strtolower($char_a), strtolower($char_b)) == 0)
					{
						if ($flag == 0 && strcmp($char_a, $char_b) != 0)
						{
							$index = $i;
							$flag = 1;
						}
						continue ;
					}
					return (strcmp(strtolower($char_a), strtolower($char_b)));
				}
				return (-1);
			}
			else if (ctype_digit($char_a))
			{
				if (ctype_alpha($char_b))
					return (1);
				else if (ctype_digit($char_b))
					return (strcmp($char_a, $char_b));
				return (-1);
			}
			else
			{
				if (!ctype_alpha($char_b) && !is_numeric($char_b))
					return (strcmp($char_a, $char_b));
				return (1);
			}
		}
		if ($flag == 1 && $i == (strlen($a)) && ($i == (strlen($b))))
			return (strcmp($a[$index], $b[$index]));
		return (strlen($a) - strlen($b));
	}
	$result = [];
	for ($i = 1; $i < $argc; $i++)
	{
		$arr = array_filter(explode(" ", $argv[$i]));
		$result = array_merge($result, $arr);
	}
	usort($result, "my_sort");
	foreach ($result as $elem)
		echo "$elem\n";
?>