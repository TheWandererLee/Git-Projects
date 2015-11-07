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

<h2 class="h2">
	TERMS &amp; CONDITIONS
</h2>

<hr class="hr">

<p class="text">
	Your terms &amp; conditions appear here.
</p>

<!-- do not edit below -->
<p style="text-align:center;">
	<input class="button" type="button" name="close" value="<?php echo C_LANG128;?>" onclick="parent.closeMdiv('terms');">
</p>

</body>
</html>