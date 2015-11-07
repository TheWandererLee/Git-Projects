<html>
<head>
<title>ASP Page 1</title>
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

<form name="subName" method="post" action="formReceiver.asp">
Name: <input type="text" value="" name="name"><br>
Age: <input type="text" value="" name="age"><br>
<input type="submit" value="Submit">
</form>

<%
response.write("This is my ASP test website, nothing cool for you here")
response.write("<br>The time is " & time)
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