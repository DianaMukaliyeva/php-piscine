#!/usr/bin/php
<?php
	function get_key($needle, $array)
	{
		foreach ($array as $elem){
			if (in_array($needle, $elem)){
				$key = array_search($elem, $array);
				break;
			}
		}
		return $key;
	}

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
		$days = array("1" => ["lundi","Lundi"], "2" => ["mardi","Mardi"], "3" => ["mercredi","Mercredi"], "4" => ["jeudi","Jeudi"], "5" => ["vendredi","Vendredi"], "6" => ["samedi","Samedi"], "0" => ["dimanche","Dimanche"]);
		$months = array("1" => ["janvier","Janvier"],"2" => ["février","Février","Fevrier","fevrier"],"3" => ["mars","Mars"], "4" => ["avril","Avril"],
		"5" => ["mai","Mai"], "6" => ["juin","Juin"] , "7" => ["juillet","Juillet"], "8" => ["août","Août","Aout","aout"], "9" => ["septembre","Septembre"],
		"10" => ["octobre","Octobre"], "11" => ["novembre","Novembre"], "12" => ["décembre","Décembre","Decembre","decembre"]);
		$day = get_key($array[0], $days);
		$month = get_key($array[2], $months);
		$real_day = date('w', strtotime($array[3]."-".$month."-".$array[1]." ".$array[4]));
		if ($real_day != $day || !checkdate($month, $array[1], $array[3]))
			error();
		date_default_timezone_set("Europe/Paris");
		echo strtotime($array[3]."-".$month."-".$array[1]." ".$array[4])."\n";
	} else {
		error();
	}
?>