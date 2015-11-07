<?php
function getInfo($name) {
	$info = explode(chr(9), file_get_contents("info.dat"));
	for ($i=0;$i<count($info);$i++) {
		$val = explode(chr(0), $info[$i]);
		if ($val[0] == $name) { return $val[1]; }
	}
	return false;
}
function setInfo($name, $value) {
	$info = explode(chr(9), file_get_contents("info.dat"));
	for ($i=0;$i<count($info)-1;$i++) {
		$val = explode(chr(0), $info[$i]);
		if ($val[0] == $name) {
			$val[1] = $value;
			$info[$i] = implode(chr(0), $val);
			$info = implode(chr(9), $info);
			$file = fopen("info.dat", "w");
			fwrite($file, $info);
			fclose($file);
			return true;
		}
	}
	$value = str_replace("\"", "'", $value);
	array_push($info, $name . chr(0) . $value);
	$info = implode(chr(9), $info);
	$file = fopen("info.dat", "w");
	fwrite($file, $info);
	fclose($file);
	return true;
}
function getWidth($image, $height=-1, $width=-1) {
	$img = getimagesize($image);
	if ($width != -1) { if ($width < floor($img[0] / ($img[1] / $height))) { return $width; } }
	if ($height == -1) { return $img[0]; }
	return floor($img[0] / ($img[1] / $height));
}
function getHeight($image, $width=-1, $height=-1) {
	$img = getimagesize($image);
	if ($height != -1) { if ($height < floor($img[1] / ($img[0] / $width))) { return $height; } }
	if ($width == -1) { return $img[1]; }
	return floor($img[1] / ($img[0] / $width));
}
?>