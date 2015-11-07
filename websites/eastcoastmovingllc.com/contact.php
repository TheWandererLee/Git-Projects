<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style type="text/css">
    html, body, div, span, applet, object, iframe,
    h1, h2, h3, h4, h5, h6, p, blockquote, pre,
    a, abbr, acronym, address, big, cite, code,
    del, dfn, em, img, ins, kbd, q, s, samp,
    small, strike, strong, sub, sup, tt, var,
    b, u, i, center,
    dl, dt, dd, ol, ul, li,
    fieldset, form, label, legend,
    table, caption, tbody, tfoot, thead, tr, th, td,
    article, aside, canvas, details, embed, 
    figure, figcaption, footer, header, hgroup, 
    menu, nav, output, ruby, section, summary,
    time, mark, audio, video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
    }
    /* HTML5 display-role reset for older browsers */
    article, aside, details, figcaption, figure, 
    footer, header, hgroup, menu, nav, section {
            display: block;
    }
    body {
            line-height: 1;
    }
    ol, ul {
            list-style: none;
    }
    blockquote, q {
            quotes: none;
    }
    blockquote:before, blockquote:after,
    q:before, q:after {
            content: '';
            content: none;
    }
    table {
            border-collapse: collapse;
            border-spacing: 0;
    }
            
    body { background: none transparent; text-align: center; font-family: Verdana, sans-serif; font-size: 16px; }
    h1 { font-size: 28px; font-family: Georgia, serif; margin-bottom: 12px; }
        
    input, textarea, input[type=submit]:hover { color: #000; background: #CCC; border: 1px solid #000; border-bottom: #FFF; border-right: #FFF; font-size: 16px; font-weight: bold; border-radius: 4px; text-shadow: -1px -1px 1px #FFF; }
    input, textarea { padding: 2px; }
    input[type=submit] { cursor: pointer; padding: 8px 32px; border: 1px solid #000; border-top: #FFF; border-left: #FFF; }
    
    textarea { width: 400px; height: 128px; font-family: Verdana, sans-serif; font-size: 12px; }
    </style>
</head>
<body>
    <?php
        $error = ''; $sent = false; $name = 'Name'; $email = 'your@email.address'; $message = '';
        $math1 = rand(0,5);
        $math2 = rand(0,5);
        if (isset($_POST['check'])) {
            if ((int)ord($_POST['check']) == (int)$_REQUEST['answer']*2+3) {
                $msg = strip_tags(stripslashes($_POST['message']));
                //$msg = str_replace("\r\n", "<br>", $msg);
                //$msg = str_replace("\r", "<br>", $msg);
                //$msg = str_replace("\n", "<br>", $msg);
                
                echo '<h1>Thanks!</h1>Your message was sent.';
                echo '<br><br>Name: '.strip_tags(stripslashes($_POST['name'])).' ('.$_POST['email'].')';
                echo '<br><br><u>Message</u><br>'.$msg;
                
                $headers = "From: " . strip_tags($_POST['email']) . "\r\n";
                $headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
                
                mail('carriedewittpartello@gmail.com', 'Website message from '.$_POST['name'],
                     /*'The message below was generated from the contact form on <a href="http://www.eastcoastmovingllc.com">www.eastcoastmovingllc.com</a><br><br><b>Name: </b>'.strip_tags(stripslashes($_POST['name'])).
                     '<br><b>Email: </b>'.strip_tags($_POST['email']).
                     '<br><b>IP Address: </b>'.$_SERVER['REMOTE_ADDR'].
                     '<br><br><b style="border: 1px solid #000">Message</b><br><div style="border: 1px solid #666">'.$msg.'</div>'.
                     '<br><br>---------------<br><br>'.
                     'HTTP_USER_AGENT: '.$_SERVER['HTTP_USER_AGENT'], $headers);*/
                     
                     "The message below was generated from the contact form on http://www.eastcoastmovingllc.com\r\n\r\n".
                     "Email: ".strip_tags($_POST['email'])."\r\n".
                     "IP Address: ".$_SERVER['REMOTE_ADDR']."\r\n".
                     "Message:\r\n\r\n".$msg."\r\n\r\n".
                     "------------------------\r\n".
                     "USER AGENT: ".$_SERVER['HTTP_USER_AGENT'], $headers);
                
                $sent = true;
                exit();
            } else {
                $error = 'Incorrect answer.';
                $name = stripslashes($_POST['name']);
                $email = stripslashes($_POST['email']);
                $message = stripslashes($_POST['message']);
            }
        }
        
        if (!$sent) {
    ?>
        <h1>Contact us Immediately!</h1>
        <?php if (!empty($error)) { echo '<h2 style="color: #F00">'.$error.'</h2>'; } ?>
        <form action="contact.php" method="post">
            <input type="text" name="name" value="<?php echo $name; ?>" onfocus="this.value=(this.value=='Name'?'':this.value)" onblur="this.value=(this.value==''?'Name':this.value)">
            <br><input type="text" name="email" value="<?php echo $email; ?>" onfocus="this.value=(this.value=='your@email.address'?'':this.value)" onblur="this.value=(this.value==''?'your@email.address':this.value)">
            <br><br>Message
            <br><?php echo '<textarea name="message">' . $message . '</textarea>'; ?>
            <br>
            <br><?php echo $math1 . ' + ' . $math2 . ' = '; ?><input type="text" name="answer">
            <br><br><input type="submit" value="Send Message">
            <input type="hidden" name="check" value="<?php echo chr(($math1+$math2)*2+3); ?>">
        </form>
    <?php } ?>
</body>
</html>