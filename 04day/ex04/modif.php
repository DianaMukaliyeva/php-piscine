<?php
	session_start();
	$file = '../htdocs/private/passwd';
	if ($_POST['submit'] && $_POST['submit'] == 'OK' && $_POST['oldpw'] && $_POST['newpw'] && $_POST['login'] && file_exists($file)) {
		$users = unserialize(file_get_contents($file));
		$flag = false;
		foreach($users as $key => $user) {
			if ($user['login'] === $_POST['login'] && $user['passwd'] === hash('whirlpool', $_POST['oldpw'])) {
				$users[$key]['passwd'] = hash('whirlpool', $_POST['newpw']);
				file_put_contents($file, serialize($users));
				echo "OK\n";
				$flag = true;
				header('Location: index.html');
				break;
			}
		}
		if (!$flag)
			echo "ERROR\n";
	} else {
		echo "ERROR\n";
	}
?>
