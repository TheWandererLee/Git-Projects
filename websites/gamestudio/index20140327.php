<?php ob_start("ob_gzhandler"); ?><!DOCTYPE html>
<html>
<head>
    <title>GameStudio by 13 Willows</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <script type="text/javascript">
        var gs = new Array();
        gs['pre'] = 'gs_';
        gs['imgdir'] = 'images/';
        
        gs['res'] = new Array(); // Reserved/resources, list of all available
        gs['res']['images'] = [new Image(),new Image(),new Image()]; // Load image resources
        gs['res']['images'][0].src = 'images/box.gif';
        gs['res']['images'][1].src = 'images/ball.gif';
        gs['res']['images'][2].src = 'images/smallbox.gif';
        
        gs['res']['objects'] = new Array();
        gs['res']['objects'][0] = {iid:0,origin:[0,0]}; //ID(as index) | ImageID, Origin
        gs['res']['objects'][1] = {iid:0,origin:[16,16]};
        gs['res']['objects'][2] = {iid:1,origin:[16,12]};
        gs['res']['objects'][3] = {iid:2,origin:[8,8]};
        
        gs['objects'] = new Array(); // PLACED objects
        
        gs['cprop'] = new Array();
        gs['cprop']['size'] = new Array(960,720);
        gs['cprop']['gridsize'] = new Array(32,32);
        gs['cprop']['offset'] = new Array(192,0);
        gs['cprop']['selected'] = {id:0,// Current object selected for placement
            image:gs['res']['images'][0]}; // Default image shown on grid
        gs['cprop']['hovering'] = -1; // Current object ID being hovered over [ -1=None ]
        //gs['cprop']['selected']['image'].src = 'images/box.gif'; // Default image shown on grid
        
        
        
        gs['init'] = function() {
            
            
            $(gs['pre']+'footer1').innerHTML = "Initialized...";
            /*$(gs['pre']+'oBox').style.background = 'url(\'images/box.gif\')';
            $(gs['pre']+'oBox').style.width = '32px';
            $(gs['pre']+'oBox').style.height = '32px';*/ // Unused

            $(gs['pre']+'canvas0').width = gs['cprop']['size'][0];
            $(gs['pre']+'canvas0').height = gs['cprop']['size'][1];
            $(gs['pre']+'canvas0').style.border = "1px #999 solid"; // Grid layer
            
            $(gs['pre']+'canvas1').width = gs['cprop']['size'][0];
            $(gs['pre']+'canvas1').height = gs['cprop']['size'][1];
            $(gs['pre']+'canvas1').style.border = "1px #F00 dashed"; // Objects
            
            $(gs['pre']+'canvas2').width = gs['cprop']['size'][0];
            $(gs['pre']+'canvas2').height = gs['cprop']['size'][1];
            $(gs['pre']+'canvas2').style.border = "1px #0F0 dotted"; // Mouse
            
            var gc0 = $(gs['pre']+'canvas0').getContext('2d');
            var gc1 = $(gs['pre']+'canvas1').getContext('2d');
            var gc2 = $(gs['pre']+'canvas2').getContext('2d');
            gc2.globalAlpha = 0.8;
            
            gc0.translate(0.5,-0.5);
            gc0.strokeStyle = "#999";
            for (var yy=gs['cprop']['gridsize'][1];yy<gs['cprop']['size'][1];yy+=gs['cprop']['gridsize'][1]) {
                gc0.moveTo(0,yy);
                gc0.lineTo(gs['cprop']['size'][0],yy);
                gc0.stroke();
            }
            for (var xx=gs['cprop']['gridsize'][0];xx<gs['cprop']['size'][0];xx+=gs['cprop']['gridsize'][0]) {
                gc0.moveTo(xx,0);
                gc0.lineTo(xx,gs['cprop']['size'][1]);
                gc0.stroke();
            }
            
            
            
            $(gs['pre']+'canvas2').addEventListener('mousemove',canvasMouseMove,false);
            $(gs['pre']+'canvas2').addEventListener('mousedown',canvasMouseDown,false);
            $(gs['pre']+'canvas2').addEventListener('contextmenu',function(e){e.preventDefault();return false},false);
            
            function canvasMouseMove(e) {
                var mx = e.clientX-gs['cprop']['offset'][0], my = e.clientY-gs['cprop']['offset'][1]+(window.pageYOffset || document.documentElement.scrollTop);
                
                gs['cprop']['hovering'] = -1;
                for (var i=gs['objects'].length-1;i>-1;i--) { // Check if mouse is over an existing object
                    if (typeof gs['objects'][i] == 'undefined') continue;
                    if (posInBounds([mx,my],[gs['objects'][i]['x'],gs['objects'][i]['y'],gs['objects'][i]['w'],gs['objects'][i]['h']])) {
                        gs['cprop']['hovering'] = i; // Set current hovered object to iteration num
                        break; // Iterates backwards and breaks at first found, locating top-most object
                    }
                }
                
                if (gs['cprop']['hovering']!=-1) { $(gs['pre']+'canvas2').style.cursor = 'pointer'; $(gs['pre']+'footer2').innerHTML = "&nbsp;| ID: "+gs['cprop']['hovering']; }
                    else { $(gs['pre']+'canvas2').style.cursor = 'default'; $(gs['pre']+'footer2').innerHTML = ""; }
                
                if ($(gs['pre']+'snapToGrid').checked == true) {
                    mx = Math.floor(mx/gs['cprop']['gridsize'][0])*gs['cprop']['gridsize'][0];
                    my = Math.floor(my/gs['cprop']['gridsize'][1])*gs['cprop']['gridsize'][1];
                }
                $(gs['pre']+'footer1').innerHTML = 'Mouse: ('+mx+','+my+')';
                gc2.clearRect(0,0,gs['cprop']['size'][0],gs['cprop']['size'][1]);
                /*gc2.fillStyle = 'rgba(128,128,128,0.5)';
                gc2.fillRect(mx,
                            my,
                            gs['cprop']['gridsize'][0],
                            gs['cprop']['gridsize'][1]); */
                gc2.drawImage(gs['cprop']['selected']['image'],
                             mx,
                             my);
                
                
                
                
            }
            function canvasMouseDown(e) {
                var mx = e.clientX-gs['cprop']['offset'][0], my = e.clientY-gs['cprop']['offset'][1]+(window.pageYOffset || document.documentElement.scrollTop);
                if ($(gs['pre']+'snapToGrid').checked == true) {
                    mx = Math.floor(mx/gs['cprop']['gridsize'][0])*gs['cprop']['gridsize'][0];
                    my = Math.floor(my/gs['cprop']['gridsize'][1])*gs['cprop']['gridsize'][1];
                }
                if (e.button == 2) {
                    //Right click
                    $(gs['pre']+'footer3').innerHTML = '&nbsp;| Right Click';
                    
                    //Remove hovered object
                    if (gs['cprop']['hovering']!=-1) { delete gs['objects'][gs['cprop']['hovering']]; }
                } else {
                    //Left or other click
                    $(gs['pre']+'footer3').innerHTML = '&nbsp;| Primary Click';
                    var tmp = gs['cprop']['selected']['id'];
                    
                    //Add object at location
                    
                    gs['objects'][firstAvailable(gs['objects'])] = {x:mx,y:my,id:Math.round(Math.random()*1000),oid:tmp,
                    w:gs['res']['images'][gs['res']['objects'][tmp]['iid']].width,
                    h:gs['res']['images'][gs['res']['objects'][tmp]['iid']].height}; // Images must be loaded to pull dimensions from them
                }
                
                e.preventDefault();
                return false;
            }
        
            function $(id) { return document.getElementById(id); }
            
            function posInBounds(pos,bounds){ // Will return if pos lies within bounds :::: pos[x,y], bounds[left,top,width,height]
                return (pos[0] >= bounds[0] && pos[1] >= bounds[1] && pos[0] <= bounds[0]+bounds[2] && pos[1] <= bounds[1]+bounds[3])?true:false;
            }
            function firstAvailable(arr) { // Will return the first open position in an array (will append if none open)
                for (var i=0;i<arr.length;i++) {
                    if (typeof arr[i] == 'undefined') return i;
                }
                return arr.length;
            }
            
            window.requestAnimFrame = (function(){
            return  window.requestAnimationFrame       ||
                    window.webkitRequestAnimationFrame ||
                    window.mozRequestAnimationFrame    ||
                    function( callback ){
                      window.setTimeout(callback, 1000 / 60);
                    };
            })();
            (function step(){
                requestAnimFrame(step);
                
                gc1.clearRect(0,0,gs['cprop']['size'][0],gs['cprop']['size'][1]);
                for (var i=0;i<gs['objects'].length;i++) {
                    if (typeof gs['objects'][i] == 'undefined') continue;
                    gc1.drawImage(gs['res']['images'][gs['res']['objects'][gs['objects'][i]['oid']]['iid']],gs['objects'][i]['x'],gs['objects'][i]['y']);
                    //gc1.fillStyle = "#F00";
                    //gc1.fillRect(gs['objects'][i]['x'],gs['objects'][i]['y'],10,10);
                }
            })();
        }
        
        window.addEventListener('load', gs['init'], false);
    </script>
    <style type="text/css">
        html, body { margin:0;padding:0; }
        
        #gs_tools {
            float: left;
            width: 192px;
            height: 800px;
            background: rgb(255,255,255);
background: -moz-linear-gradient(-45deg,  rgba(255,255,255,1) 0%, rgba(241,241,241,1) 50%, rgba(225,225,225,1) 51%, rgba(246,246,246,1) 100%);
background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,rgba(255,255,255,1)), color-stop(50%,rgba(241,241,241,1)), color-stop(51%,rgba(225,225,225,1)), color-stop(100%,rgba(246,246,246,1)));
background: -webkit-linear-gradient(-45deg,  rgba(255,255,255,1) 0%,rgba(241,241,241,1) 50%,rgba(225,225,225,1) 51%,rgba(246,246,246,1) 100%);
background: -o-linear-gradient(-45deg,  rgba(255,255,255,1) 0%,rgba(241,241,241,1) 50%,rgba(225,225,225,1) 51%,rgba(246,246,246,1) 100%);
background: -ms-linear-gradient(-45deg,  rgba(255,255,255,1) 0%,rgba(241,241,241,1) 50%,rgba(225,225,225,1) 51%,rgba(246,246,246,1) 100%);
background: linear-gradient(135deg,  rgba(255,255,255,1) 0%,rgba(241,241,241,1) 50%,rgba(225,225,225,1) 51%,rgba(246,246,246,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f6f6f6',GradientType=1 );

        }
        #gs_tools a { text-decoration:none; color: #69F; }
        
        
        #gs_board {
            position: relative;
            float: left;
            width: 960px;
            height: 800px; /* Match JS Height */
        }
        #gs_board canvas {
            position: absolute; left: 0; top: 0;
        }
        
        #gs_footer {
            width: 100%;
            height: 18px;
            background: #CCC;
            position: fixed; bottom: 0; left: 0;
            padding: 4px;
            border-top: ridge 4px #999;
            font-family: "Arial", "Verdana", sans-serif;
            font-size: 14px;
        }
        #gs_footer div { float: left; }
        
        .clear { clear:both; }
    </style>
</head>
<body>
    <div id="gs_tools">
        <a href="#" onclick="return false;">Retract</a>
        
        <ul>
            <li>Images
                <ul>
                    <li>Box</li>
                    <li>Circle</li>
                    <li>Smallbox</li>
                </ul>
            </li>
            <li>Objects
                <ul>
                    <li><a href="#">Box1</a></li>
                    <li><a href="#">Box2</a></li>
                    <li><a href="#">Circle</a></li>
                    <li><a href="#">Small Box</a></li>
                </ul>
            </li>
        </ul>
    </div>
    
    <div id="gs_board">
        <canvas id="gs_canvas0"></canvas>
        <canvas id="gs_canvas1"></canvas>
        <canvas id="gs_canvas2"></canvas>
    </div>
    
    <div id="gs_tools2">
        <input type="checkbox" id="gs_snapToGrid" checked="true">Snap to grid</input>
    </div>
    
    <div class="clear"></div>
        
    <div id="gs_footer">
        <div id="gs_footer1"></div>
        <div id="gs_footer2"></div>
        <div id="gs_footer3"></div>
    </div>
</body>
</html>