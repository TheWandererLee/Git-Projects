<?php
$s = $_REQUEST['s'];
if (empty($s)) { $s = 600; }

if (!file_exists("target" . $s . ".gif")) { $s = 600; }
$img = imagecreatefromgif("target" . $s . ".gif");
$h = getimagesize("target" . $s . ".gif");
$w = $h[0];
$h = $h[1];

$accuracy = explode("|", $_REQUEST['a']);

$col1 = imagecolorallocate($img, 255, 255, 255);
$col2 = imagecolorallocate($img, 0, 0, 0);
$grey = imagecolorallocate($img, 128, 128, 128);
$shadow = imagecolorallocate($img, 64, 64, 64);
$size = $s / 60;
for ($i=0;$i<count($accuracy);$i++) {
	if (!is_numeric($accuracy[$i])) { $accuracy[$i] = rand(0, 100)/100; }
	$acc = 1 - $accuracy[$i];
	$x = $w / 2;
	$y = $h / 2;
	$a = (($w / 2) + ($h / 2)) / 2;
	$dir = rand(0, 360);
	$x = $x + cos($dir * pi() / 180) * ($acc * $a);
	$y = $y - sin($dir * pi() / 180) * ($acc * $a);
	imagefilledellipse($img, $x, $y, $size+2, $size+2, $col1);
	imagefilledellipse($img, $x, $y, $size, $size, $col2);
}

header("Content-Type: image/gif");
imagegif($img);
imagedestroy($img);
?>