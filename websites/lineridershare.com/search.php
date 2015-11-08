<?php session_start(); include("functions.php");
if ($_REQUEST['search'] == '') { header("Location: index.php"); }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Line Rider Share - Search</title>
<?php include("style.css"); ?>
</head>
<body>
<?php include("header.php"); ?>

<?php
	$_REQUEST['search'] = str_replace("\\'", "'", $_REQUEST['search']);
	$_REQUEST['search'] = str_replace('\\"', '"', $_REQUEST['search']);
	echo '<center>';
	echo '<table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" id="loader" class="shown"><tr><td align="center">';
	groupHead("<center>Searching...</center>");
	echo '<center>Searching for <b>' . $_REQUEST['search'] . '</b><br />&nbsp;<br /><img src="images/loading.gif"></center>';
	groupFoot();
	echo '</td></tr></table>';
	
	$done = 0;
	$len = strlen($_REQUEST['search']);
	for ($i=0;$i>-1;$i++) {
		if (file_exists("tracks/" . $i . ".track") == true) {
			$name = getInfo($i, "label");
			$auth = getInfo($i, "author");
			$found = false;
			if (strpos(strtolower($name), strtolower($_REQUEST['search'])) !== false) {
				$pos = strpos(strtolower($name), strtolower($_REQUEST['search']));
				$name = str_ireplace($_REQUEST['search'], '<b>'.substr($name, $pos, $len).'</b>', $name);
				$found = true;
			}
			if (strpos(strtolower($auth), strtolower($_REQUEST['search'])) !== false) {
				$pos = strpos(strtolower($auth), strtolower($_REQUEST['search']));
				$auth = str_ireplace($_REQUEST['search'], '<b>'.substr($auth, $pos, $len).'</b>', $auth);
				$found = true;
			}
			if ($found == true) { $results[] = '<tr><td style="font-size: 12px;" width="75%"><a href="track.php?id=' . $i . '">' . $name . '</a></td><td>by <a href="analyze.php?u=' . $auth . '">' . $auth . '</a></td></tr>'; }
		} else {
			$done++;
			if ($done>=1000) { break; } //Stop after a thousand empty spaces
		}
	}
	
	echo '<table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" id="results" class="hidden"><tr><td>';
	groupHead("<center>" . count($results) . " results for <i>" . $_REQUEST['search'] . "</i>.", "", "", 512);
	echo '<table cellpadding="0" cellspacing="0" border="0" align="center" width="100%">';
	if (count($results) == 0) {
		echo 'Sorry, no results could be found for ' . $_REQUEST['search'];
	} else {
		for ($i=0;$i<count($results);$i++) {
			echo $results[$i];
		}
	}
	echo '</table>';
	groupFoot();
	echo '</td></tr></table>';
	echo '</center>';
?>

<script language="javascript">
<!--
document.getElementById('results').className = 'shown';
document.getElementById('loader').className = 'hidden';
-->
</script>
</body>
</html>