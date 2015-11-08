<!-- Google Analytics -->
<script type="text/javascript">var _gaq = _gaq || [];_gaq.push(['_setAccount', 'UA-389885-7']);_gaq.push(['_trackPageview']);(function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script>
<?php
include("style.css");
?>
<br />
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr><td colspan="3" align="center" class="homebar">
<a href="http://www.linerider.org/" class="homelink">Linerider.org</a> - <a href="http://www.linerider.org/forum" class="homelink">Forum</a>
</td></tr>
<tr><td class="homebar" align="left" width="25%">
	<?php echo '<b>' . date('F jS, Y') . '</b>'; ?>
</td><td class="homebar" align="center" width="50%">
		<?php
			echo '| ';
			echo '<a href="index.php" class="homelink">Home</a>';
			if (isset($_SESSION['user'])) {
				echo ' | <a href="manager.php" class="homelink">Manager</a>';
				echo ' | <a href="analyze.php" class="homelink">Analyze</a>';
			}
			echo ' | <a href="faq.php" class="homelink">FAQ</a>';
			echo ' | <a href="tracks.php" class="homelink">All Tracks</a>';
			if (rights($_SESSION['user']) == 'admin') {
				echo ' | <a href="admin.php" style="color: #CC0000; font-weight: bold;">Admin</a>';
			}
			if (rights($_SESSION['user']) == 'admin' || rights($_SESSION['user']) == 'moderator') {
				echo ' | <a href="moderator.php" style="color: #00CC00; font-weight: bold;">Mod</a>';
			}
			echo ' |';
		?>
	<!--| <a target="_parent" href="http://www.linerider.org" class="homelink">Home</a> | <a target="_parent" href="http://www.linerider.org/forum/index.php" class="homelink">Forum</a> | <a target="_parent" href="http://www.linerider.org/downloads.php" class="homelink">Downloads</a> | <a target="_parent" href="http://www.linerider.org/movies/" class="homelink">Movies</a> | <a target="_parent" href="http://share.linerider.org/" class="homelink">Share</a> |-->
	</td><td class="homebar" align="right" width="25%">
		<?php
			if (isset($_SESSION['user'])) {
				echo 'Logged in as <b>' . $_SESSION['user'] . '</b>. <a href="login.php?logout=true">Logout</a>';
			} else {
				echo '<a href="login.php">Login</a> | <a href="login.php?r=true">Register</a>';
			}
			echo '<br />';
			echo '<form name="searchForm" action="search.php" method="post">';
			echo '<script>sclicked = false;</script>';
			echo '<input type="text" name="search" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; color: #999999;" size="24" value="Search" onclick="if (sclicked == false) { this.style.color = \'#000000\'; this.value = \'\'; sclicked = true; document.getElementById(\'searchGo\').disabled = false; }"><input type="image" id="searchGo" src="images/search.gif" align="top" disabled="true">';
			echo '</form>';
		?>
	</td></tr></table>
<br />