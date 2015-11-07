<?php
	session_start();
	$nl = "\n";
	$domain = "http://www.guildcube.com";
	if (substr($_SERVER['HTTP_HOST'], 0, 4) != 'www.' && substr($_SERVER['HTTP_HOST'], 0, 10) != 'guildcube.') {
		header('location: ' . $domain . '/' . substr($_SERVER['HTTP_HOST'], 0, strpos($_SERVER['HTTP_HOST'], '.'))); //Redirect subdomains to actual folder (to retain SESSION variables)
		exit();
	}
	include("functions.php");
	database_connect();
?>