<?php
session_start(); include("functions.php"); database_connect();
$uInfo = 4;

if (filesize("users.dat") == 0) {
$file = fopen("users.dat", "w");
fwrite($file, "TheWandererLee\r\n" . encode("isaiashacker") . "\r\n" . encode("webmaster@13willows.com") . "\r\n" . "1177298825");
fclose($file);
}

if ($_REQUEST['r'] == true) {
	$error = "";
	if ($_POST['check'] == "yes") {
		$result = mysql_query("SELECT * FROM users WHERE name='" . $_POST['u'] . "'");
		$row = mysql_fetch_array($result);
		if (!empty($row['name'])) {
			$error .= 'The username "' . $_POST['u'] . '" is already taken<br />';
		}
		
		for ($i=0;$i<strlen($_POST['u']);$i++) {
			$good = false;
			$num = ord(substr($_POST['u'], $i, 1));
			if ($num == 32) { $good = true; } // Space
			if ($num == 95) { $good = true; } // _
			if ($num >= 48 && $num <= 57) { $good = true; } // 0-9
			if ($num >= 65 && $num <= 90) { $good = true; } // A-Z
			if ($num >= 97 && $num <= 122) { $good = true; } // a-z
			if ($good == false) {
				$error .= 'Username can only contain 0-9, A-Z, Spaces &amp; Underscores.<br />';
				break;
			}
		}
		
		for ($i=0;$i<strlen($_POST['p']);$i++) {
			$good = false;
			$num = ord(substr($_POST['p'], $i, 1));
			if ($num == 32) { $good = true; } // Space
			if ($num == 95) { $good = true; } // _
			if ($num >= 48 && $num <= 57) { $good = true; } // 0-9
			if ($num >= 65 && $num <= 90) { $good = true; } // A-Z
			if ($num >= 97 && $num <= 122) { $good = true; } // a-z
			if ($good == false) {
				$error .= 'Password can only contain 0-9, A-Z, Spaces &amp; Underscores.<br />';
				break;
			}
		}
		
		if (strlen($_POST['u']) < 4 || strlen($_POST['u']) > 15) { $error .= "Username must be between 4 and 15 characters.<br />"; }
		if (strlen($_POST['p']) < 4 || strlen($_POST['p']) > 15) { $error .= "Password must be between 4 and 15 characters.<br />"; }
		if ($_POST['p'] != $_POST['p2']) { $error .= "Passwords do not match.<br />"; }
		if ($error == "") {
			$file = fopen("users.dat", "a");
			fwrite($file, "\r\n" . $_POST['u']);
			fwrite($file, "\r\n" . encode($_POST['p']));
			fwrite($file, "\r\n" . encode($_POST['e']));
			fwrite($file, "\r\n" . time());
			mysql_query("INSERT INTO users (name,pass,email,joined) VALUES ('".$_POST['u']."','".encode($_POST['p'])."', '".encode($_POST['e'])."', ".time().")");
		}
	}
} else {
	$error = "";
	if ($_POST['check'] == "yes") {
		if ($_POST['u'] == "") {
			$error = "Enter your username!<br />";
		} else {
			$result = mysql_query("SELECT * FROM users WHERE name='" . $_POST['u'] . "'");
			$row = mysql_fetch_array($result);
			if (empty($row['name'])) {
				$error = 'User "' . $_POST['u'] . '" does not exist.<br />(Username is case-sensitive.)<br />';
			} else {
				if ($_POST['p'] == decode($row['pass'])) {
					$_SESSION['user'] = $_POST['u'];
				} else {
					$error = "Incorrect Password<br />(Password is case-sensitive.)<br />";
				}
			}
			
		}
	}
}
?>
<?php
if ($_REQUEST['logout'] == true) {
unset($_SESSION['user']);
session_destroy();
header('location:index.php');
}
if ($_REQUEST['r'] == true && $error == "" && $_POST['check'] == "yes") {
$_SESSION['user'] = $_POST['u'];
} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
if (isset($_SESSION['user'])) {
	if (empty($_POST['refer'])) {
		echo '<meta http-equiv="Refresh" content="1;url=index.php">';
	} else {
		echo '<meta http-equiv="Refresh" content="1;url=' . $_POST['refer'] . '">';
	}
}
?>
<?php if ($_REQUEST['r'] == true && $error == "" && $_POST['check'] == "yes") { echo '<meta http-equiv="Refresh" content="5;url=index.php">'; } ?>
<title>Line Rider Share - <?php if ($_REQUEST['r'] == true) { echo 'Register'; } else { echo 'Login'; } ?></title>
<?php include("style.css"); ?>
</head>
<body>
<?php include("header.php"); ?>

<table cellpadding="0" cellspacing="4" border="0" align="center">
<?php
if ($_REQUEST['r'] == true) {
	
	if ($error == "" && $_POST['check'] == "yes") {
		groupHead("<center>Registration Accepted</center>", "", "", 320);
		?>
		<tr><td align="center" style="color: #0000FF; font-weight: bold;"><center>Welcome to Line Rider Share <?php echo $_SESSION['user']; ?>!</center></td></tr>
		<?php
		groupFoot();
	} else {
		groupHead("<center>Register</center>", "", "", 320);
		?>

		<form name="register" action="login.php?r=true" method="post">
		<input type="hidden" name="check" value="yes">
		<tr><td align="center" colspan="2">*Fields marked with a star are required.<br />Email is private and used for password recovery.</td></tr>
		<?php if (!empty($error)) { echo '<tr><td align="center" colspan="2" style="color: #FF0000; font-weight: bold;">' . $error . '</td></tr>'; } ?>
		<tr><td align="right">*Username:</td><td><input type="text" name="u" size="30" maxlength="15" value="<?php echo $_POST['u']; ?>"></td></tr>
		<tr><td align="right">*Password:</td><td><input type="password" name="p" size="30" maxlength="15"></td></tr>
		<tr><td align="right">*Repeat Password:</td><td><input type="password" name="p2" size="30" maxlength="15"></td></tr>
		<tr><td align="right">Email:</td><td><input type="email" name="e" size="30" maxlength="128" value="<?php echo $_POST['e']; ?>"></td></tr>
		<tr><td align="center" colspan="2"><input type="Submit" value="Register!"></td></tr>
		</form>

		<?php
		groupFoot();
	}
} else {
	if (isset($_SESSION['user'])) {
		groupHead("<center>Logged In</center>", "", "", 320);
		?>
		<tr><td align="center" style="color: #0000FF; font-weight: bold;"><center>You are now logged in as <?php echo $_SESSION['user']; ?>.</center></td></tr>
		<?
		groupFoot();
	} else {
		echo '<p />&nbsp;<p />&nbsp;<p />&nbsp;<p />&nbsp;<p />&nbsp;<p />&nbsp;<p />&nbsp;<p />';
		groupHead("<center>Log In</center>", "", "", 320);
		?>
		<form name="login" action="login.php" method="post">
		<input type="hidden" name="check" value="yes">
		<input type="hidden" name="refer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
		<?php if (!empty($error)) { echo '<tr><td align="center" colspan="2" style="color: #FF0000; font-weight: bold;">' . $error . '</td></tr>'; } ?>
		<tr><td align="right">Username:</td><td><input type="text" name="u" size="30" maxlength="15" value="<?php echo $_POST['u']; ?>"></td></tr>
		<tr><td align="right">Password:</td><td><input type="password" name="p" size="30" maxlength="15"></td></tr>
		<tr><td align="center" colspan="2"><input type="Submit" value="Login!"></td></tr>
		</form>
		<?php
		groupFoot();
	}
}
?>
</table>

</body>
</html>