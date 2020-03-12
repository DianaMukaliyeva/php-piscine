#!/usr/bin/php
<?php
	if($argc == 2 && file_exists($argv[1]))
	{
		$file_arr = file($argv[1]);
		foreach($file_arr as $str)
		{
			if (preg_match('/(<a.*>.*<\/a>)/', $str, $matches) != 0)
			{
				preg_match_all('([\'"].*?[\'"]|[\>].*?[\<])', $str, $matches);
				foreach ($matches[0] as $needle)
					$str = str_replace($needle, strtoupper($needle), $str);
			}
			echo "$str";
		}
	}
?>