
Imports System.IO

Public Class formMain
    Dim fileExtension As String = ""
    Public programFiles As String = Environment.GetFolderPath(Environment.SpecialFolder.ProgramFiles)
    Public companyFolder As String = "\13 Willows"
    Public programFolder As String = "\Patch Master\"

#Region "    Program Variables"
    Dim vbQuote As String = Chr(34)
    Dim formGraphics As System.Drawing.Graphics

    Dim realnames() As String
    Dim names() As String
    Dim desktops() As String
    Dim oldrealnames() As String
    Dim oldnames() As String
    Dim olddesktops() As String
    Dim testerCount As Integer = 0
    Dim loggedIn As Boolean = False

    Dim betaString As String = "patchmaster"
    Dim currentDirectory As String = ""
#End Region

    Private Sub formMain_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        formGraphics = Me.CreateGraphics()

        Dim sharpensanother As String = "er"
        Dim so As String = "om/"
        Dim iron As String = "ww"
        Dim man As String = "est"
        Dim searnoevil As String = "3w"
        Dim sharpens As String = "tp"
        Dim proverbs2717 As String = "s.a"
        Dim speaknoevil As String = "ow"
        Dim liveonkaeps As String = "s.c"
        Dim one As String = "T"
        Dim asiron As String = "ht"
        Dim seenoevil As String = "w.1"
        Dim hearnoevil As String = "ill"

        logIn(False)

        Dim normalFont As Font = New Font(New FontFamily("Courier New"), 14, FontStyle.Bold, GraphicsUnit.Pixel)
        Me.Text = "Please wait, checking if you are on the list..."
        webBeta.Navigate(asiron & sharpens & "://" & iron & seenoevil & searnoevil & hearnoevil & speaknoevil & liveonkaeps & so & "Beta" & one & man & sharpensanother & proverbs2717 & "sp", "_self")
        moveAutopatcher()
    End Sub

    Private Sub fileChanged()
        grpApplyFile.Visible = False
        grpApplyPatch.Visible = False
        If (fileExtension = "ppf" Or fileExtension = "sppf" Or fileExtension = "mpf") Then
            grpApplyPatch.Visible = True
            grpApplyPatch.Location = New Point(grpApplyPatch.Location.X, 27)
        Else
            grpApplyFile.Visible = True
            grpApplyFile.Location = New Point(grpApplyFile.Location.X, 27)
        End If
    End Sub
    Private Sub patchChanged(ByVal Patch As String)
        If (grpPatchInfo.Visible = False) Then grpPatchInfo.Visible = True
        Dim patchType As String = Mid(Patch, Patch.LastIndexOf(".") + 2, Patch.Length - Patch.LastIndexOf(".") - 1)
        Dim patchStream As New FileStream(Patch, FileMode.Open, FileAccess.Read)
        If (patchType = "ppf") Then
            Dim ppfHeader As String = ""
            For i As Integer = 1 To 5
                ppfHeader = ppfHeader & Chr(patchStream.ReadByte())
            Next
            lblPatchHeader.Text = "Patch Header: " & ppfHeader
            patchStream.ReadByte()
            Dim ppfDescription As String = ""
            For i As Integer = 1 To 50
                Dim b As Char = Chr(patchStream.ReadByte())
                If (b = " ") Then Exit For
                ppfDescription = ppfDescription & b
            Next
            lblDescription.Text = "Description: " & ppfDescription
        ElseIf (patchType = "sppf") Then
            lblPatchHeader.Text = "Patch Header: (none)"
            lblDescription.Text = "Description: (none)"
        ElseIf (patchType = "mpf") Then
            Dim mpfHeader As String = ""
            For i As Integer = 1 To 3
                mpfHeader = mpfHeader & Chr(patchStream.ReadByte())
            Next
            lblPatchHeader.Text = "Patch Header: " & mpfHeader
            If (patchStream.ReadByte() = 1) Then
                Dim mpfDescription As String = ""
                Dim b As Byte = 14
                While (b <> 0)
                    b = patchStream.ReadByte()
                    mpfDescription = mpfDescription & Chr(b)
                End While
                lblDescription.Text = "Description: " & mpfDescription
            Else
                lblDescription.Text = "Description: (none)"
            End If
        End If
        patchStream.Close()
    End Sub

#Region "    Constant Functions"
    Private Sub menuBtnExit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnExit.Click
        Me.Close()
    End Sub
    Private Sub webBeta_DocumentCompleted(ByVal sender As System.Object, ByVal e As System.Windows.Forms.WebBrowserDocumentCompletedEventArgs) Handles webBeta.DocumentCompleted
        Dim source As String = webBeta.DocumentText
        Dim readRealName As Boolean = False
        Dim readName As Boolean = False
        Dim readDesktop As Boolean = False
        Dim currentTester As Integer = 0
        testerCount = 0

        Dim betaLength As Integer = betaString.Length

        For c As Integer = 1 To source.Length - 1
            If (Mid(source, c, betaLength + 2) = "[" & betaString & "]") Then
                testerCount = testerCount + 1
            End If
        Next

        ReDim realnames(testerCount - 1)
        ReDim names(testerCount - 1)
        ReDim desktops(testerCount - 1)
        ReDim oldrealnames(testerCount - 1)
        ReDim oldnames(testerCount - 1)
        ReDim olddesktops(testerCount - 1)

        For i As Integer = 0 To testerCount - 1
            oldrealnames(i) = ""
            oldnames(i) = ""
            olddesktops(i) = ""
            realnames(i) = ""
            names(i) = ""
            desktops(i) = ""
        Next

        For i As Integer = 1 To source.Length - 1
            If (Mid(source, i, betaLength + 2).ToLower = "[" & betaString & "]") Then
                readRealName = True
                i = i + 13
            End If

            If (readRealName = True) Then
                If (Mid(source, i, 1) = "|") Then
                    readRealName = False
                    readName = True
                    i = i + 1
                Else
                    oldrealnames(currentTester) = oldrealnames(currentTester) & Mid(source, i, 1)
                End If
            End If
            If (readName = True) Then
                If (Mid(source, i, 1) = "|") Then
                    readName = False
                    readDesktop = True
                    i = i + 1
                Else
                    oldnames(currentTester) = oldnames(currentTester) & Mid(source, i, 1)
                End If
            End If
            If (readDesktop = True) Then
                If (Mid(source, i, betaLength + 3) = "[/" & betaString & "]") Then
                    readDesktop = False
                    For s As Integer = 1 To oldrealnames(currentTester).Length Step 2
                        realnames(currentTester) = realnames(currentTester) & Chr(CInt("&H" & Mid(oldrealnames(currentTester), s, 2)))
                    Next
                    For s As Integer = 1 To oldnames(currentTester).Length Step 2
                        names(currentTester) = names(currentTester) & Chr(CInt("&H" & Mid(oldnames(currentTester), s, 2)))
                    Next
                    For s As Integer = 1 To olddesktops(currentTester).Length Step 2
                        desktops(currentTester) = desktops(currentTester) & Chr(CInt("&H" & Mid(olddesktops(currentTester), s, 2)))
                    Next
                    currentTester = currentTester + 1
                Else
                    olddesktops(currentTester) = olddesktops(currentTester) & Mid(source, i, 1)
                End If
            End If
        Next

        For u As Integer = 0 To names.Length - 1
            If (My.Computer.Name = names(u) And Environment.GetFolderPath(Environment.SpecialFolder.Desktop) = desktops(u)) Then
                Me.Text = "Welcome to Patch Master Beta " & realnames(u)
                formGraphics.Clear(Color.White)
                GoTo loggedIn
            End If
        Next

        Dim hexname As String = ""
        Dim hexdesktop As String = ""
        For i As Integer = 1 To My.Computer.Name.Length
            hexname = hexname & Hex(Asc(Mid(My.Computer.Name, i, 1)))
        Next
        For i As Integer = 1 To Environment.GetFolderPath(Environment.SpecialFolder.Desktop).Length
            hexdesktop = hexdesktop & Hex(Asc(Mid(Environment.GetFolderPath(Environment.SpecialFolder.Desktop), i, 1)))
        Next

        My.Computer.Clipboard.SetText("Patch Master|" & hexname & "|" & hexdesktop)
        Me.Text = "Sorry, you're not on the list."
        MsgBox("Please send the message " & vbQuote & "!beta" & vbQuote & " to TheWandererBot on AIM if you want a beta of this program.")
        loggedIn = False
        Exit Sub
loggedIn:
        loggedIn = True
        logIn(True)
        Me.Controls.Remove(webBeta)
        Me.Invalidate()
    End Sub
    Private Sub logIn(ByVal Enable As Boolean)
        menuMain.Enabled = Enable
    End Sub
#End Region

    Private Sub menuBtnOpen_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnOpen.Click
        If (openFileMain.ShowDialog() = Windows.Forms.DialogResult.OK) Then
            Dim fileName As String = openFileMain.FileName
            fileExtension = Mid(fileName, fileName.LastIndexOf(".") + 2, fileName.Length - fileName.LastIndexOf(".") - 1)
            fileChanged()
            If (fileExtension = "ppf" Or fileExtension = "sppf" Or fileExtension = "mpf") Then patchChanged(openFileMain.FileName)
        End If
    End Sub
    Private Sub menuBtnPatchCreator_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnPatchCreator.Click
        formCreate.Close()
        formCreate.Show()
    End Sub
    Private Sub menuBtnAutopatcher_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnAutopatcher.Click
        formAutopatcher.Close()
        formAutopatcher.Show()
    End Sub

    Private Sub btnSelectPatch_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnSelectPatch.Click
        If (openFilePatch.ShowDialog() = Windows.Forms.DialogResult.OK) Then
            txtPatchPath.Text = openFilePatch.FileName
            txtPatchPath.Select(txtPatchPath.Text.Length - 1, 0)
            patchChanged(openFilePatch.FileName)
        End If
    End Sub
    Private Sub btnSelectFile_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnSelectFile.Click
        If (fileExtension <> "ppf" And fileExtension <> "sppf" And fileExtension <> "mpf") Then Exit Sub
        If (fileExtension = "sppf") Then
            openFileFile.FilterIndex = 1
        Else
            openFileFile.FilterIndex = 2
        End If
        If (openFileFile.ShowDialog() = Windows.Forms.DialogResult.OK) Then
            Dim fileName As String = openFileFile.FileName
            Dim thisFileExtension As String = Mid(fileName, fileName.LastIndexOf(".") + 2, fileName.Length - fileName.LastIndexOf(".") - 1)
            If (fileExtension = "sppf" And thisFileExtension <> "map") Then
                MsgBox(".sppf patch files are not compatible with " & vbQuote & "." & thisFileExtension & vbQuote & " file extensions. Please select a Halo 2 Map File (*.map)")
            End If
            txtFilePath.Text = openFileFile.FileName
            txtFilePath.Select(txtFilePath.Text.Length - 1, 0)
        End If
    End Sub

    Private Sub btnApplyPatch_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnApplyPatch.Click
        applyPatch(txtPatchPath.Text, openFileMain.FileName)
    End Sub
    Private Sub btnApplyFile_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnApplyFile.Click
        applyPatch(openFileMain.FileName, txtFilePath.Text)
    End Sub

    Public Sub applyPatch(ByVal Patch As String, ByVal File As String)
        Dim patchExtension As String = Mid(Patch, Patch.LastIndexOf(".") + 2, Patch.Length - Patch.LastIndexOf(".") - 1)
        Dim thisExtension As String = Mid(File, File.LastIndexOf(".") + 2, File.Length - File.LastIndexOf(".") - 1)

        If (patchExtension <> "ppf" And patchExtension <> "sppf" And patchExtension <> "mpf") Then
            MsgBox("This is not a valid patch file.", MsgBoxStyle.Exclamation, "Error")
            Exit Sub
        End If
        If (patchExtension = "sppf" And thisExtension <> "map") Then
            MsgBox("Cannot patch files with sppf patch that are not of file type " & vbQuote & ".map" & vbQuote & ".", MsgBoxStyle.Exclamation, "Error")
            Exit Sub
        End If

        lblStatus.Text = "Status: Applying patch..."

        If (patchExtension = "ppf") Then
            'Apply ppf
            Dim fileStream As New FileStream(File, FileMode.Open, FileAccess.Write)
            Dim patchStream As New FileStream(Patch, FileMode.Open, FileAccess.Read)
            patchStream.Seek(60, SeekOrigin.Begin)
            While (patchStream.Position < patchStream.Length)
                Dim offset(3) As Byte
                For i As Integer = 0 To 3
                    offset(i) = patchStream.ReadByte()
                Next
                offset = Endian(offset)
                Dim realOffset As Integer = CInt("&H" & Hex(offset(0)) & Hex(offset(1)) & Hex(offset(2)) & Hex(offset(3)))
                patchStream.Seek(4, SeekOrigin.Current)
                Dim byteCount As Integer = patchStream.ReadByte()
                Dim writeBytes(byteCount - 1) As Byte
                For i As Integer = 0 To byteCount - 1
                    writeBytes(i) = patchStream.ReadByte()
                Next
                fileStream.Seek(realOffset, SeekOrigin.Begin)
                For i As Integer = 0 To byteCount - 1
                    fileStream.WriteByte(writeBytes(i))
                Next
            End While
        End If

        If (patchExtension = "sppf") Then
            'Apply sppf
            My.Computer.FileSystem.CopyFile(File, (File & ".sppf.tmp"), True)
            Dim stream1 As New FileStream((File & ".sppf.tmp"), FileMode.Open, FileAccess.ReadWrite, FileShare.ReadWrite)
            Dim stream2 As New FileStream(Patch, FileMode.Open, FileAccess.ReadWrite, FileShare.ReadWrite)
            Dim stream3 As New FileStream(File, FileMode.Create, FileAccess.ReadWrite, FileShare.ReadWrite)
            Dim reader1 As New BinaryReader(stream1)
            Dim reader2 As New BinaryReader(stream2)
            Dim writer1 As New BinaryWriter(stream3)
            Dim num1 As Integer = 0
            stream1.Seek(CType(352, Long), SeekOrigin.Begin)
            Dim num2 As Integer = reader1.ReadInt32
            stream1.Seek(CType(344, Long), SeekOrigin.Begin)
            Dim num3 As Integer = reader1.ReadInt32
            stream1.Seek(CType(16, Long), SeekOrigin.Begin)
            Dim num4 As Integer = reader1.ReadInt32
            Dim num5 As Integer = CType(stream1.Length, Integer)
            Dim num6 As Integer = 16
            Dim num7 As Integer = (num6 + reader2.ReadInt32)
            Dim num8 As Integer = (num7 + reader2.ReadInt32)
            Dim num9 As Integer = (num8 + reader2.ReadInt32)
            Dim num10 As Integer = (num9 + reader2.ReadInt32)
            Me.applyppf(reader1, reader2, writer1, num1, num2, num6, num7)
            Me.applyppf(reader1, reader2, writer1, num2, num3, num7, num8)
            Me.applyppf(reader1, reader2, writer1, num3, num4, num8, num9)
            Me.applyppf(reader1, reader2, writer1, num4, num5, num9, num10)
            stream1.Close()
            stream3.Close()
            stream2.Close()
            My.Computer.FileSystem.DeleteFile((File & ".sppf.tmp"))
        End If

        If (patchExtension = "mpf") Then
            'Apply mpf
            Dim fileStream As New FileStream(File, FileMode.Open, FileAccess.Write)
            Dim patchStream As New FileStream(Patch, FileMode.Open, FileAccess.Read)
            patchStream.Seek(3, SeekOrigin.Begin)
            If (patchStream.ReadByte() = 1) Then
                Dim b As Byte = 14
                While (b <> 0)
                    b = patchStream.ReadByte()
                End While
                patchStream.ReadByte()
            End If
            patchStream.Seek(-1, SeekOrigin.Current)

            While (patchStream.Position < patchStream.Length)
                Dim offset(3) As Byte
                For i As Integer = 0 To 3
                    offset(i) = patchStream.ReadByte()
                Next
                If (offset(0) = 43 And offset(1) = 43 And offset(2) = 43 And offset(3) = 43) Then
                    fileStream.Close()
                    For i As Integer = patchStream.Position To patchStream.Length - 1
                        My.Computer.FileSystem.WriteAllBytes(File, formCreate.byteToArray(patchStream.ReadByte), True)
                    Next
                    patchStream.Close()
                    Exit While
                End If
                offset = Endian(offset)
                Dim realOffset As Integer = CInt("&H" & Hex(offset(0)) & Hex(offset(1)) & Hex(offset(2)) & Hex(offset(3)))
                Dim byteOffset As Integer = patchStream.Position()
                Dim byteCount(2) As Byte
                For i As Integer = 0 To 2
                    byteCount(i) = patchStream.ReadByte()
                Next
                Array.Reverse(byteCount)
                Dim realByteCount As Integer = tripleToInt(byteCount)
                Dim writeBytes(realByteCount - 1) As Byte
                For i As Integer = 0 To realByteCount - 1
                    writeBytes(i) = patchStream.ReadByte()
                Next
                fileStream.Seek(realOffset, SeekOrigin.Begin)
                For i As Integer = 0 To realByteCount - 1
                    fileStream.WriteByte(writeBytes(i))
                Next
            End While
            patchStream.Close()
            fileStream.Close()
        End If

        lblStatus.Text = "Status: Successfully applied patch"
        timIdle.Enabled = True
    End Sub

    Private Sub applyppf(ByRef obr As BinaryReader, ByRef pbr As BinaryReader, ByRef pbw As BinaryWriter, ByVal ostart As Integer, ByVal oend As Integer, ByVal pstart As Integer, ByVal pend As Integer)
        Dim num1 As Integer = (oend - ostart)
        Dim num2 As Integer = (pend - pstart)
        Dim buffer1 As Byte() = New Byte(num1 - 1) {}
        obr.BaseStream.Seek(CType(ostart, Long), SeekOrigin.Begin)
        buffer1 = obr.ReadBytes(num1)
        Dim stream1 As New MemoryStream
        Dim writer1 As New BinaryWriter(stream1)
        writer1.Write(buffer1)
        If (num2 = 0) Then
            stream1.WriteTo(pbw.BaseStream)
        Else
            Dim num5 As Integer
            buffer1 = New Byte(num2 - 1) {}
            pbr.BaseStream.Seek(CType(pstart, Long), SeekOrigin.Begin)
            buffer1 = pbr.ReadBytes(num2)
            Dim stream2 As New MemoryStream(buffer1)
            Dim reader1 As New BinaryReader(stream2)
            Dim num3 As Integer = 0
            Do While (num3 < num2)
                Dim num4 As Integer = reader1.ReadInt32
                stream1.Seek(CType(num4, Long), SeekOrigin.Begin)
                num5 = reader1.ReadInt32
                num3 = (num3 + 8)
                If (num5 = -1) Then
                    stream1.SetLength(stream1.Position)
                    Exit Do
                End If
                buffer1 = New Byte(num5 - 1) {}
                buffer1 = reader1.ReadBytes(num5)
                writer1.Write(buffer1)
                num3 = (num3 + num5)
            Loop
            stream1.WriteTo(pbw.BaseStream)
        End If
    End Sub

    Private Sub timIdle_Tick(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles timIdle.Tick
        lblStatus.Text = "Status: Idle"
        timIdle.Enabled = False
    End Sub
    Private Function Endian(ByVal Value() As Byte) As Byte()
        Dim newBytes(3) As Byte
        For i As Integer = 0 To 3
            newBytes(i) = 0
        Next
        If (Value.Length <> 4) Then
            Return newBytes
            Exit Function
        End If
        For i As Integer = 0 To 3
            newBytes(i) = Value(3 - i)
        Next
        Return newBytes
    End Function
    Private Function tripleToInt(ByVal Triple As Byte()) As Integer
        If (Triple.Length <> 3) Then
            Return 0
            Exit Function
        End If
        Return CInt("&H" & Hex(Triple(0)) & Hex(Triple(1)) & Hex(Triple(2)))
    End Function

    Private Sub moveAutopatcher()
        If (My.Computer.FileSystem.FileExists(programFiles & companyFolder & programFolder & "autopatcher.dat") = False) Then
            If (My.Computer.FileSystem.FileExists(programFiles & companyFolder & programFolder) = False) Then
                If (My.Computer.FileSystem.FileExists(programFiles & companyFolder) = False) Then
                    If (My.Computer.FileSystem.FileExists(programFiles) = False) Then
                        My.Computer.FileSystem.CreateDirectory(programFiles)
                    End If
                    My.Computer.FileSystem.CreateDirectory(programFiles & companyFolder)
                End If
                My.Computer.FileSystem.CreateDirectory(programFiles & companyFolder & programFolder)
            End If

            If (My.Computer.FileSystem.FileExists(My.Application.Info.DirectoryPath & "\autopatcher.dat")) Then
                My.Computer.FileSystem.MoveFile(My.Application.Info.DirectoryPath & "\autopatcher.dat", programFiles & companyFolder & programFolder & "autopatcher.dat")
            Else
                menuBtnAutopatcher.Enabled = False
                MsgBox("Cannot find autopatcher.dat generation file, please redownload the program and/or place the autopatcher.dat file in the same folder as the program. Without this file you will be unable to generate autopatchers.", MsgBoxStyle.Information, "Missing autopatcher.dat Generation File")
            End If
        End If
        If (My.Computer.FileSystem.FileExists(programFiles & companyFolder & programFolder & "autopatcher.dat") = True And My.Computer.FileSystem.FileExists(My.Application.Info.DirectoryPath & "\autopatcher.dat") = True) Then
            My.Computer.FileSystem.DeleteFile(My.Application.Info.DirectoryPath & "\autopatcher.dat")
            MsgBox("The autopatcher.dat file has already been copied, therefore, it is unnecessary to have to worry about the autopatcher.dat file anymore and it has been deleted. You will still be able to generate autopatchers.")
        End If
    End Sub
    Private Sub menuBtnAbout_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnAbout.Click
        formAbout.Close()
        formAbout.Show()
    End Sub
End Class