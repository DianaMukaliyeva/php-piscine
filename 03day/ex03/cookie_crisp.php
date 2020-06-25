<?php
	$vars = $_GET;
	switch ($vars["action"]) {
		case "set":
			setcookie($vars["name"], $vars["value"], time() + (60 * 60 * 24 * 30), '/');
			break;
		case "get":
			if (!empty($vars["name"]))
			{
				$name = $vars["name"];
				if(isset($_COOKIE[$name]))
					echo "$_COOKIE[$name]\n";
			}
			break;
		case "del":
			if (!empty($vars["name"]) && !isset($vars["value"])) {
				setcookie($vars["name"], "", time() - 3600);
			}
			break;
	}
?>