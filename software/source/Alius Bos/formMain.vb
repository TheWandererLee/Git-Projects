Public Class formMain
    Dim mapPath As String = ""
    Dim mapDirectory As String = ""
    Dim mapName As String = ""
    Dim mapExtension As String = ""
    Dim fileSize As Integer = 0
    Dim programName As String = "Alius Bos"

    Dim singleEncounter As Boolean = False
    Dim lastCharacterOffset As Integer = 0
    Dim recognizeImages As Boolean = True

    Dim tempHex(100) As Byte
    Dim tempHexString As String = ""
    Dim tmp1, tmp2, tmp3, tmp4, tmp5 As String

    Dim maxOffsets As Integer = 9999
    Dim maxCharacters As Integer = 999
    Dim maxImages As Integer = 999
    Dim freezeDistance As Integer = 100
    Dim freezeBytes(freezeDistance) As Byte

    Dim backwashStartOffset As Integer = 22226944
    Dim containmentStartOffset As Integer = 28833280
    Dim deltatapStartOffset As Integer = 24621055
    Dim duneStartOffset As Integer = 19509760
    Dim elongationStartOffset As Integer = 23519232
    Dim geminiStartOffset As Integer = 26700288
    Dim triplicateStartOffset As Integer = 33033216
    Dim turfStartOffset As Integer = 31756800
    Dim warlockStartOffset As Integer = 27505152

    Dim ascensionStartOffset As Integer = 12582400
    Dim beavercreekStartOffset As Integer = 13574144
    Dim burialmoundsStartOffset As Integer = 18228224
    Dim coagulationStartOffset As Integer = 20723712
    Dim colossusStartOffset As Integer = 15013376
    Dim cyclotronStartOffset As Integer = 22143488
    Dim foundationStartOffset As Integer = 23278080
    Dim headlongStartOffset As Integer = 29913088
    Dim lockoutStartOffset As Integer = 17799168
    Dim midshipStartOffset As Integer = 16252416
    Dim waterworksStartOffset As Integer = 22578688
    Dim zanzibarStartOffset As Integer = 29039616

    Dim sharedStartOffset As Integer = 148657152
    Dim singleSharedStartOffset As Integer = 381976064
    Dim mainmenuStartOffset As Integer = 15350272
    Dim startOffset As Integer = 0

    Dim mulgUnicodeOffset As Integer = 0

    Dim mapStandardImage(maxImages) As String
    Dim mapConvertedImage(maxImages) As String
    Dim mapHexArray(maxImages) As String
    Dim mapImagePreview(maxImages) As Bitmap

    Dim numberOfImages As Integer = 0
    Dim imageCounter As Integer = 0

    Dim tempByte1, tempByte2, tempByte3 As String
    Dim formBorderSize As Integer = 58
    Dim originalFormHeight As Integer = 373
    Dim snapSize As Integer = 12

    Dim mapNameText As String = "Map Name: "
    Dim mapSizeText As String = "Map Size: "
    Dim stringOffsetText As String = "String Offset: "
    Dim stringLengthText As String = "String Length: "
    Dim stringIDText As String = "String ID: "
    Dim stringNumberText As String = "Number of Strings: "
    Dim searchResultsText As String = "String ID #"
    Dim stringIndexText As String = "String Index Offset: "
    Dim stringTableText As String = "String Table Offset: "
    Dim mulgUnicodeText As String = "MULG Unicode Tables: "
    Dim maxSearchLength As Integer = 999
    Dim maxSearchItems As Integer = 100
    Dim maxSearchStrings As Integer = 999
    Dim maxMapCharacters As Integer = 999

    Dim tempString As String = ""
    Dim spaceCharacter As String = " "

    Dim numberOfStrings As Integer = 0
    Dim mapOffsets(maxOffsets) As Integer
    Dim mapLengths(maxOffsets) As Integer
    Dim mapStrings(maxOffsets) As String
    Dim searchString As String = ""
    Dim searchMatchCase As Boolean = False
    Dim stringFoundID As Integer = 0

    Dim stringBytes(maxOffsets) As Byte
    Dim mapBytes() As Byte
    Dim newBytes() As Byte
    Private Sub btnOpenMap_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnOpenMap.Click
        If (openFileMap.ShowDialog() = Windows.Forms.DialogResult.OK) Then
            mapPath = openFileMap.FileName
            mapDirectory = Mid(mapPath, 1, mapPath.LastIndexOf("\"))
            mapName = Mid(mapPath, mapPath.LastIndexOf("\") + 2, mapPath.LastIndexOf(".") - mapPath.LastIndexOf("\") - 1)
            mapExtension = Mid(mapPath, mapPath.LastIndexOf(".") + 2, mapPath.Length - mapPath.LastIndexOf("."))
            originalFormHeight = Me.Height
            listStrings.Visible = False
            menuBtnOpenMap.Enabled = False
            MsgBox("Did some stuff")
            'Makes sure that it is a valid map
            detectMapOffset()
            If (startOffset = 0) Then GoTo stopOpeningMap

            MsgBox("Gonna load a map")
            'Begins loading the map
            mapBytes = My.Computer.FileSystem.ReadAllBytes(mapPath)
            For i As Integer = 0 To freezeDistance
                freezeBytes(i) = mapBytes(i)
            Next
            newBytes = mapBytes
            fileSize = mapBytes.Length
            MsgBox("Did load the map")

            'Displays some map variables
            grpMapInfo.Visible = True
            lblMapName.Text = mapNameText & mapName
            lblMapSize.Text = mapSizeText & Math.Round(fileSize / 1000) / 1000 & " MB"
            lblStringIndex.Text = stringIndexText & load4Hex(364, True)
            lblStringTable.Text = stringTableText & load4Hex(368, True)
            'lblMULG.Text = mulgUnicodeText & mulgUnicodeOffset
            MsgBox("Displayed some varrrrrrrs")

            Exit Sub

            'Begins loading the offsets
            Dim p As Integer = 0
            singleEncounter = False
            For i As Integer = startOffset To fileSize
                If (mapBytes(i) = 0) Then
                    If (singleEncounter = True) Then
                        GoTo stopReadingOffsets
                    End If
                    mapOffsets(p) = i + 1
                    singleEncounter = True
                    p = p + 1
                Else
                    singleEncounter = False
                End If
            Next
stopReadingOffsets:
            numberOfStrings = p - 2
            lblNumberOfStrings.Text = stringNumberText & (numberOfStrings + 1)

            For i As Integer = 0 To numberOfStrings
                mapLengths(i) = mapOffsets(i + 1) - mapOffsets(i) - 1
            Next
            If (recognizeImages = True) Then
                progLoadingImages.Visible = True
                progLoadingImages.Minimum = startOffset
                progLoadingImages.Maximum = mapOffsets(numberOfStrings + 1)
                'Filter in all images
                For i As Integer = startOffset To mapOffsets(numberOfStrings + 1)
                    tempByte1 = Hex(mapBytes(i))
                    tempByte2 = Hex(mapBytes(i + 1))
                    tempByte3 = Hex(mapBytes(i + 2))
                    If (tempByte1.Length = 1) Then tempByte1 = "0" & tempByte1
                    If (tempByte2.Length = 1) Then tempByte2 = "0" & tempByte2
                    If (tempByte3.Length = 1) Then tempByte3 = "0" & tempByte3
                    For c As Integer = 0 To numberOfImages
                        If (tempByte1 & " " & tempByte2 & " " & tempByte3 = mapStandardImage(c)) Then
                            '3 Character Images
                            tempByte1 = Mid(mapConvertedImage(c), 1, 2)
                            tempByte2 = Mid(mapConvertedImage(c), 4, 2)
                            tempByte3 = Mid(mapConvertedImage(c), 7, 2)
                            newBytes(i) = CInt("&H" & tempByte1)
                            newBytes(i + 1) = CInt("&H" & tempByte2)
                            newBytes(i + 2) = CInt("&H" & tempByte3)
                        ElseIf (tempByte1 & " " & tempByte2 = mapStandardImage(c)) Then
                            '2 Character Images
                            tempByte1 = Mid(mapConvertedImage(c), 1, 2)
                            tempByte2 = Mid(mapConvertedImage(c), 4, 2)
                            newBytes(i) = CInt("&H" & tempByte1)
                            newBytes(i + 1) = CInt("&H" & tempByte2)
                        End If
                    Next
                    progLoadingImages.Value = i
                Next
                'Finished filtering in all the images
            End If
            p = 0
            Dim n As Integer = 0
            listStrings.Visible = False
            listStrings.Items.Clear()
            While n < mapOffsets(numberOfStrings)
                n = mapOffsets(p)
                mapStrings(p) = ""
                For i As Integer = n To mapOffsets(p + 1) - 1
                    mapStrings(p) = mapStrings(p) & Chr(newBytes(i))
                Next
                listStrings.Items.Add(mapStrings(p))
                p = p + 1
            End While
        End If
stopOpeningMap:
        listStrings.Visible = True
        comboSearchBar.Visible = True
        menuBtnMatchCase.Visible = True
        menuBtnSearch.Visible = True
        progLoadingImages.Visible = False
        menuBtnOpenMap.Enabled = True
    End Sub

    Private Sub formMain_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        progLoadingImages.Size = New Size(Me.Width - 8, 23)
        progLoadingImages.Location = New Point(0, Me.Height - progLoadingImages.Height - formBorderSize + (snapSize * 2))
        mapNameText = lblMapName.Text & " "
        mapSizeText = lblMapSize.Text & " "
        stringOffsetText = lblStringOffset.Text & " "
        stringLengthText = lblStringLength.Text & " "
        stringIDText = lblStringID.Text & " "
        stringNumberText = lblNumberOfStrings.Text & " "
        stringIndexText = lblStringIndex.Text & " "
        stringTableText = lblStringTable.Text & " "
        mulgUnicodeText = lblMULG.Text & " "
        updateResultsPosition()
        loadImageStrings()
    End Sub
    Private Sub formMain_Resize(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Resize
        If (progLoadingImages.Visible = True) Then
            listStrings.Size = New Size(Me.Width - 20 - listStrings.Location.X + 12, Me.Height - formBorderSize - menuStripMain.Height - progLoadingImages.Height + 21)
        Else
            listStrings.Size = New Size(Me.Width - 20 - listStrings.Location.X + 12, Me.Height - formBorderSize - menuStripMain.Height + 21)
        End If
        progLoadingImages.Size = New Size(Me.Width - 8, 23)
        progLoadingImages.Location = New Point(0, Me.Height - progLoadingImages.Height - formBorderSize + (snapSize * 2))
    End Sub
    Private Sub detectMapOffset()
        startOffset = 0
        If (mapName.ToLower() = "backwash") Then startOffset = backwashStartOffset
        If (mapName.ToLower() = "containment") Then startOffset = containmentStartOffset
        If (mapName.ToLower() = "deltatap") Then startOffset = deltatapStartOffset
        If (mapName.ToLower() = "dune") Then startOffset = duneStartOffset
        If (mapName.ToLower() = "elongation") Then startOffset = elongationStartOffset
        If (mapName.ToLower() = "gemini") Then startOffset = geminiStartOffset
        If (mapName.ToLower() = "triplicate") Then startOffset = triplicateStartOffset
        If (mapName.ToLower() = "turf") Then startOffset = turfStartOffset
        If (mapName.ToLower() = "warlock") Then startOffset = warlockStartOffset

        If (mapName.ToLower() = "ascension") Then startOffset = ascensionStartOffset
        If (mapName.ToLower() = "beavercreek") Then startOffset = beavercreekStartOffset
        If (mapName.ToLower() = "burial_mounds") Then startOffset = burialmoundsStartOffset
        If (mapName.ToLower() = "coagulation") Then startOffset = coagulationStartOffset
        If (mapName.ToLower() = "colossus") Then startOffset = colossusStartOffset
        If (mapName.ToLower() = "cyclotron") Then startOffset = cyclotronStartOffset
        If (mapName.ToLower() = "foundation") Then startOffset = foundationStartOffset
        If (mapName.ToLower() = "headlong") Then startOffset = headlongStartOffset
        If (mapName.ToLower() = "lockout") Then startOffset = lockoutStartOffset
        If (mapName.ToLower() = "midship") Then startOffset = midshipStartOffset
        If (mapName.ToLower() = "waterworks") Then startOffset = waterworksStartOffset
        If (mapName.ToLower() = "zanzibar") Then startOffset = zanzibarStartOffset

        If (mapName.ToLower() = "shared") Then startOffset = sharedStartOffset
        If (mapName.ToLower() = "single_player_shared") Then startOffset = singleSharedStartOffset
        If (mapName.ToLower() = "mainmenu") Then startOffset = mainmenuStartOffset

        If (startOffset = 0 And CInt("&H" & txtStringTableOffset.Text) <> 0) Then
            If (MsgBox("The map you are trying to open is not a valid Halo 2 multiplayer map." & vbCrLf & _
            "You have provided an alternative string table offset." & vbCrLf & _
            "Do you want to load strings starting at that offset?" & vbCrLf & _
            "Alternate Offset: " & CInt("&H" & txtStringTableOffset.Text) & " [0x" & txtStringTableOffset.Text & "]", _
            MsgBoxStyle.YesNo Or MsgBoxStyle.Information, "Unknown Map (" & _
            Mid(mapName.ToLower, 1, 1).ToUpper & Mid(mapName.ToLower, 2, mapName.Length - 1).ToLower & ")") = _
            MsgBoxResult.No) Then GoTo stopgettingOffset
        ElseIf (startOffset = 0) Then
            MsgBox("The map you are trying to open is not a valid Halo 2 multiplayer map." & vbCrLf & _
            "You have NOT provided an alternative string table offset." & vbCrLf & _
            Mid(mapName.ToLower, 1, 1).ToUpper & Mid(mapName.ToLower, 2, mapName.Length - 1).ToLower & _
            " will not be opened.", MsgBoxStyle.Information, "Unknown Map (" & _
            Mid(mapName.ToLower, 1, 1).ToUpper & Mid(mapName.ToLower, 2, mapName.Length - 1).ToLower & ")")
        End If
stopGettingOffset:
    End Sub

    Private Sub listStrings_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles listStrings.SelectedIndexChanged
        If (listStrings.SelectedIndex <> -1 And mapPath <> "") Then
            grpStringEditor.Visible = True
            grpImages.Visible = True
            updateResultsPosition()
            updateImageList()
            updateImagePreview()
            lblStringOffset.Text = stringOffsetText & mapOffsets(listStrings.SelectedIndex) & _
            " [0x" & Hex(mapOffsets(listStrings.SelectedIndex)) & "]"
            lblStringLength.Text = stringLengthText & mapLengths(listStrings.SelectedIndex)
            lblStringID.Text = stringIDText & listStrings.SelectedIndex + 1
            txtStringText.Text = listStrings.SelectedItem
            txtStringText.MaxLength = mapLengths(listStrings.SelectedIndex)
        End If
    End Sub
    Private Sub btnDisplayFullString_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnDisplayFullString.Click
        If (listStrings.SelectedItem <> "") Then
            tempString = listStrings.SelectedItem
            tempString = tempString.Replace("\n", vbCrLf)
            MsgBox("Entire String:" & vbCrLf & vbCrLf & tempString, MsgBoxStyle.Information, _
            "Full String Display")
        Else
            MsgBox("No string was selected.")
        End If
    End Sub

    Private Sub txtStringText_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles txtStringText.TextChanged
        btnSaveString.Enabled = True
        updateImageList()
    End Sub
    Private Sub menuBtnRecognizeImages_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnRecognizeImages.Click
        recognizeImages = True
        menuBtnImages.Image = My.Resources.Checked
    End Sub
    Private Sub menuBtnDontRecognize_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnDontRecognize.Click
        recognizeImages = False
        menuBtnImages.Image = My.Resources.Unchecked
    End Sub

    Private Sub btnSaveString_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnSaveString.Click
        If (txtStringText.Text.Length <> txtStringText.MaxLength) Then
            For i As Integer = txtStringText.Text.Length To txtStringText.MaxLength - 1
                txtStringText.Text = txtStringText.Text & spaceCharacter
            Next
        End If
        Dim fileID As Integer = FreeFile()
        Dim writeString As String = ""

        writeString = txtStringText.Text
        For i As Integer = 1 To writeString.Length
            newBytes(mapOffsets(listStrings.SelectedIndex) + i - 1) = _
            Asc(Mid(writeString, i, 1))
        Next
        'Load dynamic images into the string as well if preference is on.
        If (recognizeImages = True) Then
            For i As Integer = 1 To writeString.Length
                For c As Integer = 0 To numberOfImages
                    tempByte1 = Hex(Asc(Mid(writeString, i, 1)))
                    If (i + 1 <= writeString.Length) Then tempByte2 = Hex(Asc(Mid(writeString, i + 1, 1))) Else tempByte2 = "00"
                    If (i + 2 <= writeString.Length) Then tempByte3 = Hex(Asc(Mid(writeString, i + 2, 1))) Else tempByte3 = "00"

                    If (tempByte1 & " " & tempByte2 & " " & tempByte3 = mapConvertedImage(c)) Then
                        '3 Character Images
                        tempByte1 = Mid(mapStandardImage(c), 1, 2)
                        tempByte2 = Mid(mapStandardImage(c), 4, 2)
                        tempByte3 = Mid(mapStandardImage(c), 7, 2)
                        newBytes(i) = CInt("&H" & tempByte1)
                        newBytes(i + 1) = CInt("&H" & tempByte2)
                        newBytes(i + 2) = CInt("&H" & tempByte3)
                    ElseIf (tempByte1 & " " & tempByte2 = mapConvertedImage(c)) Then
                        '2 Character Images
                        tempByte1 = Mid(mapStandardImage(c), 1, 2)
                        tempByte2 = Mid(mapStandardImage(c), 4, 2)
                        newBytes(i) = CInt("&H" & tempByte1)
                        newBytes(i + 1) = CInt("&H" & tempByte2)
                    End If
                Next
            Next
        End If
        'Safecheck because sometimes the program likes to edit the beginning of the map, making it unreadable
        For i As Integer = 0 To freezeDistance
            newBytes(i) = mapBytes(i)
        Next
        'Change the item to match the textbox and disable the Save String button
        listStrings.Items.Item(listStrings.SelectedIndex) = txtStringText.Text
        btnSaveString.Enabled = False
    End Sub
    Private Sub menuBtnSaveMap_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnSaveMap.Click
        If (recognizeImages = True) Then
            progLoadingImages.Visible = True
            progLoadingImages.Minimum = startOffset
            progLoadingImages.Maximum = mapOffsets(numberOfStrings + 1)
            'Filter in all images
            For i As Integer = startOffset To mapOffsets(numberOfStrings + 1)
                tempByte1 = Hex(newBytes(i))
                tempByte2 = Hex(newBytes(i + 1))
                tempByte3 = Hex(newBytes(i + 2))
                If (tempByte1.Length = 1) Then tempByte1 = "0" & tempByte1
                If (tempByte2.Length = 1) Then tempByte2 = "0" & tempByte2
                If (tempByte3.Length = 1) Then tempByte3 = "0" & tempByte3
                For c As Integer = 0 To numberOfImages
                    If (tempByte1 & " " & tempByte2 & " " & tempByte3 = mapConvertedImage(c)) Then
                        '3 Character Images
                        tempByte1 = Mid(mapStandardImage(c), 1, 2)
                        tempByte2 = Mid(mapStandardImage(c), 4, 2)
                        tempByte3 = Mid(mapStandardImage(c), 7, 2)
                        newBytes(i) = CInt("&H" & tempByte1)
                        newBytes(i + 1) = CInt("&H" & tempByte2)
                        newBytes(i + 2) = CInt("&H" & tempByte3)
                    ElseIf (tempByte1 & " " & tempByte2 = mapConvertedImage(c)) Then
                        '2 Character Images
                        tempByte1 = Mid(mapStandardImage(c), 1, 2)
                        tempByte2 = Mid(mapStandardImage(c), 4, 2)
                        newBytes(i) = CInt("&H" & tempByte1)
                        newBytes(i + 1) = CInt("&H" & tempByte2)
                    End If
                Next
                progLoadingImages.Value = i
            Next
            'Finished filtering in all the images
        End If
        progLoadingImages.Visible = False
        mapBytes = newBytes
        For i As Integer = 0 To freezeDistance
            mapBytes(i) = freezeBytes(i)
        Next
        Try
            My.Computer.FileSystem.WriteAllBytes(mapPath, mapBytes, False)
            MsgBox("Map " & mapName & " was successfully saved!" & _
            vbCrLf & vbCrLf & "Resign the map!")
        Catch ex As Exception
            MsgBox("Could not save the file." & vbCrLf & _
            "The file may have been moved, deleted, or is currently in use.", _
            MsgBoxStyle.Critical, "Could not save file")
        End Try
    End Sub

    Private Sub menuBtnSearch_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnSearch.Click
        searchString = comboSearchBar.Text
        listSearchResults.Items.Clear()
        grpSearchResults.Visible = True
        For i As Integer = 0 To numberOfStrings - 1
            tempString = listStrings.Items.Item(i)
            If (searchMatchCase = False) Then tempString = tempString.ToLower
            If (searchMatchCase = True) Then
                If (tempString.Contains(searchString) = True) Then
                    listSearchResults.Items.Add(searchResultsText & (i + 1))
                End If
            Else
                If (tempString.Contains(searchString.ToLower) = True) Then
                    listSearchResults.Items.Add(searchResultsText & (i + 1))
                End If
            End If
        Next
        GoTo FinishedSearching
ErrorNoSearchString:
        MsgBox("No search query entered.", MsgBoxStyle.Information, "Search")
FinishedSearching:
        If (comboSearchBar.Items.Contains(searchString) = False) Then
            comboSearchBar.Items.Add(searchString)
        End If
    End Sub
    Private Sub listSearchResults_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles listSearchResults.SelectedIndexChanged
        If (listSearchResults.SelectedIndex <> -1 And listSearchResults.SelectedItem <> "") Then
            listStrings.Select()
            tempString = listSearchResults.SelectedItem()
            listStrings.SelectedIndex = CInt(Mid(listSearchResults.SelectedItem, searchResultsText.Length + 1, tempString.Length - searchResultsText.Length)) - 1
            listSearchResults.Select()
        End If
    End Sub
    Private Sub listImages_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles listImages.SelectedIndexChanged
        If (listImages.SelectedIndex <> -1) Then
            If (recognizeImages = True) Then mapHexArray = mapConvertedImage Else mapHexArray = mapStandardImage
            For i As Integer = 0 To numberOfImages
                If (mapHexArray(i).Length = 8) Then
                    'Image is a 3 Character Image
                    tempByte1 = Chr("&H" & Mid(mapHexArray(i), 1, 2))
                    tempByte2 = Chr("&H" & Mid(mapHexArray(i), 4, 2))
                    tempByte3 = Chr("&H" & Mid(mapHexArray(i), 7, 2))
                    If (listImages.SelectedItem.Contains(tempByte1 & tempByte2 & tempByte3)) Then
                        picPreview.Image = mapImagePreview(i)
                        GoTo foundImageMatch
                    End If
                ElseIf (mapHexArray(i).Length = 5) Then
                    'Image is a 2 Character Image
                    tempByte1 = Chr("&H" & Mid(mapHexArray(i), 1, 2))
                    tempByte2 = Chr("&H" & Mid(mapHexArray(i), 4, 2))
                    If (listImages.SelectedItem.Contains(tempByte1 & tempByte2)) Then
                        picPreview.Image = mapImagePreview(i)
                        GoTo foundImageMatch
                    End If
                End If
            Next
            picPreview.Image = My.Resources.noImagePreview
foundImageMatch:
        End If
    End Sub
    Private Sub menuBtnMatchCase_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnMatchCase.Click
        If (searchMatchCase = True) Then
            searchMatchCase = False
            menuBtnMatchCase.Image = My.Resources.Unchecked
        Else
            searchMatchCase = True
            menuBtnMatchCase.Image = My.Resources.Checked
        End If
    End Sub

    Private Sub updateResultsPosition()
        If (grpImages.Visible = False And grpStringEditor.Visible = False) Then
            grpSearchResults.Top = 93
        ElseIf (grpImages.Visible = False) Then
            grpSearchResults.Top = 205
        Else
            grpSearchResults.Top = 311
        End If
    End Sub
    Private Sub btnHideSearch_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnHideSearch.Click
        grpSearchResults.Visible = False
    End Sub
    Private Sub btnHideImages_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnHideImages.Click
        grpImages.Visible = False
        updateResultsPosition()
    End Sub
    Private Sub updateImageList()
        listImages.Items.Clear()
        If (recognizeImages = True) Then mapHexArray = mapConvertedImage Else mapHexArray = mapStandardImage
        For i As Integer = 0 To numberOfImages
            If (mapHexArray(i).Length = 8) Then
                'Image is a 3 Character Image
                tempByte1 = Chr("&H" & Mid(mapHexArray(i), 1, 2))
                tempByte2 = Chr("&H" & Mid(mapHexArray(i), 4, 2))
                tempByte3 = Chr("&H" & Mid(mapHexArray(i), 7, 2))
                If (txtStringText.Text.Contains(tempByte1 & tempByte2 & tempByte3)) Then
                    listImages.Items.Add(tempByte1 & tempByte2 & tempByte3)
                End If
            ElseIf (mapHexArray(i).Length = 5) Then
                'Image is a 2 Character Image
                tempByte1 = Chr("&H" & Mid(mapHexArray(i), 1, 2))
                tempByte2 = Chr("&H" & Mid(mapHexArray(i), 4, 2))
                If (txtStringText.Text.Contains(tempByte1 & tempByte2)) Then
                    listImages.Items.Add(tempByte1 & tempByte2)
                End If
            End If
        Next
    End Sub
    Private Sub updateImagePreview()
        If (recognizeImages = True) Then mapHexArray = mapConvertedImage Else mapHexArray = mapStandardImage
        For i As Integer = 0 To numberOfImages
            If (mapHexArray(i).Length = 8) Then
                'Image is a 3 Character Image
                tempByte1 = Chr("&H" & Mid(mapHexArray(i), 1, 2))
                tempByte2 = Chr("&H" & Mid(mapHexArray(i), 4, 2))
                tempByte3 = Chr("&H" & Mid(mapHexArray(i), 7, 2))
                If (listStrings.SelectedItem.Contains(tempByte1 & tempByte2 & tempByte3)) Then
                    picPreview.Image = mapImagePreview(i)
                    GoTo foundImageMatch
                End If
            ElseIf (mapHexArray(i).Length = 5) Then
                'Image is a 2 Character Image
                tempByte1 = Chr("&H" & Mid(mapHexArray(i), 1, 2))
                tempByte2 = Chr("&H" & Mid(mapHexArray(i), 4, 2))
                If (listStrings.SelectedItem.Contains(tempByte1 & tempByte2)) Then
                    picPreview.Image = mapImagePreview(i)
                    GoTo foundImageMatch
                End If
            End If
        Next
        picPreview.Image = My.Resources.noImagePreview
foundImageMatch:
    End Sub

    Private Function load4Hex(ByRef offset As Double, ByVal reverse As Boolean) As String
        tmp1 = Hex(mapBytes(offset + 0))
        tmp2 = Hex(mapBytes(offset + 1))
        tmp3 = Hex(mapBytes(offset + 2))
        tmp4 = Hex(mapBytes(offset + 3))
        If Len(tmp1) = 1 Then tmp1 = "0" + tmp1
        If Len(tmp2) = 1 Then tmp2 = "0" + tmp2
        If Len(tmp3) = 1 Then tmp3 = "0" + tmp3
        If Len(tmp4) = 1 Then tmp4 = "0" + tmp4
        If reverse = True Then
            tmp5 = tmp4 + tmp3 + tmp2 + tmp1
        Else
            tmp5 = tmp1 + tmp2 + tmp3 + tmp4
        End If
        load4Hex = tmp5
    End Function

    Private Sub loadImageStrings()
        imageCounter = 0

        'Weapon: Sword - [W]
        mapStandardImage(imageCounter) = "EE 84 9F"
        mapConvertedImage(imageCounter) = "5B 57 5D"
        mapImagePreview(imageCounter) = My.Resources.weaponSword
        imageCounter += 1
        'Weapon: Plasma Rifle - [I]
        mapStandardImage(imageCounter) = "EE 84 9E"
        mapConvertedImage(imageCounter) = "5B 49 5D"
        mapImagePreview(imageCounter) = My.Resources.weaponPlasmaRifle
        imageCounter += 1
        'Weapon: Brute Plasma Rifle - [U]
        mapStandardImage(imageCounter) = "EE 84 AA"
        mapConvertedImage(imageCounter) = "5B 55 5D"
        mapImagePreview(imageCounter) = My.Resources.weaponBrutePlasmaRifle
        imageCounter += 1
        'Weapon: Plasma Pistol - [P]
        mapStandardImage(imageCounter) = "EE 84 9D"
        mapConvertedImage(imageCounter) = "5B 50 5D"
        mapImagePreview(imageCounter) = My.Resources.weaponPlasmaPistol
        imageCounter += 1
        'Weapon: Covenant Carbine - [C]
        mapStandardImage(imageCounter) = "EE 84 95"
        mapConvertedImage(imageCounter) = "5B 43 5D"
        mapImagePreview(imageCounter) = My.Resources.weaponCarbine
        imageCounter += 1
        'Weapon: Disintegrator - [Z]
        mapStandardImage(imageCounter) = "EE 84 A5"
        mapConvertedImage(imageCounter) = "5B 5A 5D"
        mapImagePreview(imageCounter) = My.Resources.weaponDisintegrator
        imageCounter += 1
        'Weapon: Beam Rifle - [R]
        mapStandardImage(imageCounter) = "EE 84 A4"
        mapConvertedImage(imageCounter) = "5B 52 5D"
        mapImagePreview(imageCounter) = My.Resources.weaponBeamRifle
        imageCounter += 1
        'Weapon: Brute Shot - [T]
        mapStandardImage(imageCounter) = "EE 84 94"
        mapConvertedImage(imageCounter) = "5B 54 5D"
        mapImagePreview(imageCounter) = My.Resources.weaponBruteShot
        imageCounter += 1
        'Weapon: Fuel Rod Cannon - [O]
        mapStandardImage(imageCounter) = "EE 84 97"
        mapConvertedImage(imageCounter) = "5B 4F 5D"
        mapImagePreview(imageCounter) = My.Resources.weaponFuelRodCannon
        imageCounter += 1
        'Weapon: Battle Rifle - [B]
        mapStandardImage(imageCounter) = "EE 84 92"
        mapConvertedImage(imageCounter) = "5B 42 5D"
        mapImagePreview(imageCounter) = My.Resources.weaponBattleRifle
        imageCounter += 1
        'Weapon: Needler - [E]
        mapStandardImage(imageCounter) = "EE 84 9B"
        mapConvertedImage(imageCounter) = "5B 45 5D"
        mapImagePreview(imageCounter) = My.Resources.weaponNeedler
        imageCounter += 1
        'Weapon: Magnum - [M]
        mapStandardImage(imageCounter) = "EE 84 9A"
        mapConvertedImage(imageCounter) = "5B 4D 5D"
        mapImagePreview(imageCounter) = My.Resources.weaponMagnum
        imageCounter += 1
        'Weapon: Rocket Launcher - [K]
        mapStandardImage(imageCounter) = "EE 84 A0"
        mapConvertedImage(imageCounter) = "5B 4B 5D"
        mapImagePreview(imageCounter) = My.Resources.weaponRocketLauncher
        imageCounter += 1
        'Weapon: Shotgun - [H]
        mapStandardImage(imageCounter) = "EE 84 A1"
        mapConvertedImage(imageCounter) = "5B 48 5D"
        mapImagePreview(imageCounter) = My.Resources.weaponShotgun
        imageCounter += 1
        'Weapon: SMG - [G]
        mapStandardImage(imageCounter) = "EE 84 A2"
        mapConvertedImage(imageCounter) = "5B 47 5D"
        mapImagePreview(imageCounter) = My.Resources.weaponSMG
        imageCounter += 1
        'Weapon: Sniper Rifle - [N]
        mapStandardImage(imageCounter) = "EE 84 A3"
        mapConvertedImage(imageCounter) = "5B 4E 5D"
        mapImagePreview(imageCounter) = My.Resources.weaponSniperRifle
        imageCounter += 1
        'Weapon: Sentinel Beam - [S]
        mapStandardImage(imageCounter) = "EE 84 A6"
        mapConvertedImage(imageCounter) = "5B 53 5D"
        mapImagePreview(imageCounter) = My.Resources.weaponSentinelBeam
        imageCounter += 1
        'Weapon: Sentinel Grenade Launcher - [L]
        mapStandardImage(imageCounter) = "EE 84 A8"
        mapConvertedImage(imageCounter) = "5B 4C 5D"
        mapImagePreview(imageCounter) = My.Resources.weaponSentinelGrenadeLauncher
        imageCounter += 1
        'Weapon: Assault Bomb - [A]
        mapStandardImage(imageCounter) = "EE 84 93"
        mapConvertedImage(imageCounter) = "5B 41 5D"
        mapImagePreview(imageCounter) = My.Resources.weaponBomb
        imageCounter += 1
        'Weapon: Oddball - [D]
        mapStandardImage(imageCounter) = "EE 84 9C"
        mapConvertedImage(imageCounter) = "5B 44 5D"
        mapImagePreview(imageCounter) = My.Resources.weaponOddball
        imageCounter += 1
        'Weapon: Flag - [F]
        mapStandardImage(imageCounter) = "EE 84 96"
        mapConvertedImage(imageCounter) = "5B 46 5D"
        mapImagePreview(imageCounter) = My.Resources.weaponFlag
        imageCounter += 1

        'Medal: Killing Spree - (a)
        mapStandardImage(imageCounter) = "EE 80 B3"
        mapConvertedImage(imageCounter) = "28 61 29"
        mapImagePreview(imageCounter) = My.Resources.medalKillingSpree
        imageCounter += 1
        'Medal: Running Riot - (b)
        mapStandardImage(imageCounter) = "EE 80 B4"
        mapConvertedImage(imageCounter) = "28 62 29"
        mapImagePreview(imageCounter) = My.Resources.medalRunningRiot
        imageCounter += 1
        'Medal: Rampage - (c)
        mapStandardImage(imageCounter) = "EE 80 B5"
        mapConvertedImage(imageCounter) = "28 63 29"
        mapImagePreview(imageCounter) = My.Resources.medalRampage
        imageCounter += 1
        'Medal: Berserker - (d)
        mapStandardImage(imageCounter) = "EE 80 B6"
        mapConvertedImage(imageCounter) = "28 64 29"
        mapImagePreview(imageCounter) = My.Resources.medalBerserker
        imageCounter += 1
        'Medal: Overkill - (e)
        mapStandardImage(imageCounter) = "EE 80 B7"
        mapConvertedImage(imageCounter) = "28 65 29"
        mapImagePreview(imageCounter) = My.Resources.medalOverkill
        imageCounter += 1

        'Medal: Double Kill - (2)
        mapStandardImage(imageCounter) = "EE 80 B8"
        mapConvertedImage(imageCounter) = "28 32 29"
        mapImagePreview(imageCounter) = My.Resources.medalDoubleKill
        imageCounter += 1
        'Medal: Triple Kill - (3)
        mapStandardImage(imageCounter) = "EE 80 B9"
        mapConvertedImage(imageCounter) = "28 33 29"
        mapImagePreview(imageCounter) = My.Resources.medalTripleKill
        imageCounter += 1
        'Medal: Killtacular - (4)
        mapStandardImage(imageCounter) = "EE 81 80"
        mapConvertedImage(imageCounter) = "28 34 29"
        mapImagePreview(imageCounter) = My.Resources.medalKilltacular
        imageCounter += 1
        'Medal: Kill Frenzy - (5)
        mapStandardImage(imageCounter) = "EE 81 81"
        mapConvertedImage(imageCounter) = "28 35 29"
        mapImagePreview(imageCounter) = My.Resources.medalKillFrenzy
        imageCounter += 1
        'Medal: Killtrocity - (6)
        mapStandardImage(imageCounter) = "EE 81 82"
        mapConvertedImage(imageCounter) = "28 36 29"
        mapImagePreview(imageCounter) = My.Resources.medalKilltrocity
        imageCounter += 1
        'Medal: Killimanjaro - (7)
        mapStandardImage(imageCounter) = "EE 81 83"
        mapConvertedImage(imageCounter) = "28 37 29"
        mapImagePreview(imageCounter) = My.Resources.medalKillimanjaro
        imageCounter += 1

        'Medal: Sniper Kill - (s)
        mapStandardImage(imageCounter) = "EE 81 84"
        mapConvertedImage(imageCounter) = "28 73 29"
        mapImagePreview(imageCounter) = My.Resources.medalSniperKill
        imageCounter += 1
        'Medal: Roadkill - (i)
        mapStandardImage(imageCounter) = "EE 81 85"
        mapConvertedImage(imageCounter) = "28 69 29"
        mapImagePreview(imageCounter) = My.Resources.medalSplatter
        imageCounter += 1
        'Medal: Bonecracker - (n)
        mapStandardImage(imageCounter) = "EE 81 86"
        mapConvertedImage(imageCounter) = "28 6E 29"
        mapImagePreview(imageCounter) = My.Resources.medalBonecracker
        imageCounter += 1
        'Medal: Stealth Kill - (k)
        mapStandardImage(imageCounter) = "EE 81 87"
        mapConvertedImage(imageCounter) = "28 68 29"
        mapImagePreview(imageCounter) = My.Resources.medalAssassin
        imageCounter += 1
        'Medal: Stick It - (k)
        mapStandardImage(imageCounter) = "EE 81 88"
        mapConvertedImage(imageCounter) = "28 6B 29"
        mapImagePreview(imageCounter) = My.Resources.medalStick
        imageCounter += 1
        'Medal: Flag Save - (f)
        mapStandardImage(imageCounter) = "EE 81 89"
        mapConvertedImage(imageCounter) = "28 66 29"
        mapImagePreview(imageCounter) = My.Resources.medalFlagCarrierKill
        imageCounter += 1
        'Medal: Oddball Save - (o)
        mapStandardImage(imageCounter) = "EE 81 90"
        mapConvertedImage(imageCounter) = "28 6F 29"
        mapImagePreview(imageCounter) = My.Resources.medalOddballCarrierKill
        imageCounter += 1
        'Medal: Bomb Save - (m)
        mapStandardImage(imageCounter) = "EE 81 91"
        mapConvertedImage(imageCounter) = "28 6D 29"
        mapImagePreview(imageCounter) = My.Resources.medalBombCarrierKill
        imageCounter += 1
        'Medal: Vehicle Kill - (v)
        mapStandardImage(imageCounter) = "EE 81 92"
        mapConvertedImage(imageCounter) = "28 76 29"
        mapImagePreview(imageCounter) = My.Resources.medalSplatter
        imageCounter += 1
        'Medal: Carjack - (j)
        mapStandardImage(imageCounter) = "EE 81 93"
        mapConvertedImage(imageCounter) = "28 6A 29"
        mapImagePreview(imageCounter) = My.Resources.medalCarjack
        imageCounter += 1
        'Medal: Flag Taken - (g)
        mapStandardImage(imageCounter) = "EE 81 94"
        mapConvertedImage(imageCounter) = "28 67 29"
        mapImagePreview(imageCounter) = My.Resources.medalFlagTaken
        imageCounter += 1
        'Medal: Bomb Diffused - (u)
        mapStandardImage(imageCounter) = "EE 81 99"
        mapConvertedImage(imageCounter) = "28 75 29"
        mapImagePreview(imageCounter) = My.Resources.medalBombTaken
        imageCounter += 1
        'Medal: Bomb Planted - (p)
        mapStandardImage(imageCounter) = "EE 81 97"
        mapConvertedImage(imageCounter) = "28 70 29"
        mapImagePreview(imageCounter) = My.Resources.medalBombPlanted
        imageCounter += 1
        'Medal: Flag Returned - (r)
        mapStandardImage(imageCounter) = "EE 82 90"
        mapConvertedImage(imageCounter) = "28 72 29"
        mapImagePreview(imageCounter) = My.Resources.medalFlagReturned
        imageCounter += 1
        'Medal: Bomb Returned - (t)
        mapStandardImage(imageCounter) = "EE 82 91"
        mapConvertedImage(imageCounter) = "28 74 29"
        mapImagePreview(imageCounter) = My.Resources.medalBombReturned
        imageCounter += 1
        'Medal: Flag Scored - (l)
        mapStandardImage(imageCounter) = "EE 81 96"
        mapConvertedImage(imageCounter) = "28 6C 29"
        mapImagePreview(imageCounter) = My.Resources.medalFlagCaptured
        imageCounter += 1

        'Button: X - (X)
        mapStandardImage(imageCounter) = "EE 91 88"
        mapConvertedImage(imageCounter) = "28 58 29"
        mapImagePreview(imageCounter) = My.Resources.buttonX
        imageCounter += 1
        'Button: X - Pregame Lobby - (P)
        mapStandardImage(imageCounter) = "EE 84 82"
        mapConvertedImage(imageCounter) = "28 50 29"
        mapImagePreview(imageCounter) = My.Resources.buttonX
        imageCounter += 1
        'Button: Y - (Y)
        mapStandardImage(imageCounter) = "EE 91 89"
        mapConvertedImage(imageCounter) = "28 59 29"
        mapImagePreview(imageCounter) = My.Resources.buttonY
        imageCounter += 1
        'Button: A - (A)
        mapStandardImage(imageCounter) = "EE 91 86"
        mapConvertedImage(imageCounter) = "28 41 29"
        mapImagePreview(imageCounter) = My.Resources.buttonA
        imageCounter += 1
        'Button: A - Messages and Prompts - (C)                  'Press (C) to continue/try again/actions?
        mapStandardImage(imageCounter) = "EE 84 80"
        mapConvertedImage(imageCounter) = "28 43 29"
        mapImagePreview(imageCounter) = My.Resources.buttonA
        imageCounter += 1
        'Button: B - (B)
        mapStandardImage(imageCounter) = "EE 91 8A"
        mapConvertedImage(imageCounter) = "28 42 29"
        mapImagePreview(imageCounter) = My.Resources.buttonB
        imageCounter += 1
        'Button: B - Messages and Prompts - (D)                  'Vehicles only?
        mapStandardImage(imageCounter) = "EE 84 81"
        mapConvertedImage(imageCounter) = "28 44 29"
        mapImagePreview(imageCounter) = My.Resources.buttonB
        imageCounter += 1
        'Button: White - (W)
        mapStandardImage(imageCounter) = "EE 91 8B"
        mapConvertedImage(imageCounter) = "28 57 29"
        mapImagePreview(imageCounter) = My.Resources.buttonWhite
        imageCounter += 1
        'Button: White - Pregame Lobby - (E)
        mapStandardImage(imageCounter) = "EE 84 85"
        mapConvertedImage(imageCounter) = "28 45 29"
        mapImagePreview(imageCounter) = My.Resources.buttonWhite
        imageCounter += 1

        'Button: Left Trigger Down - (V)  'Vehicles only?
        mapStandardImage(imageCounter) = "EE 84 86"
        mapConvertedImage(imageCounter) = "28 56 29"
        mapImagePreview(imageCounter) = My.Resources.buttonL
        imageCounter += 1
        'Button: Left Trigger Down - (S)  'Messages only?
        mapStandardImage(imageCounter) = "EE 91 9E"
        mapConvertedImage(imageCounter) = "28 53 29"
        mapImagePreview(imageCounter) = My.Resources.buttonL
        imageCounter += 1
        'Button: Left Trigger - (L)
        mapStandardImage(imageCounter) = "EE 91 8C"
        mapConvertedImage(imageCounter) = "28 4C 29"
        mapImagePreview(imageCounter) = My.Resources.buttonL
        imageCounter += 1
        'Button: Right Trigger - (R)
        mapStandardImage(imageCounter) = "EE 91 8D"
        mapConvertedImage(imageCounter) = "28 52 29"
        mapImagePreview(imageCounter) = My.Resources.buttonR
        imageCounter += 1

        'Button: Left Thumbstick Down - (C)
        mapStandardImage(imageCounter) = "EE 91 90"
        mapConvertedImage(imageCounter) = "28 43 29"
        mapImagePreview(imageCounter) = My.Resources.buttonLeftThumbDown
        imageCounter += 1
        'Button: Right Thumbstick Down - (Z)
        mapStandardImage(imageCounter) = "EE 91 91"
        mapConvertedImage(imageCounter) = "28 5A 29"
        mapImagePreview(imageCounter) = My.Resources.buttonRightThumbDown
        imageCounter += 1
        'Button: Left Thumbstick Up - (M)
        mapStandardImage(imageCounter) = "EE 91 96"
        mapConvertedImage(imageCounter) = "28 4D 29"
        mapImagePreview(imageCounter) = My.Resources.buttonLeftThumbUp
        imageCounter += 1
        'Button: Right Thumbstick Up - (T)
        mapStandardImage(imageCounter) = "EE 91 97"
        mapConvertedImage(imageCounter) = "28 54 29"
        mapImagePreview(imageCounter) = My.Resources.buttonRightThumbUp
        imageCounter += 1

        'Character: Newline Character - \n
        mapStandardImage(imageCounter) = "0D 0A"
        mapConvertedImage(imageCounter) = "5C 6E"
        mapImagePreview(imageCounter) = My.Resources.noImagePreview
        imageCounter += 1
        'Character: Apostrophe - (')
        mapStandardImage(imageCounter) = "E2 80 99"
        mapConvertedImage(imageCounter) = "28 27 29"
        mapImagePreview(imageCounter) = My.Resources.noImagePreview
        imageCounter += 1

        'Variable: Rounds Picked Up - {R}
        mapStandardImage(imageCounter) = "EE 90 A2"
        mapConvertedImage(imageCounter) = "7B 52 7D"
        mapImagePreview(imageCounter) = My.Resources.noImagePreview
        imageCounter += 1
        'Variable: Cause Player - {C}
        mapStandardImage(imageCounter) = "EE 91 98"
        mapConvertedImage(imageCounter) = "7B 43 7D"
        mapImagePreview(imageCounter) = My.Resources.noImagePreview
        imageCounter += 1
        'Variable: Party Leader - {L}
        mapStandardImage(imageCounter) = "EE 90 96"
        mapConvertedImage(imageCounter) = "7B 4C 7D"
        mapImagePreview(imageCounter) = My.Resources.noImagePreview
        imageCounter += 1
        'Variable: Game Start Delayer - {D}
        mapStandardImage(imageCounter) = "EE 90 94"
        mapConvertedImage(imageCounter) = "7B 44 7D"
        mapImagePreview(imageCounter) = My.Resources.noImagePreview
        imageCounter += 1
        'Variable: Players in Party - {P}
        mapStandardImage(imageCounter) = "EE 90 A5"
        mapConvertedImage(imageCounter) = "7B 50 7D"
        mapImagePreview(imageCounter) = My.Resources.noImagePreview

        numberOfImages = imageCounter
    End Sub
End Class
