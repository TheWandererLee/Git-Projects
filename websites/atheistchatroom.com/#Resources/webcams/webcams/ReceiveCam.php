<?php

include("../../includes/ini.php");
include("../../includes/session.php");
include("../../includes/db.php");
include("../../includes/functions.php");

if(!$_SESSION['username'])
{
	die("access denied");
}

if(!validStreamID($_GET['sID']))
{
	die("access denied");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0014)about:internet -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">	

    <head>
        <title></title>
        <meta name="google" value="notranslate">         
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <style type="text/css" media="screen"> 
			html, body	{ height:100%; }
			body { margin:0; padding:0; overflow:auto; text-align:center; 
			       background-color: #ffffff; }   
			object:focus { outline:none; }
			#flashContent { display:none; }
        </style>
        
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
        <!--script type="text/javascript" src="js/swfobject.js"></script-->
        <script type="text/javascript">
            var flashvars = {};
            flashvars.assets = "templates/prochatrooms";
            flashvars.streamName = "<?php echo $_GET['sID'];?>";
            flashvars.settingsFile = "settings";
            
            var params = {};
            params.quality = "high";
            params.bgcolor = "#ffffff";
            params.allowscriptaccess = "sameDomain";
            params.allowfullscreen = "true";
            params.wmode = "transparent";
            
            var attributes = {};
            attributes.id = "ReceiveCam";
            attributes.name = "ReceiveCam";
            attributes.align = "middle";
            
            <!-- Setup the SWF Object. -->
            swfobject.embedSWF("swfs/ReceiveCam.swf", "flashContent", "100%", "100%", "10.0.0",
                               "swfs/playerProductInstall.swf", flashvars, params, attributes);
            
            <!-- JavaScript enabled so display the flashContent div in case it is not replaced with a swf object. -->
            swfobject.createCSS("#flashContent", "display:block;text-align:left;");
        </script>
    
    </head>
    <body>
        
        <div id="flashContent"></div>
        	    
   </body>
</html>