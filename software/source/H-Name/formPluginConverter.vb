Public Class formPluginConverter
    Dim openText As String = "Open Bookmark Collection"
    Dim convertText As String = "Convert To Plugin"
    Dim directoryBefore As String = "Directory: "
    Dim fileName As String = ""
    Dim fileDirectory As String = ""
    Dim saveDirectory As String = ""
    Dim saveName As String = ""
    Dim originalFileName As String = ""
    Dim dockDistance As Integer = 16
    Dim maxLabelLength As Integer = 35
    Dim collection() As Byte
    Dim collectionDescription As String = ""
    Dim collectionAuthor As String = ""
    Dim plugin As String
    Dim mainPath As String = System.Environment.GetFolderPath(Environment.SpecialFolder.ProgramFiles)
    Dim programFolder As String = "\H-Name\"
    Dim pluginExtension As String = ".dat"
    Dim maxOffsets As Integer = 60
    Dim description(maxOffsets) As String
    Dim offset(maxOffsets) As String
    Dim length(maxOffsets) As String
    Dim c As Integer = 0

    Private Sub btnOpen_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnOpen.Click
        For n As Integer = 0 To maxOffsets - 1
            offset(c) = ""
            description(c) = ""
            length(c) = ""
        Next
        If (btnOpen.Text = openText) Then
            'Open Function
            If (openBookmarkCollection.ShowDialog() = Windows.Forms.DialogResult.OK) Then
                originalFileName = openBookmarkCollection.FileName
                Try
                    collection = My.Computer.FileSystem.ReadAllBytes(originalFileName)
                Catch ex As Exception
                    MsgBox("Error: File is in use by another application.", _
                    MsgBoxStyle.Critical, "Error")
                    GoTo stopSub
                End Try
                btnOpen.Text = convertText
                fileDirectory = Mid(originalFileName, 1, originalFileName.LastIndexOf("\"))
                lblFileDirectory.Text = directoryBefore & fileDirectory
                fileName = Mid(originalFileName, originalFileName.LastIndexOf("\") + 2, _
                originalFileName.Length - originalFileName.LastIndexOf("\") - 5)
                txtFileName.Text = fileName & pluginExtension
            End If
        Else
            'Convert Function
            'Convert the Hex Workshop bookmark collection to an H-Name plugin
            If (collection(528) = 0) Then
                MsgBox("There are no offsets in this bookmark collection, or the bookmark collection is incorrectly formatted.", _
                MsgBoxStyle.Information, "No offsets found")
                GoTo stopSub
            End If
            collectionAuthor = ""
            collectionDescription = ""
            Dim i As Integer = 0
            For i = 0 To 79
                If (collection(8 + i) = 0) Then GoTo breakFullD
                collectionDescription = collectionDescription & Chr(collection(8 + i))
            Next
breakFullD:
            For i = 0 To 79
                If (collection(88 + i) = 0) Then GoTo breakFullA
                collectionAuthor = collectionAuthor & Chr(collection(88 + i))
            Next
breakFullA:
            i = 528
            c = 0
            plugin = ""
            For n As Integer = 0 To maxOffsets - 1
                offset(c) = ""
                description(c) = ""
                length(c) = ""
            Next
            While i < collection.Length
                For n As Integer = 0 To 7
                    If (collection(i + n) = 0) Then GoTo breakOffset
                    offset(c) = offset(c) & Chr(collection(i + n))
                Next
breakOffset:
                For n As Integer = 0 To maxLabelLength - 1
                    If (collection(i - 80 + n) = 0) Then GoTo breakDescription
                    description(c) = description(c) & Chr(collection(i - 80 + n))
                Next
breakDescription:
                For n As Integer = 0 To 7
                    If (collection(i + 133 + n) = 0) Then GoTo breakLength
                    length(c) = length(c) & Chr(collection(i + 133 + n))
                Next
breakLength:
                length(c) = CInt("&H" & length(c))
                If (length(c) = 0) Then length(c) = "999"
                If (length(c).Length = 1) Then length(c) = "0" & length(c)
                If (length(c).Length = 2) Then length(c) = "0" & length(c)
                If (description(c) = "") Then description(c) = txtNoDescription.Text
                plugin = plugin & "/" & offset(c) & " " & length(c) & " " & description(c) & vbCrLf
                i = i + 656
                c = c + 1
            End While

            'Save the plugin, following the rules according to user selections
            If (radSameDirectory.Checked = True) Then
                saveDirectory = Mid(originalFileName, 1, originalFileName.LastIndexOf("\") + 1)
            Else
                saveDirectory = mainPath & programFolder
            End If
            If (Mid(txtFileName.Text, txtFileName.Text.Length - 3, 4) = pluginExtension) Then
                saveName = txtFileName.Text
            Else
                saveName = txtFileName.Text & pluginExtension
            End If

            If (checkOverwrite.Checked = True) Then
                My.Computer.FileSystem.WriteAllText(saveDirectory & saveName, plugin, False)
            Else
                If (My.Computer.FileSystem.FileExists(saveDirectory & saveName) = True) Then
                    If (MsgBox("File already exists, do you want to overwrite it?", _
                    MsgBoxStyle.YesNo, "Overwrite " & saveName & "?") = MsgBoxResult.Yes) Then
                        My.Computer.FileSystem.WriteAllText(saveDirectory & saveName, plugin, False)
                    Else
                        GoTo stopSub
                    End If
                Else
                    My.Computer.FileSystem.WriteAllText(saveDirectory & saveName, plugin, False)
                End If
            End If
stopAndClose:
            'Change everything back as if no file is opened
            btnOpen.Text = openText
            lblFileDirectory.Text = directoryBefore
            txtFileName.Text = pluginExtension
            For n As Integer = 0 To maxOffsets - 1
                offset(c) = ""
                description(c) = ""
                length(c) = ""
            Next
        End If
stopSub:
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

        'Custom docking to formPlugins controlled by H-Name
        ''If (Me.Left <= formPlugins.Right + formDockDistance And Me.Left >= formPlugins.Right - formDockDistance) Then Me.Left = formPlugins.Right
        ''If (Me.Top <= formPlugins.Bottom + formDockDistance And Me.Top >= formPlugins.Bottom - formDockDistance) Then Me.Top = formPlugins.Bottom
        ''If (Me.Right <= formPlugins.Left + formDockDistance And Me.Right >= formPlugins.Left - formDockDistance) Then Me.Left = formPlugins.Left - Me.Width
        ''If (Me.Bottom <= formPlugins.Top + formDockDistance And Me.Bottom >= formPlugins.Top - formDockDistance) Then Me.Top = formPlugins.Top - Me.Height

        'Custom docking to formEditPlugin controlled by H-Name
        ''If (Me.Left <= formEditPlugin.Right + formDockDistance And Me.Left >= formEditPlugin.Right - formDockDistance) Then Me.Left = formEditPlugin.Right
        ''If (Me.Top <= formEditPlugin.Bottom + formDockDistance And Me.Top >= formEditPlugin.Bottom - formDockDistance) Then Me.Top = formEditPlugin.Bottom
        ''If (Me.Right <= formEditPlugin.Left + formDockDistance And Me.Right >= formEditPlugin.Left - formDockDistance) Then Me.Left = formEditPlugin.Left - Me.Width
        ''If (Me.Bottom <= formEditPlugin.Top + formDockDistance And Me.Bottom >= formEditPlugin.Top - formDockDistance) Then Me.Top = formEditPlugin.Top - Me.Height
    End Sub
    Private Sub formPluginConverter_MoveResize(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Move, Me.Resize
        customDockWindow()
    End Sub

    Private Sub checkUseSameName_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles checkUseSameName.CheckedChanged
        txtFileName.Enabled = checkUseSameName.Checked = False
        If checkUseSameName.Checked = False Then txtFileName.Text = "" Else _
        txtFileName.Text = fileName & pluginExtension
    End Sub

    Private Sub formPluginConverter_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        txtNoDescription.MaxLength = maxLabelLength
    End Sub
End Class