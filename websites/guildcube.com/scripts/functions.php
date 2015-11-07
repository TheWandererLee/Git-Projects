<?php
	global $nl;
	function readXML($xmlFile) {
		$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $xmlFile);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1");
		$output = curl_exec($ch);
		curl_close($ch);
		
		return $output;
	}

	function groupHead($title="Untitled",$width="none",$height="none") {
		global $showMainBg, $showTableBg;
		if ($width == "none") { $width=""; } else { $width=" width=\"" . $width . "\""; }
		if ($height == "none") { $height=""; } else { $height=" height=\"" . $height . "\""; }
		
		echo '<table class="group" cellpadding="0" cellspacing="0" border="1" align="center"'.$width.'>';
		echo '<tr><td class="groupHeader" align="center">' . $title . '</td></tr><tr><td'.$height.'>';
		
		/* Fancy Stuff. Later
		echo '<table class="group" cellpadding="0" cellspacing="0" border="0" align="center"'.$width.$height.'>';
		echo '<tr>';
		echo '<td class="groupTopLeft"><img src="images/border7.png" /></td>';
		echo '<td class="groupTopMid" align="center" valign="bottom" background="images/border8.png">' . $title . '</td>';
		echo '<td class="groupTopRight"><img src="images/border9.png" /></td>';
		echo '</tr><tr>';
		echo '<td class="groupMidLeft"></td>';
		echo '<td valign="top">';
		*/
	}
	function groupFoot() {
		echo '</td></tr></table>';
		/* Fancy Stuff. Later
		echo '</td>';
		echo '<td class="groupMidRight"></td>';
		echo '</tr><tr>';
		echo '<td class="groupBottomLeft"><img src="images/border1.png" /></td>';
		echo '<td class="groupBottomMid"></td>';
		echo '<td class="groupBottomRight"><img src="images/border3.png" /></td>';
		echo '</tr>';
		echo '</table>';
		*/
	}

	function mod_text($text,$size="100%") {
		groupHead("<b>Text</b>", $size);
		echo $nl.$nl.$nl.$text;
		groupFoot();
	}
	function mod_roster($r,$n,$us="us",$size="100%") {
		$error = '';
		if (empty($r) || empty($n) || empty($us)) { echo 'Missing guild realm/name/or locale (us/eu).'; return; }
		$r = stripslashes(str_replace(' ', '+', $r));
		$n = stripslashes(str_replace(' ', '+', $n));
		if (strtolower($us) == "us") { $us = "www"; } else { $us = "eu"; }
		
		$output = readXML('http://' . $us . '.wowarmory.com/guild-info.xml?r=' . $r . '&n=' . $n);
		
		if (strpos($output, "<guildInfo/>") !== false) { echo 'Incorrect guild realm/name/or locale (us/eu).'; return; }
		
		groupHead("<b>Roster</b>", $size);
		
		/*
		echo '<textarea rows="12" cols="128" style="font-size: 11px;">';
		echo htmlspecialchars($output);
		echo '</textarea>';
		*/
		
		echo '<table cellpadding="0" cellspacing="0" border="0" width="100%">';
		$pos = 0; $guildName = '';
		while (true) {
			$thisElem = readElement($output, $pos);
			if ($thisElem == false) { break; } else {
				$element = readAttribs($thisElem[0]);
				if ($element[0] == 'character') {
					//echo "<br />Element: [".$element[0]." | Name: ".$element['name'].", Gender: ".$element['gender'].", Race: ".$element['race'].", Class: ".$element['class']."]";
					$pic = strtolower($element['gender']) . '-' . strtolower(str_replace(' ', '', $element['race']));
					$pic2 = strtolower($element['class']);
					echo '<tr><td align="left" height="24"><a href="http://www.wowarmory.com/character-sheet.xml?' . $element['url'] . '" class="classCol' . $element['class'] . '">'.
					'<img src="../images/icons/race/' . $pic . '.gif" border="0" width="18" height="18" />'. 
					'<img src="../images/icons/class/' . $pic2 . '.gif" border="0" alt="' . $pic2 . '" /> [<b>' . $element['level'] . '</b>] ' . $element['name'] . '</a></td><td align="right"><u>Rank ' . $element['rank'] . '</u></td></tr>';
				}
				$pos = $thisElem[1];
			}
		}
		echo '</table>';
		
		groupFoot();
		
	}
	
	function readAttribs($element) { //Returns Array :: [STRING name, STRING value => STRING attribute, ...]
		if (isset($ret)) { unset($ret); }
		$i = 1;
		$ret[] = substr($element, $i, strpos($element, ' ', $i)-$i);
		$i += strlen($ret[0])+1; //Skip space
		while ($i < strlen($element)) {
			if (strpos($element, '=', $i) === false) { break; }
			$tmp1 = substr($element, $i, strpos($element, '=', $i)-$i);
			$i+=strlen($tmp1)+2; //Skip = and "
			if (strpos($element, '"', $i) === false) { break; }
			$tmp2 = substr($element, $i, strpos($element, '"', $i)-$i);
			$i+=strlen($tmp2)+2; //Skip " and space
			
			$ret[$tmp1] = $tmp2;
		}
		return $ret;
	}
	function readElement($input, $pos) { //Returns Array :: [STRING element_data, INT ending_position]
		$mypos = strpos($input, '<', $pos);
		if ($mypos === false) { return false; } // Must === false, otherwise 0 will == false
		$mystring = substr($input, $mypos, strpos($input, '>', $mypos)-$mypos+1);
		$ret[0] = $mystring;
		$ret[1] = $mypos + strlen($mystring);
		return $ret;
	}
	
	function isFriendlyString($str) {
		$ret = true;
		if (strpos($str, "\\") !== false || strpos($str, "/") !== false || strpos($str, ":") !== false || strpos($str, "*") !== false
		|| strpos($str, "?") !== false || strpos($str, "\"") !== false || strpos($str, "<") !== false || strpos($str, ">") !== false
		|| strpos($str, "|") !== false)
		{ return false; }
		else { return true; }
	}
	
	function database_connect() {
		// Password removed for security
		mysql_connect("10.8.13.129", "guildcube", "PASSWORD");
		mysql_select_db("guildcube");
	}
?>