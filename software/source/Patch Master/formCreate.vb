Imports System.IO

Public Class formCreate
    Dim vbQuote As String = Chr(34)
    Dim creationType As String = "nothing"

    Private Sub btnOpenOriginal_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnOpenOriginal.Click
        If (openFileMain.ShowDialog() = Windows.Forms.DialogResult.OK) Then
            txtOriginal.Text = openFileMain.FileName
            txtOriginal.Select(txtOriginal.Text.Length - 1, 0)
            fileChanged()
        End If
    End Sub
    Private Sub btnOpenModified_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnOpenModified.Click
        If (openFileMain.ShowDialog() = Windows.Forms.DialogResult.OK) Then
            txtModified.Text = openFileMain.FileName
            txtModified.Select(txtModified.Text.Length - 1, 0)
            saveFileMain.FileName = Mid(txtModified.Text, txtModified.Text.LastIndexOf("\") + 2, txtModified.Text.LastIndexOf(".") - txtModified.Text.LastIndexOf("\") - 1)
            fileChanged()
        End If
    End Sub
    Private Sub fileChanged()
        If (Mid(txtOriginal.Text, txtOriginal.Text.LastIndexOf(".") + 2, txtOriginal.Text.Length - txtOriginal.Text.LastIndexOf(".") - 1) = "map" And Mid(txtModified.Text, txtModified.Text.LastIndexOf(".") + 2, txtModified.Text.Length - txtModified.Text.LastIndexOf(".") - 1) = "map") Then
            cboxCreateSppf.Checked = True
            cboxCreateSppf.Enabled = True
        Else
            cboxCreateSppf.Checked = False
            cboxCreateSppf.Enabled = False
        End If
    End Sub

    Private Sub cboxCreatePpf_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cboxCreatePpf.CheckedChanged
        If (cboxCreatePpf.Checked = True) Then
            txtDescription.Enabled = True
            lblDescription.Enabled = True
        Else
            txtDescription.Enabled = False
            lblDescription.Enabled = False
        End If
        patchTypeChanged()
    End Sub
    Private Sub cboxCreateSppf_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cboxCreateSppf.CheckedChanged
        patchTypeChanged()
    End Sub
    Private Sub cboxCreateMppf_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cboxCreateMppf.CheckedChanged
        patchTypeChanged()
    End Sub

    Private Sub patchTypeChanged()
        If (cboxCreatePpf.Checked = True Or cboxCreateSppf.Checked = True Or cboxCreateMppf.Checked = True) Then
            btnCreatePatch.Enabled = True
        Else
            btnCreatePatch.Enabled = False
        End If

        If (cboxCreateMppf.Checked = True) Then
            cboxMppfDescription.Visible = True
        Else
            cboxMppfDescription.Visible = True
        End If

        If (cboxCreatePpf.Checked = True And cboxCreateSppf.Checked = False And cboxCreateMppf.Checked = False) Then
            saveFileMain.Filter = "Playstation Patch File (*.ppf)|*.ppf"
        ElseIf (cboxCreatePpf.Checked = False And cboxCreateSppf.Checked = True And cboxCreateMppf.Checked = False) Then
            saveFileMain.Filter = "Super Playstation Patch File (*.sppf)|*.sppf"
        ElseIf (cboxCreatePpf.Checked = True And cboxCreateSppf.Checked = True And cboxCreateMppf.Checked = False) Then
            saveFileMain.Filter = ".ppf and .sppf (*.ppf, *.sppf)|*.ppf;*.sppf"
        ElseIf (cboxCreatePpf.Checked = True And cboxCreateSppf.Checked = False And cboxCreateMppf.Checked = True) Then
            saveFileMain.Filter = ".ppf and .mpf (*.ppf, *.mpf)|*.ppf;*.mpf"
        ElseIf (cboxCreatePpf.Checked = False And cboxCreateSppf.Checked = True And cboxCreateMppf.Checked = True) Then
            saveFileMain.Filter = ".sppf and .mpf (*.sppf, *.mpf)|*.sppf;*.mpf"
        ElseIf (cboxCreatePpf.Checked = False And cboxCreateSppf.Checked = False And cboxCreateMppf.Checked = True) Then
            saveFileMain.Filter = "Master Playstation Patch File (*.mpf)|*.mpf"
        Else
            saveFileMain.Filter = ".ppf, .sppf, and .mpf (*.ppf, *.sppf, *.mpf)|*.ppf;*.sppf;*.mpf"
        End If
    End Sub

    Private Sub btnPatchPath_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnPatchPath.Click
        If (cboxCreatePpf.Checked = True Or cboxCreateSppf.Checked = True Or cboxCreateMppf.Checked = True) Then
            If (saveFileMain.ShowDialog() = Windows.Forms.DialogResult.OK) Then
                If (saveFileMain.FileName.Contains(".")) Then
                    txtPatch.Text = Mid(saveFileMain.FileName, 1, saveFileMain.FileName.LastIndexOf("."))
                Else
                    txtPatch.Text = Mid(saveFileMain.FileName, 1, saveFileMain.FileName.Length)
                End If
                txtPatch.Select(txtPatch.Text.Length - 1, 0)
            End If
        End If
    End Sub
    Private Sub btnCreatePatch_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnCreatePatch.Click
        If (cboxCreatePpf.Checked = True Or cboxCreateSppf.Checked = True Or cboxCreateMppf.Checked = True) Then
            createPatches()
        End If
    End Sub

    Public Sub createPatches()
        Try
            lblStatus.Text = "Status: Creating patches."

            progPpf.Value = 0
            progSppf.Value = 0
            progMppf.Value = 0
            If (txtOriginal.Text = "" Or txtModified.Text = "" Or My.Computer.FileSystem.FileExists(txtOriginal.Text) = False Or My.Computer.FileSystem.FileExists(txtModified.Text) = False) Then
                lblStatus.Text = "Status: Could not create patches."
                Exit Sub
            End If

            If (txtOriginal.Text = "" And txtModified.Text = "") Then
                MsgBox("You must select an original and modified file.")
                Exit Sub
            ElseIf (txtOriginal.Text = "") Then
                MsgBox("You must select an original file.")
                Exit Sub
            ElseIf (txtModified.Text = "") Then
                MsgBox("You must select a modified file.")
                Exit Sub
            End If

            If (My.Computer.FileSystem.FileExists(txtOriginal.Text) = False) Then
                MsgBox("Original file could not be found.")
                Exit Sub
            End If
            If (My.Computer.FileSystem.FileExists(txtModified.Text) = False) Then
                MsgBox("Modified file could not be found.")
                Exit Sub
            End If

            If (cboxCreatePpf.Checked = True) Then
                'Create a .ppf patch
                Dim ppf As String = txtPatch.Text & ".ppf"
                Dim ppfDescription As String = ""
                creationType = "ppf"

                If (My.Computer.FileSystem.FileExists(ppf) = True) Then
                    If (MsgBox("The patch file you are trying to create already exists. Are you sure you want to overwrite it?", MsgBoxStyle.YesNo, "Overwrite Existing Patch?") = MsgBoxResult.Yes) Then
                        Try
                            My.Computer.FileSystem.DeleteFile(ppf)
                        Catch ex As Exception
                            MsgBox("The patch file could not be deleted because it is currently in use.")
                            Exit Sub
                        End Try
                    Else
                        Exit Sub
                    End If
                End If

                My.Computer.FileSystem.WriteAllBytes(ppf, stringToBytes("PPF30"), False)
                My.Computer.FileSystem.WriteAllBytes(ppf, byteToArray(2), True)
                ppfDescription = txtDescription.Text
                For i As Integer = 0 To 49 - ppfDescription.Length
                    ppfDescription = ppfDescription & " "
                Next
                My.Computer.FileSystem.WriteAllBytes(ppf, stringToBytes(ppfDescription), True)
                Dim spacer(3) As Byte
                spacer(0) = 0
                spacer(1) = 0
                spacer(2) = 0
                spacer(3) = 0
                My.Computer.FileSystem.WriteAllBytes(ppf, spacer, True)

                Dim originalStream As New FileStream(txtOriginal.Text, FileMode.Open, FileAccess.Read, FileShare.Read)
                Dim original As New BinaryReader(originalStream)
                Dim modifiedStream As New FileStream(txtModified.Text, FileMode.Open, FileAccess.Read, FileShare.Read)
                Dim modified As New BinaryReader(originalStream)

                Dim difference As Boolean = False
                Dim currentBytes(My.Computer.FileSystem.GetFileInfo(txtOriginal.Text).Length - 1) As Byte
                Dim byteCount As Integer = 0

                For i As Integer = 0 To My.Computer.FileSystem.GetFileInfo(txtOriginal.Text).Length - 1
                    Dim o As Byte = originalStream.ReadByte
                    Dim m As Byte = modifiedStream.ReadByte
                    If (o <> m) Then
                        If (difference = False) Then
                            difference = True
                            currentBytes(byteCount) = m
                            byteCount = byteCount + 1
                        Else
                            currentBytes(byteCount) = m
                            byteCount = byteCount + 1
                            If (byteCount >= 255) Then
                                difference = False
                                My.Computer.FileSystem.WriteAllBytes(ppf, intEndian(i - byteCount + 1), True)
                                My.Computer.FileSystem.WriteAllBytes(ppf, spacer, True)
                                My.Computer.FileSystem.WriteAllBytes(ppf, intToBytes(byteCount), True)
                                If (byteCount > 1) Then
                                    My.Computer.FileSystem.WriteAllBytes(ppf, byteMid(currentBytes, 1, byteCount - 1), True)
                                Else
                                    My.Computer.FileSystem.WriteAllBytes(ppf, byteToArray(currentBytes(0)), True)
                                End If
                                byteCount = 0
                                progPpf.Value = (i / (My.Computer.FileSystem.GetFileInfo(txtOriginal.Text).Length - 1)) * progPpf.Maximum
                            End If
                        End If
                    Else
                        If (difference = True) Then
                            difference = False
                            My.Computer.FileSystem.WriteAllBytes(ppf, intEndian(i - byteCount), True)
                            My.Computer.FileSystem.WriteAllBytes(ppf, spacer, True)
                            My.Computer.FileSystem.WriteAllBytes(ppf, intToBytes(byteCount), True)
                            If (byteCount > 1) Then
                                My.Computer.FileSystem.WriteAllBytes(ppf, byteMid(currentBytes, 1, byteCount - 1), True)
                            Else
                                My.Computer.FileSystem.WriteAllBytes(ppf, byteToArray(currentBytes(0)), True)
                            End If
                            byteCount = 0
                            progPpf.Value = (i / (My.Computer.FileSystem.GetFileInfo(txtOriginal.Text).Length - 1)) * progPpf.Maximum
                        End If
                    End If
                Next
                'If end of file is reached, close up the file with the last change if present
                If (difference = True) Then
                    difference = False
                    My.Computer.FileSystem.WriteAllBytes(ppf, intEndian(My.Computer.FileSystem.GetFileInfo(txtOriginal.Text).Length - byteCount), True)
                    My.Computer.FileSystem.WriteAllBytes(ppf, spacer, True)
                    My.Computer.FileSystem.WriteAllBytes(ppf, intToBytes(byteCount), True)
                    If (byteCount > 1) Then
                        My.Computer.FileSystem.WriteAllBytes(ppf, byteMid(currentBytes, 1, byteCount - 1), True)
                    Else
                        My.Computer.FileSystem.WriteAllBytes(ppf, byteToArray(currentBytes(0)), True)
                    End If
                    byteCount = 0
                End If
                originalStream.Close()
                modifiedStream.Close()
                progPpf.Value = progPpf.Maximum
            End If

            If (cboxCreateSppf.Checked = True) Then
                'Create a .sppf patch
                Try
                    creationType = ".sppf"
                    Dim sppf As String = txtPatch.Text & ".sppf"
                    Dim stream1 As New FileStream(txtOriginal.Text, FileMode.Open, FileAccess.Read, FileShare.Read)
                    Dim stream2 As New FileStream(txtModified.Text, FileMode.Open, FileAccess.Read, FileShare.Read)
                    Dim stream3 As New FileStream(sppf, FileMode.Create, FileAccess.Write, FileShare.Write)
                    Dim reader1 As New BinaryReader(stream1)
                    Dim reader2 As New BinaryReader(stream2)
                    Dim writer1 As New BinaryWriter(stream3)
                    Dim num1 As Integer = 0
                    Dim num2 As Integer = 0
                    stream1.Seek(CType(352, Long), SeekOrigin.Begin)
                    stream2.Seek(CType(352, Long), SeekOrigin.Begin)
                    Dim num3 As Integer = reader1.ReadInt32
                    Dim num4 As Integer = reader2.ReadInt32
                    stream1.Seek(CType(344, Long), SeekOrigin.Begin)
                    stream2.Seek(CType(344, Long), SeekOrigin.Begin)
                    Dim num5 As Integer = reader1.ReadInt32
                    Dim num6 As Integer = reader2.ReadInt32
                    stream1.Seek(CType(16, Long), SeekOrigin.Begin)
                    stream2.Seek(CType(16, Long), SeekOrigin.Begin)
                    Dim num7 As Integer = reader1.ReadInt32
                    Dim num8 As Integer = reader2.ReadInt32
                    Dim num9 As Integer = CType(stream1.Length, Integer)
                    Dim num10 As Integer = CType(stream2.Length, Integer)
                    For i As Integer = 0 To 3
                        writer1.Write(0)
                    Next
                    progSppf.Value = 0.2 * progSppf.Maximum
                    Dim num11 As Integer = createSppf(reader1, reader2, writer1, num1, num3, num2, num4)
                    writer1.Seek(0, SeekOrigin.Begin)
                    writer1.Write(num11)
                    writer1.Seek(0, SeekOrigin.End)
                    num11 = createSppf(reader1, reader2, writer1, num3, num5, num4, num6)
                    progSppf.Value = 0.4 * progSppf.Maximum
                    writer1.Seek(4, SeekOrigin.Begin)
                    writer1.Write(num11)
                    writer1.Seek(0, SeekOrigin.End)
                    num11 = createSppf(reader1, reader2, writer1, num5, num7, num6, num8)
                    progSppf.Value = 0.6 * progSppf.Maximum
                    writer1.Seek(8, SeekOrigin.Begin)
                    writer1.Write(num11)
                    writer1.Seek(0, SeekOrigin.End)
                    num11 = createSppf(reader1, reader2, writer1, num7, num9, num8, num10)
                    progSppf.Value = 0.8 * progSppf.Maximum
                    writer1.Seek(12, SeekOrigin.Begin)
                    writer1.Write(num11)
                    writer1.Seek(0, SeekOrigin.End)
                    stream1.Close()
                    stream2.Close()
                    stream3.Close()
                    progSppf.Value = progSppf.Maximum
                Catch ex As Exception
                    MsgBox("Error: File is not a valid Halo 2 map file.", MsgBoxStyle.Exclamation, "Error")
                    progSppf.Value = 0
                    cboxCreateSppf.Enabled = False
                    cboxCreateSppf.Checked = False
                End Try
            End If

            If (cboxCreateMppf.Checked = True) Then
                'Create a .mpf patch
                Dim mpf As String = txtPatch.Text & ".mpf"
                Dim mpfDescription As String = ""
                creationType = ".mpf"

                If (My.Computer.FileSystem.FileExists(mpf) = True) Then
                    If (MsgBox("The patch file you are trying to create already exists. Are you sure you want to overwrite it?", MsgBoxStyle.YesNo, "Overwrite Existing Patch?") = MsgBoxResult.Yes) Then
                        Try
                            My.Computer.FileSystem.DeleteFile(mpf)
                        Catch ex As Exception
                            MsgBox("The patch file could not be deleted because it is currently in use.")
                            Exit Sub
                        End Try
                    Else
                        Exit Sub
                    End If
                End If

                My.Computer.FileSystem.WriteAllBytes(mpf, stringToBytes("MPF"), False)
                mpfDescription = txtDescription.Text
                If (mpfDescription = "" Or cboxMppfDescription.Checked = False) Then
                    My.Computer.FileSystem.WriteAllBytes(mpf, byteToArray(0), True)
                Else
                    My.Computer.FileSystem.WriteAllBytes(mpf, byteToArray(1), True)
                    My.Computer.FileSystem.WriteAllBytes(mpf, stringToBytes(mpfDescription), True)
                    My.Computer.FileSystem.WriteAllBytes(mpf, byteToArray(0), True)
                End If

                Dim originalStream As New FileStream(txtOriginal.Text, FileMode.Open, FileAccess.Read, FileShare.Read)
                Dim modifiedStream As New FileStream(txtModified.Text, FileMode.Open, FileAccess.Read, FileShare.Read)

                Dim difference As Boolean = False
                Dim currentBytes(My.Computer.FileSystem.GetFileInfo(txtOriginal.Text).Length - 1) As Byte
                Dim byteCount As Integer = 0

                Dim lowerFile As Integer = 0
                Dim higherFile As Integer = 0

                lowerFile = My.Computer.FileSystem.GetFileInfo(txtOriginal.Text).Length
                higherFile = My.Computer.FileSystem.GetFileInfo(txtModified.Text).Length

                If (lowerFile > higherFile) Then
                    Dim temp As Integer = higherFile
                    higherFile = lowerFile
                    lowerFile = temp
                End If

                For i As Integer = 0 To lowerFile - 1
                    Dim o As Byte = originalStream.ReadByte
                    Dim m As Byte = modifiedStream.ReadByte
                    If (o <> m) Then
                        If (difference = False) Then
                            difference = True
                            currentBytes(byteCount) = m
                            byteCount = byteCount + 1
                        Else
                            currentBytes(byteCount) = m
                            byteCount = byteCount + 1
                            If (byteCount >= CInt("&HFFFFFF")) Then
                                difference = False
                                My.Computer.FileSystem.WriteAllBytes(mpf, intEndian(i - byteCount + 1), True)
                                My.Computer.FileSystem.WriteAllBytes(mpf, intToTriple(byteCount), True)
                                If (byteCount > 1) Then
                                    My.Computer.FileSystem.WriteAllBytes(mpf, byteMid(currentBytes, 1, byteCount - 1), True)
                                Else
                                    My.Computer.FileSystem.WriteAllBytes(mpf, byteToArray(currentBytes(0)), True)
                                End If
                                byteCount = 0
                                progMppf.Value = (i / (My.Computer.FileSystem.GetFileInfo(txtOriginal.Text).Length - 1)) * progMppf.Maximum
                            End If
                        End If
                    Else
                        If (difference = True) Then
                            difference = False
                            My.Computer.FileSystem.WriteAllBytes(mpf, intEndian(i - byteCount), True)
                            My.Computer.FileSystem.WriteAllBytes(mpf, intToTriple(byteCount), True)
                            If (byteCount > 1) Then
                                My.Computer.FileSystem.WriteAllBytes(mpf, byteMid(currentBytes, 1, byteCount - 1), True)
                            Else
                                My.Computer.FileSystem.WriteAllBytes(mpf, byteToArray(currentBytes(0)), True)
                            End If
                            byteCount = 0
                            progMppf.Value = (i / (My.Computer.FileSystem.GetFileInfo(txtOriginal.Text).Length - 1)) * progMppf.Maximum
                        End If
                    End If
                Next
                'If end of file is reached, close up the file with the last change if present
                If (difference = True) Then
                    difference = False
                    My.Computer.FileSystem.WriteAllBytes(mpf, intEndian(higherFile - byteCount), True)
                    My.Computer.FileSystem.WriteAllBytes(mpf, intToTriple(byteCount), True)
                    If (byteCount > 1) Then
                        My.Computer.FileSystem.WriteAllBytes(mpf, byteMid(currentBytes, 1, byteCount - 1), True)
                    Else
                        My.Computer.FileSystem.WriteAllBytes(mpf, byteToArray(currentBytes(0)), True)
                    End If
                    byteCount = 0
                End If
                'Check if there is any addtions at the end of the file
                If (higherFile > lowerFile) Then
                    If (lowerFile = My.Computer.FileSystem.GetFileInfo(txtOriginal.Text).Length) Then
                        If (modifiedStream.Position >= lowerFile) Then
                            My.Computer.FileSystem.WriteAllBytes(mpf, byteToArray(Asc("++++")), True)
                            For c As Integer = lowerFile To higherFile - 1
                                Dim n As Byte = modifiedStream.ReadByte
                                My.Computer.FileSystem.WriteAllBytes(mpf, byteToArray(n), True)
                            Next
                        End If
                    Else
                        If (originalStream.Position >= lowerFile) Then
                            My.Computer.FileSystem.WriteAllBytes(mpf, byteToArray(Asc("++++")), True)
                            For c As Integer = lowerFile To higherFile
                                Dim n As Byte = originalStream.ReadByte
                                My.Computer.FileSystem.WriteAllBytes(mpf, byteToArray(n), True)
                            Next
                        End If
                    End If
                End If
                progMppf.Value = progMppf.Maximum
                originalStream.Close()
                modifiedStream.Close()
            End If

        Catch ex As Exception
            MsgBox("Unexpected error occured while creating patches." & vbCrLf & vbCrLf & "Error: " & ex.Message, MsgBoxStyle.Critical, "Error Creating Patches")
        End Try
        lblStatus.Text = "Status: Successfully created patches."
        timStall.Enabled = True
    End Sub

    Private Function createSppf(ByRef obr As BinaryReader, ByRef pbr As BinaryReader, ByRef pbw As BinaryWriter, ByVal ostart As Integer, ByVal oend As Integer, ByVal pstart As Integer, ByVal pend As Integer) As Integer
        Dim num1 As Integer = (oend - ostart)
        Dim num2 As Integer = (pend - pstart)
        Dim buffer1 As Byte() = New Byte(num1 - 1) {}
        obr.BaseStream.Seek(CType(ostart, Long), SeekOrigin.Begin)
        buffer1 = obr.ReadBytes(num1)
        Dim stream1 As New MemoryStream(buffer1)
        Dim reader1 As New BinaryReader(stream1)
        buffer1 = New Byte(num2 - 1) {}
        pbr.BaseStream.Seek(CType(pstart, Long), SeekOrigin.Begin)
        buffer1 = pbr.ReadBytes(num2)
        Dim stream2 As New MemoryStream(buffer1)
        Dim reader2 As New BinaryReader(stream2)
        Dim stream3 As New MemoryStream
        Dim writer1 As New BinaryWriter(stream3)
        Dim num3 As Integer = 0
        Dim num4 As Integer = 0
        Dim num6 As Integer = IIf((num1 > num2), num2, num1)
        Dim num5 As Integer
        For num5 = 0 To num6 - 1
            Dim num7 As Byte = reader1.ReadByte
            Dim num8 As Byte = reader2.ReadByte
            If ((num7 = num8) AndAlso (num4 > 0)) Then
                If (num5 < (num6 - 4)) Then
                    Dim num9 As Integer = reader1.ReadInt32
                    Dim num10 As Integer = reader2.ReadInt32
                    stream1.Seek(CType(-4, Long), SeekOrigin.Current)
                    stream2.Seek(CType(-4, Long), SeekOrigin.Current)
                    If (num9 <> num10) Then
                        writer1.Write(num8)
                        num4 += 1
                        GoTo Label_0163
                    End If
                End If
                stream3.Seek(CType(num3, Long), SeekOrigin.Begin)
                writer1.Write(num4)
                stream3.Seek(CType(0, Long), SeekOrigin.End)
                num4 = 0
            Else
                If (num7 <> num8) Then
                    If (num4 = 0) Then
                        writer1.Write(num5)
                        num3 = CType(stream3.Position, Integer)
                        writer1.Write(num5)
                        writer1.Write(num8)
                        num4 = 1
                    Else
                        writer1.Write(num8)
                        num4 += 1
                    End If
                End If
            End If
Label_0163:
        Next num5
        If (num4 > 0) Then
            stream3.Seek(CType(num3, Long), SeekOrigin.Begin)
            writer1.Write(num4)
            stream3.Seek(CType(0, Long), SeekOrigin.End)
            num4 = 0
        End If
        If (num2 > num6) Then
            writer1.Write(num1)
            writer1.Write(CType((num2 - num1), Integer))
            buffer1 = New Byte((num2 - num1) - 1) {}
            buffer1 = reader2.ReadBytes((num2 - num1))
            writer1.Write(buffer1)
        Else
            If (num1 > num6) Then
                writer1.Write(num2)
                writer1.Write(-1)
            End If
        End If
        stream3.WriteTo(pbw.BaseStream)
        Return CType(stream3.Length, Integer)
    End Function

    Private Function stringToBytes(ByVal Value As String) As Byte()
        Dim textBytes(Value.Length - 1) As Byte
        For i As Integer = 1 To textBytes.Length
            textBytes(i - 1) = Asc(Mid(Value, i, 1))
        Next
        Return textBytes
    End Function
    Private Function intToBytes(ByVal SingleInt As Integer) As Byte()
        Dim singleBytes(0) As Byte
        If (SingleInt > 255) Then
            singleBytes(0) = 255
            Return singleBytes
            Exit Function
        End If
        singleBytes(0) = SingleInt
        Return singleBytes
    End Function
    Private Function intToTriple(ByVal TripleInt As Integer) As Byte()
        Dim tripleBytes(2) As Byte
        If (TripleInt > CInt("&HFFFFFF")) Then
            tripleBytes(0) = 255
            tripleBytes(1) = 255
            tripleBytes(2) = 255
            Return tripleBytes
            Exit Function
        End If
        Dim stringVal As String = Hex(TripleInt)
        For i As Integer = stringVal.Length To 5
            stringVal = "0" & stringVal
        Next
        tripleBytes(0) = CInt("&H" & Mid(stringVal, 5, 2))
        tripleBytes(1) = CInt("&H" & Mid(stringVal, 3, 2))
        tripleBytes(2) = CInt("&H" & Mid(stringVal, 1, 2))
        Return tripleBytes
    End Function
    Private Function byteMid(ByVal ByteArray As Byte(), ByVal start As Integer, ByVal length As Integer) As Byte()
        Dim newBytes(0) As Byte
        If (length = 0 Or start < 0 Or start > ByteArray.Length - 1) Then
            Return newBytes
            Exit Function
        End If
        ReDim newBytes(length)
        For i As Integer = start - 1 To start + length - 1
            newBytes(i) = ByteArray(i)
        Next
        Return newBytes
    End Function
    Private Function intEndian(ByVal Value As Integer) As Byte()
        Dim hexValue As String = Hex(Value)
        For i As Integer = 0 To 7 - hexValue.Length
            hexValue = "0" & hexValue
        Next
        Dim ByteArray(3) As Byte
        ByteArray(0) = CInt("&H" & Mid(hexValue, 7, 2))
        ByteArray(1) = CInt("&H" & Mid(hexValue, 5, 2))
        ByteArray(2) = CInt("&H" & Mid(hexValue, 3, 2))
        ByteArray(3) = CInt("&H" & Mid(hexValue, 1, 2))
        Return ByteArray
    End Function
    Public Function byteToArray(ByVal ByteValue As Byte) As Byte()
        Dim newBytes(0) As Byte
        newBytes(0) = ByteValue
        Return newBytes
    End Function

    Private Sub txtOriginal_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles txtOriginal.TextChanged
        If (My.Computer.FileSystem.FileExists(txtOriginal.Text) And My.Computer.FileSystem.FileExists(txtModified.Text)) Then
            If (My.Computer.FileSystem.GetFileInfo(txtOriginal.Text).Length = My.Computer.FileSystem.GetFileInfo(txtModified.Text).Length) Then
                cboxCreatePpf.Enabled = True
            Else
                cboxCreatePpf.Enabled = False
                cboxCreatePpf.Checked = False
            End If
        End If
    End Sub
    Private Sub txtModified_TextChanged(ByVal sender As Object, ByVal e As System.EventArgs) Handles txtModified.TextChanged
        If (My.Computer.FileSystem.FileExists(txtOriginal.Text) And My.Computer.FileSystem.FileExists(txtModified.Text)) Then
            If (My.Computer.FileSystem.GetFileInfo(txtOriginal.Text).Length = My.Computer.FileSystem.GetFileInfo(txtModified.Text).Length) Then
                cboxCreatePpf.Enabled = True
            Else
                cboxCreatePpf.Enabled = False
                cboxCreatePpf.Checked = False
            End If
        End If
    End Sub

    Private Sub timDecrease_Tick(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles timDecrease.Tick
        Dim eachDecrease As Integer = 20
        Dim ppfNewVal As Integer = progPpf.Value - Math.Round(Rnd() * (eachDecrease * 2))
        Dim sppfNewVal As Integer = progSppf.Value - Math.Round(Rnd() * (eachDecrease * 2))
        Dim mpfNewVal As Integer = progMppf.Value - Math.Round(Rnd() * (eachDecrease * 2))
        If (ppfNewVal < 0) Then ppfNewVal = 0
        If (sppfNewVal < 0) Then sppfNewVal = 0
        If (mpfNewVal < 0) Then mpfNewVal = 0
        progPpf.Value = ppfNewVal
        progSppf.Value = sppfNewVal
        progMppf.Value = mpfNewVal
        timDecrease.Interval = timDecrease.Interval + 2
        If (progPpf.Value = 0 And progSppf.Value = 0 And progMppf.Value = 0) Then
            timDecrease.Enabled = False
            lblStatus.Text = "Status: Idle"
        End If
    End Sub
    Private Sub timStall_Tick(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles timStall.Tick
        timDecrease.Enabled = True
        timStall.Enabled = False
    End Sub
End Class