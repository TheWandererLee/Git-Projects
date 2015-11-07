// Assault game specific functions
document.addEventListener("readyEvent", loadAssault, false);

var ag, assaultFps=0, drawFps, fpsCounter;
var assaultMouse=[], agOffset=[];

function loadAssault() {
    if (!$('assaultModule')) { return false; } // Exit if assaultModule is not found
    
    cVars['assault'] = [];
    
    window.addEventListener('resize', assaultWindowMoved, false);
    window.addEventListener('mouseup', assaultMouseUp, false);
    
    $('assaultModule').addEventListener('mousemove', assaultMouseMove, false);
    $('assaultModule').parentNode.addEventListener("conAdjustedEvent", assaultWindowMoved, false);
    
    function assaultMouseMove(eve) {
        if (typeof event != "undefined") { eve = event; }
        cVars['assault']['mousePosition'] = getExactPosition(eve);
        cVars['assault']['mousePosition'][0]-=agOffset[0]; cVars['assault']['mousePosition'][1]-=agOffset[1];
        
        cVars['assault']['mouseMoved'] = true;
        //ag.clearRect(0,0,assaultModuleSize[0],assaultModuleSize[1]);
        
        //if (!posInBounds(m,[agOffset[0],agOffset[1],assaultModuleSize[0],assaultModuleSize[1]])) { return false; } // Exit function if not in bounds
    }
    function assaultMouseUp(eve) {
        //if (typeof event != "undefined") { eve = event; }
        cVars['assault']['mouseDown'] = false;
    }
    $('assaultModuleMain').onmousedown = function(e) {
        //if (typeof event != "undefined") { e = event; }
        cVars['assault']['mouseDown'] = true;
        //return false;
    }
    $('assaultModuleMain').onmouseover = function(e) {
        //if (typeof event != "undefined") { e = event; }
        cVars['assault']['mouseOver'] = true;
    }
    $('assaultModuleMain').onmouseout = function(e) {
        //if (typeof event != "undefined") { e = event; }
        cVars['assault']['mouseOver'] = false;
    }
    
    fpsCounter = setInterval(function() { drawFps = undefined; }, 1000);
    
    
    loadAssaultCanvas();
}
function clearFps() { assaultFps=0; }

function loadAssaultCanvas() {
    agOffset = getElementPosition($('assaultModuleMain'));
    //assaultModuleSize = [$('assaultModule').style.width.substr(0,$('assaultModule').style.width.length-2),$('assaultModule').style.height.substr(0,$('assaultModule').style.height.length-2)];
    
    if (!$('assaultModuleMain').getContext) { $('assaultModuleMain').innerHTML = "Your browser does not support canvas.<br>Please upgrade to a newer browser such as Google Chrome or Firefox.<br><br>Sorry for the inconvenience."; return; }
    ag = document.getElementById('assaultModuleMain').getContext('2d');
    
    assaultClear();
    assaultDrawGrid();
    
    ag.fillStyle = "rgb(220,0,0)";
    ag.fillRect(10,10,100,100);
    
    ag.font = "12px Verdana";
    
    assaultStep();
}
function assaultClear() {
    ag.clearRect(0,0,assaultModuleSize[0],assaultModuleSize[1]);
    
    //ag.fillStyle = "rgb(220,220,220)";
    //ag.fillRect(0,0,assaultModuleSize[0],assaultModuleSize[1]);
}
function assaultStep() {
    assaultClear();
    assaultFps++;
    
     if (typeof drawFps == 'undefined') {
        drawFps = assaultFps; assaultFps = 0;
    }
    
    ag.fillStyle = "#000";
    ag.fillRect(0,0,64,16);
    ag.fillStyle = "rgba(0,192,0,1)";
    ag.fillText("FPS: "+drawFps, 4, 12);
    
    ag.fillStyle = "rgba(0,0,128,0.2)";
    ag.fillRect(Math.random()*784,Math.random()*478,16,16);
    
    if (cVars['assault']['mouseOver']) {
        //cVars['assault']['mouseMoved'] = false;
        m = cVars['assault']['mousePosition'];
        
        ag.fillStyle = "rgba(200,255,255,0.5)";
        ag.fillRect(Math.floor(m[0]/24)*24,Math.floor(m[1]/24)*24,24,24);
    }
    
    requestAnimFrame(assaultStep);
}
function assaultDrawGrid() {
    
}
function assaultWindowMoved() {
    agOffset = getElementPosition($('assaultModuleMain'));
    
    var tmp = [Number($('assaultModule').parentNode.style.width.substr(0,$('assaultModule').parentNode.style.width.length-2)),Number($('assaultModule').parentNode.style.height.substr(0,$('assaultModule').parentNode.style.height.length-2)),24];
    assaultModuleSize[0] = tmp[0]; assaultModuleSize[1] = tmp[1];
}