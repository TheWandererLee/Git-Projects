//*****************************************************************************
// Do not remove this notice.
//
// Copyright 2001 by Mike Hall.
// See http://www.brainjar.com for terms of use.
//*****************************************************************************
// dragStart(event)
// dragStart(event,'id')
 
// Determine browser and version.
 
function Browser() {
 
  var ua, s, i;
 
  this.isIE    = false;
  this.isNS    = false;
  this.version = null;
 
  ua = navigator.userAgent;
 
  s = "MSIE";
  if ((i = ua.indexOf(s)) >= 0) {
    this.isIE = true;
    this.version = parseFloat(ua.substr(i + s.length));
    return;
  }
 
  s = "Netscape6/";
  if ((i = ua.indexOf(s)) >= 0) {
    this.isNS = true;
    this.version = parseFloat(ua.substr(i + s.length));
    return;
  }
 
  // Treat any other "Gecko" browser as NS 6.1.
 
  s = "Gecko";
  if ((i = ua.indexOf(s)) >= 0) {
    this.isNS = true;
    this.version = 6.1;
    return;
  }
}
 
var browser = new Browser();
 
// Global object to hold drag information.
 
var dragObj = new Object();
dragObj.zIndex = 0;
 
function dragStart(event, id) {
 
  var el;
  var x, y;
 
  // If an element id was given, find it. Otherwise use the element being
  // clicked on.
 
  if (id)
    dragObj.elNode = document.getElementById(id);
  else {
    if (browser.isIE)
      dragObj.elNode = window.event.srcElement;
    if (browser.isNS)
      dragObj.elNode = event.target;
 
    // If this is a text node, use its parent element.
 
    if (dragObj.elNode.nodeType == 3)
      dragObj.elNode = dragObj.elNode.parentNode;
  }
 
  // Get cursor position with respect to the page.
 
  if (browser.isIE) {
    x = window.event.clientX + document.documentElement.scrollLeft
      + document.body.scrollLeft;
    y = window.event.clientY + document.documentElement.scrollTop
      + document.body.scrollTop;
  }
  if (browser.isNS) {
    x = event.clientX + window.scrollX;
    y = event.clientY + window.scrollY;
  }
 
  // Save starting positions of cursor and element.
 
  dragObj.cursorStartX = x;
  dragObj.cursorStartY = y;
  dragObj.elStartLeft  = parseInt(dragObj.elNode.style.left, 10);
  dragObj.elStartTop   = parseInt(dragObj.elNode.style.top,  10);
 
  if (isNaN(dragObj.elStartLeft)) dragObj.elStartLeft = 0;
  if (isNaN(dragObj.elStartTop))  dragObj.elStartTop  = 0;
 
  // Update element's z-index.
 
  dragObj.elNode.style.zIndex = ++dragObj.zIndex;
 
  // Capture mousemove and mouseup events on the page.
 
  if (browser.isIE) {
    document.attachEvent("onmousemove", dragGo);
    document.attachEvent("onmouseup",   dragStop);
    window.event.cancelBubble = true;
    window.event.returnValue = false;
  }
  if (browser.isNS) {
    document.addEventListener("mousemove", dragGo,   true);
    document.addEventListener("mouseup",   dragStop, true);
    event.preventDefault();
  }
}
 
function dragGo(event) {
 
  var x, y;
 
  // Get cursor position with respect to the page.
 
  if (browser.isIE) {
    x = window.event.clientX + document.documentElement.scrollLeft
      + document.body.scrollLeft;
    y = window.event.clientY + document.documentElement.scrollTop
      + document.body.scrollTop;
  }
  if (browser.isNS) {
    x = event.clientX + window.scrollX;
    y = event.clientY + window.scrollY;
  }
  
  // Check object isnt being dragged off screen
  
  	var w = 0, h = 0;

	// check browser type and get window sizes
  	if( typeof( window.innerWidth ) == 'number' ) 
	{
    	// Non-IE
    	w = window.innerWidth;
		h = window.innerHeight;
 	} 
	else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) 
	{
    	// IE 6+ in 'standards compliant mode'
    	w = document.documentElement.clientWidth;
    	h = document.documentElement.clientHeight;
  	} 
	else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) 
	{
    	// IE 4 compatible
    	w = document.body.clientWidth;
    	h = document.body.clientHeight;
  	}

	if( x < 30 )
	{
		x = 30; 
	}
	
	if( x > (w - 30) )
	{
		x = w - 30;
	}
	
	if( y < 30 )
	{ 
		y = 30; 
	}
	
	if( y > (h - 30) )
	{
		y = h - 30;
	}

  // Move drag element by the same amount the cursor has moved.

  dragObj.elNode.style.left = (dragObj.elStartLeft + x - dragObj.cursorStartX) + "px";
  dragObj.elNode.style.top  = (dragObj.elStartTop  + y - dragObj.cursorStartY) + "px";
 
  if (browser.isIE) {
    window.event.cancelBubble = true;
    window.event.returnValue = false;
  }
  if (browser.isNS)
    event.preventDefault();
}
 
function dragStop(event) {
 
  // Stop capturing mousemove and mouseup events.
 
  if (browser.isIE) {
    document.detachEvent("onmousemove", dragGo);
    document.detachEvent("onmouseup",   dragStop);
  }
  if (browser.isNS) {
    document.removeEventListener("mousemove", dragGo,   true);
    document.removeEventListener("mouseup",   dragStop, true);
  }
}