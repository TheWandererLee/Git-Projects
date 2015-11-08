<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>Wingit in Asheville</title>
	<link rel="stylesheet" href="style.css" type="text/css" charset="utf-8" />
	
    <!-- <script src="DWConfiguration/ActiveContent/IncludeFiles/AC_RunActiveContent.js" type="text/javascript"></script> -->
	
<style type="text/css">
<!--
div#tipDiv {
  position:absolute; visibility:hidden; left:0; top:0; z-index:10000;
  background-color:#dee7f7; border:1px solid #336;
  width:250px; padding:4px;
  color:#000; font-size:11px; line-height:1.2;
}
-->
</style>
<script src="scripts/dw_event.js" type="text/javascript"></script>
<script src="scripts/dw_viewport.js" type="text/javascript"></script>
<script src="scripts/dw_tooltip.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
function doTooltip(e, msg) {
  if ( typeof Tooltip == "undefined" || !Tooltip.ready ) return;
  Tooltip.show(e, msg);
}

function hideTip() {
  if ( typeof Tooltip == "undefined" || !Tooltip.ready ) return;
  Tooltip.hide();
}
//-->
</script>

<!-- Google Analytics -->
<script type="text/javascript">var _gaq = _gaq || [];_gaq.push(['_setAccount', 'UA-389885-6']);_gaq.push(['_trackPageview']);(function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script>
</head>

<?php 
	function boxTop() {
		echo '<div id="black-tl">';
		echo '<div id="black-tr">';
		echo '<div id="black-br">';
		echo '<div id="black-bl">';
	}
	function boxBottom() {
		echo '<div class="clear"></div>';
		echo '</div></div></div></div>';
	}
	
	$clickToEnlarge = 'Click pictures to enlarge.';
	$forSale = '<u style=color:#00AA00;><blink>FOR SALE</blink></u><br />';
	$sold = '<u style=color:#AA0000;>SOLD</u><br />';
?>

<body onLoad="Tooltip.init()">
<div id="header">
	<h1><em>Wingit</em><strong>in Asheville</strong></h1>
</div>

<div id="left-person"></div>

<div id="uppers">
	<!--
	<form action="http://www.wingitinasheville.com">
		<select name="gender">
			<option value="w">woman</option>
			<option value="w">man</option>
		</select>
		<input type="text" name="q" value="Enter product code" id="q" />
		<input type="image" name="s" src="images/btn_header.gif" id="s" />
	</form>
	-->
	<div id="nav-top">
		<ul>
			<li><a href="?aboutMe">About Me</a> |</li>
			<li><a href="mailto:jenniewing@charter.net?subject=Wingit%20in%20Asheville">Contact Me</a></li>
		</ul>
	</div>
</div>

<div id="nav"><div>
	<ul>
		<li><a href="?">PORTFOLIO-INDEX</a> &nbsp;|&nbsp;</li>
		<li><a href="?decPaint">DECORATIVE INTERIORS</a> &nbsp;|&nbsp;</li>
		<li><a href="?fineArt">THE ARTZ</a> &nbsp;|&nbsp;</li>
		<li><a href="?multComp">T-SHIRTZ</a></li>
	</ul>
</div></div>

<div id="body">
	<?php
		if (isset($_GET['aboutMe'])) {
			echo '<h2><i>About Wingit in Asheville</i></h2>';
			echo '<br /><b>Chronology</b>';
			echo '<br /><br />';
			echo 'Born: 1955, Milwaukee, Wisconsin';
			echo '<br />';
			echo '<br /><b>Solo Exhibitions:</b>';
			echo '<br />1997: "Rodeo Rider" mural Fair Grounds-Brodus Mt.';
			echo '<br />1994: "Tribes" Asheville N.C.';
			echo '<br />1993: "Mother Earth" Play onwardz Gallery -Asheville N.C.';
			echo '<br />1992: "Tribes Incomplete" What Do You Want Gallery - Asheville N.C.';
			echo '<br />1990: "One Day" Mt. Food Pro. - Asheville N.C.';
			echo '<br />1989: "Studies of the Masters" Mt Food Pro - Asheville N.C.';
			echo '<br />1988: "Nothing New" Malapropos Gallery - Asheville N.C.';
			echo '<br />1987: "Writing on the Wall" 70 Lex. Asheville N.C.';
			echo '<br />';
			echo '<br /><b>Group Exhibitions:</b>';
			echo '<br />1998: "Greetings!" mural - Mt Food Pro. Asheville N.C.';
			echo '<br />1997: "A characterization of the Expressive Countenance and Numerable embodiments of the Supreme Deity" County Fair - Brodus, Mt';
			echo '<br />1993: "Dragons" Playonwardz Gallery Asheville N.C.';
			echo '<br />1992: "Founders Show" Play onwardz Gallery Asheville N.C.';
			echo '<br />1991: "United way photo Comp." Wilmington N.C.';
			echo '<br />1989: Third dimension" 70 Lex. Asheville N.C.';
			echo '<br />1984: "Concrete" Women\'s Work Asheville N.C.';
			echo '<br />';
			echo '<br /><b>Awards and Commissions</b>';
			echo '<br />1997: Honorable Mention "A characterization of the Expressive Countenance and Numerable embodiments of the Supreme Deity.';
			echo '<br />1993: "Fairies" private N.C.';
			echo '<br />1992: Murals: Mermaid, Dolphin, Kool World, "Simple Treasures" Wilmington N.C.';
			echo '<br />1991: First Place - United Way Photo Comp. Wilmington N.C.';
			echo '<br />1976: Mural - V.O.A/New Orleans La.';
			echo '<br />';
			echo '<br /><b>Teaching and Art related Employment</b>';
			echo '<br />1999-2000+: "WingIt" Interior/Decorative Professional Painter';
			echo '<br />1997: Kindergarten teacher and Art teacher (1-8) Hawks Home School, Hammond Mt.';
			echo '<br />1993: 1st-3rd grade teacher C.G.S. Asheville N.C.';
			echo '<br />1989: Lecturer/Facilitator "The art of Art" N.C.D.C. As.';
			echo '<br />1988: Lecturer/Facilitator "Process, not Product" UNCA N.C.D.C.A';
			echo '<br />1987: Lecturer/Facilitator: "In to it - Into it - Intuit" N.C.D.C.A.';
			echo '<br />1982-84: Creative Arts Teacher, C.G.S. Asheville N.C.';
			echo '<br />????: Art teacher and K. assistant Fracine Delane, New School for child';
			echo '<br />';
			echo '<br /><b>C/V conti.</b>';
			echo '<br />1983: Illustrator, Ledford\'s Children\'s Stories Privak N.C.';
			echo '<br />1978: Illustrator, "Among Wildflowers" N.C. publication';
			echo '<br />1979-93 Pre-1st grade Teacher Children\'s Grammar School - Asheville N.C.';
			echo '<br />';
			echo '<br /><b>Bibliography</b>';
			echo '<br />1993: "The arts" Asheville Citizen Times. Asheville N.C.';
			echo '<br />1992: "Happenings" The Gazette Carolina Beach N.C.';
			echo '<br />';
			echo '<br /><b>Commercial Art</b>';
			echo '<br />Logos, letterheads, and publicity posters for new business\' and community functions, backdrops, T-shirt art, etc.';
			echo '<br />';
			echo '<br /><b>Represented By</b>';
			echo '<br /><u>Past:</u>';
			echo '<br />What Do You Want?';
			echo '<br />Gallery and gift shop Asheville N.C.';
			echo '<br />Simple Treasures Gallery and gift shop Carolina Beach N.C.';
			echo '<br />Kool World Gallery and gift shop Wilmington N.C.';
			echo '<br />Country Crafts Broadus N.C.';
			echo '<br />Yellow T-Pot Hot Springs N.C.';
			echo '<br /><u>Present:</u>';
			echo '<br />Revolving Door (828)225-5545';
			echo '<br />742 Haywood Rd.';
			echo '<br />Asheville NC 28806';
			echo '<br />(T-shirts &amp; consignment)';
			echo '<br />';
			echo '<br />Good stuff';
			echo '<br />Main street';
			echo '<br />Marshall NC';
			echo '<br />(T-shirts, cards, misc.)';
			echo '<br />';
			echo '<br />Instant Karma';
			echo '<br />Lexington Ave.';
			echo '<br />Asheville NC';
			echo '<br />(T-shirts)';
		}
		elseif (isset($_GET['decPaint'])) {
			echo "<h2><i>Wingit in Asheville!</i></h2>";
			echo "<br /><b>Decorative Interiors</b>";
			
			echo "<br /><br />I am an ecletic artist who while spiraling through life experiences, has most recently been using my creative talents as an interior painter. Specialty decisions have been co-created by clients and myself. I hope creating this page will be an inspiration for you, wherein you can find resources to actualize your ideas.";
			echo "<p />";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;I am an artist painting interiors of homes, churches, and workplaces. Recently I have enjoyed creating broken tile mosaics for kitchen and bath, and floors. I am willing to do projects in Asheville, North Carolina and surrounding areas as well as east coast, near Wilmington south to Myrtle Beach. Other areas are possible as arrangements can be made.";
			echo "<p />";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;Please contact me at <a href=\"mailto:jenniewing@charter.net?subject=Reply%20From%20Website\" style=\"color: #8888FF; font-weight: bold;\">jenniewing@charter.net</a>.</font>";
			
			if ($_SESSION['loggedin']) {
				echo '<br /><br />';
				echo '<div style="font-family: Courier New; font-size: 11px; background-color: #000000; color: #00FF00;">';
				echo '<hr />';
				$op = substr($_POST['action'], 1);
				$onum = (int)getFilename($op);
				echo "COMMAND&gt; \"" . $_POST['action'] . "\"<br />";
				if (substr($_POST['action'], 0, 1) == 'l') {
					//Move left
					$num = (int)$_POST['movel'.(int)$op];
					echo "MOVING PIC " . $op . " LEFT " . $num . " SPACE<br />";
					if ($num >= 1) {
						rename("pictures/decpaint/" . $op, "pictures/decpaint/tmp" . $op);
						echo "RENAMED <b>" . $op . "</b> TO TMP<br />";
						for ($i=$onum-1; $i>=$onum-$num; $i--) {
							rename("pictures/decpaint/" . $i . ".jpg", "pictures/decpaint/" . ($i+1) . ".jpg");
							echo "RENAMED <b>" . $i . ".jpg</b> TO <b>" . ($i+1) . ".jpg</b><br />";
						}
						rename("pictures/decpaint/tmp" . $op, "pictures/decpaint/" . ($onum-$num) . ".jpg");
						echo "RENAMED TMP TO <b>" . ($onum-$num) . ".jpg</b><br />";
						
						rename("pictures/decpaint/tn_" . $op, "pictures/decpaint/tmptn_" . $op);
						for ($i=$onum-1; $i>=$onum-$num; $i--) {
							rename("pictures/decpaint/tn_" . $i . ".jpg", "pictures/decpaint/tn_" . ($i+1) . ".jpg");
						}
						rename("pictures/decpaint/tmptn_" . $op, "pictures/decpaint/tn_" . ($onum-$num) . ".jpg");
						echo "<i>RENAMED THUMBNAILS</i><br />";
					}
				} elseif (substr($_POST['action'], 0, 1) == 'r') {
					//Move right
					$num = (int)$_POST['mover'.(int)$op];
					echo "MOVING PIC " . $op . " RIGHT " . $num . " SPACE<br />";
					if ($num >= 1) {
						rename("pictures/decpaint/" . $op, "pictures/decpaint/tmp" . $op);
						echo "RENAMED <b>" . $op . "</b> TO TMP<br />";
						for ($i=$onum+1; $i<=$onum+$num; $i++) {
							rename("pictures/decpaint/" . $i . ".jpg", "pictures/decpaint/" . ($i-1) . ".jpg");
							echo "RENAMED <b>" . $i . ".jpg</b> TO <b>" . ($i-1) . ".jpg</b><br />";
						}
						rename("pictures/decpaint/tmp" . $op, "pictures/decpaint/" . ($onum+$num) . ".jpg");
						echo "RENAMED TMP TO <b>" . ($onum+$num) . ".jpg</b><br />";
						
						rename("pictures/decpaint/tn_" . $op, "pictures/decpaint/tmptn_" . $op);
						for ($i=$onum+1; $i<=$onum+$num; $i++) {
							rename("pictures/decpaint/tn_" . $i . ".jpg", "pictures/decpaint/tn_" . ($i-1) . ".jpg");
						}
						rename("pictures/decpaint/tmptn_" . $op, "pictures/decpaint/tn_" . ($onum+$num) . ".jpg");
						echo "<i>RENAMED THUMBNAILS</i><br />";
					}
				} elseif (substr($_POST['action'], 0, 1) == 'd') {
					//Delete
					unlink("pictures/decpaint/" . $op);
					unlink("pictures/decpaint/tn_" . $op);
					echo "<b>DELETED " . $op . " (AND THUMBNAIL)</b><br />";
					for ($i=$onum+1; $i>=$onum; $i++) {
						if (!file_exists("pictures/decpaint/" . $i . ".jpg")) { echo "FOUND END (" . $i . " DOES NOT EXIST)<br />"; break; }
						rename("pictures/decpaint/" . $i . ".jpg", "pictures/decpaint/" . ($i-1) . ".jpg");
						rename("pictures/decpaint/tn_" . $i . ".jpg", "pictures/decpaint/tn_" . ($i-1) . ".jpg");
						echo "RENAMED " . $i . ".jpg TO " . ($i-1) . ".jpg (AND RENAMED THUMBNAIL)<br />";
					}
				} elseif (empty($_POST['action'])) {
					echo 'EMPTY COMMAND<br />';
				} else {
					echo 'UNKNOWN COMMAND<br />';
				}
				echo "<hr />";
				echo "</div>";
			}
			
			echo "</div>";
			echo '<form name="actions" action="index.php?decPaint" method="post">';
			echo '<input type="hidden" value="" name="action">';
			
			boxTop();
			
			$handle = opendir("pictures/decpaint/");
			$file = ""; $num = 0;
			$pics = array();
			while (false !== ($file = readdir($handle))) {
				if ($file != "." && $file != ".." && substr($file, 0, 3) != "tn_") {
					$pics[] = $file;
				}
			}
			sort($pics, SORT_NUMERIC);
			foreach($pics as $pic) {
				$num++;
				$count = getFilename($pic);
				
				if ($num == 1) { echo '<h2>Faux/Texture Techniques</h2><br />'; echo $clickToEnlarge;; }
				
				echo '<div class="black-box">';
				echo '<p><a ';
				
				if ($num == 28) {
					echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $forSale . 'FRONT of 2 drawer cabinet</b>\')" onmouseout="hideTip()"';
				} elseif ($num == 29) {
					echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $forSale . 'BACK of 2 drawer cabinet</b>\')" onmouseout="hideTip()"';
				} elseif ($num == 30) {
					echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $forSale . 'FRONT of 6 drawer cabinet</b>\')" onmouseout="hideTip()"';
				} elseif ($num == 31) {
					echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $forSale . 'BACK of 6 drawer cabinet</b>\')" onmouseout="hideTip()"';
				} elseif ($num == 32) {
					echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $forSale . 'FRONT of 1 drawer cabinet</b>\')" onmouseout="hideTip()"';
				} elseif ($num == 33) {
					echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $forSale . 'BACK of 1 drawer cabinet</b>\')" onmouseout="hideTip()"';
				}
				
				echo 'href="pictures/decpaint/' . $pic . '"><img src="pictures/decpaint/tn_' . $pic . '" width="120" height="105" alt="' . $pic . '" /></a>';
				
				
				if ($_SESSION['loggedin'] == true) {
					echo '<center><img src="images/left.gif" align="top" onclick="document.actions.action.value=\'l' . $pic . '\'; document.actions.submit();"><input type="text" style="font-size: 11px;" size="1" name="movel' . $count . '" value="1"><img src="images/delete.gif" align="top" onclick="document.actions.action.value=\'d' . $pic . '\'; document.actions.submit();"><input type="text" style="font-size: 11px;" size="1" name="mover' . $count . '" value="1"><img src="images/right.gif" align="top" onclick="document.actions.action.value=\'r' . $pic . '\'; document.actions.submit();"></center><br />';
					echo "\r\n";
				}
				echo '</p></div>';
				
				if ($num % 3 == 0) { echo '<br />'; }
				if ($num == 9) { echo '<br />'; echo '<h2>Murals</h2>'; }
				elseif ($num == 27) { echo '<br />'; echo '<h2>Woodwork</h2>'; }
				elseif ($num == 33) { echo '<br />'; echo '<h2>Mosaic/Tile (Walls &amp; Floors)</h2>'; }
			}
			
			echo '</form>';
			boxBottom();
		} elseif (isset($_GET['fineArt'])) {
			echo "<h2><em>Wingit in Ashe'vegas!</em></h2><br />";
			
			$dirs = array();
			if ($handle = opendir("pictures/fineart/")) {
    			while (false !== ($file = readdir($handle))) {
        			if ($file != "." && $file != "..") {
            			if (filetype("pictures/fineart/" . $file) == 'dir') {
							$dirs[] = $file;
						}
        			}
    			}
    			closedir($handle);
			}
			
			if (empty($_GET['fineArt'])) {
				$dirnames = array('wall' => 'Writing on the Wall', 'family' => 'Family', 'mylady' => 'My Lady 2000', 'tribes' => 'Tribes', 'memorial' => 'The Memorial');
				foreach($dirs as $dir) {
					echo '<a href="?fineArt=' . $dir . '" style="font-family: Papyrus; font-size: 32px; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;' . $dirnames[$dir] . '&nbsp;&nbsp;&nbsp;&nbsp;</a><br />';
				}
				//echo '<br /><a href="?fineArt">Click here to go back to all of The ARTZ</a>';
				echo '</div>';
				
				$dir = "pictures/fineart/";
				$pics = array();
				if ($handle = @opendir($dir)) {
					while (false !== ($file = readdir($handle))) {
						if ($file != "." && $file != ".." && filetype($dir . $file) == "file" && substr($file, 0, 3) != "tn_") {
								$pics[] = $file;
						}
					}
					closedir($handle);
					sort($pics, SORT_NUMERIC);
					
					echo '</div>';
					boxTop();
			
					$file = ""; $num = 0;
					
					//echo '<h2>My Lady 2000 <a href="#" style="color: #0000FF; font-size: 11px;" onclick="if (document.getElementById(\'myladyInfo\').style.display==\'block\') { document.getElementById(\'myladyInfo\').style.display=\'none\'; } else { document.getElementById(\'myladyInfo\').style.display=\'block\'; }">(click here to show/hide info)</a></h2>';
					//echo '<br />(all media - compositional art, consisting of 4 separate pieces)<br /><br />';
					//echo '<div id="myladyInfo" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;"My Lady 2000" is an exhibit of 4 pieces, BODY, HEAD, MYTH, and F/X. "My Lady 2000" documents emerging through the imbroglio of Life\'s dramatic manifestations of energy. Since birth we are asked, taught, coerced and guided to have faith in: Family, Institutions: church school, hospital, Culture and even the chair we sit on. My Lady bares/bears the mark of a majority of women, year 2000. Having had an abortion, leg replacements, hysterectomy, breast cancer, cosmetic surgery etc. she remains standing to tell her secrets.<br />&nbsp;&nbsp;&nbsp;&nbsp;"My Lady 2000" alerts one to see the unique overlooked Rite/Right to have faith in: Ourselves! Within our body we create the procedure of Healing, Religion, Culture etc. <b>"My Lady 2000" documents a time: NOW.</b></div><br />';
					foreach($pics as $pic) {
						$num++;
						$count = getFilename($pic);
						
						if ($num == 1) { echo $clickToEnlarge;; }
						
						echo '<div class="black-box">';
						echo '<p><a href="' . $dir . $pic . '"';
						
						if ($num == 1) {
							echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $sold. '</b>\')" onmouseout="hideTip()"';
						} elseif ($num == 2) {
							echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $forSale. 'PreQuest (acrylic on canvas)</b>\')" onmouseout="hideTip()"';
						} elseif ($num == 3) {
							echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $forSale. 'Grazing Animal Talisman</b>\')" onmouseout="hideTip()"';
						} elseif ($num == 4) {
							echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $forSale. 'Mosaic Mountain Scene Tray</b>\')" onmouseout="hideTip()"';
						} elseif ($num == 5) {
							echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $forSale. 'Dragon Dancing (acrylic on canvas)</b>\')" onmouseout="hideTip()"';
						} elseif ($num == 6) {
							echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $forSale. 'Montana Lambing (acrylic on canvas)</b>\')" onmouseout="hideTip()"';
						} elseif ($num == 7) {
							echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $forSale. 'First Religious Painting (acrylic on canvas)</b>\')" onmouseout="hideTip()"';
						} elseif ($num >= 8 && $num <= 16) {
							echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $sold. '</b>\')" onmouseout="hideTip()"';
						} elseif ($num == 17) {
							echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $forSale. 'Winter Waiting (pen and ink)</b>\')" onmouseout="hideTip()"';
						} elseif ($num == 18) {
							echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $forSale. 'Cole Slaw Card (pen and ink)</b>\')" onmouseout="hideTip()"';
						} elseif ($num == 19) {
							echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $forSale. 'Goddess Wreath Card (pen and ink)</b>\')" onmouseout="hideTip()"';
						} elseif ($num == 20) {
							echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $forSale. 'Reading Card (pen and ink)</b>\')" onmouseout="hideTip()"';
						} elseif ($num == 23) {
							echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $forSale. 'Butterfly Card (pen and ink)</b>\')" onmouseout="hideTip()"';
						}
						
						echo '><img src="' . $dir . 'tn_' . $pic . '" width="120" height="105" alt="' . $pic . '" /></a></p>';
						echo '</p></div>';
						
						if ($num % 3 == 0) { echo '<br />'; }
						if ($num == 10) {
						//blankPic(); blankPic();
						//echo '<br /><h2>Tribes <a href="#" style="color: #0000FF; font-size: 11px;" onclick="if (document.getElementById(\'tribesInfo\').style.display==\'block\') { document.getElementById(\'tribesInfo\').style.display=\'none\'; } else { document.getElementById(\'tribesInfo\').style.display=\'block\'; }">(click here to show/hide info)</a></h2>';
						//echo '<br />(acrylic on canvas)<br /><br />';
						//echo '<div id="tribesInfo" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;Being a teacher I recognized the need for paintings that portrayed and elevated people of color. Oppresed cultures and minorities are conitnually photographes and visualized through romantic notions of "we" are better off than that. "Superior."<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"The he realized -<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I, in deed am this creation,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for I have poured it forth from myself"<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;As an artist I took it upon myself to undress the white race, address notions of prejudice and exemplify oppresed cultures that continue to care for their elderly and children. Initiate their youths through rites of passage, and support the individual and their families in duress. For it is the struggle, the confrontation of the conflict which is the celebration that binds loyalty, and makes Tribes. It is the repetitive process. Sharing celebrations of Nature, Holidays, and Inidividual development are Rituals that produce a sense of Tribe.<br />&nbsp;&nbsp;&nbsp;&nbsp;As we begin to open up to accepting; those who are different than ourself, as our extended family, celebrationg our similarities, as well as our differences we evoke the process of healing, toward personal individuation.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"...and that way he became this creation.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and verily he who knows this...<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;becomes in this creation...<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A Creator."<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;The original purpose: to create visual stimulus that supports Unity in recognizing similarities even in culutural diversity. To propose that which in the name of Christianity, years ago- Industrialization, at the turn of the century and Capitalism now, proposes to insure actually (has/is) continues to break down that which allows one to feel or live in Tribal Unity. Therefore physically manifesting the breakdown of Tribes as we know them and families as we live in them.<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"In the beginning there was only the Great Self<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;reflected in the form of a Person.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;reflecting... it found nothing but Itself.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;And its first word was... This am I."<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;My first painting, "Mother" was inspired by the longing for his family of an African friend. He was seemingly exiled from his family by immigration laws. This desire to be reunited or embraced by the physical family, remains through out life with people of all colors and can only by nurtured and fulfilled by our blood family, or personal resolution.<br />&nbsp;&nbsp;&nbsp;&nbsp;This African mans desire was similar to my desire to be embreaced by my family. I did not have immigration laws, and oceans separating me from my family. Thus began my quest for Tribe. Resurrecting and healing that which was annihilated and oppresed in my past.<br />&nbsp;&nbsp;&nbsp;&nbsp;The beginning of this work called "tribes" directed a personal need of the expression and feeling during the finding and nurturing of the Tribe. My intrigue lay in the elaborate portrayal of ceremony. The Story where in rituals and initiations were garbed with hand crafts and tokens of personal creation, and experiencel therefore separate family from its members are governed by separateness. To accept only that which is similar to self, is to present and deliver the ultimatum...<br />Division and Oppresion. Or to set similarities, above-or over differences.<br />&nbsp;&nbsp;&nbsp;&nbsp;I present; that which is blood that goes beyond blood. I have found that which is this supposedly progressive standard of living has in actuality town apart exactly that which people kind long have to have back; Family unity, Tribal security and Individual respect.</div>';
						}
					}
					
					boxBottom();
				} else { echo '<a href="/">Fineart directory does not exist. Click here to go back to the main page</a>'; }
			} else {
				$dir = "pictures/fineart/" . $_GET['fineArt'] . "/";
				$pics = array();
				if ($handle = @opendir($dir)) {
					while (false !== ($file = readdir($handle))) {
						if ($file != "." && $file != ".." && substr($file, 0, 3) != "tn_") {
								$pics[] = $file;
						}
					}
					closedir($handle);
					sort($pics, SORT_NUMERIC);
					
					echo '<br /><a href="?fineArt">Click here to go back to all of The ARTZ</a>';
					echo '</div>';
					boxTop();
			
					$file = ""; $num = 0;
					
					
					//echo '<h2>My Lady 2000 <a href="#" style="color: #0000FF; font-size: 11px;" onclick="if (document.getElementById(\'myladyInfo\').style.display==\'block\') { document.getElementById(\'myladyInfo\').style.display=\'none\'; } else { document.getElementById(\'myladyInfo\').style.display=\'block\'; }">(click here to show/hide info)</a></h2>';
					//echo '<br />(all media - compositional art, consisting of 4 separate pieces)<br /><br />';
					//echo '<div id="myladyInfo" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;"My Lady 2000" is an exhibit of 4 pieces, BODY, HEAD, MYTH, and F/X. "My Lady 2000" documents emerging through the imbroglio of Life\'s dramatic manifestations of energy. Since birth we are asked, taught, coerced and guided to have faith in: Family, Institutions: church school, hospital, Culture and even the chair we sit on. My Lady bares/bears the mark of a majority of women, year 2000. Having had an abortion, leg replacements, hysterectomy, breast cancer, cosmetic surgery etc. she remains standing to tell her secrets.<br />&nbsp;&nbsp;&nbsp;&nbsp;"My Lady 2000" alerts one to see the unique overlooked Rite/Right to have faith in: Ourselves! Within our body we create the procedure of Healing, Religion, Culture etc. <b>"My Lady 2000" documents a time: NOW.</b></div><br />';
					$enlargeSaid = false;
					foreach($pics as $pic) {
						$num++;
						$count = getFilename($pic);
						
						if ($num == 1 && $enlargeSaid == false) { echo $clickToEnlarge; $enlargeSaid=true; }
						if ($count != 'info') {
							echo '<div class="black-box">';
							echo '<p><a href="' . $dir . $pic . '"';
							
							if ($_GET['fineArt'] == 'mylady') {
								if ($pic == "1.jpg") {
									echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>My Lady 2000</b>\')" onmouseout="hideTip()"';
								} elseif ($pic == "2.jpg") {
									echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>Her Body Front</b>\')" onmouseout="hideTip()"';
								} elseif ($pic == "3.jpg") {
									echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>Her Body Back</b>\')" onmouseout="hideTip()"';
								} elseif ($pic == "4.jpg") {
									echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>Her Back Porch</b>\')" onmouseout="hideTip()"';
								} elseif ($pic == "5.jpg") {
									echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>Close-Up of Belly Opening</b>\')" onmouseout="hideTip()"';
								} elseif ($pic == "6.jpg") {
									echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>Her Head Aerial View</b>\')" onmouseout="hideTip()"';
								} elseif ($pic == "7.jpg") {
									echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>S/HE</b>\')" onmouseout="hideTip()"';
								} elseif ($pic == "8.jpg") {
									echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>FX</b>\')" onmouseout="hideTip()"';
								} elseif ($pic == "9.jpg") {
									echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>Accessories</b>\')" onmouseout="hideTip()"';
								} elseif ($pic == "10.jpg") {
									echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>Journal</b>\')" onmouseout="hideTip()"';
								}
							} elseif ($_GET['fineArt'] == 'tribes') {
								if ($num == 1) {
									echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $forSale . 'Trust and Innocence (acrylic on canvas)</b>\')" onmouseout="hideTip()"';
								} elseif ($num >= 2 && $num <= 7) {
									echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $sold . '</b>\')" onmouseout="hideTip()"';
								} elseif ($num == 8) {
									echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $forSale . 'Steel Drummer (acrylic on canvas)</b>\')" onmouseout="hideTip()"';
								} elseif ($num == 9) {
									echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $forSale . 'Dancers (acrylic on canvas)</b>\')" onmouseout="hideTip()"';
								} elseif ($num >= 10) {
									echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $sold . '</b>\')" onmouseout="hideTip()"';
								}
							} elseif ($_GET['fineArt'] == 'family') {
								if ($num >= 1 && $num <= 12) {
									echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $sold . '</b>\')" onmouseout="hideTip()"';
								} elseif ($num == 13) {
									echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>' . $forSale . 'Tshu Tshu (pen and ink)</b>\')" onmouseout="hideTip()"';
								}
							}
							
							echo '><img src="' . $dir . 'tn_' . $pic . '" width="120" height="105" alt="' . $pic . '" /></a></p>';
							/* if ($_SESSION['loggedin'] == true) {
								echo '<center><img src="images/left.gif" align="top" onclick="document.actions.action.value=\'l' . $pic . '\'; document.actions.submit();"><input type="text" style="font-size: 11px;" size="1" name="movel' . $count . '" value="1"><img src="images/delete.gif" align="top" onclick="document.actions.action.value=\'d' . $pic . '\'; document.actions.submit();"><input type="text" style="font-size: 11px;" size="1" name="mover' . $count . '" value="1"><img src="images/right.gif" align="top" onclick="document.actions.action.value=\'r' . $pic . '\'; document.actions.submit();"></center><br />';
								echo "\r\n";
							} */
							echo '</p></div>';
							
							if ($num % 3 == 0) { echo '<br />'; }
							if ($num == 10) {
							//blankPic(); blankPic();
							//echo '<br /><h2>Tribes <a href="#" style="color: #0000FF; font-size: 11px;" onclick="if (document.getElementById(\'tribesInfo\').style.display==\'block\') { document.getElementById(\'tribesInfo\').style.display=\'none\'; } else { document.getElementById(\'tribesInfo\').style.display=\'block\'; }">(click here to show/hide info)</a></h2>';
							//echo '<br />(acrylic on canvas)<br /><br />';
							//echo '<div id="tribesInfo" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;Being a teacher I recognized the need for paintings that portrayed and elevated people of color. Oppresed cultures and minorities are conitnually photographes and visualized through romantic notions of "we" are better off than that. "Superior."<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"The he realized -<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I, in deed am this creation,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for I have poured it forth from myself"<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;As an artist I took it upon myself to undress the white race, address notions of prejudice and exemplify oppresed cultures that continue to care for their elderly and children. Initiate their youths through rites of passage, and support the individual and their families in duress. For it is the struggle, the confrontation of the conflict which is the celebration that binds loyalty, and makes Tribes. It is the repetitive process. Sharing celebrations of Nature, Holidays, and Inidividual development are Rituals that produce a sense of Tribe.<br />&nbsp;&nbsp;&nbsp;&nbsp;As we begin to open up to accepting; those who are different than ourself, as our extended family, celebrationg our similarities, as well as our differences we evoke the process of healing, toward personal individuation.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"...and that way he became this creation.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and verily he who knows this...<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;becomes in this creation...<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A Creator."<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;The original purpose: to create visual stimulus that supports Unity in recognizing similarities even in culutural diversity. To propose that which in the name of Christianity, years ago- Industrialization, at the turn of the century and Capitalism now, proposes to insure actually (has/is) continues to break down that which allows one to feel or live in Tribal Unity. Therefore physically manifesting the breakdown of Tribes as we know them and families as we live in them.<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"In the beginning there was only the Great Self<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;reflected in the form of a Person.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;reflecting... it found nothing but Itself.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;And its first word was... This am I."<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;My first painting, "Mother" was inspired by the longing for his family of an African friend. He was seemingly exiled from his family by immigration laws. This desire to be reunited or embraced by the physical family, remains through out life with people of all colors and can only by nurtured and fulfilled by our blood family, or personal resolution.<br />&nbsp;&nbsp;&nbsp;&nbsp;This African mans desire was similar to my desire to be embreaced by my family. I did not have immigration laws, and oceans separating me from my family. Thus began my quest for Tribe. Resurrecting and healing that which was annihilated and oppresed in my past.<br />&nbsp;&nbsp;&nbsp;&nbsp;The beginning of this work called "tribes" directed a personal need of the expression and feeling during the finding and nurturing of the Tribe. My intrigue lay in the elaborate portrayal of ceremony. The Story where in rituals and initiations were garbed with hand crafts and tokens of personal creation, and experiencel therefore separate family from its members are governed by separateness. To accept only that which is similar to self, is to present and deliver the ultimatum...<br />Division and Oppresion. Or to set similarities, above-or over differences.<br />&nbsp;&nbsp;&nbsp;&nbsp;I present; that which is blood that goes beyond blood. I have found that which is this supposedly progressive standard of living has in actuality town apart exactly that which people kind long have to have back; Family unity, Tribal security and Individual respect.</div>';
							}
						} else { $num--; }
					}
					
					boxBottom();
					
					if ($num < 10) {
						for ($i=10; $i>$num; $i-=3) {
							echo '<br /><br /><br /><br /><br /><br />';
						}
					}
					echo '<br /><br />';
					echo '<div style="font-size: 14px; margin-left: 16px; margin-right: 16px;">' . file_get_contents("pictures/fineart/" . $_GET['fineArt'] . "/info.txt") . '</div>';
				} else {
					echo '<a href="?fineArt">Subdirectory does not exist. Click here to goto main.</a></div>';
				}
			}
			
			
			
			
			//sort($pics, SORT_NUMERIC);
			
			/*
			echo "</div>";
			echo '<form name="actions" action="index.php?fineArt" method="post">';
			echo '<input type="hidden" value="" name="action">';
			*/

			/*
			boxTop();
			
			$handle = opendir("pictures/fineart/");
			$file = ""; $num = 0;
			$pics = array();
			while (false !== ($file = readdir($handle))) {
				if ($file != "." && $file != ".." && substr($file, 0, 3) != "tn_") {
					$pics[] = $file;
				}
			}
			sort($pics, SORT_NUMERIC);
			
			echo '<h2>My Lady 2000 <a href="#" style="color: #0000FF; font-size: 11px;" onclick="if (document.getElementById(\'myladyInfo\').style.display==\'block\') { document.getElementById(\'myladyInfo\').style.display=\'none\'; } else { document.getElementById(\'myladyInfo\').style.display=\'block\'; }">(click here to show/hide info)</a></h2>';
			echo '<br />(all media - compositional art, consisting of 4 separate pieces)<br /><br />';
			echo '<div id="myladyInfo" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;"My Lady 2000" is an exhibit of 4 pieces, BODY, HEAD, MYTH, and F/X. "My Lady 2000" documents emerging through the imbroglio of Life\'s dramatic manifestations of energy. Since birth we are asked, taught, coerced and guided to have faith in: Family, Institutions: church school, hospital, Culture and even the chair we sit on. My Lady bares/bears the mark of a majority of women, year 2000. Having had an abortion, leg replacements, hysterectomy, breast cancer, cosmetic surgery etc. she remains standing to tell her secrets.<br />&nbsp;&nbsp;&nbsp;&nbsp;"My Lady 2000" alerts one to see the unique overlooked Rite/Right to have faith in: Ourselves! Within our body we create the procedure of Healing, Religion, Culture etc. <b>"My Lady 2000" documents a time: NOW.</b></div><br />';
			foreach($pics as $pic) {
				$num++;
				$count = getFilename($pic);
				echo '<div class="black-box">';
				echo '<p><a href="pictures/fineart/' . $pic . '"><img src="pictures/fineart/tn_' . $pic . '" width="120" height="105" alt="' . $pic . '" /></a></p>';
				if ($_SESSION['loggedin'] == true) {
					echo '<center><img src="images/left.gif" align="top" onclick="document.actions.action.value=\'l' . $pic . '\'; document.actions.submit();"><input type="text" style="font-size: 11px;" size="1" name="movel' . $count . '" value="1"><img src="images/delete.gif" align="top" onclick="document.actions.action.value=\'d' . $pic . '\'; document.actions.submit();"><input type="text" style="font-size: 11px;" size="1" name="mover' . $count . '" value="1"><img src="images/right.gif" align="top" onclick="document.actions.action.value=\'r' . $pic . '\'; document.actions.submit();"></center><br />';
					echo "\r\n";
				}
				echo '</p></div>';
				
				if ($num % 3 == 0) { echo '<br />'; }
				if ($num == 10) {
				blankPic(); blankPic();
				echo '<br /><h2>Tribes <a href="#" style="color: #0000FF; font-size: 11px;" onclick="if (document.getElementById(\'tribesInfo\').style.display==\'block\') { document.getElementById(\'tribesInfo\').style.display=\'none\'; } else { document.getElementById(\'tribesInfo\').style.display=\'block\'; }">(click here to show/hide info)</a></h2>';
				echo '<br />(acrylic on canvas)<br /><br />';
				echo '<div id="tribesInfo" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;Being a teacher I recognized the need for paintings that portrayed and elevated people of color. Oppresed cultures and minorities are conitnually photographes and visualized through romantic notions of "we" are better off than that. "Superior."<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"The he realized -<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I, in deed am this creation,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for I have poured it forth from myself"<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;As an artist I took it upon myself to undress the white race, address notions of prejudice and exemplify oppresed cultures that continue to care for their elderly and children. Initiate their youths through rites of passage, and support the individual and their families in duress. For it is the struggle, the confrontation of the conflict which is the celebration that binds loyalty, and makes Tribes. It is the repetitive process. Sharing celebrations of Nature, Holidays, and Inidividual development are Rituals that produce a sense of Tribe.<br />&nbsp;&nbsp;&nbsp;&nbsp;As we begin to open up to accepting; those who are different than ourself, as our extended family, celebrationg our similarities, as well as our differences we evoke the process of healing, toward personal individuation.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"...and that way he became this creation.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and verily he who knows this...<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;becomes in this creation...<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A Creator."<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;The original purpose: to create visual stimulus that supports Unity in recognizing similarities even in culutural diversity. To propose that which in the name of Christianity, years ago- Industrialization, at the turn of the century and Capitalism now, proposes to insure actually (has/is) continues to break down that which allows one to feel or live in Tribal Unity. Therefore physically manifesting the breakdown of Tribes as we know them and families as we live in them.<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"In the beginning there was only the Great Self<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;reflected in the form of a Person.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;reflecting... it found nothing but Itself.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;And its first word was... This am I."<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;My first painting, "Mother" was inspired by the longing for his family of an African friend. He was seemingly exiled from his family by immigration laws. This desire to be reunited or embraced by the physical family, remains through out life with people of all colors and can only by nurtured and fulfilled by our blood family, or personal resolution.<br />&nbsp;&nbsp;&nbsp;&nbsp;This African mans desire was similar to my desire to be embreaced by my family. I did not have immigration laws, and oceans separating me from my family. Thus began my quest for Tribe. Resurrecting and healing that which was annihilated and oppresed in my past.<br />&nbsp;&nbsp;&nbsp;&nbsp;The beginning of this work called "tribes" directed a personal need of the expression and feeling during the finding and nurturing of the Tribe. My intrigue lay in the elaborate portrayal of ceremony. The Story where in rituals and initiations were garbed with hand crafts and tokens of personal creation, and experiencel therefore separate family from its members are governed by separateness. To accept only that which is similar to self, is to present and deliver the ultimatum...<br />Division and Oppresion. Or to set similarities, above-or over differences.<br />&nbsp;&nbsp;&nbsp;&nbsp;I present; that which is blood that goes beyond blood. I have found that which is this supposedly progressive standard of living has in actuality town apart exactly that which people kind long have to have back; Family unity, Tribal security and Individual respect.</div>'; }
			}
			
			echo '</form>';
			boxBottom();
			*/
		} elseif (isset($_GET['multComp'])) {
			echo "<h2><em>Wingit in A ville!</em></h2>";
			
			echo "Curently t-shirts come in sizes S to 2XL (all supplies are limited!). Hanes box cut t-shirts are of \"quality 100% cotton\" and are short sleeved. Womens Bella t-shirts also 100% cotton come in short or long sleeve (all supliess are limited!). Until I have a better system in place you can contact me at <a href=\"mailto:jenniewing@charter.net?subject=Tshirt%20Inquiry\" style=\"color: #8888FF; font-weight: bold;\">jenniewing@charter.net</a> to inquire how to purchase a shirt. You too can possess... the words of the prophets -as I possess the profits?<br /><br /><b>On sale at Revolving Door (828-225-5545) in West Asheville, 742 Haywood Rd. across from Pastabilities \"excellent food at economic prices\". Also on sale at the Yellow Teapot in Hotsprings, NC.</b>";
			if ($_SESSION['loggedin']) {
				echo '<br /><br />';
				echo '<div style="font-family: Courier New; font-size: 11px; background-color: #000000; color: #00FF00;">';
				echo '<hr />';
				$op = substr($_POST['action'], 1);
				$onum = (int)getFilename($op);
				echo "COMMAND&gt; \"" . $_POST['action'] . "\"<br />";
				if (substr($_POST['action'], 0, 1) == 'l') {
					//Move left
					$num = (int)$_POST['movel'.(int)$op];
					echo "MOVING PIC " . $op . " LEFT " . $num . " SPACE<br />";
					if ($num >= 1) {
						rename("pictures/multcomp/" . $op, "pictures/multcomp/tmp" . $op);
						echo "RENAMED <b>" . $op . "</b> TO TMP<br />";
						for ($i=$onum-1; $i>=$onum-$num; $i--) {
							rename("pictures/multcomp/" . $i . ".jpg", "pictures/multcomp/" . ($i+1) . ".jpg");
							echo "RENAMED <b>" . $i . ".jpg</b> TO <b>" . ($i+1) . ".jpg</b><br />";
						}
						rename("pictures/multcomp/tmp" . $op, "pictures/multcomp/" . ($onum-$num) . ".jpg");
						echo "RENAMED TMP TO <b>" . ($onum-$num) . ".jpg</b><br />";
						
						rename("pictures/multcomp/tn_" . $op, "pictures/multcomp/tmptn_" . $op);
						for ($i=$onum-1; $i>=$onum-$num; $i--) {
							rename("pictures/multcomp/tn_" . $i . ".jpg", "pictures/multcomp/tn_" . ($i+1) . ".jpg");
						}
						rename("pictures/multcomp/tmptn_" . $op, "pictures/multcomp/tn_" . ($onum-$num) . ".jpg");
						echo "<i>RENAMED THUMBNAILS</i><br />";
					}
				} elseif (substr($_POST['action'], 0, 1) == 'r') {
					//Move right
					$num = (int)$_POST['mover'.(int)$op];
					echo "MOVING PIC " . $op . " RIGHT " . $num . " SPACE<br />";
					if ($num >= 1) {
						rename("pictures/multcomp/" . $op, "pictures/multcomp/tmp" . $op);
						echo "RENAMED <b>" . $op . "</b> TO TMP<br />";
						for ($i=$onum+1; $i<=$onum+$num; $i++) {
							rename("pictures/multcomp/" . $i . ".jpg", "pictures/multcomp/" . ($i-1) . ".jpg");
							echo "RENAMED <b>" . $i . ".jpg</b> TO <b>" . ($i-1) . ".jpg</b><br />";
						}
						rename("pictures/multcomp/tmp" . $op, "pictures/multcomp/" . ($onum+$num) . ".jpg");
						echo "RENAMED TMP TO <b>" . ($onum+$num) . ".jpg</b><br />";
						
						rename("pictures/multcomp/tn_" . $op, "pictures/multcomp/tmptn_" . $op);
						for ($i=$onum+1; $i<=$onum+$num; $i++) {
							rename("pictures/multcomp/tn_" . $i . ".jpg", "pictures/multcomp/tn_" . ($i-1) . ".jpg");
						}
						rename("pictures/multcomp/tmptn_" . $op, "pictures/multcomp/tn_" . ($onum+$num) . ".jpg");
						echo "<i>RENAMED THUMBNAILS</i><br />";
					}
				} elseif (substr($_POST['action'], 0, 1) == 'd') {
					//Delete
					unlink("pictures/multcomp/" . $op);
					unlink("pictures/multcomp/tn_" . $op);
					echo "<b>DELETED " . $op . " (AND THUMBNAIL)</b><br />";
					for ($i=$onum+1; $i>=$onum; $i++) {
						if (!file_exists("pictures/multcomp/" . $i . ".jpg")) { echo "FOUND END (" . $i . " DOES NOT EXIST)<br />"; break; }
						rename("pictures/multcomp/" . $i . ".jpg", "pictures/multcomp/" . ($i-1) . ".jpg");
						rename("pictures/multcomp/tn_" . $i . ".jpg", "pictures/multcomp/tn_" . ($i-1) . ".jpg");
						echo "RENAMED " . $i . ".jpg TO " . ($i-1) . ".jpg (AND RENAMED THUMBNAIL)<br />";
					}
				} elseif (empty($_POST['action'])) {
					echo 'EMPTY COMMAND<br />';
				} else {
					echo 'UNKNOWN COMMAND<br />';
				}
				echo "<hr />";
				echo "</div>";
			}
			
			echo "</div>";
			echo '<form name="actions" action="index.php?multComp" method="post">';
			echo '<input type="hidden" value="" name="action">';

			boxTop();
			
			$handle = opendir("pictures/multcomp/");
			$file = ""; $num = 0;
			$pics = array();
			while (false !== ($file = readdir($handle))) {
				if ($file != "." && $file != ".." && substr($file, 0, 3) != "tn_") {
					$pics[] = $file;
				}
			}
			sort($pics, SORT_NUMERIC);
			foreach($pics as $pic) {
				$num++;
				$count = getFilename($pic);
				
				if ($num == 1) { echo '<h2>At Present, 4 Designs</h2><br />'; echo $clickToEnlarge;; }
				
				echo '<div class="black-box">';
				
				echo '<p><a href="pictures/multcomp/' . $pic . '"';
				
				if ($num >= 1 && $num < 4) {
					echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>Revolution, Revelation, Evolution...</b><br />Understanding change comes only after a Revelation... Revolution &amp; Evolution.\')" onmouseout="hideTip()"';
				} elseif ($num >= 4 && $num < 7) {
					echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>Number, Weigh, Divide</b><br />Inspired by early Christian story of Gods graffiti, solution to problems at hand.<br />Biblical reference: Daniel Chapter 5, Bible\')" onmouseout="hideTip()"';
				} elseif ($num >= 7 && $num < 10) {
					echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>Hallelujah</b><br />Calling for peace. The issue continually aborted throughout the years.\')" onmouseout="hideTip()"';
				} elseif ($num >= 10 && $num < 13) {
					echo ' onmouseover="doTooltip(event,\'<b style=font-size:16px;>Delete the Need to Understand</b><br />Was provoked by the current president at the time. It remains to be a talisman for energy to draw out one wo/man in the name of love.\')" onmouseout="hideTip()"';
				}
				
				echo '><img src="pictures/multcomp/tn_' . $pic . '" width="120" height="105" alt="' . $pic . '" /></a>';
				if ($_SESSION['loggedin'] == true) {
					echo '<center><img src="images/left.gif" align="top" onclick="document.actions.action.value=\'l' . $pic . '\'; document.actions.submit();"><input type="text" style="font-size: 11px;" size="1" name="movel' . $count . '" value="1"><img src="images/delete.gif" align="top" onclick="document.actions.action.value=\'d' . $pic . '\'; document.actions.submit();"><input type="text" style="font-size: 11px;" size="1" name="mover' . $count . '" value="1"><img src="images/right.gif" align="top" onclick="document.actions.action.value=\'r' . $pic . '\'; document.actions.submit();"></center><br />';
					echo "\r\n";
				}
				echo '</p></div>';
				
				if ($num % 3 == 0) { echo '<br />'; }
				if ($num == 12) { echo '<br />';
					echo '<h2>Potential T-Shirtz, what do you want?</h2>';
				}
			}
			
			echo '</form>';
			boxBottom();
		} else {
			echo "<br /><br /><center><b style=\"font-size: 48px; font-family: Papyrus;\">Wing it!</b></center><br />";
			echo "<p style=\"font-size: 16px; font-family: System;\">
			\"This is a gift that I have, simple, simple! A foolish extravagant spirit, full of forms, figures, shapes, objects, ideas, apprehensions, motions, revolutions. These are begot in the ventricle of memory, nourished in the womb of pia-mater, and delivered upon the mellowing of occasion.\"
			<br /><br />\"Dr. Faustus\" - <u>Holofernes</u> by Thomas Mann";
			echo '<br /><br /><br />';
			echo "</div>";
			boxTop();
			?>
			<div class="black-box">
				<h2><em>Interiors</em></h2>
				<p><a href="http://www.wingitinasheville.com?decPaint"><img src="images/pic_1.jpg" width="120" height="105" alt="Pic 1" /></a></p>
			</div>
			<div class="black-box">
				<h2><em>the ARTZ</em></h2>
				<p><a href="http://www.wingitinasheville.com?fineArt"><img src="images/pic_2.jpg" width="120" height="105" alt="Pic 2" /></a></p>
			</div>
			<div class="black-box">
				<h2><em>T-shirtz</em></h2>
				<p><a href="http://www.wingitinasheville.com?multComp"><img src="images/pic_3.jpg" width="120" height="105" alt="Pic 3" /></a></p>
			</div>
			<?php
			boxBottom();
		}
	?>
</div>

<!--
<div id="black-tl">
	<div id="black-tr">
		<div id="black-br">
			<div id="black-bl">
				
				<div class="black-box">
					<h2><em>Decorative</em> art</h2>
					<p><a href="http://www.wingitinasheville.com?decPaint"><img src="images/pic_1.jpg" width="120" height="105" alt="Pic 1" /></a></p>
					<p>Click here for decorative paintings..</p>
				</div>
				
				<div class="black-box">
					<h2><em>Creative</em> art</h2>
					<p><a href="http://www.wingitinasheville.com?fineArt"><img src="images/pic_2.jpg" width="120" height="105" alt="Pic 2" /></a></p>
					<p>Click here for fine art.</p>
				</div>
				
				<div class="black-box">
					<h2><em>Multimedia</em> art</h2>
					<p><a href="http://www.wingitinasheville.com?multComp"><img src="images/pic_3.jpg" width="120" height="105" alt="Pic 3" /></a></p>
					<p>Click here for multimedia compositions.</p>
				</div>
				
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
-->

<?php
	if (!isset($_GET['decPaint']) && !isset($_GET['fineArt']) && !isset($_GET['multComp'])) {
?>

<div id="footer" style="display:none;">
	<!--
	<h2 align="center">Silly Efrozina</h2>
	<center>
	<script type="text/javascript">
AC_FL_RunContent( 'codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0','width','460','height','345','align','middle','src','http://www.funnyjunk.com/flashplayer/video','quality','high','bgcolor','#ffffff','menu','false','pluginspage','http://www.macromedia.com/go/getflashplayer','flashvars','url=http://newmedia.funnyjunk.com/movies/www.funnyjunk.com_kitty_cat_dance.flv','movie','http://www.funnyjunk.com/flashplayer/video' ); //end AC code
</script><noscript><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="460" height="345" align="middle">
  
  <param name="movie" value="http://www.funnyjunk.com/flashplayer/video.swf" />
  <param name="quality" value="high" />
  <param name="bgcolor" value="#ffffff" />
  <param name="FlashVars" value="url=http://newmedia.funnyjunk.com/movies/www.funnyjunk.com_kitty_cat_dance.flv" />
  <param name="menu" value="false" />
  <embed src="http://www.funnyjunk.com/flashplayer/video.swf" width="460" height="345" align="middle" quality="high" bgcolor="#ffffff" menu="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="url=http://newmedia.funnyjunk.com/movies/www.funnyjunk.com_kitty_cat_dance.flv" /></embed>
	</object></noscript>
	</center>
	</p>
	-->
	<!--
	<div id="tips">
		<h2><em>First</em> section</h2>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse metus. Nunc at velit a erat dapibus ullamcorper. Mauris posuere lacus et libero.</p>
		<p class="more"><a href="#">More</a></p>
	</div>
	<div id="choose">
		<h2><em>Second</em> section</h2>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse metus. Nunc at velit a erat dapibus ullamcorper. Mauris posuere lacus et libero.</p>
	</div>
	-->
</div>
<?php } ?>

<div class="clear"></div>
<br /><br /><br /><br />
<div id="copyright">
	<br />Contact me at <a href="mailto:jenniewing@charter.net?subject=Wingit%20In%20Asheville" style="color: #8888FF; font-weight: bold;">jenniewing@charter.net</a>
	<br />Copyright &copy;2008 Wingit
	<br /><a href="http://portfolio.13willows.com/">Website designed by 13 Willows</a>
</div>

<?php
function getFilename($fullname, $ext = false) {
	if ($ext == true) {
		if (strrpos($fullname, '/') === false) {
			return $fullname;
		} else {
			return substr($fullname, strrpos($fullname, '/')+1);
		}
	} else {
		if (strrpos($fullname, '/') === false) {
			$tmp = $fullname;
		} else {
			$tmp = substr($fullname, strrpos($fullname, '/')+1);
		}
		return substr($tmp, 0, strrpos($tmp, '.'));
	}
}

function blankPic() {
	echo '<div class="black-box"><p><img src="pictures/blank.jpg"></p></div>';
}
?>

</body>
</html>