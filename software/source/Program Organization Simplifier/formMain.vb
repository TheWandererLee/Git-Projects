Public Class formMain
#Region "Required Icon Functions"
    Declare Function ExtractIcon Lib "shell32.dll" Alias "ExtractIconA" (ByVal hInst As Integer, ByVal lpszExeFileName As String, ByVal nIconIndex As Integer) As Integer
#End Region

    Dim programCount As Integer = 0
    Dim programFiles As String = Environment.GetFolderPath(Environment.SpecialFolder.ProgramFiles)
    Dim programFolder As String = "\13 Willows"
    Dim programName As String = "\Program Organization Simplifier"
    Dim programPath As String = programFiles & programFolder & programName & "\"

    Dim filePrograms As String = "programs.pop"
    Dim fileSettings As String = "settings.pos"
    Dim defaultSettings As String = "2T"
    Dim settings As String = defaultSettings

    Dim fileProgramsData() As Byte
    Dim maxPrograms As Integer = 10000 'Maximum number of programs allowed
    Dim programIcons(maxPrograms) As Image
    Dim programNames(maxPrograms) As String
    Dim programPaths(maxPrograms) As String

    Dim didSave As Boolean = True
    Dim sawMessage As Boolean = False
    Dim lastSelected As Integer = 0

    'Program constants
    Dim borderWidth As Integer = 4
    Dim titleHeight As Integer = 30
    Dim tabHeight As Integer = 26
    Dim vbQuote As String = Chr(34)
    Dim maxSize As Size = New Size(245, 117)
    Private ar As New SortedList

    Private Sub formMain_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        testDirectories()
        If (My.Computer.FileSystem.FileExists(programPath & filePrograms) = True) Then
            loadPrograms()
        End If
        updateSettings()
        updateClicks()
        updateProgramInfo()
    End Sub
    Private Sub formMain_Resize(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Resize
        tabMain.Size = New Size(Me.Width - 12 - tabMain.Location.X - (2 * borderWidth), Me.Height - 12 - tabMain.Location.Y - borderWidth - titleHeight)
        listPrograms.Size = New Size(tabMain.Width - (borderWidth * 2), tabMain.Height - tabHeight - lblProgramInfo.Size.Height - 6)
        webDownloader.Size = New Size(tabMain.Width - (borderWidth * 2), tabMain.Height - tabHeight)
        lblProgramInfo.Location = New Point((tabOrganizer.Width - (lblProgramInfo.Size.Width)) / 2, listPrograms.Location.Y + listPrograms.Size.Height + 3)
    End Sub
    Private Sub formMain_ResizeEnd(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.ResizeEnd
        If (Me.Width < maxSize.Width) Then Me.Width = maxSize.Width
        If (Me.Height < maxSize.Height) Then Me.Height = maxSize.Height
    End Sub
    Private Sub formMain_FormClosing(ByVal sender As Object, ByVal e As System.Windows.Forms.FormClosingEventArgs) Handles Me.FormClosing
        savePrograms()
        If (didSave = False) Then
            While (MsgBox("Your programs could not be automatically saved." & vbCrLf & _
            "Make sure that the file is not in use." & vbCrLf & _
            "If you want to try and save again, click " & vbQuote & "Yes" & vbQuote & ".", MsgBoxStyle.Critical Or MsgBoxStyle.YesNo, "Error Saving Programs") = MsgBoxResult.Yes And didSave = False)
                savePrograms()
                If (didSave = True) Then
                    MsgBox("Successfully saved your programs.", MsgBoxStyle.Exclamation, "Saved Programs")
                End If
            End While
        End If
    End Sub

    Private Sub menuBtnOpen_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles conMenuBtnOpen.Click
        launchProgram()
    End Sub
    Private Sub menuBtnAdd_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnAdd.Click, conMenuBtnAdd.Click

        If (openFileProgram.ShowDialog() = Windows.Forms.DialogResult.OK) Then
            For i As Integer = 0 To openFileProgram.FileNames.Length() - 1
                Dim iconID As Integer
                Try
                    iconID = ExtractIcon(Me.Handle.ToInt32, openFileProgram.FileNames(i), 0)
                    Dim selectedProgramIcon As New Bitmap(Drawing.Icon.FromHandle(New IntPtr(iconID)).ToBitmap())
                    programIcons(programCount) = selectedProgramIcon
                Catch ex As Exception
                    programIcons(programCount) = My.Resources.defaultIcon.ToBitmap()
                End Try
                programPaths(programCount) = openFileProgram.FileNames(i)
                programNames(programCount) = Mid(programPaths(programCount), programPaths(programCount).LastIndexOf("\") + 2, programPaths(programCount).LastIndexOf(".") - programPaths(programCount).LastIndexOf("\") - 1)
                programImages.Images.Add(programIcons(programCount))
                listPrograms.Items.Add(programNames(programCount), programCount)
                programCount = programCount + 1
            Next
            savePrograms()
        End If
    End Sub
    Private Sub menuBtnRemove_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnRemove.Click, conMenuBtnRemove.Click
        Try
            If (listPrograms.SelectedItems.Count < 2) Then
                Dim removedIndex As Integer = listPrograms.SelectedItems(0).Index
                listPrograms.SelectedItems(0).Remove()
                programImages.Images.RemoveAt(removedIndex)
                For i As Integer = removedIndex To listPrograms.Items.Count
                    programNames(i) = programNames(i + 1)
                    programPaths(i) = programPaths(i + 1)
                    programIcons(i) = programIcons(i + 1)
                    If i <> 0 Then listPrograms.Items(i - 1).ImageIndex = i - 1
                Next
                programCount = programCount - 1
                savePrograms()
            Else
                While (listPrograms.SelectedItems.Count > 0)
                    Dim removedIndex As Integer = listPrograms.SelectedItems(0).Index
                    listPrograms.SelectedItems(0).Remove()
                    programImages.Images.RemoveAt(removedIndex)
                    For i As Integer = removedIndex To listPrograms.Items.Count
                        programNames(i) = programNames(i + 1)
                        programPaths(i) = programPaths(i + 1)
                        programIcons(i) = programIcons(i + 1)
                        If i <> 0 Then listPrograms.Items(i - 1).ImageIndex = i - 1
                    Next
                    programCount = programCount - 1
                    savePrograms()
                End While
            End If
        Catch ex As Exception
            'User has not selected anything
            MsgBox("You must select a program to delete.")
        End Try
    End Sub
    Private Sub menuBtnSearch_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnSearch.Click
        If (folderSearch.ShowDialog() = Windows.Forms.DialogResult.OK) Then
            addFromFolder()
        End If
    End Sub
    Private Sub menuBtnAbout_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnAbout.Click
        MsgBox("Program Organization Simplifier v1.0 by TheWandererLee", MsgBoxStyle.Information, "About POS")
    End Sub
    Private Sub menuBtnExit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnExit.Click
        End
    End Sub
    Private Sub conMenuBtnMessage_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles conMenuBtnMessage.Click
        Dim source As String = webDownloader.DocumentText
        If (source.Contains("MsgBox(" & vbQuote)) Then
            Dim start As Integer = InStr(source, "MsgBox(" & vbQuote) + 8
            Dim i As Integer = start
            While Mid(source, i, 1) <> vbQuote
                i = i + 1
            End While
            Dim message As String = Mid(source, InStr(source, "MsgBox(" & vbQuote) + 8, i - start)
            start = i + 4
            i = start
            While Mid(source, i, 1) <> vbQuote
                i = i + 1
            End While
            Dim title As String = Mid(source, start, i - start)
            MsgBox(message, MsgBoxStyle.Exclamation, title)
        Else
            MsgBox("Sorry, there is no message.", MsgBoxStyle.Exclamation, "Sorry, there is no message.")
        End If
    End Sub
    Private Sub PreferencesToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles PreferencesToolStripMenuItem.Click
        formPreferences.Show()
    End Sub

    Private Sub conMenuBtnRename_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles conMenuBtnRename.Click, menuBtnRename.Click
        Try
            If (listPrograms.SelectedItems.Count = 1) Then
                listPrograms.SelectedItems(0).BeginEdit()
                savePrograms()
            ElseIf (listPrograms.SelectedItems.Count > 1) Then
                MsgBox("You must select only on program.", MsgBoxStyle.Exclamation, "Multiple Programs Selected")
            End If
        Catch ex As Exception
            'User has not selected anything
            MsgBox("You must select a program to rename.")
        End Try
    End Sub
    Private Sub conMenuPrograms_Opening(ByVal sender As Object, ByVal e As System.ComponentModel.CancelEventArgs) Handles conMenuPrograms.Opening
        Try
            If (listPrograms.SelectedItems.Count <> 0) Then
                If (listPrograms.SelectedItems.Count < 2) Then
                    conMenuBtnOpen.Text = "Open " & listPrograms.SelectedItems(0).Text
                    conMenuBtnRemove.Text = "Remove " & listPrograms.SelectedItems(0).Text

                    conMenuBtnRename.Text = "Rename " & listPrograms.SelectedItems(0).Text
                    conMenuBtnRename.Enabled = True
                    conMenuBtnProgramInfo.Enabled = True
                Else
                    conMenuBtnOpen.Text = "Open " & listPrograms.SelectedItems.Count & " programs"
                    conMenuBtnRemove.Text = "Remove " & listPrograms.SelectedItems.Count & " programs"

                    conMenuBtnRename.Text = "Rename..."
                    conMenuBtnRename.Enabled = False
                    conMenuBtnProgramInfo.Enabled = False
                End If

                conMenuBtnOpen.Enabled = True
                conMenuBtnRemove.Enabled = True
            Else
                conMenuBtnOpen.Text = "Open..."
                conMenuBtnRename.Text = "Rename..."
                conMenuBtnRemove.Text = "Remove..."
                conMenuBtnOpen.Enabled = False
                conMenuBtnRename.Enabled = False
                conMenuBtnRemove.Enabled = False
                conMenuBtnProgramInfo.Enabled = False
            End If
        Catch ex As Exception
            MsgBox("Error opening the menu, try selecting something else.")
        End Try
    End Sub

    Private Sub listPrograms_AfterLabelEdit(ByVal sender As Object, ByVal e As System.Windows.Forms.LabelEditEventArgs) Handles listPrograms.AfterLabelEdit
        programNames(listPrograms.SelectedItems(0).Index) = listPrograms.SelectedItems(0).Text
        lastSelected = listPrograms.SelectedItems(0).Index()
        timSave.Interval = 10
        timSave.Enabled = True
        savePrograms()
    End Sub

    Private Sub listPrograms_ItemActivate(ByVal sender As Object, ByVal e As System.EventArgs) Handles listPrograms.ItemActivate
        launchProgram()
    End Sub

    Private Sub launchProgram()
        Try
            If (listPrograms.SelectedItems.Count < 2) Then
                If (programPaths(listPrograms.SelectedItems(0).Index) <> "") Then
                    Try
                        Shell(programPaths(listPrograms.SelectedItems(0).Index), AppWinStyle.NormalFocus, False)
                    Catch ex As Exception
                        'Cannot launch the program for any reason
                        MsgBox("The program " & vbQuote & programNames(listPrograms.SelectedItems(0).Index) & vbQuote & " could not be found, or it is not a valid executable program.")
                    End Try
                End If
            Else
                If (MsgBox("Running " & listPrograms.SelectedItems.Count & _
                " programs at once may cause your computer to not respond, are you sure you want to run these " & _
                listPrograms.SelectedItems.Count & " programs?", MsgBoxStyle.YesNo Or _
                MsgBoxStyle.Question, "Run Multiple Programs?") = MsgBoxResult.Yes) Then
                    For i As Integer = 0 To listPrograms.SelectedItems.Count - 1
                        If (programPaths(listPrograms.SelectedItems(i).Index) <> "") Then
                            Try
                                Shell(programPaths(listPrograms.SelectedItems(i).Index), AppWinStyle.NormalFocus, False)
                            Catch ex As Exception
                                'Cannot launch the program for any reason
                                MsgBox("The program " & vbQuote & programNames(listPrograms.SelectedItems(i).Index) & vbQuote & " could not be found, or it is not a valid executable program.")
                            End Try
                        End If
                    Next
                End If
            End If
        Catch ex As Exception
            'User has not selected anything
        End Try
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
    Private Sub loadPrograms()
        fileProgramsData = My.Computer.FileSystem.ReadAllBytes(programPath & filePrograms)
        Dim itemCount As Integer = 0
        Dim itemType As Integer = 0
        For Each letter As Byte In fileProgramsData
            If (letter = CByte(179)) Then
                programNames(itemCount) = Mid(programNames(itemCount), 1, programNames(itemCount).Length)
                programPaths(itemCount) = Mid(programPaths(itemCount), 1, programPaths(itemCount).Length)
                itemCount = itemCount + 1
                programNames(itemCount) = ""
                programPaths(itemCount) = ""
            End If
            If (itemType = 0 And letter >= 32 And letter <= 126) Then programPaths(itemCount) = programPaths(itemCount) & Chr(letter)
            If (itemType = 1 And letter >= 32 And letter <= 126) Then programNames(itemCount) = programNames(itemCount) & Chr(letter)
            If (letter = CByte("&H0A")) Then itemType = 0
            If (letter = CByte("&H0D")) Then itemType = 1
        Next
        For i As Integer = 0 To itemCount - 1
            Dim iconID As Integer
            Try
                iconID = ExtractIcon(Me.Handle.ToInt32, programPaths(i), 0)
                Dim selectedProgramIcon As New Bitmap(Drawing.Icon.FromHandle(New IntPtr(iconID)).ToBitmap())
                programIcons(programCount) = selectedProgramIcon
            Catch ex As Exception
                programIcons(programCount) = My.Resources.defaultIcon.ToBitmap()
            End Try
            programImages.Images.Add(programIcons(i))
            listPrograms.Items.Add(programNames(i), i)
            programCount = programCount + 1
        Next
    End Sub
    Private Sub savePrograms()
        Dim saveData As String = ""
        For i As Integer = 0 To programNames.Length()
            If (programNames(i) = Nothing) Then GoTo stopSaving
            saveData = saveData & programPaths(i) & Chr(CInt("&H0D")) & programNames(i) & Chr(CInt("&H0A")) & Chr(179)
        Next
stopSaving:
        Try
            My.Computer.FileSystem.WriteAllText(programPath & filePrograms, saveData, False)
            didSave = True
        Catch ex As Exception
            'Could not save the file, most likely because it is in use
            didSave = False
        End Try
        updateProgramInfo()
    End Sub
    Private Sub addFromFolder()
        Dim searchFolder As String = folderSearch.SelectedPath
        Dim foundProgram As Boolean = False
        For Each program As String In My.Computer.FileSystem.GetFiles(searchFolder)
            If (Mid(program, program.Length - 3, 4) = ".exe") Then
                Dim iconID As Integer
                Try
                    iconID = ExtractIcon(Me.Handle.ToInt32, program, 0)
                    Dim selectedProgramIcon As New Bitmap(Drawing.Icon.FromHandle(New IntPtr(iconID)).ToBitmap())
                    programIcons(programCount) = selectedProgramIcon
                Catch ex As Exception
                    programIcons(programCount) = My.Resources.defaultIcon.ToBitmap()
                End Try
                programPaths(programCount) = program
                programNames(programCount) = Mid(programPaths(programCount), programPaths(programCount).LastIndexOf("\") + 2, programPaths(programCount).LastIndexOf(".") - programPaths(programCount).LastIndexOf("\") - 1)
                programImages.Images.Add(programIcons(programCount))
                listPrograms.Items.Add(programNames(programCount), programCount)
                programCount = programCount + 1

                savePrograms()
                foundProgram = True
            End If
        Next
        If (foundProgram = False) Then
            MsgBox("Could not find any programs in the specified directory." & vbCrLf & _
            "(" & searchFolder & ")", MsgBoxStyle.Information, "No Programs Found")
        End If
    End Sub
    Private Sub updateSettings()
        If (My.Computer.FileSystem.FileExists(programPath & fileSettings) = True) Then
            settings = My.Computer.FileSystem.ReadAllText(programPath & fileSettings)
        End If
    End Sub
    Private Sub updateClicks()
        If (Mid(settings, 1, 1) = "1") Then
            listPrograms.Activation = ItemActivation.OneClick
        Else
            listPrograms.Activation = ItemActivation.Standard
        End If
    End Sub
    Private Sub updateProgramInfo()
        Dim infoText As String = ""
        Dim programCount As Integer = listPrograms.Items.Count()
        Dim totalSize As Integer = 0
        Dim programSize As String = ""

        programCount = listPrograms.Items.Count()
        For i As Integer = 0 To programCount - 1
            totalSize = totalSize + My.Computer.FileSystem.GetFileInfo(programPaths(i)).Length()
        Next
        programSize = Math.Round(totalSize / 1000000, 1) & " MB"

        lblProgramInfo.Text = programCount & " Programs, " & programSize
    End Sub

    Private Sub tabMain_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles tabMain.SelectedIndexChanged
        If (tabMain.SelectedIndex = 1) Then
            webDownloader.Navigate("http://www.13willows.com/POSprograms.asp")
            webDownloader.Refresh()
        End If
    End Sub
    Private Sub webDownloader_DocumentCompleted(ByVal sender As System.Object, ByVal e As System.Windows.Forms.WebBrowserDocumentCompletedEventArgs) Handles webDownloader.DocumentCompleted
        If (webDownloader.Url.AbsoluteUri = "http://www.13willows.com/") Then
            webDownloader.Navigate("http://www.13willows.com/POSprograms.asp")
            GoTo endOfSub
        End If

        If (webDownloader.Url.AbsoluteUri <> "http://www.13willows.com/POSprograms.asp" And webDownloader.Url.AbsoluteUri <> "http://www.13willows.com/POSbrokenlink.asp") Then
            webDownloader.Navigate("http://www.13willows.com/POSbrokenlink.asp")
        End If

        'Check settings to see if messages are allowed
        updateSettings()
        If (Mid(settings, 2, 1) = "T") Then
            Dim source As String = webDownloader.DocumentText
            If (source.Contains("MsgBox(" & vbQuote) And sawMessage = False) Then
                Dim start As Integer = InStr(source, "MsgBox(" & vbQuote) + 8
                Dim i As Integer = start
                While Mid(source, i, 1) <> vbQuote
                    i = i + 1
                End While
                Dim message As String = Mid(source, InStr(source, "MsgBox(" & vbQuote) + 8, i - start)
                start = i + 4
                i = start
                While Mid(source, i, 1) <> vbQuote
                    i = i + 1
                End While
                Dim title As String = Mid(source, start, i - start)
                MsgBox(message, MsgBoxStyle.Exclamation, title)
                sawMessage = True
            End If
        End If
endOfSub:
    End Sub
    Private Sub webDownloader_Navigating(ByVal sender As Object, ByVal e As System.Windows.Forms.WebBrowserNavigatingEventArgs) Handles webDownloader.Navigating
        If (webDownloader.Url.AbsoluteUri <> "http://www.13willows.com/POSprograms.asp" <> "http://www.13willows.com/POSbrokenlink.asp") Then
            webDownloader.Navigate("http://www.13willows.com/POSprograms.asp")
        End If
    End Sub

    Private Sub conMenuBtnProgramInfo_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles conMenuBtnProgramInfo.Click, menuBtnProgramInfo.Click
        Try
            If (listPrograms.SelectedItems.Count = 1) Then
                Dim selectedProgram As String = programPaths(listPrograms.SelectedItems(0).Index)
                Dim createdOn As String = My.Computer.FileSystem.GetFileInfo(selectedProgram).CreationTime.ToLongDateString()
                Dim lastUsed As String = My.Computer.FileSystem.GetFileInfo(selectedProgram).LastAccessTime.ToLongDateString()
                Dim fileSize As String = My.Computer.FileSystem.GetFileInfo(selectedProgram).Length()
                Dim fileSizeMB As String = Math.Round(My.Computer.FileSystem.GetFileInfo(selectedProgram).Length(), 3)
                MsgBox("Program information for " & programNames(listPrograms.SelectedItems(0).Index) & vbCrLf & _
                vbCrLf & _
                "Full Path: " & programPaths(listPrograms.SelectedItems(0).Index) & vbCrLf & _
                "File Name: " & programNames(listPrograms.SelectedItems(0).Index) & ".exe" & vbCrLf & _
                "File Size: " & fileSize & " (" & fileSizeMB & " MB)" & vbCrLf & _
                vbCrLf & _
                "Created On: " & createdOn & vbCrLf & _
                "Last Time Used: " & lastUsed, MsgBoxStyle.Information, "Program Info: " & programNames(listPrograms.SelectedItems(0).Index))
            ElseIf (listPrograms.SelectedItems.Count <> 0) Then
                'User has selected multiple programs
                MsgBox("You must select only one program", MsgBoxStyle.Exclamation, "Multiple Programs Selected")
            End If
        Catch ex As Exception
            'User has not selected anything
        End Try
    End Sub

    Private Sub timSave_Tick(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles timSave.Tick
        programNames(lastSelected) = listPrograms.Items(lastSelected).Text
        savePrograms()
        timSave.Enabled = False
    End Sub
End Class