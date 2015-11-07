Public Class formMain
    Dim file1() As Byte
    Dim file2() As Byte
    Dim differencesFound(1000) As Integer
    Private Sub btnOpenFile1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnOpenFile1.Click
        If (openFile1.ShowDialog() = Windows.Forms.DialogResult.OK) Then
            txtFilePath1.Text = openFile1.FileName
            file1 = My.Computer.FileSystem.ReadAllBytes(openFile1.FileName)
        End If
    End Sub

    Private Sub btnOpenFile2_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnOpenFile2.Click
        If (openFile2.ShowDialog() = Windows.Forms.DialogResult.OK) Then
            txtFilePath2.Text = openFile2.FileName
            file2 = My.Computer.FileSystem.ReadAllBytes(openFile2.FileName)
        End If
    End Sub

    Private Sub btnCompareFiles_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnCompareFiles.Click
        Dim i As Integer = 0
        Dim lesserFileSize As Integer = 0
        Dim copyAdd As Integer = 0
        If file1.Length = 0 Or file2.Length = 0 Then GoTo StopSub
        If file1.Length > file2.Length Then
            lesserFileSize = file2.Length
        Else
            lesserFileSize = file1.Length
        End If
        copyAdd = 0
        listDifferences.Items.Clear()
        For i = 0 To lesserFileSize - 1
            If (file1(i) <> file2(i)) Then listDifferences.Items.Add( _
            "Difference: 0x" & Hex(i) & "/" & i & " | File 1: H" & Hex(file1(i)) & "/D" & file1(i) & " - File2: H" & Hex(file2(i)) & "/D" & file2(i))
        Next
StopSub:
    End Sub
End Class
