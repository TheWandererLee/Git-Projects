<?php
require("functions.php");
//set_error_handler("whoops");

// #################
// #    Options    #
// #################
//
// ###################################################################
// # Info                             # Default Value #
// ###################################################################
// # type: [png|jpeg|gif]             # gif           # Which file format to use.
// # w: #                             # automatic     # Image width
// # h: #                             # automatic     # Image height
// # bw: [true|false] or [yes|no]     # false         # Black and white only mode
// # bg: ######                       # FFFFFF        # Background color
// # grad: [h]######                  # FFFFFF (none) # Gradient color (at bottom of screen), prefix with h for horizontal gradient
// # fade: #                          # 0             # Amount to fade lines into background color, range 0 - 1, 1 being completely invisible
// # start: [true|false] or [yes|no]  # true          # Show track starting position
// # arrows: "types"                  # 1             # Line types to use arrows on (eg. 1, 02, 12, 012)
// # detail: [true|false] or [yes|no] # auto          # Use details on the track such as floor line. Details will not work in B&W mode. Auto: true when fullsize, false when resized
// ###################################################################

if (file_exists("tracks/" . $_REQUEST['id'] . ".track") == false) {
	$fs = 11;
	$text = "Track ID '" . $_REQUEST['id'] . "' does not exist.";
	$bound = imagettfbbox($fs, 0, "../fonts/all/LBLACK.TTF", $text);
	$img = imagecreatetruecolor($bound[2]-$bound[0]+391, 276+16);
	for ($i=0;$i<255;$i+=12.5) {
		imagefttext($img, $fs, 0, 391-$i*1.5+1, 270-$i+1, imagecolorallocate($img, 128, 128, 128), "../fonts/all/LBLACK.TTF", $text);
		imagefttext($img, $fs, 0, 391-$i*1.5, 270-$i, imagecolorallocate($img, $i, 255-$i, 0), "../fonts/all/LBLACK.TTF", $text);
		
		imagefttext($img, $fs, 0, 16+$i*1.5+1, 270-$i+1, imagecolorallocate($img, 128, 128, 128), "../fonts/all/LBLACK.TTF", $text);
		imagefttext($img, $fs, 0, 16+$i*1.5, 270-$i, imagecolorallocate($img, (255-$i), (255-$i), $i), "../fonts/all/LBLACK.TTF", $text);
		if ($i==125) {
			imagefttext($img, $fs, 0, 16+$i*1.5, 270-$i, imagecolorallocate($img, 255, 255, 255), "../fonts/all/LBLACK.TTF", $text);
		}
	}
	header("Content-type: image/gif");
	imagegif($img);
	exit;
}

$outputSmall = false;
$outputBig = false;
if (empty($_REQUEST['type']) && empty($_REQUEST['bw']) && empty($_REQUEST['bg']) && empty($_REQUEST['grad']) && empty($_REQUEST['fade']) && empty($_REQUEST['start']) && empty($_REQUEST['arrows']) && empty($_REQUEST['detail'])) {
	header("Content-type: image/gif");
	if (empty($_REQUEST['w']) && empty($_REQUEST['h'])) {
		//if (filesize("tracks/" . $_REQUEST['id'] . ".track") > 153600) { // Use cache only if size is more than 150KB
			if (file_exists("tracks/previews/big" . $_REQUEST['id'] . ".gif")) {
				echo file_get_contents("tracks/previews/big" . $_REQUEST['id'] . ".gif");
				exit;
			} else {
				$outputBig = true;
			}
		//}
	} else {
		//if (filesize("tracks/" . $_REQUEST['id'] . ".track") > 153600) { // Use cache only if size is more than 150KB
			if (file_exists("tracks/previews/small" . $_REQUEST['id'] . ".gif")) {
				echo file_get_contents("tracks/previews/small" . $_REQUEST['id'] . ".gif");
				exit;
			} else {
				$outputSmall = true;
			}
		//}
	}	
}

if ($_REQUEST['type'] != "png" && $_REQUEST['type'] != "jpeg") { $_REQUEST['type'] = "gif"; }
header("Content-type: image/" . $_REQUEST['type']);

$width = $_REQUEST['w'];
$height = $_REQUEST['h'];
$fade = $_REQUEST['fade'];
if (empty($fade)) { $fade = 0; }
$bw = $_REQUEST['bw'];
if ($bw == "true" || $bw == "yes") { $bw = true; } else { $bw = false; }
$bg = $_REQUEST['bg'];
$grad = $_REQUEST['grad'];
if (substr($grad, 0, 1) == "h") { $hgrad = true; $grad = substr($grad, 1); } else { $hgrad = false; }
if (empty($grad) || substr($grad, 0, 1) == "#") { unset($grad); }
if (empty($bg) || substr($bg, 0, 1) == "#") { $bg = "FFFFFF"; }
for($i=0;$i<=2;$i++) {
	if (strtolower(substr($bg, $i*2, 2)) == "xx") { $bgcolor[$i] = rand(0, 255); } else {
		$bgcolor[$i] = hexdec(substr($bg, $i*2, 2));
	}
}
for($i=0;$i<=2;$i++) {
	if (strtolower(substr($grad, $i*2, 2)) == "xx") { $gradcolor[$i] = rand(0, 255); } else {
		$gradcolor[$i] = hexdec(substr($grad, $i*2, 2));
	}
}

if ($_REQUEST['start'] == "no" || $_REQUEST['start'] == "false") { $showStart = false; } else { $showStart = true; }

$lowx = 1000000;
$lowy = 1000000;
$highx = -1000000;
$highy = -1000000;

$file = fopen("tracks/" . $_REQUEST['id'] . ".track", "r");

while (feof($file) == false) {
	$skip = false;
	if (ftell($file) == filesize("tracks/" . $_REQUEST['id'] . ".track")) {
	break;
	}
	$length = toShort(fread($file, 2));
	if ($length == 0) {
		if (ord(fread($file, 1)) == 9) {
			$skip = true;
		} else {
			fseek($file, ftell($file) - 1);
		}
	}
	if ($skip == false) {
		$name = fread($file, $length);
		$type = ord(fread($file, 1));
		if ($type == 0) { //Number
			$value = toDouble(fread($file, 8));
			if ($name == "0" || $name == "2") {
				if ($value < $lowx) { $lowx = $value; }
				if ($value > $highx) { $highx = $value; }
			} elseif ($name == "1" || $name == "3") {
				if ($value < $lowy) { $lowy = $value; }
				if ($value > $highy) { $highy = $value; }
			}
		}
		if ($type == 2) { //String
			$slength = toShort(fread($file, 2));
			if ($slength > 0) { fread($file, $slength); }
		}
		if ($type == 8) { //Array
			fread($file, 4);
		}
	}
}

$border = 8;
$offx = $lowx - $border;
$offy = $lowy - $border;
$w = $highx - $lowx + $border*2;
$h = $highy - $lowy + $border*2;
if ($_REQUEST['detail'] != "no" && $_REQUEST['detail'] != "false") { $setSize = false; } else { $setSize = true; } //Determines whether or not the size is being stretched to draw the details
if (!empty($width) && empty($height)) { $height = $h/($w/$width); }
if (empty($width) && !empty($height)) { $width = $w/($h/$height); }
if (empty($width)) { $width = $w; } else { $setSize = true; }
if (empty($height)) { $height = $h; } else { $setSize = true; }
if ($_REQUEST['detail'] == "yes" || $_REQUEST['detail'] == "true") { $setSize = false; }
if ($h/$height > $w/$width) { $ratio = $h/$height; } else { $ratio = $w/$width; }
$img = imagecreatetruecolor($width, $height);

$colorBlack = imagecolorallocate($img, blend(0, $bgcolor[0], $fade), blend(0, $bgcolor[1], $fade), blend(0, $bgcolor[2], $fade));
$colorNormal = imagecolorallocate($img, blend(0, $bgcolor[0], $fade), blend(0, $bgcolor[1], $fade), blend(255, $bgcolor[2], $fade));
$colorAccel = imagecolorallocate($img, blend(255, $bgcolor[0], $fade), blend(0, $bgcolor[1], $fade), blend(0, $bgcolor[2], $fade));
$colorBack = imagecolorallocate($img, blend(0, $bgcolor[0], $fade), blend(255, $bgcolor[1], $fade), blend(0, $bgcolor[2], $fade));
$colorBackground = imagecolorallocate($img, $bgcolor[0], $bgcolor[1], $bgcolor[2]);

if (empty($grad)) {
	imagefilledrectangle($img, 0, 0, $width, $height, $colorBackground);
} else {
	if ($hgrad) { $in = $width / 255; } else { $in = $height / 255; }
	for ($i=0;$i<255;$i++) {
		if ($hgrad) {
			imagefilledrectangle($img, $i*$in, 0, ($i+1)*$in, $height, imagecolorallocate($img, blend($bgcolor[0], $gradcolor[0], $i/255), blend($bgcolor[1], $gradcolor[1], $i/255), blend($bgcolor[2], $gradcolor[2], $i/255)));
		} else {
			imagefilledrectangle($img, 0, $i*$in, $width, ($i+1)*$in, imagecolorallocate($img, blend($bgcolor[0], $gradcolor[0], $i/255), blend($bgcolor[1], $gradcolor[1], $i/255), blend($bgcolor[2], $gradcolor[2], $i/255)));
		}
	}
}
imageantialias($img, true);

fseek($file, 0);
$startLine = false;
if (!isset($_REQUEST['arrows'])) { $_REQUEST['arrows'] = "1"; } // String that tells which lines to use arrows on eg. 1, 12, 2, 012

while (feof($file) == false) {
	$skip = false;
	if (ftell($file) == filesize("tracks/" . $_REQUEST['id'] . ".track")) {
		break;
	}
	$length = toShort(fread($file, 2));
	if ($length == 0) {
		if (ord(fread($file, 1)) == 9) {
			if ($startLine == true) { $startLine = false; }
			$skip = true;
		} else {
			fseek($file, ftell($file) - 1);
		}
	}
	
	if ($skip == false) {
		$name = fread($file, $length);
		$type = ord(fread($file, 1));
		
		if ($type == 0) { //Number
			$value = toDouble(fread($file, 8));
			if ($name == "0") { $x1 = $value; }
			if ($name == "1") { $y1 = $value;
				if ($startLine == true && $showStart == true) {
					if ($bw == false) {
						imagestring($img, 2, ($x1 - $offx) / $ratio - 2, ($y1 - $offy) / $ratio - 6, "S", $colorAccel);
						imageellipse($img, ($x1 - $offx) / $ratio, ($y1 - $offy) / $ratio, 12, 12, $colorAccel);
					}
				}
			}
			if ($name == "2") { $x2 = $value; }
			if ($name == "3") { $y2 = $value; }
			if ($name == "5") { $flip = $value; if ($flip == 1) $flip = true; else $flip = false; }
			if ($name == "9") { $lt = $value;
				if ($lt == 0) { $lineColor = $colorNormal; }
				if ($lt == 1) { $lineColor = $colorAccel; }
				if ($lt == 2) { $lineColor = $colorBack; }
				if ($bw == false) {
					$bdir = pointDirection(($x1 - $offx) / $ratio, ($y1 - $offy) / $ratio, ($x2 - $offx) / $ratio, ($y2 - $offy) / $ratio)-180;
					if ($bdir < 0) { $bdir += 360; }
					$offmax = 3; // Thickness of black direction line
					$thickness = 1; // 0 being one line
					if ($lt != 2 && $setSize == false) {
						for ($i=0;$i<=$offmax;$i+=0.5) {
							$off = $i / $ratio;
							if ($flip) {
								$nx1 = ($x1 - $offx) / $ratio - sin($bdir * pi() / 180)*$off;
								$ny1 = ($y1 - $offy) / $ratio - cos($bdir * pi() / 180)*$off;
								$nx2 = ($x2 - $offx) / $ratio - sin($bdir * pi() / 180)*$off;
								$ny2 = ($y2 - $offy) / $ratio - cos($bdir * pi() / 180)*$off;
							} else {
								$nx1 = ($x1 - $offx) / $ratio + sin($bdir * pi() / 180)*$off;
								$ny1 = ($y1 - $offy) / $ratio + cos($bdir * pi() / 180)*$off;
								$nx2 = ($x2 - $offx) / $ratio + sin($bdir * pi() / 180)*$off;
								$ny2 = ($y2 - $offy) / $ratio + cos($bdir * pi() / 180)*$off;
							}
							imageline($img, $nx1, $ny1, $nx2, $ny2, $colorBlack);
						}
					}
					
					for ($i=0;$i<=$thickness;$i+=0.5) {
						imageline($img, ($x1 - $offx) / $ratio - sin($bdir * pi() / 180)*$i, ($y1 - $offy) / $ratio - cos($bdir * pi() / 180)*$i, ($x2 - $offx) / $ratio - sin($bdir * pi() / 180)*$i, ($y2 - $offy) / $ratio - cos($bdir * pi() / 180)*$i, $lineColor);
						if ($setSize) { break; }
					}
					if (strpos($_REQUEST['arrows'], (string)$lt) !== false && $setSize == false) { //Speed arrows
						$asize = 6 / $ratio;
						$tx = (($x2 - $offx) / $ratio);
						$ty = (($y2 - $offy) / $ratio);
						
						$ax = $tx + cos($bdir * pi() / 180)*$asize;
						$ay = $ty - sin($bdir * pi() / 180)*$asize;
						if ($flip) {
							$aax = $ax + sin($bdir * pi() / 180)*$asize;
							$aay = $ay + cos($bdir * pi() / 180)*$asize;
						} else {
							$aax = $ax - sin($bdir * pi() / 180)*$asize;
							$aay = $ay - cos($bdir * pi() / 180)*$asize;
						}
						
						//$aax = $ax + sin($bdir * pi() / 180)*$asize;
						//$aay = $ay + cos($bdir * pi() / 180)*$asize;
						//$ax = $ax - sin($bdir * pi() / 180)*$asize;
						//$ay = $ay - cos($bdir * pi() / 180)*$asize;
						
						//$aax = $ax + cos(($bdir+90) * pi / 180)*$asize;
						//$aay = $ay - sin(($bdir+90) * pi / 180)*$asize;
						imageline($img, $ax, $ay, $aax, $aay, $lineColor);
						imageline($img, $tx, $ty, $aax, $aay, $lineColor);
						imagefilledpolygon($img, array($tx, $ty, $ax, $ay, $aax, $aay), 3, $lineColor);
					}
				} else {
					imageline($img, ($x1 - $offx) / $ratio, ($y1 - $offy) / $ratio, ($x2 - $offx) / $ratio, ($y2 - $offy) / $ratio, $colorBlack);
				}
			}
			//echo '<br />Double ' . $name . ' = ' . $value;
		}
		if ($type == 1) { //Boolean
			$value = toBoolean(fread($file, 1));
		}
		if ($type == 2) { //String
			$slength = toShort(fread($file, 2));
			if ($slength > 0) { $value = fread($file, $slength); }
			//echo '<br />String ' . $name . ' = ' . $value;
		}
		if ($type == 6) { //Undefined
			//echo '<br />Undefined ' . $name;
		}
		if ($type == 8) { //Array
			$value = toLong(fread($file, 4));
			if ($name == "startLine") {
				$startLine = true;
			}
			//echo '<br />Array ' . $name . '(' . $value . ') {';
		}
	}
}
fclose($file);

if ($_REQUEST['type'] == "png") {
	imagepng($img);
} elseif ($_REQUEST['type'] == "jpeg") {
	imagejpeg($img);
} else {
	if ($outputSmall == true) {
		//$tmp = fopen("previews/small" . $_REQUEST['id'] . ".gif", "x");
		//fclose($tmp);
		imagegif($img, "tracks/previews/small" . $_REQUEST['id'] . ".gif");
	}
	if ($outputBig == true) {
		//$tmp = fopen("previews/big" . $_REQUEST['id'] . ".gif", "x");
		//fclose($tmp);
		imagegif($img, "tracks/previews/big" . $_REQUEST['id'] . ".gif");
	}
	imagegif($img);
}
imagedestroy($img);


/* function toBoolean($data) {
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
} */
?>