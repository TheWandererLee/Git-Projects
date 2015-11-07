Public Class formError
    Private Sub lnkEmail_LinkClicked(ByVal sender As System.Object, ByVal e As System.Windows.Forms.LinkLabelLinkClickedEventArgs) Handles lnkEmail.LinkClicked
        Dim webLeave As New WebBrowser
        Me.Controls.Add(webLeave)
        webLeave.Location = New Point(0, 0)
        webLeave.Size = New Size(0, 0)
        Dim subject As String = "Error in Collision Editor"
        Dim message As String = "I (<u>Your Name Here</u>), found an error in your program, Collision Editor.%0D%0A%0D%0A<b>This is what I was doing when the error occurred</b>: <b>________</b>%0D%0A%0D%0A<center>Here's the error:</center>" & vbCrLf & vbCrLf & lblError.Text & vbCrLf & vbCrLf & txtError.Text
        message = message.Replace(vbCrLf, "%0D%0A")
        Dim navigator As String = "mailto:webmaster@13willows.com?subject=" & subject & "&body=" & message
        webLeave.Navigate(navigator)
        Me.Controls.Remove(webLeave)
    End Sub

    Private Sub formError_FormClosing(ByVal sender As Object, ByVal e As System.Windows.Forms.FormClosingEventArgs) Handles Me.FormClosing
        formMain.Enabled = True
    End Sub

    Private Sub formError_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        formMain.Enabled = False
    End Sub
End Class