<?php
	session_start();
	if (!($_SESSION['loggued_on_user']))
		echo "ERROR\n";
	else {
		$file = '../htdocs/private/chat';
		if (file_exists($file)) {
			$messages = unserialize(file_get_contents($file));
			foreach ($messages as $msg) {
				echo "[" . date('H:i', $msg['time']) . "] <b>" . $msg['login'] . "</b>: " . $msg['msg'] . "<br />\n";
			}
		}
	}
?>