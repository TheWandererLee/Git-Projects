Public Class formPreferences

    Dim programFiles As String = Environment.GetFolderPath(Environment.SpecialFolder.ProgramFiles)
    Dim programFolder As String = "\13 Willows"
    Dim programName As String = "\Program Organization Simplifier"
    Dim programPath As String = programFiles & programFolder & programName & "\"

    Dim fileSettings As String = "settings.pos"
    Dim defaultSettings As String = "2T"

    Dim didSave As Boolean = False
    Dim isLoading As Boolean = True

    Private Sub formPreferences_FormClosing(ByVal sender As Object, ByVal e As System.Windows.Forms.FormClosingEventArgs) Handles Me.FormClosing
        updateClicks()
        formMain.Enabled = True
    End Sub

    Private Sub formPreferences_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        formMain.Enabled = False
        Me.MaximizeBox = False
        Me.MinimizeBox = False
        testDirectories()
        loadSettings()
        isLoading = False
    End Sub

    Private Sub testDirectories()
        If (My.Computer.FileSystem.FileExists(programPath & fileSettings) = False) Then
            If (My.Computer.FileSystem.DirectoryExists(programFiles & programFolder & programName) = False) Then
                If (My.Computer.FileSystem.DirectoryExists(programFiles & programFolder) = False) Then
                    If (My.Computer.FileSystem.DirectoryExists(programFiles) = False) Then
                        My.Computer.FileSystem.CreateDirectory(programFiles)
                    End If
                    My.Computer.FileSystem.CreateDirectory(programFiles & programFolder)
                End If
                My.Computer.FileSystem.CreateDirectory(programFiles & programFolder & programName)
            End If
            My.Computer.FileSystem.WriteAllText(programPath & fileSettings, defaultSettings, False)
        End If
    End Sub
    Private Sub loadSettings()
        Try
            Dim settings As String = My.Computer.FileSystem.ReadAllText(programPath & fileSettings)
            'Number of clicks to activate programs
            If (Mid(settings, 1, 1) = "2") Then radTwoClicks.Checked = True
            'Allows messages
            If (Mid(settings, 2, 1) = "T") Then cboxAllowMessages.Checked = True
        Catch ex As Exception
            'Could not load the file, most likely because it is in use
            MsgBox("Could not load the settings file, make sure it is not currently in use by another program.", _
            MsgBoxStyle.Critical, "Error Loading Settings")
        End Try
    End Sub
    Private Sub saveSettings()
        Try
            Dim numberOfClicks As String = "1"
            Dim allowMessages As String = "F"
            If (radTwoClicks.Checked = True) Then numberOfClicks = "2"
            If (cboxAllowMessages.Checked = True) Then allowMessages = "T"
            My.Computer.FileSystem.WriteAllText(programPath & fileSettings, _
            numberOfClicks & allowMessages, False)
            didSave = True
        Catch ex As Exception
            'Could not save the file, most likely because it is in use
            didSave = False
        End Try
    End Sub
    Private Sub updateClicks()
        If (Mid(My.Computer.FileSystem.ReadAllText(programPath & fileSettings), 1, 1) = "1") Then
            formMain.listPrograms.Activation = ItemActivation.OneClick
        Else
            formMain.listPrograms.Activation = ItemActivation.Standard
        End If
    End Sub

    Private Sub radOneClick_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles radOneClick.CheckedChanged
        If (isLoading = False) Then saveSettings()
    End Sub
    Private Sub cboxAllowMessages_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cboxAllowMessages.CheckedChanged
        If (isLoading = False) Then saveSettings()
    End Sub

    Private Sub btnOK_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnOK.Click
        Me.Close()
    End Sub
End Class