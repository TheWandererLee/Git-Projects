<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Doran's Transmissions</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery.nivo.slider.pack.js"></script>
<link href="styles/nivo-slider.css" rel="stylesheet" type="text/css" media="all" />
<link href="styles/main.css" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-389885-15']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>

<div id="logo"></div>
<div id="body">
	<div id="navigation">
    	<ul>
        	<li><a href="?page=home"><input type="image" src="images/nav/home.png" onmouseover="this.src='images/nav/home2.png'" onmouseout="this.src='images/nav/home.png'" alt="Home" /></a></li>
            <li><a href="?page=services"><input type="image" src="images/nav/services.png" onmouseover="this.src='images/nav/services2.png'" onmouseout="this.src='images/nav/services.png'" alt="Services" /></a></li>
            <li><a href="?page=gallery"><input type="image" src="images/nav/gallery.png" onmouseover="this.src='images/nav/gallery2.png'" onmouseout="this.src='images/nav/gallery.png'" alt="Gallery" /></a></li>
            <li><a href="?page=location"><input type="image" src="images/nav/location.png" onmouseover="this.src='images/nav/location2.png'" onmouseout="this.src='images/nav/location.png'" alt="Directions" /></a></li>
            <li><a href="?page=about"><input type="image" src="images/nav/about.png" onmouseover="this.src='images/nav/about2.png'" onmouseout="this.src='images/nav/about.png'" alt="Contact" /></a></li>
            <li><a href="?page=contact"><input type="image" src="images/nav/contact.png" onmouseover="this.src='images/nav/contact2.png'" onmouseout="this.src='images/nav/contact.png'" alt="About" /></a></li>
        </ul>
    </div><div class="clear"></div>
    
    <?php if($_REQUEST['page'] == "services") { ?>
    
    	<h1>Services We Offer</h1>
	<div style="width: 100%; height: 282px; overflow: auto">
	    <table class="services"><tr><td>
	    <ul>
		    <li>Battery, Charging and Starting Systems</li>
		    <li>Belts & Hoses</li>
		    <li>Brake Repair</li>
	    </ul>
	    </td><td>
	    <ul>
		    <li>Clutch Service & Repair</li>
		    <li>Cooling Systems</li>
		    <li>Differential Service & Repair</li>
	    </ul>
	    </td><td>
	    <ul>
		    <li>Domestic Auto Repair</li>
		    <li>Drivetrain Service & Repair</li>
		    <li>Electrical System Repair</li>
	    </ul>
	    </td><td>
	    <ul>
		    <li>Emission System</li>
		    <li>Engine Repair</li>
		    <li>Exhaust System</li>
	    </ul>
	    </td></tr><tr><td>
	    <ul>
		    <li>Filters / Fluids</li>
		    <li>Fuel System</li>
		    <li>HVAC - Heating, Ventilation, and Air Conditioning</li>
	    </ul>
	    </td><td>
	    <ul>
		    <li>Import / Foreign Auto Repair</li>
		    <li>Lighting &amp; Wipers</li>
		    <li>RV & Motorhome Repair</li>
	    </ul>
	    </td><td>
	    <ul>
		    <li>Suspension and Steering</li>
		    <li>Transmission Service & Repair</li>
	    </ul>
	    </td><td>
	    <ul>
		    <li>Domestic</li>
		    <li>Foreign</li>
		    <li>Automatic</li>
		    <li>Standard</li>
	    </ul>
	    </td></tr></table>
	    
	    <div style="margin: 8px 0;">
		<div style="clear:both;width:100%;background:#CCC;height:1px;margin:4px 0;"></div>
		Stop by <a href="location">our shop</a> and we will be happy to take care of your transmission repairs the <b>right</b> way.
		<div style="clear:both;width:100%;background:#CCC;height:1px;margin:4px 0;"></div>
	    </div>
	    
	    <br/>
	    <span style="font-weight: bold; text-decoration: underline">First Steps to Troubleshooting Your Problem...</span>
	    <br /><ul>
		<li>Is your overdrive light stuck on or flashing?</li>
		<li>Is your transmission temperature light on or flashing?</li>
		<li>Is your check engine light on?</li>
		<li>Is your transmission not shifting properly?</li>
		<li>Do you feel slips or erratic shifting?</li>
		<li>Do you feel harsh engagements when shifting from park into gear?</li>
	    </ul>
	    <br /><br /><span style="font-weight: bold; text-decoration: underline">Possible Solutions to Your Problem...</span>
	    <br /><ul>
		    <li>Check your fluid levels</li>
		    <li>Poor engine performance could be causing your problems</li>
		    <li>You could have a Torque Converter problem</li>
		    <li>You could also have an electrical problem such as speed sensor or neutral switch</li>
		    <li>Safety switch malfunction</li>
		    <li>Or it may be as simple as your car just needing a band adjustment in your transmission or simple servicing of your transmission</li>
	    </ul>
	</div>
    <?php } elseif($_REQUEST['page'] == "gallery") { ?>
	<div class="gallery" style="margin:-4px auto 0;width:100%;height:320px;overflow:auto;text-align:center;">
	    <?php
		$path="images/gallery/";
		if (is_dir($path."thumbs/")) {
		    $dir=opendir($path."thumbs/");
		  
		    do {
			$current = readdir($dir);
			if ($current != "." && $current != ".." && $current !== false) {
			    echo '<a href="'.$path.'large/'.$current.'"><img src="'.$path.'thumbs/'.$current.'" border="1"></img></a>';
			}
		    } while ($current !== false);
		    closedir($dir);
		}
	    ?>
	</div>
    <?php } elseif($_REQUEST['page'] == "location") { ?>
	<div style="margin: 0 auto; width: 100%; text-align: center">
		<iframe width="800" height="296" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Dorans+Transmissions,+Shallotte,+NC&amp;aq=&amp;sll=33.977967,-78.372388&amp;sspn=0.005863,0.011362&amp;vpsrc=6&amp;ie=UTF8&amp;hq=Dorans+Transmissions,&amp;hnear=Shallotte,+Brunswick,+North+Carolina&amp;ll=33.976526,-78.373674&amp;spn=0.007257,0.026759&amp;t=h&amp;layer=c&amp;cbll=33.979036,-78.370687&amp;panoid=ouq3YyHYl1PVU1WP6WQGcw&amp;cbp=12,145.84,,0,1.11&amp;output=svembed"></iframe>
		<br /><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=dorans+transmissions,+shallotte&amp;aq=&amp;sll=33.977967,-78.372388&amp;sspn=0.005863,0.011362&amp;vpsrc=6&amp;ie=UTF8&amp;hq=dorans+transmissions,&amp;hnear=Shallotte,+Brunswick,+North+Carolina&amp;ll=33.976526,-78.373674&amp;spn=0.007257,0.026759&amp;t=h&amp;layer=c&amp;cbll=33.979036,-78.370687&amp;panoid=ouq3YyHYl1PVU1WP6WQGcw&amp;cbp=12,145.84,,0,1.11">View Larger Map / Get Directions</a>
	</div>
    <?php } elseif($_REQUEST['page'] == "about") { ?>
	<h1>Who We Are</h1>
	<img src="images/gallery/4.jpg" alt="Dorans Transmissions Staff" style="float: right" />&nbsp;&nbsp;&nbsp;&nbsp;Dorans Transmissions is a Brunswick County based transmission shop dedicated to take the hassle of transmission repairs off your shoulders at an affordable price.
	<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;We provide services ranging from older straight drive manual transmissions to many modern automatic builds. As one of the leading transmission repair companies in the Brunswick County area, Dorans Transmissions promises to all of our customers in the Shallotte, Wilmington, Leland, Southport, Calabash, Ocean Isle, Holden Beach and Supply community that we will not remove a transmission from a vehicle in order to complete a repair unless it is absolutely necessary.
	<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;In addition, our shop pledges to diagnose transmission problems for all of our local and surrounding area customers with utmost integrity and expertise. Our shop strives to provide courteous, prompt service to all who visit our automotive transmission repair facility with the hope that you will come back to us for all your future automotive transmission repair needs.
    <?php } elseif($_REQUEST['page'] == "contact") { ?>
    	<h1>Doran's Transmissions</h1>
        160-5 Shallotte Crossing Pkwy.
        <br />Shallotte, NC 28470
        <br />For driving directions, <a href="location">click here</a>
        
        <br /><br /><br /><br /><a href="tel:19107557600"><img src="images/tel.png" style="vertical-align:middle;padding-right:16px" />(910) 755-7600</a>
        
        <br /><br /><a href="mailto:brian@doranstransmissions.com"><img src="images/mail.png" style="vertical-align:middle;padding-right:16px" />brian@doranstransmissions.com</a>
    <?php } else { ?>
        <div id="slider-wrapper">
            <div id="slider" class="nivoSlider">
                <img src="images/gallery/1.jpg" alt="" />
                <a href="#"><img src="images/gallery/2.jpg" alt="" title="#htmlcaption" /></a>
                <img src="images/gallery/3.jpg" alt="" title="" />
                <img src="images/gallery/4.jpg" alt="" />
                <img src="images/gallery/5.jpg" alt="" />
                <img src="images/gallery/6.jpg" alt="" />
                <img src="images/gallery/7.jpg" alt="" />
                <img src="images/gallery/10.jpg" alt="" />
                <img src="images/gallery/11.jpg" alt="" />
                <img src="images/gallery/12.jpg" alt="" />
            </div>
            <div id="htmlcaption" class="nivo-html-caption">
                <strong>Doran's Transmissions</strong> is an example of the <em>best</em> <a href="#">transmission services</a> in the Shallotte area.
            </div>
        </div>
	<h1>Doran's Transmissions</h1>
        <br />Are your gears grinding? Is your clutch on its last legs? Has your transmission given up the ghost? There is one Shallotte transmission shop that can meet all of your transmission-related needs with efficiency and thorough professionalism: Doran's Transmission Service. 
        <br /><br />We provide complete transmission repair, and we rebuild all makes and models. Our knowledgeable mechanics can analyze your auto's symptoms, diagnose its problems, propose an accurate estimate, and execute swift repairs that will get you promptly back on the road. When you come to us, you can rest assured you're doing business with the best! 
        <br /><br />We belong to the ATSG and the Better Business Bureau, so you know we uphold high standards regarding ethical conduct and straightforward business practices.
    <?php } ?>
</div>
<div id="footer">
	<div class="leftFoot">Copyright &copy;2011</div>
	<div class="midFoot"><a href="sitemap.xml">Sitemap</a></div>
	<div class="rightFoot"><a href="http://www.13willows.com/">Website Design</a> by 13 Willows</div>
    <!--Email: <a href="mailto:brian@doranstransmissions.com">brian@doranstransmissions.com</a>--></div>
</div>


<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider();
});

if (document.images)
{
  preload_image_object = new Image();
  // set image url
  image_url = new Array();
  image_url[0] = "images/nav/home.png";
  image_url[1] = "images/nav/services.png";
  image_url[2] = "images/nav/gallery.png";
  image_url[3] = "images/nav/location.png";
  image_url[4] = "images/nav/about.png";
  image_url[5] = "images/nav/contact.png";

   var i = 0;
   for(i=0; i<=5; i++) 
	 preload_image_object.src = image_url[i];
}
</script>
</body>
</html>