<?php
//Initiate session and declare global variables
ob_start("ob_gzhandler"); session_start();

if (isset($_REQUEST['u']) && isset($_REQUEST['p']))
    if ($_REQUEST['u'] == 'webmaster@13willows.com' && $_REQUEST['p'] == 'isaias') {
            $_SESSION['email'] = 'webmaster@13willows.com'; // Email address
            $_SESSION['fname'] = 'Daryll'; // First name
            $_SESSION['mname'] = 'Lee'; // Middle name
            $_SESSION['lname'] = 'Chandler'; // Last name
            $_SESSION['dname'] = 'Daryll Chandler'; // Display name
            $_SESSION['uname'] = 'TheWandererLee'; // Username
            $_SESSION['birth'] = '11071991'; // MMDDYYYY
            $_SESSION['gender'] = 'M';
            $_SESSION['rights'] = 'admin'; // Rights. Master, Admin, Moderator, Regular, User
    } else {
            $loginError = 'up'; // logout error of User and Password	
    }
if (!empty($_REQUEST['logout'])) {
    session_unset();
    session_destroy();
}


$modulesLoaded = array();
$moduleSettings = array(
                    'drawModule'=>array('width'=>400,'height'=>216), // Larger than container will draw on page
                    'chatModule'=>array('width'=>400,'height'=>192,'top'=>24,'left'=>0),
                    'assaultModule'=>array('width'=>768,'height'=>480),
                    'rigorMortisModule'=>array('width'=>768,'height'=>480)
                    );

if (!isset($_REQUEST['page'])) { $_REQUEST['page'] = ''; } // Default page value
//error_reporting(ini_get('error_reporting') ^ E_NOTICE); // Will only show errors above NOTICE
                    
//Initiate PHP functions
function isModuleLoaded($module) { return in_array($module, $GLOBALS['modulesLoaded']); }
function loadModule($module,$arguments=false) {
    if (!$module) { return false; }
    
    global $moduleSettings, $modulesLoaded;
    
    if ($module == 'headerModule') {
        //Must specify which modules we will be loading in the body with the arguments array,
        //    this allows required javascript/css prerequisites to be loaded.
        $modulesLoaded = $arguments['modules'];
            echo '<title>'.$arguments['title'].'</title>';
            echo '<meta charset="UTF-8" />';
            //iPhone Mobile Viewport. Will lock screen, remove
            ///echo '<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />';
            //echo '<meta name="apple-mobile-web-app-capable" content="yes" />';
            //echo '<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />';
            echo '<meta http-equiv="X-UA-Compatible" content="IE=9" >'; // Keeps IE9 from going ugly mode
            echo '<link rel="icon" href="favicon.ico" type="image/x-icon" />';
            // Load static global dependancies
            echo '<link href="style/style.css" type="text/css" media="all" rel="stylesheet" charset="utf-8"/>';
            echo '<link href="style/mobile.css" type="text/css" media="mobile, screen and (max-width: 400px)" rel="stylesheet" charset="utf-8"/>';
            
            echo '<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=320.1"/>';
            echo '<meta name="apple-mobile-web-app-capable" content="yes" />';
    
            echo '<meta name="apple-mobile-web-app-status-bar-style" content="black" />';
            /*
            echo '<link rel="apple-touch-icon" href="iphon_tetris_icon.png"/>';
            echo '<link rel="apple-touch-startup-image" href="startup.png" />';
            */
            
            echo '<script src="script/main.js" type="text/javascript"></script>';
            // Load dynamic global dependancies that must not be cached.
            require("style/dynamicStyle.php");
            require("script/dynamicMain.php");
            // Load static module dependancies
            if (isModuleLoaded('drawModule')) { echo '<script src="script/draw.js"></script>'; }
            if (isModuleLoaded('chatModule')) { echo '<script src="script/chat.js"></script>'; }
            if (isModuleLoaded('assaultModule')) { echo '<script src="script/assault.js"></script>'; }
            if (isModuleLoaded('rigorMortisModule')) { echo '<script src="script/rigorMortis/rmMain.js"></script>'; }
            
            //Transpose loaded modules to javascript
            
            
            //if (isModuleLoaded('drawModule')) { echo '<script src="script/draw.js"></script>'; loadCSS('drawModule'); }
            //if (isModuleLoaded('chatModule')) { loadCSS('chatModule'); }
    } elseif ($module == 'drawModule') {
        echo '<div id="drawModule" width="'.$moduleSettings[$module]['width'].'" height="'.$moduleSettings[$module]['height'].'">';
        //echo '<div id="drawPanel"><input type="button" id="drawBtnClear" value="Clear"></div>';
        echo '<canvas id="drawModuleMain" width="'.$moduleSettings[$module]['width'].'" height="'.$moduleSettings[$module]['height'].'">Your browser does not support the &lt;canvas&gt; tag.<br>Please upgrade to the latest edition of one of these compatible browsers:<br>Google Chrome, Mozilla Firefox, Opera, Safari, IE9+</canvas>';
        echo '</div>';
    } elseif ($module == 'assaultModule') {
        echo '<div id="assaultModule" width="'.$moduleSettings[$module]['width'].'" height="'.$moduleSettings[$module]['height'].'">';
        echo '<a href="#" id="assaultModulePause"><div></div><div></div></a>';
        echo '<canvas id="assaultModuleMain" width="'.$moduleSettings[$module]['width'].'" height="'.$moduleSettings[$module]['height'].'">Your browser does not support the &lt;canvas&gt; tag.<br>Please upgrade to the latest edition of one of these compatible browsers:<br>Google Chrome, Mozilla Firefox, Opera, Safari, IE9+</canvas>';
        echo '</div>';
    } elseif ($module == 'rigorMortisModule') {
        echo '<div id="rigorMortisModule" width="'.$moduleSettings[$module]['width'].'" height="'.$moduleSettings[$module]['height'].'">';
        //echo '<a href="#" id="rigorMortisModulePause"><div></div><div></div></a>';
        echo '<canvas id="rigorMortisModuleMain" width="'.$moduleSettings[$module]['width'].'" height="'.$moduleSettings[$module]['height'].'">Your browser does not support the &lt;canvas&gt; tag.<br>Please upgrade to the latest edition of one of these compatible browsers:<br>Google Chrome, Mozilla Firefox, Opera, Safari, IE9+</canvas>';
        echo '</div>';
    } elseif ($module == 'chatModule') {
        ?>
        <div id="chatModule">
            <?php if (strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')!==false) { ?>
            <div id="chatDisconnected">
                <input type="image" class="chatButton" src="image/chatMin.png" onclick="$('chatModule').style.top = '624px';$('chatModule').style.height='16px';$('chatBtnMin').style.display=$('chatDisconnected').style.display='none';$('chatIE').style.display='block';">
                <strong style="color:#F00;">HovelChat does not currently support IE. Please use another browser.</strong><br>
                <br>Nickname:<input type="text" size="15" maxlength="15" id="chatName" disabled="">
                <br><input type="button" id="chatConnect" value="Connect" disabled="">
                <br><br>(Only alphanumeric, dashes, &amp; underscores are allowed)
            </div>
            <div id="chatIE"><strong style="color:#F00;">HovelChat disabled (Unsupported on IE)</strong></div>
            <?php } else { ?>
            <div id="chatDisconnected">
                <strong>You are not connected to the chat server.</strong>
                <br>Nickname:<input type="text" size="15" maxlength="15" id="chatName">
                <br><br><input type="button" id="chatConnect" value="Connect">
                <br><br>(Only alphanumeric, dashes, &amp; underscores are allowed)
                <br><br>If you are running Opera you must <a href="opera:config#Enable%20WebSockets">enable WebSockets</a>
            </div>
            <?php } ?>
            <div id="chatConnected">
                <div id="chatBtnMin" class="chatButton"></div><div id="chatBtn" class="chatButton"></div>
                <div id="chatArea"></div>
                <input type="button" id="chatDisconnect" value="Disconnect"><input type="text" id="chatInput" maxlength="253"><input type="button" id="chatSend" value="Send">
            </div>
        </div>
        <?php
    } elseif ($module == 'toolboxModule') {
        ?>
        <div id="toolboxModule">
            <div class="toolboxGroup">
                <span class="toolboxTitle">Containers</span>
                <table>
                    <tr><td><input type="image" alt="add" id="toolboxBtnAdd"></td><td><input type="image"></td></tr>
                    <tr><td><input type="image"></td><td><input type="image"></td></tr>
                </table>
            </div>
            <div class="toolboxGroup">
                <span class="toolboxTitle">Modules</span>
                <table>
                    <tr><td><input type="image"></td><td><input type="image"></td></tr>
                    <tr><td><input type="image"></td><td><input type="image"></td></tr>
                </table>
            </div>
            <b>Sandbox Mode</b>
        </div>
        <?php
    } else {
        echo 'Error: Attempting to load unknown module "'.$module.'".';
    }
}

/*
function loadDependancies($file) { // [DEPRECATED::USE dynamicStyle.php/dynamicMain.php] Loads in-page module-specific dynamic scripts/styles
    global $moduleSettings;
    
    switch($file) {
        case 'chatModule':
            ?>
            <style>
                #chatModule {
                    outline: 1px solid #777;
                    width: <?php echo $moduleSettings[$file]['width']; ?>px;
                    height: <?php echo $moduleSettings[$file]['height']; ?>px;
                    position: relative;
                    left: 0px; top: -<?php echo $moduleSettings[$file]['height']; ?>px;
                    text-shadow: 1px 1px 0px #000;
                }
                #chatIE { display: none; text-align: center; }
                #chatModule .chatButton { position: absolute; width: 24px; height: 22px; right: 0px; cursor: pointer; text-align: center; }
                #chatModule #chatBtnMin { right: 18px; background: url('image/chatMin.png'); }
                #chatModule #chatBtn { display: none; background: url('image/chat.png'); }
                #chatModule input { font: 12px "Courier New", monospace;  vertical-align: middle; padding:1px; text-shadow: 1px 1px 0px #000; color: #DDD; background: none; }
                #chatModule input[type="button"] { padding: 2px 8px; font-weight: bold; border: 1px solid #0C0; }
                #chatModule input[type="button"]:hover { cursor: pointer; background: #999; }
                #chatModule input#chatInput { width: 320px; height: 18px; margin-left: 12px; }
                #chatModule input#chatName { width: 128px; height: 20px; font-size: 14px; font-weight: bold; }
                #chatDisconnected { display: block; text-align: center; padding-top: 128px; }
                #chatConnected { display: none; }
                #chatArea {
                    overflow-x: hidden; overflow-y: scroll;
                    height: <?php echo ($moduleSettings[$file]['height']-24); ?>px;
                    width: 100%;
                }
                #chatArea .clientMsg { color: #AFE; }
                #chatArea .clientNote { font-style: italic; color: #3C3; }
                #chatArea .clientWarning { font-style: italic; color: #FF3; }
                #chatArea .serverNote { font-style: italic; color: #AAA; }
                #chatArea .serverWarning { font-weight: bold; color: #F33; }
                #chatArea b { color: #CCC; }
            </style>
            <?php
            break;
        case 'drawModule':
            ?>
            <script src="script/draw.js"></script>
            <style>
            #drawModule {
                
            }
            </style>
            <?php
            break;
        default:
            echo '<!--SERVER ATTEMPTED TO LOAD UNKNOWN MODULE: '.$file.'-->';
    }
}*/

?>