Imports System.IO

Public Class formMain
    Dim patchFolder As String = "aAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAa"
    Dim sourceFolder As String = "bBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBb"
    Dim destFolder As String = "cCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCc"

    Dim startMessage As String = "dDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDd"
    Dim endMessage As String = "eEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEe"

    Dim ext As String = ".map"

    Dim showStartMessage As Boolean = True
    Dim showEndMessage As Boolean = True
    Dim showTaskbar As Boolean = True
    Dim vbQuote As String = Chr(34)
    Dim currentDirectory As String = My.Application.Info.DirectoryPath

    Private Sub formMain_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        If (showTaskbar = True) Then Me.ShowInTaskbar = True

        patchFolder = spaceKill(patchFolder)
        sourceFolder = spaceKill(sourceFolder)
        destFolder = spaceKill(destFolder)

        startMessage = spaceKill(startMessage)
        endMessage = spaceKill(endMessage)

        If (My.Computer.FileSystem.DirectoryExists(currentDirectory & "\" & patchFolder) = False) Then
            MsgBox("Missing patch folder: " & patchFolder & "." & vbCrLf & "Please place the folder in the program directory and restart the program.", MsgBoxStyle.Critical, "Missing Patch Folder")
            End
        End If
        If (My.Computer.FileSystem.DirectoryExists(currentDirectory & "\" & sourceFolder) = False) Then
            MsgBox("Missing source folder: " & sourceFolder & "." & vbCrLf & "Please place the folder in the program directory and restart the program.", MsgBoxStyle.Critical, "Missing Source Folder")
            End
        End If
        If (My.Computer.FileSystem.DirectoryExists(currentDirectory & "\" & destFolder) = False) Then
            MsgBox("Missing destination folder: " & destFolder & "." & vbCrLf & "Please place the folder in the program directory and restart the program.", MsgBoxStyle.Critical, "Missing Destination Folder")
            End
        End If
        If (showStartMessage = True) Then MsgBox(startMessage, MsgBoxStyle.Exclamation)
        For Each Patch As String In My.Computer.FileSystem.GetFiles(patchFolder)
            Dim patchType As String = Mid(Patch, Patch.LastIndexOf(".") + 2, Patch.Length - Patch.LastIndexOf(".") - 1)
            If (patchType <> "ppf" And patchType <> "sppf" And patchType <> "mpf") Then GoTo nextPatch
            Dim mapName As String = ""
            Dim modName As String = ""
            Try
                mapName = Mid(Patch, Patch.IndexOf("(") + 2, Patch.IndexOf(")") - Patch.IndexOf("(") - 1)
                modName = Mid(Patch, Patch.IndexOf(")") + 2, Patch.LastIndexOf(".") - Patch.IndexOf(")") - 1)
            Catch ex As Exception
                If (MsgBox("Cannot determine map/mod name. One of the patch files is configured incorrectly." & vbCrLf & Patch & vbCrLf & vbCrLf & "Would you like to continue?", MsgBoxStyle.YesNo, "Error: Undeterminable Map/Mod Name") = MsgBoxResult.Yes) Then
                    GoTo nextPatch
                Else
                    Exit For
                End If
            End Try
            If (My.Computer.FileSystem.FileExists(currentDirectory & "\" & sourceFolder & "\" & mapName.ToLower & ext) = True) Then
mapExists:
                Try
                    My.Computer.FileSystem.CopyFile(currentDirectory & "\" & sourceFolder & "\" & mapName.ToLower & ext, currentDirectory & "\" & destFolder & "\" & modName & ext, True)
                Catch ex As Exception
                    MsgBox("Could not overwrite " & mapName & ext & " in the destination folder (" & destFolder & "). It may be write-protected or in use, if it is in use please close any other programs that are currently using this file. If possible, please remove all files in the destination folder to avoid program error on the next try.", MsgBoxStyle.Critical, "Critical Error: File Cannot be Copied")
                End Try
                applyPatch(Patch, currentDirectory & "\" & destFolder & "\" & modName & ext)
            Else
refindMap:
                Dim result As MsgBoxResult = MsgBox("Error: Missing required map file " & vbQuote & mapName & vbQuote & ", please put required maps in the source folder (" & sourceFolder & ") and click Yes once you have placed the map in the required folder, or click No if you want to skip patching this map. Cancel to stop all patching progress.", MsgBoxStyle.YesNoCancel, "Error: Missing Required Map")
                If (result = MsgBoxResult.Cancel) Then Exit For
                If (result = MsgBoxResult.No) Then GoTo nextPatch
                While (result = MsgBoxResult.Yes)
                    If (My.Computer.FileSystem.FileExists(currentDirectory & "\" & sourceFolder & "\" & mapName.ToLower) = True) Then
                        GoTo mapExists
                    Else
                        GoTo refindMap
                    End If
                End While
            End If
nextPatch:
        Next
        If (showEndMessage = True) Then MsgBox(endMessage, MsgBoxStyle.Exclamation)
        Me.Close()
    End Sub

    Public Sub applyPatch(ByVal Patch As String, ByVal File As String)
        Try
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
                applyppf(reader1, reader2, writer1, num1, num2, num6, num7)
                applyppf(reader1, reader2, writer1, num2, num3, num7, num8)
                applyppf(reader1, reader2, writer1, num3, num4, num8, num9)
                applyppf(reader1, reader2, writer1, num4, num5, num9, num10)
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
                            My.Computer.FileSystem.WriteAllBytes(File, byteToArray(patchStream.ReadByte), True)
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
        Catch ex As Exception
            If (MsgBox("Error while patching." & vbCrLf & Patch & vbCrLf & vbCrLf & "This patch will be skipped, would you like me to remove the invalid patch?", MsgBoxStyle.YesNo, "Error: Invalid Patch") = MsgBoxResult.Yes) Then
                My.Computer.FileSystem.DeleteFile(Patch)
            End If
        End Try
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
    Private Function tripleToInt(ByVal Triple As Byte()) As Integer
        If (Triple.Length <> 3) Then
            Return 0
            Exit Function
        End If
        Return CInt("&H" & Hex(Triple(0)) & Hex(Triple(1)) & Hex(Triple(2)))
    End Function
    Private Function byteToArray(ByVal ByteValue As Byte) As Byte()
        Dim newBytes(0) As Byte
        newBytes(0) = ByteValue
        Return newBytes
    End Function
    Private Function spaceKill(ByVal Text As String) As String
        Dim newString As String = Text
        If (Mid(newString, newString.Length - 1, 1) <> " ") Then GoTo endAndReturn
        Dim currentPos As Integer = newString.Length - 1
        Dim currentChar As String = " "
        While (currentChar = " ")
            currentChar = Mid(newString, currentPos, 1)
            currentPos = currentPos - 1
        End While
        newString = Mid(newString, 1, currentPos + 1)
endAndReturn:
        If (Mid(newString, newString.Length, 1) = " ") Then newString = Mid(newString, 1, newString.Length - 1)
        Return newString
    End Function

    Private Sub lblStatus_TextChanged(ByVal sender As Object, ByVal e As System.EventArgs) Handles lblStatus.TextChanged
        Me.Size = lblStatus.Size
    End Sub
End Class