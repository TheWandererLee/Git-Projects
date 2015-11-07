<?php
//Image resizer
include("functions.php");

$id = $_REQUEST['p'];
$width = $_REQUEST['w'];
$height = $_REQUEST['h'];
$fade = $_REQUEST['f'];

$img = imagecreatefromjpeg("images/" . $id . ".jpg");
$tmp = getimagesize("images/" . $id . ".jpg");
$w = $tmp[0]; $h = $tmp[1];

if (!empty($width) && !empty($height)) {
	if ($height > $h/($w/$width)) { unset($height); } else { unset($width); }
}

if (empty($width) && !empty($height)) { $width = $w/($h/$height); }
if (!empty($width) && empty($height)) { $height = $h/($w/$width); }
if (empty($width) && empty($height)) { $width = $w; $height = $h; }

$whitealpha = imagecolorallocatealpha($img, 255, 255, 255, 20);
$watermark = str_replace("(c)", "©", getInfo("watermark"));
$smallwatermark = "Jared Cline";
$padding = (int)getInfo("watermarkPadding");
if ($padding == false) { $padding = 8; }

$new = imagecreatetruecolor($width, $height);
imagecopyresampled($new, $img, 0, 0, 0, 0, $width, $height, $w, $h);

$ssize = imageftbbox(16, 0, "fonts/parkavenue.ttf", $watermark);
if ($width > abs($ssize[4] - $ssize[0])) {
	imagefttext($new, 16, 0, $width - abs($ssize[4] - $ssize[0]) - $padding, $height - abs($ssize[1] - $ssize[5]) + 18 - $padding, $whitealpha, "fonts/parkavenue.ttf", $watermark);
}

if (!empty($fade) && $fade != 0) {
	$overlay = imagecolorallocatealpha($new, 0, 0, 0, (100-$fade)*1.27);
	imagefilledrectangle($new, 0, 0, $width, $height, $overlay);
}

header("Content-type: image/jpeg");
imagejpeg($new);
?>