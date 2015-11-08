<?php session_start(); include("functions.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Line Rider Share - F.A.Q.</title>

<style type="text/css">

body {

margin-bottom: 24px;

}

h1 {

font-family: "Lucida Calligraphy", "Monotype Corsiva", cursive;

font-size: 36px;

}

h2 {

font-family: "Lucida Calligraphy", "Monotype Corsiva", cursive;

font-size: 24px;

}

.q {

font-size: 18px;

font-weight: bold;

}

.a {

padding-left: 1em;

font-size: 16px;

font-weight: bold;

}

.question {

font-size: 14px;

font-weight: bold;

text-decoration: underline;

}

.answer {

font-size: 11px;

padding-left: 1em;

}

</style>

</head>

<body>

<?php include("header.php"); ?>



<h1 align="center">Frequently Asked Questions</h1><br />

<?php 

$q = array("Where can I find my tracks?",

"Where do I upload my .sol file?",

"How do I download tracks?",

"What's the difference between removing and deleting a track?",

"Can I convert a Beta 1 track to a Beta 2 track?",

"Can I post a preview of my track on my website/forum/etc.?",

"How do I change the description/name of my track?",

"Why does my track preview look like someone elses track?");



$a = array("Here is a good tutorial on how to find your .sol file (also where to save your downloaded tracks): <a href=\"#\" onclick=\"window.open('findsol.php', 'findsol', 'scrollbars, width=512, height=420');\">Click here to read it. (opens in a new window)</a><br /><br />On windows XP: *Make sure hidden files &amp; folders are shown (see note below) then navigate to this folder: C:\Documents and Settings\[YOUR USERNAME]\Application Data\Macromedia\Flash Player\#SharedObjects\[RANDOM CHARACTERS]\[WEBSITE YOU PLAY LINERIDER ON]<br />On Vista: C:\Users\[YOUR USERNAME]\AppData\Roaming\Macromedia\Flash Player\#SharedObjects\[RANDOM CHARACTERS]\[WEBSITE YOU PLAY LINERIDER ON]<br />On Mac: /Users/Short name/Library/Preferences/Macromedia/Flash Player/#SharedObjects/[RANDOM CHARACTERS]/[WEBSITE YOU PLAY LINERIDER ON]<br />&nbsp;<br />Sorry it's so long, best bet is to make a shortcut on your desktop, <b>if you still can't find it, try <a href=\"http://www.linerider.org/forum/showthread.php?t=6510\">Chih's tutorial</a> for windows XP</b>.<br />If your system is not listed and you know where to find the file, please contact me so I can add it.",

"First you must register, (link in the top right corner) then go to your track manager (Manager link at top) and click browse. Choose the .sol file and press Upload!",

"Go to the track page of the track you want to download while you are logged in. Click the \"Add Track to Manager\" button to add the track to your manager. Then, go to your manager (link at top) and click the button that says \"Download Tracks\". All the tracks in your manager will be dynamically compiled into one .sol file for you to download.",

"Removing a track (<img src=\"images/remove.gif\">) will take that track off your manager so you don't have to download it, but it will still exist for others to download it and add to their managers. Deleting a track (<img src=\"images/delete.gif\">) will permanently erase all data for that track from Line Rider Share",

"Yes and no, beta 1 tracks can be converted to beta 2 simply by uploading them like you would a normal .sol. However, the physics in line rider beta 1 are slightly different from beta 2, so he will most likely not ride the same.",

"Yes. The url for the preview is \"http://share.linerider.org/images/preview.php?id=#\" where # is your track ID (found in the title bar). There are alot more options you can specify in the title bar but there are so many I will have to list them later.",

"Make sure you are logged in, then go to the page with your track on it. Beside the name and description is a small pencil icon (<img src=\"images/edit.gif\">), click on that and it will allow you to edit that field. When you are done, click the checkmark icon (<img src=\"images/check.gif\">).",

"The image could still be loading from an old cache file used to speed up image rendering. Try scrolling to the bottom of the track page and clicking Clear Cache.");



echo '<table align="center" cellpadding="0" cellspacing="8">';

for ($i=0;$i<count($q);$i++) {

echo '<tr><td class="q" valign="top">Q.</td><td class="question">' . $q[$i] . '</td>';

echo '<tr><td class="a" valign="top">A.</td><td class="answer">' . $a[$i] . '</td>';

if ($i<count($q)) { echo '<tr><td height="16"></td></tr>'; }

}

echo '</table>';

?>



<br />

*Note: If you cannot find the Application Data folder, you have to show hidden files &amp; folders. Go to Control Panel - Folder Options (or Appearance &amp; Themes - Folder Options) - Click on the 'View' tab - Below where it says 'Hidden Files and Folders' check 'Show Hidden Files and Folders'.

<!--
<br />

<h2 align="center">Contact Me</h2>

<center>If you still have a question, suggestion, or comment please feel free to contact me via the form below.</center>

<?php

	$error = '';

	if ($_POST['check'] == "yes") {

		if (empty($_POST['message'])) {

			$error .= 'You must type in a message.';

		} else {

			switch ($_POST['type']) {

			case 'q':

				$subject = 'Question';

				break;

			case 's':

				$subject = 'Suggestion';

				break;

			case 'c':

				$subject = 'Comment';

				break;

			case 'b':

				$subject = 'Bug Report';

				break;

			default:

				$subject = 'Message';

			}

			$_POST['message'] = str_replace("\\'", "'", $_POST['message']);

			$_POST['message'] = str_replace('\\"', '"', $_POST['message']);

			$us = ' from ';

			if (isset($_SESSION['user'])) { $us .= $_SESSION['user']; } else { $user = ''; }
			
			mail("webmaster@13willows.com", "LRShare " . $subject . $us, $_POST['message'], 'From: ' . $_POST['email']);

		}

	}

	

	if (empty($error) && $_POST['check'] == 'yes') {

		echo '<center><font style="color: #00AA00"><b>Thanks for contacting me.<br />';

		if ($_POST['type'] == 'q') { echo 'I will try to answer your question ASAP.'; }

		elseif ($_POST['type'] == 's') { echo 'I will consider your suggestion and contact you if I plan to include it.'; }

		elseif ($_POST['type'] == 'c') { echo 'I will receive your comment shortly.'; }

		elseif ($_POST['type'] == 'b') { echo 'I will try to fix this error ASAP.'; }

		else { echo 'I will receive your message shortly.'; }

		echo '</b></center>';

	} else {

?>

<form name="mailer" action="~~~~~~~~~~~faq.php~~~~~~~~~~~~~~~~" method="post">

<input type="hidden" name="check" value="yes">

<table cellpadding="0" cellspacing="8" border="0" align="center">

<?php if (!empty($error)) { echo '<tr><td colspan="2"><b style="color: #FF0000">' . $error . '</b></td></tr>'; } ?>

<tr><td colspan="2" align="center">[ <input type="radio" name="type" value="q" checked="checked"> Question ] [ <input type="radio" name="type" value="s"> Suggestion ] [ <input type="radio" name="type" value="c"> Comment ] [ <input type="radio" name="type" value="b"> Report a bug ] [ <input type="radio" name="type" value="o"> Other ]</td></tr>

<?php

if (isset($_SESSION['user'])) {

	$users = explode("\r\n", file_get_contents("users.dat"));

	$uInfo = 4;

	$em = '';

	for ($i=0;$i<count($users);$i+=$uInfo) {

		if ($users[$i] == $_SESSION['user']) { $em = decode($users[$i+2]); break; }

	}

}

?>

<tr><td align="right">Your Email*:</td><td><input type="text" name="email" size="64" value="<?php echo $em ?>"></td></tr>

<tr><td colspan="2" align="center"><u>Message</u></td></tr>

<tr><td colspan="2" align="center"><textarea name="message" cols="64" rows="8"></textarea></td></tr>

<tr><td colspan="2" align="center"><input type="submit" value="Send!"></td></tr>

</table>

<center>*Don't forget to enter your email if you want a reply</center>

</form>
-->

<?php } ?>



<?php include("tracker.php"); ?>

</body>

</html>