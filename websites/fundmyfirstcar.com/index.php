<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
if ($_REQUEST['page'] == 'games') {
echo '<meta http-equiv="Refresh" content="0;url=games.php">';
}
?>
<title>Help Fund My First Car!</title>
<script type="text/javascript" language="javascript">
<!--
if (document.images)
   {
	 <?php
	 $links = array("home", "nomoney", "games", "contact");
	 foreach ($links as $value) {
	 	echo $value . 'on = new Image(106, 35);';
		echo $value . 'on.src = "images/' . $value . '.jpg";';
		echo $value . 'off = new Image(106, 35);';
		echo $value . 'off.src = "images/' . $value . '-over.jpg";';
	 }
	 ?>
   }

function out(imgName)
 {
   if (document.images)
    {
      imgOn=eval(imgName + "on.src");
      document[imgName].src= imgOn;
    }
 }

function over(imgName)
 {
   if (document.images)
    {
      imgOff=eval(imgName + "off.src");
      document[imgName].src= imgOff;
    }
 }
function flashFocus() {
	Navigation.focus();
}
// -->
</script>
<style type="text/css">
<!--
body {
margin-top: 0px;
background: url("images/bggrad.jpg");
background-repeat: repeat-x;
}
-->
</style>
<?php
function drawProgress($m, $header="", $minm, $maxm, $size, $height=27) {
echo "<table bgcolor=\"#5F0401\" width=\"" . $size . "\" cellpadding=\"0\" cellspacing=\"0\">";
echo "<tr><td><table cols=\"2\" cellpadding=\"0\" cellspacing=\"0\" width=\"" . $size . "\"><tr><td align=\"left\">$" . $minm . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style=\"color: #9A7371\">" . $header . "</b><td align=\"right\" width=\"96\">$" . $maxm . "</table>";
echo "<tr><td height=\"" . $height . "\">";
echo "<table bgcolor=\"#5F0401\" width=\"" . $size . "\" cellpadding=\"0\" cellspacing=\"0\">";
echo "<tr><td>"; echo "<tr><td height=\"" . $height . "\">";
if ($maxm == 0) { $cur = $maxm; } else { $cur = (($m - $minm) / (($maxm - $minm) / 100)) * ($size / 100); }
$rem = $size - $cur;
$wid = 14; $bgwid = 14; $hei = 27;
for ($i=0; $i<floor($cur/$wid); $i++) { echo "<img src=\"images/loaderfg.jpg\" width=\"" . $wid . "\" height=\"" . $height . "\">"; }
$barfl = floor($cur % $wid);
if ($barfl > 0) { echo "<img src=\"images/loaderfg.jpg\" height=\"" . $height . "\" width=\"" . $barfl . "\">"; }
for ($i=0; $i<floor($rem/$bgwid); $i++) { echo "<img src=\"images/loaderbg.jpg\"  width=\"" . $wid . "\" height=\"" . $height . "\">"; }
$barfl = floor($rem % $bgwid);
if ($barfl > 0) { echo "<img src=\"images/loaderbg.jpg\" height=\"" . $height . "\" width=\"" . $barfl . "\">"; }
echo "<tr><td><div style=\"position: relative; left: " . floor($cur - 4) . "px;\">^$" . $m . "</div>"; echo "</table></table>";
}
function embedFlash($f, $w, $h) {
echo '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="' . $w . '" height="' . $h . '" id="' . $f . '" align="middle">';
echo '<param name="allowScriptAccess" value="sameDomain" />';
echo '<param name="movie" value="flash/' . $f . '.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#5F0401" /><embed src="flash/' . $f . '.swf" quality="high" bgcolor="#5F0401" width="' . $w . '" height="' . $h . '" name="' . $f . '" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />';
echo '</object>';
}
function news() {
	$file = fopen('files/news.txt', 'r');
	$news = fread($file, filesize('files/news.txt'));
	fclose($file);
	echo '<table cellspacing="8" cellpadding="0" border="0">';
	echo $news;
	echo '</table>';
}
function roller($name) {
echo 'onmouseover="over(\'' . $name . '\')" onmouseout="out(\'' . $name . '\')"';
}
$currentMoney = 158;
?>
<link href="css/styles.css" rel="stylesheet" type="text/css">
</head>
<body onload="flashFocus();" bgcolor="#FFFFFF" topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">
<table align="center" cellspacing="0" cellpadding="0" border="0" bgcolor="#5F0401">
<tr /><td><table cellspacing="0" cellpadding="0" border="0" height="316">
<tr /><td><img src="images/m1.jpg" width="106" height="71"></td>
<tr /><td>
<a href="?page=home">Home</a>
<br /><a href="?page=nomoney">No Money?</a>
<br /><a href="?page=games">Games</a>
<br /><a href="?page=contact">Contact Me</a>
<br /><br /><a href="http://victoryautosalesllc.com/cars/Dodge-014548.html">Success!</a>
<?php //embedFlash("navigation", 106, 140); ?>
</td>
<?php /*
<tr /><td><a href="?page=home" <?php roller('home'); ?>><img src="images/home.jpg" name="home" border="0" alt="home"></a></td>
<tr /><td><a href="?page=nomoney" <?php roller('nomoney'); ?>><img src="images/nomoney.jpg" name="nomoney" border="0" alt="no money?"></a></td>
<tr /><td><a href="?page=games" <?php roller('games'); ?>><img src="images/games.jpg" name="games" border="0" alt="games"></a></td>
<tr /><td><a href="?page=contact" <?php roller('contact'); ?>><img src="images/contact.jpg" name="contact" border="0" alt="contact me"></a></td>
*/ ?>
<tr /><td>
<img src="images/m2.jpg"></td>
</table></td>
<td><img src="images/m3.jpg"></td>
<td>
<?php
// Content section
// Default size for pages is 549x336, bacground color: #5F0401
// Alternatively use size 549x317 with the [] image at the bottom-right (images/nw3.jpg)


if ($_REQUEST['page'] == 'games') {

//Games page ?>
<!--
<table cellspacing="0" cellpadding="0" border="0" width="549" height="336">
<tr /><td /><table cellspacing="0" cellpadding="0" border="0" height="317">
<tr /><td /><iframe src="games.php" width="544" height="314"></iframe></table>
<tr /><td /><img src="images/nw3.jpg" align="right">
</table>
-->

<!--
<table cellspacing="0" cellpadding="0" border="0" width="549" height="336">
<tr /><td /><table cellspacing="2" cellpadding="0" border="0" height="317">
<tr /><td width="256" align="center"/><img src="images/thumbs/pimpMyRide.jpg" border="0"><td width="256" align="center"/><img src="images/thumbs/parkingPerfection2.jpg" border="0">
<tr /><td height="14" align="center" valign="top"/>Pimp My Ride: Customize your own car<td align="center" valign="top"/>Parking Perfection 2: See if you really know how to park a car
<tr /><td align="center"/><a href="#" onclick="window.open('http://www.mtv.com/onair/pimp_my_ride/game/play/', 'width=687, height=440');"><img src="images/thumbs/dragRacer3.jpg" border="0"></a><td align="center"/>
<tr /><td align="center"/>Drag Racer v3: Buy a car, customize it, and drag race it against other cars!<td align="center"/>
</table>
<tr /><td /><img src="images/nw3.jpg" align="right">
</table>
-->

<?php
} elseif ($_REQUEST['page'] == 'nomoney') {

//No money page ?>
<table cellspacing="0" cellpadding="0" border="0" width="549" height="336">
<tr /><td /><table cellspacing="0" cellpadding="0" border="0" height="317">
<tr /><td /><iframe src="nomoney.php" width="544" height="314"></iframe></table>
<tr /><td /><img src="images/nw3.jpg" align="right">
</table>

<?php
} elseif ($_REQUEST['page'] == 'contact') {

//Contact me page ?>
<table cellspacing="0" cellpadding="0" border="0" width="549" height="336">
<tr /><td />
<?php
if ($_POST['check'] == 'yes') {

if ($_POST['message'] == '') {
	$error = "You must type in a message at least.";
} else {
	if ($_POST['from'] == '') { $_POST['from'] = "Fund_My_First_Car@fundmyfirstcar.com"; }
	if ($_POST['name'] == '') { $_POST['name'] = "Anonymous"; }
	if ($_POST['subject'] == '') { $_POST['subject'] = "Concerning Fund My First Car"; }
	$_POST['message'] = str_replace('\\"', '"', $_POST['message']);
	$_POST['message'] = str_replace('\\\'', '\'', $_POST['message']);
	mail('webmaster@fundmyfirstcar.com', $_POST['subject'], $_POST['message'], 'From: ' . $_POST['from']);
	$sent = true;
}

}
?>
<form name="contactForm" method="post" action="redindex.php?page=contact">
<table cellspacing="0" cellpadding="4" border="0" align="center" <?php if ($sent == true) { echo 'height="317"'; } ?>>
<?php if ($error != '') { echo '<tr /><td align="center" colspan="2"/><b><u>' . $error . '</u></b>'; } ?>
<?php if ($sent == true) { ?>
<tr /><td align="center" valign="middle" />Your message was successfully delivered to me! (Daryll)<br />I will most likely respond if you left your email address.<p /><a href="?page=home">Click here to go back to the home page</a>
<?php } else { ?>
<tr /><td align="left"/>Your Email:<td /><input type="text" name="from" size="70" style="background-color: #590401;">
<tr /><td align="left"/>Name:<td /><input type="text" name="name" size="70" style="background-color: #590401;">
<tr /><td align="left"/>Subject:<td /><input type="text" name="subject" size="70" style="background-color: #590401;">
<tr /><td align="center" colspan="2"/>--Message--
<tr /><td align="center" colspan="2"/><textarea name="message" rows="10" cols="82" style="background-color: #590401;"></textarea>
<tr /><td align="center" colspan="2"/><input type="submit" value="Send!" style="color: #000000;">
<?php } ?>
</table>
<input type="hidden" name="check" value="yes">
</form>
<tr /><td /><img src="images/nw3.jpg" align="right">
</table>

<?php
} else {

//Home page ?>
<table cellspacing="0" cellpadding="0" border="0" width="549" height="336">
<tr /><td><img src="images/wel1.jpg" alt="welcome"><td><img src="images/pro1.jpg" alt="aut-o-meter">
<tr /><td width="256" height="105" valign="top"><table cellspacing="0" cellpadding="0" border="0"><tr><td>Hey! Welcome to my website! I hope you've come to help fund my first car! Please help me achieve my goal to raise enough money to fund my first car. My plan is for everyone to give me 5 dollars and soon I'll have enough money to buy my first car! <a href="main.php" class="d">read more at the old homepage...</a><td width="16"></table><td width="256" height="105" valign="top">
<?php
drawProgress($currentMoney, "Long-term goal", 0, 1000, 256, 16);
echo '<br />';
drawProgress($currentMoney, "Second hundred", 100, 200, 256, 16);
?>
<tr /><td><img src="images/ld1.jpg" alt="dream cars"></td><td><img src="images/nw1.jpg" alt="news"></td>
<tr /><td width="256" height="104" valign="top" background="images/van.jpg" style="background-repeat: no-repeat;"></td>
<td width="256" height="104" valign="top"><?php news(); ?></td>
<tr /><td align="right" colspan="2"><img src="images/nw3.jpg"></td>
</table>
<?php } ?>
</table>

<table align="center" cellspacing="0" cellpadding="0" border="0">
<tr /><td colspan="3" background="images/m4.jpg" height="294"><table cellspacing="0" cellpadding="0" border="0"><tr /><td width="160" align="left"><center><p />Portfolio:<p /><a href="http://www.13willows.com" style="font-size: 16px;">13 Willows</a><br /><a href="http://halo2.13willows.com" style="font-size: 16px;">All4Free</a><br /><a href="http://www.napnode.com" style="font-size: 16px;">NAP node</a><br /><a href="http://wingit.angeltowns.com/" style="font-size: 16px;">Wingit</a></center></td>
<td width="471" align="right" valign="top"><center><font style="font-size: 20px;"><b><u>Not</u> My Car :(</b></font></center></td>
<td width="139" align="right">
<form name="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="dc@xaranda.net">
<input type="hidden" name="item_name" value="Fund My First Car">
<input type="hidden" name="item_number" value="1">
<input type="hidden" name="amount" value="5.00">
<input type="hidden" name="no_shipping" value="2">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="tax" value="0">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="bn" value="PP-DonationsBF">
<center>Please donate to my first car fund! Pay easily through PayPal or Credit Card (paypal account <b><u>not</u></b> required)
<p /><font color="#000000"><input type="submit" name="submit" value="  $1.00  " onclick="paypal.amount.value='1.00';" style="color: #000000;"><br /><input type="submit" name="submit" value="  $5.00  " onclick="paypal.amount.value='5.00';" style="color: #000000; font-weight: bold;"><br /><input type="submit" name="submit" value="  $10.00  " onclick="paypal.amount.value='10.00';" style="color: #000000;"><br /><input type="submit" name="submit" value="  $20.00  " onclick="paypal.amount.value='20.00';" style="color: #000000;"><br /><input type="submit" name="submit" value="  Custom Amount  " onclick="paypal.amount.value='';" style="color: #000000;"></font></center>
</form></td></table>
</td>
<tr><td width="207" height="51" valign="top"><img src="images/m5.jpg"></td>
<td background="images/b_links.jpg" style="background-repeat: no-repeat;" width="355" height="51" align="center"><a href="?page=home">Home</a> | <a href="?page=nomoney">No Money?</a> | <a href="?page=games">Games</a> | <a href="?page=contact">Contact Me</a><br />Copyright &copy;2007 13 Willows (website best viewed using <a href="http://www.getfirefox.com/">Firefox</a>)<br /><?php include("tracker.php"); ?></td><td width="213" height="51" valign="top"><img src="images/m6.jpg"></td>
</tr>
</table>
</body>
</html>