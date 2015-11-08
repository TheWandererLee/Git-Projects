<?php
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: http://www.kingfishband.com");
    exit();
}

session_start();
if (@$_POST['u'] == 'kfadmin' && @$_POST['p'] == 'REXpisces@2288') { $_SESSION['loggedin'] = true; }

if (isset($_POST['save'])) {
    $_POST['content'] = str_replace(chr(10),'',$_POST['content']);
    
    if (!empty($_POST['content'])) {
        file_put_contents('events.txt',$_POST['content']);
        
        $output = 'var myConcerts = [{';
        
        $prefixes = array(chr(13).chr(10).'year','month','day','hour','minute','latitude','longitude','location','infoWindow');
        
        $rows = explode(chr(13),$_POST['content']);
        for($i=0;$i<count($rows);$i++) {
            $rows[$i] = explode(';',$rows[$i]);
            for ($j=0;$j<9;$j++) { // Number of elements should always be 9
                if ($j>=7) { // 7 and 8 need to be strings
                    //$rows[$i][$j] = $prefixes[$j].":'".str_replace("'","\'",str_replace("\\","\\\\",$rows[$i][$j]))."'";
                    $rows[$i][$j] = $prefixes[$j].":'".$rows[$i][$j]."'";
                } else {
                    $rows[$i][$j] = $prefixes[$j].":".$rows[$i][$j];
                }
            }
            
            $rows[$i] = implode(','.chr(13).chr(10),$rows[$i]);
        }
        $output .= implode('},'.chr(13).chr(10).'{',$rows);
        
        $output .= '}];';
    } else { $output = 'var myConcerts = [];'; }
    
    $recentlySaved = file_put_contents('../js/google_maps_marker/myconcerts.js', $output);
}
?>
<!DOCTYPE html>
<html>
    <head><title>Kingfish Band Admin</title>
    <script type="text/javascript" language="javascript">
        //var contents = "<?php if ($_SESSION['loggedin']) { echo str_replace(chr(10),'',str_replace(chr(13),'"+String.fromCharCode(10)+"',str_replace('"','\"',str_replace('\\','\\\\',file_get_contents('events.txt'))))); } ?>";
        var contents = "<?php if ($_SESSION['loggedin']) { echo str_replace(chr(10),'',str_replace(chr(13),'"+String.fromCharCode(10)+"',file_get_contents('events.txt'))); } ?>";
        
        window.onload = function() {
            document.getElementById('content').innerHTML = contents;
        }
    </script>
    <style type="text/css">
        textarea, .text { margin: 0 4px; padding: 0 4px; border: 1px solid #000; width: 1200px; font-size:14px; font-family: Courier New, Courier, monospace; line-height: 18px; }
        .text {border-color:#FFF;}
        textarea { white-space: pre;
            word-wrap: normal;
            overflow-x: scroll; }
    </style>
    </head>
    <body>
<?php
    if (isset($_SESSION['loggedin'])) {
        
        if (isset($recentlySaved)) { echo '<span style="font-weight:bold;color:#0A0;font-size:24px;border:3px #0A0 solid;">Successfully saved events. Filesize: '.$recentlySaved.' bytes.</span>'; }
?>
    <form action="index.php" method="post">
        
        <div class="text">
            <br>Get Latitude/Longitude from Google Maps:
            <br><img src="latlong.png">
            <br>Format Example: 2014;03;21;18;00;36.0755043;-95.9302041;Bourbon Street Cafe;Concert at &lt;b&gt;Bourbon Street Cafe&lt;/b&gt;&lt;br&gt;Be there at 6PM!
            <br>Exactly one entry per line, values separated by semicolon (;), HTML allowed in last 2 values (e.g. &lt;u&gt;For Underline&lt;/u&gt;)
            <br>
            <br><b>Year;Mo;Da;Ho;Mi;Longitude;Latitude;Location;Additional Information</b>
        </div>
        <div id="rows">
            <textarea rows="20" cols="100" id="content" name="content" wrap="off"></textarea>
        </div>
        <input type="hidden" name="save" value="y">
        <input type="submit" value="Save Changes" style="padding: 12px 64px 12px 64px;">
    </form>
    <br>
    <form action="index.php" method="post">
        <input type="hidden" name="logout" value="yes">
        <input type="submit" value="Logout">
    </form>
<?php
    } else {
?>
    <form action="index.php" method="post">
        Username: <input type="text" name="u" size="16">
        <br>Password: <input type="password" name="p" size="16">
        <br><input type="submit" value="Login">
    </form>
<?php } ?>
    </body>
</html>