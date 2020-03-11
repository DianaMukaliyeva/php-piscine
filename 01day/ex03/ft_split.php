<?php
	function ft_split($str)
	{
		if (empty($str))
			return (NULL);
		$arr = preg_split("/ +/", $str);
		sort($arr);
		return $arr;
	}
?>