Public Class formMain
    'Initialize all fluent variables and begin program
    Dim mainPath As String = System.Environment.GetFolderPath(Environment.SpecialFolder.ProgramFiles)
    Dim programFolder As String = "\H-Name\"
    Dim maxOffsets As Integer = 60 'Number of textboxes
    Dim pluginExtension As String = ".dat"
    Dim defaultLabel As String = ""
    Dim defaultTextbox As String = ""
    Dim defaultNoMapName As String = ""
    Dim defaultNoDirectory As String = ""
    Dim offsetChar As String = "/"
    Dim defaultChar As String = ""
    Dim mapOffsetCounter As Integer = 0
    Dim mapLengthCounter As Integer = 0
    Dim mapLabelCounter As Integer = 0
    Dim maxLabelLength As Integer = 35
    Dim actualMaxLabelLength As String = CStr(maxLabelLength)
    Dim vanishingPoint As Integer = 1600
    Dim yInitial As Integer = 30
    Dim bottomSpace As Integer = 12
    Dim constantTextboxX As Integer = 238
    Dim constantLabelX As Integer = 4
    Dim constantTextboxHeight As Integer = 20
    Dim sideSpace As Integer = 6
    Dim dockDistance As Integer = 16
    Dim mapName As New String(" ", 4)
    Dim mapLines(maxOffsets) As String
    Dim mapOffset(maxOffsets) As String
    Dim mapLength(maxOffsets) As Integer
    Dim mapLabel(maxOffsets) As String
    Dim generalCounter As Integer = 0
    Dim subCount As Boolean = False
    Dim mapSelected As String = ""
    Dim mapDirectory As String = ""
    Dim clearScreen As Boolean = True
    Dim mapBinInt0(999), mapBinInt1(999), mapBinInt2(999) As Byte
    Dim mapBinInt3(999), mapBinInt4(999), mapBinInt5(999) As Byte
    Dim mapBinInt6(999), mapBinInt7(999), mapBinInt8(999) As Byte
    Dim mapBinInt9(999), mapBinInt10(999), mapBinInt11(999) As Byte
    Dim mapBinInt12(999), mapBinInt13(999), mapBinInt14(999) As Byte
    Dim mapBinInt15(999), mapBinInt16(999), mapBinInt17(999) As Byte
    Dim mapBinInt18(999), mapBinInt19(999), mapBinInt20(999) As Byte
    Dim mapBinInt21(999), mapBinInt22(999), mapBinInt23(999) As Byte
    Dim mapBinInt24(999), mapBinInt25(999), mapBinInt26(999) As Byte
    Dim mapBinInt27(999), mapBinInt28(999), mapBinInt29(999) As Byte
    Dim mapBinInt30(999), mapBinInt31(999), mapBinInt32(999) As Byte
    Dim mapBinInt33(999), mapBinInt34(999), mapBinInt35(999) As Byte
    Dim mapBinInt36(999), mapBinInt37(999), mapBinInt38(999) As Byte
    Dim mapBinInt39(999), mapBinInt40(999), mapBinInt41(999) As Byte
    Dim mapBinInt42(999), mapBinInt43(999), mapBinInt44(999) As Byte
    Dim mapBinInt45(999), mapBinInt46(999), mapBinInt47(999) As Byte
    Dim mapBinInt48(999), mapBinInt49(999), mapBinInt50(999) As Byte
    Dim mapBinInt51(999), mapBinInt52(999), mapBinInt53(999) As Byte
    Dim mapBinInt54(999), mapBinInt55(999), mapBinInt56(999) As Byte
    Dim mapBinInt57(999), mapBinInt58(999), mapBinInt59(999) As Byte
    Dim mapBinHex(maxOffsets) As String
    Dim mapBinTemp As String = ""
    Dim mapStandardImage(999) As String
    Dim mapConvertedImage(999) As String
    Dim numberOfImages As Integer = 0
    Dim invisibleFormHeight As Integer = 58
    Dim constantPanelWidth As Integer = 382
    Dim constantPanelHeight As Integer = 2000
    Dim formWidth As Integer = 512 '410
    Dim formHeight As Integer = 367
    Dim maxFormHeight As Integer = My.Computer.Screen.WorkingArea.Height
    Dim imageX As Integer = 64
    Dim pluginLengthCounter As Integer = 0
    Dim readChar As String = ""

    Private Sub menuBtnOpen_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnOpen.Click
        setAllTextboxesVisible(False)
        setAllLabels(defaultLabel)
        setAllTextboxes(defaultTextbox)
        If (openMap.ShowDialog = Windows.Forms.DialogResult.OK) Then
            Dim mapID As String = ""
            'MapID checks the last __ digits of the file where __ is file.length + 3
            mapID = Mid(openMap.FileName, openMap.FileName.Length - 11, 8)
            If mapID = "backwash" Then mapSelected = "backwash"
            mapID = Mid(openMap.FileName, openMap.FileName.Length - 14, 11)
            If mapID = "containment" Then mapSelected = "containment"
            mapID = Mid(openMap.FileName, openMap.FileName.Length - 11, 8)
            If mapID = "deltatap" Then mapSelected = "deltatap"
            mapID = Mid(openMap.FileName, openMap.FileName.Length - 7, 4)
            If mapID = "dune" Then mapSelected = "dune"
            mapID = Mid(openMap.FileName, openMap.FileName.Length - 13, 10)
            If mapID = "elongation" Then mapSelected = "elongation"
            mapID = Mid(openMap.FileName, openMap.FileName.Length - 9, 6)
            If mapID = "gemini" Then mapSelected = "gemini"
            mapID = Mid(openMap.FileName, openMap.FileName.Length - 13, 10)
            If mapID = "triplicate" Then mapSelected = "triplicate"
            mapID = Mid(openMap.FileName, openMap.FileName.Length - 7, 4)
            If mapID = "turf" Then mapSelected = "turf"
            mapID = Mid(openMap.FileName, openMap.FileName.Length - 10, 7)
            If mapID = "warlock" Then mapSelected = "warlock"

            mapID = Mid(openMap.FileName, openMap.FileName.Length - 12, 9)
            If mapID = "ascension" Then mapSelected = "ascension"
            mapID = Mid(openMap.FileName, openMap.FileName.Length - 14, 11)
            If mapID = "beavercreek" Then mapSelected = "beavercreek"
            mapID = Mid(openMap.FileName, openMap.FileName.Length - 16, 13)
            If mapID = "burial_mounds" Then mapSelected = "burial_mounds"
            mapID = Mid(openMap.FileName, openMap.FileName.Length - 14, 11)
            If mapID = "coagulation" Then mapSelected = "coagulation"
            mapID = Mid(openMap.FileName, openMap.FileName.Length - 11, 8)
            If mapID = "colossus" Then mapSelected = "colossus"
            mapID = Mid(openMap.FileName, openMap.FileName.Length - 12, 9)
            If mapID = "cyclotron" Then mapSelected = "cyclotron"
            mapID = Mid(openMap.FileName, openMap.FileName.Length - 13, 10)
            If mapID = "foundation" Then mapSelected = "foundation"
            mapID = Mid(openMap.FileName, openMap.FileName.Length - 11, 8)
            If mapID = "headlong" Then mapSelected = "headlong"
            mapID = Mid(openMap.FileName, openMap.FileName.Length - 10, 7)
            If mapID = "lockout" Then mapSelected = "lockout"
            mapID = Mid(openMap.FileName, openMap.FileName.Length - 10, 7)
            If mapID = "midship" Then mapSelected = "midship"
            mapID = Mid(openMap.FileName, openMap.FileName.Length - 13, 10)
            If mapID = "waterworks" Then mapSelected = "waterworks"
            mapID = Mid(openMap.FileName, openMap.FileName.Length - 11, 8)
            If mapID = "zanzibar" Then mapSelected = "zanzibar"

            mapID = Mid(openMap.FileName, openMap.FileName.Length - 9, 6)
            If mapID = "shared" Then mapSelected = "shared"
            mapID = Mid(openMap.FileName, openMap.FileName.Length - 11, 8)
            If mapID = "mainmenu" Then mapSelected = "mainmenu"

            If mapID = "" Then GoTo ErrorMapNotRecognized
            mapDirectory = Mid(openMap.FileName, 1, openMap.FileName.Length - 4 - mapSelected.Length)
        Else
            clearScreen = False
            GoTo StopOpeningMap
        End If
        loadingSequence(True, True)
        'Set statusbar to appropriate values and set initial variables
        statusLblMapName.Text = mapSelected
        statusLblMapFilePath.Text = mapDirectory
        Me.Height = invisibleFormHeight
        'Check if file is in use already, as well as open the file
        Try
            FileOpen(133, mapDirectory & mapSelected & ".map", OpenMode.Binary)
        Catch ex As Exception
            MsgBox("Error: Unable to open file." & vbCrLf & "File is in use by another process/application.", MsgBoxStyle.Critical, "Error")
            GoTo StopOpeningMap
        End Try
        'Make sure that it is possible to open the map
        If (My.Computer.FileSystem.DirectoryExists(mapDirectory) = False) Then
            MsgBox("Directory does not exist.")
            GoTo StopOpeningMap
        End If
        If (My.Computer.FileSystem.FileExists(mapDirectory & mapSelected & ".map") = False) Then
            If (mapSelected = "") Then
                MsgBox("Choose a map from the list.", MsgBoxStyle.Exclamation, "Choose a map")
                GoTo StopOpeningMap
            End If
            MsgBox(mapSelected & " does not exist in the directory " & mapDirectory)
            GoTo StopOpeningMap
        End If

        If (My.Computer.FileSystem.FileExists(mainPath & programFolder & mapSelected & pluginExtension) = False) Then
            MsgBox("No plugin found for the map (" & mapSelected & ").", MsgBoxStyle.Information, "No Plugin Found")
            GoTo StopOpeningMap
        End If
        For i As Integer = 0 To maxOffsets
            mapLines(i) = Nothing
            mapOffset(i) = Nothing
            mapLength(i) = Nothing
            mapLabel(i) = Nothing
        Next
        'Fill in the correct values for the mapLines() array variable with new plugin
        Dim j As Integer = 0
        For Each lineLetter As String In My.Computer.FileSystem.ReadAllText(mainPath & programFolder & mapSelected & pluginExtension)
            mapLines(j) = mapLines(j) & lineLetter
            If (lineLetter = vbLf Or lineLetter = "^") Then
                j = j + 1
            End If
        Next
        'Read all the offsets, lengths, and descriptions from lines of plugin
        For p As Integer = 0 To mapLines.Length
            If (mapLines(p) = Nothing) Then GoTo stopReading
            mapOffset(p) = CInt("&H" & Mid(mapLines(p), 2, 8))
            mapLength(p) = CInt(Mid(mapLines(p), 11, 3))
            mapLabel(p) = CStr(Mid(mapLines(p), 15, mapLines(p).IndexOf(vbCr) - 14))
            Dim tempLengthCheck As New String(" ", Mid(mapLines(p), 11, 3))
            FileGet(133, tempLengthCheck, CInt(mapOffset(p) + 1))
            If (tempLengthCheck.IndexOf(Nothing) = -1) Then
                mapLength(p) = CInt(Mid(mapLines(p), 11, 3))
            Else
                mapLength(p) = tempLengthCheck.IndexOf(Nothing)
            End If
        Next
stopReading:
        setAllTextboxesMaxLength()
        progLoading.Value = 0
        'Sets the map binary texts for use later
        FileGet(133, mapName, 409)
        generalCounter = 0
        'Sets textbox text to the map binary text accordingly as well as decides
        'whether or not to hide the textbox
        If (setAllTextboxesText() = False) Then GoTo ErrorIncorrectPlugin
        'Close the file after done reading from it
        FileClose(133)
        GoTo FinishedOpeningMap
ErrorIncorrectPlugin:
        MsgBox("Error: " & vbCrLf & "The plugin offsets are past the end of the map," & _
        vbCrLf & "or the plugin offsets are not in hexadecimal format.", MsgBoxStyle.Information, _
        "Error: Plugin Incorrect Format")
ErrorMapNotRecognized:
        MsgBox("Error: " & vbCrLf & "This map is not supported in this version.", _
        MsgBoxStyle.Information, "Error: Map Not Supported")
        GoTo StopOpeningMap
ErrorLineTooLong:
        MsgBox("Error:" & vbCrLf & "A line in one of the plugins is longer than the maximum amount characters allowed.", _
        MsgBoxStyle.Information, "Error: Plugin Line Too Long")
        GoTo StopOpeningMap
StopOpeningMap:
        statusLblMapName.Text = defaultNoMapName
        statusLblMapFilePath.Text = defaultNoDirectory
        setAllTextboxesVisible(False)
        setAllLabels(defaultLabel)
        Me.Height = formHeight
        GoTo EndOfOpeningMap
FinishedOpeningMap:
        'Final Attribute changes upon opening the map
        setAllTextboxesVisible(True)
        confirmTextboxesVisibility()
        syncAllTextboxes()
        convertAllTextboxes()
        adjustScrollbar()
        Me.Height = vanishingPoint + 96 + bottomSpace
        'Update plugin source information
        If statusLblMapName.Text <> "" Then
            Try
                formEditPlugin.txtPluginSource.Text = My.Computer.FileSystem.ReadAllText(mainPath & programFolder & statusLblMapName.Text & pluginExtension)
                formEditPlugin.Text = "Plugin Source: " & statusLblMapName.Text & pluginExtension
            Catch ex As Exception
                MsgBox("Plugin not found")
                formEditPlugin.txtPluginSource.Text = "No Plugin Found"
            End Try
        Else
            MsgBox("No Map Opened")
            formEditPlugin.txtPluginSource.Text = "No Map Opened"
        End If
        'Clear initial message
        picInitialPicture.Visible = False
        statusLblSeparator.Visible = True
        statusLblStatus.Text = "Status: "
        formEditPlugin.txtPluginSource.Enabled = True
        formEditPlugin.btnSavePlugin.Enabled = True
EndOfOpeningMap:
        loadingSequence(False, False)
    End Sub
    Private Sub menuBtnSave_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnSave.Click
        Dim generalCounter As Integer = 0
        Dim subCount As Boolean = False
        Dim mapOffset() As Integer = {0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0} 'Map offsets stored in this variable (in decimal)
        Dim mapOffsetCounter As Integer = 0
        Dim mapLines() As String = {defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar}
        loadingSequence(True, True)
        If (statusLblMapName.Text = defaultNoMapName) Then
            GoTo ErrorNoMapOpened
        End If
        If (confirmTextboxesLength() = False) Then GoTo ErrorTextboxIncorrectLength
        FileOpen(133, statusLblMapFilePath.Text & statusLblMapName.Text & ".map", OpenMode.Binary)
        'Reverts all the textboxes so that the images can be detected correctly
        syncAllTextboxes()
        revertAllTextboxes()
        'Saves the map and closes the file
        saveMap(133)
        convertAllTextboxes()
        FileClose(133)
        GoTo MapSaved
MapSaved:
        MsgBox("Map Saved" & vbCrLf & "Resign " & statusLblMapName.Text & " now.")
        'Sets all values back to their default/blank if no map is opened
        ''Used to close the map after saving
        ''Dim defaultLabel As String = ""
        ''setAllTextboxesVisible(False)
        ''setAllLabels(defaultLabel)
        ''statusLblMapName.Text = defaultNoMapName
        ''statusLblMapFilePath.Text = defaultNoMapName
        ''statusLblSeparator.Visible = False
        ''formEditPlugin.Text = "No Map Opened"
        ''formEditPlugin.txtPluginSource.Text = "No Map Opened"
        ''formEditPlugin.lblPluginName.Text = "No Plugin Opened"
        GoTo EndOfSub
ErrorTextboxIncorrectLength:
        GoTo EndOfSub
ErrorNoMapOpened:
        MsgBox("Error:" & vbCrLf & "No Map Opened", MsgBoxStyle.Exclamation, "Error")
        GoTo EndOfSub
ErrorUnknownMap:
        MsgBox("Error:" & vbCrLf & "Unable To Save Map" & vbCrLf & vbCrLf & _
        "Reason:" & vbCrLf & "Unknown Map Name (" & _
        Mid(statusLblMapName.Text, 1, 8) & ")" & vbCrLf & "OR" & vbCrLf & _
        "Expected map (..." & Mid(statusLblMapFilePath.Text, statusLblMapFilePath.Text.Length - 14, 15) & ") is not (..." & Mid(statusLblMapFilePath.Text, statusLblMapFilePath.Text.Length - 14, 15) & ")")
        GoTo EndOfSub
EndOfSub:
        loadingSequence(False, True)
    End Sub
    Private Sub menuBtnClose_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnClose.Click
        'Sets all values back to their default/blank if no map is opened
        setAllTextboxesVisible(False)
        setAllLabels(defaultLabel)
        statusLblMapName.Text = defaultNoMapName
        statusLblMapFilePath.Text = defaultNoMapName
        statusLblSeparator.Visible = False
        formEditPlugin.Text = "No Map Opened"
        formEditPlugin.txtPluginSource.Text = "No Map Opened"
        formEditPlugin.lblPluginName.Text = "No Plugin Opened"
    End Sub
    Private Sub menuBtnExit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnExit.Click
        'MENU CLICK: File > Exit
        End
    End Sub

    Private Sub menuBtnHelpAbout_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnHelpAbout.Click
        'MENU CLICK: Help > About
        MsgBox("H-Name, created by TheWandererLee" & vbCrLf & _
        "Plugins created by TheWandererLee, chrasherx, and InflamedJMan" & vbCrLf & vbCrLf & _
        "Version 1.7.0.0", MsgBoxStyle.Information, "About H-Name")
    End Sub
    Private Sub menuBtnDebug_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnDebug.Click
        MsgBox("Program Files: " & System.Environment.GetFolderPath(Environment.SpecialFolder.ProgramFiles) & _
        vbCrLf & "Application Directory: " & System.Environment.CurrentDirectory, MsgBoxStyle.Information, "Debug Information")
    End Sub

    Private Sub formMain_MoveResize(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Move, Me.Resize
        customDockWindow()
        If (Me.Bottom > maxFormHeight) Then Me.Height = maxFormHeight - Me.Top
    End Sub
    Private Sub formMain_Resize(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Resize
        'Customly docks the control to the right and checks how big window is
        If Me.Height > vanishingPoint + 96 + bottomSpace Then Me.Height = vanishingPoint + 96 + bottomSpace
        vsbMain.Visible = True
        If (Me.Height >= vanishingPoint + 96 + bottomSpace) Then vsbMain.Visible = False
        vsbMain.Location = New Point(Me.Width - 25, 24)
        vsbMain.Size = New Size(17, Me.Height - 82)
        progLoading.Size = New Size(Me.Width - 8, progLoading.Size.Height)
        adjustScrollbar()
        dockAllTextboxes()
    End Sub
    Private Sub vsbMain_Scroll(ByVal sender As System.Object, ByVal e As System.Windows.Forms.ScrollEventArgs) Handles vsbMain.Scroll
        adjustScrollbar()
    End Sub
    Private Sub formMain_SizeChanged(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.SizeChanged
        If (Me.Size.Width <= 162 And Me.Size.Height <= 32) Then
            formPlugins.Hide()
            formEditPlugin.Hide()
        End If
    End Sub

    Private Sub menuBtnEditPlugin_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnViewPlugin.Click
        formEditPlugin.Hide()
        formEditPlugin.Show()
    End Sub
    Private Sub WritePluginsToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnManagePlugins.Click
        formPlugins.Hide()
        formPlugins.Show()
    End Sub
    Private Sub formMain_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        'Hide window so users do not see startup operations
        Me.Visible = False
        Me.Enabled = False
        'Declare and initialize startup variables
        Dim missingAPlugin As Boolean = False
        Dim firstTime As Boolean = False
        statusLblMapFilePath.Text = ""
        statusLblMapName.Text = ""
        statusLblSeparator.Visible = False
        loadImageStrings()

        'Fixes the window so it cannot be maximized. Maximizing the window causes
        'problems with the scrollbar, forcing the window to bottom of screen. ???
        Me.MaximizeBox = False

        'Customly docks the control to the right and checks how big window is
        If (Me.Height >= vanishingPoint) Then vsbMain.Visible = False
        If (Me.Height < vanishingPoint) Then vsbMain.Visible = True
        vsbMain.Location = New Point(Me.Width - 25, 24)
        vsbMain.Size = New Size(17, Me.Height - 82)
        adjustScrollbar()

        'Checks to see if any plugins are missing
        If (My.Computer.FileSystem.FileExists(mainPath & programFolder & "backwash" & pluginExtension) = False Or _
        My.Computer.FileSystem.FileExists(mainPath & programFolder & "deltatap" & pluginExtension) = False Or _
        My.Computer.FileSystem.FileExists(mainPath & programFolder & "dune" & pluginExtension) = False Or _
        My.Computer.FileSystem.FileExists(mainPath & programFolder & "elongation" & pluginExtension) = False Or _
        My.Computer.FileSystem.FileExists(mainPath & programFolder & "gemini" & pluginExtension) = False Or _
        My.Computer.FileSystem.FileExists(mainPath & programFolder & "triplicate" & pluginExtension) = False Or _
        My.Computer.FileSystem.FileExists(mainPath & programFolder & "turf" & pluginExtension) = False Or _
        My.Computer.FileSystem.FileExists(mainPath & programFolder & "warlock" & pluginExtension) = False Or _
        My.Computer.FileSystem.FileExists(mainPath & programFolder & "ascension" & pluginExtension) = False Or _
        My.Computer.FileSystem.FileExists(mainPath & programFolder & "beavercreek" & pluginExtension) = False Or _
        My.Computer.FileSystem.FileExists(mainPath & programFolder & "burial_mounds" & pluginExtension) = False Or _
        My.Computer.FileSystem.FileExists(mainPath & programFolder & "coagulation" & pluginExtension) = False Or _
        My.Computer.FileSystem.FileExists(mainPath & programFolder & "colossus" & pluginExtension) = False Or _
        My.Computer.FileSystem.FileExists(mainPath & programFolder & "cyclotron" & pluginExtension) = False Or _
        My.Computer.FileSystem.FileExists(mainPath & programFolder & "foundation" & pluginExtension) = False Or _
        My.Computer.FileSystem.FileExists(mainPath & programFolder & "headlong" & pluginExtension) = False Or _
        My.Computer.FileSystem.FileExists(mainPath & programFolder & "lockout" & pluginExtension) = False Or _
        My.Computer.FileSystem.FileExists(mainPath & programFolder & "midship" & pluginExtension) = False Or _
        My.Computer.FileSystem.FileExists(mainPath & programFolder & "waterworks" & pluginExtension) = False Or _
        My.Computer.FileSystem.FileExists(mainPath & programFolder & "zanzibar" & pluginExtension) = False Or _
        My.Computer.FileSystem.FileExists(mainPath & programFolder & "shared" & pluginExtension) = False Or _
        My.Computer.FileSystem.FileExists(mainPath & programFolder & "mainmenu" & pluginExtension) = False) Then
            missingAPlugin = True
            MsgBox("Default program plugins are missing. Please choose which plugins to rewrite.")
            formPlugins.Show()
        End If

        'Create the Program Files directory automatically
        If (My.Computer.FileSystem.DirectoryExists(mainPath & programFolder) = False) Then
            My.Computer.FileSystem.CreateDirectory(mainPath & programFolder)
        End If

        'Write README file automatically
        If (My.Computer.FileSystem.FileExists(mainPath & programFolder & "README.txt") = False) Then
            My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "README.txt", _
            "Do not edit the contents of any of the " & pluginExtension & " plugin files for each map unless you read the instructions below." & vbCrLf & "If the program starts acting weird or the values are incorrect, delete the plugin for that map, or for all the maps." & vbCrLf & "The program will rewrite all of the plugins if you click 'yes' when prompted to do so." & vbCrLf & vbCrLf & "To Create Your Own Plugin:" & vbCrLf & vbCrLf & "Format:  \OOOOOOOO~LLL`Label Or Description^" & vbCrLf & "Example 1: This is the first territory\24621192~010`Territory One^" & vbCrLf & "Example 2: \24621192~010`Territory Numero Uno^" & vbCrLf & vbCrLf & "	COMMENT(Optional): Here you can put a short comment that the program skips over" & vbCrLf & "\: Tells program this is the beginning of the offset" & vbCrLf & "	OOOOOOOO: Offset (In Binary)" & vbCrLf & "~: Tells program this is the beginning of the length" & vbCrLf & "	LLL: 3-Digit(eg. 109, 017, 004) Integer that is the length to read after the offset" & vbCrLf & "`: Tells program this is the beginning of the label" & vbCrLf & "	Label Or Description: This is the label before the textbox, in order" & vbCrLf & "^: Tells program this is the end of the description" & vbCrLf & vbCrLf & "Rules:" & vbCrLf & "Offsets MUST be in binary, numeric digits 0-9 only. EXACTLY 8 digits in length." & vbCrLf & "Length MUST be in binary, EXACTLY 3 digits. Instead of 9 use 009, instead of 16 use 016." & vbCrLf & "Labels MUST be a string, ranging from 0 to " & actualMaxLabelLength & " alphanumeric characters in length, inclusively." & vbCrLf & "All plugins must end with any long string of characters. 25 characters at least." & vbCrLf & "(Example: [END OF FILE][Plugin created by TheWandererLee for use with H-Name deltatap offsets.])" & vbCrLf & vbCrLf & "If one of these rules is broken, the program will error when loading your plugin.", False)
        End If

        'Move everything to it's corresponding spot and resize progress bar
        positionAllTextboxes()
        positionAllLabels()
        adjustBorders()
        adjustScrollbar()

        'Make self visible and enabled to start the program
        Me.Enabled = True
        Me.Visible = True
    End Sub

    Private Sub setAllLabels(ByVal labelText As String)
        Dim defaultLabel As String = labelText
        lblOffset0.Text = defaultLabel
        lblOffset1.Text = defaultLabel
        lblOffset2.Text = defaultLabel
        lblOffset3.Text = defaultLabel
        lblOffset4.Text = defaultLabel
        lblOffset5.Text = defaultLabel
        lblOffset6.Text = defaultLabel
        lblOffset7.Text = defaultLabel
        lblOffset8.Text = defaultLabel
        lblOffset9.Text = defaultLabel
        lblOffset10.Text = defaultLabel
        lblOffset11.Text = defaultLabel
        lblOffset12.Text = defaultLabel
        lblOffset13.Text = defaultLabel
        lblOffset14.Text = defaultLabel
        lblOffset15.Text = defaultLabel
        lblOffset16.Text = defaultLabel
        lblOffset17.Text = defaultLabel
        lblOffset18.Text = defaultLabel
        lblOffset19.Text = defaultLabel
        lblOffset20.Text = defaultLabel
        lblOffset21.Text = defaultLabel
        lblOffset22.Text = defaultLabel
        lblOffset23.Text = defaultLabel
        lblOffset24.Text = defaultLabel
        lblOffset25.Text = defaultLabel
        lblOffset26.Text = defaultLabel
        lblOffset27.Text = defaultLabel
        lblOffset28.Text = defaultLabel
        lblOffset29.Text = defaultLabel
        lblOffset30.Text = defaultLabel
        lblOffset31.Text = defaultLabel
        lblOffset32.Text = defaultLabel
        lblOffset33.Text = defaultLabel
        lblOffset34.Text = defaultLabel
        lblOffset35.Text = defaultLabel
        lblOffset36.Text = defaultLabel
        lblOffset37.Text = defaultLabel
        lblOffset38.Text = defaultLabel
        lblOffset39.Text = defaultLabel
        lblOffset40.Text = defaultLabel
        lblOffset41.Text = defaultLabel
        lblOffset42.Text = defaultLabel
        lblOffset43.Text = defaultLabel
        lblOffset44.Text = defaultLabel
        lblOffset45.Text = defaultLabel
        lblOffset46.Text = defaultLabel
        lblOffset47.Text = defaultLabel
        lblOffset48.Text = defaultLabel
        lblOffset49.Text = defaultLabel
        lblOffset50.Text = defaultLabel
        lblOffset51.Text = defaultLabel
        lblOffset52.Text = defaultLabel
        lblOffset53.Text = defaultLabel
        lblOffset54.Text = defaultLabel
        lblOffset55.Text = defaultLabel
        lblOffset56.Text = defaultLabel
        lblOffset57.Text = defaultLabel
        lblOffset58.Text = defaultLabel
        lblOffset59.Text = defaultLabel
    End Sub
    Private Sub setAllTextboxesVisible(ByVal txtVisible As Boolean)
        txtOffset0.Visible = txtVisible
        txtOffset1.Visible = txtVisible
        txtOffset2.Visible = txtVisible
        txtOffset3.Visible = txtVisible
        txtOffset4.Visible = txtVisible
        txtOffset5.Visible = txtVisible
        txtOffset6.Visible = txtVisible
        txtOffset7.Visible = txtVisible
        txtOffset8.Visible = txtVisible
        txtOffset9.Visible = txtVisible
        txtOffset10.Visible = txtVisible
        txtOffset11.Visible = txtVisible
        txtOffset12.Visible = txtVisible
        txtOffset13.Visible = txtVisible
        txtOffset14.Visible = txtVisible
        txtOffset15.Visible = txtVisible
        txtOffset16.Visible = txtVisible
        txtOffset17.Visible = txtVisible
        txtOffset18.Visible = txtVisible
        txtOffset19.Visible = txtVisible
        txtOffset20.Visible = txtVisible
        txtOffset21.Visible = txtVisible
        txtOffset22.Visible = txtVisible
        txtOffset23.Visible = txtVisible
        txtOffset24.Visible = txtVisible
        txtOffset25.Visible = txtVisible
        txtOffset26.Visible = txtVisible
        txtOffset27.Visible = txtVisible
        txtOffset28.Visible = txtVisible
        txtOffset29.Visible = txtVisible
        txtOffset30.Visible = txtVisible
        txtOffset31.Visible = txtVisible
        txtOffset32.Visible = txtVisible
        txtOffset33.Visible = txtVisible
        txtOffset34.Visible = txtVisible
        txtOffset35.Visible = txtVisible
        txtOffset36.Visible = txtVisible
        txtOffset37.Visible = txtVisible
        txtOffset38.Visible = txtVisible
        txtOffset39.Visible = txtVisible
        txtOffset40.Visible = txtVisible
        txtOffset41.Visible = txtVisible
        txtOffset42.Visible = txtVisible
        txtOffset43.Visible = txtVisible
        txtOffset44.Visible = txtVisible
        txtOffset45.Visible = txtVisible
        txtOffset46.Visible = txtVisible
        txtOffset47.Visible = txtVisible
        txtOffset48.Visible = txtVisible
        txtOffset49.Visible = txtVisible
        txtOffset50.Visible = txtVisible
        txtOffset51.Visible = txtVisible
        txtOffset52.Visible = txtVisible
        txtOffset53.Visible = txtVisible
        txtOffset54.Visible = txtVisible
        txtOffset55.Visible = txtVisible
        txtOffset56.Visible = txtVisible
        txtOffset57.Visible = txtVisible
        txtOffset58.Visible = txtVisible
        txtOffset59.Visible = txtVisible
    End Sub
    Private Sub confirmTextboxesVisibility()
        If txtOffset0.Text = "" Then txtOffset0.Visible = False
        If txtOffset1.Text = "" Then txtOffset1.Visible = False
        If txtOffset2.Text = "" Then txtOffset2.Visible = False
        If txtOffset3.Text = "" Then txtOffset3.Visible = False
        If txtOffset4.Text = "" Then txtOffset4.Visible = False
        If txtOffset5.Text = "" Then txtOffset5.Visible = False
        If txtOffset6.Text = "" Then txtOffset6.Visible = False
        If txtOffset7.Text = "" Then txtOffset7.Visible = False
        If txtOffset8.Text = "" Then txtOffset8.Visible = False
        If txtOffset9.Text = "" Then txtOffset9.Visible = False
        If txtOffset10.Text = "" Then txtOffset10.Visible = False
        If txtOffset11.Text = "" Then txtOffset11.Visible = False
        If txtOffset12.Text = "" Then txtOffset12.Visible = False
        If txtOffset13.Text = "" Then txtOffset13.Visible = False
        If txtOffset14.Text = "" Then txtOffset14.Visible = False
        If txtOffset15.Text = "" Then txtOffset15.Visible = False
        If txtOffset16.Text = "" Then txtOffset16.Visible = False
        If txtOffset17.Text = "" Then txtOffset17.Visible = False
        If txtOffset18.Text = "" Then txtOffset18.Visible = False
        If txtOffset19.Text = "" Then txtOffset19.Visible = False
        If txtOffset20.Text = "" Then txtOffset20.Visible = False
        If txtOffset21.Text = "" Then txtOffset21.Visible = False
        If txtOffset22.Text = "" Then txtOffset22.Visible = False
        If txtOffset23.Text = "" Then txtOffset23.Visible = False
        If txtOffset24.Text = "" Then txtOffset24.Visible = False
        If txtOffset25.Text = "" Then txtOffset25.Visible = False
        If txtOffset26.Text = "" Then txtOffset26.Visible = False
        If txtOffset27.Text = "" Then txtOffset27.Visible = False
        If txtOffset28.Text = "" Then txtOffset28.Visible = False
        If txtOffset29.Text = "" Then txtOffset29.Visible = False
        If txtOffset30.Text = "" Then txtOffset30.Visible = False
        If txtOffset31.Text = "" Then txtOffset31.Visible = False
        If txtOffset32.Text = "" Then txtOffset32.Visible = False
        If txtOffset33.Text = "" Then txtOffset33.Visible = False
        If txtOffset34.Text = "" Then txtOffset34.Visible = False
        If txtOffset35.Text = "" Then txtOffset35.Visible = False
        If txtOffset36.Text = "" Then txtOffset36.Visible = False
        If txtOffset37.Text = "" Then txtOffset37.Visible = False
        If txtOffset38.Text = "" Then txtOffset38.Visible = False
        If txtOffset39.Text = "" Then txtOffset39.Visible = False
        If txtOffset40.Text = "" Then txtOffset40.Visible = False
        If txtOffset41.Text = "" Then txtOffset41.Visible = False
        If txtOffset42.Text = "" Then txtOffset42.Visible = False
        If txtOffset43.Text = "" Then txtOffset43.Visible = False
        If txtOffset44.Text = "" Then txtOffset44.Visible = False
        If txtOffset45.Text = "" Then txtOffset45.Visible = False
        If txtOffset46.Text = "" Then txtOffset46.Visible = False
        If txtOffset47.Text = "" Then txtOffset47.Visible = False
        If txtOffset48.Text = "" Then txtOffset48.Visible = False
        If txtOffset49.Text = "" Then txtOffset49.Visible = False
        If txtOffset50.Text = "" Then txtOffset50.Visible = False
        If txtOffset51.Text = "" Then txtOffset51.Visible = False
        If txtOffset52.Text = "" Then txtOffset52.Visible = False
        If txtOffset53.Text = "" Then txtOffset53.Visible = False
        If txtOffset54.Text = "" Then txtOffset54.Visible = False
        If txtOffset55.Text = "" Then txtOffset55.Visible = False
        If txtOffset56.Text = "" Then txtOffset56.Visible = False
        If txtOffset57.Text = "" Then txtOffset57.Visible = False
        If txtOffset58.Text = "" Then txtOffset58.Visible = False
        If txtOffset59.Text = "" Then txtOffset59.Visible = False
    End Sub
    Private Function confirmTextboxesLength()
        Dim defaultNoMapName As String = ""
        'Makes sure all the textboxes are the correct length
        If (statusLblMapName.Text <> defaultNoMapName) Then
            If (txtOffset0.Text.Length <> txtOffset0.MaxLength Or _
            txtOffset1.Text.Length <> txtOffset1.MaxLength Or _
            txtOffset2.Text.Length <> txtOffset2.MaxLength Or _
            txtOffset3.Text.Length <> txtOffset3.MaxLength Or _
            txtOffset4.Text.Length <> txtOffset4.MaxLength Or _
            txtOffset5.Text.Length <> txtOffset5.MaxLength Or _
            txtOffset6.Text.Length <> txtOffset6.MaxLength Or _
            txtOffset7.Text.Length <> txtOffset7.MaxLength Or _
            txtOffset8.Text.Length <> txtOffset8.MaxLength Or _
            txtOffset9.Text.Length <> txtOffset9.MaxLength Or _
            txtOffset10.Text.Length <> txtOffset10.MaxLength Or _
            txtOffset11.Text.Length <> txtOffset11.MaxLength Or _
            txtOffset12.Text.Length <> txtOffset12.MaxLength Or _
            txtOffset13.Text.Length <> txtOffset13.MaxLength Or _
            txtOffset14.Text.Length <> txtOffset14.MaxLength Or _
            txtOffset15.Text.Length <> txtOffset15.MaxLength Or _
            txtOffset16.Text.Length <> txtOffset16.MaxLength Or _
            txtOffset17.Text.Length <> txtOffset17.MaxLength Or _
            txtOffset18.Text.Length <> txtOffset18.MaxLength Or _
            txtOffset19.Text.Length <> txtOffset19.MaxLength Or _
            txtOffset20.Text.Length <> txtOffset20.MaxLength Or _
            txtOffset21.Text.Length <> txtOffset21.MaxLength Or _
            txtOffset22.Text.Length <> txtOffset22.MaxLength Or _
            txtOffset23.Text.Length <> txtOffset23.MaxLength Or _
            txtOffset24.Text.Length <> txtOffset24.MaxLength Or _
            txtOffset25.Text.Length <> txtOffset25.MaxLength Or _
            txtOffset26.Text.Length <> txtOffset26.MaxLength Or _
            txtOffset27.Text.Length <> txtOffset27.MaxLength Or _
            txtOffset28.Text.Length <> txtOffset28.MaxLength Or _
            txtOffset29.Text.Length <> txtOffset29.MaxLength Or _
            txtOffset30.Text.Length <> txtOffset30.MaxLength Or _
            txtOffset31.Text.Length <> txtOffset31.MaxLength Or _
            txtOffset32.Text.Length <> txtOffset32.MaxLength Or _
            txtOffset33.Text.Length <> txtOffset33.MaxLength Or _
            txtOffset34.Text.Length <> txtOffset34.MaxLength Or _
            txtOffset35.Text.Length <> txtOffset35.MaxLength Or _
            txtOffset36.Text.Length <> txtOffset36.MaxLength Or _
            txtOffset37.Text.Length <> txtOffset37.MaxLength Or _
            txtOffset38.Text.Length <> txtOffset38.MaxLength Or _
            txtOffset39.Text.Length <> txtOffset39.MaxLength Or _
            txtOffset40.Text.Length <> txtOffset40.MaxLength Or _
            txtOffset41.Text.Length <> txtOffset41.MaxLength Or _
            txtOffset42.Text.Length <> txtOffset42.MaxLength Or _
            txtOffset43.Text.Length <> txtOffset43.MaxLength Or _
            txtOffset44.Text.Length <> txtOffset44.MaxLength Or _
            txtOffset45.Text.Length <> txtOffset45.MaxLength Or _
            txtOffset46.Text.Length <> txtOffset46.MaxLength Or _
            txtOffset47.Text.Length <> txtOffset47.MaxLength Or _
            txtOffset48.Text.Length <> txtOffset48.MaxLength Or _
            txtOffset49.Text.Length <> txtOffset49.MaxLength Or _
            txtOffset50.Text.Length <> txtOffset50.MaxLength Or _
            txtOffset51.Text.Length <> txtOffset51.MaxLength Or _
            txtOffset52.Text.Length <> txtOffset52.MaxLength Or _
            txtOffset53.Text.Length <> txtOffset53.MaxLength Or _
            txtOffset54.Text.Length <> txtOffset54.MaxLength Or _
            txtOffset55.Text.Length <> txtOffset55.MaxLength Or _
            txtOffset56.Text.Length <> txtOffset56.MaxLength Or _
            txtOffset57.Text.Length <> txtOffset57.MaxLength Or _
            txtOffset58.Text.Length <> txtOffset58.MaxLength Or _
            txtOffset59.Text.Length <> txtOffset59.MaxLength) Then
                Dim errorBefore As String = "Textbox ("
                Dim errorAfter As String = vbCrLf & ") is incorrect length."
                If (txtOffset0.Text.Length <> txtOffset0.MaxLength) Then MsgBox(errorBefore & lblOffset0.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset1.Text.Length <> txtOffset1.MaxLength) Then MsgBox(errorBefore & lblOffset1.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset2.Text.Length <> txtOffset2.MaxLength) Then MsgBox(errorBefore & lblOffset2.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset3.Text.Length <> txtOffset3.MaxLength) Then MsgBox(errorBefore & lblOffset3.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset4.Text.Length <> txtOffset4.MaxLength) Then MsgBox(errorBefore & lblOffset4.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset5.Text.Length <> txtOffset5.MaxLength) Then MsgBox(errorBefore & lblOffset5.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset6.Text.Length <> txtOffset6.MaxLength) Then MsgBox(errorBefore & lblOffset6.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset7.Text.Length <> txtOffset7.MaxLength) Then MsgBox(errorBefore & lblOffset7.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset8.Text.Length <> txtOffset8.MaxLength) Then MsgBox(errorBefore & lblOffset8.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset9.Text.Length <> txtOffset9.MaxLength) Then MsgBox(errorBefore & lblOffset9.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset10.Text.Length <> txtOffset10.MaxLength) Then MsgBox(errorBefore & lblOffset10.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset11.Text.Length <> txtOffset11.MaxLength) Then MsgBox(errorBefore & lblOffset11.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset12.Text.Length <> txtOffset12.MaxLength) Then MsgBox(errorBefore & lblOffset12.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset13.Text.Length <> txtOffset13.MaxLength) Then MsgBox(errorBefore & lblOffset13.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset14.Text.Length <> txtOffset14.MaxLength) Then MsgBox(errorBefore & lblOffset14.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset15.Text.Length <> txtOffset15.MaxLength) Then MsgBox(errorBefore & lblOffset15.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset16.Text.Length <> txtOffset16.MaxLength) Then MsgBox(errorBefore & lblOffset16.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset17.Text.Length <> txtOffset17.MaxLength) Then MsgBox(errorBefore & lblOffset17.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset18.Text.Length <> txtOffset18.MaxLength) Then MsgBox(errorBefore & lblOffset18.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset19.Text.Length <> txtOffset19.MaxLength) Then MsgBox(errorBefore & lblOffset19.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset20.Text.Length <> txtOffset20.MaxLength) Then MsgBox(errorBefore & lblOffset20.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset21.Text.Length <> txtOffset21.MaxLength) Then MsgBox(errorBefore & lblOffset21.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset22.Text.Length <> txtOffset22.MaxLength) Then MsgBox(errorBefore & lblOffset22.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset23.Text.Length <> txtOffset23.MaxLength) Then MsgBox(errorBefore & lblOffset23.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset24.Text.Length <> txtOffset24.MaxLength) Then MsgBox(errorBefore & lblOffset24.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset25.Text.Length <> txtOffset25.MaxLength) Then MsgBox(errorBefore & lblOffset25.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset26.Text.Length <> txtOffset26.MaxLength) Then MsgBox(errorBefore & lblOffset26.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset27.Text.Length <> txtOffset27.MaxLength) Then MsgBox(errorBefore & lblOffset27.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset28.Text.Length <> txtOffset28.MaxLength) Then MsgBox(errorBefore & lblOffset28.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset29.Text.Length <> txtOffset29.MaxLength) Then MsgBox(errorBefore & lblOffset29.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset30.Text.Length <> txtOffset30.MaxLength) Then MsgBox(errorBefore & lblOffset30.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset31.Text.Length <> txtOffset31.MaxLength) Then MsgBox(errorBefore & lblOffset31.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset32.Text.Length <> txtOffset32.MaxLength) Then MsgBox(errorBefore & lblOffset32.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset33.Text.Length <> txtOffset33.MaxLength) Then MsgBox(errorBefore & lblOffset33.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset34.Text.Length <> txtOffset34.MaxLength) Then MsgBox(errorBefore & lblOffset34.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset35.Text.Length <> txtOffset35.MaxLength) Then MsgBox(errorBefore & lblOffset35.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset36.Text.Length <> txtOffset36.MaxLength) Then MsgBox(errorBefore & lblOffset36.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset37.Text.Length <> txtOffset37.MaxLength) Then MsgBox(errorBefore & lblOffset37.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset38.Text.Length <> txtOffset38.MaxLength) Then MsgBox(errorBefore & lblOffset38.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset39.Text.Length <> txtOffset39.MaxLength) Then MsgBox(errorBefore & lblOffset39.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset40.Text.Length <> txtOffset40.MaxLength) Then MsgBox(errorBefore & lblOffset40.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset41.Text.Length <> txtOffset41.MaxLength) Then MsgBox(errorBefore & lblOffset41.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset42.Text.Length <> txtOffset42.MaxLength) Then MsgBox(errorBefore & lblOffset42.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset43.Text.Length <> txtOffset43.MaxLength) Then MsgBox(errorBefore & lblOffset43.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset44.Text.Length <> txtOffset44.MaxLength) Then MsgBox(errorBefore & lblOffset44.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset45.Text.Length <> txtOffset45.MaxLength) Then MsgBox(errorBefore & lblOffset45.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset46.Text.Length <> txtOffset46.MaxLength) Then MsgBox(errorBefore & lblOffset46.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset47.Text.Length <> txtOffset47.MaxLength) Then MsgBox(errorBefore & lblOffset47.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset48.Text.Length <> txtOffset48.MaxLength) Then MsgBox(errorBefore & lblOffset48.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset49.Text.Length <> txtOffset49.MaxLength) Then MsgBox(errorBefore & lblOffset49.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset50.Text.Length <> txtOffset50.MaxLength) Then MsgBox(errorBefore & lblOffset50.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset51.Text.Length <> txtOffset51.MaxLength) Then MsgBox(errorBefore & lblOffset51.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset52.Text.Length <> txtOffset52.MaxLength) Then MsgBox(errorBefore & lblOffset52.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset53.Text.Length <> txtOffset53.MaxLength) Then MsgBox(errorBefore & lblOffset53.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset54.Text.Length <> txtOffset54.MaxLength) Then MsgBox(errorBefore & lblOffset54.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset55.Text.Length <> txtOffset55.MaxLength) Then MsgBox(errorBefore & lblOffset55.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset56.Text.Length <> txtOffset56.MaxLength) Then MsgBox(errorBefore & lblOffset56.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset57.Text.Length <> txtOffset57.MaxLength) Then MsgBox(errorBefore & lblOffset57.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset58.Text.Length <> txtOffset58.MaxLength) Then MsgBox(errorBefore & lblOffset58.Text & errorAfter, MsgBoxStyle.Information)
                If (txtOffset59.Text.Length <> txtOffset59.MaxLength) Then MsgBox(errorBefore & lblOffset59.Text & errorAfter, MsgBoxStyle.Information)
                Return False
                GoTo EndOfFunction
            End If
        End If
        Return True
EndOfFunction:
    End Function
    Private Sub saveMap(ByVal fileNumber As Integer)
        Dim generalCounter As Integer = 0
        Dim subCount As Boolean = False
        Dim mapOffset() As Integer = {0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0} 'Map offsets stored in this variable (in decimal)
        Dim mapOffsetCounter As Integer = 0
        Dim mapLines() As String = {defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar, defaultChar}
        subCount = False
        generalCounter = -1
        mapOffsetCounter = -1
        For Each checkLetter As String In My.Computer.FileSystem.ReadAllText(mainPath & programFolder & statusLblMapName.Text & pluginExtension)
            If (checkLetter = offsetChar) Then
                generalCounter = 10
                subCount = True
                mapOffsetCounter += 1
            End If
            If (subCount = True) Then
                generalCounter -= 1
                If (generalCounter <= 0) Then
                    subCount = False
                    generalCounter = -1
                    mapOffset(mapOffsetCounter) = CInt("&H" & Mid(mapLines(mapOffsetCounter), 2))
                End If
            End If
            If (generalCounter <> -1) Then
                mapLines(mapOffsetCounter) &= checkLetter
            End If
            'End of offset check
        Next
        FilePut(fileNumber, txtOffset0.Text, mapOffset(0) + 1)
        FilePut(fileNumber, txtOffset1.Text, mapOffset(1) + 1)
        FilePut(fileNumber, txtOffset2.Text, mapOffset(2) + 1)
        FilePut(fileNumber, txtOffset3.Text, mapOffset(3) + 1)
        FilePut(fileNumber, txtOffset4.Text, mapOffset(4) + 1)
        FilePut(fileNumber, txtOffset5.Text, mapOffset(5) + 1)
        FilePut(fileNumber, txtOffset6.Text, mapOffset(6) + 1)
        FilePut(fileNumber, txtOffset7.Text, mapOffset(7) + 1)
        FilePut(fileNumber, txtOffset8.Text, mapOffset(8) + 1)
        FilePut(fileNumber, txtOffset9.Text, mapOffset(9) + 1)
        FilePut(fileNumber, txtOffset10.Text, mapOffset(10) + 1)
        FilePut(fileNumber, txtOffset11.Text, mapOffset(11) + 1)
        FilePut(fileNumber, txtOffset12.Text, mapOffset(12) + 1)
        FilePut(fileNumber, txtOffset13.Text, mapOffset(13) + 1)
        FilePut(fileNumber, txtOffset14.Text, mapOffset(14) + 1)
        FilePut(fileNumber, txtOffset15.Text, mapOffset(15) + 1)
        FilePut(fileNumber, txtOffset16.Text, mapOffset(16) + 1)
        FilePut(fileNumber, txtOffset17.Text, mapOffset(17) + 1)
        FilePut(fileNumber, txtOffset18.Text, mapOffset(18) + 1)
        FilePut(fileNumber, txtOffset19.Text, mapOffset(19) + 1)
        FilePut(fileNumber, txtOffset20.Text, mapOffset(20) + 1)
        FilePut(fileNumber, txtOffset21.Text, mapOffset(21) + 1)
        FilePut(fileNumber, txtOffset22.Text, mapOffset(22) + 1)
        FilePut(fileNumber, txtOffset23.Text, mapOffset(23) + 1)
        FilePut(fileNumber, txtOffset24.Text, mapOffset(24) + 1)
        FilePut(fileNumber, txtOffset25.Text, mapOffset(25) + 1)
        FilePut(fileNumber, txtOffset26.Text, mapOffset(26) + 1)
        FilePut(fileNumber, txtOffset27.Text, mapOffset(27) + 1)
        FilePut(fileNumber, txtOffset28.Text, mapOffset(28) + 1)
        FilePut(fileNumber, txtOffset29.Text, mapOffset(29) + 1)
        FilePut(fileNumber, txtOffset30.Text, mapOffset(30) + 1)
        FilePut(fileNumber, txtOffset31.Text, mapOffset(31) + 1)
        FilePut(fileNumber, txtOffset32.Text, mapOffset(32) + 1)
        FilePut(fileNumber, txtOffset33.Text, mapOffset(33) + 1)
        FilePut(fileNumber, txtOffset34.Text, mapOffset(34) + 1)
        FilePut(fileNumber, txtOffset35.Text, mapOffset(35) + 1)
        FilePut(fileNumber, txtOffset36.Text, mapOffset(36) + 1)
        FilePut(fileNumber, txtOffset37.Text, mapOffset(37) + 1)
        FilePut(fileNumber, txtOffset38.Text, mapOffset(38) + 1)
        FilePut(fileNumber, txtOffset39.Text, mapOffset(39) + 1)
        FilePut(fileNumber, txtOffset40.Text, mapOffset(40) + 1)
        FilePut(fileNumber, txtOffset41.Text, mapOffset(41) + 1)
        FilePut(fileNumber, txtOffset42.Text, mapOffset(42) + 1)
        FilePut(fileNumber, txtOffset43.Text, mapOffset(43) + 1)
        FilePut(fileNumber, txtOffset44.Text, mapOffset(44) + 1)
        FilePut(fileNumber, txtOffset45.Text, mapOffset(45) + 1)
        FilePut(fileNumber, txtOffset46.Text, mapOffset(46) + 1)
        FilePut(fileNumber, txtOffset47.Text, mapOffset(47) + 1)
        FilePut(fileNumber, txtOffset48.Text, mapOffset(48) + 1)
        FilePut(fileNumber, txtOffset49.Text, mapOffset(49) + 1)
        FilePut(fileNumber, txtOffset50.Text, mapOffset(50) + 1)
        FilePut(fileNumber, txtOffset51.Text, mapOffset(51) + 1)
        FilePut(fileNumber, txtOffset52.Text, mapOffset(52) + 1)
        FilePut(fileNumber, txtOffset53.Text, mapOffset(53) + 1)
        FilePut(fileNumber, txtOffset54.Text, mapOffset(54) + 1)
        FilePut(fileNumber, txtOffset55.Text, mapOffset(55) + 1)
        FilePut(fileNumber, txtOffset56.Text, mapOffset(56) + 1)
        FilePut(fileNumber, txtOffset57.Text, mapOffset(57) + 1)
        FilePut(fileNumber, txtOffset58.Text, mapOffset(58) + 1)
        FilePut(fileNumber, txtOffset59.Text, mapOffset(59) + 1)
    End Sub
    Private Sub checkVanishingPoint()
        vanishingPoint = 1200
        If txtOffset0.Visible = True Then vanishingPoint = 6 + bottomSpace
        If txtOffset1.Visible = True Then vanishingPoint = 32 + bottomSpace
        If txtOffset2.Visible = True Then vanishingPoint = 58 + bottomSpace
        If txtOffset3.Visible = True Then vanishingPoint = 84 + bottomSpace
        If txtOffset4.Visible = True Then vanishingPoint = 110 + bottomSpace
        If txtOffset5.Visible = True Then vanishingPoint = 136 + bottomSpace
        If txtOffset6.Visible = True Then vanishingPoint = 162 + bottomSpace
        If txtOffset7.Visible = True Then vanishingPoint = 188 + bottomSpace
        If txtOffset8.Visible = True Then vanishingPoint = 214 + bottomSpace
        If txtOffset9.Visible = True Then vanishingPoint = 240 + bottomSpace
        If txtOffset10.Visible = True Then vanishingPoint = 266 + bottomSpace
        If txtOffset11.Visible = True Then vanishingPoint = 292 + bottomSpace
        If txtOffset12.Visible = True Then vanishingPoint = 318 + bottomSpace
        If txtOffset13.Visible = True Then vanishingPoint = 344 + bottomSpace
        If txtOffset14.Visible = True Then vanishingPoint = 370 + bottomSpace
        If txtOffset15.Visible = True Then vanishingPoint = 396 + bottomSpace
        If txtOffset16.Visible = True Then vanishingPoint = 422 + bottomSpace
        If txtOffset17.Visible = True Then vanishingPoint = 448 + bottomSpace
        If txtOffset18.Visible = True Then vanishingPoint = 474 + bottomSpace
        If txtOffset19.Visible = True Then vanishingPoint = 500 + bottomSpace
        If txtOffset20.Visible = True Then vanishingPoint = 526 + bottomSpace
        If txtOffset21.Visible = True Then vanishingPoint = 552 + bottomSpace
        If txtOffset22.Visible = True Then vanishingPoint = 578 + bottomSpace
        If txtOffset23.Visible = True Then vanishingPoint = 604 + bottomSpace
        If txtOffset24.Visible = True Then vanishingPoint = 630 + bottomSpace
        If txtOffset25.Visible = True Then vanishingPoint = 656 + bottomSpace
        If txtOffset26.Visible = True Then vanishingPoint = 682 + bottomSpace
        If txtOffset27.Visible = True Then vanishingPoint = 708 + bottomSpace
        If txtOffset28.Visible = True Then vanishingPoint = 734 + bottomSpace
        If txtOffset29.Visible = True Then vanishingPoint = 760 + bottomSpace
        If txtOffset30.Visible = True Then vanishingPoint = 786 + bottomSpace
        If txtOffset31.Visible = True Then vanishingPoint = 812 + bottomSpace
        If txtOffset32.Visible = True Then vanishingPoint = 838 + bottomSpace
        If txtOffset33.Visible = True Then vanishingPoint = 864 + bottomSpace
        If txtOffset34.Visible = True Then vanishingPoint = 890 + bottomSpace
        If txtOffset35.Visible = True Then vanishingPoint = 916 + bottomSpace
        If txtOffset36.Visible = True Then vanishingPoint = 942 + bottomSpace
        If txtOffset37.Visible = True Then vanishingPoint = 968 + bottomSpace
        If txtOffset38.Visible = True Then vanishingPoint = 994 + bottomSpace
        If txtOffset39.Visible = True Then vanishingPoint = 1020 + bottomSpace
        If txtOffset40.Visible = True Then vanishingPoint = 1046 + bottomSpace
        If txtOffset41.Visible = True Then vanishingPoint = 1072 + bottomSpace
        If txtOffset42.Visible = True Then vanishingPoint = 1098 + bottomSpace
        If txtOffset43.Visible = True Then vanishingPoint = 1124 + bottomSpace
        If txtOffset44.Visible = True Then vanishingPoint = 1150 + bottomSpace
        If txtOffset45.Visible = True Then vanishingPoint = 1176 + bottomSpace
        If txtOffset46.Visible = True Then vanishingPoint = 1202 + bottomSpace
        If txtOffset47.Visible = True Then vanishingPoint = 1228 + bottomSpace
        If txtOffset48.Visible = True Then vanishingPoint = 1254 + bottomSpace
        If txtOffset49.Visible = True Then vanishingPoint = 1280 + bottomSpace
        If txtOffset50.Visible = True Then vanishingPoint = 1306 + bottomSpace
        If txtOffset51.Visible = True Then vanishingPoint = 1332 + bottomSpace
        If txtOffset52.Visible = True Then vanishingPoint = 1358 + bottomSpace
        If txtOffset53.Visible = True Then vanishingPoint = 1384 + bottomSpace
        If txtOffset54.Visible = True Then vanishingPoint = 1410 + bottomSpace
        If txtOffset55.Visible = True Then vanishingPoint = 1436 + bottomSpace
        If txtOffset56.Visible = True Then vanishingPoint = 1462 + bottomSpace
        If txtOffset57.Visible = True Then vanishingPoint = 1488 + bottomSpace
        If txtOffset58.Visible = True Then vanishingPoint = 1514 + bottomSpace
        If txtOffset59.Visible = True Then vanishingPoint = 1540 + bottomSpace
    End Sub
    Private Sub positionAllTextboxes()
        txtOffset0.Location = New Point(constantTextboxX, 6)
        txtOffset1.Location = New Point(constantTextboxX, 32)
        txtOffset2.Location = New Point(constantTextboxX, 58)
        txtOffset3.Location = New Point(constantTextboxX, 84)
        txtOffset4.Location = New Point(constantTextboxX, 110)
        txtOffset5.Location = New Point(constantTextboxX, 136)
        txtOffset6.Location = New Point(constantTextboxX, 162)
        txtOffset7.Location = New Point(constantTextboxX, 188)
        txtOffset8.Location = New Point(constantTextboxX, 214)
        txtOffset9.Location = New Point(constantTextboxX, 240)
        txtOffset10.Location = New Point(constantTextboxX, 266)
        txtOffset11.Location = New Point(constantTextboxX, 292)
        txtOffset12.Location = New Point(constantTextboxX, 318)
        txtOffset13.Location = New Point(constantTextboxX, 344)
        txtOffset14.Location = New Point(constantTextboxX, 370)
        txtOffset15.Location = New Point(constantTextboxX, 396)
        txtOffset16.Location = New Point(constantTextboxX, 422)
        txtOffset17.Location = New Point(constantTextboxX, 448)
        txtOffset18.Location = New Point(constantTextboxX, 474)
        txtOffset19.Location = New Point(constantTextboxX, 500)
        txtOffset20.Location = New Point(constantTextboxX, 526)
        txtOffset21.Location = New Point(constantTextboxX, 552)
        txtOffset22.Location = New Point(constantTextboxX, 578)
        txtOffset23.Location = New Point(constantTextboxX, 604)
        txtOffset24.Location = New Point(constantTextboxX, 630)
        txtOffset25.Location = New Point(constantTextboxX, 656)
        txtOffset26.Location = New Point(constantTextboxX, 682)
        txtOffset27.Location = New Point(constantTextboxX, 708)
        txtOffset28.Location = New Point(constantTextboxX, 734)
        txtOffset29.Location = New Point(constantTextboxX, 760)
        txtOffset30.Location = New Point(constantTextboxX, 786)
        txtOffset31.Location = New Point(constantTextboxX, 812)
        txtOffset32.Location = New Point(constantTextboxX, 838)
        txtOffset33.Location = New Point(constantTextboxX, 864)
        txtOffset34.Location = New Point(constantTextboxX, 890)
        txtOffset35.Location = New Point(constantTextboxX, 916)
        txtOffset36.Location = New Point(constantTextboxX, 942)
        txtOffset37.Location = New Point(constantTextboxX, 968)
        txtOffset38.Location = New Point(constantTextboxX, 994)
        txtOffset39.Location = New Point(constantTextboxX, 1020)
        txtOffset40.Location = New Point(constantTextboxX, 1046)
        txtOffset41.Location = New Point(constantTextboxX, 1072)
        txtOffset42.Location = New Point(constantTextboxX, 1098)
        txtOffset43.Location = New Point(constantTextboxX, 1124)
        txtOffset44.Location = New Point(constantTextboxX, 1150)
        txtOffset45.Location = New Point(constantTextboxX, 1176)
        txtOffset46.Location = New Point(constantTextboxX, 1202)
        txtOffset47.Location = New Point(constantTextboxX, 1228)
        txtOffset48.Location = New Point(constantTextboxX, 1254)
        txtOffset49.Location = New Point(constantTextboxX, 1280)
        txtOffset50.Location = New Point(constantTextboxX, 1306)
        txtOffset51.Location = New Point(constantTextboxX, 1332)
        txtOffset52.Location = New Point(constantTextboxX, 1358)
        txtOffset53.Location = New Point(constantTextboxX, 1384)
        txtOffset54.Location = New Point(constantTextboxX, 1410)
        txtOffset55.Location = New Point(constantTextboxX, 1436)
        txtOffset56.Location = New Point(constantTextboxX, 1462)
        txtOffset57.Location = New Point(constantTextboxX, 1488)
        txtOffset58.Location = New Point(constantTextboxX, 1514)
        txtOffset59.Location = New Point(constantTextboxX, 1540)
    End Sub
    Private Sub positionAllLabels()
        lblOffset0.Location = New Point(constantLabelX, 9)
        lblOffset1.Location = New Point(constantLabelX, 35)
        lblOffset2.Location = New Point(constantLabelX, 61)
        lblOffset3.Location = New Point(constantLabelX, 87)
        lblOffset4.Location = New Point(constantLabelX, 113)
        lblOffset5.Location = New Point(constantLabelX, 139)
        lblOffset6.Location = New Point(constantLabelX, 165)
        lblOffset7.Location = New Point(constantLabelX, 191)
        lblOffset8.Location = New Point(constantLabelX, 217)
        lblOffset9.Location = New Point(constantLabelX, 243)
        lblOffset10.Location = New Point(constantLabelX, 269)
        lblOffset11.Location = New Point(constantLabelX, 295)
        lblOffset12.Location = New Point(constantLabelX, 321)
        lblOffset13.Location = New Point(constantLabelX, 347)
        lblOffset14.Location = New Point(constantLabelX, 373)
        lblOffset15.Location = New Point(constantLabelX, 399)
        lblOffset16.Location = New Point(constantLabelX, 425)
        lblOffset17.Location = New Point(constantLabelX, 451)
        lblOffset18.Location = New Point(constantLabelX, 477)
        lblOffset19.Location = New Point(constantLabelX, 503)
        lblOffset20.Location = New Point(constantLabelX, 529)
        lblOffset21.Location = New Point(constantLabelX, 555)
        lblOffset22.Location = New Point(constantLabelX, 581)
        lblOffset23.Location = New Point(constantLabelX, 607)
        lblOffset24.Location = New Point(constantLabelX, 633)
        lblOffset25.Location = New Point(constantLabelX, 659)
        lblOffset26.Location = New Point(constantLabelX, 685)
        lblOffset27.Location = New Point(constantLabelX, 711)
        lblOffset28.Location = New Point(constantLabelX, 737)
        lblOffset29.Location = New Point(constantLabelX, 763)
        lblOffset30.Location = New Point(constantLabelX, 789)
        lblOffset31.Location = New Point(constantLabelX, 815)
        lblOffset32.Location = New Point(constantLabelX, 841)
        lblOffset33.Location = New Point(constantLabelX, 867)
        lblOffset34.Location = New Point(constantLabelX, 893)
        lblOffset35.Location = New Point(constantLabelX, 919)
        lblOffset36.Location = New Point(constantLabelX, 945)
        lblOffset37.Location = New Point(constantLabelX, 971)
        lblOffset38.Location = New Point(constantLabelX, 997)
        lblOffset39.Location = New Point(constantLabelX, 1023)
        lblOffset40.Location = New Point(constantLabelX, 1049)
        lblOffset41.Location = New Point(constantLabelX, 1075)
        lblOffset42.Location = New Point(constantLabelX, 1101)
        lblOffset43.Location = New Point(constantLabelX, 1127)
        lblOffset44.Location = New Point(constantLabelX, 1153)
        lblOffset45.Location = New Point(constantLabelX, 1179)
        lblOffset46.Location = New Point(constantLabelX, 1205)
        lblOffset47.Location = New Point(constantLabelX, 1231)
        lblOffset48.Location = New Point(constantLabelX, 1257)
        lblOffset49.Location = New Point(constantLabelX, 1283)
        lblOffset50.Location = New Point(constantLabelX, 1309)
        lblOffset51.Location = New Point(constantLabelX, 1335)
        lblOffset52.Location = New Point(constantLabelX, 1361)
        lblOffset53.Location = New Point(constantLabelX, 1387)
        lblOffset54.Location = New Point(constantLabelX, 1413)
        lblOffset55.Location = New Point(constantLabelX, 1439)
        lblOffset56.Location = New Point(constantLabelX, 1465)
        lblOffset57.Location = New Point(constantLabelX, 1491)
        lblOffset58.Location = New Point(constantLabelX, 1517)
        lblOffset59.Location = New Point(constantLabelX, 1543)
    End Sub
    Private Sub adjustBorders()
        pnlMain.Size = New Size(constantPanelWidth, constantPanelHeight)
        Me.Size = New Size(formWidth, formHeight)
        picInitialPicture.Location = New Point(imageX, picInitialPicture.Location.Y)
    End Sub
    Private Sub adjustScrollbar()
        If (Me.Height < vanishingPoint) Then
            checkVanishingPoint()
            vsbMain.Maximum = (vanishingPoint - Me.Height) + yInitial + 96
        Else
            checkVanishingPoint()
            vsbMain.Maximum = (vanishingPoint - Me.Height) + yInitial + 96
        End If
        pnlMain.Top = yInitial + (Me.Height - vsbMain.Value - Me.Height)
    End Sub
    Private Sub dockAllTextboxes()
        Dim textboxWidth As Integer
        If (vsbMain.Visible = True) Then
            textboxWidth = (Me.Width - constantTextboxX) - sideSpace - vsbMain.Width - 6
            pnlMain.Width = Me.Width - vsbMain.Width
        Else
            textboxWidth = (Me.Width - constantTextboxX) - sideSpace - 6
            pnlMain.Width = Me.Width
        End If
        txtOffset0.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset1.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset2.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset3.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset4.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset5.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset6.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset7.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset8.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset9.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset10.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset11.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset12.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset13.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset14.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset15.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset16.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset17.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset18.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset19.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset20.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset21.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset22.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset23.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset24.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset25.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset26.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset27.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset28.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset29.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset30.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset31.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset32.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset33.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset34.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset35.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset36.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset37.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset38.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset39.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset40.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset41.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset42.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset43.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset44.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset45.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset46.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset47.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset48.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset49.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset50.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset51.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset52.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset53.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset54.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset55.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset56.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset57.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset58.Size = New Size(textboxWidth, constantTextboxHeight)
        txtOffset59.Size = New Size(textboxWidth, constantTextboxHeight)
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

    Private Function setAllTextboxesText()
        progLoading.Value = 0
        'Declare the initial map strings
        Dim mapBinText0 As New String(" ", mapLength(0))
        Dim mapBinText1 As New String(" ", mapLength(1))
        Dim mapBinText2 As New String(" ", mapLength(2))
        Dim mapBinText3 As New String(" ", mapLength(3))
        Dim mapBinText4 As New String(" ", mapLength(4))
        Dim mapBinText5 As New String(" ", mapLength(5))
        Dim mapBinText6 As New String(" ", mapLength(6))
        Dim mapBinText7 As New String(" ", mapLength(7))
        Dim mapBinText8 As New String(" ", mapLength(8))
        Dim mapBinText9 As New String(" ", mapLength(9))
        Dim mapBinText10 As New String(" ", mapLength(10))
        Dim mapBinText11 As New String(" ", mapLength(11))
        Dim mapBinText12 As New String(" ", mapLength(12))
        Dim mapBinText13 As New String(" ", mapLength(13))
        Dim mapBinText14 As New String(" ", mapLength(14))
        Dim mapBinText15 As New String(" ", mapLength(15))
        Dim mapBinText16 As New String(" ", mapLength(16))
        Dim mapBinText17 As New String(" ", mapLength(17))
        Dim mapBinText18 As New String(" ", mapLength(18))
        Dim mapBinText19 As New String(" ", mapLength(19))
        Dim mapBinText20 As New String(" ", mapLength(20))
        Dim mapBinText21 As New String(" ", mapLength(21))
        Dim mapBinText22 As New String(" ", mapLength(22))
        Dim mapBinText23 As New String(" ", mapLength(23))
        Dim mapBinText24 As New String(" ", mapLength(24))
        Dim mapBinText25 As New String(" ", mapLength(25))
        Dim mapBinText26 As New String(" ", mapLength(26))
        Dim mapBinText27 As New String(" ", mapLength(27))
        Dim mapBinText28 As New String(" ", mapLength(28))
        Dim mapBinText29 As New String(" ", mapLength(29))
        Dim mapBinText30 As New String(" ", mapLength(30))
        Dim mapBinText31 As New String(" ", mapLength(31))
        Dim mapBinText32 As New String(" ", mapLength(32))
        Dim mapBinText33 As New String(" ", mapLength(33))
        Dim mapBinText34 As New String(" ", mapLength(34))
        Dim mapBinText35 As New String(" ", mapLength(35))
        Dim mapBinText36 As New String(" ", mapLength(36))
        Dim mapBinText37 As New String(" ", mapLength(37))
        Dim mapBinText38 As New String(" ", mapLength(38))
        Dim mapBinText39 As New String(" ", mapLength(39))
        Dim mapBinText40 As New String(" ", mapLength(40))
        Dim mapBinText41 As New String(" ", mapLength(41))
        Dim mapBinText42 As New String(" ", mapLength(42))
        Dim mapBinText43 As New String(" ", mapLength(43))
        Dim mapBinText44 As New String(" ", mapLength(44))
        Dim mapBinText45 As New String(" ", mapLength(45))
        Dim mapBinText46 As New String(" ", mapLength(46))
        Dim mapBinText47 As New String(" ", mapLength(47))
        Dim mapBinText48 As New String(" ", mapLength(48))
        Dim mapBinText49 As New String(" ", mapLength(49))
        Dim mapBinText50 As New String(" ", mapLength(50))
        Dim mapBinText51 As New String(" ", mapLength(51))
        Dim mapBinText52 As New String(" ", mapLength(52))
        Dim mapBinText53 As New String(" ", mapLength(53))
        Dim mapBinText54 As New String(" ", mapLength(54))
        Dim mapBinText55 As New String(" ", mapLength(55))
        Dim mapBinText56 As New String(" ", mapLength(56))
        Dim mapBinText57 As New String(" ", mapLength(57))
        Dim mapBinText58 As New String(" ", mapLength(58))
        Dim mapBinText59 As New String(" ", mapLength(59))
        Try
            'Begin filling the textboxes
            While (generalCounter < maxOffsets)
                If (progLoading.Value + 1000000 / (maxOffsets - 1) >= 1000000) Then
                    progLoading.Value = 1000000
                Else
                    progLoading.Value += 1000000 / (maxOffsets - 1)
                End If
                If (generalCounter = 0) Then
                    FileGet(133, mapBinText0, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(0)
                        FileGet(133, mapBinInt0(i), CInt(mapOffset(generalCounter) + i))
                        If (mapBinInt0(i) = 0) Then GoTo stopReading
                    Next
stopReading:
                    convertTextbox(lblOffset0, txtOffset0, mapBinInt0, generalCounter)
                End If
                If (generalCounter = 1) Then
                    FileGet(133, mapBinText1, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(1)
                        FileGet(133, mapBinInt1(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset1, txtOffset1, mapBinInt1, generalCounter)
                End If
                If (generalCounter = 2) Then
                    FileGet(133, mapBinText2, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(2)
                        FileGet(133, mapBinInt2(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset2, txtOffset2, mapBinInt2, generalCounter)
                End If
                If (generalCounter = 3) Then
                    FileGet(133, mapBinText3, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(3)
                        FileGet(133, mapBinInt3(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset3, txtOffset3, mapBinInt3, generalCounter)
                End If
                If (generalCounter = 4) Then
                    FileGet(133, mapBinText4, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(4)
                        FileGet(133, mapBinInt4(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset4, txtOffset4, mapBinInt4, generalCounter)
                End If
                If (generalCounter = 5) Then
                    FileGet(133, mapBinText5, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(5)
                        FileGet(133, mapBinInt5(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset5, txtOffset5, mapBinInt5, generalCounter)
                End If
                If (generalCounter = 6) Then
                    FileGet(133, mapBinText6, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(6)
                        FileGet(133, mapBinInt6(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset6, txtOffset6, mapBinInt6, generalCounter)
                End If
                If (generalCounter = 7) Then
                    FileGet(133, mapBinText7, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(7)
                        FileGet(133, mapBinInt7(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset7, txtOffset7, mapBinInt7, generalCounter)
                End If
                If (generalCounter = 8) Then
                    FileGet(133, mapBinText8, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(8)
                        FileGet(133, mapBinInt8(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset8, txtOffset8, mapBinInt8, generalCounter)
                End If
                If (generalCounter = 9) Then
                    FileGet(133, mapBinText9, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(9)
                        FileGet(133, mapBinInt9(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset9, txtOffset9, mapBinInt9, generalCounter)
                End If
                If (generalCounter = 10) Then
                    FileGet(133, mapBinText10, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(10)
                        FileGet(133, mapBinInt10(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset10, txtOffset10, mapBinInt10, generalCounter)
                End If
                If (generalCounter = 11) Then
                    FileGet(133, mapBinText11, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(11)
                        FileGet(133, mapBinInt11(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset11, txtOffset11, mapBinInt11, generalCounter)
                End If
                If (generalCounter = 12) Then
                    FileGet(133, mapBinText12, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(12)
                        FileGet(133, mapBinInt12(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset12, txtOffset12, mapBinInt12, generalCounter)
                End If
                If (generalCounter = 13) Then
                    FileGet(133, mapBinText13, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(13)
                        FileGet(133, mapBinInt13(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset13, txtOffset13, mapBinInt13, generalCounter)
                End If
                If (generalCounter = 14) Then
                    FileGet(133, mapBinText14, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(14)
                        FileGet(133, mapBinInt14(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset14, txtOffset14, mapBinInt14, generalCounter)
                End If
                If (generalCounter = 15) Then
                    FileGet(133, mapBinText15, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(15)
                        FileGet(133, mapBinInt15(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset15, txtOffset15, mapBinInt15, generalCounter)
                End If
                If (generalCounter = 16) Then
                    FileGet(133, mapBinText16, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(16)
                        FileGet(133, mapBinInt16(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset16, txtOffset16, mapBinInt16, generalCounter)
                End If
                If (generalCounter = 17) Then
                    FileGet(133, mapBinText17, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(17)
                        FileGet(133, mapBinInt17(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset17, txtOffset17, mapBinInt17, generalCounter)
                End If
                If (generalCounter = 18) Then
                    FileGet(133, mapBinText18, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(18)
                        FileGet(133, mapBinInt18(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset18, txtOffset18, mapBinInt18, generalCounter)
                End If
                If (generalCounter = 19) Then
                    FileGet(133, mapBinText19, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(19)
                        FileGet(133, mapBinInt19(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset19, txtOffset19, mapBinInt19, generalCounter)
                End If
                If (generalCounter = 20) Then
                    FileGet(133, mapBinText20, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(20)
                        FileGet(133, mapBinInt20(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset20, txtOffset20, mapBinInt20, generalCounter)
                End If
                If (generalCounter = 21) Then
                    FileGet(133, mapBinText21, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(21)
                        FileGet(133, mapBinInt21(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset21, txtOffset21, mapBinInt21, generalCounter)
                End If
                If (generalCounter = 22) Then
                    FileGet(133, mapBinText22, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(22)
                        FileGet(133, mapBinInt22(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset22, txtOffset22, mapBinInt22, generalCounter)
                End If
                If (generalCounter = 23) Then
                    FileGet(133, mapBinText23, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(23)
                        FileGet(133, mapBinInt23(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset23, txtOffset23, mapBinInt23, generalCounter)
                End If
                If (generalCounter = 24) Then
                    FileGet(133, mapBinText24, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(24)
                        FileGet(133, mapBinInt24(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset24, txtOffset24, mapBinInt24, generalCounter)
                End If
                If (generalCounter = 25) Then
                    FileGet(133, mapBinText25, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(25)
                        FileGet(133, mapBinInt25(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset25, txtOffset25, mapBinInt25, generalCounter)
                End If
                If (generalCounter = 26) Then
                    FileGet(133, mapBinText26, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(26)
                        FileGet(133, mapBinInt26(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset26, txtOffset26, mapBinInt26, generalCounter)
                End If
                If (generalCounter = 27) Then
                    FileGet(133, mapBinText27, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(27)
                        FileGet(133, mapBinInt27(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset27, txtOffset27, mapBinInt27, generalCounter)
                End If
                If (generalCounter = 28) Then
                    FileGet(133, mapBinText28, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(28)
                        FileGet(133, mapBinInt28(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset28, txtOffset28, mapBinInt28, generalCounter)
                End If
                If (generalCounter = 29) Then
                    FileGet(133, mapBinText29, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(29)
                        FileGet(133, mapBinInt29(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset29, txtOffset29, mapBinInt29, generalCounter)
                End If
                If (generalCounter = 30) Then
                    FileGet(133, mapBinText30, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(30)
                        FileGet(133, mapBinInt30(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset30, txtOffset30, mapBinInt30, generalCounter)
                End If
                If (generalCounter = 31) Then
                    FileGet(133, mapBinText31, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(31)
                        FileGet(133, mapBinInt31(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset31, txtOffset31, mapBinInt31, generalCounter)
                End If
                If (generalCounter = 32) Then
                    FileGet(133, mapBinText32, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(32)
                        FileGet(133, mapBinInt32(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset32, txtOffset32, mapBinInt32, generalCounter)
                End If
                If (generalCounter = 33) Then
                    FileGet(133, mapBinText33, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(33)
                        FileGet(133, mapBinInt33(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset33, txtOffset33, mapBinInt33, generalCounter)
                End If
                If (generalCounter = 34) Then
                    FileGet(133, mapBinText34, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(34)
                        FileGet(133, mapBinInt34(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset34, txtOffset34, mapBinInt34, generalCounter)
                End If
                If (generalCounter = 35) Then
                    FileGet(133, mapBinText35, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(35)
                        FileGet(133, mapBinInt35(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset35, txtOffset35, mapBinInt35, generalCounter)
                End If
                If (generalCounter = 36) Then
                    FileGet(133, mapBinText36, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(36)
                        FileGet(133, mapBinInt36(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset36, txtOffset36, mapBinInt36, generalCounter)
                End If
                If (generalCounter = 37) Then
                    FileGet(133, mapBinText37, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(37)
                        FileGet(133, mapBinInt37(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset37, txtOffset37, mapBinInt37, generalCounter)
                End If
                If (generalCounter = 38) Then
                    FileGet(133, mapBinText38, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(38)
                        FileGet(133, mapBinInt38(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset38, txtOffset38, mapBinInt38, generalCounter)
                End If
                If (generalCounter = 39) Then
                    FileGet(133, mapBinText39, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(39)
                        FileGet(133, mapBinInt39(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset39, txtOffset39, mapBinInt39, generalCounter)
                End If
                If (generalCounter = 40) Then
                    FileGet(133, mapBinText40, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(40)
                        FileGet(133, mapBinInt40(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset40, txtOffset40, mapBinInt40, generalCounter)
                End If
                If (generalCounter = 41) Then
                    FileGet(133, mapBinText41, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(41)
                        FileGet(133, mapBinInt41(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset41, txtOffset41, mapBinInt41, generalCounter)
                End If
                If (generalCounter = 42) Then
                    FileGet(133, mapBinText42, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(42)
                        FileGet(133, mapBinInt42(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset42, txtOffset42, mapBinInt42, generalCounter)
                End If
                If (generalCounter = 43) Then
                    FileGet(133, mapBinText43, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(43)
                        FileGet(133, mapBinInt43(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset43, txtOffset43, mapBinInt43, generalCounter)
                End If
                If (generalCounter = 44) Then
                    FileGet(133, mapBinText44, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(44)
                        FileGet(133, mapBinInt44(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset44, txtOffset44, mapBinInt44, generalCounter)
                End If
                If (generalCounter = 45) Then
                    FileGet(133, mapBinText45, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(45)
                        FileGet(133, mapBinInt45(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset45, txtOffset45, mapBinInt45, generalCounter)
                End If
                If (generalCounter = 46) Then
                    FileGet(133, mapBinText46, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(46)
                        FileGet(133, mapBinInt46(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset46, txtOffset46, mapBinInt46, generalCounter)
                End If
                If (generalCounter = 47) Then
                    FileGet(133, mapBinText47, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(47)
                        FileGet(133, mapBinInt47(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset47, txtOffset47, mapBinInt47, generalCounter)
                End If
                If (generalCounter = 48) Then
                    FileGet(133, mapBinText48, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(48)
                        FileGet(133, mapBinInt48(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset48, txtOffset48, mapBinInt48, generalCounter)
                End If
                If (generalCounter = 49) Then
                    FileGet(133, mapBinText49, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(49)
                        FileGet(133, mapBinInt49(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset49, txtOffset49, mapBinInt49, generalCounter)
                End If
                If (generalCounter = 50) Then
                    FileGet(133, mapBinText50, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(50)
                        FileGet(133, mapBinInt50(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset50, txtOffset50, mapBinInt50, generalCounter)
                End If
                If (generalCounter = 51) Then
                    FileGet(133, mapBinText51, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(51)
                        FileGet(133, mapBinInt51(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset51, txtOffset51, mapBinInt51, generalCounter)
                End If
                If (generalCounter = 52) Then
                    FileGet(133, mapBinText52, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(52)
                        FileGet(133, mapBinInt52(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset52, txtOffset52, mapBinInt52, generalCounter)
                End If
                If (generalCounter = 53) Then
                    FileGet(133, mapBinText53, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(53)
                        FileGet(133, mapBinInt53(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset53, txtOffset53, mapBinInt53, generalCounter)
                End If
                If (generalCounter = 54) Then
                    FileGet(133, mapBinText54, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(54)
                        FileGet(133, mapBinInt54(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset54, txtOffset54, mapBinInt54, generalCounter)
                End If
                If (generalCounter = 55) Then
                    FileGet(133, mapBinText55, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(55)
                        FileGet(133, mapBinInt55(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset55, txtOffset55, mapBinInt55, generalCounter)
                End If
                If (generalCounter = 56) Then
                    FileGet(133, mapBinText56, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(56)
                        FileGet(133, mapBinInt56(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset56, txtOffset56, mapBinInt56, generalCounter)
                End If
                If (generalCounter = 57) Then
                    FileGet(133, mapBinText57, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(57)
                        FileGet(133, mapBinInt57(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset57, txtOffset57, mapBinInt57, generalCounter)
                End If
                If (generalCounter = 58) Then
                    FileGet(133, mapBinText58, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(58)
                        FileGet(133, mapBinInt58(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset58, txtOffset58, mapBinInt58, generalCounter)
                End If
                If (generalCounter = 59) Then
                    FileGet(133, mapBinText59, CInt(mapOffset(generalCounter) + 1))
                    For i As Integer = 1 To mapLength(59)
                        FileGet(133, mapBinInt59(i), CInt(mapOffset(generalCounter) + i))
                    Next
                    convertTextbox(lblOffset59, txtOffset59, mapBinInt59, generalCounter)
                End If
                generalCounter += 1
            End While
            Return True
        Catch ex As Exception
            Return False
        End Try
    End Function
    Private Sub setAllTextboxesMaxLength()
        txtOffset0.MaxLength = mapLength(0)
        txtOffset1.MaxLength = mapLength(1)
        txtOffset2.MaxLength = mapLength(2)
        txtOffset3.MaxLength = mapLength(3)
        txtOffset4.MaxLength = mapLength(4)
        txtOffset5.MaxLength = mapLength(5)
        txtOffset6.MaxLength = mapLength(6)
        txtOffset7.MaxLength = mapLength(7)
        txtOffset8.MaxLength = mapLength(8)
        txtOffset9.MaxLength = mapLength(9)
        txtOffset10.MaxLength = mapLength(10)
        txtOffset11.MaxLength = mapLength(11)
        txtOffset12.MaxLength = mapLength(12)
        txtOffset13.MaxLength = mapLength(13)
        txtOffset14.MaxLength = mapLength(14)
        txtOffset15.MaxLength = mapLength(15)
        txtOffset16.MaxLength = mapLength(16)
        txtOffset17.MaxLength = mapLength(17)
        txtOffset18.MaxLength = mapLength(18)
        txtOffset19.MaxLength = mapLength(19)
        txtOffset20.MaxLength = mapLength(20)
        txtOffset21.MaxLength = mapLength(21)
        txtOffset22.MaxLength = mapLength(22)
        txtOffset23.MaxLength = mapLength(23)
        txtOffset24.MaxLength = mapLength(24)
        txtOffset25.MaxLength = mapLength(25)
        txtOffset26.MaxLength = mapLength(26)
        txtOffset27.MaxLength = mapLength(27)
        txtOffset28.MaxLength = mapLength(28)
        txtOffset29.MaxLength = mapLength(29)
        txtOffset30.MaxLength = mapLength(30)
        txtOffset31.MaxLength = mapLength(31)
        txtOffset32.MaxLength = mapLength(32)
        txtOffset33.MaxLength = mapLength(33)
        txtOffset34.MaxLength = mapLength(34)
        txtOffset35.MaxLength = mapLength(35)
        txtOffset36.MaxLength = mapLength(36)
        txtOffset37.MaxLength = mapLength(37)
        txtOffset38.MaxLength = mapLength(38)
        txtOffset39.MaxLength = mapLength(39)
        txtOffset40.MaxLength = mapLength(40)
        txtOffset41.MaxLength = mapLength(41)
        txtOffset42.MaxLength = mapLength(42)
        txtOffset43.MaxLength = mapLength(43)
        txtOffset44.MaxLength = mapLength(44)
        txtOffset45.MaxLength = mapLength(45)
        txtOffset46.MaxLength = mapLength(46)
        txtOffset47.MaxLength = mapLength(47)
        txtOffset48.MaxLength = mapLength(48)
        txtOffset49.MaxLength = mapLength(49)
        txtOffset50.MaxLength = mapLength(50)
        txtOffset51.MaxLength = mapLength(51)
        txtOffset52.MaxLength = mapLength(52)
        txtOffset53.MaxLength = mapLength(53)
        txtOffset54.MaxLength = mapLength(54)
        txtOffset55.MaxLength = mapLength(55)
        txtOffset56.MaxLength = mapLength(56)
        txtOffset57.MaxLength = mapLength(57)
        txtOffset58.MaxLength = mapLength(58)
        txtOffset59.MaxLength = mapLength(59)
    End Sub
    Private Sub convertTextbox(ByVal thisLabel As Label, ByVal thisTextbox As TextBox, ByVal mapHexString As Array, ByVal textboxID As Integer)
        'Restarts all variables, and loads hex string from loaded byte array
        mapBinHex(textboxID) = ""
        For i As Integer = 1 To mapLength(textboxID)
            If (mapHexString(i) = 0) Then GoTo stopEarlyConvert
            mapBinHex(textboxID) = mapBinHex(textboxID) & Hex(mapHexString(i)) & " "
        Next
stopEarlyConvert:
        'Goes through all of the images to see if the textbox contains any of them
        For i As Integer = 0 To numberOfImages
            mapBinHex(textboxID) = mapBinHex(textboxID).Replace(mapStandardImage(i), mapConvertedImage(i))
        Next
        'Converts all the hex code into a string
        Dim tempLength As Integer = (mapBinHex(textboxID).Length - 1) / 3
        Dim tempString As String = ""
        For i As Integer = 0 To (tempLength * 3) - 1 Step 3
            'MsgBox(Mid(mapBinHex(textboxID), i + 1, 2))
            If (Mid(mapBinHex(textboxID), i + 1, 2) = "0 ") Then GoTo stopConvert
            tempString = tempString & Chr("&H" & Mid(mapBinHex(textboxID), i + 1, 2))
        Next
stopConvert:
        If (tempString = "") Then GoTo skipAllCommands
        'Makes some final changes and outputs string to textbox
        thisLabel.Text = mapLabel(textboxID)
        thisTextbox.Text = tempString
        thisTextbox.MaxLength = mapLength(textboxID)
        thisTextbox.Visible = True
        If (mapLength(textboxID) = 0) Then thisTextbox.Visible = False
skipAllCommands:
    End Sub
    Private Sub convertAllTextboxes()
        convertTextbox(lblOffset0, txtOffset0, mapBinInt0, 0)
        convertTextbox(lblOffset1, txtOffset1, mapBinInt1, 1)
        convertTextbox(lblOffset2, txtOffset2, mapBinInt2, 2)
        convertTextbox(lblOffset3, txtOffset3, mapBinInt3, 3)
        convertTextbox(lblOffset4, txtOffset4, mapBinInt4, 4)
        convertTextbox(lblOffset5, txtOffset5, mapBinInt5, 5)
        convertTextbox(lblOffset6, txtOffset6, mapBinInt6, 6)
        convertTextbox(lblOffset7, txtOffset7, mapBinInt7, 7)
        convertTextbox(lblOffset8, txtOffset8, mapBinInt8, 8)
        convertTextbox(lblOffset9, txtOffset9, mapBinInt9, 9)
        convertTextbox(lblOffset10, txtOffset10, mapBinInt10, 10)
        convertTextbox(lblOffset11, txtOffset11, mapBinInt11, 11)
        convertTextbox(lblOffset12, txtOffset12, mapBinInt12, 12)
        convertTextbox(lblOffset13, txtOffset13, mapBinInt13, 13)
        convertTextbox(lblOffset14, txtOffset14, mapBinInt14, 14)
        convertTextbox(lblOffset15, txtOffset15, mapBinInt15, 15)
        convertTextbox(lblOffset16, txtOffset16, mapBinInt16, 16)
        convertTextbox(lblOffset17, txtOffset17, mapBinInt17, 17)
        convertTextbox(lblOffset18, txtOffset18, mapBinInt18, 18)
        convertTextbox(lblOffset19, txtOffset19, mapBinInt19, 19)
        convertTextbox(lblOffset20, txtOffset20, mapBinInt20, 20)
        convertTextbox(lblOffset21, txtOffset21, mapBinInt21, 21)
        convertTextbox(lblOffset22, txtOffset22, mapBinInt22, 22)
        convertTextbox(lblOffset23, txtOffset23, mapBinInt23, 23)
        convertTextbox(lblOffset24, txtOffset24, mapBinInt24, 24)
        convertTextbox(lblOffset25, txtOffset25, mapBinInt25, 25)
        convertTextbox(lblOffset26, txtOffset26, mapBinInt26, 26)
        convertTextbox(lblOffset27, txtOffset27, mapBinInt27, 27)
        convertTextbox(lblOffset28, txtOffset28, mapBinInt28, 28)
        convertTextbox(lblOffset29, txtOffset29, mapBinInt29, 29)
        convertTextbox(lblOffset30, txtOffset30, mapBinInt30, 30)
        convertTextbox(lblOffset31, txtOffset31, mapBinInt31, 31)
        convertTextbox(lblOffset32, txtOffset32, mapBinInt32, 32)
        convertTextbox(lblOffset33, txtOffset33, mapBinInt33, 33)
        convertTextbox(lblOffset34, txtOffset34, mapBinInt34, 34)
        convertTextbox(lblOffset35, txtOffset35, mapBinInt35, 35)
        convertTextbox(lblOffset36, txtOffset36, mapBinInt36, 36)
        convertTextbox(lblOffset37, txtOffset37, mapBinInt37, 37)
        convertTextbox(lblOffset38, txtOffset38, mapBinInt38, 38)
        convertTextbox(lblOffset39, txtOffset39, mapBinInt39, 39)
        convertTextbox(lblOffset40, txtOffset40, mapBinInt40, 40)
        convertTextbox(lblOffset41, txtOffset41, mapBinInt41, 41)
        convertTextbox(lblOffset42, txtOffset42, mapBinInt42, 42)
        convertTextbox(lblOffset43, txtOffset43, mapBinInt43, 43)
        convertTextbox(lblOffset44, txtOffset44, mapBinInt44, 44)
        convertTextbox(lblOffset45, txtOffset45, mapBinInt45, 45)
        convertTextbox(lblOffset46, txtOffset46, mapBinInt46, 46)
        convertTextbox(lblOffset47, txtOffset47, mapBinInt47, 47)
        convertTextbox(lblOffset48, txtOffset48, mapBinInt48, 48)
        convertTextbox(lblOffset49, txtOffset49, mapBinInt49, 49)
        convertTextbox(lblOffset50, txtOffset50, mapBinInt50, 50)
        convertTextbox(lblOffset51, txtOffset51, mapBinInt51, 51)
        convertTextbox(lblOffset52, txtOffset52, mapBinInt52, 52)
        convertTextbox(lblOffset53, txtOffset53, mapBinInt53, 53)
        convertTextbox(lblOffset54, txtOffset54, mapBinInt54, 54)
        convertTextbox(lblOffset55, txtOffset55, mapBinInt55, 55)
        convertTextbox(lblOffset56, txtOffset56, mapBinInt56, 56)
        convertTextbox(lblOffset57, txtOffset57, mapBinInt57, 57)
        convertTextbox(lblOffset58, txtOffset58, mapBinInt58, 58)
        convertTextbox(lblOffset59, txtOffset59, mapBinInt59, 59)
    End Sub
    Private Sub revertTextbox(ByVal thisTextbox As TextBox, ByVal mapHexString As Array, ByVal textboxID As Integer)
        'Restarts all variables, and loads hex string from loaded byte array
        mapBinHex(textboxID) = ""
        For i As Integer = 1 To mapLength(textboxID)
            mapBinHex(textboxID) = mapBinHex(textboxID) & Hex(mapHexString(i)) & " "
        Next
        'Goes through all of the images to see if the textbox contains any of them
        For i As Integer = 0 To numberOfImages
            mapBinHex(textboxID) = mapBinHex(textboxID).Replace(mapConvertedImage(i), mapStandardImage(i))
        Next
        'Converts all the hex code into a string and outputs it to the textbox
        Dim tempLength As Integer = (mapBinHex(textboxID).Length - 1) / 3
        Dim tempString As String = ""
        For i As Integer = 0 To (tempLength * 3) - 1 Step 3
            tempString = tempString + Chr("&H" & Mid(mapBinHex(textboxID), i + 1, 2))
        Next
        thisTextbox.Text = tempString
    End Sub
    Private Sub revertAllTextboxes()
        revertTextbox(txtOffset0, mapBinInt0, 0)
        revertTextbox(txtOffset1, mapBinInt1, 1)
        revertTextbox(txtOffset2, mapBinInt2, 2)
        revertTextbox(txtOffset3, mapBinInt3, 3)
        revertTextbox(txtOffset4, mapBinInt4, 4)
        revertTextbox(txtOffset5, mapBinInt5, 5)
        revertTextbox(txtOffset6, mapBinInt6, 6)
        revertTextbox(txtOffset7, mapBinInt7, 7)
        revertTextbox(txtOffset8, mapBinInt8, 8)
        revertTextbox(txtOffset9, mapBinInt9, 9)
        revertTextbox(txtOffset10, mapBinInt10, 10)
        revertTextbox(txtOffset11, mapBinInt11, 11)
        revertTextbox(txtOffset12, mapBinInt12, 12)
        revertTextbox(txtOffset13, mapBinInt13, 13)
        revertTextbox(txtOffset14, mapBinInt14, 14)
        revertTextbox(txtOffset15, mapBinInt15, 15)
        revertTextbox(txtOffset16, mapBinInt16, 16)
        revertTextbox(txtOffset17, mapBinInt17, 17)
        revertTextbox(txtOffset18, mapBinInt18, 18)
        revertTextbox(txtOffset19, mapBinInt19, 19)
        revertTextbox(txtOffset20, mapBinInt20, 20)
        revertTextbox(txtOffset21, mapBinInt21, 21)
        revertTextbox(txtOffset22, mapBinInt22, 22)
        revertTextbox(txtOffset23, mapBinInt23, 23)
        revertTextbox(txtOffset24, mapBinInt24, 24)
        revertTextbox(txtOffset25, mapBinInt25, 25)
        revertTextbox(txtOffset26, mapBinInt26, 26)
        revertTextbox(txtOffset27, mapBinInt27, 27)
        revertTextbox(txtOffset28, mapBinInt28, 28)
        revertTextbox(txtOffset29, mapBinInt29, 29)
        revertTextbox(txtOffset30, mapBinInt30, 30)
        revertTextbox(txtOffset31, mapBinInt31, 31)
        revertTextbox(txtOffset32, mapBinInt32, 32)
        revertTextbox(txtOffset33, mapBinInt33, 33)
        revertTextbox(txtOffset34, mapBinInt34, 34)
        revertTextbox(txtOffset35, mapBinInt35, 35)
        revertTextbox(txtOffset36, mapBinInt36, 36)
        revertTextbox(txtOffset37, mapBinInt37, 37)
        revertTextbox(txtOffset38, mapBinInt38, 38)
        revertTextbox(txtOffset39, mapBinInt39, 39)
        revertTextbox(txtOffset40, mapBinInt40, 40)
        revertTextbox(txtOffset41, mapBinInt41, 41)
        revertTextbox(txtOffset42, mapBinInt42, 42)
        revertTextbox(txtOffset43, mapBinInt43, 43)
        revertTextbox(txtOffset44, mapBinInt44, 44)
        revertTextbox(txtOffset45, mapBinInt45, 45)
        revertTextbox(txtOffset46, mapBinInt46, 46)
        revertTextbox(txtOffset47, mapBinInt47, 47)
        revertTextbox(txtOffset48, mapBinInt48, 48)
        revertTextbox(txtOffset49, mapBinInt49, 49)
        revertTextbox(txtOffset50, mapBinInt50, 50)
        revertTextbox(txtOffset51, mapBinInt51, 51)
        revertTextbox(txtOffset52, mapBinInt52, 52)
        revertTextbox(txtOffset53, mapBinInt53, 53)
        revertTextbox(txtOffset54, mapBinInt54, 54)
        revertTextbox(txtOffset55, mapBinInt55, 55)
        revertTextbox(txtOffset56, mapBinInt56, 56)
        revertTextbox(txtOffset57, mapBinInt57, 57)
        revertTextbox(txtOffset58, mapBinInt58, 58)
        revertTextbox(txtOffset59, mapBinInt59, 59)
    End Sub
    Private Sub syncTextbox(ByVal thisTextbox As TextBox, ByVal mapHexString As Array, ByVal textboxID As Integer)
        'Synchronizes the textboxes corresponding hex codes with it's current text
        For i As Integer = 0 To 999
            mapHexString(i) = Nothing
        Next
        For i As Integer = 1 To mapLength(textboxID)
            'If (mapHexString(i) = 0) Then GoTo stopSync
            mapHexString(i) = Asc(Mid(thisTextbox.Text, i, 1))
        Next
stopSync:
    End Sub
    Private Sub syncAllTextboxes()
        syncTextbox(txtOffset0, mapBinInt0, 0)
        syncTextbox(txtOffset1, mapBinInt1, 1)
        syncTextbox(txtOffset2, mapBinInt2, 2)
        syncTextbox(txtOffset3, mapBinInt3, 3)
        syncTextbox(txtOffset4, mapBinInt4, 4)
        syncTextbox(txtOffset5, mapBinInt5, 5)
        syncTextbox(txtOffset6, mapBinInt6, 6)
        syncTextbox(txtOffset7, mapBinInt7, 7)
        syncTextbox(txtOffset8, mapBinInt8, 8)
        syncTextbox(txtOffset9, mapBinInt9, 9)
        syncTextbox(txtOffset10, mapBinInt10, 10)
        syncTextbox(txtOffset11, mapBinInt11, 11)
        syncTextbox(txtOffset12, mapBinInt12, 12)
        syncTextbox(txtOffset13, mapBinInt13, 13)
        syncTextbox(txtOffset14, mapBinInt14, 14)
        syncTextbox(txtOffset15, mapBinInt15, 15)
        syncTextbox(txtOffset16, mapBinInt16, 16)
        syncTextbox(txtOffset17, mapBinInt17, 17)
        syncTextbox(txtOffset18, mapBinInt18, 18)
        syncTextbox(txtOffset19, mapBinInt19, 19)
        syncTextbox(txtOffset20, mapBinInt20, 20)
        syncTextbox(txtOffset21, mapBinInt21, 21)
        syncTextbox(txtOffset22, mapBinInt22, 22)
        syncTextbox(txtOffset23, mapBinInt23, 23)
        syncTextbox(txtOffset24, mapBinInt24, 24)
        syncTextbox(txtOffset25, mapBinInt25, 25)
        syncTextbox(txtOffset26, mapBinInt26, 26)
        syncTextbox(txtOffset27, mapBinInt27, 27)
        syncTextbox(txtOffset28, mapBinInt28, 28)
        syncTextbox(txtOffset29, mapBinInt29, 29)
        syncTextbox(txtOffset30, mapBinInt30, 30)
        syncTextbox(txtOffset31, mapBinInt31, 31)
        syncTextbox(txtOffset32, mapBinInt32, 32)
        syncTextbox(txtOffset33, mapBinInt33, 33)
        syncTextbox(txtOffset34, mapBinInt34, 34)
        syncTextbox(txtOffset35, mapBinInt35, 35)
        syncTextbox(txtOffset36, mapBinInt36, 36)
        syncTextbox(txtOffset37, mapBinInt37, 37)
        syncTextbox(txtOffset38, mapBinInt38, 38)
        syncTextbox(txtOffset39, mapBinInt39, 39)
        syncTextbox(txtOffset40, mapBinInt40, 40)
        syncTextbox(txtOffset41, mapBinInt41, 41)
        syncTextbox(txtOffset42, mapBinInt42, 42)
        syncTextbox(txtOffset43, mapBinInt43, 43)
        syncTextbox(txtOffset44, mapBinInt44, 44)
        syncTextbox(txtOffset45, mapBinInt45, 45)
        syncTextbox(txtOffset46, mapBinInt46, 46)
        syncTextbox(txtOffset47, mapBinInt47, 47)
        syncTextbox(txtOffset48, mapBinInt48, 48)
        syncTextbox(txtOffset49, mapBinInt49, 49)
        syncTextbox(txtOffset50, mapBinInt50, 50)
        syncTextbox(txtOffset51, mapBinInt51, 51)
        syncTextbox(txtOffset52, mapBinInt52, 52)
        syncTextbox(txtOffset53, mapBinInt53, 53)
        syncTextbox(txtOffset54, mapBinInt54, 54)
        syncTextbox(txtOffset55, mapBinInt55, 55)
        syncTextbox(txtOffset56, mapBinInt56, 56)
        syncTextbox(txtOffset57, mapBinInt57, 57)
        syncTextbox(txtOffset58, mapBinInt58, 58)
        syncTextbox(txtOffset59, mapBinInt59, 59)
    End Sub
    Private Sub loadingSequence(ByVal begin As Boolean, ByVal marqueeStyle As Boolean)
        'Make all things invisible except for the loading bar
        'or
        'Make all things visible and clear the loading bar
        progLoading.Visible = begin
        vsbMain.Visible = begin = False
        menuMain.Visible = begin = False
        statusMain.Visible = begin = False
        If (Me.Height >= vanishingPoint + 96 + bottomSpace) Then vsbMain.Visible = False
        'Check if progress bar is going to be displayed using a marquee
        If (marqueeStyle = True) Then
            progLoading.Style = ProgressBarStyle.Marquee
        Else
            progLoading.Style = ProgressBarStyle.Continuous
        End If
    End Sub
    Private Sub loadImageStrings()
        'Button: X - (X)
        mapStandardImage(0) = "EE 91 88"
        mapConvertedImage(0) = "28 58 29"
        'Button: Y - (Y)
        mapStandardImage(2) = "EE 91 89"
        mapConvertedImage(2) = "28 59 29"
        'Button: B - (B)
        mapStandardImage(3) = "EE 91 8A"
        mapConvertedImage(3) = "28 42 29"
        'Button: B - (C)                  'Press (C) to continue/try again/actions?
        mapStandardImage(35) = "EE 84 80"
        mapConvertedImage(35) = "28 43 29"
        'Button: B - (D)                  'Vehicles only?
        mapStandardImage(34) = "EE 84 81"
        mapConvertedImage(34) = "28 44 29"
        'Button: A - (A)
        mapStandardImage(10) = "EE 91 86"
        mapConvertedImage(10) = "28 41 29"
        'Button: White - (W)
        mapStandardImage(34) = "EE 91 8B"
        mapConvertedImage(34) = "28 57 29"

        'Button: Left Trigger Down - (V)  'Vehicles only?
        mapStandardImage(33) = "EE 84 86"
        mapConvertedImage(33) = "28 56 29"
        'Button: Left Trigger - (L)
        mapStandardImage(4) = "EE 91 8C"
        mapConvertedImage(4) = "28 4C 29"
        'Button: Right Trigger - (R)
        mapStandardImage(8) = "EE 91 8D"
        mapConvertedImage(8) = "28 52 29"

        'Button: Left Thumbstick Down - (C)
        mapStandardImage(5) = "EE 91 90"
        mapConvertedImage(5) = "28 43 29"
        'Button: Right Thumbstick Down - (Z)
        mapStandardImage(9) = "EE 91 91"
        mapConvertedImage(9) = "28 5A 29"
        'Button: Left Thumbstick Up - (M)
        mapStandardImage(7) = "EE 91 96"
        mapConvertedImage(7) = "28 4D 29"
        'Button: Right Thumbstick Up - (T)
        mapStandardImage(6) = "EE 91 97"
        mapConvertedImage(6) = "28 54 29"

        'Weapon: Sword - [W]
        mapStandardImage(1) = "EE 84 9F"
        mapConvertedImage(1) = "5B 57 5D"
        'Weapon: Plasma Rifle - [I]
        mapStandardImage(11) = "EE 84 9E"
        mapConvertedImage(11) = "5B 49 5D"
        'Weapon: Brute Plasma Rifle - [U]
        mapStandardImage(12) = "EE 84 AA"
        mapConvertedImage(12) = "5B 55 5D"
        'Weapon: Plasma Pistol - [P]
        mapStandardImage(13) = "EE 84 9D"
        mapConvertedImage(13) = "5B 50 5D"
        'Weapon: Covenant Carbine - [C]
        mapStandardImage(14) = "EE 84 95"
        mapConvertedImage(14) = "5B 43 5D"
        'Weapon: Disintegrator - [Z]
        mapStandardImage(15) = "EE 84 A5"
        mapConvertedImage(15) = "5B 5A 5D"
        'Weapon: Beam Rifle - [R]
        mapStandardImage(16) = "EE 84 A4"
        mapConvertedImage(16) = "5B 52 5D"
        'Weapon: Brute Shot - [T]
        mapStandardImage(17) = "EE 84 94"
        mapConvertedImage(17) = "5B 54 5D"
        'Weapon: Fuel Rod Cannon - [O]
        mapStandardImage(18) = "EE 84 97"
        mapConvertedImage(18) = "5B 4F 5D"
        'Weapon: Battle Rifle - [B]
        mapStandardImage(20) = "EE 84 92"
        mapConvertedImage(20) = "5B 42 5D"
        'Weapon: Needler - [E]
        mapStandardImage(21) = "EE 84 9B"
        mapConvertedImage(21) = "5B 45 5D"
        'Weapon: Magnum - [M]
        mapStandardImage(23) = "EE 84 9A"
        mapConvertedImage(23) = "5B 4D 5D"
        'Weapon: Rocket Launcher - [K]
        mapStandardImage(24) = "EE 84 A0"
        mapConvertedImage(24) = "5B 4B 5D"
        'Weapon: Shotgun - [H]
        mapStandardImage(25) = "EE 84 A1"
        mapConvertedImage(25) = "5B 48 5D"
        'Weapon: SMG - [G]
        mapStandardImage(26) = "EE 84 A2"
        mapConvertedImage(26) = "5B 47 5D"
        'Weapon: Sniper Rifle - [N]
        mapStandardImage(27) = "EE 84 A3"
        mapConvertedImage(27) = "5B 4E 5D"
        'Weapon: Sentinel Beam - [S]
        mapStandardImage(28) = "EE 84 A6"
        mapConvertedImage(28) = "5B 53 5D"
        'Weapon: Sentinel Grenade Launcher - [L]
        mapStandardImage(29) = "EE 84 A8"
        mapConvertedImage(29) = "5B 4C 5D"
        'Weapon: Assault Bomb - [A]
        mapStandardImage(30) = "EE 84 93"
        mapConvertedImage(30) = "5B 41 5D"
        'Weapon: Oddball - [D]
        mapStandardImage(31) = "EE 84 9C"
        mapConvertedImage(31) = "5B 44 5D"
        'Weapon: Flag - [F]
        mapStandardImage(32) = "EE 84 96"
        mapConvertedImage(32) = "5B 46 5D"

        'Medal: Killing Spree - (a)
        mapStandardImage(36) = "EE 80 B3"
        mapConvertedImage(36) = "28 61 29"
        'Medal: Running Riot - (b)
        mapStandardImage(37) = "EE 80 B4"
        mapConvertedImage(37) = "28 62 29"
        'Medal: Rampage - (c)
        mapStandardImage(44) = "EE 80 B5"
        mapConvertedImage(44) = "28 63 29"
        'Medal: Berserker - (d)
        mapStandardImage(45) = "EE 80 B6"
        mapConvertedImage(45) = "28 64 29"
        'Medal: Overkill - (e)
        mapStandardImage(46) = "EE 80 B7"
        mapConvertedImage(46) = "28 65 29"

        'Medal: Double Kill - (2)
        mapStandardImage(40) = "EE 80 B8"
        mapConvertedImage(40) = "28 32 29"
        'Medal: Triple Kill - (3)
        mapStandardImage(41) = "EE 80 B9"
        mapConvertedImage(41) = "28 33 29"
        'Medal: Killtacular - (4)
        mapStandardImage(42) = "EE 81 80"
        mapConvertedImage(42) = "28 34 29"
        'Medal: Kill Frenzy - (5)
        mapStandardImage(38) = "EE 81 81"
        mapConvertedImage(38) = "28 35 29"
        'Medal: Killtrocity - (6)
        mapStandardImage(39) = "EE 81 82"
        mapConvertedImage(39) = "28 36 29"
        'Medal: Killimanjaro - (7)
        mapStandardImage(43) = "EE 81 83"
        mapConvertedImage(43) = "28 37 29"

        'Medal: Sniper Kill - (s)
        mapStandardImage(47) = "EE 81 84"
        mapConvertedImage(47) = "28 73 29"
        'Medal: Roadkill - (i)
        mapStandardImage(48) = "EE 81 85"
        mapConvertedImage(48) = "28 69 29"
        'Medal: Bonecracker - (n)
        mapStandardImage(49) = "EE 81 86"
        mapConvertedImage(49) = "28 6E 29"
        'Medal: Stealth Kill - (k)
        mapStandardImage(50) = "EE 81 87"
        mapConvertedImage(50) = "28 68 29"
        'Medal: Stick It - (k)
        mapStandardImage(51) = "EE 81 88"
        mapConvertedImage(51) = "28 6B 29"
        'Medal: Flag Save - (f)
        mapStandardImage(52) = "EE 81 89"
        mapConvertedImage(52) = "28 66 29"
        'Medal: Oddball Save - (o)
        mapStandardImage(53) = "EE 81 90"
        mapConvertedImage(53) = "28 6F 29"
        'Medal: Bomb Save - (m)
        mapStandardImage(54) = "EE 81 91"
        mapConvertedImage(54) = "28 6D 29"
        'Medal: Vehicle Kill - (v)
        mapStandardImage(55) = "EE 81 92"
        mapConvertedImage(55) = "28 76 29"
        'Medal: Carjack - (j)
        mapStandardImage(46) = "EE 81 93"
        mapConvertedImage(46) = "28 6A 29"
        'Medal: Flag Taken - (g)
        mapStandardImage(56) = "EE 81 94"
        mapConvertedImage(56) = "28 67 29"
        'Medal: Bomb Diffused - (u)
        mapStandardImage(57) = "EE 81 99"
        mapConvertedImage(57) = "28 75 29"
        'Medal: Bomb Planted - (p)
        mapStandardImage(58) = "EE 81 97"
        mapConvertedImage(58) = "28 70 29"
        'Medal: Flag Returned - (r)
        mapStandardImage(59) = "EE 82 90"
        mapConvertedImage(59) = "28 72 29"
        'Medal: Bomb Returned - (t)
        mapStandardImage(61) = "EE 82 91"
        mapConvertedImage(61) = "28 74 29"
        'Medal: Flag Scored - (l)
        mapStandardImage(60) = "EE 81 96"
        mapConvertedImage(60) = "28 6C 29"
        'Medal: Bomb Planted - (z)
        mapStandardImage(62) = "EE 81 97"
        mapConvertedImage(62) = "28 7A 29"

        'Variable: Rounds Picked Up - {R}
        mapStandardImage(19) = "EE 90 A2"
        mapConvertedImage(19) = "7B 52 7D"

        'Character: Newline Character - /n
        mapStandardImage(22) = "0D 0A"
        mapConvertedImage(22) = "2F 6E"

        'Detect the number of images that were loaded
        For i As Integer = 0 To mapStandardImage.Length - 1
            If (mapStandardImage(i) = Nothing Or mapConvertedImage(i) = Nothing) Then
                numberOfImages = i - 1
                GoTo Break
            End If
        Next
Break:
    End Sub
    Private Sub setAllTextboxes(ByVal textboxText As String)
        txtOffset0.Text = textboxText
        txtOffset1.Text = textboxText
        txtOffset2.Text = textboxText
        txtOffset3.Text = textboxText
        txtOffset4.Text = textboxText
        txtOffset5.Text = textboxText
        txtOffset6.Text = textboxText
        txtOffset7.Text = textboxText
        txtOffset8.Text = textboxText
        txtOffset9.Text = textboxText
        txtOffset10.Text = textboxText
        txtOffset11.Text = textboxText
        txtOffset12.Text = textboxText
        txtOffset13.Text = textboxText
        txtOffset14.Text = textboxText
        txtOffset15.Text = textboxText
        txtOffset16.Text = textboxText
        txtOffset17.Text = textboxText
        txtOffset18.Text = textboxText
        txtOffset19.Text = textboxText
        txtOffset20.Text = textboxText
        txtOffset21.Text = textboxText
        txtOffset22.Text = textboxText
        txtOffset23.Text = textboxText
        txtOffset24.Text = textboxText
        txtOffset25.Text = textboxText
        txtOffset26.Text = textboxText
        txtOffset27.Text = textboxText
        txtOffset28.Text = textboxText
        txtOffset29.Text = textboxText
        txtOffset30.Text = textboxText
        txtOffset31.Text = textboxText
        txtOffset32.Text = textboxText
        txtOffset33.Text = textboxText
        txtOffset34.Text = textboxText
        txtOffset35.Text = textboxText
        txtOffset36.Text = textboxText
        txtOffset37.Text = textboxText
        txtOffset38.Text = textboxText
        txtOffset39.Text = textboxText
        txtOffset40.Text = textboxText
        txtOffset41.Text = textboxText
        txtOffset42.Text = textboxText
        txtOffset43.Text = textboxText
        txtOffset44.Text = textboxText
        txtOffset45.Text = textboxText
        txtOffset46.Text = textboxText
        txtOffset47.Text = textboxText
        txtOffset48.Text = textboxText
        txtOffset49.Text = textboxText
        txtOffset50.Text = textboxText
        txtOffset51.Text = textboxText
        txtOffset52.Text = textboxText
        txtOffset53.Text = textboxText
        txtOffset54.Text = textboxText
        txtOffset55.Text = textboxText
        txtOffset56.Text = textboxText
        txtOffset57.Text = textboxText
        txtOffset58.Text = textboxText
        txtOffset59.Text = textboxText
    End Sub

    Private Sub menuBtnPluginConverter_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnPluginConverter.Click
        formPluginConverter.Hide()
        formPluginConverter.Show()
    End Sub

    'Problem possibly found program is reading from gemini.map at 31756953, which is
    'not the right offset, possibly it is converting the hex to decimal wrong.
    'It should be reading at 26700507, according to the current plugin.
End Class