Public Class formAdvanced
    Dim mapCollCount As Double = 0
    Dim mapMeshCount As Double = 0
    Dim collisionPointCount As Double = 0
    Dim meshPointCount As Double = 0
    Dim vbQuote As String = Chr(34)

    Dim mulgOffset As Integer = 0

#Region "Map Unicode Table Offsets"
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

    Dim mainmenuStartOffset As Integer = 15350272
    Dim startOffset As Integer = 0
#End Region

    Private Sub formAdvanced_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        refreshMapInfo("None", 0)
    End Sub

    Private Sub btnImportCollision_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnImportCollision.Click
        statusLblStatus.Text = "Importing Collision File"
        If (formMain.openFileOBJ.FileName = "") Then
            If (formMain.openFileOBJ.ShowDialog() = Windows.Forms.DialogResult.OK) Then
                formMain.openCollision(formMain.openFileOBJ.FileName)
                collisionPointCount = formMain.pointCount
            Else
                GoTo cancelImport
            End If
        Else
            formMain.openCollision(formMain.openFileOBJ.FileName)
        End If
        If (cboxSaveImmediately.Checked = True) Then
            If (formMain.openFileMap.FileName <> "") Then
                statusLblStatus.Text = "Saving Map File"
                If (collisionPointCount = mapCollCount) Then
                    formMain.saveMap(formMain.openFileMap.FileName)
                ElseIf (collisionPointCount > mapCollCount) Then
                    If (MsgBox("This .obj file contains " & collisionPointCount & " vertices, which is more than the map's collision contains. Importing this .obj collision file WILL ruin your map, are you sure you want to continue?" & vbCrLf & vbCrLf & "Recommendation: Click No.", MsgBoxStyle.Exclamation Or MsgBoxStyle.YesNo, "Too Many Vertices in .OBJ Collision File") = MsgBoxResult.Yes) Then
                        formMain.saveMap(formMain.openFileMap.FileName)
                    End If
                ElseIf (collisionPointCount < mapCollCount) Then
                    If (MsgBox("This .obj file contains " & collisionPointCount & " vertices, which is not have enough vertices to completely replace all the vertices in the map. Old collision points will still remain in the map. Continue?", MsgBoxStyle.Question Or MsgBoxStyle.YesNo, "Not Enough Vertices in .OBJ Collision File") = MsgBoxResult.Yes) Then
                        formMain.saveMap(formMain.openFileMap.FileName)
                    End If

                End If
            Else
                MsgBox("Imported .OBJ into current project, but could not immediately save the .map file because no .map is currently open.", _
                MsgBoxStyle.Critical, "Could not save file.")
            End If
        Else
            MsgBox("Click " & vbQuote & "Save Map" & vbQuote & " on the main window when you are ready to import the collision file.", MsgBoxStyle.Exclamation, "Import Awaiting User Confirmation")
        End If
        statusLblStatus.Text = "Successfully imported .obj collision file into " & formMain.realMapName & "."
        GoTo skipCancel
cancelImport:
        statusLblStatus.Text = "Cancelled importing .obj collision file into " & formMain.realMapName & "."
skipCancel:
    End Sub
    Private Sub btnExportCollision_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnExportCollision.Click
        If (formMain.openFileOBJ.FileName = "") Then
            If (formMain.saveFileOBJ.ShowDialog() = Windows.Forms.DialogResult.OK) Then
                statusLblStatus.Text = "Exporting .obj collision file"
                formMain.openMap(formMain.openFileMap.FileName)
                formMain.saveCollision(formMain.saveFileOBJ.FileName)
                formMain.openFileOBJ.FileName = formMain.saveFileOBJ.FileName
            Else
                GoTo cancelExport
            End If
        Else
            If (cboxAskOverwrite.Checked = True) Then
                If (MsgBox("Do you want to overwrite the loaded .obj collision file, or create a new one?", MsgBoxStyle.Question Or MsgBoxStyle.YesNo, "Overwrite Opened .OBJ") = MsgBoxResult.Yes) Then
                    If (formMain.saveFileOBJ.ShowDialog() = Windows.Forms.DialogResult.OK) Then
                        formMain.saveCollision(formMain.saveFileOBJ.FileName)
                        formMain.openFileOBJ.FileName = formMain.saveFileOBJ.FileName
                    Else
                        GoTo cancelExport
                    End If
                Else
                    GoTo cancelExport
                End If
            Else
                formMain.saveCollision(formMain.openFileOBJ.FileName)
            End If
        End If
        statusLblStatus.Text = "Successfully exported " & formMain.realMapName & "'s collision."
        GoTo skipCancel
cancelExport:
        statusLblStatus.Text = "Cancelled exporting .obj collision file."
skipCancel:
    End Sub
    Private Sub btnImportMesh_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnImportMesh.Click
        statusLblStatus.Text = "Importing Mesh File"
        If (formMain.openFileOBJ.FileName = "") Then
            If (formMain.openFileOBJ.ShowDialog() = Windows.Forms.DialogResult.OK) Then
                For i As Double = formMain.firstMeshVertex To formMain.pointCount - 1

                Next
                meshPointCount = formMain.pointCount
            Else
                GoTo cancelImport
            End If
        Else
            formMain.openCollision(formMain.openFileOBJ.FileName)
        End If
        If (cboxSaveImmediately.Checked = True) Then
            If (formMain.openFileMap.FileName <> "") Then
                statusLblStatus.Text = "Saving Map File"
                If (collisionPointCount = mapCollCount) Then
                    formMain.saveMap(formMain.openFileMap.FileName)
                ElseIf (collisionPointCount > mapCollCount) Then
                    If (MsgBox("This .obj file contains " & collisionPointCount & " vertices, which is more than the map's collision contains. Importing this .obj collision file WILL ruin your map, are you sure you want to continue?" & vbCrLf & vbCrLf & "Recommendation: Click No.", MsgBoxStyle.Exclamation Or MsgBoxStyle.YesNo, "Too Many Vertices in .OBJ Collision File") = MsgBoxResult.Yes) Then
                        formMain.saveMap(formMain.openFileMap.FileName)
                    End If
                ElseIf (collisionPointCount < mapCollCount) Then
                    If (MsgBox("This .obj file contains " & collisionPointCount & " vertices, which is not have enough vertices to completely replace all the vertices in the map. Old collision points will still remain in the map. Continue?", MsgBoxStyle.Question Or MsgBoxStyle.YesNo, "Not Enough Vertices in .OBJ Collision File") = MsgBoxResult.Yes) Then
                        formMain.saveMap(formMain.openFileMap.FileName)
                    End If

                End If
            Else
                MsgBox("Imported .OBJ into current project, but could not immediately save the .map file because no .map is currently open.", _
                MsgBoxStyle.Critical, "Could not save file.")
            End If
        Else
            MsgBox("Click " & vbQuote & "Save Map" & vbQuote & " on the main window when you are ready to import the collision file.", MsgBoxStyle.Exclamation, "Import Awaiting User Confirmation")
        End If
        statusLblStatus.Text = "Successfully imported .obj collision file into " & formMain.realMapName & "."
        GoTo skipCancel
cancelImport:
        statusLblStatus.Text = "Cancelled importing .obj collision file into " & formMain.realMapName & "."
skipCancel:
    End Sub
    Private Sub btnExportMesh_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnExportMesh.Click
        If (formMain.openFileOBJ.FileName = "") Then
            If (formMain.saveFileOBJ.ShowDialog() = Windows.Forms.DialogResult.OK) Then
                statusLblStatus.Text = "Exporting .obj mesh file"
                formMain.openMap(formMain.openFileMap.FileName)
                formMain.saveMesh(formMain.saveFileOBJ.FileName)
                formMain.openFileOBJ.FileName = formMain.saveFileOBJ.FileName
            Else
                GoTo cancelExport
            End If
        Else
            If (cboxAskOverwrite.Checked = True) Then
                If (MsgBox("Do you want to overwrite the loaded .obj mesh file (Yes), or create a new one (No)?", MsgBoxStyle.Question Or MsgBoxStyle.YesNo, "Overwrite Opened .OBJ") = MsgBoxResult.Yes) Then
                    If (formMain.saveFileOBJ.ShowDialog() = Windows.Forms.DialogResult.OK) Then
                        formMain.saveMesh(formMain.saveFileOBJ.FileName)
                        formMain.openFileOBJ.FileName = formMain.saveFileOBJ.FileName
                    Else
                        GoTo cancelExport
                    End If
                Else
                    If (formMain.saveFileOBJ.ShowDialog() = Windows.Forms.DialogResult.OK) Then
                        statusLblStatus.Text = "Exporting .obj mesh file"
                        formMain.openMap(formMain.openFileMap.FileName)
                        formMain.saveMesh(formMain.saveFileOBJ.FileName)
                        formMain.openFileOBJ.FileName = formMain.saveFileOBJ.FileName
                    Else
                        GoTo cancelExport
                    End If
                End If
            Else
                formMain.saveMesh(formMain.openFileOBJ.FileName)
            End If
        End If
        statusLblStatus.Text = "Successfully exported " & formMain.realMapName & "'s mesh."
        GoTo skipCancel
cancelExport:
        statusLblStatus.Text = "Cancelled exporting .obj mesh file."
skipCancel:
    End Sub

    Private Sub btnOpenMap_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnOpenMap.Click
        If (formMain.openFileMap.ShowDialog() = Windows.Forms.DialogResult.OK) Then
            formMain.openMap(formMain.openFileMap.FileName)
            refreshMapInfo("Map", formMain.pointCount)
            statusLblStatus.Text = "Status: Successfully changed map to " & formMain.realMapName
            loadExtraFunctions()
        End If
    End Sub
    Private Sub btnOpenCollision_Click(ByVal sender As System.Object, ByVal e As System.EventArgs)
        If (formMain.openFileOBJ.ShowDialog() = Windows.Forms.DialogResult.OK) Then
            formMain.openCollision(formMain.openFileOBJ.FileName)
            refreshMapInfo("Collision", formMain.pointCount)
            statusLblStatus.Text = "Status: Successfully opened new collision file."
        End If
    End Sub

    Public Sub refreshMapInfo(ByVal Type As String, ByVal NewVertices As Double)
        formMain.openFileOBJ.FileName = ""
        If (formMain.openFileMap.FileName <> "") Then
            lblFileName.Text = "Physical Map Name: " & Mid(formMain.openFileMap.FileName, formMain.openFileMap.FileName.LastIndexOf("\") + 2, formMain.openFileMap.FileName.LastIndexOf(".") - formMain.openFileMap.FileName.LastIndexOf("\") - 1)
            lblMapName.Text = "Internal Map Name: " & formMain.realMapName
        End If
        If (formMain.openFileOBJ.FileName <> "") Then
            lblMapMesh.Text = "Collision Name: " & Mid(formMain.openFileOBJ.FileName, formMain.openFileOBJ.FileName.LastIndexOf("\") + 2, formMain.openFileOBJ.FileName.LastIndexOf(".") - formMain.openFileOBJ.FileName.LastIndexOf("\") - 1)
        End If
        If (formMain.openFileMap.FileName = "" And formMain.openFileOBJ.FileName = "") Then
            btnImportCollision.Enabled = False
            btnExportCollision.Enabled = False
            btnImportMesh.Enabled = False
            btnExportMesh.Enabled = False
            btnImportCollision.ForeColor = Color.Red
            btnExportCollision.ForeColor = Color.Red
            btnImportMesh.ForeColor = Color.Red
            btnExportMesh.ForeColor = Color.Red
        ElseIf (formMain.openFileMap.FileName <> "" And formMain.openFileOBJ.FileName = "") Then
            btnImportCollision.Enabled = True
            btnExportCollision.Enabled = True
            btnImportMesh.Enabled = True
            btnExportMesh.Enabled = True
            btnImportCollision.ForeColor = Color.Green
            btnExportCollision.ForeColor = Color.Green
            btnImportMesh.ForeColor = Color.Green
            btnExportMesh.ForeColor = Color.Green
        ElseIf (formMain.openFileMap.FileName = "" And formMain.openFileOBJ.FileName <> "") Then
            btnImportCollision.Enabled = False
            btnExportCollision.Enabled = True
            btnImportMesh.Enabled = False
            btnExportMesh.Enabled = False
            btnImportCollision.ForeColor = Color.Red
            btnExportCollision.ForeColor = Color.Orange
            btnImportMesh.ForeColor = Color.Red
            btnExportMesh.ForeColor = Color.Red
        Else
            btnImportCollision.Enabled = True
            btnExportCollision.Enabled = True
            btnImportMesh.Enabled = True
            btnExportMesh.Enabled = True
            btnImportCollision.ForeColor = Color.Green
            btnExportCollision.ForeColor = Color.Orange
            btnImportMesh.ForeColor = Color.Green
            btnExportMesh.ForeColor = Color.Orange
        End If
        If (Type = "Map") Then
            mapCollCount = formMain.firstMeshVertex
            mapMeshCount = formMain.pointCount - formMain.firstMeshVertex
            lblMapCollision.Text = "Map Collision Vertices: " & mapCollCount
            lblMapMesh.Text = "Map Mesh Vertices: " & mapMeshCount
        End If
    End Sub

    Private Sub btnFlipMap_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnFlipMap.Click
        If (formMain.openFileMap.FileName = "" And formMain.openFileOBJ.FileName = "") Then Exit Sub

        Dim lowestPoint As Double = 0
        Dim highestPoint As Double = formMain.pointCount - 1
        If (radCollision.Checked = True) Then highestPoint = formMain.firstMeshVertex - 1
        If (radMesh.Checked = True) Then lowestPoint = formMain.firstMeshVertex

        progMain.Minimum = lowestPoint
        progMain.Maximum = highestPoint
        For i As Double = lowestPoint To highestPoint
            If (radFlipX.Checked = True) Then formMain.xval(i) = formMain.highestx - formMain.xval(i) + formMain.lowestx
            If (radFlipY.Checked = True) Then formMain.yval(i) = formMain.highesty - formMain.yval(i) + formMain.lowesty
            If (radFlipZ.Checked = True) Then formMain.zval(i) = formMain.highestz - formMain.zval(i) + formMain.lowestz
            progMain.Value = i
        Next
        progMain.Value = lowestPoint
        statusLblStatus.Text = "Successfully flipped map."
    End Sub
    Private Sub btnMorphMap_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnMorphMap.Click
        If (formMain.openFileMap.FileName = "" And formMain.openFileOBJ.FileName = "") Then Exit Sub

        Dim lowestPoint As Double = 0
        Dim highestPoint As Double = formMain.pointCount - 1
        If (radCollision.Checked = True) Then highestPoint = formMain.firstMeshVertex - 1
        If (radMesh.Checked = True) Then lowestPoint = formMain.firstMeshVertex

        Dim zratio As Single = formMain.highestz / formMain.lowestz

        Dim centerx As Double = (formMain.lowestx + formMain.highestx) / 2
        Dim centery As Double = (formMain.lowesty + formMain.highesty) / 2
        Dim radiusx As Double = formMain.highestx - centerx
        Dim radiusy As Double = formMain.highesty - centery
        Dim radius As Double = (radiusx + radiusy) / 2

        'If highestz is 100, ut farthest to the right is 37, assuming lowz is 0
        'would convert 37 to 100 dynamically using
        'val * (100 / 37) Or value * (highestz / radius)
        '
        'cannot add lowest value because- would move highest value up lowvalue amount
        'so maybe
        'lowz + val * ((100 - low) / 37)
        'something like that.
        'cone would be the same thing but you would subtract highest poss from lowest

        progMain.Minimum = lowestPoint
        progMain.Maximum = highestPoint
        For i As Integer = lowestPoint To highestPoint
            If (radMorphBowl.Checked = True) Then
                formMain.zval(i) = formMain.lowestz + formMain.distanceBetween(centerx, centery, formMain.xval(i), formMain.yval(i)) * ((formMain.highestz - formMain.lowestz) / radius)
            End If
            If (radMorphCone.Checked = True) Then
                MsgBox("Feature is not available in this version.")
                Exit Sub
                'formMain.zval(i) = formMain.lowestz + formMain.distanceBetween(centerx, centery, formMain.xval(i), formMain.yval(i)) * ((formMain.highestz - formMain.lowestz) / radius)
            End If
        Next
        progMain.Value = progMain.Minimum
        statusLblStatus.Text = "Successfully morphed map."
    End Sub

    Private Sub radFlipX_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles radFlipX.CheckedChanged
        If (radFlipX.Checked = True) Then
            radMesh.Enabled = False
            radBoth.Enabled = False
            radCollision.Checked = True
        Else
            radMesh.Enabled = True
            radBoth.Enabled = True
        End If
    End Sub
    Private Sub statusLblStatus_TextChanged(ByVal sender As Object, ByVal e As System.EventArgs) Handles statusLblStatus.TextChanged
        progMain.Size = New Size(statusMain.Width - statusLblStatus.Width - 4, progMain.Height)
    End Sub

    Private Sub loadExtraFunctions()
        For i As Integer = 0 To formMain.rtagcount - 1
            If (formMain.TagClass(i).ToLower = "mulg") Then
                mulgOffset = formMain.TagOffset(i)
            End If
        Next
        Dim j As Integer = 1
        For i As Integer = mulgOffset + 48 To (mulgOffset + 48) + (12 * 8) Step 12
            Dim rval As Single = Math.Round(formMain.convertToSingle(Chr(formMain.mapBytes(i)) & Chr(formMain.mapBytes(i + 1)) & Chr(formMain.mapBytes(i + 2)) & Chr(formMain.mapBytes(i + 3))) * 255)
            Dim gval As Single = Math.Round(formMain.convertToSingle(Chr(formMain.mapBytes(i + 4)) & Chr(formMain.mapBytes(i + 5)) & Chr(formMain.mapBytes(i + 6)) & Chr(formMain.mapBytes(i + 7))) * 255)
            Dim bval As Single = Math.Round(formMain.convertToSingle(Chr(formMain.mapBytes(i + 8)) & Chr(formMain.mapBytes(i + 9)) & Chr(formMain.mapBytes(i + 10)) & Chr(formMain.mapBytes(i + 11))) * 255)

            If (j = 1) Then picTeam1.BackColor = Color.FromArgb(255, rval, gval, bval)
            If (j = 2) Then picTeam2.BackColor = Color.FromArgb(255, rval, gval, bval)
            If (j = 3) Then picTeam3.BackColor = Color.FromArgb(255, rval, gval, bval)
            If (j = 4) Then picTeam4.BackColor = Color.FromArgb(255, rval, gval, bval)
            If (j = 5) Then picTeam5.BackColor = Color.FromArgb(255, rval, gval, bval)
            If (j = 6) Then picTeam6.BackColor = Color.FromArgb(255, rval, gval, bval)
            If (j = 7) Then picTeam7.BackColor = Color.FromArgb(255, rval, gval, bval)
            If (j = 8) Then picTeam8.BackColor = Color.FromArgb(255, rval, gval, bval)
            If (j = 9) Then picTeam9.BackColor = Color.FromArgb(255, rval, gval, bval)
            j = j + 1
        Next
        picTeamAll.BackColor = Color.FromArgb(255, Math.Round(Rnd() * 255), Math.Round(Rnd() * 255), Math.Round(Rnd() * 255))
    End Sub

#Region "Team Color Change Click Handlers"
    Private Sub picTeam1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles picTeam1.Click
        If (formMain.openFileMap.FileName <> "") Then
            colorMain.Color = picTeam1.BackColor
            If (colorMain.ShowDialog() = Windows.Forms.DialogResult.OK) Then
                changeTeamColor(picTeam1, 1, colorMain.Color)
            End If
        End If
    End Sub
    Private Sub picTeam2_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles picTeam2.Click
        If (formMain.openFileMap.FileName <> "") Then
            colorMain.Color = picTeam2.BackColor
            If (colorMain.ShowDialog() = Windows.Forms.DialogResult.OK) Then
                changeTeamColor(picTeam2, 2, colorMain.Color)
            End If
        End If
    End Sub
    Private Sub picTeam3_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles picTeam3.Click
        If (formMain.openFileMap.FileName <> "") Then
            colorMain.Color = picTeam3.BackColor
            If (colorMain.ShowDialog() = Windows.Forms.DialogResult.OK) Then
                changeTeamColor(picTeam3, 3, colorMain.Color)
            End If
        End If
    End Sub
    Private Sub picTeam4_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles picTeam4.Click
        If (formMain.openFileMap.FileName <> "") Then
            colorMain.Color = picTeam4.BackColor
            If (colorMain.ShowDialog() = Windows.Forms.DialogResult.OK) Then
                changeTeamColor(picTeam4, 4, colorMain.Color)
            End If
        End If
    End Sub
    Private Sub picTeam5_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles picTeam5.Click
        If (formMain.openFileMap.FileName <> "") Then
            colorMain.Color = picTeam5.BackColor
            If (colorMain.ShowDialog() = Windows.Forms.DialogResult.OK) Then
                changeTeamColor(picTeam5, 5, colorMain.Color)
            End If
        End If
    End Sub
    Private Sub picTeam6_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles picTeam6.Click
        If (formMain.openFileMap.FileName <> "") Then
            colorMain.Color = picTeam6.BackColor
            If (colorMain.ShowDialog() = Windows.Forms.DialogResult.OK) Then
                changeTeamColor(picTeam6, 6, colorMain.Color)
            End If
        End If
    End Sub
    Private Sub picTeam7_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles picTeam7.Click
        If (formMain.openFileMap.FileName <> "") Then
            colorMain.Color = picTeam7.BackColor
            If (colorMain.ShowDialog() = Windows.Forms.DialogResult.OK) Then
                changeTeamColor(picTeam7, 7, colorMain.Color)
            End If
        End If
    End Sub
    Private Sub picTeam8_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles picTeam8.Click
        If (formMain.openFileMap.FileName <> "") Then
            colorMain.Color = picTeam8.BackColor
            If (colorMain.ShowDialog() = Windows.Forms.DialogResult.OK) Then
                changeTeamColor(picTeam8, 8, colorMain.Color)
            End If
        End If
    End Sub
    Private Sub picTeam9_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles picTeam9.Click
        If (formMain.openFileMap.FileName <> "") Then
            colorMain.Color = picTeam9.BackColor
            If (colorMain.ShowDialog() = Windows.Forms.DialogResult.OK) Then
                changeTeamColor(picTeam9, 9, colorMain.Color)
            End If
        End If
    End Sub
    Private Sub picTeamAll_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles picTeamAll.Click
        If (formMain.openFileMap.FileName <> "") Then
            colorMain.Color = picTeamAll.BackColor
            If (MsgBox("Are you sure you want to change all the team colors to a single color?", MsgBoxStyle.YesNo Or MsgBoxStyle.Question, "Global Color Confirmation") = MsgBoxResult.Yes) Then
                If (colorMain.ShowDialog() = Windows.Forms.DialogResult.OK) Then
                    changeTeamColor(picTeam1, 1, colorMain.Color)
                    changeTeamColor(picTeam2, 2, colorMain.Color)
                    changeTeamColor(picTeam3, 3, colorMain.Color)
                    changeTeamColor(picTeam4, 4, colorMain.Color)
                    changeTeamColor(picTeam5, 5, colorMain.Color)
                    changeTeamColor(picTeam6, 6, colorMain.Color)
                    changeTeamColor(picTeam7, 7, colorMain.Color)
                    changeTeamColor(picTeam8, 8, colorMain.Color)
                    changeTeamColor(picTeam9, 9, colorMain.Color)
                    picTeamAll.BackColor = colorMain.Color
                End If
            End If
        End If
    End Sub
#End Region

    Private Sub changeTeamColor(ByVal sender As PictureBox, ByVal teamNumber As Integer, ByVal newColor As Color)
        If (formMain.openFileMap.FileName = "") Then Exit Sub

        sender.BackColor = newColor
        Dim colorOffset As Integer = (mulgOffset + 48) + (12 * (teamNumber - 1))
        Dim rval As String = "    "
        Dim gval As String = "    "
        Dim bval As String = "    "
        rval = formMain.convertToString(newColor.R / 255)
        gval = formMain.convertToString(newColor.G / 255)
        bval = formMain.convertToString(newColor.B / 255)
        formMain.mapBytes(colorOffset + 0) = Asc(Mid(rval, 1, 1))
        formMain.mapBytes(colorOffset + 1) = Asc(Mid(rval, 2, 1))
        formMain.mapBytes(colorOffset + 2) = Asc(Mid(rval, 3, 1))
        formMain.mapBytes(colorOffset + 3) = Asc(Mid(rval, 4, 1))

        formMain.mapBytes(colorOffset + 4) = Asc(Mid(gval, 1, 1))
        formMain.mapBytes(colorOffset + 5) = Asc(Mid(gval, 2, 1))
        formMain.mapBytes(colorOffset + 6) = Asc(Mid(gval, 3, 1))
        formMain.mapBytes(colorOffset + 7) = Asc(Mid(gval, 4, 1))

        formMain.mapBytes(colorOffset + 8) = Asc(Mid(bval, 1, 1))
        formMain.mapBytes(colorOffset + 9) = Asc(Mid(bval, 2, 1))
        formMain.mapBytes(colorOffset + 10) = Asc(Mid(bval, 3, 1))
        formMain.mapBytes(colorOffset + 11) = Asc(Mid(bval, 4, 1))
    End Sub
End Class