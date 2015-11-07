<?php session_start(); include("functions.php");

$sideColor = '0000AA';
$centerColor = '339900';
$disabledColor = '666666';
$disabledBgcolor = 'BBBBBB';

function relativeTime($ts) {
	$dif = time() - $ts; //Difference between now and timestamp
	
	$s = '';
	if ($dif < 60) {
		if (floor($dif) > 1) { $s = 's'; }
		return array(floor($dif), 'second'.$s);
	} elseif ($dif < 60 * 60) {
		if (floor($dif/60) > 1) { $s = 's'; }
		return array(floor($dif/60), 'minute'.$s);
	} elseif ($dif < 60 * 60 * 24) {
		if (floor($dif/60/60) > 1) { $s = 's'; }
		return array(floor($dif/60/60), 'hour'.$s);
	} else {
		if (floor($dif/60/60/24) > 1) { $s = 's'; }
		return array(floor($dif/60/60/24), 'day'.$s);
	}
}

if (isset($_POST['shoutMessage'])) {
	if (empty($_SESSION['user'])) { echo 'Quit spamming.'; exit(); }
	elseif (strlen($_POST['shoutMessage']) <= 1) { header("Location: index.php"); exit(); }
	elseif (strlen($_POST['shoutMessage']) > 200) { $_POST['shoutMessage'] = substr($_POST['shoutMessage'], 0, 200); }
	$file = fopen("shout.dat", "a");
		
	$message = $_POST['shoutMessage'];
	
	$message = str_replace('\\\\', '\\', $message);
	$message = str_replace("\\'", "'", $message);
	$message = str_replace('\\"', '"', $message);
	
	$message = htmlentities($message);
	
	$message = str_replace("\r\n", '<br />', $message);
	$message = str_replace('  ', '&nbsp;&nbsp;', $message);
	$message = str_ireplace('(c)', '&copy;', $message);
	$message = str_ireplace('(tm)', '&trade;', $message);
	$message = str_ireplace('(r)', '&reg;', $message);

	fwrite($file, $_SESSION['user'] . "\r\n");
	fwrite($file, strval(time()+10800) . "\r\n");
	fwrite($file, $message . "\r\n");
	fclose($file);
	header("Location: index.php");
	exit();
}
/*
if ($_POST['pass'] == "ShareLR" . date("j")) { $_SESSION['pass'] = "ShareLR" . date("j"); }
if ($_SESSION['pass'] != "ShareLR" . date("j")) {
	groupHead("<center>Under Construction</center>");
	echo '<form name="enter" method="post" action="index.php"><center>Line Rider Share is currently being built.<br />S<a onClick="document.enter.submit()" style="color: #000000; text-decoration: none; cursor: text;">o</a>rry for the inconvenience ;)<br /><br /><input type="password" name="pass"></center></form>';
	groupFoot();
	exit();
}
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="google-site-verification" content="-xYAzHxDgBbmOTHlKrIMSscRR4Mydxr04bGLuiz-jkc" />
<meta name="Description" content="Line Rider Share makes uploading, downloading, and sharing your line rider tracks with other people easier then ever! Comment, rate, preview, and download experienced riders tracks!">
<meta name="Keywords" content="line rider, line, rider, share, tracks, track, sol, flash, game, toy, beta, play, free">
<title>Line Rider Share - Home</title>
<style type="text/css">
.news {
padding-left: 2em;
text-indent: -2em;
}
body {
/*background: url("images/sm3.jpg") #000000 no-repeat fixed;*/
background: url("images/ink.png") #FFFFFF center no-repeat fixed;
}
.intitle {
font-size: 9px;
}
.intitle:hover {
text-decoration: none;
color: #66CCFF;
font-size: 9px;
}
.message {
font-size: 10px;
font-family: Verdana, Arial, Helvetica, sans-serif;
background: url("images/shadowc.png");
}
.sectionSelect {
font-size: 10px;
font-family: Verdana, Arial, Helvetica, sans-serif;
font-weight: bold;
color: #FF0000;
}
.son {
font-weight: bold;
color: #FF0000;
}
.soff {
font-weight: normal;
color: #000000;
}
</style>
<script language="javascript" type="text/javascript">
<!--
function sectionChange() {
	ss = document.getElementById('rightSection').value;
	
	document.getElementById("topRated").className = "hidden";
	document.getElementById("mostViewed").className = "hidden";
	document.getElementById("mostDownloaded").className = "hidden";
	
	document.getElementById("topRatedc").className = "hidden";
	document.getElementById("mostViewedc").className = "hidden";
	document.getElementById("mostDownloadedc").className = "hidden";
	
	document.getElementById("topRatedo").className = "soff";
	document.getElementById("mostViewedo").className = "soff";
	document.getElementById("mostDownloadedo").className = "soff";
	
	document.getElementById(ss).className = "shown";
	document.getElementById(ss+"c").className = "shown";
	document.getElementById(ss+"o").className = "son";
}

function ismaxlength(obj){
	var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
	if (obj.getAttribute && obj.value.length>mlength)
	obj.value=obj.value.substring(0,mlength)
}
//-->
</script>
</head>
<body>
<?php include("header.php"); $lightCenter = "light"; ?>

<div align="center"><script type="text/javascript"><!--
google_ad_client = "pub-9055469377866352";
/* Line Rider Share Home */
google_ad_slot = "1754818550";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>

<?php
echo '<!-- THE WHOLE PAGE IS ON THIS LINE! HAVE FUN! ;) -->';
echo '<br />&nbsp;<br />';
echo '<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr>';
echo '<td align="left" valign="top" width="33%">';

	echo '<table cellpadding="0" cellspacing="0" border="0"><tr><td>';
	
	groupHead("<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td align=\"left\">Recently Added</td><td align=\"right\"><a href=\"tracks.php?a=created&o=desc&show=100\" class=\"intitle\">Last 100</a></td></tr></table>", $sideColor, "", 200);
	echo '<table cellpadding="0" cellspacing="0" border="0">';
	$max = 10;
	
	$result = mysql_query("SELECT * FROM tracks ORDER BY created DESC LIMIT 0, ".$max);
	
	$count = 0;
	while ($row = mysql_fetch_array($result)) {
		$count++;
		$infoTag = "Created by " . $row['author'];
		echo '<tr><td align="right">' . $count . '.&nbsp;</td><td align="left"><a href="track.php?id=' . $row['id'] . '" title="' . $infoTag . '">' . $row['label'] . '</a></td></tr>';
		echo '<tr><td></td><td>' . date("n/j/Y g:i:sA", $row['created']+10800) . '</td>';
	}
	
	echo '</table>';
	groupFoot($sideColor);
	
	echo '</td></tr>';
	
	/*
	echo '<tr><td height="16"></td></tr><tr><td>';
	
	groupHead("Recent Comments", $sideColor, "", 200);
	
	$max = 5;
	echo '<table cellpadding="0" cellspacing="0" border="0">';
	$blankinc = 0;
	$com = array();
	$tracks = array();
	$cInfo = 3;
	
	for ($i=0;$i>-1;$i++) {
		if (file_exists("tracks/comments/" . $i . ".comments") == true) {
			$blankinc = 0;
			array_push($tracks, $i);
			array_push($com, filemtime("tracks/comments/" . $i . ".comments"));
		} else {
			$blankinc++;
			if ($blankinc>=1000) { break; } //Stop after a thousand empty spaces
		}
	}
	if (count($com) > 0) {
		array_multisort($com, SORT_DESC, $tracks);
		if (count($com) < $max) { $max = count($com); }
		for ($i=0;$i<$max;$i++) {
			$ccount = (substr_count(file_get_contents("tracks/comments/" . $tracks[$i] . ".comments"), "\r\n"))/$cInfo;
			$infoTag = $ccount . " comments total";
			$rtime = relativeTime($com[$i]);
			//echo '<tr><td align="right">' . intval($i+1) . '.&nbsp;</td><td align="left"><a href="track.php?id=' . $tracks[$i] . '" title="' . $infoTag . '">' . getInfo($tracks[$i], "label") . '</a></td></tr>';
			echo '<tr><td align="right">' . intval($i+1) . '.&nbsp;</td><td align="left">' . getInfo($tracks[$i], "label") . '</td></tr>';
			echo '<tr><td></td><td>' . $rtime[0] . ' ' . $rtime[1] . ' ago</td>'; //Timezone is -8. Add 3 hours for -5 timezone
		}
	} else {
		echo '<tr><td align="right">The track database is empty</td></tr>';
	}
	echo '</table>';
	
	groupFoot($sideColor);
	
	echo '</td></tr>';
	*/
	
	echo '<tr><td height="16"></td></tr><tr><td>';
	
	groupHead("Announcement", $sideColor, "", 200);
	echo '<div style="position: absolute; font-size: 32px; font-weight: bold; color: #FAA; text-align: center;">!</div>';
	echo '<div style="font-style: italic; text-align: center; padding-left: 24px;">Future work on this website has been abandoned, inXile has taken over the game for some time.<br /><br /><span style="text-decoration: underline; font-weight: bold;">This website only works for SOL version 6.1 <a href="play.swf">(LineRider Beta 2) playable here</a>.</span><br /><br />Interested in the domain, future work on another Line Rider sharing website, or other inquiries?<br /><br />Email me at: <a href="mailto:contact@lineridershare.com">contact@lineridershare.com</a></div>';
	groupFoot($sideColor);
	
	/*
	groupHead("Random Tracks", $sideColor, "", 200);
	echo '<table cellpadding="0" cellspacing="0" border="0">';
	$max = 5;
	$lastTrack = 0;
	for ($i=0;$i>-1;$i++) {
		if (file_exists("tracks/" . $i . ".track") == true) {
			$blankinc = 0;
			$lastTrack = $i;
		} else {
			$blankinc++;
			if ($blankinc>=1000) { break; } //Stop after a thousand empty spaces
		}
	}
	
	$num = 0;
	$i = -1;
	$count = 0;
	while ($num < $max) {
		while (!file_exists("tracks/".$i.".track")) {
			$i = mt_rand(0, $lastTrack);
		}
		$count++;
		$result = mysql_query("SELECT * FROM tracks WHERE id=" . mt_rand(0, $lastTrack));
		$row = mysql_fetch_array($result);
		
		$auth = $row['author'];
		echo '<tr><td align="right">' . $count . '.&nbsp;</td><td align="left"><a href="track.php?id=' . $row['id'] . '">' . $row['label'] . '</a></td></tr>';
		echo '<tr><td></td><td';
		if (rights($auth) == 'admin') { echo ' style="color: #CC0000;" title="' . $auth . ' is an administrator."'; } elseif (rights($auth) == 'moderator') { echo ' style="color: #00CC00;" title="' . $auth . ' is a moderator."'; }
		echo '><font color="#000000">by</font> ' . $auth . '</td>';
		$num++;
	}

	echo '</table>';
	groupFoot($sideColor);
	*/
	
	echo '</td></tr></table>';
	
echo '</td><td align="center" valign="top" width="33%">';
	
	echo '<table cellpadding="0" cellspacing="0" border="0"><tr><td>';
	
	groupHead("<center>Welcome</center>", $centerColor, "", 320, $lightCenter);
	echo '<center><b><u>Welcome to Line Rider Share!</u></b><br />Here you can upload tracks and share them with other people, or download others tracks to play on your own computer! If you need help on anything, check the FAQ page ;)<br />&nbsp;<br />Add some tracks! The more (good ones) the better!<br /><a href="checklist.php">Suggestion Checklist</a></center>';
	
	echo '<br />';
	
	echo '<div class="news">';
	echo '<p /><b>9/10/2010</b>: Website Abandoned. - <a href="mailto:contact@lineridershare.com">Contact email</a>';
	echo '<p /><b>1/29/2010</b>: Drastically increased the homepage load time by removing the \'Random Tracks\' list.';
	//echo '<p /><b>3/25/2008</b>: Added some new moderators.';
	//echo '<p /><b>10/18/2007</b>: <a href="#" onmouseover="document.getElementById(\'updates18\').className = \'shown\';" onmouseout="document.getElementById(\'updates18\').className = \'hidden\';"><b style="color: #009900;">Switched the database to MySQL</b>, this should make a big difference in website speed.<br />If you get any errors let me know.</span>';
	//echo '<p /><b>7/20/2007</b>: <a href="#" onmouseover="document.getElementById(\'updates2\').className = \'shown\';" onmouseout="document.getElementById(\'updates2\').className = \'hidden\';">Updates</a><span id="updates2" class="hidden" style="text-indent: 0em;">Added an ASCII track viewer, that converts the track to pure letters. To view a track in ASCII mode, click the link beneath the preview on its page.<br /><b>Added a search bar at the top right. Search by track name or author.</b><br />Not sure how long the charts have been down but they are working again now.</span>';
	//echo '<p /><b>6/02/2007</b>: <a href="#" onmouseover="document.getElementById(\'updates2\').className = \'shown\';" onmouseout="document.getElementById(\'updates2\').className = \'hidden\';">Updates</a><span id="updates2" class="hidden" style="text-indent: 0em;">Added some <a href="stats.php">more statistics</a>.<br />Now after logging in, it will take you back to the page you were previously on.</span>';
	//echo '<p /><b>5/26/2007</b>: <a href="#" onmouseover="document.getElementById(\'updates26\').className = \'shown\';" onmouseout="document.getElementById(\'updates26\').className = \'hidden\';">Updates</a><span id="updates26" class="hidden" style="text-indent: 0em;">Moved the shoutbox to the right side.<br />Compacted the sections on the right into one section to make room.</span>';
	//echo '<p /><b>5/25/2007</b>: <a href="#" onmouseover="document.getElementById(\'updates25\').className = \'shown\';" onmouseout="document.getElementById(\'updates25\').className = \'hidden\';">Updates</a><span id="updates25" class="hidden" style="text-indent: 0em;">Added a shoutbox on the left side of the screen; you must be logged in to post a message.</span>';
	//echo '<p /><center><a href="http://kongregate.com?referrer=TheWandererLee" style="font-weight: bold">Kongregate - Play Free Games</a></center>';
	//echo '<p /><b>5/24/2007</b>: <a href="#" onmouseover="document.getElementById(\'updates24\').className = \'shown\';" onmouseout="document.getElementById(\'updates24\').className = \'hidden\';">Updates</a><span id="updates24" class="hidden" style="text-indent: 0em;">I have added a button that allows you to <u>add all of the tracks you\'ve uploaded into your manager</u> with a single click.<br />-You can now <u>instantly download single tracks</u> from the track page without having to add them to your manager first.<br />-Added track width x height dimensions to the Analyze page<br />-When downloading the .sol file containing your tracks, you can now see its total filesize & bytes remaining.</span>';
	//echo '<p /><b>5/23/2007</b>: <a href="#" onmouseover="document.getElementById(\'updates23\').className = \'shown\';" onmouseout="document.getElementById(\'updates23\').className = \'hidden\';">Updates</a><span id="updates23" class="hidden" style="text-indent: 0em;">Added 3D Pie Charts to the Analyze page</span>';
	//echo '<p /><b>5/20/2007</b>: <a href="#" onmouseover="document.getElementById(\'updates20\').className = \'shown\';" onmouseout="document.getElementById(\'updates20\').className = \'hidden\';">Updates</a><span id="updates20" class="hidden" style="text-indent: 0em;">Comments are now deleted when the associated track is deleted.<br />You can also use <b>[B][/B]</b>, <u>[U][/U]</u>, and <i>[I][/I]</i> in your description.<br /><b>Added <font color="#FF0000">Recent Comments</font> section</b></span>';
	//echo '<p /><b>5/13/2007</b>: <a href="#" onmouseover="document.getElementById(\'updates13\').className = \'shown\';" onmouseout="document.getElementById(\'updates13\').className = \'hidden\';">Updates</a><span id="updates13" class="hidden" style="text-indent: 0em;">Line Rider Share has been moved to a better and easier to remember url, <a href="http://share.linerider.org">share.linerider.org</a></span>';
	//echo '<p /><b>5/08/2007</b>: <a href="#" onmouseover="document.getElementById(\'updates08\').className = \'shown\';" onmouseout="document.getElementById(\'updates08\').className = \'hidden\';">Updates</a><span id="updates08" class="hidden" style="text-indent: 0em;">You can now add a Youtube&copy; video to your track. <a href="#" onclick="alert(\'While editing the description of your track on it\\\'s page...\r\nadd this code to your description: [youtube]ID[/youtube]\r\nReplace ID with the ID of your video (found in the youtube video url, everything after ?v=) and it will insert your video there.\r\nYou can also use [y]ID[/y].\');">Click here to learn how.</a></span>';
	//echo '<p /><b>4/29/2007</b>: <a href="#" onmouseover="document.getElementById(\'updates29\').className = \'shown\';" onmouseout="document.getElementById(\'updates29\').className = \'hidden\';">Updates</a><span id="updates29" class="hidden" style="text-indent: 0em;">You can now make tracks <a href="#" onclick="alert(\'Click the Make Track Private button to make a track private.\r\nClick the Make Track Public button to make it downloadable again.\r\nUsers are not allowed to download that track, only preview/rate/comment it.\');" style="cursor: help;">private</a>.<br /><i>*Use this sparingly, no-one will be able to play your tracks if they cannot download them.</i></span>';
	//echo '<p /><b>4/28/2007</b>: <a href="#" onmouseover="document.getElementById(\'updates28\').className = \'shown\';" onmouseout="document.getElementById(\'updates28\').className = \'hidden\';">Updates</a><span id="updates28" class="hidden" style="text-indent: 0em;">When you flag a track you must now provide a reason.</span>';
	//echo '<p /><b>4/26/2007</b>: <a href="#" onmouseover="document.getElementById(\'updates26\').className = \'shown\';" onmouseout="document.getElementById(\'updates26\').className = \'hidden\';">Updates</a><span id="updates26" class="hidden" style="text-indent: 0em;"><b>Finished with the <a href="#" style="cursor: help;" onclick="alert(\'Click on the flag icon (on the track page) to flag a track.\r\nThe track will be reviewed by moderators and deleted if necessary.\');">flagging system</a>.</b><br />Some users have become moderators.</span>';
	//echo '<p /><b>4/24/2007</b>: <a href="#" onmouseover="document.getElementById(\'updates24\').className = \'shown\';" onmouseout="document.getElementById(\'updates24\').className = \'hidden\';">Updates</a><span id="updates24" class="hidden" style="text-indent: 0em;"><b>Finished with the rating system!<br />Finished with track sorting! (by name, rating, etc.)</b></span>';
	//echo '<p /><b>4/23/2007</b>: <a href="#" onmouseover="document.getElementById(\'updates23\').className = \'shown\';" onmouseout="document.getElementById(\'updates23\').className = \'hidden\';">Updates (Mouseover to expand)</a><span id="updates23" class="hidden" style="text-indent: 0em;">Click username to view other tracks by that person<br /><b>Finished the comment system</b><br />Added a "Featured Tracks", "Most Discussed", and "Random Tracks" section.</span>';
	echo '</div>';
	
	groupFoot($centerColor, "", $lightCenter);
	
	/*
	echo '</td></tr><tr><td height="16"></td></tr><tr><td>';
	
	groupHead("<center>Announcements</center>", $centerColor, "", 320, $lightCenter);
	
	groupFoot($centerColor, "", $lightCenter);
	*/
	
	echo '</td></tr><tr><td height="16"></td></tr><tr><td>';
	
	$colors = array("4E16B6", "39F955", "3C32C3", "208D40", "468E7C", "8D4C50", "000000");
	shuffle($colors);
	$col = $colors[mt_rand(0, count($colors)-1)];
	// Use $col instead of $centerColor to do a random color
	groupHead("<center>Featured Tracks</center>", $centerColor, "", 320, $lightCenter);
		/*
		echo '<table cellpadding="0" cellspacing="2" border="0" width="100%">';
		$feat = explode(" ", file_get_contents("featured.dat"));
		for ($i=0;$i<count($feat);$i++) {
			echo '<tr><td><b><a href="track.php?id=' . $feat[$i] . '">' . getInfo($feat[$i], "label") . '</a></b></td><td valign="top"></td></tr>';
			$auth = getInfo($feat[$i], "author");
			echo '<tr><td';
			if (rights($auth) == 'admin') { echo ' style="color: #CC0000;" title="' . $auth . ' is an administrator."'; } elseif (rights($auth) == 'moderator') { echo ' style="color: #00CC00;" title="' . $auth . ' is a moderator."'; }
			echo '><font color="#000000">by</font> ' . $auth . '</td></tr>';
			if ($i < count($feat)-1) { echo '<tr><td height="1" bgcolor="#CCCCCC"></td></tr>'; }
		}
		echo '</table>';
		*/
		
		echo '
		<script type="text/javascript"><!--
		google_ad_client = "pub-9055469377866352";
		/* Line Rider Share, Home, Center, 9/18/10 */
		google_ad_slot = "3908486984";
		google_ad_width = 300;
		google_ad_height = 250;
		//-->
		</script>
		<script type="text/javascript"
		src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>
		';
		
	groupFoot($centerColor, "", $lightCenter);
	
	echo '</td></tr><tr><td height="48"></td></tr><tr><td>';
	
	groupHead("<center>User Statistics</center>", $centerColor);
	$users = explode("\r\n", file_get_contents("users.dat"));
	$uInfo = 4;
	echo '<table cellpadding="0" cellspacing="0" border="0" width="100%">';
	echo '<tr><td><img src="images/users.gif"></td><td width="8"></td><td>';
	echo 'Newest User: <a href="analyze.php?u=' . $users[count($users)-$uInfo] . '">' . $users[count($users)-$uInfo] . '</a>';
	echo '<br />Total Users: ' . ((count($users))/$uInfo);
	echo '<br /><br /><a href="stats.php" style="font-weight: bold;">More Statistics</a></td></tr>';
	echo '<tr><td height="16"></td></tr>';
	echo '<tr><td colspan="3" align="center">';
	?>
	<!-- Start Histats Tracker -->
	<script  type="text/javascript" language="javascript">
	var s_sid = 7565;var st_dominio = 4;
	var cimg = 307;var cwi =112;var che =62;
	</script>
	<script  type="text/javascript" language="javascript" src="http://s10.histats.com/js9.js"></script>
	<noscript><a href="http://www.histats.com" target="_blank">
	<img  src="http://s4.histats.com/stats/0.gif?7565&1" alt="free hit counter" border="0"></a>
	</noscript>
	<!-- End Histats Tracker -->
	<?php
	echo '</td>';
	echo '</tr></table>';
	groupFoot($centerColor);
	
	echo '</td></tr></table>';
	
echo '</td><td align="right" valign="top" width="33%">';
	
	echo '<table cellpadding="0" cellspacing="0" border="0"><tr><td>';
	
	//Show/hide sections, c = content
	groupHead("<right>"
	."<table id=\"topRated\" class=\"shown\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td align=\"left\" width=\"80%\">Top Rated</td><td align=\"right\"><a href=\"tracks.php?a=rating&o=desc&show=100\" class=\"intitle\">Top 100</a></td></tr></table>"
	."<table id=\"mostViewed\" class=\"hidden\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td align=\"left\" width=\"80%\">Most Viewed</td><td align=\"right\"><a href=\"tracks.php?a=views&o=desc&show=100\" class=\"intitle\">Top 100</a></td></tr></table>"
	."<table id=\"mostDownloaded\" class=\"hidden\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td align=\"left\" width=\"80%\">Most Downloaded</td><td align=\"right\"><a href=\"tracks.php?a=downloaded&o=desc&show=100\" class=\"intitle\">Top 100</a></td></tr></table>", $sideColor, "", 200);
	//General
	?>
	<table cellpadding="0" cellspacing="0" border="0" align="center"><tr><td>Show:</td>
	<td width="4"></td>
	<td>
	<select id="rightSection" class="sectionSelect" onchange="sectionChange();">
		<option value="topRated" id="topRatedo" class="son">Top Rated</option>
		<option value="mostViewed" id="mostViewedo" class="soff">Most Viewed</option>
		<option value="mostDownloaded" id="mostDownloadedo" class="soff">Most Downloaded</option>
	</select>
	</td></tr></table><br />
	<?php
	//Top Rated
	$max = 10;
	echo '<table id="topRatedc" class="shown" cellpadding="0" cellspacing="0" border="0">';
	unset($tracks); $inc = 0; $blankinc = 0;
	
	unset($tracks, $rating);
	
	$result = mysql_query("SELECT * FROM tracks");
	while ($row = mysql_fetch_array($result)) {
		$rating[] = round(avgRating($row['rating']) * 16) + 2;
		$tracks[] = $row['id'];
	}
	
	if (count($rating) > 0) {
		array_multisort($rating, SORT_DESC, $tracks);
		if (count($rating) < $max) { $max = count($rating); }
		for ($i=0;$i<$max;$i++) {
			$infoTag = "Created by " . getInfo($tracks[$i], "author");
			echo '<tr><td align="right">' . intval($i+1) . '.&nbsp;</td><td align="left"><a href="track.php?id=' . $tracks[$i] . '" title="' . $infoTag . '">' . getInfo($tracks[$i], "label") . '</a></td></tr>';
			echo '<tr><td></td><td>';
			echo '<table align="center" cellpadding="0" cellspacing="0"><tr><td>Rating:</td><td width="8"></td><td width="' . $rating[$i] . '" height="16" style="background: url(\'images/stars.png\') top left;"></td><td width="' . (86-$rating[$i]) . '" height="16" style="background: url(\'images/nostars.png\') top right;"></td></tr></table>';
			echo '</td>';
		}
	} else {
		echo '<tr><td align="right">The track database is empty</td></tr>';
	}
	echo '</table>';
	//Most Viewed
	echo '<table id="mostViewedc" class="hidden" cellpadding="0" cellspacing="0" border="0">';
	$max = 10;
	$result = mysql_query("SELECT * FROM tracks ORDER BY views DESC LIMIT 0, ".$max);
	$count = 0;
	while ($row = mysql_fetch_array($result)) {
		$count++;
		$infoTag = "Created by " . $row['author'];
		echo '<tr><td align="right">' . $count . '.&nbsp;</td><td align="left"><a href="track.php?id=' . $row['id'] . '" title="' . $infoTag . '">' . $row['label'] . '</a></td></tr>';
		echo '<tr><td></td><td>' . $row['views'] . ' views</td>';
	}
	echo '</table>';
	//Most Downloaded
	echo '<table id="mostDownloadedc" class="hidden" cellpadding="0" cellspacing="0" border="0">';
	$max = 10;
	$result = mysql_query("SELECT * FROM tracks ORDER BY downloads DESC LIMIT 0, ".$max);
	$count = 0;
	while ($row = mysql_fetch_array($result)) {
		$count++;
		$infoTag = "Created by " . $row['author'];
		echo '<tr><td align="right">' . $count . '.&nbsp;</td><td align="left"><a href="track.php?id=' . $row['id'] . '" title="' . $infoTag . '">' . $row['label'] . '</a></td></tr>';
		echo '<tr><td></td><td>' . $row['downloads'] . ' downloads</td>';
	}
	echo '</table>';
	
	groupFoot($sideColor);
	
	echo '</td></tr><tr><td height="16"></td></tr><tr><td>';
	
	groupHead("<center>Shoutbox</center>", $sideColor, "", 200, "yes");
	$max = 5;
	$shout = explode("\r\n", file_get_contents("shout.dat"));
	$cInfo = 3;

	if (isset($_SESSION['user'])) { echo '<center><input type="image" id="addMessage" class="shown" src="images/addMessage.png" onclick="document.getElementById(\'addMessage\').className = \'hidden\';document.getElementById(\'messageBox\').className = \'shown\';"></center>'; }
	
	echo '<div align="center" id="messageBox" class="hidden">';
	echo '<b><a href="analyze.php?u=' . $_SESSION['user'] . '"';
	if (rights($_SESSION['user']) == 'admin') { echo ' style="color: #CC0000;" title="' . $_SESSION['user'] . ' is an administrator."'; } elseif (rights($_SESSION['user']) == 'moderator') { echo ' style="color: #00CC00;" title="' . $_SESSION['user'] . ' is a moderator."'; }
	echo '>' . $_SESSION['user'] . '</a></b>';
	echo '<br />';
	echo '<table cellpadding="0" cellspacing="0" border="0" width="100%"><tr><td>';
	echo '<form name="addMessage" action="index.php" method="post">';
	echo '<textarea cols="24" rows="8" class="message" name="shoutMessage" maxlength="200" onkeyup="return ismaxlength(this)" wrap="soft"></textarea>';
	echo '</form>';
	echo '</td><td width="8"></td><td valign="middle">';
	shadow();
	echo '<input type="image" id="sendMessage" src="images/check.gif" class="shown" onclick="document.getElementById(\'sendMessage\').className=\'hidden\'; document.addMessage.submit();">';
	endShadow();
	echo '<br /><br />';
	shadow();
	echo '<input type="image" src="images/cancel.gif" onclick="document.getElementById(\'addMessage\').className = \'shown\';document.getElementById(\'messageBox\').className = \'hidden\';">';
	endShadow();
	echo '</td></tr></table>';
	echo '<br />';
	
	echo '</div>';
	echo '</form>';
	for ($i=count($shout)-$cInfo-1;$i>=0;$i-=$cInfo) {
		$max--;
		if ($max<0) { break; }
		echo '<b><a href="analyze.php?u=' . $shout[$i] . '"';
		if (rights($shout[$i]) == 'admin') { echo ' style="color: #CC0000;" title="' . $shout[$i] . ' is an administrator."'; } elseif (rights($shout[$i]) == 'moderator') { echo ' style="color: #00CC00;" title="' . $shout[$i] . ' is a moderator."'; }
		echo '>' . $shout[$i] . '</a></b>';

		echo '<br />' . $shout[$i+2];
		
		if ($i > 0 && $max > 0) {
			$tmp = ($i/3) % 3;
			if ($tmp == 0) { echo '<hr size="1" color="#CCCCFF">'; }
			elseif ($tmp == 1) { echo '<hr size="1" color="#FFCCCC">'; }
			elseif ($tmp == 2) { echo '<hr size="1" color="#CCFFCC">'; }
		}
	}
	groupFoot($sideColor, "", "yes");
	
	echo '</td></tr></table>';
	
echo '</td>';
echo '</tr></table>';

echo '<p />&nbsp;<p />';
echo '<br /><center><i>Background image copyright &copy;2007 <a href="http://wvs.topleftpixel.com/">sam javanrouh</a></i></center>';
echo '<br /><center>If you would like to make a donation to help further the production of this site, please visit the ads at the top of the page.</center>';

include("tracker.php");
?>
</body>
</html>