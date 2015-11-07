<html>
<head>
<title></title>
<meta name="Generator" content="Matizha Sublime 3.2">
<meta name="Description" content="Webpage used for requesting files without actually having to visit the website.">
<meta name="Keywords" content="request, files, website, other">

<script language="JavaScript">
<!--

//-->
</script>

<style>
<!--
body
{
background: url("images/4bg.bmp");
background-attachment: fixed;
color: white;
}

a:visited
{
color: white;
}

h1
{
font-family: Monotype Corsiva;
font-size: 400%;
}

a:hover
{
color: red;
}

i {
font-size: 0;
}
//-->
</style>

</head>
<body>

<!--File Search Database-->
<%
Dim fn
fn = request.form("fileName")
Dim files(100)
Dim numb
numb = 0
Dim foundLinks

If InStr(LCase(fn), "coolspot") <> 0 Or InStr(LCase(fn), "map") <> 0 Or InStr(LCase(fn), "resign") <> 0 Then
files(numb) = "<tr><td><a href='http://www.myfilehut.com/userfiles/all4free/softmodDownloads/cmr.zip'>Coolspot31's Map Resigner</a><td><a href='http://ccc.1asphost.com/all4fr33/softmod.html'>http://ccc.1asphost.com/all4fr33/softmod.html</a>"
numb = numb + 1
End If

If InStr(LCase(fn), "spawn") <> 0 Or InStr(LCase(fn), "finder") <> 0 Then
files(numb) = "<tr><td><a href='http://www.myfilehut.com/userfiles/all4free/softmodDownloads/Spawn_Finder.zip'>Spawn Finder</a><td><a href='http://ccc.1asphost.com/all4fr33/softmod.html'>http://ccc.1asphost.com/all4fr33/softmod.html</a>"
numb = numb + 1
End If

If InStr(LCase(fn), "school") <> 0 Or InStr(LCase(fn), "music") <> 0 Or InStr(LCase(fn), "resource") Or InStr(LCase(fn), "pack") <> 0 Then
files(numb) = "<tr><td><a href='http://gamemaker.nl/resources/res02.zip'>Music Resource Pack 2</a><td><a href='http://gamemaker.nl/resource.html'>http://gamemaker.nl/resource.html</a>"
numb = numb + 1
End If

If InStr(LCase(fn), "school") <> 0 Or InStr(LCase(fn), "game") <> 0 Or InStr(LCase(fn), "doomed") <> 0 Then
files(numb) = "<tr><td><a href='http://gamemaker.nl/games_exe/doomed.zip'>Doomed</a><td><a href='http://gamemaker.nl/games_exe.html'>http://gamemaker.nl/games_exe.html</a>"
numb = numb + 1
End If

If InStr(LCase(fn), "school") <> 0 Or InStr(LCase(fn), "game") <> 0 Or InStr(LCase(fn), "3105") <> 0 Then
files(numb) = "<tr><td><a href='http://gamemaker.nl/games_exe/3105ad.zip'>3105 AD</a><td><a href='http://gamemaker.nl/games_exe.html'>http://gamemaker.nl/games_exe.html</a>"
numb = numb + 1
End If

If InStr(LCase(fn), "school") <> 0 Or InStr(LCase(fn), "wallpaper") <> 0 Or InStr(LCase(fn), "change") <> 0 Or InStr(LCase(fn), "random") <> 0 Then
files(numb) = "<tr><td><a href='http://www.rjlsoftware.com/download/wall_papr.zip'>Random Wallpaper Changer</a><td><a href='http://www.rjlsoftware.com/software/desktop/wallpapr/download.shtml'>http://www.rjlsoftware.com/software/desktop/wallpapr/download.shtml</a>"
numb = numb + 1
End If

If InStr(LCase(fn), "school") <> 0 Or InStr(LCase(fn), "crazy") <> 0 Or InStr(LCase(fn), "num") <> 0 Or InStr(LCase(fn), "caps") <> 0 Or InStr(LCase(fn), "scroll") Then
files(numb) = "<tr><td><a href='http://www.rjlsoftware.com/download/crazy_ncs.zip'>Crazy Num Caps Scroll</a><td><a href='http://www.rjlsoftware.com/software/entertainment/crazy_ncs/download.shtml'>http://www.rjlsoftware.com/software/entertainment/crazy_ncs/download.shtml</a>"
numb = numb + 1
End If

If InStr(LCase(fn), "school") <> 0 Or InStr(LCase(fn), "screen") <> 0 Or InStr(LCase(fn), "screw") <> 0 Then
files(numb) = "<tr><td><a href='http://www.rjlsoftware.com/download/screenscrew.zip'>Screen Screw</a><td><a href='http://www.rjlsoftware.com/software/entertainment/screenscrew/download.shtml'>http://www.rjlsoftware.com/software/entertainment/screenscrew/download.shtml</a>"
numb = numb + 1
End If

If InStr(LCase(fn), "player") <> 0 Or InStr(LCase(fn), "spawn") <> 0 Or InStr(LCase(fn), "setter") <> 0 Then
files(numb) = "<tr><td><a href='http://www.myfilehut.com/userfiles/6133/softmodDownloads/PlayerSpawns.zip'>Player Spawns</a><td><a href='http://ccc.1asphost.com/all4fr33/softmod.html'>http://ccc.1asphost.com/all4fr33/softmod.html</a>"
numb = numb + 1
End If


numb = 0
Do While (numb < 100)
foundLinks = foundLinks & files(numb)
numb = numb + 1
Loop
%>

<h1 align="center">Request A File</h1>
<form name=fileRequest method=post action=requestFile.asp>
<center>
<input type=text name=fileName value="">
<br><input type=submit value="Search" name=requestFile>
</form>

<%
response.write("You requested the file: " & request.form("fileName") & ".")
response.write("<p>" & foundText) 
response.write("<p><table cellpadding=4 border=4 bordercolor=blue>")
response.write("<tr><td>File Name<td>Location Found")
response.write(foundLinks)
response.write("</table>")
%>
<!-- Begin of HitsLog -->
<SCRIPT language=javascript>
d=document;n=navigator;a=n.appName;
i=d.URL.indexOf('?',0);if(i==-1) z=d.URL; else z=d.URL.substring(0,i);
j="0";e=(new Date());e.setTime(e.getTime()+((24-e.getHours())*60-e.getMinutes())*60000);
l=Math.random()+"&v="+escape(parseInt(n.appVersion))+"&u=369&r="+escape(d.referrer)+"&s="+escape(window.location.href);
l=Math.random()+"&v="+escape(parseInt(n.appVersion))+"&u=369&r="+escape(d.referrer)+"&s="+escape(window.location.href);
if(d.cookie.search(z)==-1) l=l+"&h=1"; else l=l+"&h=0";
d.cookie=z+"=1; expires="+e.toGMTString();
l=l+"&c="+(d.cookie?"1":"0");l=l+"&t="+(new Date()).getTimezoneOffset();
</SCRIPT>
<SCRIPT language=javascript1.1>j="1";</SCRIPT>
<SCRIPT language=javascript1.2>j="2";l+="&d="+screen.width+'x'+screen.height+"&p="+(((a.substring(0,3)=="Mic"))?screen.colorDepth:screen.pixelDepth);</SCRIPT>
<SCRIPT language=javascript1.3>j="3";</SCRIPT>
<SCRIPT language=javascript>
l+="&j="+j; d.write("<a href='http://hitslog.com/stat?"+l+"'><IMG border=0 width=1 height=1 src='http://hitslog.com/hl.php?"+l+"' alt='HitsLog free invisible hit counter'></a>");
</SCRIPT>
<NOSCRIPT><A href="http://hitslog.com/stat?u=369">
<IMG border=0 src="http://hitslog.com/hl.php?u=369" width=1 height=1 alt="HitsLog free invisible hit counter">
</A></NOSCRIPT>
<!-- End of HitsLog -->
<!-- Start of StatCounter Code -->
<script type="text/javascript" language="javascript">
var sc_project=1051711; 
var sc_invisible=1; 
var sc_partition=6; 
var sc_security="481a27d2"; 
</script>
<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/frames.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img  src="http://c7.statcounter.com/counter.php?sc_project=1051711&amp;java=0&amp;security=481a27d2&amp;invisible=1" alt="web page hit counter" border="0"></a> </noscript>
<!-- End of StatCounter Code -->
<i>
</body>
</html>