<?php
	function error_message() {
		echo "ERROR\n";
		exit();
	}

	session_start();
	if (isset($_POST['submit']) && $_POST['submit'] == 'OK' && $_POST['passwd'] && $_POST['login']) {
		$new_user = array('login' => $_POST['login'], 'passwd' => hash('whirlpool', $_POST['passwd']));
		$path = '../../private';
		$file = $path . '/passwd';
		if (!file_exists($path)) {
			mkdir($path);
		}
		$users = unserialize(file_get_contents($file));
		foreach($users as $user) {
			if ($user['login'] === $new_user['login']) {
				error_message();
			}
		}
		$users[] = $new_user;
		file_put_contents($file, serialize($users));
		echo "OK\n";
	} else {
		error_message();
	}
?>
