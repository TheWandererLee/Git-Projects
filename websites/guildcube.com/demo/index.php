<?php include("../scripts/header.php"); global $domain; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>GuildCube.com :: Demo</title>
<link rel="stylesheet" href="<?php echo $domain . '/scripts/style.css'; ?>" type="text/css">
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<?php include("../scripts/navigation.php"); ?>
<br />
<br />

<?php
$showTableBg = false; $showMainBg = false;

$_REQUEST['r'] = 'Bloodhoof';
$_REQUEST['n'] = 'Eternal Fear';

echo '<h1 align="center"><b>' . str_replace('+',' ',$_REQUEST['n']) . '</b> (' . str_replace('+',' ',$_REQUEST['r']) . ')</h1>';

echo '<table width="100%" cellpadding="0" cellspacing="0" border="0">';
echo '<tr><td width="15%" valign="top">';
mod_roster($_REQUEST['r'], $_REQUEST['n']);
echo '</td>';
echo '<td width="5%"></td>';
echo '<td width="60%" valign="top">';
mod_text(str_replace("\n", "<br />", file_get_contents("../scripts/realmlist.txt")));
echo '</td>';
echo '<td width="5%"></td>';
echo '<td width="15%" valign="top">';
mod_roster($_REQUEST['r'], $_REQUEST['n']);
echo '</td>';
echo '</table>';
?>

<!-- Fancy Crap... Later
<table cellpadding="0" cellspacing="0" border="0" width="500" height="500" align="center" style="background-image: url('images/border5.png'); background-repeat: repeat;">
<tr>
	<td style="background-image: url('images/border7.png'); background-repeat: no-repeat; background-position: bottom;" width="16" height="24"></td>
	<td style="background-image: url('images/border8.png'); background-repeat: repeat-x; background-position: bottom;" height="24"><b>Guild of Demonstration</b></td>
	<td style="background-image: url('images/border9.png'); background-repeat: no-repeat; background-position: bottom;" width="16" height="24"></td>
</tr>
<tr>
	<td style="background-image: url('images/border4.png'); background-repeat: repeat-y;" width="16"></td>
	<td valign="top"><u>Guild News</u><br />Stuff<br />To<br />Mention</td>
	<td style="background-image: url('images/border6.png'); background-repeat: repeat-y;" width="16"></td>
</tr>
<tr>
	<td style="background-image: url('images/border1.png');" width="16" height="16"></td>
	<td style="background-image: url('images/border2.png'); background-repeat: repeat-x;" height="16"></td>
	<td style="background-image: url('images/border3.png');" width="16" height="16"></td>
</tr>
</table>
-->
</body>
</html>