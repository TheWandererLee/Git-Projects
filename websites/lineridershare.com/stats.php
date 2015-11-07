<?php session_start(); include("functions.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Line Rider Share - Statistics</title>
</head>
<body>
<?php include("header.php"); ?>

<?php
groupHead("Advanced Statistics", "", "", 640);

$tracks = array();
$trackTotal = 0;
$comments = array();
$commentTotal = 0;
$previews = array();
$previewTotal = 0;
$trash = array();
$trashTotal = 0;
$managers = array();
$managerTotal = 0;
$sols = array();
$solTotal = 0;

if (is_dir("tracks")) {
	if ($trackh = opendir("tracks")) {
		while (($file = readdir($trackh)) !== false) {
			if ($file != "." && $file != "..") {
				if (is_file("tracks/" . $file)) {
					$tracks[] = $file;
					$trackTotal += filesize("tracks/" . $file);
				}
			}
		}
		closedir($trackh);
		
		$s = realSize($trackTotal);
		echo 'Track Filesize: ' . $s[0] . ' ' . $s[1] . ' (' . count($tracks) . ' Tracks)<br />';
	}
}
if (is_dir("tracks/comments")) {
	if ($commenth = opendir("tracks/comments")) {
		while (($file = readdir($commenth)) !== false) {
			if ($file != "." && $file != "..") {
				if (is_file("tracks/comments/" . $file)) {
					$comments[] = $file;
					$commentTotal += filesize("tracks/comments/" . $file);
				}
			}
		}
		closedir($commenth);
		
		$s = realSize($commentTotal);
		echo 'Comment Filesize: ' . $s[0] . ' ' . $s[1] . ' (' . count($comments) . ' Comments)<br />';
	}
}
if (is_dir("tracks/previews")) {
	if ($previewh = opendir("tracks/previews")) {
		while (($file = readdir($previewh)) !== false) {
			if ($file != "." && $file != "..") {
				if (is_file("tracks/previews/" . $file)) {
					$previews[] = $file;
					$previewTotal += filesize("tracks/previews/" . $file);
				}
			}
		}
		closedir($previewh);
		
		$s = realSize($previewTotal);
		echo 'Preview Filesize: ' . $s[0] . ' ' . $s[1] . ' (' . count($previews) . ' Previews)<br />';
	}
}
if (is_dir("tracks/trash")) {
	if ($trashh = opendir("tracks/trash")) {
		while (($file = readdir($trashh)) !== false) {
			if ($file != "." && $file != "..") {
				if (is_file("tracks/trash/" . $file)) {
					$trash[] = $file;
					$trashTotal += filesize("tracks/trash/" . $file);
				}
			}
		}
		closedir($trashh);
		
		$s = realSize($trashTotal);
		echo 'Trash Filesize: ' . $s[0] . ' ' . $s[1] . ' (' . count($trash) . ' Deleted Tracks)<br />';
	}
}
if (is_dir("tracks/managers")) {
	if ($managerh = opendir("tracks/managers")) {
		while (($file = readdir($managerh)) !== false) {
			if ($file != "." && $file != "..") {
				if (is_file("tracks/managers/" . $file)) {
					if (strpos($file, '.manager')) {
						$managers[] = $file;
						$managerTotal += filesize("tracks/managers/" . $file);
					} elseif (strpos($file, '.sol')) {
						$sols[] = $file;
						$solTotal += filesize("tracks/managers/" . $file);
					}
				}
			}
		}
		closedir($managerh);
		
		$s = realSize($managerTotal);
		echo 'Manager Filesize: ' . $s[0] . ' ' . $s[1] . ' (' . count($managers) . ' Managers)<br />';
		$s = realSize($solTotal);
		echo 'SOL Filesize: ' . $s[0] . ' ' . $s[1] . ' (' . count($sols) . ' SOLs)<br />';
	}
}

$s = realSize($trackTotal + $commentTotal + $previewTotal + $trashTotal + $managerTotal + $solTotal);
echo '<hr size="1" color="#CCCCCC" />';
echo 'Total: ' . $s[0] . ' ' . $s[1] . '<br /><br />';

include_once("charts/charts.php");
echo InsertChart("charts/charts.swf", "charts/charts_library", "charts/sizestats.php" .
"?1=".count($tracks).
"&2=".count($comments).
"&3=".count($previews).
"&4=".count($trash).
"&5=".count($managers).
"&6=".count($sols).
"&7=".(count($tracks) + count($comments) + count($previews) + count($trask) + count($managers) + count($sols)).
"&8=".$trackTotal.
"&9=".$commentTotal.
"&10=".$previewTotal.
"&11=".$trashTotal.
"&12=".$managerTotal.
"&13=".$solTotal.
"&14=".($trackTotal + $commentTotal + $previewTotal + $trashTotal + $managerTotal + $solTotal), 640, 196, "ffffff");

echo InsertChart("charts/charts.swf", "charts/charts_library", "charts/sizestats2.php" .
"?1=".count($tracks).
"&2=".count($comments).
"&3=".count($previews).
"&4=".count($trash).
"&5=".count($managers).
"&6=".count($sols).
"&7=".(count($tracks) + count($comments) + count($previews) + count($trask) + count($managers) + count($sols)).
"&8=".($trackTotal/pow(1024,1)).
"&9=".($commentTotal/pow(1024,1)).
"&10=".($previewTotal/pow(1024,1)).
"&11=".($trashTotal/pow(1024,1)).
"&12=".($managerTotal/pow(1024,1)).
"&13=".($solTotal/pow(1024,1)).
"&14=".(($trackTotal + $commentTotal + $previewTotal + $trashTotal + $managerTotal + $solTotal)/pow(1024,1)), 640, 196, "ffffff");

groupFoot();
?>

</body>
</html>