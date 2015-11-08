<?php
$f = $_REQUEST['f'];
$w = $_REQUEST['w'];

if (empty($f)) { exit(); }
if (empty($w)) { $w = 128; }

if (substr($f, -5) == '.jpeg' || substr($f, -4) == '.jpg') {
	$src = imagecreatefromjpeg($f);
} elseif (substr($f, -4) == '.gif') {
	$src = imagecreatefromgif($f);
} elseif (substr($f, -4) == '.png') {
	$src = imagecreatefrompng($f);
}

list($width,$height) = getimagesize($f);

$h = ($height/$width)*$w;

$tmp = imagecreatetruecolor($w,$h);

imagecopyresampled($tmp,$src,0,0,0,0,$w,$h,$width,$height);

//header('Content-type: image/jpeg');
imagejpeg($tmp,$f,75);
imagedestroy($tmp);
?>