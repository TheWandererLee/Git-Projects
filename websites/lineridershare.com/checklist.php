<?php session_start(); include("functions.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Line Rider Share - Suggestion Checklist</title>
</head>
<body>
<?php include("header.php"); ?>

<br /><h1 align="center" style="font-family: 'Lucida Calligraphy'; font-size: 24px;">Suggestion Checklist</h1>
<br /><center>I've gotten so many suggestions that I had to make one of these to keep track of them. None of these are final.<br />Finished suggestions are checked.</center>
<p />&nbsp;<p />
<?php
$c = array(
true
,true
,false
,false
,true
,true
,false
,true
,true
,true
,true
,true
,true
,true
,true
,true
,false
);
$s = array(
"Option of adding a youtube video as a \"preview\" of the Track. That way everything is a little more in depth than just a picture with the assorted lines."
,"Download a track directly from that track's Page. Instead of adding to your manager and then having to download."
,"See who's online and what they're doing<br /><i>Would take alot more work than it's worth</i>"
,"Along with most downloaded/view lists, maybe have the most viewed/downloaded usernames. (Maybe also add a view all users link, and order it by most viewed/downloaded.)"
,"On the Analyze page, maybe add how many views/downloads you have totalled from your tracks."
,"Have a featured list, and have you/someone else picks what they think are the best tracks."
,"Create categories for different tracks, such as Manual Tracks, or Off Sled Tracks. Either you/someone picks what category, or the users choose after they've uploaded it."
,"Add a comment and rating system"
,"Maybe register a .tk (dot.tk) if you want an easier to remember address, or register a .com if you want to spend the money.<br /><i>Obtained new address: <a href=\"http://share.linerider.org\">share.linerider.org</a></i>"
,"If a track is uploaded twice or just as a joke, and doesn't have a purpose to be there, users can flag it and it will be reviewed by you/someone else, and maybe deleted."
,"While viewing the page for a track, make it so you can click on the author's name so you can view all of their tracks."
,"Add a shoutbox near the bottom of the index, people like those"
,"A flag system, so users can point out tracks that are stolen or stupid (like single-line saves that weren't deleted)"
,"[AKA make tracks private] A 'preview only' option would be nice. [In the works?]Maybe a download with permission option."
,"An option to put all tracks you've uploaded into your manager"
,"Size info (width x height) for tracks in the analyzer"
,"(Private) Messaging system"
);

echo '<table cellpadding="0" cellspacing="8">';
for ($i=0;$i<count($c);$i++) {
	echo '<tr><td align="right">' . ($i+1) . '.</td><td><input type="checkbox"';
	if ($c[$i] == true) { echo ' checked="yes"'; }
	echo ' disabled="yes"></td><td>' . $s[$i] . '</td></tr>';
}
echo '</table>';
?>
</body>
</html>