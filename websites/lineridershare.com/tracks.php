<?php session_start(); include("functions.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Line Rider Share - All Tracks</title>
<style type="text/css">
.header {
font-weight: bold;
font-size: 12px;
}

.dull {
background-color: #FFFFFF;
}
.bright {
background-color: #99FFFF;
}
</style>
<?php include("style.css"); ?>
</head>
<body>
<?php include("header.php"); ?>

<?php

if (empty($_REQUEST['a'])) { $_REQUEST['a'] = 'id'; }
if ($_REQUEST['o'] != 'desc') { $_REQUEST['o'] = 'asc'; }
strtoupper($_REQUEST['o']);
$_REQUEST['from'] = (int)$_REQUEST['from'];
if (empty($_REQUEST['to'])) { $_REQUEST['to'] = $_REQUEST['from']+100; }

//echo '<h1 align="center">Under Construction</h1><center><b style="color: #FF0000">Nothing on this page is guaranteed or final.</b></center><br />';
groupHead("<center>All Tracks (" . totalTracks() . " total, showing " . ($_REQUEST['to']-$_REQUEST['from']) . ")</center>", "", "", 880);

$last = lastTrack();

$result = mysql_query("SELECT * FROM tracks ORDER BY " . $_REQUEST['a'] . " " . $_REQUEST['o'] . " LIMIT " . $_REQUEST['from'] . ", " . ($_REQUEST['to']-$_REQUEST['from']));

/*********** GOOGLE ANALYTICS SEARCH RESULTS ************/
echo '
<div id="cse-search-results"></div>
<script type="text/javascript">
  var googleSearchIframeName = "cse-search-results";
  var googleSearchFormName = "cse-search-box";
  var googleSearchFrameWidth = 800;
  var googleSearchDomain = "www.google.com";
  var googleSearchPath = "/cse";
</script>
<script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>
';
/*********** GOOGLE ANALYTICS SEARCH RESULTS ************/

echo '<table cellpadding="0" cellspacing="0" border="0" width="100%">';
echo '<tr><td width="6%" class="header" align="right">ID <a href="tracks.php?a=id&o=asc"><img src="images/asc.png" border="0"></a><a href="tracks.php?a=id&o=desc"><img src="images/desc.png" border="0"></a></td><td width="1%"></td><td width="28%" class="header">Name <a href="tracks.php?a=name&o=asc"><img src="images/asc.png" border="0"></a><a href="tracks.php?a=name&o=desc"><img src="images/desc.png" border="0"></a></td><td width="14%" class="header">Author <a href="tracks.php?a=author&o=asc"><img src="images/asc.png" border="0"></a><a href="tracks.php?a=author&o=desc"><img src="images/desc.png" border="0"></a></td><td width="16%" class="header">Creation Date <a href="tracks.php?a=created&o=asc"><img src="images/asc.png" border="0"></a><a href="tracks.php?a=created&o=desc"><img src="images/desc.png" border="0"></a></td><td width="9%" class="header">Views <a href="tracks.php?a=views&o=asc"><img src="images/asc.png" border="0"></a><a href="tracks.php?a=views&o=desc"><img src="images/desc.png" border="0"></a></td><td width="13%" class="header">Downloads <a href="tracks.php?a=downloads&o=asc"><img src="images/asc.png" border="0"></a><a href="tracks.php?a=downloads&o=desc"><img src="images/desc.png" border="0"></a></td></tr>';

while ($row = mysql_fetch_array($result)) {
	$row['avg'] = (avgRating($row['rating'])*16)+2;
	
	echo '<tr height="16" class="dull" onMouseOver="this.className=\'bright\';" onMouseOut="this.className=\'dull\';"><td align="right"><a href="track.php?id=' . $row['id'] . '" title="Track #' . $row['id'] . '">' . $row['id'] . '.</a></td><td></td><td><b><a href="track.php?id=' . $row['id'] . '">' . $row['label'] . '</a></b></td><td><a href="analyze.php?u=' . $row['author'] . '"';
	if (rights($row['author']) == 'admin') { echo ' style="color: #CC0000;" title="' . $row['author'] . ' is an administrator."'; } elseif (rights($row['author']) == 'moderator') { echo ' style="color: #00CC00;" title="' . $row['author'] . ' is a moderator."'; }
	echo '>' . $row['author'] . '</a></td><td>' . date("n/d/y (g:i A)", $row['created']) . '</td>';
	echo '<td>' . $row['views'] . '</td><td>' . $row['downloads'] . '</td></tr>';
}

echo '<tr><td colspan="7"><hr size="1" color="#666699" /></td></tr>';
echo '<tr><td colspan="7"><form name="options" action="tracks.php" method="GET">

<input type="button" value="< Back" onclick="document.options.from.value = ' . ($_REQUEST['from']-100) . '; document.options.to.value = ' . ($_REQUEST['from']) . '; document.options.submit();" ' . (($_REQUEST['from'] < 100) ? 'disabled="true"' : '') . '>
<input type="button" value="Next >" onclick="document.options.from.value = ' . ($_REQUEST['from']+100) . '; document.options.to.value = ' . ($_REQUEST['from']+200) . '; document.options.submit();" ' . (($_REQUEST['to'] > $last-100) ? 'disabled="true"' : '') . '>

<select name="a" onchange="document.options.submit();">
<option value="id" ' . ($_REQUEST['a'] == 'id' ? 'selected="true"' : '') . '>ID</option>
<option value="name" ' . ($_REQUEST['a'] == 'name' ? 'selected="true"' : '') . '>Username</option>
<option value="author" ' . ($_REQUEST['a'] == 'author' ? 'selected="true"' : '') . '>Author</option>
<option value="created" ' . ($_REQUEST['a'] == 'created' ? 'selected="true"' : '') . '>Creation Date</option>
<option value="views" ' . ($_REQUEST['a'] == 'views' ? 'selected="true"' : '') . '>Views</option>
<option value="downloads" ' . ($_REQUEST['a'] == 'downloads' ? 'selected="true"' : '') . '>Downloads</option>
</select>

<select name="order" onchange="document.options.submit();">
<option value="ASC" ' . ($_REQUEST['o'] == 'ASC' ? 'selected="true"' : '') . '>Ascending</option>
<option value="DESC" ' . ($_REQUEST['o'] == 'DESC' ? 'selected="true"' : '') . '>Descending</option>
</select>

Show <input type="text" name="from" value="' . $_REQUEST['from'] . '" size="3">
to <input type="text" name="to" value="' . $_REQUEST['to'] . '" size="3">
<input type="submit" value="Go!">

</form></td></tr>';

echo '</table>';
groupFoot();

include("tracker.php"); ?>
</body>
</html>