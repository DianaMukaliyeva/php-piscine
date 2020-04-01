<?php
	include ('auth.php');
	session_start();
	$login = $_GET['login'];
	if (auth($login, $_GET['passwd'])) {
		$_SESSION['loggued_on_user'] = $login;
		echo "OK\n";
	} else {
		$_SESSION['loggued_on_user'] = "";
		echo "ERROR\n";
	}
?>