<?php
	if (strpos($_SERVER['HTTP_USER_AGENT'],'iPhone') != false) {
		header("Location: mobile/index.php");
		exit();
	}

	if (isset($_REQUEST['contact']) && $_POST['mailing'] == 'y') {
		unset($error, $mailSuccess);
		if (empty($_POST['mName']) || empty($_POST['mName'])) { $error .= 'Name and Email are required'; }
		if (empty($_POST['mBody'])) {
			if (!empty($error)) { $error .= '<br />'; }
			$error .= 'Please enter a message.';
		}
		
		if (empty($error)) {
			$flags = "MIME-Version: 1.0\r\n";
			$flags .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$flags .= "From: <webmaster@13willows.com>";
			mail("webmaster@13willows.com", "13 Willows :: " . $_POST['mMessage'], 'Generated from: www.13willows.com/index.php?contact<br />Sender Name: <b>' . $_POST['mName'] . '</b><br />Reply-To Email: <a style="font-weight: bold; text-decoration: none; color: #00CCFF;" href="mailto:' . $_POST['mEmail'] . '">' . $_POST['mEmail'] . '</a><br /><br />' . htmlspecialchars($_POST['mBody']), $flags);
			$mailSuccess = $_POST['mMessage'];
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="google-site-verification" content="OYsKMMCOFtL0TELY5TakkHj_PJhS3UqveLTaFcwdhzg" />
<meta name="description" content="13 Willows Web Design and Software Engineering" />
<meta name="keywords" content="13, Thirteen, Willows, 13 Willows, Web Design, Web Development, Software, Engineering" />

<title>13 Willows :: Web Design :: Software Engineering</title>

<style type="text/css">
html, body { margin: 0px; background: #FFF; }

.body { width: 896px; height: 320px; margin: auto; margin-top: 0px; background: url('images/layout/header.png') top no-repeat;  }

.content {
	display: block;
	padding-left: 16px;
	padding-right: 16px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	padding-top: 256px;
}

.footer { font-family: Arial, Helvetica, sans-serif; font-size: 10px; font-weight: bold; }
.footer a { color: #063; text-decoration: none; }
.footer a:hover { color: #396; }

.navigation { width: 896px; height: 24px; position: relative; top: 224px; border: none 0px; text-shadow: #999 1px 1px 3px; }
.navigation td { width: 16.67%; text-align: center; }

.navigation a { font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: bold; text-decoration: none; color: #09F; }
.navigation a:hover { color: #3CF; }

h1 { font-size: 22px; font-family: Tahoma, Geneva, sans-serif; text-decoration: underline; }

.footer { background: url('images/layout/footReflect.png') 0 0 repeat-x; width: 100%; height: 126px; position: relative; top: 256px; }
.footer div {
	margin: auto;
	text-align: left;
	width: 896px;
}
.footer div div { float: left; width: 448px; margin-top: 68px; }
.footer div div.right { float: right; text-align: right; }

td.contactForm {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
td.contactContent {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
}
textarea.contactForm {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	background: url('images/layout/bgContact.png');
}

.quote { width: 100%; text-align: center; font-style: italic; color: #AAAAAA; font-size: 12px; text-shadow: #CCC 1px 1px 2px; }

#portfolioCon { background: #000; width: 896px; height: 288px; overflow: hidden; position: relative; }
#portfolioCon h1 { color: #FFF; text-shadow: #000 0px 0px 3px; position: absolute; left: 24px; top: 0px; }
#portfolioCon .lan { position: absolute; left: 24px; top: 256px; font-family: Arial, Helvetica, sans-serif; font-size: 20px; color: #CCC; }

#portfolio { width: 100%; height: 288px; position: absolute; }
#portfolio img { width: 256px; height: 288px; border: none 0px; }

b.lit { color: #CCC; }
b.unlit { color: #333; }
</style>
<script type="text/javascript" language="javascript">
<!--
var IE = document.all?true:false;
if (!IE) document.captureEvents(Event.MOUSEMOVE);

document.onmousemove = getMouseXY;

var tempX = 0;
var tempY = 0;
var oldX = 0;
var originalLeft = 0;
var windowWidth = 0;
var oldnum = 1;
var newnum = 0;
var languages = new Array(4);
languages[0] = true;
languages[1] = false;
languages[2] = false;
languages[3] = true;
languages[4] = false;

renderWidth = 896;

function getMouseXY(e) {
	if (IE) { // grab the x-y pos.s if browser is IE
		tempX = event.clientX + document.body.scrollLeft;
		tempY = event.clientY + document.body.scrollTop;
	} else {  // grab the x-y pos.s if browser is NS
		tempX = e.pageX;
		tempY = e.pageY;
	}
	
	if( typeof( window.innerWidth ) == 'number' ) {
		//Non-IE
		windowWidth = window.innerWidth;
	} else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
		//IE 6+ in 'standards compliant mode'
		windowWidth = document.documentElement.clientWidth;
	} else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
		//IE 4 compatible
		windowWidth = document.body.clientWidth;
	}
	
	tempX -= (windowWidth - renderWidth) / 2;
	
	if (tempX < originalLeft) { tempX = originalLeft; }
	else if (tempX > originalLeft + renderWidth) { tempX = originalLeft + renderWidth; }

	newnum = originalLeft - (tempX /  renderWidth) * (3416 - renderWidth);
	oldnum = document.getElementById('portfolio').style.left.substr(0, document.getElementById('portfolio').style.left.length-3);
	
	if (oldnum != newnum) {
		document.getElementById('portfolio').style.left = newnum + "px";	
	}
		
	return true;
}

function clearInfo() {
	document.getElementById('mouseInfo').innerHTML = "--==Mouse over a website to get more information about it.==--";	
}
function setInfo(site) {
	var newText = "";
	if (site == "13willows") {
		newText = "<u>13 Willows</u><br /><br />My own personal website, used for anything and everything. Projects, schoolwork, websites, applications, screensavers/games, flash.<br />Welcome to 13 Willows.";
		setAllLan(true);
		document.getElementById('lanMysql').className = 'unlit';
		document.getElementById('lanAsp').className = 'unlit';
	}
	else if (site == "alganomics") {
		newText = "<u>Alganomics</u><br /><br />A business based on becoming a leader in culturing algae for biomass. Their primary focus is on innovations in tubular photobioreactor systems and the downstream processes, as well as utilizing these technologies for environmental remediation.";
		setAllLan(true);
		document.getElementById('lanJavascript').className = 'unlit';
		document.getElementById('lanMysql').className = 'unlit';
		document.getElementById('lanAsp').className = 'unlit';
	}
	else if (site == "all4free") {
		setAllLan(true);
		newText = "<u>All4Free</u> [Backup]<br /><br />My old website, filled with mostly random stuff taken from other websites. Annoying but funny, crazy thoughts, make your own halo 2 emblem, etc.";
		document.getElementById('lanActionscript').className = 'unlit';
		document.getElementById('lanPhp').className = 'unlit';
		document.getElementById('lanMysql').className = 'unlit';
	}
	else if (site == "aziomedia") {
		setAllLan(true);
		newText = "<u>Aziomedia</u><br /><br />Ecommerce website, seller of Used Books, Vinyl LP Records, Book Store, Used Magazines, Collectibles. Managed through chrislands.com bookstores.";
		document.getElementById('lanFlash').className = 'unlit';
		document.getElementById('lanActionscript').className = 'unlit';
		document.getElementById('lanAsp').className = 'unlit';
	}
	else if (site == "aziomediablog") {
		setAllLan(false);
		newText = "<u>Aziomedia Blog</u><br /><br />Blog for Aziomedia Used Bookstore. Updated with new inventory and information on the latest news on books/vinyl records/etc.";
		document.getElementById('lanHtml').className = 'lit';
		document.getElementById('lanJavascript').className = 'lit';
		document.getElementById('lanCss').className = 'lit';
	}
	else if (site == "cmd") {
		setAllLan(false);
		newText = "<u>Command Prompt</u><br /><br />My attempt at recreating windows command prompt into a website. Extremely limited functionality, in that the only commands are 'programs', 'websites', and 'help'. Was done mostly just for looks, as a school project.";
		document.getElementById('lanHtml').className = 'lit';
		document.getElementById('lanJavascript').className = 'lit';
		document.getElementById('lanCss').className = 'lit';
	}
	else if (site == "elitewoodclassics") {
		setAllLan(true);
		newText = "<u>Elite Wood Classics</u><br /><br />Countertop, cabinetry, and custom interior decorating business.";
		document.getElementById('lanMysql').className = 'unlit';
		document.getElementById('lanAsp').className = 'unlit';
	}
	else if (site == "jaredcline") {
		setAllLan(false);
		newText = "<u>Jared Cline Photography</u> [Backup]<br /><br />Photographers website &amp; portfolio. Showcases wedding, creative, and beach photos, as well as contact information.";
		document.getElementById('lanHtml').className = 'lit';
		document.getElementById('lanCss').className = 'lit';
		document.getElementById('lanPhp').className = 'lit';
	}
	else if (site == "jbbrowning") {
		setAllLan(false);
		newText = "<u>JBBrowning</u><br /><br />Professor, author, and Technologist. Website offers his services as technology training, lecture engagements, project management, etc.";
		document.getElementById('lanHtml').className = 'lit';
		document.getElementById('lanCss').className = 'lit';
	}
	else if (site == "lineridershare") {
		setAllLan(true);
		newText = "<u>Line Rider Share</u><br /><br />Website made for the maintaining and sharing of tracks between users of the once popular game 'Line Rider'. Tracks could be uploaded as an .sol format and split/converted to images. Over 3000 users.";
		document.getElementById('lanAsp').className = 'unlit';
	}
	else if (site == "rljconstruction") {
		setAllLan(false);
		newText = "<u>Robert L. Jones and Sons Construction</u><br /><br />Custom construction company based in south-eastern North Carolina.";
		document.getElementById('lanHtml').className = 'lit';
		document.getElementById('lanJavascript').className = 'lit';
		document.getElementById('lanCss').className = 'lit';
	}
	else if (site == "silvercoastwinery") {
		setAllLan(false);
		newText = "<u>Silver Coast Winery</u> [Undeveloped]<br /><br />Website template for winery. Project never used for official website.";
		document.getElementById('lanHtml').className = 'lit';
		document.getElementById('lanCss').className = 'lit';
		document.getElementById('lanPhp').className = 'lit';
	}
	else if (site == "wingitinasheville") {
		setAllLan(false);
		newText = "<u>Wingit in Asheville</u><br /><br />Artist, painter, interior decorating, and t-shirt designer. This website offers many different options for decorating your home, based around Asheville, NC.";
		document.getElementById('lanHtml').className = 'lit';
		document.getElementById('lanJavascript').className = 'lit';
		document.getElementById('lanCss').className = 'lit';
		document.getElementById('lanPhp').className = 'lit';
	}
	document.getElementById('mouseInfo').innerHTML = newText;	
}

function setAllLan(litstatus) {
	litstatus == true ? litstatus = 'lit' : litstatus = 'unlit';
	document.getElementById('lanHtml').className = litstatus;
	document.getElementById('lanJavascript').className = litstatus;
	document.getElementById('lanCss').className = litstatus;
	document.getElementById('lanFlash').className = litstatus;
	document.getElementById('lanActionscript').className = litstatus;
	document.getElementById('lanMysql').className = litstatus;
	document.getElementById('lanPhp').className = litstatus;
	document.getElementById('lanAsp').className = litstatus;
}
//-->
</script>

<!-- Google Analytics -->
<script type="text/javascript">var _gaq = _gaq || [];_gaq.push(['_setAccount', 'UA-389885-2']);_gaq.push(['_trackPageview']);(function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script>
</head>
<body>

<div class="body">

    <table class="navigation" cellpadding="0" cellspacing="0"><tr>
        <td><a class="navButton" href="?">Home</a></td>
        <td><a class="navButton" href="?services">Services</a></td>
        <td><a class="navButton" href="?portfolio">Portfolio</a></td>
        <td><a class="navButton" href="?projects">Projects</a></td>
        <td><a class="navButton" href="?about">About Us</a></td>
        <td><a class="navButton" href="?contact">Contact</a></td>
    </tr></table>

    <div class="content">
    
    <?php if (isset($_REQUEST['services'])) { ?>
    
        <h1>Services</h1>
        
        <ul>
            <li>Website Development; Packages including:</li>
                <ul>
                    <li>eCommerce, CMS, Databases, Dynamic content, Web 2.0 &amp; XHTML W3C valid code.</li>
                    <li>Login/Administration systems, Custom multimedia Flash, CSS, &amp; optimized web graphics.</li>
                    <li>Platform-aware design catered towards usability for mobile devices such as iPhone, Blackberry, and Android.</li>
                </ul>
            <li>Graphic Design</li>
                <ul>
                    <li>Make your company stand out! Give it a fresh look with a unique, custom logo.</li>
                    <li>Add liveliness to your website with icons, images, and buttons custom tailored to your business.</li>
                </ul>
            <li>Data Entry/Conversions</li>
            <li>Technical Support &amp; Website Maintenance</li>
        </ul>
        
        We offer these services at affordable rates for the independent or small business, while still maintaining the professionalism and quality you deserve.
        <br />If you are interested in doing business with us, we would love to help bring your next project to life, or further your company's presence on web.
        <br /><br /><div class="quote">"Just as an artist does not sell his art by the square inch, we do not price our services by the page.<br />Prices are based not on time required, or difficulty, but on how valuable the service is to you." - 13 Willows</div>
    
    <?php } elseif (isset($_REQUEST['portfolio'])) { ?>
        
        <div id="portfolioCon">
            <div id="portfolio">
                <table width="3416" cellpadding="0" cellspacing="0" border="0">
                <tr><td>
                    <a href="http://www.13willows.com"><img src="portfolio/sites/tn_13willows.jpg" id="pic13willows" onmouseover="setInfo('13willows');" onmouseout="clearInfo();" /></a>
                </td><td width="8"></td><td>
                    <a href="http://www.algaeresource.com"><img src="portfolio/sites/tn_alganomics.jpg" onmouseover="setInfo('alganomics');" onmouseout="clearInfo();" /></a>
                </td><td width="8"></td><td>
                    <a href="http://halo2.13willows.com"><img src="portfolio/sites/tn_all4free.jpg" onmouseover="setInfo('all4free');" onmouseout="clearInfo();" /></a>
                </td><td width="8"></td><td>
                    <a href="http://www.aziomedia.com"><img src="portfolio/sites/tn_aziomedia.jpg" onmouseover="setInfo('aziomedia');" onmouseout="clearInfo();" /></a>
                </td><td width="8"></td><td>
                    <a href="http://www.aziomediablog.com"><img src="portfolio/sites/tn_aziomediablog.jpg" onmouseover="setInfo('aziomediablog');" onmouseout="clearInfo();" /></a>
                </td><td width="8"></td><td>
                    <a href="http://www.13willows.com/cmd"><img src="portfolio/sites/tn_cmd.jpg" onmouseover="setInfo('cmd');" onmouseout="clearInfo();" /></a>
                </td><td width="8"></td><td>
                    <a href="http://www.elitewoodclassic.com"><img src="portfolio/sites/tn_elitewoodclassics.jpg" onmouseover="setInfo('elitewoodclassics');" onmouseout="clearInfo();" /></a>
                </td><td width="8"></td><td>
                    <a href="http://www.13willows.com/jaredcline.com"><img src="portfolio/sites/tn_jaredcline.jpg" onmouseover="setInfo('jaredcline');" onmouseout="clearInfo();" /></a>
                </td><td width="8"></td><td>
                    <a href="http://www.jbbrowning.com"><img src="portfolio/sites/tn_jbbrowning.jpg" onmouseover="setInfo('jbbrowning');" onmouseout="clearInfo();" /></a>
                </td><td width="8"></td><td>
                    <a href="http://www.lineridershare.com"><img src="portfolio/sites/tn_lineridershare.jpg" onmouseover="setInfo('lineridershare');" onmouseout="clearInfo();" /></a>
                </td><td width="8"></td><td>
                    <a href="http://www.rljconstruction.com"><img src="portfolio/sites/tn_rljconstruction.jpg" onmouseover="setInfo('rljconstruction');" onmouseout="clearInfo();" /></a>
                </td><td width="8"></td><td>
                    <a href="http://www.13willows.com/silvercoastwinery.com"><img src="portfolio/sites/tn_silvercoastwinery.jpg" onmouseover="setInfo('silvercoastwinery');" onmouseout="clearInfo();" /></a>
                </td><td width="8"></td><td>
                    <a href="http://www.wingitinasheville.com"><img src="portfolio/sites/tn_wingitinasheville.jpg" onmouseover="setInfo('wingitinasheville');" onmouseout="clearInfo();" /></a>
                </td></tr>
                </table>
            </div>
            <h1>Portfolio</h1>
            <div class="lan">
            	Technology Used:
                <b id="lanHtml" class="unlit">HTML</b>
                | <b id="lanJavascript" class="unlit">JavaScript</b>
                | <b id="lanCss" class="unlit">CSS</b>
                | <b id="lanFlash" class="unlit">Flash</b>
                | <b id="lanActionscript" class="unlit">ActionScript</b>
                | <b id="lanPhp" class="unlit">PHP</b>
                | <b id="lanMysql" class="unlit">MySQL</b>
                | <b id="lanAsp"class="unlit">ASP</b></div>
            </div>
        </div>
        
        
        
        
    <?php } elseif (isset($_REQUEST['projects'])) { ?>
          
        <h1>Projects</h1>
        
        Check back here for upcoming events and projects.
        
    <?php } elseif (isset($_REQUEST['about'])) { ?>
        
        <h1>About Us</h1>
        
        <table cellpadding="0" cellspacing="0" width="100%" height="256" border="0" style="font-size: 14px;">
            <tr><td width="33%" valign="top">
                Marco Piccirillo
                <br /><ul>
                <li>Web Developer &amp; Writer</li>
                <li>Software Engineer</li>
                <li>Web Server Administration</li>
                </ul>
                <div align="center"><a href="http://marco.13willows.com/" style="font-size: 12px; color: #C00; text-decoration: none; font-weight: bold;">Project Page</a></div>
            </td><td width="34%" valign="top" style="background: url('images/layout/aboutDaryll.jpg') right bottom no-repeat;">
                Daryll Chandler
                <br /><ul>
                <li>Web Developer</li>
                <li>Client Support &amp; Contracting</li>
                <li>Project Management</li>
                </ul>
                <div align="center"><a href="/daryll" style="font-size: 12px; color: #C00; text-decoration: none; font-weight: bold;">Online Resume</a></div>
            </td><td width="33%" valign="top">
                Eddie Melcer
                <br /><ul>
                <li>Web Designer</li>
                <li>Multimedia Administration</li>
                <li>Graphics / Stylesheet Integration</li>
                </ul>
                <div align="center"><a href="http://eddie.13willows.com/" style="font-size: 12px; color: #C00; text-decoration: none; font-weight: bold;">Project Page</a></div>
            </td></tr>
        </table>
        
        <div class="quote" style="position: relative; top: -64px;">"Around 230 million people are reachable in the US alone via internet. Is your business known by your target audience?" - 13 Willows</div>
          
    <?php } elseif (isset($_REQUEST['contact']))  { ?>
    
        <h1>Contact Information</h1>
        
        <form name="formMail" method="POST" action="index.php?contact">
        <input type="hidden" name="mailing" value="y" />
        <table cellpadding="0" cellspacing="0" border="0">
        <tr><td width="60%" class="contactForm" align="center">
        <?php if (!empty($mailSuccess)) { ?>
            <table cellpadding="0" cellspacing="0" border="0">
            <tr><td style="color: #008000; font-weight: bold">Successfully sent your <?php echo $mailSuccess; ?>.</td></tr>
            </table>
        <?php } else { ?>
            <table cellpadding="0" cellspacing="0" border="0">
            <?php
            if (!empty($error)) {
                echo '<tr><td colspan="2" align="center" style="font-weight: bold; color: #FF0000;">' . $error . '</td></tr>';
            }
            ?>
            <tr><td width="50%" align="right" style="padding-right: 8px;">Full Name:</td><td><input type="text" name="mName" size="25" /></td>
            <tr><td height="4" colspan="2"></td></tr>
            <tr><td width="50%" align="right" style="padding-right: 8px;">Email Address:</td><td><input type="text" name="mEmail" size="25" /></td>
            <tr><td height="4" colspan="2"></td></tr>
            <tr><td width="50%" align="right" style="padding-right: 8px;">Message:</td>
            <td align="left">
            <select name="mMessage">
            <option value="message">Message</option>
            <option value="question">Question</option>
            <option value="quote">Request Quote</option>
            <option value="update">Update</option>
            <option value="complaint">Complaint</option>
            <option value="other">Other</option>
            </select>
            </td>
            </tr>
            <tr><td align="center" colspan="2"><textarea name="mBody" class="contactForm" cols="60" rows="6"></textarea></td></tr>
            <tr><td align="center" colspan="2"><input type="submit" value="Send" /></td></tr>
            </table>
        <?php } ?>
        </td><td width="40%" class="contactContent">
        Please feel free to contact us via the form on the left if your inquiry pertains. Otherwise, you can contact us directly using one of the methods below.
        <br />
        <br /><u>Email</u>: <a href="mailto:webmaster@13willows.com">webmaster@13willows.com</a>
        <br />
        <br /><u>Phone</u>: (910) 393-7690
        <br />Available 7 days a week, 10AM-10PM.
        <br />
        <br /><u>Mailing Address Available on Request</u>
        </td></tr>
        </table>
        </form>
    
    
    <?php } else { ?>
    
	New Website Under Construction: <a href="http://www.13willows.com/newindex.php?page=portfolio" style="font-weight:bold">Click for new portfolio</a>
        <br><br>13 Willows specializes in a myriad of web development and software design options. If you are looking for a custom-made website or application for your business or personal needs, you have come to the right place. We are eager to give you that extra edge in online entrepreneurship, making your visions a reality.
        <br />Why choose us? Here at 13 Willows, we go above and beyond the competition by offering top of the line options for graphic stylization, e-commerce and marketing, search engine optimization, dynamic user management and databases, among many other options.
        <br />If you are in need of an affordable, effective website, please email <a class="thumb" href="mailto:DC@atmc.net">DC@atmc.net</a> with your plans or call (910) 393-7690.
        <br /><br /><div class="quote">"Online, a company is only as good as it's reputation and online representation.<br />Is your website presenting your company to it's best ability?" - 13 Willows</div>
    
    <?php } ?>
    </div>
    
</div>

<div class="footer" align="center">
    <div>
        <div>Copyright &copy;2010</div>
        <div class="right"><a href="mailto:webmaster@13willows.com">webmaster@13willows.com</a></div>
    </div>
</div>

</body>
</html>