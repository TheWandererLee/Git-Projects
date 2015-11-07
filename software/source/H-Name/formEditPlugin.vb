Public Class formEditPlugin

    Dim mainPath As String = System.Environment.GetFolderPath(Environment.SpecialFolder.ProgramFiles)
    Dim programFolder As String = "\H-Name\"
    Dim pluginExtension As String = ".dat"
    Dim blankPluginSource As String = "No Map Opened"
    Dim dockDistance As Integer = 16

    Private Sub formViewPlugin_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        If formMain.statusLblMapName.Text <> "" Then
            Try
                txtPluginSource.Text = My.Computer.FileSystem.ReadAllText(mainPath & programFolder & formMain.statusLblMapName.Text & pluginExtension)
                Me.Text = "Plugin Source: " & formMain.statusLblMapName.Text & pluginExtension
                lblPluginName.Text = formMain.statusLblMapName.Text
                btnSavePlugin.Enabled = True
                txtPluginSource.Enabled = True
            Catch ex As Exception
                txtPluginSource.Text = "Error reading plugin"
                Me.Text = "Error"
            End Try
        Else
            txtPluginSource.Text = blankPluginSource
            Me.Text = blankPluginSource
        End If
    End Sub
    Private Sub btnSavePlugin_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnSavePlugin.Click
        'Writes the program folder if it can't find it
        If (My.Computer.FileSystem.DirectoryExists(mainPath & programFolder) = False) Then
            My.Computer.FileSystem.CreateDirectory(mainPath & programFolder)
        End If

        If lblPluginName.Text <> blankPluginSource And lblPluginName.Text <> "No Plugin Name" And lblPluginName.Text <> "No Plugin Opened" Then
            My.Computer.FileSystem.WriteAllText(mainPath & programFolder & lblPluginName.Text & pluginExtension, txtPluginSource.Text, False)
            btnSavePlugin.Enabled = False
        Else
            MsgBox("No plugin opened for editing." & vbCrLf & "Cannot save file.", MsgBoxStyle.Information, "Cannot Save Plugin")
        End If
    End Sub
    Private Sub txtPluginSource_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles txtPluginSource.TextChanged
        If txtPluginSource.Text <> blankPluginSource Then btnSavePlugin.Enabled = True
    End Sub
    Private Sub customDockWindow()
        'Safeguard to keep screen from fighting over window
        If (Me.Left <= dockDistance And Me.Left >= -dockDistance And Me.Right >= My.Computer.Screen.WorkingArea.Width - dockDistance And Me.Right <= My.Computer.Screen.WorkingArea.Width + dockDistance) Then
            Me.Left = 0
            Me.Width = My.Computer.Screen.WorkingArea.Width
        End If
        If (Me.Top <= dockDistance And Me.Top >= -dockDistance And Me.Bottom >= My.Computer.Screen.WorkingArea.Height - dockDistance And Me.Bottom <= My.Computer.Screen.WorkingArea.Height + dockDistance) Then
            Me.Top = 0
            Me.Height = My.Computer.Screen.WorkingArea.Height
        End If
        'Custom docking to the top, bottom, and sides of the screen
        If (Me.Left <= dockDistance And Me.Left >= -dockDistance) Then Me.Left = 0
        If (Me.Top <= dockDistance And Me.Top >= -dockDistance) Then Me.Top = 0
        If (Me.Right >= My.Computer.Screen.WorkingArea.Width - dockDistance And Me.Right <= My.Computer.Screen.WorkingArea.Width + dockDistance) Then Me.Left = My.Computer.Screen.WorkingArea.Width - Me.Width
        If (Me.Bottom >= My.Computer.Screen.WorkingArea.Height - dockDistance And Me.Bottom <= My.Computer.Screen.WorkingArea.Height + dockDistance) Then Me.Top = My.Computer.Screen.WorkingArea.Height - Me.Height
    End Sub
    Private Sub formEditPlugin_MoveResize(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Move, Me.Resize
        customDockWindow()
    End Sub
End Class