<?php
	function error_message() {
		echo "ERROR\n";
		exit();
	}

	session_start();
	if (isset($_POST['submit']) && $_POST['submit'] == 'OK' && $_POST['oldpw'] && $_POST['newpw'] && $_POST['login']) {
		$file = '../htdocs/private/passwd';
		if (!file_exists($file)) {
			error_message();
		}
		$users = unserialize(file_get_contents($file));
		foreach($users as $key => $user) {
			if ($user['login'] === $_POST['login'] && $user['passwd'] === hash('whirlpool', $_POST['oldpw'])) {
				$users[$key]['passwd'] = hash('whirlpool', $_POST['newpw']);
				file_put_contents($file, serialize($users));
				echo "OK\n";
				header('Location: index.html');
				exit();
			}
		}
	}
	error_message();
?>
