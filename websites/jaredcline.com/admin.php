<?php session_start();
if ($_REQUEST['u'] == "admin" && $_REQUEST['p'] == "admin") {
	$_SESSION['user'] = "jrizzle";
}
if (isset($_REQUEST['out'])) {
	unset($_SESSION['user']);
	$referer = $_SERVER['HTTP_REFERER'];
	if (!$referer == '') {
		header('Location: ' . $referer);
	} else {
		header('Location: index.php');
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Jared Cline Photography - Admin</title>
<?php include("style.php"); include("functions.php"); ?>
</head>
<body>
<?php
include("navigation.php");

if (empty($_SESSION['user'])) {
	echo '<form action="admin.php" method="post">';
	echo '<input type="hidden" name="check" value="yes">';
	echo '<table cellspacing="8" cellpadding="0" border="0" align="center">';
	echo '<tr><td colspan="2" align="center">Administration<br><b style="color:#F00">Use admin for login and admin for password</b></td></tr>';
	echo '<tr><td align="right">Login:</td><td><input type="text" name="u" value="' . $_REQUEST['u'] . '"></td></tr>';
	echo '<tr><td align="right">Password:</td><td><input type="password" name="p" style="color: #FF0000"></td></tr>';
	echo '<tr><td colspan="2" align="center"><input type="submit" value="Login"></td></tr>';
	echo '</table>';
	if (!empty($_REQUEST['check'])) {
		echo '<p /><center><font color="#FF0000" style="font-weight: bold; font-size: 36px;">Incorrect Password</font></center>';
	}
}

if($_SESSION['user'] == "jrizzle") {

	if (!empty($_REQUEST['weddingthumbs'])) { setInfo("weddingthumbs", $_REQUEST['weddingthumbs']); }
	if (!empty($_REQUEST['creativethumbs'])) { setInfo("creativethumbs", $_REQUEST['creativethumbs']); }
	if (!empty($_REQUEST['beachthumbs'])) { setInfo("beachthumbs", $_REQUEST['beachthumbs']); }
	if (!empty($_REQUEST['watermark'])) { setInfo("watermark", $_REQUEST['watermark']); }
	if (!empty($_REQUEST['contacttext'])) { setInfo("contact", $_REQUEST['contacttext']); }
	
	echo '<form action="admin.php" method="post" name="admin">';
	echo '<br /><table cellspacing="0" cellpadding="0" border="0" align="center">';
	echo '<tr><td>';
		echo '<table cellspacing="8" cellpadding="0" border="0" align="center">';
		echo '<tr><td colspan="2" align="center" style="font-size: 36px; font-family: Arial;">Admin</td></tr>';
		echo '<tr><td align="right">Thumbnails per page (Wedding Gallery)</td><td><input type="text" name="weddingthumbs" value="' . getInfo("weddingthumbs") . '"></td></tr>';
		echo '<tr><td align="right">Thumbnails per page (Creative Gallery)</td><td><input type="text" name="creativethumbs" value="' . getInfo("creativethumbs") . '"></td></tr>';
		echo '<tr><td align="right">Thumbnails per page (Beach Gallery)</td><td><input type="text" name="beachthumbs" value="' . getInfo("beachthumbs") . '"></td></tr>';
		echo '<tr><td align="right">Watermark Text</td><td><input type="text" name="watermark" value="' . getInfo("watermark") . '"></td></tr>';
		echo '<tr><td colspan="2" align="center">Contact Info</td></tr>';
		echo '<tr><td colspan="2" align="center"><textarea cols="40" rows="8" name="contacttext">' . getInfo("contact") . '</textarea></td></tr>';
		echo '<tr><td colspan="2" align="center"><input type="submit" value="Save Changes!"></td></tr>';
		echo '<tr><td colspan="2" align="center" style="color: #FF0000">If you want to add or delete pictures, click one of the navigation links on top.</td></tr>';
		echo '</table>';
	echo '</td></tr>';
	echo '</table>';
	echo '</form>';
}
?>

</body>
</html>