<?php $pages = array('services','testimonials','affiliates','links','aboutus','contactus');
if (!isset($_REQUEST['page']) || !in_array($_REQUEST['page'], $pages)) { $_REQUEST['page'] = 'home'; } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="KEYWORDS" content="East Coast Moving, moving, moving services, long distance, local, interstate, intrastate, same state, short distance, relocation, storage, transferring, moving supplies, supplies, boxes, cartons, bubble wrap, moving van, brunswick county, NC, Pender county, NC, New Hanover County, NC, shallotte, myrtle beach, SC, Wilmington, NC" />
<meta name="REVISIT-AFTER" content="30 days" />
<meta name="copyright" content="© copyright 2004 - 2012 East Coast Moving, LLC. All Rights reserved." />
<meta name="verify-v1" content="U/w9hLXA9805BD6QpYXe9scxeFWEGjVrCvywCVrgutc=" />

<title>East Coast Moving, LLC</title>
<style type="text/css">
	/***RESET***/
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}
body {
	line-height: 1.2;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
/* table {
	border-collapse: collapse;
	border-spacing: 0;
} */
	/***RESET***/
body {
	margin: 0;
	background: #63BFDF url('images/bluebeachbg.jpg') center fixed;
	font-family: Arial, sans-serif;
	font-size: 16px;
	color: #000;
	/* text-shadow: 0px -1px 0px #88CCFF; */
}

@media only screen and (max-device-width: 480px) {
	body {
		background: #63BFDF;
	}
}

.tilt {
	border: 8px #FFF solid;
	-webkit-transform:rotate(-6deg);
	-moz-transform:rotate(-6deg);
	-o-transform:rotate(-6deg);
	-ms-transform:rotate(-6deg);
}

h1 { text-align: center; font-size: 28px; font-weight: bold; }
h2 { text-align: center; font-size: 20px; margin: 0; color: #060; }
h2 sup { font-size: 18px; }
h3 { font-size: 18px; font-weight: bold; margin: 0; }

a { color: #060; text-decoration: none; }
.content a { color: #040; }
a:hover { color: #393; text-decoration: underline; }
strong { font-weight: bold; color: #060; }
sup { font-size: 9px; }

#main {
	width: 960px;
	min-width: 960px;
	margin: 0 auto;
}

#header {
	margin: 16px auto 8px;
	background: url('images/title.png');
	width: 589px; height: 51px;
	position: relative;
	cursor: pointer;
}
#header img {
	position: absolute;
	left: -196px; top: -90px;
	z-index: -100;
}

ul { list-style: disc; }

#nav {
	width: 962px;
	height: 32px;
	margin: 0 auto;
	position: relative;
}
#nav ul { list-style: none; background: #555; float: right; width: 962px; height: 32px; position: absolute; right: -24px; z-index: 1000; box-shadow: inset 0 0 12px #000; }
#nav li { float: left; width: 14.28%; text-align: center; }

/* New Styles added 16August2013 for new header image, removing white background */
	#newheader {
		background: url('images/headerBox.png');
		width: 992px; height: 228px;
		margin: 8px auto -48px;
		position: relative;
	}
	#newheader h1 {
		color: #FFF;
		text-shadow: 4px 4px 0 #000;
		font-size: 66px;
		position: absolute; left: 192px; top: 24px;
		font-family: Arial, sans-serif;
	}
	#newheader h2 {
		color: #FFF;
		text-shadow: 1px 1px 0 #000;
		font-size: 22px;
		position: absolute; left: 820px; top: 146px;
		font-family: Arial, sans-serif;
		font-weight: bold;
	}
	#nav ul { right: 0px; }
	#main p, #main div {
		background: rgba(255,255,255,0.5);
		/*background: url('images/containerGradient.png') repeat-x;*/
	}
	#main div div { background: none; }
/* New Styles End */

#nav a {
	font-family: Georgia, Times New Roman, serif;
	text-decoration: none;
	font-size: 16px;
	width: 100%;
	height: 24px;
	display: inline-block;
	vertical-align: top;
	padding: 7px 0 0;
	
	text-shadow: 0 1px 0 #000;
	color: #CCC;
}
#nav a:hover {
	background: #26D; box-shadow: inset 0 0 12px #000;
	color: #FFF;
	text-decoration: underline;
}
#nav a.active {
	background: #070; box-shadow: inset 0 0 12px #000;
}
#nav img {
	width: 4px;
	height: 43px;
}

hr {
    border: 0;
    height: 1px;
    background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
    background-image:    -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
    background-image:     -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
    background-image:      -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
}

/*
#nav {
	width: 960px;
	height: 76px;
	background: #222;
	border: 2px #FFF solid;
	margin: 0 auto 24px;
}
#nav ul { width: 960px; margin: 0 auto; }
#nav li { float: left; margin: 16px 0 0; width: 14%; text-align: center; }

#nav a {
	font-family: Arial, Verdana, sans-serif;
	text-decoration: none;
	font-size: 22px;
	background: #239EC4 url('images/btn/btn01.png') repeat-x;
	height: 36px;
	display: inline-block;
	vertical-align: top;
	padding: 7px 0 0;
	color: #DDD;
}
#nav a:hover {
	height: 35px;
	padding: 8px 0 0;
	text-shadow: 0 -1px 0px #134;
	color: #ADF;
}
#nav img {
	width: 4px;
	height: 43px;
}
*/

.affiliate {
	width: 296px;
	font-size: 13px;
	float: left;
	outline: 1px solid #888;
	margin: 5px;
	padding: 4px;
}
.affiliate a { font-weight: bold; }

div.content {
	float: left;
	width: 496px;
	/* background: url('images/tile60.png') repeat;
	border-radius: 12px;
	box-shadow: 2px 2px 8px #000;
	*/
	
	padding: 8px;
	margin: 8px 0;
}
div.content:first-child {
	background: url('images/containerGradient.png') repeat-x;
}
.content-right {
	float: right;
	width: 400px;
	/* background: url('images/tile60.png') repeat;
	border-radius: 12px;
	box-shadow: 2px 2px 8px #000; */
	padding: 8px;
	margin: 8px 0;
}

#footer {
	/*background: url('images/footerbg.png');*/
	background: rgb(20,60,20);
	box-shadow: inset 0 0 12px #000;
	clear: left;
	width: 991px;
	margin: 0 auto;
	height: 200px;
	padding: 12px 0 18px;
	border-top: 3px solid #046;
	font-size: 12px;
	font-family: Arial, sans-serif;
	font-weight: bold;
	color: #ACF;
	text-shadow: none;
}

.container { width: 960px; margin: 0 auto; }
#footer .container div { width: 33%; }

.logos { float: left; }
.logos img:first-child { padding-top: 0px; }
.logos img { padding-top: 4px; }

.photo { border: 12px solid #FFF; margin: 4px; box-shadow: 2px 2px 6px #000; }

.left { float: left; }
.right { float: right; text-align: right; }
.center { margin: 0 auto; text-align: center; }
div.full { width: 944px; }

div.blank { width: 512px; height: 384px; background: transparent; border-radius: 0; padding: 0; margin: 8px 0 16px; }

</style>
<!-- Google Analytics -->
<script type="text/javascript">var _gaq = _gaq || [];_gaq.push(['_setAccount', 'UA-389885-3']);_gaq.push(['_trackPageview']);(function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery.nivo.slider.pack.js"></script>

<link href="styles/nivo-slider.css" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript">
function openVirtualTour(open) {
	if (open) {
		document.getElementById('virtualTourBox').style.visibility = 'visible';
		//document.getElementById('virtualTourBox').innerHTML = '<object style="position: absolute;left:120px;top:60px" width="720" height="360"><param name="movie" value="http://api.everyscape.com/v/1/x/viewer/everyscape_viewer.swf?xml=http://api.everyscape.com/panoviewerparams/1.x/static/720/360/vs/19100910"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://api.everyscape.com/v/1/x/viewer/everyscape_viewer.swf?xml=http://api.everyscape.com/panoviewerparams/1.x/static/720/360/vs/19100910" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="720" height="360"></embed></object>';
		document.getElementById('virtualTourBox').innerHTML = '<div style="height:24px;background:#FFF;text-align:center;"><a href="#" onclick="openVirtualTour(false)" style="font-weight: bold;color:#F00">Click here to close this Virtual Tour</a></div><object width="960" height="512"><param name="movie" value="http://api.everyscape.com/v/1/x/viewer/everyscape_viewer.swf?xml=http://api.everyscape.com/panoviewerparams/1.x/static/960/512/vs/19100910"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://api.everyscape.com/v/1/x/viewer/everyscape_viewer.swf?xml=http://api.everyscape.com/panoviewerparams/1.x/static/960/512/vs/19100910" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="960" height="512"></embed></object>';
	} else {
		document.getElementById('virtualTourBox').style.visibility = 'hidden';
		document.getElementById('virtualTourBox').innerHTML = '';
	}
}
</script>

</head>
<body>


<!--<div id="header"><img src="images/logoLime.png"></div>-->
<div id="newheader"><h1>East Coast Moving, LLC</h1><h2>(910) 755-2058</h2></div>

<div id="nav">
	<ul id="navul">
		<li><a <?php if ($_REQUEST['page'] == 'home') { echo 'class="active" '; } ?>href="/">Home</a></li>
		<li><a <?php if ($_REQUEST['page'] == 'services') { echo 'class="active" '; } ?>href="/services">Services</a></li>
		<li><a <?php if ($_REQUEST['page'] == 'testimonials') { echo 'class="active" '; } ?>href="/testimonials">Testimonials</a></li>
		<li><a <?php if ($_REQUEST['page'] == 'affiliates') { echo 'class="active" '; } ?>href="/affiliates">Affiliates</a></li>
		<li><a <?php if ($_REQUEST['page'] == 'links') { echo 'class="active" '; } ?>href="/links">Links</a></li>
		<li><a <?php if ($_REQUEST['page'] == 'aboutus') { echo 'class="active" '; } ?>href="/aboutus">About Us</a></li>
		<li><a <?php if ($_REQUEST['page'] == 'contactus') { echo 'class="active" '; } ?>href="/contactus">Contact</a></li>
	</ul>
</div>

<div id="main">
				<?php if ($_REQUEST['page'] == 'services') { ?>
	<div class="content">
		<h2 class="header">We're here to serve your every moving need:</h1>
		<hr align="center" size="1" style="width: 400px; position: relative; top: -8px;" />
		<ul style="margin-left: 24px">
			<li>Hourly Moving Services (less than 35 miles)</li>
			<li>Intrastate Moving Services (more than 35 miles within NC)</li>
			<li>Interstate Moving Services (Maine to Florida, Ohio & Georgia)</li>
			<li>Corporate Office moves</li>
			<li>Household moves</li>
			<li>Commercial & Office moves</li>
			<li>Full Service packing</li>
			<li>Single Piece Transportation Available</li>
			<li>Pianos & Grandfather Clocks</li>
			<li>Auto Transportation</li>
		</ul>
		<br />Call or e-mail us for answers to any questions you might have or to arrange for a move. We want you to be our next very satisfied customer.
	</div>
	
	<div class="blank right" style="width: 354px; height: 217px; box-shadow: 2px 2px 8px #000;">
		<img src="images/pictures/packed-van-1.jpg">
	</div>
				<?php } elseif($_REQUEST['page'] == 'testimonials') { ?>
	<div class="content full" style="text-align: justify">
		<h1 class="header">What our customers are saying...</h1>
		<hr align="center" size="1" color="#CCDDFF" style="width: 400px; position: relative; top: -8px;" />
		November 12, 2013
		<br />“Great group of guys. Very hardworking and pleasure to work with your company.”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Pat (Westchester, PA)</span>
		<hr size="1" width="684" />
		November 11, 2013
		<br />“One word: AWESOME!”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Mike (Bolivia, NC)</span>
		<hr size="1" width="684" />
		November 8, 2013
		<br />“The crew was a pleasure to work with and very professional.”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Sheri (Greenville, SC)</span>
		<hr size="1" width="684" />
		November 6, 2013
		<br />“Wonderful crew, very polite and professional, would use you in the future and will highly recommend you!”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Nick (Shallotte, NC)</span>
		<hr size="1" width="684" />
		October 30, 2013
		<br />“Great crew! They work very hard and smart!”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Charles (Southport, NC)</span>
		<hr size="1" width="684" />
		October 30, 2013
		<br />“They did a great job! Were careful, on time and cheerful! We would recommend them to everyone!”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Barbara (Santa Rosa, FL)</span>
		<hr size="1" width="684" />
		October 29, 2013
		<br />“Great job! See you again next year!”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Carolyn (Sunset Beach, NC)</span>
		<hr size="1" width="684" />
		October 29, 2013
		<br />“Did a great job! Everything looks good.”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Paul (Calabash, NC)</span>
		<hr size="1" width="684" />
		October 28, 2013
		<br />“Good job! We appreciate your help!”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Kenny (Shallotte, NC)</span>
		<hr size="1" width="684" />
		October 26, 2013
		<br />“Great job and very professional and efficient.”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Patty (Ocean Isle Beach, NC)</span>
		<hr size="1" width="684" />
		October 23, 2013
		<br />“Good job. Prompt and courteous. Good move.”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Joe (Ocean Isle Beach, NC)</span>
		<hr size="1" width="684" />
		October 21, 2013
		<br />“Great job! Everything went smoothly.”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Nancy (Myrtle Beach, SC)</span>
		<hr size="1" width="684" />
		October 10, 2013
		<br />“Kevin, Jimmy, Cary were very professional and great, tight packers! A pleasure to work with all very hard workers.”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Bill (Myrtle Beach, SC)</span>
		<hr size="1" width="684" />
		October 7, 2013
		<br />“I can’t thank you all enough. Very special people. We would recommend you to everyone. Carrie also was very good too.”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Harriet (Frenchtown, NJ)</span>
		<hr size="1" width="684" />
		October 3, 2013
		<br />“I am pleased with the team you provided. They were very professional and accommodating. It was a pleasure meeting them!”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Marilyn (Indiatlantic, FL)</span>
		<hr size="1" width="684" />
		September 28, 2013
		<br />“Kevin, Robert, and Michael were professional and friendly and took the upmost care to my personal belongings. I would call them any day to help me move. They are great!”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Kelly (Charlotte, NC)</span>
		<hr size="1" width="684" />
		September 5, 2013
		<br />“This company is fantastic! They also laid down a covering from the doorway into the house. Every piece of furniture with drawers or doors was wrapped in plastic and then covered with padding when put on the truck. The men were very careful with everything they loaded. When it was time to unload, they covered the full glass panel on the side of our front door and laid the covering on the floor again. They also took a mattress and box spring we had in a bedroom (not part of the move) and put it up into the attic for us. They went above and beyond any mover we had used previously and we have moved 12 times. I would definitely recommend them for any type of move.”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Nancy (Calabash, NC)</span>
		<hr size="1" width="684" />
		September 5, 2013
		<br />“The crew was hard working and very personable—great job.”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Don (Ocean Isle Beach, NC)</span>
		<hr size="1" width="684" />
		September 4, 2013
		<br />“They are great. Want them back when we move back in!”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Joyclynn (Shallotte, NC)</span>
		<hr size="1" width="684" />
		September 4, 2013
		<br />“Fantastic Job! Great Job! Will highly recommend!”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Greg & Nancy (Calabash, NC)</span>
		<hr size="1" width="684" />
		August 31, 2013
		<br />“I was very pleased. The guys worked hard and did a nice job.”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Lou (Ocean Isle Beach, NC)</span>
		<hr size="1" width="684" />
		August 30, 2013
		<br />“Crew did an excellent job!”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Ann (Southport, NC)</span>
		<hr size="1" width="684" />
		August 29, 2013
		<br />“Very professional and reliable service. Courteous and Friendly.”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Gerrit (Manchester, MI)</span>
		<hr size="1" width="684" />
		August 26, 2013
		<br />“Crew did a very good job, would use them again.”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Frederick (South Brunswick, NC)</span>
		<hr size="1" width="684" />
		August 24, 2013
		<br />“Awesome!”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Amy (Sunset Beach, NC)</span>
		<hr size="1" width="684" />
		August 24, 2013
		<br />“Very satisfied! Guys were great to work with would highly recommend.”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Christina (Chapell Hill, NC)</span>
		<hr size="1" width="684" />
		August 22, 2013
		<br />“Move #6 with East Coast, great job as usual!” -- “They moved our household goods from Wilmington NC to Fredericksburg VA. This is our 6th move with East Coast. Obviously a good recommendation in itself. They arrived promptly, packed our glass and granite tabletops and loaded us out of the NC house on 19th. We requested a delivery date of 22nd to our new residence in Fredericksburg and they arrived and moved us in. As always the staff were friendly and very accommodating and we can't say enough good things about them!”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Len (Fredericksburg, VA)</span>
		<hr size="1" width="684" />
		August 21, 2013
		<br />“As we moved from NJ to SC we had to do all preliminary work by phone.  Carrie was very helpful and cheerfully answered my many phone calls.  Our move was complicated.  We had furniture and boxes in our home as well as a full storage unit with things we had already packed.  Most items were packed when the movers arrived but they had to wrap all furniture and odd shapes.  They did everything quickly and professionally and it was very hot that week in Jersey.  Our storage place closed at 7PM and everything was packed and gone by 6:45PM. 
			<br />When we approximated the price of our move Carrie thought the price would be $6600, but it actually came in at $5500.  I believe interstate moves are based on final weight so this was the reason for the significant difference in price.  We have bought a lot of new furniture so we did not move all of our NJ furniture.
			<br />The movers drove up from NC the day before our move and arrived at exactly at 9AM as Carrie had told me.  When they finished our house and storage unit they said they were starting the drive back south.  They drove the next day and then loaded all of our belongings into 2 storage units in NC until we need it moved to our new house at the end of September.  We left NJ several days later and the movers brought all of our property down and packed it into 2 units that we had not seen in Calabash, SC. I had marked multiple boxes and tubs with distinctive tape and asked the men to try to keep them at the front of the units so I could access them.  When we went to the units everything I asked them to keep in front was easily accessible. 
			<br />BTW.  The woman at Calabash Storage was also great and called us during the move in day to tell us we needed another unit and took care of everything for us.  We did need 2 units for all of the things but the movers packed them TIGHTLY.  No wasted space.
			<br />We will be using this company again to move us from the storage unit to our new house and I have no qualms about the type of service we will receive. Overall—EXCELLENT company to do business with! Highly recommend!”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Patricia (North Myrtle Beach, SC)</span>
		<hr size="1" width="684" />
		August 15, 2013
		<br />“Great job!!! They did an awesome job and I highly recommend.”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Gregory (Calabash, NC)</span>
		<hr size="1" width="684" />
		August 15, 2013
		<br />“Guys were great! Good teamwork and very nice-can’t believe how they can move stuff!!! Very happy.”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Maureen (Burgaw, NC)</span>
		<hr size="1" width="684" />
		August 9, 2013
		<br />“I just wanted you to know how impressed I was with Chris and his team. They were efficient, professional and courteous and I really thought the packing and moving experience could not have been better. Thanks for your great team, they made the move effortless for us.”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Robert (Leland, NC)</span>
		<hr size="1" width="684" />
		August 9, 2013
		<br />“Your crew did am absolutely awesome job! Everything went smoothly, tell them Thanks again from the Rourk Family in West Virginia!”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Kelly (Lewisburg, VA)</span>
		<hr size="1" width="684" />
		August 3, 2013
		<br />“Most professional crew, excellent service, above and beyond”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Susan (Southport, NC)</span>
		<hr size="1" width="684" />
		July 30, 2013
		<br />“Guys were great! Good teamwork and very nice-can’t believe how they can move stuff!! Very happy.”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Maureen </span>
		<hr size="1" width="684" />
		July 26, 2013
		<br />“It was not a rushed experience, they came in and asked exactly what I wanted moved and after that it was smooth sailing. The professional moving men were easy to talk to and even laugh with. They understood my stress and helped any way to ease it, they even took a piece of furniture up to a neighbor that we could not lift on our own. The company receptionist was very nice too and checked a second time before they came to move me to make sure all was in order on her end. Totally GREAT team!!!!—There are no do's and don'ts to tell because it was a great experience, and I should know because I have moved six times in 3 years. East Coast Moving is A+ in my eyes! Thank you again for everything. :>)”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Darla </span>
		<hr size="1" width="684" />
		July 19, 2013
		<br />“As we said we moved 8 times, and your crew was the best we have had, tried to make them as comfortable as possible, tough job and it was very hot and humid, glad they appreciated it.”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — John </span>
		<hr size="1" width="684" />
		July 16, 2013
		<br />“We had a great out-of-state move thanks to the team at East Coast Movers.—the same folks that packed our belongings arrived promptly at our new home to begin unloading. They even remembered where they had packed several items!—We would definitely recommend this company. Although no move is ever easy, this one was as smooth and stress-free as possible.”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Allison </span>
		<hr size="1" width="684" />
		July 11, 2013
		<br>“Everything was proficiently and cordially handled. Great crew!”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Cathy</span>
		<hr size="1" width="684" />
		June 21, 2013
		<br>“Carrie,
		I meant to write to you sooner, but I've been distracted with all the unpacking and with setting up the new house.  Can't believe we've been here a week already.
		Chris and the crew did a fantastic job with the move.  I unpacked our last box yesterday and not a thing was broken or misplaced.  Considering he had to pack it all up, store it, and then repack it, travel down to Florida and unpack it, I expected that something would be broken or misplaced, but all was just as we left it.   They were so careful with our things and very organized.  Moving is stressful, but both you and the crew inspired confidence the whole way through.  It was a great relief to know that everything was taken care of so professionally.
		On a personal note, everything is in order in our new home and we love living in Florida, BUT we miss all our NC friends very much.
		You can share this note on any of the sites, and if anyone would like to call me about our experience with your company, I'd be glad to talk to them anytime.  Feel free to give them my phone number.
		Thank you again for making it a smooth transition."
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Susan & Gary</span>
		<hr size="1" width="684" />
		June 30, 2013
		<br>“Your crew did a great job. Looking forward to them coming back on Wednesday July 3rd to move and put our furniture back in place. We have personally recommended your service to several people, and we will post a very favorable review on at least one of the sites listed.”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Anthony & Mary Ann</span>
		<hr size="1" width="684" />
		June 15, 2012
		<br>“I want to do a direct move from one house to another and I got a quote from East Coast Movers. They are local and my husband wants to support local business. -- They price their services based on an estimate of the wait. They do have a good local storage facility by them if we need to keep a few things there. The storage place gives the moving company a good rate. Our prejudice is to go with the local stores. They have a list of about 25 people who will recommend them if we choose the use them. We got the moving company from our Realtor at Coldwell Banker.” 
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Bill</span>
		<hr size="1" width="684" />
		May 9, 2012
		<br>“They moved all our belongings to another state. They were professional and extremely courteous! They made our moving experience as pleasant as possible. I would highly recommend using this company!!! -- It went without a hit h. We moved possessions from three different sights without a mishap! Their price was great too!”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Elizabeth</span>
		<hr size="1" width="684" />
		March 16, 2012
		<br>“We contracted them to move our household possessions & furnishings from Northern Virginia to Leland, North Carolina. -- This was our 5th move with Chris & Carrie. Chris and his employees arrived at our home in Northern Virginia on February 14th to load our possessions & furnishings. We did most of our own packing. They packed heavy glass such as china hutch shelves, coffee table tops etc. We have a lot of glass! They also dismantled beds and a few pieces of furniture. They were very careful & efficient. On the 16th they delivered us to our home in Leland NC. Again they were prompt, careful and efficient. They put together everything they took apart and more. Right down to cleaning the china cabinet shelves after assembly. Very impressive job, crew & company. That is why we have returned 5 times for them to drive us about the country!”
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Christine</span>
		<hr size="1" width="684" />
		Thank you for your feedback, advice and...honesty.
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Phil</span>
		<hr size="1" width="684" />
		"My husband was also one of those folks that figured it was cheaper to do it himself until I showed him the real costs.  Sure, the truck can cost $20 a day...but the gas at 6 miles per gallon is an important cost.  I found that for long distance moves (I have done a couple) that these combined costs equalled the cost of a mover.  We haven't even begun to calculate the time and physical energy required to load the truck properly, drive it and unload.  I never heard another word about doing it ourselves.  (I have done this a couple of times in various years and the results are the same.)"
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Joe &amp; Lenore, Pfafftown, NC</span>
		<hr size="1" width="684" />
		"You guys sure helped make this easier for me. Everything is unpacked and was in wonderful condition."
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Barbara, Simpsonville, SC</span>
		<hr size="1" width="684" />
		"I can’t say enough... consider it efficient, professional, clean and superior."
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Lynda, Ocean Isle Beach, NC</span>
		<hr size="1" width="684" />
		"Using East Coast made my moving experience stress free."
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Cheryl, Little River, SC</span>
		<hr size="1" width="684" />
		"Not only was there no damage to our furniture or home, all furniture was placed in the exact positions as requested. We were very pleased with your company and would highly recommend you to anyone who is in need of an excellent moving company."
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Regina, Mill Creek, WA</span>
		<hr size="1" width="684" />
		"I am very appreciative of the care with which my belongings were treated, especially the packing of my wooden and upholstered furniture, and my baby grand piano."
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Elizabeth, Osprey, FL</span>
		<hr size="1" width="684" />
		"We used them three times, they are very dependable, careful and friendly. We would highly recommend them."
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Ellen and Charles, Ocean Isle, NC</span>
		<hr size="1" width="684" />
		"Marvelous! We had a very good experience, in fact we recommended you to our mother for her move to Michigan."
		<br /><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp; — Paula & Mark, Sunset Beach, NC</span>
	</div>
				<?php } elseif($_REQUEST['page'] == 'affiliates') {
				
					echo '<div class="content full">';
				
					$file = file_get_contents('scripts/affiliates.txt'); // Load affiliates csv
					
					$file = str_replace(chr(13).chr(10),chr(13),$file);
					$file = str_replace(chr(10),chr(13),$file);
					
					$aff = array(); $maxk = 0;
					$i = strpos($file, chr(13))+1; $j=0; $k=0; $aff[$j] = array();
					for (;$i<strlen($file);$i++) {
						if (substr($file,$i,1) == chr(13)) { $j++; $maxk=($k>$maxk?$k:$maxk); $k=0; $aff[$j] = array(); }
						elseif (substr($file,$i,1) == '\\') { $k++; } // Delimiter
						else {
							
							if (!isset($aff[$j][$k])) { $aff[$j][$k] = ''; }
							$aff[$j][$k] .= substr($file, $i, 1);
						}
					}
					
					$af = array();
					for ($i=0;$i<$maxk;$i++) {
						$af[$i] = array();
						for ($j=0;$j<count($aff);$j++) {
							$af[$i][$j] = $aff[$j][$i];
						}
					}
					
					array_multisort($af[0],SORT_ASC,SORT_STRING,$af[1],$af[2],$af[3],$af[4]);
					
					for ($i=0; $i<count($af[0]); $i++) {
						echo '<div class="affiliate"><h3>'.$af[0][$i].'</h3>'
						.'<br>'.$af[1][$i]
						.'<br>'.$af[2][$i]
						.'<br>'.$af[3][$i]
						.'<br><a href="mailto:'.$af[4][$i].'">'.$af[4][$i].'</a>'
						.'</div>';
					}
					
					echo '</div>';
					
				} elseif($_REQUEST['page'] == 'links') { ?>
<div class="content">
	<h2 style="color: #000; font-weight: bold">You can find more information about moving<br>at the following links.</h2>
	<br>
	<ul style="margin-left: 24px">
		<li><strong>Federal Motor Carrier Safety Administration</strong></li>
		<ul style="margin-left: 32px">
			<li><a href="http://www.fmcsa.dot.gov/espa%C3%B1ol/english/pdfs/2000hhg.htm">"17 Most Frequently Asked Questions by Individuals Shippers of Household Goods"</a></li>
		</ul>
		<li><strong>American Moving & Storage Association</strong></li>
		<ul style="margin-left: 32px">
			<li><a href="http://www.ncuc.commerce.state.nc.us/consumer/moving.pdf#search='Moving%20in%20North%20Carolina">Consumer Handguide</a></li>
			<li><a href="http://www.moving.org/before/solving.html">Dispute Settlement (Arbitration) Program</a></li>
			<li><a href="http://www.moving.org/before/smartmoving.html">How to Take the Stress Out of Moving</a></li>
		</ul>
		<li><strong>North Carolina Utilities Commission</strong></li>
		<ul style="margin-left: 32px">
			<li><a href="http://www.moving.org/before/handbook.pdf">Moving in North Carolina — Your Rights and Responsibilities</a></li>
			<li><a href="http://www.ncmovers.org/tips.php">Consumer Tips</a></li>
		</ul>
	</ul>
	<br>
	<a href="http://www.makemineamillion.org/"><b>East Coast Moving LLC Owner Wins Award!</b></a>
	<br><br><p style="text-align: justify; font-weight: bold; text-shadow: 1px 1px 1px #999;">Business growth program, <a href="http://www.makemineamillion.org/">Make Mine A Million $ Business</a>, selected Carrie DeWitt-Partello of EAST COAST MOVING LLC as one of its ten awardees. Female entrepreneurs from North and South Carolina competed for business development packages that include money, marketing, mentoring, and technology assistance to help their businesses grow into million-dollar enterprises.</p>
	<br>Call or email for answers to any questions you might have or to arrange for a move. We want you to be our next very satisfied customer.
</div>

<div class="blank right" style="width: 383px; height: 229px; box-shadow: 2px 2px 8px #000;">
	<img src="images/pictures/checkingcabinet-1.jpg" />
</div>
				<?php } elseif($_REQUEST['page'] == 'aboutus') { ?>
				<div class="full content" style="margin-top: 16px; text-align: justify;"><h2 style="font-style: italic"><span style="color: #0070C0">PEOPLE'S CHOICE #1 COMPANY IN BRUNSWICK COUNTY '08 & '09 & '10 & ‘11</span>
	<br><span style="color: #00B050">and CHAMBER OF COMMERCE VOTED AMBASSADOR OF THE YEAR 2011</span>
	<br><span style="color: #0070C0">and BRUNSWICK COUNTY’S BUSINESS OF THE YEAR 2008!</span></h2>
<div class="content" style="width: 640px; margin: 16px auto; float: none;">
	<h1>From The Desk of Carrie-DeWitt Partello</h1>
	<hr align="center" size="1" color="#CCDDFF" style="width: 400px; position: relative; top: -8px;" />

	Hello, I am Carrie, the General Manager and Owner of East Coast Moving LLC, your Interstate household goods moving company based in Brunswick County, North Carolina. 
	
	<br /><br />East Coast Moving uses fully equipped straight trucks to accommodate you. We offer full professional packing, packing of a few items, or no packing. Warehousing options are also available, or simply moving in to or out of a mini storage facility. If you find yourself in need of experienced muscle – call the office, and we can get you experienced manpower. 
	<img class="right photo" style="margin: 14px 0 0 18px" src="images/pictures/carriePartello.jpg">
	<br /><br />As the General Manager I stay involved with every aspect of your move, no handoff    of responsibility.  I can always be reached with your questions or concerns. My 12+ years of industry experience are available to ease your move; and my reputation is available to ease your mind. 
	<br /><br />Please call for a quote to compare cost and service when you are planning to move.  Comparing apples to apples is important but finding a comfort level with your mover is essential.  After all you will be giving possession of everything you have to complete strangers?  Don’t hesitate to ask questions, require agreements be put on paper, and check those references! 
	<br /><br />Call us; you’ll be glad you did.

	<span style="font-size: 18px; font-weight: bold;">
	<br /><br />Carrie DeWitt Partello, CCA
	<br />General Manager
	<br />East Coast Moving, LLC
	<br /><br />NC-UC-2332
	<br />US DOT-1172302
	</span>
</div>
</div>
				<?php } elseif($_REQUEST['page'] == 'contactus') { ?>
<div class="content" style="width: 396px">
	<h2>We'd love to hear from you!</h2>
	<hr align="center" size="1" color="#CCDDFF" style="width: 400px; position: relative; top: -8px;" />
	
	Call or e-mail us for answers to any questions you might have or to arrange for a move. We want you to be our next very satisfied customer.
	
	<div align="center" style="margin: 16px 0; border: 1px solid #333;"><b>We have recently moved our office!!</b>
		<br /><a href="http://maps.google.com/maps?q=2795+Ocean+Hwy+W,+Shallotte,+NC&hl=en&sll=35.309049,-98.716558&sspn=7.590521,16.907959&hnear=2795+Ocean+Hwy+W,+Shallotte,+North+Carolina+28470&t=m&z=17">2795 Ocean Hwy W
		<br />Shallotte NC 28470</a>
		
		<br /><br />910-755-2058
		<br />1-866-279-MOVE (6683)
		<br /><a href="mailto:eastcoastmvg@atmc.net">eastcoastmvg@atmc.net</a>
	</div>
	
	<img class="tilt photo" src="images/pictures/kitchen1.jpg" />
</div>

<div class="right" style="margin-top:8px">
	<iframe src="contact.php" class="content-right" style="width: 496px" width="496" height="386">Sorry, your browser does not support the iFrame contact form.<br>Please <a href="mailto:eastcoastmvg@atmc.net">email us</a> instead!</iframe>
</div>
				<?php } else { ?>
	<div class="content" style="margin: 8px 0 32px; position: relative;">
		
		<b><span style="font-size: larger;"><a href="#" onclick="openVirtualTour(true)">Click to try our new Virtual Tour</a></span></b>
		<br><br><b>Our office has moved!
		<br><a href="/contactus">See the new address on the contact page!</a></b>
		<div id="virtualTourBox" style="position: absolute;left:0;top:0;z-index:10000; width: 960px; height: 480px; background: rgba(0,0,0,0.7); visibility: hidden;">
		</div>
	</div>
	
	<div class="content-right" style="text-align: justify; width: 400px; text-shadow: 1px 1px 2px rgba(0,0,0,0.4);">
		<strong>East Coast Moving, LLC</strong>, is a full-service moving company for every state along the eastern seaboard when moving in to – or out of, the Carolinas.
		<br><br>This family-owned and operated company has called Shallotte, North Carolina home since 2003.
		<br><br>Specializing in moving for homeowners, for builders and for real estate agents, you will see our crews around Brunswick and New Hanover County, regularly. 
		<br><br>Look for us in developments like: Brunswick Forest, St. James Plantation, Ocean Ridge Plantation, Crow Creek, Lockwood Folly, Landfall, Magnolia Greens, Brunswick Plantation, Sea Trail Golf Resort, Seascape, Rivers Edge Golf Club & Plantation, Sea Walk, Cape Side, Bent Tree Plantation & on Bald Head Island, in Waterford, and Winding River Plantation.
		
		<br><br><a href="https://app.e2ma.net/app2/audience/signup/1737606/1722899/?v=a" onclick="window.open('https://app.e2ma.net/app2/audience/signup/1737606/1722899/?v=a', 'signup', 'menubar=no, location=no, toolbar=no, scrollbars=yes, width=544, height=512'); return false;" style="font-weight: bold; text-align: right; display: block; font-size: larger; color: #060;">Click to Receive our newsletter!</a>
		
		<br><br><div style="margin: 0 auto">
		<a href="http://www.brunswickbeacon.com/content/best-brunswick-4"><img src="images/bestOfBrunswick.gif" style="float:left">
		<span style="float:left;text-align:center;font-size:26px;margin-left:24px;">Voted<br>#1 Moving Company!<br><span style="font-size:small">by Brunswick Beacon</span></span></a>
		</div>
	</div>
	
	<div class="blank content tilt" style="overflow: hidden; box-shadow: -2px -2px 10px #000;">
		<!-- Top of slider text -->
		<div id="slider-wrapper">
			<div id="slider" class="nivoSlider">
			    <!--<img src="images/gallery/1.jpg" alt="" />
			    <a href="#"><img src="images/gallery/2.jpg" alt="" title="#htmlcaption" /></a>-->
			    <img src="images/gallery/pic00.jpg" alt=""  title="" />
			    <?php
				    for ($i=1;$i<=17;$i++) { echo '<img src="images/gallery/pic'.($i<=9?'0':'').$i.'.jpg" alt="" />' . "\n"; }
			    ?>
			    <!--<img src="images/gallery/2010 graduation 118.jpg" alt="" />
			    <img src="images/gallery/2010 graduation 180.jpg" alt="" />-->
			</div>
			<div id="htmlcaption" class="nivo-html-caption">A smooth move with us... It's a "shore" thing!</div>
		</div>
	</div>
	
	<!--
	<div class="blank right tilt" style="display: none; overflow: hidden; margin-right: -32px; margin-top: -24px; width: 400px; height: 300px; text-align: center; box-shadow: 2px 2px 10px #000;">
		<div id="slider-wrapper2">
			<div id="slider2" class="nivoSlider">
			    <img src="images/gallery/diesel00.jpg" alt="" title="" />
			    <?php
				    for ($i=1;$i<=7;$i++) { echo '<img src="images/gallery/diesel'.($i<=9?'0':'').$i.'.jpg" alt="" />' . "\n"; }
			    ?>
			</div>
			<div id="htmlcaption" class="nivo-html-caption">A smooth move with us... It's a "shore" thing!</div>
		</div>
		
	</div>
	-->
	
	<!-- <div class="content" style="width: 944px; margin-top: 12px; text-indent: 192px;">
		<strong>East Coast Moving LLC Owner Wins Award!</strong>
		Business growth program, Make Mine A Million $ Business, selected Carrie DeWitt-Partello of EAST COAST MOVING LLC as one of its ten awardees. Female entrepreneurs from North and South Carolina competed for business development packages that include money, marketing, mentoring, and technology assistance to help their businesses grow into million-dollar enterprises.
	</div> -->
				<?php } ?>
</div>

<div id="footer">
	<div class="container">
		<div class="left" style="background: #FFF; width: 256px;">
			<div class="logos" style="width: 110px;">
				<!--<img src="images/logos/peoplesChoice.png" />-->
				<img src="images/logos/bcar.gif" />
				<img src="images/logos/nchba.jpg" />
				<img src="images/logos/amsa.jpg" />
			</div>
			<div class="logos" style="margin-left: 16px;">
				<a href="http://www.bbb.org/myrtle-beach/business-reviews/movers/east-coast-moving-in-shallotte-nc-15001041"><img src="images/logos/bbbh.jpg" /></a>
				<img src="images/logos/bccoc.jpg" />
				<img src="images/logos/ncmovers.jpg" />
				
			</div>
		</div>
		<div class="right">
			
			<span class="left"><a href="https://www.facebook.com/pages/East-Coast-Moving-LLC/88376099766"><img src="images/social/facebook.png"></a>&nbsp;&nbsp;
			<a href="http://www.linkedin.com/in/moveladyeastcoastmoving"><img src="images/social/linkedin.png"></a>&nbsp;&nbsp;
			<a href="http://eastcoastmoving.wordpress.com"><img src="images/social/wordpress-2.png"></a>&nbsp;&nbsp;
			<a href="#"><img src="images/social/twitter.png"></a>&nbsp;&nbsp;
			<a href="http://pinterest.com/themovelady/east-coast-moving-llc/"><img src="images/social/pinterest.png"></a>
			</span>
			
			<h2 style="margin: 64px 0 48px; text-shadow: 0 0 5px #268; color: #6FC;">A smooth move with us, it's a "shore" thing!</h2>
			<span style="font-size: 17px">Call us at (866)279-MOVE <sub style="font-size: 12px">(6683)</sub></span>
			<br><a href="mailto:eastcoastmvg@atmc.net?subject=Website Visitor Email Message">eastcoastmvg@atmc.net</a>
			<br><sup><a href="http://www.13willows.com">Web Design</a> by <a href="http://www.13willows.com">13 Willows</a></sup>
		</div>
		<div class="center">
			<img src="images/gallery/diesel.jpg">
		</div>
		
	</div>
</div>

<!-- TTTTTTTTTTTTTTTTTTTTTTTTT GOOGLE AD TRACKING TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT -->

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-6040410-1");
pageTracker._trackPageview();
} catch(err) {}</script>
      
<!-- TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT -->

<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider({effect: 'fade'});
    $('#slider2').nivoSlider({effect: 'fade', pauseTime: 4500});
});

$(window).scroll(function(e){ 
  $el = $('#navul'); 
  if ($(this).scrollTop() > 187 && $el.css('position') != 'fixed'){ 
	$('#navul').css({'position': 'fixed', 'top': '0px', 'right': '15%', 'width': '70%'});
  } else if ($(this).scrollTop() < 187 && $el.css('position') != 'absolute') {
	//$('#navul').css({'position': 'absolute', 'right': '-24px', 'width': '790px'}); // Old offset nav style
	$('#navul').css({'position': 'absolute', 'right': '0px', 'width': '962px'});
  }
});
</script>
</body>
</html>