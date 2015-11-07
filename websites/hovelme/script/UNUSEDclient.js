//Chat & Client specific functions
var Server; var awaitingLoad = true;

var cVars = new Array();

// name: User nickname
// hixie76: True is user is using legacy Hixie-76 WebSocket. Needed for safe disconnect & other functions
try {
    var sndBloop = new Audio("sound/bloop.wav");
    var sndWelcome = new Audio("sound/welcome.wav");
} catch(e) {
    // Browser does not support HTML5 Audio
}

function $(val) {
    return document.getElementById(val);
}

// ########################### ADDITIONAL FUNCTIONS #########################################

//jQuery Simulated ReadyState
if ( document.addEventListener ) {
    // Use the handy event callback
    document.addEventListener( "DOMContentLoaded", function(){
	    document.removeEventListener( "DOMContentLoaded", arguments.callee, false );
	    documentReady();
    }, false );
}
else if ( document.attachEvent ) {
    // ensure firing before onload,
    // maybe late but safe also for iframes
    document.attachEvent("onreadystatechange", function(){
	    if ( document.readyState === "complete" ) {
		    document.detachEvent( "onreadystatechange", arguments.callee );
		    documentReady();
	    }
    });
} else {
    window.onload = function() { documentReady(); };
}

function htmlentities(input){
    var re=/[<>&]/g;
    return input.replace(re, function(m){return replacechar(m)});
}
function replacechar(match){
 if (match=="<")
  return "&lt;"
 else if (match==">")
  return "&gt;"
 else if (match=="&")
  return "&amp;"
}

function isModuleLoaded(module) {
    return document.getElementById(module) != null; // Modules MUST have at least one element with the module ID
}

function documentReady() {
	if (awaitingLoad) { awaitingLoad = false; }
	else { return; }
	
	if (isModuleLoaded('chatModule')) {
	    function chatMinimize(min) {
		if (typeof min == 'undefined') min = true;
		$('chatArea').style.display = (min)?"none":"block";
		$('chatModule').style.top = (min)?"616px":"320px";
		$('chatModule').style.height = (min)?"24px":"320px";
		$('chatBtnMin').style.display = (min)?"none":"block";
		$('chatBtn').style.display = (min)?"block":"none";
		$('chatBtn').innerHTML = '';
		cVars['chatMin'] = min;
	    }
	    $('chatInput').onkeydown = function(e) {
		    if ( e.keyCode == 13) {
			sendMessage();
		    }
	    };
	    $('chatSend').onclick = function() {
		sendMessage();
	    }
	    $('chatConnect').onclick = function() {
		$('chatDisconnected').style.display="none";
		$('chatConnected').style.display="block";
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
		    if (msg.value.substring(0,1) != '/') {
			log( htmlentities(cVars['name'] + ': ' + msg.value,"ENT_NOQUOTES"), 'clientMsg' );
			send( 'M' + msg.value );
		    } else {
			if (msg.value.substring(1,6) == 'clear') {
			    $('chatArea').innerHTML = '';
			} else {
			    send( msg.value );
			}
		    }
		    msg.value = "";
		}
	    }
	}
	
	if (isModuleLoaded('drawModule')) {
	    loadDraw();
	}
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

function send( text ) {
    if (text == undefined) { text = ''; }
    Server.send( 'message', text );
}

function chatConnect() {
    log('Connecting...','clientNote');
    Server = new CustomWebsocket('ws://68.97.98.186:8399');
    
    //sndWelcome.play();
    
    Server.bind('close', function( data ) { // We've disconnected
	    log('Disconnected.<div width="100%" style="height:1px;background:#FFF;"></div>','clientWarning',1);
	    cVars['connected'] = false;
	    //Server.disconnect();
    });

    Server.bind('message', function( rcvd ) { // Received something from the server
	var msg = rcvd.substring(1);
	var msgCount = Number($('chatBtn').innerHTML)+1;
	switch (rcvd.substring(0,1)) {
	    case 'M':
		log( msg );
		//sndBloop.play();
		break;
	    case 'C':
		document.body.style.backgroundColor = '#'+msg;
		break;
	    case 'S':
		log ('<span class="serverWarning">'+msg+'</span>');
		break;
	    case 's':
		log ('<span class="serverNote">'+msg+'</span>');
		break;
	    case '/': // Server sets variable
		msgCount--;
		tmp = msg.split(' ');
		cVars[tmp[0]] = msg.substring(msg.indexOf(' ')+1); // Server requested we set a variable
		log ('<span class="serverNote">Your '+tmp[0]+' is now '+msg.substring(msg.indexOf(' ')+1)+'.</span>');
		break;
	    case '$': // Server special command
		tmp = msg.split(' ');
		if (tmp[0] == 'm') {
		    drawOtherMouse([tmp[1],tmp[2]]);
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