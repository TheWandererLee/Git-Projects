<?php
session_start(); include("functions.php");

if ($_REQUEST['editType'] == 'title') {
	setInfo('aboutTitle', $_REQUEST['aboutTitleEdit']);
} elseif ($_REQUEST['editType'] == 'text') {
	$write = str_replace("  ", "&nbsp;&nbsp;", $_REQUEST['aboutTextEdit']);
	$write = str_replace("\r\n", "<br />", $write);
	$file = fopen("about.dat", "w");
	fwrite($file, $write);
	fclose($file);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Jared Cline Photography - About Me</title>
<?php include("style.php"); ?>
<script type="text/javascript" language="javascript">
<!--
function editTitle() {
	document.getElementById('title').className = "hidden";
	document.getElementById('titleEdit').className = "shown";
	document.main.aboutTitleEdit.focus();
}
function editText() {
	document.getElementById('text').className = "hidden";
	document.getElementById('textEdit').className = "shown";
	document.main.aboutTextEdit.focus();
}
//-->
</script>
<style type="text/css">
.aboutTitle {
border: 0px;
background-color: #000000;
color: #FFFFFF;
font-size: 24px;
}
.aboutTitleEdit {
background-color: #333333;
color: #FFFFFF;
font-size: 24px;
}
.aboutTextEdit {
background-color: #333333;
color: #FFFFFF;
font-size: 16px;
font-family: "Times New Roman", Times, serif;
}
</style>
</head>
<body>
<div align="center"><img src="images/aboutheader.jpg"></div>
<?php include("navigation.php"); ?>
<form name="main" action="about.php" method="post">
	<input type="hidden" name="editType" value="">
	<table cellpadding="0" cellspacing="24" border="0" align="center">
	<tr><td>
		<img src="image.php?p=about">
	</td><td width="400" align="justify" valign="top">
		<div id="title" class="shown"><input type="text" value="<?php echo getInfo("aboutTitle"); ?>" name="aboutTitle" class="aboutTitle" disabled="disabled"><?php if ($_SESSION['user'] == 'jrizzle') { ?> <a href="#"><img src="images/edit.gif" title="Edit Title" alt="Edit Title" border="0" onclick="editTitle()"></a><?php } ?></div>
		<div id="titleEdit" class="hidden"><input type="text" value="<?php echo getInfo("aboutTitle"); ?>" name="aboutTitleEdit" class="aboutTitleEdit"> <a href="#"><img src="images/check.gif" title="Save Title" alt="Save Title" border="0" onclick="document.main.editType.value = 'title'; document.main.submit()"></a></div>
		
		<div id="textEdit" class="hidden" align="right"><a href="#"><img src="images/check.gif" title="Save Text" alt="Save Text" border="0" onclick="document.main.editType.value = 'text'; document.main.submit()"></a><br />
		<?php 
		echo '<textarea rows="28" cols="56" name="aboutTextEdit" class="aboutTextEdit">';
		$tmp = str_replace("<br />", "\r\n", file_get_contents("about.dat"));
		$tmp = str_replace("&nbsp;&nbsp;", "  ", $tmp);
		echo $tmp;
		echo '</textarea>';
		?>
		</div>
		<div id="text" class="shown">
		<?php
		echo file_get_contents("about.dat");
		if ($_SESSION['user'] == 'jrizzle') {
		echo ' <a href="#"><img src="images/edit.gif" title="Edit Text" alt="Edit Text" border="0" onclick="editText()"></a>';
		}
		?>
		</div>
		
	</td></tr>
	</table>
</form>
</body>
</html>