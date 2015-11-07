<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Form Receiving ASP</title>

<style>
<!--
a {
font-size: 0;
}

body
{
background: url("images/4bg.bmp");
background-attachment: fixed;
color: white;
}
//-->
</style>
</head>

<body>

<%
response.write("Hello " & request.form("name") & ", you are " & request.form("age") & " years old.")
%>
<!-- Start of StatCounter Code -->
<script type="text/javascript" language="javascript">
var sc_project=1051711; 
var sc_invisible=1; 
var sc_partition=6; 
var sc_security="481a27d2"; 
</script>
<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/frames.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img  src="http://c7.statcounter.com/counter.php?sc_project=1051711&amp;java=0&amp;security=481a27d2&amp;invisible=1" alt="web page hit counter" border="0"></a> </noscript>
<!-- End of StatCounter Code -->
</body>
</html>
