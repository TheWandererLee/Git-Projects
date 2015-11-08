<html>
<head>
<title>Tooltip Test</title>
<style type="text/css">
body { font-family: verdana, arial, helvetica, sans-serif;
  font-size: 14px; }
h1 { font-size:18px }	
a:link { color:#33c }	
a:visited { color:#339 }	

/* Tooltip Appearance */
div#tipDiv {
  position:absolute; visibility:hidden; left:0; top:0; z-index:10000;
  background-color:#dee7f7; border:1px solid #336; 
  width:250px; padding:4px;
  color:#000; font-size:11px; line-height:1.2;
}
</style>
<script src="scripts/dw_event.js" type="text/javascript"></script>
<script src="scripts/dw_viewport.js" type="text/javascript"></script>
<script src="scripts/dw_tooltip.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
function doTooltip(e, msg) {
  if ( typeof Tooltip == "undefined" || !Tooltip.ready ) return;
  Tooltip.show(e, msg);
}

function hideTip() {
  if ( typeof Tooltip == "undefined" || !Tooltip.ready ) return;
  Tooltip.hide();
}
//-->
</script>
</head>
<body onload="Tooltip.init()">

<h1>Tooltip Test</h1>

<br />
<?php
echo "This is <a href=\"your.html\" onmouseover=\"doTooltip(event,'Check out www.cafepress.com<br />Text and images work in here<br /><img src=\'pictures/decpaint/tn_" . mt_rand(1, 31) . ".jpg\' />')\" onmouseout=\"hideTip()\">a tooltip</a> test.";
?>

</body>
</html>
