<?php
session_start();

$error = '';
$message = '';

if (@$_POST['do'] == 'logout') { unset($_SESSION['tagcmsuser']); header('Location: '.$_SERVER['REQUEST_URI']); exit(); }
if (@$_POST['do'] == 'login') {
    if ($_POST['u'] == 'admin' && $_POST['p'] == 'tagco13') { $_SESSION['tagcmsuser'] = 'admin'; }
    else { $error = 'BAD LOGIN'; }
}

if (@$_POST['do'] == 'saveRaw') {
    $handle = fopen('data.ini', 'w');
    $_POST['saveData'] = str_replace('<br>',"\r\n",$_POST['saveData']);
    $_POST['saveData'] = str_replace('<br/>',"\r\n",$_POST['saveData']);
    $_POST['saveData'] = str_replace('<br />',"\r\n",$_POST['saveData']);
    $_POST['saveData'] = str_replace('<div>',"\r\n",$_POST['saveData']);
    $_POST['saveData'] = strip_tags($_POST['saveData']);
    
    fwrite($handle,$_POST['saveData']);
    fclose($handle);
    $message .= 'Saved raw data to data.ini<br>';
} elseif (@$_POST['do'] == 'scanProduct') {
    //$fullPath = $_POST['productPath'].$_POST['product'];
    $fullPath = $_POST['productPath'];
    
    $fileHeaders = @get_headers($fullPath);
    if($fileHeaders[0] == 'HTTP/1.1 404 Not Found' || empty($fullPath)) {
        $scanData = "Error 404: Product not found at address:\r\n[".$fullPath."]\r\n\r\nPlease check your 'path' variable"; // File does not exist
    } else {
        $scanData = file_get_contents($fullPath); // Can access product ID with $_POST['product']. Needs to be parsed later
        $finalData = '';
        
        $tmp = strpos($scanData,'var productID=');
        if ($tmp === false) {
            $finalData .= "\r\n##ERROR! PRODUCT ID NOT FOUND IN THIS SCAN. Manually add product.";
        } else {
            $tmp+=14; $tmp = substr($scanData,$tmp,strpos($scanData,';',$tmp)-$tmp);
            $_POST['product'] = $tmp;
            
            $tmp = strpos($scanData,'<title>');
            if ($tmp === false) {
                $finalData .= "\r\n##ERROR! PRODUCT TITLE NOT FOUND IN THIS SCAN. Manually add product name."; $productName = 'Unknown';
            } else {
                $tmp+=7; $tmp = substr($scanData,$tmp,strpos($scanData,' -',$tmp)-$tmp);
                $productName = $tmp;
                $finalData .= "\r\npro|".$_POST['product']."|".$productName;
            }
        }
        
        $i=0; $j=0; $tmpLoc = array(array(),array());
        $tmpLoc[0] = array(strpos($scanData, 'choose-tags.png'),strpos($scanData, 'choose-chain-size.png'),strpos($scanData, 'choose-chain-colour.png'),strpos($scanData, 'type-on-tag'),strpos($scanData, 'choose-silencers-singletag.png'));
        $tmpLoc[1] = array('metals','chainSizes','chains','texts','silencers');

        array_multisort($tmpLoc[0], SORT_NUMERIC, SORT_ASC, $tmpLoc[1]);
        
        //$finalData .= var_export($tmpLoc,true);
        
        while ($j<count($tmpLoc[0])) {
            if (!$tmpLoc[0][$j]) { $finalData .= "\r\n##No \"".$tmpLoc[1][$j]."\" banner found for product ".$_POST['product']; $j++; continue; }
            if (in_array($tmpLoc[1][$j],array('chainSizes','silencers'))) { $finalData .= "\r\n##Dynamic option \"".$tmpLoc[1][$j]."\" disabled for product ".$_POST['product']; $j++; continue; }
            
            $i=$tmpLoc[0][$j]; //Set initial search point.
            $type=$tmpLoc[1][$j];
            
            $limit=($j==count($tmpLoc[0])-1?strlen($scanData):$tmpLoc[0][$j+1]);
            //$finalData.="\r\niteration ".$i.", type ".$type.",limit ".$limit.", and J:".$j;
            //$finalData.="\r\nFrom Dump:".var_export($tmpLoc,true)."\r\n\r\n\r\n\r\n";
            
            $grpFound = false;
            //$finalData .= "\r\nBeginning LOOP(".$i."<".$limit.") Count:".count($tmpLoc[0]);
            while($i<$limit) {
                $chunk = substr($scanData,$i,$limit-$i);
                if (in_array($type,array('metals','chains'))) { // Similarly handled chunk/option types
                    if ($type=='metals') $mod='tag'; else $mod='cha';
                    $found = strpos($chunk,'name="option_oc[');
                    if ($found !== false) {
                        if (!$grpFound) {
                            $finalData .= "\r\n".$mod."s|".$_POST['product']."|".substr($chunk,$found+16,strpos($chunk,']',$found+16)-($found+16)); // Group
                            $grpFound = true;
                            $i+=$found+16;
                        } else {
                            $found = strpos($chunk,'value="'); // Option BETTER HAVE a name= and value= attribute.
                            $tmpID = substr($chunk,$found+7,strpos($chunk,'"',$found+7)-($found+7)); // Stores option ID
                            $i+=$found+7;
                            $found = strpos($chunk,'<label',$found); // Option should have a following <label>. Searching for this after finding a name=
                            //$finalData .= "\r\nFound label at:".$found."\r\n(".substr($chunk,$found,strpos($chunk,'</label>',$found)-$found);
                            $tmpText = rtrim(strip_tags(substr($chunk,$found,strpos($chunk,'</label>',$found)-$found))); // Stores option text
                            $finalData .= "\r\n".$mod."|".$_POST['product']."|".$tmpID."|".$tmpText;
                            //$finalData .= "\r\nFound end at:".(strpos($chunk,'</label>',$found)+8);
                            $i+=strpos($chunk,'</label>',$found)+8;
                        }
                        
                        //$finalData.="\r\nfound";
                    } else {
                        $i = $limit; // End search through this chunk/type
                        //$finalData.="\r\n#not found";
                    }
                } elseif ($type=='texts') {
                    $found = strpos($chunk,'input name="option_oc[');
                    if ($found !== false) {
                        $finalData .= "\r\ntext|".$_POST['product']."|".substr($chunk,$found+22,strpos($chunk,']',$found+22)-($found+22)); // Textbox ID
                        $i+=$found+22;
                    } else $i = $limit;
                } else { // Not prepared for chunk type
                    $i = $limit;
                    $finalData.="\r\n#UNK CHUNK";
                }
            }
            
            $j++;
        }
        
        $scanData = $finalData;
    }
}

?>

<!DOCTYPE HTML>
<html><head>
<title>The Tag Company :: Tag CMS</title>
<style type="text/css">
    html { margin: 0; padding: 0; }
    body { margin: 32px 0; padding: 0; font-family: Verdana, Arial; font-size: 12px; background-color: #DDD; color: #111; }
    
    hr {
        border: 0;
        height: 1px;
        background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
        background-image:    -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
        background-image:     -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
        background-image:      -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
    }
    
    table {
        width: 100%;
    }
    td { border-top: 1px dashed #999; padding: 4px; }
    tr:first-child td { border-top: none;}
    
    .left { float: left; width: 640px; margin: 0 16px 32px; padding: 8px; background: #BBB; border-top: 1px solid #BBB; border-left: 1px solid #BBB; border-bottom: 1px solid #444; border-right: 1px solid #444; }
    .right { float: left; width: 360px; margin: 0 16px 32px; outline: 1px solid #000; }
    
    #saveRawBtn { padding: 4px 24px; }
    div.add { background: #DDD; padding: 4px; border-radius: 8px; border-top: 1px solid #BBB; border-left: 1px solid #BBB; border-bottom: 1px solid #444; border-right: 1px solid #444; }
    div.delete { background: #FAA; padding: 4px; border-radius: 8px; border-top: 1px solid #BBB; border-left: 1px solid #BBB; border-bottom: 1px solid #444; border-right: 1px solid #444; }
    div.scan { background: #FFA; padding: 4px; border-radius: 8px; border-top: 1px solid #BBB; border-left: 1px solid #BBB; border-bottom: 1px solid #444; border-right: 1px solid #444; }
    div.config { background: #ACF; padding: 4px; border-radius: 8px; border-top: 1px solid #BBB; border-left: 1px solid #BBB; border-bottom: 1px solid #444; border-right: 1px solid #444; }
    
    #rawData {
        text-align: left;
        font-family: Courier New, Courier, sans-serif;
        font-size: 14px;
        background: #FFF;
        border: 1px solid #999;
        margin: 4px;
        height: 512px;
        overflow-x: hidden;
        overflow-y: scroll;
    }
    #scanData {
        text-align: left;
        font-family: Courier New, Courier, sans-serif;
        font-size: 14px;
        background: #FFF;
        border: 1px solid #999;
        margin: 4px;
        height: 320px;
        overflow-x: hidden;
        overflow-y: scroll;
    }
    
    #textDivs { background: #BFB; }
    #chainDivs { background: #FBF; }
    #metalDivs { background: #FAA; }
    
    #tips {
        clear: both;
        font-size: 14px;
        font-family: Verdana;
        border: 1px solid #000;
        margin: 0 32px;
        padding: 16px;
        box-shadow: 0 0 8px #000;
        background: #EEE;
        display: none;
    }
    #tips li { line-height: 18px; }
    /*#tips ul { border-bottom: 1px solid #000; }*/
    
    form#logForm { margin: 0 auto; width: 512px; }
</style>
<script type="text/javascript">
    String.prototype.splice = function( idx, rem, s ) {
        return (this.slice(0,idx) + s + this.slice(idx + Math.abs(rem)));
    };
    var appendData = function() { };
    window.onload = function() {
        appendData = function(val) {
            var tmp = val.substr(0,4);
            if (tmp.substr(0,1) == '#') { val = '<i style="color:#0A0">'+val+'</i>'; }
            else if (tmp == 'pro|') { val = '<b>'+val+'</b>'; }
            else if (tmp == 'cfg|') { val = '<span style="background:#ACF">'+val+'</span>'; }
            else if (tmp == 'tags') { val = '<span style="background:#FCA">'+val+'</span>'; }
            else if (tmp == 'tag|') { val = '<span style="background:#FAA">'+val+'</span>'; }
            else if (tmp == 'chas') { val = '<span style="background:#E8E">'+val+'</span>'; }
            else if (tmp == 'cha|') { val = '<span style="background:#FBF">'+val+'</span>'; }
            else if (tmp == 'text') { val = '<span style="background:#BFB">'+val+'</span>'; }
            $('rawData').innerHTML += '<br>' + val;
            $('rawData').scrollTop = $('rawData').scrollHeight;
        }
        $('product').onchange = function() {
            var nodes = $('metalDivs').childNodes;
            for (var i=0;i<nodes.length;i++) {
                var tc = nodes[i];
                if (typeof tc.id != 'undefined') {
                    if (tc.id == 'metalDiv'+$('product').value) {
                        tc.style.display = 'inline';
                    } else { tc.style.display = 'none'; }
                }
            }
            
            var nodes = $('chainDivs').childNodes;
            for (var i=0;i<nodes.length;i++) {
                var tc = nodes[i];
                if (typeof tc.id != 'undefined') {
                    if (tc.id == 'chainDiv'+$('product').value) {
                        tc.style.display = 'inline';
                    } else { tc.style.display = 'none'; }
                }
            }
            
            $('addProductID').value = $('product').value;
        }
        
        $('add').onchange = function() {
            $('addSpan1').style.display = 'inline'; $('addID1').innerHTML = 'Product ID:';
            $('addSpan2').style.display = 'inline'; $('addID2').innerHTML = 'Group ID/Option #:';
            $('addSpan3').style.display = 'inline'; $('addName').innerHTML = 'Name:';
            switch ($('add').value) {
                case 'pro':
                    $('addSpan2').style.display = 'none'; break;
                case 'tags':
                    $('addSpan3').style.display = 'none'; break;
                case 'tag':
                    $('addID2').innerHTML = 'Tag ID:'; break;
                case 'chas':
                    $('addSpan3').style.display = 'none'; break;
                case 'cha':
                    $('addID2').innerHTML = 'Chain ID:'; break;
                case 'text':
                    $('addSpan3').style.display = 'none'; $('addID2').innerHTML = 'Textbox ID/Option #:'; break;
                case 'path':
                    $('addSpan1').style.display = 'none'; $('addSpan2').style.display = 'none'; $('addName').innerHTML = 'Path:'; break;
                case '#':
                    $('addSpan1').style.display = 'none'; $('addSpan2').style.display = 'none'; $('addName').innerHTML = 'Comment:'; break;
                default:
                    $('addSpan1').style.display = 'none'; $('addSpan2').style.display = 'none'; $('addSpan3').style.display = 'none'; break;
            }
        }
        
        $('rawData').onkeyup = function() {
            //colorCode();
        }
        
        $('cfgTagActions').onclick = function() { appendData('cfg|' + $('product').value + '|tagActions'); }
        $('cfgTagImage').onclick = function() { appendData('cfg|' + $('product').value + '|tagImage|' + $('txtTagImage').value); }
        $('cfgImagePath').onclick = function() { appendData('cfg|' + $('product').value + '|imagePath|' + $('txtImagePath').value); }
        $('cfgTextSize').onclick = function() { appendData('cfg|' + $('product').value + '|textSize|' + $('txtTextSize').value); }
        $('cfgTextColor').onclick = function() { appendData('cfg|' + $('product').value + '|textColor|' + $('txtTextColor').value); }
        $('cfgTextFont').onclick = function() { appendData('cfg|' + $('product').value + '|textFont|' + $('txtTextFont').value); }
        $('cfgTextLimit').onclick = function() { appendData('cfg|' + $('product').value + '|textLimit|' + $('txtTextLimit').value); }
        $('cfgTextboxLimit').onclick = function() { appendData('cfg|' + $('product').value + '|textLimit|' + $('txtTextboxLimit1').value + '|' + $('txtTextboxLimit2').value); }
        $('cfgTextShadow').onclick = function() {
            if ($('txtTextShadow1').value == '' && $('txtTextShadow2').value == '') {
                appendData('cfg|' + $('product').value + '|textShadow|none');
            } else {
                appendData('cfg|' + $('product').value + '|textShadow|' + $('txtTextShadow1').value + '|' + $('txtTextShadow2').value);
            }
        }
        $('cfgTextPosition').onclick = function() { appendData('cfg|' + $('product').value + '|textPosition|' + $('txtTextPosition1').value + '|' + $('txtTextPosition2').value); }
        $('cfgChainPosition').onclick = function() { appendData('cfg|' + $('product').value + '|chainPosition|' + $('txtChainPosition1').value + '|' + $('txtChainPosition2').value); }
        
        $('cfgTagTextColor').onclick = function() { appendData('cfg|' + $('product').value + '|tagTextColor|' + $('metal'+$('product').value).value + '|' + $('txtTagTextColor').value); }
        $('cfgTagTextShadow').onclick = function() { appendData('cfg|' + $('product').value + '|tagTextShadow|' + $('metal'+$('product').value).value + '|' + $('txtTagTextShadow1').value + '|' + $('txtTagTextShadow2').value); }
        
        colorCode();
        colorCode('scanData');
    }
    
    function colorCode(id) {
        if (typeof id == 'undefined') id = 'rawData';
        var i=0;
        
        var dataArray = $(id).innerHTML.split("<br>");
        for (var i=0;i<dataArray.length;i++) {
            var tmp = dataArray[i].substr(0,4);
            if (tmp.substr(0,1) == '#') { dataArray[i] = '<i style="color:#0A0">'+dataArray[i]+'</i>'; }
            else if (tmp == 'pro|') { dataArray[i] = '<b>'+dataArray[i]+'</b>'; }
            else if (tmp == 'cfg|') { dataArray[i] = '<span style="background:#ACF">'+dataArray[i]+'</span>'; }
            else if (tmp == 'tags') { dataArray[i] = '<span style="background:#FCA">'+dataArray[i]+'</span>'; }
            else if (tmp == 'tag|') { dataArray[i] = '<span style="background:#FAA">'+dataArray[i]+'</span>'; }
            else if (tmp == 'chas') { dataArray[i] = '<span style="background:#E8E">'+dataArray[i]+'</span>'; }
            else if (tmp == 'cha|') { dataArray[i] = '<span style="background:#FBF">'+dataArray[i]+'</span>'; }
            else if (tmp == 'text') { dataArray[i] = '<span style="background:#BFB">'+dataArray[i]+'</span>'; }
        }
        $(id).innerHTML = dataArray.join("<br>");
    }
    
    function addData() {
        if ($('add').value == '#') { appendData("#" + $('addLabel').value); }
        else if ($('add').value != '-') {
            var app = $('add').value
            +($('addSpan1').style.display=='none'?'':'|'+$('addProductID').value)
            +($('addSpan2').style.display=='none'?'':'|'+$('addItemID').value)
            +($('addSpan3').style.display=='none'?'':'|'+$('addLabel').value);
            appendData(app);
        }
        
        $('saveRawBtn').style.color = '#F00';
        setTimeout(function() { $('saveRawBtn').style.color = '#000'; }, 1000);
    }
    function deleteContents() {
        
    }
    function deleteProduct() {
        
    }
    function saveRaw() {
        $('do').value = 'saveRaw';
        $('saveData').value = $('rawData').innerHTML;
        $('tagForm').submit();
    }
    function scanProduct() {
        $('do').value = 'scanProduct';
        $('tagForm').submit();
        $('scanProductBtn').value = "Scanning product page... Please wait...";
        $('scanProductBtn').disabled = true;
    }
    function importScan() {
        $('rawData').innerHTML += $('scanData').innerHTML;
        $('rawData').scrollTop = $('rawData').scrollHeight;
    }
    
    function showTips() {
        $('tips').style.display = 'block';
        window.scroll(0,document.height);
    }
    
    function $(id) { return document.getElementById(id); }
</script>


<script type="text/javascript"> //Color Picker
function findPosX(e){var t=0;if(e.offsetParent){while(e.offsetParent){t+=e.offsetLeft;e=e.offsetParent}}else if(e.x)t+=e.x;return t}function findPosY(e){var t=0;if(e.offsetParent){while(e.offsetParent){t+=e.offsetTop;e=e.offsetParent}}else if(e.y)t+=e.y;return t}function showtab(e,t){sc=t;var n=document.getElementById("cv");var r=findPosX(n);var i=findPosY(n);var s=document.getElementById("tb");s.style.display="block";s.style.position="absolute";s.style.left=r+5;s.style.top=i+25;if(timer)clearTimeout(timer)}function showval(e,t,n){mouse="in";click="no";var r=document.getElementById("hx");var i=""+deciToHex(e)+deciToHex(t)+deciToHex(n);r.value=i;var s=document.getElementById("cv");s.style.backgroundColor="#"+i}function clicked(e,t,n){mouse="in";click="yes";var r=document.getElementById("hx");var i=""+deciToHex(e)+deciToHex(t)+deciToHex(n);r.value=i;var s=document.getElementById("cv");s.style.backgroundColor="#"+i;var o=document.getElementById("tb");o.style.display="none";ghex=r.value}function deltab(){timer=setTimeout("blotab()",500)}function deltaba(){mouse="out";timer=setTimeout("blotab()",500)}function blotab(){if(mouse=="out"&&click=="no"){var e=document.getElementById("tb");e.style.display="none";var t=document.getElementById("hx");t.value="FF33CC";var n=document.getElementById("cv");n.style.backgroundColor="#FF33CC"}if(mouse=="out"&&click=="yes"){var e=document.getElementById("tb");e.style.display="none";var t=document.getElementById("hx").value;var r=t.substr(0,2);var i=t.substr(2,2);var s=t.substr(4,2);var o=""+deciToHex(r)+deciToHex(i)+deciToHex(s);var n=document.getElementById("cv");n.style.backgroundColor="#"+o}if(mouse=="out"&&click=="no"&&ghex!="empty"){var e=document.getElementById("tb");e.style.display="none";var t=document.getElementById("hx");t.value=ghex;var n=document.getElementById("cv");n.style.backgroundColor="#"+ghex}}function getHexNum(e){ar1=new Array("0","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15");ar2=new Array("0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F");if(e>15)return e;else{red=ar2[e];return red}}function deciToHex(e){var t=999;args=e;while(args>15){arg1=parseInt(args/16);arg2=args%16;arg2=getHexNum(arg2);args=arg1;if(t==999)t=arg2.toString();else t=arg2.toString()+t.toString()}if(args<16&&t!=999){def=getHexNum(args);t=def+t.toString()}else if(t==999){if(args<16)t=getHexNum(args);else t=1}if(t.length==1)t="0"+t;return t}var mouse="out";var bName=navigator.appName;var bVer=parseInt(navigator.appVersion);var IE4=bName=="Microsoft Internet Explorer"&&bVer>=4;var click="no";var ghex="empty";var timer
</script>
</head>
<body>
    
<?php
    if (@$_SESSION['tagcmsuser'] == 'admin') {
        
        if (!@$data = file_get_contents("data.ini")) {
            $error .= 'Error reading data file. Please make sure data.ini is located in the public_html/tagcms/ folder. A blank file has been created for you there now.<br>';
            $data = "#TAG CMS FILE\r\n#BLANK FILE";
            $handle = fopen('data.ini', 'w');
            fwrite($handle,$data);
            fclose($handle); 
        }
        
        $i=0; $eol = 0;
        $products = array();
        $tags = array();
        $chains = array();
        $texts = array();
        
        while ($eol < strlen($data)) {
            if (substr($data,$i,1) == '#') { $i = strpos($data,"\r\n",$i)+2; continue; } // Skip comment lines starting with # (Code messes up here)
            $eol = strpos($data,"\r\n",$i); if ($eol === false) { $eol = strlen($data); }
            
            $op = explode('|',substr($data,$i,$eol-$i));
            
            //echo '<br><br>Pull From: "'.substr($data,$i,$eol-$i).'"';
            
            if ($op[0] == 'path') { $productPath = $op[1]; }
            if ($op[0] == 'pro') { $products[] = array($op[1],$op[2]); }
            
            if ($op[0] == 'tags') {
                if (!isset($tags[$op[1]])) $tags[$op[1]] = array();
                $tags[$op[1]]['div'] = $op[2]; // Div ID for tags
            }
            if ($op[0] == 'tag') {
                if (!isset($tags[$op[1]])) $tags[$op[1]] = array();
                $tags[$op[1]][] = array($op[2],$op[3]); // ID, Tag Metal Name
            }
            
            if ($op[0] == 'chas') {
                if (!isset($chains[$op[1]])) $chains[$op[1]] = array();
                $chains[$op[1]]['div'] = $op[2]; // Div ID for chains
            }
            if ($op[0] == 'cha') {
                if (!isset($chains[$op[1]])) $chains[$op[1]] = array();
                $chains[$op[1]][] = array($op[2],$op[3]); // ID, Chain Colour Name
            }
            
            if ($op[0] == 'text') {
                if (!isset($texts[$op[1]])) $texts[$op[1]] = array();
                $texts[$op[1]][] = $op[2]; // Textbox ID
            }
            
            $i = strpos($data,"\r\n",$i)+2;
            if (!strpos($data,"\r\n",$i)) break;
        }
    
?>

    
    <div style="margin: 0 16px;">You are currently logged in. Please <a href="#" onclick="document.getElementById('logForm').submit();">click here to logout</a> when you are finished.</div>
    <div style="margin: 0 16px;"><a href="#tips" onclick="showTips()">Click here</a> for information about using this CMS.</div>
    <?php if (!empty($message)) { echo '<br><br><b style="color:#0A0; margin-left: 128px">'.$message.'</b>'; } ?>
    <?php if (!empty($error)) { echo '<br><br><b style="color:#F00; margin-left: 128px">'.$error.'</b>'; } ?>
    
    <form id="tagForm" action="?" method="post">
        <br><div class="left">
            Select a Product: <select id="product" name="product">
                    <?php for ($i=0;$i<count($products);$i++) { echo '<option value="'.$products[$i][0].'"'.(@$_POST['product']==$products[$i][0]?' selected':'').'>'.$products[$i][1].' ['.$products[$i][0].']</option>'; } ?>
                </select>
            <br>Product URL: <input type="text" value="" name="productPath" size="50"><input type="button" id="scanProductBtn" value="Import Product by URL" onclick="scanProduct()">
            
            <div id="metalDivs">
                <?php
                    $first = true;
                    foreach ($tags as $key => $val) {
                        echo '<div id="metalDiv'.$key.'" style="display:'.($first?'inline':'none').'"><hr>'; $first=false;
                        if (isset($tags[$key]['div'])) echo 'Tag Metal, Group #'.$tags[$key]['div'];
                        echo '<select id="metal'.$key.'" name="metal'.$key.'">';
                        for ($i=0;$i<count($tags[$key])-1;$i++) {
                            echo '<option value="'.$tags[$key][$i][0].'">'.$tags[$key][$i][1].' ['.$tags[$key][$i][0].']</option>';
                        }
                        echo '</select><!--<input type="button" value="Delete Tag"><input type="button" value="Delete Entire Group">--></div>';
                    }
                ?>
                <div class="config">
                    <input type="button" id="cfgTagTextColor" value="Add"> Text Color for This Tag: #<input type="text" id="txtTagTextColor">
                    <br><input type="button" id="cfgTagTextShadow" value="Add" title="If one tag has a text shadow, they must all have a text shadow."> Text Shadow (2-Color) for This Tag: #<input type="text" id="txtTagTextShadow1"> &amp; #<input type="text" id="txtTagTextShadow2">
                </div>
            </div>
            
            <div id="chainDivs">
                <?php
                    $first = true;
                    foreach ($chains as $key => $val) {
                        echo '<div id="chainDiv'.$key.'" style="display:'.($first?'inline':'none').'"><hr>'; $first=false;
                        if (isset($chains[$key]['div'])) echo 'Chain Colour, Group #'.$chains[$key]['div'];
                        echo '<select id="chain'.$key.'" name="chain'.$key.'">';
                        for ($i=0;$i<count($chains[$key])-1;$i++) {
                            echo '<option value="'.$chains[$key][$i][0].'">'.$chains[$key][$i][1].' ['.$chains[$key][$i][0].']</option>';
                        }
                        echo '</select><!--<input type="button" value="Delete Chain"><input type="button" value="Delete Entire Group">--></div>';
                    }
                ?>
            </div>
            
            <div id="textDivs">
                <?php
                    $first = true;
                    foreach ($texts as $key => $val) {
                        echo '<div id="textDiv'.$key.'" style="display:'.($first?'inline':'none').'"><hr>'; $first=false;
                        echo 'Textbox IDs: ';
                        
                        echo '<select id="text'.$key.'" name="text'.$key.'">';
                        for ($i=0;$i<count($texts[$key]);$i++) {
                            echo '<option value="'.$texts[$key][$i].'">['.$texts[$key][$i].']</option>';
                        }
                        echo '</select></div>';
                    }
                ?>
            </div>
            
            <hr>
            
            <div class="add">
                Add a 
                <select id="add">
                    <option value="pro">Product</option><option value="tags">Tag Group</option><option value="tag">Tag</option>
                    <option value="chas">Chain Colour Group</option><option value="cha">Chain Colour</option>
                    <option value="text">Textbox</option><option value="-">-----</option>
                    <option value="#">Comment</option>
                </select>
                <!--<select id="addConfig">
                    <option value="">
                </select>-->
                <input type="button" onclick="addData()" value="Add" style="padding: 0 24px">
                <br>
                <span id="addSpan1"><span id="addID1">Product ID:</span> <input type="text" size="3" id="addProductID"<?php echo (isset($_POST['product'])?' value="'.$_POST['product'].'"':'') ?>></span>
                <span id="addSpan2" style="display: none;"><span id="addID2">Tag/Chain ID:</span> <input type="text" size="3" id="addItemID"></span>
                <span id="addSpan3"><span id="addName">Name:</span> <input type="text" size="20" id="addLabel"></span>
            </div>
            
            <hr>
                
            <div class="config">
                <input type="button" id="cfgTagActions" value="Add"> Enable Tag Actions
                <br><input type="button" id="cfgTagImage" value="Add"> Tag Image: <input type="text" id="txtTagImage" size="60">
                <br><input type="button" id="cfgImagePath" value="Add"> Image Path: <input type="text" id="txtImagePath" size="60">
                <br><input type="button" id="cfgTextSize" value="Add"> Text Size: <input type="text" id="txtTextSize" size="2">px
                <br><input type="button" id="cfgTextColor" value="Add"> Text Color: #<input type="text" id="txtTextColor" size="6">
                <br><input type="button" id="cfgTextFont" value="Add"> Text Font: <input type="text" id="txtTextFont" size="60">
                <br><input type="button" id="cfgTextLimit" value="Add"> Text Limit: <input type="text" id="txtTextLimit" size="2"> characters
                <br><input type="button" id="cfgTextboxLimit" value="Add"> Individual Textbox Limit: Textbox ID:<input type="text" id="txtTextboxLimit1" size="2">, Character Max:<input type="text" id="txtTextboxLimit2" size="2">
                <br><input type="button" id="cfgTextShadow" value="Add" title="Leave fields blank for NO text shadow"> Text Shadow (2-Color): #<input type="text" id="txtTextShadow1" size="6"> &amp; #<input type="text" id="txtTextShadow2" size="6">
                <br><input type="button" id="cfgTextPosition" value="Add"> Text Position: X(<input type="text" id="txtTextPosition1" size="2">px), Y(<input type="text" id="txtTextPosition2" size="2">px)
                <br><input type="button" id="cfgChainPosition" value="Add"> Chain Position: X(<input type="text" id="txtChainPosition1" size="2">px), Y(<input type="text" id="txtChainPosition2" size="2">px)
            </div>
            
            <hr>
            
            <!--<div class="delete">
                <input type="button" onclick="deleteContents()" value="Delete Product Contents" disabled="true"><input type="button" onclick="deleteProducts()" value="Delete Product" disabled="true">
            </div>-->
                
            <hr>
                
            <div class="scan">
                <div contenteditable name="scanData" id="scanData"><?php echo isset($scanData)?str_replace("\r\n",'<br>',$scanData):''; ?></div>
                <input type="button" value="Import Data ->" title="Click to append product scan data to the raw data text." style="vertical-align: top" onclick="importScan()">
                <input type="hidden" name="saveData" id="saveData" value="">
            </div>
        </div>
            
        <input type="hidden" name="do" id="do" value="nothing">
            
        <div class="right" style="text-align: center;">
            Raw data file:
            <br><div contenteditable name="rawData" id="rawData"><?php echo str_replace("\r\n",'<br>',$data); ?></div>
            <br><input type="button" value="Save Raw" style="padding: 16px 64px; font-size: 16px; font-weight: bold;" title="Click after each change to save it to the config.ini file." id="saveRawBtn" onclick="saveRaw()">
            <br><br><hr><br>
            <form name=colorform>
                Hex Value: #<input name=hexval id=hx value=FF33CC size=7></input><br>
                Color Picker: <input type=button size=20 value="Hover to Select Color" name=disp id=cv readonly onmouseover="showtab(event)"
                onmouseout="deltab()" style="background-color:#FF33CC;"></input><br><br>
                <div id=tb style="position: relative; margin-left: 4px; display: none;" onmouseout="deltaba()">
                <table cellpadding=2 cellspacing=0 style="border: 1px black;">
                <script type="text/javascript"> 
                    for(i=0;i<256;i+=85)
                    {
                        document.write("<tr style=\"border: 1px black;\">");
                        for(j=0;j<256;j=j+51)
                        {
                            for(k=0;k<256;k=k+25.5)
                            {
                                var ii = Math.round(i);
                                var jj = Math.round(j);
                                var kk = Math.round(k);
                                
                                if(ii == 255 && jj == 255 && kk == 255)
                                {
                                    document.write("<td onmouseover='showval("+ii+","+jj+","+kk+")' \
                                    onclick='clicked("+ii+","+jj+","+kk+")' style='border: 0px solid black; width:8px; height: 8px; background-color: rgb("+ii+","+jj+","+kk+");'> \
                                    </td>");
                            }else{
                                document.write("<td onmouseover='showval("+ii+","+jj+","+kk+")' \
                                onclick='clicked("+ii+","+jj+","+kk+")' style=\"border: 0px solid black; width:8px; height: 8px; \
                                font-size: 5px; background-color: rgb("+ii+","+jj+","+kk+");\""+"> </td>");
                                }
                            }
                            if (j==51||j==153) document.write("</tr><tr>");
                        }
                        document.write("</tr>");
    
                    }
                </script>
            </table>
            </div>
            </form>
        </div>
        <div class="left" style="width: 600px">
            <table>
                <tr><td>Command</td><td>Explanation</td></tr>
                <tr><td>pro|ID|NAME</td><td>Gives product with [ID] a name of [NAME]</td></tr>
                <tr><td>tags|PID|TID</td><td>Div with id of [TID] containing tag options for product [PID]</td></tr>
                <tr><td>tag|PID|TID|NAME</td><td>Tag option for [PID] with ID [TID] with name [NAME]</td></tr>
                <tr><td>chas|PID|CID</td><td>Div with id of [CID] containing chain options for product [PID]</td></tr>
                <tr><td>cha|PID|CID|NAME</td><td>Chain option for [PID] with ID [CID] with name [NAME]</td></tr>
                <tr><td>cfg|PID|tagActions</td><td>Turns tag actions (left, center align, etc.) on for product [PID]</td></tr>
                <tr><td>cfg|PID|textSize|SIZE</td><td>Sets text size to [SIZE] in pixels</td></tr>
                <tr><td>cfg|PID|textColor|COLOR</td><td>Sets text color to [COLOR] in 6 or 3 digit hexadecimal (e.g. FF00FF, C9F)</td></tr>
                <tr><td>cfg|PID|textFont|LOCATION</td><td>Sets text font to the file at [LOCATION]. Path relative to product. <i>Example: ../../../../../../../../../fonts/Univers55.ttf</i></td></tr>
                <tr><td>cfg|PID|textLimit|LIMIT</td><td>Sets textbox max length for all textboxed to [LIMIT]</td></tr>
                <tr><td>cfg|PID|textLimit|TEXTBOXID|LIMIT</td><td>Sets textbox max length for textbox [TEXTBOXID] to [LIMIT]</td></tr>
                <tr><td>cfg|PID|textShadow|COLOR1|COLOR2</td><td>Sets text shadow color for top left [COLOR1] and bottom right [COLOR2] of text. Use cfg|PID|textShadow|none for no shadow</td></tr>
                <tr><td>cfg|PID|textPosition|LEFT|TOP</td><td>Sets absolute X position [LEFT] and Y position [TOP] of text on tag generator</td></tr>
                <tr><td>cfg|PID|chainPosition|LEFT|TOP</td><td>Sets absolute X position [LEFT] and Y position [TOP] of chain on tag generator</td></tr>
                <tr><td>cfg|PID|tagImage|LOCATION</td><td>Sets default tag image. Path relative to product. <i>Example: cfg|42|tagImage|../../../../../../../../../images/get-your-tags/imported/engraved/dt_Black.png</i></td></tr>
                <tr><td>cfg|PID|imagePath|LOCATION</td><td>Appends this to image directory to pull tag images from. Path relative to default image path. <i>Example: cfg|42|imagePath|engraved/<i>
                <tr><td>cfg|PID|tagTextColor|TID|COLOR</td><td>Causes text to change to color [COLOR] when tag ID [TID] is selected.</td></tr>
                <tr><td>cfg|PID|tagTextShadow|TID|COLOR1|COLOR2</td><td>Causes text shadow to change to colors [COLOR1] &amp; [COLOR2] when tag ID [TID] is selected</td></tr>
                <tr><td>path|LOCATION</td><td>Sets the path for product scans. Product ID will be appended to the end of this path. <i>Example: path|http://thetagcompany.com.au/personal-id/mini-engraved-tag?</i></td></tr>
                <tr><td>#COMMENT</td><td>Comment lines (beginning with #) are for notes or omitting lines and will not be parsed by products.</td></tr>
            </table>
        </div>
        
        <!--<input type="hidden" name="productPath" value="<?php echo str_replace('"','',$productPath); ?>">-->
    </form>
    
    <form id="logForm" action="?" method="post"><input type="hidden" name="do" value="logout"></form>

    <div id="tips" name="tips">
        The text area in the center of the screen labeled Raw Data File is a direct reflection of the contents of the data.ini file. (Every product.tpl pulls its data from this file.)
        <br>No changes are saved to the data.ini file unless the "Save Raw" button is clicked and you note a green success message appearing at the top left of the screen.
        <br>Lines will be color coded only when the data is saved and reloaded, not realtime while editing
        <br>All colors are done in hexadecimal web RGB. Valid values are all hex values 000000-FFFFFF and 3 digit 000-FFF
        
        <h1>Adding a product</h1>
        <ol>
            <li>Copy/paste or enter the products URL into the top-left most textbox labeled "Product URL"</li>
            <li>Click Import Product by URL</li>
            <li>Suggested scanned data will appear in the text area below. You may choose to use any of these lines of data individually, all, or none of it.
                <ul>
                    <li>
                        <ol>
                            <li>To import every tag, chain, textbox, and product name that is found: click the "Import Data" button below the text area. This will append ALL data from this textarea into the "Raw Data File" textarea. This will not save the file.</li>
                            <li>Take care not to copy entire scans when the product already existed before. You may have duplicate entries. If the product already exists, follow the next set of steps instead.</li>
                        </ol>
                    </li>
                </ul>
                <ul>
                    <li>
                        <ol>
                            <li>To import only some options from a scan: If you have added only some new tag metal types or new chain types, you should manually copy lines from the textarea on the left to the raw data file text area on the right.</li>
                            <li>Highlight a single or multiple lines. Copy them. If you want to add only a few tags for example, add the lines that look like "tag|42|123|Copper", "tag|42|135|Shiny". Do not add lines that already exist in the raw data text area.</li>
                            <li>Find a suitable place in the raw data file text area where your lines will go (e.g. keep 'text' lines with 'text' lines) or just append them at the end of the file, on their own lines</li>
                            <li>Paste these lines into the raw data file text area.</li>
                        </ol>
                    </li>
                </ul>
            </li>
            <li>Click save raw data to save the file.</li>
        </ol>
        <h1>Removing a product</h1>
        <ol>
            <li>Find your product ID by locating the line starting with pro and ending with your products name. In this line "pro|42|Single Dog Tag": The product ID would be 42.</li>
            <li>Delete any lines in the raw data text area that contain your product ID as the second parameter. (e.g. cfg|42|tagActions, text|42|..., tag|42|...)</li>
        </ol>
        <h1>Changing text color/shadow when a tag is clicked</h1>
            <ul>
                <li>Select the product and tag you would like to change the text color of. Type the hex color value into the textbox labeled "Text Color For This Tag", then click Add on the left side of the label.</li>
                <li>Alternatively, you can do many manual line edits to the products by following the procedures below:</li>
                <ol>
                    <li>Locate the line in the raw data text area that matches your product and tag. If your product ID is 42 you will find your tag ID on a line like this: "tag|42|###|Maroon Red" where ### will be your tag ID</li>
                    <li>Use your product ID and tag ID to create a new tagTextColor configuration, which you will insert preferably after the tag's line mentioned in the previous step.</li>
                    <li>An example of the line you'll add: If your product ID is 42, tag ID is 123, and you want the text to be red you will add this line anywhere in the raw data text area: "cfg|42|tagTextColor|123|FF0000"</li>
                    <li>Individual tag text shadows are removed and are always a transparent white and transparent black. Text shadow for the entire tag can be turned off using the line "cfg|42|textShadow|none" if your product ID is 42</li>
                </ol>
                <li>Click save raw data file and check to see that when your tag is clicked, the text color changes to the color you wanted.</li>
            </ul>
        <h1>Configurations</h1>
        <ul>
            <li>For all configurations, select the product you would like it to apply to on the top left option drop-down labeled "Select a Product"</li>
            <li>For the tag specific configurations (shown only in the RED tag metal section), select the tag you would like the configuration to apply to</li>
        </ul>
        <div style="margin-left: 32px">
        <h2>Changing default tag image</h1>
        <ol>
            <li>Type the URL of the image <u>relative to the product.tpl file</u> or absolute you'd like to be first display into the textbox labeled "Tag Image"</li>
            <li>An example would be "../../../../../../../../../images/get-your-tags/imported/dt_Medical.png" or "http://website.com/images/get-your-tags/imported/dt_Medical.png"</li>
            <li>Click Add on the left side of this textbox. Click save raw data to save your changes. This image should load when the page loads for the product you currently have selected</li>
        </ol>
        </span>
    </div>
    
<?php } else { ?>

    <form id="logForm" action="?" method="post">
        <?php if (!empty($error)) { echo '<b style="color:#F00;">'.$error.'</b><br><br>'; } ?>
        <input type="hidden" name="do" value="login">
        Username:<input type="text" name="u">
        <br>Password:<input type="password" name="p">
        <br><input type="submit" value="Login">
    </form>
    
<?php } ?>

</body>
</html>