Imports System.Collections.Generic
Imports System.IO
Imports System.Net
Imports System.Xml


'''<summary>
'''Representation of an RSS element in a RSS 2.0 XML document
'''</summary>
Public Class RssFeed

    Private m_channels As List(Of RssChannel)
    
    Public ReadOnly Property Channels() As IList(Of RssChannel)
        Get
            Return Me.m_channels
        End Get
    End Property

    Public ReadOnly Property MainChannel() As RssChannel
        Get
            Return Channels(0)
        End Get
    End Property

    ''' <summary>
    ''' Private constructor to be used with factory pattern.  
    ''' </summary>
    ''' <param name="xmlNode">An XML block containing the RSSFeed content.</param>
    Private Sub New(ByVal xmlNode As XmlNode)
        Me.m_channels = New List(Of RssChannel)

        ' Read the <rss> tag
        Dim rssNode As XmlNode = xmlNode.SelectSingleNode("rss")

        ' For each <channel> node in the <rss> node
        ' add a channel.
        Dim channelNodes As XmlNodeList = rssNode.ChildNodes
        For Each channelNode As XmlNode In channelNodes
            Dim newChannel As New RssChannel(channelNode)
            Me.m_channels.Add(newChannel)
        Next channelNode

    End Sub

    '''<summary>
    '''Construct an RSSFeed object from a uri pointing to a valid RSS 2.0 XML file.
    '''</summary>
    '''<exception cref="System.Net.WebException">Occurs when the uri cannot be located on the web.</exception>
    '''<param name="uri">The URL to read the RSS feed from.</param>
    Public Shared Function FromUri(ByVal uri As String) As RssFeed
        Dim wClient As New WebClient()
        Dim textReader As StreamReader
        Dim reader As XmlTextReader
        Dim xmlDoc As New XmlDocument()

        Using rssStream As Stream = wClient.OpenRead(uri)
            textReader = New StreamReader(rssStream)
            reader = New XmlTextReader(textReader)
            xmlDoc.Load(reader)
        End Using

        Return New RssFeed(xmlDoc)
    End Function


    '''<summary>
    '''Construct an RssFeed object from the text of an RSS 2.0 XML file.
    '''</summary>
    '''<param name="rssText">A string containing the XML for the RSS feed.</param>
    Public Shared Function FromText(ByVal rssText As String) As RssFeed
        Dim xmlDoc As New XmlDocument()

        xmlDoc.LoadXml(rssText)

        Return New RssFeed(xmlDoc)
    End Function

End Class