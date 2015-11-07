<?php require("scripts/functions.php");
if ($_POST['u'] == "admin" && $_POST['p'] == "PCadmin13") { $_SESSION['loggedIn'] = true; }
if (isset($_REQUEST['logout'])) { $_SESSION['loggedIn'] = false; session_destroy(); }

if ($_POST['opcode'] == "removeTables") {
	mysql_query("DROP TABLE 13w_settings") or $mysqlerror = mysql_error();
}
if ($_POST['opcode'] == "createTables") {
	if (mysql_query("CREATE TABLE 13w_settings(
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	name VARCHAR(255),
	value TEXT)")) {
		foreach ($settingsArray as $val) {
			mysql_query("INSERT INTO 13w_settings VALUES
			(NULL, '".$val."', NULL)") or $mysqlerror .= mysql_error().'<br />';
		}
	} else {
		$mysqlerror = mysql_error();
	}
	
	if (mysql_query("CREATE TABLE 13w_pages(
	name VARCHAR(255) NOT NULL,
	PRIMARY KEY(name),
	title VARCHAR(255),
	content TEXT)")) {
		foreach ($pagesArray as $val) {
			mysql_query("INSERT INTO 13w_pages VALUES
			('".$val."', '".$val."', NULL)") or $mysqlerror .= mysql_error().'<br />';
		}
		foreach ($subpagesArray as $val) {
			mysql_query("INSERT INTO 13w_pages VALUES
			('".$val."', '".$val."', NULL)") or $mysqlerror .= mysql_error().'<br />';
		}
	} else {
		$mysqlerror = mysql_error();
	}
}
if ($_POST['opcode'] == "websiteSettings") {
	foreach ($settingsArray as $val) {
		mysql_query("UPDATE 13w_settings SET value = '".htmlentities($_POST[$val],ENT_QUOTES)."' WHERE name = '".$val."'");
	}
}
if ($_POST['opcode'] == "websiteContent") {
	$cPage = $_POST['currentPage'];
	$cTitle = htmlentities($_POST['pnt_'.$cPage],ENT_QUOTES);
	
	$cContent = htmlentities($_POST['pc_'.$cPage],ENT_QUOTES);
	mysql_query("UPDATE 13w_pages SET title = '".$cTitle."' WHERE name = '".$cPage."'");
	mysql_query("UPDATE 13w_pages SET content = '".$cContent."' WHERE name = '".$cPage."'");
	
	//$f = fopen("pages/".$cPage.".html", "w");
	//fwrite($f, str_replace(chr(13),"\n", $_POST['pc_'.$cPage]));
	//fclose($f);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PhyllisCook.com - Administration Panel</title>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<?php if ($_SESSION['loggedIn']) { ?>
<script type="text/javascript" language="javascript">
<!--
var opcode, adminForm;
window.onload = function() {
	adminForm = document.getElementById('adminForm');
	opcode = document.getElementById('opcode');
	
	var tmp = String(Number(window.location.hash.substr(1)));
	if ("#"+tmp === window.location.hash) {
		document.getElementById('adminMenu'+tmp).style.display = "block";
		document.getElementById('adminMenu0').style.display = "none";
	}
	
	<?php
		$tmp = array_merge($pagesArray, $subpagesArray);
		echo 'pages = ['; $first=true;
        foreach ($tmp as $v) {
			echo (!$first?',':'').'"'.$v.'"';
			$first = false;
		}
		echo "]\n";
		foreach ($tmp as $v) {
			echo "\npages['".$v."'] = new Array(2);";
			echo "\npages['".$v."'][0] = document.getElementById('pn_".$v."');";
			echo "\npages['".$v."'][1] = document.getElementById('pc_".$v."');";
		}
	?>
}

function sendCode(code) {
	opcode.value = code;
	if (code == "websiteContent") {
		document.getElementById('pc_'+document.getElementById('currentPage').value).value = document.getElementById('pc_'+document.getElementById('currentPage').value).value.replace("\r","<br />");
		//alert(document.getElementById('pc_'+document.getElementById('currentPage').value).value);
	}
	adminForm.submit();
}

function showMenu(id) {
	for (i=0;i<=3;i++) {
		if (i == id) { document.getElementById('adminMenu'+String(i)).style.display = "block"; } else { document.getElementById('adminMenu'+String(i)).style.display = "none"; }
	}
	dbConfirm(false);
}
function dbConfirm(bool) {
	document.getElementById('confirm2').style.display= bool?'block':'none';
	document.getElementById('confirm1').style.display=bool?'none':'block';	
}

function resetPageView() {
	<?php
		$tmp = array_merge($pagesArray, $subpagesArray);
        foreach ($tmp as $v) {
			echo "\npages['".$v."'][0].style.display = \"none\";";
			echo "\npages['".$v."'][1].style.display = \"none\";";
		}
	?>
}
function pageChange(page) {
	resetPageView();
	pages[page][0].style.display = "inline";
	pages[page][1].style.display = "inline";
}
//-->
</script>
<?php } ?>
</head>
<body>
<div id="adminMain">
	<h1><?php echo dbReadSetting("Website_Title"); ?> Administration Panel</h1>
    <noscript><h2>***JavaScript MUST be enabled to run this menu***</h2></noscript>
    <form id="adminForm" method="post" action="admin.php<?php echo (isset($_REQUEST['debug']))?'?debug':'';?>">
    <?php if ($_SESSION['loggedIn']) { ?>
	<table class="admin">
    	<tr><td>
        	<ul>
                <li><a href="#3" onclick="javascript:showMenu(3);">Website Page Editing</a></li>
                <li><a href="#2" onclick="javascript:showMenu(2);">Website Settings</a></li>
                <li>&nbsp;</li>
                <li><a href="#1" onclick="javascript:showMenu(1);">Database Operations</a></li>
                <li><a href="?logout" style="color: #C00;">Logout</a></li>
            </ul>
        </td>
        <td style="height: 400px;">
        	<div class="menu" id="adminMenu0" style="display: block;">
            	<?php if ($_POST['opcode'] == 'websiteSettings') { echo 'Website Settings updated<br /><br />'; } ?>
                <?php if ($_POST['opcode'] == 'websiteContent') { echo 'Website Title/Content updated for page "'.$cTitle.'"<br /><br />'; } ?>
            	<b>&lt;-- Please select a menu option on the left.</b>
            </div>
        	<div class="menu" id="adminMenu1">
            	<b><font style="color: #F00;">WARNING:</font> Functions in this section could destroy the website.</b>
                <br />Please leave unless you were instructed to use this area.
        		<br />&nbsp;
                <div id="confirm1" style="display: block;">
                	<br /><input type="button" value="   I'll be careful, continue on.   " onclick="dbConfirm(true);" />
                </div>
                <div id="confirm2" style="display: none;">
                <table>
                    <tr><td><input type="button" value="CREATE NEW DB Tables" onclick="sendCode('createTables');"/></td><td class="sep"></td><td style="text-align: right;"><input type="button" style="color: #F00;" value="REMOVE ALL DB Tables" onclick="if(confirm('Are you sure you want to REMOVE ALL database tables?\nAll website settings and content will be erased and non-restorable without a backup.')) { sendCode('removeTables'); }" /></td></tr>
                    <tr><td colspan="2">13w_settings Table Exists:
                    <?php echo dbTableExists("13w_settings") ? '<b style="color:#0C0;">Yes</b>' : '<b style="color:#F00;">No</b>'; ?>
                    </td><td colspan="1">13w_pages Table Exists:
                    <?php echo dbTableExists("13w_pages") ? '<b style="color:#0C0;">Yes</b>' : '<b style="color:#F00;">No</b>'; ?>
                    </td></tr>
                    <tr><td colspan="3">
                    <?php
                    $result = mysql_query("SELECT * FROM 13w_settings WHERE id IS NOT NULL");
                    echo "Table Contents [13w_settings]:<br /><textarea disabled>";
                    do {
                        $tmp = @mysql_fetch_array($result);
                        if (!empty($tmp)) { echo $tmp['id'] . ') ' . $tmp['name'] . ': ' . $tmp['value'] . "\n"; }
                    } while (!empty($tmp));
                    echo "</textarea>";
                    ?>
                    </td></tr>
                    <tr><td colspan="3">
                    <?php
                    $result = mysql_query("SELECT * FROM 13w_pages WHERE name IS NOT NULL");
                    echo "Table Contents [13w_pages]:<br /><textarea disabled>";
                    do {
                        $tmp = @mysql_fetch_array($result);
                        if (!empty($tmp)) { echo $tmp['name'] . ': "' . $tmp['title'] . '" ' . (empty($tmp['content'])?'Does Not Contain Data':'Contains Data') . "\n"; }
                    } while (!empty($tmp));
                    echo "</textarea>";
                    ?>
                    </td></tr>
                    </table>
                    <br />Database connection info can be modified in "scripts/functions.php" file.
                </div>
            </div>
            <div class="menu" id="adminMenu2">
            	<b>Website Settings</b>
                <br />&nbsp;
                <table class="settings">
                <?php
					foreach($settingsArray as $val) {
						echo '<tr><td>'.$val.':</td><td class="sep"></td><td><input type="text" id="'.$val.'" name="'.$val.'" value="'.dbReadSetting($val).'" /></td></tr>';
					}
				?>
                </table>
                <input type="button" value="Save" onclick="sendCode('websiteSettings');" style="margin-top: 8px; width: 128px;" <?php echo dbTableExists("13w_settings")?"":"disabled"; ?> />
            </div>
            <div class="menu" id="adminMenu3">
            	<table class="pages">
                <tr><td>
                    Select Page: <select name="currentPage" id="currentPage" onchange="pageChange(this.value);">
                        <?php
                        foreach ($pagesArray as $v) {
                            echo "\n".'<option value="'.$v.'" style="background: #F66;">'.dbReadTitle($v).'</option>';
                        }
						foreach ($subpagesArray as $v) {
                            echo "\n".'<option value="'.$v.'" style="background: #CCF;">'.dbReadTitle($v).'</option>';
                        }
                        ?>
                    </select>
                </td><td>
                	Page Title:
                    <?php
						$tmp = array_merge($pagesArray, $subpagesArray);
						$first = true;
                        foreach ($tmp as $v) {
                            echo "\n".'<div id="pn_'.$v.'" class="pageTitle"'.($first?' style="display: inline;"':'').'><input type="text" name="pnt_'.$v.'" id="pnt_'.$v.'" value="'.dbReadTitle($v).'"></div>';
							$first = false;
                        }
                    ?>
                    <div style="float: right;"><input type="button" value="  Save Changes  " onclick="sendCode('websiteContent');" /></div>
                </td></tr>
                <tr><td colspan="2">Pages in the select field with a<b style="background: #F66;"> red </b>background are navigation only pages. Editing these could cause navigational errors.</td></tr>
                <tr><td colspan="2">
                	<?php $first=true; foreach ($tmp as $v) {
                		echo "\n".'<textarea class="pageContent" id="pc_'.$v.'" name="pc_'.$v.'"'.($first?' style="display: block;"':'').'>';
                    	
						echo dbReadPage($v);
						
						//if (!file_exists("pages/".$v.".html")) { $f = fopen("pages/".$v.".html", "w"); fwrite($f, ""); fclose($f); }
						//echo file_get_contents("pages/".$v.".html");
                    	echo '</textarea>';
						$first = false;
                    } ?>
                </td></tr></table>
            </div>
        </td></tr>
    </table>
    <?php } else { ?>
	<table class="login">
    	<tr><td>Username:</td><td><input type="text" name="u" size="15" /></td></tr>
        <tr><td>Password:</td><td><input type="password" name="p" size="15" /></td></tr>
        <tr><td colspan="2" style="text-align: center;"><input type="submit" value="Login" style="padding: 2px 32px;" /></td></tr>
        <tr><td colspan="2" style="text-align: center;"><a href="index.php">Click Here to Go Back to phylliscook.com/index.php</a></td></tr>
        <tr><td colspan="2" style="padding-top: 64px; text-align: center; font-weight: bold; font-size: 18px;">Looking for the <a href="blog/wp-admin">Blog Admin Page</a>?</td></tr>
    </table>
	<?php } ?>
    <input type="hidden" id="opcode" name="opcode" value="" />
    </form>
</div>
<div id="adminFooter">
    <div>
    	<?php
        if ($_SESSION['loggedIn']) {
			if (!empty($mysqlerror)) { echo '<font style="color: #F00;">!!! MySQL Error: ' . $mysqlerror . ' !!!</font><br />'; }
        	echo 'Last operation done: ' . $_POST['opcode'];
			echo '<br /><br />';
		}
		?>
    	<a href="http://www.13willows.com">13 Willows</a> Admin Panel
        <br />Status: <?php echo $_SESSION['loggedIn'] ? "Logged In" : "Not Logged In"; ?>
    </div>
</div>
</body>
</html>