<?php include("scripts/header.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>GuildCube.com :: <?php echo $_REQUEST['n']; ?></title>
<link rel="stylesheet" href="scripts/style.css" type="text/css"> <!-- Global stylesheet -->
<link rel="stylesheet" href="style.css" type="text/css"> <!-- Main page stylesheet -->
</head>
<body>
<?php include("scripts/navigation.php"); ?>
<br /><br /><br /><br />
<?php
$result = mysql_query("SELECT * FROM users WHERE name='" . $_REQUEST['n'] . "'");
$row = mysql_fetch_array($result);
if (!empty($row['name'])) {
	groupHead('Characters', 500);
		echo '<table cellpadding="8" cellspacing="0" border="0" align="center">';
			$chars = explode("|",$row['chars']);
			$char = explode(",",$chars[0]);
		if (!empty($row['chars']) && !empty($chars[0]) && !empty($char[0]) && !empty($char[1]) && !empty($char[2])) { //Check if first, or all values are blank
			foreach ($chars as $char) {
				$char = explode(",",$char);
				if (!empty($char[0]) && !empty($char[1]) && !empty($char[2])) {
				echo '<tr><td align="left">[' . strtoupper($char[0]) . '] ' . $char[2] . '-' . $char[1] . '</td></tr>';
				}
			}
		} else {
			echo '<tr><td align="center">No characters attached to this account.<br /><a href="#">Click here to add your characters</a></td></tr>';
		}
		echo '</table>';
	groupFoot();
	echo '<br /><br />';
	groupHead('Guilds', 500);
		$result = mysql_query("SELECT * FROM guilds WHERE members LIKE ('%" . $_REQUEST['n'] . "%')");
		while ($row = mysql_fetch_array($result)) {
			$rights = "";
			if ($row['master'] == $_REQUEST['n']) { $rights = "Master"; }
			$admins = explode(",",$row['admins']); if (array_search($_REQUEST['n'], $admins) !== false) { $rights = "Admin"; }
			$mods = explode(",",$row['mods']); if (array_search($_REQUEST['n'], $mods) !== false) { $rights = "Moderator"; }
			if (empty($rights)) { $rights = "Member"; }
			echo '<a href="http://www.guildcube.com/guild.php?g='.$row['name'].'">' . $row['title'] . '</a> - Rights: ' . $rights . '<br />';
		}
	groupFoot();
} else {
	groupHead('Invalid User', 500);
		echo '<div align="center" style="font-weight: bold;">User ' . $_REQUEST['n'] . ' does not exist</div>';
	groupFoot();
}
?>

</body>
</html>