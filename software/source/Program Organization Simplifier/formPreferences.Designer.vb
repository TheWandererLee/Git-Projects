<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class formPreferences
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
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(formPreferences))
        Me.radOneClick = New System.Windows.Forms.RadioButton
        Me.grpProgramActivation = New System.Windows.Forms.GroupBox
        Me.radTwoClicks = New System.Windows.Forms.RadioButton
        Me.cboxAllowMessages = New System.Windows.Forms.CheckBox
        Me.btnOK = New System.Windows.Forms.Button
        Me.grpProgramActivation.SuspendLayout()
        Me.SuspendLayout()
        '
        'radOneClick
        '
        Me.radOneClick.AutoSize = True
        Me.radOneClick.Checked = True
        Me.radOneClick.Location = New System.Drawing.Point(6, 19)
        Me.radOneClick.Name = "radOneClick"
        Me.radOneClick.Size = New System.Drawing.Size(80, 17)
        Me.radOneClick.TabIndex = 0
        Me.radOneClick.TabStop = True
        Me.radOneClick.Text = "Single Click"
        Me.radOneClick.UseVisualStyleBackColor = True
        '
        'grpProgramActivation
        '
        Me.grpProgramActivation.Controls.Add(Me.radTwoClicks)
        Me.grpProgramActivation.Controls.Add(Me.radOneClick)
        Me.grpProgramActivation.Location = New System.Drawing.Point(12, 12)
        Me.grpProgramActivation.Name = "grpProgramActivation"
        Me.grpProgramActivation.Size = New System.Drawing.Size(200, 66)
        Me.grpProgramActivation.TabIndex = 1
        Me.grpProgramActivation.TabStop = False
        Me.grpProgramActivation.Text = "Program Activation"
        '
        'radTwoClicks
        '
        Me.radTwoClicks.AutoSize = True
        Me.radTwoClicks.Location = New System.Drawing.Point(6, 42)
        Me.radTwoClicks.Name = "radTwoClicks"
        Me.radTwoClicks.Size = New System.Drawing.Size(85, 17)
        Me.radTwoClicks.TabIndex = 1
        Me.radTwoClicks.Text = "Double Click"
        Me.radTwoClicks.UseVisualStyleBackColor = True
        '
        'cboxAllowMessages
        '
        Me.cboxAllowMessages.AutoSize = True
        Me.cboxAllowMessages.Location = New System.Drawing.Point(12, 84)
        Me.cboxAllowMessages.Name = "cboxAllowMessages"
        Me.cboxAllowMessages.Size = New System.Drawing.Size(210, 17)
        Me.cboxAllowMessages.TabIndex = 2
        Me.cboxAllowMessages.Text = "Allow Messages (Program Downloader)"
        Me.cboxAllowMessages.UseVisualStyleBackColor = True
        '
        'btnOK
        '
        Me.btnOK.Location = New System.Drawing.Point(139, 107)
        Me.btnOK.Name = "btnOK"
        Me.btnOK.Size = New System.Drawing.Size(75, 23)
        Me.btnOK.TabIndex = 3
        Me.btnOK.Text = "OK"
        Me.btnOK.UseVisualStyleBackColor = True
        '
        'formPreferences
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(227, 140)
        Me.Controls.Add(Me.btnOK)
        Me.Controls.Add(Me.cboxAllowMessages)
        Me.Controls.Add(Me.grpProgramActivation)
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedSingle
        Me.Icon = CType(resources.GetObject("$this.Icon"), System.Drawing.Icon)
        Me.Name = "formPreferences"
        Me.Text = "Preferences"
        Me.TopMost = True
        Me.grpProgramActivation.ResumeLayout(False)
        Me.grpProgramActivation.PerformLayout()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents radOneClick As System.Windows.Forms.RadioButton
    Friend WithEvents grpProgramActivation As System.Windows.Forms.GroupBox
    Friend WithEvents radTwoClicks As System.Windows.Forms.RadioButton
    Friend WithEvents cboxAllowMessages As System.Windows.Forms.CheckBox
    Friend WithEvents btnOK As System.Windows.Forms.Button
End Class
