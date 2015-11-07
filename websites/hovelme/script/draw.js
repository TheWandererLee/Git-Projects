cVars['drawModule']['$'] = new function() {
    
    var cg, mouseOver, mouseDown, inBounds;
    
    var clickIncoming;
    var mPos = [-1,-1];
    var menuExpanded = true;
    var menuColorPicker = false;
    var savedImage = new Image;
    var backgroundColor = '#003';
    var currentHSV = [0,0.75,1]; // Range 0-1
    var currentRGB = [0,200,255]; // Range 0-255
    var startDrag = false;
    
    var num = 0;
    var drawBuffer = [];
    
    this.load = function() {
        
        
        if (typeof cVars['chatModule'] == 'undefined') {
            //var send = function() {  }
        } else {
            var send = cVars['chatModule']['$'].send;
        }
        
        if (!$('drawModule')) { return false; } // Exit if drawModule is not found
        
        window.addEventListener('resize', drawWindowMoved, false);
        window.addEventListener('mousemove', drawMouseMove, false);
        window.addEventListener('mouseup', drawMouseUp, false);
        window.addEventListener('scroll', function() { window.scrollTo(0,0); }, false);
        
        window.addEventListener('load',function() { setTimeout(function() { window.scrollTo(0,0); }, 0) });
        
        $('drawModule').parentNode.addEventListener("conAdjustingEvent", drawWindowMoved, false);
        $('drawModule').parentNode.addEventListener("conAdjustedEvent", drawWindowMoved, false);
        
        /* iPhone fullscreen */
        //$('drawModule').parentNode.style.position = "fixed";
        
        var iPhoneSize = [320,505];
        $('drawModule').parentNode.style.left = "-1px";
        $('drawModule').parentNode.style.top = "-24px";
        $('drawModule').parentNode.style.width = iPhoneSize[0]+"px";
        $('drawModule').parentNode.style.height = (iPhoneSize[1]+24)+"px";
        
        $('drawModule').style.width = iPhoneSize[0]+"px";
        $('drawModuleMain').width = iPhoneSize[0];
        $('drawModule').style.height = (iPhoneSize[1])+"px";
        $('drawModuleMain').height = iPhoneSize[1];
        
        $('toolbar').style.visibility = "hidden";
        $('slider').style.visibility = "hidden";
        
        cgOffset = getElementPosition($('drawModuleMain'));
        cVars['drawModule']['size'][0] = iPhoneSize[0]; cVars['drawModule']['size'][1] = iPhoneSize[1];
        
        function drawMouseMove(eve,evey) { // Single argument (event) for PC. Double argument (x,y) for iPhone
            if (typeof evey != "undefined") {
                var m = [eve+sliderPosition,evey+$('viewframe').scrollTop];
                //drawMouse(m); clickIncoming = false; cVars['mousePosition'] = m; return false; // Instant iPhone processing
            } else {
                if (typeof event != "undefined") { eve = event; }
                var m = getExactPosition(eve);
                if (eve.which == 0) { mouseDown = false; }
            }
            mPos = m;
            
            //$('debug').innerHTML = "X:"+m[0]+"<br>Y:"+m[1]+"<br>MouseDown?"+cVars['mouseOver'];
            
            //If mousedown, mouse in bounds (for drawing under objects), or mouseover (directly on canvas):draw
            if (posInBounds(m, [cVars['drawModule']['position'][0], cVars['drawModule']['position'][1], cVars['drawModule']['size'][0], cVars['drawModule']['size'][1]]) || mouseOver) {
                if (mouseDown) {
                    //If connected, mouse position has changed, send packet (heavy on the network)
                    if (cVars['connected']) {
                        if ((cVars['mousePosition'][0] !== m[0] || cVars['mousePosition'][1] !== m[1]) && inBounds != true) {
                            send("$dl "+(cVars['mousePosition'][0]-cVars['drawModule']['position'][0])+" "+(cVars['mousePosition'][1]-cVars['drawModule']['position'][1]));
                            /////////////////////////////////////send("$d "+(m[0]-cgOffset[0])+" "+(m[1]-cgOffset[1]));
                        }
                        send("$d "+(m[0]-cVars['drawModule']['position'][0])+" "+(m[1]-cVars['drawModule']['position'][1]));
                    }
                    drawMouse(m); clickIncoming = false;
                }
                inBounds = true; // Mouse is in bounds
            } else {
                if (inBounds) { // Mouse just left the bounds. Emulates a mouseout function when mouse over another element (drawing underneath it) in order to catch the final stroke
                    if (mouseDown) {
                        if (cVars['connected']) {
                            send("$d "+(m[0]-cVars['drawModule']['position'][0])+" "+(m[1]-cVars['drawModule']['position'][1]));
                        }
                        drawMouse(m); clickIncoming = false;
                    }
                }
                inBounds = false; // Mouse is not in bounds
            }
            cVars['mousePosition'] = m;
            
            if (startDrag != false) { checkMenu(m); }
            drawMenu();
        }
        function drawMouseUp(eve) {
            //if (typeof event != "undefined") { eve = event; }
            startDrag = false;
            
            if (mouseDown) {
                //m = getExactPosition(eve);
                if (cVars['connected']) send("$d0"); clickIncoming = true;
                mouseDown = false;
            }
        }
        
        $('drawModuleMain').ontouchstart = function(e) {
            if (e.touches.length == 1) {
                //send("$d0");
                var m = [e.touches[0].pageX,e.touches[0].pageY];
                if (!checkMenu(m)) {
                    cVars['mousePosition'] = m;
                    
                    send("$d "+(m[0]-cgOffset[0])+" "+(m[1]-cgOffset[1]));
                    mouseDown = true;
                    drawMouseMove(m[0],m[1]);
                }
                document.body.focus(); $('viewframe').focus();
            }
        }
        $('drawModuleMain').ontouchmove = function(e) {
            if (e.touches.length == 1) {
                var m = [e.touches[0].pageX,e.touches[0].pageY];
                
                if (!checkMenu(m)) { mouseDown = true; }
                if (m[0] != cVars['mousePosition'][0] && m[1] != cVars['mousePosition'][1]) {
                    drawMouseMove(m[0], m[1]);
                }
                
            }
            //e.preventDefault();
            return false;
        }
        $('drawModuleMain').ontouchend = function(e) {
            drawMouseUp(e);
        };
        
        if (typeof iPhone == 'undefined') { // Do not register click events for iPhone
            $('drawModuleMain').onmousedown = function(e) {
                if (typeof event != "undefined") { e = event; }
                var m = getExactPosition(e);
                if (!checkMenu(m)) {
                    if (cVars['connected']) {
                        send("$d "+(m[0]-cVars['drawModule']['position'][0])+" "+(m[1]-cVars['drawModule']['position'][1]));
                    }
                    mouseDown = true;
                    drawMouseMove(e);
                }
                return false;
            }
        } else { $('drawModuleMain').onmousedown = function() { return false; } }
        $('drawModule').onmouseout = function(e) {
            if (typeof event != "undefined") { e = event; }
            if (mouseDown) drawMouseMove(e);
            mouseOver = false;
        }
        $('drawModule').onmouseover = function(e) {
            if (typeof event != "undefined") { e = event; }
            mouseOver = true;
        }
        
        //$('drawBtnClear').onclick = function() {
        //    drawClear(); //REMOVES CONTEXT ENTIRELY*** $('drawModuleMain').parentNode.removeChild($('drawModuleMain'));
        //};
        
        // Initiate canvas
        loadDrawCanvas();
    }
    function loadDrawCanvas() {
        $('drawModuleMain').width = 640;
        $('drawModuleMain').height = 1010;
        $('drawModuleMain').style.width = "320px";
        $('drawModuleMain').style.height = "505px"; // Double size then set scale later for retina display
        
        cVars['drawModule']['position'] = getElementPosition($('drawModuleMain'));
        
        if (!$('drawModuleMain').getContext) { $('drawModuleMain').innerHTML = "Your browser does not support canvas.<br>Please upgrade to a newer browser such as Google Chrome or Firefox.<br><br>Sorry for the inconvenience."; return; }
        cg = document.getElementById('drawModuleMain').getContext('2d'); // As soon as the canvas context initiates all other page javascript degrades    
        
        /*cg2e = document.createElement('canvas'); // A second, debug canvas
        cg2e.width = 320; cg2e.height = 505; cg2e.style.width = '320px'; cg2e.style.height = '505px'; cg2e.style.outline = '2px solid #F00';
        cg2e.style.position = 'absolute'; cg2e.style.left = '0px'; cg2e.style.top = '100px';
        $('drawModule').appendChild(cg2e);
        cg2 = cg2e.getContext('2d');
        cg2.lineWidth = 4; cg2.strokeStyle = "#000"; cg2.strokeRect(10,10,100,100);
        */
        
        /* cg.globalCompositeOperation = 'source-over'; // Bunch of crap just to show the canvas is loaded
        cg.fillStyle = "rgb(128,200,255)";
        cg.fillRect(10,10,8,8);
        */
        
        cg.strokeStyle = 'rgb('+currentRGB[0]+','+currentRGB[1]+','+currentRGB[2]+')';
        cg.lineWidth = 5;
        cg.lineCap = 'round';

        
        cg.scale(2, 2); cg.translate(0.5,0.5);
        drawClear();
        
        stepInterval = setInterval(step, 1000/40);
        
        //cg.lineJoin = 'round';
        //drawInterval = setInterval("draw()", 17);
    }
    function step() {
        num++;
        
        for (var i=0;i<drawBuffer.length;i++) {
            switch (drawBuffer[i][0]) {
                case 'lastDraw':
                    if (drawBuffer[i][2] == -1 && drawBuffer[i][3] == -1) {
                        cVars[drawBuffer[i][1]]['lastDraw'] = undefined;
                    } else {
                        cVars[drawBuffer[i][1]]['lastDraw'] = [Number(drawBuffer[i][2]),Number(drawBuffer[i][3])];
                    }
                    break;
                case 'continue':
                    drawOtherMouse(drawBuffer[i][1],[Number(drawBuffer[i][2]),Number(drawBuffer[i][3])]);
                    break;
                case 'mouseDown':
                    cVars[drawBuffer[i][1]]['mouseDown'] = true;
                    break;
                case 'mouseUp':
                    cVars[drawBuffer[i][1]]['mouseDown'] = false;
                    break;
                default:
                    break;
            }
        }
        drawBuffer = [];
        
        //drawClear();
        //cg.fillRect(Math.sin(num/10)*160+160,200,16,16);
        cg.clearRect(0,490,64,25);
        cg.fillText(num,0,500);
    }
    
    function drawClear() {
        //cg.clearRect(-1,-1,cVars['drawModule']['size'][0]+1,cVars['drawModule']['size'][1]+1);
        cg.fillStyle = backgroundColor;
        cg.fillRect(-1,-1,cVars['drawModule']['size'][0]+1,cVars['drawModule']['size'][1]+1);
        
        cg.fillStyle = 'rgb('+currentRGB[0]+','+currentRGB[1]+','+currentRGB[2]+')';
        drawMenu();
    }
    
    function checkMenu(mm) {
        if (!typeof mm == 'object') { return null; } // Input must be array [x,y]
        if (startDrag != false) { var mmnow = mm; mm = startDrag; } // If startDrag is set, we will swap now
        else { var mmnow = mm; }
        
        if (mm[0] >= 0 && mm[0] < 80 && mm[1] >= 0 && mm[1] < 32) {
            if (menuColorPicker) {
                drawClear(); cg.save(); cg.scale(0.5,0.5); cg.drawImage(savedImage, -1, -1); cg.restore();
                cg.strokeStyle = cg.fillStyle = 'rgb('+currentRGB[0]+','+currentRGB[1]+','+currentRGB[2]+')';
                if (cVars['connected']) {
                    var toSend = '$dC'+String.fromCharCode(Math.floor(currentRGB[0]/2))+String.fromCharCode(Math.floor(currentRGB[1]/2))+String.fromCharCode(Math.floor(currentRGB[2]/2));
                    send(toSend);
                } // Need to divide by 2 since we don't support sending binary, only unicode from 0-127 (anything above becomes double-byte)
            } // restore
            else { savedImage.src = $('drawModuleMain').toDataURL('image/png'); }
            menuColorPicker = !menuColorPicker;
        }
        else if (mm[0] >= 80 && mm[0] < 160 && mm[1] >= 0 && mm[1] < 32) {
            drawClear();
            if (cVars['connected']) {
                send('$dc');
            }
        }
        else if (mm[0] >= 280 && mm[0] < 320 && mm[1] >= 0 && mm[1] < 32) {
            //menuExpanded = !menuExpanded;
            if (cVars['connected']) {
                drawConnect();
            } else {
                drawConnect(false);
            }
        }
        else if (menuColorPicker) {
            if (mm[0] >= 20 && mm[0] <= 300 && mm[1] >= 52 && mm[1] <= 332) {
                currentHSV[1] = (Math.max(Math.min(mmnow[0],300),20)-20) / 280;
                currentHSV[2] = 1-(Math.max(Math.min(mmnow[1],332),52)-52) / 280;
                currentRGB = HSVtoRGB(currentHSV);
                if (startDrag == false) { startDrag = mm; }
            } else if (mm[0] >= 20 && mm[0] <= 300 && mm[1] >= 352 && mm[1] <= 384) {
                currentHSV[0] = (Math.max(Math.min(mmnow[0],300),20)-20) / 280;
                currentRGB = HSVtoRGB(currentHSV);
                if (startDrag == false) { startDrag = mm; }
            }
        } else { return false; }
        return true;
    }
    function drawMenu() {
        cg.save();
        
        cg.strokeStyle = '#006';
        cg.lineWidth = 1;
        cg.font = "18px Verdana";
        //if (mPos[0] >= 0 && mPos[0] <= 80 && mPos[1] >= 0 && mPos[1] <= 32) { cg.lineWidth = 4; cg.strokeStyle = '#FFF'; }
        
        cg.beginPath(); cg.moveTo(0,417); cg.lineTo(320,417); cg.stroke(); // This line shows the extent of iPhone 4 drawing screen
        
        cg.fillStyle = 'rgb('+currentRGB[0]+','+currentRGB[1]+','+currentRGB[2]+')';
        cg.fillRect(0,0,80,32);
        cg.strokeRect(0,0,80,32);

        cg.fillStyle = (cVars['connected']?'#393':'#933');
        cg.fillRect(80,0,80,32);
        cg.strokeRect(80,0,80,32);

        cg.fillRect(280,0,39,32);
        cg.strokeRect(280,0,39,32);
        cg.fillStyle = '#FFF';
        cg.beginPath();
        cg.moveTo(300,8);
        cg.lineTo(312,24);
        cg.lineTo(288,24);
        cg.fill();
        
        cg.fillStyle = '#FFF';
        cg.fillText("COLOR",10,24);
        cg.fillText("CLEAR",90,24);
        //cg.fillText("CLEAR",250,24);
        
        if (menuColorPicker) {
            var ng = [cg.createLinearGradient(20,0,300,0),cg.createLinearGradient(0,52,0,332),cg.createLinearGradient(20,0,300,0)]; // SAT[X], LIGHT[Y], HUE
            var tmp = HSVtoRGB([currentHSV[0],1,1]);
            ng[0].addColorStop(0,'#FFF');
            ng[0].addColorStop(1,'rgb('+tmp[0]+','+tmp[1]+','+tmp[2]+')');
            ng[1].addColorStop(0,'rgba(0,0,0,0)');
            ng[1].addColorStop(1,'rgba(0,0,0,1)');
            
            
            ng[2].addColorStop(0,'#F00');
            ng[2].addColorStop(0.166,'#FF0');
            ng[2].addColorStop(0.333,'#0F0');
            ng[2].addColorStop(0.5,'#0FF');
            ng[2].addColorStop(0.666,'#00F');
            ng[2].addColorStop(0.833,'#F0F');
            ng[2].addColorStop(1,'#F00');
            
            cg.strokeStyle = '#000'; cg.lineWidth = 12;
            cg.fillStyle = ng[0];
            cg.strokeRect(20,52,280,280);
            cg.fillRect(20,52,280,280); // SAT X
            cg.fillStyle = ng[1];
            cg.fillRect(20,52,280,280); // LUM Y
            
            cg.fillStyle = ng[2];
            cg.strokeRect(20,352,280,32);
            cg.fillRect(20,352,280,32); // Hue / 0-1
            
            cg.strokeStyle = '#FFF'; cg.lineWidth = 3;
            cg.beginPath(); cg.moveTo(20+currentHSV[0]*280,352); cg.lineTo(20+currentHSV[0]*280,384); cg.stroke();
            cg.lineWidth = 2;
            cg.beginPath(); cg.arc(20+currentHSV[1]*280,52+(1-currentHSV[2])*280,3,0,Math.PI*2,false); cg.stroke();
            
            cg.font = "11px Verdana"
            cg.fillStyle = '#CCC';
            cg.fillRect(20,394,280,23);
            cg.fillStyle = '#000';
            cg.fillText('H:'+(Math.round(currentHSV[0]*100)/100)
                        +' S:'+(Math.round(currentHSV[1]*100)/100)
                        +' L:'+(Math.round(currentHSV[2]*100)/100)
                        +' | R:'+currentRGB[0]
                        +' G:'+currentRGB[1]
                        +' B:'+currentRGB[2],24,412);
        }
        
        cg.restore();
    }
    
    function drawMouse(pos) {
        if (typeof cVars['mousePosition'] !== 'undefined') {
            if ((cVars['mousePosition'][0] == pos[0] && cVars['mousePosition'][1] == pos[1]) || clickIncoming) { // Click
                cg.beginPath();
                cg.arc(pos[0]-cVars['drawModule']['position'][0],pos[1]-cVars['drawModule']['position'][1],1.5,0,Math.PI*2,true);
                cg.fill();
            } else {
                cg.beginPath();
                cg.moveTo(cVars['mousePosition'][0]-cVars['drawModule']['position'][0],cVars['mousePosition'][1]-cVars['drawModule']['position'][1]);
                cg.lineTo(pos[0]-cVars['drawModule']['position'][0],pos[1]-cVars['drawModule']['position'][1]);
                cg.stroke();
            }
        }
    }
    drawOtherMouse = this.drawOtherMouse = function(client,pos) { // Seems like safari crashing problem is from doing CG operations at this point
        //currentHSV = [Math.random(),Math.random(),Math.random()];
        //currentRGB = HSVtoRGB(currentHSV);
        //alert(pos[0]+','+pos[1]);
        
        if (typeof cVars[client]['lastDraw'] != 'undefined') {
            if (cVars['mousePosition'][0] != pos[0] && cVars['mousePosition'][1] != pos[1]) { // Click
                cg.beginPath();
                cg.moveTo(cVars[client]['lastDraw'][0],cVars[client]['lastDraw'][1]);
                //cg.moveTo(0,0);
                cg.lineTo(pos[0],pos[1]);
                cg.stroke();
            }
        } else {
            cg.beginPath();
            cg.arc(pos[0],pos[1],1.5,0,Math.PI*2,true);
            cg.fill();
        }
    }
    
    function drawWindowMoved() { /* // ONLY disable this reinitialization when we don't want to clear while debugging. Function resizes canvas badly
        cgOffset = getElementPosition($('drawModuleMain'));
        
        //To allow for complete resizing. Re-initiate canvas with the updated size (will clear the drawing frame)
        var tmp = [Number($('drawModule').parentNode.style.width.substr(0,$('drawModule').parentNode.style.width.length-2)),Number($('drawModule').parentNode.style.height.substr(0,$('drawModule').parentNode.style.height.length-2)),24];
        cVars['drawModule']['size'][0] = tmp[0]; cVars['drawModule']['size'][1] = tmp[1];
        
        $('drawModule').style.width = tmp[0]+"px";
        $('drawModuleMain').width = tmp[0];
        $('drawModule').style.height = (tmp[1]-tmp[2])+"px";
        $('drawModuleMain').height = tmp[1]-tmp[2];
        
        loadDrawCanvas(); */
    }
    
    function HSVtoRGB(hsv) {
        if (typeof hsv != 'object' || hsv.length != 3) { return null; } // Must be array [H,S,V]
        var rgb = [0,0,0];
        var c = hsv[2] * hsv[1];
        var hd = hsv[0]*6; if (hd == 6) hd=0;
        var x = c * (1 - Math.abs(hd % 2 - 1));
        if (hd >= 0 && hd < 1 || hd == 6) { rgb = [c,x,0]; }
        if (hd >= 1 && hd < 2) { rgb = [x,c,0]; }
        if (hd >= 2 && hd < 3) { rgb = [0,c,x]; }
        if (hd >= 3 && hd < 4) { rgb = [0,x,c]; }
        if (hd >= 4 && hd < 5) { rgb = [x,0,c]; }
        if (hd >= 5 && hd < 6) { rgb = [c,0,x]; }
        x = hsv[2] - c;
        rgb = [Math.round((rgb[0]+x)*255),Math.round((rgb[1]+x)*255),Math.round((rgb[2]+x)*255)];
        return rgb;
    }
    
    
    ////// BUILT-IN NETWORK FUNCTIONS /////////
    
    send = this.send = function(text) {
        if (text == undefined) { text = ''; }
        if (cVars['simulatedLag'] > 0) {
            setTimeout(function() { Server.send( 'message', text ); },cVars['simulatedLag']);
        } else {
            Server.send( 'message', text );
        }
    }
    
    function drawConnect() {
        if (typeof arguments[0] == 'undefined') { var connect = false; } else { var connect = true; }
        
        if (connect) {
            //Server = new CustomWebsocket('ws://127.0.0.1:8399'); //Local
            Server = new CustomWebsocket('ws://192.155.95.165:8399'); //Dhafra / Linode VPS
            //Server = new CustomWebsocket('ws://68.97.98.186:8399'); //Dorms
            //Server = new CustomWebsocket('ws://72.198.87.28:8399'); //Ron
            //Server = new CustomWebsocket('ws://server.hovel.me:8399'); //Townley | Dynamic if server is updated
            
            //sndWelcome.play();
            
            Server.bind('close', function( data ) { // We've disconnected
                    //log('Disconnected.<div width="100%" style="height:1px;background:#FFF;"></div>','clientWarning',1);
                    cVars['connected'] = false;
                    //Server.disconnect();
            });
        
            Server.bind('message', function( rcvd ) { // Received something from the server
                if (typeof rcvd == 'object') { return false; }
                
                var msg = rcvd.substr(1);
                switch (rcvd.substr(0,1)) {
                    /* case 'M':
                        log( msg );
                        //sndBloop.play();
                        msgCount++;
                        break;
                    case 'C':
                        cVars['chatColor'] = '#'+msg;
                        modifyCSSClass('#chatArea .clientMsg','color','#'+msg)
                        $('chatInput').style.color = '#'+msg;
                        if (isModuleLoaded('drawModule')) { cg.strokeStyle = cg.fillStyle = cVars['drawColor'] = '#'+msg; }
                        break;
                    case 'S':
                        log ('<span class="serverWarning">'+msg+'</span>');
                        break;
                    case 's':
                        log ('<span class="serverNote">'+msg+'</span>');
                        break; */
                    case '/': // Server sets variable
                        tmp = msg.split(' ');
                        cVars[tmp[0]] = msg.substr(msg.indexOf(' ')+1); // Server requested we set a variable
                        //log ('<span class="serverNote">Your '+tmp[0]+' is now '+msg.substr(msg.indexOf(' ')+1)+'.</span>');
                        break;
                    case '$': // Server special command
                        tmp = msg.split(' ');
    
                        send(''); // Send something back so we can get a quick response
                        tmp[1] = Number(tmp[1]);
                        if (typeof cVars[tmp[1]] == 'undefined') cVars[tmp[1]] = new Array();
                        
                        if (tmp[0] == 'd') { // Draw move
                            //setTimeout(function() { cg.fillRect(Number(tmp[2]),Number(tmp[3]),2,2); },2000); // array(ClientID,x,y)
                            drawBuffer[drawBuffer.length] = ['continue',tmp[1],tmp[2],tmp[3]];
                            drawBuffer[drawBuffer.length] = ['lastDraw',tmp[1],tmp[2],tmp[3]];
                            drawBuffer[drawBuffer.length] = ['mouseDown',tmp[1]];
                            //drawOtherMouse(tmp[1],[tmp[2],tmp[3]]);
                            //cVars[tmp[1]]['lastDraw'] = [tmp[2],tmp[3]];
                            //cVars[tmp[1]]['mouseDown'] = true;
                        } else if (tmp[0] == 'd0') { // Draw stop
                            drawBuffer[drawBuffer.length] = ['lastDraw',tmp[1],-1,-1];
                            drawBuffer[drawBuffer.length] = ['mouseUp',tmp[1]];
                            //cVars[tmp[1]]['lastDraw'] = undefined;
                            //cVars[tmp[1]]['mouseDown'] = false;
                        } else if (tmp[0] == 'dl') { // Draw SET last position
                            drawBuffer[drawBuffer.length] = ['lastDraw',tmp[1],tmp[2],tmp[3]];
                            //cVars[tmp[1]]['lastDraw'] = [tmp[2],tmp[3]];
                        } else if (tmp[0] == 'dc') { // Draw: Clear all
                            drawClear();
                        } else if (msg.substr(0,2) == 'dC') { // Draw: Change color
                            tmp = msg.substr(2);
                            tmp = [tmp.charCodeAt(0)*2,tmp.charCodeAt(1)*2,tmp.charCodeAt(2)*2];
                            currentRGB = tmp;
                            cg.strokeStyle = cg.fillStyle = 'rgb('+currentRGB[0]+','+currentRGB[1]+','+currentRGB[2]+')';
                            drawMenu();
                            //alert(String(tmp.charCodeAt(0))+','+String(tmp.charCodeAt(1))+','+String(tmp.charCodeAt(2)));
                        }
                        break;
                    default:
                        //log("[CAUTION] INCORRECTLY FORMATTED SERVER MSG: "+msg);
                        break;
                }
            });
            
            Server.bind('open', function() { //We've connected
                    //log('Connected.','clientNote');
                    cVars['connected'] = true;
                    //cVars['name'] = $('chatName').value;
                    //send('/name ' + cVars['name']);
            });
        
            Server.connect();
        } else {
            Server.disconnect();
            delete Server;
        }
    }
    var CustomWebsocket = function(url) {
            var callbacks = {};
            var ws_url = url;
            var conn;
    
            this.bind = function(event_name, callback){
                    callbacks[event_name] = callbacks[event_name] || [];
                    callbacks[event_name].push(callback);
                    return this;// chainable
            };
    
            this.send = function(event_name, event_data){
                    this.conn.send( event_data );
                    return this;
            };
    
            this.connect = function() {
                    if ( typeof(MozWebSocket) == 'function' )
                            this.conn = new MozWebSocket(url);
                    else
                            this.conn = new WebSocket(url);
    
                    // dispatch to the right handlers
                    this.conn.onmessage = function(evt){
                        dispatch('message', evt.data);
                    };
    
                    this.conn.onclose = function(){dispatch('close',null)}
                    this.conn.onopen = function(){dispatch('open',null)}
            };
    
            this.disconnect = function() {
                this.conn.close();
            };
    
            var dispatch = function(event_name, message){
                    var chain = callbacks[event_name];
                    if(typeof chain == 'undefined') return; // no callbacks for this event
                    for(var i = 0; i < chain.length; i++){
                            chain[i]( message )
                    }
            }
    };
    
}
//Prepare module to be fired
document.addEventListener("readyEvent", cVars['drawModule']['$'].load, false);