<?php include("scripts/header.php");

$error = "";
if ($_POST['register'] == 'yes') { //Register
	$result = mysql_query("SELECT * FROM users WHERE name='" . $_POST['user'] . "'");
	$row = mysql_fetch_array($result);
	
	if (strlen($_POST['user']) > 18 || empty($_POST['user'])) { $error .= "Username must be 18 characters or less<br />"; }
	if (!ctype_alnum(str_replace(" ","",str_replace("_","",$_POST['user'])))) { $error .= "Username can only contain A-Z, 0-9, underscores, and spaces."; }
	if (!empty($row['name'])) { $error .= "Username is already taken<br />"; }
	if (strlen($_POST['pass']) > 16 || empty($_POST['pass'])) { $error .= "Password must be 16 characters or less.<br />"; }
	if ($_POST['pass'] != $_POST['passRepeat']) { $error .= "Passwords do not match<br />"; }
	if (strlen($_POST['email']) > 134) { $error .= "Email address must be 134 characters or less.<br />"; }
	
	$chars = $_POST['charLocale1'] . "," . $_POST['charRealm1'] . "," . $_POST['charName1'] . "|";
	
	if (empty($error)) {
		mysql_query("INSERT INTO users (name,pass,email,joined,chars,verified) VALUES ('".$_POST['user']."', '".$_POST['pass']."', '".$_POST['email']."', ".time().", '".$chars."', '0')");
		$_SESSION['user'] = $_POST['user'];
	}
} elseif ($_POST['login'] == 'yes') { //Login
	$result = mysql_query("SELECT * FROM users WHERE name='" . $_POST['user'] . "'");
	$row = mysql_fetch_array($result);
	if (empty($row['name'])) {
		$error .= "Username does not exist<br />";
	} else {
		if ($row['pass'] == $_POST['pass']) {
			$_SESSION['user'] = $_POST['user'];
		} else {
			$error .= "Password is incorrect<br />";
		}
	}
}

if (isset($_REQUEST['logout'])) {
	unset($_SESSION['user']);
	session_destroy();
	if (isset($_SERVER['HTTP_REFERER'])) {
		header('location:'.$_SERVER['HTTP_REFERER']);
	} else {
		header('location:index.php');
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
	if (isset($_SESSION['user'])) {
		if (isset($_POST['refer'])) {
			echo '<meta http-equiv="Refresh" content="2;url=' . $_POST['refer'] . '">';
		} else {
			echo '<meta http-equiv="Refresh" content="2;url=index.php">';
		}
	}
?>
<title>GuildCube.com | <?php if (isset($_REQUEST['register'])) { echo 'Register'; } else { echo 'Login'; }?></title>
<link rel="stylesheet" href="scripts/style.css" type="text/css"> <!-- Global stylesheet -->
<link rel="stylesheet" href="style.css" type="text/css"> <!-- Main page stylesheet -->
</head>
<body>
<?php include("scripts/navigation.php"); ?>

<?php
echo '<br /><br /><br /><br />';
echo '<table align="center" cellpadding="0" cellspacing="0" border="0"><tr><td align="center">';
if (isset($_REQUEST['register'])) {
	if (isset($_SESSION['user']) && empty($error)) {
		groupHead("<center>Register</center>", 500);
		echo '<div align="center" style="font-weight: bold; color: #8888FF;">Registration was successful<br /><br /><a href="index.php">Back to Home Page</a></div>';
		groupFoot();
	} else {
		groupHead("Register", 500);
		if (!empty($error)) {
			echo '<div align="center" style="font-weight: bold; color: #FF0000;"><br />' . $error . '</div><br />';
		}
		echo '<form name="register" action="login.php?register" method="post">';
		echo '<input type="hidden" name="register" value="yes">';
		echo '<table cellpadding="0" cellspacing="0" border="0" width="100%">';
		echo '<tr class="login"><td align="right" width="50%">Username:&nbsp;&nbsp;</td><td align="left"><input type="text" name="user" value="' . $_POST['user'] . '" size="24" maxlength="18"></td></tr>';
		echo '<tr class="login"><td align="right" width="50%">Password:&nbsp;&nbsp;</td><td align="left"><input type="password" name="pass" size="24" maxlength="16"></td></tr>';
		echo '<tr class="login"><td align="right" width="50%">Repeat Password:&nbsp;&nbsp;</td><td align="left"><input type="password" name="passRepeat" size="24" maxlength="16"></td></tr>';
		echo '<tr class="login"><td align="right" width="50%">Email:&nbsp;&nbsp;</td><td align="left"><input type="text" name="email" value="' . $_POST['email'] . '" size="24" maxlength="134"></td></tr>';
		echo '<tr class="login"><td align="center" colspan="2"><span style="font-size: 10px;">(Email is not required, but recommended for password recovery)</span></td></tr>';
		echo '<tr class="login"><td colspan="2"><hr size="1" width="100%" /></td></tr>';
		echo '<tr class="login"><td align="center" colspan="2"><b>Characters</b></td></tr>';
		echo '<tr class="login"><td align="center" colspan="2">';
			echo '<table cellpadding="0" cellspacing="0" border="0" align="center"><tr><td></td><td><u>Realm</u></td><td><u>Name</u></td></tr>';
			
			echo '<tr><td><select name="charLocale1"><option value="us">US</option><option value="eu">EU</option></select></td>';
			echo '<td align="left"><input type="text" name="charRealm1" value=""></td>';
			echo '<td align="left"><input type="text" name="charName1" value=""></td></tr>';
			
			echo '</table>';
		echo '</td></tr>';
		echo '<tr class="login"><td align="center" colspan="2"><input type="submit" value="Register"></td></tr>';
		echo '</table>';
		echo '</form>';
		groupFoot();
	}
}
else
{
	if (isset($_SESSION['user']) && empty($error)) {
		groupHead("Login", 400);
		echo '<table cellpadding="0" cellspacing="0" border="0" width="100%">';
		echo '<div align="center">You are now logged in as ' . $_SESSION['user'] . '.<br /><br /><a href="index.php">Back to Home Page</a></div>';
		echo '</table>';
		groupFoot();
	} else {
		groupHead("Login", 400);
		if (!empty($error)) {
			echo '<div align="center" style="font-weight: bold; color: #FF0000;"><br />' . $error . '</div><br />';
		}
		echo '<form name="register" action="login.php" method="post">';
		echo '<input type="hidden" name="login" value="yes">';
		echo '<input type="hidden" name="refer" value="' . $_SERVER['HTTP_REFERER'] . '">';
		echo '<table cellpadding="0" cellspacing="0" border="0" width="100%">';
		echo '<tr class="login"><td align="right" width="50%">Username:&nbsp;&nbsp;</td><td align="left"><input type="text" name="user" size="24" maxlength="15" value="' . $_POST['user'] . '"></td></tr>';
		echo '<tr class="login"><td align="right" width="50%">Password:&nbsp;&nbsp;</td><td align="left"><input type="password" name="pass" size="24" maxlength="15"></td></tr>';
		echo '<tr class="login"><td align="center" colspan="2"><input type="submit" value="Login"></td></tr>';
		echo '</table>';
		echo '</form>';
		groupFoot();
	}
}
echo '</td></tr></table>';
?>

</body>
</html>