<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class OptionsForm
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
        Me.btnOK = New System.Windows.Forms.Button
        Me.traInc = New System.Windows.Forms.TrackBar
        Me.btnDefault = New System.Windows.Forms.Button
        Me.txtInc = New System.Windows.Forms.TextBox
        Me.lblInc = New System.Windows.Forms.Label
        Me.traSpeed = New System.Windows.Forms.TrackBar
        Me.txtSpeed = New System.Windows.Forms.TextBox
        Me.lblSpeed = New System.Windows.Forms.Label
        Me.cboxRed = New System.Windows.Forms.CheckBox
        Me.cboxGreen = New System.Windows.Forms.CheckBox
        Me.cboxBlue = New System.Windows.Forms.CheckBox
        Me.grpIncludeColors = New System.Windows.Forms.GroupBox
        Me.lblAuthor = New System.Windows.Forms.Label
        Me.btnChangeColor = New System.Windows.Forms.Button
        Me.pnlBackgroundColor = New System.Windows.Forms.Panel
        Me.radBackgroundColor = New System.Windows.Forms.RadioButton
        Me.radBackgroundScreen = New System.Windows.Forms.RadioButton
        Me.lblBackground = New System.Windows.Forms.Label
        Me.lblUseColors = New System.Windows.Forms.Label
        Me.cboxClockwise = New System.Windows.Forms.CheckBox
        Me.cboxSpinClear = New System.Windows.Forms.CheckBox
        Me.grpOther = New System.Windows.Forms.GroupBox
        Me.colorBackgroundColor = New System.Windows.Forms.ColorDialog
        CType(Me.traInc, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.traSpeed, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.grpIncludeColors.SuspendLayout()
        Me.grpOther.SuspendLayout()
        Me.SuspendLayout()
        '
        'btnOK
        '
        Me.btnOK.Location = New System.Drawing.Point(288, 97)
        Me.btnOK.Name = "btnOK"
        Me.btnOK.Size = New System.Drawing.Size(75, 23)
        Me.btnOK.TabIndex = 0
        Me.btnOK.Text = "OK"
        Me.btnOK.UseVisualStyleBackColor = True
        '
        'traInc
        '
        Me.traInc.BackColor = System.Drawing.Color.Maroon
        Me.traInc.LargeChange = 45
        Me.traInc.Location = New System.Drawing.Point(75, 12)
        Me.traInc.Maximum = 360
        Me.traInc.Name = "traInc"
        Me.traInc.Size = New System.Drawing.Size(330, 45)
        Me.traInc.SmallChange = 5
        Me.traInc.TabIndex = 1
        Me.traInc.TickFrequency = 90
        Me.traInc.Value = 4
        '
        'btnDefault
        '
        Me.btnDefault.Location = New System.Drawing.Point(369, 97)
        Me.btnDefault.Name = "btnDefault"
        Me.btnDefault.Size = New System.Drawing.Size(75, 23)
        Me.btnDefault.TabIndex = 3
        Me.btnDefault.Text = "Default"
        Me.btnDefault.UseVisualStyleBackColor = True
        '
        'txtInc
        '
        Me.txtInc.BackColor = System.Drawing.Color.Black
        Me.txtInc.ForeColor = System.Drawing.Color.White
        Me.txtInc.Location = New System.Drawing.Point(411, 16)
        Me.txtInc.Name = "txtInc"
        Me.txtInc.ReadOnly = True
        Me.txtInc.Size = New System.Drawing.Size(33, 20)
        Me.txtInc.TabIndex = 2
        Me.txtInc.Text = "1"
        '
        'lblInc
        '
        Me.lblInc.AutoSize = True
        Me.lblInc.BackColor = System.Drawing.Color.Transparent
        Me.lblInc.ForeColor = System.Drawing.Color.White
        Me.lblInc.Location = New System.Drawing.Point(12, 19)
        Me.lblInc.Name = "lblInc"
        Me.lblInc.Size = New System.Drawing.Size(57, 13)
        Me.lblInc.TabIndex = 4
        Me.lblInc.Text = "Increment:"
        '
        'traSpeed
        '
        Me.traSpeed.BackColor = System.Drawing.Color.Maroon
        Me.traSpeed.LargeChange = 45
        Me.traSpeed.Location = New System.Drawing.Point(75, 46)
        Me.traSpeed.Maximum = 99
        Me.traSpeed.Name = "traSpeed"
        Me.traSpeed.Size = New System.Drawing.Size(330, 45)
        Me.traSpeed.SmallChange = 5
        Me.traSpeed.TabIndex = 5
        Me.traSpeed.Value = 99
        '
        'txtSpeed
        '
        Me.txtSpeed.BackColor = System.Drawing.Color.Black
        Me.txtSpeed.ForeColor = System.Drawing.Color.White
        Me.txtSpeed.Location = New System.Drawing.Point(411, 50)
        Me.txtSpeed.Name = "txtSpeed"
        Me.txtSpeed.ReadOnly = True
        Me.txtSpeed.Size = New System.Drawing.Size(33, 20)
        Me.txtSpeed.TabIndex = 6
        Me.txtSpeed.Text = "99"
        '
        'lblSpeed
        '
        Me.lblSpeed.AutoSize = True
        Me.lblSpeed.BackColor = System.Drawing.Color.Transparent
        Me.lblSpeed.ForeColor = System.Drawing.Color.White
        Me.lblSpeed.Location = New System.Drawing.Point(28, 53)
        Me.lblSpeed.Name = "lblSpeed"
        Me.lblSpeed.Size = New System.Drawing.Size(41, 13)
        Me.lblSpeed.TabIndex = 7
        Me.lblSpeed.Text = "Speed:"
        '
        'cboxRed
        '
        Me.cboxRed.AutoSize = True
        Me.cboxRed.ForeColor = System.Drawing.Color.White
        Me.cboxRed.Location = New System.Drawing.Point(73, 19)
        Me.cboxRed.Name = "cboxRed"
        Me.cboxRed.Size = New System.Drawing.Size(46, 17)
        Me.cboxRed.TabIndex = 8
        Me.cboxRed.Text = "Red"
        Me.cboxRed.UseVisualStyleBackColor = True
        '
        'cboxGreen
        '
        Me.cboxGreen.AutoSize = True
        Me.cboxGreen.ForeColor = System.Drawing.Color.White
        Me.cboxGreen.Location = New System.Drawing.Point(125, 19)
        Me.cboxGreen.Name = "cboxGreen"
        Me.cboxGreen.Size = New System.Drawing.Size(55, 17)
        Me.cboxGreen.TabIndex = 9
        Me.cboxGreen.Text = "Green"
        Me.cboxGreen.UseVisualStyleBackColor = True
        '
        'cboxBlue
        '
        Me.cboxBlue.AutoSize = True
        Me.cboxBlue.ForeColor = System.Drawing.Color.White
        Me.cboxBlue.Location = New System.Drawing.Point(186, 19)
        Me.cboxBlue.Name = "cboxBlue"
        Me.cboxBlue.Size = New System.Drawing.Size(47, 17)
        Me.cboxBlue.TabIndex = 10
        Me.cboxBlue.Text = "Blue"
        Me.cboxBlue.UseVisualStyleBackColor = True
        '
        'grpIncludeColors
        '
        Me.grpIncludeColors.BackColor = System.Drawing.Color.Transparent
        Me.grpIncludeColors.Controls.Add(Me.lblAuthor)
        Me.grpIncludeColors.Controls.Add(Me.btnChangeColor)
        Me.grpIncludeColors.Controls.Add(Me.pnlBackgroundColor)
        Me.grpIncludeColors.Controls.Add(Me.radBackgroundColor)
        Me.grpIncludeColors.Controls.Add(Me.radBackgroundScreen)
        Me.grpIncludeColors.Controls.Add(Me.lblBackground)
        Me.grpIncludeColors.Controls.Add(Me.lblUseColors)
        Me.grpIncludeColors.Controls.Add(Me.cboxRed)
        Me.grpIncludeColors.Controls.Add(Me.cboxBlue)
        Me.grpIncludeColors.Controls.Add(Me.cboxGreen)
        Me.grpIncludeColors.ForeColor = System.Drawing.Color.Red
        Me.grpIncludeColors.Location = New System.Drawing.Point(12, 97)
        Me.grpIncludeColors.Name = "grpIncludeColors"
        Me.grpIncludeColors.Size = New System.Drawing.Size(270, 94)
        Me.grpIncludeColors.TabIndex = 11
        Me.grpIncludeColors.TabStop = False
        Me.grpIncludeColors.Text = "Colors"
        '
        'lblAuthor
        '
        Me.lblAuthor.Font = New System.Drawing.Font("Monotype Corsiva", 14.25!, System.Drawing.FontStyle.Italic, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lblAuthor.ForeColor = System.Drawing.Color.DarkOrange
        Me.lblAuthor.Image = Global.Screen_Shaper.My.Resources.Resources.SSaverBackground2
        Me.lblAuthor.Location = New System.Drawing.Point(0, 62)
        Me.lblAuthor.Name = "lblAuthor"
        Me.lblAuthor.Size = New System.Drawing.Size(203, 32)
        Me.lblAuthor.TabIndex = 16
        Me.lblAuthor.Text = "Made by TheWandererLee"
        '
        'btnChangeColor
        '
        Me.btnChangeColor.BackColor = System.Drawing.Color.Transparent
        Me.btnChangeColor.Enabled = False
        Me.btnChangeColor.Font = New System.Drawing.Font("Microsoft Sans Serif", 6.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.btnChangeColor.ForeColor = System.Drawing.Color.Red
        Me.btnChangeColor.Location = New System.Drawing.Point(209, 59)
        Me.btnChangeColor.Name = "btnChangeColor"
        Me.btnChangeColor.Size = New System.Drawing.Size(55, 20)
        Me.btnChangeColor.TabIndex = 15
        Me.btnChangeColor.Text = "Change"
        Me.btnChangeColor.UseVisualStyleBackColor = False
        '
        'pnlBackgroundColor
        '
        Me.pnlBackgroundColor.BackColor = System.Drawing.Color.Transparent
        Me.pnlBackgroundColor.Cursor = System.Windows.Forms.Cursors.Hand
        Me.pnlBackgroundColor.Enabled = False
        Me.pnlBackgroundColor.Location = New System.Drawing.Point(209, 42)
        Me.pnlBackgroundColor.Name = "pnlBackgroundColor"
        Me.pnlBackgroundColor.Size = New System.Drawing.Size(55, 17)
        Me.pnlBackgroundColor.TabIndex = 15
        '
        'radBackgroundColor
        '
        Me.radBackgroundColor.AutoSize = True
        Me.radBackgroundColor.ForeColor = System.Drawing.Color.White
        Me.radBackgroundColor.Location = New System.Drawing.Point(145, 42)
        Me.radBackgroundColor.Name = "radBackgroundColor"
        Me.radBackgroundColor.Size = New System.Drawing.Size(58, 17)
        Me.radBackgroundColor.TabIndex = 14
        Me.radBackgroundColor.Text = "Color..."
        Me.radBackgroundColor.UseVisualStyleBackColor = True
        '
        'radBackgroundScreen
        '
        Me.radBackgroundScreen.AutoSize = True
        Me.radBackgroundScreen.Checked = True
        Me.radBackgroundScreen.ForeColor = System.Drawing.Color.White
        Me.radBackgroundScreen.Location = New System.Drawing.Point(80, 42)
        Me.radBackgroundScreen.Name = "radBackgroundScreen"
        Me.radBackgroundScreen.Size = New System.Drawing.Size(59, 17)
        Me.radBackgroundScreen.TabIndex = 13
        Me.radBackgroundScreen.TabStop = True
        Me.radBackgroundScreen.Text = "Screen"
        Me.radBackgroundScreen.UseVisualStyleBackColor = True
        '
        'lblBackground
        '
        Me.lblBackground.AutoSize = True
        Me.lblBackground.ForeColor = System.Drawing.Color.White
        Me.lblBackground.Location = New System.Drawing.Point(6, 44)
        Me.lblBackground.Name = "lblBackground"
        Me.lblBackground.Size = New System.Drawing.Size(68, 13)
        Me.lblBackground.TabIndex = 12
        Me.lblBackground.Text = "Background:"
        '
        'lblUseColors
        '
        Me.lblUseColors.AutoSize = True
        Me.lblUseColors.ForeColor = System.Drawing.Color.White
        Me.lblUseColors.Location = New System.Drawing.Point(6, 20)
        Me.lblUseColors.Name = "lblUseColors"
        Me.lblUseColors.Size = New System.Drawing.Size(61, 13)
        Me.lblUseColors.TabIndex = 11
        Me.lblUseColors.Text = "Use Colors:"
        '
        'cboxClockwise
        '
        Me.cboxClockwise.AutoSize = True
        Me.cboxClockwise.ForeColor = System.Drawing.Color.White
        Me.cboxClockwise.Location = New System.Drawing.Point(6, 19)
        Me.cboxClockwise.Name = "cboxClockwise"
        Me.cboxClockwise.Size = New System.Drawing.Size(98, 17)
        Me.cboxClockwise.TabIndex = 12
        Me.cboxClockwise.Text = "Spin Clockwise"
        Me.cboxClockwise.UseVisualStyleBackColor = True
        '
        'cboxSpinClear
        '
        Me.cboxSpinClear.AutoSize = True
        Me.cboxSpinClear.ForeColor = System.Drawing.Color.White
        Me.cboxSpinClear.Location = New System.Drawing.Point(6, 42)
        Me.cboxSpinClear.Name = "cboxSpinClear"
        Me.cboxSpinClear.Size = New System.Drawing.Size(119, 17)
        Me.cboxSpinClear.TabIndex = 13
        Me.cboxSpinClear.Text = "Clear while spinning"
        Me.cboxSpinClear.UseVisualStyleBackColor = True
        '
        'grpOther
        '
        Me.grpOther.BackColor = System.Drawing.Color.Transparent
        Me.grpOther.Controls.Add(Me.cboxClockwise)
        Me.grpOther.Controls.Add(Me.cboxSpinClear)
        Me.grpOther.ForeColor = System.Drawing.Color.Gold
        Me.grpOther.Location = New System.Drawing.Point(288, 126)
        Me.grpOther.Name = "grpOther"
        Me.grpOther.Size = New System.Drawing.Size(156, 65)
        Me.grpOther.TabIndex = 14
        Me.grpOther.TabStop = False
        Me.grpOther.Text = "Other Options"
        '
        'colorBackgroundColor
        '
        Me.colorBackgroundColor.AnyColor = True
        '
        'OptionsForm
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.BackgroundImage = Global.Screen_Shaper.My.Resources.Resources.SSaverBackground
        Me.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Stretch
        Me.ClientSize = New System.Drawing.Size(450, 199)
        Me.Controls.Add(Me.grpOther)
        Me.Controls.Add(Me.grpIncludeColors)
        Me.Controls.Add(Me.lblSpeed)
        Me.Controls.Add(Me.txtSpeed)
        Me.Controls.Add(Me.traSpeed)
        Me.Controls.Add(Me.lblInc)
        Me.Controls.Add(Me.btnDefault)
        Me.Controls.Add(Me.txtInc)
        Me.Controls.Add(Me.traInc)
        Me.Controls.Add(Me.btnOK)
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedSingle
        Me.Name = "OptionsForm"
        Me.Padding = New System.Windows.Forms.Padding(9)
        Me.ShowIcon = False
        Me.Text = "Screen Shaper Settings"
        CType(Me.traInc, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.traSpeed, System.ComponentModel.ISupportInitialize).EndInit()
        Me.grpIncludeColors.ResumeLayout(False)
        Me.grpIncludeColors.PerformLayout()
        Me.grpOther.ResumeLayout(False)
        Me.grpOther.PerformLayout()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents btnOK As System.Windows.Forms.Button
    Friend WithEvents traInc As System.Windows.Forms.TrackBar
    Friend WithEvents btnDefault As System.Windows.Forms.Button
    Friend WithEvents txtInc As System.Windows.Forms.TextBox
    Friend WithEvents lblInc As System.Windows.Forms.Label
    Friend WithEvents traSpeed As System.Windows.Forms.TrackBar
    Friend WithEvents txtSpeed As System.Windows.Forms.TextBox
    Friend WithEvents lblSpeed As System.Windows.Forms.Label
    Friend WithEvents cboxRed As System.Windows.Forms.CheckBox
    Friend WithEvents cboxGreen As System.Windows.Forms.CheckBox
    Friend WithEvents cboxBlue As System.Windows.Forms.CheckBox
    Friend WithEvents grpIncludeColors As System.Windows.Forms.GroupBox
    Friend WithEvents cboxClockwise As System.Windows.Forms.CheckBox
    Friend WithEvents cboxSpinClear As System.Windows.Forms.CheckBox
    Friend WithEvents grpOther As System.Windows.Forms.GroupBox
    Friend WithEvents lblBackground As System.Windows.Forms.Label
    Friend WithEvents lblUseColors As System.Windows.Forms.Label
    Friend WithEvents pnlBackgroundColor As System.Windows.Forms.Panel
    Friend WithEvents radBackgroundColor As System.Windows.Forms.RadioButton
    Friend WithEvents radBackgroundScreen As System.Windows.Forms.RadioButton
    Friend WithEvents btnChangeColor As System.Windows.Forms.Button
    Friend WithEvents colorBackgroundColor As System.Windows.Forms.ColorDialog
    Friend WithEvents lblAuthor As System.Windows.Forms.Label
    'InitializeComponent 
End Class
