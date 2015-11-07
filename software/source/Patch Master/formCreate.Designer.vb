<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class formCreate
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
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(formCreate))
        Me.btnOpenOriginal = New System.Windows.Forms.Button
        Me.txtOriginal = New System.Windows.Forms.TextBox
        Me.txtModified = New System.Windows.Forms.TextBox
        Me.btnOpenModified = New System.Windows.Forms.Button
        Me.openFileMain = New System.Windows.Forms.OpenFileDialog
        Me.cboxCreatePpf = New System.Windows.Forms.CheckBox
        Me.cboxCreateSppf = New System.Windows.Forms.CheckBox
        Me.txtPatch = New System.Windows.Forms.TextBox
        Me.btnPatchPath = New System.Windows.Forms.Button
        Me.txtDescription = New System.Windows.Forms.TextBox
        Me.lblDescription = New System.Windows.Forms.Label
        Me.saveFileMain = New System.Windows.Forms.SaveFileDialog
        Me.btnCreatePatch = New System.Windows.Forms.Button
        Me.statusMain = New System.Windows.Forms.StatusStrip
        Me.lblStatus = New System.Windows.Forms.ToolStripStatusLabel
        Me.cboxCreateMppf = New System.Windows.Forms.CheckBox
        Me.grpPatchCreation = New System.Windows.Forms.GroupBox
        Me.progMppf = New System.Windows.Forms.ProgressBar
        Me.progSppf = New System.Windows.Forms.ProgressBar
        Me.cboxMppfDescription = New System.Windows.Forms.CheckBox
        Me.progPpf = New System.Windows.Forms.ProgressBar
        Me.timDecrease = New System.Windows.Forms.Timer(Me.components)
        Me.timStall = New System.Windows.Forms.Timer(Me.components)
        Me.statusMain.SuspendLayout()
        Me.grpPatchCreation.SuspendLayout()
        Me.SuspendLayout()
        '
        'btnOpenOriginal
        '
        Me.btnOpenOriginal.Location = New System.Drawing.Point(374, 12)
        Me.btnOpenOriginal.Name = "btnOpenOriginal"
        Me.btnOpenOriginal.Size = New System.Drawing.Size(125, 23)
        Me.btnOpenOriginal.TabIndex = 0
        Me.btnOpenOriginal.Text = "Open Original File"
        Me.btnOpenOriginal.UseVisualStyleBackColor = True
        '
        'txtOriginal
        '
        Me.txtOriginal.Location = New System.Drawing.Point(12, 14)
        Me.txtOriginal.Name = "txtOriginal"
        Me.txtOriginal.Size = New System.Drawing.Size(356, 20)
        Me.txtOriginal.TabIndex = 1
        '
        'txtModified
        '
        Me.txtModified.Location = New System.Drawing.Point(12, 43)
        Me.txtModified.Name = "txtModified"
        Me.txtModified.Size = New System.Drawing.Size(356, 20)
        Me.txtModified.TabIndex = 2
        '
        'btnOpenModified
        '
        Me.btnOpenModified.Location = New System.Drawing.Point(374, 41)
        Me.btnOpenModified.Name = "btnOpenModified"
        Me.btnOpenModified.Size = New System.Drawing.Size(125, 23)
        Me.btnOpenModified.TabIndex = 3
        Me.btnOpenModified.Text = "Open Modified File"
        Me.btnOpenModified.UseVisualStyleBackColor = True
        '
        'openFileMain
        '
        Me.openFileMain.Filter = "Halo 2 Map Files (*.map)|*.map|All Files (*.*)|*.*"
        Me.openFileMain.FilterIndex = 2
        '
        'cboxCreatePpf
        '
        Me.cboxCreatePpf.AutoSize = True
        Me.cboxCreatePpf.Checked = True
        Me.cboxCreatePpf.CheckState = System.Windows.Forms.CheckState.Checked
        Me.cboxCreatePpf.Location = New System.Drawing.Point(6, 19)
        Me.cboxCreatePpf.Name = "cboxCreatePpf"
        Me.cboxCreatePpf.Size = New System.Drawing.Size(49, 17)
        Me.cboxCreatePpf.TabIndex = 4
        Me.cboxCreatePpf.Text = ".PPF"
        Me.cboxCreatePpf.UseVisualStyleBackColor = False
        '
        'cboxCreateSppf
        '
        Me.cboxCreateSppf.AutoSize = True
        Me.cboxCreateSppf.Enabled = False
        Me.cboxCreateSppf.Location = New System.Drawing.Point(6, 42)
        Me.cboxCreateSppf.Name = "cboxCreateSppf"
        Me.cboxCreateSppf.Size = New System.Drawing.Size(56, 17)
        Me.cboxCreateSppf.TabIndex = 5
        Me.cboxCreateSppf.Text = ".SPPF"
        Me.cboxCreateSppf.UseVisualStyleBackColor = True
        '
        'txtPatch
        '
        Me.txtPatch.Location = New System.Drawing.Point(12, 101)
        Me.txtPatch.Name = "txtPatch"
        Me.txtPatch.Size = New System.Drawing.Size(356, 20)
        Me.txtPatch.TabIndex = 6
        '
        'btnPatchPath
        '
        Me.btnPatchPath.Location = New System.Drawing.Point(374, 99)
        Me.btnPatchPath.Name = "btnPatchPath"
        Me.btnPatchPath.Size = New System.Drawing.Size(125, 23)
        Me.btnPatchPath.TabIndex = 7
        Me.btnPatchPath.Text = "Select Patch Path..."
        Me.btnPatchPath.UseVisualStyleBackColor = True
        '
        'txtDescription
        '
        Me.txtDescription.Location = New System.Drawing.Point(138, 128)
        Me.txtDescription.MaxLength = 50
        Me.txtDescription.Name = "txtDescription"
        Me.txtDescription.Size = New System.Drawing.Size(361, 20)
        Me.txtDescription.TabIndex = 8
        '
        'lblDescription
        '
        Me.lblDescription.AutoSize = True
        Me.lblDescription.Location = New System.Drawing.Point(12, 131)
        Me.lblDescription.Name = "lblDescription"
        Me.lblDescription.Size = New System.Drawing.Size(113, 13)
        Me.lblDescription.TabIndex = 9
        Me.lblDescription.Text = "PPF/MPF Description:"
        '
        'saveFileMain
        '
        Me.saveFileMain.FileName = "Patch"
        Me.saveFileMain.Filter = ".ppf and .mpf  (*.ppf, *.mpf)|*.ppf;*.mpf"
        Me.saveFileMain.OverwritePrompt = False
        Me.saveFileMain.ValidateNames = False
        '
        'btnCreatePatch
        '
        Me.btnCreatePatch.Location = New System.Drawing.Point(154, 88)
        Me.btnCreatePatch.Name = "btnCreatePatch"
        Me.btnCreatePatch.Size = New System.Drawing.Size(327, 23)
        Me.btnCreatePatch.TabIndex = 10
        Me.btnCreatePatch.Text = "Create Patch"
        Me.btnCreatePatch.UseVisualStyleBackColor = True
        '
        'statusMain
        '
        Me.statusMain.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.lblStatus})
        Me.statusMain.Location = New System.Drawing.Point(0, 275)
        Me.statusMain.Name = "statusMain"
        Me.statusMain.Size = New System.Drawing.Size(511, 22)
        Me.statusMain.TabIndex = 11
        Me.statusMain.Text = "Main Status"
        '
        'lblStatus
        '
        Me.lblStatus.Name = "lblStatus"
        Me.lblStatus.Size = New System.Drawing.Size(63, 17)
        Me.lblStatus.Text = "Status: Idle"
        '
        'cboxCreateMppf
        '
        Me.cboxCreateMppf.AutoSize = True
        Me.cboxCreateMppf.Checked = True
        Me.cboxCreateMppf.CheckState = System.Windows.Forms.CheckState.Checked
        Me.cboxCreateMppf.Location = New System.Drawing.Point(6, 65)
        Me.cboxCreateMppf.Name = "cboxCreateMppf"
        Me.cboxCreateMppf.Size = New System.Drawing.Size(51, 17)
        Me.cboxCreateMppf.TabIndex = 12
        Me.cboxCreateMppf.Text = ".MPF"
        Me.cboxCreateMppf.UseVisualStyleBackColor = True
        '
        'grpPatchCreation
        '
        Me.grpPatchCreation.Controls.Add(Me.progMppf)
        Me.grpPatchCreation.Controls.Add(Me.progSppf)
        Me.grpPatchCreation.Controls.Add(Me.cboxMppfDescription)
        Me.grpPatchCreation.Controls.Add(Me.progPpf)
        Me.grpPatchCreation.Controls.Add(Me.btnCreatePatch)
        Me.grpPatchCreation.Controls.Add(Me.cboxCreatePpf)
        Me.grpPatchCreation.Controls.Add(Me.cboxCreateMppf)
        Me.grpPatchCreation.Controls.Add(Me.cboxCreateSppf)
        Me.grpPatchCreation.Location = New System.Drawing.Point(12, 154)
        Me.grpPatchCreation.Name = "grpPatchCreation"
        Me.grpPatchCreation.Size = New System.Drawing.Size(487, 117)
        Me.grpPatchCreation.TabIndex = 13
        Me.grpPatchCreation.TabStop = False
        Me.grpPatchCreation.Text = "Patch Creation Options"
        '
        'progMppf
        '
        Me.progMppf.Location = New System.Drawing.Point(70, 65)
        Me.progMppf.Maximum = 1000
        Me.progMppf.Name = "progMppf"
        Me.progMppf.Size = New System.Drawing.Size(411, 17)
        Me.progMppf.Style = System.Windows.Forms.ProgressBarStyle.Continuous
        Me.progMppf.TabIndex = 17
        '
        'progSppf
        '
        Me.progSppf.Location = New System.Drawing.Point(70, 42)
        Me.progSppf.Maximum = 1000
        Me.progSppf.Name = "progSppf"
        Me.progSppf.Size = New System.Drawing.Size(411, 17)
        Me.progSppf.Style = System.Windows.Forms.ProgressBarStyle.Continuous
        Me.progSppf.TabIndex = 16
        '
        'cboxMppfDescription
        '
        Me.cboxMppfDescription.AutoSize = True
        Me.cboxMppfDescription.Checked = True
        Me.cboxMppfDescription.CheckState = System.Windows.Forms.CheckState.Checked
        Me.cboxMppfDescription.Location = New System.Drawing.Point(6, 92)
        Me.cboxMppfDescription.Name = "cboxMppfDescription"
        Me.cboxMppfDescription.Size = New System.Drawing.Size(135, 17)
        Me.cboxMppfDescription.TabIndex = 14
        Me.cboxMppfDescription.Text = "Allow .MPF Description"
        Me.cboxMppfDescription.UseVisualStyleBackColor = True
        '
        'progPpf
        '
        Me.progPpf.Location = New System.Drawing.Point(70, 19)
        Me.progPpf.Maximum = 1000
        Me.progPpf.Name = "progPpf"
        Me.progPpf.Size = New System.Drawing.Size(411, 17)
        Me.progPpf.Style = System.Windows.Forms.ProgressBarStyle.Continuous
        Me.progPpf.TabIndex = 15
        '
        'timDecrease
        '
        Me.timDecrease.Interval = 5
        '
        'timStall
        '
        Me.timStall.Interval = 1000
        '
        'formCreate
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(511, 297)
        Me.Controls.Add(Me.grpPatchCreation)
        Me.Controls.Add(Me.statusMain)
        Me.Controls.Add(Me.lblDescription)
        Me.Controls.Add(Me.txtDescription)
        Me.Controls.Add(Me.btnPatchPath)
        Me.Controls.Add(Me.txtPatch)
        Me.Controls.Add(Me.btnOpenModified)
        Me.Controls.Add(Me.txtModified)
        Me.Controls.Add(Me.txtOriginal)
        Me.Controls.Add(Me.btnOpenOriginal)
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedSingle
        Me.Icon = CType(resources.GetObject("$this.Icon"), System.Drawing.Icon)
        Me.Name = "formCreate"
        Me.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen
        Me.Text = "Create New Patch"
        Me.statusMain.ResumeLayout(False)
        Me.statusMain.PerformLayout()
        Me.grpPatchCreation.ResumeLayout(False)
        Me.grpPatchCreation.PerformLayout()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents btnOpenOriginal As System.Windows.Forms.Button
    Friend WithEvents txtOriginal As System.Windows.Forms.TextBox
    Friend WithEvents txtModified As System.Windows.Forms.TextBox
    Friend WithEvents btnOpenModified As System.Windows.Forms.Button
    Friend WithEvents openFileMain As System.Windows.Forms.OpenFileDialog
    Friend WithEvents cboxCreatePpf As System.Windows.Forms.CheckBox
    Friend WithEvents cboxCreateSppf As System.Windows.Forms.CheckBox
    Friend WithEvents txtPatch As System.Windows.Forms.TextBox
    Friend WithEvents btnPatchPath As System.Windows.Forms.Button
    Friend WithEvents txtDescription As System.Windows.Forms.TextBox
    Friend WithEvents lblDescription As System.Windows.Forms.Label
    Friend WithEvents saveFileMain As System.Windows.Forms.SaveFileDialog
    Friend WithEvents btnCreatePatch As System.Windows.Forms.Button
    Friend WithEvents statusMain As System.Windows.Forms.StatusStrip
    Friend WithEvents lblStatus As System.Windows.Forms.ToolStripStatusLabel
    Friend WithEvents cboxCreateMppf As System.Windows.Forms.CheckBox
    Friend WithEvents grpPatchCreation As System.Windows.Forms.GroupBox
    Friend WithEvents cboxMppfDescription As System.Windows.Forms.CheckBox
    Friend WithEvents progPpf As System.Windows.Forms.ProgressBar
    Friend WithEvents progSppf As System.Windows.Forms.ProgressBar
    Friend WithEvents progMppf As System.Windows.Forms.ProgressBar
    Friend WithEvents timDecrease As System.Windows.Forms.Timer
    Friend WithEvents timStall As System.Windows.Forms.Timer
End Class
