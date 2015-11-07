<?php
session_start();
if (isset($_REQUEST['debug'])) {
	// Password hidden for security
	mysql_connect("127.0.0.1", "pcookdd_main", "PASSWORD");
	mysql_select_db("pcookdd_main");
} else {
	// Password hidden for security
	mysql_connect("10.8.13.162", "pcookddmain", "PASSWORD");
	mysql_select_db("pcookddmain");
}

$settingsArray = array("Website_Title", "Website_Titlebar", "Website_Header", "Website_Ticker", "Footer_Left", "Footer_Right");
$pagesArray = array("patientInformation", "periodontalDisease", "services", "referringDoctors", "aboutUs");
$subpagesArray = array(
					"home", "introduction", "firstVisit", "oralHealth", "scheduling", "financial", "insurance", "registration", "instructions", "testimonials", "media", "privacyPractice",
					"periodontalCare", "aboutPeriodontalDisease", "preventingGumDisease", "oralHygiene", "oralPathology",
					"treatmentMethods", "scalingRootPlaning", "cosmeticPeriodontal", "gumGrafting", "crownLengthening", "boneGrafting", "otherServices", "dentalImplants", "overdentures", "technologyEquipment",
					"referralForm", "affiliates",
					"meetUs", "contactUs", "virtualTours", "blog", "choosingImplantDentist", "sitemap");

function navGroup($g) {
	echo '<ul>';
	echo dbReadPage($g,1);
	echo '</ul>';
}

function dbTableExists($table) {
	$result = mysql_query("SHOW TABLES LIKE '".$table."'");
	return (bool)mysql_num_rows($result);
}

function dbReadSetting($s,$decode=false) {
	$result = @mysql_fetch_array(mysql_query("SELECT * FROM 13w_settings WHERE name='".$s."'"));
	return $decode?html_entity_decode($result["value"]):$result["value"];
}
function dbReadPage($s,$decode=false) {
	$result = @mysql_fetch_array(mysql_query("SELECT * FROM 13w_pages WHERE name='".$s."'"));
	return $decode?html_entity_decode($result["content"]):$result["content"];
}
function dbReadTitle($s,$decode=false) {
	$result = @mysql_fetch_array(mysql_query("SELECT * FROM 13w_pages WHERE name='".$s."'"));
	return $decode?html_entity_decode($result["title"]):$result["title"];
}

function pageContent() {
	$foundMatch = false;
	global $pagesArray, $subpagesArray;
	foreach($pagesArray as $p) {
		if (isset($_REQUEST[$p])) { navGroup($p); $foundMatch = true; }
	}
	foreach($subpagesArray as $p) {
		if (isset($_REQUEST[$p])) { echo dbReadPage($p,1); $foundMatch = true; }
	}
	
	if (isset($_REQUEST['sitemap'])) {
		echo '<table>';
		$first = true;
		foreach($pagesArray as $p) {
			if (!$first) { echo '<tr><td colspan="2" style="height: 1px; background: #666;"></td></tr>'; }
			echo '<tr><td><a href="?'.$p.'">' . dbReadTitle($p) . '</a></td><td><ul>';
			navGroup($p);
			echo '</ul></td></tr>';
			$first = false;
		}
		echo '</table>';
	}
	
    if (!$foundMatch) { echo dbReadPage('home',1); }
}
?>