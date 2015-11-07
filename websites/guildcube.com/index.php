<?php include("scripts/header.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>GuildCube.com | Home</title>
<link rel="stylesheet" href="scripts/style.css" type="text/css"> <!-- Global stylesheet -->
<link rel="stylesheet" href="style.css" type="text/css"> <!-- Main page stylesheet -->
</head>
<body>
<?php include("scripts/navigation.php"); ?>

<?php
	echo '<table align="center" width="800" height="500" cellpadding="0" cellspacing="0" border="0">';
	echo '<tr><td align="center">';
	groupHead("News", 400, 200);
	echo '<div align="center" style="font-weight: bold;"><a href="http://demo.guildcube.com">View Demo</a></div>';
	groupFoot();
	echo '</td></tr>';
	echo '</table>';
?>

</body>
</html>