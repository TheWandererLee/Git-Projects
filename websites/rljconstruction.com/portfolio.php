<html>
<head>
<title>RLJ Construction Portfolio Frame</title>
<style type="text/css">
body {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
a {
text-decoration: none;
color: #0033FF;
font-weight: bold;
}
a:hover {
text-decoration: underline;
color: #0099FF;
}
</style>
</head>
<body>
<?php
if (isset($_REQUEST['riverfront'])) {
?>
	<a href="?smithville">Smithville Woods Homes</a> | <a href="?renovations">Renovations</a>
	<br /><table align="center" border="0" cellpadding="8" cellspacing="0">
		<tr><td colspan="3" align="center" style="text-decoration: underline; font-weight: bold;">Riverfront</td></tr>
		<tr>
			<td><a href="images/riverfront/1.jpg"><img border="0" src="images/resize.php?f=riverfront/1.jpg"></a></td>
			<td><a href="images/riverfront/2.jpg"><img border="0" src="images/resize.php?f=riverfront/2.jpg"></a></td>
			<td><a href="images/riverfront/3.jpg"><img border="0" src="images/resize.php?f=riverfront/3.jpg"></a></td>
		</tr>
		<tr>
			<td><a href="images/riverfront/king.jpg"><img border="0" src="images/resize.php?f=riverfront/king.jpg"></a></td>
			<td><a href="images/riverfront/fortney.jpg"><img border="0" src="images/resize.php?f=riverfront/fortney.jpg"></a></td>
			<td><a href="images/riverfront/scheetz.jpg"><img border="0" src="images/resize.php?f=riverfront/scheetz.jpg"></a></td>
		</tr>
	</table>
<?php
} elseif (isset($_REQUEST['smithville'])) {
?>
	<a href="?riverfront">Riverfront Homes</a> | <a href="?renovations">Renovations</a>
	<br /><table align="center" border="0" cellpadding="8" cellspacing="0">
		<tr><td colspan="3" align="center" style="text-decoration: underline; font-weight: bold;">Smithville Woods</td></tr>
		<tr>
			<td><a href="images/smithvilleWoods/hill.jpg"><img border="0" src="images/resize.php?f=smithvilleWoods/hill.jpg"></a></td>
			<td><a href="images/smithvilleWoods/knoll.jpg"><img border="0" src="images/resize.php?f=smithvilleWoods/knoll.jpg"></a></td>
			<td><a href="images/smithvilleWoods/ludlum.jpg"><img border="0" src="images/resize.php?f=smithvilleWoods/ludlum.jpg"></a></td>
		</tr>
		<tr>
			<td><a href="images/smithvilleWoods/midget.jpg"><img border="0" src="images/resize.php?f=smithvilleWoods/midget.jpg"></a></td>
			<td><a href="images/smithvilleWoods/sellers.jpg"><img border="0" src="images/resize.php?f=smithvilleWoods/sellers.jpg"></a></td>
			<td><a href="images/smithvilleWoods/snyder.jpg"><img border="0" src="images/resize.php?f=smithvilleWoods/snyder.jpg"></a></td>
		</tr>
	</table>
<?php
} elseif (isset($_REQUEST['renovations'])) {
?>
	<a href="?riverfront">Riverfront Homes</a> | <a href="?smithville">Smithville Woods Homes</a>
	<br /><table align="center" border="0" cellpadding="8" cellspacing="0">
		<tr><td colspan="3" align="center" style="text-decoration: underline; font-weight: bold;">Renovations</td></tr>
		<tr>
			<td><a href="images/renovations/communityBldg.jpg"><img border="0" src="images/resize.php?f=renovations/communityBldg.jpg"></a></td>
			<td><a href="images/renovations/southportMooreSt.jpg"><img border="0" src="images/resize.php?f=renovations/southportMooreSt.jpg"></a></td>
			<td><a href="images/renovations/trinityUnitedMethodistChurch.jpg"><img border="0" src="images/resize.php?f=renovations/trinityUnitedMethodistChurch.jpg"></a></td>
		</tr>
	</table>
<?php
} else {
?>
	<ul>
	<li><a href="?riverfront">Riverfront Homes</a></li>
	<li><a href="?smithville">Smithville Woods Homes</a></li>
	<li><a href="?renovations">Renovations</a></li>
	</ul>
<?php
}
?>
</body>
</html>