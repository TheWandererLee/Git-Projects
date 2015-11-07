<?php

/*
* include files
*
*/
include("../../includes/ini.php");
include("../../includes/session.php");
include("../../includes/db.php");
include("../../includes/functions.php");

/*
* check session is set
*
*/

if(!$_SESSION['username'])
{
	die("no access");
}

/*
* permitted file types
*
*/

// allowed share file types
// for a full list see the link below
// http://www.w3schools.com/media/media_mimeref.asp

$validFile = array(

	'image/jpeg',
	'image/pjpeg',
	'image/gif',
	'application/x-zip-compressed',
	'application/zip',
	'application/pdf',
	'text/plain'
);

$validExt = array(

	'.jpg',
	'.gif',
	'.zip',
	'.pdf',
	'.txt'
);

/*
* resize all large images
* eg. resize to 250 pixels
*/

$resize = '250'; // pixels

/*
* upload file
*
*/

if($_POST)
{
	$uploaddir = "uploads/";

	$image_error = '';
	$ext_allowed = '0';
	$imageUploaded = '0';

	if(basename($_FILES['uploadedfile']['name']))
	{ // image is being uploaded

		if(in_array(strtolower(substr(basename($_FILES['uploadedfile']['name']), -4)), $validExt))
		{ // check last 3 characters of basename()

			$ext_allowed='1';
		}

		if(in_array($_FILES['uploadedfile']['type'], $validFile))
		{ // check mime type

			$ext_allowed='1';
		}

	}

	if(!$ext_allowed && basename($_FILES['uploadedfile']['name']))
	{ // ext not allowed

		$image_error = "Invalid File Type";
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
        			$image_error = C_IMG1;
        			break;
    		case 2:
        			$image_error = C_IMG2;
        			break;
    		case 3:
        			$image_error = C_IMG3;
        			break;
    		case 6:
        			$image_error = C_IMG6;
        			break;
    		case 7:
        			$image_error = C_IMG7;
        			break;
    		case 8:
        			$image_error = C_IMG8;
        			break;
    		default:
       				$image_error = '';

		}

	}

	// share file with room/user

	$shareWithUsername = '';

	if($_POST['shareID'] == '2')
	{
		$_POST['shareWithUser'] = strip_tags($_POST['shareWithUser']);

		// check username is in database
		$userExists=mysql_query("
				SELECT username 
				FROM prochatrooms_users 
				WHERE username = '".makeSafe($_POST['shareWithUser'])."' 
				LIMIT 1
				") or die(mysql_error()); 

		// if user doesnt exists, do error
		if(!mysql_num_rows($userExists))
		{	
			$image_error = "Error - Username [".$_POST['shareWithUser']."] does not exist";	
		}
		else
		{
			$shareWithUsername = $_POST['shareWithUser'];
		}

	}

	$result = $image_error;

	if($ext_allowed && !$image_error)
	{

		// PHP file upload reference
		// http://www.scanit.be/uploads/php-file-upload.pdf

		$uploadfile = $uploaddir.md5(basename($_FILES['uploadedfile']['name']).rand(1,999999).rand(1,999999));

		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $uploadfile))
		{ // update the user details and image

			if(!chmod($uploadfile, 0644))
			{
				die("unable to chmod images to 644");
			}
		}

		$imageUploaded = '1';

	}

	if($imageUploaded)
	{ 
		$fileRef = date("U").rand(1,99999);

		$size =	getimagesize($uploadfile);

		if($size[0] > $resize || $size[1] > $resize)
		{
			if ($size[0] > $size[1]) 
			{ 
				$percentage = ($resize / $size[0] ); 
			} 
			else 
			{ 
				$percentage = ($resize / $size[1]); 
			} 

			$size[0] = round($size[0] * $percentage); 
			$size[1] = round($size[1] * $percentage); 
		}

		if($shareWithUsername)
		{
			$bMessage = " &amp;#187; ".$shareWithUsername.": ";
			$pMessage = "|1|0";
		}		

		if($_FILES['uploadedfile']['type'] == 'image/jpeg' || $_FILES['uploadedfile']['type'] == 'image/pjpeg' || $_FILES['uploadedfile']['type'] == 'image/gif')
		{
			$link = $bMessage."[[br]][[a href=\"plugins/share/view.php?id=".$fileRef."\" target=\"_blank\"]][[img src=\"plugins/share/view.php?id=".$fileRef."\" width=\"".$size[0]."\" height=\"".$size[1]."\" border=\"0\"]][[/a]]";
		}
		else
		{
			$link = $bMessage."[[br]]File Uploaded: [".$_FILES['uploadedfile']['name']."] - [[a href=\"plugins/share/view.php?id=".$fileRef."\" target=\"_blank\"]]Click Here[[/a]] to view the file.";
		}

		$shareMessage = "share.gif|#000000|12px|Verdana|".$link.$pMessage;

		// insert image into db
		$sql = "INSERT INTO prochatrooms_share(
												ref,
												username, 
												file
												) 
				VALUES (
							'".$fileRef."', 
							'".makeSafe($_SESSION['username'])."', 
							'".makeSafe($_FILES['uploadedfile']['type'])."|".makeSafe(basename($uploadfile))."'
						)";

		mysql_query($sql);

		// insert message into db
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
				'".makeSafe($_SESSION['myProfileID'])."', 
				'".makeSafe("chatContainer")."', 
				'".makeSafe($_SESSION['username'])."', 
				'".makeSafe($shareWithUsername)."', 
				'".$shareMessage."', 
				'".makeSafe("beep_high.mp3")."', 
				'".makeSafe($_SESSION['room'])."',
				'1',
				'".getTime()."'
			)";

		mysql_query($sql) 
		or die(mysql_error());

		$result = "Success, the file is being uploaded ...";
	}

}

/*
* show share file
*
*/

function showShareFile($id,$page)
{
	// strip tags
	if(!is_numeric($id))
	{
		return "invalid id";
	}

	// get file
	$tmp=mysql_query("
			SELECT file 
			FROM prochatrooms_share 
			WHERE ref ='".$id."' 
			LIMIT 1
			");

	while($i=mysql_fetch_array($tmp)) 
	{
		$image = explode("|", $i['file']);

		$html  = header("Content-Type:".$image[0]);
		$html .= readfile("uploads/".$image[1]);

		return $html;
	}

}

?>