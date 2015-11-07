Public Class formMain
    Dim ByteArray() As Byte, FileName As String
    Dim tmp1, tmp2, tmp3, tmp4, tmp5 As String
    Dim fileSize As Long
    Dim indexHeader, indexMagic, mapMagic As String
    Dim StringTableOff As String
    Dim TagCount As String
    Dim RealTagOff As String
    Dim RealTagCount As String
    Dim EndTagOff As String
    Dim rtagcount As Integer
    Dim TagID() As Double
    Dim TagOffset() As Double
    Dim TagMetaSize() As Double
    Dim TagClass() As String
    Dim TagName() As String

    Dim vehicleID() As Double
    Dim vehicleOffset() As Double
    Dim vehicleMetaSize() As Double
    Dim vehicleClass() As String
    Dim vehicleName() As String
    Dim vehicleCount As Integer

    Dim j, i, c As Integer

    Private Function Load4Hex(ByRef singlebyte As Double, ByVal r As Boolean) As Double
        tmp1 = Hex(ByteArray(singlebyte + 0))
        tmp2 = Hex(ByteArray(singlebyte + 1))
        tmp3 = Hex(ByteArray(singlebyte + 2))
        tmp4 = Hex(ByteArray(singlebyte + 3))
        If Len(tmp1) = 1 Then tmp1 = "0" + tmp1
        If Len(tmp2) = 1 Then tmp2 = "0" + tmp2
        If Len(tmp3) = 1 Then tmp3 = "0" + tmp3
        If Len(tmp4) = 1 Then tmp4 = "0" + tmp4
        If r = True Then
            tmp5 = tmp4 + tmp3 + tmp2 + tmp1
        Else
            tmp5 = tmp1 + tmp2 + tmp3 + tmp4
        End If
        Load4Hex = HexToDec(tmp5)
    End Function

    Private Function HexToDec(ByVal HexStr As String) As Double
        Dim mult As Double
        Dim DecNum As Double
        Dim ch As String
        Dim i As Integer
        mult = 1
        DecNum = 0
        For i = Len(HexStr) To 1 Step -1
            ch = Mid(HexStr, i, 1)
            If (ch >= "0") And (ch <= "9") Then
                DecNum = DecNum + (Val(ch) * mult)
            Else
                If (ch >= "A") And (ch <= "F") Then
                    DecNum = DecNum + ((Asc(ch) - Asc("A") + 10) * mult)
                Else
                    If (ch >= "a") And (ch <= "f") Then
                        DecNum = DecNum + ((Asc(ch) - Asc("a") + 10) * mult)
                    Else
                        HexToDec = 0
                        Exit Function
                    End If
                End If
            End If
            mult = mult * 16
        Next i
        HexToDec = DecNum
    End Function

    Private Function Load4String(ByRef Offset As Double, ByVal r As Boolean) As String
        tmp1 = Chr(ByteArray(Offset + 0))
        tmp2 = Chr(ByteArray(Offset + 1))
        tmp3 = Chr(ByteArray(Offset + 2))
        tmp4 = Chr(ByteArray(Offset + 3))
        If r = False Then
            Load4String = tmp1 + tmp2 + tmp3 + tmp4
        Else
            Load4String = tmp4 + tmp3 + tmp2 + tmp1
        End If
    End Function

    Private Sub btnOpenMap_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnOpenMap.Click
        If (openFileMain.ShowDialog() = Windows.Forms.DialogResult.OK) Then
            ByteArray = My.Computer.FileSystem.ReadAllBytes(openFileMain.FileName)
            fileSize = My.Computer.FileSystem.GetFileInfo(openFileMain.FileName).Length
            lblFileSize.Text = "File Size: " & Math.Round(fileSize / 1000) / 1000 & " MB"

            indexHeader = Load4Hex(16, True)
            indexMagic = Load4Hex(indexHeader, True) - (Load4Hex(16, True) + 32)
            mapMagic = Load4Hex((Load4Hex(indexHeader + 8, True) - indexMagic) + 8, True) - (indexHeader + Load4Hex(20, True))

            lblIndexHeader.Text = "Index Header: 0x" & Hex(indexHeader)
            lblIndexMagic.Text = "Index Magic: 0x" & Hex(indexMagic)
            lblMapMagic.Text = "Map Magic: 0x" & Hex(mapMagic)
            lblMapName.Text = "Map Name: " & Mid( _
                    Mid(openFileMain.FileName, openFileMain.FileName.LastIndexOf("\") + 2, _
                    openFileMain.FileName.Length - openFileMain.FileName.LastIndexOf("\") - 1), _
                    1, 1).ToUpper & _
                    Mid(openFileMain.FileName, openFileMain.FileName.LastIndexOf("\") + 3, _
                    openFileMain.FileName.Length - openFileMain.FileName.LastIndexOf("\") - 1)

            StringTableOff = Load4Hex(708, True)

            TagCount = Load4Hex(indexHeader + 4, True)
            RealTagOff = indexHeader + 32 + TagCount * 12
            RealTagCount = Load4Hex(indexHeader + 24, True)
            EndTagOff = RealTagOff + RealTagCount * 16
            rtagcount = RealTagCount
            ReDim TagClass(0 To rtagcount + 1)
            ReDim TagID(0 To rtagcount + 1)
            ReDim TagOffset(0 To rtagcount + 1)
            ReDim TagMetaSize(0 To rtagcount + 1)
            ReDim TagName(0 To rtagcount + 1)

            Dim TmpOff As Double = 0
            Dim TmpName As String = ""
            j = 1
            Do
                If ByteArray(StringTableOff + TmpOff) = 0 Then
                    TagName(j) = TmpName
                    TmpName = ""
                    j = j + 1
                    Do
                        TmpOff = TmpOff + 1
                    Loop Until ByteArray(StringTableOff + TmpOff) <> 0
                    TmpOff = TmpOff - 1
                Else
                    TmpName = TmpName + Chr(ByteArray(StringTableOff + TmpOff))
                End If
                TmpOff = TmpOff + 1
            Loop Until j = RealTagCount + 1

            j = 0
            For i = RealTagOff To EndTagOff - 1 Step 16
                j = j + 1
                TagClass(j) = Load4String(i + 0, True)
                TagID(j) = Load4Hex(i + 4, True)
                TagOffset(j) = Load4Hex(i + 8, True) - mapMagic
                TagMetaSize(j) = Load4Hex(i + 12, True)
            Next i

            'Count number of vehicles
            j = 0
            For c = 0 To RealTagCount + 1
                If (TagClass(c) = "ligh") Then
                    j = j + 1
                End If
            Next
            vehicleCount = j
            'Resize arrays to be the right size according to the number of vehicles
            ReDim vehicleClass(0 To vehicleCount)
            ReDim vehicleID(0 To vehicleCount)
            ReDim vehicleOffset(0 To vehicleCount)
            ReDim vehicleMetaSize(0 To vehicleCount)
            ReDim vehicleName(0 To vehicleCount)
            'Fill in array for vehicles
            i = 0
            For c = 0 To RealTagCount + 1
                If (TagClass(c) = "ligh") Then
                    j = j + 1
                    vehicleClass(i) = TagClass(c)
                    vehicleID(i) = TagID(c)
                    vehicleOffset(i) = TagOffset(c)
                    vehicleMetaSize(i) = TagMetaSize(c)
                    vehicleName(i) = TagName(c)
                    i = i + 1
                End If
            Next
            lblVehicles.Text = "Lights: " & vehicleCount & " lights"
            'Begin of program and organization of tags to make program have a use.
            c = 0
            comboVehicles.Items.Clear()
            For c = 0 To RealTagCount + 1
                If (TagClass(c) = "ligh") Then
                    comboVehicles.Items.Add( _
                    Mid( _
                    Mid(TagName(c), TagName(c).LastIndexOf("\") + 2, _
                    TagName(c).Length - TagName(c).LastIndexOf("\") - 1), _
                    1, 1).ToUpper & _
                    Mid(TagName(c), TagName(c).LastIndexOf("\") + 3, _
                    TagName(c).Length - TagName(c).LastIndexOf("\") - 1))
                End If
            Next
            comboVehicles.Enabled = True
            comboVehicles.Visible = True
            btnSaveMap.Enabled = True
        End If
    End Sub

    Private Sub comboVehicles_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles comboVehicles.SelectedIndexChanged
        lblSVName.Text = "Name: " & _
        vehicleName(comboVehicles.SelectedIndex)
        lblSVOffset.Text = "Offset in Map: 0x" & _
        Hex(vehicleOffset(comboVehicles.SelectedIndex))
        cboxFlying.Enabled = True
        cboxFlying.Checked = False
        cboxFireWeapon.Checked = False
        cboxEnableHUD.Checked = False
        cboxAllFlying.Checked = False
        If (ByteArray(vehicleOffset(comboVehicles.SelectedIndex) + 496) > 3) Then
            cboxFlying.Checked = True
        End If
        If (ByteArray(vehicleOffset(comboVehicles.SelectedIndex) + 1438) > 3) Then
            cboxFireWeapon.Checked = True
        End If
        If (ByteArray(vehicleOffset(comboVehicles.SelectedIndex) + 1436) > 19) Then
            cboxEnableHUD.Checked = True
        End If
        If (ByteArray(vehicleOffset(comboVehicles.SelectedIndex) + 1612) > 73 And ByteArray(vehicleOffset(comboVehicles.SelectedIndex) + 1614) > 3 And ByteArray(vehicleOffset(comboVehicles.SelectedIndex) + 1672) > 3) Then
            cboxAllFlying.Checked = True
        End If
        If (vehicleName(comboVehicles.SelectedIndex) = "objects\vehicles\warthog\warthog") Then
            cboxAllFlying.Enabled = True
            cboxFireWeapon.Enabled = True
            cboxEnableHUD.Enabled = True
            lblWarthogOnly.Visible = False
            lblWarthogOnly2.Visible = False
            lblWarthogOnly3.Visible = False
        Else
            cboxAllFlying.Enabled = False
            cboxFireWeapon.Enabled = False
            cboxEnableHUD.Enabled = False
            lblWarthogOnly.Visible = True
            lblWarthogOnly2.Visible = True
            lblWarthogOnly3.Visible = True
        End If
        If cboxAllFlying.Checked = True Then cboxFlying.Enabled = False
    End Sub

    Private Sub btnSaveMap_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnSaveMap.Click
        btnSaveMap.Enabled = False
        lblMapSaved.Text = "Saving Map..."
        lblMapSaved.Visible = True
        My.Computer.FileSystem.WriteAllBytes(openFileMain.FileName, ByteArray, False)
        btnSaveMap.Enabled = True
        lblMapSaved.Text = "Map Saved! (Resign the map)"
        timerAfterSave.Enabled = True
    End Sub

    Private Sub cboxFlying_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles cboxFlying.Click
        If (cboxFlying.Checked = True) Then
            ByteArray(vehicleOffset(comboVehicles.SelectedIndex) + 496) += 4
        Else
            ByteArray(vehicleOffset(comboVehicles.SelectedIndex) + 496) -= 4
        End If
    End Sub

    Private Sub timerAfterSave_Tick(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles timerAfterSave.Tick
        lblMapSaved.Visible = False
        timerAfterSave.Enabled = False
    End Sub

    Private Sub cboxAllFlying_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles cboxAllFlying.Click
        If (cboxAllFlying.Checked = True) Then
            ByteArray(vehicleOffset(comboVehicles.SelectedIndex) + 1612) += 4
            ByteArray(vehicleOffset(comboVehicles.SelectedIndex) + 1614) += 4
            ByteArray(vehicleOffset(comboVehicles.SelectedIndex) + 1672) += 4
            If (ByteArray(vehicleOffset(comboVehicles.SelectedIndex) + 496) < 4) Then
                ByteArray(vehicleOffset(comboVehicles.SelectedIndex) + 496) += 4
            End If
            cboxFlying.Checked = True
            cboxFlying.Enabled = False
        Else
            ByteArray(vehicleOffset(comboVehicles.SelectedIndex) + 1612) -= 4
            ByteArray(vehicleOffset(comboVehicles.SelectedIndex) + 1614) -= 4
            ByteArray(vehicleOffset(comboVehicles.SelectedIndex) + 1672) -= 4
            cboxFlying.Enabled = True
        End If
    End Sub

    Private Sub cboxFireWeapon_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles cboxFireWeapon.Click
        If (cboxFireWeapon.Checked = True) Then
            ByteArray(vehicleOffset(comboVehicles.SelectedIndex) + 1438) += 4
        Else
            ByteArray(vehicleOffset(comboVehicles.SelectedIndex) + 1438) -= 4
        End If
    End Sub

    Private Sub cboxEnableHUD_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles cboxEnableHUD.Click
        If (cboxEnableHUD.Checked = True) Then
            ByteArray(vehicleOffset(comboVehicles.SelectedIndex) + 1436) += 20
        Else
            ByteArray(vehicleOffset(comboVehicles.SelectedIndex) + 1436) -= 20
        End If
    End Sub
End Class
