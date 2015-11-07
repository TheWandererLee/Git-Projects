<?php include("scripts/header.php");
global $domain;
$error = ""; $success = false;
if (isset($_SESSION['user'])) {
	if ($_POST['create'] == 'yes') { //Create Guild
		if (strlen($_POST['name']) > 24 || empty($_POST['name'])) { $error .= "Guild name must be 24 characters or less<br />"; }
		if (!isFriendlyString($_POST['name'])) { $error .= "Guild name can not contain these characters: \\ / : * ? \" &lt; &gt; |<br />"; }
		$result = mysql_query("SELECT * FROM guilds WHERE name='" . strtolower($_POST['name']) . "'");
		$row = mysql_fetch_array($result);
		if (!empty($row['name'])) { $error .= "Guild name is already taken<br />"; }
		elseif (file_exists(strtolower($_POST['name']))) { $error .= "Guild directory is unavailable, e.g., reserved<br />"; }
		if (strlen($_POST['server']) > 100 || empty($_POST['server'])) { $error .= "Server name must be 100 characters or less<br />"; }
		
		if (empty($error)) {
			mysql_query("INSERT INTO guilds (name,title,server,locale,master,members,created) VALUES ('".strtolower($_POST['name'])."', '".$_POST['name']."', '".ucfirst(strtolower($_POST['server']))."', '".strtolower($_POST['locale'])."', '".$_SESSION['user']."', '".$_SESSION['user']."', '".time()."')");
			mkdir(strtolower($_POST['name']), 0755);
			$file = fopen(strtolower($_POST['name']) . "/index.php", "a");
			fwrite($file, "<?php");
			fwrite($file, "\nheader(\"location: " . $domain . "/guild.php?g=" . strtolower($_POST['name']) . "\");");
			fwrite($file, "\nexit(); ?>");
			fclose($file);
			$success = true;
		}
	}
} else { $error .= "You must be logged in to create a guild.<br />"; }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
	if ($success) {
		echo '<meta http-equiv="Refresh" content="2;url=' . $domain . '/guild.php?g=' . strtolower($_POST['name']) . '">';
	}
?>
<title>GuildCube.com | Create a Guild Site</title>
<link rel="stylesheet" href="scripts/style.css" type="text/css"> <!-- Global stylesheet -->
<link rel="stylesheet" href="style.css" type="text/css"> <!-- Main page stylesheet -->
</head>
<body>
<?php include("scripts/navigation.php"); ?>

<?php
echo '<br /><br /><br /><br />';
echo '<table align="center" cellpadding="0" cellspacing="0" border="0"><tr><td align="center">';

if (isset($_SESSION['user'])) {
if ($success && empty($error)) {
	groupHead("Create a Guild Site", 500);
	echo '<div align="center" style="font-weight: bold; color: #8888FF;">Successfully created your guild<br /><br /><a href="' . $domain . '/' . strtolower($_POST['name']) . '">View My Guild</a></div>';
	groupFoot();
} else {
	groupHead("Create a Guild Site", 500);
	if (!empty($error)) {
		echo '<div align="center" style="font-weight: bold; color: #FF0000;"><br />' . $error . '</div><br />';
	}
	echo '<form name="guild" action="createGuild.php" method="post">';
	echo '<input type="hidden" name="create" value="yes">';
	echo '<table cellpadding="0" cellspacing="0" border="0" width="100%">';
	echo '<tr class="newGuild"><td align="right" width="50%">Guild Name:&nbsp;&nbsp;</td><td align="left"><input type="text" name="name" size="36" maxlength="18"></td></tr>';
	echo '<tr class="newGuild"><td align="right" width="50%">Server:&nbsp;&nbsp;</td><td align="left"><input type="text" name="server" size="36" maxlength="100"></td></tr>';
	echo '<tr class="newGuild"><td align="right" width="50%">Locale:&nbsp;&nbsp;</td><td align="left"><select name="locale"><option value="us">US</option><option value="eu">EU</option></select></td></tr>';
	echo '<tr class="newGuild"><td align="center" colspan="2"><input type="submit" value="Create Guild"></td></tr>';
	echo '</table>';
	echo '</form>';
	groupFoot();
}
} else {
	groupHead("Create a Guild Site", 500);
	echo '<center><b>You must be logged in to create a guild page.</b><br /><br />Please login or register a new account using the links in the top-right corner of the screen</center>';
	groupFoot();
}
echo '</td></tr></table>';
?>

</body>
</html>