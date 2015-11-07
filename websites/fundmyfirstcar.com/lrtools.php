<?php
echo '<br /><br /><br /><br /><br /><br /><br /><br />';
echo '<div align="center">';
echo 'LR Tools is no longer available for download.';
echo '<br />It is now out of date as it only edits Line Rider v1 tracks.';
echo '<br /><a href="files/LR Tools Original.zip">Here is the source code</a> in VB .NET format if you are a programmer.';
echo '<br /><br /><br /><br /><br /><br />';
echo '<a href="http://linerider.13willows.com">Click here</a> to visit Line Rider Share. There you can convert your v1 tracks to v2 and share them with other users.';
echo '<br /><br /><br /><br /><br /><br />';
echo '<a href="http://www.fundmyfirstcar.com" style="bold">www.fundmyfirstcar.com</a>';
echo '</div>';
exit();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Download LR Tools</title>
<style type="text/css">
<!--
a {
color: #000066;
text-decoration: none;
}
a:hover {
text-decoration: underline;
color: #6699FF;
}
h3 {
text-decoration: underline;
}
-->
</style>
</head>
<body>

<center><img src="images/lrtoolstitle.png" alt="LR Tools Graffiti"></center>
<p />&nbsp;<p />

<h3>Features</h3>
<p /><ul>
<li>Draw lines and curves on existing tracks
<li>Zoom In &amp; Out
<li>Rename tracks
<li>Erase lines
<li>Change the starting point of the rider
<li>Download other people's tracks and publish your own through Line Rider Network
<li>More to come in the future!
</ul>

<p />&nbsp;<p /><center><a href="LR Tools.exe" style="font-size: 36px;"><img src="images/lrtoolsl.png" width="48" height="48" border="0" alt="LR Tools Icon" align="middle"> Download LR Tools <img src="images/lrtoolsr.png" width="48" height="48" border="0" alt="LR Tools Icon" align="middle"></a></center>

<p />First thing you need to do after you get the program started is select the website that you mostly play line rider on. If it is on deviantART or iscribble.org, then click one of the buttons above, otherwise, pick one from the list below (IMPORTANT: deviantART and iscribble.org will NOT work if you select them from the bottom list, you must use the buttons on top.)
<br />After you've done that, simply go to File --> Open in the menu and you should see a file called "undefined.sol", open that.

<p /><h3>F.A.Q.</h3>
<p /><b>Q.</b> The program won't work for me, it says something about .NET Framework/Failed to initialize properly
<br /><b>A.</b> Your computer is most likely missing the latest .NET Framework which is required to run most new released programs. You can <a href="http://www.microsoft.com/downloads/details.aspx?FamilyID=0856eacb-4362-4b0d-8edd-aab15c5e04f5&displaylang=en">download it here</a>.
<p /><b>Q.</b> The undefined.sol file doesn't show up when I click File --> Open in the menu
<br /><b>A.</b> If the file is not there, you might have selected the wrong website, or you haven't saved any tracks on this website yet. Go make a track on that site with at least one line in it, save it, and close the browser. Then try again, if you still can't find the undefined.sol file, refer to <a href="http://www.linerider.org/forum/showthread.php?t=423">this manual</a> on finding your .sol file.
<p /><b>Q.</b> How do I play a track saved with LR Tools/I've saved a track but it doesn't change when I go to play it
<br />A.</b> To play saved tracks, you first have to close Line Rider if you're playing it right now, then save/rename the file to "undefined.sol" all other files will be ignored. Then load up Line Rider again, and load your track normally with Line Rider
<p /><b>Q.</b> The program shows me an error when I...
<br /><b>A.</b> Click Continue and please tell me about this error using the box at the bottom of this site, what you were doing when it happened, and what the error message is. Remeber, this is only a beta test, it is bound to have errors unknown to me.

<p /><table align="center" border="0"><br />
<tr><td align="center"><b>If you have a question, found an error, or just want to leave a comment, feel free to do it here!</b><br /><b><u>Make sure</u> that you check the F.A.Q. above to see how to solve how error/answer your question!</b>
<tr><td align="center">
<?php
if (isset($_REQUEST['submit']) && $_REQUEST['message'] != "") {
if ($_REQUEST['email'] != "") { $from = "From: " . $_REQUEST['email']; } else { $from = 'From: LR_Tools_Mailer@fundmyfirstcar.com'; }
mail("DC@xaranda.net", "LR Tools Question/Comment", $_REQUEST['message'], $from);
echo 'Thanks for leaving a comment! I will read it shortly and reply if necessary.';
}
echo '<p /><form action="lrtools.php" method="post">';
echo 'Email (if you want a reply): <input type="text" name="email">';
echo '<br />Question/Comment:<br /><textarea rows="6" cols="50" name="message"></textarea>';
echo '<br /><input type="submit" name="submit" value="Send!">';
echo '</form>';
?>
</table>

<a href="index.php">Please donate to help keep this program free!</a>
<?php include("tracker.php"); ?>
</body>
</html>