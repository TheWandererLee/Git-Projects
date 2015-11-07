<?php
// include files
include("../../includes/ini.php");
include("../../includes/session.php");
include("../../includes/functions.php");
include("../../lang/".getLang(''));

// send user new password
if($_POST && $_POST['userEmail']){$result = resetPassword($_POST['userEmail']);}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head> 
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link type="text/css" rel="stylesheet" href="style.css">

<style>
.text
{
	font-family: Verdana, Arial;
	font-size: 12px;
	font-style: normal;
	color: #84B2DE;
}

</style>

</head>
<body>

<p class="text">
	<?php echo C_LANG126;?>

	<?php if($result){echo "<br><br>Result: ".$result;}?>
</p>

<p>
	<form method="post" name="newpass" action="lost.php" style="text-align:center;">
		<input type="text" name="userEmail" value="">&nbsp;<input type="submit" name="sendPass" value="<?php echo C_LANG127;?>">
	</form>
</p>

<!-- do not edit below -->
<p style="text-align:center;">
	<input class="button" type="button" name="close" value="<?php echo C_LANG128;?>" onclick="parent.closeMdiv('lost');">
</p>

</body>
</html>