Imports System.Collections.Generic
Imports System.Xml

'''<summary>
'''Representation of a Channel element in an RSS 2.0 XML document.
''' </summary>
''' <remarks>
'''One or more RssChannels are contained in an RssFeed.  Use MainChannel property to access
'''the primary channel.  
''' </remarks>
Public Class RssChannel
    Private m_title As String
    Private m_link As String
    Private m_items As List(Of RssItem)

    Public ReadOnly Property Title() As String 
        Get
            Return Me.m_title
        End Get
    End Property
    
    Public ReadOnly Property Link() As String 
        Get
            Return Me.m_link
        End Get
    End Property

    Public ReadOnly Property Items() As IList(Of RssItem)
        Get
            Return Me.m_items.AsReadOnly()
        End Get
    End Property

    '''<summary>
    '''Build an RSSChannel from an XmlNode representing a Channel element inside an RSS 2.0 XML document.
    '''</summary>
    '''<param name="channelNode"></param>
    Friend Sub New(ByVal channelNode As XmlNode) 
        m_items = New List(Of RssItem)
        m_title = channelNode.SelectSingleNode("title").InnerText
        m_link = channelNode.SelectSingleNode("link").InnerText

        Dim itemNodes As XmlNodeList = channelNode.SelectNodes("item")
        For Each itemNode As XmlNode In itemNodes
            m_items.Add(New RssItem(itemNode))
        Next
    
    End Sub

End Class