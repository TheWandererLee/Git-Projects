<?php //if(!ob_start("ob_gzhandler")) ob_start();
if (extension_loaded("zlib") && (ini_get("output_handler") != "ob_gzhandler")) {
    ini_set("zlib.output_compression", 1);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Elite Wood Classics</title>
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
<meta name="description" content="Elite Wood Classics with Divine Designs" />
<meta name="keywords" content="elite, wood, classics, divine, designs, nc" />
<!-- <link rel="stylesheet" href="scripts/style.css" type="test/css" media="screen" /> -->
<style type="text/css" media="screen">
body {
	background-image: url(images/bgMain.png);
	background-repeat: repeat-x;
	background-color: #FFFFFF;
	color: #333333;
	margin-top: 32px;
	font-family: Arial, Helvetica, sans-serif;
}
td {
	font-size: 16px;
}
a.nav {
	color: #336699;
	font-weight: bold;
	text-decoration: none;
	font-size: 18px;
}
a.navcurrent {
	color: #336699;
	font-weight: bold;
	text-decoration: underline;
	font-size: 18px;
}
a.nav:hover {
	color: #0099FF;
}
a.navcurrent:hover {
	color: #0099FF;
}
a {
	color: #0033FF;
}
a:hover {
	color: #0099FF;
}
h1.header {
	font-family: Lucida Calligraphy, Segoe Script, Monotype Corsiva, cursive;
	font-size: 20px;
	text-decoration: underline;
}
h1.listHeader {
	font-size: 18px;
}
li {
	font-size: 12px;	
}
.lucida {
	font-family: Lucida Calligraphy, Segoe Script, Monotype Corsiva, cursive;
}
#page2, #page3, #page4, #page5, #page6, #page7 {
	visibility: hidden;
}

#page7 {
	line-height: 15px;
}

#galleryFlash { margin-left: -13px; }
#master0 img { position:relative;left:-16px;}
</style>
<script src="scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<!--<script type="text/javascript" src="scripts/mootools.js"></script>-->
<?php
echo '<script type="text/javascript">';
readfile("scripts/mootools.js");
echo '</script>';
?>
<script type="text/javascript" src="scripts/slide.js"></script>

<script type="text/javascript" language="javascript">
<!--
function getMovie(movieName) {
    if (navigator.appName.indexOf("Microsoft") != -1) {
        return window[movieName];
    } else {
        return document[movieName];
    }
}
var myflash = document.getElementById('soundControl');//getMovie("Sound Control");
function galleryOn() {
	setTimeout("showGallery()", 500);
	loadGallery();
	//setTimeout("document.getElementById('galleryFlash').style.display='block';", 500);
	//myflash.gallerySong();
}
function galleryOff() {
	document.getElementById('galleryFlash').style.display='none';
	//myflash.mainSong();
}
//-->
</script>
<script type="text/javascript">
	//window.addEventListener('onload', windowLoaded, false);
	
	window.onload = function() {
		setTimeout("showPages()",100);
		
		
	}
	function showPages() {
		for (var i=2; i<=7; i++) {
			document.getElementById('page'+i).style.visibility = 'visible';
		}
	}
	
	function showGallery() {
		document.getElementById('galleryFlash').style.display = 'block';
	}
	function loadGallery() { // Gallery image preloading
		var preImg = new Array();
		for (var i=1; i<=76; i++) {
			new Image().src = "images/gallery/gallery"+i+".jpg";
		}
	}
	var fadeimages=new Array()
	//Image Paths 368x276
	fadeimages[0]=["images/home/home12.jpg", "", ""]
	fadeimages[1]=["images/pictures/front.jpg", "", ""]
	/*
	fadeimages[1]=["photo2.jpg", "http://www.cssdrive.com", ""] //image with link syntax
	fadeimages[2]=["photo3.jpg", "http://www.javascriptkit.com", "_new"] //image with link and target syntax
	*/
	var fadebgcolor="white"
	////Background operations/////////////
	var fadearray=new Array() //array to cache fadeshow instances
	var fadeclear=new Array() //array to cache corresponding clearinterval pointers
	var dom=(document.getElementById) //modern dom browsers
	var iebrowser=document.all
	function fadeshow(theimages, fadewidth, fadeheight, borderwidth, delay, pause, displayorder){
	this.pausecheck=pause
	this.mouseovercheck=0
	this.delay=delay
	this.degree=10 //initial opacity degree (10%)
	this.curimageindex=0
	this.nextimageindex=1
	fadearray[fadearray.length]=this
	this.slideshowid=fadearray.length-1
	this.canvasbase="canvas"+this.slideshowid
	this.curcanvas=this.canvasbase+"_0"
	if (typeof displayorder!="undefined")
	theimages.sort(function() {return 0.5 - Math.random();})
	this.theimages=theimages
	this.imageborder=parseInt(borderwidth)
	this.postimages=new Array() //preload images
	for (p=0;p<theimages.length;p++){
	this.postimages[p]=new Image()
	this.postimages[p].src=theimages[p][0]
	}
	var fadewidth=fadewidth+this.imageborder*2
	var fadeheight=fadeheight+this.imageborder*2
	if (iebrowser&&dom||dom) //if IE5+ or modern browsers (ie: Firefox)
	document.write('<div id="master'+this.slideshowid+'" style="position:relative;width:'+fadewidth+'px;height:'+fadeheight+'px;overflow:hidden;"><div id="'+this.canvasbase+'_0" style="position:absolute;width:'+fadewidth+'px;height:'+fadeheight+'px;top:0;left:0;filter:progid:DXImageTransform.Microsoft.alpha(opacity=10);opacity:0.1;-moz-opacity:0.1;-khtml-opacity:0.1;background-color:'+fadebgcolor+'"></div><div id="'+this.canvasbase+'_1" style="position:absolute;width:'+fadewidth+'px;height:'+fadeheight+'px;top:0;left:0;filter:progid:DXImageTransform.Microsoft.alpha(opacity=10);opacity:0.1;-moz-opacity:0.1;-khtml-opacity:0.1;background-color:'+fadebgcolor+'"></div></div>')
	else
	document.write('<div><img name="defaultslide'+this.slideshowid+'" src="'+this.postimages[0].src+'"></div>')
	if (iebrowser&&dom||dom) //if IE5+ or modern browsers such as Firefox
	this.startit()
	else{
	this.curimageindex++
	setInterval("fadearray["+this.slideshowid+"].rotateimage()", this.delay)
	}
	}
	function fadepic(obj){
	if (obj.degree<100){
	obj.degree+=10
	if (obj.tempobj.filters&&obj.tempobj.filters[0]){
	if (typeof obj.tempobj.filters[0].opacity=="number") //if IE6+
		obj.tempobj.filters[0].opacity=obj.degree
	else //else if IE5.5-
		obj.tempobj.style.filter="alpha(opacity="+obj.degree+")"
	}
	else if (obj.tempobj.style.MozOpacity)
		obj.tempobj.style.MozOpacity=obj.degree/101
	else if (obj.tempobj.style.KhtmlOpacity)
		obj.tempobj.style.KhtmlOpacity=obj.degree/100
	else if (obj.tempobj.style.opacity&&!obj.tempobj.filters)
		obj.tempobj.style.opacity=obj.degree/101
	}
	else{
	clearInterval(fadeclear[obj.slideshowid])
	obj.nextcanvas=(obj.curcanvas==obj.canvasbase+"_0")? obj.canvasbase+"_0" : obj.canvasbase+"_1"
	obj.tempobj=iebrowser? iebrowser[obj.nextcanvas] : document.getElementById(obj.nextcanvas)
	obj.populateslide(obj.tempobj, obj.nextimageindex)
	obj.nextimageindex=(obj.nextimageindex<obj.postimages.length-1)? obj.nextimageindex+1 : 0
	setTimeout("fadearray["+obj.slideshowid+"].rotateimage()", obj.delay)
	}
	}
	fadeshow.prototype.populateslide=function(picobj, picindex){
	var slideHTML=""
	if (this.theimages[picindex][1]!="") //if associated link exists for image
	slideHTML='<a href="'+this.theimages[picindex][1]+'" target="'+this.theimages[picindex][2]+'">'
	slideHTML+='<img src="'+this.postimages[picindex].src+'" border="'+this.imageborder+'px">'
	if (this.theimages[picindex][1]!="") //if associated link exists for image
	slideHTML+='</a>'
	picobj.innerHTML=slideHTML
	}
	fadeshow.prototype.rotateimage=function(){
	if (this.pausecheck==1) //if pause onMouseover enabled, cache object
	var cacheobj=this
	if (this.mouseovercheck==1)
	setTimeout(function(){cacheobj.rotateimage()}, 100)
	else if (iebrowser&&dom||dom){
	this.resetit()
	var crossobj=this.tempobj=iebrowser? iebrowser[this.curcanvas] : document.getElementById(this.curcanvas)
	crossobj.style.zIndex++
	fadeclear[this.slideshowid]=setInterval("fadepic(fadearray["+this.slideshowid+"])",50)
	this.curcanvas=(this.curcanvas==this.canvasbase+"_0")? this.canvasbase+"_1" : this.canvasbase+"_0"
	}
	else{
	var ns4imgobj=document.images['defaultslide'+this.slideshowid]
	ns4imgobj.src=this.postimages[this.curimageindex].src
	}
	this.curimageindex=(this.curimageindex<this.postimages.length-1)? this.curimageindex+1 : 0
	}
	fadeshow.prototype.resetit=function(){
	this.degree=10
	var crossobj=iebrowser? iebrowser[this.curcanvas] : document.getElementById(this.curcanvas)
	if (crossobj.filters&&crossobj.filters[0]){
	if (typeof crossobj.filters[0].opacity=="number") //if IE6+
	crossobj.filters(0).opacity=this.degree
	else //else if IE5.5-
	crossobj.style.filter="alpha(opacity="+this.degree+")"
	}
	else if (crossobj.style.MozOpacity)
	crossobj.style.MozOpacity=this.degree/101
	else if (crossobj.style.KhtmlOpacity)
	crossobj.style.KhtmlOpacity=this.degree/100
	else if (crossobj.style.opacity&&!crossobj.filters)
	crossobj.style.opacity=this.degree/101
	}
	fadeshow.prototype.startit=function(){
	var crossobj=iebrowser? iebrowser[this.curcanvas] : document.getElementById(this.curcanvas)
	this.populateslide(crossobj, this.curimageindex)
	if (this.pausecheck==1){ //IF SLIDESHOW SHOULD PAUSE ONMOUSEOVER
	var cacheobj=this
	var crossobjcontainer=iebrowser? iebrowser["master"+this.slideshowid] : document.getElementById("master"+this.slideshowid)
	crossobjcontainer.onmouseover=function(){cacheobj.mouseovercheck=1}
	crossobjcontainer.onmouseout=function(){cacheobj.mouseovercheck=0}
	}
	this.rotateimage()
	}
</script>

<!-- Google Analytics -->
<script type="text/javascript">var _gaq = _gaq || [];_gaq.push(['_setAccount', 'UA-389885-4']);_gaq.push(['_trackPageview']);(function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script>
</head>
<body>
<table width="992" align="center" border="0" cellspacing="0" cellpadding="0">
<tr><td width="992" height="138" valign="bottom" align="center" background="images/header.jpg" style="background-repeat: no-repeat;">
</td></tr>
<tr><td align="left" background="images/bgTile.png" style="padding-left: 28px; padding-right: 28px; padding-bottom: 12px; text-indent: 16px;">
<table align="center" cellpadding="0" cellspacing="0" border="0" width="100%"><tr>
<td align="center"><a id="l_slide1" onclick="galleryOff();" href="#" class="navcurrent">Home</a></td>
<td align="center"><a id="l_slide2" onclick="galleryOff();" href="#" class="nav">Services</a></td>
<td align="center"><a id="l_slide7" onclick="galleryOff();" href="#" class="nav">Flooring</a></td>
<td align="center"><a id="l_slide3" onclick="galleryOff();" href="#" class="nav">Distributors</a></td>
<td align="center"><a id="l_slide4" onclick="galleryOff();" href="#" class="nav">Interior Decorating</a></td>
<td align="center"><a id="l_slide5" onclick="galleryOn();" href="#" class="nav">Gallery</a></td>
<td align="center"><a id="l_slide6" onclick="galleryOff();" href="#" class="nav">Contact Us</a></td>
</tr></table>
<hr width="100%" size="1" />
<div style="position: relative;">
    <div id="page1"> <!-- Home -->
        <table cellpadding="0" cellspacing="0" border="0" width="100%"><tr><td valign="top" align="center">
        <b>Elite Wood Classics, Inc. strives to make your Dream Kitchen a Reality. 
        <br />We offer the best Quality &amp; Worksmanship.
        <br />After all, a Kitchen is the Heart of the Home.</b>
        <!-- Welcome to Elite Wood Classics! We here at Elite Wood Classics strive to make your cabinetry &amp; countertop dreams come true. We offer a broad variety of product styles to give you the best possible selection that suits your desires, at an unbeatable price. Interested? Check out our previous works in the gallery, or read more about what we have to offer on the Services page. -->
        </td></tr>
        <tr><td height="16"></td></tr>
        <tr><td align="center">
        <script type="text/javascript">
        //new fadeshow(IMAGES_ARRAY_NAME, slideshow_width, slideshow_height, borderwidth, delay, pause (0=no, 1=yes), optionalRandomOrder)
        new fadeshow(fadeimages, 368, 272, 0, 3000, 0, "R")
        </script>
        </td></tr>
        <tr><td height="16"></td></tr>
        <tr><td align="center">
        <b>Elite Wood Classics builds Traditions &amp; Memories that last a Lifetime.</b>
        </td></tr>
        </table>
    </div>
    <div style="position: absolute; top: 0px;">
        <div id="page2"> <!-- Services -->
        <img src="images/pictures/intro.jpg" width="269" height="358" style="float: right; padding-left: 8px;"><b>Elite Wood Classics, Inc.</b> provides quality cabinetry, countertops, and decorating services to our customers.
        As owners we ensure that you not only get the quality you desire, but also the best workmanship.
        We do our own installation and work directly with homeowners, contractors, and architects.
        We also provide the right resources for making your dream home or business come true.
        We take pride in our work and aim for customer satisfaction.
        <br /><br />We offer many types of custom cabinetry as well as a variety of different affordable cabinet lines.
        Our cabinet selection includes traditional to contemporary in a variety of designs to create a space that is as comfortable and <i>beautiful</i> as it is functional.
        With this variety and selection, we can easily meet all of our customers needs.
        <br /><br /><!--<img src="images/pictures/certified.jpg" style="float:left; padding-right: 8px;" alt="Advanced 20/20 Design Certificates" />--><b>Divine Designs by Christy Evans</b> offers Interior Decorating Coordinating different colors, textures, and styles.
        Interior decorating involves changing the décor of a room and using the available space to make it look attractive and functional.
        Decorating a home yourself can be difficult and frustrating, let me help you coordinate and decorate using paint, wallpaper, flooring, lighting, furnishings, carpets, etc. to create an attractive finished design.
        I know where to send my customers to get materials at a great price.
        This process will save you <i>time</i> as well as <i>money</i>.
        </div>
    </div>
    <div style="position: absolute; top: 0px;">
        <div id="page3"> <!-- Distributors -->
        	<div style="float: left; width: 50%">
                <h1 class="listHeader">Cabinetry</h1>
                <ul>
                    <li><a href="http://www.elitewoodclassics.com">Elite Wood Classics Custom Cabinetry</a></li>
                    <li><a href="http://www.starmarkcabinetry.com">Starmark Cabinetry</a></li>
                    <li><a href="http://www.marshfurniture.com">Marsh Cabinetry</a></li>
                    <li><a href="http://www.qualitycabinets.com">Quality Cabinets</a></li>
                </ul>
                <h1 class="listHeader">Countertops</h1>
                <ul>
                    <li>Granite</li>
                    <li><a href="http://www.silestoneusa.com">Quartz - Silestone</a></li>
                    <li>Hanstone</li>
                    <li><a href="http://www.vetrazzo.com">Recycled Glass - Vetrazzo</a></li>
                    <li>Bamboo Countertops &amp; Bamboo Vessel Sinks - Earth Friendly</li>
                    <li>Solid Surface: Hi-Macs, Formica, Corian</li>
                    <li>Laminate</li>
                    <li>Stainless Steel</li>
                </ul>
                <h1 class="listHeader">Hardware</h1>
                <ul>
                	<li><a href="http://www.hardwareresources.com">Hardware Resources</a> - Offers the best affordable decorative hardware and decorative vanities.</li>
                </ul>
            </div>
            <div style="float: left; width: 50%">
            	<h1 class="listHeader">Flooring</h1>
                <ul>
                	<li><a href="http://www.shawfloors.com">Shaw Floors</a></li>
                    <li><a href="http://www.mohawkflooring.com">Mohawk Flooring</a></li>
                    <li><a href="http://www.daltile.com">Daltile</a></li>
                    <li><a href="http://www.floridatile.com">Florida Tile</a></li>
                    <li><a href="http://www.horizonforest.com">Horizon Forest &amp; Long Floor</a></li>
                    <li><a href="http://www.jjhaines.com">JJ Haines</a></li>
                    <li><a href="http://www.shawgreenedge.com">Shaw Green Edge</a></li>
                    <li><a href="http://americanolean.com">American Olean</a></li>
                    <li><a href="http://www.cmhspace.com">CMH Space</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div style="position: absolute; top: 0px;">
        <div id="page4"> <!-- Interior Decorating -->
        <table border="0" cellpadding="0" cellspacing="0">
        <tr><td>
            <b>Divine Designs by Christy Evans</b> offers Interior Decorating Coordinating different colors, textures, and styles.
            Interior decorating involves changing the décor of a room and using the available space to make it look attractive and functional.
            Decorating a home yourself can be difficult and frustrating, let me help you coordinate and decorate using paint, wallpaper, flooring, lighting, furnishings, carpets, etc. to create an attractive finished design.
            I know where to send my customers to get materials at a great price. This process will save you <i>time</i> as well as <i>money</i>.
            <br /><br /><b>Decorating Fees</b>: The cost will be determined by the scope and nature of the project. Some services are billed on an hourly basis; others on a project basis.
            Estimates are provided and references are available on request.
            Contact me to schedule your in-home consultation. Appointments only 910-470-2470
            <br /><br /><div align="center"><a href="http://www.divinedesignsnc.com">www.DivineDesignsNC.com</a></div>
        </td><td align="center">
            <img src="images/pictures/family.jpg" alt="Christy Evans Interior Decorator">
            <div align="center" style="font-weight: bold;" class="lucida">Christy Evans<br /><sup>Owner/Designer/Decorator</sup></div>
        </td></tr>
        </table>
        <!--
        We offer beautiful decorative hardware for kitchen and bathrooms.
        Imagine being able to see your new kitchen before the cabinetry is even made or ordered.
        Among the many unique services offered by <u>Elite Wood Classics with Divine Designs</u> is the chance to view your new kitchen with our designer using state of the art design software that maps a complete 3D layout of your kitchen so that you can visualize how your kitchen will look.
        -->
        </div>
    </div>
    <div style="position: absolute; top: 0px;">
        <div id="page5"> <!-- Gallery -->
        
		<div id="galleryFlash" style="display: block;">
			<script type="text/javascript">
			AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','928','height','352','title','Gallery','src','flash/gallery','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/gallery' ); //end AC code
			</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="928" height="352" title="Gallery">
			<param name="movie" value="flash/gallery.swf" />
			<param name="quality" value="high" />
			<embed src="flash/gallery.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="928" height="352"></embed>
			</object></noscript>
		</div>
	</div>
    </div>
    <div style="position: absolute; top: 0px;">
        <div id="page6" style="padding-left: 24px;"> <!-- Contact Us -->
        <table cellpadding="0" cellspacing="0" border="0" width="100%"><tr><td>
        <h1 class="header" style="text-decoration: none;">Elite Wood Classics, Inc.</h1>
        Showroom Location
        <br /><sub style="font-size: 12px;">at Smithville Crossing Shopping Center</sub>
        <table cellpadding="0" cellspacing="0" border="0" style="margin-top: 16px; margin-bottom: 16px;"><tr><td>
        <b>Elite Wood Classics With Divine Designs</b>
        </td></tr><tr><td>
        1513 Suite-13 N. Howe Street
        </td></tr><tr><td>
        Southport, NC 28461
        </td></tr></table>
        <a href="http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=Elite+Wood+Classic,+NC&ll=33.945852,-78.020782&spn=0.038307,0.090895&z=14&iwloc=A" style="font-weight: bold;">Get Directions To...</a>
        </td><td align="right">
        <a href="http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=Elite+Wood+Classic,+NC&ll=33.945852,-78.020782&spn=0.038307,0.090895&z=14&iwloc=A"><img src="images/map.jpg" width="416" height="256" border="0"></a>
        </td></tr></table>
        <table cellpadding="0" cellspacing="0" border="0" style="margin-top: 0px;">
        <tr><td height="1" colspan="5" style="background-color: #808080;"></td></tr>
        <tr><td valign="top" style="padding-top: 16px;">
        <br />Office: (910) 454-8745
        <br />Fax: (910) 454-8746
        <br />Email: <a href="mailto:elitewoodclassics@eastnc.twcbc.com">elitewoodclassics@eastnc.twcbc.com</a>
        </td>
        <td width="16"></td><td width="1" style="background-color: #808080;"></td><td width="16"></td>
        <td style="padding-top: 16px;">
        <b style="text-decoration: underline;">Hours of Business</b>
        <ul>
        <li>Monday-Thursday 9:00am - 4:00pm (CLOSED for lunch 12:00pm - 1:00pm)</li>
        <li>Friday &amp; Saturday by appointment only</li>
        <li>Evening appointments available</li>
        </ul>
        </td></tr></table>
        </div>
    </div>
    <div style="position: absolute; top: 0px;">
    	<div id="page7" width="100%"> <!-- Flooring -->
        	<span style="font-size: 12px">
                <img src="images/home/flooring.jpg" style="float: left; padding: 8px" align="middle" width="307" height="173" alt="Elite Wood Classics Flooring" />
                <b>Attention Customers</b> Elite Wood Classics <b>not only</b> specializes in Beautiful Kitchens and Countertops <b>but</b> we now offer a broad selection of flooring to meet all of your needs.  We want to be a one-stop shop for YOU!
                <br /><br />If you're looking for affordable quality hardwood floors, engineered hardwood floors, laminate flooring, tile, or carpet, look no further than Elite Wood Classics of Southport. We are the premier, one-stop source for all your residential and commercial flooring needs in Brunswick County.
                <br /><br />We have a breathtaking array of solid hardwood flooring and engineered hardwood flooring in red oak, maple, Brazilian cherry, mahogany, Bamboo and many others. High-traffic home or business customers will love our remarkable wood-look laminate floors. Today's laminates are almost indistinguishable from solid hardwood – plus, laminate floors offer superior scratch resistance, which makes these floors perfect for businesses, families, and pet owners.
                <br /><br />If you're thinking about adding a touch of warmth and luxury to your home or business, we offer every style of carpet imaginable, including plush nylon frieze, Saxony, Berber, and a variety of patterns in beautiful colors as well as eco-friendly. You'll also find an amazing selection of colors, textures, and sizes in our ceramic tile and porcelain tile collections.
                <br /><br />With all of these flooring choices, you may want to enlist the services of our professional design specialist, who is ready to assist you. In fact, we will be there every step of the way with our reputable, honest, personalized service.
                <br /><br />From hardwood floor installation to ceramic tile installation to carpet installation, you can depend on the skilled craftsmanship of our installers. Plus, all of our hardwood floors, engineered hardwood floors, laminate floors, floor tile, and carpets come with exceptional manufacturers' warranties.
                <br /><br />Whether you are in visiting beautiful Southport or live in Brunswick County, or anywhere in the area, contact us for a free estimate at (910) 454-8745. Stop by our showroom today and find out why we're better than any big box or flooring stores in Brunswick County.
            </span>
        </div>
    </div>
</div>
</td></tr>
<tr><td align="right" valign="top" width="992" height="64" background="images/footer.png">
<table cellpadding="0" cellspacing="0" border="0" width="100%"><tr>
<td align="right" width="654">
<script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','104','height','24','title','soundControl','src','flash/soundControl','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/soundControl' ); //end AC code
</script>
<noscript><object id="soundControl" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="104" height="24" title="soundControl">
<param name="movie" value="flash/soundControl.swf">
<param name="quality" value="high">
<param name="allowSciptAccess" value="always">
<embed src="flash/soundControl.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="104" height="24"></embed>
</object></noscript>
</td>
<td align="right" style="font-size: 9px; color: #666666; padding-right: 20px; padding-top: 4px;">
Copyright &copy;2013 Divine Designs | <a href="mailto:elitewoodclassics@eastnc.twcbc.com">Email Us</a> | Phone: (910) 454-8745<br />

<div style="position: relative; display: none">
	<div id="adminDiv" style="display: block; position: absolute; top: 0px; left: 32px;">
		<a href="#" onclick="document.getElementById('loginDiv').style.display = 'block'; document.getElementById('adminDiv').style.display = 'none';">Admin</a>
	</div>
	<div id="loginDiv" style="display: none; position: absolute; top: 0px; left: 32px;">
		<form method="post" action="index.php">
			<input name="pword" type="password" size="8" style="font-size: 9px;" />
			<input type="submit" value="Login" style="font-size: 9px;" />
		</form>
	</div>
</div>
designed by <a href="http://portfolio.13willows.com">13 Willows Web Design</a>
</td></tr></table>
</td></tr>
</table>

<!--<form name="logoutForm" method="post" action="index.php">
<input type="hidden" name="logout" value="yes" />
</form>-->
</body>
</html>