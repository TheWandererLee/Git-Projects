<?php include("header.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>GuildCube.com :: <?php echo $_REQUEST['n']; ?></title>
</head>
<body>
<?php include("navigation.php"); ?>

<?php
$result = mysql_query("SELECT * FROM users WHERE name='" . $_REQUEST['n'] . "'");
$row = mysql_fetch_array($result);
if (!empty($row(['name']))) {
	groupHead('Characters', 500);
	echo '<table cellpadding="8" cellspacing="0" border="1" align="center">';
	$chars = explode("|",$row['chars']);
	foreach ($chars as $char) {
		$char = explode(",",$char);
		echo '<tr><td align="left">[' . strtoupper($char[0]) . '] ' . $char[2] . '-' . $char[1] . '</td></tr>';
	}
	echo '</table>';
	groupFoot();
} else {
	groupHead('Invalid User', 500);
	echo '<div align="center" style="font-weight: bold;">User ' . $_REQUEST['n'] . ' does not exist</div>';
	groupFoot();
}
?>

</body>
</html>