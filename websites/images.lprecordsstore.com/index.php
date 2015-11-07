<?php
ob_start("ob_gzhandler");
session_start();
global $allImages;

function fileExtension($fname) {
	$fname = strtolower($fname);
	$ret = explode('.', $fname);
	return $ret[count($ret)-1];
}

function fileSafe($filename) {
    $temp = $filename;

    // Loop through string
    $result = '';
    for ($i=0; $i<strlen($temp); $i++) {
        if (preg_match('([0-9]|[a-z]|.| )', $temp[$i])) {
            $result = $result . $temp[$i];
        }    
    }

    // Return filename
    return $result;
}

function parseUploader() {
	if (isset($_POST['uploading'])) {
		$image = $_FILES['imageFile']['name'];
		$uMoveTo = '/var/www/vhosts/aziovinyl.com/httpdocs/images';
		if (!empty($image)) {
			$isDir = is_dir($uMoveTo);
			$didMove = move_uploaded_file($_FILES['imageFile']['tmp_name'], $uMoveTo.'/'.$image);
			if ($didMove === FALSE) {
				$upload = '<tr><td colspan="2" style="font-weight: bold; font-size: 12px; color: #FF3333;">ERROR Uploading '.$image.'<br/><sup>to "'.$uMoveTo.'/'.$image.'"</sup>';
				$upload.= '<br/>'.print_r($_FILES,true);
				$upload.= '<br/>CurrentWorkingDirectory: '.getcwd();
				$upload.= '<br/>isMove?: '.(string)$didMove;
				$upload.= '<br/>Dest['.$uMoveTo.'] isDir?: '.(string)$isDir;
				$upload.= '</td></tr>';
			} else {
				$upload = '<tr><td colspan="2" style="font-weight: bold; font-size: 12px; color: #3333FF;">Successfully Uploaded '.$image.'<br/><sup>to "'.$uMoveTo.'/'.$image.'"</sup>';
				$upload.= '</td></tr>';
			}
		}
	}

	// Output imageList table
	$dirlist = '<div id="imageList" style="width: 400px; height: 512px; overflow: auto;">';
	$dirlist .= outputImageList();
	
	$dirlist .= '</div>';
	
	$newbody = str_replace('%DIRLIST%', $dirlist, file_get_contents("upload.html"));
	$newbody = str_replace('%UPLOAD%', $upload, $newbody);
	//echo 'Returning...';
	return '<!--U-->'.$newbody;
}

function parseLogin() { ?>
<!--L-->
	<div id="loginPage" style="display: block; padding-top: 200px;">
        <table align="center" cellpadding="2" cellspacing="0" border="0" class="logTable">
            <tr class="loginHeader"><td colspan="2" align="center" style="padding-bottom: 16px;">Login</td></tr>
            <tr class="login"><td>Username:</td><td><input type="text" name="u" size="20" onkeypress="return clickButton(event,'loginButton');" /></td></tr>
            <tr class="login"><td>Password:</td><td><input type="password" name="p" size="20" onkeypress="return clickButton(event,'loginButton');" /></td></tr>
            <tr id="loginFooter"><td colspan="2" align="center" style="padding-bottom: 8px;"><input id="loginButton" type="button" value="  Login  " onclick="login();" /></td></tr>
            <tr><td id="logging" align="center" colspan="2" style="display: none;">Logging In...</td></tr>
        </table>
	</div>
<?php }

if (isset($_GET['logout'])) {
	session_destroy();
	echo '<!--X-->';
	exit();
} else {
	if (isset($_GET['u'])) {
		if ($_GET['u'] == 'aziomedia' && $_GET['p'] == '02111954') {
			$_SESSION['loggedIn'] = true;
			$_SESSION['imageSet'] = array(0, 100);
		} else {
			echo '<!--U-->false';
			exit();
		}
	}
}

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
	if (isset($_GET['delete'])) {
		if (file_exists($_GET['delete'])) {
			unlink($_GET['delete']);
			exit();
		}
	}
	elseif (isset($_GET['oldName'])) {
		if (file_exists($_GET['oldName'])) {
			//echo '<!--MSG-->Attempting rename';
			rename($_GET['oldName'], fileSafe($_GET['newName']));
			//echo '<!--MSG-->Renamed "'.$_GET['oldName'].'" to "'.fileSafe($_GET['newName']).'".';
			exit();
		}
	}
	elseif (isset($_GET['imageProp'])) {
		$f = $_GET['imageProp'];
		if (file_exists($f)) {
			$s = getimagesize($f);
			echo '<!--P--><table class="imageProp" align="left" cellpadding="2" cellspacing="0" border="0">
                <tr><th colspan="2">Image Properties</th></tr>
				<tr><td class="imagePropTitle">Image Title:</td><td id="imageTitle">' . substr($f, 0, strrpos($f, '.')) . '</td></tr>
                <tr><td class="imagePropTitle">Image Size:</td><td id="imageSize">' . (string)(round(filesize($f)/1024,2)) . 'kb</td></tr>
                <tr><td class="imagePropTitle">Image Dimensions:</td><td id="imageDim">' . $s[0] . ' x ' . $s[1] . '</td></tr>
                <tr><td class="imagePropTitle">Last Modified:</td><td id="imageMod">' . date("F j, Y, g:i a", filemtime($f)) . '</td></tr>
                <tr><td class="imagePropTitle">Creation Date:</td><td id="imageCrate">' . date("F j, Y, g:i a", filectime($f)) . '</td></tr>
            </table>';
			exit();	
		}
	}
	elseif (isset($_GET['setstart'])) {
		$_SESSION['imageSet'] = array($_GET['setstart'],$_GET['setend']);
		$_SESSION['imagesIndexed'] = true;
		echo '<!--S-->'.outputImageList();
		exit();
	}
}

function outputImageList() {
	//Read all images from directories
	//if (!isset($_SESSION['imagesIndexed']) || $_SESSION['imagesIndexed'] != false || !isset($allImages)) {
		$dir = opendir("../images"); $counter = 1;
		do {
			$nextDir = readdir($dir);
			if ($nextDir != '.' && $nextDir != '..' && $nextDir !== false) {
				if (filetype($nextDir) != 'dir' && fileExtension($nextDir) != 'html' && fileExtension($nextDir) != 'txt' && fileExtension($nextDir) != 'php') {
					$allImages[] = htmlspecialchars($nextDir);
				}
			}
		} while ($nextDir !== false);
		
		for ($i=0;$i<count($allImages); $i++) { $newImages[] = strtolower($allImages[$i]); }
		//echo 'Done,';
		array_multisort($newImages, SORT_ASC, SORT_STRING, $allImages);
	//} else { /*$allImages = $_SESSION['allImages'];*/ unset($_SESSION['imagesIndexed']); } // Only re-index all files if the list is empty, in this case, $allImages must already be set
	
	//Print ImageList Table Header
	$ret = '<div>';
	
	$ret .= '<i>Total Images</i>: '.count($allImages).' <span id="imageListMsg"></span><br><i>Listing</i> ';
	
	$_SESSION['imageSet'][0].
	
		$beginEntries = array();
		for ($i=0;$i<count($allImages);$i+=$_SESSION['imageSet'][1]) { $beginEntries[] = $i; }
		$begins = '<select id="imageSetStart" onchange="changeImageSet(this.value,'.(int)$_SESSION['imageSet'][1].')">';
		for ($i=0;$i<count($beginEntries);$i++) {
			$begins .= '<option value="'.$beginEntries[$i].'" '.($_SESSION['imageSet'][0]==$beginEntries[$i]?'selected=""':'').'>'.$beginEntries[$i].'</option>';
		}
		$begins .= '</select>';
		
		$setSizes = array(50,100,500,1000,2500,5000,10000);
		$ends = '<select id="imageSet" onchange="changeImageSet('.(int)$_SESSION['imageSet'][0].',this.value)">';
		for($i=0;$i<count($setSizes);$i++) {
			$ends .= '<option value="'.$setSizes[$i].'" '.($_SESSION['imageSet'][1]==$setSizes[$i]?'selected=""':'').'>'.$setSizes[$i].'</option>';
		}
		$ends .= '</select>';
		
		$topbound = min($_SESSION['imageSet'][0]+$_SESSION['imageSet'][1],count($allImages));
	
	$ret .= $begins;
	
	$ret .= ' to '.$topbound.', <i>Show</i> '.$ends."\r\n";
	
	$ret .= '<table class="imageTable" width="100%" align="left" cellpadding="0" cellspacing="0" border="0">';
	
	//Print each row/image for table
	
	//echo 'Outputting from '.$_SESSION['imageSet'][0].' to '.$topbound.'<br>';
	
	for ($i=$_SESSION['imageSet'][0]; $i<$topbound; $i++){ // Original method outputting all data
		$ret .= '<tr id="ir_' . $allImages[$i] . '"><td class="' . ($i%2?'I2':'I1') . '"><input type="image" src="images/edit.png" onclick="iR(\'' . $allImages[$i] . '\');" /></td><td id="hovRow_' . $allImages[$i] . '"';
		if ($i % 2) { $ret .= ' style="background-color: #EEE;" onmouseover="hoverOn2(this);" onmouseout="hoverOff2(this);"'; }
		else { $ret .= ' onmouseover="hoverOn(this);" onmouseout="hoverOff(this);"'; }
		$ret .= '><div id="vDiv_' . $allImages[$i] . '" class="I" onclick="iC(\'' . $allImages[$i] . '\');">' . htmlentities($allImages[$i]) . '</div>'.
		'<div id="eDiv_' . $allImages[$i] . '" style="float: left; display: none;">'.
		'<input type="text" size="30" id="tBox_' . $allImages[$i] . '" value="' . $allImages[$i] . '" />'.
		'<input type="image" src="images/check.png" onclick="imageSavename(\'' . $allImages[$i] . '\');" /></div>'.
		'</td><td' . ($i%2 ? ' style="background-color: #EEE;"' : '') . '>'.
		'<input type="image" src="images/delete.png" onclick="imageDelete(\'' . $allImages[$i] . '\');" /></td></tr>';
	} //End old format
	
	/* $ret .= '[^S}'; // New format
	for ($i=$_SESSION['imageSet'][0]; $i<$topbound; $i++){
		$ret .= $allImages[$i].'[>}';
	}
	$ret .= '[^E}'; // End new format */
	
	$ret .= '</table>';
	return $ret;
}

//echo "No Issues."
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AzioMedia Image Hosting</title>
<style type="text/css">
html, body { background: #FFF; margin-top: 0px; margin-left: 0px; margin-right: 0px; }
h1 { font-size: 24px; }

.I1 { padding-right: 8px; padding-left: 8px; } /* Every other row of image list */
.I2 { padding-right: 8px; padding-left: 8px; background-color: #EEE; } /* Same thing */
.I { float: left; display: block; cursor: pointer; width: 100%; line-height: 20px; } /* Text within row of image list */

.imageProp th { text-decoration: underline; font-size: 18px; color: #090; padding-bottom: 8px; }
.imagePropTitle { color: #666; text-align: right; padding-right: 8px; }

#imagePreview { border: 1px solid #000; }
#imagePreview td { font-size: 20px; text-align: center; vertical-align: middle; padding: 32px; }

#imageUrl { color: #AAA; font-style: italic; font-weight: normal; }

.imageTable td { font-family: Verdana, Geneva, sans-serif; font-size: 12px; font-weight: bold; }
.imageTable input { font-family: Verdana, Geneva, sans-serif; font-size: 12px; font-weight: bold; }

.imageLinks td { color: #666; }
.imageLinks input { font-family: "Courier New", Courier, monospace; font-size: 11px; }

.footer { padding-top: 32px; padding-bottom: 16px; text-align: center; }
.footer a { text-decoration: none; color: #09F; }
.footer a:hover { text-decoration: underline; color: #6CF; }
.footer2 { color: #CCC; font-style: italic; font-weight: normal; text-align: center; }
.footer2 a { color: #CCC; text-decoration: underline; }
.footer2 a:hover { text-decoration: none; }

.mainContainer { margin-left: 64px; margin-right: 64px; padding: 16px; background: #DDD; border: 2px solid #999; border-radius: 16px; -moz-border-radius: 16px; -webkit-border-radius: 16px; }

td { font-family: Verdana, Geneva, sans-serif; font-size: 12px; font-weight: bold; }

.loginHeader td {
	font-size: 14px;
}

.login td {
	text-align: right;
}
table.logTable { border-radius: 16px; -moz-border-radius: 16px; -webkit-border-radius: 16px; border: solid 2px #CCC; }
</style>

<script type="text/javascript" language="javascript">
<!--
stillLoading = false;
logRoll = 0;
currentClicked = '';

if (window.XMLHttpRequest) {
	xmlhttp = new XMLHttpRequest();
} else {
	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}

xmlhttp.onreadystatechange = function() {
	if (xmlhttp.readyState == 4) {
		logStatus = xmlhttp.responseText;
		
		if (logStatus.indexOf('<!--U-->') != -1) { // Uploader
			if (logStatus == '<!--U-->false') {
				document.getElementById('logging').style.backgroundColor = "#FFCCCC";
				document.getElementById('logging').innerHTML = "Incorrect Username/Password";
			} else {
				//logStatus = parseImageList(logStatus);
				document.body.innerHTML = logStatus;
			}
		}
		else if (logStatus.indexOf('<!--L-->') != -1) { // Login
			document.body.innerHTML = logStatus;
		}
		else if (logStatus.indexOf('<!--P-->') != -1) { // Image Properties
			document.getElementById('imageProp').innerHTML = logStatus;	
		}
		else if (logStatus.indexOf('<!--X-->') != -1) { // Logout
			window.location.href = window.location.href;
		}
		else if (logStatus.indexOf('<!--S-->') != -1) { // Change Imageset Shown
			//logStatus = parseImageList(logStatus);
			
			document.getElementById('imageList').innerHTML = logStatus;
		}
		else if (logStatus.indexOf('<!--MSG-->') != -1) { // Display debug message
			alert('Message: ' + logStatus.substring(10));
		}
		else { // Unknown response or nothing opted to return
			//alert('Unknown AJAX Response: '+logStatus);
		}
		stillLoading = false;
	}
	
}

function login() {
	document.getElementById('logging').style.backgroundColor = "#CCDDFF";
	document.getElementById('logging').innerHTML = "Logging in...";
	document.getElementById('logging').style.display = "table-cell";
	stillLoading = true;
	loadRoll();
	
	xmlhttp.open("post", "index.php?u="+document.getElementsByName('u')[0].value+"&p="+document.getElementsByName('p')[0].value, true);
	xmlhttp.send(null);
}

function logout() {
	xmlhttp.open("post", "index.php?logout", true);
	xmlhttp.send(null);
}

function clickButton(e, btnid) {
	var evt = e ? e : window.event;
	var btn = document.getElementById(btnid);
	if (btn) {
		if (evt.keyCode == 13) {
			btn.click();
			document.getElementsByName('p')[0].value = '';
			document.getElementsByName('p')[0].focus();
			return false;
		}
	}
}

function iC(imageName) { // imageClick, when text in a row of image list is selected
	xmlhttp.open("post", "index.php?imageProp="+escape(imageName));
	xmlhttp.send(null);
	document.getElementById('imagePreview').innerHTML = '<a href="' + imageName + '" target="_blank"><img height="192" alt="' + imageName + '" title="' + imageName + '" src="' + imageName + '" /></a>';
	document.getElementById('imageUrl').innerHTML = 'http://images.lprecordsstore.com/' + escape(imageName);
	document.getElementById('imageLink').value = '<img src="http://images.lprecordsstore.com/' + escape(imageName) + '">';
	document.getElementById('hovRow_' + imageName).style.textDecoration = "underline";
	currentClicked = imageName;
}
function imageDelete(imageName) {
	if (confirm('Are you sure you want to delete "' + imageName + '"?')) {
		document.getElementById('ir_'+imageName.replace('"', '&quot;')).style.display = "none";
		xmlhttp.open("post", "index.php?delete="+escape(imageName));
		xmlhttp.send(null);
	}
}
function iR(imageName) { // Image Rename
	if (document.getElementById('vDiv_' + imageName).style.display != "none") {
		document.getElementById('vDiv_' + imageName).style.display = "none";
		document.getElementById('eDiv_' + imageName).style.display = "block";
		document.getElementById('eDiv_' + imageName).focus();
	} else {
		document.getElementById('vDiv_' + imageName).style.display = "block";
		document.getElementById('eDiv_' + imageName).style.display = "none";
	}
}
function imageSavename(imageName) {
	document.getElementById('vDiv_' + imageName).innerHTML = document.getElementById('tBox_' + imageName).value;
	
	document.getElementById('vDiv_' + imageName).style.display = "block";
	document.getElementById('eDiv_' + imageName).style.display = "none";
	
	xmlhttp.open("post", "index.php?oldName="+escape(imageName)+"&newName="+escape(document.getElementById('tBox_' + imageName).value));
	xmlhttp.send(null);
}

function hoverOn(element) {
	element.style.backgroundColor = "#DDEEFF";	
}
function hoverOff(element) {
	element.style.backgroundColor = "#FFFFFF";
}

function hoverOn2(element) {
	element.style.backgroundColor = "#DDEEFF";	
}
function hoverOff2(element) {
	element.style.backgroundColor = "#F0F0F0";
}

function changeImageSet(start, end) {
	start = Number(start); end = Number(end);
	document.getElementById('imageListMsg').innerHTML = 'Please wait...';
	document.getElementById('imageListMsg').style.backgroundColor = '#FCC';
	
	xmlhttp.open("post", "index.php?setstart="+start+"&setend="+end);
	xmlhttp.send(null);
}
function parseImageList(logStatus) {
	var loc = logStatus.indexOf('[^S}')+4;
	var expanded = '', tmp, tmpIndex, c = 0, finalStep = false;
	for (var i=loc;i<logStatus.length;) {
		tmpIndex = logStatus.indexOf('[>}',i);
		
		if (tmpIndex == -1) { // End of data no further [>} found, search for [^E}
			tmpIndex = logStatus.indexOf('[^E}',i);
			finalStep = true;
			
			logStatus = logStatus.substring(0,loc-4) + expanded + logStatus.substring(logStatus.indexOf('[^E}')+4);
			break;
		} // Continue
		
		tmp = logStatus.substring(i,tmpIndex);
		i += tmp.length+3;
		expanded += '<tr id="ir_' +tmp+ '"><td class="' + (c%2?'I2':'I1') + '"><input type="image" src="images/edit.png" onclick="iR(\'' +tmp+ '\');" /></td><td id="hovRow_' +tmp+ '"';
		if (c % 2) { expanded += ' style="background-color: #EEE;" onmouseover="hoverOn2(this);" onmouseout="hoverOff2(this);"'; }
		else { expanded += ' onmouseover="hoverOn(this);" onmouseout="hoverOff(this);"'; }
		
		expanded += '><div id="vDiv_' +tmp+ '" class="I" onclick="iC(\'' +tmp+ '\');">' + htmlentities(tmp) + '</div>'+
		'<div id="eDiv_' +tmp+ '" style="float: left; display: none;">'+
		'<input type="text" size="30" id="tBox_' +tmp+ '" value="' +tmp+ '" />'+
		'<input type="image" src="images/check.png" onclick="imageSavename(\'' +tmp+ '\');" /></div>'+
		'</td><td' + (c%2 ? ' style="background-color: #EEE;"' : '') + '>'+
		'<input type="image" src="images/delete.png" onclick="imageDelete(\'' +tmp+ '\');" /></td></tr>';
		c++;
	}
	return logStatus;
}

function loadRoll() {
	if (stillLoading) {
		if (logRoll++ >= 3) {
			logRoll = 0;
		}
		document.getElementById('logging').innerHTML = 'Logging';
		for (i=0; i<logRoll; i++) {
			document.getElementById('logging').innerHTML += '.';	
		}
		setTimeout("loadRoll()", 500);
	}
}

function htmlentities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}
//-->
</script>
</head>
<body>
<?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) { echo parseUploader(); } else { echo parseLogin(); } ?>

<script type="text/javascript" src="http://lprecordsstore.com/footer.js"></script>
</body>
</html>