<?php
	function error_message() {
		echo "ERROR\n";
		exit();
	}

	session_start();
	if (isset($_POST['submit']) && $_POST['submit'] == 'OK' && $_POST['oldpw'] && $_POST['newpw'] && $_POST['login']) {
		$file = '../../private/passwd';
		if (!file_exists($file)) {
			error_message();
		}
		$users = unserialize(file_get_contents($file));
		$user_found = false;
		foreach($users as $user) {
			if ($user['login'] === $_POST['login']) {
				if ($user['passwd'] === hash('whirlpool', $_POST['oldpw'])) {
					$user_found = true;
					$user['passwd'] = hash('whirlpool', $_POST['newpw']);
				} else {
					error_message();
				}
			}
		}
		if (!$user_found) {
			error_message();
		}
		file_put_contents($file, serialize($users));
		echo "OK\n";
	} else {
		error_message();
	}
?>
