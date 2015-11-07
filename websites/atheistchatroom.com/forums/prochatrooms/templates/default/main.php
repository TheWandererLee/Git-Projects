<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
<head> 
<title><?php echo copyrightTitle();?></title>
<!-- Share Files Plugin -->

<script type="text/javascript">var share = 1;</script>
<!--[if IE 9]>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8"> 
<![endif]--> 

<!--[if lt IE 9]>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"> 
<![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link type="text/css" rel="stylesheet" href="templates/<?php echo $CONFIG['template'];?>/style.css"> 
<script type="text/javascript" src="includes/lang.js.php"></script>
<script type="text/javascript" src="includes/settings.js.php"></script>
<script type="text/javascript" src="js/XmlHttpRequest.js"></script>
<script type="text/javascript" src="js/cookie.js"></script>
<script type="text/javascript" src="js/divLayout.js"></script>
<script type="text/javascript" src="js/message.js"></script>
<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript" src="js/private.js"></script>
<script type="text/javascript" src="js/userlist.js"></script>
<script type="text/javascript" src="js/newRoom.js"></script>
<script type="text/javascript" src="js/divDrag.js"></script>
<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript" src="js/playSnd.js"></script>

<!-- Intellibot -->
<script type="text/javascript" src="js/intellibotRes.js"></script>
<script type="text/javascript" src="js/intellibot.js.php"></script>

<!-- Webcam Plugin -->
<script type="text/javascript" src="plugins/webcams/js/functions.js"></script>

<script language="javascript" type="text/javascript">
<!--

/* user details */
var userName = '<?php echo $username;?>';
var userID = <?php echo $userid;?>;
var uID = '<?php echo $id;?>';
var userAvatar = '<?php echo $avatar;?>';
var roomOwner = <?php echo $roomOwner;?>;
var blockedList = '<?php echo $blockedList;?>';

/* room details */
var totalRooms = <?php echo $totalRooms;?>;
var roomID = <?php echo $roomID;?>;
var currRoom = <?php echo $roomID;?>;
var prevRoom = <?php echo $prevRoom;?>;
var publicWelcome = "<?php echo $roomDesc;?>";
var currentlyBroadcasting = "0";
var broadcastStartTime = 0;

/* last message ID */
var lastMessageID = <?php echo $lastMessageID;?>;

//-->
</script>

</head> 
<body id="body" class="body" onload="initAll();showCam();">

<div id="mainContainer" class="mainContainer">

	<div id="topContainer" class="topContainer"></div> 

	<div id="logoContainer" class="logoContainer"></div> 

	<div id="advertContainer" class="advertContainer"></div> 

	<div id="chatContainer" class="chatContainer" style="background-image:url('images/<?php echo $roomBg;?>');"></div>

	<img id="roomIcon" class="roomIcon" src="images/rooms.gif" alt="" onclick="newRoom('<?php if($_GET['sID']){?>0<?php }else{?>1<?php }?>');">

	<div id="roomCreate" class="roomCreate">

		<span><?php echo C_LANG129;?><input type="text" id="roomName" name="roomName" value=""></span>
		<span><?php echo C_LANG130;?><input type="text" id="roomPass" name="roomPass" value=""></span>
		<span><input type="button" name="roombutton" value="<?php echo C_LANG131;?>" onclick="addRoom();"><input type="button" name="" value="<?php echo C_LANG132;?>" onclick="newRoom('0');"></span>

	</div>

	<select id="roomSelect" class="roomSelect" onchange="changeRooms(this.value);"></select>

	<div id="userContainer" class="userContainer"></div>

	<div id="optionsContainer" class="optionsContainer">

		<div class="optionsIcons" id="optionsIcons"></div>

		<textarea class="optionsBar" id="optionsBar" rows="10" cols="5" onKeyPress="return submitenter(this,event,'optionsBar','chatContainer','');" onfocus="changeMessBoxStyle('optionsBar');"></textarea>

		<span class="optionsSelectStatus">
			<span id="uwhisperID">
				<?php echo C_LANG160;?>: <input class="whisper" type="text" id="whisperID">&nbsp;
			</span>	
			<input type="checkbox" id="autoScrollID" checked><?php echo C_LANG135;?>&nbsp;
			<span id="iconeCredits" class="iconeCredits" style="cursor:pointer;" onclick='showInfoBox("ecredits","450","600","100","templates/default/ecredits.php","");'><?php echo C_LANG109;?>: <span id="eCreditsID"></span></span>
		</span>

		<input class="optionsSend" id="optionsSend" type="button" value="<?php echo C_LANG136;?>" onclick="addMessage('optionsBar','chatContainer')">

		<?php if(!$_GET['sID']){?>
			<input class="optionsLogout" id="optionsLogout" type="button" value="<?php echo C_LANG137;?>" onclick="logout('0');">
		<?php }?>
		
		<!--<span style="position: absolute; left: 320px;">DBG|<a href="#" onclick="alert('Good Test')">T</a>|<a href="#" onclick="viewBC(currentlyBroadcasting);">ViewCam</a>|<a href="#" onclick="startBroadcast();">Start BC</a>|<a href="#" onclick="stopBroadcast();">Stop BC</a>|<span id="debugSpan13"></span></span><!-- DEBUG SPAN for webcam broadcasting functions -->
	</div>

	<div id="menuWin" class="menuWin"></div>

	<div id="settingsWin" class="settingsWin"></div>

	<div id="pWin" class="pWin"></div>

	<div id="playSndDiv"></div>

</div>

<div id="oInfo" class="oInfo"></div>

</body> 
</html>