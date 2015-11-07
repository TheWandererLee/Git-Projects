Imports System.Collections.Generic

'''<summary>
'''Encapsulates the rendering of a list of items.  Each item's description is shown in a list, and a single item is selected.
'''</summary>
'''<typeparam name="T">The type of item that this ItemListView will draw.</typeparam>
Public Class ItemListView(Of T As IItem)
    Implements IDisposable

    Private Const percentOfArticleDisplayBoxToFillWithText As Single = 0.5F
    Private Const percentOfFontHeightForSelectionBox As Single = 1.5F
    Private Const padding As Integer = 20

    ' Where to draw
    Private m_location As Point
    Private m_size As Size

    Private m_title As String
    Private m_itemFont As Font
    Private m_titleFont As Font
    Private m_backColor As Color
    Private m_borderColor As Color
    Private m_foreColor As Color
    Private m_titleBackColor As Color
    Private m_titleForeColor As Color
    Private m_selectedForeColor As Color
    Private m_selectedBackColor As Color
    Private m_itemFontHeight As Single
    ' An index of the currently selected item
    Private m_selectedIndex As Integer = 0
    ' The underlying RssChannel to display
    Private m_items As IList(Of T)
    Private m_maxItemsToShow As Integer
    ' The minimum number of articles that will be displayed
    ' If there are less items than this in the RSS channel
    ' then there will be blank space in the display
    Private m_minItemsToShow As Integer


    ''' <summary>
    ''' Gets the number of articles that will be displayed.
    ''' </summary>
    Private ReadOnly Property NumArticles() As Integer
        Get
            Return Math.Min(Me.m_items.Count, MaxItemsToShow)
        End Get
    End Property

    ''' <summary>
    ''' Gets the number of rows that will appear in the display.
    ''' </summary>
    ''' <remarks>
    ''' This may be more than NumArticles if there are less articles available than 
    ''' would fill up the minimum number of rows.
    ''' </remarks>
    Private ReadOnly Property NumArticleRows() As Integer
        Get
            Return Math.Max(NumArticles(), MinItemsToShow)
        End Get
    End Property

    Public Property Location() As Point
        Get
            Return Me.m_location
        End Get
        Set(ByVal value As Point)
            Me.m_location = value
        End Set
    End Property

    Public Property Size() As Size
        Get
            Return Me.m_size
        End Get
        Set(ByVal value As Size)
            Me.m_size = value
        End Set
    End Property

    Public Property ForeColor() As Color
        Get
            Return Me.m_foreColor
        End Get
        Set(ByVal value As Color)
            Me.m_foreColor = value
        End Set
    End Property

    Public Property BackColor() As Color
        Get
            Return Me.m_backColor
        End Get
        Set(ByVal value As Color)
            Me.m_backColor = value
        End Set
    End Property

    Public Property BorderColor() As Color
        Get
            Return Me.m_borderColor
        End Get
        Set(ByVal value As Color)
            Me.m_borderColor = value
        End Set
    End Property

    Public Property TitleForeColor() As Color
        Get
            Return Me.m_titleForeColor
        End Get
        Set(ByVal value As Color)
            Me.m_titleForeColor = value
        End Set
    End Property

    Public Property TitleBackColor() As Color
        Get
            Return Me.m_titleBackColor
        End Get
        Set(ByVal value As Color)
            Me.m_titleBackColor = value
        End Set
    End Property

    Public Property SelectedForeColor() As Color
        Get
            Return Me.m_selectedForeColor
        End Get
        Set(ByVal value As Color)
            Me.m_selectedForeColor = value
        End Set
    End Property

    Public Property SelectedBackColor() As Color
        Get
            Return Me.m_selectedBackColor
        End Get
        Set(ByVal value As Color)
            Me.m_selectedBackColor = value
        End Set
    End Property

    Public Property MaxItemsToShow() As Integer
        Get
            Return Me.m_maxItemsToShow
        End Get
        Set(ByVal value As Integer)
            Me.m_maxItemsToShow = value
        End Set
    End Property

    Public Property MinItemsToShow() As Integer
        Get
            Return Me.m_minItemsToShow
        End Get
        Set(ByVal value As Integer)
            Me.m_minItemsToShow = value
        End Set
    End Property

    Public ReadOnly Property SelectedIndex() As Integer
        Get
            Return Me.m_selectedIndex
        End Get
    End Property

    Public ReadOnly Property SelectedItem() As T
        Get
            Return Me.m_items(Me.SelectedIndex)
        End Get
    End Property

    Public ReadOnly Property RowHeight() As Integer
        Get
            ' There is one row for each item plus 2 rows for the title.
            Return Me.Size.Height / (NumArticleRows + 2)
        End Get
    End Property


    Public ReadOnly Property ItemFont() As Font
        Get
            ' Choose a font for each of the item titles that will fit all numItems 
            ' of them (plus some slack for the title) in the control 
            m_itemFontHeight = System.Convert.ToSingle(percentOfArticleDisplayBoxToFillWithText * RowHeight)
            If Me.m_itemFont Is Nothing OrElse Me.m_itemFont.Size <> m_itemFontHeight Then
                Me.m_itemFont = New Font("Microsoft Sans Serif", m_itemFontHeight, GraphicsUnit.Pixel)
            End If
            Return Me.m_itemFont
        End Get
    End Property


    Public ReadOnly Property TitleFont() As Font
        Get
            ' Choose a font for the title text.
            ' This font will be twice as big as the ItemFont
            Dim titleFontHeight As Single = System.Convert.ToSingle(percentOfArticleDisplayBoxToFillWithText * 2 * RowHeight)
            If Me.m_titleFont Is Nothing OrElse Me.m_titleFont.Size <> titleFontHeight Then
                Me.m_titleFont = New Font("Microsoft Sans Serif", titleFontHeight, GraphicsUnit.Pixel)
            End If
            Return Me.m_titleFont
        End Get
    End Property


    Public Sub NextArticle()
        If Me.m_selectedIndex < NumArticles - 1 Then
            Me.m_selectedIndex += 1
        Else
            Me.m_selectedIndex = 0
        End If

    End Sub

    Public Sub PreviousArticle()
        If Me.m_selectedIndex > 0 Then
            Me.m_selectedIndex -= 1
        Else
            Me.m_selectedIndex = NumArticles - 1
        End If

    End Sub

    Public Sub New(ByVal title As String, ByVal items As IList(Of T))
        If items Is Nothing Then
            Throw New ArgumentException("Items cannot be null", "items")
        End If

        Me.m_items = items
        Me.m_title = title
    End Sub

    Public Sub Paint(ByVal args As PaintEventArgs)

        Dim g As Graphics = args.Graphics

        ' Settings to make the text drawing look nice
        g.SmoothingMode = System.Drawing.Drawing2D.SmoothingMode.AntiAlias
        g.TextRenderingHint = System.Drawing.Text.TextRenderingHint.ClearTypeGridFit

        DrawBackground(g)

        ' Draw each article's description
        Dim index As Integer = 0

        Do While ((index < Me.m_items.Count) And (index < Me.MaxItemsToShow))
            DrawItemTitle(g, index)
            index += 1
        Loop

        ' Draw the title text
        DrawTitle(g)
    End Sub


    '''<summary>
    '''Draws a box and border ontop of which the text of the items can be drawn.
    '''</summary>
    '''<param name="g">The Graphics object to draw onto</param>
    Private Sub DrawBackground(ByVal g As Graphics)

        Using backBrush As New SolidBrush(BackColor)
            g.FillRectangle(backBrush, New Rectangle(Location.X + 4, Location.Y + 4, Size.Width - 8, Size.Height - 8))
        End Using

        Using borderPen As New Pen(BorderColor, 4)
            g.DrawRectangle(borderPen, New Rectangle(Location, Size))
        End Using

    End Sub


    '''<summary>
    '''Draws the title of the item with the given index.
    '''</summary>
    '''<param name="g">The Graphics object to draw onto</param>
    '''<param name="index">The index of the item in the list</param>
    Private Sub DrawItemTitle(ByVal g As Graphics, ByVal index As Integer)

        Dim stringFormat As New StringFormat(StringFormatFlags.LineLimit)
        stringFormat.Trimming = StringTrimming.EllipsisCharacter

        Dim articleRect As New Rectangle(Location.X + padding, Location.Y + (index * RowHeight) + padding, Size.Width - (2 * padding), Fix(percentOfFontHeightForSelectionBox * Me.m_itemFontHeight))

        ' Select color and draw border if current index is selected
        Dim textBrushColor As Color = ForeColor
        If index = SelectedIndex Then

            textBrushColor = SelectedForeColor

            Using backBrush As New SolidBrush(SelectedBackColor)
                g.FillRectangle(backBrush, articleRect)
            End Using
        End If

        ' Draw the title of the item
        Dim textToDraw As String = Me.m_items(index).Title

        Using textBrush As New SolidBrush(textBrushColor)
            g.DrawString(textToDraw, ItemFont, textBrush, articleRect, stringFormat)
        End Using

    End Sub

    '''<summary>
    '''Draws a title bar.
    '''</summary>
    '''<param name="g">The Graphics object to draw onto</param>
    Private Sub DrawTitle(ByVal g As Graphics)

        Dim titleLocation As New Point(Location.X + padding, Location.Y + Size.Height - RowHeight - padding)
        Dim titleSize As New Size(Size.Width - (2 * padding), 2 * RowHeight)
        Dim titleRectangle As New Rectangle(titleLocation, titleSize)

        ' Draw the title box and the selected item box
        Using titleBackBrush As New SolidBrush(TitleBackColor)
            g.FillRectangle(titleBackBrush, titleRectangle)
        End Using

        ' Draw the title text
        Dim titleFormat As New StringFormat(StringFormatFlags.LineLimit)
        titleFormat.Alignment = StringAlignment.Far
        titleFormat.Trimming = StringTrimming.EllipsisCharacter

        Using titleBrush As New SolidBrush(TitleForeColor)
            g.DrawString(Me.m_title, TitleFont, titleBrush, titleRectangle, titleFormat)
        End Using

    End Sub

    '''<summary>
    '''Dispose all disposable fields
    '''</summary>
    Public Sub Dispose() Implements IDisposable.Dispose
        If m_itemFont IsNot Nothing Then
            m_itemFont.Dispose()
        End If
        If m_titleFont IsNot Nothing Then 
            m_titleFont.Dispose()
        End If
    End Sub

End Class