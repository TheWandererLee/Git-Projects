<?php
include('rmFunctions.php');

// RIGOR MORTIS INITIATION
$rm = array('p','emitters');

$rm['gameRunning'] = array(false); // Set GAME0 running to false

$rm['netFrequency'] = 20; // Frequency at which to push updates to players. Simulations are also done at this rate
$rm['clientWidth'] = 768;
$rm['clientHeight'] = 480;

$rm['p'] = array();                  // x,y,dir,speed
//$rm['p'][0] = array(999,999);
$rm['p'][1] = array(192,192,0,0);
$rm['p'][2] = array(0,0,0,0);
$rm['p'][3] = array(512,128,0,0);

/* $rm['p'][0]['speed'] = 5;
$rm['p'][1]['speed'] = 128; // Players constant max (potential) speed
$rm['p'][2]['speed'] = 256;
$rm['p'][3]['speed'] = 512;
*/

$rm['p'][0]['speed'] = $rm['p'][1]['speed'] = $rm['p'][2]['speed'] = $rm['p'][3]['speed'] = 128;

$rm['bullets']['pistol'] = array();
$rm['bullets']['pistol']['speed'] = 1400; // (pixels) Feet per second
$rm['bullets']['pistol']['damage'] = array(30,35);


// Each enemy will have [0:x,1:y,2:dir,3:speed,type,chasing,hp,maxhp,attack]
$rm['enemies']['types'] = array(0=>'normal',1=>'fatty');

// Enemy 'normal' : 0
$rm['enemies']['normal'] = array(32,24); //Size
$rm['enemies']['normal']['speed'] = 64;
$rm['enemies']['normal']['hp'] = array(90,125);
$rm['enemies']['normal']['attack'] = array(10,60,500,700,500); // Damage, range, frequency (from last strike to next animation, must B > duration), duration, strike-point
$rm['enemies']['normal']['chaseRange'] = 64;
$rm['enemies']['normal']['stopDistance'] = 30; // How far away from the player will we consider close enough to stop

// Enemy 'fatty' : 1
$rm['enemies']['fatty'] = array(48,32); //Size
$rm['enemies']['fatty']['speed'] = 32;
$rm['enemies']['fatty']['hp'] = array(400,500);
$rm['enemies']['fatty']['attack'] = array(30,40,500,200,100);
$rm['enemies']['fatty']['chaseRange'] = 64;
$rm['enemies']['fatty']['stopDistance'] = 10;

$rm['emitters'] = array(); // x1, y1, x2, y2, frequency, type, next [next emit millisecond]
$rm['emitters'][0] = array(0=>100,1=>100,2=>300,3=>250,'frequency'=>array(6000,8000),'type'=>'normal','next'=>5000);
$rm['emitters'][1] = array(0=>600,1=>350,2=>700,3=>450,'frequency'=>array(120000,160000),'type'=>'fatty','next'=>5000);

//Objects and their IDs
$rm['objects']['types'] = array(1001=>'money');

$rm['objects']['money'] = array(19,8); //Size

$rmBuffer = array(); // Action buffer for all players [trigger,value,time]
$rmeHistory = array(); // Enemy history buffer. Stores all enemies past position changes so we can rewind back to the point if necessary. Only store backwards up to the highest users lag, and the movement immediately before

$rmMap = array(); // Collision & visual map of the field. Ground types, walls, etc
$rmMap[0] = array(); // We'll store this giant map array as a string in the future to save memory.
$rmMap[0][0] = array(400,100,200,100); // x, y, w, h :: OR :: x1, y1, x2, y2, x3, y3
$rmMap[0][0] = [400,100,200,100];
$rmMap[0][1] = [210,280,200,350,240,320,350,400,310,320,300,250,280,320];
$rmMap[0][2] = [340,200,550,200,450,300];

// Server & Client Variables
$cVars = array();
$sVars = array();

/*** RIGOR MORTIS SERVER LOOP ***/
//
// Memory Considerations: Current max of 128MBclient/512MBserver of memory. About 520 or 2080 enemies because of PHP array storage


//$rmtick = $rmTickStart = floor(microtime(true)*1000); // Tick, in milliseconds
//$rmd = $rmTickStart; // Tick Delta
$rmStartTick = floor(microtime(true)*1000); // Tick delta & current system tick
$rmd = $rmtick = $rmLastPush = 0; // Time since last network data push in microseconds
$rmCount = 0; $rmSCount = 0;
$rmSendCount = 0;
$send = ''; $sendTo = array();
$rmLastID = 0; // Last ID created by a createObject function

function rigorMortis() {
    global $sVars, $rmd, $rmtick, $rmLastPush, $rmCount, $rmSCount, $rmSendCount, $rmBuffer, $rmStartTick, $rmLastID;
    global $rm, $rmMap;
    global $rmeHistory;
	global $send, $sendTo;
    
    $rmd = $rmtick;
    $rmtick = floor(microtime(true)*1000)-$rmStartTick;
    $rmd = $rmtick - $rmd;
    $rmLastPush += $rmd; $rmSCount += $rmd;
    $rmCount++;
    //echo "RMD|$rmd|LAST|$rmLastPush\n";
    
    //echo "\033[s\033[0F\033[1;37;41m"; // Save cursor position, start color change
    //echo "Tick: " . $rmtick . " / Last: ".$rmLastPush; // Output server time
    //echo "\033[m\033[u"; // End color change, restore cursor position
        
    if ($rmLastPush >= 1000 / $rm['netFrequency']) {
        
    
        if (isset($sVars['observing'])) {
			//send("mOBSERVING, TICKS PER SECOND($rmCount)", $sVars['observing']);
			
			{ /* Server Logic, Send & Receive Prefixes ################################################### SERVER LOGIC, SEND & RECEIVE PREFIXES #########################################################################
			   
            ----------======== SERVER LOGIC RULES =========-------------
            All values ROUNDed to the thousandth. 3-point precision. (3.142)
            
            +-------------------------     SEND PREFIXES     ------------------------+
            |                      THESE ARE  ALL PREFIXED WITH ~                    |
            
            vL[variable]T[value] - Set player variable [VARNAMELENGTH / NAME / VALUETYPECHAR / VALUE
                                    e.g. v5speed2300 <-- [300 being UI16]
            ValueTypeChars. 1-4: BigEndian Integer, a-z: String of length [letter] (j=10)           //// Not yet implemented
            
            i## - Unsigned16 - Iterations since last push
            xTICK - Unsigned32 - Ticks since server start [Caps out at about 39 months]
            T"""""""" - String8 - HH:MM:SS Server Time
            p## - Unsigned16 - Time since last net push
            P# - Unsigned8 - Current packet being sent through this (in 1 second time frame)
            
            D## - Unsigned16 - CLIENT DISCONNECT [CLIENTID UI16]
			
			                    ALL DELTA UI16s ARE CURRENTLY TIME UI32s. RECEIVED VALUES ARE MULTIPLES OF 7BIT, SENT ARE OF 8BIT
			
            ========== Initiate...
            Id##TTTT - Send player their client ID & servers current tick [UI16 / UI32 SERVER TIME-TICK]
            IpXXXXYYYY - Initiate player [XPOS*10000 UI32 / YPOS*10000 UI 32]
            IeXXYYWWHH - Initiate emitter [XPOS UI16 / YPOS UI 16 / WIDTH UI 16 / HEIGHT UI 16] // Not yet implemented
            Iz##TIMEXXYYTHP - Initiate zombie [ZOMBIEID UI16 / TIME UI32 / XPOS UI16 / YPOS UI16 / TYPE UI8 / HP UI16]
			Io##TIMEXXYYTT - Initiate object [OBJECTID UI16 / TIME UI32 / XPOS UI16 / YPOS UI16 / TYPE UI16 ]
            
            ========== Object...
            Od##TIME - Object destroy [OBJECTID UI16 / TIME UI32]
            Ou## - Object update variable [OBJECTID UI16 / TIME UI32 / VARIABLE UI8 / VALUE UI32]
            
            ========== World updates
            Wp##XXXXYYYYDD - Push any players ID,X,Y to another player [ID / X / Y / REPLAYDELAY-aka-LERP UI 16]
            Wl##DD - Push players lerp/ReplayDelay to another player [CLIENTID UI16 / REPLAYDELAY UI16]
	    
			W=##DD - Push players syncDelay to another player [TIME UI32 / SYNCDELAY UI32] // REMOVED
	    
            ========== Buffer updates
            Bp##DDXXXXYYYYDDDDSS - PUSH: Player movement buffer addition - [CLIENTID UI16 / TIME UI32 / XPOS*1000 UI32 / YPOS*1000 UI16 / (DIR+PI)*1000 UI16 / SPEED UI16]
            Bf##DD - PUSH: Player has fired [CLIENTID UI16 / TIME UI32]
            BF##DDd - PUSH: Player changed facing direction to d [CLIENTID UI16 / TIME UI32 / DIRECTION UI8]
            B=##DD - PUSH: Player is keeping alive  [CLIENTID UI16 / TIME UI32] ****POTENTIAL BANDWIDTH REDUCTION. NEVER/RARELY SEND THIS, BUT, INCREASE SIZE OF SENT DELTA****
            
            BZp##TIMEXXXXYYYYDDDDSS - PUSH: Zombie movement buffer add - [ZOMBIEID UI16 / TIME UI32 / XPOS*1000 UI32 / YPOS*1000 UI16 / (DIR+PI)*1000 UI16 / SPEED UI16]
            BZc##TIMEID - PUSH: Zombie start chasing player ID at TIME [PID UI16 / TIME UI32 / ZOMBIEID16]
            BZh##TIMEHP - PUSH: Zombie health [ZID UI16 / TIME UI32 / HP UI16]
            
			= - Ping player, wait for response to determine players latency.
	    
            +---------------------     RECEIVE PREFIXES     -------------------------+
            |                   THESE ARE ALSO ALL PREFIXED WITH ~                   |
            (Do not accept authoritative data. Inputs only). Add to buffer
            
            0x00DD - Stop all movement (for when user is holding a key, then changes focus) - Time UI28
            -DD - Ping - Time UI28 // Client requests to keep connection open
			= - Pong
            kDD# - Keydown UI7 - Time UI28  ***ALL DELTA UI14'S ARE CURRENTLY UI28's***
            KDD# - Keyup UI7 - Time UI28
            fDD - Fire - Time UI28
            FDD# - Facing direction - [TIME UI28 / DIRECTION UI7] // Not yet implemented
			
            R#GAMEDD - Request entry to GAME# UI7 / GAMESTART UI28 / REPLAYDELAY UI14
            
            +------------------------     OBJECT IDs      ----------------------------+
			|                                                                         |
			| 14bit: 0-16383, 16bit: 0-65535                                          |
			|                                                                         |
			| 1001 - Money :: [0] - Amount UI21 (0-2,097,152)
			
			*/
			}
			
            $rmSendCount++;
            
            for ($i=0;$i<count($sVars['observing']);$i++) {
                send("~i" . pack("n",$rmCount) .
                     //"T" . date('H:i:s') .
                     "p" . pack("n",$rmLastPush) .
                     "x" . pack("N",$rmtick) .
                     "P" . pack("C",$rmSendCount), $sVars['observing'][$i], true);
            }
            
            if (!$rmSendCount) { echo "\n"; }
            //echo "OBS[$rmSendCount]";
            
        }
        
        //############################### ALL INITIATE ACTIONS NEED TO BE DONE BEFORE BUFFERS. IF NOT, BUFFER WILL HAVE NOTHING TO MODIFY
        //############################### INITIATE ACTIONS TIME SHOULD NOT BE REQUIRED BECAUSE BUFFER SHOULD COME ASAP AFTER
        // However, initiate actions should really only be sent on game request. Client should handle buffer-only updates after that
        
        if ($rm['gameRunning'][0]) {
			// Actions based on player buffers, players
			foreach ($rm['p'] as $j => &$k) {
				if (isset($k['game']) && isset($rmBuffer[$j])) {
					
					/*if (count($rmBuffer[$j]) == 1) {
						$tmp = round(atan2($k['keyv'][1],$k['keyv'][0]),3);
						$calcArray = array($k[0],$k[1],$tmp,$k[3]); // Send oldx, oldy, oldDIR, oldSpeed
						$calcArray['size'] = $k['size']; // Must transmit size of this unit to run collision checks properly
						$tpos = calculateNewPosition($rmtick-$rmBuffer[$j][count($rmBuffer[$j])-1][1], $calcArray); // Send new delta along with unit values
						
						$k[0] = $tpos[0]; $k[1] = $tpos[1]; $k[2] = $tpos[2]; $k[3] = $tpos[3];
						
						$rmBuffer[$j][count($rmBuffer[$j])-1][1] = $rmtick;
					}*/
					
					if (count($rmBuffer[$j])==1) {
						// Pre-position collision checking
						
						$tmp = round(atan2($k['keyv'][1],$k['keyv'][0]),3);
						
						//addlog("\033[1;37;44mPre-Colliz Chk: (".$k[0].",".$k[1].") From X: ".round(cos($tmp) * $k[3] * ($rmtick-$rmBuffer[$j][count($rmBuffer[$j])-1][1]-$k['lerp'])*0.001,3)." -or- ".$rmtick." - ".$rmBuffer[$j][count($rmBuffer[$j])-1][1]." - L".$k['lerp']);
						$calcArray = array(
										   $k[0] + round(cos($tmp) * $k[3] * ($rmtick-$rmBuffer[$j][count($rmBuffer[$j])-1][1]-$k['lerp'])*0.001,3),
										   $k[1] + round(sin($tmp) * $k[3] * ($rmtick-$rmBuffer[$j][count($rmBuffer[$j])-1][1]-$k['lerp'])*0.001,3),
										   
										   //$k[0] + round(cos($tmp) * $k[3] * ($rmLastPush)*0.001,3),
										   //$k[1] + round(sin($tmp) * $k[3] * ($rmLastPush)*0.001,3),
										   'size' => $k['size']
										   );
						
						//addlog("Collision checking (".$calcArray[0].",".$calcArray[1].")");
						$col = collisionCheck($calcArray); // Check current position of this player and reposition them if necessary
						
						if (isset($col['collision'])) {
							if (count($rmBuffer[$j])==1) {
								$k[0] = $col[0]; $k[1] = $col[1];
								
								$send .= 'Bp'.pack('n',$j).pack('N',$rmtick-$k['lerp']).pack('N',round($k[0]*1000)).pack('N',round($k[1]*1000)).pack('N',round(($tmp+M_PI)*1000)).pack('n',$k[3]);
								$rmBuffer[$j][count($rmBuffer[$j])-1][1] = $rmtick-$k['lerp'];
								//addlog("LAST RMBUFFER CHANGED TO ".$rmtick-$k['lerp']);
							} else { // This triggers when releasing a key while pressed against a wall
								//addlog("MORE THAN 1 BUFFER, WAS CHANGED TO ".$rmtick-$k['lerp']);
								
								$k[0] = $col[0]; $k[1] = $col[1];
								
								$send .= 'Bp'.pack('n',$j).pack('N',$rmtick-$k['lerp']).pack('N',round($k[0]*1000)).pack('N',round($k[1]*1000)).pack('N',round(($tmp+M_PI)*1000)).pack('n',$k[3]);
								$rmBuffer[$j][count($rmBuffer[$j])-1][1] = $rmtick-$k['lerp'];
							}
						} else {
							//$k[0] = $col[0]; $k[1] = $col[1];
							
							//$rmBuffer[$j][count($rmBuffer[$j])-1][1] = $rmtick-$k['lerp'];
						}
						//addlog("\033[m");
						
						// addlog("\033[1;33;40m".print_r($rmBuffer[$j],true)."\033[m");
						
					}
					
					//addlog("####XPOS:".$k[0].",YPOS:".$k[1]);
					
					for ($i=1;$i<count($rmBuffer[$j]);$i++) {
						$tbuff = array();
						
						$tmp = round(atan2($k['keyv'][1],$k['keyv'][0]),3);
						/*$calcArray = array($k[0],$k[1],$tmp,$k[3]); // Send oldx, oldy, oldDIR, oldSpeed
						$calcArray['size'] = $k['size']; // Must transmit size of this unit to run collision checks properly
						$tpos = calculateNewPosition($rmBuffer[$j][$i][1]-$rmBuffer[$j][$i-1][1], $calcArray); // Send new delta along with unit values
						
						$k[0] = $tpos[0]; $k[1] = $tpos[1]; $k[2] = $tpos[2]; $k[3] = $tpos[3];*/
						
						// Standard position processing
						
						// If old delta is newer than the current. Something was injected in the future incorrectly. Throwout next position update by merging deltas.
						// This can stall for time but eventually will cause a problem. Too low latency, things walk through walls.
						//if ($rmBuffer[$j][$i-1][1]>$rmBuffer[$j][$i][1]) { $rmBuffer[$j][$i-1][1] = $rmBuffer[$j][$i][1]; }
						
						// Instead of the above; don't change the time of this buffer, just ignore it. Or it will cause issues with next iteration collision checks
						//if ($rmBuffer[$j][$i-1][1]>$rmBuffer[$j][$i][1]) { $tmpd = 0; }
						//else { $tmpd = $rmBuffer[$j][$i][1]-$rmBuffer[$j][$i-1][1]; }
						
						$tmpd = $rmBuffer[$j][$i][1]-$rmBuffer[$j][$i-1][1]; // Allow delta setting regardless
						
						// Update 8/22/2013: All goes well until the buffer is larger than 1 and there is a collision. The next time the buffer is 1 again
						// the delta gets so high it causes the unit to jump through the wall.
						// Update: Seems this is partially caused by a drastically changing lerp while in-game.
						// Update: Caused by clients latency changing, causing their time sync to be off of the servers. Even if lerp remains unchanged, a large change in latency will ruin collision checking.
						
						//addlog("\033[1;37;41mPre-B2+Col Chk: (".$k[0].",".$k[1].") From X: ".round(cos($tmp) * $k[3] * ($tmpd)*0.001,3));
						$k[0] += round(cos($tmp) * $k[3] * ($tmpd)*0.001,3); // Set xpos from oldx + oldDIR * oldSP * newdelta
						$k[1] += round(sin($tmp) * $k[3] * ($tmpd)*0.001,3); // Set ypos from ypos + (oldDIR * oldSP * (newdelta))
						$calcArray = array($k[0],$k[1],'size'=>$k['size']);
						//addlog("B2+ Collision checking (".$calcArray[0].",".$calcArray[1].")");
						//addlog("Buffer deltas ".$rmBuffer[$j][$i][1]." - ".$rmBuffer[$j][$i-1][1]."\033[m");
						$col = collisionCheck($calcArray);
						if (isset($col['collision'])) {
							$k[0] = $col[0]; $k[1] = $col[1];
							
							$send .= 'Bp'.pack('n',$j).pack('N',$rmtick-$k['lerp']).pack('N',round($k[0]*1000)).pack('N',round($k[1]*1000)).pack('N',round(($tmp+M_PI)*1000)).pack('n',$k[3]);
							//$rmBuffer[$j][$i][1] = $rmtick-$k['lerp'];
							//$rmBuffer[$j][$i][1] = $rmtick;
						} else { // Fires when pressing a key while already pressed against a wall, or just regular buffer additions.
							if ($i == count($rmBuffer[$j])-1) {
								//$rmBuffer[$j][$i][1] = $rmtick-$k['lerp'];
							}
						}
						
						//addlog(print_r($k,true));
						
						if ($rmBuffer[$j][$i][0] == chr(0)) { // Movement ALL-STOP
							$k[3] = 0;
							$k['keyv'] = array(0,0);
							$k['keyb'] = array();
							
							//addlog('Movement all-stop (Client lost focus)');
							$send .= 'Bp'.pack('n',$j).pack('N',$rmBuffer[$j][$i][1]).pack('N',round($k[0]*1000)).pack('N',round($k[1]*1000)).pack('N',round(($k[2]+M_PI)*1000)).pack('n',$k[3]);
						} elseif ($rmBuffer[$j][$i][0] == '=') { // Ping, to stay synced with server
							//$send .= 'B='.pack('n',$j).pack('n',$rmBuffer[$j][$i][1]); // Forward this ping so other players deltas are correct
							//addlog('Forwarded keep-alive ping');
						} elseif ($rmBuffer[$j][$i][0] == 'k') { // Keydown
							//$k[0] += round($k['keyv'][0] * $k[3] * $rmBuffer[$j][$i][2]*0.001,3); // Set xpos from oldx + oldDIR * oldSP * newdelta
							//$k[1] += round($k['keyv'][1] * $k[3] * $rmBuffer[$j][$i][2]*0.001,3);
							//addlog('DO new calc: '.$k['keyv'][0].'*'.$k[3].'*'.($rmBuffer[$j][$i][1]-$rmBuffer[$j][$i-1][1])*0.001);
							
							
							if (!in_array($rmBuffer[$j][$i][2],$k['keyb'])) { // Only continue if keys aren't already down
								$tbuff[3] = $k['speed'];
								
								if ($rmBuffer[$j][$i][2] == 68) { // Right
									$k['keyb'][] = 68;
									$k['keyv'][0] += 1;
								} elseif ($rmBuffer[$j][$i][2] == 87) { // Up
									$k['keyb'][] = 87;
									$k['keyv'][1] -= 1;
								} elseif ($rmBuffer[$j][$i][2] == 65) { // Left
									$k['keyb'][] = 65;
									$k['keyv'][0] -= 1;
								} elseif ($rmBuffer[$j][$i][2] == 83) { // Down
									$k['keyb'][] = 83;
									$k['keyv'][1] += 1;
								}
								
								$tbuff[2] = round(atan2($k['keyv'][1],$k['keyv'][0]),3);
								
								// Standard movement without collisions check
								$send .= 'Bp'.pack('n',$j).pack('N',$rmBuffer[$j][$i][1]).pack('N',round($k[0]*1000)).pack('N',round($k[1]*1000)).pack('N',round(($tbuff[2]+M_PI)*1000)).pack('n',$tbuff[3]);
								//addlog("#CLIENT".$j."MOVE@".$rmBuffer[$j][$i][1]."|X:".$k[0].",Y:".$k[1].",D:".$tbuff[2].",S:".$tbuff[3]);
								
								// For now, when a key is pressed down, we will also broadcast this clients lerp
								//$send .= 'Wl'.pack('n',$j).pack('n',$rm['p'][$j]['lerp']);
								//addlog("Transmitted a lerp of: ".$rm['p'][$j]['lerp']);
								
								// #REVISE: For now, we will ping the client to judge their lerp. Later this should be done periodically
								//if (!isset($rm['p'][$j]['ping'])) { // Only prepare if not already waiting to receive pong
								//	$send .= '=';
								//	$rm['p'][$j]['ping'] = $rmtick; // Prepare to receive pong
								//}
								//$send .= 'Wl'.pack('n',$j).pack('n',$rm['p'][$j]['lerp']);
					
								$k[2] = $tbuff[2]; // Update direction
								$k[3] = $tbuff[3]; // Update new speed
							}
							
							
							
						} elseif ($rmBuffer[$j][$i][0] == 'K') { // Keyup
							//$k[0] += round($k['keyv'][0] * $k[3] * $rmBuffer[$j][$i][2]*0.001,3); // Set xpos from oldx + oldvectorx * oldSP * newdelta
							//$k[1] += round($k['keyv'][1] * $k[3] * $rmBuffer[$j][$i][2]*0.001,3); // Set ypos from oldy + oldvectory * oldSP * newdelta
							//addlog('UP new calc: '.$k['keyv'][0].'*'.$k[3].'*'.($rmBuffer[$j][$i][1]-$rmBuffer[$j][$i-1][1])*0.001);
							
							//addlog('KeyBefore: '.var_dump($k['keyb']));
							if ($rmBuffer[$j][$i][2] == 68) { // Right
								if (array_search(68,$k['keyb']) !== false) { $k['keyv'][0] -= 1; array_splice($k['keyb'],array_search(68,$k['keyb']),1); }
							} elseif ($rmBuffer[$j][$i][2] == 87) { // Up
								if (array_search(87,$k['keyb']) !== false) { $k['keyv'][1] += 1; array_splice($k['keyb'],array_search(87,$k['keyb']),1); }
							} elseif ($rmBuffer[$j][$i][2] == 65) { // Left
								if (array_search(65,$k['keyb']) !== false) { $k['keyv'][0] += 1; array_splice($k['keyb'],array_search(65,$k['keyb']),1); }
							} elseif ($rmBuffer[$j][$i][2] == 83) { // Down
								if (array_search(83,$k['keyb']) !== false) { $k['keyv'][1] -= 1; array_splice($k['keyb'],array_search(83,$k['keyb']),1); }
							}
							//addlog('KeyAfter: '.var_dump($k['keyb']));
							
							
							if (empty($k['keyb']) || (!$k['keyv'][0] && !$k['keyv'][1])) {
								//addlog('Player STOP empty?'.empty($k['keyvb']).'---or?'.(!$k['keyv'][0] && !$k['keyv'][1]));
								$tbuff[3] = 0; // Player speed has stopped
								$tbuff[2] = $k[2]; // Direction can stay the same
							} else {
								$tbuff[2] = round(atan2($k['keyv'][1],$k['keyv'][0]),3); // Direction has simply changed
								$tbuff[3] = $k[3]; // Speed remains the same
							}
							
							$send .= 'Bp'.pack('n',$j).pack('N',$rmBuffer[$j][$i][1]).pack('N',round($k[0]*1000)).pack('N',round($k[1]*1000)).pack('N',round(($tbuff[2]+M_PI)*1000)).pack('n',$tbuff[3]);
							//addlog("#CLIENT".$j."MOVE@".$rmBuffer[$j][$i][1]."|X:".$k[0].",Y:".$k[1].",D:".$tbuff[2].",S:".$tbuff[3]);
							
							$k[2] = $tbuff[2]; // Update direction
							$k[3] = $tbuff[3]; // Update new speed
						} elseif ($rmBuffer[$j][$i][0] == 'f') {
							// We need to calculate this actual k0,k1 position at this time
							// We can't just use [] because it ends up ruining the structure of the array. Deletes weapons
							for ($int=0;$int<count($rm['bullets']);$int++) {
								if (!isset($rm['bullets'][$int])) { break; }
							}
							$rm['bullets'][$int] = array($k[0],$k[1],$k['aim']/(128/(M_PI*2))-M_PI,$rm['bullets']['pistol']['speed'],$j);
							
							$send .= 'Bf'.pack("n",$j).pack("N",$rmBuffer[$j][$i][1]); // Send clientID, delta
				
							//addlog("##ADDED## Fire from client ".$j." @ ".$rmBuffer[$j][$i][1]);
						} elseif ($rmBuffer[$j][$i][0] == 'F') {
							$k['aim'] = $rmBuffer[$j][$i][2]; // To get dir from this:: players[i]['aim']/(128/(Math.PI*2))-Math.PI = Direction
							
							$send .= 'BF'.pack("n",$j).pack("N",$rmBuffer[$j][$i][1]).pack("C",$rmBuffer[$j][$i][2]);
							//addlog("#CLIENT".$j." FACES ".$rmBuffer[$j][$i][2]." @ ".$rmBuffer[$j][$i][1]);
						}
						
						if (isset($col['collision'])) { // Position overwrite and movement reset due to previous collision
							$send .= 'Bp'.pack('n',$j).pack('N',$rmtick-$k['lerp']).pack('N',round($k[0]*1000)).pack('N',round($k[1]*1000)).pack('N',round(($tmp+M_PI)*1000)).pack('n',$k[3]);
						}
						
						//$send .= 'Bp'.pack("n",$j).$rmBuffer[$j][0];
					}
					
					//addlog("@@@@XPOS:".$k[0].",YPOS:".$k[1]);
					
					//////////// Post position collision checking
					/*$tmp = round(atan2($k['keyv'][1],$k['keyv'][0]),3);
					$calcArray = array(
									   $k[0] + round(cos($tmp) * $k[3] * ($rmtick-$rmBuffer[$j][count($rmBuffer[$j])-1][1]-$k['lerp'])*0.001,3),
									   $k[1] + round(sin($tmp) * $k[3] * ($rmtick-$rmBuffer[$j][count($rmBuffer[$j])-1][1]-$k['lerp'])*0.001,3),
									   
									   //$k[0] + round(cos($tmp) * $k[3] * ($rmLastPush)*0.001,3),
									   //$k[1] + round(sin($tmp) * $k[3] * ($rmLastPush)*0.001,3),
									   
									   
									   'size' => $k['size']
									   );
					//addlog("Using ".$rmLastPush." not ".($rmtick-$rmBuffer[$j][count($rmBuffer[$j])-1][1]));
					addlog("Collision checking (".$calcArray[0].",".$calcArray[1].")");
					$col = collisionCheck($calcArray); // Check current position of this player and reposition them if necessary
					
					if (isset($col['collision'])) {
						$k[0] = $col[0]; $k[1] = $col[1];
						
						//$send = ''; // Cancel out any previous pending movement sends
						$send .= 'Bp'.pack('n',$j).pack('N',$rmtick-$k['lerp']).pack('N',round($k[0]*1000)).pack('N',round($k[1]*1000)).pack('N',round(($tmp+M_PI)*1000)).pack('n',$k[3]);
						$rmBuffer[$j][count($rmBuffer[$j])-1][1] = $rmtick-$k['lerp'];
					} else {
						//$k[0] = $col[0]; $k[1] = $col[1];
					}*/
					
					// Calc new position
					// Will periodically check for collisions and move players even if buffer has not changed
					/*$tmp = round(atan2($k['keyv'][1],$k['keyv'][0]),3);
					$calcArray = array($k[0],$k[1],$tmp,$k[3]);
					$calcArray['size'] = $k['size'];
					
					$tpos = calculateNewPosition($rmtick-$rmBuffer[$j][count($rmBuffer[$j])-1][1], $calcArray);
					addlog("Calculated New Pos: (".$tpos[0].",".$tpos[1].")");
					$rmBuffer[$j][count($rmBuffer[$j])-1][1] = $rmtick; // Set the last time this buffer was accessed to current time. Makes ready for when a change to buffer comes, or next collision check.
					
					$k[0] = $tpos[0]; $k[1] = $tpos[1]; $k[2] = $tpos[2]; $k[3] = $tpos[3];*/
					//$send .= 'Bp'.pack('n',$j).pack('N',$rmBuffer[$j][$i][1]).pack('N',round($k[0]*1000)).pack('N',round($k[1]*1000)).pack('N',round(($k[2]+M_PI)*1000)).pack('n',$k[3]);
					
					$rmBuffer[$j] = array_slice($rmBuffer[$j],count($rmBuffer[$j])-1); // Save the last sent packet to use for the next buffer push
					//$rmBuffer[$j][0][1] = $rmtick; // Set the time last accessed of this buffer to current time
				} else {
					//addlog("Client $j is not a player.");
				}
			}
			
			
			
			
			// Actions based on time
			for ($i=0;$i<count($rm['emitters']);$i++) {
				if ($rmtick > $rm['emitters'][$i]['next']) {
					$tmp = array(randomInt($rm['emitters'][$i][0],$rm['emitters'][$i][2]),randomInt($rm['emitters'][$i][1],$rm['emitters'][$i][3]),randomInt($rm['enemies'][$rm['emitters'][$i]['type']]['hp']));
					$rm['emitters'][$i]['next'] = $rmtick + randomInt($rm['emitters'][$i]['frequency']);
					
					$num = count($rm['enemies'])-(count($rm['enemies']['types'])+1); // Don't take into account string indices on enemies when counting
					for ($j=0;$j<=$num;$j++) {
						if (!isset($rm['enemies'][$j])) {
							$k = $j; break; // Find the earliest zombie ID slot we can use
						}
					}
					//$j = count($rm['enemies'])-(count($rm['enemies']['types'])+1);
					$rm['enemies'][$k] = array(0=>$tmp[0],1=>$tmp[1],2=>0,3=>0,'type'=>$rm['emitters'][$i]['type'],'hp'=>$tmp[2],'maxhp'=>$tmp[2],'attack'=>array(0,0));
					$rmeHistory[$k] = array(array($rmtick,$tmp[0],$tmp[1],0,0));
					
					addlog('Sent zombie ['.$k.']:');
					$tmpType = max(array_search($rm['emitters'][$i]['type'],$rm['enemies']['types']),0); // Try to find this emitter type to spawn or default to 0
					$send .= 'Iz' . pack('n',$k) . pack('N',$rmtick) . pack('n',$tmp[0]) . pack('n',$tmp[1]) . pack('C',$tmpType) . pack('n',$tmp[2]); // Initiate zombie
				}
			}
			
			// Enemy tick
			foreach ($rm['enemies'] as $j => &$k) {
				if (is_numeric($j)) {
					if (isset($k['chasing'])) { // #REVISE: $rmeHistory must be constantly optimized to reduce memory usage
						$k[2] = round(atan2($rm['p'][$k['chasing']][1]-$k[1],$rm['p'][$k['chasing']][0]-$k[0]),3); // Set direction
						if (distanceBetween($k[0],$k[1],$rm['p'][$k['chasing']][0],$rm['p'][$k['chasing']][1]) > $rm['enemies'][$k['type']]['stopDistance']) {
							$k[3] = $rm['enemies'][$k['type']]['speed'];
							$k[0] += round(cos($k[2]) * $k[3] * $rmLastPush*0.001,3);
							$k[1] += round(sin($k[2]) * $k[3] * $rmLastPush*0.001,3);
							//$update = true;
							$rmeHistory[$j][] = array($rmtick,$k[0],$k[1],$k[2],$k[3]);
						} else {
							//if ($k[3] != 0) $update = true;
							if ($k[3] != 0) {
								addlog("FoolZombie $j stopped moving at ".$k[0].",".$k[1].".");
								$k[3] = 0;
								$rmeHistory[$j][] = array($rmtick,$k[0],$k[1],$k[2],$k[3]);
							} // Else, it's already 0, and stopped
							 // Stop moving if we are closer than the stopDistance
							
						}
					} else {
						foreach ($rm['p'] as $l => &$m) { // #REVISE: We should only check players that are physically nearby to enemy
							if (isset($m['game'])) { // Only set to chase if logged in to a game
								
								if (distanceBetween($k[0],$k[1],$m[0],$m[1]) < $rm['enemies'][$k['type']]['chaseRange']) { // Initiate chase
									//addlog("Well $j is now chasing $l");
									$k['chasing'] = $l; //Let client know this enemy is chasing them
									$send .= 'BZc' . pack('n',$l) . pack('N',$rmtick) . pack('n',$j);
									//addlog('Send:::'.$send);
									//break; // This break is really fucking things up. Game will lose complete sync. Later found in another foreach iteration, it might be a problem with using $l and $m as variables, as they are used again later for network send
									//addlog('Distance:'.distanceBetween($k[0],$k[1],$m[0],$m[1]).' <? '.$rm['enemies'][$k['type']]['chaseRange']);
								} else {
									//addlog('No Distance:'.round(distanceBetween($k[0],$k[1],$m[0],$m[1]),3).' <? '.$rm['enemies'][$k['type']]['chaseRange']);
								}
								
							}
						}
					}
				}
			}
			
			//Bullet operations
			foreach ($rm['bullets'] as $j => &$k) {
				if (is_numeric($j)) { // Only iterate over actual bullets
					//echo var_dump($k);
					
					//echo "Iterate".$j;
					$k['last'] = array($k[0],$k[1]);
					$k[0] = round($k[0]+cos($k[2]) * $k[3] * $rmLastPush*0.001,3);
					$k[1] = round($k[1]+sin($k[2]) * $k[3] * $rmLastPush*0.001,3);
					
					if ($k[0] < 0 || $k[1] < 0 || $k[0] > $rm['clientWidth'] || $k[1] > $rm['clientHeight']) { // Client bounds only for now
						//echo 'Removed bullet'.$j.'/::'.var_dump($rm['bullets'][$j]);
						unset($rm['bullets'][$j]);
					} else {
						// If the bullet is still around, lets check all collisions
						//echo ">BULLET:X:".$k[0].":Y:".$k[1]."<";
						
						$collisions = array();
						foreach ($rm['enemies'] as $n => &$o) {
							if (is_numeric($n)) {
								$rewind = array(); // This will be an array of the enemy where it was $usersDelay msecs ago
								//$usersDelay = 0; // We'll need to know the users delay from user[bulletOwner][delay]
								$usersDelay = $rm['p'][$k[4]]['lerp'];
								
								for ($i=count($rmeHistory[$n])-1;$i>=0;$i--) { // Start from the latest and movie back
									if ($rmeHistory[$n][$i][0] <= $rmtick-$usersDelay) { // Continue back through the array until we are at time of this user, and the currently iterated enemy
										$rewind = array(0,0,$rmeHistory[$n][$i][3],$rmeHistory[$n][$i][4]); // Same direction and speed
										$tmpdel = $rmtick-$usersDelay - $rmeHistory[$n][$i][0]; // Delta since this history point in time
										$rewind[0] = $rmeHistory[$n][$i][1] + cos($rmeHistory[$n][$i][3]) * $rmeHistory[$n][$i][4] * $tmpdel*0.001;
										$rewind[1] = $rmeHistory[$n][$i][2] + sin($rmeHistory[$n][$i][3]) * $rmeHistory[$n][$i][4] * $tmpdel*0.001;
										//////////echo '  |TICK'.$i.':'.$rmeHistory[$i][0].','.$rmeHistory[$i][1].','.$rmeHistory[$i][2].'|  ';
										//echo "\n\nPOSITION FOR $n AT TIME ".$rmtick."::".var_dump($rmeHistory[$n][$i])."\n\n";
										break;
									}
								}
								
								//These will throw undefined index errors if user makes an action at a time less than 0. (e.g. his delay is 3000 and $rmtick is only at 1000)
								
								$collide = false;
								@$rewind[0] -= $rm['enemies'][$o['type']][0]/2; // This will now contain the position of the enemy at currentTime MINUS
								@$rewind[1] -= $rm['enemies'][$o['type']][1]/2; // userDelay. Allowing for proper bullet hit detection
								@$rewind[2] = $rm['enemies'][$o['type']][0]; @$rewind[3] = $rm['enemies'][$o['type']][1];
								//if (isset($rewind[0])) echo "\nBOUNDS($n)::".$rewind[0].",".$rewind[1].",".$rewind[2].",".$rewind[3];
								
								if (isset($k['last'])) {
									$collide = colLineRect(array($k[0],$k[1],$k['last'][0],$k['last'][1]),$rewind);
								} else {
									$collide = posInBounds(array($k[0],$k[1]),$rewind);
								}
								
								/* if (isset($k['last'])) {
									$collide = colLineRect(array($k[0],$k[1],$k['last'][0],$k['last'][1]),array($o[0]-$rm['enemies'][$o['type']][0]/2,$o[1]-$rm['enemies'][$o['type']][1]/2,$rm['enemies'][$o['type']][0],$rm['enemies'][$o['type']][1]));
								} else {
									$collide = posInBounds(array($k[0],$k[1]),array($o[0]-$rm['enemies'][$o['type']][0]/2,$o[1]-$rm['enemies'][$o['type']][1]/2,$rm['enemies'][$o['type']][0],$rm['enemies'][$o['type']][1]));
								} */
								
								if ($collide) {
									//$collisions[] = $n;
									$collisions[] = array($n,distanceBetween($rm['p'][$k[4]][0],$rm['p'][$k[4]][1],$k[0],$k[1]));
									//break;
								}
							}
						}
						
						// Collision processing
						$penetrating = false; // Penetration will trigger damage on the same enemies more than once
						if (!!count($collisions)) { // If 1 or more collisions
							
							
							if ($penetrating) {
								for ($i=0;$i<count($collisions);$i++) {
									$rm['enemies'][$collisions[$i][0]]['hp'] -= randomInt($rm['bullets']['pistol']['damage']);
									$rm['enemies'][$collisions[$i][0]]['hp'] = max(0,$rm['enemies'][$collisions[$i][0]]['hp']); // Don't allow lower than 0
									
									//$send .= 'BZh'.pack('n',$collisions[$i][0]).pack('N',$rmtick-$usersDelay).pack('n',$rm['enemies'][$collisions[$i][0]]['hp']); // Send zombie health update [ID / TIME / HP]
									foreach ($rm['p'] as $p => &$q) { if (isset($q['game'])) {
										if (!isset($sendTo[$p])) $sendTo[$p] = '';
										$sendTo[$p] .= 'BZh'.pack('n',$collisions[$i][0]).pack('N',$rmtick-$usersDelay-$q['lerp']).pack('n',$rm['enemies'][$collisions[$i][0]]['hp']); // Send zombie health update [ID / TIME / HP]
									} }
									addlog("Bullet $j Collided with ID:".$collisions[$i][0]." (".$i.",".count($collisions).") making new hp ".$rm['enemies'][$collisions[$i][0]]['hp']);
									
									if ($rm['enemies'][$collisions[$i][0]]['hp'] <= 0) {
										$send .= createObject($rm['enemies'][$collisions[$i][0]][0],$rm['enemies'][$collisions[$i][0]][1],1001,$rmtick-$usersDelay);
										
										$val = randomInt(1,20);
										$rm['objects'][$rmLastID]['value'] = $val;
										
										//$send .= 'Io'.pack('n',$k).pack('N',$rmtick-$usersDelay).pack('n',$rm['enemies'][$collisions[$i][0]][0]).pack('n',$rm['enemies'][$collisions[$i][0]][1]).pack('n',1001));
										addlog("New money: ".print_r($rm['objects'][$rmLastID],true));
										
										unset($rm['enemies'][$collisions[$i][0]]); // Destroy zombie
										addlog("Zombie ".$collisions[$i][0]." destroyed");
									}
								}
							} else {
								$closest = array(0,$collisions[0][1]);
								for ($i=1;$i<count($collisions);$i++) {
									if ($collisions[$i][1] < $closest) {
										$closest = array($i, $collisions[$i][1]);
									}
								}
								$closest = $collisions[$closest[0]][0];
								
								$rm['enemies'][$closest]['hp'] -= randomInt($rm['bullets']['pistol']['damage']);
								$rm['enemies'][$closest]['hp'] = max(0,$rm['enemies'][$closest]['hp']); // Don't allow lower than 0
								
								//$send .= 'BZh'.pack('n',$collisions[$i]).pack('N',$rmtick-$usersDelay).pack('n',$rm['enemies'][$collisions[$i]]['hp']); // Send zombie health update [ID / TIME / HP]
								foreach ($rm['p'] as $p => &$q) { if (isset($q['game'])) {
									if (!isset($sendTo[$p])) $sendTo[$p] = '';
									$sendTo[$p] .= 'BZh'.pack('n',$closest).pack('N',$rmtick-$usersDelay-$q['lerp']).pack('n',$rm['enemies'][$closest]['hp']); // Send zombie health update [ID / TIME / HP]
								} }
								addlog("Bullet $j Collided with single target (".$closest.") making new hp ".$rm['enemies'][$closest]['hp']);
								
								if ($rm['enemies'][$closest]['hp'] <= 0) {
									$send .= createObject($rm['enemies'][$closest][0],$rm['enemies'][$closest][1],1001,$rmtick-$usersDelay);
										
									$val = randomInt(1,20);
									$rm['objects'][$rmLastID]['value'] = $val;
									
									//$send .= 'Io'.pack('n',$k).pack('N',$rmtick-$usersDelay).pack('n',$rm['enemies'][$collisions[$i][0]][0]).pack('n',$rm['enemies'][$collisions[$i][0]][1]).pack('n',1001));
									addlog("New money: ".print_r($rm['objects'][$rmLastID],true));
									
									unset($rm['enemies'][$closest]);
									addlog("Zombie ".$closest." destroyed");
								}
								
								unset($rm['bullets'][$j]); // Remove bullet, unless this is a penetrating round
							}
						}
						
					}
					
					
				}
			}
			
			/*_*/
			
			
			/*
			foreach ($rm['enemies'] as $j => &$k) {
				if (is_numeric($j)) { // Only operate on 'ACTUAL' enemies
					if (isset($k['chasing'])) {
						$update = false;
						$k[2] = round(atan2($rm['p'][$k['chasing']][1]-$k[1],$rm['p'][$k['chasing']][0]-$k[0]),3); // Set direction
						if (distanceBetween($k[0],$k[1],$rm['p'][$k['chasing']][0],$rm['p'][$k['chasing']][1]) > $rm['enemies'][$k['type']]['stopDistance']) {
							$k[3] = $rm['enemies'][$k['type']]['speed'];
							$k[0] += cos($k[2]) * $k[3] * $rmLastPush*0.001;
							$k[1] += sin($k[2]) * $k[3] * $rmLastPush*0.001;
							//$update = true;
						} else {
							//if ($k[3] != 0) $update = true;
							$k[3] = 0; // Stop moving if we are closer than the stopDistance
						}
						// ID, time, x, y, dir, speed
						echo '>'.$j.'Chasing ';
						if ($update) {
							//addlog('Send: '.$k[0].','.$k[1].','.$k[2].','.$k[3]);
							$send .= 'BZp' . pack('n',$j) . pack('N',$rmtick) . pack('N',round($k[0]*1000)) . pack('N',round($k[1]*1000)) . pack('N',round(($k[2]+M_PI)*1000)) . pack('n',$k[3]);
						}
					} else {
						//addlog('K chasing not set');
						foreach ($rm['p'] as $l => &$m) {
							if (isset($m['game'])) { // Only set to chase if logged in
								if (distanceBetween($k[0],$k[1],$m[0],$m[1]) < $rm['enemies'][$k['type']]['chaseRange']) { // Initiate chase
									$k['chasing'] = $l; break;
									addlog('Distance:'.distanceBetween($k[0],$k[1],$m[0],$m[1]).' <? '.$rm['enemies'][$k['type']]['chaseRange']);
								} else {
									addlog('No Distance:'.round(distanceBetween($k[0],$k[1],$m[0],$m[1]),3).' <? '.$rm['enemies'][$k['type']]['chaseRange']);
								}
							}
						}
					}
				}
			}
			*/
			
			
			
			if (!empty($send) || count($sendTo)>0) { // Send everything processed
				
				foreach ($rm['p'] as $l => $m) {
					if (isset($m['game'])) {
						//addlog('SEND  TO ('.$l.') >~'.$send);
						$tmpsend = '~'.$send;
						if (isset($sendTo[$l])) $tmpsend .= $sendTo[$l];
						send($tmpsend,$l,true);
					}
				}
				
				$sendTo = array(); // Buffer to store everything we're going to send to each player individually
				$send = ''; // String to store things we'll send to everyone
			}
        } // End conditional check for- game is running
		
        //addlog('FULLTEMP:'.$tmp);
        
            //send("s$rmSendCount", $sVars['observing']);
            //send("sSend count: $rmSendCount");
            //send("~P".pack("C",$rmSendCount), $sVars['observing'], true);
            
        $rmLastPush = 0; // Reset time since push
        $rmCount = 0; // Reset iterations per push
    } // End check for is this time to push
    
    if ($rmSCount >= 1000) {
		foreach ($rm['p'] as $l => &$m) {
			if (isset($m['game'])) {
				if (!isset($m['ping'])) { // Check and update latency
					$send .= '=';
					$m['ping'] = $rmtick; // Prepare to receive pong
				}
				$send .= 'Wl'.pack('n',$l).pack('n',$m['lerp']); // Send clients lerp out based on latency on next net push
				
				// Reset client variables that cause issues for server collision checking
				if ($GLOBALS['cVars'][$l]['name'] == 'reset') {
					$rmBuffer[$l] = array();
					$rmBuffer[$l][0] = array('=',0);
					
					//if (!isset($sendTo[$l])) $sendTo[$l] = '';
					//$sendTo[$l] .= 'Id'.pack('n',$l).pack('N',$rmtick); // Re-initialize the current game time on the net for this client
					
					addlog("HARD RESET PLAYER BUFFER");
				}
			}
		}
								
        $rmSendCount = 0; // Reset sends per second
        $rmSCount = 0; // Second timer
    }
}
/*** END RIGOR MORTIS SERVER LOOP ***/
function updateGameRunning() {
    global $rm;
    
    $rm['gameRunning'][0] = false;
    foreach ($rm['p'] as $i => $j) {
        if (isset($j['game'])) {
            $rm['gameRunning'][$j['game']] = true;
            break;
        }
    }
}
?>