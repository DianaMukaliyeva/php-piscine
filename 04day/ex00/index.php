<?php
	session_start();
	if ($_GET['submit'] && $_GET['submit'] == "OK") {
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
	}
?>
<html><body>
<form action = "index.php" method="GET">
	Username: <input type="text" name="login" value="<?php echo $_SESSION['login']; ?>"  />
	<br />
	Password: <input type="password" name="passwd" value="<?php echo $_SESSION['passwd']; ?>" />
	<input name="submit" type="submit" value="OK"/>
</form>
</body></html>
