<html>
<head>
<title></title>
<meta name="Generator" content="Matizha Sublime 3.2">
<meta name="Description" content="">
<meta name="Keywords" content="halo, 2, halo2, make, emblem, recreate, your, image">

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
font-size:0;
}

a {
font-size:0;
}
//-->
</style>

</head>
<body> 

<center>
<form name="emblemGen" action="emblem.asp" method="post">    
<%
response.write("<img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=14&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=" & request.form("emblembackground") & ">")
response.write("<img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=18&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=" & request.form("emblembackground") & ">")
response.write("<img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=29&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=" & request.form("emblembackground") & ">")
response.write("<img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=44&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=" & request.form("emblembackground") & ">")
response.write("<img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=64&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=" & request.form("emblembackground") & ">")
response.write("<img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=140&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=" & request.form("emblembackground") & ">")
%>
<input type=submit value="< Update Emblem >" onClick="submit">
<%
response.write("<img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=140&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=" & request.form("emblembackground") & ">")
response.write("<img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=64&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=" & request.form("emblembackground") & ">")
response.write("<img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=44&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=" & request.form("emblembackground") & ">")
response.write("<img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=29&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=" & request.form("emblembackground") & ">")
response.write("<img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=18&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=" & request.form("emblembackground") & ">")
response.write("<img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=14&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=" & request.form("emblembackground") & ">")
%>
<br><font size=1>(214,990,848 possible emblems)</font>
<%
response.write("<br>Copy the html code below to your website or forum to use this emblem as an image or avatar<br>")
response.write("<input type=text size=100 value='<img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=90&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=" & request.form("emblembackground") & ">'>")
response.write("<br><font size=3>To begin, choose four colors and click 'Update Emblem' then you can change the foreground, background, etc.</font>")
%>
</center>
<table border=4>
<td>Color<td bgcolor=white style=color:black>Wh<td bgcolor=gray>St<td bgcolor=red>Red<td bgcolor=orange>Or<td bgcolor=yellow style=color:black>Gold<td bgcolor=olive>Olive<td bgcolor=green>Gr<td>Sage<td bgcolor=cyan style=color:black>Cyan<td bgcolor=teal>Teal<td>Cobalt<td bgcolor=blue>Blue<td bgcolor=violet>Vi<td bgcolor=purple>Pu<td bgcolor=pink style=color:black>Pink<td bgcolor=crimson>Crimson<td bgcolor=brown>Br<td bgcolor=tan>Tan<tr>
<%
response.write("<tr><td>Primary Player<td><input type=radio name=primarycolor value=0") 
if request.form("primarycolor") = 0 then response.write(" checked")
response.write("><td><input type=radio name=primarycolor value=1")
if request.form("primarycolor") = 1 then response.write(" checked")
response.write("><td><input type=radio name=primarycolor value=2")
if request.form("primarycolor") = 2 then response.write(" checked")
response.write("><td><input type=radio name=primarycolor value=3")
if request.form("primarycolor") = 3 then response.write(" checked")
response.write("><td><input type=radio name=primarycolor value=4")
if request.form("primarycolor") = 4 then response.write(" checked")
response.write("><td><input type=radio name=primarycolor value=5")
if request.form("primarycolor") = 5 then response.write(" checked")
response.write("><td><input type=radio name=primarycolor value=6")
if request.form("primarycolor") = 6 then response.write(" checked")
response.write("><td><input type=radio name=primarycolor value=7")
if request.form("primarycolor") = 7 then response.write(" checked")
response.write("><td><input type=radio name=primarycolor value=8")
if request.form("primarycolor") = 8 then response.write(" checked")
response.write("><td><input type=radio name=primarycolor value=9")
if request.form("primarycolor") = 9 then response.write(" checked")
response.write("><td><input type=radio name=primarycolor value=10")
if request.form("primarycolor") = 10 then response.write(" checked")
response.write("><td><input type=radio name=primarycolor value=11")
if request.form("primarycolor") = 11 then response.write(" checked")
response.write("><td><input type=radio name=primarycolor value=12")
if request.form("primarycolor") = 12 then response.write(" checked")
response.write("><td><input type=radio name=primarycolor value=13")
if request.form("primarycolor") = 13 then response.write(" checked")
response.write("><td><input type=radio name=primarycolor value=14")
if request.form("primarycolor") = 14 then response.write(" checked")
response.write("><td><input type=radio name=primarycolor value=15")
if request.form("primarycolor") = 15 then response.write(" checked")
response.write("><td><input type=radio name=primarycolor value=16")
if request.form("primarycolor") = 16 then response.write(" checked")
response.write("><td><input type=radio name=primarycolor value=17")
if request.form("primarycolor") = 17 then response.write(" checked")
response.write(">")
%>
<%
response.write("<tr><td>Secondary Player<td><input type=radio name=secondarycolor value=0") 
if request.form("secondarycolor") = 0 then response.write(" checked")
response.write("><td><input type=radio name=secondarycolor value=1")
if request.form("secondarycolor") = 1 then response.write(" checked")
response.write("><td><input type=radio name=secondarycolor value=2")
if request.form("secondarycolor") = 2 then response.write(" checked")
response.write("><td><input type=radio name=secondarycolor value=3")
if request.form("secondarycolor") = 3 then response.write(" checked")
response.write("><td><input type=radio name=secondarycolor value=4")
if request.form("secondarycolor") = 4 then response.write(" checked")
response.write("><td><input type=radio name=secondarycolor value=5")
if request.form("secondarycolor") = 5 then response.write(" checked")
response.write("><td><input type=radio name=secondarycolor value=6")
if request.form("secondarycolor") = 6 then response.write(" checked")
response.write("><td><input type=radio name=secondarycolor value=7")
if request.form("secondarycolor") = 7 then response.write(" checked")
response.write("><td><input type=radio name=secondarycolor value=8")
if request.form("secondarycolor") = 8 then response.write(" checked")
response.write("><td><input type=radio name=secondarycolor value=9")
if request.form("secondarycolor") = 9 then response.write(" checked")
response.write("><td><input type=radio name=secondarycolor value=10")
if request.form("secondarycolor") = 10 then response.write(" checked")
response.write("><td><input type=radio name=secondarycolor value=11")
if request.form("secondarycolor") = 11 then response.write(" checked")
response.write("><td><input type=radio name=secondarycolor value=12")
if request.form("secondarycolor") = 12 then response.write(" checked")
response.write("><td><input type=radio name=secondarycolor value=13")
if request.form("secondarycolor") = 13 then response.write(" checked")
response.write("><td><input type=radio name=secondarycolor value=14")
if request.form("secondarycolor") = 14 then response.write(" checked")
response.write("><td><input type=radio name=secondarycolor value=15")
if request.form("secondarycolor") = 15 then response.write(" checked")
response.write("><td><input type=radio name=secondarycolor value=16")
if request.form("secondarycolor") = 16 then response.write(" checked")
response.write("><td><input type=radio name=secondarycolor value=17")
if request.form("secondarycolor") = 17 then response.write(" checked")
response.write(">")
%>
<%
response.write("<tr><td>Primary Emblem<td><input type=radio name=primaryemblem value=0") 
if request.form("primaryemblem") = 0 then response.write(" checked")
response.write("><td><input type=radio name=primaryemblem value=1")
if request.form("primaryemblem") = 1 then response.write(" checked")
response.write("><td><input type=radio name=primaryemblem value=2")
if request.form("primaryemblem") = 2 then response.write(" checked")
response.write("><td><input type=radio name=primaryemblem value=3")
if request.form("primaryemblem") = 3 then response.write(" checked")
response.write("><td><input type=radio name=primaryemblem value=4")
if request.form("primaryemblem") = 4 then response.write(" checked")
response.write("><td><input type=radio name=primaryemblem value=5")
if request.form("primaryemblem") = 5 then response.write(" checked")
response.write("><td><input type=radio name=primaryemblem value=6")
if request.form("primaryemblem") = 6 then response.write(" checked")
response.write("><td><input type=radio name=primaryemblem value=7")
if request.form("primaryemblem") = 7 then response.write(" checked")
response.write("><td><input type=radio name=primaryemblem value=8")
if request.form("primaryemblem") = 8 then response.write(" checked")
response.write("><td><input type=radio name=primaryemblem value=9")
if request.form("primaryemblem") = 9 then response.write(" checked")
response.write("><td><input type=radio name=primaryemblem value=10")
if request.form("primaryemblem") = 10 then response.write(" checked")
response.write("><td><input type=radio name=primaryemblem value=11")
if request.form("primaryemblem") = 11 then response.write(" checked")
response.write("><td><input type=radio name=primaryemblem value=12")
if request.form("primaryemblem") = 12 then response.write(" checked")
response.write("><td><input type=radio name=primaryemblem value=13")
if request.form("primaryemblem") = 13 then response.write(" checked")
response.write("><td><input type=radio name=primaryemblem value=14")
if request.form("primaryemblem") = 14 then response.write(" checked")
response.write("><td><input type=radio name=primaryemblem value=15")
if request.form("primaryemblem") = 15 then response.write(" checked")
response.write("><td><input type=radio name=primaryemblem value=16")
if request.form("primaryemblem") = 16 then response.write(" checked")
response.write("><td><input type=radio name=primaryemblem value=17")
if request.form("primaryemblem") = 17 then response.write(" checked")
response.write(">")
%>
<%
response.write("<tr><td>Secondary Emblem<td><input type=radio name=secondaryemblem value=0") 
if request.form("secondaryemblem") = 0 then response.write(" checked")
response.write("><td><input type=radio name=secondaryemblem value=1")
if request.form("secondaryemblem") = 1 then response.write(" checked")
response.write("><td><input type=radio name=secondaryemblem value=2")
if request.form("secondaryemblem") = 2 then response.write(" checked")
response.write("><td><input type=radio name=secondaryemblem value=3")
if request.form("secondaryemblem") = 3 then response.write(" checked")
response.write("><td><input type=radio name=secondaryemblem value=4")
if request.form("secondaryemblem") = 4 then response.write(" checked")
response.write("><td><input type=radio name=secondaryemblem value=5")
if request.form("secondaryemblem") = 5 then response.write(" checked")
response.write("><td><input type=radio name=secondaryemblem value=6")
if request.form("secondaryemblem") = 6 then response.write(" checked")
response.write("><td><input type=radio name=secondaryemblem value=7")
if request.form("secondaryemblem") = 7 then response.write(" checked")
response.write("><td><input type=radio name=secondaryemblem value=8")
if request.form("secondaryemblem") = 8 then response.write(" checked")
response.write("><td><input type=radio name=secondaryemblem value=9")
if request.form("secondaryemblem") = 9 then response.write(" checked")
response.write("><td><input type=radio name=secondaryemblem value=10")
if request.form("secondaryemblem") = 10 then response.write(" checked")
response.write("><td><input type=radio name=secondaryemblem value=11")
if request.form("secondaryemblem") = 11 then response.write(" checked")
response.write("><td><input type=radio name=secondaryemblem value=12")
if request.form("secondaryemblem") = 12 then response.write(" checked")
response.write("><td><input type=radio name=secondaryemblem value=13")
if request.form("secondaryemblem") = 13 then response.write(" checked")
response.write("><td><input type=radio name=secondaryemblem value=14")
if request.form("secondaryemblem") = 14 then response.write(" checked")
response.write("><td><input type=radio name=secondaryemblem value=15")
if request.form("secondaryemblem") = 15 then response.write(" checked")
response.write("><td><input type=radio name=secondaryemblem value=16")
if request.form("secondaryemblem") = 16 then response.write(" checked")
response.write("><td><input type=radio name=secondaryemblem value=17")
if request.form("secondaryemblem") = 17 then response.write(" checked")
response.write(">")
%>
</table>
<table border=4>
<%
response.write("<tr><td>Fore")
response.write("<tr><td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=0" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=1" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=2" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=3" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=4" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=5" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=6" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=7" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=8" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=9" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=10" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=11" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=12" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=13" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=14" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=15" & "&b=" & request.form("emblembackground") & "&fl=3>")
%>
<tr>
<%
response.write("<td><input type=radio name=emblemforeground value=0") 
if request.form("emblemforeground") = 0 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=1")
if request.form("emblemforeground") = 1 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=2")
if request.form("emblemforeground") = 2 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=3")
if request.form("emblemforeground") = 3 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=4")
if request.form("emblemforeground") = 4 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=5")
if request.form("emblemforeground") = 5 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=6")
if request.form("emblemforeground") = 6 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=7")
if request.form("emblemforeground") = 7 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=8")
if request.form("emblemforeground") = 8 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=9")
if request.form("emblemforeground") = 9 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=10")
if request.form("emblemforeground") = 10 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=11")
if request.form("emblemforeground") = 11 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=12")
if request.form("emblemforeground") = 12 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=13")
if request.form("emblemforeground") = 13 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=14")
if request.form("emblemforeground") = 14 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=15")
if request.form("emblemforeground") = 15 then response.write(" checked")
%>
<tr>
<%
response.write("<tr><td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=16" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=17" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=18" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=19" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=20" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=21" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=22" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=23" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=24" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=25" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=26" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=27" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=28" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=29" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=30" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=31" & "&b=" & request.form("emblembackground") & "&fl=3><tr>")
%>
<tr>
<%
response.write("<td><input type=radio name=emblemforeground value=16")
if request.form("emblemforeground") = 16 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=17")
if request.form("emblemforeground") = 17 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=18")
if request.form("emblemforeground") = 18 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=19")
if request.form("emblemforeground") = 19 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=20")
if request.form("emblemforeground") = 20 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=21")
if request.form("emblemforeground") = 21 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=22")
if request.form("emblemforeground") = 22 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=23")
if request.form("emblemforeground") = 23 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=24")
if request.form("emblemforeground") = 24 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=25")
if request.form("emblemforeground") = 25 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=26")
if request.form("emblemforeground") = 26 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=27")
if request.form("emblemforeground") = 27 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=28")
if request.form("emblemforeground") = 28 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=29")
if request.form("emblemforeground") = 29 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=30")
if request.form("emblemforeground") = 30 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=31")
if request.form("emblemforeground") = 31 then response.write(" checked")
%>
<tr>
<%
response.write("<tr><td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=32" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=33" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=34" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=35" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=36" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=37" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=38" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=39" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=40" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=41" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=42" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=43" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=44" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=45" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=46" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=47" & "&b=" & request.form("emblembackground") & "&fl=3><tr>")
%>
<tr>
<%                
response.write("<td><input type=radio name=emblemforeground value=32")

if request.form("emblemforeground") = 32 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=33")
if request.form("emblemforeground") = 33 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=34")
if request.form("emblemforeground") = 34 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=35")
if request.form("emblemforeground") = 35 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=36")
if request.form("emblemforeground") = 36 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=37")
if request.form("emblemforeground") = 37 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=38")
if request.form("emblemforeground") = 38 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=39")
if request.form("emblemforeground") = 39 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=40")
if request.form("emblemforeground") = 40 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=41")
if request.form("emblemforeground") = 41 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=42")
if request.form("emblemforeground") = 42 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=43")
if request.form("emblemforeground") = 43 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=44")
if request.form("emblemforeground") = 44 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=45")
if request.form("emblemforeground") = 45 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=46")
if request.form("emblemforeground") = 46 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=47")
if request.form("emblemforeground") = 47 then response.write(" checked")
%>
<tr>
<%
response.write("<tr><td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=48" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=49" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=50" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=51" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=52" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=53" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=54" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=55" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=56" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=57" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=58" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=59" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=60" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=61" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=62" & "&b=" & request.form("emblembackground") & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=63" & "&b=" & request.form("emblembackground") & "&fl=3><tr>")
%>
<tr>
<%
response.write("<td><input type=radio name=emblemforeground value=48")
if request.form("emblemforeground") = 48 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=49")
if request.form("emblemforeground") = 49 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=50")
if request.form("emblemforeground") = 50 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=51")
if request.form("emblemforeground") = 51 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=52")
if request.form("emblemforeground") = 52 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=53")
if request.form("emblemforeground") = 53 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=54")
if request.form("emblemforeground") = 54 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=55")
if request.form("emblemforeground") = 55 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=56")
if request.form("emblemforeground") = 56 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=57")
if request.form("emblemforeground") = 57 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=58")
if request.form("emblemforeground") = 58 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=59")
if request.form("emblemforeground") = 59 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=60")
if request.form("emblemforeground") = 60 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=61")
if request.form("emblemforeground") = 61 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=62")
if request.form("emblemforeground") = 62 then response.write(" checked")
response.write("><td><input type=radio name=emblemforeground value=63")
if request.form("emblemforeground") = 63 then response.write(" checked")
%>
</table>




<br>




<table border=4>
<%
response.write("<tr><td>Back")
response.write("<tr><td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=0" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=1" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=2" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=3" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=4" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=5" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=6" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=7" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=8" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=9" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=10" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=11" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=12" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=13" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=14" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=15" & "&fl=3>")
%>
<tr>
<%
response.write("<td><input type=radio name=emblembackground value=0") 
if request.form("emblembackground") = 0 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=1")
if request.form("emblembackground") = 1 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=2")
if request.form("emblembackground") = 2 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=3")
if request.form("emblembackground") = 3 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=4")
if request.form("emblembackground") = 4 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=5")
if request.form("emblembackground") = 5 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=6")
if request.form("emblembackground") = 6 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=7")
if request.form("emblembackground") = 7 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=8")
if request.form("emblembackground") = 8 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=9")
if request.form("emblembackground") = 9 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=10")
if request.form("emblembackground") = 10 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=11")
if request.form("emblembackground") = 11 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=12")
if request.form("emblembackground") = 12 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=13")
if request.form("emblembackground") = 13 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=14")
if request.form("emblembackground") = 14 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=15")
if request.form("emblembackground") = 15 then response.write(" checked")
%>
<tr>
<%
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=16" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=17" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=18" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=19" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=20" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=21" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=22" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=23" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=24" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=25" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=26" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=27" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=28" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=29" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=30" & "&fl=3>")
response.write("<td><img src=http://www.bungie.net/Stats/halo2emblem.ashx?s=40&0=" & request.form("primarycolor") & "&1=" & request.form("secondarycolor") & "&2=" & request.form("primaryemblem") & "&3=" & request.form("secondaryemblem") & "&f=" & request.form("emblemforeground") & "&b=31" & "&fl=3>")
%>
<tr>
<%
response.write("<td><input type=radio name=emblembackground value=16") 
if request.form("emblembackground") = 16 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=17")
if request.form("emblembackground") = 17 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=18")
if request.form("emblembackground") = 18 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=19")
if request.form("emblembackground") = 19 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=20")
if request.form("emblembackground") = 20 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=21")
if request.form("emblembackground") = 21 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=22")
if request.form("emblembackground") = 22 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=23")
if request.form("emblembackground") = 23 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=24")
if request.form("emblembackground") = 24 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=25")
if request.form("emblembackground") = 25 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=26")
if request.form("emblembackground") = 26 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=27")
if request.form("emblembackground") = 27 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=28")
if request.form("emblembackground") = 28 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=29")
if request.form("emblembackground") = 29 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=30")
if request.form("emblembackground") = 30 then response.write(" checked")
response.write("><td><input type=radio name=emblembackground value=31")
if request.form("emblembackground") = 31 then response.write(" checked")
%>
</table>
</form>

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