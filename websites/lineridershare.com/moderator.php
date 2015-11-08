<?php session_start(); include("functions.php");

if (rights($_SESSION['user']) != 'admin' && rights($_SESSION['user']) != 'moderator') {
	header("Location: index.php");
	exit;
}

if (is_numeric($_POST['clear'])) {
	//Dismiss alert
	$alerts = explode("\r\n", file_get_contents("alerts.dat"));
	$new = array();
	for ($i=0;$i<count($alerts);$i++) {
		$l = explode(chr(9), $alerts[$i]);
		if ($l[0] != $_POST['clear']) {
			$new[$i] = $alerts[$i];
		}
	}
	
	$new = implode("\r\n", $new);
	$file = fopen("alerts.dat", "w");
	fwrite($file, $new);
	fclose($file);
}
if (is_numeric($_POST['trash'])) {
	//Dismiss alert
	$alerts = explode("\r\n", file_get_contents("alerts.dat"));
	$new = array();
	for ($i=0;$i<count($alerts);$i++) {
		$l = explode(chr(9), $alerts[$i]);
		if ($l[0] != $_POST['trash']) {
			$new[$i] = $alerts[$i];
		}
	}
	
	$new = implode("\r\n", $new);
	$file = fopen("alerts.dat", "w");
	fwrite($file, $new);
	fclose($file);
	
	//Move track to trash folder
	if (file_exists("tracks/" . $_POST['trash'] . ".track")) {
		rename("tracks/" . $_POST['trash'] . ".track", "tracks/trash/" . $_POST['trash'] . ".track");
	}
}
if ($_POST['changeFeatured'] == 'yes') {
	$w = array();
	for ($i=0;$i<5;$i++) {
		if (!empty($_POST['featured'.$i])) {
			array_push($w, $_POST['featured'.$i]);
		}
	}
	$w = implode(' ', $w);
	$file = fopen("featured.dat", "w");
	fwrite($file, $w);
	fclose($file);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Line Rider Share - Moderate</title>
<style type="text/css">
.featured {
font-size: 10px;
font-family: Verdana, Arial, Helvetica, sans-serif;
}
</style>
<?php include("style.css"); ?>
</head>
<body>
<?php include("header.php"); ?>

<?php

groupHead("<center>Notes</center>", "", "", 480);
	echo '<b>3/25/08</b>: Added two new moderators; Fluffas, and Hexus.';
groupFoot();

echo '<p />&nbsp;<p />';

groupHead("<center>Alerts</center>", "006600", "", 640);
	
	echo '<form name="clearform" action="moderator.php" method="post">';
	echo '<input type="hidden" name="clear" value="">';
	echo '<input type="hidden" name="trash" value="">';
	echo '</form>';
	echo '<table align="center" cellpadding="0" cellspacing="8" border="0" width="100%">';
	echo '<tr><td width="5%"><i>#</i></td><td width="5%" align="right"><b>ID</b></td><td width="20%"><b>Name</b></td><td width="30%"><b>Reason</b></td><td width="20%"><b>Submitted by...</b></td><td width="10%" align="right"><b>Dismiss</b></td><td width="10%" align="left"><b>Trash</b></td></tr>';
	if (!file_exists("alerts.dat")) { $file = fopen("alerts.dat", "w"); fclose($file); }
	$alerts = explode("\r\n", file_get_contents("alerts.dat"));
	$alerts = array_splice($alerts, 0, count($alerts)-1);
	for ($i=0;$i<count($alerts);$i++) {
		$l = explode(chr(9), $alerts[$i]);
		echo '<tr><td>' . $i . '.</td><td align="right"><a href="track.php?id=' . $l[0] . '" style="font-weight: bold">' . $l[0] . '</a></td><td><a href="track.php?id=' . $l[0] . '">' . getInfo($l[0], "label") . '</a></td><td>' . $l[2] . '</td><td><a href="analyze.php?u=' . $l[1] . '">' . $l[1] . '</a></td><td align="right"><a href="#"><img src="images/delete.gif" border="0" onclick="document.clearform.clear.value = \'' . $l[0] . '\'; document.clearform.submit();"></a></td><td align="left"><a href="#"><img src="images/trash.gif" border="0" onclick="document.clearform.trash.value = \'' . $l[0] . '\'; document.clearform.submit();"></a></td></tr>';
		if ($l[0] == $_REQUEST['id']) { $found = true; break; }
	}
	echo '</table>';
	
groupFoot("006600");

echo '<p />&nbsp;<p />';

groupHead("<center>Featured Tracks</center>", "00AA00");
	
	$feat = explode(" ", file_get_contents("featured.dat"));
	
	echo '<form name="featured" action="moderator.php" method="post">';
	echo '<input type="hidden" name="changeFeatured" value="yes">';
	
	echo '<table align="center" cellpadding="0" cellspacing="8" border="0" width="100%">';
		for ($i=0;$i<5;$i++) {
			echo '<tr><td align="right" style="font-weight: bold;">#' . ($i+1) . '</td><td><input type="text" class="featured" name="featured' . $i . '" value="' . $feat[$i] . '"></tr>';
		}
	echo '<tr><td colspan="2" align="center"><a href="#"><img src="images/check.gif" border="0" onclick="document.featured.submit();"></a></td></tr>';
	echo '</table>';
	
	echo '</form>';
	
groupFoot("00AA00");

echo '<p />&nbsp;<p />';

$uInfo = 4;
$users = explode("\r\n", file_get_contents("users.dat"));

groupHead("<center>Statistics (Registration Rate for " . date("M Y") . ")</center>", "", "", 512);
$days = array();
for ($i=0;$i<count($users);$i+=$uInfo) {
	$date = $users[$i+3]+10800;
	if (isset($days[(int)date('j',$date)])) {
		if (date('n',$date) == date('n')) {
			$days[(int)date('j',$date)]++;
		}
	} else {
		if (date('n',$date) == date('n')) {
			$days[(int)date('j',$date)] = 1;
		}
	}
}
$high = 0;
for ($i=1;$i<=count($days);$i++) { if($days[$i]>$high) { $high = $days[$i]; } }
for ($i=1;$i<=count($days);$i++) {
	echo '<table cellpadding="0" cellspacing="0" border="0" width="100%">';
	echo '<tr><td width="' . ($days[$i]/$high*80) . '%" height="1" bgcolor="#FFFFFF"></td><td></td><td></td>';
	echo '<tr><td width="' . ($days[$i]/$high*80) . '%" height="1" bgcolor="#CCCCCC"></td><td></td><td></td>';
	echo '<tr><td width="' . ($days[$i]/$high*80) . '%" height="1" bgcolor="#9999CC"></td><td></td><td></td>';
	echo '<tr><td width="' . ($days[$i]/$high*80) . '%" height="1" bgcolor="#6666DD"></td><td></td><td></td>';
	echo '<tr><td width="' . ($days[$i]/$high*80) . '%" height="1" bgcolor="#3333EE"></td><td></td><td></td>';
	echo '<tr><td width="' . ($days[$i]/$high*80) . '%" height="8" bgcolor="#0000FF" style="color: #FFFFFF;"><b>&nbsp;' . $i . '.</b></td><td width="' . (100-($days[$i]/$high*80)-10) . '%" align="right"></td><td align="right" width="20%"><b>' . (int)$days[$i] . ' users</b></td></tr>';
	echo '<tr><td width="' . ($days[$i]/$high*80) . '%" height="1" bgcolor="#3333EE"></td><td></td><td></td>';
	echo '<tr><td width="' . ($days[$i]/$high*80) . '%" height="1" bgcolor="#6666DD"></td><td></td><td></td>';
	echo '<tr><td width="' . ($days[$i]/$high*80) . '%" height="1" bgcolor="#9999CC"></td><td></td><td></td>';
	echo '<tr><td width="' . ($days[$i]/$high*80) . '%" height="1" bgcolor="#CCCCCC"></td><td></td><td></td>';
	echo '<tr><td width="' . ($days[$i]/$high*80) . '%" height="1" bgcolor="#FFFFFF"></td><td></td><td></td>';
	echo '</table>';
}
groupFoot();

echo '<p />&nbsp;<p />';

$_GET['from'] = (int)$_GET['from'];
if (empty($_GET['to'])) { $_GET['to'] = $_GET['from'] + 100; } else { $_GET['to'] == (int)$_GET['to']; }
if (empty($_GET['sort'])) { $_GET['sort'] = 'id'; }
if (empty($_GET['order'])) { $_GET['order'] = 'ASC'; }

//$result = mysql_query("SELECT * FROM users WHERE id BETWEEN " . $_GET['from'] . " AND " . $_GET['to'] ." ORDER BY " . $_GET['sort']);
$result = mysql_query("SELECT * FROM users ORDER BY " . $_GET['sort'] . " " . $_GET['order'] . " LIMIT " . $_GET['from'] . ", " . ($_GET['to']-$_GET['from']));

groupHead("<center>Users</center>", "", "", 400);
echo '<table cellpadding="0" cellspacing="0" border="0" width="100%">';
echo '<tr><td width="4%" align="right" style="font-weight: bold;">#</td><td width="1%"></td><td width="50%" style="font-weight: bold;">Username</td><td width="45%" style="font-weight: bold;">Joined</td></tr>';

while ($row = mysql_fetch_array($result)) {
	echo '<tr><td align="right">' . $row['id'] . '.</td><td></td><td><a href="analyze.php?u=' . $row['name'] . '"';
	if (rights($row['name']) == 'admin') { echo ' style="color: #CC0000;" title="' . $row['name'] . ' is an administrator."'; } elseif (rights($row['name']) == 'moderator') { echo ' style="color: #00CC00;" title="' . $row['name'] . ' is a moderator."'; }
	echo '>' . $row['name'] . '</a></td><td>' . date("n/d/y (g:i:s A)", $row['joined']+10800) . '</td></tr>';
}

echo '<tr><form name="options" action="moderator.php" method="GET"><td colspan="5" align="center">
<input type="button" value="<< BACK 100 <<" onclick="document.options.from.value = ' . ($_GET['from']-100) . '; document.options.to.value = ' . ($_GET['from']) . '; document.options.submit();" ' . (($_GET['from'] < 100) ? 'disabled="true"' : '') . '>
<input type="button" value=">> NEXT 100 >>" onclick="document.options.from.value = ' . ($_GET['from']+100) . '; document.options.to.value = ' . ($_GET['from']+200) . '; document.options.submit();">

<select name="sort" onchange="document.options.submit();">
<option value="id" ' . ($_GET['sort'] == 'id' ? 'selected="true"' : '') . '>ID</option>
<option value="name" ' . ($_GET['sort'] == 'name' ? 'selected="true"' : '') . '>Username</option>
<option value="joined" ' . ($_GET['sort'] == 'joined' ? 'selected="true"' : '') . '>Join Date</option>
</select>

<select name="order" onchange="document.options.submit();">
<option value="ASC" ' . ($_GET['order'] == 'ASC' ? 'selected="true"' : '') . '>Ascending</option>
<option value="DESC" ' . ($_GET['order'] == 'DESC' ? 'selected="true"' : '') . '>Descending</option>
</select>

Show <input type="text" name="from" value="' . $_GET['from'] . '" size="3" maxlength="4">
to <input type="text" name="to" value="' . $_GET['to'] . '" size="3" maxlength="4">

</form></td></tr>';

echo '</table>';
groupFoot();

?>
</body>
</html>