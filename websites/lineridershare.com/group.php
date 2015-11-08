<?php
header("Content-type: image/png");

$id = $_REQUEST['id'];
if (isset($_REQUEST['th'])) { $th = (int)$_REQUEST['th']; } else { $th = 20; } //Height of top bar
if (isset($_REQUEST['bh'])) { $bh = (int)$_REQUEST['bh']; } else { $bh = 8; } //Height of top bar
if (isset($_REQUEST['b'])) { $bub = (int)$_REQUEST['b']; } else { $bub = 8; } //3D Bubble size
if (isset($_REQUEST['e'])) { $edge = (int)$_REQUEST['e']; } else { $edge = 8; } //Edge size
if (isset($_REQUEST['bg'])) { $bg = $_REQUEST['bg']; } else { $bg = "FFFFFF"; } //Background color
if (isset($_REQUEST['pg'])) { $pg = $_REQUEST['pg']; } else { $pg = "FFFFFF"; } //Page color
if (isset($_REQUEST['color'])) {
	$color = $_REQUEST['color'];
	
	$col1[0] = hexdec(substr($color, 0, 2)) + hexdec("12");
	$col1[1] = hexdec(substr($color, 2, 2)) + hexdec("12");
	$col1[2] = hexdec(substr($color, 4, 2)) + hexdec("12");
	$col2[0] = hexdec(substr($color, 0, 2)) + hexdec("1C");
	$col2[1] = hexdec(substr($color, 2, 2)) + hexdec("21");
	$col2[2] = hexdec(substr($color, 4, 2)) + hexdec("21");
	$col3[0] = hexdec(substr($color, 0, 2));
	$col3[1] = hexdec(substr($color, 2, 2));
	$col3[2] = hexdec(substr($color, 4, 2));
	$col4[0] = hexdec(substr($color, 0, 2)) + hexdec("17");
	$col4[1] = hexdec(substr($color, 2, 2)) + hexdec("1E");
	$col4[2] = hexdec(substr($color, 4, 2)) + hexdec("25");
	$colbo[0] = hexdec(substr($color, 0, 2)) + hexdec("20");
	$colbo[1] = hexdec(substr($color, 2, 2)) + hexdec("2A");
	$colbo[2] = hexdec(substr($color, 4, 2)) + hexdec("2E");
	
	for ($i=0;$i<2;$i++) {
		if ($col1[$i] > 255) { $col1[$i] = 255; }
		if ($col2[$i] > 255) { $col1[$i] = 255; }
		if ($col3[$i] > 255) { $col1[$i] = 255; }
		if ($col4[$i] > 255) { $col1[$i] = 255; }
		if ($colbo[$i] > 255) { $col1[$i] = 255; }
	}
} else {
	if (isset($_REQUEST['c1'])) { $t1 = $_REQUEST['c1']; } else { $t1 = "364666"; } //First gradient color
	if (isset($_REQUEST['c2'])) { $t2 = $_REQUEST['c2']; } else { $t2 = "405575"; } //Second gradient color
	if (isset($_REQUEST['c3'])) { $t3 = $_REQUEST['c3']; } else { $t3 = "243454"; } //Third gradient color
	if (isset($_REQUEST['c4'])) { $t4 = $_REQUEST['c4']; } else { $t4 = "3B5279"; } //Fourth gradient color
	if (isset($_REQUEST['bor'])) { $bor = $_REQUEST['bor']; } else { $bor = "445E82"; } //Border color
	
	$col1[0] = hexdec(substr($t1, 0, 2));
	$col1[1] = hexdec(substr($t1, 2, 2));
	$col1[2] = hexdec(substr($t1, 4, 2));
	$col2[0] = hexdec(substr($t2, 0, 2));
	$col2[1] = hexdec(substr($t2, 2, 2));
	$col2[2] = hexdec(substr($t2, 4, 2));
	$col3[0] = hexdec(substr($t3, 0, 2));
	$col3[1] = hexdec(substr($t3, 2, 2));
	$col3[2] = hexdec(substr($t3, 4, 2));
	$col4[0] = hexdec(substr($t4, 0, 2));
	$col4[1] = hexdec(substr($t4, 2, 2));
	$col4[2] = hexdec(substr($t4, 4, 2));
	$colbo[0] = hexdec(substr($bor, 0, 2));
	$colbo[1] = hexdec(substr($bor, 2, 2));
	$colbo[2] = hexdec(substr($bor, 4, 2));
}

$colbg[0] = hexdec(substr($bg, 0, 2));
$colbg[1] = hexdec(substr($bg, 2, 2));
$colbg[2] = hexdec(substr($bg, 4, 2));
$colpg[0] = hexdec(substr($pg, 0, 2));
$colpg[1] = hexdec(substr($pg, 2, 2));
$colpg[2] = hexdec(substr($pg, 4, 2));

if ($id == "tl" || $id == "tr") {
$img = imagecreate($edge, $th);
}
if ($id == "tm") {
$img = imagecreate(4, $th);
}
if ($id == "ml" || $id == "mr") {
$img = imagecreate($edge, 4);
}
if ($id == "bm") {
$img = imagecreate(4, 1);
}
if ($id == "bl" || $id == "br") {
$img = imagecreate(80, $bh);
}

for ($i=0;$i<$th;$i++) {
$j = $i / $th;
$grad1[$i] = imagecolorallocate($img, blend($col3[0], $col4[0], $j), blend($col3[1], $col4[1], $j), blend($col3[2], $col4[2], $j));
}
for ($i=0;$i<$bub;$i++) {
$j = $i / $bub;
$grad2[$i] = imagecolorallocate($img, blend($col1[0], $col2[0], $j), blend($col1[1], $col2[1], $j), blend($col1[2], $col2[2], $j));
}
for ($i=0;$i<$edge;$i++) {
$j = $i / $edge;

$ta = blend($colbo[0], $colbg[0], $j)+80;
$tb = blend($colbo[1], $colbg[1], $j)+80;
$tc = blend($colbo[2], $colbg[2], $j)+80;

if ($ta > 255) { $ta = 255; }
if ($tb > 255) { $tb = 255; }
if ($tc > 255) { $tc = 255; }
$grad3[$i] = imagecolorallocate($img, $ta, $tb, $tc);
}
$grad3[0] = imagecolorallocate($img, $colbo[0], $colbo[1], $colbo[2]);

if ($id == "tm" || $id == "tl" || $id == "tr") {
	$tmpw = 4;
	if ($id != "tm") { $tmpw = $edge; }
	for ($i=0;$i<$th;$i++) {
		imageline($img, 0, $i, $tmpw, $i, $grad1[$i]);
	}
	for ($i=0;$i<$bub;$i++) {
		imageline($img, 0, $i, $tmpw, $i, $grad2[$i]);
	}
	
	$colbor = imagecolorallocate($img, $colbo[0], $colbo[1], $colbo[2]);
	$colpage = imagecolorallocate($img, $colpg[0], $colpg[1], $colpg[2]);
	if ($id == "tm") {
		imageline($img, 0, 0, 4, 0, $colbor);
	} elseif ($id == "tl") {
		imageline($img, 0, 0, $edge, 0, $colbor);
		imageline($img, 0, 0, 0, $th, $colbor);
	} elseif ($id == "tr") {
		imageline($img, 0, 0, $edge, 0, $colbor);
		imageline($img, $edge-1, 0, $edge-1, $th, $colbor);
	}
}
elseif ($id == "ml") {
	for ($i=0;$i<$edge;$i++) {
		imageline($img, $i, 0, $i, 4, $grad3[$i]);
	}
}
elseif ($id == "mr") {
	for ($i=0;$i<$edge;$i++) {
		imageline($img, $i, 0, $i, 4, $grad3[$edge-$i-1]);
	}
}
elseif ($id == "bm") {
	$colbor = imagecolorallocate($img, $colbo[0], $colbo[1], $colbo[2]);
	imageline($img, 0, 0, 4, 0, $colbor);
}

imagepng($img);



function blend($n1, $n2, $a) {
return ($n1 * (1-$a)) + ($n2 * $a);
}
?>