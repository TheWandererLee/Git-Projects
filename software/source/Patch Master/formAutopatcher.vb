
Imports System.IO

Public Class formAutopatcher
    Dim vbQuote As String = Chr(34)
    Dim programFiles As String = formMain.programFiles
    Dim companyFolder As String = formMain.companyFolder
    Dim programFolder As String = formMain.programFolder

    Private Sub formAutopatcher_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        txtAutopatcher.Text = Environment.GetFolderPath(Environment.SpecialFolder.Desktop) & "\Autopatcher.exe"
        txtAutopatcher.Select(txtAutopatcher.Text.Length - 1, 0)
    End Sub

    Private Sub btnSaveAutopatcher_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnSaveAutopatcher.Click
        If (saveFileAutopatcher.ShowDialog() = Windows.Forms.DialogResult.OK) Then
            txtAutopatcher.Text = saveFileAutopatcher.FileName
            txtAutopatcher.Select(txtAutopatcher.Text.Length - 1, 0)
        End If
    End Sub
    Private Sub btnGenerate_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnGenerate.Click
        If (My.Computer.FileSystem.FileExists(programFiles & companyFolder & programFolder & "autopatcher.dat") = False) Then
            MsgBox("Missing autopatcher.dat file. Unable to generate autopatcher.", MsgBoxStyle.Critical, "Error: Missing autopatcher.dat")
            Exit Sub
        End If
        If (txtAutopatcher.Text.Contains("\") = True) Then
            If (My.Computer.FileSystem.DirectoryExists(Mid(txtAutopatcher.Text, 1, txtAutopatcher.Text.IndexOf("\"))) = False) Then
                MsgBox("Invalid autopatcher file location. Please specify a valid directory to save the autopatcher executable.", MsgBoxStyle.Critical, "Error: Invalid Autopatcher Destination")
                Exit Sub
            End If
        Else
            MsgBox("Invalid autopatcher file location. Please specify a valid directory to save the autopatcher executable.", MsgBoxStyle.Critical, "Error: Invalid Autopatcher Destination")
            Exit Sub
        End If
        'Check if the start or end messages are blank.
        If (cboxShowStart.Checked = True And txtStart.Text = "") Then
            MsgBox("Please supply a start message for the autopatcher. (If you do not wish to use a starting message, please uncheck " & vbQuote & "Show Start Message" & vbQuote & ")", MsgBoxStyle.Exclamation, "Alert: Empty Starting Message")
            Exit Sub
        End If
        If (cboxShowEnd.Checked = True And txtEnd.Text = "") Then
            MsgBox("Please supply an end message for the autopatcher. (If you do not wish to use an ending message, please uncheck " & vbQuote & "Show End Message" & vbQuote & ")", MsgBoxStyle.Exclamation, "Alert: Empty Starting Message")
            Exit Sub
        End If
        'Check if one of the primary folders are not supplied
        Dim missingFolders As String = ""
        If (txtPatch.Text = "") Then missingFolders = missingFolders & "Patch Folder"
        If (txtSource.Text = "") Then
            If (missingFolders = "") Then missingFolders = missingFolders & "Source Folder" Else missingFolders = missingFolders & ", Source Folder"
        End If
        If (txtDestination.Text = "") Then
            If (missingFolders = "") Then missingFolders = missingFolders & "Destination Folder" Else missingFolders = missingFolders & ", Destination Folder"
        End If
        If (missingFolders <> "") Then
            MsgBox("You must provide folder names for each of the classes below:" & _
            vbCrLf & missingFolders & _
            vbCrLf & "Fill in these values, and try again.", MsgBoxStyle.Exclamation, "Alert: Missing Required Folder Names")
            Exit Sub
        End If

        Try
            My.Computer.FileSystem.CopyFile(programFiles & companyFolder & programFolder & "autopatcher.dat", txtAutopatcher.Text, True)
        Catch ex As Exception
            MsgBox("Error while creating autopatcher. Make sure the files below are not in use." & vbCrLf & _
            programFiles & companyFolder & programFolder & "autopatcher.dat" & vbCrLf & _
            txtAutopatcher.Text, MsgBoxStyle.Critical, "Error: Cannot Move Autopatcher")
        End Try
        'Initialize the autopatcher writing stream
        Dim autoStream As New FileStream(txtAutopatcher.Text, FileMode.Open, FileAccess.Write, FileShare.Write)
        'Write all boolean configurations to the file
        autoStream.Seek(13664, SeekOrigin.Begin)
        autoStream.WriteByte(boolToByte(cboxShowStart.Checked))
        autoStream.Seek(13671, SeekOrigin.Begin)
        autoStream.WriteByte(boolToByte(cboxShowEnd.Checked))
        autoStream.Seek(13678, SeekOrigin.Begin)
        autoStream.WriteByte(boolToByte(cboxTaskbar.Checked))
        'Write all unicode strings to the file
        autoStream.Seek(26906, SeekOrigin.Begin)
        Dim writeBytes() As Byte
        writeBytes = stringToBytes(txtPatch.Text, 32)
        For i As Integer = 0 To writeBytes.Length - 1
            autoStream.WriteByte(writeBytes(i))
        Next
        autoStream.Seek(26972, SeekOrigin.Begin)
        writeBytes = stringToBytes(txtSource.Text, 32)
        For i As Integer = 0 To writeBytes.Length - 1
            autoStream.WriteByte(writeBytes(i))
        Next
        autoStream.Seek(27038, SeekOrigin.Begin)
        writeBytes = stringToBytes(txtDestination.Text, 32)
        For i As Integer = 0 To writeBytes.Length - 1
            autoStream.WriteByte(writeBytes(i))
        Next

        autoStream.Seek(27105, SeekOrigin.Begin)
        writeBytes = stringToBytes(txtStart.Text, 100)
        For i As Integer = 0 To writeBytes.Length - 1
            autoStream.WriteByte(writeBytes(i))
        Next
        autoStream.Seek(27308, SeekOrigin.Begin)
        writeBytes = stringToBytes(txtEnd.Text, 100)
        For i As Integer = 0 To writeBytes.Length - 1
            autoStream.WriteByte(writeBytes(i))
        Next

        autoStream.Close()

        MsgBox("Successfully created autopatcher." & _
        vbCrLf & "Autopatcher saved as: " & txtAutopatcher.Text & _
        vbCrLf & _
        vbCrLf & "Remember to use the correct format for your patches." & _
        vbCrLf & "Patch Format: (Map Name)Mod Name", _
        MsgBoxStyle.Exclamation, _
        "Successfully created autopatcher")
    End Sub

    Private Function boolToByte(ByVal Bool As Boolean) As Byte
        Dim newByte As Byte = 22
        If (Bool = False) Then newByte = 22
        If (Bool = True) Then newByte = 23
        Return newByte
    End Function
    Private Function stringToBytes(ByVal Text As String, ByVal Length As Integer) As Byte()
        If (Text.Length > Length) Then
            MsgBox("Cannot override maximum allowed characters. Please restrain your text to " & Length & " characters.", MsgBoxStyle.Critical, "Error: Maximum Length Overriden")
            Try
                My.Computer.FileSystem.DeleteFile(txtAutopatcher.Text)
            Catch ex As Exception
            End Try
            Return Nothing
            Me.Close()
        End If
        Dim newBytes(Length * 2 - 2) As Byte
        For i As Integer = 0 To newBytes.Length - 1
            newBytes(i) = 0
        Next
        For i As Integer = 0 To Length - 1
            If (i <= Text.Length - 1) Then
                newBytes(i * 2) = Asc(Mid(Text, i + 1, 1))
            Else
                newBytes(i * 2) = Asc(" ")
            End If
        Next
        Return newBytes
    End Function

    Private Sub cboxShowStart_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cboxShowStart.CheckedChanged
        txtStart.Enabled = cboxShowStart.Checked
    End Sub
    Private Sub cboxShowEnd_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cboxShowEnd.CheckedChanged
        txtEnd.Enabled = cboxShowEnd.Checked
    End Sub

    Private Sub txtStart_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles txtStart.TextChanged, cboxShowStart.CheckedChanged
        If (cboxShowStart.Checked = True And txtStart.Text = "") Then
            txtStart.BackColor = Color.Yellow
        Else
            txtStart.BackColor = Color.FromKnownColor(KnownColor.Window)
        End If
    End Sub
    Private Sub txtEnd_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles txtEnd.TextChanged, cboxShowEnd.CheckedChanged
        If (cboxShowEnd.Checked = True And txtEnd.Text = "") Then
            txtEnd.BackColor = Color.Yellow
        Else
            txtEnd.BackColor = Color.FromKnownColor(KnownColor.Window)
        End If
    End Sub

    Private Sub anyFolder_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles txtPatch.TextChanged, txtSource.TextChanged, txtDestination.TextChanged
        If (txtPatch.Text = "") Then
            txtPatch.BackColor = Color.Red
        Else
            txtPatch.BackColor = Color.FromKnownColor(KnownColor.Window)
        End If
        If (txtSource.Text = "") Then
            txtSource.BackColor = Color.Red
        Else
            txtSource.BackColor = Color.FromKnownColor(KnownColor.Window)
        End If
        If (txtDestination.Text = "") Then
            txtDestination.BackColor = Color.Red
        Else
            txtDestination.BackColor = Color.FromKnownColor(KnownColor.Window)
        End If
    End Sub
End Class