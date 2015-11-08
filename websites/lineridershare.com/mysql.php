<?php
session_start(); include("functions.php"); database_connect();

if (rights($_SESSION['user']) != 'admin') {
	header("Location: index.php");
	exit;
}

/*
mysql_query("CREATE TABLE tracks(
id INT NOT NULL AUTO_INCREMENT,      <------ FOR AUTO INCREMENTING VALUES
PRIMARY KEY(id),
author VARCHAR(15),
description VARCHAR(999),
views INT,
downloads INT,
rating VARCHAR(999),
private VARCHAR(3),
created INT,
preview VARCHAR(999),
smallpreview VARCHAR(999))") or die (mysql_error());
*/

/*
mysql_query("CREATE TABLE tracks(
id INT,
PRIMARY KEY(id),
label VARCHAR(32),
author VARCHAR(15),
description VARCHAR(999),
views INT,
downloads INT,
rating VARCHAR(999),
private VARCHAR(3),
created INT,
preview VARCHAR(999),
smallpreview VARCHAR(999))") or die (mysql_error());

echo "Created table<br />";
*/

/*
$j=0;
for ($i=0;$i>-1;$i++) {
	if (file_exists("tracks/" . $i . ".track")) {
		mysql_query("INSERT INTO tracks
		(id,label,author,description,views,downloads,rating,private,created,preview,smallpreview) VALUES
		(" . $i . ", '" . getInfo($i, "label") . "', '" . getInfo($i, "author") . "', '"
		. getInfo($i, "description") . "', " . getInfo($i, "views") . ", " . getInfo($i, "downloads") . ", '"
		. getInfo($i, "rating") . "', '" . getInfo($i, "private") . "', " . getInfo($i, "created") . ", '"
		. getInfo($i, "preview") . "', '" . getInfo($i, "smallpreview") . "')");
		echo "ID #" . $i . " - " . getInfo($i, "label") . "<br />";
		$j = 0;
	} else {
		$j++;
	}
	if ($j > 1000) { break; }
}
echo "Filled table<br />";
*/

/*
$file = fopen("users.dat", "r");
$users = fread($file, filesize("users.dat"));
fclose($file);
$users = explode("\r\n", $users);
$uInfo = 4;
echo '<br /><br />-------RUNNING---------<br /><br />';
for ($i=0;$i<count($users);$i+=$uInfo) {
	mysql_query("INSERT INTO users
	(name,pass,email,joined) VALUES (".($i/$uInfo).",'".$users[$i]."', '".$users[$i+1]."', '".$users[$i+2]."', ".$users[$i+3].")");
	echo "Adding: ".$users[$i].", ".$users[$i+1].", ".$users[$i+2].", ".$users[$i+3]."<br />";
}
*/


/*
echo '<br /><br />=================<br /><br />';

$result = mysql_query("SELECT * FROM tracks");

echo '<table border="1" cellpadding="4" cellspacing="0">';
while ($row = mysql_fetch_array($result)) {
	echo '<tr><td>';
	echo $row['id'] . '</td><td>' . $row['label'] . '</td><td>' . $row['author'] . '</td><td>' .
	substr($row['description'], 0, 10) . '</td><td>' . $row['views'] . '</td><td>'
	 . $row['downloads'] . '</td><td>' . $row['rating'] . '</td><td>'
	  . $row['private'] . '</td><td>' . $row['created'] . '</td><td>'
	   . $row['preview'] . '</td><td>' . $row['smallpreview'];
	echo '</td></tr>';
}
echo '</table>';
*/

?>