cVars['chatModule']['$'] = new function() {
    this.load = function() {
        if (!$('chatModule')) { return false; } // Exit if chatModule is not found
        
        $('chatModule').parentNode.addEventListener("conAdjustingEvent", chatWindowMoved, false);
        $('chatModule').parentNode.addEventListener("conAdjustedEvent", chatWindowMoved, false);
        
        $('chatInput').onkeydown = function(e) {
            if (typeof event != "undefined") { e = event; }
            if (e.keyCode == 13) {
                if (e.shiftKey) {
                    $('chatInput').value += String.fromCharCode(10); // For newlines later w/ textarea only
                } else {
                    sendMessage();
                }
            }
        }
        $('chatSend').onclick = function() {
            sendMessage();
        }
        $('chatName').onkeydown = function(e) {
            if (typeof event != "undefined") { e = event; }
            if (e.keyCode==13) chatConnect();
        }
        $('chatConnect').onclick = function() {
            chatConnect();
        }
        $('chatDisconnect').onclick = function() {
            Server.disconnect();
            $('chatDisconnected').style.display="block";
            $('chatConnected').style.display="none";
            if (cVars['chatMin']) {
                chatMinimize(false);
            }
        }
        $('chatBtnMin').onclick = function() {
            chatMinimize();
        }
        $('chatBtn').onclick = function() {
            chatMinimize(false);
        }
        
        function sendMessage() {
            var msg = $('chatInput');
            if (msg.value) {
                if (msg.value.substring(0,1) == '/') {
                    if (msg.value.substring(1,6) == 'clear') { // User clears chat
                        $('chatArea').innerHTML = '';
                        if (msg.value.substring(6,11) == ' draw') // attempt to clear draw also
                            if (isModuleLoaded('drawModule')) drawClear();
                    } else {
                        send( msg.value );
                    }
                } else {
                    log( htmlentities(cVars['name'] + ': ' + msg.value,"ENT_NOQUOTES"), 'clientMsg' );
                    send( 'M' + msg.value );
                }
                msg.value = "";
            }
        }
    }
    
    function chatWindowMoved() {
        
    }
    
    // ########################### ADDITIONAL FUNCTIONS #########################################
    
    function log(text, type, nonewline) {
        
        text = text.replace(/([^\x20-\x7E])+/g, ""); // Only allow strict set of ASCII characters to be logged
        //text = text.replace(/[0-9a-zA-Z]+/g, "");
        
        $log = $('chatArea');
        if (typeof type == "undefined") { $log.innerHTML += text+"<br>"; }
        else { $log.innerHTML += '<span class="'+type+'">'+text+'</span>' + ((!nonewline)?'<br>':''); }
        $log.scrollTop = $log.scrollHeight - $log.clientHeight; // Auto scroll
    }
    
    send = this.send = function(text) {
        if (text == undefined) { text = ''; }
        if (cVars['simulatedLag'] > 0) {
            setTimeout(function() { Server.send( 'message', text ); },cVars['simulatedLag']);
        } else {
            Server.send( 'message', text );
        }
    }
    
    function chatConnect() {
        $('chatDisconnected').style.display="none";
        $('chatConnected').style.display="block";
        $('chatInput').focus();
        
        log('Connecting...','clientNote');
        //Server = new CustomWebsocket('ws://192.155.95.165:8399'); //Dhafra
        //Server = new CustomWebsocket('ws://127.0.0.1:8399'); //Local
        //Server = new CustomWebsocket('ws://69.174.53.19:8399'); //InMotion VPS
        //Server = new CustomWebsocket('ws://68.97.98.186:8399'); //Dorms
        //Server = new CustomWebsocket('ws://72.198.35.7:8399'); //Ron
        //Server = new CustomWebsocket('ws://server.hovel.me:8399'); //Townley | Dynamic if server is updated
        Server = new CustomWebsocket('ws://68.225.164.169:8399'); // Townley
        
        //sndWelcome.play();
        
        Server.bind('close', function( data ) { // We've disconnected
                log('Disconnected.<div width="100%" style="height:1px;background:#FFF;"></div>','clientWarning',1);
                cVars['connected'] = false;
                //Server.disconnect();
        });
    
        Server.bind('message', function( rcvd ) { // Received something from the server
            if (typeof rcvd == 'object') { return false; }
            
            var msg = rcvd.substr(1);
            var msgCount = Number($('chatBtn').innerHTML);
            switch (rcvd.substr(0,1)) {
                case 'M':
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
                    break;
                case '/': // Server sets variable
                    tmp = msg.split(' ');
                    cVars[tmp[0]] = msg.substr(msg.indexOf(' ')+1); // Server requested we set a variable
                    log ('<span class="serverNote">Your '+tmp[0]+' is now '+msg.substr(msg.indexOf(' ')+1)+'.</span>');
                    break;
                case '$': // Server special command
                    tmp = msg.split(' ');
                    if (isModuleLoaded('drawModule')) {
                        send('');
                        tmp[1] = Number(tmp[1]);
                        if (typeof cVars[tmp[1]] == 'undefined') cVars[tmp[1]] = new Array();
                        if (tmp[0] == 'd') { // Draw move
                            cVars['drawModule']['$'].drawOtherMouse(tmp[1],[tmp[2],tmp[3]]); // array(ClientID,x,y)
                            cVars[tmp[1]]['lastDraw'] = [tmp[2],tmp[3]];
                            cVars[tmp[1]]['mouseDown'] = true;
                        } else if (tmp[0] == 'd0') { // Draw stop
                            cVars[tmp[1]]['lastDraw'] = undefined;
                            cVars[tmp[1]]['mouseDown'] = false;
                        } else if (tmp[0] == 'dl') { // Draw SET last position
                            cVars[tmp[1]]['lastDraw'] = [tmp[2],tmp[3]];
                        }
                    }
                    break;
                default:
                    log("[CAUTION] INCORRECTLY FORMATTED SERVER MSG: "+msg);
                    break;
            }
            if (msgCount==0) { msgCount = ''; }
            $('chatBtn').innerHTML = msgCount;
        });
        
        Server.bind('open', function() { //We've connected
                log('Connected.','clientNote');
                cVars['connected'] = true;
                cVars['name'] = $('chatName').value;
                send('/name ' + cVars['name']);
        });
    
        Server.connect();
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

//Chat & client specific functions
document.addEventListener("readyEvent", cVars['chatModule']['$'].load, false);