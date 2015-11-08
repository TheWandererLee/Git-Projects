<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Wingit Admin Tools</title>
<?php
if ($_POST['name'] == 'jwing' && $_POST['pass'] == 'frogbutt') {
	$_SESSION['loggedin'] = true;
}
if ($_POST['logout'] == 'yes') {
	$_SESSION['loggedin'] = false;
	session_unset();
}
?>
</head>
<body>
<?php
if ($_SESSION['loggedin'] == true) {
	echo 'You are currently logged in. <a href="#" onclick="document.actions.submit();">Click here to logout</a>';
	echo '<form name="actions" action="admin.php" method="post">';
	echo '<input type="hidden" name="logout" value="yes">';
	echo '</form>';
} else {
	echo '<form name="login" action="admin.php" method="post">';
	echo 'Name: <input type="text" name="name">';
	echo '<br />Pass: <input type="password" name="pass">';
	echo '<br /><input type="submit" value="submit">';
	echo '</form>';
}
?>
</body>
</html>