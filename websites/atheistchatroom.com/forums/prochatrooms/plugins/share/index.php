<?php
###########################################
# Author: Pro Chatrooms
# Software: Pro Chatrooms
# Url: http://www.prochatrooms.com
# Support: support@prochatrooms.com
# Copyright 2010 All Rights Reserved
#
# PLUGIN: Share Images Module
#
include("../../includes/session.php");
include("../../lang/".$_SESSION['lang']);
include("../../includes/config.php");
include("includes/functions.php");
###########################################
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head> 
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link type="text/css" rel="stylesheet" href="../../templates/<?php echo $CONFIG['template'];?>/style.css">

<style>

.table
{
	border: 0px;
}

.header
{
	font-weight: bold;
}

.row
{
	background-color: #F5F5F5;
}

</style>

</head>
<body class="body">

<div class="roomheader">
	<div style='float:left;'>Share Files (<?php echo implode(", ",$validExt);?>)</div>
	<div style='float:right;cursor:pointer;' onclick="parent.closeMdiv('shareFiles');"><img src='../../images/close.gif'></div>
</div>

<br>

<form enctype="multipart/form-data" name="upload" action="index.php" method="post">

<?php if($_POST){?>
	<span><?php echo $result;?></span>
<?php }?>

	<table>
    <tr><td>Select who to share files with,</td></tr>
    <tr><td><input type="radio" name="shareID" value="1" checked>Public - Share file with the Room? </td></tr>
    <tr><td><input type="radio" name="shareID" value="2" <?php if($_REQUEST['shareWithUser']){?>CHECKED<?php }?>>Private - Share file with another User?</td></tr>
    <tr><td>Enter User: <input type="text" name="shareWithUser" value="<?php echo $_REQUEST['shareWithUser'];?>"></td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Select a file to share,</td></tr>
    <tr><td><input type="file" id="uploadedfile" name="uploadedfile" size="15"></td></tr>
    <tr><td><input type="submit" name="submit" value="Upload File" /></td></tr>
	</table>

</form>

<!-- do not edit below -->
<p style="text-align:center;">
	<input class="button" type="button" name="close" value="<?php echo C_LANG128;?>" onclick="parent.closeMdiv('shareFiles');">
</p>

</body>
</html>