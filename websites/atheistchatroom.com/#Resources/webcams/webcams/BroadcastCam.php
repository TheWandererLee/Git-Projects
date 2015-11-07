<?php

include("../../includes/ini.php");
include("../../includes/session.php");
include("../../includes/db.php");
include("../../includes/functions.php");

if(!validStreamID($_SESSION['myStreamID']))
{
	die("invalid streamID");
}

// update streamID
$_SESSION['myStreamID'] = streamID();

// update user
updateUser();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0014)about:internet -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">	
    <head>
        <title></title>

        <style type="text/css" media="screen">  
			html, body	{ height:100%; }
			body { margin:0; padding:0; overflow:auto; text-align:center; 
			       background-color: #ffffff; } 
			object:focus { outline:none; }
			#flashContent { display:none; }
        </style>
		 		    
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
        <!--script type="text/javascript" src="js/swfobject.js"></script-->
        <script type="text/javascript" src="../../js/XmlHttpRequest.js"></script>
        <script type="text/javascript" src="js/functions.js"></script>
        <script type="text/javascript">
            var flashvars = {};
            flashvars.assets = "templates/prochatrooms";
            flashvars.streamName = "<?php echo $_SESSION['myStreamID'];?>";
            flashvars.settingsFile = "settings";
            
            var params = {};
            params.quality = "high";
            params.bgcolor = "#ffffff";
            params.allowscriptaccess = "sameDomain";
            params.allowfullscreen = "true";
            params.wmode = "transparent";
            
            var attributes = {};
            attributes.id = "BroadcastCam";
            attributes.name = "BroadcastCam";
            attributes.align = "middle";
            
            <!-- Setup the SWF Object. -->
            swfobject.embedSWF("swfs/BroadcastCam.swf", "flashContent", "100%", "100%", "10.0.0",
                               "swfs/playerProductInstall.swf", flashvars, params, attributes);
            
            <!-- JavaScript enabled so display the flashContent div in case it is not replaced with a swf object. -->
            swfobject.createCSS("#flashContent", "display:block;text-align:left;");
        </script>
        
        <script>
            /**
             * This function finds instance of the Flash Object being Searched for. 
            */
            function flashObject(swfName)
            {
                var isIE = navigator.appName.indexOf("Microsoft") != -1;
                return (isIE) ? window[swfName] : document[swfName];
            }
            
            
            /**
             * Returns the Dom ID of the Object Requested. Used to here just in case
             * other version of this is required.
            */
            function getDomElementByID(domEID)
            {
                // Can add checking here now if wish. //
                return document.getElementById(domEID);
            }
            
            /**
             * This is called by the SWF Object to comunicate to Javascript.
             *
             * @Params  object  This is the DOM Object to be altered by the call.    
             * @Params  action  Information passed to object.
            */
            function recievedFromFlash( object, action)
            {
                switch(object)
                {
                    case "camera":
						webcamStatus(action);

						// reload window
						if(action == false)
						{
							var r = setInterval("reloadCam('0')",1000);	
						}

                        break;
                    
                    case "microphone":
                        // empty
                        break;
                    
                    default:
                }
            }

			function reloadCam(id)
			{
				var url = window.location.href.split("?");
				window.location.href=url[0]+"?viewMe="+id;
			}
        </script>
        
    </head>
    <body>

		<?php
			// show option to start cam
			if($_GET['viewMe'] != '1')
			{
				echo "<span><img style=\"cursor:pointer;\" onclick=\"reloadCam('1');\" src=\"images/mycam.gif\"></span>";
				return;

			}
		?>
        
        <div id="flashContent"></div>
	    
   </body>
</html>