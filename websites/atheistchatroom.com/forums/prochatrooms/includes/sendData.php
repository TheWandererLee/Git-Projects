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
* set time of last post
*
*/

$_SESSION['userLastPost'] = getTime();

/*
* check data before sending to DB
*
*/ 

function checkData($data)
{
	$key = 'index.php?logout';

	$pos = strpos(strtolower($data), $key);

	if ($pos !== false) 
	{
		die($data." contains invalid characters");
	}
	else
	{
		return $data;
	}

}

function checkNumeric($data)
{
	if(!is_numeric($data))
	{
		die($data." value not numeric");		
	}
	else
	{
		return $data;
	} 
}

/*
* eCredits
*
*/

if(isset($_POST['eCreditID']))
{
	if(checkNumeric($_POST['eCreditID']) && $_POST['eCreditStatus'] == 'on')
	{
		$_SESSION['eCreditsInit'] = '1';

		if(!checkNumeric($_POST['eCreditID']))
		{
			 $_POST['eCreditID'] = '0';
		}

		$_SESSION['eCreditsAwardTo'] = $_POST['eCreditID'];
		$_SESSION['eCredits_start'] = date("U");
	}
	else
	{
		unset($_SESSION['eCreditsInit']);
		unset($_SESSION['eCreditsAwardTo']);
		unset($_SESSION['eCredits_start']);
	}
}

/*
* send data to database
*
*/

if($_POST)
{
	$share = '0';

	// check data

	if(isset($_POST['umessage']))
	{
		$_POST['umessage'] = checkData($_POST['umessage']);
	}

	// check data & strip tags

	if(isset($_POST['toname']))
	{
		$_POST['toname'] = checkData(strip_tags($_POST['toname']));
	}

	if(isset($_POST['umid']))
	{
		$_POST['umid'] = checkData(strip_tags($_POST['umid']));
	}

	if(isset($_POST['newRoomName']))
	{
		$_POST['newRoomName'] = checkData(strip_tags($_POST['newRoomName']));
	}

	// check data is numeric

	if(isset($_POST['uid']))
	{
		$_POST['uid'] = checkNumeric($_POST['uid']);
	}

	if(isset($_POST['room']))
	{
		$_POST['room'] = checkNumeric($_POST['room']);
	}

	if(isset($_POST['addRoom']))
	{
		$_POST['addRoom'] = checkNumeric($_POST['addRoom']);
	}

	if(isset($_POST['newRoomOwner']))
	{
		$_POST['newRoomOwner'] = checkNumeric($_POST['newRoomOwner']);
	}

	if(isset($_POST['status']))
	{
		$_POST['status'] = checkNumeric($_POST['status']);
	}

	if(isset($_POST['status']))
	{
		$_POST['status'] = checkNumeric($_POST['status']);
	}

	if(isset($_POST['umessage']))
	{
		// if admin command
		if($_POST['umessage'] == 'KICK' || $_POST['umessage'] == 'BAN')
		{
			if(getAdmin($_SESSION['username']) == '1' || getModerator($_SESSION['username']) == '1')
			{
				// prevents admins from kicking each other
				if(getAdmin($_POST['toname']) != '1')
				{
					// ban/kick user
					banKickUser($_POST['umessage'], $_POST['toname']);
				}
			}
			else
			{
				die("incorrect permissions");
			}

			// check user is room owner
			if($_POST['umessage'] == 'KICK' && getRoomOwner($_SESSION['room']))
			{
				// prevents admins from kicking each other
				if(getAdmin($_POST['toname']) != '1')
				{
					// ban/kick user
					banKickUser($_POST['umessage'], $_POST['toname']);
				}
			}

		}

		if($_POST['umessage'] == 'SILENCE' && (getAdmin($_SESSION['username']) != '1' && getRoomOwner($_SESSION['username']) != '1' && getModerator($_SESSION['username']) != '1'))
		{
			die("incorrect permissions");
		} 
		
		// prevent admins from being silenced or kicked
		if(($_POST['umessage'] == 'SILENCE' || $_POST['umessage'] == 'KICK') && getAdmin($_POST['toname']))
		{
            die("incorrect permissions");
		}		
		
		// if public webcam view, add stream id
		if($_POST['umessage'] == 'WEBCAM_ACCEPT')
		{
			$_POST['umessage'] = 'WEBCAM_ACCEPT||'.$_SESSION['myStreamID'];
		}

		// send message

		$chatMessTableName = "prochatrooms_message";

		if($CONFIG['moderatedChatPlugin'] && moderatedChat())
		{
			$chatMessTableName = "prochatrooms_moderated";

			if(getAdmin($_SESSION['username']) || getModerator($_SESSION['username']) || getSpeaker($_SESSION['username']))
			{
				$chatMessTableName = "prochatrooms_message";
			}	
		}

		if(!file_exists("../sounds/".$_POST['usfx']))
		{
			$_POST['usfx'] = "beep_high.mp3";
		}

		// add message to db
		// message = userAvatar+"|"+textColor+"|"+textSize+"|"+textFamily+"|"+message+"|"+iRC+"|"+addLineBreaks;
		// runs some pre checks for message
		// if any fail, DONT submit data, data is invalid

		$checkMessage = explode("|",$_POST['umessage']);

		if($checkMessage[4])
		{
			// is avatar included, does it exist?
			if($checkMessage[0] != "../avatars/webcam.gif")
			{
				$checkMessage[0] = str_replace("../","",$checkMessage[0]);
			}		
			if($checkMessage[0]!='0' && $checkMessage[0]!='1' && !file_exists("../avatars/".$checkMessage[0]))
			{
				die("avatar is invalid");
			}

			// is text color valid?
			if(!ctype_alnum(str_replace("#","",$checkMessage[1])))
			{
				die("text color is invalid");
			}

			// is text size valid?
			if(!is_numeric(str_replace("px","",$checkMessage[2])))
			{
				die("text size is invalid");
			}

			// is text family valid?
			// check for alphanumeric value
			if(!ctype_alnum(str_replace(" ","",$checkMessage[3])))
			{
				die("text family is invalid");
			}

			// is IRC numeric?
			if($checkMessage[5] && !is_numeric($checkMessage[5]))
			{
				die("IRC value is invalid");
			}

			// is linebreaks numeric?
			if($checkMessage[6] && !is_numeric($checkMessage[6]))
			{
				die("linebreak value is invalid");
			}

			// is message shared? (eg. broadcast)
			if(
				stristr($checkMessage[4],"BROADCAST") && getAdmin($_SESSION['username']) || 
				stristr($checkMessage[4],"BROADCAST") && getModerator($_SESSION['username']) 
			)
			{ $share = '1'; }

			if(
				stristr($checkMessage[4],"BROADCAST") && !getAdmin($_SESSION['username']) && 
				stristr($checkMessage[4],"BROADCAST") && !getModerator($_SESSION['username']) 
			)
			{ die("incorrect permissions"); }
		}

		// if intelli-bot is enabled
		if($CONFIG['intelliBot'] && !$_POST['uname'] && $_SESSION['username'])
		{
			$senderName = $CONFIG['intelliBotName'];			
		}
		else
		{
			$senderName = $_SESSION['username'];
		}

		// if user is not silenced
		if(!$_SESSION['silenceStart'] || $_SESSION['silenceStart'] < ( date("U") - $CONFIG['silent']*60 ) )	
		{
				unset($_SESSION['silenceStart']);

         		if(!$senderName || empty($senderName))
         		{
            			die("invalid username");
         		}

			// add message
			$sql = "INSERT INTO ".$chatMessTableName."
				(
					uid,
					mid,
					username, 
					tousername, 
					message, 
					sfx,
					room,
					share,
					messtime
				) 
				VALUES 
				(
					'".makeSafe($_POST['uid'])."', 
					'".makeSafe($_POST['umid'])."', 
					'".makeSafe($senderName)."', 
					'".makeSafe($_POST['toname'])."', 
					'".makeSafe($_POST['umessage'])."', 
					'".makeSafe($_POST['usfx'])."', 
					'".makeSafe($_POST['uroom'])."',
					'".$share."',
					'".getTime()."'
				)";

			mysql_query($sql) 
			or die(mysql_error());

			// update last message time
			$sql = "UPDATE prochatrooms_users 
				SET lastActive = '".getTime()."' 
				WHERE username = '".makeSafe($_SESSION['username'])."'";

			mysql_query($sql) 
			or die(mysql_error());
		}

	}

	// update avatar
	if(isset($_POST['uavatar']))
	{
		if(file_exists("../avatars/".$_POST['uavatar']))
		{
			$sql = "UPDATE prochatrooms_users
					SET avatar = '".makeSafe($_POST['uavatar'])."'
					WHERE username = '".makeSafe($_SESSION['username'])."'";

			mysql_query($sql) 
			or die(mysql_error());
		}
	}

	// add user room
	if(isset($_POST['addRoom']))
	{
		// password encryption
		if(!empty($_POST['newRoomPass']))
		{
			$_POST['newRoomPass'] = md5($_POST['newRoomPass']);
		}

		// check room exists
		$tmp=mysql_query("
			SELECT roomname   
			FROM prochatrooms_rooms  
			WHERE roomname = '".makeSafe($_POST['newRoomName'])."' 
			LIMIT 1
			") or die(mysql_error()); 

		if(!mysql_num_rows($tmp))
		{

			// if room name
			if($_POST['newRoomName'])
			{
				if(validChars($_POST['newRoomName']))
				{
					die("invalid room name");
				}

				// send message
				$sql = "INSERT INTO prochatrooms_rooms
					(
						id,
						roomname,
						roomowner, 
						roompassword, 
						roomusers, 
						roomcreated,
						roomstream
					) 	
					VALUES 
					(
						'".getTime()."', 
						'".makeSafe($_POST['newRoomName'])."', 
						'".makeSafe($_POST['newRoomOwner'])."', 
						'".makeSafe($_POST['newRoomPass'])."', 
						'0',
						'0', 
						'".getTime()."' 
					)";

				mysql_query($sql) 
				or die(mysql_error());

			}
	
		}
		else
		{
			$sql = "UPDATE prochatrooms_rooms 
					SET roomcreated = '".getTime()."' 
					WHERE roomname = '".makeSafe($_POST['newRoomName'])."'";

			mysql_query($sql) 
			or die(mysql_error());
		}

	}

	// update webcam status
	if(isset($_POST['myWebcamIs']))
	{
		$result = '0';

		if($_POST['myWebcamIs'] == 'on')
		{
			$webcamStatus = '1';
			$result = '1';
		}

		if($_POST['myWebcamIs'] == 'off')
		{
			$webcamStatus = '0';
			$result = '1';
		}

		if($result == '1')
		{
			$sql = "UPDATE prochatrooms_users 
					SET webcam = '".makeSafe($webcamStatus)."' 
					WHERE username = '".makeSafe($_SESSION['username'])."'";

			mysql_query($sql) 
			or die(mysql_error());
		}

	}

	// watching cam
	if(isset($_POST['watching']))
	{
		$sql = "UPDATE prochatrooms_users 
				SET watching = '".makeSafe($_POST['watching'])."' 
				WHERE username = '".makeSafe($_SESSION['username'])."'";

		mysql_query($sql) 
		or die(mysql_error());
	}

	// update user status
	if(isset($_POST['status']) && ctype_alnum($_POST['status']))
	{
		$sql = "UPDATE prochatrooms_users 
				SET status = '".makeSafe($_POST['status'])."' 
				WHERE username = '".makeSafe($_SESSION['username'])."'";

		mysql_query($sql) 
		or die(mysql_error());
	}

	// update blocked list
	if(isset($_POST['myBlockList']))
	{
		$sql = "UPDATE prochatrooms_users 
				SET blocked = '".makeSafe($_POST['myBlockList'])."' 
				WHERE username = '".makeSafe($_SESSION['username'])."'";

		mysql_query($sql) 
		or die(mysql_error());
	}
	
	// update current user broadcasting
	if(isset($_POST['startBroadcast']) && isset($_POST['room']))
	{
		if ($_POST['startBroadcast'] == 'yes') { // START broadcast
			$tmpbro = '0';
			$tmpbr = mysql_query("
				SELECT roomstream   
				FROM prochatrooms_rooms 
				WHERE id ='".makeSafe($_POST['room'])."' 
				LIMIT 1
				");
			while($i=mysql_fetch_array($tmpbr)) {
				$tmpbro = $i['roomstream'];
			}
			
			if ($tmpbro == '0') { // Start this new broadcast stream if we can
				$sql = "UPDATE prochatrooms_rooms 
						SET roomstream = '".makeSafe($_SESSION['myStreamID'])."' 
						WHERE id = '".makeSafe($_POST['room'])."'";
		
				mysql_query($sql) 
				or die(mysql_error());
				
				$sql = "UPDATE prochatrooms_rooms 
						SET roomstreamer = '".makeSafe($_POST['uname'])."' 
						WHERE id = '".makeSafe($_POST['room'])."'";
		
				mysql_query($sql) 
				or die(mysql_error());
			} // else someone else is broadcasting
		} else { // END broadcast
			$tmpStream = '0';
			$tmpStreamA = mysql_query("
				SELECT roomstream   
				FROM prochatrooms_rooms 
				WHERE id ='".makeSafe($_POST['room'])."' 
				LIMIT 1
				");
			while($i=mysql_fetch_array($tmpStreamA)) {
				$tmpStream = $i['roomstream'];
			}
				
			if ($_SESSION['myStreamID'] == $tmpStream) {
				$sql = "UPDATE prochatrooms_rooms 
					SET roomstream = '0' 
					WHERE id = '".makeSafe($_POST['room'])."'";
	
				mysql_query($sql) 
				or die(mysql_error());
			} else { // User is not ending their own stream, notify room.
				$sql = "INSERT INTO prochatrooms_message
				(
					uid,
					mid,
					username, 
					tousername, 
					message, 
					sfx,
					room,
					share,
					messtime
				) 
				VALUES 
				(
					'0', 
					'chatContainer', 
					'System', 
					'', 
					'webcam.gif|#FF0000|12px|Courier New|".makeSafe($_POST['uname'])." has terminated the broadcast.||0', 
					'beep_high.mp3', 
					'".makeSafe($_POST['room'])."',
					'1',
					'".getTime()."'
				)";

				mysql_query($sql) 
				or die(mysql_error());
			
			
				$sql = "UPDATE prochatrooms_rooms 
					SET roomstream = '0' 
					WHERE id = '".makeSafe($_POST['room'])."'";
	
				mysql_query($sql) 
				or die(mysql_error());
			}
		}
	}

}

?>