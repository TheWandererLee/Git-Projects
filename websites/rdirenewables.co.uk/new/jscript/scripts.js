

var enableCuffon = true;	// use cuffon

var breakingStart = true;	// autostart breaking news
var breakingSpeed = 40;		// breaking msg speed


var blankPX = "images/px.gif";
var breakingScroll = 0;
var breakingOffset = 0;
var elementsToClone = true;
var theCount = 0;

if (window.devicePixelRatio >= 2) {
	var enableCuffon = false;
}

jQuery(document).ready(function() {
	
	if(enableCuffon){
		jQuery('body').addClass('withcuffon');
	}
	
	jQuery("body").append("<div class='themobile-top'><a href='#' class='mobile-menu-toggle'><span class='icon-text'>&#9776;</span> Main Menu</a></div>");
	
	jQuery(".mobile-menu-toggle").click(function (){
		jQuery("body").toggleClass("mobile-menu-enabled");
		return false;
	});
	
	start();
	
	jQuery('.breaking-message').mouseover(function (){
		breakingStart = false;
		jQuery('.breaking-line ul').stop(true);
	}).mouseout(function (){
		breakingStart = true;
		start();
	});

	jQuery("img.setborder").each(function() {
		jQuery(this).wrap("<span class='set-image-border'>");
		jQuery(this).parent().css("margin", jQuery(this).css("margin")).css("padding", jQuery(this).css("padding")).css("float", jQuery(this).css("float"));
		if(jQuery(this).css("position") == "absolute"){
			jQuery(this).parent().css("position", "absolute");
			jQuery(this).css("position", "relative");
		}
		jQuery(this).css("margin", "0px").css("padding", "0px").css("float", "none").css("position", "relative");
	});

	/*jQuery("img.setborder").one('load', function() {
		var thisWidth = parseInt(jQuery(this).css("width"));
		var thisHeight = parseInt(jQuery(this).css("height"));
		var thisSrc = jQuery(this).attr("src");
		if(thisWidth == 0){setTimeout(function (){
			jQuery(this).load();
		}, 100);return false;}
		jQuery(this).css("width", thisWidth+"px");
		jQuery(this).attr('style', 'height: '+thisHeight+'px !important');
		jQuery(this).attr("src", blankPX);
		jQuery(this).css("background-image", "url("+thisSrc+")");
		jQuery(this).addClass("border-set");
		//alert(thisWidth);
	}).each(function() {
		if(this.complete) jQuery(this).load();
	});*/

	// jQuery("img.setborder").each(function() {
	// 	if(!jQuery(this).hasClass("border-set")){
	// 		var thisWidth = parseInt(jQuery(this).css("width"));
	// 		var thisHeight = parseInt(jQuery(this).css("height"));
	// 		var thisSrc = jQuery(this).attr("src");
	// 		jQuery(this).css("width", thisWidth+"px");
	// 		jQuery(this).attr('style', 'height: '+thisHeight+'px !important');
	// 		jQuery(this).attr("src", blankPX);
	// 		jQuery(this).css("background-image", "url("+thisSrc+")");
	// 	}
	// });
	
	
	jQuery(".relative-block").each(function (index){
		jQuery(this).css("height", jQuery(".footer-content").height()+"px");
	});
	
	jQuery(".panel-content .title-top a.tabbed-panel").click(function (){
		var thatitle = jQuery(this).attr("title");
		var thalink = jQuery(this).attr("href").split("#");
		jQuery(this).parent().parent().parent().children("h3").html(jQuery(this).attr("title"));
		jQuery(this).parent().parent().parent().children(".panel-content").hide();
		jQuery(this).parent().parent().parent().children("."+thalink[1]).show();
		return false;
	});
	
	jQuery(".gallery-navi-right").click(function (){
		var thiscount = parseInt(jQuery(this).parent().find("ul li").size())-1;
		var thisindex = parseInt(jQuery(this).parent().find("ul li.active").index());
		var thisnext = (thisindex >= thiscount)?(0):(thisindex+1);
		
		jQuery(this).parent().find("ul li.active").addClass("current");
		jQuery(this).parent().find("ul li.current").removeClass("active");
		jQuery(this).parent().find("ul li").eq(thisnext).addClass("active");
		jQuery(this).parent().find("ul li.current").removeClass("current");
		return false;
	});
	
	jQuery(".gallery-navi-left").click(function (){
		var thiscount = parseInt(jQuery(this).parent().find("ul li").size())-1;
		var thisindex = parseInt(jQuery(this).parent().find("ul li.active").index());
		var thisnext = (thisindex <= 0)?(thiscount):(thisindex-1);
		
		jQuery(this).parent().find("ul li.active").addClass("current");
		jQuery(this).parent().find("ul li.current").removeClass("active");
		jQuery(this).parent().find("ul li").eq(thisnext).addClass("active");
		jQuery(this).parent().find("ul li.current").removeClass("current");
		return false;
	});
	
	jQuery('.main-menu.isfloatable').each(function (index){
		jQuery(this).clone().appendTo('.header').addClass('this-floating');
	});
	
	var menuPadding = 0;
	var paddingTo = 13;
	
	jQuery(".search-box input[type=text]").focus(function (){
		menuPadding = parseInt(jQuery(".main-menu-ul > li a").css("padding-right"));
		jQuery(".main-menu-ul > li > a").css("padding-left", paddingTo+"px").css("padding-right", paddingTo+"px");
	}).blur(function (){
		jQuery(".main-menu-ul > li > a").css("padding-left", menuPadding+"px").css("padding-right", menuPadding+"px");
	});
	
	var theFontSize = 13;
	
	jQuery("a[href=#change-font-size]").click(function (){
		if(jQuery(this).attr("rel") == "up"){
			theFontSize = (theFontSize < 30)?theFontSize+2:theFontSize;
		}else
		if(jQuery(this).attr("rel") == "down"){
			theFontSize = (theFontSize > 13)?theFontSize-2:theFontSize;
		}
		
		jQuery(".changable-content, .changable-content p").css("font-size", theFontSize+"px");
		return false;
	});
	
	var theLineSpace = 150;
	
	jQuery("a[href=#change-line-space]").click(function (){
		if(jQuery(this).attr("rel") == "up"){
			theLineSpace = (theLineSpace < 300)?theLineSpace+20:theLineSpace;
		}else
		if(jQuery(this).attr("rel") == "down"){
			theLineSpace = (theLineSpace > 150)?theLineSpace-20:theLineSpace;
		}
		
		jQuery(".changable-content, .changable-content p").css("line-height", theLineSpace+"%");
		return false;
	});
	
	
	jQuery(".article-main-content .youtube-video a").click(function (){
		var videoID = jQuery(this).attr("href").split("#");
		var videoWidth = parseInt(jQuery(this).parent().parent().css("width"));
		var videoHeight = Math.ceil(videoWidth*(0.56)+1);
		
		jQuery(this).hide();
		jQuery(this).parent().append('<iframe width="'+videoWidth+'" height="'+videoHeight+'" src="http://www.youtube.com/embed/'+(videoID[1])+'?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>');
		return false;
	});
	
	jQuery(".tabbed-block .tabbed-header a").click(function (){
		jQuery(".tabbed-block .tabbed-header a").removeClass("active");
		
		jQuery(".tabbed-block .tabbed-body > div.active").removeClass("active");
		jQuery(".tabbed-block .tabbed-body > div").eq(jQuery(this).index()).addClass("active");
		
		jQuery(this).toggleClass("active");
		return false;
	});
	
	jQuery(".destroy-button").click(function (){
		jQuery(this).parent().fadeOut('fast');
		return false;
	});
	
	jQuery(".accordion-block > div > a").click(function (){
		if(jQuery(this).parent().hasClass("active")){
			jQuery(this).parent().toggleClass('active');
			return false;
		}
		jQuery(this).parent().parent().children().removeClass('active');
		jQuery(this).parent().toggleClass('active');
		return false;
	});
	
	var thewidth = 0;
	
	jQuery(".photo-line-arrow-right").click(function (){
		var thecount = (jQuery(".actual-photo-line ul li").size())-1;
		console.log((thecount*(parseInt(jQuery(".actual-photo-line ul li").css("width"))+parseInt(jQuery(".actual-photo-line ul li").css("margin-right")))+parseInt(jQuery(".actual-photo-line").css("width"))));
		if((thecount*(parseInt(jQuery(".actual-photo-line ul li").css("width"))+parseInt(jQuery(".actual-photo-line ul li").css("margin-right")))) < Math.abs(thewidth)+parseInt(jQuery(".actual-photo-line").css("width")))return false;
		thewidth = thewidth-(parseInt(jQuery(".actual-photo-line ul li").css("width"))+parseInt(jQuery(".actual-photo-line ul li").css("margin-right")));
		jQuery(this).parent().find(".actual-photo-line ul").css("left", thewidth+"px");
		return false;
	});
	
	jQuery(".photo-line-arrow-left").click(function (){
		if(thewidth >= 0)return false;
		thewidth = thewidth+(parseInt(jQuery(".actual-photo-line ul li").css("width"))+parseInt(jQuery(".actual-photo-line ul li").css("margin-right")));
		jQuery(this).parent().find(".actual-photo-line ul").css("left", thewidth+"px");
		return false;
	});
	
	jQuery(".lightbox").click(function () {
		jQuery(".lightbox").css('overflow', 'hidden');
		jQuery("body").css('overflow', 'auto');
		jQuery(".lightbox .lightcontent").fadeOut('fast');
		jQuery(".lightbox").fadeOut('slow');
    }).children().click(function(e) {
		return false;
	});
	
});


function lightboxclose(){
	jQuery(".lightbox").css('overflow', 'hidden');
	jQuery(".lightbox .lightcontent").fadeOut('fast');
	jQuery(".lightbox").fadeOut('slow');
	jQuery("body").css('overflow', 'auto');
}

jQuery(document).scroll(function() {
	var position = jQuery(window).scrollTop();
	var pos = jQuery(".main-menu.isfloatable").position();
	if(position <= (pos.top+20)) {
		jQuery(".this-floating").hide();
	}else{
		jQuery(".this-floating").show();
	}
});

function start() {
	if(jQuery('.breaking-line ul').size() > 0){
		if(!breakingStart)return false;
		var theBreakingMargin = parseInt(jQuery('.breaking-line ul li').css("margin-right"));
		if(elementsToClone){  
			var theBreakingWidth = parseInt(jQuery('.breaking-line').css("width"));
			theCount = (jQuery('.breaking-line ul > li').size()*(theBreakingWidth+theBreakingMargin));
			jQuery('.breaking-line ul li').clone().appendTo('.breaking-line ul');
			elementsToClone = false;
		}
		var theNumber = theCount+breakingOffset;
		if(Math.abs(theNumber) <= (Math.abs(breakingScroll))){
			cloneBreakingLine();
		}
		breakingScroll = breakingScroll-1;
		jQuery('.breaking-line ul').animate({left: breakingScroll+'px'}, breakingSpeed, 'linear', function(){ start(); });
	}
}

function cloneBreakingLine(){
	breakingScroll = 0;
	jQuery('.breaking-line ul').css("left", "0px");
}

function printArticle() {
	var html = jQuery(".changable-content").html();
	var htmltitle = jQuery(".article-big-header h2").html();
	if(jQuery(".the-article-content .article-photo img").size() > 0){var htmlphoto = jQuery(".the-article-content .article-photo img").css("background-image");}else{var htmlphoto = "";}
	if(jQuery(".header-logo .logo-img").size() > 0){var htmllogo = jQuery(".header-logo .logo-img").css("background-image");var logotext = false;}else{var htmllogo = jQuery(".header-logo").html();var logotext = true;}
	var htmlcopy = jQuery(".footer-copy .left").html();
	var htmlauthor = jQuery(".article-author .article-user strong").html();
	var htmldate = jQuery(".article-author .article-date strong").html();
	
	if(htmllogo != "none" && htmllogo != "" && logotext == false){
		var htmllogo = htmllogo.split("url(");
		var htmllogo = htmllogo[1].split(")");
		var htmllogo = "<img src='"+htmllogo[0]+"' style='max-width:100%;height:auto;' />";
	}
	
	if(htmlphoto != "none" && htmlphoto != ""){
		var htmlphoto = htmlphoto.split("url(");
		var htmlphoto = htmlphoto[1].split(")");
		var htmlphoto = "<img src='"+htmlphoto[0]+"' style='max-width:100%;height:auto;' />";
	}
	
	top.consoleRef=window.open('','articleprint',
		'width=680,height=800'
		+',menubar=0'
		+',toolbar=1'
		+',status=0'
		+',scrollbars=1'
		+',resizable=1');
	top.consoleRef.document.writeln(
		'<html><head><title>'+$(document).attr('title')+'</title><link type="text/css" rel="stylesheet" href="css/reset.css" /><link type="text/css" rel="stylesheet" href="css/print.css?'+Date()+'" /><link type="text/css" rel="stylesheet" href="css/shortcode.css?'+Date()+'" /></head>'
		+'<body onLoad="self.focus()"><div class="wrapper">'
		+htmllogo
		+'<h2>'+htmltitle+'</h2>'
		+'<div class="smallinfo"><strong>'+htmlauthor+'</strong><span>'+htmldate+'</span><a href="'+jQuery(location).attr('href')+'">'+jQuery(location).attr('href')+'</a></div>'
		+'<div class="article-main-content">'+htmlphoto+''+html+'</div>'
		+htmlcopy
		+'</div></body></html>'
		);
	top.consoleRef.document.close();
}


