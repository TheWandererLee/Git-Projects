<?php session_start(); include("functions.php");

if (rights($_SESSION['user']) != 'admin') {
	header("Location: index.php");
	exit;
}

phpinfo();
?>