Public Class OptionsForm

    Dim commonPath As String = System.Environment.GetFolderPath(Environment.SpecialFolder.CommonProgramFiles)
    Dim commonDir As String = "\13 Willows"
    Dim programDir As String = "\Screen Shaper"
    Dim settingsFile As String = "\settings.ini"
    Dim fullPath As String = commonPath & commonDir & programDir & settingsFile

    Private Sub traInc_Scroll(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles traInc.Scroll
        txtInc.Text = Math.Floor(traInc.Value / 4)
    End Sub
    Private Sub traSpeed_Scroll(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles traSpeed.Scroll
        txtSpeed.Text = traSpeed.Value
    End Sub

    Private Sub btnDefault_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnDefault.Click
        traInc.Value = 4
        traSpeed.Value = 99
        cboxRed.Checked = True
        cboxGreen.Checked = True
        cboxBlue.Checked = True
        cboxClockwise.Checked = True
        cboxSpinClear.Checked = True
        pnlBackgroundColor.BackColor = Color.Black
        radBackgroundColor.Checked = True
        txtInc.Text = Math.Floor(traInc.Value / 4)
        txtSpeed.Text = traSpeed.Value
    End Sub
    Private Sub btnOK_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnOK.Click
        testDirectories()
        writeSettings()
        End
    End Sub
    Private Sub OptionsForm_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Me.MaximizeBox = False
        testDirectories()
        readSettings()
    End Sub

    Private Sub testDirectories()
        'Set up directories for use with saving and loading files
        If (My.Computer.FileSystem.FileExists(fullPath) = False) Then
            If (My.Computer.FileSystem.DirectoryExists(commonPath & commonDir & programDir) = False) Then
                If (My.Computer.FileSystem.DirectoryExists(commonPath & commonDir) = False) Then
                    If (My.Computer.FileSystem.DirectoryExists(commonPath) = False) Then
                        My.Computer.FileSystem.CreateDirectory(commonPath)
                    End If
                    My.Computer.FileSystem.CreateDirectory(commonPath & commonDir)
                End If
                My.Computer.FileSystem.CreateDirectory(commonPath & commonDir & programDir)
            End If
            My.Computer.FileSystem.WriteAllText(fullPath, "00401RGBCC-16777216", False)
        End If
    End Sub
    Private Sub readSettings()
        'Read from the settings file and change the controls on the form accordingly
        Try
            Dim settingsText As String = My.Computer.FileSystem.ReadAllText(fullPath)

            Dim spinInc As Integer = CInt(Mid(settingsText, 1, 3))
            Dim spinSpeed As Integer = traSpeed.Maximum - CInt(Mid(settingsText, 4, 2)) + 1
            traInc.Value = spinInc
            txtInc.Text = Math.Floor(traInc.Value / 4)
            traSpeed.Value = spinSpeed
            txtSpeed.Text = traSpeed.Value
            If (Mid(settingsText, 6, 1) = "R") Then cboxRed.Checked = True
            If (Mid(settingsText, 7, 1) = "G") Then cboxGreen.Checked = True
            If (Mid(settingsText, 8, 1) = "B") Then cboxBlue.Checked = True
            If (Mid(settingsText, 9, 1) = "C") Then cboxClockwise.Checked = True
            If (Mid(settingsText, 10, 1) = "C") Then cboxSpinClear.Checked = True
            If (Mid(settingsText, 11, 9) = "UseScreen") Then
                radBackgroundScreen.Checked = True
                GoTo endColorAttempt
            End If

            'Begin color attempt
            radBackgroundColor.Checked = True
            btnChangeColor.Enabled = True
            pnlBackgroundColor.BackColor = Color.FromArgb(CInt(Mid(settingsText, 11, 9)))
endColorAttempt:
        Catch ex As Exception
            MsgBox("The settings file is configured incorrectly, all settings will be set back to default.")
            My.Computer.FileSystem.DeleteFile(fullPath)
        End Try
    End Sub
    Private Sub writeSettings()
        'Read from the controls on the form and write to the settings file
        If (traSpeed.Value = 0) Then
            traSpeed.Value = 1
        End If
        Dim spinInc As String = CStr(traInc.Value)
        While (spinInc.Length() < 3)
            spinInc = "0" & spinInc
        End While
        Dim spinSpeed As String = CStr(traSpeed.Maximum - traSpeed.Value + 1)
        While (spinSpeed.Length() < 2)
            spinSpeed = "0" & spinSpeed
        End While
        Dim incrementRed As String = "N"
        Dim incrementGreen As String = "N"
        Dim incrementBlue As String = "N"
        Dim spinClockwise As String = "N"
        Dim spinClear As String = "N"
        Dim backgroundColor As String = "UseScreen"
        If (cboxRed.Checked = True) Then incrementRed = "R"
        If (cboxGreen.Checked = True) Then incrementGreen = "G"
        If (cboxBlue.Checked = True) Then incrementBlue = "B"
        If (cboxClockwise.Checked = True) Then spinClockwise = "C"
        If (cboxSpinClear.Checked = True) Then spinClear = "C"
        If (radBackgroundScreen.Checked = True) Then GoTo endColorAttempt

        'Begin Color Attempt
        backgroundColor = pnlBackgroundColor.BackColor().ToArgb()
        While (backgroundColor.Length() < 9)
            backgroundColor = " " & backgroundColor
        End While
endColorAttempt:
        My.Computer.FileSystem.WriteAllText(fullPath, _
        spinInc & spinSpeed & incrementRed & incrementGreen & incrementBlue & _
        spinClockwise & spinClear & backgroundColor, _
        False)
    End Sub

    Private Sub radColor_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles radBackgroundColor.CheckedChanged
        If (radBackgroundColor.Checked = True) Then
            btnChangeColor.Enabled = True
            pnlBackgroundColor.Enabled = True
            pnlBackgroundColor.Visible = True
        Else
            btnChangeColor.Enabled = False
            pnlBackgroundColor.Enabled = False
            pnlBackgroundColor.Visible = False
        End If
    End Sub
    Private Sub btnChangeColor_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnChangeColor.Click
        If (colorBackgroundColor.ShowDialog() = Windows.Forms.DialogResult.OK) Then
            pnlBackgroundColor.BackColor = colorBackgroundColor.Color()
        End If
    End Sub
    Private Sub pnlBackgroundColor_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles pnlBackgroundColor.Click
        If (colorBackgroundColor.ShowDialog() = Windows.Forms.DialogResult.OK) Then
            pnlBackgroundColor.BackColor = colorBackgroundColor.Color()
        End If
    End Sub
End Class