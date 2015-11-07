<?php
// include files
include("../../includes/session.php");
include("../../includes/functions.php");
include("../../lang/".getLang(''));
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head> 
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link type="text/css" rel="stylesheet" href="style.css">

<style>

.h2
{
	font-family: Verdana, Arial;
	font-size: 20px;
	font-weight: bold;
	color: #84B2DE;
}

.hr
{
	border: 1px solid #84B2DE;
}

.table
{
	border: 1px solid #84B2DE;
	width: 99%;
	font-family: Verdana, Arial;
	font-size: 12px;
	color: #84B2DE;
}

.header
{
	font-weight: bold;
	background-color: #EDF1FA;
}

.row
{
	background-color: #F5F5F5;
}

</style>

</head>
<body>

<h2 class="h2">
	<?php echo C_LANG138;?>
</h2>

<hr class="hr">

<p>
	<?php echo @getUsersOnline('2');?>
</p>

<!-- do not edit below -->
<p style="text-align:center;">
	<input class="button" type="button" name="close" value="<?php echo C_LANG128;?>" onclick="parent.closeMdiv('online');">
</p>

</body>
</html>