<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Jared Cline Photography - Contact</title>
<?php include("style.php"); include("functions.php"); ?>
</head>
<body>
<div align="center"><img src="images/contactheader.jpg"></div>
<?php include("navigation.php"); ?>
<?php
$mailer = '';
if ($_REQUEST['check'] == 'yes' && !empty($_REQUEST['email']) && !empty($_REQUEST['message'])) {
	mail('JDCPhoto@atmc.net', 'Email from jaredcline.com', $_REQUEST['message'], 'From: ' . $_REQUEST['email']);
} elseif($_REQUEST['check'] == 'yes') {
	$mailer .= '<br /><center><font color="#FF0000">Please enter your email address and message.</font></center>';
}

if ($_REQUEST['check'] == 'yes' && !empty($_REQUEST['email']) && !empty($_REQUEST['message'])) {
	$mailer .= '<br />'
	.'<center><font color="#00FF00">Thanks for contacting me.</font></center>';
} else {
	$mailer .= '<br />'
	.'<form action="contact.php" method="post">'
	.'<input type="hidden" name="check" value="yes">'
	.'<table cellspacing="8" cellpadding="0" border="0" align="center">'
	.'<tr><td align="right">Name:</td><td><input type="text" name="name" size="45"></td></tr>'
	.'<tr><td align="right">Your Email:</td><td><input type="text" name="email" size="45"></td></tr>'
	.'<tr><td colspan="2" align="center">Message</td></tr>'
	.'<tr><td colspan="2" align="center"><textarea cols="40" rows="8" name="message"></textarea></td></tr>'
	.'<tr><td colspan="2" align="center"><input type="submit" value="Contact Me"></td></tr>'
	.'</table>'
	.'</form>';
}

$contact = getInfo("contact");
$contact = str_replace("%mailer%", $mailer, $contact);
echo '<center>' . $contact . '</center>';
?>
</body>
</html>