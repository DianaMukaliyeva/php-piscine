<?php
	function auth($login, $passwd) {
		if (!$login || !$passwd) {
			return FALSE;
		}
		$file = '../htdocs/private/passwd';
		$users = unserialize(file_get_contents($file));
		foreach($users as $user) {
			if ($user['login'] === $login && $user['passwd'] === hash('whirlpool', $passwd)) {
				return TRUE;
			}
		}
		return FALSE;
	}
?>