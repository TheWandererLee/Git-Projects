<?php

/*
* include files
*
*/

include("ini.php");
include("session.php");
include("db.php");
include("config.php");
include("functions.php");

/*
* Send headers to prevent IE cache
*
*/

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" ); 
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" ); 
header("Cache-Control: no-cache, must-revalidate" ); 
header("Pragma: no-cache" );
header("Content-Type: text/xml; charset=utf-8");

/*
* update user
*
*/

updateUser();

/*
* virtual credits
*
*/

virtualCredits();

/*
* eCredits
*
*/

if($_SESSION['eCreditsInit'] == '1')
{
	if($_SESSION['eCreditsAwardTo'] != $_SESSION['myProfileID'])
	{
		eCredits($_SESSION['eCreditsAwardTo']);
	}
}

/*
* start XML file
*
*/

$xml = '<?xml version="1.0" ?><root>';

/*
* display last messages
*
*/

$displayAll = " LIMIT ".($CONFIG['dispLastMess'] + 1);

if($_GET['history'] == 0)
{
	$showApproved = "AND username != '".makeSafe($_SESSION['username'])."'";
	$displayAll = "";	
}

/*
* moderated chat plugin
* hides messages from users
*/

if($CONFIG['moderatedChatPlugin'])
{
	if(!getAdmin($_SESSION['username']) && !getModerator($_SESSION['username']) && !getSpeaker($_SESSION['username']))
	{
		$showApproved = '';
	}
}

/*
* get messages from database
*
*/

$userLogout = '';

$tmp=mysql_query("
	SELECT id, uid, mid, username, tousername, message, sfx, room, messtime 
	FROM prochatrooms_message
	WHERE room = '".makeSafe($_GET['roomID'])."'
	AND id > '".makeSafe($_GET['last'])."'
	".$showApproved."
	AND tousername = ''
	OR room = '".makeSafe($_GET['roomID'])."'
	AND id > '".makeSafe($_GET['last'])."'
	AND tousername = '".makeSafe($_SESSION['username'])."'
	OR id > '".makeSafe($_GET['last'])."'
	AND tousername = '".makeSafe($_SESSION['username'])."'
	OR id > '".makeSafe($_GET['last'])."'
	AND share = '1'
	AND tousername = '".makeSafe($_SESSION['username'])."' 
	OR id > '".makeSafe($_GET['last'])."'
	AND share = '1'
	AND username = '".makeSafe($_SESSION['username'])."' 
	".$displayAll."
   ") or die(mysql_error()); 

while($i = mysql_fetch_array($tmp)) 
{
	if(!$i['username'])
	{
		die;
	}

	$xml .= '<usermessage>';
	$xml .= '<id>' . ($i['id']) . '</id>';
	$xml .= '<uid>' . ($i['uid']) . '</uid>';
	$xml .= '<mid>' . ($i['mid']) . '</mid>';
	$xml .= '<username>' . stripslashes($i['username']) .'</username>';

	// if tousername is null
	if(!$i['tousername'])
	{
		$i['tousername']='_';
	}

	$xml .= '<tousername>' . stripslashes($i['tousername']) . '</tousername>';
	$xml .= '<message>' . stripslashes(urldecode($i['message'])) . '</message>';
	$xml .= '<room>' . ($i['room']) . '</room>';
	$xml .= '<sfx>' . ($i['sfx']) . '</sfx>';
	$xml .= '<timestamp>' . ($i['messtime']) . '</timestamp>';
	$xml .= '</usermessage>';

	// check if user has been silenced
	// if so, set silence start time
	if($i['message'] == 'SILENCE' && $i['tousername'] == $_SESSION['username'])
	{
		if(!$_SESSION['silenceStart'] || $_SESSION['silenceStart'] < date("U")-($CONFIG['silent']*60))
		{
			$_SESSION['silenceStart'] = date("U");
		}
	}
}

/*
* get users from database
* 
*/

// single room
$singleRoom = "";

if($_REQUEST['s'])
{
	$singleRoom = "AND room = '".makeSafe($_GET['roomID'])."'";
}

// get users within last 5 mins
$onlineTime = getTime()-300;

// check user activity 
$offlineTime = getTime()-$CONFIG['activeTimeout'];

$tmp=mysql_query("
	SELECT id, username, userid, prevroom, room, avatar, webcam, active, online, status, watching, eCredits, guest, lastActive, userIP 
	FROM prochatrooms_users 
	WHERE username != '' 
	AND active > '".$onlineTime."'
	".$singleRoom."
	GROUP BY room, username ASC
	") or die(mysql_error()); 

while($i = mysql_fetch_array($tmp)) 
{
	$showAllUsers = 1;

	if(invisibleAdmins($i['username']))
	{
		$showAllUsers = 0;
	}

	if($showAllUsers == 1)
	{
		$iAdmin = 0;

		if(getAdmin($i['username']))
		{
			$iAdmin = 1;
		}

		$iModerator = 0;

		if(getModerator($i['username']))
		{
			$iModerator = 1;
		}

		$iSpeaker = 0;

		if(getSpeaker($i['username']))
		{
			$iSpeaker = 1;
		}
		
		$i['userid'] = empty($i['userid']) ? "0" : $i['userid'];
		$i['room'] = empty($i['room']) ? "0" : $i['room'];

		$xml .= '<userlist>';
		$xml .= '<id>' . ($i['id']) . '</id>';
		$xml .= '<userid>' . stripslashes($i['userid']) . '</userid>';
		$xml .= '<username>' . stripslashes($i['username']) . '</username>';
		$xml .= '<avatar>' . stripslashes($i['avatar']) . '</avatar>';
		$xml .= '<webcam>' . ($i['webcam']) . '</webcam>';
		$xml .= '<room>' . ($i['room']) . '</room>';
		$xml .= '<prevroom>' . ($i['prevroom']) . '</prevroom>';
		$xml .= '<admin>' . $iAdmin . '</admin>';
		$xml .= '<moderator>' . $iModerator . '</moderator>';
		$xml .= '<speaker>' . $iSpeaker . '</speaker>';

		// set user to online
		$status = '1';

		// if user hasnt been active within $offlineTime
		if($i['active'] < $offlineTime)
		{
			// set user to offline
			$status = '0';

			if($i['online'] == '1')
			{
				// update user status
				logoutUser($i['username'],$i['room']);
			}
		}

		$xml .= '<status>' . $status . '</status>';
		$xml .= '<ustatus>' . ($i['status']) . '</ustatus>';

		if(!$i['watching'])
		{
			$i['watching'] ='0';
		}

		$xml .= '<uwatch>' . ($i['watching']) . '</uwatch>';
		$xml .= '<ucreditson>' . $CONFIG['eCreditsOn'] . '</ucreditson>';
		$xml .= '<ucreditstotal>' . ($i['eCredits']) . '</ucreditstotal>';
		$xml .= '<ugroupcams>' . $_SESSION['groupCams'] . '</ugroupcams>';
		$xml .= '<ugroupwatch>' . $_SESSION['groupWatch'] . '</ugroupwatch>';
		$xml .= '<ugroupchat>' . $_SESSION['groupChat'] . '</ugroupchat>';
		$xml .= '<ugrouppchat>' . $_SESSION['groupPChat'] . '</ugrouppchat>';
		$xml .= '<ugrouprooms>' . $_SESSION['groupRooms'] . '</ugrouprooms>';
		$xml .= '<uactive>' . ($i['active']) . '</uactive>';
		$xml .= '<ulastactive>' . ($i['lastActive']) . '</ulastactive>';     
      	$xml .= '<uloginIP>' . ($i['userIP']) . '</uloginIP>';			
		$xml .= '</userlist>';

	}
}

/*
* get rooms from database
* 
*/

// room settings
$singleRoom = "";

if($_REQUEST['s'])
{
	$singleRoom = " WHERE id = '".makeSafe($_GET['roomID'])."'";
}

if(!$_REQUEST['s'])
{
	$singleRoom = " WHERE roomname != 'User Room'";
}

$tmp=mysql_query("
	SELECT id, roomid, roomname, roomowner, roomusers, roomcreated     
	FROM prochatrooms_rooms 
	".$singleRoom." 
	ORDER BY ABS(id) ASC 
	") or die(mysql_error()); 

while($i = mysql_fetch_array($tmp)) 
{
	$xml .= '<userrooms>';
	$xml .= '<id>' . ($i['id']) . '</id>';
	$xml .= '<roomid>' . ($i['id']) . '</roomid>';
	$xml .= '<roomname>' . stripslashes($i['roomname']) . '</roomname>';
	$xml .= '<roomowner>' . ($i['roomowner']) . '</roomowner>';
	$xml .= '<roomusers>' . ($i['roomusers']) . '</roomusers>';

	$deleteRoom = '0';

	if($i['roomusers'] == '0' && getTime()-60 >= $i['roomcreated'] && $i['roomowner'] != '1')
	{
		// was  - if($_REQUEST['s'] && !$CONFIG['one2onePlugin'])
		// did not delete users created rooms, so we updated it too,

		if(!$CONFIG['one2onePlugin'])
		{
			$deleteRoom = '1';
		}
	}

	$xml .= '<roomdel>' . $deleteRoom . '</roomdel>';
	$xml .= '<moderated>' . moderatedChat() . '</moderated>';
	$xml .= '</userrooms>';
}

/*
* end XML file
*
*/

$xml .= '</root>';

/*
* show XML output
*
*/

echo $xml;

/*
* write/close session
* http://php.net/manual/en/function.session-write-close.php
*/

session_write_close();

?>