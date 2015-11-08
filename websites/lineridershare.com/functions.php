<?php
function database_connect() {
	// Password removed for security reasons
	mysql_connect("linerider.db.3271442.hostedresource.com", "linerider", "PASSWORD");
	mysql_select_db("linerider");
}
database_connect();

function fromShort($data=0) {
	$a = $value % 256;
	$b = floor($value / 256);
	return chr($b) . chr($a);
}

function toBoolean($data) {
	if (ord($data) == 1) { return true; } else { return false; }
}
function toShort($data) {
	$a = ord(substr($data, 0, 1));
	$b = ord(substr($data, 1, 1));
	return (int)$a * 256 + $b;
}
function toLong($data) {
	$a = ord(substr($data, 0, 1));
	$b = ord(substr($data, 1, 1));
	$c = ord(substr($data, 2, 1));
	$d = ord(substr($data, 3, 1));
	return (int)$a * 16777216 + $b * 65536 + $c * 256 + $d;
}
function toDouble($data) {
	$t = unpack("C*", pack("S*", 256));
	if($t[1] == 1) {
  		$a = unpack("d*", $data);
	} else {
   		$a = unpack("d*", strrev($data));
	}
	return (double)$a[1];
}
function toByte($data) {
	return ord($data);
}

function groupHead($title="Line Rider Share", $color="243454", $bg="FFFFFF", $size=256, $transparent="no") {

	if (substr($title, 0, 7) == "<right>") {
		$align = 'right';
		$title = substr($title, 7);
	} elseif (substr($title, 0, 6) == "<left>") {
		$align = 'left';
		$title = substr($title, 6);
	} else { $align = 'center'; }
	shadow($align);

	if (empty($title)) { $title = "Line Rider Share"; }
	if (empty($color)) { $color = "243454"; }
	if (empty($bg)) { $bg = "FFFFFF"; }
	if (empty($size)) { $size = 256; }
	if (empty($transparent)) { $transparent = "no"; }
	echo '<table cellspacing="0" cellpadding="0" border="0" align="' . $align . '">';
	echo '<tr><td><img src="group.php?id=tl&color=' . $color . '"></td><td align="left" width="' . $size . '" height="20" background="group.php?id=tm&color=' . $color . '" style="color: #FFFFFF; font-weight: bold;">' . $title . '</td><td><img src="group.php?id=tr&color=' . $color . '"></td></tr>';
	echo '<tr><td width="8"';
	if ($transparent == "no") { echo ' background="group.php?id=ml&color=' . $color . '&bg=' . $bg . '">'; }
	elseif ($transparent == "yes") { echo ' background="images/shadowbg.png">'; }
	elseif ($transparent == "light") { echo ' background="images/lshadowbg.png">'; }
	elseif ($transparent == "dark") { echo ' background="images/dshadowbg.png">'; }
	echo '</td><td width="' . $size . '" ';
	if ($transparent == "no") { echo 'bgcolor="#' . $bg . '"'; }
	elseif ($transparent == "yes") { echo 'background="images/shadowbg.png"'; }
	elseif ($transparent == "light") { echo 'background="images/lshadowbg.png"'; }
	elseif ($transparent == "dark") { echo ' background="images/dshadowbg.png"'; }
	echo '><table cellpadding="4" cellspacing="0" border="0" width="' . $size . '"><tr><td width="' . $size .'" align="left">';
} //Title, Color, BG, Size, transparent [yes|no]
function groupFoot($color="243454", $bg="FFFFFF", $transparent="no") {
	if (empty($color)) { $color = "243454"; }
	if (empty($bg)) { $bg = "FFFFFF"; }
	if (empty($transparent)) { $transparent="no"; }
	echo '</td></tr></table></td><td width="8"';
	
	if ($transparent == "no") { echo ' background="group.php?id=mr&color=' . $color . '&bg=' . $bg . '">'; }
	elseif ($transparent == "yes") { echo ' background="images/shadowbg.png">'; }
	elseif ($transparent == "light") { echo ' background="images/lshadowbg.png">'; }
	elseif ($transparent == "dark") { echo ' background="images/dshadowbg.png">'; }
	echo '</td></tr>';
	if ($transparent == "no") { echo '<tr><td colspan="3" height="1" background="group.php?id=bm&color=' . $color . '"></td></tr>'; }
	echo '</table>';
	
	endShadow();
} //Color, bg, transparent [yes|no]

function readBoolean($file) {
	$tmp = fread($file, 1);
	if (ord($tmp) == 1) { return true; } else { return false; }
}
function readByte($file) {
	return ord(fread($file, 1));
}
function readShort($file) {
	$a = ord(fread($file, 1));
	$b = ord(fread($file, 1));
	return (int)$a * 256 + $b;
}
function readLong($file) {
	$a = ord(fread($file, 1));
	$b = ord(fread($file, 1));
	$c = ord(fread($file, 1));
	$d = ord(fread($file, 1));
	return (int)$a * 16777216 + $b * 65536 + $c * 256 + $d;
}
function readDouble($file) {
	$data = fread($file, 8);
	//$t = unpack("C*", pack("S*", 256));
	//if($t[1] == 1) {
  	//	$a = unpack("d*", $data);
	//} else {
   		$a = unpack("d*", strrev($data));
	//}
	return (double)$a[1];
}
function readString($file, $length) {
	if ($length == 0) { return ''; }
	return fread($file, $length);
}
function readHexString($file, $length) {
	$ret = '';
	for ($i=0;$i<$length;$i++) {
		$ret .= dechex(ord(fread($file, 1)));
	}
	return $ret;
}
function skip($file, $length) {
	fseek($file, $length, SEEK_CUR);
}

function writeBoolean($file, $value=false) {
	if ($value==false) { fwrite($file, '0'); } else { fwrite($file, '1'); }
}
function writeByte($file, $value=0) {
	fwrite($file, chr($value));
}
function writeShort($file, $value=0) {
	$a = $value % 256;
	$b = floor($value / 256);
	fwrite($file, chr($b) . chr($a));
}
function writeLong($file, $value=0) {
	$a = $value % 256;
	$b = floor($value / 256);
	$c = floor($value / 65536);
	$d = floor($value / 16777216);
	fwrite($file, chr($d) . chr($c) . chr($b) . chr($a));
}
function writeDouble($file, $value=0) {
	$data = pack("d*", $value);
	fwrite($file, strrev($data));
}
function writeString($file, $value="") {
	fwrite($file, $value);
}
function writeHexString($file, $value="") {
	$ret = '';
	for ($i=0;$i<strlen($value);$i+=2) {
		$ret .= chr(hexdec(substr($value, $i, 2)));
	}
	fwrite($file, $ret);
}

function rights($name) {
	$file = explode(chr(0), file_get_contents("rights.dat"));
	$ret = '';
	for ($i=0;$i<count($file);$i++) {
		$r = explode(chr(9), $file[$i]);
		if ($r[0] == $name) { return $r[1]; }
	}
	return $ret;
}
function checkUserInfo($name, $value) {
//Checks if the users session info (such as previously viewed or downloaded tracks) contains $value
if (!isset($_SESSION[$name])) { return false; } // DO NOT USE empty() here because empty(0) return true!
	$info = explode(chr(0), $_SESSION[$name]);
	return in_array($value, $info);
}
function setUserInfo($name, $value) {
	if (!empty($_SESSION[$name])) {
		$info = explode(chr(0), $_SESSION[$name]);
	} else {
		$info = array();
	}
	if (!in_array($value, $info)) { array_push($info, $value); }
	$_SESSION[$name] = implode(chr(0), $info);
}
function inManager($id, $user) {
	if (!file_exists("tracks/managers/" . $user . ".manager")) { return false; }
	if (empty($user)) { return false; }
	$file = file_get_contents("tracks/managers/" . $user . ".manager");
	$file = explode("\r\n", $file);
	return in_array($id, $file);
}

function upgradeSol($filename) {
	if (!file_exists($filename)) { return false; } //Error: File does not exist

	$file = fopen($filename, "r"); // tracks/username.sol
	$wfile = fopen($filename . "up", "w"); // tracks/username.solup
	
	skip($file, 2); // 00BF
	$fileSize = readLong($file); // File Size
	skip($file, 10); // T C S O 0004 0000 0000
	$tmp = readShort($file);
	if ($tmp == 10) { return false; } //Error: File is already upgraded
	readString($file, $tmp);
	skip($file, 4); // 0000 0000
	
	$currentTrack = -1;
	$currentLine = 0;
	
	$tracks = array(array("blank", 0, 0));
	$trackname = array("blank");
	$trackstart = array(0);
	$tracklength = array(0);
	$linesx1 = array(0);
	$linesy1 = array(0);
	$linesx2 = array(0);
	$linesy2 = array(0);
	while (ftell($file) < $fileSize - 6) {
		$skipIt = false;
		$length = readShort($file);
		if ($length == 0) {
			if (readByte($file) == 9) { //End Array/Object
				$skipIt = true;
			} else {
				skip($file, -1); //Invalid item of length 0
				$skipIt = true;
			}
		}
		
		if ($skipIt == false) {
			$name = readString($file, $length);
			$type = readByte($file);
			
			if ($type == 0) { //Double
				$value = readDouble($file);
				$name = (int)$name;
				
				if ($name == 0) { $linesx1[$currentLine] = $value; }
				if ($name == 1) { $linesy1[$currentLine] = $value; }
				if ($name == 2) { $linesx2[$currentLine] = $value; }
				if ($name == 3) { $linesy2[$currentLine] = $value; }
				
				if ($name == 4) {
					$currentLine++;
				}
			}
			if ($type == 2) { //String
				$strlength = readShort($file);
				$value = readString($file, $strlength);
				
				if ($name == "label") { $tracks[$currentTrack][0] = $value; }
			}
			if ($type == 3) { //Object
				$currentTrack = (int)$name;
				$tracks[$currentTrack][1] = $tracks[$currentTrack-1][1]+$tracks[$currentTrack-1][2];
			}
			if ($type == 7) { // Pointer: Skip over until pointer support is added...
				readShort($file);
			}
			if ($type == 8) { //Array
				$value = readLong($file);
				
				if ($name == "data") { $tracks[$currentTrack][2] = $value; } //$currentLine - $trackstart[$currentTrack];
				//if (is_numeric($name)) { $currentLine = (int)$name; }
			}
		}
	}
	
	//writeHexString($wfile, "00BF"); // 00BF  ****This will be added upon changing file size
	//writeString($wfile, "SIZE"); // Filesize ****Size will also be added later
	writeString($wfile, "TCSO"); // Filetype
	writeHexString($wfile, "000400000000000A"); // Unknown & Length
	writeString($wfile, "savedLines");
	writeHexString($wfile, "000000000009"); // Unknown & length
	writeString($wfile, "trackList");
	writeByte($wfile, 8);
	writeLong($wfile, count($tracks));
	for ($i=0;$i<count($tracks);$i++) {
		writeShort($wfile, strlen((string)$i));
		writeString($wfile, (string)$i);
		writeByte($wfile, 3);
		
		writeShort($wfile, 7);
		writeString($wfile, "version");
		writeByte($wfile, 2);
		writeShort($wfile, 3);
		writeString($wfile, "6.1");
		
		writeShort($wfile, 9);
		writeString($wfile, "startLine");
		writeByte($wfile, 8);
		writeLong($wfile, 2);
		
		writeShort($wfile, 1);
		writeString($wfile, "0");
		writeByte($wfile, 0);
		writeDouble($wfile, $linesx1[$tracks[$i][1]]);
		
		writeShort($wfile, 1);
		writeString($wfile, "1");
		writeByte($wfile, 0);
		writeDouble($wfile, $linesy1[$tracks[$i][1]]-15); //Default start position is x, y - 15 relative to the first line
		
		writeHexString($wfile, "000009");
		writeShort($wfile, 5);
		writeString($wfile, "level");
		writeByte($wfile, 0);
		writeDouble($wfile, $tracks[$i][2]-$tracks[$i][1]); //Set level on the next line to be drawn
		
		writeShort($wfile, 4);
		writeString($wfile, "data");
		writeByte($wfile, 8);
		writeLong($wfile, $tracks[$i][2]);
	
		for ($j=$tracks[$i][1];$j<$tracks[$i][1]+$tracks[$i][2];$j++) {
			writeShort($wfile, strlen((string)$j-$tracks[$i][1]))+1;
			writeString($wfile, (string)$j-$tracks[$i][1])+1;
			writeByte($wfile, 8);
			writeLong($wfile, 10);
			
			for ($k=0;$k<10;$k++) {
				writeShort($wfile, strlen((string)$k));
				writeString($wfile, (string)$k);
				if ($k <= 5 || $k >= 8) {
					writeByte($wfile, 0); // Double
				} else { writeByte($wfile, 6); } //Undefined
				
				if ($k == 0) { writeDouble($wfile, $linesx1[$j]); } //X1
				if ($k == 1) { writeDouble($wfile, $linesy1[$j]); } //Y1
				if ($k == 2) { writeDouble($wfile, $linesx2[$j]); } //X2
				if ($k == 3) { writeDouble($wfile, $linesy2[$j]); } //Y2
				if ($k == 4) { writeDouble($wfile, 0); } //Unknown? Angles... ?
				if ($k == 5) { writeDouble($wfile, 0); } //Flip
						//6 & 7: Snap start & end
				if ($k == 8) { writeDouble($wfile, $tracks[$i][2]-($j-$tracks[$i][1])); } //Line number reversed ending at 0
				if ($k == 9) { writeDouble($wfile, 0); } // Line type (0=norm, 1=accel, 2=back)
			}
			
			writeHexString($wfile, "000009"); // End Line
		}
		
		writeHexString($wfile, "0000090005"); //End Track
		writeString($wfile, "label");
		writeByte($wfile, 2);
		writeShort($wfile, strlen($tracks[$i][0]));
		writeString($wfile, $tracks[$i][0]);
		writeHexString($wfile, "000009");
	}
	writeHexString($wfile, "00000900");
	
	fclose($file); fclose($wfile);
	$finish = file_get_contents($filename . "up");
	$wfile = fopen($filename, "w");
	writeHexString($wfile, "00BF");
	writeLong($wfile, strlen($finish)-6);
	writeString($wfile, $finish);
	fclose($wfile);
	
	unlink($filename . "up"); //Delete working .sol
}

function encode($value) {
	$ret = "";
	for ($i=0;$i<strlen($value);$i++) {
		$tmp = ord(substr($value, $i, 1)) + 13;
		if ($tmp > 255) { $tmp -= 256; }
		$ret .= chr($tmp);
	}
	return $ret;
}
function decode($value) {
	$ret = "";
	for ($i=0;$i<strlen($value);$i++) {
		$tmp = ord(substr($value, $i, 1)) - 13;
		if ($tmp < 0) { $tmp += 256; }
		$ret .= chr($tmp);
	}
	return $ret;
}

function fileInfo($file) {
	//This function will get file information from the .sol file (NOT FINISHED PLAN TO MAKE IT GET INFO FROM .track FILE)
	fread($file, 2); // 00BF
	//$info = array( length => $fileSize )
	
	$fileSize = readLong($file);
	$fileType = readString($file, 4); // TCSO
	skip($file, 6); // 0004 0000 0000
	
	$length = readShort($file);
	$fileName = readString($file, $length);
	skip($file, 4); // 0000 0000
	
	while (ftell($file) < $fileSize - 6) {
		$length = readShort($file);
		$name = readString($file, $length);
		$type = readByte($file);
		
		if ($type == 8) { //Array
			$value = readLong($file);
			if ($name == "trackList") { $fileTracks = $value; }
		}
	}
}
function addTracks($user, $tracks) { //$tracks should be a string of track ID's seperated by chr(9)'s
	//This function will add tracks to $user's .manager file
	$file = fopen("tracks/managers/" . $user . ".manager", "a");
	$tracks = explode(chr(9), $tracks);
	for ($i=0;$i<count($tracks);$i++) {
		//            Track ID               Track Name                               Author           Description
		fwrite($file, $tracks[$i]);
		fwrite($file, "\r\n");
	}
	fclose($file);
}
function addDetails($id, $label) {
	//This function will add the track into the SQL database
	//and will also add the server details to the database
	if (isset($_SESSION['user']) == false) { $user = "Anonymous"; } else { $user = $_SESSION['user']; }
	$is = chr(9);
	$and = chr(0);
	$previewString = "type".$is."gif".$and."bg".$is."FFFFFF".$and."grad".$is."".$and."arrows".$is."1".$and."bw".$is."no".$and."detail".$is."yes".$and."start".$is."yes";
	$spreviewString = "bw".$is."no".$and."start".$is."no";
	
	mysql_query("INSERT INTO tracks
	(id,label,author,description,views,downloads,rating,private,created,preview,smallpreview) VALUES
	(" . $id . ", '" . $label . "', '" . $user . "', 'No description', 0, 0, '', 'no', " . strval(time()) . ", '"
	. $previewString . "', '" . $spreviewString . "')");
	
	/* DETAILS ARE STORED USING MYSQL AS OF 10/18/2007, THIS FUNCTION NO LONGER WRITES RAW TO .TRACK FILE
	
	//This function will add the server required details to the beginning of the $id.track file
	$file = fopen("tracks/" . $id . ".track", "r");
	$original = fread($file, filesize("tracks/" . $id . ".track"));
	fclose($file);
	unlink("tracks/" . $id . ".track");
	$file = fopen("tracks/" . $id . ".track", "w");
	$details = array("author", "description", "views", "downloads", "rating", "private", "created", "preview", "smallpreview");
	if (isset($_SESSION['user']) == false) { $user = "Anonymous"; } else { $user = $_SESSION['user']; }
	$is = chr(9);
	$and = chr(0);
	$previewString = "type".$is."gif".$and."bg".$is."FFFFFF".$and."grad".$is."".$and."arrows".$is."1".$and."bw".$is."no".$and."detail".$is."yes".$and."start".$is."yes";
	$spreviewString = "bw".$is."no".$and."start".$is."no";
	$values = array($user, "No description.", "0", "0", "", "no", strval(time()), $previewString, $spreviewString);
	for ($i=0;$i<count($details);$i++) {
		writeShort($file, strlen($details[$i]));
		writeString($file, $details[$i]);
		writeByte($file, 2);
		writeShort($file, strlen($values[$i]));
		writeString($file, $values[$i]);
	}
	writeString($file, $original);
	fclose($file);
	*/
}
function getRealTrack($id) { //Returns data for this track, starting with the version
	if (file_exists("tracks/" . $id . ".track")) {
		$file = fopen("tracks/" . $id . ".track", "r");
		
		while (ftell($file) < filesize("tracks/" . $id . ".track")) {
			$skipIt = false;
			$length = readShort($file);
			if ($length == 0) {
				if (readByte($file) == 9) { //End Array/Object
					$skipIt = true;
				} else {
					skip($file, -1); //Invalid item of length 0
					$skipIt = true;
				}
			}
			
			if ($skipIt == false) {
				$name = readString($file, $length);
				$type = readByte($file);
				
				if ($type == 2 && $name == "version") {
					fseek($file, -10, SEEK_CUR);
					return fread($file, filesize("tracks/" . $id . ".track"));
					break;
				}
				
				if ($type == 0) { //Double
					skip($file, 8); }
				if ($type == 1) { //Boolean (Show)
					skip($file, 1); }
				if ($type == 2) { //String
					$strlength = readShort($file);
					skip($file, $strlength);
				}
				//Type 3 & 6 Do Nothing
				if ($type == 8) { //Array
					skip($file, 4);
				}
			}
		}
		fclose($file);
	}
}
function getInfo($id, $infoname, $infotype=2, $method="sql") {
	if ($method=="sql") { //More efficient database method
		$result = mysql_query("SELECT * FROM tracks WHERE id=".$id);
		$tdata = mysql_fetch_array($result);
		return $tdata[$infoname];
	} else { //Raw data method (CAUTION values are not stored this way anymore as of 10/18/2007 with the exception of label)
		//This function will get the first item's value whose name is $infoname and type is $infotype
		if (file_exists("tracks/" . $id . ".track")) {
			$contents = file_get_contents("tracks/" . $id . ".track");
			
			$pos = strpos($contents, $infoname) + strlen($infoname);
			
			$type = toByte(substr($contents, $pos, 1));
			$pos++;
			if ($infotype == $type) {
				if ($type == 0) { return toDouble(substr($contents, $pos, 8)); } //Return double value
				elseif ($type == 1) { return toBoolean(substr($contents, $pos, 1)); } //Return boolean value
				elseif ($type == 2) { $strlength = toShort(substr($contents, $pos, 2)); return substr($contents, $pos+2, $strlength); } //Return string value
				elseif ($type == 3) { return true; } //Return object exists
				elseif ($type == 6) { return true; } //Return undefined exists
				elseif ($type == 8) { return toLong(substr($contents, $pos, 4)); } //Return number of items in array
			}
		}
	}
}
function setInfo($id, $infoname, $infovalue, $infotype=2) {
	mysql_query("UPDATE tracks SET ".$infoname." = '".$infovalue."' WHERE id = ".$id) or die(mysql_error());
	
	/*
	//This function will set the first item's value whose name is $infoname and type is $infotype to $infovalue
	$file = fopen("tracks/" . $id . ".track", "r");
	
	while (ftell($file) < filesize("tracks/" . $id . ".track")) {
		$skipIt = false;
		$length = readShort($file);
		if ($length == 0) {
			if (readByte($file) == 9) { //End Array/Object
				$skipIt = true;
			} else {
				skip($file, -1); //Invalid item of length 0
				$skipIt = true;
			}
		}
		
		if ($skipIt == false) {
			$name = readString($file, $length);
			$type = readByte($file);
			
			if ($type == $infotype && $name == $infoname) {
				if ($type == 0) { $pos = ftell($file); } //Return double value position
				elseif ($type == 1) { $pos = ftell($file); } //Return boolean value position
				elseif ($type == 2) { $pos = ftell($file); } //Return string value position
				
				fseek($file, 0);
				$before = readString($file, $pos);
				
				if ($type == 0) { fseek($file, 8, SEEK_CUR); }
				elseif ($type == 1) { fseek($file, 1, SEEK_CUR); }
				elseif ($type == 2) { $strlen = readShort($file); fseek($file, $strlen, SEEK_CUR); }
				$after = readString($file, filesize("tracks/" . $id . ".track"));
				$wfile = fopen("tracks/" . $id . ".track", "w");
				writeString($wfile, $before);
				if ($type == 0) {
					writeDouble($wfile, $infoValue);
				} elseif ($type == 1) {
					writeBoolean($wfile, $value);
				} elseif ($type == 2) {
					writeShort($wfile, strlen($infovalue));
					writeString($wfile, $infovalue);
				}
				writeString($wfile, $after);
				fclose($wfile);
				
				break;
			}
			if ($type == 0) { //Double
				skip($file, 8); }
			if ($type == 1) { //Boolean (Show)
				skip($file, 1); }
			if ($type == 2) { //String
				$strlength = readShort($file);
				skip($file, $strlength);
			}
			//Type 3 & 6 Do Nothing
			if ($type == 8) { //Array
				skip($file, 4);
			}
		}
	}
	fclose($file);
	*/
}
function avgRating($rstring) {
	if (empty($rstring)) { return false; } else {
		$rating = explode(chr(0), $rstring);
		$avg = 0;
		for ($i=0;$i<count($rating);$i++) {
			$r = explode(chr(9), $rating[$i]); // $r[0] = author | $r[1] = rated
			$avg += $r[1];
		}
		return $avg / count($rating);
	}
}
function splitTracks($filename) {
	//This function will export tracks from a users savedLines.sol file
	$file = fopen($filename, "r");

	skip($file, 2); // 00BF
	$fileSize = readLong($file); // File Size
	skip($file, 12); // T C S O 0004 0000 0000 000A
	if (readString($file, 9) == "undefined") {
		//Old version
		fclose($file);
		upgradeSol($filename);
		$file = fopen($filename, "r");
		
		skip($file, 2); // 00BF
		$fileSize = readLong($file); // File Size
		skip($file, 12); // T C S O 0004 0000 0000 000A
		
		if (readString($file, 9) != "undefined") {
			skip($file, 1); // s (from end of savedLines)
		} else {
			//Error: Unable to upgrade .sol
		}
	} else {
		skip($file, 1); // s (from end of savedLines)
	}
	skip($file, 4); // 0000 0000
	
	$currentTrack = -1;
	
	$trackNames = '';
	while (ftell($file) < $fileSize - 6) {
		$skipIt = false;
		$length = readShort($file);
		if ($length == 0) {
			if (readByte($file) == 9) { //End Array/Object
				$skipIt = true;
			} else {
				skip($file, -1); //Invalid item of length 0
				$skipIt = true;
			}
		}
		
		if ($skipIt == false) {
			$name = readString($file, $length);
			$type = readByte($file);
			
			if ($type == 0) { //Double
				$value = readDouble($file);
			}
			if ($type == 1) { //Boolean (Show)
				skip($file, 1);
			}
			if ($type == 2) { //String
				$strlength = readShort($file);
				$value = readString($file, $strlength);
				
				$trackLengthOff[$currentTrack] = ftell($file) - $trackStartOff[$currentTrack] + 3;
				if ($name == 'label') { $trackNames .= $value . chr(9); }
			}
			if ($type == 3) { //Object
				$currentTrack = (int)$name;
				$trackStartOff[$currentTrack] = ftell($file);
			}
			// Type 6: Undefined: Do Nothing
			if ($type == 8) { //Array
				$value = readLong($file);
			}
		}
	}
	
	$trackNames = substr($trackNames, 0, strlen($trackNames)-1);
	
	$ret = '';
	for ($i=0;$i<count($trackStartOff);$i++) {
		fseek($file, $trackStartOff[$i]);
		$bytes = fread($file, $trackLengthOff[$i]);
		for ($j=0;$j>-1;$j++) {
			if (file_exists("tracks/" . $j . ".track") == false) {
				$wfile = fopen("tracks/" . $j . ".track", "w");
				$ret .= $j . chr(9);
				$mem = $j;
				break;
			}
		}
		fwrite($wfile, $bytes);
		
		fclose($wfile);
		
		$thisName = explode(chr(9), $trackNames); $thisName = $thisName[$i];
		addDetails($j, $thisName);
	}
	
	fclose($file);
	
	$ret = substr($ret, 0, strlen($ret)-1);
	return $ret . chr(0) . $trackNames; //Returns an array containing the location of the tracks
}
function mergeTracks($user, $tracks) { //$tracks should be a string of track ID's seperated by chr(9)'s
	$sol = "tracks/managers/" . $user . ".sol";
	
	$tracks = explode(chr(9), $tracks);
	
	$file = fopen($sol, "w");
	
	writeHexString($file, "00BF");
	
	$fsize = 46;
	for ($i=0;$i<count($tracks)-1;$i++) {
		$fsize += 3 + strlen(strval($i)) + strlen(getRealTrack($tracks[$i]));
	}
	
	writeLong($file, $fsize); //Filesize
	writeString($file, "TCSO"); //Filetype
	writeHexString($file, "000400000000"); //Unknown
	writeShort($file, 10);
	writeString($file, "savedLines"); //Saved Lines
	writeHexString($file, "00000000"); //Unknown
	writeShort($file, 9);
	writeString($file, "trackList"); //Begin Tracks
	writeByte($file, 8);
	writeLong($file, count($tracks)-1);
	for ($i=0;$i<count($tracks)-1;$i++) {
		writeShort($file, strlen(strval($i)));
		writeString($file, strval($i)); //Object Track ID
		writeByte($file, 3);
		writeString($file, getRealTrack($tracks[$i])); //Track Data
	}
	writeHexString($file, "0000900"); //End Tracks
	fclose($file);
}
function createdirectory($dirname) {
	return mkdir($dirname, 0777);
}
function deletedirectory($dirname)  {
	if  (is_dir($dirname))
		$dir_handle = opendir($dirname);
	if  (!$dir_handle)
		return false;
	while($file = readdir($dir_handle))  {
		if  ($file != "." && $file != "..")  {
			if (!is_dir($dirname."/".$file))
				unlink($dirname."/".$file);
			else
				delete_directory($dirname.'/'.$file);                       
		}
	}
	closedir($dir_handle);
	rmdir($dirname);
	return true;
} 

function lastTrack() {
	$tmp = mysql_fetch_array(mysql_query("SELECT * FROM tracks ORDER BY id DESC LIMIT 0, 1"));
	return $tmp['id'];
}
function totalTracks() {
	$tmp = mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM tracks"));
	return $tmp[0];
}

function trackToFlash($id) {
	if (file_exists("tracks/" . $id . ".track")) {
		$file = fopen("tracks/" . $id . ".track", "r");
		$startLine = false;
		$final = "";
		$lineid = 0;
		
		while (ftell($file) < filesize("tracks/" . $id . ".track")) {
			$skipIt = false;
			$length = readShort($file);
			if ($length == 0) {
				if (readByte($file) == 9) { //End Array/Object
					$skipIt = true;
					if ($startLine == true) { $startLine = false; }
				} else {
					skip($file, -1); //Invalid item of length 0
					$skipIt = true;
				}
			}
			
			if ($skipIt == false) {
				$name = readString($file, $length);
				$type = readByte($file);
				
				if ($type == 0) { //Double
					if ($startLine == true) { $append = "s"; } else { $append = "l"; }
					if ($name != 'level') {
						$val = readDouble($file);
						if ((string)$val == 'NAN') { $val = 'undefined'; }
						$final .= $append . $lineid . "_" . $name . "=" . $val . "&";
					} else {
						skip($file, 8);
					}
				}
				if ($type == 1) { //Boolean (Show)
					skip($file, 1);
				}
				if ($type == 2) { //String
					$strlength = readShort($file);
					skip($file, $strlength);
				}
				//Type 3 & 6 Do Nothing
				if ($type == 8) { //Array
					if ($name == "startLine") { $startLine = true; } else { $lineid = (int)$name; }
					skip($file, 4);
				}
			}
		}
		fclose($file);
		$final = substr($final, 0, strlen($final)-1);
		return $final;
	}
}

function realSize($bytes, $prec=2) {
	$ret = array();
	if ($bytes < 1024) { $ret[0] = $bytes; $ret[1] = 'Bytes'; $ret[2] = 'Bytes'; }
	if ($bytes >= 1024 && $bytes < pow(1024,2)) { $ret[0] = round($bytes/1024, $prec); $ret[1] = 'KB'; $ret[2] = 'Kilobytes'; }
	if ($bytes >= pow(1024,2) && $bytes < pow(1024,3)) { $ret[0] = round($bytes/pow(1024,2), $prec); $ret[1] = 'MB'; $ret[2] = 'Megabytes'; }
	if ($bytes >= pow(1024,3) && $bytes < pow(1024,4)) { $ret[0] = round($bytes/pow(1024,3), $prec); $ret[1] = 'GB'; $ret[2] = 'Gigabytes'; }
	if ($bytes >= pow(1024,4)) { $ret[0] = round($bytes/pow(1024,4), $prec); $ret[1] = 'TB'; $ret[2] = 'Terabytes'; }
	return $ret;
}

function shadow($align = "center") {
	echo '<table cellpadding="0" cellspacing="0" border="0" align="' . $align . '"><tr><td>';
}
function endShadow() {
	echo '</td><td style="background: url(\'images/shadowr.png\'); background-repeat: no-repeat; background-position: 0px 6px;" width="6"></td></tr>';
	echo '<tr><td style="background: url(\'images/shadowb.png\'); background-repeat: no-repeat; background-position: 6px 0px;" height="6"></td><td style="background: url(\'images/shadowbr.png\'); background-repeat: no-repeat;" width="6" height="6"></td></tr>';
	echo '</table>';
}

function distanceBetween($x1, $y1, $x2, $y2) {
	return sqrt(($x2-$x1)^2+($y2-$y1)^2);
}
function blend($n1, $n2, $a) { //Blends two numbers by $a amount (should be between 0-1)
	return (1-$a)*$n1 + $a*$n2;
}
function pointDirection($x1, $y1, $x2, $y2) { //Returns direction [0-360]
	$ret = atan2($y2-$y1, $x2-$x1);
	$ret = $ret * 57.295779513;
	$ret += 180;
	$ret = 360 - $ret;
	$ret -= 180;
	if ($ret < 0) { $ret += 360; }
	return round($ret);
}

if(!function_exists('str_ireplace')) {
function str_ireplace($search,$replace,$subject) {
$search = preg_quote($search, "/");
return preg_replace("/".$search."/i", $replace, $subject); } } // Function str_ireplace
?>