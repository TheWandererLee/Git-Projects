<div class="mainheadermenu">
	<span class="menu">
		<a href="?option=home">Home</a> | 
		<a href="http://community.prochatrooms.com/viewforum.php?f=78" target="_blank">Tutorials</a> | 
		<a href="?option=users">Users</a> | 
		<a href="?option=profiles">Profiles</a> | 
		<a href="?option=transcripts">Transcripts</a> | 
		<a href="?option=bans">Bans</a> | 
		<a href="?option=rooms">Rooms</a> | 
		<a href="?option=groups">Groups</a> | 
		<?php if(file_exists("../plugins/adverts/index.php")){?>
			<a href="?option=adverts">Adverts</a> | 
		<?php }?>
		<a href="?option=settings">Settings</a> | 
		<?php if(file_exists("../plugins/games/index.php")){?>
			<a href="?option=games">Games</a> | 
		<?php }?>
		<?php if(!$CONFIG['CMS']){?>
			<a href="?option=email">Email</a> | 
		<?php }?>
		<a href="?option=database">Database</a> | 
		<a href="?option=logout">Logout</a>
	</span>
</div>