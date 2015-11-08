<?php session_start(); include("functions.php");

if (rights($_SESSION['user']) != 'admin') {
	header("Location: index.php");
	exit;
}

$uInfo = 4;
$users = explode("\r\n", file_get_contents("users.dat"));

if (isset($_POST['delete'])) {
	$newusers = array();
	for ($i=0;$i<count($users);$i+=$uInfo) {
		if ($_POST['delete'] != $i || $i == 0) {
			for ($c=0;$c<$uInfo;$c++) {
				$newusers[] = $users[$i+$c];
			}
		}
	}
	
	$newusers = implode("\r\n", $newusers);
	$tmp = fopen("users.dat", "w");
	fwrite($tmp, $newusers);
	fclose($tmp);
	
	$i=$i/$uInfo;
	$result = mysql_query("SELECT * FROM users");
	$row = mysql_fetch_array($result);
	mysql_query("DELETE FROM users WHERE id=".$i) or die(mysql_error());
	mysql_query("UPDATE users SET id=id-1 WHERE id > ".$i);
	
	header("Location: ".$_SERVER['HTTP_REFERER']);
	exit();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Line Rider Share - Administration</title>
<?php include("style.css"); ?>
</head>
<body>
<?php include("header.php"); ?>

<?php

if (!empty($_REQUEST['decode'])) {
	echo '"' . $_REQUEST['decode'] . '" decoded is "' . decode($_REQUEST['decode']) . '".';
}
if (!empty($_REQUEST['encode'])) {
	echo '"' . $_REQUEST['encode'] . '" encoded is "' . encode($_REQUEST['encode']) . '".';
}

$_GET['from'] = (int)$_GET['from'];
if (empty($_GET['to'])) { $_GET['to'] = $_GET['from'] + 100; } else { $_GET['to'] == (int)$_GET['to']; }
if (empty($_GET['sort'])) { $_GET['sort'] = 'id'; }
if (empty($_GET['order'])) { $_GET['order'] = 'ASC'; }

//$result = mysql_query("SELECT * FROM users WHERE id BETWEEN " . $_GET['from'] . " AND " . $_GET['to'] ." ORDER BY " . $_GET['sort']);
$result = mysql_query("SELECT * FROM users ORDER BY " . $_GET['sort'] . " " . $_GET['order'] . " LIMIT " . $_GET['from'] . ", " . ($_GET['to']-$_GET['from']));

groupHead("<center>Users</center>", "", "", 750);
echo '<table cellpadding="0" cellspacing="0" border="0" width="100%">';
echo '<tr><td width="4%" align="right" style="font-weight: bold;">#</td><td width="1%"></td><td width="25%" style="font-weight: bold;">Username</td><td width="35%" style="font-weight: bold;">Contact</td><td width="25%" style="font-weight: bold;">Joined</td><td width="10%" style="font-weight: bold;">Actions</td></tr>';

while ($row = mysql_fetch_array($result)) {
	echo '<tr><td align="right">' . $row['id'] . '.</td><td></td><td><a href="analyze.php?u=' . $row['name'] . '"';
	if (rights($row['name']) == 'admin') { echo ' style="color: #CC0000;" title="' . $row['name'] . ' is an administrator."'; } elseif (rights($row['name']) == 'moderator') { echo ' style="color: #00CC00;" title="' . $row['name'] . ' is a moderator."'; }
	echo '>' . $row['name'] . '</a></td><td>' . decode($row['email']) . '</td><td>' . date("n/d/y (g:i:s A)", $row['joined']+10800) . '</td><td><a href="#"><img src="images/cancel.gif" border="0" onclick="if(confirm(\'Are you sure you want to delete\r\nuser #' . $row['id'] . ': ' . $row['name'] . '?\')) { document.deleteUser.delete.value = ' . $row['id'] . '; document.deleteUser.submit(); }"></a></td></tr>';
}

echo '<tr><form name="options" action="admin.php" method="GET"><td colspan="5" align="center">
<input type="button" value="<< BACK 100 <<" onclick="document.options.from.value = ' . ($_GET['from']-100) . '; document.options.to.value = ' . ($_GET['from']) . '; document.options.submit();" ' . (($_GET['from'] < 100) ? 'disabled="true"' : '') . '>
<input type="button" value=">> NEXT 100 >>" onclick="document.options.from.value = ' . ($_GET['from']+100) . '; document.options.to.value = ' . ($_GET['from']+200) . '; document.options.submit();">

<select name="sort" onchange="document.options.submit();">
<option value="id" ' . ($_GET['sort'] == 'id' ? 'selected="true"' : '') . '>ID</option>
<option value="name" ' . ($_GET['sort'] == 'name' ? 'selected="true"' : '') . '>Username</option>
<option value="email" ' . ($_GET['sort'] == 'email' ? 'selected="true"' : '') . '>Email</option>
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

echo '<form name="deleteUser" method="post" action="admin.php"><input type="hidden" name="delete" value="no"></form>';
?>
</body>
</html>