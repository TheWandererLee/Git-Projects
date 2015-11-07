<?php
    if (!isset($_POST['validate'])) {
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    }
    if (get_magic_quotes_gpc()) { // Removes extranneous slashes that will be sent out
        $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
        while (list($key, $val) = each($process)) {
            foreach ($val as $k => $v) {
                unset($process[$key][$k]);
                if (is_array($v)) {
                    $process[$key][stripslashes($k)] = $v;
                    $process[] = &$process[$key][stripslashes($k)];
                } else {
                    $process[$key][stripslashes($k)] = stripslashes($v);
                }
            }
        }
        unset($process);
    }
    
    
    function app($txt) {
        global $msg;
        $msg .= "\r\n" . $txt;
    }
    
    function makeSafe($input) {
        $output = htmlspecialchars($input); // Not using htmlentities so &=>&amp; and "=>&quot; is not converted.
        $output = str_replace(' ','&nbsp;',$output);
        return $output;
    }

    if ($_POST['chainType2'] == 'none') {
        $safeVars = array('name','ebayname','email','tagType','silencerType1','chainType1','tag1Text1','tag1Text2','tag1Text3','tag1Text4','tag1Text5','comments');
    } else {
        $safeVars = array('name','ebayname','email','tagType','silencerType1','chainType1','tag1Text1','tag1Text2','tag1Text3','tag1Text4','tag1Text5','silencerType2','chainType2','tag2Text1','tag2Text2','tag2Text3','tag2Text4','tag2Text5','comments');
    }
    
    for ($i=0;$i<count($safeVars);$i++) {
        $_POST[$safeVars[$i]] = makeSafe($_POST[$safeVars[$i]]);
    }
    
    $headers = "From: crickystags.com\r\n" .
    "Content-type: text/html; charset=utf-8\r\n" .
    "Reply-to: " . $_POST['email'] . "\r\n" .
    //"Cc: D@ryll.in\r\n" .
    'X-Mailer: PHP/' . phpversion();
    $msg = '';
    
    date_default_timezone_set('UTC');
    
    if ($_POST['chainType2'] != 'none') { // Pair of Tags Order
        app('<u>Tag (Pair) Order Details</u> - Requested at: ' . date("D F j, Y, g:ia") . ' (UTC)');
        app('<br><br><table style="width: 512px; border: 1px #BBB solid; padding: 4px; font-family: Courier New, Courier, sans-serif; font-size: 13px;"><tr><td style="text-align: right; width: 50%">Full Name:</td><td style="width: 50%">'.$_POST['name'].'</td></tr>');
        app('<tr><td style="text-align: right;">Ebay Username:</td><td><a href="http://myworld.ebay.com/'.$_POST['ebayname'].'">'.$_POST['ebayname'].'</a></td></tr>');
        app('<tr><td style="text-align: right;">Email Address:</td><td><a href="mailto:'.$_POST['email'].'">'.$_POST['email'].'</a></td></tr>');
        app('<tr><td style="text-align: right;">Tag Type:</td><td>'.$_POST['tagType'].'</td></tr>');
        app('<tr><td style="text-align: center">TAG ONE</td><td style="text-align: center">TAG TWO</td></tr>');
        app('<tr><td style="text-align: center">SILENCER: '.$_POST['silencerType1'].'</td><td style="text-align: center">SILENCER: '.$_POST['silencerType2'].'</td></tr>');
        app('<tr><td style="text-align: center">12" CHAIN: '.$_POST['chainType1'].'</td><td style="text-align: center">12" CHAIN: '.$_POST['chainType2'].'</td></tr>');
        app('<tr><td style="text-align: center">-------------</td><td style="text-align: center">-------------</td></tr>');
        app('<tr><td style="text-align: center">DT1_L1: ['.$_POST['tag1Text1'].']</td><td style="text-align: center">DT2_L1: ['.$_POST['tag2Text1'].']</td></tr>');
        app('<tr><td style="text-align: center">DT1_L2: ['.$_POST['tag1Text2'].']</td><td style="text-align: center">DT2_L2: ['.$_POST['tag2Text2'].']</td></tr>');
        app('<tr><td style="text-align: center">DT1_L3: ['.$_POST['tag1Text3'].']</td><td style="text-align: center">DT2_L3: ['.$_POST['tag2Text3'].']</td></tr>');
        app('<tr><td style="text-align: center">DT1_L4: ['.$_POST['tag1Text4'].']</td><td style="text-align: center">DT2_L4: ['.$_POST['tag2Text4'].']</td></tr>');
        app('<tr><td style="text-align: center">DT1_L5: ['.$_POST['tag1Text5'].']</td><td style="text-align: center">DT2_L5: ['.$_POST['tag2Text5'].']</td></tr>');
        app('</table>');
        
        app('<br>Comments: <span style="border: 1px #BBB solid">'.$_POST['comments'].'</span>');
        
        app('<br><br><span style="color: #666; font-style: italic;">This dog tag request generated by tagSubmit.php @ <a href="http://www.crickystags.com/">www.crickystags.com</a></span>');
        
        mail('liamcrick@hotmail.com', 'Tag Order - '.str_replace('&nbsp;',' ',$_POST['name']).' ('.$_POST['ebayname'].')', $msg, $headers);
    } else { // Single Tag Order
        app('<u>Tag (Single) Order Details</u> - Requested at: ' . date("D F j, Y, g:ia") . ' (UTC)');
        app('<br><br><table style="width: 512px; border: 1px #BBB solid; padding: 4px; font-family: Courier New, Courier, sans-serif; font-size: 13px;"><tr><td style="text-align: right; width: 50%">Full Name:</td><td style="width: 50%">'.$_POST['name'].'</td></tr>');
        app('<tr><td style="text-align: right;">Ebay Username:</td><td><a href="http://myworld.ebay.com/'.$_POST['ebayname'].'">'.$_POST['ebayname'].'</a></td></tr>');
        app('<tr><td style="text-align: right;">Email Address:</td><td><a href="mailto:'.$_POST['email'].'">'.$_POST['email'].'</a></td></tr>');
        app('<tr><td style="text-align: right;">Tag Type:</td><td>'.$_POST['tagType'].'</td></tr>');
        app('<tr><td style="text-align: center">TAG ONE</td><td style="text-align: center">TAG TWO</td></tr>');
        app('<tr><td style="text-align: center">SILENCER: '.$_POST['silencerType1'].'</td></tr>');
        app('<tr><td style="text-align: center">CHAIN: '.$_POST['chainType1'].'</td></tr>');
        app('<tr><td style="text-align: center">-------------</td><td style="text-align: center">-------------</td></tr>');
        app('<tr><td style="text-align: center">DT1_L1: ['.$_POST['tag1Text1'].']</td></tr>');
        app('<tr><td style="text-align: center">DT1_L2: ['.$_POST['tag1Text2'].']</td></tr>');
        app('<tr><td style="text-align: center">DT1_L3: ['.$_POST['tag1Text3'].']</td></tr>');
        app('<tr><td style="text-align: center">DT1_L4: ['.$_POST['tag1Text4'].']</td></tr>');
        app('<tr><td style="text-align: center">DT1_L5: ['.$_POST['tag1Text5'].']</td></tr>');
        app('</table>');
        
        app('<br>Comments: <span style="border: 1px #BBB solid">'.$_POST['comments'].'</span>');
        
        app('<br><br><span style="color: #666; font-style: italic;">This dog tag request generated by tagSubmit.php @ <a href="http://www.crickystags.com/">www.crickystags.com</a></span>');
        
        mail('liamcrick@hotmail.com', 'Single Tag Order - '.str_replace('&nbsp;',' ',$_POST['name']).' ('.$_POST['ebayname'].')', $msg, $headers);
    }
    
    
    
    
    
    
    if (!empty($_SERVER['HTTP_REFERER'])) {
        echo '<meta http-equiv="refresh" content="5;url=' . $_SERVER['HTTP_REFERER'] . '">';
    }
    echo '<center>Your order was submitted successfully!<br>You will be redirected back in a few seconds.<br><br>If not, <a href="'.$_SERVER['HTTP_REFERER'].'">click here</a> to go back.</center>';
?>