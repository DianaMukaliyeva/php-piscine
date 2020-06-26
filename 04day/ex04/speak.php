<?php
	session_start();
	date_default_timezone_set('Europe/Helsinki');
	if ($_SESSION['loggued_on_user']) {
		if ($_POST['msg']) {
			$file = '../htdocs/private/chat';
			if (!file_exists($file))
				file_put_contents($file, null);
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
		echo "<html>\n<head>\n";
		echo "\t<script langage=\"javascript\">top.frames['chat'].location = 'chat.php';</script>\n";
		echo "</head>\n";
		echo "<body>\n";
		echo "<form action=\"speak.php\" method=\"POST\">\n";
		echo "\t<input type=\"text\" name=\"msg\" value=\"\"/>\n";
		echo "\t<input type=\"submit\" name=\"submit\" value=\"Send\"/>\n";
		echo "</form>\n";
		echo "</body>\n</html>\n";
	} else {
		echo "ERROR\n";
	}
?>
