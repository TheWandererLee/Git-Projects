<center><table cellspacing="0" cellpadding="0" border="0" bordercolor="#FFFFFF" align="center">
	<table cellpadding="0" cellspacing="12" border="0">
		<tr><td><a href="index.php">Home</a></td><td><a href="about.php">About Me</a></td><td><a href="wedding.php">Wedding</a></td><td><a href="creative.php">Creative</a></td><td><a href="beach.php">Beach Portraits</a></td><td><a href="contact.php">Contact</a></td>
		<?php if($_SESSION['user'] == 'jrizzle') { echo '<td><b>[ <a href="admin.php" style="color: #CCCCFF;">Admin</a> | <a href="admin.php?out" style="color: #FFCCCC;">Logout</a> ]</b></td>'; } ?></tr>
	</table>
</table></center>