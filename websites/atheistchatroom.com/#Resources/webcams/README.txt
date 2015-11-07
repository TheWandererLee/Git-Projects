== Details =============================================================================

Plugin: Audio/Video
Version: V3.0.19911
Software: Pro Chat Rooms
Developer: Pro Chat Rooms
Url: http://prochatrooms.com
Support: http://community.prochatrooms.com

========================================================================================

== Information =========================================================================

Pro Chat Rooms is NOT free software - For more details visit, http://www.prochatrooms.com
This software and all of its source code/files are protected by Copyright Laws. 
The software license permits you to install this software and/or plugin on one domain only.
Pro Chat Rooms is unable to provide support if this software is modified by the end user. 

========================================================================================

== Installation ========================================================================

## Webcam Plugin

Upload the folder 'webcams' to inside the plugins folder (eg. plugins/webcams)

========================================================================================

Open the file 'templates/YOUR-STYLE/main.php' and between the <head> and </head> tags add this,

<!-- Webcam Plugin -->
<script type="text/javascript" src="plugins/webcams/js/functions.js"></script>

========================================================================================

Scroll down until you see, 

<body id="body" class="body" onload="initAll();">

========================================================================================

Replace with,

<body id="body" class="body" onload="initAll();showCam();">

========================================================================================

For configuring your flash server, please read the README.txt file in the Servers folder.


========================================================================================

Open the file 'webcams/settings.xml and enter your details,

<!-- Enter your client area username -->
<licence>clientAreaUsername</licence>
	
<!-- Enter your RTMP Server Details -->
<rtmpType>rtmp</rtmpType>
<serverURL>www.yoursite.com</serverURL>
<applicationID>applicationFolderName</applicationID>

========================================================================================

Login to the chat room admin area and enable the webcam plugin,

Admin Area > Settings > webcamsOn > On

========================================================================================
