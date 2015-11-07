<table width="100%" height="24" border="0" cellpadding="4" cellspacing="0" class="header">
<tr>
<td align="left" width="60%"><a href="http://www.guildcube.com/" class="header">Home</a></td>
<td align="right"><a href="createGuild.php" class="header">Create a Guild Site</a></td>;
<?php
if (isset($_SESSION['user'])) {
	echo '<td align="right">Logged in as <a class="header" href="'.$domain.'/user.php?n='.$_SESSION['user'].'">' . $_SESSION['user'] . '</a> | <a class="header" href="'.$domain.'/login.php?logout">Logout</a></td>';
} else {
	echo '<td align="right"><a class="header" href="'.$domain.'/login.php">Login</a> | <a class="header" href="'.$domain.'/login.php?register">Register a New Account</a></td>';
}
?>
</tr>
</table>

<br />