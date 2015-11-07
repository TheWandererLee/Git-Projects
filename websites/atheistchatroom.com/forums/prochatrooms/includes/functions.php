<?php

/*
* get document path
*
*/

function getDocPath()
{
	return dirname(dirname(__FILE__))."/";
}

/*
* get language file
*
*/

function getLang($id)
{
	// include files
	include(getDocPath()."includes/config.php");

	// set admin default language file
	if(file_exists(getDocPath()."lang/".$CONFIG['lang'][1]))
	{
		$_SESSION['lang'] = $CONFIG['lang'][1];		
	}

	// if $id is set, check file exists and set new language file
	if(is_numeric($id) && file_exists(getDocPath()."lang/".$CONFIG['lang'][$id]))
	{
		$_SESSION['lang'] = $CONFIG['lang'][$id];		
	}
	
	// if no language file set system language file
	if(empty($_SESSION['lang']))
	{
		$_SESSION['lang'] = "english.php";
	}

	return $_SESSION['lang'];
}

/*
* get time
* 
*/

function getTime()
{
	return date("U");
}

/*
* create captcha text
*
*/

function getCaptchaText()
{
	return substr(md5(date("U").rand(1,99999)),0,-26);
}

/*
* make safe data for database
*
*/

function makeSafe($data)
{
	$data = htmlspecialchars(mysql_real_escape_string($data));

	return $data;
}

/*
* check software licence has been uploaded
*
*/

function validSoftware()
{
	if(!file_exists("software_licence.txt"))
	{
		die(C_LANG7);
	}
}

/*
* bad words/characters
*
*/

function badChars()
{

	$badChars = array(

				'intelli-bot',
				'adbot',
				'fuck',
				'shit',
				'wank',
				'cunt',
				'\\',
				' ',
				'!',
				'<',
				'>',
				'.',
				',',
				'/',
				'\'',
				'"',
				':',
				'&',
				';',
				'#',
				'@',
				'~',
				'(',
				')',
				'[',
				']',
				'{',
				'}',
				'£',
				'$',
				'%',
				'^',
				'*',
				'?',
				'+',
				'='
			);

	return $badChars;

}

/*
* check data for bad words/characters
*
*/

function validChars($data)
{
	$i = 0;

	$badChars = badChars();

	for($i=0; $i < sizeof($badChars); $i+=1)
	{
		$pos = strpos(stripslashes(strtolower($data)),$badChars[$i]);

		if ($pos === false)
		{
    			// do nothing
		} 
		else 
		{
			if($badChars[$i] == ' ')
			{
				$badChars[$i] = 'space';
			}

			return C_LANG8.": [ ".$badChars[$i]." ]<br>";
		}
	}
}

/*
* validate email address
*
*/

function validEmail($email)
{
	if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email))
	{ 
		return C_LANG9."<br>"; 
	} 
}

/*
* show language options 
* displays on login page
*/

function showLang()
{
	// include files
	include(getDocPath()."includes/config.php");

	$count = count($CONFIG['lang']); 

	$html = '';

	for ($i = 1; $i < $count; $i++)
	{
		$selected = '';

		if($CONFIG['lang'][$i] == $_SESSION['lang'])
		{
			$selected = 'SELECTED';
		}

		$html .= "<option value='".$i."' ".$selected.">".ucfirst(substr($CONFIG['lang'][$i], 0, -4))."</option>";
	}

	return $html;
}

/*
* register user
*
*/

function registerUser($username,$password,$email)
{
	$result = '0';	

	// include files
	include(getDocPath()."includes/config.php");

	$username = urlencode($username);

	// check username is in database
	$tmp=mysql_query("
				SELECT password 
				FROM prochatrooms_users 
				WHERE username = '".makeSafe($username)."'
				LIMIT 1
				") or die(mysql_error()); 

	while($i = mysql_fetch_array($tmp)) 
	{
		$pass = $i['password'];

		$result = '1';
	}

	// if user exists but no password is found, 
	// update guest username to member status
	if(!$pass && $result)
	{
		// user found in db but has no password assigned (guest)
		// allow the user to register this username
		$sql = "UPDATE prochatrooms_users 
				SET password = '".md5($password)."', email = '".makeSafe($email)."' 
				WHERE username = '".makeSafe($username)."'";

		mysql_query($sql) 
		or die(mysql_error());

		$result = C_LANG10;

		return $result;
	}

	// if username exists and password exists, 
	// user is already registered (already member)
	if($pass)
	{
		$result = C_LANG11;	
	}
	else
	{
		// if new registrations require email confirmation
		if($CONFIG['approve'])
		{
			$CONFIG['approve'] = substr(md5(date("U").rand(1,99999)), 0, -20);

			sendUserEmail($CONFIG['approve'],$username,$email,'','2');

			$result = C_LANG12;
		}
		else
		{
			$result = C_LANG13;
		}

		$incUserGroup = $CONFIG['userGroup'];

		if(is_numeric($_SESSION['userGroup']))
		{
			$incUserGroup = $_SESSION['userGroup'];
		}

		// user doesnt exist, add to database
		$sql = "INSERT INTO prochatrooms_users
				(
					username, 
					userid,
					password,
					email,
					room, 
					userIP,
					avatar, 
					webcam,
					online,
					enabled,
					active,
					userGroup
				) 
				VALUES 
				(
					'".makeSafe($username)."', 
					'-1', 
					'".md5($password)."',
					'".makeSafe($email)."',
					'1',
					'".getIP()."', 
					'".assignGenderImage('0')."', 
					'0',
					'0',
					'".$CONFIG['approve']."',
					'0',
					'".makeSafe($incUserGroup)."'
				)";

		mysql_query($sql) 
		or die(mysql_error());

		// create a new user profile entry in db
		$sql = "INSERT INTO prochatrooms_profiles
				(
					username
				) 
				VALUES 
				(
					'".makeSafe($username)."'
				)";
		
		mysql_query($sql) 
		or die(mysql_error());

	}

	return $result;
}

/*
* create user
*
*/

function createUser($loginName,$loginID,$loginPass,$loginGender,$login,$guest)
{
	// include files
	include(getDocPath()."includes/config.php");

	if($login)
	{
		if($loginName != $_SESSION['username'])
		{
			$loginName = urlencode($loginName);

			// check username status
			$tmp=mysql_query("
						SELECT active, password, enabled, kick, ban    
						FROM prochatrooms_users 
						WHERE username = '".makeSafe($loginName)."'
						LIMIT 1
						") or die(mysql_error()); 

			while($i = mysql_fetch_array($tmp)) 
			{
				if(!$guest)
				{
					if($CONFIG['approve'] && ($i['enabled'] != '1') && $i['kick'] == '' && $i['ban'] == '')
					{
						$loginError = C_LANG14;
						return array('','',$loginError);
					}
				}

				if($i['active'] > date("U")-15)
				{
					$loginError = C_LANG15;
					return array('','',$loginError);
				}

				$password = $i['password'];
			}

			if($loginPass && $password != md5($loginPass) || $password && $password != md5($loginPass))
			{
				$loginError = C_LANG16;
				return array('','',$loginError);
			}

		}

		// unset old session
		unset($_SESSION['username']);
		unset($_SESSION['userid']);

		// create new user session
		$_SESSION['username'] = $loginName;
		$_SESSION['userid'] = $loginID;

		// add user to database
		addUser($loginGender);

		// return details
		return array($_SESSION['username'],$_SESSION['userid'],'0');
	}

	if(!$login)
	{
		// user session already set
		return array($_SESSION['username'],$_SESSION['userid'],'0');
	}

}

/*
* get users details
*
*/

function getUser($prevRoom,$roomID)
{
	$loginError = '0';

	// include files
	include(getDocPath()."includes/config.php");

	// check username is in database
	$tmp=mysql_query("
			SELECT id, userid, avatar, kick, ban, blocked, room, guest, userGroup  
			FROM prochatrooms_users 
			WHERE username = '".makeSafe($_SESSION['username'])."' 
			LIMIT 1
			") or die(mysql_error()); 

	while($i = mysql_fetch_array($tmp)) 
	{
		$id = $i['id'];
		$avatar = $i['avatar'];
		$kick = $i['kick'];
		$ban = $i['ban'];
		$blockedList = $i['blocked'];
		$guest = $i['guest'];

		$_SESSION['userGroup'] = $i['userGroup'];
		$_SESSION['myProfileID'] = $id;
		$_SESSION['myStreamID'] = streamID();

	}

	if(!$id)
	{
		$loginError = C_LANG17;
	}

	if($kick > date("U"))
	{
		$loginError = C_LANG18.' '.$CONFIG['kickTime'].' '.C_LANG19;
	}

	if($ban)
	{
		$loginError = C_LANG20;
	}

	if($CONFIG['banIP'] && getIPBanList(getIP()))
	{
		$loginError = C_LANG20;
	}

	if(!$loginError)
	{
		// update user in database
		updateUser();


		// update room details
		$sql = "UPDATE prochatrooms_rooms 
				SET roomusers = roomusers + 1
				WHERE id = '".makeSafe($roomID)."'";

		mysql_query($sql) 
		or die(mysql_error());

		// update room details
		$sql = "UPDATE prochatrooms_rooms 
				SET roomusers = roomusers - 1 
				WHERE id = '".makeSafe($prevRoom)."'
				AND roomusers > '0'";

		mysql_query($sql) 
		or die(mysql_error());

		// update watching, webcam, avatar, lastactive 
		$sql = "UPDATE prochatrooms_users 
				SET watching = '', webcam = '0', lastActive = '".getTime()."'  
				WHERE username = '".makeSafe($_SESSION['username'])."'";

		mysql_query($sql) 
		or die(mysql_error());

	}

	// return details
	return array($id, $avatar, $loginError, $blockedList, $guest);

}

/*
* get user group
*
*/

function getUserGroup($id)
{
	// include files
	include(getDocPath()."includes/config.php");

	if(!is_numeric($id))
	{
		// set default user group
		$_SESSION['userGroup'] = $CONFIG['userGroup'];
	}

	// select user group 
	$tmp=mysql_query("
			SELECT *  
			FROM prochatrooms_group 
			WHERE id = '".makeSafe($_SESSION['userGroup'])."' 
			LIMIT 1
			") or die(mysql_error()); 

	while($i = mysql_fetch_array($tmp)) 
	{
		$_SESSION['groupChat'] = $i['groupChat'];
		$_SESSION['groupPChat'] = $i['groupPChat'];
		$_SESSION['groupCams'] = $i['groupCams'];
		$_SESSION['groupWatch'] = $i['groupWatch'];
		$_SESSION['groupRooms'] = $i['groupRooms'];
	}
}

/*
* assign gender image
*
*/

function assignGenderImage($loginGender)
{
	// assign avatar
	switch ($loginGender)
	{
		case 1:
  			$avatar = "male.gif";
  			break;
		case 2:
  			$avatar = "female.gif";
  			break;
		case 3:
  			$avatar = "couple.gif";
  			break;
		default:
  			$avatar = "online.gif";
	}

	return $avatar;
}

/*
* update guest avatar
*
*/

function updateGuestAvatar($loginGender)
{
	// assign guest user
	$_SESSION['guest'] = '1';

	// assign avatar
	$loginGender = assignGenderImage($loginGender);

	// update watching, webcam, avatar
	$sql = "UPDATE prochatrooms_users 
			SET avatar = '".makeSafe($loginGender)."', userIP = '".getIP()."', guest = '".$_SESSION['guest']."' 
			WHERE username = '".makeSafe($_SESSION['username'])."'";

	mysql_query($sql) 
	or die(mysql_error());

	return $_SESSION['guest'];
}

/*
* add guest user to database
*
*/

function addUser($loginGender)
{
	// include files
	include(getDocPath()."includes/config.php");

	// assign avatar
	if($loginGender)
	{
		$loginGender = assignGenderImage($loginGender);
	}
	else
	{
		$loginGender = 'online.gif';
	}

	// check username is in database
	$userExists=mysql_query("
				SELECT username 
				FROM prochatrooms_users 
				WHERE username = '".makeSafe($_SESSION['username'])."' 
				LIMIT 1
				") or die(mysql_error()); 

	// if user doesnt exist, add to database
	if(!mysql_num_rows($userExists))
	{
		$incUserGroup = $CONFIG['userGroup'];

		if(is_numeric($_SESSION['userGroup']))
		{
			$incUserGroup = $_SESSION['userGroup'];
		}

		$sql = "INSERT INTO prochatrooms_users
			(
				username, 
				userid,
				userIP,
				room, 
				avatar, 
				webcam,
				active,
				userGroup
			) 
			VALUES 
			(
				'".makeSafe($_SESSION['username'])."', 
				'".makeSafe($_SESSION['userid'])."',
				'".getIP()."',
				'".makeSafe($_SESSION['room'])."', 
				'".makeSafe($loginGender)."', 
				'0',
				'0',
				'".makeSafe($incUserGroup)."'
			)";

		mysql_query($sql) 
		or die(mysql_error());

		// if no profile exists for this user
		// create a new user profile entry in db
		$sql = "INSERT INTO prochatrooms_profiles
			(
				username
			) 
			VALUES 
			(
				'".makeSafe($_SESSION['username'])."'
			)";
		
		mysql_query($sql) 
		or die(mysql_error());
	}
}

/*
* count total rooms
* 
*/

function totalRooms()
{
	// include files
	include(getDocPath()."includes/config.php");

	// count rooms total
	$tmp=mysql_query("
			SELECT roomid 
			FROM prochatrooms_rooms 
			") or die(mysql_error()); 

	if($CONFIG['singleRoom'])
	{
		return $CONFIG['singleRoom'];
	}
	else
	{
		return mysql_num_rows($tmp);
	}

}

/*
* update user
*
*/

function updateUser()
{
	// update details
	$sql = "UPDATE prochatrooms_users 
			SET username = '".makeSafe($_SESSION['username'])."', 
				userIP = '".getIP()."', 
				room = '".makeSafe($_SESSION['room'])."', 
				active = '".getTime()."', 
				online = '1', 
				streamID = '".$_SESSION['myStreamID']."'  
			WHERE username = '".makeSafe($_SESSION['username'])."'";

	mysql_query($sql) 
	or die(mysql_error());
}

/*
* catch previous room (for logout messages)
*
*/

function prevRoom()
{
	$prevRoom = '1';

	if(isset($_SESSION['room']))
	{
		$prevRoom = $_SESSION['room'];
	}

	if(isset($_SESSION['username']))
	{
		// update users previous room
		$sql = "UPDATE prochatrooms_users 
				SET prevroom = '".makeSafe($prevRoom)."', 
					status = '1'    
				WHERE username = '".makeSafe($_SESSION['username'])."'";

		mysql_query($sql) 
		or die(mysql_error());
	}

	return $prevRoom;

}

/*
* get the chat room id
*
*/

function chatRoomID($id,$pass)
{
	// include files
	include(getDocPath()."includes/config.php");

	if(!$id || !is_numeric($id))
	{
		// if no room ID or room ID is not numeric then
		// log user into default room (set in config.php)

		$_SESSION['room'] = $CONFIG['defaultRoom'];

		return array($CONFIG['defaultRoom'],'1');	
	}
	else
	{
		// password encryption
		if(!empty($pass))
		{
			$pass = md5($pass);
		}

		$roomPassword = "AND roompassword = '".makeSafe($pass)."'";

      		// admin & mods dont need a password ;)
      		if(getAdmin($_SESSION['username']) || getModerator($_SESSION['username']))
     		{
         		$roomPassword = '';
      		}

		// check room exists
		$tmp=mysql_query("
			SELECT id, roomid, roomowner   
			FROM prochatrooms_rooms 
			WHERE id = '".makeSafe($id)."' 
			".$roomPassword." 
			ORDER BY id DESC
			LIMIT 1
			") or die(mysql_error()); 

		if(mysql_num_rows($tmp))
		{
			while($i = mysql_fetch_array($tmp)) 
			{
				$_SESSION['room'] = $i['id'];
				$roomowner = $i['roomowner'];
			}

			return array($id,$roomowner);
		}
		else
		{
			include("templates/".$CONFIG['template']."/private.php");
			die;
		}

	}

	updateRoomUserCount($id);

}

/*
* get the chat room details
*
*/

function chatRoomDesc($id)
{
	$tmp=mysql_query("
			SELECT roombg,roomdesc   
			FROM prochatrooms_rooms 
			WHERE id = '".makeSafe($id)."' 
			LIMIT 1
			") or die(mysql_error());
 
	while($i = mysql_fetch_array($tmp)) 
	{
		$bg = $i['roombg'];
		$desc = urldecode($i['roomdesc']);
	}

	return array($bg,$desc);
}

/*
* get last message id
*
*/

function getLastMessageID($room)
{
	$id = '0';

	$tmp=mysql_query("
		SELECT id   
		FROM prochatrooms_message 
		WHERE room = '".makeSafe($room)."' 
		OR tousername = '".makeSafe($_SESSION['username'])."' 
		OR share = '1' 
		ORDER BY id DESC
		LIMIT 1
		") or die(mysql_error()); 

	while($i = mysql_fetch_array($tmp)) 
	{
		$id = $i['id'];

		// include files
		include(getDocPath()."includes/config.php");
		$id -= $CONFIG['dispLastMess'];
	}

	$_SESSION['transcriptsID'] = $id + 1;

	return $id;

}

/*
* auto logout
* 
*/

function logoutUser($username,$room)
{
	// include files
	include(getDocPath()."includes/config.php");

	if(empty($room) || $room == '')
	{
		$room = '0';
	}

	$showLogout = '1';

	if(invisibleAdmins($username))
	{
		$showLogout = '0';
	}

	if($showLogout)
	{
		if(file_exists(getDocPath()."lang/".$_SESSION['lang']))
		{
			include(getDocPath()."lang/".$_SESSION['lang']);
		}		

		// set user to offline
		$offlineTime = getTime()-$CONFIG['activeTimeout'];
		$sql = "UPDATE prochatrooms_users 
				SET active = '".$offlineTime."', online = '0', webcam = '0', status = '0'    
				WHERE username = '".$username."'";

		mysql_query($sql) 
		or die(mysql_error());
	
		// send logout message
		$sql = "INSERT INTO prochatrooms_message
			(
				uid,
				mid,
				username, 
				tousername, 
				message, 
				sfx,
				room,
				messtime
			) 
			VALUES 
			(
				'0',
				'chatContainer', 
				'".makeSafe($username)."', 
				'', 
				'1|#000000|12px|Verdana|** ".makeSafe($username)." ".makeSafe(C_LANG22)."', 
				'beep_high.mp3', 
				'".makeSafe($room)."',
				'".getTime()."'
			)";
		
		mysql_query($sql) 
		or die(mysql_error());

		// update room user count
		$sql = "UPDATE prochatrooms_rooms 
				SET roomusers = roomusers - 1 
				WHERE id = '".makeSafe($room)."'";
		
		mysql_query($sql) 
		or die(mysql_error());

	}

}

/*
* streamID
* 
*/

function streamID()
{
	// include files
	include(getDocPath()."includes/config.php");

	$id = md5(date("U").$CONFIG['salt'].$_SESSION['username'].rand(1,9999999));

	return $id;
}

/*
* check for valid streamID
*
*/

function validStreamID($id)
{
	// check room exists
	$tmp=mysql_query("
		SELECT streamID   
		FROM prochatrooms_users 
		WHERE streamID = '".makeSafe($id)."' 
		LIMIT 1
		") or die(mysql_error()); 

	$valid = '0';

	if(mysql_num_rows($tmp))
	{
		$valid = '1';
	}

	return $valid;
}

/*
* admin array
* 
*/

function getAdmin($id)
{
	// include files
	include(getDocPath()."includes/config.php");

	// check room exists
	$tmp=mysql_query("
		SELECT admin   
		FROM prochatrooms_config 
		LIMIT 1
		") or die(mysql_error()); 

	$admin = '0';

	while($i = mysql_fetch_array($tmp)) 
	{
		$i['admin'] = str_replace("+","",$i['admin']);

		$admins = explode("%2C",$i['admin']);
	}

	if(in_array(strtolower($id),$admins))
	{
		$admin = '1';

		// if user is admin and config setting is set to 1 
		// allows auto-login to admin area
		if($CONFIG['adminArea'])
		{
			$_SESSION['adminUser'] = '1';
		}

	}

	return $admin;
}

/*
* moderator array
* 
*/

function getModerator($id)
{
	// check room exists
	$tmp=mysql_query("
		SELECT moderator   
		FROM prochatrooms_config 
		LIMIT 1
		") or die(mysql_error()); 

	$moderator = '0';

	while($i = mysql_fetch_array($tmp)) 
	{
		$i['moderator'] = str_replace("+","",$i['moderator']);

		$moderators = explode("%2C",$i['moderator']);
	}

	if(in_array(strtolower($id),$moderators))
	{
		$moderator = '1';
	}

	return $moderator;

}

/*
* speaker array
* 
*/

function getSpeaker($id)
{
	// check room exists
	$tmp=mysql_query("
		SELECT speaker   
		FROM prochatrooms_config 
		LIMIT 1
		") or die(mysql_error()); 

	$speaker = '0';

	while($i = mysql_fetch_array($tmp)) 
	{
		$i['speaker'] = str_replace("+","",$i['speaker']);

		$speakers = explode("%2C",$i['speaker']);
	}

	if(in_array(strtolower($id),$speakers))
	{
		$speaker = '1';
	}

	return $speaker;

}

/*
* get user age 
* shows on profile
*/

function getUserAge($age)
{
	$html = '';
	$selected = ''; 

	for($i = 16; $i <= 100; $i++) 
	{
		if($i == $age)
		{
			$selected = 'SELECTED '; 
		}

		if($i < $age || $i > $age)
		{
			$selected = ''; 
		}

		$html .= "<option value='".$i."' ".$selected.">".$i."</option>"; 
	}

	return $html;
}

/*
* get user genders
* shows on login/profiles
*/

function getUserGenders($userGender)
{
	// check room exists
	$tmp=mysql_query("
		SELECT gender    
		FROM prochatrooms_config 
		LIMIT 1
		") or die(mysql_error()); 

	while($i = mysql_fetch_array($tmp)) 
	{
		$gender = $i['gender'];
	}

	$html = '';

	$x = 1;

	$gender = explode(",", $gender);
	$genderArrayLength = count($gender);

	for ($i = 0; $i < $genderArrayLength; $i++)
	{
		if($x == $userGender)
		{
			$selected = 'SELECTED '; 
		}

		if($x < $userGender || $x > $userGender)
		{
			$selected = ''; 
		}

		$html .= "<option value='".$x."' ".$selected." >".$gender[$i]."</option>"; 

		$x++;
	}

	return $html;
}

/*
* get profile genders
* shows on profile
*/

function getProfileGenders($userGender)
{
	// check room exists
	$tmp=mysql_query("
		SELECT gender    
		FROM prochatrooms_config 
		LIMIT 1
		") or die(mysql_error()); 

	while($i = mysql_fetch_array($tmp)) 
	{
		$gender = $i['gender'];
	}

	$gender = explode(",", $gender);

	// all arrays start @ 0
	// so lets subtract 1 for true gender
	$result = $gender[$userGender-1]; 

	return $result;
}

/*
* get user rooms 
* shows on login
*/

function getUserRooms()
{
	// check room exists
	$tmp=mysql_query("
		SELECT id, roomname    
		FROM prochatrooms_rooms 
		WHERE roomowner = '1'
		AND roomname != 'User Room' 
		ORDER BY id
		") or die(mysql_error());

	$html = ''; 

	while($i = mysql_fetch_array($tmp)) 
	{
		$html .= "<option value='".$i['id']."'>".urldecode($i['roomname'])."</option>"; 
	}

	return $html;
}

/*
* get login news
* shows on login
*/

function getLoginNews()
{
	// check room exists
	$tmp=mysql_query("
		SELECT news    
		FROM prochatrooms_config 
		LIMIT 1
		") or die(mysql_error()); 

	while($i = mysql_fetch_array($tmp)) 
	{
		$html = stripslashes(urldecode($i['news']));
	}

	return $html;
}

/*
* copyright title
* 
*/

function copyrightTitle()
{
	// include files
	include(getDocPath()."includes/config.php");

	$html = "Powered by Pro Chat Rooms ".$CONFIG['version'];

	if(file_exists(getDocPath()."plugins/rembrand/index.php"))
	{
		$html = $CONFIG['chatroomName'];
	}

	return $html;
}

/*
* copyright footer
* 
*/

function copyrightFooter()
{
	// include files
	include(getDocPath()."includes/config.php");

	$html = "&copy; <a href='http://prochatrooms.com'>Pro Chat Rooms</a> ".$CONFIG['version'];

	if(file_exists(getDocPath()."/plugins/rembrand/index.php"))
	{
		$html = "&copy;".date("Y")." - <a href='".$CONFIG['chatroomUrl']."'>".$CONFIG['chatroomName']."</a>";	
	}

	return $html;
}

/*
* show profile image
* 
*/

function showImage($id)
{
	// strip tags
	if(!is_numeric($id))
	{
		return "invalid id";
	}

	// reset image
	$image = '';

	// get user pic
	$tmp=mysql_query("
			SELECT photo 
			FROM prochatrooms_profiles 
			WHERE id ='".makeSafe($id)."' 
			LIMIT 1
			");

	while($i=mysql_fetch_array($tmp)) 
	{
		$image = explode("|", $i['photo']);
	}

	if($image[0]!='image/jpeg' && $image[0]!='image/gif' && $image[0]!='image/pjpeg')
	{
		$image[0] = 'image/jpeg';
		$image[1] = 'nopic.jpg';
	}

	return array($image[0],$image[1]);

}

/*
* get user profile info
* 
*/

function userProfileInfo($id)
{
	// strip tags
	$id = strip_tags($id);

	$tmp=mysql_query("
			SELECT prochatrooms_profiles.username, prochatrooms_profiles.real_name, prochatrooms_profiles.age, prochatrooms_profiles.gender, prochatrooms_profiles.location, prochatrooms_profiles.hobbies, prochatrooms_profiles.aboutme, prochatrooms_profiles.photo, prochatrooms_users.email  
			FROM prochatrooms_profiles, prochatrooms_users
			WHERE prochatrooms_profiles.id = prochatrooms_users.id
			AND prochatrooms_profiles.id ='".makeSafe($id)."'
			LIMIT 1
			");

	while($i=mysql_fetch_array($tmp)) 
	{
		$username = $i['username'];
		$real_name = $i['real_name'];
		$age = $i['age'];
		$gender = $i['gender'];
		$location = $i['location'];
		$hobbies = $i['hobbies'];
		$aboutme = $i['aboutme'];
		$email = $i['email'];

		$photo = explode("|", $i['photo']);
		$photo = $photo[1];
	}

	return array($username,$real_name,$age,$gender,$location,$hobbies,$aboutme,$photo,$email);

}

/*
* update user profile
* 
*/

function updateProfile($id,$profileRealname,$profileAge,$profileGender,$uploadedfile,$deleteImage,$imgID,$profileLocation,$profileHobbies,$profileAboutme,$profilePass,$profileEmail)
{
	// include files
	include(getDocPath()."lang/".$_SESSION['lang']);

	if(!is_numeric($id))
	{
		// invalid Session ID
		die("Invalid Session ID");
	}

	// make safe data
	$realname = makeSafe(urlencode($profileRealname));
	$age = makeSafe(urlencode($profileAge));
	$gender = makeSafe(urlencode($profileGender));
	$img = $uploadedfile;
	$location = makeSafe(urlencode($profileLocation));
	$hobbies = makeSafe(urlencode($profileHobbies));
	$aboutme = makeSafe(urlencode($profileAboutme));
	$password = makeSafe($profilePass);
	$email = makeSafe($profileEmail);

	$uploaddir = "uploads/";

	$ext_allowed = '0';

	$file_type = $_FILES['uploadedfile']['type'];
	$file_type_ext = array('image/pjpeg','image/gif','image/jpeg');

	$allowed_ext = array('jpg','gif');

	if(basename($_FILES['uploadedfile']['name']))
	{ // image is being uploaded

		if(in_array(strtolower(substr(basename($_FILES['uploadedfile']['name']), -3)), $allowed_ext))
		{ // check last 3 characters of basename()

			$ext_allowed='1';
		}

		if(in_array($file_type, $file_type_ext))
		{ // check mime type

			$ext_allowed='1';
		}

	}

	if(!$deleteImage)
	{ // set error reporting

		if(!$ext_allowed && basename($_FILES['uploadedfile']['name']))
		{ 
			// ext not allowed
			$image_result = "Invalid Image";
		}
		else
		{
			// error reporting for file uploads
			// http://www.php.net/manual/en/features.file-upload.errors.php
			define("C_IMG1","Error: The uploaded file exceeds the upload_max_filesize directive in php.ini.");
			define("C_IMG2","Error: The uploaded file exceeds the MAX_IMAGE_SIZE value that was specified in the config settings");
			define("C_IMG3","Error: The uploaded file was only partially uploaded.");
			define("C_IMG4",""); // empty
			define("C_IMG5",""); // empty
			define("C_IMG6","Error: Missing a temporary folder.");
			define("C_IMG7","Error: Failed to write file to disk.");
			define("C_IMG8","Error: A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop; examining the list of loaded extensions with phpinfo() may help.");

			switch ($_FILES['uploadedfile']['error']) 
			{
    			case 1:
        			$image_result = C_IMG1;
        			break;
    			case 2:
        			$image_result = C_IMG2;
        			break;
    			case 3:
        			$image_result = C_IMG3;
        			break;
    			case 6:
        			$image_result = C_IMG6;
        			break;
    			case 7:
        			$image_result = C_IMG7;
        			break;
    			case 8:
        			$image_result = C_IMG8;
        			break;
    			default:
       				$image_result = '0';

			}

		}

	}

	$incImage = '';

	if($deleteImage)
	{ 
		if(file_exists($uploaddir.$imgID))
		{
			unlink($uploaddir.$imgID);

			$incImage = ', photo="" ';

       		$image_result = C_LANG23;

		}
	}

	if($ext_allowed && !$image_error)
	{

		// PHP file upload reference
		// http://www.scanit.be/uploads/php-file-upload.pdf

		$uploadfile = $uploaddir.md5(basename($_FILES['uploadedfile']['name']).rand(1,99999).rand(1,99999));

		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $uploadfile))
		{ // update the user details and image

			if(!chmod($uploadfile, 0644))
			{
				die("unable to chmod images to 644");
			}

			$incImage = ", photo = '".makeSafe($_FILES['uploadedfile']['type'])."|".makeSafe(basename($uploadfile))."'";

		}

		$imageUploaded = '1';

	}

	// update profile
	$sql="
		UPDATE prochatrooms_profiles 
		SET 
		real_name = '".$realname."',
		gender = '".$gender."', 
		age = '".$age."', 
		location = '".$location."', 
		hobbies = '".$hobbies."', 
		aboutme = '".$aboutme."'
		".$incImage."
		WHERE id = '".$id."'
		";

	mysql_query($sql) 
	or die(mysql_error());

	// update user info

	if($password[1]!='')
	{
		$incPass = ", password='".md5($password)."' ";
	}

	$sql="
		UPDATE prochatrooms_users 
		SET 
		email = '".$email."' 
		".$incPass."
		WHERE id = '".$id."'
		";

	mysql_query($sql) 
	or die(mysql_error());

	// profile updated status/error messages
	$profile_updated = $image_result;

	if(!$profile_updated)
	{
		$profile_updated = C_LANG24;
	}

	if(!$image_error && $imageUploaded)
	{
		$profile_updated = C_LANG25;
	}	

	return $profile_updated;	
}

/*
* eCredits
*
*/

function eCredits($id)
{
	// include files
	include(getDocPath()."includes/config.php");

	// if eCredits session not set
	if(!$_SESSION['eCredits_start'])
	{
		$_SESSION['eCredits_start'] = date("U");
	}
	else
	{
		// update count on page refresh
		$_SESSION['eCredits'] =  date("U") - $_SESSION['eCredits_start'];
	}

	// if 60 secs, update eCredits count
	if($_SESSION['eCredits'] >= '60')
	{
		// deduct credit from sender
		$sql = "UPDATE prochatrooms_users 
				SET eCredits = eCredits - ".$CONFIG['eCredits']." 
				WHERE username = '".makeSafe($_SESSION['username'])."'
				AND eCredits > '0'
				";
		
		mysql_query($sql) 
		or die(mysql_error());

		// check user has ecredits to pay receiver
		$tmp=mysql_query("
					SELECT eCredits   
					FROM prochatrooms_users 
					WHERE username = '".makeSafe($_SESSION['username'])."' 
					LIMIT 1
					") or die(mysql_error()); 

		while($i=mysql_fetch_array($tmp)) 
		{
			if($i['eCredits'] > 0)
			{
				// add credit to receiver
				$sql = "UPDATE prochatrooms_users 
						SET eCreditsEarned = eCreditsEarned + ".$CONFIG['eCredits']." 
						WHERE id = '".makeSafe($id)."'
						";
		
				mysql_query($sql) 
				or die(mysql_error());
			}
		}
	
		// reset eCredit count
		$_SESSION['eCredits_start'] = date("U");
	}
}

/*
* lost password
*
*/

function resetPassword($email)
{
	// include files
	include(getDocPath()."includes/session.php");
	include(getDocPath()."includes/db.php");
	include(getDocPath()."lang/".$_SESSION['lang']);

	$error = validEmail($email);

	if($error)
	{
		return C_LANG26;
	}

	$userFound = '0';

	$tmp=mysql_query("
			SELECT username, email  
			FROM prochatrooms_users 
			WHERE email ='".makeSafe($email)."' 
			LIMIT 1
			");

	while($i=mysql_fetch_array($tmp)) 
	{
		$userFound = '1';

		$newpass = substr(md5(date("U").rand(1,99999)), 0, -20);

		// update users password
		$sql = "UPDATE prochatrooms_users 
				SET password = '".md5($newpass)."' 
				WHERE email ='".makeSafe($email)."' 
				";
		
		mysql_query($sql) 
		or die(mysql_error());

		// send email with new password
		sendUserEmail('',$i['username'],$i['email'],$newpass,'1');

		return C_LANG27;
	}

	if(!$userFound)
	{
		return C_LANG28;
	}

}

/*
* send email
*
*/

function sendUserEmail($id,$username,$email,$newpass,$status)
{
	// include files
	include(getDocPath()."includes/session.php");
	include(getDocPath()."includes/config.php");
	include(getDocPath()."lang/".$_SESSION['lang']);

	// create headers
	$headers = "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/plain; charset=iso-8859-1\n";
	$headers .= "X-Priority: 3\n";
	$headers .= "X-MSMail-Priority: Normal\n";
	$headers .= "X-Mailer: php\n";
	$headers .= "From: \"" . $CONFIG['chatroomName'] . "\" <" . $CONFIG['chatroomEmail'] . ">\n";

	// send lost password
	if($status == '1')
	{
		$email_subject  = $CONFIG['chatroomName']." - ".C_LANG29;
		$email_message  = C_LANG30." ".urldecode($username).",\r\n\r\n";
		$email_message .= C_LANG31.": ".$newpass."\r\n\r\n";
		$email_message .= C_LANG32."\r\n\r\n";
		$email_message .= C_LANG33.",\r\n";
		$email_message .= $CONFIG['chatroomName'];
	}

	// send confirmation register email
	if($status == '2')
	{
		$email_subject = $CONFIG['chatroomName']." - ".C_LANG34;
		$email_message  = C_LANG30." ".urldecode($username).",\r\n\r\n";
		$email_message .= C_LANG35.": ".$CONFIG['chatroomName']."\r\n\r\n";
		$email_message .= C_LANG36.",\r\n\r\n";
		$email_message .= $CONFIG['chatroomUrl']."?nReg=".$id."&email=".$email."\r\n\r\n";
		$email_message .= C_LANG33.",\r\n";
		$email_message .= $CONFIG['chatroomName'];
	}

	mail($email, $email_subject, $email_message, $headers);

}

/*
* send admin email
*
*/

function sendAdminEmail($status,$report,$message)
{
	// include files
	include(getDocPath()."includes/session.php");
	include(getDocPath()."includes/config.php");
	include(getDocPath()."lang/".$_SESSION['lang']);

	if(!$_SESSION['username'])
	{
		return "no access";
	}

	if(empty($message))
	{
		return C_LANG65." [<a href=\"javascript:history.go(-1)\">".C_LANG159."</a>]";
	}

	if(!$_POST['sCaptcha'] || $_POST['sCaptcha'] != $_POST['uCaptcha'])
	{
		return C_LANG158." [<a href=\"javascript:history.go(-1)\">".C_LANG159."</a>]";
	}

	// create headers
	$headers = "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/plain; charset=iso-8859-1\n";
	$headers .= "X-Priority: 3\n";
	$headers .= "X-MSMail-Priority: Normal\n";
	$headers .= "X-Mailer: php\n";
	$headers .= "From: \"" . $CONFIG['chatroomName'] . "\" <" . $CONFIG['chatroomEmail'] . ">\n";

	// send confirmation register email
	if($status == '1')
	{
		$email_subject = $CONFIG['chatroomName']." - ".C_LANG37;
		$email_message  = C_LANG38.",\r\n\r\n";
		$email_message .= C_LANG39." ".$_SESSION['username']." ".C_LANG40.": ".urldecode($report)."\r\n\r\n";
		$email_message .= C_LANG41.":\r\n\r\n";
		$email_message .= $message."\r\n\r\n";
		$email_message .= C_LANG33.",\r\n";
		$email_message .= $CONFIG['chatroomName'];
	}

	if($message[255])
	{
		return C_LANG42;
	}

	if(isset($_SESSION['lastReportAgainst']) && $_SESSION['lastReportAgainst'] == $report)
	{
		return C_LANG43;
	}

	if($_SESSION['username'])
	{
		$_SESSION['lastReportAgainst'] = $report;

		mail($CONFIG['chatroomEmail'], $email_subject, $email_message, $headers);

		return C_LANG44;

	}

}

/*
* confirm email register
*
*/

function confirmReg($id,$email)
{
	// include files
	include(getDocPath()."includes/session.php");
	include(getDocPath()."lang/".$_SESSION['lang']);

	$confirm = '0';

	// check users account status
	$tmp=mysql_query("
				SELECT enabled,email  
				FROM prochatrooms_users 
				WHERE enabled = '".makeSafe($id)."' 
				AND email = '".makeSafe($email)."'
				LIMIT 1
				") or die(mysql_error());

	while($i=mysql_fetch_array($tmp)) 
	{
		$confirm = '1';

		// enable user account
		$sql = "UPDATE prochatrooms_users 
				SET enabled = '1' 
				WHERE enabled = '".makeSafe($id)."'
				";
		
		mysql_query($sql) 
		or die(mysql_error());

		return C_LANG45;
	}

	if(!$confirm)
	{
		return C_LANG46;
	}

}

/*
* get transcripts
*
*/

function getTranscripts($room)
{
	// include files
	include(getDocPath()."includes/session.php");
	include(getDocPath()."includes/db.php");
	include(getDocPath()."includes/config.php");
	include(getDocPath()."lang/".$_SESSION['lang']);

	// check room id is numeric
	if(!is_numeric($room))
	{
		return "Invalid RoomID";
		die;
	}

	// check active session
	if(!$_SESSION['username'])
	{
		return C_LANG47;
		die;
	}

	// get user blocked list
	$tmp=mysql_query("
				SELECT blocked   
				FROM prochatrooms_users 
				WHERE username = '".$_SESSION['username']."'
				") or die(mysql_error()); 

	while($i = mysql_fetch_array($tmp)) 
	{
			$blocked = explode('|', $i['blocked']);
	}

	$blocked = implode(',', $blocked);
	$blocked = substr($blocked, 1, -1);
	$blocked = str_replace(",,",",",$blocked);
	
	if($blocked)
	{
		$incBlocked = "AND uid NOT IN (".$blocked.")";
	}

	// get transcripts
	$tmp=mysql_query("
				SELECT messtime, room, username , tousername, message   
				FROM prochatrooms_message
				WHERE id >= '".$_SESSION['transcriptsID']."'
				AND room = '".makeSafe($room)."'
				".$incBlocked." 
				") or die(mysql_error()); 

	$html  ="<div class='roomheader'>";
	$html .="<div class='header' style='float:left;'>".C_LANG48."</div>";
	$html .="<div class='header' style='float:right; cursor:pointer;' onclick=\"parent.closeMdiv('viewTranscripts');\"><img src='images/close.gif'></div>";
	$html .="</div>";
	$html .="<br>";
	$html .="<table class='table' width='100%'>";
	$html .="<tr class='header'><td>".C_LANG49."</td><td>".C_LANG50."</td><td>".C_LANG51."</td><td>".C_LANG52."</td><td>".C_LANG53."</td></tr>";

	while($i = mysql_fetch_array($tmp)) 
	{
		if(!invisibleAdmins($i['username']))
		{
			if($i['tousername'] == '' || $i['tousername'] == $_SESSION['username'])
			{
				// explode message
				$i['message'] = explode("|", urldecode($i['message']));

				// format message
				$i['message'][4] = str_replace("[u]","",$i['message'][4]);
				$i['message'][4] = str_replace("[/u]","",$i['message'][4]);
				$i['message'][4] = str_replace("[i]","",$i['message'][4]);
				$i['message'][4] = str_replace("[/i]","",$i['message'][4]);
				$i['message'][4] = str_replace("[b]","",$i['message'][4]);
				$i['message'][4] = str_replace("[/b]","",$i['message'][4]);

				$i['message'][4] = str_replace("[[","<",$i['message'][4]);
				$i['message'][4] = str_replace("]]",">",$i['message'][4]);

				$message = "<span style=\"color:".$i['message'][1].";font-size:".$i['message'][2].";font-family:".$i['message'][3].";\">".html_entity_decode(stripslashes($i['message'][4]))."</span>";

				// add <pre> if required
				// used for formatting multi-line messages.
				if($i['message'][6]=='1')
				{
					$message = "<pre>".$message."</pre>";
				}

				// if receiver is empty
				if(!$i['tousername'])
				{
					$i['tousername'] = 'Room';
				}

				// final output
				$html .= "<tr class='row' valign='top'><td>".date("H:i:s",$i['messtime'])."</td><td align='center'>".urldecode($i['room'])."</td><td>".urldecode($i['username'])."</td><td>".urldecode($i['tousername'])."</td><td>".$message."</td></tr>";
			}	

		}

	}

	$html .="</table>";

	return $html;

}

/*
* ban/kick user
*
*/

function banKickUser($message, $toname)
{
	// include files
	include(getDocPath()."includes/config.php");

	$doAction = '';

	if($message == 'KICK')
	{
		$kickTime = $CONFIG['kickTime'] * 60;
		$dropKick = getTime()+$kickTime;
		$doAction = " SET kick = '".makeSafe($dropKick)."' ";
	}

	if($message == 'BAN')
	{
		$doAction = " SET ban = '1' ";
	}

	$sql = "UPDATE prochatrooms_users
			".$doAction."
			WHERE username = '".makeSafe($toname)."'";

	mysql_query($sql) 
	or die($sql);

	// set user to offline
	$offlineTime = getTime()-180;
	$sql = "UPDATE prochatrooms_users 
			SET active = '".$offlineTime."', online = '0' 
			WHERE username = '".makeSafe($toname)."'";

	mysql_query($sql) 
	or die($sql);

}

/*
* get users online
*
*/

function getUsersOnline($id)
{
	// include files
	include(getDocPath()."includes/session.php");
	include(getDocPath().'includes/db.php');
	include(getDocPath().'includes/config.php');
	include(getDocPath()."lang/".$_SESSION['lang']);

	// online time
	$online = getTime()-30; // 30 secs

	$tmp=mysql_query("
		SELECT prochatrooms_users.username, prochatrooms_users.avatar, prochatrooms_rooms.roomname   
		FROM prochatrooms_users, prochatrooms_rooms
		WHERE prochatrooms_users.active >= '".$online."'
		AND prochatrooms_users.room = prochatrooms_rooms.id
		") or die(mysql_error()); 

	if($id == 1)
	{
		// display users online count
		return mysql_num_rows($tmp);
	}

	if($id == 2)
	{
		// display users online table
		$html = "";
		$html .= "<table class='table'>";
		$html .= "<tr class='header'><td>".C_LANG54."</td><td>".C_LANG50."</td></tr>";
		
		while($i = mysql_fetch_array($tmp)) 
		{
			if($CONFIG['invisibleAdminsPlugin'] && getAdmin($i['username']))
			{
				// hide admin user
			}
			else
			{
				$html .= "<tr><td><img src='../../avatars/".$i['avatar']."' style='vertical-align:middle;'>&nbsp;".$i['username']."</td><td>".urldecode($i['roomname'])."</td></tr>";
			}
		}

		$html .= "</table>";

		return $html;
	}
}

/*
* get room owner
*
*/

function getRoomOwner($id)
{
	$tmp=mysql_query("
		SELECT id  
		FROM prochatrooms_rooms 
		WHERE roomowner = '".$_SESSION['myProfileID']."'
		AND id = '".$id."'
		") or die(mysql_error()); 

	return mysql_num_rows($tmp);
}

/*
* get users IP
*
*/

function getIP()
{
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

	if ($ip == '')
	{
		$ip = $_SERVER['REMOTE_ADDR'];
	}

	return $ip;
}

/*
* get IP ban list
*
*/

function getIPBanList($id)
{
	$tmp=mysql_query("
		SELECT id  
		FROM prochatrooms_users 
		WHERE userIP = '".$id."'
		AND ban = '1'
		") or die(mysql_error()); 

	return mysql_num_rows($tmp);
}

/*
* remove branding
* requires remove branding plugin
*/

function remBrand()
{
	// include files
	include(getDocPath()."includes/config.php");

	$remBranding = '1';

	if(file_exists(getDocPath()."plugins/rembrand/index.php"))
	{
		$remBranding = '0';
	}

	return $remBranding;
}

/*
* check events
* requires event plugin
*/

function checkEvent()
{
	// include files
	include(getDocPath()."includes/config.php");

	if($CONFIG['eventsPlugin'])
	{
		if(file_exists(getDocPath()."plugins/events/index.php"))
		{
			include(getDocPath()."plugins/events/index.php");

			return doEvent($event_day,$event_start_hour,$event_start_mins,$event_stop_hour,$event_stop_mins,$server_time,$region_time);
		}
	}
}

/*
* virtual credits
* requires virtual credits plugin
*/

function virtualCredits()
{
	// include files
	include(getDocPath()."includes/config.php");

	if($CONFIG['virtualCreditsPlugin'])
	{
		if(file_exists(getDocPath()."plugins/virtual_credits/index.php"))
		{
			include(getDocPath()."plugins/virtual_credits/index.php");
		}
	}
}

/*
* moderated chat
* requires moderated chat plugin
*/

function moderatedChat()
{
	// include files
	include(getDocPath()."includes/config.php");

	$result = '0';

	if($CONFIG['moderatedChatPlugin'])
	{
		if(file_exists(getDocPath()."plugins/moderated_chat/index.php"))
		{
			$result = '1';
		}
	}

	return $result;
}

/*
* invisible admins
* requires invisible admins plugin
*/

function invisibleAdmins($username)
{
	// include files
	include(getDocPath()."includes/config.php");

	$result = '0';

	if($CONFIG['invisibleAdminsPlugin'])
	{
		if(file_exists(getDocPath()."plugins/invisible/index.js.php"))
		{
			$result = getAdmin($username);
		}
	}

	return $result;
}
	
?>