<?php session_start(); include("functions.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Line Rider Share - Analyze</title>
</head>
<body onload="finished();">
<?php include("header.php"); ?>

<?php
$me = $_SESSION['user'];
$u = $_REQUEST['u'];
$id = $_REQUEST['id'];
$nl = "\r\n";

if (empty($u) && !empty($me)) { $u = $me; }

if (!empty($id)) {
	//Track analyzer
}
elseif (!empty($u)) {
	//User analyzer
	
	$error = false;
	
	$userColor = '';
	if (rights($u) == 'admin') { $userColor = 'AA0000'; } elseif (rights($u) == 'moderator') { $userColor = '00AA00'; } else { $userColor = '0000AA'; }
	
	echo '<table cellpadding="0" cellspacing="16" border="0" align="center"><tr><td valign="top" width="100%" align="center">';
	
	groupHead("<center>" . $u . "'s Manager</center>", $userColor, "", 320);
		echo '<table cellpadding="0" cellspacing="0" border="0" width="100%">';
		if (!file_exists("tracks/managers/" . $u . ".manager")) {
			echo '<tr><td>There are no tracks in this users manager.</td></tr>';
		} else {
				if (!file_exists("tracks/managers/" . $_SESSION['user'] . ".manager")) {
					echo '<tr><td>There are no tracks in this users manager.</td></tr>';
				} else {
					if (filesize("tracks/managers/" . $_SESSION['user'] . ".manager") == 0) {
						echo '<tr><td>There are no tracks in this users manager.</td></tr>';
					} else {
						$manager = explode("\r\n", file_get_contents("tracks/managers/" . $u . ".manager"));
						
						echo '<tr><td width="5%"><i>#</i></td><td align="right" width="8%"><b>ID</b></td><td width="2%"></td><td width="50%">Name</td><td width="35%">Author</td></tr>';
						for ($i=0;$i<count($manager)-1;$i++) {
							$author = getInfo($manager[$i], "author");
							echo '<tr><td><i>' . ($i+1) . '.</i></td><td align="right"><a href="track.php?id=' . $manager[$i] . '">' . $manager[$i] . '.</a></td><td></td><td><a href="track.php?id=' . $manager[$i] . '" style="font-weight: bold;">' . getInfo($manager[$i], "label") . '</a></td><td><a href="analyze.php?u=' . $author . '"';
							if (rights($author) == 'admin') { echo ' style="color: #CC0000;" title="' . $author . ' is an administrator."'; } elseif (rights($author) == 'moderator') { echo ' style="color: #00CC00;" title="' . $author . ' is a moderator."'; }
							echo '>' . $author . '</a></td></tr>';
						}
					}
				}
		}
		echo '<tr><td></td></tr>';
		echo '</table>';
	groupFoot($userColor);
	
	echo '</td></tr><tr><td align="center" align="center">';
	
	groupHead("<center>" . $u . "'s Tracks</center>", $userColor);
	
	$trackCount = 0; // # of track in the manager
	$trackSize = array(); // Track sizes
	$trackName = array(); // Track names
	$startLinex = array(); // Track start line x
	$startLiney = array(); // Track stary line y
	$normLines = array(); // Track # of normal lines
	$accelLines = array(); // Track # of accelerating lines
	$backLines = array(); // Track # of background lines
	$flippedLines = array(); // Track flipped lines
	$erasedLines = array(); // Track erased lines
	$totalLines = array(); // Track line count (includes erased)
	$lineCount = array(); // Track line count (does not include erased)
	$views = array(); // Number of views for this track
	$downloads = array(); // Number of downloads for this track
	
	$myTracks = array();
	$tmp2 = 0;
	for ($i=0;$i>-1;$i++) {
		if ($tmp >= 1000) { break; }
		
		if (file_exists("tracks/" . $i . ".track")) {
			if (getInfo($i, "author") == $u) {
				array_push($myTracks, $i);
			}
		} else {
			$tmp++;
		}
	}
	
	$trackCount = count($myTracks);
	echo '<center>';
	echo 'Track Count: ' . $trackCount . '<br />';
	echo '<span id="totalviews"></span><br />';
	echo '<span id="totaldownloads"></span><br />';
	echo '</center>';
	echo '&nbsp;<br />';
	
	echo '<table cellpadding="0" cellspacing="0" border="0"><tr>';
	for ($i=0;$i<$trackCount;$i++) {
		echo '<td>';
		$track = $myTracks[$i];
		$filename = "tracks/" . $track . ".track";
		
		$file = fopen($filename, "r");
		
		$startLine = false;
		$foundErased = false;
		
		$lowx = 1000000; $lowy = 1000000; $highx = -1000000; $highy = -1000000;
		
		while (ftell($file) < filesize($filename) - 6) {
			$skipIt = false;
			$length = readShort($file);
			if ($length == 0) {
				if (readByte($file) == 9) { //End Array/Object
					if ($startLine == true) { $startLine = false; }
					$skipIt = true;
				} else {
					skip($file, -1); //Invalid item of length 0
					$skipIt = true;
				}
			}
			
			if ($skipIt == false) {
				$name = readString($file, $length);
				$type = readByte($file);
				
				if ($type == 0) { //Double
					$value = readDouble($file);
					
					if ($startLine == true) {
						if ($name == "0") { $startLinex[$track] = $value; }
						if ($name == "1") { $startLiney[$track] = $value; }
					} else {
						if ($name == "0" || $name == "2") {
							if ($value < $lowx) { $lowx = $value; }
							if ($value > $highx) { $highx = $value; }
						}
						if ($name == "1" || $name == "3") {
							if ($value < $lowy) { $lowy = $value; }
							if ($value > $highy) { $highy = $value; }
						}
						if ($name == "5") {
							if ($value == 1) { $flippedLines[$track]++; }
						}
						if ($name == "8") {
							if ($foundErased == false) {
								$totalLines[$track] = $value+1;
								$foundErased = true;
							}
						}
						if ($name == "9") {
							if ($value == 0) { $normLines[$track]++; }
							if ($value == 1) { $accelLines[$track]++; }
							if ($value == 2) { $backLines[$track]++; }
						}
					}
				}
				if ($type == 1) { //Boolean (Show)
					skip($file, 1);
				}
				if ($type == 2) { //String
					$strlength = readShort($file);
					$value = readString($file, $strlength);
					
					$trackLengthOff[$currentTrack] = ftell($file) - $trackStartOff[$currentTrack] + 3;
					if ($name == 'label') { $trackName[$track] = $value; break; }
				}
				if ($type == 3) { //Object
					$currentTrack = (int)$name;
					$trackStartOff[$currentTrack] = ftell($file);
				}
				// Type 6: Undefined: Do Nothing
				if ($type == 8) { //Array
					if ($name == "startLine") { $startLine = true; }
					$value = readLong($file);
				}
			}
			
		} // End While
		
		$lineCount[$track] = $normLines[$track] + $accelLines[$track] + $backLines[$track];
		$erasedLines[$track] = $totalLines[$track] - $lineCount[$track];
		$views[$track] = getInfo($track, "views");
		$downloads[$track] = getInfo($track, "downloads");
		echo '<a href="track.php?id=' . $track . '">Track ID ' . $track . ': ' . $trackName[$track] . '</a><br />';
		echo 'Views: ' . getInfo($track, "views") . ' | Downloads: ' . getInfo($track, "downloads") . '<br />';
		echo 'Start Line: (' . (int)$startLinex[$track] . 'x, ' . (int)$startLiney[$track] . 'y)<br />';
		echo 'Track Dimensions: (' . round($highx-$lowx) . ' x ' . round($highy-$lowy) . ')<br />';
		echo 'Flipped Lines: ' . (int)$flippedLines[$track] . '<br />';
		if ($totalLines[$track] > 0) {
		echo 'Accuracy: <a href="#" title="Total Lines: ' . $totalLines[$track] . ', Erased Lines: ' . $erasedLines[$track] . ', Remaining Lines: ' . $lineCount[$track] . '">' . round(100 * (1 - ($erasedLines[$track] / $totalLines[$track])), 2) . '%</a><br />';
		} else {
			echo 'Accuracy: <a href="#" title="Accuracy cannot be calculated on an empty track.">0%</a><br />';
		}
		echo 'Total Lines: ' . $lineCount[$track] . '<br />';
		$t1 = (int)$normLines[$track];
		$t2 = (int)$accelLines[$track];
		$t3 = (int)$backLines[$track];
		echo 'Normal: ' . $t1 . ' | Accel: ' . $t2 . ' | Back: ' . $t3 . '<br />';
		/*
		if ($t1+$t2+$t3 > 0) {
			echo '<table cellpadding="0" cellspacing="0" border="0" width="200"><tr><td style="background-color: #3333FF;" width="' . ($t1/($t1+$t2+$t3)*100) . '%"></td><td style="background-color: #FF3333;" width="' . ($t2/($t1+$t2+$t3)*100) . '%"></td><td style="background-color: #33FF33;" width="' . ($t3/($t1+$t2+$t3)*100) . '%"></td><td>&nbsp;</td></tr></table>';
		}
		*/
		
		if ($t1+$t2+$t3 > 0) {
			echo '<br /><b>Line Distribution</b><br />';
			include_once("charts/charts.php");
			echo InsertChart("charts/charts.swf", "charts/charts_library", "charts/lineratio.php?n=".$t1."&a=".$t2."&b=".$t3, 300, 220, "ffffff");
		}
		
		echo '</td>';
		if (($i+1)/3 == round(($i+1)/3)) { echo '</tr><tr>'; }
	} // End For
	echo '</tr></table>';
	
	echo $nl . '<script type="text/javascript" language="javascript1.1">' . $nl;
	echo '<!--' . $nl;
	echo 'function finished() {' . $nl;
	echo 'document.getElementById("totalviews").innerHTML = \'Total Views: ' . array_sum($views) . '\';' . $nl;
	echo 'document.getElementById("totaldownloads").innerHTML = \'Total Downloads: ' . array_sum($downloads) . '\';' . $nl;
	echo '}' . $nl;
	echo '//-->' . $nl;
	echo '</script>' . $nl;
	
	if (count($myTracks) == 0) {
		echo 'This user hasn\'t uploaded any tracks yet.';
	}
	
	groupFoot($userColor);
	
	echo '</td></tr></table>';
}/*
elseif (!empty($me)) {
	$error = false;
	
	groupHead("<center>User Analyzer</center>");
	
	$trackCount = 0; // # of track in the manager
	$trackSize = array(); // Track sizes
	$trackName = array(); // Track names
	$startLinex = array(); // Track start line x
	$startLiney = array(); // Track stary line y
	$normLines = array(); // Track # of normal lines
	$accelLines = array(); // Track # of accelerating lines
	$backLines = array(); // Track # of background lines
	$flippedLines = array(); // Track flipped lines
	$erasedLines = array(); // Track erased lines
	$totalLines = array(); // Track line count (includes erased)
	$lineCount = array(); // Track line count (does not include erased)
	$views = array(); // Number of views for this track
	$downloads = array(); // Number of downloads for this track
	
	$myTracks = array();
	$tmp2 = 0;
	for ($i=0;$i>-1;$i++) {
		if ($tmp >= 1000) { break; }
		
		if (file_exists("tracks/" . $i . ".track")) {
			if (getInfo($i, "author") == $me) {
				array_push($myTracks, $i);
			}
		} else {
			$tmp++;
		}
	}
	
	$trackCount = count($myTracks);
	echo 'Track Count: ' . $trackCount . '<br />';
	echo '<span id="totalviews"></span><br />';
	echo '<span id="totaldownloads"></span><br />';
	echo '&nbsp;<br />';
	for ($i=0;$i<$trackCount;$i++) {
		$track = $myTracks[$i];
		$filename = "tracks/" . $track . ".track";
		
		$file = fopen($filename, "r");
		
		$startLine = false;
		$foundErased = false;
		
		while (ftell($file) < filesize($filename) - 6) {
			$skipIt = false;
			$length = readShort($file);
			if ($length == 0) {
				if (readByte($file) == 9) { //End Array/Object
					if ($startLine == true) { $startLine = false; }
					$skipIt = true;
				} else {
					skip($file, -1); //Invalid item of length 0
					$skipIt = true;
				}
			}
			
			if ($skipIt == false) {
				$name = readString($file, $length);
				$type = readByte($file);
				
				if ($type == 0) { //Double
					$value = readDouble($file);
					
					if ($startLine == true) {
						if ($name == "0") { $startLinex[$track] = $value; }
						if ($name == "1") { $startLiney[$track] = $value; }
					} else {
						if ($name == "5") {
							if ($value == 1) { $flippedLines[$track]++; }
						}
						if ($name == "8") {
							if ($foundErased == false) {
								$totalLines[$track] = $value+1;
								$foundErased = true;
							}
						}
						if ($name == "9") {
							if ($value == 0) { $normLines[$track]++; }
							if ($value == 1) { $accelLines[$track]++; }
							if ($value == 2) { $backLines[$track]++; }
						}
					}
				}
				if ($type == 1) { //Boolean (Show)
					skip($file, 1);
				}
				if ($type == 2) { //String
					$strlength = readShort($file);
					$value = readString($file, $strlength);
					
					$trackLengthOff[$currentTrack] = ftell($file) - $trackStartOff[$currentTrack] + 3;
					if ($name == 'label') { $trackName[$track] = $value; break; }
				}
				if ($type == 3) { //Object
					$currentTrack = (int)$name;
					$trackStartOff[$currentTrack] = ftell($file);
				}
				// Type 6: Undefined: Do Nothing
				if ($type == 8) { //Array
					if ($name == "startLine") { $startLine = true; }
					$value = readLong($file);
				}
			}
			
		} // End While
		
		$lineCount[$track] = $normLines[$track] + $accelLines[$track] + $backLines[$track];
		$erasedLines[$track] = $totalLines[$track] - $lineCount[$track];
		$views[$track] = getInfo($track, "views");
		$downloads[$track] = getInfo($track, "downloads");
		echo '<a href="track.php?id=' . $track . '">Track ID ' . $track . ': ' . $trackName[$track] . '</a><br />';
		echo 'Views: ' . getInfo($track, "views") . ' | Downloads: ' . getInfo($track, "downloads") . '<br />';
		echo 'Start Line: (' . (int)$startLinex[$track] . 'x, ' . (int)$startLiney[$track] . 'y)<br />';
		echo 'Flipped Lines: ' . (int)$flippedLines[$track] . '<br />';
		if ($totalLines[$track] > 0) {
		echo 'Accuracy: <a href="#" title="Total Lines: ' . $totalLines[$track] . ', Erased Lines: ' . $erasedLines[$track] . ', Remaining Lines: ' . $lineCount[$track] . '">' . round(100 * (1 - ($erasedLines[$track] / $totalLines[$track])), 2) . '%</a><br />';
		} else {
			echo 'Accuracy: <a href="#" title="Accuracy cannot be calculated on an empty track.">0%</a><br />';
		}
		echo 'Total Lines: ' . $lineCount[$track] . '<br />';
		$t1 = (int)$normLines[$track];
		$t2 = (int)$accelLines[$track];
		$t3 = (int)$backLines[$track];
		echo 'Normal: ' . $t1 . ' | Accel: ' . $t2 . ' | Back: ' . $t3 . '<br />';
		if ($t1+$t2+$t3 > 0) {
			echo '<table cellpadding="0" cellspacing="0" border="0" width="200"><tr><td style="background-color: #3333FF;" width="' . ($t1/($t1+$t2+$t3)*100) . '%"></td><td style="background-color: #FF3333;" width="' . ($t2/($t1+$t2+$t3)*100) . '%"></td><td style="background-color: #33FF33;" width="' . ($t3/($t1+$t2+$t3)*100) . '%"></td><td>&nbsp;</td></tr></table>';
		}
		if ($_SESSION['user'] == 'TheWandererLee') {
			echo '<br />Chart o flash';
			echo '<br />';
			include_once("charts/charts.php");
			echo InsertChart("charts/charts.swf", "charts/charts_library", "lineratio.php?n=".$t1."&a=".$t2."&b=".$t3, 300, 200, "#6666AA");
		}
		echo '&nbsp;<br />';
	} // End For
	
	echo $nl . '<script type="text/javascript" language="javascript1.1">' . $nl;
	echo '<!--' . $nl;
	echo 'function finished() {' . $nl;
	echo 'document.getElementById("totalviews").innerHTML = \'Total Views: ' . array_sum($views) . '\';' . $nl;
	echo 'document.getElementById("totaldownloads").innerHTML = \'Total Downloads: ' . array_sum($downloads) . '\';' . $nl;
	echo '}' . $nl;
	echo '//-->' . $nl;
	echo '</script>' . $nl;
	
	if (count($myTracks) == 0) {
		echo 'This user hasn\'t uploaded any tracks yet.';
	}
	
	groupFoot();
}*/
else {
	echo '<p />&nbsp;<p />&nbsp;<p />';
	groupHead("<center>Track Manager</center>", "993333");
	echo 'You must be logged in to analyze your tracks.';
	groupFoot("993333");
}
?>

<?php include("tracker.php"); ?>
</body>
</html>