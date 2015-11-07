<!DOCTYPE html>
<html>
<head>
<title>13 Willows :: Website Development &amp; Design</title>
<meta name="charset" content="UTF-8">
<style type="text/css">
* { padding:0;margin:0; }
html, body { width: 100%; height: 100%; margin: 0; background: #CCC; }
#canvasDiv { display: block; margin: 0 auto; width: 960px; position: relative; z-index: 0; }
#canvasContainer { position:absolute; left:0;top:0; }
#trunk { position: absolute; left: 0px; top: 0px; }
#branches { position: absolute; left: 0px; top: 0px; }

#navigation { display: block; width: 960px; margin: 0 auto; z-index: 10; position: relative; }
#navigationHider { display: block; position: absolute; left: 0; width: 960px; height: 28px; overflow: hidden; }
#navigationContainer { display: block; position: absolute; left:0;top:0; background: #2F2F00; box-shadow: inset 0 0 2px 2px #221; width:960px; }
#navigation ul { list-style: none; font-family: Georgia, Times New Roman, serif; font-size: 22px; }
#navigation li { float: left; display: block; width: 16.66%; text-align: center; }
#navigation a { color: #993; text-decoration: none; width: 100%; height: 100%; display: block; text-shadow: #220 0px 0px 1px, #000 1px 1px 3px; }
#navigation a:hover { color: #F00; }

#footer { position: fixed; bottom:0; left:2%; width: 96%; height: 15%; opacity: 1; }
</style>
<script type="text/javascript">
var cge, cg, stepInt, fpsTick, fps, realFps, fpsCounter;
var pageColor, pageWidth, pageHeight;
var lastStrand, currentStrand;
var delta, time, startTime;
var navSize, navInt;

var cgSize = [960,800];
var cgbSize = [960,400];
var bodyGradient = [[0,0,0,0],[0.1,255,87,63],[0.15,255,255,85],[0.2,80,143,178],[0.5,110,173,248],[0.8,80,143,178],[0.85,255,255,85],[0.9,255,87,63],[1,0,0,0]]; // Sunrise effect

var trunk = []; trunk['width'] = 200; trunk['creation'] = 500;
var branch = [];branch['creation'] = 200;branch['count'] = 5000;branch['width'] = [4,16];branch['reach'] = [240,480];branch['strands'] = 20;branch['leaves'] = [15,20];branch['rise'] = [0,100];branch['slow'] = 0.1;
var leaf = [];leaf['size'] = 7;leaf['spread'] = [8,14];leaf['waver'] = [-3,3];leaf['speed'] = [50,200];
    
window.onload = function() {
    //DOM
    //$('navigationHider').style.visibility = 'hidden';
    
    // Context
    cge = $('trunk');
    cg = cge.getContext('2d');
    
    //cg.fillStyle = "#333";
    //cg.fillRect(0,0,512,512);
    
    //cg.translate(0.5,0.5);
    
    //Document/Window
    windowResized();
    bgColor = [255,255,255];
    
    //Variables/Functions
    initBranches();
    
    //Initiate program
    fpsCounter = setInterval(function() { fps = fpsTick; fpsTick = undefined; }, 1000);
    resetTimer();
    trunkStep();
};
window.onresize = function() { windowResized(); };
document.onmousemove = function (e) {
    e = e || window.event;
    
    var tmp = e.clientX / pageWidth;
    for (var i=bodyGradient.length-1;i>=0;i--) {
        if (tmp > bodyGradient[i][0]) {
            var blend = (tmp - bodyGradient[i][0]) / (bodyGradient[i+1][0] - bodyGradient[i][0]);
            bgColor[0] = Math.round((1-blend) * bodyGradient[i][1] + blend*bodyGradient[i+1][1]);
            bgColor[1] = Math.round((1-blend) * bodyGradient[i][2] + blend*bodyGradient[i+1][2]);
            bgColor[2] = Math.round((1-blend) * bodyGradient[i][3] + blend*bodyGradient[i+1][3]);
            break;
        } else if (tmp == bodyGradient[i][0]) {
            bgColor = [bodyGradient[i][1],bodyGradient[i][2],bodyGradient[i][3]];
            break;
        }
    }
    
    document.body.style.backgroundColor = 'rgb('+bgColor[0]+','+bgColor[1]+','+bgColor[2]+')';
};

function windowResized() {
    if (self.innerHeight) { pageWidth = self.innerWidth; pageHeight = self.innerHeight; }
    else if (document.documentElement && document.documentElement.clientHeight) { pageWidth = document.documentElement.clientWidth; pageHeight = document.documentElement.clientHeight; }
    else if (document.body) { pageWidth = document.body.clientWidth; pageHeight = document.body.clientHeight; }
}

function resetTimer() { startTime = new Date().getTime(); time=0; }

function initBranches() {
    var tmp;
    for (var i=0;i<branch['count'];i++) {
        branch[i] = [];
        branch[i]['y'] = Math.random()*cgbSize[1]; // Y pos
        branch[i]['droop'] = Math.round(Math.random()*128)+96;
        tmp = Math.round(Math.random()*48)+32;
        branch[i]['color'] = 'rgba('+tmp+','+Math.round(tmp-4+Math.random()*8)+',0,';
        branch[i]['width'] = Math.round(Math.random()*(branch['width'][1]-branch['width'][0]) + branch['width'][0])/2;
        branch[i]['reach'] = Math.round(Math.random()*(branch['reach'][1]-branch['reach'][0]) + branch['reach'][0])*(Math.random()>0.5?1:-1);
        branch[i]['leaves'] = Math.round(Math.random()*(branch['leaves'][1]-branch['leaves'][0])) + branch['leaves'][0];
        branch[i]['rise'] = Math.round(randIn(branch['rise']));
    }
}

function trunkStep() {
    delta = time;
    time = new Date().getTime()-startTime;
    delta = (time-delta);
    
    var prog = [(time-delta)/trunk['creation'],time/trunk['creation']]; // Top, bottom
    
    var bezier = [1,0,0.4,0.3,0.3,1]; // X away from center, Y away from bottom, X, Y, etc.
    var bl1 = [bezier[0]*(1-prog[0])+bezier[2]*prog[0],bezier[1]*(1-prog[0])+bezier[3]*prog[0]];
    var bl2 = [bezier[2]*(1-prog[0])+bezier[4]*prog[0],bezier[3]*(1-prog[0])+bezier[5]*prog[0]];
    var bl3 = [bl1[0]*(1-prog[0])+bl2[0]*prog[0],bl1[1]*(1-prog[0])+bl2[1]*prog[0]];
    
    bl1 = [bezier[0]*(1-prog[1])+bezier[2]*prog[1],bezier[1]*(1-prog[1])+bezier[3]*prog[1]];
    bl2 = [bezier[2]*(1-prog[1])+bezier[4]*prog[1],bezier[3]*(1-prog[1])+bezier[5]*prog[1]];
    bl3.push(bl1[0]*(1-prog[1])+bl2[0]*prog[1],bl1[1]*(1-prog[1])+bl2[1]*prog[1]);

    //progx = prog[0]*
    
    //cg.fillStyle = 'rgba(32,32,0,0.5)';
    //var tmp = Math.round(Math.random()*48)+16;
    var tmp = Math.round(prog[1]*32)+16;
    cg.fillStyle = 'rgb('+tmp+','+tmp+',0)';
    //cg.fillStyle = 'rgb('+tmp+','+Math.round(tmp-4+Math.random()*8)+',0)';
    cg.beginPath();
    cg.moveTo(cgSize[0]/2-bl3[2]*trunk['width']/2,cgSize[1]-Math.ceil(bl3[3]*cgSize[1]));
    cg.lineTo(cgSize[0]/2+bl3[2]*trunk['width']/2,cgSize[1]-Math.ceil(bl3[3]*cgSize[1]));
    cg.lineTo(cgSize[0]/2+bl3[0]*trunk['width']/2,cgSize[1]-Math.floor(bl3[1]*cgSize[1]));
    cg.lineTo(cgSize[0]/2-bl3[0]*trunk['width']/2,cgSize[1]-Math.floor(bl3[1]*cgSize[1]));
    cg.fill();
    
    //$('navigationContainer').style.top = String(Math.round(cgSize[1]-Math.ceil(bl3[3]*cgSize[1]))) + 'px';
    //$('navigation').style.width = String(Math.round(bl3[2]*trunk['width'])) + 'px';
    
    //cg.fillRect(Math.random()*cgSize[0],Math.random()*cgSize[1],4,4);
    
    //cg.moveTo(cgSize[0]/2 - trunk['width']/2 + trunk['width']*Math.random(),cgSize[1]);
    //cg.bezierCurveTo(cgSize[0]/2 - trunk['width']*0.4 + trunk['width']*0.8*Math.random(),cgSize[1]*0.9,cgSize[0]/2 - trunk['width']/4 + trunk['width']*Math.random()/2,cgSize[1]*0.33,cgSize[0]/2,0);
    //cg.stroke();
    
    fpsTick=typeof fpsTick=='undefined'?0:fpsTick+1;
    drawFps();
    
    if (time <= trunk['creation']) {
        requestAnimFrame(trunkStep);
    } else {
        //$('navigationContainer').style.top = '0';
        
        resetTimer();
        
        cge = $('branches');
        cg = cge.getContext('2d');
        
        requestAnimFrame(branchStep);
        
        navSize = 0;
        navInt = setInterval(navigationStep, 17);
    }
}
function navigationStep() {
    $('navigationHider').style.width = String(Math.round(navSize)) + 'px';
    $('navigationHider').style.left = String(Math.round(480-navSize/2)) + 'px';
    $('navigationContainer').style.left = '-' + String(Math.round(480-navSize/2)) + 'px';
    
    if (!navSize) { $('navigationHider').style.visibility = 'visible'; }
    navSize += 20;
    
    if (navSize > 960) { clearInterval(navInt); }
}
function branchStep() {
    delta = time;
    time = new Date().getTime()-startTime;
    delta = (time-delta);
    if (delta > 100) { startTime+=delta; time-=delta; delta=0; }
    
    var b = Math.floor(time/branch['creation']);
    if (typeof branch[b] == 'undefined') { return false; }
    
    if (b == Math.floor((time-delta)/branch['creation'])) { // Assures the first polygon of branch is not skipped
        var prog = [((time-delta)%branch['creation'])/branch['creation'],(time%branch['creation'])/branch['creation']]; // Previous, Current
        branch['creation'] += branch['slow']; // Slow down each branch
    } else { // Executed (hopefully only) once upon creation of branch
        var prog = [0,(time%branch['creation'])/branch['creation']];
        if (fps < 30 && branch['strands'] > 8) { branch['strands'] -= 1; } else if (fps < 20 && branch['strands'] >= 8) { return false; } // FPS limiter. Halts if FPS can't be brough above 20
        if (branch['creation'] > 500) { return false; } // Branch limiter
    }
        
    //var bezier = [cgbSize[0]/2,branch[b]['y'],cgbSize[0]/2+branch[b]['reach'],branch[b]['y'],cgbSize[0]/2+branch[b]['reach'],branch[b]['y']+branch[b]['droop']]; // X, Y, etc.
    
    var bl1 = calculateBezier(cgbSize[0]/2,branch[b]['y'],cgbSize[0]/2+branch[b]['reach']*0.7,branch[b]['y']-branch[b]['rise'],cgbSize[0]/2+branch[b]['reach'],branch[b]['y']+branch[b]['droop'],prog[0]);
    var bl2 = calculateBezier(cgbSize[0]/2,branch[b]['y'],cgbSize[0]/2+branch[b]['reach']*0.7,branch[b]['y']-branch[b]['rise'],cgbSize[0]/2+branch[b]['reach'],branch[b]['y']+branch[b]['droop'],prog[1]);
    //var bl1 = calculateBezier(200,0,100,0,100,100,time/5000);
    //var bl2 = calculateBezier(200,0,100,0,100,100,(time+200)/5000);
    
    if (time%(branch['creation']*10)<50) { // Slowly fade out past canvases (every 10 branches). Must be rendering at least 1 frame every 50 ms
        //cg.fillStyle = 'rgba('+bgColor[0]+','+bgColor[1]+','+bgColor[2]+',0.1)';
        //cg.fillRect(0,0,cgbSize[0],cgSize[1]);
    }
    cg.strokeStyle = cg.fillStyle = branch[b]['color']+'1)'; // Add alpha value
    
    if (bl1[0] < bl2[0]) { bl1[0]=Math.floor(bl1[0]); bl2[0]=Math.ceil(bl2[0]); } else { bl2[0]=Math.floor(bl2[0]); bl1[0]=Math.ceil(bl1[0]); }
    
    //cg.beginPath(); cg.moveTo(bl1[0],bl1[1]); cg.lineTo(bl2[0],bl2[1]); cg.stroke();
    
    
    cg.beginPath();
    cg.moveTo(bl1[0],bl1[1]-branch[b]['width']*(1-prog[0]));
    cg.lineTo(bl1[0],bl1[1]+branch[b]['width']*(1-prog[0]));
    cg.lineTo(bl2[0],bl2[1]+branch[b]['width']*(1-prog[1]));
    cg.lineTo(bl2[0],bl2[1]-branch[b]['width']*(1-prog[1]));
    cg.fill();
    
    lastStrand = currentStrand;
    currentStrand = Math.floor(prog[1]*branch['strands']);
    if (currentStrand != lastStrand) { // Check if we have incremented enough along the branch to create the next strand
        leaveStep(bl2[0],bl2[1]+branch[b]['width']*(1-prog[1])+leaf['size']/2,b,0);
    }
    
    /*cg.beginPath();
    cg.moveTo(cgSize[0]/2,branch[b]['y']+branch[b]['width']);
    cg.lineTo(cgSize[0]/2+branch[b]['reach'],branch[b]['y']+branch[b]['width']);
    cg.lineTo(cgSize[0]/2+branch[b]['reach'],branch[b]['y']-branch[b]['width']);
    cg.lineTo(cgSize[0]/2,branch[b]['y']-branch[b]['width']);
    cg.fill();*/
    
    fpsTick=typeof fpsTick=='undefined'?0:fpsTick+1;
    drawFps();
    
    //if (time <= branch['creation']*branch['count']) {
    requestAnimFrame(branchStep);
}

function leaveStep(x,y,b,it) { // X leaf, Y leaf, branch ID, iteration #
    cg.fillStyle = 'rgba(32,'+Math.round(randIn(128,192))+',0,'+String(1-(it/branch[b]['leaves']))+')';
    cg.beginPath();
    cg.arc(x,y,leaf['size']/2,0,Math.PI*2,true);
    cg.fill();
    
    if (it <= branch[b]['leaves']) {
        setTimeout(function() { leaveStep(x+Math.round(randIn(leaf['waver'])),y+Math.round(randIn(leaf['spread'])),b,it+1); },Math.round(randIn(leaf['speed'])));
    }
}

function drawFps() {
    if (typeof fps == 'undefined') return false;
    cg.fillStyle = '#FFF';
    cg.fillRect(0,0,128,24);
    cg.fillStyle = '#F00';
    cg.font = '12px Arial';
    cg.fillText('FPS: '+fps,4,16);
}

function calculateBezier(x1,y1,x2,y2,x3,y3,t) {
    var ret = [(1-t)*((1-t)*x1+t*x2)+t*((1-t)*x2+t*x3),(1-t)*((1-t)*y1+t*y2)+t*((1-t)*y2+t*y3)];
    return ret;
    //P(t) = P0*t^2 + P1*2*t*(1-t) + P2*(1-t)^2
}

function randIn(lower,upper) { // Random between 2 numbers
    if (typeof lower == 'object') {
        return Math.random()*(lower[1]-lower[0])+lower[0];
    } else {
        return Math.random()*(upper-lower)+lower;
    }
}

function $(id) { return document.getElementById(id); }

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
</script>
</head>
<body>

<div id="navigation">
    <div id="navigationHider">
        <div id="navigationContainer">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
    </div>
</div>

<div id="canvasDiv">
    <div id="canvasContainer">
        <canvas id="branches" width="960" height="800"></canvas>
        <canvas id="trunk" width="960" height="800"></canvas>
    </div>
</div>

<div id="footer">
    <span style="float:left;">Copyright &copy;2013</span>
    <span style="float:right;text-align:right;">webmaster@13willows.com</span>
</div>

</body>
</html>