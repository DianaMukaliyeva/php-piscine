<?php
	function error_message() {
		echo "ERROR\n";
		exit();
	}

	session_start();
	if (isset($_POST['submit']) && $_POST['submit'] == 'OK' && $_POST['passwd'] && $_POST['login']) {
		$new_user = array('login' => $_POST['login'], 'passwd' => hash('whirlpool', $_POST['passwd']));
		$path = '../htdocs/private';
		$file = $path . '/passwd';
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
		}
		if (file_exists($file))
		{
			$users = unserialize(file_get_contents($file));
			foreach($users as $user) {
				if ($user['login'] === $new_user['login']) {
					error_message();
				}
			}
		}
		$array[] = $new_user;
		file_put_contents($file, serialize($array));
		echo "OK\n";
	} else {
		error_message();
	}
?>
