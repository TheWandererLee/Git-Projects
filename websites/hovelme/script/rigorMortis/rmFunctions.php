<?php
function createObject($x,$y,$t,$tt) {
	global $rm, $rmLastID;
	
	$num = count($rm['objects'])/*-(count($rm['enemies']['types'])+1)*/; // Search entire objects array. #REVISE: Don't search string indices
	for ($j=0;$j<=$num;$j++) {
		if (!isset($rm['objects'][$j])) {
			$k = $j; break; // Find the earliest object ID slot we can use
		}
	}
	
	$rm['objects'][$k] = array(0=>$x,1=>$y,'type'=>$rm['objects']['types'][$t]);
	
	addlog("Created object ID#".$k." of type ".$rm['objects']['types'][$t]);
	
	$rmLastID = $k;
	return 'Io'.pack('n',$k).pack('N',$tt).pack('n',$x).pack('n',$y).pack('n',$t); // Return a string to send object to clients
}
function collisionCheck($pos) {
	global $rmMap;
	
	$cu = 0;
	for ($a=0;$a<count($rmMap[$cu]);$a++) { // Cycle polygons
		$poly = $rmMap[$cu][$a];
		$newpos = false;
		$collisions = [];
		if (count($poly) == 4) { $poly = [$poly[0],$poly[1],$poly[0]+$poly[2],$poly[1],$poly[0]+$poly[2],$poly[1]+$poly[3],$poly[0],$poly[1]+$poly[3]]; }
		for ($b=0;$b<count($poly)-2;$b+=2) { // Cycle polygon segments
			//if (colLineLine([p['lastMove'][0],p['lastMove'][1],p[0],p[1]],[poly[j],poly[j+1],poly[j+2],poly[j+3]])) {
			$newpos = colLineCircle(array($poly[$b],$poly[$b+1],$poly[$b+2],$poly[$b+3]),array($pos[0],$pos[1],$pos['size'][0]/2),true);
			if (!!$newpos) { // Uses only player WIDTH to calculate radius of collision circle
				$collisions[] = $newpos;
				//p[0] = p['lastMove'][0]; p[1] = p['lastMove'][1]; // Freeze
				
				//p[0] = newpos[0]; p[1] = newpos[1]; // Slide
				//break start;
			}
		}
		
		//if (colLineLine([p['lastMove'][0],p['lastMove'][1],p[0],p[1]],[poly[poly.length-2],poly[poly.length-1],poly[0],poly[1]])) {
		$newpos = colLineCircle(array($poly[count($poly)-2],$poly[count($poly)-1],$poly[0],$poly[1]),array($pos[0],$pos[1],$pos['size'][0]/2),true);
		if (!!$newpos) {
			$collisions[] = $newpos;
			//p[0] = p['lastMove'][0]; p[1] = p['lastMove'][1]; // Freeze
			
			//p[0] = newpos[0]; p[1] = newpos[1]; // Slide
			//break start;
		}
		
		if (count($collisions) > 0) { // Calculates using all total collisions, an average of, to stop from entering corners
			$avg = array(0,0);
			for ($b=0;$b<count($collisions);$b++) {
				//p[0] = collisions[j][0]; p[1] = collisions[j][1];
				$avg[0] += $collisions[$b][0]; $avg[1] += $collisions[$b][1];
			}
			$avg[0] /= count($collisions); $avg[1] /= count($collisions);
			
			addlog("Colliding ".count($collisions)." times! Shift (".$pos[0].",".$pos[1].") to (".(round($avg[0]*1000)/1000).",".(round($avg[1]*1000)/1000).")");
			//addlog("Rewinding bc collided ".count($collisions)." times! Shift (".$pos[0].",".$pos[1].") to (".(round($avg[0]*1000)/1000).",".(round($avg[1]*1000)/1000).")");
			
			//$pos[0] = $pos[0] - round(cos($pos[2]) * $pos[3] * $delta*0.001,3);
			//$pos[1] = $pos[1] - round(sin($pos[2]) * $pos[3] * $delta*0.001,3);
			$pos[0] = round($avg[0]*1000)/1000; $pos[1] = round($avg[1]*1000)/1000;
			$pos['collision'] = true;
			
			//////$tbuff[3] = 0;
			//////$send .= 'Bp'.pack('n',$j).pack('N',$rmBuffer[$j][$i][1]).pack('N',round($newpos[0]*1000)).pack('N',round($newpos[1]*1000)).pack('N',round(($tbuff[2]+M_PI)*1000)).pack('n',$tbuff[3]);
		} else {
			// No collision, allow movement
			//////$send .= 'Bp'.pack('n',$j).pack('N',$rmBuffer[$j][$i][1]).pack('N',round($k[0]*1000)).pack('N',round($k[1]*1000)).pack('N',round(($tbuff[2]+M_PI)*1000)).pack('n',$tbuff[3]);
		}
	}
	return $pos;
}
/*function calculateNewPosition($delta, $pos) {
	global $rmMap;
	$truepos = array();
	////////////// POSITION CALCULATING ///////////////////////
	//$truepos[0] = $pos[0] + round(cos($pos[2]) * $pos[3] * $delta*0.001,3);
	//$truepos[1] = $pos[1] + round(sin($pos[2]) * $pos[3] * $delta*0.001,3);
	$truepos[0] = $pos[0]; $truepos[1] = $pos[1];
	$truepos[2] = $pos[2]; $truepos[3] = $pos[3];
	//$k[0] += round(cos($tmp) * $k[3] * ($rmBuffer[$j][$i][1]-$rmBuffer[$j][$i-1][1])*0.001,3); // Set xpos from oldx + oldDIR * oldSP * newdelta
	//$k[1] += round(sin($tmp) * $k[3] * ($rmBuffer[$j][$i][1]-$rmBuffer[$j][$i-1][1])*0.001,3); // Set ypos from ypos + (oldDIR * oldSP * (newdelta))
	
	//addlog(print_r($truepos,true));
	
	/////////// COLLISION CHECK WITH UPCOMING MOVEMENT ///////////
	$cu = 0; // currentGame FIXED to ZERO
	//start:
	for ($a=0;$a<count($rmMap[$cu]);$a++) { // Cycle polygons
		$poly = $rmMap[$cu][$a];
		$newpos = false;
		$collisions = [];
		if (count($poly) == 4) { $poly = [$poly[0],$poly[1],$poly[0]+$poly[2],$poly[1],$poly[0]+$poly[2],$poly[1]+$poly[3],$poly[0],$poly[1]+$poly[3]]; }
		for ($b=0;$b<count($poly)-2;$b+=2) { // Cycle polygon segments
			//if (colLineLine([p['lastMove'][0],p['lastMove'][1],p[0],p[1]],[poly[j],poly[j+1],poly[j+2],poly[j+3]])) {
			$newpos = colLineCircle(array($poly[$b],$poly[$b+1],$poly[$b+2],$poly[$b+3]),array($truepos[0],$truepos[1],$pos['size'][0]/2),true);
			if (!!$newpos) { // Uses only player WIDTH to calculate radius of collision circle
				$collisions[] = $newpos;
				//p[0] = p['lastMove'][0]; p[1] = p['lastMove'][1]; // Freeze
				
				//p[0] = newpos[0]; p[1] = newpos[1]; // Slide
				//break start;
			}
		}
		
		//if (colLineLine([p['lastMove'][0],p['lastMove'][1],p[0],p[1]],[poly[poly.length-2],poly[poly.length-1],poly[0],poly[1]])) {
		$newpos = colLineCircle(array($poly[count($poly)-2],$poly[count($poly)-1],$poly[0],$poly[1]),array($truepos[0],$truepos[1],$pos['size'][0]/2),true);
		if (!!$newpos) {
			$collisions[] = $newpos;
			//p[0] = p['lastMove'][0]; p[1] = p['lastMove'][1]; // Freeze
			
			//p[0] = newpos[0]; p[1] = newpos[1]; // Slide
			//break start;
		}
		
		if (count($collisions) > 0) { // Calculates using all total collisions, an average of, to stop from entering corners
			$avg = array(0,0);
			for ($b=0;$b<count($collisions);$b++) {
				//p[0] = collisions[j][0]; p[1] = collisions[j][1];
				$avg[0] += $collisions[$b][0]; $avg[1] += $collisions[$b][1];
			}
			$avg[0] /= count($collisions); $avg[1] /= count($collisions);
			
			addlog("Colliding ".count($collisions)." times! Shift (".$truepos[0].",".$truepos[1].") to (".(round($avg[0]*1000)/1000).",".(round($avg[1]*1000)/1000).")");
			//addlog("Rewinding bc collided ".count($collisions)." times! Shift (".$truepos[0].",".$truepos[1].") to (".(round($avg[0]*1000)/1000).",".(round($avg[1]*1000)/1000).")");
			
			//$truepos[0] = $pos[0] - round(cos($pos[2]) * $pos[3] * $delta*0.001,3);
			//$truepos[1] = $pos[1] - round(sin($pos[2]) * $pos[3] * $delta*0.001,3);
			$truepos[0] = round($avg[0]*1000)/1000; $truepos[1] = round($avg[1]*1000)/1000;
			
			//////$tbuff[3] = 0;
			//////$send .= 'Bp'.pack('n',$j).pack('N',$rmBuffer[$j][$i][1]).pack('N',round($newpos[0]*1000)).pack('N',round($newpos[1]*1000)).pack('N',round(($tbuff[2]+M_PI)*1000)).pack('n',$tbuff[3]);
		} else {
			// No collision, allow movement
			//////$send .= 'Bp'.pack('n',$j).pack('N',$rmBuffer[$j][$i][1]).pack('N',round($k[0]*1000)).pack('N',round($k[1]*1000)).pack('N',round(($tbuff[2]+M_PI)*1000)).pack('n',$tbuff[3]);
		}
	}
	///////////////////// END COLLISION CHECK //////////////////
	
	////////////// END POSITION CALCULATING ///////////////////////
	return $truepos;
}*/

function colLineLine($line1,$line2,$verbose=false) { // [x1,y1,x2,y2] , [x3,y3,x4,y4] :: Will return [x,y] if collision exists or false
    //var cd, ca, cb;
    //      y4       y3            x2       x1           x4       x3        y3        y2      // Slope differential
    $cd = ($line2[3]-$line2[1]) * ($line1[2]-$line1[0]) - ($line2[2]-$line2[0])*($line1[3]-$line1[1]);
    if ($cd != 0) {
        $ca = (($line2[2] - $line2[0]) * ($line1[1] - $line2[1]) - ($line2[3] - $line2[1]) * ($line1[0] - $line2[0])) / $cd; // Bezier (0-1 along $line2)
        $cb = (($line1[2] - $line1[0]) * ($line1[1] - $line2[1]) - ($line1[3] - $line1[1]) * ($line1[0] - $line2[0])) / $cd; // Bezier (0-1 along $line1)
        
		if ($verbose) { // Verbose checking will check entire lines as opposed to line segments. They WILL collide somewhere since they're not parallel
			// Returns [ intersection-X, intersection-Y, bezierLINE2, bezierLINE1, actualLINE2, actualLINE1 ]
			return array($line1[2]*$ca+$line1[0]*(1-$ca) , $line1[3]*$ca+$line1[1]*(1-$ca) , $ca , $cb );
		} else {
			if ($ca < 0 || $ca > 1 || $cb < 0 || $cb > 1) { return false; }
			
			//var cx, cy; // At this point we've already determined a collision, but, to return the exact point of collision, we can use either bezier...
			$cx = $line1[2]*$ca+$line1[0]*(1-$ca);
			$cy = $line1[3]*$ca+$line1[1]*(1-$ca);
			return array($cx,$cy);
		}
    } else {
        return false; // Lines are parallel. If endpoints of line 1 are inside of line 2, there is 1 or greater collisions
    }
}
function colLineRect($line,$rect) { // [x1,y1,x2,y2] , [x3,y3,w,h]
    $ret = false;
    $ret = (!!colLineLine($line,array($rect[0],$rect[1],$rect[0]+$rect[2],$rect[1]))?true:$ret); // Top edge
    $ret = (!!colLineLine($line,array($rect[0],$rect[1]+$rect[3],$rect[0]+$rect[2],$rect[1]+$rect[3]))?true:$ret); // Bottom edge
    $ret = (!!colLineLine($line,array($rect[0],$rect[1],$rect[0],$rect[1]+$rect[3]))?true:$ret); // Left edge
    $ret = (!!colLineLine($line,array($rect[0]+$rect[2],$rect[1],$rect[0]+$rect[2],$rect[1]+$rect[3]))?true:$ret); // Right edge
    return $ret; // True or false if collision
}
function colLineCircle($line,$circle,$slide) { // [x1,y1,x2,y2] , [x, y, r]
	if (!isset($slide)) { $slide = false; }
	$ret = false;
	
	//Find slope of original $line
	$mm = array($line[3]-$line[1],$line[2]-$line[0]);
	if ($mm[0] == 0) {
		$calcline = array($circle[0],0,$circle[0],1024); // Output will be a vertical $line
	} else if ($mm[1] == 0) {
		$calcline = array(0,$circle[1],1024,$circle[1]); // Output will be a horizontal $line
	} else {
		//Find negative reciprocal of slope of $line (perpendicular $line)
		$mm = (0-$mm[1] / $mm[0]);
		//Plug into y = mx + b to find y-intercept | $circle[1] = mm * $circle[0] + b
		$b = $circle[1] - ($mm * $circle[0]);
		//Create $line
		$calcline = array(0,$mm * 0 + $b,1024,$mm * 1024 + $b);
	}
	$is = colLineLine($line,$calcline,true); // Will return [xint, yint, bezier A($line2), bezier B($line1)] // Intersect
	
	if ($is[2] < 0 || $is[2] > 1 || $is[3] < 0 || $is[3] > 1) { // No collision
		if ($is[2] < 0) { // Collision with endpoint A
			if (distanceBetween($line[0],$line[1],$circle[0],$circle[1]) < $circle[2]) { $ret = array($line[0],$line[1]); }
		}
		else if ($is[2] > 1) { // Collision with endpoint B
			if (distanceBetween($line[2],$line[3],$circle[0],$circle[1]) < $circle[2]) { $ret = array($line[2],$line[3]); }
		}
		//cg.strokeStyle = '#666'; cg.beginPath(); cg.moveTo($calcline[0],$calcline[1]); cg.$lineTo($calcline[2],$calcline[3]); cg.stroke();
	} else { // Collision with the $line
		//cg.strokeStyle = '#F00'; cg.beginPath(); cg.moveTo($calcline[0],$calcline[1]); cg.$lineTo($calcline[2],$calcline[3]); cg.stroke();
		if (distanceBetween($circle[0],$circle[1],$is[0],$is[1]) < $circle[2]) {
			$ret = array($is[0],$is[1]);
		}
		//alert(is[2]+','+is[3]);
	}
	
	if (!!$ret) {
		if ($slide) { // Calculate the proposed position to remain entering collision zone if $slide is opted
			// This $slides using a push-away from the point
			$slid = atan2($circle[1]-$ret[1],$circle[0]-$ret[0]);
			addlog("Size(".$circle[2].") Recommending from ".$ret[0].",".$ret[1].": Dir: ".$slid);
			$slid = array($ret[0] + cos($slid) * $circle[2],$ret[1] + sin($slid) * $circle[2]);
			return $slid;
		} else { // Simply return that we've collided
			return !!$ret;
		}
	}
	return $ret; // Return. In the case of no collision
}

function randomInt($from, $to=false) {
    if ($to === false) {
        return rand($from[0],$from[1]);
    } else {
        return rand($from,$to);
    }
}

function distanceBetween($x1, $y1, $x2, $y2) {
    return sqrt(pow($x2-$x1,2) + pow($y2-$y1,2));
}

function posInBounds($pos,$bounds){ // Will return if pos lies within bounds :::: pos[x,y], bounds[left,top,width,height]
    return ($pos[0] >= $bounds[0] && $pos[1] >= $bounds[1] && $pos[0] <= $bounds[0]+$bounds[2] && $pos[1] <= $bounds[1]+$bounds[3])?true:false;
}
?>