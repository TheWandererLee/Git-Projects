Public Class formMain
    'Begin declaring initial variables.
#Region "Drawing Variables"
    Dim myPen As New System.Drawing.Pen(System.Drawing.Color.Red)
    Dim formGraphics As System.Drawing.Graphics

    Dim offset As Point = New Point(0, 0)
    Dim oldOffset As Point = New Point(0, 0)

    Dim zoom As Size = New Size(Me.Width, Me.Height)
    Dim zoomx As Double = 0
    Dim zoomy As Double = 0
    Dim oldZoomx As Double = 0
    Dim oldZoomy As Double = 0

    Dim oldSoftness As Integer = 192

    Dim drawZoomRectangle As Boolean = False
    Dim drawMoveRectangle As Boolean = False
    Dim drawMode As Integer = 0

    Dim oldPen As New Pen(Color.Red, 1)
    Dim movePen As New Pen(Color.Aqua, 1)
    Dim zoomPen As New Pen(Color.Black, 1)
    Dim dashOffset As Integer = 0

    Dim stationaryCount As Integer = 0
    Dim stationaryRequire As Integer = 10

    Dim savedImage As System.Drawing.Drawing2D.GraphicsState
#End Region
#Region "Map Variables"
    Dim oldMapBytes() As Byte
    Public mapBytes() As Byte
    Public realMapName As String = ""
    Dim mapMagic As Double

    Public TagClass() As String
    Public TagID() As Double
    Public TagOffset() As Double
    Public TagMetaSize() As Double
    Public TagName() As String

    Public TagCount As Integer
    Public RealTagOff As Double
    Public RealTagCount As Integer
    Public EndTagOff As Double
    Public rtagcount As Integer

    Dim etagoff As Double
    Dim rtagoff As Double
    Dim indexheader As Double

    Dim ScnrOffset As Double
    Dim ScnrSize As Double
    Dim ScnrIndexOff As Double
    Dim SbspIndexOff As Double

    Dim BSPHeadOffset As Double
    Dim BSPOffset As Double
    Dim BSPSize As Double
    Dim BSPMagic As Double

    Dim sbspmeshheadoff As Double
    Dim sbspmeshcount As Double
    Public firstMeshVertex As Double

    Dim BSPMeshOffs() As Double
    Dim BSPMeshSize() As Double
    Dim BSPVertOff() As Double
    Dim BSPIndiOff() As Double
    Dim BSPVertSiz() As Double
    Dim BSPIndiSiz() As Double

    Dim collOffset(10000) As Double
    Dim collX(10000) As Double
    Dim collY(10000) As Double
    Dim collZ(10000) As Double
    Dim collectionCount As Integer

    Dim tstart, tdata, tend As Double
#End Region
#Region "Point Variables"
    Public xval() As Single
    Public yval() As Single
    Public zval() As Single
    Public meshID() As Integer

    Public pointCount As Integer = 0
    Dim maxVertices As Integer = 100000

    Public lowestx As Double = 0
    Public lowesty As Double = 0
    Public highestx As Double = 0
    Public highesty As Double = 0
    Public lowestz As Double = 0
    Public highestz As Double = 0

    Dim firstPoint As Point = New Point(-Me.Width, -Me.Height)
    Dim secondPoint As Point = New Point(-Me.Width, -Me.Height)
    Dim lastPoint As Point = New Point(-Me.Width, -Me.Height)
    Dim oldFirst As Point = New Point(-Me.Width, -Me.Height)
    Dim oldSecond As Point = New Point(-Me.Width, -Me.Height)
#End Region
#Region "Program Variables"
    Public pointEditorOpen As Boolean = False
    Public loading As Boolean = True
    Public moveWidth As Integer = 12
    Public moveHeight As Integer = 12
    Dim formBorderTop As Integer = 26
    Dim edgeSpace As Integer = 4
    Dim vbQuote As String = Chr(34)

    Public programFiles As String = Environment.GetFolderPath(Environment.SpecialFolder.ProgramFiles)
    Public companyFolder As String = "\" & My.Application.Info.CompanyName
    Public programFolder As String = "\" & My.Application.Info.Title
    Public settingsFile As String = programFiles & companyFolder & programFolder & "\settings.ini"
    Public defaultSettings() As Byte

    Public comboDrawType As Integer = 0
    Public comboDrawMode As Integer = 0
    Public comboPrecision As Integer = 0
    Public comboDoubleClick As Integer = 0

    Dim loggedIn As Boolean = True
#End Region
    'End declaring initial variables.

    'Begin program functions and programming.
#Region "formMain: Main Form Functions"
    Private Sub formMain_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Click
        If (loggedIn = True) Then Exit Sub
        lblLeakProtection.Visible = True
        toolTop.Enabled = False
        toolSide.Enabled = False
        contextMain.Enabled = False
        For i As Integer = 0 To 10000
            formGraphics.DrawLine(New Pen(randomColor()), Rnd() * My.Computer.Screen.WorkingArea.Width, Rnd() * My.Computer.Screen.WorkingArea.Height, Rnd() * My.Computer.Screen.WorkingArea.Width, Rnd() * My.Computer.Screen.WorkingArea.Height)
        Next
        Dim leakFont As Font = New Font(New FontFamily("Courier New"), 32, FontStyle.Bold, GraphicsUnit.Pixel)
        formGraphics.DrawString("Sorry, you're not on the list.", leakFont, Brushes.Black, 100, 100)
        Dim hexname As String = ""
        Dim hexdesktop As String = ""
        For i As Integer = 1 To My.Computer.Name.Length
            hexname = hexname & Hex(Asc(Mid(My.Computer.Name, i, 1)))
        Next
        For i As Integer = 1 To Environment.GetFolderPath(Environment.SpecialFolder.Desktop).Length
            hexdesktop = hexdesktop & Hex(Asc(Mid(Environment.GetFolderPath(Environment.SpecialFolder.Desktop), i, 1)))
        Next

        My.Computer.Clipboard.SetText("Beta Request|" & hexname & "|" & hexdesktop)
        MsgBox("Message " & vbQuote & "TheWandererBot" & vbQuote & " with the message " & vbQuote & "!beta" & vbQuote & " and follow his instructions if you want to get on the list.")
        loggedIn = False
        Exit Sub
loggedIn:
        toolTop.Enabled = True
        toolSide.Enabled = True
        contextMain.Enabled = True
    End Sub
    Private Sub formMain_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
        formGraphics = Me.CreateGraphics()
        toolComboDrawMode.SelectedIndex = 0
        toolComboDrawType.SelectedIndex = 0
        toolComboPrecision.SelectedIndex = 0
        testDirectories()
        loadSettings()
        loading = False

        loggedIn = True
    End Sub
    Private Sub formMain_KeyDown(ByVal sender As Object, ByVal e As System.Windows.Forms.KeyEventArgs) Handles Me.KeyDown
        keyboardMove(e)
    End Sub
    Private Sub formMain_FormClosing(ByVal sender As Object, ByVal e As System.Windows.Forms.FormClosingEventArgs) Handles Me.FormClosing
        myPen.Dispose()
        formGraphics.Dispose()
        saveSettings()
    End Sub
    Private Sub formMain_Resize(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Resize
        trackSoftness.Width = Me.Width - 8 - toolSide.Width
        trackSoftness.Location = New Point(toolSide.Width, Me.Height - 34 - statusMain.Height - trackSoftness.Height)
        lblSoftness.Location = New Point((Me.Width / 2) - (lblSoftness.Width / 2), trackSoftness.Location.Y + 30)
    End Sub
#End Region

#Region "Map and BSP Functions"
    Private Function getMagic(ByVal mapName As String) As Integer
        Try
            Dim indexheader As Double
            Dim indexmagic As Double
            Dim ntemp As Double

            Dim fileName As String = mapName
            Dim SizeOfFile As Double = My.Computer.FileSystem.GetFileInfo(mapName).Length() - 1

            ReDim mapBytes(0 To SizeOfFile - 1)

            Try
                mapBytes = My.Computer.FileSystem.ReadAllBytes(mapName)
                oldMapBytes = mapBytes
            Catch ex As Exception
                showError(ex, "(System Out of Memory)")
            End Try

            realMapName = ""
            For i As Integer = 0 To 32
                If (mapBytes(408 + i) <> 0) Then realMapName = realMapName + Chr(mapBytes(408 + i))
            Next i

            indexheader = Load4Hex(16, True)
            indexmagic = Load4Hex(indexheader, True) - (Load4Hex(16, True) + 32)
            ntemp = Load4Hex((Load4Hex(indexheader + 8, True) - indexmagic) + 8, True) - (indexheader + Load4Hex(20, True))
            Return ntemp
        Catch ex As Exception
            showError(ex, "(" & mapName & ")")
        End Try
    End Function
    Private Function Load4Hex(ByVal offset As Integer, ByVal Endian As Boolean) As Double
        Dim tmp1 As String = Hex(mapBytes(offset + 0))
        Dim tmp2 As String = Hex(mapBytes(offset + 1))
        Dim tmp3 As String = Hex(mapBytes(offset + 2))
        Dim tmp4 As String = Hex(mapBytes(offset + 3))
        If Len(tmp1) = 1 Then tmp1 = "0" + tmp1
        If Len(tmp2) = 1 Then tmp2 = "0" + tmp2
        If Len(tmp3) = 1 Then tmp3 = "0" + tmp3
        If Len(tmp4) = 1 Then tmp4 = "0" + tmp4
        Dim tmp5 As String = ""
        If Endian = True Then
            tmp5 = tmp4 & tmp3 & tmp2 & tmp1
        Else
            tmp5 = tmp1 & tmp2 & tmp3 & tmp4
        End If
        Return CDbl("&H" & tmp5)
    End Function
    Private Function Load4String(ByRef offset As Integer, ByVal Endian As Boolean) As String
        Dim tmp1 As String = Chr(mapBytes(offset + 0))
        Dim tmp2 As String = Chr(mapBytes(offset + 1))
        Dim tmp3 As String = Chr(mapBytes(offset + 2))
        Dim tmp4 As String = Chr(mapBytes(offset + 3))
        Dim tmp5 As String
        If Endian = True Then
            tmp5 = tmp4 + tmp3 + tmp2 + tmp1
        Else
            tmp5 = tmp1 + tmp2 + tmp3 + tmp4
        End If
        Return tmp5
    End Function
    Private Sub getBSPOffset()
        Try
            Dim sbspheadoff As Double
            sbspheadoff = Load4Hex(ScnrOffset + 532, True) - mapMagic
            BSPOffset = Load4Hex(sbspheadoff, True)
            BSPSize = Load4Hex(sbspheadoff + 4, True)
            BSPMagic = Load4Hex(sbspheadoff + 8, True)

            tdata = Load4Hex(BSPOffset + 40, True) - BSPMagic
            tstart = Load4Hex(BSPOffset + tdata + 60, True) - BSPMagic
            tstart = tstart + BSPOffset
            tend = tstart + (Load4Hex(BSPOffset + tdata + 56, True) * 16)
        Catch ex As Exception
            showError(ex, "(BSP Offset Error)")
        End Try
    End Sub
    Public Sub getAllTags()
        Try
            TagCount = Load4Hex(indexheader + 4, True)
            RealTagOff = indexheader + 32 + TagCount * 12
            RealTagCount = Load4Hex(indexheader + 24, True)
            EndTagOff = RealTagOff + RealTagCount * 16
            rtagcount = RealTagCount

            ReDim TagClass(0 To rtagcount + 1)
            ReDim TagID(0 To rtagcount + 1)
            ReDim TagOffset(0 To rtagcount + 1)
            ReDim TagMetaSize(0 To rtagcount + 1)
            ReDim TagName(0 To rtagcount + 1)

            Dim j As Integer = 0
            For i As Double = RealTagOff To EndTagOff - 1 Step 16
                TagClass(j) = Load4String(i + 0, True)
                TagID(j) = Load4Hex(i + 4, True)
                TagOffset(j) = Load4Hex(i + 8, True) - mapMagic
                TagMetaSize(j) = Load4Hex(i + 12, True)
                j = j + 1
            Next i
        Catch ex As Exception
            showError(ex, "(Error Loading All Tags)")
        End Try
    End Sub
#End Region
#Region "Type Conversion Functions"
#Region "    Private Sub CopyMemoryMKS/CopyMemoryCVS"
    Private Declare Sub CopyMemoryMKS Lib "Kernel32" Alias "RtlMoveMemory" _
        (ByVal hDest As String, ByRef hSource As Single, _
        ByVal iBytes As Integer)
    Private Declare Sub CopyMemoryCVS Lib "Kernel32" Alias "RtlMoveMemory" _
        (ByRef hDest As Single, ByVal hSource As String, _
        ByVal iBytes As Integer)
#End Region
    Shared Function convertToString(ByRef Value As Single) As String
        Dim sTemp As String = Space(4)
        CopyMemoryMKS(sTemp, Value, 4I)
        Return sTemp
    End Function
    Shared Function convertToSingle(ByRef Argument As String) As Single
        Dim sTemp As Single = 0.0F
        If (Len(Argument) <> 4) Then
            Return Single.NaN
        End If
        CopyMemoryCVS(sTemp, Argument, 4I)
        Return sTemp
    End Function
    Private Function convertToHex(ByVal Text As String)
        Dim temp1, temp2, temp3, temp4 As String
        temp1 = Mid(Text, 1, 1)
        temp2 = Mid(Text, 2, 1)
        temp3 = Mid(Text, 3, 1)
        temp4 = Mid(Text, 4, 1)

        temp1 = Hex(Asc(temp1))
        temp2 = Hex(Asc(temp2))
        temp3 = Hex(Asc(temp3))
        temp4 = Hex(Asc(temp4))

        Return temp1 & temp2 & temp3 & temp4
    End Function

    Public Function BoolToInt(ByVal Bool As Boolean) As Integer
        If (Bool = True) Then
            Return 1
        ElseIf (Bool = False) Then
            Return 0
        Else
            Return 0
        End If
    End Function
    Public Function IntToBool(ByVal Int As Integer) As Boolean
        If (Int = 1) Then
            Return True
        ElseIf (Int = 0) Then
            Return False
        Else
            Return False
        End If
    End Function
#End Region

#Region "Open and Save Map Button Activators"
    Private Sub anyBtnOpenMap_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles conBtnOpenMap.Click, menuBtnOpenMap.Click
        If (openFileMap.ShowDialog() = Windows.Forms.DialogResult.OK) Then
            openMap(openFileMap.FileName)
            redraw(True, True)
        End If
    End Sub
    Private Sub anyBtnSaveMapAs_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles conBtnSaveMapAs.Click, menuBtnSaveMapAs.Click
        If (saveFileMap.ShowDialog() = Windows.Forms.DialogResult.OK) Then
            saveMap(saveFileMap.FileName)
            If Not (mapBytes Is Nothing) Then
                MsgBox("Successfully saved map " & _
                    vbQuote & Mid(saveFileMap.FileName, saveFileMap.FileName.LastIndexOf("\") + 2, saveFileMap.FileName.LastIndexOf(".") - saveFileMap.FileName.LastIndexOf("\") - 1) & vbQuote & _
                    ".", MsgBoxStyle.Exclamation, "Successfully Saved Map")
            End If
        End If
    End Sub
    Private Sub anyBtnSaveMap_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles conBtnSaveMap.Click, menuBtnSaveMap.Click
        If (openFileMap.FileName <> "") Then
            saveMap(openFileMap.FileName)
            If Not (mapBytes Is Nothing) Then
                MsgBox("Successfully saved map " & _
                vbQuote & Mid(openFileMap.FileName, openFileMap.FileName.LastIndexOf("\") + 2, openFileMap.FileName.LastIndexOf(".") - openFileMap.FileName.LastIndexOf("\") - 1) & vbQuote & _
                ".", MsgBoxStyle.Exclamation, "Successfully Saved Map")
            End If
        Else
            If (saveFileMap.ShowDialog() = Windows.Forms.DialogResult.OK) Then
                saveMap(saveFileMap.FileName)
                If Not (mapBytes Is Nothing) Then
                    MsgBox("Successfully saved map " & _
                    vbQuote & Mid(saveFileMap.FileName, saveFileMap.FileName.LastIndexOf("\") + 2, saveFileMap.FileName.LastIndexOf(".") - saveFileMap.FileName.LastIndexOf("\") - 1) & vbQuote & _
                    ".", MsgBoxStyle.Exclamation, "Successfully Saved Map")
                End If
            End If
        End If
    End Sub

    Private Sub menuBtnOpenMesh_Click(ByVal sender As System.Object, ByVal e As System.EventArgs)
        If (openFileOBJ.ShowDialog() = Windows.Forms.DialogResult.OK) Then
            openMesh(openFileOBJ.FileName)
            redraw(True, True)
        End If
    End Sub

    Private Sub anyBtnOpenCollision_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnOpenCollision.Click
        If (openFileOBJ.ShowDialog = Windows.Forms.DialogResult.OK) Then
            openCollision(openFileOBJ.FileName)
            redraw(True, True)
        End If
    End Sub
    Private Sub anyBtnSaveCollisionAs_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnSaveCollisionAs.Click
        If (saveFileOBJ.ShowDialog() = Windows.Forms.DialogResult.OK) Then
            saveCollision(saveFileOBJ.FileName)
            If Not (xval Is Nothing) Then
                MsgBox("Successfully saved " & CStr(pointCount) & " vertices to .obj file." & vbCrLf & _
                    saveFileOBJ.FileName, MsgBoxStyle.Exclamation, "Successfully Saved Collision")
            End If
        End If
    End Sub
    Private Sub anyBtnSaveCollision_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnSaveCollision.Click
        If (openFileOBJ.FileName <> "") Then
            saveCollision(openFileOBJ.FileName)
            If Not (xval Is Nothing) Then
                MsgBox("Successfully saved " & CStr(pointCount) & " vertices to .obj file." & vbCrLf & _
                    openFileOBJ.FileName, MsgBoxStyle.Exclamation, "Successfully Saved Collision")
            End If
        Else
            If (saveFileOBJ.ShowDialog() = Windows.Forms.DialogResult.OK) Then
                saveCollision(saveFileOBJ.FileName)
                If Not (xval Is Nothing) Then
                    MsgBox("Successfully saved " & CStr(pointCount) & " vertices to .obj file." & vbCrLf & _
                    saveFileOBJ.FileName, MsgBoxStyle.Exclamation, "Successfully Saved Collision")
                End If
            End If
        End If
    End Sub
#End Region
#Region "Open and Save Map/Collision Functions"
    Public Sub openMap(ByVal FileName As String)
        Try
            'Adjusts all variables back to their default values.
            ReDim xval(maxVertices - 1)
            ReDim yval(maxVertices - 1)
            ReDim zval(maxVertices - 1)
            ReDim meshID(maxVertices - 1)
            For c As Integer = 0 To maxVertices - 1
                xval(c) = Nothing
                yval(c) = Nothing
                zval(c) = Nothing
                meshID(c) = Nothing
            Next
            pointCount = 0
            formPoints.listPoints.Items.Clear()
            'Begins reading the map
            mapMagic = getMagic(FileName)
            indexheader = Load4Hex(16, True)

            TagCount = Load4Hex(indexheader + 4, True)
            rtagoff = indexheader + 32 + TagCount * 12
            rtagcount = Load4Hex(indexheader + 24, True)
            etagoff = rtagoff + rtagcount * 16

            ReDim TagClass(0 To rtagcount + 1)
            ReDim TagID(0 To rtagcount + 1)
            ReDim TagOffset(0 To rtagcount + 1)
            ReDim TagMetaSize(0 To rtagcount + 1)

            For i As Integer = rtagoff To etagoff Step 4
                Dim tmp1 As String = Load4String(i, True)
                If LCase(tmp1) = "scnr" Then
                    ScnrIndexOff = i
                ElseIf LCase(tmp1) = "sbsp" Then
                    SbspIndexOff = i
                End If
            Next i

            ScnrSize = Load4Hex(ScnrIndexOff + 12, True)
            ScnrOffset = Load4Hex(ScnrIndexOff + 8, True) - mapMagic

            getAllTags()
            getBSPOffset()

            Dim currentType As String = "x"
            pointCount = 0
            For i As Double = tstart To tend Step 4
                If (currentType = "x") Then
                    xval(pointCount) = convertToSingle(Chr(mapBytes(i)) & Chr(mapBytes(i + 1)) & Chr(mapBytes(i + 2)) & Chr(mapBytes(i + 3)))
                    currentType = "y"
                    GoTo GotPoint
                End If
                If (currentType = "y") Then
                    yval(pointCount) = convertToSingle(Chr(mapBytes(i)) & Chr(mapBytes(i + 1)) & Chr(mapBytes(i + 2)) & Chr(mapBytes(i + 3)))
                    currentType = "z"
                    GoTo GotPoint
                End If
                If (currentType = "z") Then
                    zval(pointCount) = convertToSingle(Chr(mapBytes(i)) & Chr(mapBytes(i + 1)) & Chr(mapBytes(i + 2)) & Chr(mapBytes(i + 3)))
                    currentType = "p"
                    GoTo GotPoint
                End If
                If (currentType = "p") Then
                    formPoints.listPoints.Items.Add(CStr(pointCount) & ":  X:" & CStr(xval(pointCount)) & " Y:" & CStr(yval(pointCount)) & " Z:" & CStr(zval(pointCount)))
                    pointCount = pointCount + 1
                    currentType = "x"
                    GoTo GotPoint
                End If
GotPoint:
            Next

            lowestx = 0
            lowesty = 0
            lowestz = 0
            highestx = 0
            highesty = 0
            highestz = 0
            For i As Double = 0 To pointCount - 1
                If (lowestx > xval(i)) Then lowestx = xval(i)
                If (lowesty > yval(i)) Then lowesty = yval(i)
                If (lowestz > zval(i)) Then lowestz = zval(i)

                If (highestx < xval(i)) Then highestx = xval(i)
                If (highesty < yval(i)) Then highesty = yval(i)
                If (highestz < zval(i)) Then highestz = zval(i)
            Next

            'Finished loading collision of the map.

            firstMeshVertex = pointCount

            sbspmeshcount = Load4Hex(BSPOffset + 172, True)
            sbspmeshheadoff = Load4Hex(BSPOffset + 176, True) - BSPMagic

            ReDim BSPMeshOffs(0 To sbspmeshcount)
            ReDim BSPMeshSize(0 To sbspmeshcount)
            ReDim BSPVertOff(0 To sbspmeshcount)
            ReDim BSPIndiOff(0 To sbspmeshcount)
            ReDim BSPVertSiz(0 To sbspmeshcount)
            ReDim BSPIndiSiz(0 To sbspmeshcount)

            Dim k As Integer, s As Integer = 0

            For i As Integer = 0 To sbspmeshcount * 176 Step 176
                'DoMyEventser 
                BSPMeshOffs(k) = Load4Hex(sbspmeshheadoff + BSPOffset + i + 40, True)
                BSPMeshSize(k) = Load4Hex(sbspmeshheadoff + BSPOffset + i + 44, True)
                k = k + 1
            Next i

            For i As Integer = 0 To sbspmeshcount
                'DoMyEvents
                For j As Integer = BSPMeshOffs(i) To BSPMeshOffs(i) + BSPMeshSize(i) - 5 Step 4
                    'DoMyEvents
                    If Load4Hex(j, True) = 1920168547 Then
                        s = s + 1
                        If s = 3 Then
                            BSPIndiOff(i) = j + 4
                        ElseIf s = 4 Then
                            BSPIndiSiz(i) = j - BSPIndiOff(i)
                        ElseIf s = 7 Then
                            BSPVertOff(i) = j + 4
                        ElseIf s = 8 Then
                            BSPVertSiz(i) = j - BSPVertOff(i)
                        End If
                    End If
                Next j
                s = 0
            Next i

            Dim tcount As Integer = 0
            Dim currentPoint As Double = firstMeshVertex
            For i As Integer = 0 To sbspmeshcount
                tcount = 0
                For j As Double = BSPVertOff(i) To BSPVertOff(i) + BSPVertSiz(i)
                    tcount = tcount + 1

                    If (tcount = 1) Then
                        xval(currentPoint) = convertToSingle(Chr(mapBytes(j)) & Chr(mapBytes(j + 1)) & Chr(mapBytes(j + 2)) & Chr(mapBytes(j + 3)))
                    End If
                    If (tcount = 5) Then
                        yval(currentPoint) = convertToSingle(Chr(mapBytes(j)) & Chr(mapBytes(j + 1)) & Chr(mapBytes(j + 2)) & Chr(mapBytes(j + 3)))
                    End If
                    If tcount = 9 Then
                        zval(currentPoint) = convertToSingle(Chr(mapBytes(j)) & Chr(mapBytes(j + 1)) & Chr(mapBytes(j + 2)) & Chr(mapBytes(j + 3)))
                    End If

                    If (tcount = 12) Then
                        meshID(currentPoint) = i
                        currentPoint = currentPoint + 1
                        pointCount = pointCount + 1
                        tcount = 0
                    End If
                Next j
            Next i

            'Finished loading visual mesh of the map.

            offset = New Point(Math.Abs(lowestx) + toolSide.Width + edgeSpace, Math.Abs(lowesty) + formBorderTop + edgeSpace)

            zoomx = Me.Width / (offset.X + highestx + toolSide.Width + 8)
            zoomy = Me.Height / (offset.Y + highesty + formBorderTop)
            oldZoomx = zoomx
            oldZoomy = zoomy
            oldOffset = offset
            statusLblZoom.Text = "Zoom: " & CStr(zoomx) & " X " & CStr(zoomy)
            'Draw the cross that marks the offset
            formGraphics.DrawLine(Pens.Red, offset.X, 0, offset.X, Me.Height)
            formGraphics.DrawLine(Pens.Red, 0, offset.Y, Me.Width, offset.Y)

            formAdvanced.refreshMapInfo("Map", pointCount)
            fileChange("Map")
            getAllTags()
        Catch ex As Exception
            showError(ex, "(" & FileName & ")")
        End Try
    End Sub
    Public Sub saveMap(ByVal FileName As String)
        Try
            If (mapBytes Is Nothing) Then
                MsgBox("Cannot create map from scratch, you must first open a map.")
            Else
                Dim currentType As String = "x"
                Dim pointer As Double = 0
                For i As Double = 0 To firstMeshVertex - 1
                    mapBytes(tstart + (i * 16) + 0) = CByte(Asc(Mid(convertToString(xval(i)), 1, 1)))
                    mapBytes(tstart + (i * 16) + 1) = CByte(Asc(Mid(convertToString(xval(i)), 2, 1)))
                    mapBytes(tstart + (i * 16) + 2) = CByte(Asc(Mid(convertToString(xval(i)), 3, 1)))
                    mapBytes(tstart + (i * 16) + 3) = CByte(Asc(Mid(convertToString(xval(i)), 4, 1)))

                    mapBytes(tstart + (i * 16) + 4) = CByte(Asc(Mid(convertToString(yval(i)), 1, 1)))
                    mapBytes(tstart + (i * 16) + 5) = CByte(Asc(Mid(convertToString(yval(i)), 2, 1)))
                    mapBytes(tstart + (i * 16) + 6) = CByte(Asc(Mid(convertToString(yval(i)), 3, 1)))
                    mapBytes(tstart + (i * 16) + 7) = CByte(Asc(Mid(convertToString(yval(i)), 4, 1)))

                    mapBytes(tstart + (i * 16) + 8) = CByte(Asc(Mid(convertToString(zval(i)), 1, 1)))
                    mapBytes(tstart + (i * 16) + 9) = CByte(Asc(Mid(convertToString(zval(i)), 2, 1)))
                    mapBytes(tstart + (i * 16) + 10) = CByte(Asc(Mid(convertToString(zval(i)), 3, 1)))
                    mapBytes(tstart + (i * 16) + 11) = CByte(Asc(Mid(convertToString(zval(i)), 4, 1)))
                    pointer = pointer + 1
                Next
                'Finished saving collision of the map

                If (pointer <> firstMeshVertex) Then
                    MsgBox("You managed to do something seriously wrong. Collision points have either been deleted or added. This map cannot be save due to this error. Please reload the map if you wish to save any further progress.", MsgBoxStyle.Critical, "Error: Unexpected Collision/Mesh Points")
                    GoTo stopSaving
                End If

                'MsgBox("Stopped saving the map early. BSP Mesh injecting has not yet been implemented into the program.")

                'Will save the Y and Z coordinates of the mesh, because X is messed up.

                Dim tcount As Integer = 0
                Dim currentPoint As Double = firstMeshVertex
                Dim valString As String = ""
                For i As Integer = 0 To sbspmeshcount
                    tcount = 0
                    For j As Double = BSPVertOff(i) To BSPVertOff(i) + BSPVertSiz(i)
                        tcount = tcount + 1

                        If (tcount = 1) Then
                            'valString = convertToString(xval(currentPoint))
                            'mapBytes(j) = Asc(Mid(valString, 1, 1))
                            'mapBytes(j + 1) = Asc(Mid(valString, 2, 1))
                            'mapBytes(j + 2) = Asc(Mid(valString, 3, 1))
                            'mapBytes(j + 3) = Asc(Mid(valString, 4, 1))
                        End If
                        If (tcount = 5) Then
                            valString = convertToString(yval(currentPoint))
                            mapBytes(j) = Asc(Mid(valString, 1, 1))
                            mapBytes(j + 1) = Asc(Mid(valString, 2, 1))
                            mapBytes(j + 2) = Asc(Mid(valString, 3, 1))
                            mapBytes(j + 3) = Asc(Mid(valString, 4, 1))
                        End If
                        If (tcount = 9) Then
                            valString = convertToString(zval(currentPoint))
                            mapBytes(j) = Asc(Mid(valString, 1, 1))
                            mapBytes(j + 1) = Asc(Mid(valString, 2, 1))
                            mapBytes(j + 2) = Asc(Mid(valString, 3, 1))
                            mapBytes(j + 3) = Asc(Mid(valString, 4, 1))
                            'MsgBox("Z Coord " & currentPoint & " at 0x" & Hex(j) & vbCrLf & "Look for these values:" & vbCrLf & vbCrLf & _
                            '"X: " & Hex(Asc(Mid(convertToString(xval(currentPoint)), 1, 1))) & " " & Hex(Asc(Mid(convertToString(xval(currentPoint)), 2, 1))) & " " & Hex(Asc(Mid(convertToString(xval(currentPoint)), 3, 1))) & " " & Hex(Asc(Mid(convertToString(xval(currentPoint)), 4, 1))) & " " & vbCrLf & _
                            '"Y: " & Hex(Asc(Mid(convertToString(yval(currentPoint)), 1, 1))) & " " & Hex(Asc(Mid(convertToString(yval(currentPoint)), 2, 1))) & " " & Hex(Asc(Mid(convertToString(yval(currentPoint)), 3, 1))) & " " & Hex(Asc(Mid(convertToString(yval(currentPoint)), 4, 1))) & " " & vbCrLf & _
                            '"Z: " & Hex(Asc(Mid(convertToString(zval(currentPoint)), 1, 1))) & " " & Hex(Asc(Mid(convertToString(zval(currentPoint)), 2, 1))) & " " & Hex(Asc(Mid(convertToString(zval(currentPoint)), 3, 1))) & " " & Hex(Asc(Mid(convertToString(zval(currentPoint)), 4, 1))) & " " & vbCrLf & _
                            'vbCrLf & "^^^^^^^^^^^^^^^^^^^^^")
                        End If

                        If (tcount = 12) Then
                            currentPoint = currentPoint + 1
                            pointer = pointer + 1
                            tcount = 0
                        End If
                    Next
                Next
finishSaving:
                tcount = 0
                currentPoint = 0
                valString = ""
                My.Computer.FileSystem.WriteAllBytes(FileName, mapBytes, False)
stopSaving:
            End If
        Catch ex As Exception
            showError(ex, "(" & FileName & ")")
        End Try
    End Sub
    Public Sub openCollision(ByVal FileName As String)
        Try
            Dim file As String = My.Computer.FileSystem.ReadAllText(FileName)
            Dim comment As Boolean = False

            ReDim xval(maxVertices - 1)
            ReDim yval(maxVertices - 1)
            ReDim zval(maxVertices - 1)

            For c As Integer = 0 To maxVertices - 1
                xval(c) = Nothing
                yval(c) = Nothing
                zval(c) = Nothing
            Next
            pointCount = 0
            formPoints.listPoints.Items.Clear()

            Dim readx As Boolean = False
            Dim ready As Boolean = False
            Dim readz As Boolean = False
            Dim stringx As String = ""
            Dim stringy As String = ""
            Dim stringz As String = ""

            statusProgMain.Visible = True
            statusProgMain.Value = 0
            statusProgMain.Maximum = file.Length
            formGraphics.Clear(Color.White)
            Dim i As Integer = 1
            lowestx = 0
            lowesty = 0
            lowestz = 0
            highestx = 0
            highesty = 0
            highestz = 0
            While (i < file.Length)
                If (Mid(file, i, 1) = "#") Then comment = True
                If (Mid(file, i, 2) = "v ") Then
                    comment = False
                    readx = True
                    i = i + 2
                End If
                If (readx = True) Then
                    If (Mid(file, i, 1) = " " And stringx <> "") Then
                        readx = False
                        ready = True
                        i = i + 1
                    Else
                        stringx = stringx & Mid(file, i, 1)
                    End If
                End If
                If (ready = True) Then
                    If (Mid(file, i, 1) = " " And stringy <> "") Then
                        ready = False
                        readz = True
                        i = i + 1
                    Else
                        stringy = stringy & Mid(file, i, 1)
                    End If
                End If
                If (readz = True) Then
                    If (Mid(file, i, 1) = vbCr) Then
                        readz = False
                        xval(pointCount) = CDbl(stringx)
                        yval(pointCount) = CDbl(stringy)
                        zval(pointCount) = CDbl(stringz)

                        formPoints.listPoints.Items.Add(CStr(pointCount) & ":  X:" & CStr(xval(pointCount)) & " Y:" & CStr(yval(pointCount)) & " Z:" & CStr(zval(pointCount)))

                        If (lowestx > xval(pointCount)) Then lowestx = xval(pointCount)
                        If (lowesty > yval(pointCount)) Then lowesty = yval(pointCount)
                        If (lowestz > zval(pointCount)) Then lowestz = zval(pointCount)
                        If (highestx < xval(pointCount)) Then highestx = xval(pointCount)
                        If (highesty < yval(pointCount)) Then highesty = yval(pointCount)
                        If (highestz < zval(pointCount)) Then highestz = zval(pointCount)
                        offset = New Point(Math.Abs(lowestx) + edgeSpace, Math.Abs(lowesty) + formBorderTop + edgeSpace)

                        pointCount = pointCount + 1
                        stringx = ""
                        stringy = ""
                        stringz = ""

                        statusProgMain.Value = i
                    Else
                        stringz = stringz & Mid(file, i, 1)
                    End If
                End If
                i = i + 1
            End While
            statusProgMain.Visible = False
            statusLblOffset.Text = "Offset: (" & CStr(offset.X) & "," & CStr(offset.Y) & ")"
            statusLblMin.Text = "Min: (" & CStr(lowestx) & "," & CStr(lowesty) & ")"
            statusLblMax.Text = "Max: (" & CStr(highestx) & "," & CStr(highesty) & ")"
            zoomx = Me.Width / (offset.X + highestx + 8)
            zoomy = Me.Height / (offset.Y + highesty + formBorderTop)
            oldZoomx = zoomx
            oldZoomy = zoomy
            oldOffset = offset
            statusLblZoom.Text = "Zoom: " & CStr(zoomx) & " X " & CStr(zoomy)
            'Draw the cross that marks the offset
            formGraphics.DrawLine(Pens.Red, offset.X, 0, offset.X, Me.Height)
            formGraphics.DrawLine(Pens.Red, 0, offset.Y, Me.Width, offset.Y)

            For c As Integer = 0 To xval.Length
                If (xval(pointCount) = Nothing Or yval(pointCount) = Nothing) Then GoTo endOfPoints
            Next
endOfPoints:
            firstMeshVertex = pointCount
            formAdvanced.refreshMapInfo("Collision", pointCount)
            fileChange("Collision")
            redraw(True, True)
        Catch ex As Exception
            showError(ex, "(" & FileName & ")")
        End Try
    End Sub
    Public Sub saveCollision(ByVal FileName As String)
        Try
            If (pointCount = 0) Then
                MsgBox("You must first open a map or a collision file.")
            Else
                Dim objString As String = ""
                objString = "#Saved by BSP Master"
                objString = objString & vbCrLf & "#Program created by TheWandererLee"
                objString = objString & vbCrLf & "#" & CStr(pointCount) & " vertices saved at " & CStr(My.Computer.Clock.LocalTime.Month) & "/" & CStr(My.Computer.Clock.LocalTime.Day) & "/" & CStr(My.Computer.Clock.LocalTime.Year) & " - " & CStr(My.Computer.Clock.LocalTime.Hour) & ":" & CStr(My.Computer.Clock.LocalTime.Minute) & ":" & CStr(My.Computer.Clock.LocalTime.Second) & vbCrLf
                For i As Integer = 0 To firstMeshVertex - 1
                    objString = objString & "v " & CStr(xval(i)) & " " & CStr(yval(i)) & " " & CStr(zval(i)) & vbCrLf
                Next
                My.Computer.FileSystem.WriteAllText(FileName, objString, False)
            End If
        Catch ex As Exception
            showError(ex, "(" & FileName & ")")
        End Try
    End Sub
    Public Sub openMesh(ByVal FileName As String)
        'Try
        Dim file As String = My.Computer.FileSystem.ReadAllText(FileName).ToLower
        Dim comment As Boolean = False
        Dim currentNumber As Integer = 0

        ReDim xval(maxVertices - 1)
        ReDim yval(maxVertices - 1)
        ReDim zval(maxVertices - 1)
        ReDim meshID(maxVertices - 1)

        For c As Integer = 0 To maxVertices - 1
            xval(c) = Nothing
            yval(c) = Nothing
            zval(c) = Nothing
            meshID(c) = Nothing
        Next
        pointCount = 0
        firstMeshVertex = 0
        formPoints.listPoints.Items.Clear()

        Dim readx As Boolean = False
        Dim ready As Boolean = False
        Dim readz As Boolean = False
        Dim stringx As String = ""
        Dim stringy As String = ""
        Dim stringz As String = ""

        statusProgMain.Visible = True
        statusProgMain.Value = 0
        statusProgMain.Maximum = file.Length
        formGraphics.Clear(Color.White)
        Dim i As Integer = 1
        lowestx = 0
        lowesty = 0
        lowestz = 0
        highestx = 0
        highesty = 0
        highestz = 0
        While (i < file.Length)
            If (Mid(file, i, 1) = "#") Then comment = True
            If (Mid(file, i, 12) = "g meshobject") Then
                Try
                    MsgBox(Mid(file, i + 12, 5))
                    currentNumber = CInt(Mid(file, i + 12, 5))
                Catch ex As Exception
                    '.OBJ file is not configured correctly
                End Try
            End If
            If (Mid(file, i, 2) = "v ") Then
                comment = False
                readx = True
                i = i + 2
            End If
            If (readx = True) Then
                If (Mid(file, i, 1) = " " And stringx <> "") Then
                    readx = False
                    ready = True
                    i = i + 1
                Else
                    stringx = stringx & Mid(file, i, 1)
                End If
            End If
            If (ready = True) Then
                If (Mid(file, i, 1) = " " And stringy <> "") Then
                    ready = False
                    readz = True
                    i = i + 1
                Else
                    stringy = stringy & Mid(file, i, 1)
                End If
            End If
            If (readz = True) Then
                If (Mid(file, i, 1) = vbCr) Then
                    readz = False
                    xval(pointCount) = CDbl(stringx)
                    yval(pointCount) = CDbl(stringy)
                    zval(pointCount) = CDbl(stringz)
                    meshID(pointCount) = currentNumber

                    formPoints.listPoints.Items.Add(CStr(pointCount) & ":  X:" & CStr(xval(pointCount)) & " Y:" & CStr(yval(pointCount)) & " Z:" & CStr(zval(pointCount)))

                    If (lowestx > xval(pointCount)) Then lowestx = xval(pointCount)
                    If (lowesty > yval(pointCount)) Then lowesty = yval(pointCount)
                    If (lowestz > zval(pointCount)) Then lowestz = zval(pointCount)
                    If (highestx < xval(pointCount)) Then highestx = xval(pointCount)
                    If (highesty < yval(pointCount)) Then highesty = yval(pointCount)
                    If (highestz < zval(pointCount)) Then highestz = zval(pointCount)
                    offset = New Point(Math.Abs(lowestx) + edgeSpace, Math.Abs(lowesty) + formBorderTop + edgeSpace)

                    pointCount = pointCount + 1
                    stringx = ""
                    stringy = ""
                    stringz = ""

                    statusProgMain.Value = i
                Else
                    stringz = stringz & Mid(file, i, 1)
                End If
            End If
            i = i + 1
        End While
        statusProgMain.Visible = False
        statusLblOffset.Text = "Offset: (" & CStr(offset.X) & "," & CStr(offset.Y) & ")"
        statusLblMin.Text = "Min: (" & CStr(lowestx) & "," & CStr(lowesty) & ")"
        statusLblMax.Text = "Max: (" & CStr(highestx) & "," & CStr(highesty) & ")"
        zoomx = Me.Width / (offset.X + highestx + 8)
        zoomy = Me.Height / (offset.Y + highesty + formBorderTop)
        oldZoomx = zoomx
        oldZoomy = zoomy
        oldOffset = offset
        statusLblZoom.Text = "Zoom: " & CStr(zoomx) & " X " & CStr(zoomy)
        'Draw the cross that marks the offset
        formGraphics.DrawLine(Pens.Red, offset.X, 0, offset.X, Me.Height)
        formGraphics.DrawLine(Pens.Red, 0, offset.Y, Me.Width, offset.Y)

        For c As Integer = 0 To xval.Length
            If (xval(pointCount) = Nothing Or yval(pointCount) = Nothing) Then GoTo endOfPoints
        Next
endOfPoints:
        firstMeshVertex = pointCount
        formAdvanced.refreshMapInfo("Collision", pointCount)
        fileChange("Collision")
        redraw(True, True)
        'Catch ex As Exception
        'showError(ex, "(" & FileName & ")")
        'End Try
    End Sub
    Public Sub saveMesh(ByVal FileName As String)
        Try
            If (pointCount = 0) Then
                MsgBox("You must first open a map or a collision file.")
            Else
                Dim objString As String = ""
                objString = "#Saved by BSP Master"
                objString = objString & vbCrLf & "#Program created by TheWandererLee"
                objString = objString & vbCrLf & "#" & CStr(pointCount) & " vertices saved at " & CStr(My.Computer.Clock.LocalTime.Month) & "/" & CStr(My.Computer.Clock.LocalTime.Day) & "/" & CStr(My.Computer.Clock.LocalTime.Year) & " - " & CStr(My.Computer.Clock.LocalTime.Hour) & ":" & CStr(My.Computer.Clock.LocalTime.Minute) & ":" & CStr(My.Computer.Clock.LocalTime.Second) & vbCrLf
                Dim oldMeshID As Integer = -1
                For i As Integer = firstMeshVertex To pointCount - 1
                    If (meshID(i) <> oldMeshID) Then
                        Dim idString As String = meshID(i)
                        If (idString.Length < 5) Then
                            For c As Integer = 1 To 5 - idString.Length
                                idString = "0" & idString
                            Next
                        End If
                        objString = objString & "g meshObject" & meshID(i) & vbCrLf
                        oldMeshID = meshID(i)
                    End If
                    objString = objString & "v " & CStr(xval(i)) & " " & CStr(yval(i)) & " " & CStr(zval(i)) & vbCrLf
                Next
                My.Computer.FileSystem.WriteAllText(FileName, objString, False)
            End If
        Catch ex As Exception
            showError(ex, "(" & FileName & ")")
        End Try
    End Sub
#End Region

#Region "Drawing Functions. Restart and refresh handlers, redraw, etc."
    Private Sub anyBtnRestart_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles conBtnRestart.Click, toolBtnRestart.Click
        redraw(True, True)
    End Sub
    Private Sub anyBtnRefresh_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles conBtnRefresh.Click, toolBtnRefresh.Click
        redraw(False, False)
    End Sub
    Private Sub redraw(ByVal resetOffset As Boolean, ByVal resetZoom As Boolean)
        If (loading = False) Then
            Me.Cursor = Cursors.WaitCursor
            If (resetOffset = True) Then
                offset = oldOffset
            End If
            If (resetZoom = True) Then
                zoomx = oldZoomx
                zoomy = oldZoomy
            End If

            formGraphics.Clear(Color.White)
            'Draw the red cross that marks the offset
            formGraphics.DrawLine(Pens.Red, offset.X, 0, offset.X, Me.Height)
            formGraphics.DrawLine(Pens.Red, 0, offset.Y, Me.Width, offset.Y)
            'Draw the aqua cross that marks the maps center (0, 0)
            formGraphics.DrawLine(Pens.Aqua, realToVisual(offset.X, "x") - offset.X, 0, realToVisual(offset.X, "x") - offset.X, Me.Height)
            formGraphics.DrawLine(Pens.Aqua, 0, realToVisual(offset.Y, "y") - offset.Y, Me.Width, realToVisual(offset.Y, "y") - offset.Y)

            For i As Integer = 0 To pointCount - 1
                If (lowestz > zval(i)) Then lowestz = zval(i)
                If (highestz < zval(i)) Then highestz = zval(i)
            Next

            Dim startPoint As Double = 0
            Dim endPoint As Double = pointCount - 1
            Dim precision As Integer = toolComboPrecision.SelectedIndex + 1

            If (toolComboDrawType.SelectedIndex = 0) Then
                'Both: Leave start and end points for maximum point range
            ElseIf (toolComboDrawType.SelectedIndex = 1) Then
                'Collision: Change end point, first points are collision
                endPoint = firstMeshVertex - 1
            Else
                'Mesh: Change start point, last points are mesh
                startPoint = firstMeshVertex
            End If

            Dim meshColor As Color = Color.Black
            Dim myFace As New Pen(meshColor)
            Dim currentGroup As Integer = -1

            If (cboxAntiAlias.Checked = True) Then
                formGraphics.SmoothingMode = Drawing2D.SmoothingMode.AntiAlias
            Else
                formGraphics.SmoothingMode = Drawing2D.SmoothingMode.HighSpeed
            End If

            Dim drawingPlane As Bitmap = New Bitmap(Me.Width, Me.Height, Imaging.PixelFormat.Format64bppArgb)
            For i As Integer = startPoint To endPoint Step precision
                If (xval(i) = Nothing Or yval(i) = Nothing) Then GoTo endOfPoints
                If (CInt((offset.X + xval(i)) * zoomx) - 1 >= 0 And CInt((offset.X + xval(i)) * zoomx) - 1 <= Me.Width And CInt((offset.Y + yval(i)) * zoomy) - 1 >= 0 And CInt((offset.Y + yval(i)) * zoomy) - 1 <= Me.Height) Then
                    If (toolComboDrawMode.SelectedIndex = 0) Then
                        'Draw Mode: Depth
                        If (i >= firstMeshVertex) Then
                            'Mesh Points
                            Dim depthColor As Color = Color.FromArgb(255 - trackSoftness.Value + (zval(i) - lowestz) / (highestz - lowestz) * trackSoftness.Value, (zval(i) - lowestz) / (highestz - lowestz) * 255, 255 - ((zval(i) - lowestz) / (highestz - lowestz) * 255), 0)
                            Dim myPen As Pen = New Pen(depthColor)
                            formGraphics.DrawEllipse(myPen, CInt((offset.X + xval(i)) * zoomx) - CInt((510 - trackSoftness.Value - depthColor.G) / 255 * 1) - 1, CInt((offset.Y + yval(i)) * zoomy) - CInt((510 - trackSoftness.Value - depthColor.G) / 255 * 1) - 1, CInt((510 - trackSoftness.Value - depthColor.G) / 255 * 2) + 2, CInt((510 - trackSoftness.Value - depthColor.G) / 255 * 2) + 2)
                        Else
                            'Collision Points
                            Dim depthColor As Color = Color.FromArgb(255 - trackSoftness.Value + (zval(i) - lowestz) / (highestz - lowestz) * trackSoftness.Value, (zval(i) - lowestz) / (highestz - lowestz) * 255, 255 - ((zval(i) - lowestz) / (highestz - lowestz) * 255), 0)
                            Dim myPen As Pen = New Pen(depthColor)
                            formGraphics.DrawEllipse(myPen, CInt((offset.X + xval(i)) * zoomx) - CInt((510 - trackSoftness.Value - depthColor.G) / 255 * 1) - 1, CInt((offset.Y + yval(i)) * zoomy) - CInt((510 - trackSoftness.Value - depthColor.G) / 255 * 1) - 1, CInt((510 - trackSoftness.Value - depthColor.G) / 255 * 2) + 2, CInt((510 - trackSoftness.Value - depthColor.G) / 255 * 2) + 2)
                        End If
                    ElseIf (toolComboDrawMode.SelectedIndex = 1) Then
                        'Draw Mode: Sketch
                        Dim sketchPen As Pen = Pens.Black
                        Dim sketchDot As Pen = Pens.Red
                        If (i >= firstMeshVertex) Then
                            'Mesh Points
                            sketchPen = New Pen(Color.Aqua)
                            sketchDot = New Pen(Color.Green)
                        End If
                        If (i = endPoint) Then
                            'Draw last point marker, no next point is available.
                            formGraphics.FillEllipse(Brushes.Black, CInt((offset.X + xval(i)) * zoomx) - 1, CInt((offset.Y + yval(i)) * zoomy) - 1, 2, 2)
                        ElseIf (i = startPoint) Then
                            'Draw first point marker, and line to next point.
                            formGraphics.FillEllipse(Brushes.Black, CInt((offset.X + xval(i)) * zoomx) - 1, CInt((offset.Y + yval(i)) * zoomy) - 1, 2, 2)
                            formGraphics.DrawLine(sketchPen, CInt((offset.X + xval(i)) * zoomx), CInt((offset.Y + yval(i)) * zoomy), CInt((offset.X + xval(i + 1)) * zoomx), CInt((offset.Y + yval(i + 1)) * zoomy))
                        Else
                            'Regular sketch draw, line between this point and the next.
                            formGraphics.DrawLine(sketchPen, CInt((offset.X + xval(i)) * zoomx), CInt((offset.Y + yval(i)) * zoomy), CInt((offset.X + xval(i + 1)) * zoomx), CInt((offset.Y + yval(i + 1)) * zoomy))
                        End If
                        formGraphics.DrawEllipse(sketchDot, CInt((offset.X + xval(i)) * zoomx) - 1, CInt((offset.Y + yval(i)) * zoomy) - 1, 2, 2)
                    ElseIf (toolComboDrawMode.SelectedIndex = 2) Then
                        'Draw Mode: Overlay, only allow for collision.
                        If (toolComboDrawType.SelectedIndex = 1) Then
                            Dim edges As Integer = 3
                            Dim lastPoints(edges - 1) As Point
                            For c As Integer = 0 To edges - 1
                                lastPoints(c) = New Point(CInt((offset.X + xval(i + c)) * zoomx), CInt((offset.Y + yval(i + c)) * zoomy))
                            Next
                            Dim fillColor As Color = Color.FromArgb(255 - trackSoftness.Value, Color.Aqua)
                            Dim myBrush As SolidBrush = New SolidBrush(fillColor)
                            formGraphics.FillPolygon(myBrush, lastPoints)
                            formGraphics.DrawPolygon(Pens.Black, lastPoints)
                            i = i + edges - 2
                        Else
                            formGraphics.DrawString("Overlay only works for Collision, change draw type to collision or choose Area.", New FontConverter().ConvertFromString("Courier New"), Brushes.Blue, toolSide.Width + edgeSpace, formBorderTop + toolTop.Height + edgeSpace)
                            GoTo endOfPoints
                        End If
                    ElseIf (toolComboDrawMode.SelectedIndex = 3) Then
                        'Draw Mode: Faces, only allow for mesh
                        If (toolComboDrawType.SelectedIndex = 2) Then
                            If (meshID(i) = currentGroup) Then
                                myFace = New Pen(meshColor)
                                formGraphics.DrawLine(myFace, CInt((offset.X + xval(i - 1)) * zoomx), CInt((offset.Y + yval(i - 1)) * zoomy), CInt((offset.X + xval(i)) * zoomx), CInt((offset.Y + yval(i)) * zoomy))
                            Else
                                meshColor = Color.FromArgb(255 - trackSoftness.Value, Math.Round(Rnd() * 255), Math.Round(Rnd() * 255), Math.Round(Rnd() * 255))
                                currentGroup = meshID(i)
                            End If
                        Else
                            formGraphics.DrawString("The Area drawing mode only works with the Mesh drawing type.", New FontConverter().ConvertFromString("Courier New"), Brushes.Blue, toolSide.Width + edgeSpace, formBorderTop + toolTop.Height + edgeSpace)
                            GoTo endOfPoints
                        End If
                    ElseIf (toolComboDrawMode.SelectedIndex = 4) Then
                        'Draw Mode: Artistic Circles
                        If (toolComboDrawType.SelectedIndex = 2) Then
                            If (meshID(i) = currentGroup) Then
                                myFace = New Pen(meshColor)
                                formGraphics.DrawEllipse(myFace, CInt((offset.X + xval(i - 1)) * zoomx), CInt((offset.Y + yval(i - 1)) * zoomy), CInt((offset.X + xval(i)) * zoomx) - CInt((offset.X + xval(i - 1)) * zoomx), CInt((offset.Y + yval(i)) * zoomy) - CInt((offset.Y + yval(i - 1)) * zoomy))
                            Else
                                meshColor = Color.FromArgb(255 - trackSoftness.Value, Math.Round(Rnd() * 255), Math.Round(Rnd() * 255), Math.Round(Rnd() * 255))
                                currentGroup = meshID(i)
                            End If
                        Else
                            formGraphics.DrawString("The Artistic Circles drawing mode only works with the Mesh drawing type.", New FontConverter().ConvertFromString("Courier New"), Brushes.Blue, toolSide.Width + edgeSpace, formBorderTop + toolTop.Height + edgeSpace)
                            GoTo endOfPoints
                        End If
                    ElseIf (toolComboDrawMode.SelectedIndex = 5) Then
                        formGraphics.DrawEllipse(Pens.Black, CInt((offset.X + xval(i)) * zoomx) - 1, CInt((offset.Y + yval(i)) * zoomy) - 1, 2, 2)
                        Dim labelFont As Font = New Font(New FontFamily("Courier New"), 8 + Math.Round((255 - trackSoftness.Value) / 8), FontStyle.Regular, GraphicsUnit.Pixel)
                        formGraphics.DrawString(i, labelFont, Brushes.Red, CInt((offset.X + xval(i)) * zoomx) + 1, CInt((offset.Y + yval(i)) * zoomy) + 1)
                    End If
                End If
            Next
        End If
endOfPoints:
        If (openFileMap.FileName <> "") Then
            drawExtraTags()
        End If
        Me.Cursor = Cursors.Default
        statusLblOffset.Text = "Offset: (" & CStr(offset.X) & "," & CStr(offset.Y) & ")"
        statusLblMin.Text = "Min: (" & CStr(Math.Round(lowestx)) & "," & CStr(Math.Round(lowesty)) & "," & CStr(Math.Round(lowestz)) & ")"
        statusLblMax.Text = "Max: (" & CStr(Math.Round(highestx)) & "," & CStr(Math.Round(highesty)) & "," & CStr(Math.Round(highestz)) & ")"
        statusLblZoom.Text = "Zoom: " & CStr(Math.Round(zoomx, 2) * 100) & "% by " & CStr(Math.Round(zoomy, 2) * 100) & "%"
    End Sub
    Private Sub drawExtraTags()
        'Draw any extra points relevant to the map, such as collections and spawn points
    End Sub
#End Region

#Region "Toolbar, Context Menu, and Regular Button Handlers"
#Region "    Button Click and Other Event Handlers"
    Private Sub toolBtnAbout_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles toolBtnAbout.Click
        formAbout.Close()
        formAbout.Show()
    End Sub
    Private Sub toolBtnHideSide_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles toolBtnHideSide.Click
        toolSide.Visible = False
        trackSoftness.Location = New Point(0, trackSoftness.Location.Y)
        trackSoftness.Width = trackSoftness.Width + toolSide.Width
    End Sub
    Private Sub toolBtnAdvanced_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles toolBtnAdvanced.Click
        formAdvanced.Close()
        formAdvanced.Show()
    End Sub
    Private Sub toolBtnSettings_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles toolBtnSettings.Click
        If (statusMain.Visible = True) Then
            statusMain.Visible = False
            trackSoftness.Visible = False
            lblSoftness.Visible = False
            toolBtnSettings.Text = "Show Settings"
        Else
            statusMain.Visible = True
            trackSoftness.Visible = True
            lblSoftness.Visible = True
            toolBtnSettings.Text = "Hide Settings"
        End If
    End Sub
    Private Sub toolBtnMoreOptions_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles toolBtnMoreOptions.Click
        If (grpMainWindow.Visible = False) Then
            grpMainWindow.Visible = True
            grpPointEditor.Visible = True
            btnOK.Visible = True
            lblPreview.Visible = True
            picPreview.Visible = True
        Else
            grpMainWindow.Visible = False
            grpPointEditor.Visible = False
            btnOK.Visible = False
            lblPreview.Visible = False
            picPreview.Visible = False
        End If
    End Sub
    Private Sub toolBtnPointEditor_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles toolBtnPointEditor.Click
        openPointEditor(True)
    End Sub
    Private Sub toolBtnZoomIn_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles toolBtnZoomIn.Click
        oldFirst = New Point(-1000, -1000)
        oldSecond = New Point(-1000, -1000)
    End Sub
    Private Sub toolBtnZoomOut_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles toolBtnZoomOut.Click
        zoomx = zoomx / 2
        zoomy = zoomy / 2
        offset.X = offset.X * 2
        offset.Y = offset.Y * 2
        redraw(False, False)
    End Sub
    Private Sub toolComboDrawMode_SelectedIndexChanged(ByVal sender As Object, ByVal e As System.EventArgs) Handles toolComboDrawMode.SelectedIndexChanged
        comboDrawMode = toolComboDrawMode.SelectedIndex
        redraw(False, False)
    End Sub
    Private Sub toolComboDrawType_SelectedIndexChanged(ByVal sender As Object, ByVal e As System.EventArgs) Handles toolComboDrawType.SelectedIndexChanged
        comboDrawType = toolComboDrawType.SelectedIndex
        redraw(False, False)
    End Sub
    Private Sub toolComboPrecision_SelectedIndexChanged(ByVal sender As Object, ByVal e As System.EventArgs) Handles toolComboPrecision.SelectedIndexChanged
        comboPrecision = toolComboPrecision.SelectedIndex
        redraw(False, False)
    End Sub
    Private Sub comboDblClick_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles comboDblClick.SelectedIndexChanged
        comboDoubleClick = comboDblClick.SelectedIndex
    End Sub

    Private Sub btnOK_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnOK.Click
        grpMainWindow.Visible = False
        grpPointEditor.Visible = False
        btnOK.Visible = False
        lblPreview.Visible = False
        picPreview.Visible = False
        saveSettings()
    End Sub
    Private Sub btnShowSide_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnShowSide.Click
        toolSide.Visible = True
        trackSoftness.Location = New Point(toolSide.Width, trackSoftness.Location.Y)
        trackSoftness.Width = Me.Width - 8 - toolSide.Width
    End Sub
    Private Sub conBtnResetSoftness_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles conBtnResetSoftness.Click
        trackSoftness.Value = 128
    End Sub
#End Region
#Region "    Check State Handlers and Cursor Checkers"
    Private Sub toolBtnMove_CheckStateChanged(ByVal sender As Object, ByVal e As System.EventArgs) Handles toolBtnMove.CheckStateChanged
        If (toolBtnMove.Checked = True) Then
            toolBtnSelect.Checked = False
            toolBtnZoomIn.Checked = False
            drawMoveRectangle = True
            Me.Cursor = Cursors.SizeAll
        Else
            drawMoveRectangle = False
            formGraphics.DrawRectangle(Pens.White, oldSecond.X - moveWidth, oldSecond.Y - moveHeight, moveWidth * 2, moveHeight * 2)
            Me.Cursor = Cursors.Default
        End If
    End Sub
    Private Sub toolBtnSelect_CheckStateChanged(ByVal sender As Object, ByVal e As System.EventArgs) Handles toolBtnSelect.CheckStateChanged
        If (toolBtnSelect.Checked = True) Then
            toolBtnMove.Checked = False
            toolBtnZoomIn.Checked = False
        End If
    End Sub
    Private Sub toolBtnZoomIn_CheckStateChanged(ByVal sender As Object, ByVal e As System.EventArgs) Handles toolBtnZoomIn.CheckStateChanged
        If (toolBtnZoomIn.Checked = True) Then
            toolBtnMove.Checked = False
            toolBtnSelect.Checked = False
        End If
    End Sub
    Private Sub toolSide_MouseEnter(ByVal sender As Object, ByVal e As System.EventArgs) Handles toolSide.MouseEnter
        Me.Cursor = Cursors.Default
    End Sub
    Private Sub toolSide_MouseLeave(ByVal sender As Object, ByVal e As System.EventArgs) Handles toolSide.MouseLeave
        If (toolBtnMove.Checked = True) Then Me.Cursor = Cursors.SizeAll
    End Sub
    Private Sub toolTop_MouseEnter(ByVal sender As Object, ByVal e As System.EventArgs) Handles toolTop.MouseEnter
        Me.Cursor = Cursors.Default
    End Sub
    Private Sub toolTop_MouseLeave(ByVal sender As Object, ByVal e As System.EventArgs) Handles toolTop.MouseLeave
        If (toolBtnMove.Checked = True) Then Me.Cursor = Cursors.SizeAll
    End Sub
    Private Sub statusMain_MouseEnter(ByVal sender As Object, ByVal e As System.EventArgs) Handles statusMain.MouseEnter
        Me.Cursor = Cursors.Default
    End Sub
    Private Sub statusMain_MouseLeave(ByVal sender As Object, ByVal e As System.EventArgs) Handles statusMain.MouseLeave
        If (toolBtnMove.Checked = True) Then Me.Cursor = Cursors.SizeAll
    End Sub
#End Region
#End Region
#Region "Mouse Activators"
    Private Sub formMain_MouseMove(ByVal sender As Object, ByVal e As System.Windows.Forms.MouseEventArgs) Handles Me.MouseMove
        statusLblX.Text = "X: " & CStr(e.Location.X / zoomx - offset.X)
        statusLblY.Text = "Y: " & CStr(e.Location.Y / zoomy - offset.Y)
        If (e.Button <> Windows.Forms.MouseButtons.Left) Then drawZoomRectangle = False
        If (drawZoomRectangle = True) Then
            lastPoint = e.Location
            zoomPen.Color = Color.Red

            Dim edgeSize As Integer = 3

            If (cboxAntiAlias.Checked = True) Then formGraphics.SmoothingMode = Drawing2D.SmoothingMode.None

            If (e.Location.X > firstPoint.X And e.Location.Y > firstPoint.Y) Then
                formGraphics.DrawLine(Pens.White, firstPoint.X, firstPoint.Y, firstPoint.X + edgeSize, firstPoint.Y)
                formGraphics.DrawLine(Pens.White, firstPoint.X, firstPoint.Y, firstPoint.X, firstPoint.Y + edgeSize)

                formGraphics.DrawLine(Pens.White, oldSecond.X, firstPoint.Y, oldSecond.X - edgeSize, firstPoint.Y)
                formGraphics.DrawLine(Pens.White, oldSecond.X, firstPoint.Y, oldSecond.X, firstPoint.Y + edgeSize)

                formGraphics.DrawLine(Pens.White, firstPoint.X, oldSecond.Y, firstPoint.X + edgeSize, oldSecond.Y)
                formGraphics.DrawLine(Pens.White, firstPoint.X, oldSecond.Y, firstPoint.X, oldSecond.Y - edgeSize)

                formGraphics.DrawLine(Pens.White, oldSecond.X, oldSecond.Y, oldSecond.X - edgeSize, oldSecond.Y)
                formGraphics.DrawLine(Pens.White, oldSecond.X, oldSecond.Y, oldSecond.X, oldSecond.Y - edgeSize)

                If (e.Location.X > firstPoint.X + edgeSize And e.Location.Y > firstPoint.Y + edgeSize) Then
                    formGraphics.DrawLine(zoomPen, firstPoint.X, firstPoint.Y, firstPoint.X + edgeSize, firstPoint.Y)
                    formGraphics.DrawLine(zoomPen, firstPoint.X, firstPoint.Y, firstPoint.X, firstPoint.Y + edgeSize)

                    formGraphics.DrawLine(zoomPen, e.Location.X, firstPoint.Y, e.Location.X - edgeSize, firstPoint.Y)
                    formGraphics.DrawLine(zoomPen, e.Location.X, firstPoint.Y, e.Location.X, firstPoint.Y + edgeSize)

                    formGraphics.DrawLine(zoomPen, firstPoint.X, e.Location.Y, firstPoint.X + edgeSize, e.Location.Y)
                    formGraphics.DrawLine(zoomPen, firstPoint.X, e.Location.Y, firstPoint.X, e.Location.Y - edgeSize)

                    formGraphics.DrawLine(zoomPen, e.Location.X, e.Location.Y, e.Location.X - edgeSize, e.Location.Y)
                    formGraphics.DrawLine(zoomPen, e.Location.X, e.Location.Y, e.Location.X, e.Location.Y - edgeSize)
                End If

            End If

            If (cboxAntiAlias.Checked = True) Then formGraphics.SmoothingMode = Drawing2D.SmoothingMode.AntiAlias
            oldFirst = firstPoint
            oldSecond = e.Location
        End If

        If (drawMoveRectangle = True) Then
            oldPen.DashStyle = Drawing2D.DashStyle.Dash

            Dim movingPattern(0) As Single
            movingPattern(0) = 5
            oldPen.DashPattern = movingPattern
            movePen.DashPattern = movingPattern
            oldPen.Color = Color.Red
            movePen.Color = Color.Aqua
            If (cboxAntiAlias.Checked = True) Then formGraphics.SmoothingMode = Drawing2D.SmoothingMode.None
            formGraphics.DrawRectangle(Pens.White, firstPoint.X - moveWidth, firstPoint.Y - moveHeight, moveWidth * 2, moveHeight * 2)
            formGraphics.DrawRectangle(oldPen, firstPoint.X - moveWidth, firstPoint.Y - moveHeight, moveWidth * 2, moveHeight * 2)

            If (toolComboDrawType.SelectedIndex = 1) Then
                formGraphics.DrawRectangle(Pens.White, oldSecond.X - moveWidth, oldSecond.Y - moveHeight, moveWidth * 2, moveHeight * 2)
                formGraphics.DrawRectangle(movePen, e.Location.X - moveWidth, e.Location.Y - moveHeight, moveWidth * 2, moveHeight * 2)
            Else
                formGraphics.DrawRectangle(Pens.White, firstPoint.X - moveWidth, oldSecond.Y - moveHeight, moveWidth * 2, moveHeight * 2)
                formGraphics.DrawRectangle(movePen, firstPoint.X - moveWidth, e.Location.Y - moveHeight, moveWidth * 2, moveHeight * 2)
            End If

            oldFirst = firstPoint
            oldSecond = e.Location
            If (cboxAntiAlias.Checked = True) Then formGraphics.SmoothingMode = Drawing2D.SmoothingMode.AntiAlias
        End If

        'If (toolBtnMove.Checked = True And drawMoveRectangle = True And toolComboDrawType.SelectedIndex <> 1) Then
        '    movePen.Color = Color.Gray
        '    formGraphics.DrawRectangle(Pens.White, oldSecond.X - moveWidth, oldSecond.Y - moveHeight, moveWidth * 2, moveHeight * 2)
        '    formGraphics.DrawRectangle(movePen, e.Location.X - moveWidth, e.Location.Y - moveHeight, moveWidth * 2, moveHeight * 2)
        '    oldFirst = firstPoint
        '    oldSecond = e.Location
        'End If

        lastPoint = e.Location
    End Sub
    Private Sub formMain_MouseDown(ByVal sender As Object, ByVal e As System.Windows.Forms.MouseEventArgs) Handles Me.MouseDown
        If (e.Button = Windows.Forms.MouseButtons.Left And toolBtnMove.Checked = True) Then
            firstPoint = e.Location
            drawMoveRectangle = True
            dashOffset = 0
            timDashSpin.Enabled = True
        End If

        If (e.Button = Windows.Forms.MouseButtons.Left And toolBtnSelect.Checked = True And e.Location.Y > formBorderTop) Then
            firstPoint = e.Location
            drawZoomRectangle = True
        End If

        If (e.Button = Windows.Forms.MouseButtons.Left And toolBtnZoomIn.Checked = True And e.Location.Y > formBorderTop) Then
            lowestx = visualToReal(e.Location.X, "x")
            lowesty = visualToReal(e.Location.Y, "y")
            firstPoint = e.Location
            drawZoomRectangle = True
        End If
    End Sub
    Private Sub formMain_MouseUp(ByVal sender As Object, ByVal e As System.Windows.Forms.MouseEventArgs) Handles Me.MouseUp
        If (e.Button = Windows.Forms.MouseButtons.Left And toolBtnMove.Checked = True) Then
            Try
                secondPoint = e.Location
                Dim highestPoint As Double = pointCount - 1
                Dim lowestPoint As Double = 0
                If (toolComboDrawType.SelectedIndex = 1) Then highestPoint = firstMeshVertex - 1
                If (toolComboDrawType.SelectedIndex = 2) Then lowestPoint = firstMeshVertex
                For i As Integer = lowestPoint To highestPoint
                    If (xval(i) >= visualToReal(firstPoint.X - moveWidth, "x") And xval(i) <= visualToReal(firstPoint.X + moveWidth, "x") And yval(i) >= visualToReal(firstPoint.Y - moveHeight, "y") And yval(i) <= visualToReal(firstPoint.Y + moveHeight, "y")) Then
                        If (toolComboDrawType.SelectedIndex = 1) Then
                            'If it's set on both or mesh then only move it vertical
                            xval(i) = xval(i) + ((secondPoint.X / zoomx - offset.X) - (firstPoint.X / zoomx - offset.X))
                        End If
                        yval(i) = yval(i) + ((secondPoint.Y / zoomy - offset.Y) - (firstPoint.Y / zoomy - offset.Y))
                    End If
                Next
                toolBtnMove.Checked = False
                firstPoint = New Point(-Me.Width, -Me.Height)
                drawMoveRectangle = False
                timDashSpin.Enabled = False
                redraw(False, False)
            Catch ex As Exception
                showError(ex, "(Moving Points to " & e.Location.X & ", " & e.Location.Y & ".")
            End Try
        End If

        If (e.Button = Windows.Forms.MouseButtons.Left And toolBtnSelect.Checked = True And e.Location.Y > formBorderTop) Then
            Try
                secondPoint = e.Location
                Dim minx, miny, maxx, maxy As Double
                minx = visualToReal(firstPoint.X, "x")
                miny = visualToReal(firstPoint.Y, "y")
                maxx = visualToReal(secondPoint.X, "x")
                maxy = visualToReal(secondPoint.Y, "y")
                drawZoomRectangle = False
                formPoints.listPoints.Items.Clear()

                Dim lowestPoint As Double = 0
                Dim highestPoint As Double = pointCount - 1

                If (toolComboDrawType.SelectedIndex = 1) Then highestPoint = firstMeshVertex - 1
                If (toolComboDrawType.SelectedIndex = 2) Then lowestPoint = firstMeshVertex

                For i As Integer = lowestPoint To highestPoint
                    If (xval(i) >= minx And xval(i) <= maxx And yval(i) >= miny And yval(i) <= maxy) Then
                        formPoints.listPoints.Items.Add(CStr(i) & ":  X:" & CStr(xval(i)) & " Y:" & CStr(yval(i)) & " Z:" & CStr(zval(i)))
                    End If
                Next
                toolBtnSelect.Checked = False
                formGraphics.DrawRectangle(Pens.White, firstPoint.X, firstPoint.Y, secondPoint.X - firstPoint.X, secondPoint.Y - firstPoint.Y)
                openPointEditor(True)
            Catch ex As Exception
                'User has clicked somewhere other than the drawing space of the form
            End Try
        End If

        If (e.Button = Windows.Forms.MouseButtons.Left And toolBtnZoomIn.Checked = True And e.Location.Y > formBorderTop) Then
            Try
                secondPoint = e.Location
                If (secondPoint.X < firstPoint.X + 3 And secondPoint.X > firstPoint.X - 3 Or secondPoint.Y < firstPoint.Y + 3 And secondPoint.Y > firstPoint.Y - 3) Then GoTo areaTooSmall
                highestx = visualToReal(e.Location.X, "x")
                highesty = visualToReal(e.Location.Y, "y")
                drawZoomRectangle = False
                zoomx = zoomx * ((Me.Width - toolSide.Width) / (secondPoint.X - firstPoint.X))
                If (trackSoftness.Visible = True) Then
                    zoomy = zoomy * ((Me.Height - formBorderTop - toolTop.Height - statusMain.Height - trackSoftness.Height) / (secondPoint.Y - firstPoint.Y))
                Else
                    zoomy = zoomy * ((Me.Height - formBorderTop - toolTop.Height) / (secondPoint.Y - firstPoint.Y))
                End If

                statusLblZoom.Text = "Zoom: " & CStr(zoomx) & " X " & CStr(zoomy)
                offset = New Point(-lowestx, -lowesty)
                redraw(False, False)
            Catch ex As Exception
                'User has clicked somewhere other than the drawing space of the form,
                'or the user has over time zoomed in too close, etc.
                redraw(True, True)
            End Try
areaTooSmall:
            toolBtnZoomIn.Checked = False
        Else
            drawZoomRectangle = False
        End If
    End Sub
    Private Sub formMain_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.DoubleClick
        If (loggedIn = False) Then Exit Sub
        Dim s As Integer = comboDoubleClick
        If (s = 0) Then If (openFileMap.ShowDialog() = Windows.Forms.DialogResult.OK) Then openMap(openFileMap.FileName)
        If (s = 1) Then If (openFileOBJ.ShowDialog() = Windows.Forms.DialogResult.OK) Then openCollision(openFileMap.FileName)
        If (s = 2) Then If (saveFileMap.ShowDialog() = Windows.Forms.DialogResult.OK) Then saveMap(saveFileMap.FileName)
        If (s = 3) Then If (saveFileOBJ.ShowDialog() = Windows.Forms.DialogResult.OK) Then saveCollision(saveFileOBJ.FileName)
        If (s = 4) Then redraw(True, True)
        If (s = 5) Then redraw(False, False)
        If (s = 6) Then
            If (trackSoftness.Visible = False) Then
                trackSoftness.Visible = True
                statusMain.Visible = True
                lblSoftness.Visible = True
            Else
                trackSoftness.Visible = False
                statusMain.Visible = False
                lblSoftness.Visible = False
            End If
        End If
        If (s = 7) Then
            If (toolSide.Visible = False) Then
                toolSide.Visible = True
            Else
                toolSide.Visible = False
            End If
        End If
        If (s = 8) Then
            If (toolSide.Visible = False) Then
                toolSide.Visible = True
                trackSoftness.Visible = True
                statusMain.Visible = True
            Else
                toolSide.Visible = False
                trackSoftness.Visible = False
                statusMain.Visible = False
            End If
        End If
        If (s = 9) Then
            formPoints.Close()
            formPoints.Show()
        End If
        If (s = 10) Then
            formPoints.Close()
            formPoints.Show()
        End If
        If (s = 11) Then
            formAdvanced.Close()
            formAdvanced.Show()
        End If
    End Sub
    Private Sub picPreview_MouseDown(ByVal sender As Object, ByVal e As System.Windows.Forms.MouseEventArgs) Handles picPreview.MouseDown
        picPreview.Cursor = Cursors.No
    End Sub
    Private Sub picPreview_MouseUp(ByVal sender As Object, ByVal e As System.Windows.Forms.MouseEventArgs) Handles picPreview.MouseUp
        picPreview.Cursor = Cursors.SizeAll
    End Sub
#End Region
#Region "User Settings and Options Menu"
    Private Sub trackSoftness_KeyDown(ByVal sender As Object, ByVal e As System.Windows.Forms.KeyEventArgs) Handles trackSoftness.KeyDown
        keyboardMove(e)
    End Sub
    Private Sub trackSoftness_MouseUp(ByVal sender As Object, ByVal e As System.Windows.Forms.MouseEventArgs) Handles trackSoftness.MouseUp
        redraw(False, False)
        oldSoftness = trackSoftness.Value
    End Sub
    Private Sub numMoveSizeW_ValueChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles numMoveSizeW.ValueChanged
        If (cboxConstrain.Checked = True) Then numMoveSizeH.Value = numMoveSizeW.Value
        anyMoveSizeChanged()
    End Sub
    Private Sub numMoveSizeH_ValueChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles numMoveSizeH.ValueChanged
        If (cboxConstrain.Checked = True) Then numMoveSizeW.Value = numMoveSizeH.Value
        anyMoveSizeChanged()
    End Sub
    Private Sub cboxConstrain_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cboxConstrain.CheckedChanged
        If (cboxConstrain.Checked = True) Then numMoveSizeH.Value = numMoveSizeW.Value
    End Sub
    Private Sub cboxDrawMove_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cboxDrawMove.CheckedChanged
        If (cboxDrawMove.Checked = True) Then
            picPreview.BorderStyle = BorderStyle.FixedSingle
        Else
            picPreview.BorderStyle = BorderStyle.None
        End If
    End Sub
    Private Sub anyMoveSizeChanged()
        picPreview.Location = New Point(picPreview.Location.X, (lblPreview.Location.Y + (lblPreview.Height / 2)) - (numMoveSizeH.Value / 4))
        picPreview.Size = New Size(numMoveSizeW.Value / 2, numMoveSizeH.Value / 2)
        moveWidth = numMoveSizeW.Value / 4
        moveHeight = numMoveSizeH.Value / 4
        toolBtnMove.Checked = False
    End Sub

    Public Sub testDirectories()
        ReDim defaultSettings(16)
        defaultSettings(0) = 1
        defaultSettings(1) = 0
        defaultSettings(2) = 1
        defaultSettings(3) = 0
        defaultSettings(4) = 1
        defaultSettings(5) = 0
        defaultSettings(6) = 5
        defaultSettings(7) = 0
        defaultSettings(8) = 0
        defaultSettings(9) = 0
        defaultSettings(10) = 1
        defaultSettings(11) = 0
        defaultSettings(12) = 192
        defaultSettings(13) = 24
        defaultSettings(14) = 24
        defaultSettings(15) = 1
        defaultSettings(16) = 1

        If (My.Computer.FileSystem.FileExists(settingsFile) = False) Then
            If (My.Computer.FileSystem.DirectoryExists(programFiles & companyFolder & programFolder) = False) Then
                If (My.Computer.FileSystem.DirectoryExists(programFiles & companyFolder) = False) Then
                    If (My.Computer.FileSystem.DirectoryExists(programFiles) = False) Then
                        My.Computer.FileSystem.CreateDirectory(programFiles)
                    End If
                    My.Computer.FileSystem.CreateDirectory(programFiles & companyFolder)
                End If
                My.Computer.FileSystem.CreateDirectory(programFiles & companyFolder & programFolder)
            End If
            My.Computer.FileSystem.WriteAllBytes(settingsFile, defaultSettings, False)
        End If
    End Sub

    Public Sub loadSettings()
        Dim settingsBytes() As Byte = My.Computer.FileSystem.ReadAllBytes(settingsFile)
        If (settingsBytes.Length - 1 <> 16) Then
            My.Computer.FileSystem.DeleteFile(settingsFile)
            testDirectories()
        End If
        Try
            cboxShowToolTips.Checked = IntToBool(settingsBytes(0))
            cboxAlwaysOnTop.Checked = IntToBool(settingsBytes(1))
            cboxAntiAlias.Checked = IntToBool(settingsBytes(2))
            cboxDrawMove.Checked = IntToBool(settingsBytes(3))
            cboxMaximize.Checked = IntToBool(settingsBytes(4))
            cboxShowMeshPoints.Checked = IntToBool(settingsBytes(5))
            If (settingsBytes(6) >= 0 And settingsBytes(6) <= comboDblClick.Items.Count - 1) Then comboDblClick.SelectedIndex = settingsBytes(6)
            If (settingsBytes(7) >= 0 And settingsBytes(7) <= toolComboDrawType.Items.Count - 1) Then toolComboDrawType.SelectedIndex = settingsBytes(7)
            If (settingsBytes(8) >= 0 And settingsBytes(8) <= toolComboDrawMode.Items.Count - 1) Then toolComboDrawMode.SelectedIndex = settingsBytes(8)
            If (settingsBytes(9) >= 0 And settingsBytes(9) <= toolComboPrecision.Items.Count - 1) Then toolComboPrecision.SelectedIndex = settingsBytes(9)
            If (settingsBytes(10) = 0) Then
                toolSide.Visible = False
            End If
            If (settingsBytes(11) = 0) Then
                statusMain.Visible = False
                trackSoftness.Visible = False
            End If
            trackSoftness.Value = settingsBytes(12)
            numMoveSizeW.Value = settingsBytes(13) * 2
            numMoveSizeH.Value = settingsBytes(14) * 2
            cboxConstrain.Checked = IntToBool(settingsBytes(15))
            cboxUseColorCoding.Checked = IntToBool(settingsBytes(16))
        Catch ex As Exception
            MsgBox("Your settings file is configured incorrectly. All settings are being reset to their defaults.", MsgBoxStyle.Critical, "Error")
            My.Computer.FileSystem.DeleteFile(settingsFile)
            testDirectories()
            loadSettings()
        End Try
        settingsChanged("load")
    End Sub
    Public Sub saveSettings()
        Try
            Dim settingsBytes(16) As Byte

            If (comboDoubleClick < 0) Then comboDoubleClick = 0
            If (comboDrawType < 0) Then comboDrawType = 0
            If (comboDrawMode < 0) Then comboDrawMode = 0
            If (comboPrecision < 0) Then comboPrecision = 0

            settingsBytes(0) = BoolToInt(cboxShowToolTips.Checked)
            settingsBytes(1) = BoolToInt(cboxAlwaysOnTop.Checked)
            settingsBytes(2) = BoolToInt(cboxAntiAlias.Checked)
            settingsBytes(3) = BoolToInt(cboxDrawMove.Checked)
            settingsBytes(4) = BoolToInt(cboxMaximize.Checked)
            settingsBytes(5) = BoolToInt(cboxShowMeshPoints.Checked)
            settingsBytes(6) = comboDoubleClick
            settingsBytes(7) = comboDrawType
            settingsBytes(8) = comboDrawMode
            settingsBytes(9) = comboPrecision
            settingsBytes(10) = BoolToInt(toolSide.Visible)
            settingsBytes(11) = BoolToInt(statusMain.Visible)
            settingsBytes(12) = trackSoftness.Value
            settingsBytes(13) = CByte(numMoveSizeW.Value / 2)
            settingsBytes(14) = CByte(numMoveSizeH.Value / 2)
            settingsBytes(15) = BoolToInt(cboxConstrain.Checked)
            settingsBytes(16) = BoolToInt(cboxUseColorCoding.Checked)

            My.Computer.FileSystem.WriteAllBytes(settingsFile, settingsBytes, False)
        Catch ex As Exception
            MsgBox("Error saving settings file. All settings are being reset to their defaults.", MsgBoxStyle.Critical, "Error")
            My.Computer.FileSystem.DeleteFile(settingsFile)
            testDirectories()
        End Try
        settingsChanged("save")
    End Sub
    Public Sub settingsChanged(ByVal Type As String)
        toolTop.ShowItemToolTips = cboxShowToolTips.Checked
        toolSide.ShowItemToolTips = cboxShowToolTips.Checked
        statusMain.ShowItemToolTips = cboxShowToolTips.Checked
        Me.TopMost = cboxAlwaysOnTop.Checked
        If (loading = True) Then
            If (cboxMaximize.Checked = True) Then
                Me.WindowState = FormWindowState.Maximized
            Else
                Me.WindowState = FormWindowState.Normal
            End If
        End If
    End Sub
#End Region
#Region "Custom Subs and Functions"
    Private Sub fileChange(ByVal Type As String)
        If (Type = "Collision") Then
            Me.Text = "BSP Master: Editing collision " & vbQuote & Mid(Mid(openFileOBJ.FileName, openFileOBJ.FileName.LastIndexOf("\") + 2, openFileOBJ.FileName.LastIndexOf(".") - openFileOBJ.FileName.LastIndexOf("\") - 1), 1, 1).ToUpper & Mid(Mid(openFileOBJ.FileName, openFileOBJ.FileName.LastIndexOf("\") + 2, openFileOBJ.FileName.LastIndexOf(".") - openFileOBJ.FileName.LastIndexOf("\") - 1), 2, Mid(openFileOBJ.FileName, openFileOBJ.FileName.LastIndexOf("\") + 2, openFileOBJ.FileName.LastIndexOf(".") - openFileOBJ.FileName.LastIndexOf("\") - 1).Length - 1) & vbQuote & "."
        ElseIf (Type = "Map") Then
            Me.Text = "BSP Master: Editing map " & vbQuote & Mid(realMapName, 1, 1).ToUpper & Mid(realMapName, 2, realMapName.Length - 1).ToLower & vbQuote & "."
        Else
            Me.Text = "BSP Master"
        End If
    End Sub

    Public Function randomColor() As Color
        Return Color.FromArgb(255, Math.Round(Rnd() * 255), Math.Round(Rnd() * 255), Math.Round(Rnd() * 255))
    End Function

    Private Sub keyboardMove(ByVal e As System.Windows.Forms.KeyEventArgs)
        If (oldSoftness <> trackSoftness.Value) Then
            trackSoftness.Value = oldSoftness
        End If
        If (e.KeyCode = Keys.Right And e.Modifiers = Keys.Control) Then
            offset.X = offset.X + 100
            redraw(False, False)
        ElseIf (e.KeyCode = Keys.Right And e.Modifiers = Keys.Shift) Then
            offset.X = offset.X + 10
            redraw(False, False)
        ElseIf (e.KeyCode = Keys.Right) Then
            offset.X = offset.X + 1
            redraw(False, False)
        End If

        If (e.KeyCode = Keys.Down And e.Modifiers = Keys.Control) Then
            offset.Y = offset.Y + 100
            redraw(False, False)
        ElseIf (e.KeyCode = Keys.Down And e.Modifiers = Keys.Shift) Then
            offset.Y = offset.Y + 10
            redraw(False, False)
        ElseIf (e.KeyCode = Keys.Down) Then
            offset.Y = offset.Y + 1
            redraw(False, False)
        End If

        If (e.KeyCode = Keys.Left And e.Modifiers = Keys.Control) Then
            offset.X = offset.X - 100
            redraw(False, False)
        ElseIf (e.KeyCode = Keys.Left And e.Modifiers = Keys.Shift) Then
            offset.X = offset.X - 10
            redraw(False, False)
        ElseIf (e.KeyCode = Keys.Left) Then
            offset.X = offset.X - 1
            redraw(False, False)
        End If

        If (e.KeyCode = Keys.Up And e.Modifiers = Keys.Control) Then
            offset.Y = offset.Y - 100
            redraw(False, False)
        ElseIf (e.KeyCode = Keys.Up And e.Modifiers = Keys.Shift) Then
            offset.Y = offset.Y - 10
            redraw(False, False)
        ElseIf (e.KeyCode = Keys.Up) Then
            offset.Y = offset.Y - 1
            redraw(False, False)
        End If
    End Sub
    Private Sub openPointEditor(ByVal open As Boolean)
        pointEditorOpen = open
        If (open = True) Then
            formPoints.Show()
            formPoints.Focus()
        Else
            formPoints.Close()
        End If
    End Sub
    Private Sub showError(ByVal ex As Exception, ByVal ExtraText As String)
        formError.Show()
        formError.lblError.Text = "Error: " & ex.Message & " " & ExtraText
        formError.txtError.Text = "In " & ex.Source & ":" & vbCrLf & vbCrLf & ex.StackTrace
    End Sub

    Public Function distanceBetween(ByVal xval1 As Integer, ByVal yval1 As Integer, ByVal xval2 As Integer, ByVal yval2 As Integer)
        Dim distance As Single = Math.Sqrt((xval2 - xval1) ^ 2 + (yval2 - yval1) ^ 2)
        Return distance
    End Function

    Public Function realToVisual(ByVal Value As Single, ByVal Type As String) As Single
        Dim visualValue As Single = Value
        If (Type.ToLower = "x") Then visualValue = offset.X + Value * zoomx
        If (Type.ToLower = "y") Then visualValue = offset.Y + Value * zoomy
        Return visualValue
    End Function
    Public Function visualToReal(ByVal Value As Single, ByVal Type As String) As Single
        Dim realValue As Single = Value
        If (Type.ToLower = "x") Then realValue = Value / zoomx - offset.X
        If (Type.ToLower = "y") Then realValue = Value / zoomy - offset.Y
        Return realValue
    End Function
#End Region
#Region "Timers and Web Functions"
    Private Sub timDashSpin_Tick(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles timDashSpin.Tick
        If (drawMoveRectangle = True) Then
            If (cboxAntiAlias.Checked = True) Then formGraphics.SmoothingMode = Drawing2D.SmoothingMode.None
            If (dashOffset >= 5) Then
                dashOffset = 0
            Else
                dashOffset = dashOffset + 1
            End If
            oldPen.DashOffset = dashOffset
            movePen.DashOffset = dashOffset
            formGraphics.DrawRectangle(Pens.White, firstPoint.X - moveWidth, firstPoint.Y - moveHeight, moveWidth * 2, moveHeight * 2)
            formGraphics.DrawRectangle(oldPen, firstPoint.X - moveWidth, firstPoint.Y - moveHeight, moveWidth * 2, moveHeight * 2)
            If (toolComboDrawType.SelectedIndex = 1) Then
                formGraphics.DrawRectangle(Pens.White, oldSecond.X - moveWidth, oldSecond.Y - moveHeight, moveWidth * 2, moveHeight * 2)
                formGraphics.DrawRectangle(movePen, lastPoint.X - moveWidth, lastPoint.Y - moveHeight, moveWidth * 2, moveHeight * 2)
            Else
                formGraphics.DrawRectangle(Pens.White, firstPoint.X - moveWidth, oldSecond.Y - moveHeight, moveWidth * 2, moveHeight * 2)
                formGraphics.DrawRectangle(movePen, firstPoint.X - moveWidth, lastPoint.Y - moveHeight, moveWidth * 2, moveHeight * 2)
            End If
            If (cboxAntiAlias.Checked = True) Then formGraphics.SmoothingMode = Drawing2D.SmoothingMode.AntiAlias
        End If
    End Sub
#End Region
End Class