Imports System.Xml

'''<summary>
'''Representation of an Item element in an RSS 2.0 XML document.
'''</summary>
''' <remarks>Zero or more RssItems are contained in an RssChannel.</remarks>
Public Class RssItem
    Implements IItem

    Private m_title As String
    Private m_description As String
    Private m_link As String


    Public ReadOnly Property Title() As String Implements IItem.Title
        Get
            Return Me.m_title
        End Get
    End Property

    Public ReadOnly Property Description() As String Implements IItem.Description
        Get
            Return Me.m_description
        End Get
    End Property

    Public ReadOnly Property Link() As String
        Get
            Return Me.m_link
        End Get
    End Property

    '''<summary>
    '''Builds an RSSItem from an XmlNode representing an Item element inside an RSS 2.0 XML document.
    '''</summary>
    '''<param name="itemNode"></param>
    Friend Sub New(ByVal itemNode As XmlNode)

        Dim selected As XmlNode

        selected = itemNode.SelectSingleNode("title")
        If Not (selected Is Nothing) Then
            Me.m_title = selected.InnerText
        End If

        selected = itemNode.SelectSingleNode("description")
        If Not (selected Is Nothing) Then
            Me.m_description = selected.InnerText
        End If

        selected = itemNode.SelectSingleNode("link")
        If Not (selected Is Nothing) Then
            Me.m_link = selected.InnerText
        End If

    End Sub

End Class