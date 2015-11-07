Public Class formMain
    Dim formGraphics As Graphics
    Dim player As Image = Image.FromHbitmap(My.Resources.baddie.GetHbitmap)
    Dim playerX As Integer = Me.Width / 2
    Dim playerY As Integer = My.Computer.Screen.Bounds.Height - player.Height
    Dim crossIn As Integer = 8 'Cross hair inner circle size
    Dim crossOut As Integer = 12 'Cross hair outer cross size
    Dim bullet As Point = New Point(playerX, playerY)
    Dim bulletSpeed As Integer = 12
    Dim reloaded As Boolean = True
    Dim fps As Integer = 0
    Dim fc As Integer = 0

    Private Declare Function ShowCursor Lib "user32" (ByVal bShow As Boolean) As Boolean
    Private Declare Function SetCursorPos Lib "user32" (ByVal X As Long, ByVal Y As Long) As Long

    Private Sub formMain_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        ShowCursor(False)
        formGraphics = Me.CreateGraphics()
        player.RotateFlip(RotateFlipType.RotateNoneFlipY)
    End Sub

    Private Sub formMain_MouseMove(ByVal sender As Object, ByVal e As System.Windows.Forms.MouseEventArgs) Handles Me.MouseMove
        formGraphics.Clear(Me.BackColor)
        formGraphics.DrawEllipse(Pens.Red, e.X - crossIn, e.Y - crossIn, crossIn * 2, crossIn * 2)
        formGraphics.DrawLine(Pens.Red, e.X - crossOut, e.Y, e.X + crossOut, e.Y)
        formGraphics.DrawLine(Pens.Red, e.X, e.Y - crossOut, e.X, e.Y + crossOut)
        playerX = e.Location.X
        formGraphics.DrawImage(player, CInt(playerX - (player.Width / 2)), playerY)
    End Sub

    Private Sub formMain_KeyDown(ByVal sender As System.Object, ByVal e As System.Windows.Forms.KeyEventArgs) Handles MyBase.KeyDown
        If (e.KeyCode = Keys.Escape) Then
            End
        End If
    End Sub

    Private Sub formMain_MouseDown(ByVal sender As Object, ByVal e As System.Windows.Forms.MouseEventArgs) Handles Me.MouseDown
        If (reloaded = True) Then
            bullet = New Point(playerX, playerY)
            reloaded = False
        End If
    End Sub

    Private Sub timStep_Tick(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles timStep.Tick
        If (reloaded = False) Then
            bullet = New Point(bullet.X, bullet.Y - bulletSpeed)
            formGraphics.Clear(Me.BackColor)
            redraw()
            drawCircle(Pens.Yellow, Brushes.Yellow, bullet.X - 2, bullet.Y - 4, bullet.X + 2, bullet.Y + 8)
            drawSquare(Pens.Brown, Brushes.Brown, bullet.X - 2, bullet.Y, bullet.X + 2, bullet.Y + 8)
        End If
        If (bullet.Y < -4) Then reloaded = True
    End Sub

    Private Sub redraw()
        formGraphics.DrawImage(player, CInt(playerX - (player.Width / 2)), playerY)
        formGraphics.DrawEllipse(Pens.Red, MousePosition.X - crossIn, MousePosition.Y - crossIn, crossIn * 2, crossIn * 2)
        formGraphics.DrawLine(Pens.Red, MousePosition.X - crossOut, MousePosition.Y, MousePosition.X + crossOut, MousePosition.Y)
        formGraphics.DrawLine(Pens.Red, MousePosition.X, MousePosition.Y - crossOut, MousePosition.X, MousePosition.Y + crossOut)
    End Sub

    Private Sub drawCircle(ByVal pen As Pen, ByVal brush As Brush, ByVal x1 As Integer, ByVal y1 As Integer, ByVal x2 As Integer, ByVal y2 As Integer)
        formGraphics.DrawEllipse(pen, x1, y1, x2 - x1, y2 - y1)
        formGraphics.FillEllipse(brush, x1, y1, x2 - x1, y2 - y1)
    End Sub
    Private Sub drawSquare(ByVal pen As Pen, ByVal brush As Brush, ByVal x1 As Integer, ByVal y1 As Integer, ByVal x2 As Integer, ByVal y2 As Integer)
        formGraphics.DrawRectangle(pen, x1, y1, x2 - x1, y2 - y1)
        formGraphics.FillRectangle(brush, x1, y1, x2 - x1, y2 - y1)
    End Sub
End Class