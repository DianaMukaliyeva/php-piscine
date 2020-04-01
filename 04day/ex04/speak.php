<?php
	session_start();
	date_default_timezone_set('Europe/Paris');
	if (!($_SESSION['loggued_on_user'])) {
		echo "ERROR\n";
		exit();
	}
	if (isset($_POST['msg'])) {
		$file = '../../private/chat';
		if (!file_exists($file)) {
			file_put_contents($file, null);
		}
		$chat = unserialize(file_get_contents($file));
		$fp = fopen($file, "w+");
		flock($fp, LOCK_EX);
		$tmp['login'] = $_SESSION['loggued_on_user'];
		$tmp['time'] = time();
		$tmp['msg'] = $_POST['msg'];
		$chat[] = $tmp;
		fclose($fp);
		file_put_contents($file, serialize($chat));
		header('Content-type: text/html');
	}
?>
<html>
<head>
	<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
</head>
<body>
	<form action="speak.php" method="POST">
		<input type="text" name="msg" value=""/>
		<input type="submit" name="submit" value="Send"/>
	</form>
</body>
</html>