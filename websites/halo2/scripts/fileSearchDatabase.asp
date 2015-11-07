<html><body>
<%
foundLinks = "<tr><td>Well at least something worked..."

Dim fn As String = request.form("fileName")
Dim files() As Integer
Dim numb As Integer = 0
Dim fileFound As Integer = 1

Do While (fileFound = 1)
fileFound = 0
if (fn.ToLower = "cmr" || fn.ToLower = "map resigner" || fn.ToLower = "coolspot31's map resigner") Then
files(numb) = "<tr><td><a href='http://www.myfilehut.com/userfiles/all4free/softmodDownloads/cmr.zip'>Coolspot31's Map Resigner</a>"
fileFound = 1
numb = numb + 1
End If
Loop
%>
</body></html>