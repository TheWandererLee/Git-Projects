<?php

/*
* include files
*
*/

include("../../includes/ini.php");
include("../../includes/db.php");

/*
* get data
*
*/

$tmp = mysql_query("
			SELECT prochatrooms_users.id, prochatrooms_users.username 
			FROM prochatrooms_users, prochatrooms_profiles 
			WHERE prochatrooms_users.id = prochatrooms_profiles.id
			AND prochatrooms_users.username !='' 
			ORDER BY active DESC 
			LIMIT 10 
			") or die(mysql_error());

/*
* declare content header
*
*/

header("content-type: application/x-javascript");

/*
* function to shorten usernames
* change value for $newLength
*/

function shortName($name)
{
	$newLength = 12;

	if(strlen(urldecode($name)) > $newLength)
	{
		$name = substr($name, 0, $newLength)."...";
	}	

	return $name;
}

/*
* show photos
*
*/

echo "function showGallery(){ ";
echo 'var galleryHTML = ""; ';
echo 'galleryHTML += "<div class=\'loginUserTableHeader\'><span class=\'loginUserTable\'>:: Recent Logins</span></div>"; ';
echo 'galleryHTML += "<div style=\'width:520px;padding-top:10px;\'>"; ';

while($i = mysql_fetch_array($tmp)) 
{
	echo 'galleryHTML += "<div style=\'float: left; text-align: center; padding: 5px 5px 5px 5px; \' >"; ';
	echo 'galleryHTML += "<span class=\'loginUserTable\'><img src=profiles/view.php?id='.$i['id'].' height=\'78\' width=\'90\' alt=\'"+decodeURI(\''.$i['username'].'\')+"\' title=\'"+decodeURI(\''.$i['username'].'\')+"\'><br>"+decodeURI(\''.shortName($i['username']).'\')+"</span>"; ';
	echo 'galleryHTML += "</div>"; ';
}

echo 'galleryHTML += "<div>"; ';
echo 'document.getElementById(\'latestMembers\').innerHTML = galleryHTML; ';
echo "} ";

echo "window.onload = function(){showGallery();}";

?>