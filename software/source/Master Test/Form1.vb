Public Class formMain
    Private Sub timerTicks_Tick(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles timerTicks.Tick
        statusLblTickCount.Text = "This computer has been on for: " & _
        (Math.Floor(System.Environment.TickCount / 3600000)) & " hours, " & _
        (Math.Floor(System.Environment.TickCount / 60000) Mod 60) & " minutes, and " & _
        (Math.Floor(System.Environment.TickCount / 1000) Mod 60) & " seconds |"
        statusLblDate.Text = "Date: " & _
        My.Computer.Clock.LocalTime.Month & " " & _
        My.Computer.Clock.LocalTime.Day & ", " & _
        My.Computer.Clock.LocalTime.Year & " |"

        Dim ampm As String = "AM"
        Dim hour As Integer = My.Computer.Clock.LocalTime.Hour
        Dim minute As String = My.Computer.Clock.LocalTime.Minute
        Dim second As String = My.Computer.Clock.LocalTime.Second
        If hour > 12 Then
            ampm = "PM"
            hour = hour - 12
        End If
        If CInt(minute) < 10 Then minute = "0" & minute
        If CInt(second) < 10 Then second = "0" & second
        statusLblTime.Text = "Time: " & _
        hour & ":" & _
        minute & ":" & _
        second & " " & ampm
    End Sub

    Private Sub btnFreezeTimer_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnFreezeTimer.Click
        If (timerTicks.Enabled = False) Then
            timerTicks.Enabled = True
            lblClockStopped.Visible = False
        Else
            timerTicks.Enabled = False
            lblClockStopped.Visible = True
        End If
    End Sub

    Private Sub btnLoadAll(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Me.Load, btnLoadFolders.Click
        lblMachineName.Text = System.Environment.MachineName
        lblUserName.Text = Mid(My.User.Name, My.User.Name.IndexOf("\") + 2)
        lblComputerInfo.Text = System.Environment.OSVersion.VersionString
        lblLanguageVersion.Text = ".NET Framework " & System.Environment.Version.ToString

        listFoldersNames.Items.Clear()
        listFolders.Items.Clear()
        listFoldersNames.Items.Add("Program Directory:")
        listFoldersNames.Items.Add("Application Data:")
        listFoldersNames.Items.Add("Common Application Data:")
        listFoldersNames.Items.Add("Common Program Files:")
        listFoldersNames.Items.Add("Cookies:")
        listFoldersNames.Items.Add("Desktop:")
        listFoldersNames.Items.Add("Desktop Directory:")
        listFoldersNames.Items.Add("Favorites:")
        listFoldersNames.Items.Add("History:")
        listFoldersNames.Items.Add("Internet Cache:")
        listFoldersNames.Items.Add("Local Application Data:")
        listFoldersNames.Items.Add("My Documents:")
        listFoldersNames.Items.Add("My Music:")
        listFoldersNames.Items.Add("My Pictures:")
        listFoldersNames.Items.Add("Personal:")
        listFoldersNames.Items.Add("Program Files:")
        listFoldersNames.Items.Add("Programs:")
        listFoldersNames.Items.Add("Recent:")
        listFoldersNames.Items.Add("Send To:")
        listFoldersNames.Items.Add("Start Menu:")
        listFoldersNames.Items.Add("Startup:")
        listFoldersNames.Items.Add("System:")
        listFoldersNames.Items.Add("Templates:")
        listFolders.Items.Add(System.Environment.CurrentDirectory)
        listFolders.Items.Add(System.Environment.GetFolderPath(Environment.SpecialFolder.ApplicationData))
        listFolders.Items.Add(System.Environment.GetFolderPath(Environment.SpecialFolder.CommonApplicationData))
        listFolders.Items.Add(System.Environment.GetFolderPath(Environment.SpecialFolder.CommonProgramFiles))
        listFolders.Items.Add(System.Environment.GetFolderPath(Environment.SpecialFolder.Cookies))
        listFolders.Items.Add(System.Environment.GetFolderPath(Environment.SpecialFolder.Desktop))
        listFolders.Items.Add(System.Environment.GetFolderPath(Environment.SpecialFolder.DesktopDirectory))
        listFolders.Items.Add(System.Environment.GetFolderPath(Environment.SpecialFolder.Favorites))
        listFolders.Items.Add(System.Environment.GetFolderPath(Environment.SpecialFolder.History))
        listFolders.Items.Add(System.Environment.GetFolderPath(Environment.SpecialFolder.InternetCache))
        listFolders.Items.Add(System.Environment.GetFolderPath(Environment.SpecialFolder.LocalApplicationData))
        listFolders.Items.Add(System.Environment.GetFolderPath(Environment.SpecialFolder.MyDocuments))
        listFolders.Items.Add(System.Environment.GetFolderPath(Environment.SpecialFolder.MyMusic))
        listFolders.Items.Add(System.Environment.GetFolderPath(Environment.SpecialFolder.MyPictures))
        listFolders.Items.Add(System.Environment.GetFolderPath(Environment.SpecialFolder.Personal))
        listFolders.Items.Add(System.Environment.GetFolderPath(Environment.SpecialFolder.ProgramFiles))
        listFolders.Items.Add(System.Environment.GetFolderPath(Environment.SpecialFolder.Programs))
        listFolders.Items.Add(System.Environment.GetFolderPath(Environment.SpecialFolder.Recent))
        listFolders.Items.Add(System.Environment.GetFolderPath(Environment.SpecialFolder.SendTo))
        listFolders.Items.Add(System.Environment.GetFolderPath(Environment.SpecialFolder.StartMenu))
        listFolders.Items.Add(System.Environment.GetFolderPath(Environment.SpecialFolder.Startup))
        listFolders.Items.Add(System.Environment.GetFolderPath(Environment.SpecialFolder.System))
        listFolders.Items.Add(System.Environment.GetFolderPath(Environment.SpecialFolder.Templates))
    End Sub
End Class
