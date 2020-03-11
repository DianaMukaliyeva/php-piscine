#!/usr/bin/php
<?php
	function error()
	{
		echo "Wrong Format\n";
		exit();
	}
	if ($argc == 1)
		exit();
	if($argc == 2)
	{
		$array = explode(" ", $argv[1]);
		if (count($array) != 5)
			error();
		$day_small = array("1" => "lundi", "2" => "mardi", "3" => "mercredi", "4" => "jeudi", "5" => "vendredi", "6" => "samedi", "0" => "dimanche");
		$day_big = array("1" => "Lundi", "2" => "Mardi", "3" => "Mercredi", "4" => "Jeudi", "5" => "Vendredi", "6" => "Samedi", "0" => "Dimanche");
		$month_small = array("1" => "janvier","2" => "février","3" => "mars", "4" => "avril", "5" => "mai", "6" => "juin" , "7" => "juillet", "8" => "août", "9" => "septembre", "10" => "octobre", "11" => "novembre", "12" => "décembre");
		$month_big = array("1" => "Janvier","2" => "Février","3" => "Mars", "4" => "Avril", "5" => "Mai", "6" => "Juin" , "7" => "Juillet", "8" => "Août", "9" => "Septembre", "10" => "Octobre", "11" => "Novembre", "12" => "Décembre");
		$day = array_search($array[0], $day_small);
		if (!$day)
			$day = array_search($array[0], $day_big);
		$month = array_search($array[2], $month_small);
		if (!$month)
			$month = array_search($array[2], $month_big);
		$real_day = date('w', strtotime($array[3]."-".$month."-".$array[1]." ".$array[4]));
		if ($real_day != $day || !checkdate($month, $array[1], $array[3]))
			error();
		date_default_timezone_set("Europe/Paris");
		echo strtotime($array[3]."-".$month."-".$array[1]." ".$array[4])."\n";
	} else {
		error();
	}
?>