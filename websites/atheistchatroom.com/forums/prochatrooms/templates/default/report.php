<?php
// include files
include("../../includes/session.php");
include("../../includes/functions.php");
include("../../lang/".getLang(''));
// captcha
$showCaptcha = getCaptchaText();
// send email
if($_POST){$result = sendAdminEmail('1',$_POST['id'],$_POST['report']);}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head> 
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link type="text/css" rel="stylesheet" href="style.css">

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

.textarea
{
	height: 80px;
	width: 200px;
}

</style>

</head>
<body class="body">

<div class="header" style='float:left;'><?php echo C_LANG153;?></div>
<div class="header" style='float:right;cursor:pointer;' onclick="parent.closeMdiv('report');"><img src='../../images/close.gif'></div>

<div style="clear:both;"></div>

<?php if(!$_POST){?>

	<form method="post" name="report" action="report.php">
		<input type="hidden" name="sCaptcha" value="<?php echo $showCaptcha;?>">
		<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>">
		<span><?php echo C_LANG154;?>,</span><br><br>
		<table class="table">
		<tr><td><?php echo C_LANG54;?>:</td><td><?php echo $_REQUEST['id'];?></td></tr>
		<tr><td valign="top"><?php echo C_LANG155;?>:</td><td><textarea class="textarea" name="report" value="<?php echo $message;?>"></textarea></td></tr>
		<tr><td><?php echo C_LANG156;?>:</td><td><input type="text" size="6" name="uCaptcha" value="">&nbsp;<span class="captcha"><?php echo $showCaptcha;?></span></td></tr>
		<tr><td>&nbsp;</td><td><input type="submit" name="send" value="<?php echo C_LANG136;?>"></td></tr>
		</table>
	</form>

<?php }else{ ?>

	<p><?php echo $result;?></p>

	<p>&nbsp;</p>

<?php }?>

<!-- do not edit below -->
<p style="text-align:center;">
	<input class="button" type="button" name="close" value="<?php echo C_LANG128;?>" onclick="parent.closeMdiv('report');">
</p>

</body>
</html>