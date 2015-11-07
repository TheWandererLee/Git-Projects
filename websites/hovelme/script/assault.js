cVars['assaultModule']['$'] = new function() { // Initiate namespace
    // Loads variables while preparing the page. Move these to load function (document ready) if slowing page load down.
    var cg, realFps, fpsCounter, time=0, delta, lastTime, assaultFps, highlighting;
    var mousePos, gridPos, mouseDown, mouseOver, mouseButton, mouseOverToolbar=[-1,-1];
    var mVars = cVars['assaultModule']; // Bring over the module variables from the main site
    
    //Globally accessible module variables
    mVars['team'] = 1;
    
    var toolbars = [[4,mVars['size'][1]-132,128,128],[136,mVars['size'][1]-100,496,96],[636,mVars['size'][1]-132,128,128]];
    var toolbarButtons = [ // toolbar     x    y   width height name   etc. // names must be unique or all buttons of that name will be referenced
                                    [
                                        {0:3, 1:3, 2:38, 3:38, name:'hold'},
                                        {0:45, 1:3, 2:38, 3:38, name:'move'},
                                        {0:87, 1:3, 2:38, 3:38, name:'attack'},
                                        {0:45, 1:45, 2:38, 3:38, name:'build'},
                                        {0:87, 1:87, 2:38, 3:38, name:'fill1'}
                                    ],
                                    [
                                        {0:3, 1:3, 2:96, 3:20, name:'close'},
                                        {0:3, 1:27, 2:38, 3:38, name:'fill2'}
                                    ],
                                    undefined
                        ];
    var toolbarPriority = ['attack','build','move','hold']; // From highest to lowest priority
    var toolbarDefault = ['close','fill1'];
    var toolbarDisplayed = [];
    
    var debugStepDirection = 0;
    
    var objects = [], highlightObjects = [], selectObjects = [];
    var grid = [], gridSize = 24;
    
    var gridPath = []; // Used for pathfinding
    
    // Constant attributes, speeds, values, game-affecting variables
    // Server can send file with randomly named variables, and check throughout game if user is not making illegal changes to javascript
    
        var sVars = []; // Sprite attributes
        // Load object variables
        sVars['tank'] = [];
            sVars['tank']['size'] = [24,24];
            sVars['tank']['speed'] = 48; // Pixels per second
            sVars['tank']['selects'] = sVars['tank']['moves'] = true;
            sVars['tank']['origin'] = [12,12];
            sVars['tank']['toolbar'] = ['hold','move','attack'];
        sVars['bus'] = [];
            sVars['bus']['size'] = [48,32];
            sVars['bus']['speed'] = 110; // Pixels per second
            sVars['bus']['selects'] = sVars['bus']['moves'] = true;
            sVars['bus']['origin'] = [24,16];
            sVars['bus']['toolbar'] = ['hold','move','attack'];
        sVars['truck'] = [];
            sVars['truck']['size'] = [22,16];
            sVars['truck']['speed'] = 80; // Pixels per second
            sVars['truck']['selects'] = sVars['truck']['moves'] = true;
            sVars['truck']['origin'] = [11,8];
            sVars['truck']['toolbar'] = ['hold','move','attack','build'];
        sVars['wall'] = [];
            sVars['wall']['size'] = [24,24];
            sVars['wall']['select'] = true;
            sVars['wall']['origin'] = [0,0];
        sVars['bullet'] = [];
            sVars['bullet']['size'] = [4,4];
            sVars['bullet']['speed'] = 500;
            sVars['bullet']['origin'] = [2,2];
        sVars['pointMarker'] = [];
            sVars['pointMarker']['size'] = [32,32];
            sVars['pointMarker']['life'] = 0.5; // Life in seconds
            sVars['pointMarker']['origin'] = [0,0];
    
    //var proximityStop = 1; // Within how many percentage of final dest should object stop trying to move
    
    var debugImg = new Image();
    debugImg.src = 'image/chatMin.png';
    
    var startTime = new Date().getTime();
    
    this.load = function() {
        if (!$('assaultModule')) { return false; } // Exit if assaultModule is not found
        
        window.addEventListener('resize', assaultWindowMoved, false);
        window.addEventListener('mouseup', assaultMouseUp, false);
        window.addEventListener('mousemove', windowMouseMove, false);
        
        //$('assaultModule').addEventListener('mousemove', assaultMouseMove, false); // Deprecated for usage of full window mousemove
        $('assaultModule').parentNode.addEventListener("conAdjustedEvent", assaultWindowMoved, false);
        
        $('assaultModule').oncontextmenu = function() { return false; }
        
        $('assaultModulePause').onclick = function() { // Pause
            mVars['paused'] = !mVars['paused'];
            $('assaultModulePause').style.outline = Number(mVars['paused'])+'px solid #F00';
            $('assaultModulePause').style.opacity = (Number(mVars['paused'])-1)/2+1;
            
            time = new Date().getTime()-startTime; // Full pause. User controls still work
            
            assaultStep();
        }
        
        function windowMouseMove(eve) {
            //if (mouseOver) return false; // Optimize: Separate outside and inside bounds mouse events, repeating only as necessary
            if (typeof event != "undefined") { eve = event; }
            mousePos = getExactPosition(eve);
            mousePos[0]-=mVars['position'][0]; mousePos[1]-=mVars['position'][1];
            gridPos = [Math.floor(mousePos[0]/gridSize),Math.floor(mousePos[1]/gridSize)];

            gridPos[0] = Math.max(gridPos[0],0);
            gridPos[1] = Math.max(gridPos[1],0);
            
            if (mouseDown && typeof highlighting != 'undefined') {
                highlighting[2] = mousePos[0]; highlighting[3] = mousePos[1];
            }
            
            mouseOverToolbar[0] = -1;
            if (mouseOver) {
                for (var i=0; i<toolbars.length; i++) {
                    if (posInBounds(mousePos, toolbars[i])) {
                        mouseOverToolbar[0] = i; break;
                    }
                }
            }
        }
        function assaultMouseMove(eve) {
            /*
            if (typeof event != "undefined") { eve = event; }
            mousePos = getExactPosition(eve);
            mousePos[0]-=mVars['position'][0]; mousePos[1]-=mVars['position'][1];
            
            
            //mouseMoved = true;
            
            // Only put mouse detection here for elements that will not move
            mouseOverToolbar[0] = -1;
            for (var i=0; i<toolbars.length; i++) {
                if (posInBounds(mousePos, toolbars[i])) {
                    mouseOverToolbar[0] = i; break;
                }
            }
            */
        }
        function assaultMouseUp(eve) {
            e = (window.event)?window.event:eve;
            if (e.which == null) mouseButton = (e.button < 2) ? 0 : ((e.button == 4) ? 1 : 2); // IE
            else mouseButton = (e.which < 2) ? 0 : ((e.which == 2) ? 1 : 2);
            
            if (!mouseButton) {
                if (mouseDown) {
                    if (!highlightObjects.length) {
                        if ((typeof highlighting == 'undefined' || highlighting.length <= 2) && mouseOverToolbar[0] == -1) {
                            selectObjects = [];
                        }
                    } else {
                        if (typeof highlighting != 'undefined' && highlighting.length > 2) {
                            selectObjects = highlightObjects.slice(0);
                        }
                    }
                }
            }
            highlighting = undefined; mouseDown = false;
        }
        $('assaultModuleMain').onmousedown = function(e) {
            e = (window.event)?window.event:e;
            if (e.which == null) mouseButton = (e.button < 2) ? 0 : ((e.button == 4) ? 1 : 2); // IE
            else mouseButton = (e.which < 2) ? 0 : ((e.which == 2) ? 1 : 2);
            
            mouseDown = true;
            
            if (e.altKey) { // Debug override
                if (typeof gridPos != "undefined" && typeof grid[gridPos[0]] != "undefined" && typeof grid[gridPos[0]][gridPos[1]] != "undefined" && grid[gridPos[0]][gridPos[1]].length != 0) {
                    for (var i=0; i<selectObjects.length; i++) {
                        var tmp = grid[gridPos[0]][gridPos[1]].indexOf(selectObjects[i]);
                        if (tmp != -1) {
                            selectObjects.splice(i,1); i--; // Deselect all removed objects
                        }
                    }
                    removeObject(grid[gridPos[0]][gridPos[1]]);
                    calculateClearances();
                    return false;
                } else {
                    addObject('wall', gridPos[0]*gridSize, gridPos[1]*gridSize);
                    calculateClearances();
                    return false;
                }
            }
            
            if (mouseOverToolbar[0] == -1) {
                if (!mouseButton) { // Left Click
                    highlighting = mousePos;
                    if (!highlightObjects.length) { // Nothing under mouse
                        //selectObjects = [];
                    } else { // Objects under mouse
                        var attacking = false;
                        for (var i=0; i<selectObjects.length; i++) {
                            if (objects[selectObjects[i]]['action'] == 'attack') {
                                objects[selectObjects[i]]['action'] = 'move';
                                if (highlightObjects.indexOf(selectObjects[i]) != -1) { continue; } // Stops things from attacking themselves
                                objects[selectObjects[i]]['attack'] = highlightObjects;
                                attacking = true;
                            }
                        }
                        if (!attacking) {
                            if (e.shiftKey || e.ctrlKey) { // Select multiple objects
                                for (var i=0; i<highlightObjects.length; i++) {
                                    var tmp = selectObjects.indexOf(highlightObjects[i])
                                    if (tmp == -1) {
                                        selectObjects[selectObjects.length] = highlightObjects[i];
                                    } else {
                                        selectObjects.splice(tmp, 1);
                                    }
                                }
                            } else { selectObjects = highlightObjects.slice(0); } // Select single or overlapping objects
                        }
                    }
                } else if (mouseButton == 2) { // Right click
                    if (!highlightObjects.length) { // Nothing under mouse
                        
                        for (var i=0; i<selectObjects.length; i++) {
                            var size = sVars[objects[selectObjects[i]]['sprite']]['size'];
                            objects[selectObjects[i]]['move'] = calculatePath([objects[selectObjects[i]][0],objects[selectObjects[i]][1]], [mousePos[0],mousePos[1]], Math.max(sVars[objects[selectObjects[i]]['sprite']]['size'][0],sVars[objects[selectObjects[i]]['sprite']]['size'][1]), sVars[objects[selectObjects[i]]['sprite']]['origin']);
                            //objects[selectObjects[i]]['move'] = [mousePos[0], mousePos[1]]; // Let's get moving
                            objects[selectObjects[i]]['action'] = 'move';
                        }
                        addObject('pointMarker', mousePos[0], mousePos[1]);
                    } else { // Objects under mouse
                        for (var i=0; i<selectObjects.length; i++) {
                            objects[selectObjects[i]]['move'] = calculatePath([objects[selectObjects[i]][0],objects[selectObjects[i]][1]], [mousePos[0],mousePos[1]], Math.max(sVars[objects[selectObjects[i]]['sprite']]['size'][0],sVars[objects[selectObjects[i]]['sprite']]['size'][1]), sVars[objects[selectObjects[i]]['sprite']]['origin']);
                            //objects[selectObjects[i]]['move'] = [mousePos[0], mousePos[1]];
                            objects[selectObjects[i]]['action'] = 'move';
                        }
                        addObject('pointMarker', mousePos[0], mousePos[1]);
                    }
                } else { // Other click
                
                }
            } else {
                var tb = toolbarButtons[mouseOverToolbar[0]][mouseOverToolbar[1]]['name'];
                if (mouseOverToolbar[1] != -1 && toolbarDisplayed.indexOf(tb) != -1) {
                    switch (tb) {
                        case 'hold':
                            for (var i=0; i<selectObjects.length; i++) {
                                objects[selectObjects[i]]['action'] = 'hold'; delete objects[selectObjects[i]]['move'];
                            }
                            break;
                        case 'move':
                            for (var i=0; i<selectObjects.length; i++) {
                                objects[selectObjects[i]]['action'] = 'move';
                            }
                            break;
                        case 'attack':
                            for (var i=0; i<selectObjects.length; i++) {
                                objects[selectObjects[i]]['action'] = 'attack';
                            }
                            break;
                        default:
                    }
                }
            }
            return false;
        }
        $('assaultModuleMain').onmouseover = function(e) {
            //if (typeof event != "undefined") { e = event; }
            mouseOver = true;
        }
        $('assaultModuleMain').onmouseout = function(e) {
            //if (typeof event != "undefined") { e = event; }
            mouseOver = false;
        }
        
        // Load fps counter
        fpsCounter = setInterval(function() { realFps = undefined; }, 1000);
        
        // Load grid
        for (var xx=0; xx<mVars['size'][0]/gridSize; xx++) {
            grid[xx] = [];
            gridPath[xx] =[];
            for (var yy=0; yy<mVars['size'][1]/gridSize; yy++) {
                grid[xx][yy] = [];
                gridPath[xx][yy] = [];
            }
        }
        
        // Load objects
        //addObject('tank', 240, 120);
        //addObject('tank', 360, 120);
        //addObject('bus', 280, 325);
        
        for (var i=0; i<100; i++) {
            var id = addObject(Math.random()>0.5?(Math.random()>0.5?'bus':'truck'):'tank', Math.floor(Math.random()*mVars['size'][0]), Math.floor(Math.random()*mVars['size'][1]))
            
            if (objects[id]['sprite'] == 'bus' || objects[id]['sprite'] == 'tank') { objects[id]['team'] = Math.round(Math.random()*2); }
        }
        for (var j=0; j<100; j++) addObject('wall', Math.floor(Math.random()*mVars['size'][0]/24)*24, Math.floor(Math.random()*mVars['size'][1]/24)*24);
        
        // Load canvas
        loadAssaultCanvas();
        calculateClearances();
    }
    
    function loadAssaultCanvas() {
        mVars['position'] = getElementPosition($('assaultModuleMain'));
        //assaultModuleSize = [$('assaultModule').style.width.substr(0,$('assaultModule').style.width.length-2),$('assaultModule').style.height.substr(0,$('assaultModule').style.height.length-2)];
        
        if (!$('assaultModuleMain').getContext) { $('assaultModuleMain').innerHTML = "Your browser does not support the canvas context.<br>Please upgrade to a newer browser such as Google Chrome or Firefox.<br><br>Sorry for the inconvenience."; return; }
        cg = document.getElementById('assaultModuleMain').getContext('2d');
        
        assaultClear();
        //drawGrid();
        
        cg.fillStyle = "rgb(220,0,0)";
        cg.fillRect(10,10,100,100);
        
        cg.font = "12px Verdana";
        cg.translate(0.5,0.5);
        
        assaultStep();
    }
    function assaultClear(height) {
        if (typeof height == "undefined") { height = mVars['size'][1]; }
        if (height < 0) {
            cg.clearRect(0,mVars['size'][1]+height,mVars['size'][0],-height)
        } else {
            cg.clearRect(0,0,mVars['size'][0],height);
        }
        
        //cg.fillStyle = "rgb(220,220,220)";
        //cg.fillRect(0,0,assaultModuleSize[0],assaultModuleSize[1]);
    }
    function assaultStep() {
        if (mVars['paused']) { return false; }
        
        delta = time;
        time = new Date().getTime()-startTime;
        delta = (time-delta) * 0.001;
        
        ////////////////////////////// Step: Logic, calculations, physics here
        
        recalculateClearances = false;
        assaultFps++;
        debugStepDirection+= 180 * delta;
        
        for (var i=0; i<objects.length; i++) {
            if (typeof objects[i] == 'undefined') { continue; }
            if (objects[i]['sprite'] == 'pointMarker') {
                objects[i]['lifeRemaining'] -= delta;
                if (objects[i]['lifeRemaining'] <= 0) { removeObject(i); continue; } // Queue for removal. Cannot remove immediately as all IDs will be offset
            }
            if (sVars[objects[i]['sprite']]['moves'] && typeof objects[i]['move'] != 'undefined' && objects[i]['move'].length) {
                removeObjectFromGrid(i); // Prepare to move object to new grid coordinates
                
                var oldA = objects[i][2];
                var newdirection = Math.atan2(objects[i]['move'][0][1] - objects[i][1], objects[i]['move'][0][0] - objects[i][0]);
                //objects[i][2] = Math.atan2(objects[i]['move'][0][1] - objects[i][1], objects[i]['move'][0][0] - objects[i][0]);
                if (Math.abs(objects[i][2]-newdirection) > 0.2) { // We need to turn
                    //$('slideAmount').innerHTML = '[' + Math.abs(objects[i][2]-newdirection) + ']' + objects[i][2] + ' &amp; ' + newdirection;

                    if (Math.abs(objects[i][2]-newdirection) > Math.PI) {
                        if (objects[i][2] < newdirection) { objects[i][2] += Math.PI*2; }
                        else { objects[i][2] -= Math.PI*2; }
                    }
                    var dirmodifier = objects[i][2]<newdirection ? 0.2 : -0.2;
                    
                    objects[i][2] += dirmodifier;
                    //objects[i][2] = objects[i][2]<newdirection ? objects[i][2]+0.1 : objects[i][2]-0.1;
                    
                    //if (objects[i][2] > newdirection) { objects[i][2] -= 0.1; }
                    //if (objects[i][2] < newdirection) { objects[i][2] += 0.1; }
                } else {
                    objects[i][2] = newdirection;
                    
                    if ((Math.abs(Math.cos(objects[i][2])*sVars[objects[i]['sprite']]['speed']*delta) >= Math.abs(objects[i][0] - objects[i]['move'][0][0]) && Math.abs(Math.sin(objects[i][2])*sVars[objects[i]['sprite']]['speed']*delta) >= Math.abs(objects[i][1] - objects[i]['move'][0][1])) || objects[i].slice(0,2) == objects[i]['move'][0]) {
                        // If horizontal AND vertical move speed exceeds distance to the final point. Stop.
                        objects[i][0] = objects[i]['move'][0][0];
                        objects[i][1] = objects[i]['move'][0][1];
                        //objects[i]['action'] = 'hold';
                        if (objects[i]['move'].length == 1) {
                            delete objects[i]['move'];
                        } else {
                            objects[i]['move'].splice(0,1);
                        //objects[i][2] = oldA; // Returns direction to previous position (if we didn't move at all)
                        }
                        
                    } else { // Else, we still have to travel: Continue movement
                        objects[i][0] += Math.cos(objects[i][2])*sVars[objects[i]['sprite']]['speed']*delta;
                        objects[i][1] += Math.sin(objects[i][2])*sVars[objects[i]['sprite']]['speed']*delta;
                    }
                
                }
                // Change object grid position. Can do absolute (non-grid) mouseovers, but need grid position at the very least
                // immediately before / when path calculating only. If in STEP will update grid position every step.
                addObjectToGrid(i);
                //recalculateClearances = true; Only use if updating clearances on object position update
                //addObjectToGrid(i, objects[i][0], objects[i][1], sVars[objects[i]['sprite']]['size'][0], sVars[objects[i]['sprite']]['size'][1]);
            }
        }
        
        
        
        ////////////////////////////// User interface responses
        
        
        // Determine moused over objects (if mouse is not over a toolbar)
        highlightObjects = []; mouseOverToolbar[1] = -1;
        if (typeof highlighting != 'undefined' && highlighting.length > 2) {
            /*var tmph = highlighting.slice(0);
            if (tmph[0] > tmph[2]) { tmph[0]=tmph[2]; tmph[1]=tmph[3]; tmph[2]=highlighting[2]; tmph[3]=highlighting[3]; } // Swap if necessary
            tmph[2] -= tmph[0]; tmph[3] -= tmph[1];
            */
            var tmph = highlighting.slice(0);
            if (tmph[2] < tmph[0]) { tmph[2] = tmph[0]; tmph[0] = highlighting[2]; }
            if (tmph[3] < tmph[1]) { tmph[3] = tmph[1]; tmph[1] = highlighting[3]; }
            for (var i=0; i<objects.length; i++) {
                if (typeof objects[i] != 'undefined' && sVars[objects[i]['sprite']]['selects']) {
                    if (objects[i][0] >= tmph[0] && objects[i][0] <= tmph[2] && objects[i][1] >= tmph[1] && objects[i][1] <= tmph[3]) highlightObjects[highlightObjects.length] = i;
                }
            }
        } else {
            if (mouseOver) {
                if (mouseOverToolbar[0] == -1) {
                    if (typeof gridPos != "undefined" && typeof grid[gridPos[0]] != "undefined" && typeof grid[gridPos[0]][gridPos[1]] != "undefined" && grid[gridPos[0]][gridPos[1]].length != 0) {
                        // FIRES IF ANY OBJECT IS IN MOUSE CELL
                        for (var i=0; i<grid[gridPos[0]][gridPos[1]].length; i++) {
                            //drawObject(objects[grid[gridPos[0]][gridPos[1]][i]]['sprite'], [objects[grid[gridPos[0]][gridPos[1]][i]][0], objects[grid[gridPos[0]][gridPos[1]][i]][1], true]);
                            // highlightObjects[highlightObjects.length] = grid[gridPos[0]][gridPos[1]][i]; SELECTS ALL OBJECTS IN THIS CELL
                            var e = grid[gridPos[0]][gridPos[1]][i];
                            
                            if (typeof objects[e] != 'undefined' && sVars[objects[e]['sprite']]['selects']) { // Will only highlight objects with 'selects' set to true
                                //if (mousePos[0] >= objects[e][0] && mousePos[1] >= objects[e][1] && mousePos[0] <= objects[e][0]+sVars[objects[e]['sprite']]['size'][0] && mousePos[1] <= objects[e][1]+sVars[objects[e]['sprite']]['size'][1]) {
                                //if (posInBounds(mousePos, [objects[e][0], objects[e][1], sVars[objects[e]['sprite']]['size'][0], sVars[objects[e]['sprite']]['size'][1]])) {
                                var d = calculateDimensions(e);
                                if (posInBounds(mousePos, [d[0],d[1],d[2],d[3]])) {
                                    // SELECTS ALL OBJECTS MOUSED OVER IN CELL
                                    highlightObjects[highlightObjects.length] = e;
                                    //$('assaultModuleMain').style.cursor = 'pointer';
                                }
                            }
                        }
                    }
                } else { // Otherwise determine if a toolbar button is being hovered
                    if (typeof toolbarButtons[mouseOverToolbar[0]] != 'undefined') { // If this toolbar actually contains buttons
                        for (var i=0; i<toolbarButtons[mouseOverToolbar[0]].length; i++) {
                            if (posInBounds(mousePos, arrayAdd(toolbarButtons[mouseOverToolbar[0]][i],toolbars[mouseOverToolbar[0]],2))) { mouseOverToolbar[1] = i; }
                        }
                    }
                }
            }
        }
        $('assaultModuleMain').style.cursor = !highlightObjects.length ? 'default' : 'pointer';
        
        ////////////////////////////// Draw Screen:
        /* if (toolbarSize[0] == toolbarSize[1]) { assaultClear(mVars['size'][1]-toolbarSize[0]); } // Toolbar opened
        else { assaultClear(); } // Toolbar closed, Clear all */
        assaultClear();
        
        
        if (typeof realFps == 'undefined') { realFps = assaultFps; assaultFps = 0; }
        
        drawGrid();
        //drawClearances();
        //drawPaths();
        
        /////////////////////////////////// Draw all objects
        for (var i=0; i<objects.length; i++) {
            if (typeof objects[i] == 'undefined') { continue; }
            var teamColor = '#CCC';
            if (objects[i]['team']==1) { teamColor = '#FAA'; }
            else if (objects[i]['team']==2) { teamColor = '#AAF'; }
            
            if (selectObjects.indexOf(i) != -1) { // Selected draw
                drawObject(i, objects[i][0], objects[i][1], ['#F00',teamColor]);
            } else if (highlightObjects.indexOf(i) != -1) { // Object is moused over
                var tmp = ["#0FF",teamColor];
                for (var j=0; j<selectObjects.length; j++) {
                    if (objects[selectObjects[j]]['action'] == 'attack') { tmp = ['#F00','#933']; }
                }
                drawObject(i, objects[i][0], objects[i][1], tmp);
            } else { // Regular draw
                drawObject(i, objects[i][0], objects[i][1], ['#000',teamColor]);
            }
            
            ////////////////////////////// Draw Debug Lines & Actions per object:
            if (/*objects[i]['action'] == 'attack' && */typeof objects[i]['attack'] != 'undefined') {
                cg.lineWidth = 1;
                cg.strokeStyle = 'rgba(255,0,0,0.5)';
                cg.beginPath();
                    for (var j=0; j<objects[i]['attack'].length; j++) {
                        cg.moveTo(objects[i][0],objects[i][1]);
                        cg.lineTo(objects[objects[i]['attack'][j]][0], objects[objects[i]['attack'][j]][1]);
                        cg.arc(objects[objects[i]['attack'][j]][0], objects[objects[i]['attack'][j]][1], 6, Math.PI*3/2, -Math.PI/2, false);
                    }
                cg.stroke();
            }
        }
        
        
        
        
        ////////////////////////////// Draw Toolbar:
        
        drawToolbar();
        
        drawFps();
        drawMouse();
        
        // After step
        if (recalculateClearances) calculateClearances();
        
        //Next
        requestAnimFrame(assaultStep);
    }
    function drawGrid() {
        cg.strokeStyle = "#000";
        cg.lineWidth = 1;
        
        //cg.translate(-0.5, -0.5);
        cg.beginPath();
        for (var yy=0; yy<mVars['size'][1]; yy+=gridSize) {
            cg.moveTo(0,yy);
            cg.lineTo(mVars['size'][0],yy);
        }
        for (var xx=0; xx<mVars['size'][0]; xx+=gridSize) {
            cg.moveTo(xx,0);
            cg.lineTo(xx,mVars['size'][1]);
        }
        cg.stroke();
        //cg.translate(0.5, 0.5);
    }
    function drawPaths() {
        if (selectObjects.length > 0) {
            for (var i=0; i<selectObjects.length; i++) {
                if (typeof objects[selectObjects[i]] != 'undefined') calculatePath([objects[selectObjects[i]][0],objects[selectObjects[i]][1]],(typeof mousePos == 'undefined'?[200,200]:mousePos),Math.max(sVars[objects[selectObjects[i]]['sprite']]['size'][0],sVars[objects[selectObjects[i]]['sprite']]['size'][1]), sVars[objects[selectObjects[i]]['sprite']]['origin']);
            }
        }
    }
    
    function drawToolbar() {
        cg.strokeStyle = '#99F';
        cg.fillStyle = 'rgba(32, 80, 100, 0.7)';
        cg.lineWidth = 1;
        for (var i=0; i<toolbars.length; i++) {
            cg.fillRect(toolbars[i][0],toolbars[i][1],toolbars[i][2],toolbars[i][3]);
            cg.strokeRect(toolbars[i][0],toolbars[i][1],toolbars[i][2],toolbars[i][3]);
        }

        cg.lineWidth = 1;
        
        //Determine what actions are being taken by selected objects
        var toolbarInteraction = []; // [0] is scheduled ACTION, [1] is action being performed
        
        /* for (var k=0; k<selectObjects.length; k++) {
            if (typeof objects[selectObjects[k]] != 'undefined' && typeof objects[selectObjects[k]]['action'] != 'undefined') {
                if (typeof toolbarInteraction[0] == 'undefined' || toolbarPriority.indexOf(objects[selectObjects[k]]['action']) < toolbarPriority.indexOf(toolbarInteraction[0])) { toolbarInteraction[0] = objects[selectObjects[k]]['action']; break; } // Only set if a higher priority (lower indexOf) than previous ACTION. Unknown actions will take highest priority.
            }
        } */
        
        for (var k=0; k<selectObjects.length; k++) { // Will show highest level of action being ACTIVEly performed
            if (typeof objects[selectObjects[k]] != 'undefined') {
                if (typeof objects[selectObjects[k]]['action'] != 'undefined' && (typeof toolbarInteraction[0] == 'undefined' || toolbarPriority.indexOf(objects[selectObjects[k]]['action']) < toolbarPriority.indexOf(toolbarInteraction[0]))) {
                    toolbarInteraction[0] = objects[selectObjects[k]]['action'];// break;
                }
                for (i=0; i<toolbarPriority.length; i++) {
                    if (typeof objects[selectObjects[k]][toolbarPriority[i]] != 'undefined') {
                        if (typeof toolbarInteraction[1] == 'undefined' || toolbarInteraction[1] > i) { toolbarInteraction[1] = i; break; } // Only set if a higher priority (lower index) than previous ACTIVE action
                    } // Will continue looping in case object has more than one action set
                }
                
                if (toolbarInteraction[0] == toolbarInteraction[1] == 0) { break; } // Just quit if reached maximum priority (lowest index)
            }
        }
        toolbarInteraction[1] = toolbarPriority[toolbarInteraction[1]];
        
        toolbarDisplayed = [];
        for (var i=0; i<toolbarButtons.length; i++) {
            if (typeof toolbarButtons[i] !='undefined') {
                for (var j=0; j<toolbarButtons[i].length; j++) {
                    if (selectObjects.length) {
                        var found = false;
                        for (var k=0; k<selectObjects.length; k++) {
                            if (sVars[objects[selectObjects[k]]['sprite']]['toolbar'].indexOf(toolbarButtons[i][j]['name']) > -1) { found = true; }
                        }
                        if (!found) { continue; }
                    } else {
                        if (toolbarDefault.indexOf(toolbarButtons[i][j]['name']) == -1) { continue; }
                    }
                    toolbarDisplayed[toolbarDisplayed.length] = toolbarButtons[i][j]['name'];
                    cg.fillStyle = (mouseOverToolbar[0]==i && mouseOverToolbar[1]==j)?'rgba(170, 255, 255, 0.8)':'rgba(255, 255, 255, 0.5)';
                    cg.strokeStyle = (mouseOverToolbar[0]==i && mouseOverToolbar[1]==j)?'#0FF':'#000';
                    
                    // Displaying current selected objects action or motion is only supported for first object encountered
                    if (toolbarButtons[i][j]['name'] == toolbarInteraction[0]) { cg.strokeStyle = '#0F0'; } // ACTION / Scheduled action
                    if (toolbarButtons[i][j]['name'] == toolbarInteraction[1]) { cg.strokeStyle = '#F00'; } // Performing / ACTIVE action
                    
                    /*for (var k=0; k<selectObjects.length; k++) {
                        if (toolbarButtons[i][j]['name'] == 'move' && typeof objects[selectObjects[k]]['move'] != 'undefined' && objects[selectObjects[k]]['move'].length > 0) { cg.strokeStyle = '#F00'; }
                        if (toolbarButtons[i][j]['name'] == 'build' && typeof objects[selectObjects[k]]['build'] != 'undefined' && objects[selectObjects[k]]['build'].length > 0) { cg.strokeStyle = '#F00'; }
                        if (toolbarButtons[i][j]['name'] == 'attack' && typeof objects[selectObjects[k]]['attack'] != 'undefined' && objects[selectObjects[k]]['attack'].length > 0) { cg.strokeStyle = '#F00'; }
                    }*/
                    cg.fillRect(toolbars[i][0]+toolbarButtons[i][j][0], toolbars[i][1]+toolbarButtons[i][j][1], toolbarButtons[i][j][2], toolbarButtons[i][j][3]);
                    cg.strokeRect(toolbars[i][0]+toolbarButtons[i][j][0], toolbars[i][1]+toolbarButtons[i][j][1], toolbarButtons[i][j][2], toolbarButtons[i][j][3]);
                    cg.fillStyle = '#000';
                    cg.fillText(toolbarButtons[i][j]['name'], toolbars[i][0]+toolbarButtons[i][j][0], toolbars[i][1]+toolbarButtons[i][j][1]+14);
                }
            }
        }
    }
    
    function drawFps() {
        //Draw FPS & Debug info
        cg.fillStyle = "rgba(0,0,0,0.5)";
        cg.fillRect(0,0,128,64);
        cg.fillStyle = "rgba(0,192,0,1)";
        cg.fillText("FPS: "+(!realFps?0:realFps)+" | "+(time%1000), 2, 12);
        if (mouseOver && typeof mousePos != 'undefined' && typeof grid[gridPos[0]] != 'undefined' && typeof grid[gridPos[0]][gridPos[1]] != 'undefined') {
            var tmp = '';
            if (grid[gridPos[0]][gridPos[1]].length == 0) { tmp = '-empty-'; } else {
                for (var i=0; i<grid[gridPos[0]][gridPos[1]].length; i++) {
                    if (highlightObjects.indexOf(grid[gridPos[0]][gridPos[1]][i]) != -1) { tmp += '*'; } // Moused over
                    tmp += grid[gridPos[0]][gridPos[1]][i] + ','; // In cell
                }
                tmp = tmp.substring(0,tmp.length-1);
            }
            cg.fillText("Grid: ["+gridPos[0]+","+gridPos[1]+"] - {"+tmp+"}", 2, 24);
        }
        
        cg.strokeStyle = "rgba(255,0,0,0.5)";
        cg.lineWidth = 3;
        cg.beginPath();
        cg.moveTo(64,64);
        cg.lineTo(64+Math.cos(debugStepDirection*Math.PI/180)*64,64-Math.abs(Math.sin(debugStepDirection*Math.PI/180))*64);
        cg.stroke();
    }
    function drawMouse() {
        //Draw Mouse
        if (typeof mousePos != 'undefined') {
            if (mouseOver) {
                //cVars['assault']['mouseMoved'] = false;
                cg.fillStyle = "rgba(255,255,255,0.25)";
                cg.fillRect(Math.floor(mousePos[0]/gridSize)*gridSize,Math.floor(mousePos[1]/gridSize)*gridSize,gridSize,gridSize);
            }
            if (highlighting) {
                cg.save();
                cg.lineWidth = 1;
                cg.strokeStyle = 'rgba(0,192,255,0.7)';
                cg.fillStyle = 'rgba(64,64,255,0.3)';
                cg.fillRect(highlighting[0], highlighting[1], highlighting[2]-highlighting[0], highlighting[3]-highlighting[1]);
                cg.strokeRect(highlighting[0], highlighting[1], highlighting[2]-highlighting[0], highlighting[3]-highlighting[1]);
                cg.restore();
            }
        }
    }
    function drawObject(obj, x, y, args) {
        //cg.fillRect(args[0], args[1], 24, 24); return false;
        
        cg.save();
        
        if (sVars[objects[obj]['sprite']]['moves']) {
            cg.strokeStyle = "rgba(0,255,255,0.3)";
            var tmp = calculateDimensions(obj);
            cg.strokeRect(tmp[0],tmp[1],tmp[2],tmp[3]);
        }
        
        cg.translate(x, y);
        
        if (typeof objects[obj]['life'] != 'undefined') {
            cg.translate(-sVars[objects[obj]['sprite']]['origin'][0], -sVars[objects[obj]['sprite']]['origin'][1]);
            cg.fillStyle = "#0AF";
            cg.strokeStyle = "#CCC";
            cg.fillRect(0,-6,objects[obj]['life'][0]/objects[obj]['life'][1]*sVars[objects[obj]['sprite']]['size'][0],4);
            cg.strokeRect(0,-6,sVars[objects[obj]['sprite']]['size'][0],4);
            cg.translate(sVars[objects[obj]['sprite']]['origin'][0], sVars[objects[obj]['sprite']]['origin'][1]);
        }
        
        if (typeof objects[obj][2] != 'undefined') { cg.rotate(objects[obj][2]); }
        cg.translate(-sVars[objects[obj]['sprite']]['origin'][0], -sVars[objects[obj]['sprite']]['origin'][1]);
        
        cg.fillStyle = "#CCC";
        if (typeof args == 'string') {
            cg.strokeStyle = args;
        } else if (typeof args == 'object') {
            cg.strokeStyle = args[0];
            cg.fillStyle = args[1];
        } else {
            cg.strokeStyle = '#000';
        }
        cg.lineWidth = 1;
        switch (objects[obj]['sprite']) {
            case 'tank':
                cg.beginPath();
                cg.moveTo(sVars['tank']['size'][0],sVars['tank']['size'][1]/2);
                cg.lineTo(0,0);
                cg.lineTo(0,sVars['tank']['size'][1]);
                cg.lineTo(sVars['tank']['size'][0],sVars['tank']['size'][1]/2);
                cg.fill(); cg.stroke();
                //cg.drawImage(debugImg, args[0], args[1]);
                break;
            case 'bus':
                cg.beginPath();
                cg.moveTo(0,0);
                cg.lineTo(sVars['bus']['size'][0]-4,0);
                cg.lineTo(sVars['bus']['size'][0],sVars['bus']['size'][1]/2);
                cg.lineTo(sVars['bus']['size'][0]-4,sVars['bus']['size'][1]);
                cg.lineTo(0,sVars['bus']['size'][1]);
                cg.lineTo(0,0);
                cg.fill(); cg.stroke();
                //cg.drawImage(debugImg, args[0], args[1]);
                break;
            case 'truck':
                cg.fillRect(0,0,sVars['truck']['size'][0],sVars['truck']['size'][1]);
                cg.fillStyle = "#000";
                cg.fillRect(2,2,sVars['truck']['size'][0]*.6,sVars['truck']['size'][1]-4);
                cg.strokeRect(0,0,sVars['truck']['size'][0],sVars['truck']['size'][1]);
                break;
            case 'wall':
                cg.fillRect(0,0,sVars['wall']['size'][0],sVars['wall']['size'][1]);
                break;
            case 'pointMarker':
                cg.lineWidth = 2;
                cg.strokeStyle = '#F00';
                cg.beginPath();
                cg.arc(0,0,objects[obj]['lifeRemaining']*20, 0, 360, false);
                cg.stroke();
                break;
            default:
        }
        cg.restore();
        //if (typeof objects[obj][2] != 'undefined') { cg.rotate(-objects[obj][2]); }
        //cg.translate(-tt[0], -tt[1]);
    }
    
    
    function assaultWindowMoved() {
        mVars['position'] = getElementPosition($('assaultModuleMain'));
        
        var tmp = [Number($('assaultModule').parentNode.style.width.substr(0,$('assaultModule').parentNode.style.width.length-2)),Number($('assaultModule').parentNode.style.height.substr(0,$('assaultModule').parentNode.style.height.length-2)),24];
        mVars['size'][0] = tmp[0]; mVars['size'][1] = tmp[1];
    }
    
    function addObject(sprite, x, y) {
        for (var l=0; l<objects.length; l++) { // Can be optimized to only cycle starting from last known (i.e. LOWEST) empty ID
            if (typeof objects[l] == 'undefined') { break; }
        }
        objects[l] = [];
        objects[l]['sprite'] = sprite;
        objects[l][0] = x;
        objects[l][1] = y;
        
        // Create event | Without direction objects will not be added to the grid
        if (sprite == 'pointMarker') {
            objects[l]['lifeRemaining'] = sVars[sprite]['life'];
        } else if (sprite == 'wall') {
            objects[l]['solid'] = true; // Gives collision
            objects[l][2] = 0;
        } else {
            if (sprite == 'tank') { objects[l]['life'] = [100,100]; objects[l]['range'] = 96; objects[l]['rps'] = 6; objects[l]['damage'] = 8; }
            if (sprite == 'bus') { objects[l]['life'] = [50,50]; }
            if (sprite == 'truck') { objects[l]['life'] = [50,75]; objects[l]['range'] = 24; objects[l]['rps'] = 1; objects[l]['damage'] = 10; }
            
            //if (sprite == 'wall') objects[l]['solid'] = true;
            objects[l][2] = 0; //Direction
            objects[l]['action'] = 'hold';
            //objects[l]['move'] = [];
            //objects[l]['build'] = [];
        }
        
        addObjectToGrid(l);
        //addObjectToGrid(l, x, y, sVars[sprite]['size'][0], sVars[sprite]['size'][1]);
        
        return l; //Return ID of object added
    }
    function addObjectToGrid(id, x, y, w, h) { // Add object to grid spaces
        if (typeof x == 'undefined') {
            var d = calculateDimensions(id);
            x=d[0];y=d[1];w=d[2];h=d[3];
        }
        for (var yy=Math.floor(y/gridSize); yy<=Math.floor((y+h-1)/gridSize); yy++) {
            for (var xx=Math.floor(x/gridSize); xx<=Math.floor((x+w-1)/gridSize); xx++) {
                if (typeof grid[xx] == "undefined") grid[xx] = []; // Create new columns if necessary
                if (typeof grid[xx][yy] == "undefined") grid[xx][yy] = []; // Create new grid position array
                grid[xx][yy][grid[xx][yy].length] = id;
            }
        }
    }
    function removeObject(id) {
        if (typeof id != 'object') id = [id]; else id = id.slice(0); // Allows removal of multiple objects. Copy array to make sure grid items aren't lost/ID array modified while iterating
        for (var i=0;i<id.length;i++) {
            removeObjectFromGrid(id[i]);
            delete objects[id[i]];
        }
    }
    function removeObjectFromGrid(id, x, y, w, h) { // Remove object from grid spaces
        if (typeof x == 'undefined') {
            var tmp = calculateDimensions(id);
            x=tmp[0]; y=tmp[1]; w=tmp[2]; h=tmp[3];
        }
        /*x = objects[id][0];
        if (typeof y == 'undefined') y = objects[id][1];
        if (typeof w == 'undefined') w = sVars[objects[id]['sprite']]['size'][0];
        if (typeof h == 'undefined') h = sVars[objects[id]['sprite']]['size'][1];*/
        
        for (var yy=Math.floor(y/gridSize); yy<=Math.floor((y+h-1)/gridSize); yy++) {
            for (var xx=Math.floor(x/gridSize); xx<=Math.floor((x+w-1)/gridSize); xx++) {
                if (typeof grid[xx] == "undefined") grid[xx] = []; // Create new columns if necessary
                if (typeof grid[xx][yy] == "undefined") grid[xx][yy] = []; // Create new grid position array
                if (grid[xx][yy].indexOf(id) != -1) {
                    grid[xx][yy].splice(grid[xx][yy].indexOf(id),1);
                } else { alert('Object '+id+' is not at ('+x+')'+xx+', ('+y+')'+yy); }
            }
        }
    }
    
    function calculateClearances() {
        for (var yy=0; yy<mVars['size'][1]/gridSize; yy++) {
            for (var xx=0; xx<mVars['size'][0]/gridSize; xx++) {
                // Find clearance
                var c = 0; var done = false;
                for (; c<=Math.min(mVars['size'][0]/gridSize-xx,mVars['size'][1]/gridSize-yy); c++) {
                    for (var iy=yy; iy<yy+c; iy++) {
                        for (var ix=xx; ix<xx+c; ix++) {
                            if (typeof grid[ix] == 'undefined' || typeof grid[ix][iy] == 'undefined') {
                                done=true; break;
                            }
                            if (grid[ix][iy].length) {
                                for (var i=0; i<grid[ix][iy].length; i++) {
                                    if (objects[grid[ix][iy][i]]['solid']) {
                                        done=true; break;
                                    }
                                }
                            }
                            if (done) break;
                        }
                        if (done) break;
                    }
                    if (done) break;
                }
                gridPath[xx][yy] = [false,0,undefined,0,c-1]; // Closed, F, G, H, clearance, parent
            }
        }
    }
    function drawClearances() {
        for (var yy=0; yy<mVars['size'][1]/gridSize; yy++) {
            for (var xx=0; xx<mVars['size'][0]/gridSize; xx++) {
                cg.fillStyle = 'rgba(255,255,0,0.5)';
                cg.fillText(gridPath[xx][yy][4], (xx+1)*gridSize-7, yy*gridSize+10);
            }
        }
    }
    function clearNodes() {
        for (var xx=0; xx<gridPath.length; xx++) {
            //if (typeof gridPath[xx] == 'undefined') { continue; }
            for (var yy=0; yy<gridPath[xx].length; yy++) {
                //if (typeof gridPath[xx][yy] == 'undefined') { continue; }
                gridPath[xx][yy] = [false,0,undefined,0,gridPath[xx][yy][4]];
            }
        }
    }
    function nearestAvailable(start, size) {
        for (var i=0; i<10; i++) {
                if (typeof gridPath[start[0]+i] != 'undefined' && typeof gridPath[start[0]+i][start[1]+i] != 'undefined') if (gridPath[start[0]+i][start[1]+i][4] >= size) { return [start[0]+i,start[1]+i]; } //SE
                
                if (typeof gridPath[start[0]+i] != 'undefined' && typeof gridPath[start[0]+i][start[1]] != 'undefined') if (gridPath[start[0]+i][start[1]][4] >= size) { return [start[0]+i,start[1]]; } //E
                if (typeof gridPath[start[0]] != 'undefined' && typeof gridPath[start[0]][start[1]+i] != 'undefined') if (gridPath[start[0]][start[1]+i][4] >= size) { return [start[0],start[1]+i]; } //S
                
                if (typeof gridPath[start[0]+i] != 'undefined' && typeof gridPath[start[0]+i][start[1]-i] != 'undefined') if (gridPath[start[0]+i][start[1]-i][4] >= size) { return [start[0]+i,start[1]-i]; } //NE
                if (typeof gridPath[start[0]-i] != 'undefined' && typeof gridPath[start[0]-i][start[1]+i] != 'undefined') if (gridPath[start[0]-i][start[1]+i][4] >= size) { return [start[0]-i,start[1]+i]; } //SW
                
                if (typeof gridPath[start[0]] != 'undefined' && typeof gridPath[start[0]][start[1]-i] != 'undefined') if (gridPath[start[0]][start[1]-i][4] >= size) { return [start[0],start[1]-i]; } //N
                if (typeof gridPath[start[0]-i] != 'undefined' && typeof gridPath[start[0]-i][start[1]] != 'undefined') if (gridPath[start[0]-i][start[1]][4] >= size) { return [start[0]-i,start[1]]; } //W
                
                if (typeof gridPath[start[0]-i] != 'undefined' && typeof gridPath[start[0]-i][start[1]-i] != 'undefined') if (gridPath[start[0]-i][start[1]-i][4] >= size) { return [start[0]-i,start[1]-i]; } //NW
        }
        return false;
    }
    function calculatePath(start, end, size, origin) { // Start [x,y], End [x,y], Size = max mass in pixels, Origin = offset default 0,0
        if (typeof size == 'undefined') { size = gridSize; }
        if (typeof origin == 'undefined') { origin = [0,0]; }
        
        start[0]-=origin[0]; start[1]-=origin[1];
        //end[0]-=origin[0]; end[1]-=origin[1];
        var s = [Math.floor(start[0]/gridSize),Math.floor(start[1]/gridSize)];
        var e = [Math.floor(end[0]/gridSize),Math.floor(end[1]/gridSize)];

        var impossible = false, useFirst = false;
        
        
        
        size /= gridSize; // Change size to grid relative size
        
        if (typeof gridPath[s[0]] == 'undefined' || typeof gridPath[s[0]][s[1]] == 'undefined' || gridPath[s[0]][s[1]][4] < size) {
            // Set start to closest available point
            s = nearestAvailable(s,size);
            //alert(s[0]+','+s[1]);
            if (!s) { return impossible; } // Object is hard stuck, no nearby open spaces found
            useFirst = true;
        }
        if (typeof gridPath[e[0]] == 'undefined' || typeof gridPath[e[0]][e[1]] == 'undefined' || gridPath[e[0]][e[1]][4] < size) {
            // Set start to closest available point
            e = nearestAvailable(e,size);
            end = [e[0]*gridSize+origin[0],e[1]*gridSize+origin[1]];
            //alert(s[0]+','+s[1]);
            if (!e) { return impossible; } // Object is hard stuck, no nearby open spaces found
            //useFirst = true;
        }
        
        //if (typeof gridPath[e[0]] == 'undefined' || typeof gridPath[e[0]][e[1]] == 'undefined') return impossible; // Return false if start/end outside gridPath boundaries
        //if (gridPath[e[0]][e[1]][4] < size) return impossible; // Return false if start/end blocke
        
        //Let's begin.
        clearNodes(); // Reset old gridPath node status
        var current = s, search = []; // Prepare search & current node
        gridPath[current[0]][current[1]][0] = false;// = [false,0,0,0,[skip],current]; // Closed, F, G, H, clearance, parent
        gridPath[current[0]][current[1]][1] = 0;
        gridPath[current[0]][current[1]][2] = 0;
        gridPath[current[0]][current[1]][3] = 0;
        gridPath[current[0]][current[1]][5] = current;
        
        var nodes = []; nodes[0] = [current[0],current[1]]; // Stack of usable nodes [x,y], start with one
        
        //var cc = 0;
        while (true) {
            /* // DEBUG DRAWING OF SEARCHED NODES
            if (!gridPath[current[0]][current[1]][0]) { // Node open
                cg.strokeStyle = 'rgba(0,255,0,0.4)';
                cg.strokeRect(current[0]*gridSize+2, current[1]*gridSize+2, gridSize-4, gridSize-4);
            } else { // Re-visiting a closed node ???
                cg.fillStyle = 'rgba(255,0,128,0.2)';
                cg.fillRect(current[0]*gridSize+2, current[1]*gridSize+2, gridSize-4, gridSize-4);
                //continue;
            } */
            
            try {
            gridPath[current[0]][current[1]][0] = true; // Close this
            } catch (ex) {
                alert(ex);
            }
            for (var i=0; i<nodes.length; i++) {// Remove the node from list of open nodes if found
                if (nodes[i][0] == current[0] && nodes[i][1] == current[1]) {
                    nodes.splice(i,1);
                }
            }
            //current[2] = false;
            /*
            if (nodes.indexOf(current) != -1) {
                nodes.splice(nodes.indexOf(current),1);
            } else {
                cg.fillStyle = 'rgba(255,255,0,0.1)';
                cg.font = '12px Courier New';
                cg.fillText('NF:'+current[0]+','+current[1], current[0]*gridSize, current[1]*gridSize);
            }*/
            
            
            
            var low = []; // [node,val]
            for (search[1]=current[1]-1;search[1]<=current[1]+1;search[1]++) {
                for (search[0]=current[0]-1;search[0]<=current[0]+1;search[0]++) {
                    /*if (gridPath[search[0]][search[1]][0]) {
                        if (search[0] == current[0]) {
                        cg.fillStyle = 'rgba(0,0,255,0.1)';
                        cg.font = '12px Courier New';
                        //cg.fillText(search[0]+','+search[1]+' =/= '+current[0]+','+current[1], current[0]*gridSize, current[1]*gridSize);
                        }
                    }*/
                    if (search == current || typeof gridPath[search[0]] == 'undefined' || typeof gridPath[search[0]][search[1]] == 'undefined' || gridPath[search[0]][search[1]][4] < size || gridPath[search[0]][search[1]][0]) {
                        continue;
                    }
                    
                    if (search[0]==current[0]||search[1]==current[1]) { var newg = gridSize; } else {
                        if (gridPath[search[0]][current[1]][4] < size || gridPath[current[0]][search[1]][4] < size) {
                            continue; // No cutting corners
                        }
                        var newg = gridSize*1.4142; // G Assigned move Diagonal?
                    }
                    
                    
                    //if (typeof gridPath[search[0]][search[1]][2] != 'undefined' && ) { continue; } // If our G is already low, leave it alone
                    if (typeof gridPath[current[0]][current[1]][2] != 'undefined') {
                        newg += gridPath[current[0]][current[1]][2];
                        //alert('umm');
                        //cg.fillStyle = '#FFF';
                        //cg.fillText(Math.floor(gridPath[current[0]][current[1]][2]) + 'to' + Math.floor(newg), search[0]*gridSize, search[1]*gridSize);
                        //if (gridPath[search[0]][search[1]][2] <= newg) { continue; }
                    }
                    if (!gridPath[search[0]][search[1]][0] && typeof gridPath[search[0]][search[1]][2] != 'undefined') {
                        if (newg < gridPath[search[0]][search[1]][2]) {
                            gridPath[search[0]][search[1]][2] = newg;
                            gridPath[search[0]][search[1]][5] = current;
                        }
                    } else {
                        gridPath[search[0]][search[1]][2] = newg;
                        gridPath[search[0]][search[1]][5] = current;
                    }
                    

                    gridPath[search[0]][search[1]][3] = Math.abs(e[0]-search[0])*gridSize+Math.abs(e[1]-search[1])*gridSize; // Heuristic
                    gridPath[search[0]][search[1]][1] = gridPath[search[0]][search[1]][2]+gridPath[search[0]][search[1]][3]; // Final
                    
                    //if (!low.length || low[1] > gridPath[search[0]][search[1]][1]) { low[0] = [search[0],search[1]]; low[1] = gridPath[search[0]][search[1]][1]; }
                    
                    //PATHFINDING DEBUG DRAWING
                    /*cg.strokeStyle = 'rgba(255,0,0,0.4)';
                    cg.fillStyle = 'rgba(255,255,255,1)';
                    cg.fillText(Math.floor(gridPath[search[0]][search[1]][1]), search[0]*gridSize+3, search[1]*gridSize+10); //Final
                    cg.fillText(Math.floor(gridPath[search[0]][search[1]][2]), search[0]*gridSize+3, (search[1]+1)*gridSize-5); // G Assigned
                    cg.fillText(Math.floor(gridPath[search[0]][search[1]][3]), (search[0]+1)*gridSize-16, (search[1]+1)*gridSize-5); // Heuristic
                    cg.strokeRect(search[0]*gridSize+1, search[1]*gridSize+1, gridSize-2, gridSize-2);
                    */
                    
                     //BLACK CLEARING & DIRECTIONAL LINES
                    /* cg.fillStyle = 'rgba(0,0,0,0.5)';
                    cg.fillRect(search[0]*gridSize+1, search[1]*gridSize+1, gridSize-2, gridSize-2);
                    
                    
                    cg.strokeStyle = 'rgba(0,0,255,0.8)';
                    cg.beginPath();
                    cg.arc(search[0]*gridSize+gridSize/2,search[1]*gridSize+gridSize/2,6,Math.PI*3/2,-Math.PI/2,false);
                    cg.moveTo(search[0]*gridSize+gridSize/2,search[1]*gridSize+gridSize/2);
                    cg.lineTo((search[0]+gridPath[search[0]][search[1]][5][0])/2*gridSize+gridSize/2,(search[1]+gridPath[search[0]][search[1]][5][1])/2*gridSize+gridSize/2);
                    cg.stroke();
                    */
                    
                    /*if (gridPath[search[0]][search[1]][0]) { // Adding an already closed node
                        cg.fillStyle = 'rgba(255,0,255,0.4)';
                        cg.fillRect(search[0]*gridSize+1, search[1]*gridSize+1, gridSize-2, gridSize-2);
                    }*/

                    //gridPath[search[0]][search[1]][5] = current;
                    //gridPath[search[0]][search[1]][2] = newg;
                    nodes[nodes.length] = [search[0],search[1],gridPath[search[0]][search[1]][1],current]; //x,y,final,parent
                }
            }
            
            if (current[0] == e[0] && current[1] == e[1]) { break; }
            
            
            for (var i=0; i<nodes.length; i++) {
                if (gridPath[nodes[i][0]][nodes[i][1]][0]) { // Ignore closed nodes
                    nodes.splice(i,1);
                    i--;
                } else {
                    if (!low.length || low[1] > nodes[i][2]) { low[0] = [nodes[i][0],nodes[i][1]]; low[1] = nodes[i][2] }
                }
            }
            if (!nodes.length) { impossible = true; break; }
            current = low[0];
            
            /*
            var low;
            for (var i=0; i<nodes.length; i++) {
                if (nodes[i][0] == next[0] && nodes[i][1] == next[1]) {
                    
                }
            }
            */
            
            
            //cc++;
            
            //if (!nodes.length) { impossible = true; break; }
        }
        
        var ret = [e]; var rthis = 1;
        while (ret[rthis-1] != s) {
            ret[rthis] = gridPath[ret[rthis-1][0]][ret[rthis-1][1]][5];
            
            if (typeof ret[rthis] == 'undefined') { ret.splice(rthis,1); break; } // Found node with no parent (final)
            rthis++;
        }
        ret.reverse();
        
        if (ret.length > 1 && !useFirst) ret.splice(0,1);
        if (ret.length < 2 && useFirst) { impossible = true; } // To prevent moving directly to endpoint
        ret[ret.length-1] = end;
        for (var i=0; i<ret.length-1; i++) {
            ret[i][0] = ret[i][0]*gridSize+origin[0]; ret[i][1] = ret[i][1]*gridSize+origin[1];
        }
        
        //if (typeof ret[0] == 'undefined') ret.splice(0,1);
        
        if (impossible) return impossible; // Return true if path attempted but no route found
        
        /* //Draw final path
        cg.save();
        cg.fillStyle = 'rgba(255,255,255,0.8)';
        cg.strokeStyle = 'rgba(0,255,0,0.5)';
        cg.fillText('S',(s[0]+0.4)*gridSize,(s[1]+0.7)*gridSize);
        cg.fillText('E',(e[0]+0.4)*gridSize,(e[1]+0.7)*gridSize);
        
        cg.lineCap = 'round';
        cg.lineWidth = 2;
        cg.strokeStyle = 'rgba(255,136,0,0.6)';
        cg.beginPath();
        cg.moveTo(ret[0][0]+gridSize/2,ret[0][1]+gridSize/2);
        for (var i=1; i<ret.length; i++) {
            cg.lineTo(ret[i][0]+gridSize/2,ret[i][1]+gridSize/2);
        }
        cg.stroke();
        
        size*=gridSize;
        cg.lineWidth = size;
        cg.strokeStyle = 'rgba(255,0,255,0.3)';
        cg.beginPath();
        cg.moveTo(ret[0][0]+size/2,ret[0][1]+size/2);
        for (var i=1; i<ret.length; i++) {
            cg.lineTo(ret[i][0]+size/2,ret[i][1]+size/2);
        }
        cg.stroke();
        cg.font = '14px Courier New';
        cg.fillStyle = '#FFF'; cg.lineWidth=1;
        cg.fillText(ret.length-1 + ' steps',ret[ret.length-1][0],ret[ret.length-1][1]);
        cg.fillText(ret.length-1 + ' steps',ret[ret.length-1][0],ret[ret.length-1][1]);
        
        
        cg.restore();
        */
        return ret;
    }
    function calculateDimensions(id) {
        if (typeof objects[id] != 'undefined') {
            //cg.fillText(id,50,50);
            //var p = [objects[id][0],objects[id][1],objects[id][0]+sVars[objects[id]['sprite']]['size'][0],objects[id][1]+sVars[objects[id]['sprite']]['size'][1]]; //x1,y1,x2,y2
            //var r = [-sVars[objects[id]['sprite']]['origin'][0],-sVars[objects[id]['sprite']]['origin'][1]]; r[2]=r[0]; r[3]=r[1];
            //p = arrayFastAdd(p,r);
            var r=[], p = [-sVars[objects[id]['sprite']]['origin'][0],-sVars[objects[id]['sprite']]['origin'][1],sVars[objects[id]['sprite']]['size'][0]-sVars[objects[id]['sprite']]['origin'][0],sVars[objects[id]['sprite']]['size'][1]-sVars[objects[id]['sprite']]['origin'][1]];
            if (typeof objects[id][2] != 'undefined') { // Rotate the 4 corners of the object (all objects boundaries rotated as rectangles)
                r[0] = (p[0]*Math.cos(objects[id][2])) - (p[1]*Math.sin(objects[id][2])); //Top left
                r[1] = (p[1]*Math.cos(objects[id][2])) + (p[0]*Math.sin(objects[id][2]));
                r[2] = (p[2]*Math.cos(objects[id][2])) - (p[1]*Math.sin(objects[id][2])); //Top right
                r[3] = (p[1]*Math.cos(objects[id][2])) + (p[2]*Math.sin(objects[id][2]));
                r[4] = (p[0]*Math.cos(objects[id][2])) - (p[3]*Math.sin(objects[id][2])); //Bottom left
                r[5] = (p[3]*Math.cos(objects[id][2])) + (p[0]*Math.sin(objects[id][2]));
                r[6] = (p[2]*Math.cos(objects[id][2])) - (p[3]*Math.sin(objects[id][2])); //Bottom right
                r[7] = (p[3]*Math.cos(objects[id][2])) + (p[2]*Math.sin(objects[id][2]));
            }
            p = [objects[id][0],objects[id][1]]; p[2]=p[4]=p[6]=p[0]; p[3]=p[5]=p[7]=p[1];
            r = arrayFastAdd(p,r);
            //p = [-sVars[objects[id]['sprite']]['origin'][0],-sVars[objects[id]['sprite']]['origin'][1]]; r[2]=r[0]; r[3]=r[1]
            p = []; // Find actual top left & bottom right corners
            for (var i=0;i<8;i++) {
                if (i%2) {
                    if (r[i] < p[1] || typeof p[1] == 'undefined') { p[1] = r[i]; }
                    if (r[i] > p[3] || typeof p[3] == 'undefined') { p[3] = r[i]; }
                } else {
                    if (r[i] < p[0] || typeof p[0] == 'undefined') { p[0] = r[i]; }
                    if (r[i] > p[2] || typeof p[2] == 'undefined') { p[2] = r[i]; }
                }
            }
            p[2] -= p[0]; p[3] -= p[1]; // Convert x1,y1,x2,y2 to x,y,w,h
            return p;
        } else return false;
    }
} // End namespace

//Prepare module to be fired
document.addEventListener("readyEvent", cVars['assaultModule']['$'].load, false);