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
        Me.openFileImage = New System.Windows.Forms.OpenFileDialog
        Me.picPreview = New System.Windows.Forms.PictureBox
        Me.grpPreview = New System.Windows.Forms.GroupBox
        Me.btnConvert = New System.Windows.Forms.Button
        Me.backWorkConvert = New System.ComponentModel.BackgroundWorker
        Me.progTotal = New System.Windows.Forms.ProgressBar
        Me.txtAscii = New System.Windows.Forms.TextBox
        Me.progMinor = New System.Windows.Forms.ProgressBar
        Me.menuMain = New System.Windows.Forms.MenuStrip
        Me.FileToolStripMenuItem = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnOpen = New System.Windows.Forms.ToolStripMenuItem
        Me.lblProgress = New System.Windows.Forms.Label
        CType(Me.picPreview, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.grpPreview.SuspendLayout()
        Me.menuMain.SuspendLayout()
        Me.SuspendLayout()
        '
        'openFileImage
        '
        Me.openFileImage.Filter = "Images|*.jpg|Images|*.bmp|Images|*.gif"
        '
        'picPreview
        '
        Me.picPreview.BackgroundImageLayout = System.Windows.Forms.ImageLayout.None
        Me.picPreview.Location = New System.Drawing.Point(6, 19)
        Me.picPreview.Name = "picPreview"
        Me.picPreview.Size = New System.Drawing.Size(100, 100)
        Me.picPreview.SizeMode = System.Windows.Forms.PictureBoxSizeMode.Zoom
        Me.picPreview.TabIndex = 1
        Me.picPreview.TabStop = False
        '
        'grpPreview
        '
        Me.grpPreview.Controls.Add(Me.picPreview)
        Me.grpPreview.Location = New System.Drawing.Point(851, 27)
        Me.grpPreview.Name = "grpPreview"
        Me.grpPreview.Size = New System.Drawing.Size(112, 126)
        Me.grpPreview.TabIndex = 2
        Me.grpPreview.TabStop = False
        Me.grpPreview.Text = "Image Preview"
        '
        'btnConvert
        '
        Me.btnConvert.AutoSize = True
        Me.btnConvert.Location = New System.Drawing.Point(12, 27)
        Me.btnConvert.Name = "btnConvert"
        Me.btnConvert.Size = New System.Drawing.Size(91, 23)
        Me.btnConvert.TabIndex = 3
        Me.btnConvert.Text = "Convert to Ascii"
        Me.btnConvert.UseVisualStyleBackColor = True
        '
        'backWorkConvert
        '
        Me.backWorkConvert.WorkerReportsProgress = True
        '
        'progTotal
        '
        Me.progTotal.Location = New System.Drawing.Point(851, 188)
        Me.progTotal.Name = "progTotal"
        Me.progTotal.Size = New System.Drawing.Size(112, 23)
        Me.progTotal.Style = System.Windows.Forms.ProgressBarStyle.Continuous
        Me.progTotal.TabIndex = 5
        '
        'txtAscii
        '
        Me.txtAscii.Font = New System.Drawing.Font("Courier New", 2.25!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.txtAscii.Location = New System.Drawing.Point(12, 56)
        Me.txtAscii.Multiline = True
        Me.txtAscii.Name = "txtAscii"
        Me.txtAscii.ScrollBars = System.Windows.Forms.ScrollBars.Both
        Me.txtAscii.Size = New System.Drawing.Size(833, 555)
        Me.txtAscii.TabIndex = 7
        '
        'progMinor
        '
        Me.progMinor.Location = New System.Drawing.Point(851, 159)
        Me.progMinor.Name = "progMinor"
        Me.progMinor.Size = New System.Drawing.Size(112, 23)
        Me.progMinor.Style = System.Windows.Forms.ProgressBarStyle.Continuous
        Me.progMinor.TabIndex = 8
        '
        'menuMain
        '
        Me.menuMain.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.FileToolStripMenuItem})
        Me.menuMain.Location = New System.Drawing.Point(0, 0)
        Me.menuMain.Name = "menuMain"
        Me.menuMain.Size = New System.Drawing.Size(975, 24)
        Me.menuMain.TabIndex = 9
        Me.menuMain.Text = "Main Menu"
        '
        'FileToolStripMenuItem
        '
        Me.FileToolStripMenuItem.DropDownItems.AddRange(New System.Windows.Forms.ToolStripItem() {Me.menuBtnOpen})
        Me.FileToolStripMenuItem.Name = "FileToolStripMenuItem"
        Me.FileToolStripMenuItem.Size = New System.Drawing.Size(35, 20)
        Me.FileToolStripMenuItem.Text = "File"
        '
        'menuBtnOpen
        '
        Me.menuBtnOpen.Name = "menuBtnOpen"
        Me.menuBtnOpen.Size = New System.Drawing.Size(156, 22)
        Me.menuBtnOpen.Text = "Open Image..."
        '
        'lblProgress
        '
        Me.lblProgress.AutoSize = True
        Me.lblProgress.Location = New System.Drawing.Point(899, 193)
        Me.lblProgress.Name = "lblProgress"
        Me.lblProgress.Size = New System.Drawing.Size(21, 13)
        Me.lblProgress.TabIndex = 10
        Me.lblProgress.Text = "0%"
        '
        'formMain
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(975, 623)
        Me.Controls.Add(Me.lblProgress)
        Me.Controls.Add(Me.progMinor)
        Me.Controls.Add(Me.progTotal)
        Me.Controls.Add(Me.grpPreview)
        Me.Controls.Add(Me.txtAscii)
        Me.Controls.Add(Me.btnConvert)
        Me.Controls.Add(Me.menuMain)
        Me.MainMenuStrip = Me.menuMain
        Me.Name = "formMain"
        Me.Text = "Image and Ascii Master"
        CType(Me.picPreview, System.ComponentModel.ISupportInitialize).EndInit()
        Me.grpPreview.ResumeLayout(False)
        Me.menuMain.ResumeLayout(False)
        Me.menuMain.PerformLayout()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents openFileImage As System.Windows.Forms.OpenFileDialog
    Friend WithEvents picPreview As System.Windows.Forms.PictureBox
    Friend WithEvents grpPreview As System.Windows.Forms.GroupBox
    Friend WithEvents btnConvert As System.Windows.Forms.Button
    Friend WithEvents backWorkConvert As System.ComponentModel.BackgroundWorker
    Friend WithEvents progTotal As System.Windows.Forms.ProgressBar
    Friend WithEvents txtAscii As System.Windows.Forms.TextBox
    Friend WithEvents progMinor As System.Windows.Forms.ProgressBar
    Friend WithEvents menuMain As System.Windows.Forms.MenuStrip
    Friend WithEvents FileToolStripMenuItem As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnOpen As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents lblProgress As System.Windows.Forms.Label

End Class
