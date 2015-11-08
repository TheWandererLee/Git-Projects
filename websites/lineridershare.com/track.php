<?php session_start(); include("functions.php"); $nl = "\r\n";

/*
if ($_REQUEST['mode'] == 'flash') {
	echo trackToFlash($_REQUEST['id']);
	exit();
}
*/

if ($_REQUEST['cache'] == 'clear') {
	if (file_exists("tracks/previews/small" . $_REQUEST['id'] . ".gif")) {
		unlink("tracks/previews/small" . $_REQUEST['id'] . ".gif");
	}
	if (file_exists("tracks/previews/big" . $_REQUEST['id'] . ".gif")) {
		unlink("tracks/previews/big" . $_REQUEST['id'] . ".gif");
	}
	header("Location: track.php?id=" . $_REQUEST['id']);
	exit;
}
if ($_REQUEST['download'] == 'true') {
	mergeTracks($_SESSION['user'], $_REQUEST['id'] . chr(9));
	
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="savedLines.sol"');
	header('Content-Transfer-Encoding: binary');
	header('Content-Length: ' . filesize("tracks/managers/" . $_SESSION['user'] . ".sol"));
	readfile("tracks/managers/" . $_SESSION['user'] . ".sol");
	exit;
}
if (is_numeric($_POST['deleteComment'])) {
	$contents = explode("\r\n", file_get_contents("tracks/comments/" . $_REQUEST['id'] . ".comments"));
	
	$num = (int)$_POST['deleteComment']-1+3;
	
	$new = array();
	$cInfo = 3;
	if (count($contents) <= $cInfo+1) {
		if (file_exists("tracks/comments/" . $_REQUEST['id'] . ".comments")) {
			unlink("tracks/comments/" . $_REQUEST['id'] . ".comments");
		}
	} else {
		for ($i=0; $i<count($contents)-1; $i+=$cInfo) {
			if ($i+3 != $num) {
				array_push($new, $contents[$i]);
				array_push($new, $contents[$i+1]);
				array_push($new, $contents[$i+2]);
			} else {
				if ($_SESSION['user'] != $contents[$i]) { //Keep those tracks anyway if the wrong user is deleting comments
					array_push($new, $contents[$i]);
					array_push($new, $contents[$i+1]);
					array_push($new, $contents[$i+2]);
				}
			}
		}
		
		$contents = implode("\r\n", $new);
		$contents .= "\r\n";
		$file = fopen("tracks/comments/" . $_REQUEST['id'] . ".comments", "w");
		fwrite($file, $contents);
		fclose($file);
	}
	
	header("Location: track.php?id=" . $_REQUEST['id']);
	exit;
}
if (is_numeric($_REQUEST['rating'])) {
	$rating = $_REQUEST['rating'];
	
	$rstring = explode(chr(0), getInfo($_REQUEST['id'], "rating"));
	$found = false;
	
	for ($i=0;$i<count($rstring);$i++) {
		$r = explode(chr(9), $rstring[$i]);
		if ($r[0] == $_SESSION['user']) {
			$r[1] = $_REQUEST['rating'];
			$rstring[$i] = implode(chr(9), $r);
			$found = true;
			break;
		}
	}
	
	if (!$found) {
		array_push($rstring, $_SESSION['user'] . chr(9) . $_REQUEST['rating']);
	}
	
	$rstring = implode(chr(0), $rstring);
	if (substr($rstring, 0, 1) == chr(0)) { $rstring = substr($rstring, 1); }
	
	setInfo($_REQUEST['id'], "rating", $rstring);
	
	header("Location: track.php?id=" . $_REQUEST['id']);
	exit;
}
if ($_POST['flag'] == 'yes') {
	if (empty($_POST['flagreason'])) { $_POST['flagreason'] == 'No Reason'; }
	$file = fopen("alerts.dat", "a");
	fwrite($file, $_REQUEST['id'] . chr(9) . $_SESSION['user'] . chr(9) . $_POST['flagreason'] . "\r\n");
	fclose($file);
}

if ($_POST['commenting'] == 'yes') {
	if (!empty($_REQUEST['comment'])) {
		$file = fopen("tracks/comments/" . $_REQUEST['id'] . ".comments", "a");
		
		$comment = $_REQUEST['comment'];
		
		$comment = str_replace('\\\\', '\\', $comment);
		$comment = str_replace("\\'", "'", $comment);
		$comment = str_replace('\\"', '"', $comment);
		
		$comment = htmlentities($comment);
		
		$comment = str_replace("\r\n", '<br />', $comment);
		$comment = str_replace('  ', '&nbsp;&nbsp;', $comment);
		$comment = str_ireplace('(c)', '&copy;', $comment);
		$comment = str_ireplace('(tm)', '&trade;', $comment);
		$comment = str_ireplace('(r)', '&reg;', $comment);

		fwrite($file, $_SESSION['user'] . "\r\n");
		fwrite($file, strval(time()+10800) . "\r\n");
		fwrite($file, $comment . "\r\n");
		fclose($file);
		
		header("Location: track.php?id=" . $_REQUEST['id']);
		exit;
	}
}

if (file_exists("tracks/" . $_REQUEST['id'] . ".track")) {
	if (!empty($_REQUEST['newName'])) {
		if ($_SESSION['user'] == getInfo($_REQUEST['id'], "author") || rights($_SESSION['user']) == 'admin' || rights($_SESSION['user']) == 'moderator') {
			$new = $_REQUEST['newName'];
			
			$new = str_replace('\\\\', '\\', $new);
			$new = str_replace("\\'", "'", $new);
			$new = str_replace('\\"', '"', $new);
			
			if (!rights($_SESSION['user']) == 'admin' && !rights($_SESSION['user']) == 'moderator') { $new = substr($new, 0, 24); }
			$new = htmlentities($new);
			
			$new = str_ireplace('(c)', '&copy;', $new);
			$new = str_ireplace('(tm)', '&trade;', $new);
			$new = str_ireplace('(r)', '&reg;', $new);
			
			setInfo($_REQUEST['id'], "label", $new);
		}
	}
	if (!empty($_REQUEST['newDescription'])) {
		if ($_SESSION['user'] == getInfo($_REQUEST['id'], "author") || rights($_SESSION['user']) == 'admin' || rights($_SESSION['user']) == 'moderator') {
			$new = $_REQUEST['newDescription'];
			
			$new = str_replace('\\\\', '\\', $new);
			$new = str_replace("\\'", "'", $new);
			$new = str_replace('\\"', '"', $new);
			
			$new = htmlentities($new);
			
			$new = str_replace("\r\n", '<br />', $new);
			$new = str_replace('  ', '&nbsp;&nbsp;', $new);
			$new = str_ireplace('(c)', '&copy;', $new);
			$new = str_ireplace('(tm)', '&trade;', $new);
			$new = str_ireplace('(r)', '&reg;', $new);
			
			setInfo($_REQUEST['id'], "description", $new);
		}
	}
}

if ($_REQUEST['makePrivate'] == 'yes' && $_SESSION['user'] == getInfo($_REQUEST['id'], "author")) {
	setInfo($_REQUEST['id'], 'private', 'yes');
}
if ($_REQUEST['makePublic'] == 'yes' && $_SESSION['user'] == getInfo($_REQUEST['id'], "author")) {
	setInfo($_REQUEST['id'], 'private', 'no');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Line Rider Share - Track <?php echo $_REQUEST['id']; ?></title>
<style>
body {
background-attachment: fixed;
background-repeat: repeat-x;
background-color: #DDDDDD;
background: url("<?php echo 'preview.php?id=' . $_REQUEST['id'] . '&start=no&h=576&bg=DDDDDD&fade=0.8'; ?>");
margin-top: 0px;
margin-bottom: 32px;
}
.editName {
background-color: #CCCCCC;
color: #000000;
font-size: 26px;
font-weight: bold;
}
.editDescription {
background-color: #CCCCCC;
color: #000000;
font-size: 10px;
font-family: Verdana, Arial, Helvetica, sans-serif;
}
h1 {
font-size: 24px;
}
h2 {
font-size: 20px;
}

a.nohover:hover {
text-decoration: none;
}

.comment {
font-size: 12px;
font-family: Verdana, Arial, Helvetica, sans-serif;
background: url("images/shadowc.png");
}
.comments {
font-size: 12px;
}
.addTrack {
font-size: 12px;
font-family: Verdana, Arial, Helvetica, sans-serif;
}
.trshown {
display: table-row;
}
.addComment {
color: #CCCCFF;
}
.addComment:hover {
color: #FFFFFF;
}
.rateit {
font-size: 12px;
font-family: Verdana, Arial, Helvetica, sans-serif;
}
</style>
<script type="text/javascript" language="javascript">
<!--
var pos = 0;
function editName() {
	document.getElementById('editName').className = 'shown';
	document.getElementById('name').className = 'hidden';
}
function editDescription() {
	document.getElementById('editDescription').className = 'shown';
	document.getElementById('description').className = 'hidden';
}
function moveBg() {
	document.body.style.backgroundPosition = pos+'px 0px';
	pos-=1;
	setTimeout("moveBg()", 50);
}
function checkAdd() {
	if (document.edit.comment.value == "") {
		document.getElementById('cantadd').className = 'shown';
		document.getElementById('canadd').className = 'hidden';
	} else {
		document.getElementById('canadd').className = 'shown';
		document.getElementById('cantadd').className = 'hidden';
	}
}
function rateIt() {
	document.getElementById('ratebutton').className = 'hidden';
	document.getElementById('rateline').className = 'trshown';
}
function startFlag() {
	document.getElementById('flagmessage').className = 'shown';
}
//-->
</script>
</head>
<body onload="<?php echo 'moveBg();'; /*if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== false) { echo ' moveBg();'; }*/ ?>">
&nbsp;<p />
<?php include("header.php"); ?>

<?php
	if (!file_exists("tracks/" . $_REQUEST['id'] . ".track")) {
		echo '<p />&nbsp;<p />&nbsp;<p />&nbsp;<p />&nbsp;<p />&nbsp;<p />&nbsp;<p />&nbsp;<p />&nbsp;<p />&nbsp;<p />&nbsp;<p /><h1 align="center" style="color: #FFFFFF; font-size: 16px; font-family: \'Lucida Calligraphy\';">Track ID \'' . $_REQUEST['id'] . '\' does not exist.</h1>';
		echo '</body></html>';
		exit();
	}
	
	echo '<table align="center" cellpadding="4" cellspacing="0" border="0" width="100%">';
	echo '<tr><td width="33%">';
	/****************GOOGLE BANNER******************/
	echo '
	<script type="text/javascript"><!--
google_ad_client = "pub-9055469377866352";
/* Track Page, Top Left Banner */
google_ad_slot = "7694393985";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
';
	/****************GOOGLE BANNER******************/
	//echo '</td><td align="center" width="34%" style="font-style: italic;">If you are seeing ads, sorry<br />These support the website\'s hardware costs<br />Thanks for your understanding</td><td width="33%" align="right">';
	echo '</td><td align="center" width="34%"></td><td width="33%" align="right">';
	/****************GOOGLE SEARCH BOX****************/
	echo '
<form action="http://www.lineridershare.com/tracks.php" id="cse-search-box">
  <div>
    <input type="hidden" name="cx" value="partner-pub-9055469377866352:liznby-6pxa" />
    <input type="hidden" name="cof" value="FORID:10" />
    <input type="hidden" name="ie" value="ISO-8859-1" />
    <input type="text" name="q" size="31" />
    <input type="submit" name="sa" value="Search" />
  </div>
</form>
<script type="text/javascript" src="http://www.google.com/cse/brand?form=cse-search-box&amp;lang=en"></script>
';
	/****************GOOGLE SEARCH BOX****************/
	echo '</td></tr>';
	echo '</table>';
	
	echo '<form name="edit" action="track.php?id=' . $_REQUEST['id'] . '" method="post">';
	echo '<input type="hidden" name="cache" value="no">';
	echo '<input type="hidden" name="commenting" value="no">';
	echo '<input type="hidden" name="deleteComment" value="">';
	echo '<input type="hidden" name="flag" value="">';
	echo '<table cellpadding="16" cellspacing="0" border="0" width="100%">';
	echo '<tr><td width="50%">';
	shadow();
	echo '<a href="preview.php?id=' . $_REQUEST['id'] . '" style="color: #000000;"><img src="preview.php?id=' . $_REQUEST['id'] . '&w=400&h=300" border="1"></a>';
	endShadow();
	echo '<br />';
	echo '<center><a href="asciirider.php?id=' . $_REQUEST['id'] . '" style="font-size: 12px; font-weight: bold;">Click here for an ASCII version of this track. (Experimental)</a></center>';
	echo '</td><td width="50%">';
	$label = getInfo($_REQUEST['id'], 'label');
	$author = getInfo($_REQUEST['id'], 'author');
	$description = getInfo($_REQUEST['id'], 'description');
	$editdescription = str_replace('<br />', "\r\n", $description);
	
	/******** PARSE LRS CODE ********/
	while (strpos(strtolower($description), '[youtube]') !== false && strpos(strtolower($description), '[/youtube]') !== false) {
		$ys = strpos(strtolower($description), '[youtube]') + 9;
		$ye = strpos(strtolower($description), '[/youtube]', $ys);
		$yid = substr($description, $ys, $ye - $ys);
		$description = str_ireplace('[youtube]' . $yid . '[/youtube]',
		'<object type="application/x-shockwave-flash" data="http://www.youtube.com/v/' . $yid . '" height="340" width="425">' . $nl
		. '<param name="movie" value="http://www.youtube.com/v/' . $yid . '">' . $nl
		. '<param name="wmode" value="transparent">' . $nl
		. '</object>',
		$description);
		//echo 'YNUM:' . $yid . ':YNUM';
	}
	while (strpos(strtolower($description), '[y]') !== false && strpos(strtolower($description), '[/y]') !== false) {
		$ys = strpos(strtolower($description), '[y]') + 3;
		$ye = strpos(strtolower($description), '[/y]', $ys);
		$yid = substr($description, $ys, $ye - $ys);
		$description = str_ireplace('[y]' . $yid . '[/y]',
		'<object type="application/x-shockwave-flash" data="http://www.youtube.com/v/' . $yid . '" height="340" width="425">' . $nl
		. '<param name="movie" value="http://www.youtube.com/v/' . $yid . '">' . $nl
		. '<param name="wmode" value="transparent">' . $nl
		. '</object>',
		$description);
		//echo 'YNUM:' . $yid . ':YNUM';
	}
	while (strpos(strtolower($description), '[yt]') !== false && strpos(strtolower($description), '[/yt]') !== false) {
		$ys = strpos(strtolower($description), '[yt]') + 4;
		$ye = strpos(strtolower($description), '[/yt]', $ys);
		$yid = substr($description, $ys, $ye - $ys);
		$description = str_ireplace('[yt]' . $yid . '[/yt]',
		'<object type="application/x-shockwave-flash" data="http://www.youtube.com/v/' . $yid . '" height="340" width="425">' . $nl
		. '<param name="movie" value="http://www.youtube.com/v/' . $yid . '">' . $nl
		. '<param name="wmode" value="transparent">' . $nl
		. '</object>',
		$description);
		//echo 'YNUM:' . $yid . ':YNUM';
	}
	while (strpos(strtolower($description), '[b]') !== false && strpos(strtolower($description), '[/b]') !== false) {
		$rs = strpos(strtolower($description), '[b]') + 3;
		$re = strpos(strtolower($description), '[/b]', $rs);
		$rep = substr($description, $rs, $re - $rs);
		$description = str_ireplace('[b]' . $rep . '[/b]',
		'<b>' . $rep . '</b>',
		$description);
		//echo 'YNUM:' . $yid . ':YNUM';
	}
	while (strpos(strtolower($description), '[u]') !== false && strpos(strtolower($description), '[/u]') !== false) {
		$rs = strpos(strtolower($description), '[u]') + 3;
		$re = strpos(strtolower($description), '[/u]', $rs);
		$rep = substr($description, $rs, $re - $rs);
		$description = str_ireplace('[u]' . $rep . '[/u]',
		'<u>' . $rep . '</u>',
		$description);
		//echo 'YNUM:' . $yid . ':YNUM';
	}
	while (strpos(strtolower($description), '[i]') !== false && strpos(strtolower($description), '[/i]') !== false) {
		$rs = strpos(strtolower($description), '[i]') + 3;
		$re = strpos(strtolower($description), '[/i]', $rs);
		$rep = substr($description, $rs, $re - $rs);
		$description = str_ireplace('[i]' . $rep . '[/i]',
		'<i>' . $rep . '</i>',
		$description);
		//echo 'YNUM:' . $yid . ':YNUM';
	}
	/******** END PARSE LRS CODE ********/
	
	/*
	
	youtube format
	<object type="application/x-shockwave-flash" data="http://www.youtube.com/v/aGLmGJVlu3g" height="340" width="425">
		<param name="movie" value="http://www.youtube.com/v/aGLmGJVlu3g">
		<param name="wmode" value="transparent">
	</object>
	
	*/
	
	if (substr($_REQUEST['id'], 0, 6) == 'trash/') {
		echo '<b style="font-size: 18px; color: #FF0000;">Pending Deletion</b><br />';
	}
	
	echo '<h1><div id="name" class="shown"><table cellpadding="0" cellspacing="0" border="0"><tr><td>' . $label;
	
	if (getInfo($_REQUEST['id'], 'private') == 'yes') {
		echo '</td><td width="4"></td><td><img src="images/lock.png" style="top: 8px;" title="This track is private.">';
	}
	
	echo '</td><td width="4"></td><td>';
		
	if ($_SESSION['user'] == $author || rights($_SESSION['user']) == 'admin' || rights($_SESSION['user']) == 'moderator') {
		echo ' <a href="#"><img src="images/edit.gif" border="0" onclick="editName()"></a></td></tr></table></div>';
		echo '<div id="editName" class="hidden"><input type="text" name="newName" value="' . $label . '" size="32" class="editName" maxlength="';
		if (rights($_SESSION['user']) == 'admin' || rights($_SESSION['user']) == 'moderator') { echo '32'; } else { echo '24'; }
		echo '"> <a href="#"><img src="images/check.gif" border="0" onclick="document.edit.submit();"></a></div>';
	} else {
		echo '</td></tr></table></div>';
	}
	echo '</h1><h2><a href="analyze.php?u=' . $author . '"';
	if (rights($author) == 'admin') { echo ' style="color: #CC0000;" title="' . $author . ' is an administrator."'; } elseif (rights($author) == 'moderator') { echo ' style="color: #00CC00;" title="' . $author . ' is a moderator."'; }
	echo '>' . $author . '</a></h2>';
	echo '<br /><div id="description" class="shown">' . $description;
	if ($_SESSION['user'] == $author || rights($_SESSION['user']) == 'admin' || rights($_SESSION['user']) == 'moderator') {
		echo ' <a href="#"><img src="images/edit.gif" border="0" onclick="editDescription()"></a></div>';
		echo '<div id="editDescription" class="hidden"><textarea name="newDescription" class="editDescription" cols="64" rows="10">' . $editdescription . '</textarea> <a href="#"><img src="images/check.gif" border="0" onclick="document.edit.submit();"></a></div>';
	}
	
	echo '<br />&nbsp;<br />&nbsp;<br />';
	
	if (isset($_SESSION['user'])) {
		if (checkUserInfo("viewed", $_REQUEST['id']) === false) {
			setInfo($_REQUEST['id'], "views", strval(intval(getInfo($_REQUEST['id'], "views"))+1));
			setUserInfo("viewed", $_REQUEST['id']);
		}
	}

	$rating = getInfo($_REQUEST['id'], "rating");
	if (empty($rating)) {
		echo '<table align="center" cellpadding="0" cellspacing="0"><tr><td style="font-weight: bold;">Track Rating:</td><td width="8"></td><td style="background: url(\'nostars.png\'); color: #FFFFFF;" width="86">Not Yet Rated</td></tr>';
		if ($_SESSION['user'] != $author && isset($_SESSION['user'])) {
			echo '<tr class="trshown" id="ratebutton"><td colspan="4" align="center"><input type="button" value="Rate It!" class="rateit" onclick="rateIt();"></td></tr>';
				echo '<tr class="hidden" id="rateline"><td colspan="4" align="center"><table cellpadding="0" cellspacing="0" border="0"><tr><td><select name="rating">';
				echo '<option>No Rating</option>';
				for ($i=1;$i<=5;$i++) {
					echo '<option value="' . $i . '">' . $i . ' Stars</option>';
				}
				echo '</select></td><td width="4"></td><td><a href="#"><img src="images/check.gif" border="0" onclick="document.edit.submit();"></a></td></tr></table></td></tr>';
		}
		echo '</table>';
		echo '<br />';
	} else {
		$result = mysql_query("SELECT * FROM tracks WHERE id=" . $_REQUEST['id']);
		$row = mysql_fetch_array($result);
		$ratedby = count(explode(chr(0), $row['rating']));
		$rnum = avgRating($row['rating']); // Real number/rating
		$num = ($rnum * 16) + 2; // Num should be a number between 0 and 80
		
		echo '<table align="center" cellpadding="0" cellspacing="0"><tr><td style="font-weight: bold;">Track Rating:</td><td width="8"></td><td width="' . $num . '" height="16" style="background: url(\'images/stars.png\') top left;" title="Rated by ' . $ratedby . ' users."></td><td width="' . (86-$num) . '" height="16" style="background: url(\'images/nostars.png\') top right;" title="Rated ' . $rnum . ' by ' . count($rating) . ' users."></td><td width="8"></td><td title="Rated ' . $rnum . ' by ' . count($rating) . ' users.">(' . round($rnum, 1) . ')</td></tr>';
		if ($_SESSION['user'] != $author && isset($_SESSION['user'])) {
			if ($found) {
				echo '<tr class="trshown" id="ratebutton"><td colspan="4" align="center"><input type="button" value="Rate It!" class="rateit" onclick="rateIt();"></td></tr>';
				echo '<tr class="hidden" id="rateline"><td colspan="4" align="center"><table cellpadding="0" cellspacing="0" border="0"><tr><td><select name="rating">';
				for ($i=1;$i<=5;$i++) {
					echo '<option value="' . $i . '"';
					if ($def == $i) { echo ' selected="yes"'; }
					echo '>' . $i . ' Stars</option>';
				}
				echo '</select></td><td width="4"></td><td><a href="#"><img src="images/check.gif" border="0" onclick="document.edit.submit();"></a></td></tr></table></td></tr>';
			} else {
				echo '<tr class="trshown" id="ratebutton"><td colspan="4" align="center"><input type="button" value="Rate It!" class="rateit" onclick="rateIt();"></td></tr>';
				echo '<tr class="hidden" id="rateline"><td colspan="4" align="center"><table cellpadding="0" cellspacing="0" border="0"><tr><td><select name="rating">';
				echo '<option>No Rating</option>';
				for ($i=1;$i<=5;$i++) {
					echo '<option value="' . $i . '">' . $i . ' Star'; if ($i>1) echo 's'; echo '</option>';
				}
				echo '</select></td><td width="4"></td><td><a href="#"><img src="images/check.gif" border="0" onclick="document.edit.submit();"></a></td></tr></table></td></tr>';
			}
		}
		echo '</table>';
		echo '<br />';
	}
	

	/*
	
	For use later, here is the code to add a youtube video:
	
	<object type="application/x-shockwave-flash" data="http://www.youtube.com/v/aGLmGJVlu3g" height="340" width="425">
		<param name="movie" value="http://www.youtube.com/v/aGLmGJVlu3g">
		<param name="wmode" value="transparent">
	</object>
	
	*/


	echo '<center>Views: ' . getInfo($_REQUEST['id'], "views") . ' | Downloads: ' . getInfo($_REQUEST['id'], "downloads") . '</center>';
	
	if (isset($_SESSION['user'])) {
		echo '<br />';
		if (!file_exists("alerts.dat")) { $file = fopen("alerts.dat", "w"); fclose($file); }
		$alerts = explode("\r\n", file_get_contents("alerts.dat"));
		$found = false;
		for ($i=0;$i<count($alerts);$i++) {
			$l = explode(chr(9), $alerts[$i]);
			if ($l[0] == $_REQUEST['id']) { $found = true; break; }
		}
		
		if ($found) {
			echo '<font color="#CC0000"><img src="images/flag.png" border="0"> This track is being reviewed by moderators.</font>';
		} else {
			echo '<a href="#" onclick="startFlag();" style="color: #0000CC" title="Flag this track for review by moderators."><img src="images/flag.png" border="0"> Flag this track.</a>';
			echo '<div id="flagmessage" class="hidden">Reason: <input type="text" name="flagreason" maxlength="32"> <a href="#"><img src="images/check.gif" border="0" onclick="document.edit.flag.value = \'yes\'; document.edit.submit();"></a></div>';
		}
	}
	
	echo '</td></tr>';
	
	if ($_SESSION['user'] == $author) {
		echo '<tr><td align="center" colspan="2">';
		$priv = getInfo($_REQUEST['id'], "private");
		if ($priv == "no") {
			echo '<form name="mp" action="track.php?id=' . $_REQUEST['id'] . '" method="post">';
			echo '<input type="hidden" name="makePrivate" value="no">';
			echo '<input type="submit" onclick="document.mp.makePrivate.value=\'yes\';" style="font-weight: bold;" value="Make Track Private" title="Click here to allow users only to preview this track, not download it.">';
			echo '</form>';
		} else {
			echo '<form name="mp" action="track.php?id=' . $_REQUEST['id'] . '" method="post">';
			echo '<input type="hidden" name="makePublic" value="no">';
			echo '<input type="submit" onclick="document.mp.makePublic.value=\'yes\';" style="font-weight: bold;" value="Make Track Public" title="Click here to allow users to preview and download this track.">';
			echo '</form>';
		}
		echo '</td></tr>';
	}
	
	if ($_REQUEST['add'] == true || inManager($_REQUEST['id'], $_SESSION['user'])) {
		addTracks($_SESSION['user'], $_REQUEST['id']);
		echo '<tr><td colspan="2" align="center"><b>This track is in <a href="manager.php">your manager</a></b></td></tr>';
	} else {
		if (getInfo($_REQUEST['id'], 'private') == 'yes') {
			echo '<tr><td colspan="2" align="center">This track is private, you cannot download it at this time.</td></tr>';
		} else {
			if (isset($_SESSION['user'])) {
				echo '<tr><td colspan="2" align="center"><input type="button" value="Add Track To Manager" onClick="document.addTrack.submit(); this.disabled=true;" class="addTrack"> <input type="button" value="Download Track as Single" onClick="document.downloadTrack.submit();" class="addTrack"></td></tr>';
			} else {
				echo '<tr><td colspan="2" align="center">You must be logged in to download tracks.</td></tr>';
			}
		}
	}

	/*
	echo '<tr><td colspan="2" align="center">';
	$title = '<table cellpadding="0" cellspacing="0" border="0" width="100%"><tr><td align="left">Comments</td></tr></table>';
	if (isset($_SESSION['user'])) { $title = '<table cellpadding="0" cellspacing="0" border="0" width="100%"><tr><td align="left">Comments</td><td align="right"><a href="#move" name="move" onclick="document.getElementById(\'add1\').className = \'trshown\'; document.getElementById(\'add2\').className = \'trshown\'; document.getElementById(\'add3\').className = \'trshown\'; document.getElementById(\'add4\').className = \'trshown\';" class="nohover"><b class="addComment"><font style="font-size: 14px;">+</font> Add Comment</b></a></td></tr></table>'; }
	groupHead($title, "", "", 800, "yes");
		echo '<table cellpadding="0" cellspacing="0" border="0" width="100%" class="comments">';
		echo '<tr><td colspan="2" align="right"></td></tr>';
		echo '<tr><td height="8"></td></tr>';
		echo '<tr id="add1" class="hidden"><td width="25%" valign="top"><b><a href="analyze.php">' . $_SESSION['user'] . '</a></b><br />';
		echo date('n/d/y') . ' (<span id="pendule"></span>)</td>';
		echo '<td valign="top">';
		echo '<table cellpadding="0" cellspacing="0" border="0"><tr><td>';
		shadow(); echo '<textarea cols="64" rows="6" class="comment" name="comment" onkeyup="checkAdd();" onmouseup="checkAdd();" onmouseout="checkAdd();"></textarea>'; endShadow();
		echo '</td>';
		echo '<td width="8"></td><td>';
		echo '<div id="canadd" class="hidden">'; shadow(); echo '<input type="image" src="images/check.gif" onclick="document.edit.commenting.value = \'yes\'; document.edit.submit();">'; endShadow(); echo '</div>';
		echo '<div id="cantadd" class="shown">'; shadow(); echo '<img src="images/nocheck.gif">'; endShadow(); echo '</div>';
		echo '<br />';
		shadow(); echo '<a href="#move"><img border="0" src="images/cancel.gif" onclick="document.getElementById(\'add1\').className = \'hidden\'; document.getElementById(\'add2\').className = \'hidden\'; document.getElementById(\'add3\').className = \'hidden\'; document.getElementById(\'add4\').className = \'hidden\';"></a>'; endShadow();
		echo '</td></tr></table>';
		echo '</td></tr>';
		echo '<tr class="hidden" id="add2"><td colspan="2" height="4"></td></tr>';
		echo '<tr class="hidden" id="add3"><td></td><td bgcolor="#EEEECC" height="1"></td></tr>';
		echo '<tr class="hidden" id="add4"><td colspan="2" height="12"></td></tr>';
		if (file_exists("tracks/comments/" . $_REQUEST['id'] . ".comments")) {
			$comments = explode("\r\n", file_get_contents("tracks/comments/" . $_REQUEST['id'] . ".comments"));
			$cInfo = 3;
			for ($i=count($comments)-$cInfo-1;$i>=0;$i-=$cInfo) {
				echo '<tr><td width="25%" valign="top"><b><a href="analyze.php?u=' . $comments[$i] . '"';
				if (rights($comments[$i]) == 'admin') { echo ' style="color: #CC0000;" title="' . $comments[$i] . ' is an administrator."'; } elseif (rights($comments[$i]) == 'moderator') { echo ' style="color: #00CC00;" title="' . $comments[$i] . ' is a moderator."'; }
				echo '>' . $comments[$i] . '</a></b><br />' . date("n/d/y (g:i:s A)", $comments[$i+1]) . '</td>';
				echo '<td valign="top">';
				if ($_SESSION['user'] == $comments[$i]) { echo '<input type="image" src="images/cancel.gif" title="Delete Comment" onclick="document.edit.deleteComment.value = \'' . strval($i+1) . '\'; document.edit.submit();"> '; }
				
				echo $comments[$i+2] . '</td></tr>';
				
				echo '<tr><td colspan="2" height="4"></td></tr>';
				$tmp = ($i/3) % 3;
				if ($tmp == 0) { echo '<tr><td></td><td bgcolor="#CCCCFF" height="1"></td></tr>'; }
				elseif ($tmp == 1) { echo '<tr><td></td><td bgcolor="#FFCCCC" height="1"></td></tr>'; }
				elseif ($tmp == 2) { echo '<tr><td></td><td bgcolor="#CCFFCC" height="1"></td></tr>'; }
				echo '<tr><td colspan="2" height="12"></td></tr>';
			}
		} else {
			echo '<tr><td align="center" colspan="2"><b>No comments have been made on this track yet. Be the first!</b></td></tr>';
		}
		echo '<tr><td colspan="2" height="8"></td></tr>';
		echo '</table>';
	groupFoot("", "", "yes");
	echo '</td></tr>';
	*/
		
	echo '</table>';
	echo '</form>';
	echo '<form name="addTrack" action="track.php?id=' . $_REQUEST['id'] . '" method="post"><input type="hidden" name="add" value="true"></form>';
	echo '<form name="downloadTrack" action="track.php?id=' . $_REQUEST['id'] . '" method="post"><input type="hidden" name="download" value="true"></form>';
?>
</td></tr>
</table>
<p />&nbsp;<p />&nbsp;<p />
<div align="center"><a href="javascript:document.edit.cache.value='clear'; document.edit.submit();" style="color: #FFFFFF;" title="Click here to clear the image cache if you think the track isn't displaying right.">Clear Cache</a></div>

<div align="center">
<script type="text/javascript"><!--
google_ad_client = "pub-9055469377866352";
/* Line Rider Share, Track Page, Bottom Leaderboard */
google_ad_slot = "6555083729";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>

<?php include("tracker.php"); ?>
</body>
</html>