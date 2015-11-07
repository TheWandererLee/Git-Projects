<html>
<head>
<title></title>
<meta name="Generator" content="Matizha Sublime 3.2">
<meta name="Description" content="">
<meta name="Keywords" content="">

<script language="JavaScript">
<!--

//-->
</script>

<style>
<!--
form {
background-color: white;
color: black;
}

textarea {
background-color: black;
font-family: Arial;
color: lime;
}
//-->
</style>

</head>
<body> 

<%
if request.form("passw") = "13lbs" then
response.write("<html><body background='images/bungietop.jpg'>")
response.write("<h1 align='center'>News Submission</h1>")
response.write("<form name='Form1' id='Form1' action='http://www.bungie.net/fanclub/hierarchy/News/SubmitNews.aspx' method='post'>")
response.write("<input type='hidden' name='__VIEWSTATE' value='dDwyMjc0MDQyMTA7dDw7bDxpPDI+Oz47bDx0PDtsPGk8MD47aTwyPjs+O2w8dDw7bDxpPDE+Oz47bDx0PHA8bDxWaXNpYmxlOz47bDxvPHQ+Oz4+Ozs+Oz4+O3Q8O2w8aTwyMT47aTwyMz47aTw0Nz47PjtsPHQ8O2w8aTwwPjtpPDI+O2k8ND47PjtsPHQ8cDxwPGw8Q29udHJvbFRvVmFsaWRhdGU7PjtsPGNvbnRlbnRfY2F0ZWdvcnk7Pj47Pjs7Pjt0PHQ8OztsPGk8MD47Pj47Oz47dDx0PHA8cDxsPEVuYWJsZWQ7VmlzaWJsZTs+O2w8bzx0PjtvPHQ+Oz4+Oz47Oz47Oz47Pj47dDxwPGw8VmlzaWJsZTs+O2w8bzx0Pjs+Pjs7Pjt0PHA8cDxsPEVuYWJsZWQ7VmlzaWJsZTs+O2w8bzx0PjtvPHQ+Oz4+Oz47bDxpPDE+Oz47bDx0PDtsPGk8ND47PjtsPHQ8dDw7dDxpPDU+O0A8XDxzcGFuXD5Ob25NZW1iZXIgKEV2ZXJ5b25lKSBcPC9zcGFuXD47XDxzcGFuXD5NZW1iZXIgKEFsbCBNZW1iZXJzKSBcPC9zcGFuXD47XDxzcGFuXD5BZG1pbmlzdHJhdG9yXDwvc3Bhblw+O1w8c3Bhblw+U3RhZmZcPC9zcGFuXD47XDxzcGFuXD5SaWdodCBIYW5kIE1hblw8L3NwYW5cPjs+O0A8MjQyOTQ1OzI0Mjk0NjsyNDI5NDc7MjQzMjYxOzI0Njk4NDs+Pjs+Ozs+Oz4+Oz4+Oz4+Oz4+Oz4+O2w8Q29udGVudFNlY3VyaXR5OmNvbnRlbnRfc2VjdXJpdHk6MDtDb250ZW50U2VjdXJpdHk6Y29udGVudF9zZWN1cml0eToxO0NvbnRlbnRTZWN1cml0eTpjb250ZW50X3NlY3VyaXR5OjI7Q29udGVudFNlY3VyaXR5OmNvbnRlbnRfc2VjdXJpdHk6MztDb250ZW50U2VjdXJpdHk6Y29udGVudF9zZWN1cml0eTo0O0NvbnRlbnRTZWN1cml0eTpjb250ZW50X3NlY3VyaXR5OjQ7Zm9ydW1fcG9zdDs+PuxSiTIZXE3k0HAntj09mluvnI9I'>")
response.write("Title: <input name='content_title' type='text' maxlength='75' id='content_title' title='The title of this news story' class='input'>")
response.write("<br>Link Name: <input name='content_linkname' type='text' maxlength='75' id='content_linkname' class='input'>")
response.write("<br><input id='NewsCategories_content_category_0' type='radio' name='NewsCategories:content_category' value='Statement' checked='checked'><img src='http://www.bungie.net/images/News/NewsIcons/statement.gif'>Statement")
response.write("<br><input id='NewsCategories_content_category_2' type='radio' name='NewsCategories:content_category' value='Declaration'><img src='http://www.bungie.net/images/News/NewsIcons/declaration.gif'>Declaration")
response.write("<br><input id='NewsCategories_content_category_1' type='radio' name='NewsCategories:content_category' value='Memoranda'><img src='http://www.bungie.net/images/News/NewsIcons/memoranda.gif'>Memoranda")
response.write("<br><input id='NewsCategories_content_category_3' type='radio' name='NewsCategories:content_category' value='Directive'><img src='http://www.bungie.net/images/News/NewsIcons/directive.gif'>Directive")
response.write("<br><hr><br>Summary Text<br><textarea align='center' name='content_search_keys' rows='8' cols='90' id='content_search_keys' class='input'></textarea>")
response.write("<p>Full Text<br><textarea align='center' name='content_text' rows='18' cols='90' id='content_text' class='input'></textarea>")
response.write("<br><hr><br>Visibility")
response.write("<br>Non-Member (Everyone) <input id='ContentSecurity_content_security_0' type='checkbox' name='ContentSecurity:content_security:0'>")
response.write("<br>Members <input id='ContentSecurity_content_security_1' type='checkbox' name='ContentSecurity:content_security:1' checked='checked'>")
response.write("<br>Administrator <input id='ContentSecurity_content_security_2' type='checkbox' name='ContentSecurity:content_security:2'>")
response.write("<br>Staff <input id='ContentSecurity_content_security_3' type='checkbox' name='ContentSecurity:content_security:3'>")
response.write("<br>Right Hand Man <input id='ContentSecurity_content_security_4' type='checkbox' name='ContentSecurity:content_security:4' checked='checked'>")
response.write("<p>Post to news and forum <input id='forum_post' type='checkbox' name='forum_post'>")
response.write("<p><hr><p><input type='submit' value='Post'>")
response.write("</form>")
response.write("<p><i style='font-size:0'>")
response.write("</body></html>")
else
response.write("<html><head>")
response.write("<meta http-equiv='refresh' content='1;url=main.html'></head><body><h1 align=center>Incorrect Password</h1><i style='font-size:0'></body></html>")
end if
%>

</body>
</html>