<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class formMain
    Inherits System.Windows.Forms.Form

    'Form overrides dispose to clean up the component list.
    <System.Diagnostics.DebuggerNonUserCode()> _
    Protected Overrides Sub Dispose(ByVal disposing As Boolean)
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
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(formMain))
        Me.openFileProgram = New System.Windows.Forms.OpenFileDialog
        Me.listPrograms = New System.Windows.Forms.ListView
        Me.conMenuPrograms = New System.Windows.Forms.ContextMenuStrip(Me.components)
        Me.conMenuBtnOpen = New System.Windows.Forms.ToolStripMenuItem
        Me.conMenuBtnProgramInfo = New System.Windows.Forms.ToolStripMenuItem
        Me.conMenuSeperator1 = New System.Windows.Forms.ToolStripSeparator
        Me.conMenuBtnAdd = New System.Windows.Forms.ToolStripMenuItem
        Me.conMenuBtnRename = New System.Windows.Forms.ToolStripMenuItem
        Me.conMenuBtnRemove = New System.Windows.Forms.ToolStripMenuItem
        Me.programImages = New System.Windows.Forms.ImageList(Me.components)
        Me.menuMain = New System.Windows.Forms.MenuStrip
        Me.menuBtnFile = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnAdd = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnProgramInfo = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnRename = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnRemove = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnExit = New System.Windows.Forms.ToolStripMenuItem
        Me.PreferencesToolStripMenuItem = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnAdvanced = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnSearch = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnAbout = New System.Windows.Forms.ToolStripMenuItem
        Me.folderSearch = New System.Windows.Forms.FolderBrowserDialog
        Me.tabMain = New System.Windows.Forms.TabControl
        Me.tabOrganizer = New System.Windows.Forms.TabPage
        Me.lblProgramInfo = New System.Windows.Forms.Label
        Me.tabDownloader = New System.Windows.Forms.TabPage
        Me.webDownloader = New System.Windows.Forms.WebBrowser
        Me.conMenuDownloader = New System.Windows.Forms.ContextMenuStrip(Me.components)
        Me.conMenuBtnMessage = New System.Windows.Forms.ToolStripMenuItem
        Me.timSave = New System.Windows.Forms.Timer(Me.components)
        Me.conMenuPrograms.SuspendLayout()
        Me.menuMain.SuspendLayout()
        Me.tabMain.SuspendLayout()
        Me.tabOrganizer.SuspendLayout()
        Me.tabDownloader.SuspendLayout()
        Me.conMenuDownloader.SuspendLayout()
        Me.SuspendLayout()
        '
        'openFileProgram
        '
        Me.openFileProgram.Filter = "Windows Executable Programs (*.exe) | *.exe"
        Me.openFileProgram.Multiselect = True
        '
        'listPrograms
        '
        Me.listPrograms.ContextMenuStrip = Me.conMenuPrograms
        Me.listPrograms.LabelEdit = True
        Me.listPrograms.LargeImageList = Me.programImages
        Me.listPrograms.Location = New System.Drawing.Point(0, 0)
        Me.listPrograms.Name = "listPrograms"
        Me.listPrograms.Size = New System.Drawing.Size(480, 264)
        Me.listPrograms.TabIndex = 2
        Me.listPrograms.UseCompatibleStateImageBehavior = False
        '
        'conMenuPrograms
        '
        Me.conMenuPrograms.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.conMenuBtnOpen, Me.conMenuBtnProgramInfo, Me.conMenuSeperator1, Me.conMenuBtnAdd, Me.conMenuBtnRename, Me.conMenuBtnRemove})
        Me.conMenuPrograms.Name = "conMenuPrograms"
        Me.conMenuPrograms.Size = New System.Drawing.Size(168, 120)
        '
        'conMenuBtnOpen
        '
        Me.conMenuBtnOpen.Font = New System.Drawing.Font("Tahoma", 8.25!, System.Drawing.FontStyle.Bold)
        Me.conMenuBtnOpen.Name = "conMenuBtnOpen"
        Me.conMenuBtnOpen.Size = New System.Drawing.Size(167, 22)
        Me.conMenuBtnOpen.Text = "Open Program"
        '
        'conMenuBtnProgramInfo
        '
        Me.conMenuBtnProgramInfo.Name = "conMenuBtnProgramInfo"
        Me.conMenuBtnProgramInfo.Size = New System.Drawing.Size(167, 22)
        Me.conMenuBtnProgramInfo.Text = "Program Info"
        '
        'conMenuSeperator1
        '
        Me.conMenuSeperator1.Name = "conMenuSeperator1"
        Me.conMenuSeperator1.Size = New System.Drawing.Size(164, 6)
        '
        'conMenuBtnAdd
        '
        Me.conMenuBtnAdd.Name = "conMenuBtnAdd"
        Me.conMenuBtnAdd.Size = New System.Drawing.Size(167, 22)
        Me.conMenuBtnAdd.Text = "Add Program(s)"
        '
        'conMenuBtnRename
        '
        Me.conMenuBtnRename.Name = "conMenuBtnRename"
        Me.conMenuBtnRename.Size = New System.Drawing.Size(167, 22)
        Me.conMenuBtnRename.Text = "Rename Program"
        '
        'conMenuBtnRemove
        '
        Me.conMenuBtnRemove.Name = "conMenuBtnRemove"
        Me.conMenuBtnRemove.Size = New System.Drawing.Size(167, 22)
        Me.conMenuBtnRemove.Text = "Remove Program"
        '
        'programImages
        '
        Me.programImages.ColorDepth = System.Windows.Forms.ColorDepth.Depth8Bit
        Me.programImages.ImageSize = New System.Drawing.Size(32, 32)
        Me.programImages.TransparentColor = System.Drawing.Color.Transparent
        '
        'menuMain
        '
        Me.menuMain.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.menuBtnFile, Me.PreferencesToolStripMenuItem, Me.menuBtnAdvanced, Me.menuBtnAbout})
        Me.menuMain.Location = New System.Drawing.Point(0, 0)
        Me.menuMain.Name = "menuMain"
        Me.menuMain.Size = New System.Drawing.Size(512, 24)
        Me.menuMain.TabIndex = 4
        Me.menuMain.Text = "Main Menu Strip"
        '
        'menuBtnFile
        '
        Me.menuBtnFile.DropDownItems.AddRange(New System.Windows.Forms.ToolStripItem() {Me.menuBtnAdd, Me.menuBtnProgramInfo, Me.menuBtnRename, Me.menuBtnRemove, Me.menuBtnExit})
        Me.menuBtnFile.Name = "menuBtnFile"
        Me.menuBtnFile.Size = New System.Drawing.Size(35, 20)
        Me.menuBtnFile.Text = "File"
        '
        'menuBtnAdd
        '
        Me.menuBtnAdd.Name = "menuBtnAdd"
        Me.menuBtnAdd.Size = New System.Drawing.Size(184, 22)
        Me.menuBtnAdd.Text = "Add Programs..."
        '
        'menuBtnProgramInfo
        '
        Me.menuBtnProgramInfo.Name = "menuBtnProgramInfo"
        Me.menuBtnProgramInfo.Size = New System.Drawing.Size(184, 22)
        Me.menuBtnProgramInfo.Text = "Program Info"
        '
        'menuBtnRename
        '
        Me.menuBtnRename.Name = "menuBtnRename"
        Me.menuBtnRename.Size = New System.Drawing.Size(184, 22)
        Me.menuBtnRename.Text = "Rename Program"
        '
        'menuBtnRemove
        '
        Me.menuBtnRemove.Name = "menuBtnRemove"
        Me.menuBtnRemove.Size = New System.Drawing.Size(184, 22)
        Me.menuBtnRemove.Text = "Remove Programs..."
        '
        'menuBtnExit
        '
        Me.menuBtnExit.Name = "menuBtnExit"
        Me.menuBtnExit.Size = New System.Drawing.Size(184, 22)
        Me.menuBtnExit.Text = "Exit"
        '
        'PreferencesToolStripMenuItem
        '
        Me.PreferencesToolStripMenuItem.Name = "PreferencesToolStripMenuItem"
        Me.PreferencesToolStripMenuItem.Size = New System.Drawing.Size(77, 20)
        Me.PreferencesToolStripMenuItem.Text = "Preferences"
        '
        'menuBtnAdvanced
        '
        Me.menuBtnAdvanced.DropDownItems.AddRange(New System.Windows.Forms.ToolStripItem() {Me.menuBtnSearch})
        Me.menuBtnAdvanced.Name = "menuBtnAdvanced"
        Me.menuBtnAdvanced.Size = New System.Drawing.Size(67, 20)
        Me.menuBtnAdvanced.Text = "Advanced"
        '
        'menuBtnSearch
        '
        Me.menuBtnSearch.Name = "menuBtnSearch"
        Me.menuBtnSearch.Size = New System.Drawing.Size(176, 22)
        Me.menuBtnSearch.Text = "Add From Folder..."
        '
        'menuBtnAbout
        '
        Me.menuBtnAbout.Name = "menuBtnAbout"
        Me.menuBtnAbout.Size = New System.Drawing.Size(48, 20)
        Me.menuBtnAbout.Text = "About"
        '
        'tabMain
        '
        Me.tabMain.Controls.Add(Me.tabOrganizer)
        Me.tabMain.Controls.Add(Me.tabDownloader)
        Me.tabMain.Location = New System.Drawing.Point(12, 27)
        Me.tabMain.Name = "tabMain"
        Me.tabMain.SelectedIndex = 0
        Me.tabMain.Size = New System.Drawing.Size(488, 309)
        Me.tabMain.TabIndex = 5
        '
        'tabOrganizer
        '
        Me.tabOrganizer.Controls.Add(Me.lblProgramInfo)
        Me.tabOrganizer.Controls.Add(Me.listPrograms)
        Me.tabOrganizer.Location = New System.Drawing.Point(4, 22)
        Me.tabOrganizer.Name = "tabOrganizer"
        Me.tabOrganizer.Padding = New System.Windows.Forms.Padding(3)
        Me.tabOrganizer.Size = New System.Drawing.Size(480, 283)
        Me.tabOrganizer.TabIndex = 0
        Me.tabOrganizer.Text = "Program Organizer"
        Me.tabOrganizer.UseVisualStyleBackColor = True
        '
        'lblProgramInfo
        '
        Me.lblProgramInfo.AutoSize = True
        Me.lblProgramInfo.Location = New System.Drawing.Point(183, 267)
        Me.lblProgramInfo.Name = "lblProgramInfo"
        Me.lblProgramInfo.Size = New System.Drawing.Size(91, 13)
        Me.lblProgramInfo.TabIndex = 3
        Me.lblProgramInfo.Text = "0 Programs, 0 MB"
        '
        'tabDownloader
        '
        Me.tabDownloader.Controls.Add(Me.webDownloader)
        Me.tabDownloader.Location = New System.Drawing.Point(4, 22)
        Me.tabDownloader.Name = "tabDownloader"
        Me.tabDownloader.Padding = New System.Windows.Forms.Padding(3)
        Me.tabDownloader.Size = New System.Drawing.Size(480, 283)
        Me.tabDownloader.TabIndex = 1
        Me.tabDownloader.Text = "Program Downloader"
        Me.tabDownloader.UseVisualStyleBackColor = True
        '
        'webDownloader
        '
        Me.webDownloader.ContextMenuStrip = Me.conMenuDownloader
        Me.webDownloader.Dock = System.Windows.Forms.DockStyle.Fill
        Me.webDownloader.IsWebBrowserContextMenuEnabled = False
        Me.webDownloader.Location = New System.Drawing.Point(3, 3)
        Me.webDownloader.MinimumSize = New System.Drawing.Size(20, 20)
        Me.webDownloader.Name = "webDownloader"
        Me.webDownloader.Size = New System.Drawing.Size(474, 277)
        Me.webDownloader.TabIndex = 0
        '
        'conMenuDownloader
        '
        Me.conMenuDownloader.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.conMenuBtnMessage})
        Me.conMenuDownloader.Name = "conMenuDownloader"
        Me.conMenuDownloader.Size = New System.Drawing.Size(153, 26)
        '
        'conMenuBtnMessage
        '
        Me.conMenuBtnMessage.Name = "conMenuBtnMessage"
        Me.conMenuBtnMessage.Size = New System.Drawing.Size(152, 22)
        Me.conMenuBtnMessage.Text = "View Message"
        '
        'timSave
        '
        '
        'formMain
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(512, 348)
        Me.Controls.Add(Me.menuMain)
        Me.Controls.Add(Me.tabMain)
        Me.Icon = CType(resources.GetObject("$this.Icon"), System.Drawing.Icon)
        Me.MainMenuStrip = Me.menuMain
        Me.Name = "formMain"
        Me.Text = "Program Organization Simplifier"
        Me.conMenuPrograms.ResumeLayout(False)
        Me.menuMain.ResumeLayout(False)
        Me.menuMain.PerformLayout()
        Me.tabMain.ResumeLayout(False)
        Me.tabOrganizer.ResumeLayout(False)
        Me.tabOrganizer.PerformLayout()
        Me.tabDownloader.ResumeLayout(False)
        Me.conMenuDownloader.ResumeLayout(False)
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents openFileProgram As System.Windows.Forms.OpenFileDialog
    Friend WithEvents listPrograms As System.Windows.Forms.ListView
    Friend WithEvents programImages As System.Windows.Forms.ImageList
    Friend WithEvents menuMain As System.Windows.Forms.MenuStrip
    Friend WithEvents menuBtnFile As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnAdd As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnRemove As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents conMenuPrograms As System.Windows.Forms.ContextMenuStrip
    Friend WithEvents conMenuBtnAdd As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents conMenuBtnRemove As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents conMenuBtnRename As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnExit As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents conMenuBtnOpen As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnAbout As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnRename As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnAdvanced As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnSearch As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents folderSearch As System.Windows.Forms.FolderBrowserDialog
    Friend WithEvents conMenuSeperator1 As System.Windows.Forms.ToolStripSeparator
    Friend WithEvents tabMain As System.Windows.Forms.TabControl
    Friend WithEvents tabOrganizer As System.Windows.Forms.TabPage
    Friend WithEvents tabDownloader As System.Windows.Forms.TabPage
    Friend WithEvents webDownloader As System.Windows.Forms.WebBrowser
    Friend WithEvents conMenuDownloader As System.Windows.Forms.ContextMenuStrip
    Friend WithEvents conMenuBtnMessage As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents PreferencesToolStripMenuItem As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents lblProgramInfo As System.Windows.Forms.Label
    Friend WithEvents conMenuBtnProgramInfo As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnProgramInfo As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents timSave As System.Windows.Forms.Timer

End Class
