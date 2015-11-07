<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
<head> 
<title><?php echo copyrightTitle();?></title>

<!--[if IE 9]>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8"> 
<![endif]--> 

<!--[if lt IE 9]>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"> 
<![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="">
<meta name="description" content="">
<script type="text/javascript" src="includes/lang.js.php"></script>
<script type="text/javascript" src="js/functions.js"></script>

<link type="text/css" rel="stylesheet" href="templates/<?php echo $CONFIG['template'];?>/style.css">

<style type="text/css">

.loginContainer
{
	margin: 0 0 0 0; 
	padding: 0px 10px 0px 10px; 
	border: 0px solid #84B2DE;
	height: 625px;
	width: 800px;
	margin: 0 auto;
}

.loginTop
{
	margin: 50px 0 0px -10px; 
	padding: 2px 2px 2px 2px; 
	height: 60px;
	width: 800px;
	background-image: url('templates/<?php echo $CONFIG['template'];?>/images/logo.png');
	background-repeat: no-repeat;
}

.loginLeft
{
	margin: 10px 0 0 0; 
	padding: 2px 2px 2px 2px; 
	/* border: 1px solid #84B2DE; */
	/* background-color: #FFFFFF; */
	height: 380px !important;
	height: 428px;
	width: 528px;
	text-align: left;
	display: inline;
	float: left;
}

.loginRight
{
	margin: 10px 0 0 0; 
	padding: 2px 2px 2px 2px; 
	border: 0px solid #84B2DE;
	/* background-color: #FFFFFF; */
	height: 380px;
	width: 260px;
	text-align: center;
	display: inline;
	float: right;
}

.loginSubmit
{
	height: 24px;
	width: 140px;
	color: #FFFFFF;
	cursor: pointer;
	font-weight: bold;
	background-image: url('templates/<?php echo $CONFIG['template'];?>/images/loginbutton.gif');
	background-repeat: no-repeat;
}

.loginInput
{
	height: 14px;
	width: 140px;
	border: 1px solid #CCCCCC;
}

.loginSelect
{
	height: 20px;
	width: 140px;
	border: 1px solid #CCCCCC;
}

.loginUserTable
{
	text-align: left; 
	color: #84B2DE;
	width: 100%;
}

.loginUserTableHeader
{ 
	background-color: #EDF1FA;
	font-weight: bold;
	font-size: 13px;
	height: 20px;
}

.loginUserLatestNews
{
	color: #000000;
	min-height: 100px;
}

.copyright
{
	padding-top:50px;
	text-align: center;
	color: #84B2DE;
	font-size: 12px;
}

.copyright A:link {text-decoration: none; color: #84B2DE;}
.copyright A:visited {text-decoration: none; color: #84B2DE;}
.copyright A:active {text-decoration: none; color: #84B2DE;}
.copyright A:hover {text-decoration: underline; color: #84B2DE;}

.link A:link {text-decoration: none; color: #84B2DE;}
.link A:visited {text-decoration: none; color: #84B2DE;}
.link A:active {text-decoration: none; color: #84B2DE;}
.link A:hover {text-decoration: underline; color: #84B2DE;}

</style>

</head> 
<body id="body" class="body" style="text-align: center;">

<?php if($loginError){?>
	<div class="welcomeMessage" style="position: fixed; top: 0px; z-index: 100; width: 100%;"><?php echo $loginError;?></div>	
<?php }?>

<div id="loginContainer" class="loginContainer">

	<div id="loginTop" class="loginTop"></div>

	<div id="loginRight" class="loginRight">

		<form style="height:210px;" method="post" action="index.php" name="doLogin">
		<input type="hidden" name="login" value="1">
		<table class="loginUserTable">
		<tr class="loginUserTableHeader"><td colspan="2"><span style="float:left">:: <?php echo C_LANG112;?></span><span class="link" style="float:right"><a href="javascript:void(0);" onclick='showInfoBox("online","300","320","100","templates/default/online.php","");'><?php echo C_LANG113;?></a>: <?php echo getUsersOnline('1');?>&nbsp;</span></td></tr>
		<tr><td>&nbsp;</td><td><?php if($CONFIG['guestMode']){?><input class="" type="checkbox" name="isGuest" value="1" onclick="toggleLoginPass()"><?php echo C_LANG114;?><?php }?>&nbsp;</td></tr>
		<tr><td><?php echo C_LANG54;?></td><td><input class="loginInput" type="text" name="userName" value="" maxlength="16" autocomplete="off"></td></tr>
		<tr id="pass"><td><?php echo C_LANG115;?></td><td><input class="loginInput" type="password" name="userPass" value="" autocomplete="off"></td></tr>
		<tr id="lostpass"><td>&nbsp;</td><td><span class="link"><a href="javascript:void(0);" onclick='showInfoBox("lost","170","310","200","templates/default/lost.php","");'><?php echo C_LANG116;?></a></span></td></tr>
		<tr><td><?php echo C_LANG117;?></td><td>

			<select name="roomID" class="loginSelect">
				<?php echo getUserRooms();?>
			</select>

		</td></tr>
		<tr><td><?php echo C_LANG118;?></td><td>

			<select name="langID" class="loginSelect">
				<?php echo showLang();?>
			</select>

		</td></tr>
		<tr><td><?php echo C_LANG119;?></td><td>

			<select name="genderID" class="loginSelect">
				<?php echo getUserGenders('0');?>
			</select>

		</td></tr>
		<tr><td>&nbsp;</td><td><input type="image" height="24" width="140" src="templates/default/images/login.gif" name="newLogin" value="<?php echo C_LANG122;?>"></td></tr>
		<tr><td colspan="2">&nbsp;</td></tr>
		</table>
		</form>

		<br>

		<form method="post" action="index.php" name="doReg">
		<input type="hidden" name="reg" value="1">
		<table class="loginUserTable">
		<tr class="loginUserTableHeader"><td colspan="2">:: <?php echo C_LANG120;?></td></tr>
		<tr><td><?php echo C_LANG54;?>*</td><td><input class="loginInput" type="text" name="rUsername" value="" autocomplete="off"></td></tr>
		<tr><td><?php echo C_LANG115;?>*</td><td><input class="loginInput" type="password" name="rPassword" value="" autocomplete="off"></td></tr>
		<tr><td><?php echo C_LANG121;?>*</td><td><input class="loginInput" type="text" name="rEmail" value="" autocomplete="off"></td></tr>
		<tr><td>&nbsp;</td><td><input class="" type="checkbox" name="terms" value="1"><span class="link"><a href="javascript:void(0);" onclick='showInfoBox("terms","400","600","100","templates/default/terms.php","");'><?php echo C_LANG123;?></a></span></td></tr>
		<tr><td>&nbsp;</td><td><input type="image" height="24" width="140" src="templates/default/images/register.gif" name="newRegister" value="<?php echo C_LANG124;?>"></td></tr>
		</table>
		</form>

		<div class='copyright'>
			<!--<?php echo copyrightFooter();?>-->
		</div>

	</div>

	<div id="loginLeft" class="loginLeft">

		<table class="loginUserTable">
		<tr class="loginUserTableHeader"><td colspan="2">:: <?php echo C_LANG125;?></td></tr>
		<tr class="loginUserLatestNews"><td colspan="2"><?php echo getLoginNews();?><br><br></td></tr>
		</table>

		<div id="latestMembers"></div>
	</div>

</div>

<div id="oInfo" class="oInfo"></div>

</body>
</html>