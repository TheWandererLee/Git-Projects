Public Class formAbout
    Private Sub formAbout_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        formMain.Enabled = False
        lblInfo.Text = _
        "BSP Master" & _
        vbCrLf & _
        vbCrLf & "Title: " & My.Application.Info.Title & _
        vbCrLf & "Version: " & My.Application.Info.Version.Major & "." & My.Application.Info.Version.Minor & "." & My.Application.Info.Version.Build & "." & My.Application.Info.Version.MajorRevision & _
        vbCrLf & "Assembly Name: " & My.Application.Info.AssemblyName & _
        vbCrLf & "Company Name: " & My.Application.Info.CompanyName & _
        vbCrLf & "Copyright: " & My.Application.Info.Copyright & _
        vbCrLf & "Description: " & My.Application.Info.Description & _
        vbCrLf & _
        vbCrLf & _
        vbCrLf & _
        vbCrLf & _
        vbCrLf & "Created by TheWandererLee."
    End Sub
    Private Sub formAbout_FormClosing(ByVal sender As Object, ByVal e As System.Windows.Forms.FormClosingEventArgs) Handles Me.FormClosing
        formMain.Enabled = True
    End Sub
End Class