<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Public Class formMain
    Inherits System.Windows.Forms.Form

    'Form overrides dispose to clean up the component list.
    <System.Diagnostics.DebuggerNonUserCode()> _
    Protected Overloads Overrides Sub Dispose(ByVal disposing As Boolean)
        If disposing AndAlso components IsNot Nothing Then
            components.Dispose()
        End If
        MyBase.Dispose(disposing)
    End Sub

    'Required by the Windows Form Designer
    Private components As System.ComponentModel.IContainer

    'NOTE: The following procedure is required by the Windows Form Designer
    'It can be modified using the Windows Form Designer.  
    'Do not modify it using the code editor.
    <System.Diagnostics.DebuggerStepThrough()> _
    Private Sub InitializeComponent()
        Me.components = New System.ComponentModel.Container
        Me.statusMain = New System.Windows.Forms.StatusStrip
        Me.statusLblTickCount = New System.Windows.Forms.ToolStripStatusLabel
        Me.statusLblDate = New System.Windows.Forms.ToolStripStatusLabel
        Me.statusLblTime = New System.Windows.Forms.ToolStripStatusLabel
        Me.timerTicks = New System.Windows.Forms.Timer(Me.components)
        Me.listFoldersNames = New System.Windows.Forms.ListBox
        Me.listFolders = New System.Windows.Forms.ListBox
        Me.btnFreezeTimer = New System.Windows.Forms.Button
        Me.btnLoadFolders = New System.Windows.Forms.Button
        Me.lblTextMachineName = New System.Windows.Forms.Label
        Me.lblMachineName = New System.Windows.Forms.Label
        Me.lblTextUserName = New System.Windows.Forms.Label
        Me.lblUserName = New System.Windows.Forms.Label
        Me.lblTextComputerInfo = New System.Windows.Forms.Label
        Me.lblComputerInfo = New System.Windows.Forms.Label
        Me.lblTextLanguageVersion = New System.Windows.Forms.Label
        Me.lblLanguageVersion = New System.Windows.Forms.Label
        Me.lblClockStopped = New System.Windows.Forms.Label
        Me.statusMain.SuspendLayout()
        Me.SuspendLayout()
        '
        'statusMain
        '
        Me.statusMain.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.statusLblTickCount, Me.statusLblDate, Me.statusLblTime})
        Me.statusMain.LayoutStyle = System.Windows.Forms.ToolStripLayoutStyle.Table
        Me.statusMain.Location = New System.Drawing.Point(0, 406)
        Me.statusMain.Name = "statusMain"
        Me.statusMain.Size = New System.Drawing.Size(586, 23)
        Me.statusMain.SizingGrip = False
        Me.statusMain.TabIndex = 3
        Me.statusMain.Text = "Main Status Bar"
        '
        'statusLblTickCount
        '
        Me.statusLblTickCount.Name = "statusLblTickCount"
        Me.statusLblTickCount.Text = "Loading..."
        '
        'statusLblDate
        '
        Me.statusLblDate.Name = "statusLblDate"
        Me.statusLblDate.Text = "Loading..."
        '
        'statusLblTime
        '
        Me.statusLblTime.Name = "statusLblTime"
        Me.statusLblTime.Text = "Loading..."
        '
        'timerTicks
        '
        Me.timerTicks.Enabled = True
        Me.timerTicks.Interval = 50
        '
        'listFoldersNames
        '
        Me.listFoldersNames.FormattingEnabled = True
        Me.listFoldersNames.Location = New System.Drawing.Point(12, 70)
        Me.listFoldersNames.Name = "listFoldersNames"
        Me.listFoldersNames.RightToLeft = System.Windows.Forms.RightToLeft.Yes
        Me.listFoldersNames.Size = New System.Drawing.Size(150, 329)
        Me.listFoldersNames.TabIndex = 4
        '
        'listFolders
        '
        Me.listFolders.FormattingEnabled = True
        Me.listFolders.HorizontalScrollbar = True
        Me.listFolders.Location = New System.Drawing.Point(162, 70)
        Me.listFolders.Name = "listFolders"
        Me.listFolders.Size = New System.Drawing.Size(413, 329)
        Me.listFolders.TabIndex = 5
        '
        'btnFreezeTimer
        '
        Me.btnFreezeTimer.AutoSize = True
        Me.btnFreezeTimer.AutoSizeMode = System.Windows.Forms.AutoSizeMode.GrowAndShrink
        Me.btnFreezeTimer.Location = New System.Drawing.Point(483, 12)
        Me.btnFreezeTimer.Name = "btnFreezeTimer"
        Me.btnFreezeTimer.Size = New System.Drawing.Size(92, 23)
        Me.btnFreezeTimer.TabIndex = 6
        Me.btnFreezeTimer.Text = "Start/Stop Clock"
        '
        'btnLoadFolders
        '
        Me.btnLoadFolders.AutoSize = True
        Me.btnLoadFolders.AutoSizeMode = System.Windows.Forms.AutoSizeMode.GrowAndShrink
        Me.btnLoadFolders.Location = New System.Drawing.Point(483, 41)
        Me.btnLoadFolders.Name = "btnLoadFolders"
        Me.btnLoadFolders.Size = New System.Drawing.Size(87, 23)
        Me.btnLoadFolders.TabIndex = 7
        Me.btnLoadFolders.Text = "Refresh Folders"
        '
        'lblTextMachineName
        '
        Me.lblTextMachineName.AutoSize = True
        Me.lblTextMachineName.Location = New System.Drawing.Point(26, 7)
        Me.lblTextMachineName.Name = "lblTextMachineName"
        Me.lblTextMachineName.Size = New System.Drawing.Size(78, 13)
        Me.lblTextMachineName.TabIndex = 8
        Me.lblTextMachineName.Text = "Machine Name:"
        '
        'lblMachineName
        '
        Me.lblMachineName.AutoSize = True
        Me.lblMachineName.Location = New System.Drawing.Point(110, 7)
        Me.lblMachineName.Name = "lblMachineName"
        Me.lblMachineName.Size = New System.Drawing.Size(50, 13)
        Me.lblMachineName.TabIndex = 9
        Me.lblMachineName.Text = "Loading..."
        '
        'lblTextUserName
        '
        Me.lblTextUserName.AutoSize = True
        Me.lblTextUserName.Location = New System.Drawing.Point(45, 20)
        Me.lblTextUserName.Name = "lblTextUserName"
        Me.lblTextUserName.Size = New System.Drawing.Size(59, 13)
        Me.lblTextUserName.TabIndex = 10
        Me.lblTextUserName.Text = "User Name:"
        '
        'lblUserName
        '
        Me.lblUserName.AutoSize = True
        Me.lblUserName.Location = New System.Drawing.Point(110, 20)
        Me.lblUserName.Name = "lblUserName"
        Me.lblUserName.Size = New System.Drawing.Size(50, 13)
        Me.lblUserName.TabIndex = 11
        Me.lblUserName.Text = "Loading..."
        '
        'lblTextComputerInfo
        '
        Me.lblTextComputerInfo.AutoSize = True
        Me.lblTextComputerInfo.Location = New System.Drawing.Point(32, 33)
        Me.lblTextComputerInfo.Name = "lblTextComputerInfo"
        Me.lblTextComputerInfo.Size = New System.Drawing.Size(72, 13)
        Me.lblTextComputerInfo.TabIndex = 12
        Me.lblTextComputerInfo.Text = "Computer Info:"
        '
        'lblComputerInfo
        '
        Me.lblComputerInfo.AutoSize = True
        Me.lblComputerInfo.Location = New System.Drawing.Point(110, 33)
        Me.lblComputerInfo.Name = "lblComputerInfo"
        Me.lblComputerInfo.Size = New System.Drawing.Size(50, 13)
        Me.lblComputerInfo.TabIndex = 13
        Me.lblComputerInfo.Text = "Loading..."
        '
        'lblTextLanguageVersion
        '
        Me.lblTextLanguageVersion.AutoSize = True
        Me.lblTextLanguageVersion.Location = New System.Drawing.Point(8, 46)
        Me.lblTextLanguageVersion.Name = "lblTextLanguageVersion"
        Me.lblTextLanguageVersion.Size = New System.Drawing.Size(96, 13)
        Me.lblTextLanguageVersion.TabIndex = 14
        Me.lblTextLanguageVersion.Text = "Framework Version:"
        '
        'lblLanguageVersion
        '
        Me.lblLanguageVersion.AutoSize = True
        Me.lblLanguageVersion.Location = New System.Drawing.Point(110, 46)
        Me.lblLanguageVersion.Name = "lblLanguageVersion"
        Me.lblLanguageVersion.Size = New System.Drawing.Size(50, 13)
        Me.lblLanguageVersion.TabIndex = 15
        Me.lblLanguageVersion.Text = "Loading..."
        '
        'lblClockStopped
        '
        Me.lblClockStopped.AutoSize = True
        Me.lblClockStopped.Location = New System.Drawing.Point(372, 12)
        Me.lblClockStopped.Name = "lblClockStopped"
        Me.lblClockStopped.Size = New System.Drawing.Size(105, 13)
        Me.lblClockStopped.TabIndex = 16
        Me.lblClockStopped.Text = "The clock is stopped."
        Me.lblClockStopped.Visible = False
        '
        'formMain
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.AutoSize = True
        Me.ClientSize = New System.Drawing.Size(586, 429)
        Me.Controls.Add(Me.lblClockStopped)
        Me.Controls.Add(Me.lblLanguageVersion)
        Me.Controls.Add(Me.lblTextLanguageVersion)
        Me.Controls.Add(Me.lblComputerInfo)
        Me.Controls.Add(Me.lblTextComputerInfo)
        Me.Controls.Add(Me.lblUserName)
        Me.Controls.Add(Me.lblTextUserName)
        Me.Controls.Add(Me.lblMachineName)
        Me.Controls.Add(Me.lblTextMachineName)
        Me.Controls.Add(Me.btnLoadFolders)
        Me.Controls.Add(Me.btnFreezeTimer)
        Me.Controls.Add(Me.listFolders)
        Me.Controls.Add(Me.listFoldersNames)
        Me.Controls.Add(Me.statusMain)
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedSingle
        Me.Name = "formMain"
        Me.Text = "Master Test"
        Me.statusMain.ResumeLayout(False)
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents statusMain As System.Windows.Forms.StatusStrip
    Friend WithEvents statusLblTickCount As System.Windows.Forms.ToolStripStatusLabel
    Friend WithEvents timerTicks As System.Windows.Forms.Timer
    Friend WithEvents listFoldersNames As System.Windows.Forms.ListBox
    Friend WithEvents listFolders As System.Windows.Forms.ListBox
    Friend WithEvents statusLblDate As System.Windows.Forms.ToolStripStatusLabel
    Friend WithEvents statusLblTime As System.Windows.Forms.ToolStripStatusLabel
    Friend WithEvents btnFreezeTimer As System.Windows.Forms.Button
    Friend WithEvents btnLoadFolders As System.Windows.Forms.Button
    Friend WithEvents lblTextMachineName As System.Windows.Forms.Label
    Friend WithEvents lblMachineName As System.Windows.Forms.Label
    Friend WithEvents lblTextUserName As System.Windows.Forms.Label
    Friend WithEvents lblUserName As System.Windows.Forms.Label
    Friend WithEvents lblTextComputerInfo As System.Windows.Forms.Label
    Friend WithEvents lblComputerInfo As System.Windows.Forms.Label
    Friend WithEvents lblTextLanguageVersion As System.Windows.Forms.Label
    Friend WithEvents lblLanguageVersion As System.Windows.Forms.Label
    Friend WithEvents lblClockStopped As System.Windows.Forms.Label

End Class
