<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Volunteer rescue squad located in Brunswick County, North Carolina" />
<meta name="keywords" content="coastline, rescue squad, volunteer, EMS, EMT, intermediate, ambulance, emergency medical services" />
<title>Coastline Volunteer Rescue Squad</title>

<link href="styles/main.css" type="text/css" rel="stylesheet" media="all" />
<script type="text/javascript" src="scripts/main.js"></script>
<script type="text/javascript">
<!--
/* Google Analytics Tracking Code */
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-389885-13']);
_gaq.push(['_trackPageview']);

(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
//-->
</script>
</head>
<body>

<div class="title">
    <div class="titleImage">
    	<noscript><div id="titleImage" style="display: block;"><img src="images/title.gif" /></div></noscript>
    	<script type="text/javascript">document.write('<div id="titleImage"><img src="images/title.gif" /></div>');</script>
    </div>
</div>

<div class="body">
	<div class="header"></div>
    <div class="container">
        <div class="navigation">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="#">Our Team</a></li>
                <li><a href="#">Resources</a></li>
                <li><a href="?p=contact">Contact</a></li>
            </ul>
        </div>
        <div class="content">
        	<?php if ($_REQUEST['p'] == "contact") { ?>
            	Email: <a href="mailto:info@coastlinerescuesquad.com">info@coastlinerescuesquad.com</a>
                <br /><br />Phone: (910) 842-2266
                <br /><br />Address (Non-Mailing):
                <br />3027 Holden Beach Rd. SW
                <br />Supply, NC 28462
                <br /><br /><a href="http://www.facebook.com/pages/Coastline-Volunteer-Rescue-Squad-Inc/142041199142463"><img src="images/facebook.png" /> Follow our facebook group</a>
            <?php } else { ?>
                Welcome to the home of <a href="#">Coastline Volunteer Rescue Squad</a> located in beautiful Brunswick County NC! Founded in 1976, Coastline provides service to the communities of Supply, Holden Beach, Bolivia and Sunset Harbour. Our volunteer staff is compromised of people from all walks of life, from students to retirees. All personel are certified by the State of North Carolina Office of EMS at various levels including Medical Responder, EMT-Basic and EMT-Intermediate.
                <br /><br /><div class="image"><img width="568" height="308" src="images/ambulance.jpg" alt="Coastline Volunteer Rescue Squad Ambulance En-Route" /></div>
                <br /><br />Our Mission? To provide quality pre-hospital care to the citizens and guests of Brunswick County, North Carolina.
            <?php } ?>
        </div>
        <div class="cleared"></div>
    </div>
    <div class="foot"></div>
</div>

</body>
</html>