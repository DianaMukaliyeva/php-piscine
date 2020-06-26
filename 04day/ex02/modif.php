<?php
	if ($_POST['submit'] && $_POST['submit'] == 'OK' && $_POST['oldpw'] && $_POST['newpw'] && $_POST['login']) {
		$file = '../htdocs/private/passwd';
		$users = unserialize(file_get_contents($file));
		$pass = false;
		foreach($users as $key => $user) {
			if ($user['login'] === $_POST['login'] && $user['passwd'] === hash('whirlpool', $_POST['oldpw'])) {
				$users[$key]['passwd'] = hash('whirlpool', $_POST['newpw']);
				file_put_contents($file, serialize($users));
				echo "OK\n";
				$pass = true;
				break;
			}
		}
		if (!$pass)
			echo "ERROR\n";
	} else {
		echo "ERROR\n";
	}
?>
