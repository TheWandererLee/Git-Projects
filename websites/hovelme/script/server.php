<?php
// prevent the server from timing out
set_time_limit(0);

if (PHP_SAPI != 'cli') {
	echo '<!DOCTYPE html><html lang="en-US"><head></head><title>Error</title><body>';
	echo 'Error: Cannot run server from browser';
	echo '</body></html>';
	exit();
}

// include the web sockets server script (the server is started at the far bottom of this file)
require 'class.PHPWebSocket.php';

require 'rigorMortis/rmServer.php';

// Server command list
// M: Message
// s: Server note. S: Server warning.
// >: Direct terminal command
// ~: Raw data
// /: Client specific functions
// $VAR=VALUE: Set client specific variable. $$VAR=VALUE: Set server global variable

// when data is received from the client
function wsOnMessage($clientID, $message, $messageLength, $binary) {
    if ($message == '') { return; } // Just stop now if client sends us a null message
    
	global $Server, $cVars, $sVars, $rmtick, $rm, $rmBuffer;
	
	$ip = long2ip( $Server->wsClients[$clientID][6] );

	// Client requests disconnect
	//if ($messageLength == 0) { $Server->wsClose($clientID); return; } // RFC6455
	//elseif ($message == chr(0).chr(255)) { $Server->wsClose($clientID); return; } // Hixie-76

	$command = explode(" ",substr($message,1));
        //if (strpos($message," ") === false) $command = array($message);
        
	if ($message[0] == '>') { // Terminal functions
            if (isset($cVars[$clientID]['rights']) && $cVars[$clientID]['rights'] > 0) {
                switch($command[0]) {
                    case 'TERMINAL':
                        send('sFull terminal rights already granted.',$clientID);
                        break;
                    case 'PING': // RETURN PING
                        send('sPONG', $clientID);
                        break;
                    case 'KILL':
                        send('SServer Terminated by '.$clientID);
                        exit(0);
                        break;
                    case 'GAME0':
                        if (isset($sVars['observing'])) {
                            $sVars['observing'][] = $clientID;
                        } else {
                            $sVars['observing'] = array($clientID);
                        }
                        send('sYou are now observing GAME0', $clientID);
                        break;
                    case 'NOGAME':
                        if (in_array($clientID, $sVars['observing'])) {
                            if (count($sVars['observing']) == 1) {
                                unset($sVars['observing']);
                            } else {
                                array_splice($sVars['observing'], array_search($clientID, $sVars['observing']));
                            }
                        }
                        break;
                    default:
                        send("SUnrecognized terminal command.",$clientID);
                }
            } else {
                if ($command[0] == 'TERMINAL') { //USER REQUESTS TERMINAL ACCESS
                    $cVars[$clientID]['rights'] = 10; // Full rights
                    send('sFULL TERMINAL RIGHTS GRANTED',$clientID);
                    
                    $ip = long2ip( $Server->wsClients[$clientID][6] );
                    addlog("\033[1;37;43mFULL TERMINAL RIGHTS GRANTED TO CLIENT ".$clientID." [$ip]\033[m");
                }
            }
        } elseif ($message[0] == '~') {
            /*$longstr = '';
            for ($i=0;$i<strlen($message);$i++) {
                $longstr .= ord($message[$i]).'-';
            }
            addlog('RECEIVED (BINARY?'.$binary.') LENGTH:'.strlen($message).' ['.$message.'] | '.$longstr);
            */
            
            $longstr = '';
            for ($i=1;$i<strlen($message);) { // Buffer actions R (game request)
                $i++;
                switch (substr($message, $i-1, 1)) {
                    case chr(0):
                        $tmp = fromUint28(substr($message,$i,4)); $i+=4;
                        $longstr .= 'MovementALLSTOP@'.$tmp;
                        
                        $rmBuffer[$clientID][] = array(chr(0),$tmp);
                        break;
					case '=': // Pong
						if (isset($rm['p'][$clientID]['ping'])) { // Check if ping was sent
							/*$oldLerp = $rm['p'][$clientID]['lerp'];
							for ($j=0;$j<count($rmBuffer[$clientID]);$j++) {
								$rmBuffer[$clientID][$j][1] -= $oldLerp-$rm['p'][$clientID]['lerp']; // Adjust all buffers for this player for new lerp
							}
							addlog("Clients actual ping: ".$rm['p'][$clientID]['lerp']);
							$rmBuffer[$clientID] = array();
							$rmBuffer[$clientID][] = array('=',0);
							*/
							
							$tmp = $rmtick - $rm['p'][$clientID]['ping'];
							$rm['p'][$clientID]['lerp'] = $tmp + (1000/$rm['netFrequency']); // Set the lerp to the ping + 1 net tick
							unset($rm['p'][$clientID]['ping']);
						} // Else a ping was never sent
						break;
                    case '-':
                        $tmp = fromUint28(substr($message,$i,4)); $i+=4;
						$longstr .= 'KeepAlivePing@'.$tmp;
                        $rmBuffer[$clientID][] = array('=',$tmp); // Store action, time
                        break;
                    case 'R': // Initial game request: load client into game
                        $rmBuffer[$clientID] = array();
                        $rmBuffer[$clientID][0] = array('=',0);
                        
                        if (!isset($rm['p'][$clientID])) { // Only because data is not actually loaded yet, rather it is pre-stored
                            $rm['p'][$clientID][0] = 192; $rm['p'][$clientID][1] = 320;
                            $rm['p'][$clientID][2] = 0; $rm['p'][$clientID][3] = 0;
                        }
                        
                        $rm['p'][$clientID]['game'] = fromUint7(substr($message,$i,1)); $i++;
                        $rm['gameRunning'][$rm['p'][$clientID]['game']] = true;
                        
                        //$rm['p'][$clientID]['syncDelay'] = $rmtick-fromUint28(substr($message,$i,4)); // Client's time behind the server
						$i+=4;
						
                        $i+=1; $rm['p'][$clientID]['lerp'] = fromUint14(substr($message,$i,2)); $i+=2; // Client's lerp (replayDelay)
                        addlog("Client $clientID suggests lerp: ".$rm['p'][$clientID]['lerp']." - from bytes: ".ord(substr($message,$i-2,1))." ".ord(substr($message,$i-1,1)));
						
                        $rm['p'][$clientID]['keyv'] = array(0,0); // Vector of keys pressed
                        $rm['p'][$clientID]['keyb'] = array(); // Buffer of keys pressed
                        
                        $rm['p'][$clientID]['speed'] = 128; // Default speed
                        $rm['p'][$clientID]['size'] = array(32,32); // Default size of player
						
                        $longstr .= 'Game entry request (Net sync):'.$rm['p'][$clientID]['game'];
                        //$cVars[$clientID]['syncDelay'] = $rmtick - fromUint28(substr($message,$i,4)); $i+=4; // Calculate client-server clock delay. Usually within 4ms of previous sync
                        //$longstr .= '&Sync Delay:'.$rm['p'][$clientID]['syncDelay']; // 8/22/2013: UNUSED
                        
                        
                        $tmp = '~Id'.pack('n',$clientID).pack('N',$rmtick).'Ip'.pack('N',round($rm['p'][$clientID][0]*1000)).pack('N',round($rm['p'][$clientID][1]*1000));
                        foreach ($rm['p'] as $j => $k) {
                            if (isset($k['game']) && $k['game'] == $rm['p'][$clientID]['game']) {
                                // Send player movement
                                $tmp .= 'Wp'.pack('n',$j).pack('N',round($k[0]*1000)).pack('N',round($k[1]*1000)).pack('n',$k['lerp']); // Send to this player, each of the players that are already in game
                                send('~Wp'.pack('n',$clientID).pack('N',round($rm['p'][$clientID][0]*1000)).pack('N',round($rm['p'][$clientID][0]*1000)).pack('n',$rm['p'][$clientID]['lerp']), $j, true); // Send to all other players when we join
                            } else {
                                //addlog("Game of client $j not set");
                            }
                        }
                        //unset($j);
                        ////addlog("\nRM[P]:".var_dump($rm['p'])."\n");
                        //addlog("\n$tmp");
                        // Send game entry data: PlayerID, PlayerX/Y, all other PlayerIDs, and their X/Y
                        send($tmp, $clientID, true);
                        
                        break;
                    case 'k': // Client pressed key
                        $tmp = array(fromUint7(substr($message,$i,1)),fromUint28(substr($message,$i+1,4))); $i+=5;
                        
                        $longstr .= 'Keydown:'.$tmp[0];
                        $longstr .= '@'.$tmp[1];
                        
                        $rmBuffer[$clientID][] = array('k',$tmp[1],$tmp[0]); // Send action, time, value
                        break;
                    case 'K': // Client key up
                        $tmp = array(fromUint7(substr($message,$i,1)),fromUint28(substr($message,$i+1,4))); $i+=5;
                        
                        $longstr .= 'Keyup:'.$tmp[0];
                        $longstr .= '@'.$tmp[1];
                        
                        $rmBuffer[$clientID][] = array('K',$tmp[1],$tmp[0]); // Send action, time, value
                        break;
                    case 'f':
                        $tmp = fromUint28(substr($message,$i,4)); $i+=4;
                        $longstr .= 'Fire@'.$tmp;
                        
                        $rmBuffer[$clientID][] = array('f',$tmp); // Send action, time
                        break;
                    case 'F':
                        $tmp = array(fromUint7(substr($message,$i,1)),fromUint28(substr($message,$i+1,4))); $i+=5;
                        $longstr .= 'Face'.$tmp[0].' @'.$tmp[1];
                        
                        $rmBuffer[$clientID][] = array('F',$tmp[1],$tmp[0]); // Send action, time, value
                        break;
                    default:
                        break;
                }
            }
            
            //addlog('RCV['.strlen($message).']>'.$longstr);
            
            //send('sGot it.');
        } elseif ( $message[0] == '$' ) { // Client inaccessible functions (for draw)
            if (substr($command[0],0,2) == 'dC') {
                //addlog('Received dC:'.$message);
                send($message,-$clientID); // Send as string for now
            } else {
		switch ($command[0]) {
			case 'd': // Draw function
				send('$d '.$clientID.' '.$command[1].' '.$command[2],-$clientID);
				//$cVars[$clientID]['drawHistory'][] = array((int)$command[1],(int)$command[2]);
				break;
			case 'd0': // Draw STOP (mouse released)
				send('$d0 '.$clientID,-$clientID);
				//$cVars[$clientID]['drawHistory'][] = false;
				break;
			case 'dl': // Draw update last
				send('$dl '.$clientID.' '.$command[1].' '.$command[2],-$clientID);
				//$cVars[$clientID]['drawHistory'][] = 'last';
				//$cVars[$clientID]['drawHistory'][] = array((int)$command[1],(int)$command[2]);
				break;
                        case 'dc': // Draw: Clear all
                                send('$dc',-$clientID);
                                break;
			default:
				send("SUnrecognized function.",$clientID);
		}
            }
	} elseif ( $message[0] == '/' ) { // Client accessible functions (Set variable etc)
		switch ($command[0]) {
			case 'help':
				send("sAvailable Commands: /help /color /name /clear", $clientID);
				break;
			case 'color':
				if (count($command) <= 1) { $command[1] = ''; }
				if (strlen($command[1]) == 7 & substr($command[1],0,1) == '#') {
					send("C".substr($command[1],1,6));
				} else {
					send("sCORRECT USAGE: /color #000000", $clientID);
				}
				break;
			case 'name':
				if (preg_match('/[^\x2D\x5F0-9a-zA-Z]/',(substr($message,6))) || !strlen(substr($message,6))) {
					send("SName can only contain alphanumeric characters, dashes, and underscores.", $clientID);
					send("/name Visitor ".$clientID,$clientID);
					$cVars[$clientID]['name'] = "Visitor ".$clientID;
				} else {
					//$tmp = preg_replace('/[^\x2D\x5F0-9a-zA-Z]/', '', $command[1]);
					
					send("/name $command[1]", $clientID); // Confirm name change with client.
					
					send("s<b>".$cVars[$clientID]['name']."</b> changed their name to <b>$command[1]</b>", -$clientID);
					
					addlog("$ip ($clientID) (".$cVars[$clientID]['name'].") has changed their name to $command[1]");
					$cVars[$clientID]['name'] = $command[1];
				}
				break;
			default:
				send("SUnknown command.", $clientID);
		}
	} elseif ( $message[0] == 'M' ) { // Message
		if (sizeof($Server->wsClients) == 1) {
			send("sThe room is empty.", $clientID);
		} else {
			$message = htmlentities(preg_replace('/[^\x09\x0A\x0D\x20-\x7E]/', '', $message), ENT_NOQUOTES);
			send('M'.$cVars[$clientID]['name'].': '.substr($message,1), -$clientID);
		}
	} else {
		addlog("Received incorrectly formatted message from $clientID: '$message'");
	}
}

// when a client connects
function wsOnOpen($clientID) {
	global $Server, $cVars;
	$ip = long2ip( $Server->wsClients[$clientID][6] );

	//Client connect
	addlog("$ip Client ($clientID) has \033[1;32mconnected.\033[m");
		
	//Initiate client variables
	$cVars[$clientID] = array();
	$cVars[$clientID]["name"] = "Visitor $clientID";
	$cVars[$clientID]["drawHistory"] = array();
	
	//send("/hixie76 " . (int)$Server->wsClients[$clientID][12]); // Tell client their WebSocket connection type
	send("sVisitor $clientID has joined the room.", -$clientID);
}

// when a client closes or lost connection
function wsOnClose($clientID, $status) {
	global $Server, $cVars, $sVars, $rm, $rmBuffer;
	$ip = long2ip( $Server->wsClients[$clientID][6] );

	//Client disconnect	
	addlog("$ip Client ($clientID) has \033[1;31mdisconnected.\033[m");
        
	send("s" . $cVars[$clientID]['name'] . " has left the room.",-$clientID);
	
        foreach ($rm['p'] as $i => $j) {
            if (isset($j['game'])) {
                send("~D".pack('n',$clientID),$i,true); // Let all connected clients know that we've disconnected
            }
        }
        
	// Total UNSET//unset($cVars[$clientID],$rm['p'][$clientID],$rmBuffer[$clientID]); // Unsetting values within the array is safe & will not move the indexes
        unset($rm['p'][$clientID]['game'],$rmBuffer[$clientID]); // Smart unset
        
        updateGameRunning();
        $rm['gameRunning'][0] = false;
        foreach ($rm['p'] as $i => $j) {
            if (isset($j['game'])) {
                $rm['gameRunning'][$j['game']] = true;
                break;
            }
        }
        
        if (isset($sVars['observing']) && in_array($clientID, $sVars['observing'])) {
            if (count($sVars['observing']) == 1) {
                unset($sVars['observing']);
            } else {
                array_splice($sVars['observing'], array_search($clientID, $sVars['observing']));
            }
        }
}

function send($msg, $to="ALL", $binary=false) {
	global $Server;
	if ($to == "ALL") { // Send to all
		foreach ( $Server->wsClients as $id => $client )
			$Server->wsSend($id, $msg, $binary);
	} elseif ((int)$to < 0) { // Send to all except
		foreach ( $Server->wsClients as $id => $client )
				if ( abs((int)$to) != $id )
					$Server->wsSend($id, $msg, $binary);
	} else { // Send to single target
                if (isset($Server->wsClients[$to]))
                        $Server->wsSend($to, $msg, $binary);
	}
}
function addlog( $message ) {
	echo date('Y-m-d H:i:s: ') . $message . "\n";
}

function fromUint7($str) { if (strlen($str)==1) { return ord($str); } else { return false; } }
function fromUint14($str) { if (strlen($str)==2) { return ord($str[0])*128+ord($str[1]); } else { return false; } }
function fromUint21($str) { if (strlen($str)==3) { return ord($str[0])*16384+ord($str[1])*128+ord($str[2]); } else { return false; } }
function fromUint28($str) { if (strlen($str)==4) { return ord($str[0])*2097152+ord($str[1])*16384+ord($str[2])*128+ord($str[3]); } else { return false; } }

// start the server
$Server = new PHPWebSocket();
$Server->bind('message', 'wsOnMessage');
$Server->bind('open', 'wsOnOpen');
$Server->bind('close', 'wsOnClose');
// for other computers to connect, you will probably need to change this to your LAN IP or external IP,
// alternatively use: gethostbyaddr(gethostbyname($_SERVER['SERVER_NAME']))
// or [WORKING] gethostbyname(gethostname())

//$Server->wsStartServer('0.0.0.0', 8399); //All
//$Server->wsStartServer('69.174.53.19', 8399); // InMotion VPS
$Server->wsStartServer(gethostbyname(gethostname()), 8399); // Dynamic. Make sure ports are forwarded ON CORRECT IP for this machine. Normally would use $_SERVER['REMOTE_ADDR'] on web apps

//Deprecated server addresses
//$Server->wsStartServer('127.0.0.1', 8399); //Local
//$Server->wsStartServer('192.168.0.3', 8399); //Dorms
//$Server->wsStartServer('192.168.1.101', 8399); //Ron
?>