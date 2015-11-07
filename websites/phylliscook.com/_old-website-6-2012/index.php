<?php ob_start("ob_gzhandler"); require("scripts/functions.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php
$tmp = array_merge($pagesArray, $subpagesArray);
echo dbReadSetting("Website_Titlebar",1);
foreach($tmp as $v) if (isset($_REQUEST[$v])) { echo ' | ' . dbReadTitle($v); break; }
?></title>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="css/ie.css" />
<![endif]--> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="dental implants, periodontics, periodontist, phyllis b. cook, dds, mph, pa, 7028, wilmington, north carolina, nc, teeth, dentist, american board of periodontology" />
<meta name="description" content="Dental Implants and Periodontics in Wilmington, NC. Dr. Phyllis B. Cook, DDS, MPH, PA. The best periodontal practice for Wilmington, NC." />
<script src="scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript">
<!--
window.onload = function() {
	footMod = document.getElementById('footerModule');
	footArray = [];
	opacityArray = [];
	for (i=0; i<=footMod.childNodes.length-1; i++) {
		if (String(footMod.childNodes[i].tagName).toLowerCase() == 'div') {
			footArray.push(footMod.childNodes[i]);
			opacityArray.push(0);
		}
	}
	currentVisible = Math.round(Math.random()*(footArray.length-1));
	footArray[currentVisible].style.opacity = 1;
	footArray[currentVisible].style.filters = 'alpha(opacity=100)';
	opacityArray[currentVisible] = 1;
	
	setInterval("testimonialFade()", 15000);
	setInterval("runFade()", 10);
}

function testimonialFade() {
	if (currentVisible++ >= footArray.length-1) currentVisible = 0;
}

function runFade() {
	for (i=0; i<=footArray.length-1; i++) {
		if (i == currentVisible) {
			if (opacityArray[i] < 1) { opacityArray[i]+=0.05; }
			if (opacityArray[i] > 1) { opacityArray[i]=1; }
		} else {
			if (opacityArray[i] > 0) { opacityArray[i]-=0.05; }
			if (opacityArray[i] < 0) { opacityArray[i] = 0; }
		}
		
		footArray[i].style.opacity = opacityArray[i]; footArray[i].style.filter = 'alpha(opacity='+String(Math.round(opacityArray[i]*100))+')';
	}
}
//-->
</script>
</head>
<body>

<div id="main">
    <div id="header">
    	<div id="title">
    		<h1><a href="#"><?php echo dbReadSetting("Website_Header",1); ?></a></h1>
        </div>
        <div id="ticker">
        	<marquee id="tickerText"><?php echo dbReadSetting("Website_Ticker",1); ?></marquee>
        </div>
        <div id="menu">
        	<ul>
            	<li><a href="/index.php"><?php echo dbReadTitle('home'); ?></a></li>
            	<?php
					foreach($pagesArray as $v) {
						echo '<li><a href="?' . $v . '">' . dbReadTitle($v) . '</a>';
						navGroup($v);
						echo '</li>';
					}
				?>
            </ul>
        </div>
    </div>
    <div id="body">
    	<div id="content">
        	<?php pageContent(); ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <div id="footer">
    	<div>
            <div class="footLeft"><?php echo dbReadSetting("Footer_Left",1); ?></div>
            <div class="footRight"><?php echo dbReadSetting("Footer_Right",1); ?></div>
        </div>
    </div>
    <div id="icons">
    	<div class="icon"><a href="http://twitter.com/PhyllisCookDDS"><input type="image" src="images/layout/btntwitter.png" width="44" height="64" alt="Twitter Social Network" /></a></div>
        <div class="icon"><a href="http://linkedin.com/in/phylliscookdds"><input type="image" src="images/layout/btnlinkedin.png" width="44" height="64" alt="LinkedIn Social Network" /></a></div>
        <div class="icon"><a href="http://www.myspace.com/phylliscookdds"><input type="image" src="images/layout/btnmyspace.png" width="44" height="64" alt="MySpace Social Network" /></a></div>
        <div class="icon"><a href="http://facebook.com/pages/Wilmington-NC/Phyllis-B-Cook-DDS-MPH-PA/112861265431004"><input type="image" src="images/layout/btnfacebook.png" width="44" height="64" alt="Facebook Social Network" /></a></div>
        <div class="icon"><a href="http://youtube.com/user/PhyllisCookDDS"><input type="image" src="images/layout/btnyoutube.png" width="44" height="64" alt="Youtube Social Network" /></a></div>
        <div class="icon"><a href="http://foursquare.com/venue/6449968"><input type="image" src="images/layout/btnfoursquare.png" width="44" height="64" alt="Foursquare Social Network" /></a></div>
    </div>
    <div id="footerModule">
    	<div>"You will never regret it. Wow, already everyone that sees me tries to figure out what has changed. They guess weight loss, hair cut, even one person thought I had some type of face lift. How can you compare money to happiness and health. It's worth every penny. She's an angel and miracle worker in one person" - Kim V.</div>
        <div>"My experience with having an implant is a good one! The surgery was painless and the temporary crown was practically flawless. I work closely with 6 men at work and I don't believe any of them realized that I had an implant placed. The staff and Dr. Cook are the best. No kidding. You rarely see this kind of hospitality these days. Thanks a million!" - Joan</div>
        <div>"My apprehension of the scaling and root planing procedure was greatly relieved following the first treatment - completely professional with utmost patient sensitivity. The entire approach to treatment has been candid and comprehensive enabling complete understanding of "where are we going" to better tooth and gum health. The entire office staff has been wonderful to deal with and I am glad that I ended up here." - James H.</div>
        <div>"I was a big chicken when it comes to dental work and was very apprehensive about an implant. Words cannot describe how well it went. I was (am) most pleasantly surprised! The staff is professional, caring, and understanding. From the evaluation through the procedure and follow-up, I was treated with respect. The staff was very helpful and the experience was wonderful! I would not hesitate to encourage someone to have the procedure and would highly recommend Dr. Cook and her staff." - Pat M.</div>
        <div>"Wow, I never expected it to be this easy! I was really nervous and was afraid I would have to wear a temporary tooth that could possibly fall out. I am not a vain person "but" this was my front tooth! I was also nervous about the surgery itself - I'm not into pain! Dr. Cook and her staff were excellent. They made me so comfortable and took really good care of me. I don't remember much of the procedure itself and did not have much pain afterwards, just a little uncomfortable. I really appreciated the call from Dr. Cook that afternoon just checking to make sure I was okay. I highly recommend this procedure! You are in good hands with Dr. Cook and her wonderful staff!" - Sally P.</div>
        <div>"I don't know if I can fully express just how positive an experience I've undergone with Dr. Cook and her AWESOME staff! From the beginning, everyone has been so friendly and very professional - something that I find refreshing compared to different experiences I've had in the professional environment. I've always wanted to have my particular procedure done and finally addressed it. That was what I considered the easy part: I'm a big weenie when it comes to needles and the such. I am pleasantly surprised at how painless the actual surgery and recovery time was. As far as the results - phenomenal!!! Immediate improvement, and it will only get better from here! No question about it, I will recommend Dr. Cook and her top-notch staff to anyone with any periodontal/implant concerns." - Kim P.</div>
        <div>"I have spent several years with missing teeth and lots of aggravation and frustration; these no longer exist! Now I can smile with the best of em'. For high satisfaction, you don't mind paying the extra dollar. This was money well spent. I would say if you want skill, experience, and a professional setting, then Dr. Cook is the best choice." - Chris C.</div>
    </div>
</div>

<!-- Google Analytics --><script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-389885-9']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</body>
</html>