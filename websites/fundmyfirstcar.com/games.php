<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fund My First Car Games</title>
<style type="text/css">
<!--
body {
background-color: #5F0401;
color: #FFFFFF;
}
h1 {
font-family: Lucida Calligraphy, Monotype Corsiva, cursive;;
color: #FFFFFF;
}
img {
border-color: #000000;
}
img:hover {
border-style: dashed;
border-color: #00CCFF;
}
-->
</style>
<?php
function embedFlash($f, $w, $h) {
echo '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="' . $w . '" height="' . $h . '" id="' . $f . '" align="middle">';
echo '<param name="allowScriptAccess" value="sameDomain" />';
echo '<param name="movie" value="flash/' . $f . '.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#5F0401" /><embed src="flash/' . $f . '.swf" quality="high" bgcolor="#5F0401" width="' . $w . '" height="' . $h . '" name="' . $f . '" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />';
echo '</object>';
}
?>
<link href="css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<center><?php embedFlash('title', 750, 182); ?></center><p />
<center><input type="button" value="Go Back to Home Page" onclick="window.location='index.php';" style="color: #000000; font-weight: bold;"></center>
<?php
if (isset($_REQUEST['url'])) {
echo '<center>';
if ($_REQUEST['t'] == "flash") {
echo '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="' . $_REQUEST['w'] . '" height="' . $_REQUEST['h'] . '" id="' . $_REQUEST['url'] . '" align="middle">';
echo '<param name="allowScriptAccess" value="sameDomain" />';
echo '<param name="movie" value="' . $_REQUEST['url'] . '" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" /><embed src="' . $_REQUEST['url'] . '" quality="high" bgcolor="#000000" width="' . $_REQUEST['w'] . '" height="' . $_REQUEST['h'] . '" name="' . $_REQUEST['url'] . '" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />';
echo '</object><p />';
} else {
echo '<iframe src="' . $_REQUEST['url'] . '" width="' . $_REQUEST['w'] . '" height="' . $_REQUEST['h'] . '" frameborder="0" scrolling="no"></iframe><p />';
}
echo '</center>';
}
?>
<table align="center" border="1" width="512" cellspacing="0" cellpadding="8" bordercolor="#FFFFFF">
<tr /><td align="center" /><a href="games.php?url=flash/parkingPerfection2.swf&w=600&h=500&t=flash"><img src="images/thumbs/parkingPerfection2.jpg" border="1"></a><td />Parking Perfection: Test your parking skills (experts only)!
<tr /><td align="center" /><a href="games.php?url=http://www.mtv.com/onair/pimp_my_ride/game/play/&w=687&h=440"><img src="images/thumbs/pimpMyRide.jpg" border="1"></a><td />Pimp My Ride: Design your own pimped out car
</table>

</body>
</html>