
'''<summary>
'''Encapsulates the rendering of the description of an item.
'''</summary>
'''<typeparam name="T">The type of item that this ItemDescriptionView will draw.</typeparam>
Public Class ItemDescriptionView(Of T As IItem)
    Implements IDisposable

    Private m_location As Point
    Private m_size As Size
    Private m_textDrawingBrush As Brush = Brushes.Black
    Private m_lineColor As Color
    Private m_lineWidth As Single
    Private m_textRect As Rectangle
    Private WithEvents m_fadeTimer As Timer
    Private m_foreColor As Color
    Private m_titleFont As Font
    Private m_displayItem As T

    ' The initial alpha value and the amount to change the value by each time
    Private m_textAlpha As Integer = 0
    Private m_textAlphaDelta As Integer = 4
    Private m_textAlphaMax As Integer = 200


    Public Property DisplayItem() As T
        Get
            Return m_displayItem
        End Get
        Set(ByVal value As T)
            Me.m_displayItem = value
        End Set
    End Property

    Public Property Location() As Point
        Get
            Return m_location
        End Get
        Set(ByVal value As Point)
            Me.m_location = value
        End Set
    End Property

    Public Property Size() As Size
        Get
            Return m_size
        End Get
        Set(ByVal value As Size)
            Me.m_size = value
        End Set
    End Property

    Public Property ForeColor() As Color
        Get
            Return m_foreColor
        End Get
        Set(ByVal value As Color)
            Me.m_foreColor = value
        End Set
    End Property

    Public Property LineColor() As Color
        Get
            Return m_lineColor
        End Get
        Set(ByVal value As Color)
            Me.m_lineColor = value
        End Set
    End Property

    Public Property TitleFont() As Font
        Get
            Return m_titleFont
        End Get
        Set(ByVal value As Font)
            Me.m_titleFont = value
        End Set
    End Property

    Public Property LineWidth() As Single
        Get
            Return m_lineWidth
        End Get
        Set(ByVal value As Single)
            Me.m_lineWidth = value
        End Set
    End Property

    Public ReadOnly Property FadeTimer() As Timer
        Get
            Return Me.m_fadeTimer
        End Get
    End Property

    Public Event FadingComplete As EventHandler

    '''<summary>
    '''Create a new ItemDescriptionView connected to <paramref name="listView"/>.
    '''</summary>
    Public Sub New()
        Me.m_fadeTimer = New Timer()
        m_fadeTimer.Enabled = True
        m_fadeTimer.Start()
    End Sub 'New


    Public Sub Paint(ByVal e As PaintEventArgs)
        ' Change the graphics settings to draw clear text
        e.Graphics.SmoothingMode = System.Drawing.Drawing2D.SmoothingMode.AntiAlias
        e.Graphics.TextRenderingHint = System.Drawing.Text.TextRenderingHint.ClearTypeGridFit

        ' Determine the placement of the lines that will be placed 
        ' above and below the text
        Dim lineLeftX As Single = Size.Width / 4
        Dim lineRightX As Single = 3 * Size.Width / 4
        Dim lineVerticalBuffer As Integer = Size.Height / 50
        Dim lineTopY As Single = Location.Y + lineVerticalBuffer
        Dim lineBottomY As Single = Location.Y + Size.Height - lineVerticalBuffer

        ' Draw the two lines
        Dim linePen As New Pen(LineColor, LineWidth)
        Try
            e.Graphics.DrawLine(linePen, Location.X + lineLeftX, lineTopY, Location.X + lineRightX, lineTopY)
            e.Graphics.DrawLine(linePen, Location.X + lineLeftX, lineBottomY, Location.X + lineRightX, lineBottomY)
        Finally
            linePen.Dispose()
        End Try

        ' Draw the text of the article
	Dim textFormat As New StringFormat(StringFormatFlags.LineLimit)
        Try
            textFormat.Alignment = StringAlignment.Near
            textFormat.LineAlignment = StringAlignment.Near
            textFormat.Trimming = StringTrimming.EllipsisWord
            Dim textVerticalBuffer As Integer = 4 * lineVerticalBuffer
    
            Dim textRect As New Rectangle(Location.X, Location.Y + textVerticalBuffer, Size.Width, Size.Height - 2 * textVerticalBuffer)
            Dim textBrush As New SolidBrush(Color.FromArgb(Me.m_textAlpha, ForeColor))
            Try
                e.Graphics.DrawString(Me.DisplayItem.Description, TitleFont, textBrush, textRect, textFormat)
            Finally
                textBrush.Dispose()
            End Try
        Finally
            textFormat.Dispose()
        End Try
    End Sub 'Paint


    Private Sub fadeTimer_Tick(ByVal sender As Object, ByVal e As EventArgs) Handles m_fadeTimer.Tick
        ' Change the alpha value of the text being drawn
        ' Moves up until it reaches textAlphaMax and then moves down
        ' Moves to the next article when it gets back to zero
        Me.m_textAlpha += Me.m_textAlphaDelta
        If Me.m_textAlpha >= Me.m_textAlphaMax Then
            Me.m_textAlphaDelta *= -1
        ElseIf Me.m_textAlpha <= 0 Then
            RaiseEvent FadingComplete(Me, New EventArgs())
            Me.m_textAlpha = 0
            Me.m_textAlphaDelta *= -1
        End If
    End Sub 'scrollTimer_Tick

    '''<summary>
    '''Dispose all disposable fields
    '''</summary>
    Public Sub Dispose() Implements IDisposable.Dispose
        m_fadeTimer.Dispose()
    End Sub

End Class 'ItemDescriptionView