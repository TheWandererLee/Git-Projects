//Hovel specific functions
/*************************************************************************|
:::NOTES:::

Remember when changing contents of the main window that need to be reflected in the "ghost" clone of the page,
	also call "getCloneById('ID')" on the same id to immediately duplicate the changes.

sliderPosition REPRESENTS the position of the Viewing Frame of the browser window, against the plane. (negative of 'body' div location)
	It does NOT represent the absolute position of the slider.

|*************************************************************************/

// 08/27/2013: Well, nothing is namespaced... Global namespace is massively polluted. There goes integrating other scripts that use these variable names, or running this script on another site.

var Server;
var pageWidth, pageHeight, lastmx, lastmy, currentDrag, currentResize, sliderDrag;
var bodyClone, sliderPointer, slideBarPointer, slideBarClonePointer;
var toolboxSlidingTo, toolboxHeight;
var mx, my, mb, dragX, dragY, dragPageX;
var momentumDecelerating = false;
var sliderDecelerating = false;
var momentumTrigger = 2; // Minimum amount the slider must be thrown to initiate momentum
var planeWidth = 3072;
var planeHeight = 1; // ACTUAL InnerViewframe height [ WILL OVERRIDE CSS HEIGHT ] between 0[0%] & 1[100%] is page height relative
var sliderHPadding = 64;
var sliderVPadding = 24;
var sliderHeight = 32;
var slideBarHeight = 16;
var sideScrollSense = 128; // Sensitivity
var sideScrollAccel = 0.5;
var sideScrollSpeed = 0;
var sliderPosition = 0;
var sliderMomentum = 0;
var pageAlign = "left"; // Page alignment on load. Example       FARLEF [     [LEF] [CEN] [RIG]     ] FARRIG
var pageScroll = 0;
var sideScrolling = false;
var sideScrollOpaque = false;
var enableSelect = true;

var sideScrollInterval, momentumDecelerateInterval, sliderDecelerateInterval, toolboxSlideInterval;

// cVars Values
// name, connected, chatColor, drawColor, chatMin mousePosition
// For Modules: position, size
try {
    var sndBloop = new Audio("sound/bloop.wav");
    var sndWelcome = new Audio("sound/welcome.wav");
} catch(e) {
    // Browser does not support HTML5 Audio
}

if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i))) var iPhone = [];
var cVars = []; // Our local client. Other clients accessed through cVars[clientID]['var']
cVars['mousePosition'] = [];
var conAttr = []; // Container Attributes
var zIndices = []; // Z-Index values of containers on the page

var ranInit = false; // DOMReady function. Page is loaded when tree is ready to be manipulated. 5-Browser support

/////////////////// Initiate Custom Events /////////////////
var readyEvent = document.createEvent("Event");
readyEvent.initEvent("readyEvent", true, true);
var conAdjustingEvent = document.createEvent("Event");
conAdjustingEvent.initEvent("conAdjustingEvent", true, true);
var conAdjustedEvent = document.createEvent("Event");
conAdjustedEvent.initEvent("conAdjustedEvent", true, true);
////////////////////////////////////////////////////////////

if (document.addEventListener) document.addEventListener("DOMContentLoaded", function(){initiateHovel();ranInit=true;}, false)
else if (document.all && !window.opera) {
  document.write('<script type="text/javascript" id="contentloadtag" defer="defer" src="javascript:void(0)"><\/script>');
  var contentloadtag=$("contentloadtag");
  contentloadtag.onreadystatechange=function(){
    if (this.readyState=="complete"){
	initiateHovel();
	ranInit=true;
    }
  }
}

window.onload=function(){ setTimeout("initiateHovel()", 0); }; // Regular fallback in case browser does not fire ready event.
window.onresize = function() {
	updateBoundaries();
	updateSliderSize();
	updateEdges();
	
	//DEBUG//$('con2').getElementsByTagName("div")[1].innerHTML = "Width: " + pageWidth + ", Height: " + pageHeight;
};
document.onselectstart = function(e) { return enableSelect; };
document.onmousedown = function(e) { mouseDown(e); };
document.onmousemove = function(e) { mouseMove(e); };
document.onmouseup = function(e) { mouseUp(e); };
document.oncontextmenu = function() { contextMenu = true; };

if (window.addEventListener) window.addEventListener('DOMMouseScroll', mouseWheel, false); // FF
document.onmousewheel = mouseWheel;

//window.onfocus = function() { cVars['focus'] = true; };
//window.onblur = function() { cVars['focus'] = false; };

function initiateHovel() {
	if (ranInit) return false;
	//$('body').onmousedown = function() { return false; }
	
	document.dispatchEvent(readyEvent);
	
	initiateBodyClone();
	initiateContainers();
	initiatePointers();
	initiateFunctions();
	
	updateBoundaries();
	
	$('innerViewframe').style.height = (planeHeight<=1)?(Math.round(planeHeight*100)+"%"):(planeHeight+"px");
	
	updateSliderSize();
	updateEdges();
	
	//sliderPosition = (planeWidth/3 - pageWidth) / 2;
	if (pageAlign == "center") {
		sliderPosition = Math.round(removePx(sliderPointer.style.width) / 2 - removePx(slideBarPointer.style.width) / 2);
	} else if (pageAlign == "farleft") {
		sliderPosition = 0;
	} else if (pageAlign == "farright") {
		sliderPosition = Math.ceil(removePx(sliderPointer.style.width) - removePx(slideBarPointer.style.width));
	} else if (pageAlign == "right") {
		sliderPosition = Math.ceil((2 * planeWidth / 3) * (removePx(sliderPointer.style.width) / planeWidth) - removePx(slideBarPointer.style.width));
	}
	if (pageAlign != "left") {
		updatePageOffset();
		sliderChanged();
	}
	
	//toolboxSlideInterval = setInterval("toolboxSlide(32)", 20);
}

function mouseWheel() {
    
}
function mouseMove(e) {
	getMousePosition(e);
	
	if (sideScrollOpaque && mx > sideScrollSense && mx < pageWidth - sideScrollSense) {
		$('arrowLeft').style.opacity = "0";
		$('arrowRight').style.opacity = "0";
		if (typeof $('arrowLeft').filters != "undefined") {
			$('arrowLeft').filters.alpha.opacity = "0";
			$('arrowRight').filters.alpha.opacity = "0";
		}
		$('arrowLeft').style.zIndex = "-2";
		$('arrowRight').style.zIndex = "-2";
		sideScrollOpaque = false;
	}
	
	if (currentDrag != null && lastmx != null) {
		dx = removePx(currentDrag.style.left);
		dy = removePx(currentDrag.style.top);
		maxy = pageHeight - removePx(currentDrag.style.height); maxy = Math.max(maxy,0);
		
		if (my < dragY) { my = dragY; } // Prevents containers from being dragged above viewframe
		//if (my > maxy + dragY) { my = maxy + dragY; } // Prevents containers from being dragged below viewframe
		
		//DEBUG//$('con2').getElementsByTagName("div")[1].innerHTML = "dragX: " + dragX + ", dragY: " + dragY + "<br />dx: " + dx + ", dy: " + dy + "<br />sliderPosition: " + sliderPosition + ", dragPageX: " + dragPageX;
		
		if ((mx <= sideScrollSense || mx >= pageWidth - sideScrollSense) && planeWidth > pageWidth) {
			if (mx <= sideScrollSense) {
				$('arrowLeft').style.opacity = String(1 - mx / sideScrollSense);
				if (typeof $('arrowLeft').filters != "undefined") $('arrowLeft').filters.alpha.opacity = (1 - mx / sideScrollSense) * 100;
			}
			if (mx >= pageWidth - sideScrollSense) {
				$('arrowRight').style.opacity = String((mx - pageWidth + sideScrollSense) / sideScrollSense);
				if (typeof $('arrowRight').filters != "undefined") $('arrowRight').filters.alpha.opacity = ((mx - pageWidth + sideScrollSense) / sideScrollSense) * 100;
			}
			
			if (!sideScrolling) {
				$('arrowLeft').style.zIndex = "1000000002";
				$('arrowRight').style.zIndex = "1000000002";
				sideScrollOpaque = true;
				
				sideScrolling = true;
				sideScrollInterval = setInterval("sideScroll();", 20); //sideScroll might set the new position of the dragged div if we are side scrolling.
			}
		}
		
		currentDrag.dispatchEvent(conAdjustingEvent); // Fires adjusted event for this container. This can be removed if it is only needed to be fired when movement finished
		//if (isModuleLoaded('drawModule')) { drawWindowMoved(); } // Fires when ANY container is moved
		
		// New Style of Container Moving, Absolute Position
		getCloneById(currentDrag.id).style.left = currentDrag.style.left = mx - dragX + "px";
		getCloneById(currentDrag.id).style.top = currentDrag.style.top = my+pageScroll - dragY + "px";
		
		// Old Style of Container Moving, Relative Position
		//getCloneById(currentDrag.id).style.left = currentDrag.style.left = dx + (mx-lastmx) + "px";
		//getCloneById(currentDrag.id).style.top = currentDrag.style.top = dy + (my-lastmy) + (pageScroll - lastPageScroll) + "px";
	} else if (sliderDrag != null) {
		if (planeWidth <= pageWidth) { return false; } // SliderDrag [ 1 = Absolute Drag | 2 = Relative/Proper Drag ]
		
		if (sliderDrag == 1) { // Absolute
			sliderPosition = Math.round(mx - removePx(sliderPointer.style.left) - removePx(slideBarPointer.style.width)/2);
		} else { // Relative
			slideBarPointer.style.left = String(removePx(slideBarPointer.style.left) + (mx-lastmx)) + "px";
			sliderPosition = Math.round(removePx(slideBarPointer.style.left));
		}
		
		//sliderMomentum = mx - lastmx;
		
		if (Math.abs(mx - lastmx) > Math.abs(sliderMomentum)) { sliderMomentum = sliderMomentum + (mx - lastmx) / 2; }

		if (!momentumDecelerating) {
			momentumDecelerating = true;
			momentumDecelerateInterval = setInterval("momentumDecelerate()", 50);
		}
		
		
		updatePageOffset();
		sliderChanged();
	} else if (currentResize != null) {
		dragX += (mx - lastmx);
		dragY += (my - lastmy);
		
		minW = (conAttr[currentResize.id]["minWidth"] != null) ? conAttr[currentResize.id]["minWidth"] : conAttr["_default"]["minWidth"];
		minH = (conAttr[currentResize.id]["minHeight"] != null) ? conAttr[currentResize.id]["minHeight"] : conAttr["_default"]["minHeight"];

		setX = (dragX < minW) ? minW : dragX;
		setY = (dragY < minH) ? minH : dragY;
		
		//if (removePx(currentResize.style.top) + setY > pageHeight) { setY = pageHeight - removePx(currentResize.style.top); } // Keeps resize on the page.
		
		getCloneById(currentResize.id).style.width = currentResize.style.width = String(setX) + "px";
		getCloneById(currentResize.id).style.height = currentResize.style.height = String(setY) + "px";
		
		currentResize.dispatchEvent(conAdjustingEvent); // Fires adjusted event for this container
		//if (isModuleLoaded('drawModule')) { drawWindowMoved(); } // Fires when ANY container is resized
	}
	
	//DEBUG//$('con3').getElementsByTagName("div")[1].innerHTML = "MouseX: " + mx + "<br />MouseY: " + my + "<br /><br /><div style=\"color: #F00; font-weight: bold;\">SpeedX: " + String(mx-lastmx) + "<br />SpeedY: " + String(my-lastmy);
	lastmx = mx;
	lastmy = my;
}
function mouseDown(e) {
	//if (typeof event != "undefined") { e = event; }
	
	e = (window.event)?window.event:e;
	if (e.which == null) mb = (e.button < 2) ? 0 : ((e.button == 4) ? 1 : 2); // IE
	else mb = (e.which < 2) ? 0 : ((e.which == 2) ? 1 : 2); // Others. // Returns [0:LEFT][1:MIDDLE][2:RIGHT] always
	
	if (e.srcElement) {
		current = e.srcElement;
		//DEBUG//$('con4').getElementsByTagName("div")[1].innerHTML = "Using srcElement to determine element.";
	} else if (e.target) {
		current = e.target;
		//DEBUG//$('con4').getElementsByTagName("div")[1].innerHTML = "Using target to determine element.";
	}
	
	if (current.id == "innerViewframe") { // Prevents the user from accidentally highlighting page contents
		//disableSelection(current); // This does not work in Opera / Firefox
		//DEBUG//$('con4').getElementsByTagName("div")[1].innerHTML += "<br /><b style=\"color: #F00;\">Not selecting any node.</b>";
	}
	
	//DEBUG//$('con4').getElementsByTagName("div")[1].innerHTML += "<br />Element under mouse: " + current.nodeName + "<br />ID: \"" + current.id + "\"<br />parentNode: " + current.parentNode.nodeName + "<br />parentNode ID: " + current.parentNode.id;
}
function mouseUp(e) {
	if (typeof event != "undefined") { e = event; }
	
	if (currentDrag != null) {
		if (typeof conAttr[currentDrag.id] != "undefined" && typeof conAttr[currentDrag.id]["bgColor"] != "undefined") {
			currentDrag.style.backgroundColor = conAttr[currentDrag.id]["bgColor"];
		} else {
			currentDrag.style.backgroundColor = conAttr["_default"]["bgColor"];
		}
		
		//currentDrag.style.zIndex = (typeof conAttr[currentDrag.id]["depth"] != "undefined") ? conAttr[currentDrag.id]["depth"] : conAttr["_default"]["depth"];
		
		currentDrag.dispatchEvent(conAdjustedEvent); // Fire container moved sub-event and finalize movement
		
		enableSelection(currentDrag);
		currentDrag = null;
		
		if (sideScrollOpaque) {
			$('arrowLeft').style.opacity = 0;
			$('arrowRight').style.opacity = 0;
			
			if (typeof $('arrowLeft').filters != "undefined") {
				$('arrowLeft').filters.alpha.opacity = 0;
				$('arrowRight').filters.alpha.opacity = 0;
			}
			
			$('arrowLeft').style.zIndex = "-2";
			$('arrowRight').style.zIndex = "-2";
			sideScrollOpaque = false;
		}
	}
	else if (currentResize != null) {
		conAdjustedEvent.final = true;
		currentResize.dispatchEvent(conAdjustedEvent); // Fire container moved sub-event and finalize movement
	    
		enableSelection(currentResize);
		currentResize = null;
	}
	else if (sliderDrag !== null) {
		sliderDrag = null;
		
		if (Math.abs(sliderMomentum) >= momentumTrigger && sliderDecelerating == false) {
			momentumDecelerating = false;
			sliderDecelerating = true;
			sliderDecelerateInterval = setInterval("sliderDecelerate()", 20);
		}
		
		sliderChanged();
		enableSelection();
	}
}

function initiateBodyClone() {
	if (typeof bodyClone != "undefined") { bodyClone.parentNode.removeChild(bodyClone); }
	
	bodyClone = $('body').cloneNode(true);
	//bodyClone.title = "immovable";
	bodyClone.style.id = "bodyClone";  // ?????FIX000???? Clone ID never properly changes from 'body'
	bodyClone.style.opacity = "0.5";
	bodyClone.style.visibility = "visible";
	bodyClone.style.zIndex = "-1";
	
	$('body').appendChild(bodyClone);
}
function initiateContainers() {
    
	// Explicitly set container attributes. Be careful not to set to non-existent containers
	// e.g. page or module-specific containers. Can use> delete conAttr['con#'] to reverse changes if unsure
	conAttr['con1'] = [];
	conAttr['con1']['bgColor'] = '#000022';
	conAttr['con2'] = [];
	conAttr['con2']['bgColor'] = '#000066';
	conAttr['con2']['depth'] = 2;
	conAttr['con3'] = [];
	conAttr['con3']['bgColor'] = '#006600';
	conAttr['con3']['dragBgColor'] = '#66FF00';
	conAttr['con3']['depth'] = 1;
	conAttr['con4'] = [];
	conAttr['con4']['dragBgColor'] = '#666699';
	conAttr['con4']['minWidth'] = 256;
	conAttr['con4']['minHeight'] = 192;
	conAttr['con5'] = [];
	conAttr['con5']['bgColor'] = '#333333';
	
	conAttr['con8'] = [];
	conAttr['con8']['bgColor'] = '#330000';
	conAttr['con9'] = [];
	conAttr['con9']['depth'] = 3;
	
	conAttr['_default'] = [];
	conAttr['_default']['bgColor'] = 'transparent';
	conAttr['_default']['dragBgColor'] = '#333333';
	conAttr['_default']['dragOpacity'] = 0.75;
	conAttr['_default']['minWidth'] = 64;
	conAttr['_default']['minHeight'] = 16;
	conAttr['_default']['depth'] = 0;
	
	divs = $('body').getElementsByTagName('div');
	// For any elements without attributes set, initiate them as containers.
	// This SHOULDN'T happen unless page HTML is written to (adding containers) using PHP w/o also writing the javascript array
	for (var i in divs) {
		if (typeof divs[i].id != "undefined") { // Normal browser style of checking for unset divs.
			if (divs[i].id.substr(0, 3) == "con") {
				if (typeof conAttr[divs[i].id] == "undefined") {
					conAttr[divs[i].id] = [];
				}
			}
		} else if (String(i).substr(0, 3) == "con") { // IE Style of checking for unset divs.
			if (typeof conAttr[i] == "undefined") {
				conAttr[i] = [];
			}
		}
		//if (typeof i.nodeName != "undefined") { alert(i.nodeName); }
	}
	divs = undefined;
	
	// Begin setting attributes in the actual page.
	for (var i in conAttr) {
		if (i != "_default") {
		    if (typeof $(i) != 'object' || typeof getCloneById(i) != 'object') {
			delete conAttr[i]; // Remove any extraneous attributes that don't have divs in the page, preventing their use in future operations
		    } else {
			var tmp = $(i).innerHTML;
			if (typeof conAttr[i]["bgColor"] != "undefined") {
			    getCloneById(i).style.backgroundColor = $(i).style.backgroundColor = conAttr[i]["bgColor"];
			}
			if (typeof conAttr[i]["depth"] != "undefined") {
			    getCloneById(i).style.zIndex = $(i).style.zIndex = conAttr[i]["depth"];
				//conAttr[i]["depth"]; // MAY NEED TO MODIFY THIS LINE LATER TO CORRECT DEPTH
			}
			if (modulesLoaded.indexOf('toolboxToolbar') != -1 && tmp.search('<div id="toolboxModule">') == -1) {
			    //Load the editor toolbar for all containers except toolbox
			    var pos = tmp.search('<div class="conHeader"')
			    if (pos != -1) {
				pos += tmp.substring(pos).search('</div>');
				if (pos != -1) pos += 6;
			    }
			    pos = Math.max(0, pos);
			    $(i).innerHTML = tmp.substr(0, pos) + toolboxToolbar + tmp.substr(pos);
			}
		    }
		}
	}
}
function initiatePointers() {
	sliderPointer = $('slider');
	slideBarPointer = $('slideBar');
	slideBarClonePointer = $('slideBarClone');
	
	slideBarPointer.style.height = slideBarHeight + "px";
	slideBarClonePointer.style.height = slideBarHeight + "px";
	
	slideBarPointer.style.top = String((sliderHeight - slideBarHeight) / 2 - 1) + "px";
	slideBarClonePointer.style.top = String((sliderHeight - slideBarHeight) / 2 - 1) + "px";
}
function initiateFunctions() {
	$('innerViewframe').onscroll = function() {
		pageScroll = getPageScroll();
		
		// New style of absolute position updating moved divs
		if (currentDrag != null) {
		    getCloneById(currentDrag.id).style.top = currentDrag.style.top = my+pageScroll - dragY + "px";
		}
		//DEBUG//$('con5').getElementsByTagName("div")[1].innerHTML = "Scroll: " + pageScroll;
		updateSliderSize(true);
	}
	function getPageScroll() {
	    return $('innerViewframe').scrollTop;
	}
	//$('innerViewframe').addEventListener('scroll', tta, false);
	//function tta() { alert('TEst'); }
	
	divs = $('body').getElementsByTagName('div');
	// For all containers. Add their functions
	for (var i in divs) {
		if (typeof divs[i].id != "undefined") { // Normal browser style of checking for unset divs.
			if (divs[i].className == "conHeader") {
				divs[i].onmousedown = new Function("event","onmousedown=cDown(event,this.parentNode)");
			} else if (divs[i].className == "conResizer") {
				divs[i].onmousedown = new Function("event","onmousedown=rDown(event,this.parentNode)");
			} else if (divs[i].className.substr(0, 3) == "con") {
				divs[i].ondblclick = new Function("event","ondblclick=conDblClick(event,this)");
			}
		}
	}
	divs = undefined;
	
	if (isModuleLoaded('toolboxModule')) {
	    $('toolboxBtnAdd').onclick = function() {
		
		//$('body').innerHTML += '<div id="con9" class="conMain" style="width: 200px; height: 200px; left: 200px; top: 200px;">';
                //$('body').innerHTML += '<div class="conHeader">Untitled</div><div class="conResizer"></div></div>';
		//$('body').innerHTML = $('body').innerHTML;
		//var tmp = $('body').appendChild($('con1').cloneNode());
		
		var tmp = document.createElement('div');
		tmp.className = 'conMain';
		tmp.style.width = '200px';
		tmp.style.height = '200px';
		tmp.style.left = '200px';
		tmp.style.top = '200px';
		
		tmp.id = 'con7';
		conAttr['con7'] = [];
		conAttr['con7']['bgColor'] = '#003355';
		tmp.innerHTML += '<div class="conHeader">Untitled</div>Test<div class="conResizer"></div></div>';
		
		tmp = $('body').appendChild(tmp);
		bodyClone.appendChild(tmp.cloneNode());
		initiateFunctions();
		
		return false;
		//alert('Added...');
		
	    }
	}
}
function updatePageOffset() { // Updates the page offset, calculates and associates slider variables correctly
	sliderAmount = sliderPosition; //Math.round(sliderPosition - removePx(slideBarPointer.style.width));
	
	slideBarPointer.style.left = String(sliderPosition) + "px";
	
	//  -bw = sp * (plw - paw) / (sc - sb) - (plw / 3)
	sliderPosition = Math.round(sliderPosition * (planeWidth - pageWidth) / (removePx(sliderPointer.style.width) - removePx(slideBarPointer.style.width)) - (planeWidth/3));
	$('slideAmount').innerHTML = sliderAmount + "|" + sliderPosition; // + " // " + sliderPosition + " // " + pageWidth + " / " + planeWidth + " = " + Math.round(pageWidth / planeWidth * 1000) / 1000;
}
function updateBoundaries() {
	if( typeof( window.innerWidth ) == 'number' ) {
		//Non-IE
		pageWidth = window.innerWidth;
		pageHeight = window.innerHeight;
	} else if( document.documentElement && document.documentElement.clientWidth ) {
		//IE 6+ in 'standards compliant mode'
		pageWidth = document.documentElement.clientWidth;
		pageHeight = document.documentElement.clientHeight;
	} else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
		//IE 4 compatible
		pageWidth = document.body.clientWidth;
		pageHeight = document.body.clientHeight;
	}
	return false;
}
function updateSliderSize(vposonly) { // vposonly : True if should only update y position of slider
	var pHeight = (planeHeight<=1)?Math.round(planeHeight*pageHeight):planeHeight;
	sliderPointer.style.top = String((pHeight < pageHeight ? pHeight : pageHeight) - sliderVPadding - sliderHeight + pageScroll) + "px"; //Glues slider to the lesser of either plane or page height.
	
	if (!vposonly) {
		sliderPointer.style.left = sliderHPadding + "px";
		sliderPointer.style.width = String(pageWidth - sliderHPadding * 2) + "px";
		if (planeWidth <= pageWidth) { // Page was just resized larger than the appropriate viewing window
			slideBarPointer.style.width = String(removePx(sliderPointer.style.width)-2) + "px";
			slideBarPointer.style.left = "0px";
			bodyClone.style.visibility = "hidden";
			slideBarClonePointer.style.visibility = "hidden";
			
			$('body').style.left = String(Math.floor(pageWidth / 2 - planeWidth / 6)) + "px";
			
			$('slideAmount').style.color = "#F00";
		} else {
			slideBarPointer.style.width = String( Math.round( (pageWidth / planeWidth) * removePx(sliderPointer.style.width) ) ) + "px";
			//$('slideAmount').innerHTML = "Ratio: " + String(Math.round(pageWidth / planeWidth * 1000) / 1000) + ", Tot Width: " + removePx(sliderPointer.style.width) + ", Approx: " + slideBarPointer.style.width;
			//sliderPointer.style.backgroundColor = "#000";
			
			slideBarPointer.style.left = String(Math.round(-((3 * removePx($('body').style.left) - planeWidth) * (removePx(sliderPointer.style.width) - removePx(slideBarPointer.style.width))) / (3 * (planeWidth - pageWidth)))) + "px";
			sliderChanged();
			$('slideAmount').style.color = "#CCC";
		}
	}
}
function updateEdges() { // Note that this doesn't update bodyClone edge positions. Their visibility: hidden
	tmp = removePx($('edgeLeft').style.width) / 2;
	$('edgeFarLeft').style.left = String(Math.floor(-planeWidth / 3 - tmp)) + "px";
	$('edgeLeft').style.left = String(Math.floor(-tmp)) + "px";
	$('edgeCenter').style.left = String(Math.floor(planeWidth / 6 - tmp)) + "px";
	$('edgeRight').style.left = String(Math.floor(planeWidth / 3 - tmp)) + "px";
	$('edgeFarRight').style.left = String(Math.floor(2 * planeWidth / 3 - tmp)) + "px";
	
	var pHeight = (planeHeight<=1)?(Math.round(planeHeight*pageHeight)+"px"):(planeHeight+"px");
	$('edgeFarLeft').style.height = pHeight;
	$('edgeLeft').style.height = pHeight;
	$('edgeCenter').style.height = pHeight;
	$('edgeRight').style.height = pHeight;
	$('edgeFarRight').style.height = pHeight;
	
	$('arrowLeft').getElementsByTagName("div")[0].style.marginTop = String(Math.round(pageHeight/2 - removePx($('arrowLeft').getElementsByTagName("div")[0].style.height)/2)) + "px";
	$('arrowRight').getElementsByTagName("div")[0].style.marginTop = String(Math.round(pageHeight/2 - removePx($('arrowLeft').getElementsByTagName("div")[0].style.height)/2)) + "px";
}

function consolidateZIndices() {
	newIndices = [];
	
	//DEBUG//$('con6').getElementsByTagName("div")[1].innerHTML = "Retrieving Depths: ";
	for (var i in conAttr) {
		if (i != "_default") {
			if (conAttr[i]["depth"] != null) {
				newIndices[i] = conAttr[i]["depth"]; // Left pad string to 5 chars. Allows for MAXIMUM of 99,999 containers.
				//DEBUG//$('con6').getElementsByTagName("div")[1].innerHTML += newIndices[i] + ", ";
			}
		}
	}
	
	newIndices = sortAssoc(newIndices);
	
	count = 0;
	for (var i in newIndices)
	{
		$(i).style.zIndex = conAttr[i]["depth"] = ++count;
		getCloneById(i).style.zIndex = count; // MAY NEED TO CHANGE LATER - 10000;
		//DEBUG//$('con6').getElementsByTagName("div")[1].innerHTML += "<br />{" + conAttr[i]["depth"] + "} Multisort: " + i + " with " + newIndices[i];
	}
	
	/* newIndices.sort(function(a,b){return a - b});
	
	count = conAttr["_default"]["depth"];
	for (var i in newIndices) {
		//DEBUG//$('con6').getElementsByTagName("div")[1].innerHTML += "<br />TAG [" + i + "] = " + String(count++);
		newIndices[i]["depth"] = count;
	}
	
	for (var i in newIndices) {
		conAttr[i]["depth"] = newIndices[i];
	} */
}
function getHighestDepth() {
	maxZ = conAttr["_default"]["depth"];
	
	for (var i in conAttr) {
		if (i != "_default") {
			if (conAttr[i]["depth"] != null) {
				if (conAttr[i]["depth"] > maxZ) {
					maxZ = conAttr[i]["depth"];
				}
			}
		}
	}
	return maxZ;
}
function bringToFront(element) {
	maxZ = getHighestDepth();
	if (conAttr[element.id] != null) {
		if (conAttr[element.id]["depth"] != maxZ) { element.style.zIndex = conAttr[element.id]["depth"] = maxZ + 1; }
	}
	consolidateZIndices();
}
function sortAssoc(oAssoc) {
	var idx; var key; var arVal = []; var arValKey = []; var oRes = {};
	for (key in oAssoc) {
		arVal[arVal.length] = oAssoc[key];
		arValKey[oAssoc[key]] = key;
	}
	arVal.sort(function(a,b){return a-b;});
	for (idx in arVal)
	oRes[arValKey[arVal[idx]]] = arVal[idx];
	return oRes;
}

function getCloneById(cloneId) {
	tlen = bodyClone.childNodes.length;
	for (i=0; i<tlen; i++) {
		if (bodyClone.childNodes[i].id == cloneId) {
			return bodyClone.childNodes[i];
		}
	}
	return false;
}
function getMousePosition(eve) { // Updates mouse position
    if (typeof eve != "undefined" || typeof event != "undefined") {
	    if (document.all) { //If IE
		    mx = event.clientX;
		    my = event.clientY;
	    } else {
		    if (typeof event != "undefined" && typeof eve == "undefined") { eve = event; }
		    mx = eve.pageX;
		    my = eve.pageY;
	    }
    }
}
function getExactPosition(eve) { // Any position modifiers here must also be copied to the ontouchstart event (for iPhones) before sending across the network/drawing
    if (typeof eve != "undefined" || typeof event != "undefined") {
            if (document.all) { //If IE
                    return [event.clientX+sliderPosition-1,event.clientY+$('innerViewframe').scrollTop-1];
            } else {
                    if (typeof event != "undefined" && typeof eve == "undefined") { eve = event; }
                    
                    //document.getElementById('con3').getElementsByTagName("div")[1].innerHTML += '<br>DrawX: '+(eve.pageX+sliderPosition)+'<br>DrawY: '+(eve.pageY+$('viewframe').scrollTop);
                    return [eve.pageX+sliderPosition-1,eve.pageY+$('innerViewframe').scrollTop-1];
            }
    } else { return false; }
}

function sliderChanged() { // Should be fired when the slider is moved.
	spl = removePx(slideBarPointer.style.left);
	spw = removePx(sliderPointer.style.width);
	sbpl = removePx(slideBarPointer.style.left);
	sbpw = removePx(slideBarPointer.style.width);
	calc1 = -planeWidth / 3 - pageWidth / 2;
	calc2 = 2 * planeWidth / 3 - pageWidth / 2;
	calc3 = pageWidth - sliderHPadding * 2;
	
	if (sliderDrag == null) {
		if (sliderPosition < calc1) 
			while (sliderPosition < calc1) {
				sliderPosition += planeWidth;
				slideBarPointer.style.left = sbpl = String(spw - Math.abs(sbpl)) + "px";
			}
		else if (sliderPosition > calc2)
			while (sliderPosition > calc2) {
				sliderPosition -= planeWidth;
				slideBarPointer.style.left = sbpl = String(sbpl - spw) + "px";
			}
	}
	
	$('body').style.left = String(-sliderPosition) + "px";
	
	if (sliderPosition < ((-planeWidth/3)+(2*planeWidth/3-pageWidth))/2) { // Body clone will be left or right of original page, based on slider position relative to center
		bodyClone.style.visibility = "visible";
		bodyClone.style.left = String(-planeWidth) + "px";
	} else {
		bodyClone.style.visibility = "visible";
		bodyClone.style.left = String(planeWidth) + "px";
	}
	
	sbpl = removePx(slideBarPointer.style.left);
	
	if (planeWidth > pageWidth) {
		if (sbpl < sliderHPadding) {
			slideBarClonePointer.style.width = sbpw+"px";
			slideBarClonePointer.style.left = sbcpl = String(sbpl + calc3) + "px";
			
			while (removePx(slideBarClonePointer.style.left) + sbpw / 2 < 0) {
				slideBarClonePointer.style.left = String(sbcpl + calc3) + "px";
			}
			
			slideBarClonePointer.style.visibility = "visible";
		} else if (sbpl > spw - sbpw - sliderHPadding) {
			slideBarClonePointer.style.width = sbpw+"px";
			slideBarClonePointer.style.left = sbcpl = String(sbpl - calc3) + "px";
			
			while (sbcpl + sbpw / 2 > spw) {
				slideBarClonePointer.style.left = String(sbcpl - calc3) + "px";
			}
			
			slideBarClonePointer.style.visibility = "visible";
		} else {
			slideBarClonePointer.style.visibility = "hidden";
		}
	}
}
function sliderDecelerate() { // Slowly brings the slider to a stop after being thrown.
	slideBarPointer.style.left = String(Math.round(removePx(slideBarPointer.style.left) + sliderMomentum)) + "px";
	sliderPosition = removePx(slideBarPointer.style.left);
	
	updatePageOffset();
	sliderChanged();
	
	if (Math.abs(sliderMomentum) < 0.5 || sliderDrag !== null) { clearInterval(sliderDecelerateInterval); sliderDecelerating = false; }
	
	sliderMomentum = sliderMomentum * 0.90; // 10 % Friction
}
function momentumDecelerate() { // Incrementally decreases the momentum of the slider (dragging the slider builds momentum)
	if (!momentumDecelerating) { clearInterval(momentumDecelerateInterval); return false; }
		
	//DEBUG//$('con4').getElementsByTagName("div")[1].innerHTML = "<b>Slider Momentum: <u style=\"font-size: 24px;\">" + Math.round(sliderMomentum) + "</u></b><br />Based On Earliest Mouse Position: " + lastmx + " --&gt; " + mx;
		
	sliderMomentum *= 0.1;
	if (Math.abs(sliderMomentum) <= 0.5) {
		sliderMomentum = 0;
		momentumDecelerating = false;
		clearInterval(momentumDecelerateInterval);
	}
}

function sideScroll() {
	if (currentDrag == null || sliderDrag != null || (mx > sideScrollSense && mx < pageWidth - sideScrollSense)) {
		sideScrollSpeed = 0; sideScrolling = false; clearInterval(sideScrollInterval);
	} else {
		if (mx <= sideScrollSense) {
			sideScrollSpeed -= sideScrollAccel;
		} else if (mx >= pageWidth - sideScrollSense) {
			sideScrollSpeed += sideScrollAccel;
		}
		
		slideBarPointer.style.left = String(Math.round(removePx(slideBarPointer.style.left) + sideScrollSpeed)) + "px";
		
		sliderPosition = removePx(slideBarPointer.style.left);
		
		updatePageOffset();
		sliderChanged();
		
		dx = removePx(currentDrag.style.left) + sliderPosition - dragPageX;
		dragPageX = sliderPosition;
		
		getCloneById(currentDrag.id).style.left = currentDrag.style.left = dx + (mx-lastmx) + "px";
	}
}

function cDown(e, current) {
	e = (window.event)?window.event:e;
	
	mouseMove(e); // Updates mouse position in case coming from context menu
	
	if (e.which == null) mb = (e.button < 2) ? 0 : ((e.button == 4) ? 1 : 2); // IE
	else mb = (e.which < 2) ? 0 : ((e.which == 2) ? 1 : 2); // Others. // Returns [0:LEFT][1:MIDDLE][2:RIGHT] always
	if (mb) { return false; } // Only allow activation of control if left mouse button.
	
	//$('slideAmount').innerHTML = current.parentNode.title;
	if (current.parentNode.id == "bodyClone") { return false; }

	lastPageScroll = pageScroll;	
	
	disableSelection(current);
	
	if (conAttr[current.id] != null && conAttr[current.id]["dragBgColor"] != null) {
		current.style.backgroundColor = conAttr[current.id]["dragBgColor"];
	} else {
		current.style.backgroundColor = conAttr["_default"]["dragBgColor"];
	}
	
	bringToFront(current);
	
	//DEBUG//$('con2').getElementsByTagName("div")[1].innerHTML += "<br />Setting zIndex to " + String(maxZ + 1);
	
	currentDrag = current;
	dragX = mx - removePx(currentDrag.style.left);
	dragPageX = sliderPosition;
	dragY = my - removePx(currentDrag.style.top) + pageScroll;
}
function conDblClick(e, current) {
	e = (window.event)?window.event:e;
	
	bringToFront(current);
	
	return false;
	//alert('Ok');
}
function rDown(e, current) {
	e = (window.event)?window.event:e;
	if (e.which == null) mb = (e.button < 2) ? 0 : ((e.button == 4) ? 1 : 2); // IE
	else mb = (e.which < 2) ? 0 : ((e.which == 2) ? 1 : 2); // Others. // Returns [0:LEFT][1:MIDDLE][2:RIGHT] always
	if (mb) { return false; } // Only allow activation of control if left mouse button.
	
	lastPageScroll = pageScroll;
	
	disableSelection(current);
	
	bringToFront(current);
	
	currentResize = current;
	
	dragX = removePx(current.style.width);
	dragY = removePx(current.style.height);
}

function sliderDown() {
	disableSelection();
	if (planeWidth <= pageWidth) { return false; }
	
	if (mx >= removePx(slideBarPointer.style.left) + removePx(sliderPointer.style.left) && mx <= removePx(slideBarPointer.style.left) + removePx(slideBarPointer.style.width) + removePx(sliderPointer.style.left)) { // Relative scrolling. Main scrollbar
		sliderDrag = 2;
	} else if (mx >= removePx(slideBarClonePointer.style.left) + removePx(sliderPointer.style.left) && mx <= removePx(slideBarClonePointer.style.left) + removePx(slideBarClonePointer.style.width) + removePx(sliderPointer.style.left)) { // Relative scrolling. Ghost scrollbar
		tmp = slideBarPointer.style.left;
		slideBarPointer.style.left = slideBarClonePointer.style.left;
		slideBarClonePointer.style.left = tmp;
		sliderDrag = 2;
	} else { // Absolute scrolling
		sliderDrag = 1;
		slideBarPointer.style.left = String(mx - removePx(sliderPointer.style.left) - removePx(slideBarPointer.style.width)/2) + "px";
	}
	mouseMove();
}

function removePx(input) {
	return Number(input.replace("px",""));
}
function disableSelection(element) {
	enableSelect = false; //Disable < IE9 Select [For all elements]
	if (typeof element == 'undefined') {
		document.onmousedown = function() { return false; }; //Disable Select Other Browsers [All Elements]
	} else {
		element.onmousedown = function() { return false; }; //Disable Select Other Browsers	[Singular element]
	}
}
function enableSelection(element) {
	enableSelect = true;
	if (typeof element == 'undefined') {
		document.onmousedown = function(e) { mouseDown(e); };
	} else {
		element.onmousedown = function() { return true; };
	}
}

function userLogout() {
	$('logFormLogout').value = "true";
	document.forms["logForm"].submit();
}
function userCreateAccount(b) {
	if (toolboxSlidingTo == null) {
		if (b) {
			//$('toolbar').style.height = "320px";
			toolboxSlideInterval = setInterval("toolboxSlide(512)", 20);
			$('createAccountLabel').style.visibility = "hidden";
			//$('createAccountWindow').style.display = "block";
		} else {
			toolboxSlideInterval = setInterval("toolboxSlide(32)", 20);
			$('createAccountLabel').style.visibility = "visible";
		}
	}
}
function toolboxSlide(h) {
	toolboxSlidingTo = removePx($('toolbar').style.height);
	if (toolboxHeight == null) toolboxHeight = toolboxSlidingTo;
	
	if (Math.abs(toolboxHeight-h)>1) {
		//toolboxHeight = toolboxHeight*.8 + h*.2;
		toolboxHeight += (h - toolboxHeight) / 5;
		$('toolbar').style.height = String(Math.round(toolboxHeight)) + "px";
		//DEBUG//$('con5').getElementsByTagName("div")[1].innerHTML = String(toolboxHeight);
	} else {
		$('toolbar').style.height = String(Math.round(h)) + "px";
		//DEBUG//$('con5').getElementsByTagName("div")[1].innerHTML = "End Transition: " + String(Math.round(h));
		clearInterval(toolboxSlideInterval);
		toolboxSlidingTo = toolboxHeight = null;
	}
}

function buttonDown(e) {
	e.style.borderColor = "#CCC";
	e.style.borderTopColor = "#333";
	e.style.borderLeftColor = "#333";
}
function buttonUp(e) {
	e.style.borderColor = "#CCC";
	e.style.borderBottomColor = "#333";
	e.style.borderRightColor = "#333";
}

// ########################### ADDITIONAL FUNCTIONS #########################################

/*
if ( document.addEventListener ) {
    // Use the handy event callback
    document.addEventListener( "DOMContentLoaded", function(){
	    document.removeEventListener( "DOMContentLoaded", arguments.callee, false );
	    documentReady();
    }, false );
}
else if ( document.attachEvent ) {
    // ensure firing before onload,
    // maybe late but safe also for iframes
    document.attachEvent("onreadystatechange", function(){
	    if ( document.readyState === "complete" ) {
		    document.detachEvent( "onreadystatechange", arguments.callee );
		    documentReady();
	    }
    });
} else {
    window.onload = function() { documentReady(); };
} */

function randomInt(a,b) {
    if (typeof b == 'undefined') {
	if (typeof a == 'object') {
	    return Math.round(a[0]+Math.random()*(a[1]-a[0]));
	} else { return false; }
    } else {
	return Math.round(a+Math.random()*(b-a));
    }
}
function distanceBetween(x1, y1, x2, y2) {
    return Math.sqrt(Math.pow(x2-x1,2) + Math.pow(y2-y1,2));
}
function posInBounds(pos,bounds){ // Will return if pos lies within bounds :::: pos[x,y], bounds[left,top,width,height]
    return (pos[0] >= bounds[0] && pos[1] >= bounds[1] && pos[0] <= bounds[0]+bounds[2] && pos[1] <= bounds[1]+bounds[3])?true:false;
}
function getElementPosition(obj) {
    var pos = [0,0];
    if (obj.offsetParent) {
        do {
            pos[0] += obj.offsetLeft;
            pos[1] += obj.offsetTop;
        } while(obj = obj.offsetParent);
    }
    pos[0] += sliderPosition;
    return pos;
}
function htmlentities(input){
    var re=/[<>&]/g;
    return input.replace(re, function(m){return replacechar(m)});
}
if (!Array.prototype.indexOf) { // Array.indexOf function, added ECMA-262 Edition 5.1 (June 2011)
    Array.prototype.indexOf = function (searchElement /*, fromIndex */ ) {  
        "use strict";  
        if (this == null) {  
            throw new TypeError();  
        }  
        var t = Object(this);  
        var len = t.length >>> 0;  
        if (len === 0) {  
            return -1;  
        }  
        var n = 0;  
        if (arguments.length > 0) {  
            n = Number(arguments[1]);  
            if (n != n) { // shortcut for verifying if it's NaN  
                n = 0;  
            } else if (n != 0 && n != Infinity && n != -Infinity) {  
                n = (n > 0 || -1) * Math.floor(Math.abs(n));  
            }  
        }  
        if (n >= len) {  
            return -1;  
        }  
        var k = n >= 0 ? n : Math.max(len - Math.abs(n), 0);  
        for (; k < len; k++) {  
            if (k in t && t[k] === searchElement) {  
                return k;  
            }  
        }  
        return -1;  
    }
}
function arrayAdd(a, b, length) { //Adds the first [length] values of 2 NUMERICALLY INDEXED one dimensional arrays [a]&[b] and returns the entire first array as result
    if (typeof a != 'object' || typeof b != 'object') return false;
    c=[]; if (typeof length != 'number') { length=b.length; }
    for (var i in a) {
	//c[i] = a[i]+(i<length)?b[i]:0;
	if (i<length) {
	    c[i] = a[i] + b[i];
	} else {
	    c[i] = a[i];
	}
    }
    return c;
}
function arrayFastAdd(a,b) {
    var c=[],i=0;
    for (;i<a.length;i++) { c[i]=a[i]+b[i]; }
    return c;
}
/* function arrayFastMultiply(a, b) { //Adds the first [length] values of 2 NUMERICALLY INDEXED one dimensional arrays [a]&[b] and returns the entire first array as result
    var c=[],i=0;
    for (;i<a.length;i++) { c[i]=a[i]*b[i]; }
    return c;
} */

function replacechar(match){
 if (match=="<")
  return "&lt;"
 else if (match==">")
  return "&gt;"
 else if (match=="&")
  return "&amp;"
}
function modifyCSSClass(myclass,attrib,val) {
	if (! document.styleSheets) return
	var CSSRules;
	for (var i = 0; i < document.styleSheets.length; i++) {
	    (document.styleSheets[0].cssRules) ? CSSRules = 'cssRules' : CSSRules = 'rules'; // rules for IE
	    for (var j = 0; j < document.styleSheets[i][CSSRules].length; j++) {
		    if (document.styleSheets[i][CSSRules][j].selectorText == myclass) {
			    document.styleSheets[i][CSSRules][j].style[attrib] = val;
		    }
	    }	
	}
}

function isModuleLoaded(module) {
    return $(module) != null; // Modules MUST have at least one element with the module ID
}

function $(v) { return document.getElementById(v); }

function loadScript(url, callback) {
    // adding the script tag to the head as suggested before
   var head = document.getElementsByTagName('head')[0];
   var script = document.createElement('script');
   script.type = 'text/javascript';
   script.src = url;

   // then bind the event to the callback function 
   // there are several events for cross browser compatibility
   script.onreadystatechange = callback;
   script.onload = callback;

   // fire the loading
   head.appendChild(script);
}

window.requestAnimFrame = (function(){
    return  window.hrequestAnimationFrame       || 
	    window.hwebkitRequestAnimationFrame || 
	    window.mozRequestAnimationFrame    || 
	    window.oRequestAnimationFrame      || 
	    window.msRequestAnimationFrame     || 
	    function( callback ){
	      window.setTimeout(callback, 1000 / 60);
	    };
})();