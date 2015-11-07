<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class formPoints
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
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(formPoints))
        Me.listPoints = New System.Windows.Forms.ListBox
        Me.txtPointX = New System.Windows.Forms.TextBox
        Me.txtPointY = New System.Windows.Forms.TextBox
        Me.txtPointZ = New System.Windows.Forms.TextBox
        Me.lblX = New System.Windows.Forms.Label
        Me.lblY = New System.Windows.Forms.Label
        Me.lblZ = New System.Windows.Forms.Label
        Me.btnChange = New System.Windows.Forms.Button
        Me.pnlPointChanger = New System.Windows.Forms.Panel
        Me.lblShowPoints = New System.Windows.Forms.Label
        Me.comboFilterArgument = New System.Windows.Forms.ComboBox
        Me.comboFilterFilter = New System.Windows.Forms.ComboBox
        Me.lblIs = New System.Windows.Forms.Label
        Me.pnlFilter = New System.Windows.Forms.Panel
        Me.txtFilterValue2 = New System.Windows.Forms.TextBox
        Me.lblAnd = New System.Windows.Forms.Label
        Me.btnFilter = New System.Windows.Forms.Button
        Me.txtFilterValue = New System.Windows.Forms.TextBox
        Me.pnlPointChanger.SuspendLayout()
        Me.pnlFilter.SuspendLayout()
        Me.SuspendLayout()
        '
        'listPoints
        '
        Me.listPoints.Dock = System.Windows.Forms.DockStyle.Top
        Me.listPoints.FormattingEnabled = True
        Me.listPoints.Location = New System.Drawing.Point(0, 0)
        Me.listPoints.Name = "listPoints"
        Me.listPoints.SelectionMode = System.Windows.Forms.SelectionMode.MultiExtended
        Me.listPoints.Size = New System.Drawing.Size(297, 303)
        Me.listPoints.TabIndex = 0
        '
        'txtPointX
        '
        Me.txtPointX.BackColor = System.Drawing.SystemColors.Window
        Me.txtPointX.Location = New System.Drawing.Point(26, 6)
        Me.txtPointX.Name = "txtPointX"
        Me.txtPointX.Size = New System.Drawing.Size(245, 20)
        Me.txtPointX.TabIndex = 1
        '
        'txtPointY
        '
        Me.txtPointY.Location = New System.Drawing.Point(26, 32)
        Me.txtPointY.Name = "txtPointY"
        Me.txtPointY.Size = New System.Drawing.Size(245, 20)
        Me.txtPointY.TabIndex = 2
        '
        'txtPointZ
        '
        Me.txtPointZ.Location = New System.Drawing.Point(26, 58)
        Me.txtPointZ.Name = "txtPointZ"
        Me.txtPointZ.Size = New System.Drawing.Size(245, 20)
        Me.txtPointZ.TabIndex = 3
        '
        'lblX
        '
        Me.lblX.AutoSize = True
        Me.lblX.Location = New System.Drawing.Point(3, 9)
        Me.lblX.Name = "lblX"
        Me.lblX.Size = New System.Drawing.Size(17, 13)
        Me.lblX.TabIndex = 4
        Me.lblX.Text = "X:"
        '
        'lblY
        '
        Me.lblY.AutoSize = True
        Me.lblY.Location = New System.Drawing.Point(3, 35)
        Me.lblY.Name = "lblY"
        Me.lblY.Size = New System.Drawing.Size(17, 13)
        Me.lblY.TabIndex = 5
        Me.lblY.Text = "Y:"
        '
        'lblZ
        '
        Me.lblZ.AutoSize = True
        Me.lblZ.Location = New System.Drawing.Point(3, 61)
        Me.lblZ.Name = "lblZ"
        Me.lblZ.Size = New System.Drawing.Size(17, 13)
        Me.lblZ.TabIndex = 6
        Me.lblZ.Text = "Z:"
        '
        'btnChange
        '
        Me.btnChange.Location = New System.Drawing.Point(3, 84)
        Me.btnChange.Name = "btnChange"
        Me.btnChange.Size = New System.Drawing.Size(96, 23)
        Me.btnChange.TabIndex = 7
        Me.btnChange.Text = "Change Point"
        Me.btnChange.UseVisualStyleBackColor = True
        '
        'pnlPointChanger
        '
        Me.pnlPointChanger.Controls.Add(Me.lblX)
        Me.pnlPointChanger.Controls.Add(Me.txtPointX)
        Me.pnlPointChanger.Controls.Add(Me.txtPointY)
        Me.pnlPointChanger.Controls.Add(Me.btnChange)
        Me.pnlPointChanger.Controls.Add(Me.txtPointZ)
        Me.pnlPointChanger.Controls.Add(Me.lblZ)
        Me.pnlPointChanger.Controls.Add(Me.lblY)
        Me.pnlPointChanger.Location = New System.Drawing.Point(12, 378)
        Me.pnlPointChanger.Name = "pnlPointChanger"
        Me.pnlPointChanger.Size = New System.Drawing.Size(273, 109)
        Me.pnlPointChanger.TabIndex = 10
        '
        'lblShowPoints
        '
        Me.lblShowPoints.AutoSize = True
        Me.lblShowPoints.Location = New System.Drawing.Point(3, 3)
        Me.lblShowPoints.Name = "lblShowPoints"
        Me.lblShowPoints.Size = New System.Drawing.Size(97, 13)
        Me.lblShowPoints.TabIndex = 11
        Me.lblShowPoints.Text = "Show points where"
        '
        'comboFilterArgument
        '
        Me.comboFilterArgument.DropDownStyle = System.Windows.Forms.ComboBoxStyle.DropDownList
        Me.comboFilterArgument.FormattingEnabled = True
        Me.comboFilterArgument.Items.AddRange(New Object() {"Point Number", "X", "Y", "Z"})
        Me.comboFilterArgument.Location = New System.Drawing.Point(106, 0)
        Me.comboFilterArgument.Name = "comboFilterArgument"
        Me.comboFilterArgument.Size = New System.Drawing.Size(99, 21)
        Me.comboFilterArgument.TabIndex = 12
        '
        'comboFilterFilter
        '
        Me.comboFilterFilter.DropDownStyle = System.Windows.Forms.ComboBoxStyle.DropDownList
        Me.comboFilterFilter.FormattingEnabled = True
        Me.comboFilterFilter.Items.AddRange(New Object() {"Any Value", "Equal To", "Less Than", "Greater Than", "Between", "A Collision Point", "A Mesh Point"})
        Me.comboFilterFilter.Location = New System.Drawing.Point(23, 27)
        Me.comboFilterFilter.Name = "comboFilterFilter"
        Me.comboFilterFilter.Size = New System.Drawing.Size(119, 21)
        Me.comboFilterFilter.TabIndex = 13
        '
        'lblIs
        '
        Me.lblIs.AutoSize = True
        Me.lblIs.Location = New System.Drawing.Point(3, 30)
        Me.lblIs.Name = "lblIs"
        Me.lblIs.Size = New System.Drawing.Size(14, 13)
        Me.lblIs.TabIndex = 14
        Me.lblIs.Text = "is"
        '
        'pnlFilter
        '
        Me.pnlFilter.Controls.Add(Me.txtFilterValue2)
        Me.pnlFilter.Controls.Add(Me.lblAnd)
        Me.pnlFilter.Controls.Add(Me.btnFilter)
        Me.pnlFilter.Controls.Add(Me.txtFilterValue)
        Me.pnlFilter.Controls.Add(Me.lblShowPoints)
        Me.pnlFilter.Controls.Add(Me.lblIs)
        Me.pnlFilter.Controls.Add(Me.comboFilterArgument)
        Me.pnlFilter.Controls.Add(Me.comboFilterFilter)
        Me.pnlFilter.Location = New System.Drawing.Point(0, 309)
        Me.pnlFilter.Name = "pnlFilter"
        Me.pnlFilter.Size = New System.Drawing.Size(297, 63)
        Me.pnlFilter.TabIndex = 15
        '
        'txtFilterValue2
        '
        Me.txtFilterValue2.Location = New System.Drawing.Point(236, 27)
        Me.txtFilterValue2.Name = "txtFilterValue2"
        Me.txtFilterValue2.Size = New System.Drawing.Size(50, 20)
        Me.txtFilterValue2.TabIndex = 18
        Me.txtFilterValue2.Visible = False
        '
        'lblAnd
        '
        Me.lblAnd.AutoSize = True
        Me.lblAnd.Location = New System.Drawing.Point(205, 30)
        Me.lblAnd.Name = "lblAnd"
        Me.lblAnd.Size = New System.Drawing.Size(25, 13)
        Me.lblAnd.TabIndex = 17
        Me.lblAnd.Text = "and"
        Me.lblAnd.Visible = False
        '
        'btnFilter
        '
        Me.btnFilter.Location = New System.Drawing.Point(211, 0)
        Me.btnFilter.Name = "btnFilter"
        Me.btnFilter.Size = New System.Drawing.Size(75, 23)
        Me.btnFilter.TabIndex = 16
        Me.btnFilter.Text = "Refresh"
        Me.btnFilter.UseVisualStyleBackColor = True
        '
        'txtFilterValue
        '
        Me.txtFilterValue.Location = New System.Drawing.Point(149, 27)
        Me.txtFilterValue.Name = "txtFilterValue"
        Me.txtFilterValue.Size = New System.Drawing.Size(137, 20)
        Me.txtFilterValue.TabIndex = 15
        '
        'formPoints
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(297, 499)
        Me.Controls.Add(Me.pnlFilter)
        Me.Controls.Add(Me.pnlPointChanger)
        Me.Controls.Add(Me.listPoints)
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedToolWindow
        Me.Icon = CType(resources.GetObject("$this.Icon"), System.Drawing.Icon)
        Me.MaximizeBox = False
        Me.MinimizeBox = False
        Me.Name = "formPoints"
        Me.ShowIcon = False
        Me.ShowInTaskbar = False
        Me.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen
        Me.Text = "BSP Master - Point Editor"
        Me.pnlPointChanger.ResumeLayout(False)
        Me.pnlPointChanger.PerformLayout()
        Me.pnlFilter.ResumeLayout(False)
        Me.pnlFilter.PerformLayout()
        Me.ResumeLayout(False)

    End Sub
    Friend WithEvents listPoints As System.Windows.Forms.ListBox
    Friend WithEvents txtPointX As System.Windows.Forms.TextBox
    Friend WithEvents txtPointY As System.Windows.Forms.TextBox
    Friend WithEvents txtPointZ As System.Windows.Forms.TextBox
    Friend WithEvents lblX As System.Windows.Forms.Label
    Friend WithEvents lblY As System.Windows.Forms.Label
    Friend WithEvents lblZ As System.Windows.Forms.Label
    Friend WithEvents btnChange As System.Windows.Forms.Button
    Friend WithEvents pnlPointChanger As System.Windows.Forms.Panel
    Friend WithEvents lblShowPoints As System.Windows.Forms.Label
    Friend WithEvents comboFilterArgument As System.Windows.Forms.ComboBox
    Friend WithEvents comboFilterFilter As System.Windows.Forms.ComboBox
    Friend WithEvents lblIs As System.Windows.Forms.Label
    Friend WithEvents pnlFilter As System.Windows.Forms.Panel
    Friend WithEvents txtFilterValue As System.Windows.Forms.TextBox
    Friend WithEvents btnFilter As System.Windows.Forms.Button
    Friend WithEvents txtFilterValue2 As System.Windows.Forms.TextBox
    Friend WithEvents lblAnd As System.Windows.Forms.Label
End Class
