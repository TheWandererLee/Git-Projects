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
        Me.menuMain = New System.Windows.Forms.MenuStrip
        Me.menuBtnFile = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnPatchCreator = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnPreferences = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnOpenPatch = New System.Windows.Forms.ToolStripMenuItem
        Me.openFileMain = New System.Windows.Forms.OpenFileDialog
        Me.webBeta = New System.Windows.Forms.WebBrowser
        Me.grpApplyFile = New System.Windows.Forms.GroupBox
        Me.btnApplyPatch = New System.Windows.Forms.Button
        Me.txtPatchPath = New System.Windows.Forms.TextBox
        Me.btnSelectPatch = New System.Windows.Forms.Button
        Me.openFilePatch = New System.Windows.Forms.OpenFileDialog
        Me.grpApplyPatch = New System.Windows.Forms.GroupBox
        Me.btnApplyFile = New System.Windows.Forms.Button
        Me.txtFilePath = New System.Windows.Forms.TextBox
        Me.btnSelectFile = New System.Windows.Forms.Button
        Me.openFileFile = New System.Windows.Forms.OpenFileDialog
        Me.statusMain = New System.Windows.Forms.StatusStrip
        Me.lblStatus = New System.Windows.Forms.ToolStripStatusLabel
        Me.timIdle = New System.Windows.Forms.Timer(Me.components)
        Me.lblDescription = New System.Windows.Forms.Label
        Me.grpPatchInfo = New System.Windows.Forms.GroupBox
        Me.lblPatchHeader = New System.Windows.Forms.Label
        Me.menuBtnOpen = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnAutopatcher = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnExit = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnAbout = New System.Windows.Forms.ToolStripMenuItem
        Me.menuMain.SuspendLayout()
        Me.grpApplyFile.SuspendLayout()
        Me.grpApplyPatch.SuspendLayout()
        Me.statusMain.SuspendLayout()
        Me.grpPatchInfo.SuspendLayout()
        Me.SuspendLayout()
        '
        'menuMain
        '
        Me.menuMain.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.menuBtnFile, Me.menuBtnPreferences, Me.menuBtnAbout})
        Me.menuMain.Location = New System.Drawing.Point(0, 0)
        Me.menuMain.Name = "menuMain"
        Me.menuMain.Size = New System.Drawing.Size(472, 24)
        Me.menuMain.TabIndex = 0
        Me.menuMain.Text = "Main Menu"
        '
        'menuBtnFile
        '
        Me.menuBtnFile.DropDownItems.AddRange(New System.Windows.Forms.ToolStripItem() {Me.menuBtnOpen, Me.menuBtnPatchCreator, Me.menuBtnAutopatcher, Me.menuBtnExit})
        Me.menuBtnFile.Name = "menuBtnFile"
        Me.menuBtnFile.Size = New System.Drawing.Size(35, 20)
        Me.menuBtnFile.Text = "File"
        '
        'menuBtnPatchCreator
        '
        Me.menuBtnPatchCreator.Name = "menuBtnPatchCreator"
        Me.menuBtnPatchCreator.Size = New System.Drawing.Size(197, 22)
        Me.menuBtnPatchCreator.Text = "Patch Creator"
        '
        'menuBtnPreferences
        '
        Me.menuBtnPreferences.Name = "menuBtnPreferences"
        Me.menuBtnPreferences.Size = New System.Drawing.Size(77, 20)
        Me.menuBtnPreferences.Text = "Preferences"
        '
        'menuBtnOpenPatch
        '
        Me.menuBtnOpenPatch.Name = "menuBtnOpenPatch"
        Me.menuBtnOpenPatch.Size = New System.Drawing.Size(32, 19)
        '
        'openFileMain
        '
        Me.openFileMain.Filter = "Patch Files (*.ppf, *.sppf, *.mpf)|*.ppf;*.sppf;*.mpf|Halo 2 Map Files (*.map)|*." & _
            "map|All Files (*.*)|*.*"
        Me.openFileMain.FilterIndex = 3
        '
        'webBeta
        '
        Me.webBeta.Location = New System.Drawing.Point(-30, 0)
        Me.webBeta.MinimumSize = New System.Drawing.Size(20, 20)
        Me.webBeta.Name = "webBeta"
        Me.webBeta.Size = New System.Drawing.Size(20, 20)
        Me.webBeta.TabIndex = 1
        Me.webBeta.Visible = False
        '
        'grpApplyFile
        '
        Me.grpApplyFile.Controls.Add(Me.btnApplyPatch)
        Me.grpApplyFile.Controls.Add(Me.txtPatchPath)
        Me.grpApplyFile.Controls.Add(Me.btnSelectPatch)
        Me.grpApplyFile.Location = New System.Drawing.Point(12, 27)
        Me.grpApplyFile.Name = "grpApplyFile"
        Me.grpApplyFile.Size = New System.Drawing.Size(448, 77)
        Me.grpApplyFile.TabIndex = 2
        Me.grpApplyFile.TabStop = False
        Me.grpApplyFile.Text = "Apply a patch to this file"
        Me.grpApplyFile.Visible = False
        '
        'btnApplyPatch
        '
        Me.btnApplyPatch.Location = New System.Drawing.Point(6, 48)
        Me.btnApplyPatch.Name = "btnApplyPatch"
        Me.btnApplyPatch.Size = New System.Drawing.Size(436, 23)
        Me.btnApplyPatch.TabIndex = 5
        Me.btnApplyPatch.Text = "Apply Patch"
        Me.btnApplyPatch.UseVisualStyleBackColor = True
        '
        'txtPatchPath
        '
        Me.txtPatchPath.Location = New System.Drawing.Point(6, 21)
        Me.txtPatchPath.Name = "txtPatchPath"
        Me.txtPatchPath.Size = New System.Drawing.Size(340, 20)
        Me.txtPatchPath.TabIndex = 4
        '
        'btnSelectPatch
        '
        Me.btnSelectPatch.Location = New System.Drawing.Point(352, 19)
        Me.btnSelectPatch.Name = "btnSelectPatch"
        Me.btnSelectPatch.Size = New System.Drawing.Size(90, 23)
        Me.btnSelectPatch.TabIndex = 3
        Me.btnSelectPatch.Text = "Select Patch"
        Me.btnSelectPatch.UseVisualStyleBackColor = True
        '
        'openFilePatch
        '
        Me.openFilePatch.Filter = "Patch File (*.ppf, *.sppf, *.mpf)|*.ppf;*.sppf;*.mpf"
        '
        'grpApplyPatch
        '
        Me.grpApplyPatch.Controls.Add(Me.btnApplyFile)
        Me.grpApplyPatch.Controls.Add(Me.txtFilePath)
        Me.grpApplyPatch.Controls.Add(Me.btnSelectFile)
        Me.grpApplyPatch.Location = New System.Drawing.Point(12, 110)
        Me.grpApplyPatch.Name = "grpApplyPatch"
        Me.grpApplyPatch.Size = New System.Drawing.Size(448, 77)
        Me.grpApplyPatch.TabIndex = 4
        Me.grpApplyPatch.TabStop = False
        Me.grpApplyPatch.Text = "Apply this patch to a file"
        Me.grpApplyPatch.Visible = False
        '
        'btnApplyFile
        '
        Me.btnApplyFile.Location = New System.Drawing.Point(6, 48)
        Me.btnApplyFile.Name = "btnApplyFile"
        Me.btnApplyFile.Size = New System.Drawing.Size(436, 23)
        Me.btnApplyFile.TabIndex = 8
        Me.btnApplyFile.Text = "Apply Patch"
        Me.btnApplyFile.UseVisualStyleBackColor = True
        '
        'txtFilePath
        '
        Me.txtFilePath.Location = New System.Drawing.Point(6, 21)
        Me.txtFilePath.Name = "txtFilePath"
        Me.txtFilePath.Size = New System.Drawing.Size(340, 20)
        Me.txtFilePath.TabIndex = 7
        '
        'btnSelectFile
        '
        Me.btnSelectFile.Location = New System.Drawing.Point(352, 19)
        Me.btnSelectFile.Name = "btnSelectFile"
        Me.btnSelectFile.Size = New System.Drawing.Size(90, 23)
        Me.btnSelectFile.TabIndex = 6
        Me.btnSelectFile.Text = "Select File"
        Me.btnSelectFile.UseVisualStyleBackColor = True
        '
        'openFileFile
        '
        Me.openFileFile.Filter = "Halo 2 Map Files (*.map)|*.map|All Files (*.*)|*.*"
        Me.openFileFile.FilterIndex = 2
        '
        'statusMain
        '
        Me.statusMain.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.lblStatus})
        Me.statusMain.Location = New System.Drawing.Point(0, 241)
        Me.statusMain.Name = "statusMain"
        Me.statusMain.Size = New System.Drawing.Size(472, 22)
        Me.statusMain.TabIndex = 5
        Me.statusMain.Text = "Main Status"
        '
        'lblStatus
        '
        Me.lblStatus.Name = "lblStatus"
        Me.lblStatus.Size = New System.Drawing.Size(63, 17)
        Me.lblStatus.Text = "Status: Idle"
        '
        'timIdle
        '
        Me.timIdle.Interval = 5000
        '
        'lblDescription
        '
        Me.lblDescription.AutoSize = True
        Me.lblDescription.Location = New System.Drawing.Point(6, 16)
        Me.lblDescription.Name = "lblDescription"
        Me.lblDescription.Size = New System.Drawing.Size(96, 13)
        Me.lblDescription.TabIndex = 7
        Me.lblDescription.Text = "Description: (none)"
        '
        'grpPatchInfo
        '
        Me.grpPatchInfo.Controls.Add(Me.lblPatchHeader)
        Me.grpPatchInfo.Controls.Add(Me.lblDescription)
        Me.grpPatchInfo.Location = New System.Drawing.Point(12, 193)
        Me.grpPatchInfo.Name = "grpPatchInfo"
        Me.grpPatchInfo.Size = New System.Drawing.Size(448, 45)
        Me.grpPatchInfo.TabIndex = 8
        Me.grpPatchInfo.TabStop = False
        Me.grpPatchInfo.Text = "Patch Information"
        Me.grpPatchInfo.Visible = False
        '
        'lblPatchHeader
        '
        Me.lblPatchHeader.AutoSize = True
        Me.lblPatchHeader.Location = New System.Drawing.Point(6, 29)
        Me.lblPatchHeader.Name = "lblPatchHeader"
        Me.lblPatchHeader.Size = New System.Drawing.Size(109, 13)
        Me.lblPatchHeader.TabIndex = 8
        Me.lblPatchHeader.Text = "Patch Header: (none)"
        '
        'menuBtnOpen
        '
        Me.menuBtnOpen.Image = Global.Patch_Master.My.Resources.Resources.toolBtnOpen
        Me.menuBtnOpen.ImageTransparentColor = System.Drawing.Color.Magenta
        Me.menuBtnOpen.Name = "menuBtnOpen"
        Me.menuBtnOpen.Size = New System.Drawing.Size(197, 22)
        Me.menuBtnOpen.Text = "Open File/Patch"
        '
        'menuBtnAutopatcher
        '
        Me.menuBtnAutopatcher.Image = Global.Patch_Master.My.Resources.Resources.autopatcher
        Me.menuBtnAutopatcher.Name = "menuBtnAutopatcher"
        Me.menuBtnAutopatcher.Size = New System.Drawing.Size(197, 22)
        Me.menuBtnAutopatcher.Text = "Autopatcher Generator"
        '
        'menuBtnExit
        '
        Me.menuBtnExit.Image = Global.Patch_Master.My.Resources.Resources.toolButtonExit
        Me.menuBtnExit.ImageTransparentColor = System.Drawing.Color.Magenta
        Me.menuBtnExit.Name = "menuBtnExit"
        Me.menuBtnExit.Size = New System.Drawing.Size(197, 22)
        Me.menuBtnExit.Text = "Exit"
        '
        'menuBtnAbout
        '
        Me.menuBtnAbout.Alignment = System.Windows.Forms.ToolStripItemAlignment.Right
        Me.menuBtnAbout.Image = Global.Patch_Master.My.Resources.Resources.toolBtnHelp
        Me.menuBtnAbout.ImageTransparentColor = System.Drawing.Color.Magenta
        Me.menuBtnAbout.Name = "menuBtnAbout"
        Me.menuBtnAbout.Size = New System.Drawing.Size(28, 20)
        '
        'formMain
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(472, 263)
        Me.Controls.Add(Me.grpPatchInfo)
        Me.Controls.Add(Me.statusMain)
        Me.Controls.Add(Me.menuMain)
        Me.Controls.Add(Me.grpApplyFile)
        Me.Controls.Add(Me.grpApplyPatch)
        Me.Controls.Add(Me.webBeta)
        Me.Icon = CType(resources.GetObject("$this.Icon"), System.Drawing.Icon)
        Me.MainMenuStrip = Me.menuMain
        Me.Name = "formMain"
        Me.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen
        Me.Text = "Patch Master"
        Me.menuMain.ResumeLayout(False)
        Me.menuMain.PerformLayout()
        Me.grpApplyFile.ResumeLayout(False)
        Me.grpApplyFile.PerformLayout()
        Me.grpApplyPatch.ResumeLayout(False)
        Me.grpApplyPatch.PerformLayout()
        Me.statusMain.ResumeLayout(False)
        Me.statusMain.PerformLayout()
        Me.grpPatchInfo.ResumeLayout(False)
        Me.grpPatchInfo.PerformLayout()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents menuMain As System.Windows.Forms.MenuStrip
    Friend WithEvents menuBtnFile As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnOpenPatch As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents openFileMain As System.Windows.Forms.OpenFileDialog
    Friend WithEvents menuBtnExit As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents webBeta As System.Windows.Forms.WebBrowser
    Friend WithEvents grpApplyFile As System.Windows.Forms.GroupBox
    Friend WithEvents btnApplyPatch As System.Windows.Forms.Button
    Friend WithEvents txtPatchPath As System.Windows.Forms.TextBox
    Friend WithEvents btnSelectPatch As System.Windows.Forms.Button
    Friend WithEvents openFilePatch As System.Windows.Forms.OpenFileDialog
    Friend WithEvents grpApplyPatch As System.Windows.Forms.GroupBox
    Friend WithEvents btnApplyFile As System.Windows.Forms.Button
    Friend WithEvents txtFilePath As System.Windows.Forms.TextBox
    Friend WithEvents btnSelectFile As System.Windows.Forms.Button
    Friend WithEvents openFileFile As System.Windows.Forms.OpenFileDialog
    Friend WithEvents statusMain As System.Windows.Forms.StatusStrip
    Friend WithEvents lblStatus As System.Windows.Forms.ToolStripStatusLabel
    Friend WithEvents timIdle As System.Windows.Forms.Timer
    Friend WithEvents lblDescription As System.Windows.Forms.Label
    Friend WithEvents grpPatchInfo As System.Windows.Forms.GroupBox
    Friend WithEvents lblPatchHeader As System.Windows.Forms.Label
    Friend WithEvents menuBtnPreferences As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnOpen As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnPatchCreator As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnAutopatcher As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnAbout As System.Windows.Forms.ToolStripMenuItem

End Class
