<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Public Class formPluginConverter
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
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(formPluginConverter))
        Me.btnOpen = New System.Windows.Forms.Button
        Me.openBookmarkCollection = New System.Windows.Forms.OpenFileDialog
        Me.radSameDirectory = New System.Windows.Forms.RadioButton
        Me.radPluginDirectory = New System.Windows.Forms.RadioButton
        Me.checkOverwrite = New System.Windows.Forms.CheckBox
        Me.lblFileDirectory = New System.Windows.Forms.Label
        Me.lblSaveAs = New System.Windows.Forms.Label
        Me.checkUseSameName = New System.Windows.Forms.CheckBox
        Me.txtFileName = New System.Windows.Forms.TextBox
        Me.txtNoDescription = New System.Windows.Forms.TextBox
        Me.lblDefaultNoDescription = New System.Windows.Forms.Label
        Me.SuspendLayout()
        '
        'btnOpen
        '
        Me.btnOpen.AutoSize = True
        Me.btnOpen.Location = New System.Drawing.Point(12, 12)
        Me.btnOpen.Name = "btnOpen"
        Me.btnOpen.Size = New System.Drawing.Size(139, 23)
        Me.btnOpen.TabIndex = 0
        Me.btnOpen.Text = "Open Bookmark Collection"
        '
        'openBookmarkCollection
        '
        Me.openBookmarkCollection.Filter = "Hex Workshop Bookmark Files (.hbk)|*.hbk"
        '
        'radSameDirectory
        '
        Me.radSameDirectory.AutoSize = True
        Me.radSameDirectory.Location = New System.Drawing.Point(12, 41)
        Me.radSameDirectory.Name = "radSameDirectory"
        Me.radSameDirectory.Size = New System.Drawing.Size(129, 17)
        Me.radSameDirectory.TabIndex = 1
        Me.radSameDirectory.TabStop = False
        Me.radSameDirectory.Text = "Save to same directory"
        '
        'radPluginDirectory
        '
        Me.radPluginDirectory.AutoSize = True
        Me.radPluginDirectory.Checked = True
        Me.radPluginDirectory.Location = New System.Drawing.Point(12, 64)
        Me.radPluginDirectory.Name = "radPluginDirectory"
        Me.radPluginDirectory.Size = New System.Drawing.Size(132, 17)
        Me.radPluginDirectory.TabIndex = 2
        Me.radPluginDirectory.Text = "Save to plugin directory"
        '
        'checkOverwrite
        '
        Me.checkOverwrite.AutoSize = True
        Me.checkOverwrite.Checked = True
        Me.checkOverwrite.CheckState = System.Windows.Forms.CheckState.Checked
        Me.checkOverwrite.Location = New System.Drawing.Point(150, 64)
        Me.checkOverwrite.Name = "checkOverwrite"
        Me.checkOverwrite.Size = New System.Drawing.Size(132, 17)
        Me.checkOverwrite.TabIndex = 3
        Me.checkOverwrite.Text = "Automatically Overwrite"
        '
        'lblFileDirectory
        '
        Me.lblFileDirectory.AutoSize = True
        Me.lblFileDirectory.Location = New System.Drawing.Point(12, 84)
        Me.lblFileDirectory.Name = "lblFileDirectory"
        Me.lblFileDirectory.Size = New System.Drawing.Size(51, 13)
        Me.lblFileDirectory.TabIndex = 4
        Me.lblFileDirectory.Text = "Directory: "
        '
        'lblSaveAs
        '
        Me.lblSaveAs.AutoSize = True
        Me.lblSaveAs.Location = New System.Drawing.Point(14, 109)
        Me.lblSaveAs.Name = "lblSaveAs"
        Me.lblSaveAs.Size = New System.Drawing.Size(46, 13)
        Me.lblSaveAs.TabIndex = 5
        Me.lblSaveAs.Text = "Save As:"
        '
        'checkUseSameName
        '
        Me.checkUseSameName.AutoSize = True
        Me.checkUseSameName.Checked = True
        Me.checkUseSameName.CheckState = System.Windows.Forms.CheckState.Checked
        Me.checkUseSameName.Location = New System.Drawing.Point(302, 108)
        Me.checkUseSameName.Name = "checkUseSameName"
        Me.checkUseSameName.Size = New System.Drawing.Size(166, 17)
        Me.checkUseSameName.TabIndex = 6
        Me.checkUseSameName.Text = "Use Same Name As Collection"
        '
        'txtFileName
        '
        Me.txtFileName.Location = New System.Drawing.Point(64, 106)
        Me.txtFileName.MaxLength = 30
        Me.txtFileName.Name = "txtFileName"
        Me.txtFileName.Size = New System.Drawing.Size(232, 20)
        Me.txtFileName.TabIndex = 7
        '
        'txtNoDescription
        '
        Me.txtNoDescription.Location = New System.Drawing.Point(158, 33)
        Me.txtNoDescription.MaxLength = 0
        Me.txtNoDescription.Name = "txtNoDescription"
        Me.txtNoDescription.Size = New System.Drawing.Size(192, 20)
        Me.txtNoDescription.TabIndex = 8
        Me.txtNoDescription.Text = "No Description"
        '
        'lblDefaultNoDescription
        '
        Me.lblDefaultNoDescription.AutoSize = True
        Me.lblDefaultNoDescription.Location = New System.Drawing.Point(157, 17)
        Me.lblDefaultNoDescription.Name = "lblDefaultNoDescription"
        Me.lblDefaultNoDescription.Size = New System.Drawing.Size(113, 13)
        Me.lblDefaultNoDescription.TabIndex = 9
        Me.lblDefaultNoDescription.Text = "Default No Description:"
        '
        'formPluginConverter
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(480, 135)
        Me.Controls.Add(Me.lblDefaultNoDescription)
        Me.Controls.Add(Me.txtNoDescription)
        Me.Controls.Add(Me.txtFileName)
        Me.Controls.Add(Me.checkUseSameName)
        Me.Controls.Add(Me.lblSaveAs)
        Me.Controls.Add(Me.lblFileDirectory)
        Me.Controls.Add(Me.checkOverwrite)
        Me.Controls.Add(Me.radPluginDirectory)
        Me.Controls.Add(Me.radSameDirectory)
        Me.Controls.Add(Me.btnOpen)
        Me.Icon = CType(resources.GetObject("$this.Icon"), System.Drawing.Icon)
        Me.Name = "formPluginConverter"
        Me.ShowInTaskbar = False
        Me.Text = "Plugin Converter"
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents btnOpen As System.Windows.Forms.Button
    Friend WithEvents openBookmarkCollection As System.Windows.Forms.OpenFileDialog
    Friend WithEvents radSameDirectory As System.Windows.Forms.RadioButton
    Friend WithEvents radPluginDirectory As System.Windows.Forms.RadioButton
    Friend WithEvents checkOverwrite As System.Windows.Forms.CheckBox
    Friend WithEvents lblFileDirectory As System.Windows.Forms.Label
    Friend WithEvents lblSaveAs As System.Windows.Forms.Label
    Friend WithEvents checkUseSameName As System.Windows.Forms.CheckBox
    Friend WithEvents txtFileName As System.Windows.Forms.TextBox
    Friend WithEvents txtNoDescription As System.Windows.Forms.TextBox
    Friend WithEvents lblDefaultNoDescription As System.Windows.Forms.Label
End Class
