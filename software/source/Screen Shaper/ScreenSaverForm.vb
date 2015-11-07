Public Class ScreenSaverForm

    Private isActive As Boolean = False
    Private mouseLocation As Point
    Dim lineDirection As Integer = 270
    Dim lineEnd As Point
    Dim fullEnd As Point
    Dim lineLength As Integer = 200

    Dim incrementRed As Boolean = True
    Dim incrementGreen As Boolean = True
    Dim incrementBlue As Boolean = True

    Dim maxIncrementValue As Integer = 20
    Dim oldLineLength(360) As Integer

    Dim redValue As Integer = 0
    Dim greenValue As Integer = 0
    Dim blueValue As Integer = 0

    Dim backgroundPen As Pen = Pens.Black
    'Program and folder settings
    Dim commonPath As String = System.Environment.GetFolderPath(Environment.SpecialFolder.CommonProgramFiles)
    Dim commonDir As String = "\13 Willows"
    Dim programDir As String = "\Screen Shaper"
    Dim settingsFile As String = "\settings.ini"
    Dim fullPath As String = commonPath & commonDir & programDir & settingsFile

    'Customizable Settings
    Dim spinInc As Integer = 1
    Dim spinSpeed As Integer = 97
    Dim useRed As Boolean = False
    Dim useGreen As Boolean = False
    Dim useBlue As Boolean = False
    Dim rotateClockwise As Boolean = False
    Dim spinClear As Boolean = False

    Private Sub ScreenSaverForm_MouseMove(ByVal sender As Object, ByVal e As MouseEventArgs) Handles Me.MouseMove
        If Not isActive Then
            mouseLocation = MousePosition
            isActive = True
        Else
            If Math.Abs(MousePosition.X - mouseLocation.X) > 10 OrElse Math.Abs(MousePosition.Y - mouseLocation.Y) > 10 Then
                Close()
            End If
        End If
    End Sub
    Private Sub ScreenSaverForm_KeyDown(ByVal sender As Object, ByVal e As KeyEventArgs) Handles Me.KeyDown
        Close()
    End Sub
    Private Sub ScreenSaverForm_MouseDown(ByVal sender As Object, ByVal e As MouseEventArgs) Handles Me.MouseDown
        Close()
    End Sub
    Private Sub timSpin_Tick(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles timSpin.Tick
        If (Me.Focused = False) Then Me.Focus()

        Dim myPen As New System.Drawing.Pen(System.Drawing.Color.Lime)
        Dim myGraphics As System.Drawing.Graphics
        myGraphics = Me.CreateGraphics()

        If (redValue <= 0) Then incrementRed = True
        If (greenValue <= 0) Then incrementGreen = True
        If (blueValue <= 0) Then incrementBlue = True
        If (redValue >= 255) Then incrementRed = False
        If (greenValue >= 255) Then incrementGreen = False
        If (blueValue >= 255) Then incrementBlue = False

        If (useRed = True) Then
            If (incrementRed = True) Then
                redValue = redValue + Rnd() * maxIncrementValue
            Else
                redValue = redValue - Rnd() * maxIncrementValue
            End If
        End If
        If (useGreen = True) Then
            If (incrementGreen = True) Then
                greenValue = greenValue + Rnd() * maxIncrementValue
            Else
                greenValue = greenValue - Rnd() * maxIncrementValue
            End If
        End If
        If (useBlue) Then
            If (incrementBlue = True) Then
                blueValue = blueValue + Rnd() * maxIncrementValue
            Else
                blueValue = blueValue - Rnd() * maxIncrementValue
            End If
        End If

        'Safecheck to make sure no values are below 0 or above 255
        If (redValue > 255) Then redValue = 255
        If (greenValue > 255) Then greenValue = 255
        If (blueValue > 255) Then blueValue = 255
        If (redValue < 0) Then redValue = 0
        If (greenValue < 0) Then greenValue = 0
        If (blueValue < 0) Then blueValue = 0
        'Set the pen color
        myPen.Color = Color.FromArgb(255, redValue, greenValue, blueValue)

        If (spinClear = True) Then
            Dim tempLineDirection As Integer = lineDirection
            If (rotateClockwise = True) Then
                tempLineDirection = tempLineDirection - spinInc
            Else
                tempLineDirection = tempLineDirection + spinInc
            End If

            If (tempLineDirection > 360) Then
                tempLineDirection = tempLineDirection - 360
            End If
            If (tempLineDirection < 0) Then
                tempLineDirection = tempLineDirection + 360
            End If

            Try
                lineLength = oldLineLength(tempLineDirection)
                lineEnd = New Point(Me.Width / 2 + Math.Cos(tempLineDirection * Math.PI / 180) * lineLength, Me.Height / 2 - Math.Sin(tempLineDirection * Math.PI / 180) * lineLength)
                myGraphics.DrawLine(backgroundPen, CInt(Me.Width / 2), CInt(Me.Height / 2), CInt(lineEnd.X), CInt(lineEnd.Y))
            Catch ex As Exception
            End Try
        End If

        If (rotateClockwise = True) Then
            lineDirection = lineDirection - spinInc
        Else
            lineDirection = lineDirection + spinInc
        End If

        If (lineDirection > 360) Then
            lineDirection = lineDirection - 360
        End If
        If (lineDirection < 0) Then
            lineDirection = lineDirection + 360
        End If

        lineLength = Math.Round(Rnd() * Me.Width / 2)
        oldLineLength(lineDirection) = lineLength
        lineEnd = New Point(Me.Width / 2 + Math.Cos(lineDirection * Math.PI / 180) * lineLength, Me.Height / 2 - Math.Sin(lineDirection * Math.PI / 180) * lineLength)

        myGraphics.DrawLine(myPen, CInt(Me.Width / 2), CInt(Me.Height / 2), CInt(lineEnd.X), CInt(lineEnd.Y))
        myPen.Dispose()
        myGraphics.Dispose()
    End Sub

    Private Sub ScreenSaverForm_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Dim startCommand As String = Mid(Command.ToString(), 1, 2)
        If (startCommand = "/c" Or startCommand = "/p") Then
            End
        End If
        If (startCommand = "/S") Then
            MsgBox("Right click on the screensaver and choose 'Install' to install the screensaver.")
            End
        End If

        Me.Focus()
        Me.WindowState = FormWindowState.Maximized
        testDirectories()
        readSettings()
        Windows.Forms.Cursor.Hide()

        timSpin.Enabled = False
        If (spinSpeed <> 0) Then timSpin.Enabled = True
        timSpin.Interval = spinSpeed
    End Sub

    Private Sub testDirectories()
        'Set up directories for use with saving and loading files
        If (My.Computer.FileSystem.FileExists(fullPath) = False) Then
            If (My.Computer.FileSystem.DirectoryExists(commonPath & commonDir & programDir) = False) Then
                If (My.Computer.FileSystem.DirectoryExists(commonPath & commonDir) = False) Then
                    If (My.Computer.FileSystem.DirectoryExists(commonPath) = False) Then
                        My.Computer.FileSystem.CreateDirectory(commonPath)
                    End If
                    My.Computer.FileSystem.CreateDirectory(commonPath & commonDir)
                End If
                My.Computer.FileSystem.CreateDirectory(commonPath & commonDir & programDir)
            End If
            My.Computer.FileSystem.WriteAllText(fullPath, "00401RGBCC-16777216", False)
        End If
    End Sub
    Private Sub readSettings()
        'Read from the settings file and change the controls on the form accordingly
        Try
            Dim settingsText As String = My.Computer.FileSystem.ReadAllText(fullPath)
            Me.TransparencyKey = Color.White
            spinInc = CInt(Mid(settingsText, 1, 3)) / 4
            spinSpeed = CInt(Mid(settingsText, 4, 2))
            If (Mid(settingsText, 6, 1) = "R") Then useRed = True
            If (Mid(settingsText, 7, 1) = "G") Then useGreen = True
            If (Mid(settingsText, 8, 1) = "B") Then useBlue = True
            If (Mid(settingsText, 9, 1) = "C") Then rotateClockwise = True
            If (Mid(settingsText, 10, 1) = "C") Then spinClear = True
            If (Mid(settingsText, 11, 9) = "UseScreen") Then
                Me.BackColor = Color.White
                GoTo endSettingBackground
            End If
            Me.BackColor = Color.FromArgb(CInt(Mid(settingsText, 11, 9)))
endSettingBackground:
        Catch ex As Exception
            MsgBox("The settings file is configured incorrectly, please restart the screen saver.")
            My.Computer.FileSystem.DeleteFile(fullPath)
        End Try
    End Sub
End Class