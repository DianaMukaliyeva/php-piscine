<?php
	if ($_POST['submit'] && $_POST['submit'] == 'OK' && $_POST['passwd'] && $_POST['login']) {
		$new_user = array('login' => $_POST['login'], 'passwd' => hash('whirlpool', $_POST['passwd']));
		$path = '../htdocs/private';
		$file = $path . '/passwd';
		if (!file_exists('../htdocs'))
			mkdir('../htdocs');
		if (!file_exists($path))
			mkdir($path);
		$users = [];
		$user_exists = false;
		if (file_exists($file))
			$users = unserialize(file_get_contents($file));
		foreach($users as $user) {
			if ($user['login'] === $new_user['login']) {
				echo "ERROR\n";
				$user_exists = true;
				break;
			}
		}
		if (!$user_exists) {
			$users[] = $new_user;
			file_put_contents($file, serialize($users));
			echo "OK\n";
		}
	} else {
		echo "ERROR\n";
	}
?>
