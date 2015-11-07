<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class formError
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
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(formError))
        Me.lblError = New System.Windows.Forms.Label
        Me.lblMessage = New System.Windows.Forms.Label
        Me.txtError = New System.Windows.Forms.TextBox
        Me.lnkEmail = New System.Windows.Forms.LinkLabel
        Me.SuspendLayout()
        '
        'lblError
        '
        Me.lblError.AutoSize = True
        Me.lblError.Location = New System.Drawing.Point(12, 16)
        Me.lblError.Name = "lblError"
        Me.lblError.Size = New System.Drawing.Size(32, 13)
        Me.lblError.TabIndex = 0
        Me.lblError.Text = "Error:"
        '
        'lblMessage
        '
        Me.lblMessage.Location = New System.Drawing.Point(12, 48)
        Me.lblMessage.Name = "lblMessage"
        Me.lblMessage.Size = New System.Drawing.Size(234, 29)
        Me.lblMessage.TabIndex = 1
        Me.lblMessage.Text = "A description of the error is below, please click the link below and send it to T" & _
            "heWandererLee."
        '
        'txtError
        '
        Me.txtError.Location = New System.Drawing.Point(12, 80)
        Me.txtError.Multiline = True
        Me.txtError.Name = "txtError"
        Me.txtError.ReadOnly = True
        Me.txtError.ScrollBars = System.Windows.Forms.ScrollBars.Both
        Me.txtError.Size = New System.Drawing.Size(391, 149)
        Me.txtError.TabIndex = 2
        Me.txtError.WordWrap = False
        '
        'lnkEmail
        '
        Me.lnkEmail.AutoSize = True
        Me.lnkEmail.Cursor = System.Windows.Forms.Cursors.Hand
        Me.lnkEmail.Location = New System.Drawing.Point(12, 232)
        Me.lnkEmail.Name = "lnkEmail"
        Me.lnkEmail.Size = New System.Drawing.Size(234, 13)
        Me.lnkEmail.TabIndex = 3
        Me.lnkEmail.TabStop = True
        Me.lnkEmail.Text = "Email TheWandererLee with this Error Message."
        '
        'formError
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(415, 254)
        Me.Controls.Add(Me.lnkEmail)
        Me.Controls.Add(Me.txtError)
        Me.Controls.Add(Me.lblMessage)
        Me.Controls.Add(Me.lblError)
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedSingle
        Me.Icon = CType(resources.GetObject("$this.Icon"), System.Drawing.Icon)
        Me.MaximizeBox = False
        Me.MinimizeBox = False
        Me.Name = "formError"
        Me.ShowInTaskbar = False
        Me.Text = "BSP Master - Error"
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents lblError As System.Windows.Forms.Label
    Friend WithEvents lblMessage As System.Windows.Forms.Label
    Friend WithEvents txtError As System.Windows.Forms.TextBox
    Friend WithEvents lnkEmail As System.Windows.Forms.LinkLabel
End Class
