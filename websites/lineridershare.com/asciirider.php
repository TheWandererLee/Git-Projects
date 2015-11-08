<?php session_start(); include("functions.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Line Rider Share - Ascii Rider</title>
<?php include("style.css");

if (empty($_REQUEST['fs'])) { $_REQUEST['fs'] = '10'; }
if (empty($_REQUEST['fn'])) { $_REQUEST['fn'] = 'Verdana, Arial, Helvetica, sans-serif'; }
?>
<style type="text/css">
body {
font-size: <?php echo (int)$_REQUEST['fs']; ?>px;
font-family: <?php echo $_REQUEST['fn']; ?>;
}
div.r {
color: #FF0000;
position: absolute;
}
div.g {
color: #00FF00;
position: absolute;
}
div.b {
color: #0000FF;
position: absolute;
}
div.x {
color: #000000;
position: absolute;
}
div.ro {
color: #FF9999;
position: absolute;
font-weight: bold;
background-color: #000000;
}
div.go {
color: #99FF99;
position: absolute;
font-weight: bold;
background-color: #000000;
}
div.bo {
color: #9999FF;
position: absolute;
font-weight: bold;
background-color: #000000;
}
div.xo {
color: #FFFFFF;
position: absolute;
font-weight: bold;
background-color: #000000;
}
div.o {
font-weight: bold;
background-color: #FFFF00;
position: absolute;
}
</style>
</head>
<body>
<?php //include("header.php"); ?>

<?php

$lowx = 1000000;
$lowy = 1000000;
$highx = -1000000;
$highy = -1000000;
if (empty($_REQUEST['id'])) { $_REQUEST['id'] = 0; } // ID # of the track to load
if (empty($_REQUEST['l'])) { $_REQUEST['l'] = 'x'; } // Letters used for ascii
if (empty($_REQUEST['lm'])) { $_REQUEST['lm'] = 0; } // Letter display mode (0-sequential,1-together,2-random)
if (empty($_REQUEST['m'])) { $_REQUEST['m'] = 10; } // Highlight movement speed, in milliseconds
$border = 8;
$width = $_REQUEST['w'];
$height = $_REQUEST['h'];
$sx = 0; //Screen x offset
$sy = 0; //Screen y offset
$dotSpread = (int)$_REQUEST['s']; if (empty($dotSpread)) { $dotSpread = 2; } // Amount of letters to use per line (spread)
if ($_REQUEST['hl'] == 'true') { $hl = true; } else { $hl = false; } // Show the highlighter
if ($_REQUEST['ss'] == 'false') { $showStart = false; } else { $showStart = true; } // Show the starting marker
if ($_REQUEST['bw'] == 'true') { $bw = true; } else { $bw = false; } // Black and white
$colorNormal = "b";
$colorAccel = "r";
$colorBack = "g";
$inc = 0;

$nl = "\r\n";

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

//echo '<table border="0" cellpadding="0" cellspacing="0" style="background-color: #00CC00; position: absolute; left: ' . $sx . 'px; top: ' . $sy . 'px;" width="' . $width . '" height="' . $height . '"><tr><td></td></tr></table>';

fseek($file, 0);
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
					echo '<div class="r" style="font-weight: bold; left: ' . round(($x1 - $offx) / $ratio - 2 + $sx) . 'px; top: ' . round(($y1 - $offy) / $ratio - 6 + $sy) . 'px;">(S)</div>' . $nl;
					//imagestring($img, 2, ($x1 - $offx) / $ratio - 2, ($y1 - $offy) / $ratio - 6, "S", $colorAccel);
					//imageellipse($img, ($x1 - $offx) / $ratio, ($y1 - $offy) / $ratio, 12, 12, $colorAccel);
				}
			}
			if ($name == "2") { $x2 = $value; }
			if ($name == "3") { $y2 = $value; }
			if ($name == "5") { $flip = $value; if ($flip == 1) $flip = true; else $flip = false; }
			if ($name == "9") { $lt = $value;
				if ($lt == 0) { $lineColor = $colorNormal; }
				if ($lt == 1) { $lineColor = $colorAccel; }
				if ($lt == 2) { $lineColor = $colorBack; }
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
						
						/////////////imageline($img, $nx1, $ny1, $nx2, $ny2, $colorBlack);
					}
				}
				
				
				for ($i=0;$i<$dotSpread;$i++) {
				
					if ($_REQUEST['lm'] == 2) {
						$l = substr($_REQUEST['l'], mt_rand(0, strlen($_REQUEST['l'])-1), 1);
					} elseif ($_REQUEST['lm'] == 1) {
						$l = $_REQUEST['l'];
					} else {
						if (strlen($_REQUEST['l']) > 1) {
							$linc++;
							if ($linc >= strlen($_REQUEST['l'])) {
								$linc = 0;
							}
						}
						$l = substr($_REQUEST['l'], $linc, 1);
					}
					
					echo '<div class="';
					if (!$bw) { echo $lineColor; } else { echo 'x'; }
					echo '" id="' . $inc . '" style="left:' . round(blend(($x1 - $offx) / $ratio - sin($bdir * pi() / 180)*$i + $sx, ($x2 - $offx) / $ratio - sin($bdir * pi() / 180)*$i + $sx, $i/$dotSpread)) . 'px;top:' . round(blend(($y1 - $offy) / $ratio - cos($bdir * pi() / 180)*$i + $sy, ($y2 - $offy) / $ratio - cos($bdir * pi() / 180)*$i + $sy, $i/$dotSpread)) . 'px;">' . $l . '</div>' . $nl;
					$inc++;
				}
				
				for ($i=0;$i<=$thickness;$i+=0.5) {
					/////////////imageline($img, ($x1 - $offx) / $ratio - sin($bdir * pi() / 180)*$i, ($y1 - $offy) / $ratio - cos($bdir * pi() / 180)*$i, ($x2 - $offx) / $ratio - sin($bdir * pi() / 180)*$i, ($y2 - $offy) / $ratio - cos($bdir * pi() / 180)*$i, $lineColor);
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
					
					/////////////imageline($img, $ax, $ay, $aax, $aay, $lineColor);
					/////////////imageline($img, $tx, $ty, $aax, $aay, $lineColor);
					/////////////imagefilledpolygon($img, array($tx, $ty, $ax, $ay, $aax, $aay), 3, $lineColor);
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
?>

<!-- <input type="button" value="Random" onclick="num = Math.round(Math.random()*<?php echo $inc; ?>); document.getElementById(num).className = 'o';"> -->
<script type="text/javascript" language="javascript">
<!--
var top = <?php echo $inc-1; ?>;
var pos = top;
window.onload = function() {
	<?php if ($hl) { echo 'scrolling();'; } ?>
}
scrolling = function() {
	document.getElementById(pos).className += 'o';
	if (pos+1 <= top) { document.getElementById(pos+1).className = document.getElementById(pos+1).className.substr(0, 1); }
	if (pos == top) { document.getElementById(0).className = document.getElementById(0).className.substr(0, 1); }
	pos--;
	if (pos < 0) { pos = top; }
	setTimeout("scrolling()", <?php echo $_REQUEST['m']; ?>);
}
//-->
</script>

</body>
</html>