<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Public Class formEditPlugin
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
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(formEditPlugin))
        Me.txtPluginSource = New System.Windows.Forms.TextBox
        Me.btnEmptyButton = New System.Windows.Forms.Button
        Me.btnBlankButton = New System.Windows.Forms.Button
        Me.btnNullButton = New System.Windows.Forms.Button
        Me.btnSavePlugin = New System.Windows.Forms.Button
        Me.lblPluginName = New System.Windows.Forms.Label
        Me.SuspendLayout()
        '
        'txtPluginSource
        '
        Me.txtPluginSource.Dock = System.Windows.Forms.DockStyle.Top
        Me.txtPluginSource.Enabled = False
        Me.txtPluginSource.Font = New System.Drawing.Font("Courier New", 8.25!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.txtPluginSource.Location = New System.Drawing.Point(0, 0)
        Me.txtPluginSource.Multiline = True
        Me.txtPluginSource.Name = "txtPluginSource"
        Me.txtPluginSource.ScrollBars = System.Windows.Forms.ScrollBars.Both
        Me.txtPluginSource.Size = New System.Drawing.Size(305, 312)
        Me.txtPluginSource.TabIndex = 0
        Me.txtPluginSource.WordWrap = False
        '
        'btnEmptyButton
        '
        Me.btnEmptyButton.Dock = System.Windows.Forms.DockStyle.Bottom
        Me.btnEmptyButton.Location = New System.Drawing.Point(0, 319)
        Me.btnEmptyButton.Name = "btnEmptyButton"
        Me.btnEmptyButton.Size = New System.Drawing.Size(305, 22)
        Me.btnEmptyButton.TabIndex = 1
        Me.btnEmptyButton.Text = "Button1"
        '
        'btnBlankButton
        '
        Me.btnBlankButton.Dock = System.Windows.Forms.DockStyle.Bottom
        Me.btnBlankButton.Location = New System.Drawing.Point(0, 319)
        Me.btnBlankButton.Name = "btnBlankButton"
        Me.btnBlankButton.Size = New System.Drawing.Size(305, 22)
        Me.btnBlankButton.TabIndex = 1
        Me.btnBlankButton.Text = "Button1"
        '
        'btnNullButton
        '
        Me.btnNullButton.Dock = System.Windows.Forms.DockStyle.Bottom
        Me.btnNullButton.Location = New System.Drawing.Point(0, 319)
        Me.btnNullButton.Name = "btnNullButton"
        Me.btnNullButton.Size = New System.Drawing.Size(305, 22)
        Me.btnNullButton.TabIndex = 1
        Me.btnNullButton.Text = "Button1"
        '
        'btnSavePlugin
        '
        Me.btnSavePlugin.AutoSize = True
        Me.btnSavePlugin.Enabled = False
        Me.btnSavePlugin.Location = New System.Drawing.Point(0, 318)
        Me.btnSavePlugin.Name = "btnSavePlugin"
        Me.btnSavePlugin.Size = New System.Drawing.Size(107, 23)
        Me.btnSavePlugin.TabIndex = 1
        Me.btnSavePlugin.Text = "Save Plugin Source"
        '
        'lblPluginName
        '
        Me.lblPluginName.AutoSize = True
        Me.lblPluginName.Font = New System.Drawing.Font("Microsoft Sans Serif", 8.25!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lblPluginName.Location = New System.Drawing.Point(113, 323)
        Me.lblPluginName.Name = "lblPluginName"
        Me.lblPluginName.Size = New System.Drawing.Size(80, 13)
        Me.lblPluginName.TabIndex = 2
        Me.lblPluginName.Text = "No Plugin Name"
        '
        'formEditPlugin
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(305, 341)
        Me.Controls.Add(Me.lblPluginName)
        Me.Controls.Add(Me.btnSavePlugin)
        Me.Controls.Add(Me.txtPluginSource)
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedToolWindow
        Me.Icon = CType(resources.GetObject("$this.Icon"), System.Drawing.Icon)
        Me.Location = New System.Drawing.Point(713, 208)
        Me.Name = "formEditPlugin"
        Me.ShowInTaskbar = False
        Me.StartPosition = System.Windows.Forms.FormStartPosition.Manual
        Me.Text = "No Map Opened"
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents txtPluginSource As System.Windows.Forms.TextBox
    Friend WithEvents btnEmptyButton As System.Windows.Forms.Button
    Friend WithEvents btnBlankButton As System.Windows.Forms.Button
    Friend WithEvents btnNullButton As System.Windows.Forms.Button
    Friend WithEvents btnSavePlugin As System.Windows.Forms.Button
    Friend WithEvents lblPluginName As System.Windows.Forms.Label
End Class
