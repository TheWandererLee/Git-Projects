<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Help Fund My First Car!</title>
<?php
function drawProgress($m, $minm, $maxm, $size) {
echo "<table bgcolor=\"#FFFFFF\" width=\"" . $size . "\" cellpadding=\"0\" cellspacing=\"0\">";
echo "<tr><td><table cols=\"2\" cellpadding=\"0\" cellspacing=\"0\" width=\"" . $size . "\"><tr><td align=\"left\">$" . $minm . "<td align=\"right\">$" . $maxm . "</table>";
echo "<tr><td height=\"27\">";
echo "<table bgcolor=\"#FFFFFF\" width=\"" . $size . "\" cellpadding=\"0\" cellspacing=\"0\">";
echo "<tr><td>";
echo "<tr><td height=\"27\">";
if ($maxm == 0) { $cur = $maxm; } else { $cur = (($m - $minm) / (($maxm - $minm) / 100)) * ($size / 100); }
$rem = $size - $cur;
$wid = 14;
$bgwid = 14;
$hei = 27;
for ($i=0; $i<floor($cur/$wid); $i++) { echo "<img src=\"images/loaderfg.png\">"; }
$barfl = floor($cur % $wid);
if ($barfl > 0) { echo "<img src=\"images/loaderfg.png\" height=\"27\" width=\"" . $barfl . "\">"; }

for ($i=0; $i<floor($rem/$bgwid); $i++) { echo "<img src=\"images/loaderbg.png\">"; }
$barfl = floor($rem % $bgwid);
if ($barfl > 0) { echo "<img src=\"images/loaderbg.png\" height=\"27\" width=\"" . $barfl . "\">"; }
echo "<tr><td><div style=\"position: relative; left: " . floor($cur - 4) . "px;\">^$" . $m . "</div>";
echo "</table></table>";
}
?>
</head>
<body bgcolor="#FFFFFF">

<!--<center><a href="#firstline"><img src="images/titlewide.png" border="0" alt="Fund My First Car"></a></center>-->
<center><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="750" height="182" id="title" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="flash/title.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" /><embed src="flash/title.swf" quality="high" bgcolor="#ffffff" width="750" height="182" name="title" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object></center>

<p /><table border="0" cellpadding="0" cellspacing="0" width="800" align="center"><tr><td>

<a href="index.php">Go back to the homepage</a><p />

Hey! Welcome to my website! I hope you've come to help fund my first car!

<p />Current progress of my first car fund:
<?php
$currentMoney = 138;
drawProgress($currentMoney . " since November 13th, 2006", 0, "??????", 640);
echo "<br />Second hundred dollars of my first car fund:<br />";
drawProgress($currentMoney, 100, 200, 320);
?>

<p />This is the car I will have with the funds I have now!
<br /><img src="images/cars/monopolyCar.jpg" width="120" height="90">
<br />It's the monopoly car! When I get to $200 I can get the flintmobile!
<br /><img src="images/cars/flintstonesCar.jpg" width="200" height="150">

<p />I can't wait! But still no motor, hope the passengers can run fast ;) Thanks to all the people who've given donations, I am extremely grateful!

So what kind of car am I going to get you say? Well, that just depends on you and all the others reading this page. If you are too lazy to take a couple minutes of your time, even to give a kid five dollars, and you leave here without donating a single dollar, this is what may become of my car:
<br /><img src="images/cars/junkCar.jpg">
<br />But if everyone finds it in their heart to part with just one of their dollar bills, or even more if they are a really kind person, then my car could look something like this:
<br />
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="512" height="256" id="carScroller" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="flash/carScroller.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" /><embed src="flash/carScroller.swf" quality="high" bgcolor="#ffffff" width="512" height="256" name="carScroller" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
<br />(Doubt it ;) but hey! A kid can dream can't he? I'll probably end up getting an old used car, fix it up, and try to sell it for a profit.

<p />Are you trying really hard to convince yourself that you can't give away just 5 dollars? Then <a href="index.php?page=nomoney">click here</a> and stop pretending that you don't want to help me out!

<br />&nbsp;&nbsp;&nbsp;&nbsp;<!--Just think about it, if every single person in america gives me 5 dollars, I'd have about <b>1.5 BILLION</b> dollars!!!!-->Please, PLEASE help fund my first car! Besides, what are you gonna get with 5 bucks? A toothbrush and some toothpaste? Instead, why not let your 5 dollar bill be a part of something bigger, something new, something with... 4 wheels (and neon lights, spinnin rims, plasma screen in the trunk... just kidding! as long as it gets me where I need to go :)
<br />&nbsp;&nbsp;&nbsp;&nbsp;*Recently alot of people have been coming to my website and telling me "What a great idea!" and then leaving without ever helping donate to my cause. :( If you're one of those people, may a volcano grow and erupt in your home tonight! (I claim no liability if this actually happens to you but I'm sure the news media would have a field day)
<br />&nbsp;&nbsp;&nbsp;&nbsp;So <i><u>please</u></i>, help fund my first car! Remember, this money is <u>NOT</u> going to some government corperation that already has way more money than they need, it is going to an exceptionally talented (and good looking if I might say so myself) 15 year old young man. All you have to do is give 5 dollars and you've helped an extremely thankful child on his quest to getting his dream car. Thankyou in advance!
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

<br />Pay quickly and easily through PayPal or Credit Card: <input type="submit" name="submit" value="  $1.00  " onclick="paypal.amount.value='1.00';"><input type="submit" name="submit" value="  $5.00  " onclick="paypal.amount.value='5.00';"><input type="submit" name="submit" value="  $10.00  " onclick="paypal.amount.value='10.00';"><input type="submit" name="submit" value="  $20.00  " onclick="paypal.amount.value='20.00';"><input type="submit" name="submit" value="  Custom Amount  " onclick="paypal.amount.value='';">
<br /><img style="width: 37px; height: 21px;" src="https://www.paypalobjects.com/en_US/i/logo/logo_ccVisa.gif" class="marginBottom" alt="Visa" border="0"><wbr><img src="https://www.paypalobjects.com/en_US/i/logo/logo_ccMC.gif" class="marginBottom" alt="Mastercard" border="0"><wbr><img src="https://www.paypalobjects.com/en_US/i/logo/logo_ccAmex.gif" class="marginBottom" alt="American Express" border="0"><wbr><img src="https://www.paypalobjects.com/en_US/i/logo/logo_ccDiscover.gif" class="marginBottom" alt="Discover" border="0"><wbr><img src="https://www.paypalobjects.com/en_US/i/logo/logo_ccEcheck.gif" class="marginBottom" alt="eCheck" border="0"><wbr><img src="https://www.paypalobjects.com/en_US/i/logo/PayPal_mark_37x23.gif" class="marginBottom" alt="PayPal" border="0">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

<p />Contact me with any questions or comments at <a href="mailto:DC@xaranda.net">DC@xaranda.net</a>

<p /><a href="index.php">Go back to the homepage</a>
</table>

<?php include("tracker.php"); ?>
</body>
</html>