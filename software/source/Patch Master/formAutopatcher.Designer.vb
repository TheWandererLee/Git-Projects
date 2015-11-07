<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class formAutopatcher
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
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(formAutopatcher))
        Me.grpOptions = New System.Windows.Forms.GroupBox
        Me.lblDestination = New System.Windows.Forms.Label
        Me.txtDestination = New System.Windows.Forms.TextBox
        Me.lblSource = New System.Windows.Forms.Label
        Me.txtSource = New System.Windows.Forms.TextBox
        Me.lblPatch = New System.Windows.Forms.Label
        Me.txtPatch = New System.Windows.Forms.TextBox
        Me.txtEnd = New System.Windows.Forms.TextBox
        Me.cboxShowEnd = New System.Windows.Forms.CheckBox
        Me.txtStart = New System.Windows.Forms.TextBox
        Me.cboxShowStart = New System.Windows.Forms.CheckBox
        Me.btnGenerate = New System.Windows.Forms.Button
        Me.txtAutopatcher = New System.Windows.Forms.TextBox
        Me.lblSave = New System.Windows.Forms.Label
        Me.btnSaveAutopatcher = New System.Windows.Forms.Button
        Me.saveFileAutopatcher = New System.Windows.Forms.SaveFileDialog
        Me.cboxTaskbar = New System.Windows.Forms.CheckBox
        Me.grpOptions.SuspendLayout()
        Me.SuspendLayout()
        '
        'grpOptions
        '
        Me.grpOptions.Controls.Add(Me.lblDestination)
        Me.grpOptions.Controls.Add(Me.txtDestination)
        Me.grpOptions.Controls.Add(Me.lblSource)
        Me.grpOptions.Controls.Add(Me.txtSource)
        Me.grpOptions.Controls.Add(Me.lblPatch)
        Me.grpOptions.Controls.Add(Me.txtPatch)
        Me.grpOptions.Controls.Add(Me.txtEnd)
        Me.grpOptions.Controls.Add(Me.cboxShowEnd)
        Me.grpOptions.Controls.Add(Me.txtStart)
        Me.grpOptions.Controls.Add(Me.cboxShowStart)
        Me.grpOptions.Location = New System.Drawing.Point(12, 12)
        Me.grpOptions.Name = "grpOptions"
        Me.grpOptions.Size = New System.Drawing.Size(268, 221)
        Me.grpOptions.TabIndex = 0
        Me.grpOptions.TabStop = False
        Me.grpOptions.Text = "Auto Patcher Options"
        '
        'lblDestination
        '
        Me.lblDestination.Location = New System.Drawing.Point(6, 198)
        Me.lblDestination.Name = "lblDestination"
        Me.lblDestination.Size = New System.Drawing.Size(95, 13)
        Me.lblDestination.TabIndex = 8
        Me.lblDestination.Text = "Destination Folder:"
        Me.lblDestination.TextAlign = System.Drawing.ContentAlignment.MiddleRight
        '
        'txtDestination
        '
        Me.txtDestination.Location = New System.Drawing.Point(107, 195)
        Me.txtDestination.MaxLength = 32
        Me.txtDestination.Name = "txtDestination"
        Me.txtDestination.Size = New System.Drawing.Size(155, 20)
        Me.txtDestination.TabIndex = 7
        Me.txtDestination.Text = "Destination"
        '
        'lblSource
        '
        Me.lblSource.Location = New System.Drawing.Point(6, 172)
        Me.lblSource.Name = "lblSource"
        Me.lblSource.Size = New System.Drawing.Size(95, 13)
        Me.lblSource.TabIndex = 6
        Me.lblSource.Text = "Source Folder:"
        Me.lblSource.TextAlign = System.Drawing.ContentAlignment.MiddleRight
        '
        'txtSource
        '
        Me.txtSource.Location = New System.Drawing.Point(107, 169)
        Me.txtSource.MaxLength = 32
        Me.txtSource.Name = "txtSource"
        Me.txtSource.Size = New System.Drawing.Size(155, 20)
        Me.txtSource.TabIndex = 5
        Me.txtSource.Text = "Source"
        '
        'lblPatch
        '
        Me.lblPatch.Location = New System.Drawing.Point(6, 146)
        Me.lblPatch.Name = "lblPatch"
        Me.lblPatch.Size = New System.Drawing.Size(95, 13)
        Me.lblPatch.TabIndex = 4
        Me.lblPatch.Text = "Patch Folder:"
        Me.lblPatch.TextAlign = System.Drawing.ContentAlignment.MiddleRight
        '
        'txtPatch
        '
        Me.txtPatch.Location = New System.Drawing.Point(107, 143)
        Me.txtPatch.MaxLength = 32
        Me.txtPatch.Name = "txtPatch"
        Me.txtPatch.Size = New System.Drawing.Size(155, 20)
        Me.txtPatch.TabIndex = 2
        Me.txtPatch.Text = "Patches"
        '
        'txtEnd
        '
        Me.txtEnd.Location = New System.Drawing.Point(6, 91)
        Me.txtEnd.MaxLength = 100
        Me.txtEnd.Multiline = True
        Me.txtEnd.Name = "txtEnd"
        Me.txtEnd.ScrollBars = System.Windows.Forms.ScrollBars.Vertical
        Me.txtEnd.Size = New System.Drawing.Size(256, 20)
        Me.txtEnd.TabIndex = 3
        Me.txtEnd.Text = "Successfully applied all patches."
        '
        'cboxShowEnd
        '
        Me.cboxShowEnd.AutoSize = True
        Me.cboxShowEnd.Checked = True
        Me.cboxShowEnd.CheckState = System.Windows.Forms.CheckState.Checked
        Me.cboxShowEnd.Location = New System.Drawing.Point(6, 68)
        Me.cboxShowEnd.Name = "cboxShowEnd"
        Me.cboxShowEnd.Size = New System.Drawing.Size(121, 17)
        Me.cboxShowEnd.TabIndex = 2
        Me.cboxShowEnd.Text = "Show End Message"
        Me.cboxShowEnd.UseVisualStyleBackColor = True
        '
        'txtStart
        '
        Me.txtStart.Location = New System.Drawing.Point(6, 42)
        Me.txtStart.MaxLength = 100
        Me.txtStart.Multiline = True
        Me.txtStart.Name = "txtStart"
        Me.txtStart.ScrollBars = System.Windows.Forms.ScrollBars.Vertical
        Me.txtStart.Size = New System.Drawing.Size(256, 20)
        Me.txtStart.TabIndex = 1
        Me.txtStart.Text = "Applying patches..."
        '
        'cboxShowStart
        '
        Me.cboxShowStart.AutoSize = True
        Me.cboxShowStart.Checked = True
        Me.cboxShowStart.CheckState = System.Windows.Forms.CheckState.Checked
        Me.cboxShowStart.Location = New System.Drawing.Point(6, 19)
        Me.cboxShowStart.Name = "cboxShowStart"
        Me.cboxShowStart.Size = New System.Drawing.Size(124, 17)
        Me.cboxShowStart.TabIndex = 0
        Me.cboxShowStart.Text = "Show Start Message"
        Me.cboxShowStart.UseVisualStyleBackColor = True
        '
        'btnGenerate
        '
        Me.btnGenerate.Location = New System.Drawing.Point(12, 288)
        Me.btnGenerate.Name = "btnGenerate"
        Me.btnGenerate.Size = New System.Drawing.Size(268, 23)
        Me.btnGenerate.TabIndex = 1
        Me.btnGenerate.Text = "Generator Autopatcher"
        Me.btnGenerate.UseVisualStyleBackColor = True
        '
        'txtAutopatcher
        '
        Me.txtAutopatcher.Location = New System.Drawing.Point(125, 262)
        Me.txtAutopatcher.Name = "txtAutopatcher"
        Me.txtAutopatcher.Size = New System.Drawing.Size(131, 20)
        Me.txtAutopatcher.TabIndex = 2
        '
        'lblSave
        '
        Me.lblSave.AutoSize = True
        Me.lblSave.Location = New System.Drawing.Point(12, 265)
        Me.lblSave.Name = "lblSave"
        Me.lblSave.Size = New System.Drawing.Size(117, 13)
        Me.lblSave.TabIndex = 3
        Me.lblSave.Text = "Save Autopatcher As..."
        '
        'btnSaveAutopatcher
        '
        Me.btnSaveAutopatcher.Location = New System.Drawing.Point(256, 261)
        Me.btnSaveAutopatcher.Name = "btnSaveAutopatcher"
        Me.btnSaveAutopatcher.Size = New System.Drawing.Size(24, 23)
        Me.btnSaveAutopatcher.TabIndex = 4
        Me.btnSaveAutopatcher.Text = "..."
        Me.btnSaveAutopatcher.UseVisualStyleBackColor = True
        '
        'saveFileAutopatcher
        '
        Me.saveFileAutopatcher.Filter = "Autopatcher, Executable (*.exe)|*.exe"
        '
        'cboxTaskbar
        '
        Me.cboxTaskbar.AutoSize = True
        Me.cboxTaskbar.Checked = True
        Me.cboxTaskbar.CheckState = System.Windows.Forms.CheckState.Checked
        Me.cboxTaskbar.Location = New System.Drawing.Point(12, 239)
        Me.cboxTaskbar.Name = "cboxTaskbar"
        Me.cboxTaskbar.Size = New System.Drawing.Size(214, 17)
        Me.cboxTaskbar.TabIndex = 5
        Me.cboxTaskbar.Text = "Show Autopatcher in Windows Taskbar"
        Me.cboxTaskbar.UseVisualStyleBackColor = True
        '
        'formAutopatcher
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(292, 323)
        Me.Controls.Add(Me.cboxTaskbar)
        Me.Controls.Add(Me.btnSaveAutopatcher)
        Me.Controls.Add(Me.txtAutopatcher)
        Me.Controls.Add(Me.btnGenerate)
        Me.Controls.Add(Me.grpOptions)
        Me.Controls.Add(Me.lblSave)
        Me.Icon = CType(resources.GetObject("$this.Icon"), System.Drawing.Icon)
        Me.Name = "formAutopatcher"
        Me.Text = "Autopatcher Generator"
        Me.grpOptions.ResumeLayout(False)
        Me.grpOptions.PerformLayout()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents grpOptions As System.Windows.Forms.GroupBox
    Friend WithEvents cboxShowStart As System.Windows.Forms.CheckBox
    Friend WithEvents btnGenerate As System.Windows.Forms.Button
    Friend WithEvents txtStart As System.Windows.Forms.TextBox
    Friend WithEvents txtEnd As System.Windows.Forms.TextBox
    Friend WithEvents cboxShowEnd As System.Windows.Forms.CheckBox
    Friend WithEvents lblDestination As System.Windows.Forms.Label
    Friend WithEvents txtDestination As System.Windows.Forms.TextBox
    Friend WithEvents lblSource As System.Windows.Forms.Label
    Friend WithEvents txtSource As System.Windows.Forms.TextBox
    Friend WithEvents lblPatch As System.Windows.Forms.Label
    Friend WithEvents txtPatch As System.Windows.Forms.TextBox
    Friend WithEvents txtAutopatcher As System.Windows.Forms.TextBox
    Friend WithEvents lblSave As System.Windows.Forms.Label
    Friend WithEvents btnSaveAutopatcher As System.Windows.Forms.Button
    Friend WithEvents saveFileAutopatcher As System.Windows.Forms.SaveFileDialog
    Friend WithEvents cboxTaskbar As System.Windows.Forms.CheckBox
End Class
