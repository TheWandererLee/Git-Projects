cVars['rigorMortisModule']['$'] = new function() { // Initiate namespace
    //var includeFiles = ['rmDraw.js'];
    //var includeFileCounter = 0;
    
    var cg, realFps, time=0;
    //this.time = time = 0;
    var debugStepDirection = 0;
    
    var fps, yankTimer;
    var keyvx=0, keyvy=0, keyvb = []; // Move vector x, move vector y, key vector bank [stores keys pressed to avoid repeats]
    var mVars = cVars['rigorMortisModule']; // Bring over module variables from main site. This is a pointer (So is everything else in JS >.>)
    
    var HUDsize = HUDsize = 96; // Static set global variables
    
    var p = [300,200,0,0]; // Player Variables [x,y,direction,speed] // Direction range from -PI to PI, (left to left, clockwise)
    p['speed'] = 128; /* Pixels Per Second */ p['size'] = [32,32]; p['hp'] = 60; p['maxhp'] = 80;
    p['weapon'] = 'pistol'; p['hpregen'] = 2; p['lastMove'] = [300,200,0,0,0];
    
    // p['lastMove']
    
    // Multiplayer variables
    var players = []; // All players (0 is unused)
    
    var buffer = []; // Our buffer of past actions
    var pbuffer = []; // Other players buffers
    
    // Greatly affect network how we see things. ReplayDelay should be dynamically changed in-game in the future
    var netFrequency = 20; // Updates we send out per second. Less updates will have other players seeing our actions later. Makes sense to match servers
    var replayDelay = 450; // How far in the past to replay the servers updates. Setting this below the players 2-way ping will cause more jumps. Setting below servers netFrequency becomes useless.
    // ^^^ Only used for other players, they will pull this variable to see how far in the past to show your changes
    var bufferSize = 1000; // Maximum number of actions to store in the history buffer for other players (per replayDelay)
    // ^ Best set at twice the net frequency, in case 1 packet is missed, the next one will have time to get there.
    
    var lastNetUpdate = 0;
    var lastBufferUpdate = 0; // Game ticks (time) at last buffer update
    cVars['simulatedLag'] = 0; // Can be set above 0 to simulate network lag each-way
    
    var currentGame, serverInitiated;
    var currentFrame = [];
    var gameStart; // Tick @ game connect
    
    //var Server = cVars['chatModule']['$'].Server;
    
    //////////////////////////////
    
    var map = [];
    map[0] = [];
    map[0][0] = [400,100,200,100]; // x, y, w, h OR x1, y1, x2, y2, x3, y3 etc.
    map[0][1] = [210,280,200,350,240,320,350,400,310,320,300,250,280,320];
    map[0][2] = [340,200,550,200,450,300];
    
    ////////////////////////////// Declaring bullet/enemy/object/etc. variables by using type name is necessary to avoid type IDs conflicting with element IDs
    
    var bullets = []; // x, y, dir, speed, from[PLAYERID]
    
    bullets['pistol'] = [];
    bullets['pistol']['speed'] = 1400; // (pixels) Feet per second
    bullets['pistol']['damage'] = [30,35];
    
    var enemies = []; // x, y, direction, speed, type
    enemies['types'] = {0:'normal',1:'fatty'};
    
    // All enemies need ['type'], ['attack']
    
    enemies['normal'] = [32,24]; //Size
    enemies['normal']['speed'] = 64;
    enemies['normal']['hp'] = [90,125];
    enemies['normal']['attack'] = [10,40,500,700,500]; // Damage, range, frequency (from last strike to next animation, must B > duration), duration, strike-point
    enemies['normal']['stopDistance'] = 30;
    
    enemies['fatty'] = [48,32]; //Size
    enemies['fatty']['speed'] = 32;
    enemies['fatty']['hp'] = [400,500];
    enemies['fatty']['attack'] = [30,10,500,200,100];
    enemies['fatty']['stopDistance'] = 10;
    
    var objects = []; // x, y, type
    objects['types'] = {1001:'money'};
    
    objects['money'] = [19,8]; //Size
    
    //var emitters = []; // x1, y1, x2, y2, frequency, type, next [next emit millisecond] // Deprected: This is now handled server-side
    //emitters[0] = {0:100,1:100,2:300,3:250,'frequency':[1000,2000],'type':'normal','next':1000000};
    
    //emitters[1] = {0:600,1:350,2:700,3:450,'frequency':[6000,8000],'type':'fatty','next':1000000};
    
    var startTime = new Date().getTime();
    
    this.load = function() {
        /*var includeFiles = cVars['rigorMortisModule']['$'].includeFiles;
        for (var i=0;i<includeFiles.length;i++) {
            cVars['rigorMortisModule']['$'].includeFileCounter = i;
            loadScript('script/rigorMortis/'+includeFiles[i],
                       function() { scriptLoaded(cVars['rigorMortisModule']['$'].includeFiles[cVars['rigorMortisModule']['$'].includeFileCounter]); });
        }*/
        initAll();
    }
    
    function initAll() {
        //////// INITIATE WINDOW LISTENERS & FUNCTIONS ////////
        window.addEventListener('keydown', keyDown, false);
        window.addEventListener('keyup', keyUp, false);
        
        window.addEventListener('blur', windowBlur, false);
        
        window.addEventListener('mousemove', mouseMove, false);
        
        $('rigorMortisModule').parentNode.addEventListener("conAdjustingEvent", windowMoved, false);
        $('rigorMortisModule').parentNode.addEventListener("conAdjustedEvent", windowMoved, false);
        
        function windowBlur(e) {
            var tt = new Date().getTime()-startTime;
            keyvb = []; keyvx = keyvy = 0; p[3] = 0;
            if (typeof currentGame != 'undefined') {
                buffer[buffer.length] = [tt,String.fromCharCode(0)];
            }
            calculateNewPosition(tt,true);
        }
        
        function keyDown(e) {
            if (typeof event != "undefined") { e = event; }
            
            if (e.keyCode == 68 || e.keyCode == 87 || e.keyCode == 65 || e.keyCode == 83) {
                var tt = new Date().getTime()-startTime; if (typeof lastBufferUpdate == 'undefined') { lastBufferUpdate = tt; }
                
                if (keyvb.indexOf(e.keyCode) < 0) { // Only continue if key isn't already being pressed (key being held causing repeat keystrokes)
                    calculateNewPosition(tt);
                    
                    p[3] = p['speed'];
                    switch (e.keyCode) { // Calculate moving direction from keys pressed. Ignores held keys.
                        case 68: //Right
                            buffer[buffer.length] = [tt,'k'+toUint7(68)];
                            lastBufferUpdate = tt;
                            keyvx+=1; keyvb[keyvb.length]=68; break;
                        case 87: //Up
                            buffer[buffer.length] = [tt,'k'+toUint7(87)];
                            lastBufferUpdate = tt;
                            keyvy-=1; keyvb[keyvb.length]=87; break;
                        case 65: //Left
                            buffer[buffer.length] = [tt,'k'+toUint7(65)];
                            lastBufferUpdate = tt;
                            keyvx-=1; keyvb[keyvb.length]=65; break;
                        case 83: //Down
                            buffer[buffer.length] = [tt,'k'+toUint7(83)];
                            lastBufferUpdate = tt;
                            keyvy+=1; keyvb[keyvb.length]=83; break;
                    }
                    p[2] = Math.round(Math.atan2(keyvy,keyvx)*1000)/1000;
                    
                    clearTimeout(yankTimer);
                    
                    p['lastMove'] = [p[0],p[1],p[2],p[3],tt];
                }
            }
            
            cg.fillStyle = "rgb(0,255,0)";
            cg.fillText(e.keyCode,16,32);
        }
        function keyUp(e) {
            if (typeof event != "undefined") { e = event; }
            
            if (e.keyCode == 68 || e.keyCode == 87 || e.keyCode == 65 || e.keyCode == 83) {
                var tt = new Date().getTime()-startTime; if (typeof lastBufferUpdate == 'undefined') { lastBufferUpdate = tt; }
                
                calculateNewPosition(tt);
                
                switch (e.keyCode) { // Invert moving direction from keys RELEASED
                    case 68: //Right
                        buffer[buffer.length] = [tt,'K'+toUint7(68)];
                        lastBufferUpdate = tt;
                        if (keyvb.indexOf(68) > -1) { keyvb.splice(keyvb.indexOf(68),1); keyvx-=1; } break;
                    case 87: //Up
                        buffer[buffer.length] = [tt,'K'+toUint7(87)];
                        lastBufferUpdate = tt;
                        if (keyvb.indexOf(87) > -1) { keyvb.splice(keyvb.indexOf(87),1); keyvy+=1; } break;
                    case 65: //Left
                        buffer[buffer.length] = [tt,'K'+toUint7(65)];
                        lastBufferUpdate = tt;
                        if (keyvb.indexOf(65) > -1) { keyvb.splice(keyvb.indexOf(65),1); keyvx+=1; } break;
                    case 83: //Down
                        buffer[buffer.length] = [tt,'K'+toUint7(83)];
                        lastBufferUpdate = tt;
                        if (keyvb.indexOf(83) > -1) { keyvb.splice(keyvb.indexOf(83),1); keyvy-=1; } break;
                }
                
                if (!keyvb.length || (!keyvx && !keyvy)) {
                    p[3] = 0;
                    
                    if (cVars['connected']) {
                        clearTimeout(yankTimer);
                        yankTimer = setTimeout(yank,players[p['id']]['lerp']*2); // Wait twice the lag period to make sure to yank to correct place
                    }
                } else {
                    p[2] = Math.round(Math.atan2(keyvy,keyvx)*1000)/1000;
                }
                
                p['lastMove'] = [p[0],p[1],p[2],p[3],tt];
            }
        }
        function mouseMove(e) {
            if (typeof event != "undefined") { e = event; }
            
            mouse = getExactPosition(e);
            mouse[0] -= mVars['position'][0];
            mouse[1] -= mVars['position'][1];
        }
        
        $('rigorMortisModule').onmousedown = function() {
            var tt = new Date().getTime()-startTime; if (typeof lastBufferUpdate == 'undefined') { lastBufferUpdate = tt; }
            
            bullets[bullets.length] = [p[0],p[1],p['aim']/(128/(Math.PI*2))-Math.PI,bullets['pistol']['speed'],p['id']];
            if (typeof currentGame != 'undefined') {
                buffer[buffer.length] = [tt,'f'];
                lastBufferUpdate = tt;
            }
            document.activeElement.blur(); // Drop all focus
            return false;
        }
        $('rigorMortisModule').oncontextmenu = function() { return false; }
        
        function windowMoved() {
            mVars['position'] = getElementPosition($('rigorMortisModuleMain'));
        }
        
        //////// LOAD FUNCTION // LOAD GAME ////////
        loadCanvas();
        loadDOM();
        
        step();
        
        fpsCounter = setInterval(function() { realFps = undefined; }, 1000);
        netSyncCounter = setInterval(netSync, 1000/netFrequency);
    }
    
    function scriptLoaded(src) {
        var includeFiles = cVars['rigorMortisModule']['$'].includeFiles;
        var tmp = includeFiles.indexOf(src);
        if (tmp != -1) {
            includeFiles.splice(tmp,1);
        }
        
        if (includeFiles.length == 0) {
            initAll();
        } else {
            console.log(includeFiles.length);
        }
    }
    function loadDOM() { // Connect to game Button
        var btnConnect = document.createElement('input');
        btnConnect.value = "Connect to GAME0";
        btnConnect.type = "button";
        var t = btnConnect.style;
        t.width='128px';t.height='24px';
        btnConnect.style.position = "absolute"; btnConnect.style.left = (mVars['size'][0]-256)+"px"; btnConnect.style.top = "24px";
        
        btnConnect.onclick = function() {
            if (cVars['connected']) {
                if (typeof currentGame == 'undefined') {
                    this.value = 'REQUESTING GAME 0...';
                    
                    //gameStart = new Date().getTime()-startTime;
                    
                    send('~R'+String.fromCharCode(0)+toUint28(gameStart)+toUint14(replayDelay)); // Request entry to game 0 and send sync
                } else {
                    this.value = 'ALREADY IN-GAME';
                }
            } else {
                this.value = 'NOT CONNECTED';
            }
        }
        
        $('rigorMortisModule').appendChild(btnConnect);
    }
    
    function loadCanvas() {
        mVars['position'] = getElementPosition($('rigorMortisModuleMain'));
        //assaultModuleSize = [$('assaultModule').style.width.substr(0,$('assaultModule').style.width.length-2),$('assaultModule').style.height.substr(0,$('assaultModule').style.height.length-2)];
        
        if (!$('rigorMortisModuleMain').getContext) { $('rigorMortisModuleMain').innerHTML = "Your browser does not support the canvas context.<br>Please upgrade to a newer browser such as Google Chrome or Firefox.<br><br>Sorry for the inconvenience."; return; }
        cg = document.getElementById('rigorMortisModuleMain').getContext('2d');
        
        //cg = document.getElementById('rigorMortisModuleMain').getContext('experimental-webgl');
        
        
        clearCanvas();
        //drawGrid();
        
        cg.font = "12px Verdana";
        cg.translate(0.5,0.5);
    }
    function clearCanvas(height) {
        if (typeof height == "undefined") { height = mVars['size'][1]; }
        if (height < 0) {
            cg.clearRect(0,mVars['size'][1]+height,mVars['size'][0],-height)
        } else {
            cg.clearRect(0,0,mVars['size'][0],height);
        }
    }
    
    function step() {
        //////// GAME TIMING & DEBUG ////////
        var delta = time;
        time = new Date().getTime()-startTime;
        delta = (time-delta) * 0.001;
        fps++;
        if (typeof realFps == 'undefined') { realFps = fps; fps = 0; }
        
        /////////// NETWORK PROCESSING ////////////
        //
        // Packets must be received in order, if anything old is received it will be considered the newest packet
        
        if (cVars['connected'] && typeof currentGame != 'undefined') {
            for (var i=0;i<players.length;i++) {
                var noMore = []; // When we only need 1 of something then break, use this
                
                if (typeof players[i] != 'undefined' && typeof pbuffer[i] != 'undefined') {
                    tmp = [];
                    
                    // We should see other users updates at +ourDelay-theirDelay
                    for (var j=pbuffer[i].length-1;j>=0;j--) { // For the future. Delete all buffers lower than current time once current delta is hit
                        //var dOff = 0; // Delta offset
                        if (typeof currentFrame[i] == 'undefined') { currentFrame[i] = []; }
                        if (typeof pbuffer[i][j] == 'undefined') continue;// Added 11/5/2012
                        
                        //if (j == 0 || pbuffer[i][j+0][1] <= time-replayDelay) { // If we're at the beginning, or this one is the current time use this one
                        if (j == 0 || pbuffer[i][j+0][1] <= time-players[i]['lerp']) { // Changed 11/5/2012 :: Use this users delay rather than our own
                            // Note 8/9/2013 :: Players replayDelay/"lerp" needs to be constantly changing to be >= their ping so other users will show them far enough in the past to not appear jumpy.
                            if (pbuffer[i][j][0] == 'p') { // Only need most recent movement update
                                if (noMore.indexOf('p') == -1) {
                                    /* players[i] = [ // Change this gameStart to that specific client's game start once algorithm is worked
                                                  ,
                                                  ,
                                            pbuffer[i][j][4],pbuffer[i][j][5]]; */
                                    players[i][0] = Math.round((pbuffer[i][j][2] + Math.cos(pbuffer[i][j][4]) * pbuffer[i][j][5] * ((time-players[i]['lerp']-pbuffer[i][j][1])*0.001))*1000)/1000;
                                    players[i][1] = Math.round((pbuffer[i][j][3] + Math.sin(pbuffer[i][j][4]) * pbuffer[i][j][5] * ((time-players[i]['lerp']-pbuffer[i][j][1])*0.001))*1000)/1000;
                                    players[i][2] = pbuffer[i][j][4]; players[i][3] = pbuffer[i][j][5];
                                    
                                    if (i == p['id']) {
                                        if (pbuffer[i][j][5] == 0) { // Buffer speed 0, our speed 0, and no remaining buffer movements
                                            p['yankTo'] = [players[i][0],players[i][1]];
                                            // Every time buffer for our player shows a stop, movement sync with server
                                        }
                                    }
                                    
                                    currentFrame[i][0] = j; // Frame, for debug purposes only
                                    currentFrame[i][1] = pbuffer[i][j][1];
                                    if (typeof pbuffer[i][j-1] != 'undefined') currentFrame[i][1] += ',d('+(pbuffer[i][j][1]-pbuffer[i][j-1][1])+')'; // Frametime
                                    
                                    noMore[noMore.length] = 'p';
                                }
                            } else if (pbuffer[i][j][0] == 'F') { // Only need most recent facing update
                                if (noMore.indexOf('F') == -1) {
                                    players[i]['aim'] = pbuffer[i][j][2];
                                    //p['aim']/(128/(Math.PI*2))-Math.PI
                                    
                                    noMore[noMore.length] = 'F';
                                }
                            } else if (pbuffer[i][j][0] == 'f') { // Player has fired
                                if (noMore.indexOf('f') == -1) {
                                    if (p['id'] != i) { // Only create bullets for other players
                                        bullets[bullets.length] = [players[i][0],players[i][1],players[i]['aim']/(128/(Math.PI*2))-Math.PI,bullets['pistol']['speed'],i];
                                    }
                                    
                                    pbuffer[i][j][0] = String.fromCharCode('f'.charCodeAt(0)+128); // After fire is processed, remove so it is not continually processed
                                    
                                    noMore[noMore.length] = 'f';
                                }
                            } else if (pbuffer[i][j][0] == 'Iz') {
                                //enemies[pbuffer[i][j][6]] = [pbuffer[i][j][2],pbuffer[i][j][3],0,0,enemies['types'][pbuffer[i][j][4]]];
                                //enemies[pbuffer[i][j][6]]['type'] = enemies[pbuffer[i][j][6]][4];
                                //enemies[pbuffer[i][j][6]]['hp'] = enemies[pbuffer[i][j][6]]['maxhp'] = pbuffer[i][j][5];
                                //enemies[pbuffer[i][j][6]]['attack'] = [undefined,0]; // Attack animation timer, reset timer
                                
                                enemies[pbuffer[i][j][6]] = {0:pbuffer[i][j][2],1:pbuffer[i][j][3],2:0,3:0, // X, Y, Dir, Speed
                                                                'type':enemies['types'][pbuffer[i][j][4]],
                                                                'hp':pbuffer[i][j][5],'maxhp':pbuffer[i][j][5],
                                                                'attack':[undefined,0]};
                                
                                pbuffer[i][j][0] = String.fromCharCode('I'.charCodeAt(0)+128)+'z';
                            } else if (pbuffer[i][j][0] == 'Io') {
                                objects[pbuffer[i][j][5]] = {0:pbuffer[i][j][2],1:pbuffer[i][j][3],'type':objects['types'][pbuffer[i][j][4]]}; // X, Y, Type
                                
                                pbuffer[i][j][0] = String.fromCharCode('I'.charCodeAt(0)+128)+'o'; // Process only once
                            } else if (pbuffer[i][j][0] == 'Zp') { // A zombie movement
                                if (noMore.indexOf('Zp'+pbuffer[i][j][2]) == -1) {
                                    if (typeof enemies[pbuffer[i][j][2]] != 'undefined') {
                                    
                                        enemies[pbuffer[i][j][2]][0] = Math.round((pbuffer[i][j][3] + Math.cos(pbuffer[i][j][5]) * pbuffer[i][j][6] * ((time-players[i]['lerp']-pbuffer[i][j][1])*0.001))*1000)/1000;
                                        enemies[pbuffer[i][j][2]][1] = Math.round((pbuffer[i][j][4] + Math.sin(pbuffer[i][j][5]) * pbuffer[i][j][6] * ((time-players[i]['lerp']-pbuffer[i][j][1])*0.001))*1000)/1000;
                                        enemies[pbuffer[i][j][2]][2] = pbuffer[i][j][5]; enemies[pbuffer[i][j][2]][3] = pbuffer[i][j][6];
                                        
                                        noMore[noMore.length] = 'Zp'+pbuffer[i][j][2];
                                    }
                                }
                            } else if (pbuffer[i][j][0] == 'Zc') {
                                if (noMore.indexOf('Zc'+pbuffer[i][j][2]) == -1) {
                                    if (typeof enemies[pbuffer[i][j][2]] != 'undefined') {
                                        enemies[pbuffer[i][j][2]]['chasing'] = i;
                                        
                                        pbuffer[i][j][0] = String.fromCharCode('Z'.charCodeAt(0)+128)+'c'; // Do NOT let this get processed again
                                        noMore[noMore.length] = 'Zc'+pbuffer[i][j][2];
                                    }
                                }
                            } else if (pbuffer[i][j][0] == 'Zh') {
                                if (noMore.indexOf('Zh'+pbuffer[i][j][2]) == -1) {
                                    if (typeof enemies[pbuffer[i][j][2]] != 'undefined') {
                                        enemies[pbuffer[i][j][2]]['hp'] = pbuffer[i][j][3];
                                        if (enemies[pbuffer[i][j][2]]['hp'] <= 0) { // If the enemy is dead, get rid of it
                                            //enemies.splice(pbuffer[i][j][2],1);
                                            delete enemies[pbuffer[i][j][2]];
                                        }
                                        
                                        pbuffer[i][j][0] = String.fromCharCode('Z'.charCodeAt(0)+128)+'h'; // Do NOT let this get processed again
                                        noMore[noMore.length] = 'Zh'+pbuffer[i][j][2];
                                    }
                                }
                            }
                        } else {
                            //$('chatArea').innerHTML += '<br>PBUF('+pbuffer[i][j+1][1]+') <= '+time+'-1000';
                        }
                        currentFrame[i][2] = time-players[i]['lerp']; // Frame ticker
                    }
                    
                }
            }
            
            for (var i=0;i<players.length;i++) {
                if (typeof players[i] != 'undefined' && typeof pbuffer[i] != 'undefined') {
                    if (pbuffer[i].length > bufferSize) { pbuffer[i] = pbuffer[i].slice(pbuffer[i].length-bufferSize); } // Filter excessive buffer storage
                }
            }
            
            if (time - lastBufferUpdate >= 11384) { // Keep connection alive before delta is out of range. This allows between 5-16 seconds of downtime
                if (time - lastBufferUpdate >= 16384) { // More than transmissable delta (UI14), disconnect
                    Server.disconnect();
                } else {
                    buffer[buffer.length] = [time,'-']; lastBufferUpdate = time; // Ping server to keep alive
                }
            }
        }
        
        //////// PRE-PHYSICS GAME LOGIC ////////
        
        //////// OUR PREDICTED PHYSICS ////////
        debugStepDirection += 180*delta;
        
        /* // Estimated Movement
        var tmp = p[2];//Math.round(Math.atan2(keyvy,keyvx)*1000)/1000;
        p[0] += Math.round(Math.cos(tmp)*p[3]*delta*1000)/1000;
        p[1] += Math.round(Math.sin(tmp)*p[3]*delta*1000)/1000;
        p[0] = Math.round(p[0]*1000)/1000;
        p[1] = Math.round(p[1]*1000)/1000;
        */
        
        // Precise Movement
        calculateNewPosition(time,true);
        //p['lastMove'] = [p[0],p[1],p[2],p[3],time];
        
        if (typeof mouse != 'undefined') {
            var tmp = p['aim'];
            p['aim'] = Math.round((Math.atan2(mouse[1]-p[1],mouse[0]-p[0])+Math.PI)*(128/(Math.PI*2)))%128;
            if (tmp != p['aim']) {
                buffer[buffer.length] = [time,'F'+toUint7(p['aim'])];
                lastBufferUpdate = time;
            }
        }
        
        // Bullet movement
        for (var i=0;i<bullets.length;i++) {
            bullets[i]['last'] = [bullets[i][0],bullets[i][1]];
            bullets[i][0] += Math.cos(bullets[i][2])*bullets[i][3]*delta;
            bullets[i][1] += Math.sin(bullets[i][2])*bullets[i][3]*delta;
            if (bullets[i][0] < 0 || bullets[i][1] < 0 || bullets[i][0] > mVars['size'][0] || bullets[i][1] > mVars['size'][1]) {
                bullets.splice(i,1); // Remove bullet if out of bounds
            }
        }
        
        
        //////// GAME LOGIC ////////
        
        /****** PLAYER ATTRIB REGEN *****/
        if (p['hp'] + p['hpregen']*delta <= p['maxhp']) {
            p['hp'] += p['hpregen']*delta;
        } else { p['hp'] = p['maxhp']; }
        
        /****** EMITTER SPAWNING *****/ /*
        for (var i=0;i<emitters.length;i++) {
            if (time >= emitters[i]['next']) {
                if (enemies.length < 10) { // Create enemy with x, y, direction, speed, type
                    enemies[enemies.length] = [randomInt(emitters[i][0],emitters[i][2]),randomInt(emitters[i][1],emitters[i][3]),
                                           0,randomInt(enemies[emitters[i]['type']]['speed']),emitters[i]['type']];
                    enemies[enemies.length-1]['type'] = emitters[i]['type'];
                    enemies[enemies.length-1]['hp'] = enemies[enemies.length-1]['maxhp'] =
                                        randomInt(enemies[emitters[i]['type']]['hp']);
                    enemies[enemies.length-1]['attack'] = [undefined,0]; // Attack animation timer, reset timer
                    
                    emitters[i]['next'] = time + randomInt(emitters[i]['frequency']);
                }
            }
        } */
        
        /******* BULLET COLLISION ******/
        // Collide with not only the bullet, but anywhere along the bullets path since the last delta
        // Simply destroy the bullet if there's any collision since we're using server authority
        for (var i=0;i<bullets.length;i++) {
            if (typeof bullets[i] == 'undefined') continue;
            
            //var hits = [];
            
            for (var j in enemies) {
                if (isNaN(j)) continue;
                
                // This method of bullet collision calculates by backtracking bullets direction by amount delta. However, will start behind player
                //var collide = colLineRect([bullets[i][0],bullets[i][1],bullets[i][0]*Math.cos(bullets[i][2]+Math.PI)*bullets[i][3]*delta,bullets[i][1]*Math.sin(bullets[i][2]+Math.PI)*bullets[i][3]*delta],
                //            [enemies[j][0]-enemies[enemies[j]['type']][0]/2,enemies[j][1]-enemies[enemies[j]['type']][1]/2,enemies[enemies[j]['type']][0],enemies[enemies[j]['type']][1]]);
                if (typeof bullets[i]['last'] == 'undefined') { var collide = posInBounds(bullets[i],[enemies[j][0]-enemies[enemies[j]['type']][0]/2,enemies[j][1]-enemies[enemies[j]['type']][1]/2,enemies[enemies[j]['type']][0],enemies[enemies[j]['type']][1]]); } // Simple collision detect if bullet has no last position
                else {
                    var collide = colLineRect([bullets[i][0],bullets[i][1],bullets[i]['last'][0],bullets[i]['last'][1]],
                                            [enemies[j][0]-enemies[enemies[j]['type']][0]/2,enemies[j][1]-enemies[enemies[j]['type']][1]/2,enemies[enemies[j]['type']][0],enemies[enemies[j]['type']][1]]);
                }
                
                if (collide) { // New collision detection
                //if (posInBounds(bullets[i],[enemies[j][0]-enemies[enemies[j]['type']][0]/2,enemies[j][1]-enemies[enemies[j]['type']][1]/2,enemies[enemies[j]['type']][0],enemies[enemies[j]['type']][1]])) {
                    bullets.splice(i,1);
                    //hits[hits.length] = j; //break;
                    break;
                    
                }
            }
            
            /* if (hits.length > 0) {
                if (hits.length > 1) {
                    var tmp = [0,distanceBetween(p[0],p[1],enemies[hits[0]][0],enemies[hits[0]][1])]; // Enemy ID, distance
                    for (var j=1;j<hits.length;j++) {
                        var t2 = distanceBetween(p[0],p[1],enemies[hits[j]][0],enemies[hits[j]][1]); // Find closest enemy
                        if (t2 < tmp[1]) tmp = [j,t2];
                    }
                    hits[0] = tmp[0]; // This will contain the closest enemy along the line to our player
                }
                
                enemies[hits[0]]['hp'] -= randomInt(bullets[p['weapon']]['damage']);
                if (enemies[hits[0]]['hp'] <= 0) {
                    enemies.splice(hits[0],1);
                }
                bullets.splice(i,1);
            } */
        }
        
        
        for (var i in enemies) { // Enemy operations
            if (isNaN(i)) continue;
                ////////// ATTACKING //////////
                /*
            if (typeof enemies[i]['attack'][0] !== 'undefined') {
                enemies[i]['attack'][0] += delta*1000;
                if (enemies[i]['attack'][0] > enemies[enemies[i]['type']]['attack'][4] && enemies[i]['attack'][1] == 0 && distanceBetween(enemies[i][0],enemies[i][1],p[0],p[1]) < enemies[enemies[i]['type']]['attack'][1]) {
                    //Strike player, once, if haven't attacked recently AND they are still in range
                    p['hp'] -= enemies[enemies[i]['type']]['attack'][0];
                    p['struck'] = true;
                    enemies[i]['attack'][1] = enemies[enemies[i]['type']]['attack'][2]; // Start frequency countdown to next avail attack
                }
                if (enemies[i]['attack'][0] > enemies[enemies[i]['type']]['attack'][3]) {
                    enemies[i]['attack'][0] = undefined; //Finished attacking animation
                }
            } else {
                if (distanceBetween(enemies[i][0],enemies[i][1],p[0],p[1]) < enemies[enemies[i]['type']]['attack'][1]
                                        && enemies[i]['attack'][1] == 0) {
                    enemies[i]['attack'][0] = 0;
                }
            }
            
            if (enemies[i]['attack'][1] - delta*1000 > 0) { enemies[i]['attack'][1] -= delta*1000; } else { enemies[i]['attack'][1] = 0; }
            */
            
            ////////////// PATHFINDING ///////////////
            if (typeof enemies[i]['chasing'] != 'undefined' && typeof players[enemies[i]['chasing']] != 'undefined') {
                //enemies[i][0] = (enemies[i][0]+players[enemies[i]['chasing']][0])/2;
                //enemies[i][1] = (enemies[i][1]+players[enemies[i]['chasing']][1])/2;
                
                if (distanceBetween(players[enemies[i]['chasing']][0],players[enemies[i]['chasing']][1],enemies[i][0],enemies[i][1]) > enemies[enemies[i]['type']]['stopDistance']) {
                    enemies[i][3] = enemies[enemies[i]['type']]['speed'];
                    enemies[i][2] = Math.atan2(players[enemies[i]['chasing']][1]-enemies[i][1],players[enemies[i]['chasing']][0]-enemies[i][0]);
                    
                    enemies[i][0] = Math.round((enemies[i][0]+Math.cos(enemies[i][2])*enemies[i][3]*delta)*1000)/1000;
                    enemies[i][1] = Math.round((enemies[i][1]+Math.sin(enemies[i][2])*enemies[i][3]*delta)*1000)/1000;
                } else {
                    enemies[i][3] = 0;
                }
            }
            
            
            
        }
        
        /****** PLAYER DEATH ******/
        if (p['hp'] <= 0) {
            p['hp'] = 0;
        }
        
        //////// DRAW ////////
        clearCanvas();
        drawFps();
        
        //drawEmitters();
        drawMap(); // Draw the collision & visual map of the current game
        
        drawObjects();
        drawEnemies();
        drawPlayer();
        if (typeof currentGame != 'undefined') {
            drawPlayers();
        }
        
        drawBullets();
        
        if (typeof mouse != 'undefined') {
        drawLaser();
        drawReticle();
        }
        
        drawHUD();
        
        requestAnimFrame(step);
    }
    
    /////////// NETWORKING / SERVER FUNCTIONS //////////////
    
    function netSync() {
        if (cVars['connected']) {
            if (typeof currentGame != 'undefined') {
                /************ SEND UPDATE PLAYER STACK ************/
                if (buffer.length > 0) {
                    var pack = '~', d=buffer[0][0]-lastNetUpdate;
                    for (var i=0;i<buffer.length;i++) {
                        if (i>0) { d=buffer[1][0]-buffer[0][0]; }
                        pack += buffer[i][1] + toUint28(buffer[i][0]); // Send that data & UINT 28 time value
                    }
                    //$('chatArea').innerHTML += "\n"+pack;
                    send(pack);
                    lastNetUpdate = buffer[buffer.length-1][0];
                    buffer = [];
                }
            }
            
            /********* INITIATE SERVER **********/
            if (typeof Server != 'undefined' && typeof serverInitiated == 'undefined') {
                
                Server.bind('message', function( rcvd ) { // Received something from the server
                    send(''); // Send back blank data so server can push anything new asap. Fixes Nagling problem, uses more bandwidth
                    if (typeof rcvd == 'object') { // Convert back to string for browsers able to receive blobs (Chrome/Firefox)
                        var dataReader = new FileReader();
                        dataReader.onload = function(e) {
                            var tmp='';
                            var t2 = new Uint8Array(e.target.result);
                            for (var i=0;i<rcvd.size;i++) {
                                tmp+=String.fromCharCode(t2[i]);
                            }
                        
                            if (cVars['simulatedLag'] > 0) {
                                setTimeout(function() {processMessage(tmp);},cVars['simulatedLag']);
                            } else {
                                processMessage(tmp);
                            }
                        }
                        dataReader.readAsArrayBuffer(rcvd);
                    } else { processMessage(rcvd); }
                });
                Server.bind('close', function( data ) { // On disconnect, clear stored server vars
                    players = [];
                    buffer = [];
                    pbuffer[p['id']] = [];
                    lastNetUpdate = 0; currentGame = serverInitiated = gameStart = lastBufferUpdate = undefined;
                });
                
                serverInitiated = true;
            }
        }
    }
    
    function processMessage(rmsg) { // Processing for received messages
        var at = new Date().getTime()-startTime;
        
        switch (rmsg.substr(0,1)) {
            case '~':
                var tmpBuffer = new ArrayBuffer(rmsg.length);
                var bytes = new Uint8Array(tmpBuffer);
                for (var i=0;i<rmsg.length;i++) {
                    bytes[i] = rmsg.charCodeAt(i);
                }
        
                for (i=1;i<rmsg.length;) {
                    i++;
                    switch (rmsg.substr(i-1,1)) {
                        case 'I':
                            i++;
                            switch (rmsg.substr(i-1,1)) {
                                case 'd': // Server should ONLY set ID on game connect
                                    p['id'] = readUint16(bytes,i);
                                    gameStart = readUint32(bytes,i+2); i+=6; // Server tick when we entered the game
                                    
                                    startTime = new Date().getTime()-gameStart;
                                    //alert('Servertime: '+(-gameStart));
                                    
                                    buffer = []; // Initiate our send buffer
                                    lastBufferUpdate = startTime;
                                    currentGame = 0;
                                    
                                    //loadMap(currentGame);
                                    
                                    players[p['id']] = p.slice(); // This is where the ghost player is left behind at our last location
                                    
                                    pbuffer[p['id']] = [];
                                    
                                    //// XXXXXXXX GAMESTART IS ALREADY SET ON REQUEST XXXXXXXXXX
                                    //gameStart = new Date().getTime()-startTime; // Will need to transmit each players gameStart time in future
                                    
                                    //pbuffer[p['id']][0] = ['p',gameStart,p[0],p[1],0,8]; // Start our buffer when get an ID
                                    
                                    //alert('Our ID: '+readUint16(bytes,i));
                                    break;
                                case 'p':
                                    var tt = new Date().getTime()-gameStart;
                                    p[0] = readUint32(bytes,i)/1000; p[1] = readUint32(bytes,i+4)/1000; i+=8; // Set initial player position
                                    players[p['id']] = p.slice(); // Update our ghost player to new position
                                    players[p['id']]['lerp'] = replayDelay; // Set lerp of this player.
                                    
                                    p['lastMove'] = [p[0],p[1],p[2],p[3],tt];
                                    //alert('Player data:'+readUint16(bytes,i)+readUint16(bytes,i+2));
                                    break;
                                case 'z': // These zombies need to be added to the buffer and initiated at the correct time instead of instantly
                                    tmp = [readUint16(bytes,i),readUint32(bytes,i+2),readUint16(bytes,i+6),readUint16(bytes,i+8),readUint8(bytes,i+10),readUint16(bytes,i+11)]; i+=13;
                                    
                                    pbuffer[p['id']][pbuffer[p['id']].length] = ['Iz',tmp[1],tmp[2],tmp[3],tmp[4],tmp[5],tmp[0]]; // Get ready to create this zombie
                                    //alert('Zombie');
                                    break;
                                case 'o':
                                    tmp = [readUint16(bytes,i),readUint32(bytes,i+2),readUint16(bytes,i+6),readUint16(bytes,i+8),readUint16(bytes,i+10)]; i+=12;
                                    
                                    pbuffer[p['id']][pbuffer[p['id']].length] = ['Io',tmp[1],tmp[2],tmp[3],tmp[4],tmp[0]]; // Get ready to create this object
                                    break;
                                default: //Received unknown data
                                    break;
                            }
                            break;
                        case 'W':
                            i++;
                            switch (rmsg.substr(i-1,1)) {
                                case 'p': // Receive a players position update
                                    tmp = [readUint16(bytes,i),readUint32(bytes,i+2)/1000,readUint32(bytes,i+6)/1000,readUint16(bytes,i+10)]; i+=12;
                                    if (typeof p['id'] == 'undefined' || p['id'] != tmp[0]) {  // Only add new player if not self
                                        if (typeof players[tmp[0]] == 'undefined') { //players[tmp[0]] = [];
                                            players[tmp[0]] = [tmp[1],tmp[2],0,0];
                                        }
                                        pbuffer[tmp[0]] = [];
                                        pbuffer[tmp[0]][0] = ['p',gameStart,tmp[1],tmp[2],0,0]; // Start this players buffer since this is really our only initiative
                                        
                                        players[tmp[0]]['lerp'] = tmp[3];
                                        //////////// THIS 0 DELTA NEEDS TO BE CHANGED TO CURRENT TIME ( ? )
                                    }
                                    break;
                                case 'l': // Receive a players LERP update
                                    tmp = [readUint16(bytes,i),readUint16(bytes,i+2)]; i+=4;
                                    //console.log('Received lerp');
                                    if (typeof players[tmp[0]] != 'undefined') players[tmp[0]]['lerp'] = tmp[1];
                                    //If their LERP delay is faster than ours, set theirs to our slow one instead. (Client side only of course)
                                    if (tmp[1] < players[p['id']]['lerp']) players[tmp[0]]['lerp'] = players[p['id']]['lerp'];
                                    break;
                                case '=': // ClientID / syncDelay (how far behind server this player is) REMOVED
                                    tmp = [readUint16(bytes,i),readUint32(bytes,i+2)]; i+=6;
                                    //players[tmp[0]]['syncDelay'] = tmp[1];
                                    break;
                                default: //Received unknown data
                                    break;
                            }
                            break;
                        case 'B': // Other players buffer updates
                            i++;
                            switch (rmsg.substr(i-1,1)) {
                                case '=': // Keep-alive ping [CLIENTID / TIME]
                                    var ptt = [readUint16(bytes,i),readUint32(bytes,i+2)]; i+=6;
                                    // Sent as delta //pbuffer[ptt[0]][pbuffer[ptt[0]].length] = ['=',ptt[1]+pbuffer[ptt[0]][pbuffer[ptt[0]].length-1][1]];
                                    pbuffer[ptt[0]][pbuffer[ptt[0]].length] = ['=',ptt[1]];
                                    break;
                                case 'p': // Move [0-CLIENTID / 1-TIME / 2-XXXX / 3-YYYY / 4-DDDD / 5-SS]
                                    var ptt = [readUint16(bytes,i),readUint32(bytes,i+2),readUint32(bytes,i+6),readUint32(bytes,i+10),readUint32(bytes,i+14),readUint16(bytes,i+18)]; i+=20;
                                    // Sent as delta //pbuffer[ptt[0]][pbuffer[ptt[0]].length] = ['p',ptt[1]+pbuffer[ptt[0]][pbuffer[ptt[0]].length-1][1],ptt[2]/1000,ptt[3]/1000,ptt[4]/1000-Math.PI,ptt[5]];
                                    pbuffer[ptt[0]][pbuffer[ptt[0]].length] = ['p',ptt[1],ptt[2]/1000,ptt[3]/1000,ptt[4]/1000-Math.PI,ptt[5]];

                                    break;
                                case 'f': // Fire [CLIENTID / TIME]
                                    var ptt = [readUint16(bytes,i),readUint32(bytes,i+2)]; i+=6;
                                    // Sent as delta // pbuffer[ptt[0]][pbuffer[ptt[0]].length] = ['f',ptt[1]+pbuffer[ptt[0]][pbuffer[ptt[0]].length-1][1]];
                                    pbuffer[ptt[0]][pbuffer[ptt[0]].length] = ['f',ptt[1]];
                                    
                                    cVars['ping'] = at-ptt[1];
                                    break;
                                case 'F': // Facing [CLIENTID / TIME / DIRECTION]
                                    var ptt = [readUint16(bytes,i),readUint32(bytes,i+2),readUint8(bytes,i+6)]; i+=7;
                                    
                                    pbuffer[ptt[0]][pbuffer[ptt[0]].length] = ['F',ptt[1],ptt[2]];
                                    
                                    cVars['ping'] = at-ptt[1];
                                    break;
                                case 'Z': // Zombie data
                                    i++;
                                    switch(rmsg.substr(i-1,1)) {
                                        case 'p': // Zombie position [ZOMBIE ID / DELTA / X / Y / DIR / SPEED] // Removed
                                            var ptt = [readUint16(bytes,i),readUint32(bytes,i+2),readUint32(bytes,i+6),readUint32(bytes,i+10),readUint32(bytes,i+14),readUint16(bytes,i+18)]; i+=20;
                                            
                                            // For now we're just storing zombie movement data in our own pbuffer
                                            
                                            // In buffer [Zp,TIME,ID,X,Y,DIR,SPEED]
                                            pbuffer[p['id']][pbuffer[p['id']].length] = ['Zp',ptt[1],ptt[0],ptt[2]/1000,ptt[3]/1000,ptt[4]/1000-Math.PI,ptt[5]];
                                            break;
                                        case 'c': // Zombie set chasing
                                            var ptt = [readUint16(bytes,i),readUint32(bytes,i+2),readUint16(bytes,i+6)]; i+=8;
                                            
                                            pbuffer[ptt[0]][pbuffer[p['id']].length] = ['Zc',ptt[1],ptt[2]];
                                            break;
                                        case 'h': // Zombie set health
                                            var ptt = [readUint16(bytes,i),readUint32(bytes,i+2),readUint16(bytes,i+6)]; i+=8;
                                            
                                            pbuffer[p['id']][pbuffer[p['id']].length] = ['Zh',ptt[1],ptt[0],ptt[2]]; // Buffer [Zh,time,zombieID,health]
                                            break;
                                        default:
                                            break;
                                    }
                                    break;
                                default: // Received unknown buffer data
                                    break;
                            }
                            /***************** OLD PBUFFER UPDATE *************
                            switch (rmsg.substr(i-1,1)) {
                                case '=': // Keep-alive ping [CLIENTID / DELTA]
                                    var ptt = [readUint16(bytes,i),readUint16(bytes,i+2)]; i+=4;
                                    pbuffer[ptt[0]][pbuffer[ptt[0]].length] = ['=',ptt[1]+pbuffer[ptt[0]][pbuffer[ptt[0]].length-1][1]];
                                    break;
                                case 'p': // Move [0-CLIENTID / 1-DELTA / 2-XXXX / 3-YYYY / 4-DDDD / 5-SS]
                                    var ptt = [readUint16(bytes,i),readUint16(bytes,i+2),readUint32(bytes,i+4),readUint32(bytes,i+8),readUint32(bytes,i+12),readUint16(bytes,i+16)];
                                    pbuffer[ptt[0]][pbuffer[ptt[0]].length] = ['p',ptt[1]+pbuffer[ptt[0]][pbuffer[ptt[0]].length-1][1],ptt[2]/1000,ptt[3]/1000,ptt[4]/1000-Math.PI,ptt[5]];
                                    // Instead of delta, store tick checkpoints
                                    break;
                                case 'f': // Fire [CLIENTID / DELTA]
                                    var ptt = [readUint16(bytes,i),readUint16(bytes,i+2)]; i+=4;
                                    pbuffer[ptt[0]][pbuffer[ptt[0]].length] = ['f',ptt[1]+pbuffer[ptt[0]][pbuffer[ptt[0]].length-1][1]];
                                    // Instead of delta, store tick checkpoints
                                    break;
                                default: // Received unknown buffer data
                                    break;
                            }
                            */
                            break;
                        case 'D': // Client has disconnected
                            tmp = readUint16(bytes,i); i+=3;
                            delete players[tmp];// Deleting values inside the area will not change the indexes
                            delete pbuffer[tmp];
                            
                            break;
                        case '=': // Received ping, immediately send back pong.
                            //console.log('Received ping');
                            send('~=');
                            break;
                        default: // Received unknown data
                            break;
                    }
                    
                    
                }
                break;
            
            
            default:
                // Received unknown data
                break;
        }
    }
    
    /////////// END NETWORKING / SERVER FUNCTIONS ////////////////
    
    function calculateNewPosition(ct, updateImmediately) { // INT Current Time, BOOLEAN Update Immediately
        //Everyone needs to have a circular collision model or this is going to get crazy
        var del = (ct - p['lastMove'][4]) * 0.001;
        p[0] = Math.round((p['lastMove'][0] + Math.cos(p['lastMove'][2]) * p['lastMove'][3] * del) * 1000)/1000;
        p[1] = Math.round((p['lastMove'][1] + Math.sin(p['lastMove'][2]) * p['lastMove'][3] * del) * 1000)/1000;
        
        var cu = 0; // currentGame FIXED to ZERO
        //start:
        for (var i=0;i<map[cu].length;i++) { // Cycle polygons
            var poly = map[cu][i];
            var newpos = false;
            var collisions = [];
            if (poly.length == 4) { poly = [poly[0],poly[1],poly[0]+poly[2],poly[1],poly[0]+poly[2],poly[1]+poly[3],poly[0],poly[1]+poly[3]]; }
            for (var j=0;j<poly.length-2;j+=2) { // Cycle polygon segments
                //if (colLineLine([p['lastMove'][0],p['lastMove'][1],p[0],p[1]],[poly[j],poly[j+1],poly[j+2],poly[j+3]])) {
                newpos = colLineCircle([poly[j],poly[j+1],poly[j+2],poly[j+3]],[p[0],p[1],p['size'][0]/2],true);
                if (!!newpos) { // Uses only player WIDTH to calculate radius of collision circle
                    collisions[collisions.length] = newpos;
                    //p[0] = p['lastMove'][0]; p[1] = p['lastMove'][1]; // Freeze
                    
                    //p[0] = newpos[0]; p[1] = newpos[1]; // Slide
                    //break start;
                }
            }
            
            //if (colLineLine([p['lastMove'][0],p['lastMove'][1],p[0],p[1]],[poly[poly.length-2],poly[poly.length-1],poly[0],poly[1]])) {
            newpos = colLineCircle([poly[poly.length-2],poly[poly.length-1],poly[0],poly[1]],[p[0],p[1],p['size'][0]/2],true);
            if (!!newpos) {
                collisions[collisions.length] = newpos;
                //p[0] = p['lastMove'][0]; p[1] = p['lastMove'][1]; // Freeze
                
                //p[0] = newpos[0]; p[1] = newpos[1]; // Slide
                //break start;
            }
            
            if (collisions.length > 0) { // Calculates using all total collisions, an average of, to stop from entering corners
                var avg = [0,0];
                for (var j=0;j<collisions.length;j++) {
                    //p[0] = collisions[j][0]; p[1] = collisions[j][1];
                    avg[0] += collisions[j][0]; avg[1] += collisions[j][1];
                }
                avg[0] /= collisions.length; avg[1] /= collisions.length;
                
                //console.log("Collided "+collisions.length+" times! Shift ("+p[0]+","+p[1]+") to ("+String(Math.round(avg[0]*1000)/1000)+","+String(Math.round(avg[1]*1000)/1000)+")");
                p[0] = Math.round(avg[0]*1000)/1000; p[1] = Math.round(avg[1]*1000)/1000;
            }
        }
        
        
        if (arguments.length == 2 && arguments[1]) { // if updateImmediately: Set lastMove
            p['lastMove'] = [p[0],p[1],p[2],p[3],ct];
        }
        /*
        var tmp = Math.round(Math.atan2(keyvy,keyvx)*1000)/1000;
        p[0] += Math.round(Math.cos(tmp)*p[3]*delta*1000)/1000;
        p[1] += Math.round(Math.sin(tmp)*p[3]*delta*1000)/1000;
        
        // Precise Movement
        
        p[0] = Math.round(p[0]*1000)/1000;
        p[1] = Math.round(p[1]*1000)/1000;
        */
    }
    
    function yank() {
        if (typeof p['yankTo'] == 'undefined' || p[3] != 0) return;
        
        //if (Math.abs(p[0] - p['yankTo'][0]) < 1) { p[0] = p['yankTo'][0]; }
        //else p[0] = (p[0] + p['yankTo'][0]) / 2;
        //if (Math.abs(p[1] - p['yankTo'][1]) < 1) { p[1] = p['yankTo'][1]; }
        //else p[1] = (p[1] + p['yankTo'][1]) / 2;
        p[0] = p['yankTo'][0]; p[1] = p['yankTo'][1];
        
        p['lastMove'] = [p[0],p[1],p[2],p[3],time];
        if (p[0] == p['yankTo'][0] && p[1] == p['yankTo'][1]) p['yankTo'] = undefined;
    }
    
    function colLineLine(line1,line2,verbose) { // [x1,y1,x2,y2] , [x3,y3,x4,y4] :: Will return [x,y] if collision exists or false
        if (typeof verbose == 'undefined') { verbose = false; }
        var cd, ca, cb;
        //      y4       y3            x2       x1           x4       x3        y3        y2      // Slope differential
        cd = (line2[3]-line2[1]) * (line1[2]-line1[0]) - (line2[2]-line2[0])*(line1[3]-line1[1]);
        if (cd != 0) {
            ca = ((line2[2] - line2[0]) * (line1[1] - line2[1]) - (line2[3] - line2[1]) * (line1[0] - line2[0])) / cd; // Bezier (0-1 along line2)
            cb = ((line1[2] - line1[0]) * (line1[1] - line2[1]) - (line1[3] - line1[1]) * (line1[0] - line2[0])) / cd; // Bezier (0-1 along line1)
            
            if (verbose) { // Verbose checking will check entire lines as opposed to line segments. They WILL collide somewhere since they're not parallel
                // Returns [ intersection-X, intersection-Y, bezierLINE2, bezierLINE1, actualLINE2, actualLINE1 ]
                return [ line1[2]*ca+line1[0]*(1-ca) , line1[3]*ca+line1[1]*(1-ca) , ca , cb ];
            } else {
                if (ca < 0 || ca > 1 || cb < 0 || cb > 1) { return false; }
                
                var cx, cy; // At this point we've already determined a collision, but, to return the exact point of collision, we can use either bezier...
                cx = line1[2]*ca+line1[0]*(1-ca);
                cy = line1[3]*ca+line1[1]*(1-ca);
                return [cx,cy];
            }
        } else {
            return false; // Lines are parallel. If endpoints of line 1 are inside of line 2, there is 1 or greater collisions
        }
    }
    function colLineRect(line,rect) { // [x1,y1,x2,y2] , [x3,y3,w,h]
        var ret = false;
        ret = (!!colLineLine(line,[rect[0],rect[1],rect[0]+rect[2],rect[1]])?true:ret); // Top edge
        ret = (!!colLineLine(line,[rect[0],rect[1]+rect[3],rect[0]+rect[2],rect[1]+rect[3]])?true:ret); // Bottom edge
        ret = (!!colLineLine(line,[rect[0],rect[1],rect[0],rect[1]+rect[3]])?true:ret); // Left edge
        ret = (!!colLineLine(line,[rect[0]+rect[2],rect[1],rect[0]+rect[2],rect[1]+rect[3]])?true:ret); // Right edge
        return ret; // True or false if collision
    }
    function colLineCircle(line,circle,slide) { // [x1,y1,x2,y2] , [x, y, r]
        if (typeof slide == 'undefined') { slide = false; }
        var ret = false;
        var calcline;
        
        //Find slope of original line
        var mm = [line[3]-line[1],line[2]-line[0]];
        if (mm[0] == 0) {
            calcline = [circle[0],0,circle[0],1024]; // Output will be a vertical line
        } else if (mm[1] == 0) {
            calcline = [0,circle[1],1024,circle[1]]; // Output will be a horizontal line
        } else {
            //Find negative reciprocal of slope of line (perpendicular line)
            mm = (0-mm[1] / mm[0]);
            //Plug into y = mx + b to find y-intercept | circle[1] = mm * circle[0] + b
            var b = circle[1] - (mm * circle[0]);
            //Create line
            calcline = [0,mm * 0 + b,1024,mm * 1024 + b];
        }
        var is = colLineLine(line,calcline,true); // Will return [xint, yint, bezier A(line2), bezier B(line1)] // Intersect
        
        if (is[2] < 0 || is[2] > 1 || is[3] < 0 || is[3] > 1) { // No collision
            if (is[2] < 0) { // Collision with endpoint A
                cg.strokeRect(line[0]-4,line[1]-4,8,8);
                if (distanceBetween(line[0],line[1],circle[0],circle[1]) < circle[2]) { ret = [line[0],line[1]]; }
            }
            else if (is[2] > 1) { // Collision with endpoint B
                cg.strokeRect(line[2]-4,line[3]-4,8,8);
                if (distanceBetween(line[2],line[3],circle[0],circle[1]) < circle[2]) { ret = [line[2],line[3]]; }
            }
            cg.strokeStyle = '#666'; cg.beginPath(); cg.moveTo(calcline[0],calcline[1]); cg.lineTo(calcline[2],calcline[3]); cg.stroke();
        } else { // Collision with the line
            cg.strokeStyle = '#F00'; cg.beginPath(); cg.moveTo(calcline[0],calcline[1]); cg.lineTo(calcline[2],calcline[3]); cg.stroke();
            if (distanceBetween(circle[0],circle[1],is[0],is[1]) < circle[2]) {
                ret = [is[0],is[1]];
            }
            //alert(is[2]+','+is[3]);
        }
        
        if (!!ret) {
            if (slide) { // Calculate the proposed position to remain entering collision zone if slide is opted
                // This slides using a push-away from the point
                var slid = Math.atan2(circle[1]-ret[1],circle[0]-ret[0]);
                //console.log("Size("+circle[2]+") Recommending from "+ret[0]+","+ret[1]+": Dir: "+slid);
                slid = [ret[0] + Math.cos(slid) * circle[2],ret[1] + Math.sin(slid) * circle[2]];
                return slid;
                
                /* // This slides using the normal of the line
                var sign = (line[2]-line[0])*(circle[1]-line[1]) - (line[3]-line[1])*(circle[0]-line[0]); // Find which side of the original line player is on
                sign = sign > 0 ? 1 : sign < 0 ? -1 : 0;
                if (Math.atan2(line[3]-line[1],line[2]-line[0]) > 0) { sign *= -1; } // If direction of line is upwards, reverse sign
                cg.fillText(sign,10,100);
                cg.fillText(circle[0]+','+circle[1],10,120);
                cg.fillText(calcline[0]+','+calcline[1]+','+calcline[2]+','+calcline[3],10,140);
                //alert(sign);
                var slid = is[3] + sign * circle[2]/distanceBetween(calcline[0],calcline[1],calcline[2],calcline[3]); // Slide them along the normal vector
                return [calcline[2]*slid+calcline[0]*(1-slid),calcline[3]*slid+calcline[1]*(1-slid)];
                */
            } else { // Simply return that we've collided
                return !!ret;
            }
        }
        return ret; // Return. In the case of no collision
    }
    function colPointPolygon(point,polygon) { // [x1,y1] , [x2,y2,x3,y3,x4,y4,etc.] // If only length 4, will assume [x,y,w,h] rect // Will auto connect remainding side // This collision method will not work if the polygon is attempting to draw on top of itself
        if (typeof point != 'object' || typeof polygon != 'object') { return false; } // Requires 2 arrays. Sometimes mouse is undefined.
        var ret = false, tmp = [], tmp2, flip = 1, poly = polygon;
        if (polygon.length == 4) { poly = [polygon[0],polygon[1],polygon[0]+polygon[2],polygon[1],polygon[0]+polygon[2],polygon[1]+polygon[3],polygon[0],polygon[1]+polygon[3]]; }
        
        for (var i=0;i<poly.length-2;i+=2) { // Check collisions of all segments using a sweep line algorithm from 0 to 1024
            tmp2 = colLineLine([0,point[1],1024,point[1]],[poly[i],poly[i+1],poly[i+2],poly[i+3]]);
            
            if (!!tmp2) { tmp[tmp.length] = tmp2[0]; }
            
            /* if (tmp[tmp.length-1] == false) {
                tmp.splice(tmp.length-1,1);
            } else {
                //cg.strokeRect(tmp[tmp.length-1][0]-4,tmp[tmp.length-1][1]-4,8,8);
                tmp[tmp.length-1] = tmp[tmp.length-1][0];
            } */
        }
        tmp2 = colLineLine([0,point[1],1024,point[1]],[poly[poly.length-2],poly[poly.length-1],poly[0],poly[1]]);
        
        if (!!tmp2) { tmp[tmp.length] = tmp2[0]; }
        
        /* if (tmp[tmp.length-1] == false) {
            tmp.splice(tmp.length-1,1);
        } else {
            //cg.strokeRect(tmp[tmp.length-1][0]-4,tmp[tmp.length-1][1]-4,8,8);
            tmp[tmp.length-1] = tmp[tmp.length-1][0];
        } */
        
        tmp.sort(function(a,b){return a-b});
        
        if (point[0] < tmp[0]) { return false; }
        for (var i=1;i<tmp.length;i++) {
            if (point[0] < tmp[i]) {
                if (i % 2) { cg.fillText('Current Collision Ray: '+i,10,100); return true; }
                else { cg.fillText('Current NON-Collision Ray: '+i,10,100); break; }
            }
        }
        
        return false;
    }
    
    function drawFps() {
        //Draw FPS & Debug info
        cg.fillStyle = "rgba(0,0,0,0.5)";
        cg.fillRect(0,0,128,64);
        cg.fillStyle = "rgba(0,192,0,1)";
        cg.fillText("FPS: "+(!realFps?0:realFps)+" | "+(time%1000), 2, 12);
        if (typeof players[p['id']] != 'undefined') {
            cg.fillText("Lerp: "+players[p['id']]['lerp'], 2, 24);
        }
        
        
        cg.strokeStyle = "rgba(255,0,0,0.5)";
        cg.lineWidth = 3;
        cg.beginPath();
        cg.moveTo(64,64);
        cg.lineTo(64+Math.cos(debugStepDirection*Math.PI/180)*64,64-Math.abs(Math.sin(debugStepDirection*Math.PI/180))*64);
        cg.stroke();
    }
    function drawMap() {
        //if (isNaN(currentGame)) { return false; } // Can't draw map of current game if we are not in a game
        
        var cu = 0; // Always drawing game 0 currently
        
        for (var i=0;i<map[cu].length;i++) {
            cg.fillStyle = "rgba(255,0,0,0.7)";
            /* // Debug change color of map fill when moused over
            if (colPointPolygon(mouse,map[cu][i])) {
                cg.fillStyle = "rgba(0,255,0,0.9)";
            } else {
                cg.fillStyle = "rgba(255,0,0,0.7)";
            }
            */
            
            if (map[cu][i].length == 4) {
                
                /*if (colPointPolygon(mouse,map[cu][i])) {
                    cg.fillStyle = "rgba(0,255,0,0.9)";
                } else {
                    cg.fillStyle = "rgba(255,0,0,0.7)";
                }*/
                cg.fillRect(map[cu][i][0],map[cu][i][1],map[cu][i][2],map[cu][i][3]);
            } else if (map[cu][i].length > 4) {
                cg.beginPath();
                cg.moveTo(map[cu][i][0],map[cu][i][1]);
                for (var j=2;j<map[cu][i].length;j+=2) {
                    cg.lineTo(map[cu][i][j],map[cu][i][j+1]);
                }
                cg.fill();
            }
        }
        
    }
    function drawEmitters() {
        cg.fillStyle = 'rgba(64,255,64,0.25)';
        cg.strokeStyle = '#FFF'; cg.lineWidth = 1;
        for (var i=0;i<emitters.length;i++) {
            cg.fillRect(emitters[i][0],emitters[i][1],emitters[i][2]-emitters[i][0],emitters[i][3]-emitters[i][1]);
            cg.strokeRect(emitters[i][0],emitters[i][1],emitters[i][2]-emitters[i][0],emitters[i][3]-emitters[i][1]);
        }
    }
    function drawPlayer() {
        cg.fillStyle = 'rgba(32,96,255,0.8)';
        cg.beginPath();
        cg.arc(p[0],p[1],p['size'][0]/2,0,Math.PI*2,false);
        cg.fill();
        
        cg.lineWidth = 3;
        cg.strokeStyle = '#000';
        cg.beginPath();
        cg.moveTo(p[0],p[1]);
        cg.lineTo(p[0]+Math.cos(p[2])*16,p[1]+Math.sin(p[2])*16);
        cg.stroke();
        
        if (typeof p['id'] != 'undefined') {
            cg.fillStyle = '#000';
            cg.fillText('#'+p['id'],p[0]-8,p[1]-4);
        }
        
        if (p['struck']) {
            cg.fillStyle = 'rgba(255,0,0,0.7)';
            cg.fillRect(0,0,mVars['size'][0],mVars['size'][1]);
            p['struck'] = false;
        }
        //cg.fillRect(p[0]-p['size'][0]/2,p[1]-p['size'][1]/2,p['size'][0],p['size'][1]);
    }
    function drawPlayers() {
        for (var i=0;i<players.length;i++) {
            if (typeof players[i] != 'undefined' && !isNaN(players[i][0])) {
                cg.lineWidth = 3;
                cg.strokeStyle = 'rgba(32,255,96,0.8)';
                cg.beginPath();
                cg.arc(players[i][0],players[i][1],p['size'][0]/2,0,Math.PI*2,false); // Use our default size
                cg.stroke();
                
                //cg.lineWidth = 3;
                cg.strokeStyle = '#000';
                cg.beginPath();
                cg.moveTo(players[i][0],players[i][1]);
                cg.lineTo(players[i][0]+Math.cos(players[i][2])*16,players[i][1]+Math.sin(players[i][2])*16);
                cg.stroke();
                
                cg.fillStyle = '#000';
                cg.fillText('#'+i,players[i][0]-8,players[i][1]-4);
                
                if (typeof players[i]['aim'] != 'undefined') {
                    cg.strokeStyle = 'rgba(255,0,255,0.3)';
                    cg.lineWidth = 3;
                    cg.beginPath();
                    cg.moveTo(players[i][0],players[i][1]);
                    cg.lineTo(players[i][0]+Math.cos(players[i]['aim']/(128/(Math.PI*2))-Math.PI)*512,players[i][1]+Math.sin(players[i]['aim']/(128/(Math.PI*2))-Math.PI)*512);
                    cg.stroke();
                }
            }
        }
    }
    
    function drawEnemies() {
        for (var i in enemies) {
            if (isNaN(i)) continue; // Filters array properties
            
            if (typeof enemies[i]['attack'][0] != 'undefined') {
                cg.fillStyle = '#AA0'; // Attacking
            } else {
                cg.fillStyle = '#800';
            }
            var tmpx = enemies[enemies[i]['type']][0], tmpy = enemies[enemies[i]['type']][1];
            cg.fillRect(enemies[i][0]-tmpx/2,enemies[i][1]-tmpy/2,tmpx,tmpy);
            cg.fillStyle = '#FFF';
            cg.fillText(i + ': ' + enemies[i]['hp'] + ' / ' + enemies[i]['maxhp'],enemies[i][0]-tmpx/2,enemies[i][1]-tmpy/2);
            cg.fillText('X:'+enemies[i][0]+',Y:'+enemies[i][1],enemies[i][0]-tmpx/2,enemies[i][1]-tmpy/2-12);
        }
    }
    function drawObjects() {
        for (var i in objects) {
            if (isNaN(i)) continue;
            
            if (objects[i]['type'] == 'money') {
                cg.strokeStyle = '#000'; cg.fillStyle = '#0C0'; cg.lineWidth = 1;
                cg.beginPath();
                //cg.arc(objects[i][0],objects[i][1],objects[objects[i]['type']][0]/2,0,Math.PI*2,false); // Only takes x value into account for size
                cg.rect(objects[i][0]-objects[objects[i]['type']][0]/2,objects[i][1]-objects[objects[i]['type']][1]/2,
                        objects[objects[i]['type']][0],objects[objects[i]['type']][1]);
                cg.fill(); cg.stroke();
            }
        }
    }
    function drawBullets() {
        cg.strokeStyle = '#000'; cg.lineWidth = 3;
        for (var i=0;i<bullets.length;i++) {
            if (bullets[i][4] == p['id']) { cg.strokeStyle = '#000'; } else { cg.strokeStyle = 'rgba(0,0,0,0.3)'; }
            cg.beginPath();
            cg.moveTo(bullets[i][0],bullets[i][1])
            cg.lineTo(bullets[i][0]+Math.cos(bullets[i][2])*6,bullets[i][1]+Math.sin(bullets[i][2])*6);
            cg.stroke();
        }
    }
    
    function drawLaser() {
        cg.strokeStyle = 'rgba(255,32,32,0.7)';
        cg.lineWidth = 2;
        cg.beginPath();
        cg.moveTo(p[0],p[1]); cg.lineTo(mouse[0],mouse[1]);
        cg.stroke();
        
        if (typeof p['aim'] != 'undefined') {
            
            cg.strokeStyle = 'rgba(255,255,255,0.3)';
            
            var a = [p[0],p[1],p[0]+Math.cos(p['aim']/(128/(Math.PI*2))-Math.PI)*512,p[1]+Math.sin(p['aim']/(128/(Math.PI*2))-Math.PI)*512];
            var tmp = false;
            for (var i in enemies) {
                if (isNaN(i)) continue;
                tmp = colLineRect(a,[enemies[i][0]-enemies[enemies[i]['type']][0]/2,enemies[i][1]-enemies[enemies[i]['type']][1]/2,enemies[enemies[i]['type']][0],enemies[enemies[i]['type']][1]]); if (!!tmp) break;
            }
            if (!!tmp) {
                cg.strokeStyle = 'rgba(255,128,128,0.3)';
                //cg.fillText('['+tmp[0]+','+tmp[1]+']',60,60);
                //cg.strokeRect(tmp[0]-3,tmp[1]-3,5,5);
            }
            
            cg.lineWidth = 3;
            cg.beginPath();
            cg.moveTo(p[0],p[1]);
            cg.lineTo(p[0]+Math.cos(p['aim']/(128/(Math.PI*2))-Math.PI)*512,p[1]+Math.sin(p['aim']/(128/(Math.PI*2))-Math.PI)*512);
            cg.stroke();
            
            
        }
    }
    function drawReticle() {
        cg.strokeStyle = '#900';
        cg.lineWidth = 1;
        cg.beginPath();
        cg.arc(mouse[0], mouse[1], 6, 0, 2*Math.PI);
        cg.stroke();
    }
    
    function drawHUD() {
        var hpos = mVars['size'][1] - HUDsize;
        cg.fillStyle = 'rgba(128,170,255,0.2)';
        cg.fillRect(0,hpos,mVars['size'][0],HUDsize);
        
        cg.fillStyle = 'rgba(200,0,0,0.8)';        
        cg.beginPath();
        var tmp = p['hp'] / p['maxhp'] * Math.PI;
        if (tmp == Math.PI) { tmp = Math.PI*0.99; }
        cg.arc(HUDsize/2,hpos+HUDsize/2,48,tmp+Math.PI/2,Math.PI*2.5-tmp,true);
        cg.fill();
        
        cg.fillStyle = '#FFF';
        cg.fillText('HP: '+Math.round(p['hp'])+' of '+p['maxhp'],10,380);
        
        // NETWORK INFO & DEBUG
        if (cVars['connected']) {
            cg.fillText('Connected',mVars['size'][0]-128,12);
            if (typeof currentGame != 'undefined') {
                cg.fillText('Game '+currentGame,mVars['size'][0]-128,24);
                cg.fillText('ID: '+p['id']+' of '+(players.length-1),mVars['size'][0]-128,36); // Player count doesn't work if there are holes
                if (typeof players[1] != 'undefined') cg.fillText('1: '+players[1][0]+','+players[1][1]+'|'+players[1]['lerp'],mVars['size'][0]-256,48);
                if (typeof players[2] != 'undefined') cg.fillText('2: '+players[2][0]+','+players[2][1]+'|'+players[2]['lerp'],mVars['size'][0]-256,60);
                if (typeof players[3] != 'undefined') cg.fillText('3: '+players[3][0]+','+players[3][1]+'|'+players[3]['lerp'],mVars['size'][0]-256,72);
                
                cg.fillText('GameStart: '+gameStart+', StartTime: '+startTime,128,mVars['size'][1]-64);
                for (var i=0;i<currentFrame.length;i++) {
                    if (typeof currentFrame[i] != 'undefined') {
                        cg.fillText('Frame'+i+': '+currentFrame[i][0]+', time: '+currentFrame[i][1]+', timer: '+currentFrame[i][2],0,128+i*12);
                    }
                }
                var tt = new Date().getTime()-startTime;
                cg.fillText('Net Ticker: '+tt,128,mVars['size'][1]-48);
                cg.fillText('Ticker: '+time,128,mVars['size'][1]-36);
                cg.fillText('Ping: '+cVars['ping'],128,mVars['size'][1]-24);
            } else {
                cg.fillStyle = '#F00';
                cg.fillText('Not in a game',mVars['size'][0]-128,24);
            }
        } else {
            cg.fillStyle = '#F00';
            cg.fillText('Disconnected',mVars['size'][0]-128,12);
        }
        //
        
        cg.fillText('P0:'+p[0],mVars['size'][0]-400,hpos+24);
        cg.fillText('P1:'+p[1],mVars['size'][0]-400,hpos+36);
        cg.fillText('P2:'+p[2],mVars['size'][0]-400,hpos+48);
        cg.fillText('P3:'+p[3],mVars['size'][0]-400,hpos+60);
        cg.fillText('AIM:'+p['aim'],mVars['size'][0]-400,hpos+72);
        
        //cg.fillRect(0,0,100,100);
    }
    
    function toUint7(val) {
        if (val <= 127) {
            return String.fromCharCode(val);
        } else {
            return false;
        }
    }
    function toUint14(val) {
        if (val <= 16383) {
            return String.fromCharCode(Math.floor(val/128)) + String.fromCharCode(val % 128);
        } else {
            return false;
        }
    }
    function toUint21(val) {
        if (val <= 2097151) {
            return String.fromCharCode(Math.floor(val/16384)) + String.fromCharCode(Math.floor((val%16384)/128)) + String.fromCharCode((val%16384) % 128);
        } else {
            return false;
        }
    }
    function toUint28(val) {
        if (val <= 268435455) {
            return String.fromCharCode(Math.floor(val/2097152)) + String.fromCharCode(Math.floor((val%2097152)/16384))
            + String.fromCharCode(Math.floor(((val%2097152)%16384)/128)) + String.fromCharCode(Math.floor(((val%2097152)%16384)%128));
        } else {
            return false;
        }
    }
    
    function readUint8(arr, pos) { return arr[pos]; }
    function readUint16(arr, pos) { return arr[pos]*256+arr[pos+1]; }
    function readUint32(arr, pos) { return arr[pos]*16777216+arr[pos+1]*65536+arr[pos+2]*256+arr[pos+3]; }
} // End namespace

//Prepare module to be fired
document.addEventListener("readyEvent", cVars['rigorMortisModule']['$'].load, false);