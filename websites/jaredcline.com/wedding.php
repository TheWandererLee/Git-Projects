<?php session_start();

for ($i=0;$i>-1;$i++) {
	if (!file_exists("images/wedding/" . $i . ".jpg")) { $last = $i - 1; break; } //Detect last picture
}
if ($last == -1) {
	$tmp = imagecreate(196, 196);
	$black = imagecolorallocate($tmp, 0, 0, 0);
	imagerectangle($tmp, 0, 0, 255, 255, $black);
	$red = imagecolorallocate($tmp, 255, 0, 0);
	$green = imagecolorallocate($tmp, 0, 255, 0);
	$blue = imagecolorallocate($tmp, 96, 96, 255);
	for ($i=0;$i<1000;$i++) {
		imagestring($tmp, 2, mt_rand(-10, 196), mt_rand(-10, 196), "?", imagecolorallocate($tmp, mt_rand(0, 128), mt_rand(0, 128), mt_rand(128, 255)));
	}
	imagestring($tmp, 7, 8, 60, "No Images Found In", $red);
	imagestring($tmp, 8, 8, 90, "Wedding", $green);
	imagestring($tmp, 7, 8, 120, "Gallery", $red);
	imagejpeg($tmp, "images/wedding/0.jpg");
	imagedestroy($tmp);
	
	header("Location: wedding.php");
	exit;
}
if ($_REQUEST['p'] > $last) { header("Location: wedding.php?p=".$last); }
if ($_REQUEST['p'] < 0) { header("Location: wedding.php?p=0"); }
if (!is_numeric($_REQUEST['p'])) { header("Location: wedding.php?p=0"); }

if ($_SESSION['user'] == 'jrizzle') {
	if ($_REQUEST['edit'] == 'left') {
		rename("images/wedding/".$_REQUEST['p'].".jpg", "images/wedding/temp.jpg");
		rename("images/wedding/".strval($_REQUEST['p']-1).".jpg", "images/wedding/".$_REQUEST['p'].".jpg");
		rename("images/wedding/temp.jpg", "images/wedding/".strval($_REQUEST['p']-1).".jpg");
		header("Location: wedding.php?p=".strval($_REQUEST['p']-1));
		//exit('<meta http-equiv="refresh" content="0;url=wedding.php?p='.strval($_REQUEST['p']-1).'">');
	}
	elseif ($_REQUEST['edit'] == 'right') {
		rename("images/wedding/".$_REQUEST['p'].".jpg", "images/wedding/temp.jpg");
		rename("images/wedding/".strval($_REQUEST['p']+1).".jpg", "images/wedding/".$_REQUEST['p'].".jpg");
		rename("images/wedding/temp.jpg", "images/wedding/".strval($_REQUEST['p']+1).".jpg");
		header("Location: wedding.php?p=".strval($_REQUEST['p']+1));
		//exit('<meta http-equiv="refresh" content="0;url=wedding.php?p='.strval($_REQUEST['p']+1).'">');
	}
	elseif ($_REQUEST['edit'] == 'delete') {
		unlink("images/wedding/".$_REQUEST['p'].".jpg");
		for ($i=$_REQUEST['p']+1;$i<=$last;$i++) {
			rename("images/wedding/".$i.".jpg", "images/wedding/".strval($i-1).".jpg");
		}
		if ($_REQUEST['p'] == $last) { header("Location: wedding.php?p=".strval($_REQUEST['p']-1)); }
	}
	elseif ($_REQUEST['edit'] == 'addleft' || $_REQUEST['edit'] == 'addright') {
		$fileError = '';
		if ($_FILES['uploadFile']['name'] == '') {
			$fileError .= 'Click [Browse...]';
		} else {
			$ext = substr($_FILES['uploadFile']['name'], strpos($_FILES['uploadFile']['name'], "."));
			if ($ext != ".jpg" && $ext != ".jpeg") {
				$fileError .= 'Must be .jpg or .jpeg';
			}
		}
		
		if (empty($fileError)) {
			if ($_REQUEST['edit'] == 'addleft') { $saveNum = $_REQUEST['p']; } else { $saveNum = $_REQUEST['p'] + 1; }
			$saveTo = "images/wedding/".$saveNum.".jpg";
			
			for ($i=$last;$i>=$saveNum;$i--) {
				rename("images/wedding/".$i.".jpg", "images/wedding/".strval($i+1).".jpg");
			}
			if (!move_uploaded_file($_FILES['uploadFile']['tmp_name'], $saveTo)) {
				$fileError .= 'Error uploading picture'; //If unsuccessful
			}
		}
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Jared Cline Photography - Wedding</title>
<?php include("style.php"); ?>
</head>
<body>
<div align="center"><img src="images/weddingheader.jpg"></div>
<?php include("navigation.php"); include("functions.php"); ?>

<?php
	if (empty($_REQUEST['p']) || !is_numeric($_REQUEST['p'])) { $_REQUEST['p'] = '0'; }
	$id = (int)$_REQUEST['p'];
	$nl = "\r\n";
	
	if ($_SESSION['user'] == 'jrizzle') { $thumbs = 15; } else { $thumbs = getInfo("weddingthumbs"); }
	if ($thumbs / 2 == round($thumbs / 2)) { $thumbs -= 1; } //If thumbnails per page is even, subtract one
	
	for ($i=0;$i<$last;$i++) {
		$tmp = getInfo("wedding/" . $i);
		if ($tmp != false) { $caption[$i] = $tmp; }
	}
	
	$side = ($thumbs - 1) / 2;
	$start = $id - $side;
	$end = $id + $side;
	
	echo '<table cellpadding="0" cellspacing="16" border="0" align="center"><tr>';
	
	echo '<td width="200" align="right">';
	if ($id > 0) { echo '<a href="wedding.php?p=' . (string)($id - 1) . '" style="font-size: 36px; text-decoration: none;"><img src="images/back.jpg"></a>'; }
	echo '</td>';
	echo '<td align="center"><a href="image.php?p=wedding/' . $id . '&h=768"><img src="image.php?p=wedding/' . $id . '&h=320" border="1" style="border-color: #CCCCFF" width="'.getWidth('images/wedding/'.$id.'.jpg',320).'" height="320"></a></td>';
	echo '<td width="200" align="left">';
	if ($id < $last) { echo '<a href="wedding.php?p=' . (string)($id + 1) . '" style="font-size: 36px; text-decoration: none;"><img src="images/next.jpg"></a>'; }
	echo '</td>';
	echo '</tr>';
	if (!empty($caption[$id])) { echo '<tr><td align="center" colspan="3">' . $caption[$id] . '</td></tr>'; }
	echo '</table>';
	if ($_SESSION['user'] == 'jrizzle') {
		echo '<form name="main" action="wedding.php?p='.$id.'" method="post" enctype="multipart/form-data">';
		echo '<input type="hidden" name="edit" value="">';
		echo '<table align="center" cellpadding="0" cellspacing="0" border="0"><tr>';
			echo '<td colspan="9" align="center"><i><u>Admin Tools</u></i></td>';
		echo '</tr><tr height="24" valign="top">';
			$s = '<td width="9"></td>';
			if ($id > 0) { echo '<td align="center"><a href="#"><img src="images/left.gif" border="0" title="Move Left" onclick="document.main.edit.value=\'left\'; document.main.submit();" onclick="document.main.edit.value=\'left\'; document.main.submit();"></a></td>'; } else { echo '<td align="center"><img src="images/noleft.gif" title="Move Left"></td>'; }
			echo $s.'<td align="center"><a href="#"><img src="images/addleft.gif" border="0" title="Add Before" onclick="document.getElementById(\'uploading\').className=\'shown\'; document.main.edit.value=\'addleft\'; document.main.submit();"></a></td>'.$s.'<td align="center"><a href="#"><img src="images/delete.gif" border="0" title="Delete" onclick="if (confirm(\'Are you sure you want to delete this picture?\')) { document.main.edit.value=\'delete\'; document.main.submit(); }"></a></td>'.$s.'<td align="center"><a href="#"><img src="images/addright.gif" border="0" title="Add After" onclick="document.main.edit.value=\'addright\'; document.main.submit();"></a></td>'.$s;
			if ($id < $last) { echo '<td align="center"><a href="#"><img src="images/right.gif" border="0" title="Move Right" onclick="document.main.edit.value=\'right\'; document.main.submit();"></a></td>'; } else { echo '<td align="center"><img src="images/noright.gif" title="Move Right"></td>'; }
		echo '</tr><tr>';
			echo '<td colspan="9" style="color: #00FF00; font-family: \'Verdana\'; font-size: 10px;" align="center">';
			if (!empty($fileError)) { echo '<font color="#FF0000">' . $fileError . '</font><br />'; }
			echo '<font color="#666666" style="">v</font> Upload .jpg Picture <font color="#666666">v</font></td>';
		echo '</tr><tr>';
			echo '<td colspan="9" align="center"><input type="file" name="uploadFile" size="5">';
			echo '<br /><div class="hidden" id="uploading" style="color: #0000FF" align="center">Uploading...</div>';
			echo '</td>';
		echo '</tr></table>';
		echo '</form>';
	}
	echo '<br />';
	
	echo '<table cellpadding="4" cellspacing="0" border="0" align="center"><tr>';

	$side++;
	echo '<td align="right" width="' . (string)round(640 / $thumbs * (100/75)) . '"><a href="wedding.php?p=0">&lt;&lt;</a></td>';
	for ($i=$start;$i<=$end;$i++) {
		if ($_SESSION['user'] == 'jrizzle') { $fade = 0; } else { $fade = round(abs($i-$id) / $side * 100, 2); }
		if (file_exists("images/wedding/" . $i . ".jpg")) {
			echo '<td><a href="wedding.php?p=' . $i . '"><img src="image.php?p=wedding/' . $i . '&w=' . (string)round(640 / $thumbs * ((100-$fade)/75)) . '&f=' . $fade . '"';
			if (!empty($caption[$i])) { echo ' title="' . $caption[$i] . '"'; }
			echo ' border="0"></a></td>';
		} else {
			echo '<td width="' . (string)round(640 / $thumbs * ((100-$fade)/75)) . '"></td>';
		}
		if ($i == $id-1) { echo '<td width="20" align="right">&gt;</td>'; }
		if ($i == $id && $thumbs > 1) { echo '<td width="20" align="left">&lt;</td>'; }
	}
	echo '<td align="left" width="' . (string)round(640 / $thumbs * (100/75)) . '"><a href="wedding.php?p='.$last.'">&gt;&gt;</a></td>';
	echo '</tr></table>';
?>
</body>
</html>