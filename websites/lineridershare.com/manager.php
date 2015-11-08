<?php session_start(); include("functions.php");

	if ($_REQUEST['addYours'] == true) {
		$x = 0;
		for ($i=0;$i>-1;$i++) {
			if (!file_exists("tracks/" . $i . ".track")) { $x++; } else {
				if (getInfo($i, "author") == $_SESSION['user']) {
					addTracks($_SESSION['user'], $i);
				}
			}
			if ($x > 1000) { break; }
		}
	}

	if ($_REQUEST['downloadTracks'] == true) {
		$file = fopen("tracks/managers/" . $_SESSION['user'] . ".manager", "r");
		$ids = fread($file, filesize("tracks/managers/" . $_SESSION['user'] . ".manager"));
		fclose($file);
		$ids = explode("\r\n", $ids);
		foreach ($ids as $id) {
			if (!empty($id)) {
				if (checkUserInfo("downloaded", $id) == false) {
					setUserInfo("downloaded", $id);
					setInfo($id, "downloads", strval(intval(getInfo($id, "downloads"))+1));
				}
			}
		}
		$ids = implode(chr(9), $ids);
		mergeTracks($_SESSION['user'], $ids);
		
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="savedLines.sol"');
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: ' . filesize("tracks/managers/" . $_SESSION['user'] . ".sol"));
		readfile("tracks/managers/" . $_SESSION['user'] . ".sol");
		exit;
	}
	
	if ($_REQUEST['rename'] == 'yes') {
		$newmanager = '';
		$file = fopen("tracks/managers/" . $_SESSION['user'] . ".manager", "r");
		$tracks = fread($file, filesize("tracks/managers/" . $_SESSION['user'] . ".manager"));
		fclose($file);
		$tracks = explode("\r\n", $tracks);
		for ($i=0;$i<count($tracks)-1;$i++) {
			setInfo($tracks[$i], "label", $_REQUEST['rename'.$tracks[$i]]);
		}
	}
	
	if ($_REQUEST['purge'] == true) { //Purge missing tracks
		$newmanager = '';
		$file = fopen("tracks/managers/" . $_SESSION['user'] . ".manager", "r");
		$tracks = fread($file, filesize("tracks/managers/" . $_SESSION['user'] . ".manager"));
		fclose($file);
		$tracks = explode("\r\n", $tracks);
		for ($i=0;$i<count($tracks)-1;$i++) {
			if (file_exists("tracks/" . $tracks[$i] . ".track")) { $newmanager .= $tracks[$i] . "\r\n"; }
		}
		
		$file = fopen("tracks/managers/" . $_SESSION['user'] . ".manager", "w");
		fwrite($file, $newmanager);
		fclose($file);
		
		header("Location:manager.php");
		exit;
	}
	elseif (isset($_REQUEST['d'])) { //Delete (Remove)
		$newmanager = '';
		$file = fopen("tracks/managers/" . $_SESSION['user'] . ".manager", "r");
		$tracks = fread($file, filesize("tracks/managers/" . $_SESSION['user'] . ".manager"));
		fclose($file);
		$tracks = explode("\r\n", $tracks);
		for ($i=0;$i<count($tracks)-1;$i++) {
			if ($tracks[$i] != $_REQUEST['d']) { $newmanager .= $tracks[$i] . "\r\n"; $auth = getInfo($tracks[$i], "author"); }
		}
		
		$file = fopen("tracks/managers/" . $_SESSION['user'] . ".manager", "w");
		fwrite($file, $newmanager);
		fclose($file);
		
		if ($_REQUEST['p'] == true) { //Permanent delete
			unlink("tracks/" . $_REQUEST['d'] . ".track");
			if (file_exists("tracks/previews/small" . $_REQUEST['d'] . ".gif")) { unlink("tracks/previews/small" . $_REQUEST['d'] . ".gif"); }
			if (file_exists("tracks/previews/big" . $_REQUEST['d'] . ".gif")) { unlink("tracks/previews/big" . $_REQUEST['d'] . ".gif"); }
			if (file_exists("tracks/comments/" . $_REQUEST['d'] . ".comments")) { unlink("tracks/comments/" . $_REQUEST['d'] . ".comments"); }
			mysql_query("DELETE FROM tracks WHERE id=".$_REQUEST['d']);
		}
		
		header("Location:manager.php");
		exit;
	}
	elseif ($_REQUEST['maincheck'] == "yes") {
		$newmanager = '';
		$file = fopen("tracks/managers/" . $_SESSION['user'] . ".manager", "r");
		$tracks = fread($file, filesize("tracks/managers/" . $_SESSION['user'] . ".manager"));
		fclose($file);
		$tracks = explode("\r\n", $tracks);
		for ($i=0;$i<count($tracks)-1;$i++) {
			if (isset($_REQUEST['mass'.$i]) != true) {
				$newmanager .= $tracks[$i] . "\r\n";
			}
		}
		
		$file = fopen("tracks/managers/" . $_SESSION['user'] . ".manager", "w");
		fwrite($file, $newmanager);
		fclose($file);
		
		if ($_REQUEST['p'] == true) {
			for ($i=0;$i<count($tracks)-1;$i++) {
				if (isset($_REQUEST['mass'.$i]) == true) {
					if (getInfo($tracks[$i], "author") == $_SESSION['user']) {
						unlink("tracks/" . $tracks[$i] . ".track");
						if (file_exists("tracks/previews/small" . $_REQUEST['d'] . ".gif")) { unlink("tracks/previews/small" . $_REQUEST['d'] . ".gif"); }
						if (file_exists("tracks/previews/big" . $_REQUEST['d'] . ".gif")) { unlink("tracks/previews/big" . $_REQUEST['d'] . ".gif"); }
						if (file_exists("tracks/comments/" . $_REQUEST['d'] . ".comments")) { unlink("tracks/comments/" . $_REQUEST['d'] . ".comments"); }
						mysql_query("DELETE FROM tracks WHERE id=".$tracks[$i]);
					}
				}
			}
		}
		
		header("Location:manager.php");
		exit;
	}
	
	// Weird glitch is making the script create duplicate ids. This will
	// purge duplicate entries every time.
	
	$newmanager = '';
	if (file_exists("tracks/managers/" . $_SESSION['user'] . ".manager") && filesize("tracks/managers/" . $_SESSION['user'] . ".manager") > 0) {
		$file = fopen("tracks/managers/" . $_SESSION['user'] . ".manager", "r");
		$tracks = fread($file, filesize("tracks/managers/" . $_SESSION['user'] . ".manager"));
		fclose($file);
		$tracks = explode("\r\n", $tracks);
		for ($i=0;$i<count($tracks)-1;$i++) {
			if (!in_array($tracks[$i], array_slice($tracks, 0, $i))) { $newmanager .= $tracks[$i] . "\r\n"; } //Remove tracks whose ID has already been read
		}
		
		$file = fopen("tracks/managers/" . $_SESSION['user'] . ".manager", "w");
		fwrite($file, $newmanager);
		fclose($file);
	}
	
	//Uploading tracks
	if (isset($_REQUEST['check']) && $error == '') {
		$saveTo = "tracks/managers/" . $_SESSION['user'] . "tmp.sol";
			
		if(move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $saveTo)) {
			$trackInfo = explode(chr(0), splitTracks($saveTo));
			unlink($saveTo);
			addTracks($_SESSION['user'], $trackInfo[0]);
		} else {
			$error = "Error uploading your tracks";
		}
	}
?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Line Rider Share - Manager</title>
<script language="javascript1.2">
<!--
function removeTrack(id, name) {
	var answer = confirm("Are you sure you want to remove " + name + " from your manager?");
	if (answer) {
		window.location = "manager.php?d=" + id;
	}
}
function deleteTrack(id, name) {
	var answer = confirm("Are you sure you want to permanently delete " + name + " from the server?");
	if (answer) {
		window.location = "manager.php?d=" + id + "&p=true";
	}
}
function startRename(id) {
	if (document.getElementById('trackName'+id).className == 'shown') {
		document.getElementById('trackName'+id).className = 'hidden';
		document.getElementById('trackRename'+id).className = 'shown';
		document.getElementById('rename'+id).focus();
	}
}
function selectall() {
	document.getElementById('0').checked = document.getElementById('allboxes').checked;
	for (var i = 0; i < <?php echo substr_count(file_get_contents("tracks/managers/" . $_SESSION['user'] . ".manager"), "\r\n"); ?>; i++) {
		document.getElementById(i+'').checked = document.getElementById('allboxes').checked;
	}
}
-->
</script>








<style type="text/css">
body {
text-align: center;
}
td.title {
background-color: #DDDDDD;
}
td.offcheck {
background-color: #CCCCCC;
}
td.check {
background-color: #FFAAAA;
}
td.offauthor {
background-color: #CCCCCC;
font-size: 10px;
}
td.author {
background-color: #AAFFFF;
cursor: default;
}
td.offname {
background-color: #CCCCCC;
font-size: 12px;
}
td.name {
background-color: #AAFFAA;
font-size: 12px;
}
td.offnamemissing {
background-color: #CCCCCC;
font-size: 12px;
}
td.namemissing {
background-color: #FFAAAA;
font-size: 12px;
font-weight: bold;
}
td.offnameduplicate {
background-color: #CCCCCC;
font-size: 12px;
}
td.nameduplicate {
background-color: #FFFFAA;
font-size: 12px;
font-weight: bold;
}
td.offnamereplica {
background-color: #FFCCCC;
font-size: 12px;
}
td.namereplica {
background-color: #FFCCCC;
font-size: 12px;
font-weight: bold;
}
td.offother {
background-color: #CCCCCC;
font-size: 10px;
}
td.other {
background-color: #CCCCCC;
font-size: 10px;
}
textarea {
font-family: Verdana, Arial, Helvetica, sans-serif;
font-size: 11px;
}
.hidden {
display: none;
}
.tdshown {
display: table-cell;
background-color: #CCCCCC;
font-size: 12px;
}
.shown {
display: block;
}
input.normal {
font-size: 11px;
}
input.normalbold {
font-size: 11px;
font-weight: bold;
}
input.default {
font-family: Verdana, Arial, Helvetica, sans-serif;
font-size: 12px;
font-weight: bold;
}
</style>
</head>










<body>
<?php include("header.php"); ?>
<br />&nbsp;<br />&nbsp;<br />
<?php
	$nl = "\r\n";
	
	if (isset($_SESSION['user'])) {
		if (file_exists("tracks/managers/" . $_SESSION['user'] . ".manager") == false) {
			$file = fopen("tracks/managers/" . $_SESSION['user'] . ".manager", "w");
			fclose($file);
		}
	
		if (filesize("tracks/managers/" . $_SESSION['user'] . ".manager") == 0) {
			groupHead("<center>Track Manager</center>", "993333", "FFFFFF", 600);
			echo '<table cellpadding="0" cellspacing="0" border="0">' . $nl;
			echo '<tr><td align="center">Your track manager is empty. Upload your own tracks or add someone elses track to your manager.</td></tr>' . $nl;
			echo '</table>' . $nl;
			groupFoot("993333");
		} else {
			$tracks = file_get_contents("tracks/managers/" . $_SESSION['user'] . ".manager");
			$tracks = explode("\r\n", $tracks);
			
			$missingTracks = false;
			$duplicateTracks = false;
			
			echo '<center><table align="center" cellspacing="0" cellpadding="0" border="0" id="loader" class="shown">' . $nl;
			echo '<tr><td height="160">&nbsp;</td></tr><tr><td align="center">' . $nl;
			groupHead("<center>Loading Track Manager...</center>");
			echo '<center>Please wait... Loading your track manager.<br />&nbsp;<br /><img src="images/loading.gif"></center>' . $nl;
			groupFoot();
			echo '</td></tr>' . $nl;
			echo '</table></center>' . $nl;
			echo '<form name="changes" action="manager.php" method="post" class="hidden" id="mainTable">' . $nl;
			echo '<input type="hidden" name="rename" value="no">';
			
			groupHead("<center>Track Manager (" . strval(count($tracks)-1) . " tracks)</center>", "243454", "FFFFFF", 600);



			echo '<table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#000000"><tr><td>' . $nl; //  1
				echo '<table cellpadding="0" cellspacing="1" border="0" width="100%"><tr><td>' . $nl; //  2
					echo '<table cellpadding="0" cellspacing="0" border="0" width="100%">' . $nl; //  3
						echo '<tr><td align="center" class="title"><input type="checkbox" onclick="selectall();" id="allboxes"></td><td align="center" class="title">Name</td><td align="center" class="title">Author</td><td align="center" class="title">Options</td></tr>' . $nl;
						for ($i=0;$i<count($tracks)-1;$i++) {
							$info[0] = $tracks[$i];
							$info[1] = getInfo($info[0], "label");
							$info[2] = getInfo($info[0], "author");
							$info[3] = getInfo($info[0], "description");
							echo '<tr>' . $nl;
							echo '<td width="5%" align="center" valign="middle" class="offcheck" style="cursor:hand;" onMouseOver="this.className=\'check\'" onMouseOut="this.className=\'offcheck\'" onClick="getElementById(\'' . $i . '\').checked = !getElementById(\'' . $i . '\').checked"><input type="checkbox" name="mass' . $i . '" value="' . $info[0] . '" id="' . $i . '" onClick="getElementById(\'' . $i . '\').checked = !getElementById(\'' . $i . '\').checked"></td>' . $nl;
							
							echo '<td width="55%" height="24" valign="middle"';

							if (file_exists("tracks/" . $info[0] . ".track") == false) { //Check if track is missing
								echo 'style="cursor:default" id="name' . $info[0] . '" class="offnamemissing" onMouseOver="this.className=\'namemissing\'" onMouseOut="this.className=\'offnamemissing\'"><div id="trackName' . $info[0] . '" class="shown">&nbsp;<font style="text-decoration: line-through">' . $info[1] . '</font> <i style="font-size: 10px">Track ' . $info[0] . ' does not exist</i></div>' . $nl;
								$missingTracks = true;
							} elseif (in_array($info[0], array_slice($tracks, 0, $i))) { //Check if track is a duplicate
								echo 'style="cursor:hand" id="name' . $info[0] . '" class="offnameduplicate" onMouseOver="this.className=\'nameduplicate\'" onMouseOut="this.className=\'offnameduplicate\'"><div id="trackName' . $info[0] . '" class="shown">&nbsp;<a href="track.php?id=' . $info[0] . '" style="text-decoration: underline overline">' . $info[1] . '</a> <i style="font-size: 10px">This track is listed more than once</i></div>' . $nl;
								$duplicateTracks = true;
							} else {
								echo 'style="cursor:hand" id="name' . $info[0] . '" class="offname" onMouseOver="this.className=\'name\'" onMouseOut="this.className=\'offname\'"><div id="trackName' . $info[0] . '" class="shown">';
								if ($info[2] == $_SESSION['user']) { echo '&nbsp;<a href="#"><img src="images/edit.gif" border="0" onclick="startRename(' . $info[0] . ');"></a>'; }
								echo '&nbsp;<a href="track.php?id=' . $info[0] . '">' . $info[1] . '</a></div>' . $nl;
							}
							
							echo '<div id="trackRename' . $info[0] . '" class="hidden">&nbsp;<a href="#"><img src="images/check.gif" border="0" style="margin-top: 2px;" onclick="document.changes.rename.value=\'yes\'; document.changes.submit();"></a> <input type="text" name="rename' . $info[0] . '" value="' . $info[1] . '" class="default" size="32" maxlength="24"></div>';
							
							/* echo '<span id="editor' . $info[0] . '" class="hidden">';
								echo '<form name="editor" action="manager.php" method="post">' . "\r\n" . $nl;
								echo '<input type="hidden" name="editid" value="' . $info[0] . '">';
								echo '<input type="text" name="trackName" value="' . $info[1] . '" size="20">&nbsp;&nbsp;<input type="submit" value="Save"><input type="button" onClick="advanced(' . $info[0] . ')" value="Advanced »">' . $nl;
								echo '<br /><textarea name="trackDescription" rows="2" cols="45">' . $info[3] . '</textarea>' . $nl;
								echo '<br /><table cellpadding="0" cellspacing="0" border="0" align="center"><tr><td>' . getInfo($info[0], "views") . ' views</td><td width="8"></td><td>' . getInfo($info[0], "downloads") . ' downloads</td></tr>' . $nl;
								echo '<tr><td><input type="checkbox" name="resetViews" value="reset"> Reset</td><td width="8"></td><td><input type="checkbox" name="resetDownloads" value="reset"> Reset</td></tr></table>' . $nl;
								echo '</form>';
							echo '</span>';
							*/
							
							/*
							$pInfo = explode(chr(0), getInfo($_POST['editid'], "preview"));
							$sInfo = explode(chr(0), getInfo($_POST['editid'], "smallpreview"));
							for ($i=0;$i<count($pInfo)-1;$i++) {
								$tmp = explode(chr(9), $pInfo[$i]);
								$pInfo[$i] = $tmp[0];
								$pValues[$i] = $tmp[1];
							}
							for ($i=0;$i<count($sInfo)-1;$i++) {
								$tmp = explode(chr(9), $sInfo[$i]);
								$sInfo[$i] = $tmp[0];
								$sValues[$i] = $tmp[1];
							}
							
							$ptype = $pValues[array_search("type", $pInfo)];
							$pbg = $pValues[array_search("bg", $pInfo)];
							$pgrad = $pValues[array_search("grad", $pInfo)];
							$gradhoriz = '';
							if (substr($pgrad, 0, 1) == "h") {
								$pgrad = substr($pgrad, 1);
								$gradhoriz = 'checked="checked"';
							}
							
							$parrows = $pValues[array_search("arrows", $pInfo)];
							$pbw = $pValues[array_search("bw", $pInfo)];
							$pdetail = $pValues[array_search("detail", $pInfo)];
							$pstart = $pValues[array_search("start", $pInfo)];
							
							$sbw = $pValues[array_search("bw", $pInfo)];
							$sstart = $pValues[array_search("start", $pInfo)];
							
							echo '<div id="adveditor' . $info[0] . '" class="hidden">';
							echo '<form name="adveditor" action="manager.php" method="post">' . "\r\n" . $nl;
								echo '<input type="hidden" name="editid" value="' . $info[0] . '">' . $nl;
								echo '<input type="hidden" name="advedit" value="yes">' . $nl;
								
								echo '<table cellspacing="0" cellpadding="0" border="0">' . $nl; //  4
									echo '<tr><td align="right">Name:</td><td><input type="text" name="advtrackName" value="' . $info[1] . '" size="20"> <input type="button" value="Advanced «" onClick="advanced(' . $info[0] . ')"><br /></td></tr>' . $nl;
									echo '<tr><td colspan="2" height="12"></td></tr>' . $nl;
									echo '<tr><td align="center" colspan="2">Description</td></tr>' . $nl;
									echo '<tr><td align="center" valign="top" colspan="2"><textarea name="advtrackDescription" rows="8" cols="45">' . $info[3] . '</textarea></td></tr>' . $nl;
									echo '<tr><td colspan="2" align="center"><input type="checkbox" name="advresetViews" value="reset"> Reset ' . getInfo($info[0], "views") . ' Views | <input type="checkbox" name="advresetDownloads" value="reset"> Reset ' . getInfo($info[0], "downloads") . ' Downloads</td></tr>' . $nl;
									echo '<tr><td colspan="2" height="12"></td></tr>' . $nl;
									echo '<tr><td colspan="2">' . $nl;
									echo '<table cellspacing="0" cellpadding="0" border="1" width="98%" align="center"><tr><td>' . $nl; //  5
										echo '<table cellspacing="2" cellpadding="0" border="0" width="100%">' . $nl; //  6
											echo '<tr><td colspan="2"><center><u>Full Size Preview</u></center></td></tr>' . $nl;
											echo '<tr><td align="right">Image (png/jpeg/gif):</td><td><input type="text" name="type" value="' . $ptype . '" maxlength="4" size="4"></td></tr>' . $nl;
											echo '<tr><td align="right">Background Color: #</td><td><input type="text" name="bg" value="' . $pbg . '" maxlength="6" size="6"></td></tr>' . $nl;
											
											echo '<tr><td align="right">Gradient Color: #</td><td><input type="text" name="grad" value="' . $pgrad . '" maxlength="6" size="6"> <input type="checkbox" name="gradh" value="yes" ' . $gradhoriz . '> Horiz.</td></tr>' . $nl;
											echo '<tr><td align="right">Line Arrows:</td><td><input type="checkbox" name="arrow0" value="yes"';
											if (strpos($parrows, "0") === true) { echo ' checked="checked"'; }
											echo '><font color="#0000FF">Norm</font> <input type="checkbox" name="arrow1" value="yes"';
											if (strpos($parrows, "1") === true) { echo ' checked="checked"'; }
											echo '><font color="#FF0000">Acc</font> <input type="checkbox" name="arrow2" value="yes"';
											if (strpos($parrwos, "2") === true) { echo ' checked="checked"'; }
											echo '><font color="#008800">Bg</font></td></tr>' . $nl;
											echo '<tr><td colspan="2"></td></tr>' . $nl;
											echo '<tr><td colspan="2">' . $nl;
											echo '<input type="checkbox" name="bw" id="bw' . $info[0] . '" value="yes" onclick="if (document.getElementById(\'bw' . $info[0] . '\').checked == true) { document.getElementById(\'detail' . $info[0] . '\').checked = false; document.getElementById(\'start' . $info[0] . '\').checked = false; document.getElementById(\'detail' . $info[0] . '\').disabled = true; document.getElementById(\'start' . $info[0] . '\').disabled = true; } else { document.getElementById(\'detail' . $info[0] . '\').disabled = false; document.getElementById(\'detail' . $info[0] . '\').checked = true; document.getElementById(\'start' . $info[0] . '\').disabled = false; document.getElementById(\'start' . $info[0] . '\').checked = true; }"';
											if ($pbw == "yes") { echo ' checked="checked";'; }
											echo '> Black &amp; White<br />' . $nl;
											echo '<input type="checkbox" name="detail" id="detail' . $info[0] . '" value="yes"';
											if ($pdetail == "yes") { echo ' checked="checked";'; }
											echo '> Show detail (floor lines, arrows)<br />' . $nl;
											echo '<input type="checkbox" name="start" id="start' . $info[0] . '" value="yes"';
											if ($pstart == "yes") { echo ' checked="checked";'; }
											echo '> Show start position<br />' . $nl;
										echo '</td></tr></table>' . $nl; //  X6
									echo '</td></tr></table>' . $nl; //  X5
									
									echo '<tr><td colspan="2" height="12"></td></tr>' . $nl;
									echo '<tr><td colspan="2">' . $nl;
									echo '<table cellpadding="4" cellspacing="0" border="1" align="center">'; //  7
										echo '<tr><td><center><u>Small Preview</u></center><br />';
										echo '<input type="checkbox" name="sbw" id="sbw' . $info[0] . '" value="yes" onclick="if (document.getElementById(\'sbw' . $info[0] . '\').checked == true) { document.getElementById(\'sstart' . $info[0] . '\').checked = false; document.getElementById(\'sstart' . $info[0] . '\').disabled = true; } else { document.getElementById(\'sstart' . $info[0] . '\').disabled = false; document.getElementById(\'sstart' . $info[0] . '\').checked = true; }"';
										if ($sbw == "yes") { echo ' checked="checked";'; }
										echo '> Black &amp; White';
										echo '&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="sstart" id="sstart' . $info[0] . '" value="yes"';
										if ($sstart == "yes") { echo ' checked="checked";'; }
										echo '> Show start position';
									echo '</td></tr></table>'; //  X7
								
								echo '</td></tr></table>'; //  X4
								
								echo '<br />&nbsp;';
								echo '<br /><center><input type="submit" value="                        Save Changes                        "></center>';
								echo '<br />&nbsp;';
							echo '</form>' . $nl;
							echo '</div>' . $nl;  Advanced editing part throws everything out of wack */
							
							echo '</td>' . $nl;
							
							echo '<td width="25%" align="center" valign="middle" style="cursor:hand" class="offauthor" onMouseOver="this.className=\'author\'" onMouseOut="this.className=\'offauthor\'"><b><a href="analyze.php?u=' . $info[2] .'"';
							if (rights($info[2]) == 'admin') { echo ' style="color: #CC0000;" title="' . $info[2] . ' is an administrator."'; } elseif (rights($info[2]) == 'moderator') { echo ' style="color: #00CC00;" title="' . $info[2] . ' is a moderator."'; }
							echo '>' . $info[2] . '</a></b></td>' . $nl;
							echo '<td width="15%" align="center" valign="middle" class="offother" onMouseOver="this.className=\'other\'" onMouseOut="this.className=\'offother\'"><table cellpadding="0" cellspacing="0" border="0"><tr><td><a href="#"><img src="images/remove.gif" alt="Remove ' . $info[1] . '" border="0" onclick="removeTrack(' . $info[0] . ', \'' . $info[1] .'\')"></a></td>' . $nl;
							echo '<td width="4"></td>' . $nl;
							if ($info[2] == $_SESSION['user']) {
								echo '<td><a href="#"><img src="images/delete.gif" alt="Delete ' . $info[1] . '" border="0" onclick="deleteTrack(' . $info[0] . ', \'' . $info[1] .'\')"></a></td>' . $nl;
								echo '<td width="4"></td>' . $nl;
							} else {
								echo '<td><img src="images/nodelete.gif" alt="Can\'t Delete ' . $info[1] . '" border="0"></td>' . $nl;
								echo '<td width="4"></td>' . $nl;
							}
							echo '</tr></table>' . $nl; //  X3
							echo $nl . $nl . $nl;
						}
					echo '</td></tr></table>' . $nl; //  X2
				echo '</td></tr><tr><td>' . $nl;
					echo '<table cellpadding="4" cellspacing="0" border="0" width="100%" bgcolor="#CCCCCC"><tr><td>' . $nl; //  8
						echo '<table cellpadding="0" cellspacing="0" border="0" width="100%">' . $nl; //  9
							echo '<tr>' . $nl;
							echo '<input type="hidden" name="maincheck" value="yes">' . $nl;
							echo '<input type="hidden" name="p" value="">' . $nl;
							echo '<input type="hidden" name="purge" value="">' . $nl;
							echo '<input type="hidden" name="purged" value="">' . $nl;
							echo '<td><input type="button" value="Remove Selected" class="normal" onClick="if(confirm(\'Are you sure you want to remove these tracks from your manager?\')) { document.changes.submit(); }"></td>' . $nl;
							echo '<td align="center"><input type="button" value="Delete Selected" class="normal" onClick="if(confirm(\'Are you sure you want to permanently delete these tracks from the server?\')) { document.changes.p.value=true; document.changes.submit(); }"></td>' . $nl;
							echo '<td align="right"><input type="button" class="normalbold" value="Download Tracks" onClick="document.downloadTracks.submit();"></td>';
							echo '</tr>' . $nl;
							if ($missingTracks == true) { echo '<tr><td align="center" colspan="4"><br /><input type="button" style="font-weight: bold; color: #FF0000;" value="Purge Missing Tracks" onClick="document.changes.purge.value=true; document.changes.submit();"></td></tr>' . $nl; }
							if ($duplicateTracks == true) { echo '<tr><td align="center" colspan="4"><br /><input type="button" style="font-weight: bold; color: #AAAA00;" value="Purge Duplicate Tracks" onClick="document.changes.purged.value=true; document.changes.submit();"></td></tr>' . $nl; }
						echo '</table>' . $nl; //  X9
					echo '</td></tr></table>' . $nl; //  X8
				echo '</td></tr></table>' . $nl; //  X1
			echo '</td></tr></table>' . $nl;
				
				
				
				
			groupFoot();
			
			
			
			
			
			echo '</form>' . $nl;
			
			echo '<form name="downloadTracks" action="manager.php" method="post"><input type="hidden" name="downloadTracks" value="true"></form>';
			
			?>
			<script language="javascript">
			<!--
			document.getElementById('mainTable').className = 'shown';
			document.getElementById('loader').className = 'hidden';
			-->
			</script>
			<?php
		}
	} else {
		echo '<br />&nbsp;<br />' . $nl;
		groupHead("<center>Track Manager</center>", "993333");
		echo '<table cellpadding="0" cellspacing="0" border="0">' . $nl;
		echo '<tr><td>You must be <a href="login.php">logged in</a> to manage your tracks.</td></tr>' . $nl;
		echo '</table>' . $nl;
		groupFoot("993333");
	}
	
	if (isset($_SESSION['user'])) {
		echo '<center><input type="button" value="Add Your Tracks to Manager" class="normalbold" onclick="document.addYourTracks.submit(); this.disabled = true;"></center>' . $nl;
		echo '<form name="addYourTracks" action="manager.php" method="post"><input type="hidden" name="addYours" value="true"></form>' . $nl;
	}
	
	echo '<p />&nbsp;<p />';
	
	echo '<center><a href="#" onclick="window.open(\'http://www.official-linerider.com/play.html\');" title="Click here after you have downloaded the tracks to the \'www.official-linerider.com\' folder." style="font-weight: bold; font-size: 18px;">Open Line Rider in a new tab/window.</a></center>';
	
	echo '<p />&nbsp;<p />';
	
	
	
	
	if (isset($_SESSION['user'])) { //Logged In
	
	echo '<center>';
	echo '<form name="upload" action="manager.php" method="post" enctype="multipart/form-data">' . $nl; //Track uploader
	if (isset($_SESSION['user'])) {
		groupHead("<center>Upload Tracks</center>");
	} else {
		groupHead("<center>Upload Tracks</center>", "993333");
	}
	
		if (isset($_REQUEST['check'])) {
			if ($_FILES['uploadedFile']['name'] == '') {
				$error .= 'Click browse and upload your savedLines.sol file.';
			} else {
				if (substr($_FILES['uploadedFile']['name'], strpos($_FILES['uploadedFile']['name'], ".")) != ".sol") {
					$error .= 'Wrong file type.<br />Upload savedLines<b>.sol</b> or undefined<b>.sol</b>';
				}
				elseif ($_FILES['uploadedFile']['name'] != "undefined.sol" && $_FILES['uploadedFile']['name'] != "savedLines.sol") {
					$error .= 'Wrong file name.<br />Upload <b>savedLines</b>.sol or <b>undefined</b>.sol';
				}
			}
		}
	
		if (isset($_REQUEST['check']) && $error == '') {
			$trackIDs = explode(chr(9), $trackInfo[0]);
			$trackNames = explode(chr(9), $trackInfo[1]);

			echo '<center>Successfully uploaded your tracks!<br />' . $nl;
			echo '<center>Uploaded Tracks:<br />' . $nl;
			for ($i=0;$i<count($trackIDs);$i++) {
				echo '<b><a style="font-size: 11px;" href="track.php?id=' . $trackIDs[$i] . '" onMouseOver="document.getElementById(\'name' . $trackIDs[$i] . '\').className = \'name\'" onMouseOut="document.getElementById(\'name' . $trackIDs[$i] . '\').className = \'offname\'">' . $nl;
				echo $trackNames[$i];
				echo '</a></b>' . $nl;
				if ($i<count($trackIDs)-1) { echo '<br />' . $nl; }
			}
			echo '</center>' . $nl;
			echo '<br />' . $nl;
			echo '<center>Upload another file?</center><br />' . $nl;
			echo '<input type="hidden" name="check" value="yes">' . $nl;
			echo '<input type="file" name="uploadedFile" size="32"><br />&nbsp;<br />' . $nl;
			echo '<center><input name="Upload" type="submit" value="Upload" onClick=""></center>' . $nl;
		} else {
			if ($error != '') { echo '<br />' . $error . '<br />' . $nl; }
			echo '<input type="hidden" name="check" value="yes">' . $nl;
			echo '<input type="file" name="uploadedFile" size="32"><br />&nbsp;<br />' . $nl;
			echo '<center><input name="Upload" type="submit" value="Upload" onClick="document.upload.Upload.value=\'Please Wait... Uploading Tracks\';"></center>' . $nl;
		}
		
	if (isset($_SESSION['user'])) {
		groupFoot();
	} else {
		groupFoot("993333");
	}
	echo '</form>' . $nl; //Track Uploader
	echo '<br />Do not click the upload button more than once<br /><b>If your .sol file will not upload after 5 minutes, send it to me and I\'ll try figure out what the problem is and fix it.<br />Email to: <a href="mailto:webmaster@13willows.com?subject=LRShare%20SOL%20Error&body=<br /><br />--==Additional Information==--</u><br />(Please leave this info to help me identify your problem)<br />Date (EST): ' . date('F jS, Y, g:i a', time()+7200) . '<br />Username: ' . $_SESSION['user'] . '<br />OS/Browser: ' . $_SERVER['HTTP_USER_AGENT'] . '">webmaster@13willows.com</a></b>';
	echo '</center>';
	
	}// else {
		//echo 'You must be <a href="login.php">logged in</a> to upload your tracks.' . $nl;
	//}
?>

<?php include("tracker.php"); ?>
</body>
</html>