<?php
	$vars = $_GET;
	switch ($vars["action"]) {
		case "set":
			if ($vars["name"] && $vars["value"])
				setcookie($vars["name"], $vars["value"], time() + (60 * 60 * 24 * 30), '/');
			break;
		case "get":
			if ($vars["name"]) {
				$name = $vars["name"];
				if($_COOKIE[$name])
					echo "$_COOKIE[$name]\n";
			}
			break;
		case "del":
			if ($vars["name"])
				setcookie($vars["name"], "", time() - 3600);
			break;
	}
?>
