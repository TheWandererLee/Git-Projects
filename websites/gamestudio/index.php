<?php ob_start("ob_gzhandler"); ?><!DOCTYPE html>
<html>
<head>
    <title>GameStudio by 13 Willows</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <script type="text/javascript">
        var gs = [];
        gs['pre'] = 'gs_';
        gs['imgdir'] = 'images/';
        gs['running'] = false;
        gs['fps'] = [0,0,setInterval(function(){gs['fps'][0]=gs['fps'][1];gs['fps'][1]=0},1000)];
        gs['keysdown'] = [];
        
        gs['res'] = []; // Reserved/resources, list of all available
        gs['res']['images'] = [new Image(),new Image(),new Image()]; // Load image resources
        gs['res']['images']['none'] = new Image(); gs['res']['images']['none'].src = 'images/none.gif';
        gs['res']['images'][0].src = 'images/box.gif';
        gs['res']['images'][1].src = 'images/ball.gif';
        gs['res']['images'][2].src = 'images/smallbox.gif';
        
        gs['res']['objects'] = [];
        gs['res']['objects'][0] = {iid:0,name:'Box1',origin:[0,0]}; //ID(as index) | ImageID, Origin
        gs['res']['objects'][1] = {iid:0,name:'Box2',origin:[16,16]};
        gs['res']['objects'][2] = {iid:1,name:'Circle',origin:[16,12]};
        gs['res']['objects'][3] = {iid:2,name:'Small Box',origin:[8,8]};
        
        gs['objects'] = []; // PLACED objects
        
        gs['cprop'] = [];
        gs['cprop']['size'] = new Array(960,608);
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
            gc2.globalAlpha = 0.8; gc1.fillStyle = '#0F0'; gc1.font = 'bold 16px Courier New';
            
            gc0.translate(0.5,0.5);
            gc0.strokeStyle = "#999";
            for (var yy=gs['cprop']['gridsize'][1];yy<gs['cprop']['size'][1];yy+=gs['cprop']['gridsize'][1]) {
                gc0.moveTo(0,yy);
                gc0.lineTo(gs['cprop']['size'][0],yy);
                gc0.stroke();
            }
            for (var xx=gs['cprop']['gridsize'][0];xx<gs['cprop']['size'][0];xx+=gs['cprop']['gridsize'][0]) {
                gc0.moveTo(xx,-1); // Lines need to start a little off grid to avoid having a line ending gap
                gc0.lineTo(xx,gs['cprop']['size'][1]);
                gc0.stroke();
            }
            
            //////////////////////////////////////////////////// TRIGGERS //////////////////////////////////////////////////////////////////////////////////////////////////////////
            // Initiate canvas triggers
            //$(gs['pre']+'canvas2').addEventListener('mousemove',canvasMouseMove);
            $(gs['pre']+'canvas2').addEventListener('mousedown',canvasMouseDown);
            $(gs['pre']+'canvas2').addEventListener('contextmenu',function(e){e.preventDefault();return false});
            
            //Initiate body triggers
            document.body.addEventListener('keydown',bodyKeyDown);
            document.body.addEventListener('keyup',bodyKeyUp);
            document.body.addEventListener('mouseup',bodyMouseUp);
            document.body.addEventListener('mousemove',bodyMouseMove);
            
            //Initiate object link triggers
            for (var i=0;i<gs['res']['objects'].length;i++) {
                if ($(gs['pre']+'obj_'+i) == null) continue;
                
                $(gs['pre']+'obj_'+i).addEventListener('click',function(e){selectObject(e)});
                $(gs['pre']+'obj_'+i).addEventListener('dblclick',function(e){editObject(e)});
                $(gs['pre']+'obj_'+i).objID = i;
            }
            
            //Initiate button/menu triggers
            $(gs['pre']+'toggleTest').addEventListener('click',toggleTest);
            $(gs['pre']+'addObject').addEventListener('click',addObject);
            
            function toggleTest() {
                gs['running'] = !gs['running'];
                if (gs['running']) {
                    saveMapState();
                    $(gs['pre']+'canvas0').style.visibility = 'hidden';
                    $(gs['pre']+'canvas2').style.visibility = 'hidden';
                } else {
                    loadMapState();
                    $(gs['pre']+'canvas0').style.visibility = 'visible';
                    $(gs['pre']+'canvas2').style.visibility = 'visible';
                }
            }
            function addObject(e) {
                var tmp = firstAvailable(gs['res']['objects']);
                
                
                gs['res']['objects'][tmp] = { // eName, eImage
                    iid:'none',
                    name:'Object '+tmp,
                    origin:[0,0],
                    eList:document.createElement('li'),
                    editor:document.createElement('div'),
                    hooks:[]
                };
                
                var tmpo = gs['res']['objects'][tmp];
                
                tmpo['eList'].innerHTML = 'Object '+tmp;
                tmpo['eList'].className = 'noselect';
                tmpo['eList'].objID = tmp;
                
                tmpo['eList'].addEventListener('click',function(e){selectObject(e)});
                tmpo['eList'].addEventListener('dblclick',function(e){editObject(e)});
                
                $(gs['pre']+'objects').appendChild(tmpo['eList']);
                
                // Build editor for this object
                tmpo['editor'].className = gs['pre']+'objEditor';
                tmpo['editor'].innerHTML = '<h1>Object Editor</h1>Name:<input type="text" id="'+gs['pre']+'objEditor'+tmp+'name" value="Object '+tmp+'">'+
                                           'Image:<input type="text" id="'+gs['pre']+'objEditor'+tmp+'image" value="none">'+
                                           '<br><br>'+
                                           '<div id="'+gs['pre']+'objEditor'+tmp+'hooks" class="'+gs['pre']+'objHooks"></div>'+
                                           '<br><select id="'+gs['pre']+'objEditor'+tmp+'hookOption1">'+
                                           '<option value="creation">Object Creation</option><option value="frame">Every Frame</option>'+
                                           '<option value="keypressed">Key is Down</option>'+
                                           '</select>'+
                                           '<select id="'+gs['pre']+'objEditor'+tmp+'hookOption2"></select>'+
                                           '<a href="#" id="'+gs['pre']+'objEditor'+tmp+'addHook">Add Hook</a>'+
                                           '<br><br><a href="#" id="'+gs['pre']+'objEditor'+tmp+'close">Close</a>';
                document.body.appendChild(tmpo['editor']);
                
                // These elements are pulled manually later since they are added to the DOM through innerHTML w/ formatting (above) as opposed to using appendChild
                tmpo['eName'] = $(gs['pre']+'objEditor'+tmp+'name');
                tmpo['eImage'] = $(gs['pre']+'objEditor'+tmp+'image');
                tmpo['eClose'] = $(gs['pre']+'objEditor'+tmp+'close');
                tmpo['eHookOption1'] = $(gs['pre']+'objEditor'+tmp+'hookOption1');
                tmpo['eHookOption2'] = $(gs['pre']+'objEditor'+tmp+'hookOption2');
                tmpo['eAddHook'] = $(gs['pre']+'objEditor'+tmp+'addHook');
                tmpo['eHooks'] = $(gs['pre']+'objEditor'+tmp+'hooks');
                
                
                tmpo['eName'].objID = tmp;
                tmpo['eName'].addEventListener('change',editObjectName);
                tmpo['eName'].addEventListener('keyup',editObjectName);
                
                tmpo['eImage'].objID = tmp;
                tmpo['eImage'].addEventListener('change',editImageName);
                tmpo['eImage'].addEventListener('keyup',editImageName);
                
                tmpo['eAddHook'].objID = tmp;
                tmpo['eAddHook'].addEventListener('click',addObjectHook);
                
                tmpo['eClose'].objID = tmp;
                tmpo['eClose'].addEventListener('click',closeObjectEditor);
            }
            function selectObject(e) {
                gs['cprop']['selected'] = {id:e.target.objID,
                image:gs['res']['images'][
                                    gs['res']['objects'][e.target.objID]['iid']
                                    ]}
                
                e.preventDefault(); // Stop hashtag from appearing
            }
            function editObject(e) {
                openObjectEditor(e);
                clearSelection();
            }
            function openObjectEditor(e) {
                gs['res']['objects'][e.target.objID]['editor'].style.visibility = "visible";
            }
            function closeObjectEditor(e) {
                gs['res']['objects'][e.target.objID]['editor'].style.visibility = "hidden";
            }
            function addObjectHook(e) {
                var id = e.target.objID;
                var tmp = document.createElement('div');
                tmp.className = gs['pre']+'objHook';
                
                gs['res']['objects'][id]['eHooks'].appendChild(tmp);
                
                var hooks = gs['res']['objects'][id]['hooks'];
                var hID = firstAvailable(hooks);
                hooks[hID] = {
                    trigger:$(gs['pre']+'objEditor'+id+'hookOption1').value,
                    element:tmp,
                    eTrigger:document.createElement('a'),
                    actions:[[1,2,0],[1,0,1]]
                    }
                hooks[hID]['eTrigger'].setAttribute('href','#');
                hooks[hID]['eTrigger'].innerHTML = hooks[hID]['trigger'];
                
                tmp.appendChild(hooks[hID]['eTrigger']);
                var tmpsep = document.createElement('div'); tmpsep.className = gs['pre']+'hookSeparator';
                tmp.appendChild(tmpsep);
            }
            function editObjectName(e) {
                gs['res']['objects'][e.target.objID]['eList'].innerHTML = gs['res']['objects'][e.target.objID]['name'] = gs['res']['objects'][e.target.objID]['eName'].value;
            }
            function editImageName(e) {
                var tmp = gs['res']['objects'][e.target.objID]['eImage'].value;
                if (isNumber(tmp) && typeof gs['res']['images'][Number(tmp)] != 'undefined') {
                    gs['res']['objects'][e.target.objID]['iid'] = Number(tmp);
                    if (gs['cprop']['selected']['id'] == e.target.objID) gs['cprop']['selected']['image'] = gs['res']['images'][Number(tmp)];
                } else {
                    gs['res']['objects'][e.target.objID]['iid'] = 'none';
                    if (gs['cprop']['selected']['id'] == e.target.objID) gs['cprop']['selected']['image'] = gs['res']['images']['none'];
                }
                
            }
            
            function isNumber(n) {
                return !isNaN(parseFloat(n)) && isFinite(n);
            }
            
            function saveMapState() {
                gs['backupObjects'] = new Array();
                for (var i=0;i<gs['objects'].length;i++) { // Save all properties in case object is deleted
                    if (typeof gs['objects'][i] == 'undefined') continue; // Skip empty indices
                    gs['backupObjects'][i] = {
                        x:gs['objects'][i]['x'],
                        y:gs['objects'][i]['y'],
                        w:gs['objects'][i]['w'],
                        h:gs['objects'][i]['h'],
                        oid:gs['objects'][i]['oid']};
                }
            }
            function loadMapState() {
                for (var i=0;i<gs['backupObjects'].length;i++) {
                    if (typeof gs['backupObjects'][i] == 'undefined') {
                        // Ensure an object has not been created in its place
                        if(typeof gs['objects'][i] != 'undefined') delete gs['objects'][i]; // Object was created in its place, delete
                        continue; // Don't restore any properties now or check if this object ID has been deleted
                    }
                    
                    if (typeof gs['objects'][i] == 'undefined') {
                        // Object was deleted, recreate object and restore immutable properties
                        
                        gs['objects'][i] = {oid:gs['backupObjects'][i]['oid']};
                    }
                    
                    // Restore mutable properties
                    gs['objects'][i]['x'] = gs['backupObjects'][i]['x'];
                    gs['objects'][i]['y'] = gs['backupObjects'][i]['y'];
                    gs['objects'][i]['w'] = gs['backupObjects'][i]['w'];
                    gs['objects'][i]['h'] = gs['backupObjects'][i]['h'];
                }
                
                gs['objects'].splice(gs['backupObjects'].length,gs['objects'].length-gs['backupObjects'].length); // Remove any additional objects that may have been added
            }
            
            function bodyKeyDown(e) {
                if (gs['keysdown'].indexOf(e.keyCode) == -1) gs['keysdown'][gs['keysdown'].length] = e.keyCode;
                updateKeysDown();
            }
            function bodyKeyUp(e) {
                if (gs['keysdown'].indexOf(e.keyCode) != -1) {
                    gs['keysdown'].splice(gs['keysdown'].indexOf(e.keyCode),1);
                }
                updateKeysDown();
            }
            function updateKeysDown() {
                var tmp = '';
                for (var i=0;i<gs['keysdown'].length;i++) {
                    if (i!=0) tmp+=','
                    else tmp+= "&nbsp;| Keys: ";
                    tmp+=gs['keyCodeMap'][gs['keysdown'][i]]+'('+gs['keysdown'][i]+')';
                }
                $(gs['pre']+'footer4').innerHTML = tmp;
            }
            
            function bodyMouseMove(e) {
                var mx = e.clientX-gs['cprop']['offset'][0], my = e.clientY-gs['cprop']['offset'][1]+(window.pageYOffset || document.documentElement.scrollTop);
                
                gs['cprop']['hovering'] = -1;
                gc2.clearRect(0,0,gs['cprop']['size'][0],gs['cprop']['size'][1]);
                
                if (!posInBounds([mx,my],[0,0,gs['cprop']['size'][0]-1,gs['cprop']['size'][1]-1])) {
                    $(gs['pre']+'footer1').innerHTML = '';
                    return false;
                }
                
                for (var i=gs['objects'].length-1;i>-1;i--) { // Check if mouse is over an existing object
                    if (typeof gs['objects'][i] == 'undefined') continue;
                    if (posInBounds([mx,my],[gs['objects'][i]['x'],gs['objects'][i]['y'],gs['objects'][i]['w'],gs['objects'][i]['h']])) {
                        gs['cprop']['hovering'] = i; // Set current hovered object to iteration num
                        break; // Iterates backwards and breaks at first found, locating top-most object
                    }
                }
                
                if (gs['cprop']['hovering']!=-1) { $(gs['pre']+'canvas2').style.cursor = 'pointer'; $(gs['pre']+'footer2').innerHTML = "&nbsp;| ID: "+gs['cprop']['hovering']; }
                    else { $(gs['pre']+'canvas2').style.cursor = 'default'; $(gs['pre']+'footer2').innerHTML = ""; }
                
                if ($(gs['pre']+'snapToGrid').checked == true) { // Everything below this will have snapped mouse pos (ghost,debug text). Above is not snapped [object hovering]
                    mx = Math.floor((mx-1)/gs['cprop']['gridsize'][0])*gs['cprop']['gridsize'][0];
                    my = Math.floor((my-1)/gs['cprop']['gridsize'][1])*gs['cprop']['gridsize'][1];
                } //                   -1 because grid is offset
                $(gs['pre']+'footer1').innerHTML = 'Mouse: ('+mx+','+my+')';

                gc2.drawImage(gs['cprop']['selected']['image'],mx,my); // Draw selected object's ghost at mouse
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
                    // Objects have properties:    X, Y, OID[/], W, H.
                    // A [/] signifies unmodifiable property, and will not be backed up/restored on map load/save
                    gs['objects'][firstAvailable(gs['objects'])] = {x:mx,y:my,id:Math.round(Math.random()*1000),oid:tmp,
                    w:gs['res']['images'][gs['res']['objects'][tmp]['iid']].width,
                    h:gs['res']['images'][gs['res']['objects'][tmp]['iid']].height}; // Images must be loaded to pull dimensions from them
                }
                
                e.preventDefault();
                return false;
            }
        
            function bodyMouseUp(e) {
                $(gs['pre']+'footer3').innerHTML = '';
            }
            function $(id) { return document.getElementById(id); }
            
            function clearSelection() {
                if(document.selection && document.selection.empty) {
                    document.selection.empty();
                } else if(window.getSelection) {
                    var sel = window.getSelection();
                    sel.removeAllRanges();
                }
            }
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
                gs['fps'][1]++; //FPS Counter
                
                if (gs['running']) {
                    gs['objects'][0]['x']+=1;
                }
                
                gc1.clearRect(0,0,gs['cprop']['size'][0],gs['cprop']['size'][1]); // Clear canvas
                
                for (var i=0;i<gs['objects'].length;i++) { // Object drawing
                    if (typeof gs['objects'][i] == 'undefined') continue; // Skip empty indices
                    if (gs['running'] && gs['res']['objects'][gs['objects'][i]['oid']]['iid'] == 'none') continue; // Don't show imageless objects while running
                    
                    gc1.drawImage(gs['res']['images'][gs['res']['objects'][gs['objects'][i]['oid']]['iid']],gs['objects'][i]['x'],gs['objects'][i]['y']);
                    
                    //gc1.fillStyle = "#F00";
                    //gc1.fillRect(gs['objects'][i]['x'],gs['objects'][i]['y'],10,10);
                }
                
                if ($(gs['pre']+'showFPS').checked) gc1.fillText('FPS: '+gs['fps'][0],0,16); // Draw FPS
            })();
        }
        
        gs['keyCodeMap'] = {
            8:"backspace", 9:"tab", 13:"return", 16:"shift", 17:"ctrl", 18:"alt", 19:"pausebreak", 20:"capslock", 27:"escape", 32:" ", 33:"pageup",
            34:"pagedown", 35:"end", 36:"home", 37:"left", 38:"up", 39:"right", 40:"down", 43:"+", 44:"printscreen", 45:"insert", 46:"delete",
            48:"0", 49:"1", 50:"2", 51:"3", 52:"4", 53:"5", 54:"6", 55:"7", 56:"8", 57:"9", 59:";",
            61:"=", 65:"a", 66:"b", 67:"c", 68:"d", 69:"e", 70:"f", 71:"g", 72:"h", 73:"i", 74:"j", 75:"k", 76:"l",
            77:"m", 78:"n", 79:"o", 80:"p", 81:"q", 82:"r", 83:"s", 84:"t", 85:"u", 86:"v", 87:"w", 88:"x", 89:"y", 90:"z",
            96:"0", 97:"1", 98:"2", 99:"3", 100:"4", 101:"5", 102:"6", 103:"7", 104:"8", 105:"9",
            106: "*", 107:"+", 109:"-", 110:".", 111: "/",
            112:"f1", 113:"f2", 114:"f3", 115:"f4", 116:"f5", 117:"f6", 118:"f7", 119:"f8", 120:"f9", 121:"f10", 122:"f11", 123:"f12",
            144:"numlock", 145:"scrolllock", 186:";", 187:"=", 188:",", 189:"-", 190:".", 191:"/", 192:"`", 219:"[", 220:"\\", 221:"]", 222:"'"
        }
        gs['keyCodeShift'] = {
            192:"~", 48:")", 49:"!", 50:"@", 51:"#", 52:"$", 53:"%", 54:"^", 55:"&", 56:"*", 57:"(", 109:"_", 61:"+",
            219:"{", 221:"}", 220:"|", 59:":", 222:"\"", 188:"<", 189:">", 191:"?",
            96:"insert", 97:"end", 98:"down", 99:"pagedown", 100:"left", 102:"right", 103:"home", 104:"up", 105:"pageup"
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
        
        #gs_objects li { cursor: pointer; color: #08F; display: inline; float: left; clear: left; }
        
        .gs_objEditor { position: absolute; top: 64px; left: 192px; width: 512px; height: 400px; background: rgba(255,255,255,0.7); border: 1px solid #036; border-radius: 16px 16px 0 0; padding: 8px; }
        .gs_objEditor h1 { font: 18px Verdana; font-weight: bold; margin: 0; }
        
        .gs_objHooks { width: 480px; height: 192px; background: rgba(32,32,32,0.8); box-shadow: 0 0 16px #000 inset; border: 2px #999 solid; }
        
        
        .gs_objHook { width: 100%; height: 32px; border-bottom: 1px #999 solid; box-shadow: 0 1px 1px #000; }
        .gs_objHook a { text-decoration: none; color: #3CF; padding: 0 4px; }
        /*.gs_objHooks div { clear: both; outline: 1px solid #F00; height: 32px; }*/
        
        .gs_hookSeparator { width: 1px; height: 32px; background: #999; box-shadow: 1px 1px 1px #000; display: inline-block; vertical-align: middle; }
        
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
        
        .noselect {
            -webkit-user-select: none; /* webkit (safari, chrome) browsers */
            -moz-user-select: none; /* mozilla browsers */
            -khtml-user-select: none; /* webkit (konqueror) browsers */
            -ms-user-select: none; /* IE10+ */
        }
    </style>
</head>
<body>
    <div id="gs_tools">
        <a href="#" onclick="return false;">Retract</a>
        
        <ul>
            <li>Images
                <ul id="gs_images">
                    <li>Box</li>
                    <li>Circle</li>
                    <li>Smallbox</li>
                </ul>
            </li>
            <li>Objects
                <ul id="gs_objects">
                    <li id="gs_obj_0">Box1</li>
                    <li id="gs_obj_1">Box2</li>
                    <li id="gs_obj_2">Circle</li>
                    <li id="gs_obj_3">Small Box</li>
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
        <input type="checkbox" id="gs_showFPS" checked="true">Show FPS</input>
        <input type="button" id="gs_toggleTest" value="Run Test"></input>
        <input type="button" id="gs_addObject" value="Add Object"></input>
    </div>
    
    <div class="clear"></div>
        
    <div id="gs_footer">
        <div id="gs_footer1"></div><!--MousePos-->
        <div id="gs_footer2"></div><!--ID Hovered-->
        <div id="gs_footer3"></div><!--MousePressed-->
        <div id="gs_footer4"></div><!--KeyPress-->
    </div>
    
    <!--
    <div id="gs_objEditor0" class="gs_objEditor">
        <h1>Object Editor</h1>
        <a href="#">Close</a>
        
        <input type="text" value="Box"><div>Image: <input type="text" value="0"></div><div>Dimensions: 0x0</div>
        </div>
        <div>
            <div>Event:</div><div>Action Action Action Action</div>
        </div>
        <div>
            <div>Event:</div><div>Action Action Action Action Action Action Action Action Action Action Action Action Action Action</div>
        </div>
        <input type="button" value="Save">
    </div>
    -->
</body>
</html>