Public Class formMain
    Dim currentImage As Bitmap
    Dim tempString As String = ""

    Dim currentlyConverting As Boolean
    Dim convertButton As String = "Convert to Ascii"
    Dim acancelButton As String = "Cancel"

    Delegate Sub setTextCallback(ByVal [text] As String)
    Delegate Sub setMinorCallback(ByVal [prog] As String)
    Delegate Sub setProgCallback(ByVal [prog] As String)
    Private myThread As Threading.Thread = Nothing
    Private WithEvents backWorkConverter As System.ComponentModel.BackgroundWorker

    Private Sub menuBtnOpen_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles menuBtnOpen.Click
        If (openFileImage.ShowDialog() = Windows.Forms.DialogResult.OK) Then
            Dim workImage As New Bitmap(openFileImage.FileName)
            picPreview.Image = workImage
            currentImage = workImage
        End If
    End Sub
    Private Sub btnConvert_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnConvert.Click
        If (btnConvert.Text = convertButton) Then
            myThread = New Threading.Thread(AddressOf convertImage)
            myThread.Start()
            enableMainForm(False)
        Else
            myThread.Abort()
            enableMainForm(True)
        End If
    End Sub

    Private Sub convertImage()
        Try
            Dim tempColor As Color
            tempString = ""
            For y As Integer = 0 To currentImage.Height - 1 Step 2
                For x As Integer = 0 To currentImage.Width - 1 Step 2
                    tempColor = currentImage.GetPixel(x, y)
                    If ((CInt(tempColor.R) + CInt(tempColor.G) + CInt(tempColor.B)) * (CInt(tempColor.A) / 255) > 384) Then
                        tempString = tempString & " "
                    Else
                        tempString = tempString & "#"
                    End If
                    Me.SetMinor(CStr(x / currentImage.Width))
                Next
                Me.SetProgress(CStr(((y * currentImage.Width) / (currentImage.Width * currentImage.Height)) * 100))
                tempString = tempString & vbCrLf
            Next
            Me.SetText(tempString)
        Catch ex As Exception
            'No image has been loaded
            Me.SetText("")
        End Try
    End Sub

    Private Sub SetText(ByVal [text] As String)
        If (Me.txtAscii.InvokeRequired) Then
            Dim d As New setTextCallback(AddressOf SetText)
            Me.Invoke(d, New Object() {[text]})
        Else
            Me.txtAscii.Text = [text]
            enableMainForm(True)
        End If
    End Sub
    Private Sub SetMinor(ByVal [prog] As String)
        If (Me.progTotal.InvokeRequired) Then
            Dim d As New setMinorCallback(AddressOf SetMinor)
            Me.Invoke(d, New Object() {[prog]})
        Else
            progMinor.Value = CInt([prog])
        End If
    End Sub
    Private Sub SetProgress(ByVal [prog] As String)
        If (Me.progTotal.InvokeRequired) Then
            Dim d As New setProgCallback(AddressOf SetProgress)
            Me.Invoke(d, New Object() {[prog]})
        Else
            progTotal.Value = CInt([prog])
            lblProgress.Text = CStr(Math.Round(CInt([prog]), 2)) & "%"
        End If
    End Sub

    Private Sub formMain_FormClosing(ByVal sender As Object, ByVal e As System.Windows.Forms.FormClosingEventArgs) Handles Me.FormClosing
        Try
            Me.myThread.Abort(Nothing)
        Catch ex As Exception
            'If thread was never started
        End Try
    End Sub

    Private Sub enableMainForm(ByVal enabled As Boolean)
        menuMain.Enabled = enabled
        txtAscii.Enabled = enabled
        currentlyConverting = enabled
        If (enabled = True) Then
            btnConvert.Text = convertButton
        Else
            btnConvert.Text = acancelButton
        End If
    End Sub
End Class
