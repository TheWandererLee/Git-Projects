<?php
session_start(); $_SESSION['loggedin'] = true; // DEBUG ALL ACCESS

if (@$_POST['password'] == 'AW581819') {
    $_SESSION['loggedin'] = true;
} else {
    if ($_SESSION['loggedin'] !== true) {
        header("Location: http://server.hovel.me:8350/hovelme/?page=experiment");
        exit();
    }
}

if (@$_GET['phpinfo'] == 'yes') { phpinfo(); exit(); }

function runServer() { 
	$WshShell = new COM("WScript.Shell");
	
	if (!file_exists('server.cmd')) {
		fwrite(fopen('server.cmd', 'w'), 'start C:\xampp\php\php.exe '.getcwd().'\\server.php');
	}
	
	$WshShell->Run(getcwd().'\\server.cmd', 7, false);
}

if (PHP_SAPI != 'cli') {
	if (@$_POST['server'] == 'run') { runServer(); }
        //DEBUG ALL ACCESS //elseif (@$_POST['server'] == 'logout') { session_destroy(); header("Location: http://server.hovel.me:8350/hovelme/?page=experiment"); exit(); }
        
	echo '<!DOCTYPE html><html lang="en-US"><head><title>#### HovelMe Server Backend ####</title>';
?>
        <style type="text/css">
            body { background: #CCC; margin: 16px 0; }
            
            #log { width: 608px; height: 320px; background: #000; color: #FFF; font-family: Courier New, monospace; font-size: 11px;
                    overflow-x: hidden; overflow-y: scroll; float: left; }
            #log .ts { color: #999; }
            
            #display { width: 384px; height: 240px; background: #000; }
            #displayLog { font-family: Courier New, monospace; font-size: 12px; width: 384px; height: 96px; background: #000; }
            
            #data { font-family: Courier New, monospace; font-size: 11px; width: 310px; height: 320px; background: #000;
                    overflow-x: hidden; overflow-y: scroll; }
            
            .clear { clear: both; }
            .left { float: left; }
            
            .console { margin: 8px 8px; background: #666; color: #CCC; float: left; outline: 1px solid #F00; }
            .console input { background: #000; color: #0F0; border: 1px solid #0F0; }
            .console #kill { color: #FFF; background: #F00; border: 1px dotted #FFF; }
            .console #start { color: #FFF; background: #00F; border: 1px dotted #FFF; }
        </style>
        <script type="text/javascript">
            var Server, connected=false, cg, fps, realFps, debugStepDirection=0;
            var sVars = new Array();
            
            var cgScale = 0.5;
            
            var startTime = new Date().getTime(), time=0;
            
            window.onload = function() {
                if (window.Blob) { log('Browser supports blob.'); } // ALL
                if (window.FileReader) { log('Browser supports FileReader.'); } // Chrome/Firefox/Opera
                if (window.DataView) { log('Browser supports DataView.'); } // Chrome/Opera/Safari
                if (window.ArrayBuffer) { log('Browser supports ArrayBuffer.'); } //ALL
                if (window.Int32Array) { log('Browser supports INT32Array.'); } //ALL
                /*NOTES
                 *
                 *SAFARI doesn't support FileReader, can't decode data messages at all.
                 *All Hixie-76 browsers garble packets when the string contains a termination? character, because they receive all
                 *messages as strings instead of blobs
                 */
                
                loadCanvas();
            }
            
            /************************* CANVAS DRAW FUNCTIONS *****************************/
            function loadCanvas() {
                cg = document.getElementById('display').getContext('2d');
                
                cg.scale(cgScale, cgScale);
                clearCanvas();
                
                cg.font = "18px Verdana";
                cg.translate(0.5,0.5);
                
                fpsCounter = setInterval(function() { realFps = undefined; }, 1000);
                
                step();
            }
            
            function clearCanvas() {
                cg.clearRect(0,0,384,240);
            }
            
            function step() {
                delta = time;
                time = new Date().getTime()-startTime;
                delta = (time-delta) * 0.001;
                fps++;
                if (typeof realFps == 'undefined') { realFps = fps; fps = 0; }
                
                
                clearCanvas();
                
                drawFps();
                
                
                
                requestAnimFrame(step);
            }
            
            function drawFps() {
                debugStepDirection += 180*delta;
                
                //Draw FPS & Debug info
                cg.fillStyle = "rgba(0,0,0,0.5)";
                cg.fillRect(0,0,128,64);
                cg.fillStyle = "rgba(0,255,0,1)";
                cg.fillText("FPS: "+(!realFps?0:realFps)+" | "+(time%1000), 2, 18);
        
                cg.strokeStyle = "rgba(255,0,0,0.8)";
                cg.lineWidth = 3;
                cg.beginPath();
                cg.moveTo(64,64);
                cg.lineTo(64+Math.cos(debugStepDirection*Math.PI/180)*64,64-Math.abs(Math.sin(debugStepDirection*Math.PI/180))*64);
                cg.stroke();
            }
            /************************* END CANVAS DRAW FUNCTIONS *****************************/
            
            function log(val,loc) {
                if (typeof loc == 'undefined') loc = 'log';
                var tmp = new Date();
                var tmp = [tmp.getHours(),tmp.getMinutes(),tmp.getSeconds(),tmp.getMilliseconds()];
                for (var i=0;i<=3;i++) {
                    if (String(tmp[i]).length < 2) { tmp[i] = '0'+String(tmp[i]); }
                    if (i==3) {
                        for (var j=1;j<=3;j++) {
                            if (String(tmp[i]).length<j) { tmp[i] = '0'+String(tmp[i]); }
                        }
                    }
                }
                $(loc).innerHTML += '<span class="ts">[' + tmp[0] + ':' + tmp[1] + ':' + tmp[2] + '.' + tmp[3] + ']</span> ' + val + '<br>';
                $(loc).scrollTop = $(loc).scrollHeight - $(loc).clientHeight;
                
                if ($(loc).innerHTML.length > 10000) { $(loc).innerHTML = $(loc).innerHTML.substr($(loc).innerHTML.length-10000); }
            }
            function dlog(val) { log(val,'data'); }
            
            function connect() {
                log("Attempting Connect");
                if ($('cboxLocal').checked) {
                //Server = new CustomWebSocket('ws://server.hovel.me:8399'); // Dynamic to Localhost [Ports 8350-8399 must be forwarded. Server IP must be set]
		    //Server = new CustomWebSocket('ws://72.198.35.7:8399');
                } else {
		    //Server = new CustomWebSocket('ws://69.174.53.19:8399'); // InMotion VPS
                }
                //Server = new CustomWebSocket('ws://192.155.95.165:8399'); // Dhafra
		//Server = new CustomWebSocket('ws://127.0.0.1:8399'); // Local
		Server = new CustomWebSocket('ws://68.225.161.227:8399'); // Townley
                
                Server.bind('open', function() {
                    log('Connected.');
                    $('connect').disabled = connected = true;
                    $('connect').style.color = '#030';
                    $('connect').style.background = '#999';
                    log('&gt;TERMINAL : Requesting terminal rights...');
                    Server.send('>TERMINAL'); // Request terminal access & omniscience
                });
                Server.bind('close', function(data) {
                    log('Disconnected.');
                    $('connect').disabled = connected = false;
                    $('connect').style.color = '#0F0';
                    $('connect').style.background = '#000';
                });
                Server.bind('message', function(msg) {
		    //Server.send(''); // Send back blank to attempt nagle's fix
                    if (typeof msg == 'object') { // Convert back to string for browsers able to receive blobs (Chrome/Firefox)
                        var dataReader = new FileReader();
                        dataReader.onload = function(e) {
                            var tmp='';
                            var t2 = new Uint8Array(e.target.result);
                            for (var i=0;i<msg.size;i++) {
                                tmp+=String.fromCharCode(t2[i]);
                            }
                        
                            processMessage(tmp);
                            //log('Converted blob to string ['+newmsg+']');
                        }
                        dataReader.readAsArrayBuffer(msg);
                    } else {
                        processMessage(msg);
                    }
                });
                
                function processMessage(msg) { // Input BETTER be a String
                    
                    var tmpBuffer = new ArrayBuffer(msg.length);
                    var bytes = new Uint8Array(tmpBuffer);
                    for (var i=0;i<msg.length;i++) {
                        bytes[i] = msg.charCodeAt(i);
                    }
                    
                    if (msg.substr(0,1) == '~') {
                        bStart:
                        for (i=1;i<msg.length;) {
                            i++;
                            switch (msg.substr(i-1,1)) {
                                case 'i': //Unsigned 16 - Ticks per second
                                    //tmp = new Uint16Array(tmpBuffer,i,1);
                                    var tmp = readUint16(bytes,i);
                                    sVars['iterations'] = tmp;
                                    //dlog('Iterations per second:'+tmp);
                                    i+=2; break;
                                case 'T': //String8 - Server time
                                    //var tmp
                                    
                                    dlog('Server time:'+msg.substr(i,8)); i+=8; break;
                                case 'p': //Unsigned16 - Time since last net push
                                    var tmp = readUint16(bytes,i);
                                    sVars['lastPush'] = tmp;
                                    //dlog('Last net push:'+tmp);
                                    i+=2; break;
                                case 'x': //Unsigned32 - Ticks since server start
                                    var tmp = readUint32(bytes,i);
                                    sVars['serverTicks'] = tmp;
                                    //dlog('Server ticks:'+tmp);
                                    i+=4; break;
                                case 'P': //Unsigned8 - Current packet number (within 1 second)
                                    var tmp = bytes[i];
                                    sVars['currentPacket'] = tmp;
                                    //dlog('Current Packet:'+tmp);
                                    i+=1; break;
                                default:
                                    dlog('UNKNOWN DATA HEADER ['+msg.substr(i-1,1)+']'); break bStart;
                            }
                        }
                        
                        $('displayLog').innerHTML =
                        'Iterations since last push: '+sVars['iterations']+
                        '<br>Milliseconds since last push: '+sVars['lastPush']+
                        '<br>Server Ticks: '+sVars['serverTicks']+
                        '<br>Current Packet: '+sVars['currentPacket'];
                        
                    } else {
                        log('Received message: <i>['+msg.substr(0,1)+']</i>'+msg.substr(1));
                    }
                    
                }
                
                Server.connect();
            }
            function disconnect() {
                Server.disconnect();
            }

            function ping() {
                if (connected) {
                    log('&gt;PING : Pinging server...');
                    Server.send('>PING');
                } else { log('YOU MUST BE CONNECTED'); }
            }
            function kill() {
                if (connected) {
                    log('&gt;KILL : Killing server...');
                    Server.send('>KILL');
                } else { log('YOU MUST BE CONNECTED'); }
            }
            function sendCommandLine() {
                if (connected) {
                    log($('commandLine').value + ' : Custom command');
                    Server.send($('commandLine').value);
                } else { log('YOU MUST BE CONNECTED'); }
            }
            function viewGame() {
                log('&gt;GAME0 : Requesting game datastream');
                Server.send('>GAME0');
            }
            function stopView() {
                log('&gt;NOGAME : Terminating game datastream');
                Server.send('>NOGAME');
            }
            
            function readUint16(arr, pos) { return arr[pos]*256+arr[pos+1]; }
            function readUint32(arr, pos) { return arr[pos]*16777216+arr[pos+1]*65536+arr[pos+2]*256+arr[pos+3]; }
            
            var CustomWebSocket = function(url) {
                    var callbacks = {};
                    var ws_url = url;
                    var conn;
            
                    this.bind = function(event_name, callback){
                            callbacks[event_name] = callbacks[event_name] || [];
                            callbacks[event_name].push(callback);
                            return this;// chainable
                    };
            
                    this.send = function(event_name, event_data){
                            if (arguments.length == 1) { this.conn.send(arguments[0]) } else {
                                this.conn.send( event_data );
                            }
                            return this;
                    };
                    
                    this.connect = function() {
                            if ( typeof(MozWebSocket) == 'function' )
                                    this.conn = new MozWebSocket(url);
                            else
                                    this.conn = new WebSocket(url);
            
                            // dispatch to the right handlers
                            this.conn.onmessage = function(evt){
                                //log('M','data');
                                dispatch('message', evt.data);
                                Server.send(''); // Send 6 bytes of empty BULL back so our socket will keep processing (nagles fix?)
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
            
            ////////////////////// REPEAT OF FUNCTIONS FOUND IN MAIN.JS /////////////////
            function $(e) {
                return document.getElementById(e);
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
            //////////////////////////////////////////////////////////////////////////////
        </script>
<?php
        echo '</head><body>';
	
        echo '<form id="serverForm" method="post"><input type="hidden" name="password" value="AW581819"><input type="hidden" id="serverPost" name="server">';
	//echo '<input type="submit" onclick="document.getElementById(\'serverPost\').value = \'run\';" value="Start Server">';
        //echo '<input type="button" onclick="runServer();" value="Start Server">';
	echo '<input type="submit" onclick="document.getElementById(\'serverPost\').value = \'logout\';" value="Logout">';
        echo '<input type="checkbox" id="cboxLocal">Local';
        //echo `cmd server.php`;
	//system('server.php');
        //echo '<br><br><input type="button" value="Refresh Options" onclick="location.reload(true);"' . (@$_POST['server'] == 'run'?'':' disabled') . '>';
        echo '<br ><input id="newURL" type="text" value="http://hovel.me:8350/hovelme/?page=me" size="60"><input type="button" value="Go Here" onclick="window.location=document.getElementById(\'newURL\').value">';
        echo '</form>';
	echo 'Current Working Directory: ' . getcwd();
?>
        
        <div class="console">
            <div class="left" style="width: 608px;">
                <div class="clear">
                    <div id="log">
                    
                    </div>
                </div>
                <div class="clear">
                    <input type="button" id="connect" value="Connect" onclick="connect()">
                    <input type="button" value="Disconnect" onclick="disconnect()">
                    <input type="button" value="Ping" onclick="ping()">
                        
                    <input type="button" id="start" value="START SERVER" onclick="$('serverPost').value='run';$('serverForm').submit();" title="If this is not working add line 'extension=php_com_dotnet.dll' to php.ini">
                    <input type="button" id="kill" value="KILL SERVER" onclick="kill()">
                    <input type="text" id="commandLine" value=">"><input type="button" value="SEND" onclick="sendCommandLine()">
                        
                </div>
            </div>
            <div class="left" style="width: 384px;">
                <div class="clear">
                    <canvas id="display" width="384" height="240">
                        
                    </canvas>
                </div>
                <div class="clear">
                    <div id="displayLog">
                        Connect -> View Game
                    </div>
                </div>
                <div class="clear">
                    <input type="button" value="View Game" onclick="viewGame()"><input type="button" value="Stop Viewing" onclick="stopView()">
                </div>
            </div>
            <div class="left" style="width: 310px;">
                DATASTREAM
                <div id="data">
                    
                </div>
                <input type="button" value="Clear" onclick="$('data').innerHTML=''">
            </div>
        </div>
<?php
	echo '</body></html>';
}
?>