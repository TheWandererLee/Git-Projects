<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Public Class formMain
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
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(formMain))
        Me.btnOpenFile1 = New System.Windows.Forms.Button
        Me.btnOpenFile2 = New System.Windows.Forms.Button
        Me.txtFilePath1 = New System.Windows.Forms.TextBox
        Me.txtFilePath2 = New System.Windows.Forms.TextBox
        Me.openFile1 = New System.Windows.Forms.OpenFileDialog
        Me.openFile2 = New System.Windows.Forms.OpenFileDialog
        Me.grpDifferences = New System.Windows.Forms.GroupBox
        Me.listDifferences = New System.Windows.Forms.ListBox
        Me.btnCompareFiles = New System.Windows.Forms.Button
        Me.grpDifferences.SuspendLayout()
        Me.SuspendLayout()
        '
        'btnOpenFile1
        '
        Me.btnOpenFile1.Location = New System.Drawing.Point(12, 12)
        Me.btnOpenFile1.Name = "btnOpenFile1"
        Me.btnOpenFile1.Size = New System.Drawing.Size(75, 23)
        Me.btnOpenFile1.TabIndex = 0
        Me.btnOpenFile1.Text = "Open File 1"
        '
        'btnOpenFile2
        '
        Me.btnOpenFile2.Location = New System.Drawing.Point(12, 41)
        Me.btnOpenFile2.Name = "btnOpenFile2"
        Me.btnOpenFile2.Size = New System.Drawing.Size(75, 23)
        Me.btnOpenFile2.TabIndex = 1
        Me.btnOpenFile2.Text = "Open File 2"
        '
        'txtFilePath1
        '
        Me.txtFilePath1.Location = New System.Drawing.Point(93, 14)
        Me.txtFilePath1.Name = "txtFilePath1"
        Me.txtFilePath1.ReadOnly = True
        Me.txtFilePath1.Size = New System.Drawing.Size(448, 20)
        Me.txtFilePath1.TabIndex = 2
        '
        'txtFilePath2
        '
        Me.txtFilePath2.Location = New System.Drawing.Point(93, 43)
        Me.txtFilePath2.Name = "txtFilePath2"
        Me.txtFilePath2.ReadOnly = True
        Me.txtFilePath2.Size = New System.Drawing.Size(448, 20)
        Me.txtFilePath2.TabIndex = 3
        '
        'grpDifferences
        '
        Me.grpDifferences.Controls.Add(Me.listDifferences)
        Me.grpDifferences.Location = New System.Drawing.Point(12, 99)
        Me.grpDifferences.Name = "grpDifferences"
        Me.grpDifferences.Size = New System.Drawing.Size(529, 170)
        Me.grpDifferences.TabIndex = 4
        Me.grpDifferences.TabStop = False
        Me.grpDifferences.Text = "Differences"
        '
        'listDifferences
        '
        Me.listDifferences.Font = New System.Drawing.Font("Courier New", 8.25!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.listDifferences.FormattingEnabled = True
        Me.listDifferences.ItemHeight = 14
        Me.listDifferences.Location = New System.Drawing.Point(6, 19)
        Me.listDifferences.Name = "listDifferences"
        Me.listDifferences.Size = New System.Drawing.Size(517, 144)
        Me.listDifferences.TabIndex = 0
        '
        'btnCompareFiles
        '
        Me.btnCompareFiles.AutoSize = True
        Me.btnCompareFiles.Location = New System.Drawing.Point(12, 70)
        Me.btnCompareFiles.Name = "btnCompareFiles"
        Me.btnCompareFiles.Size = New System.Drawing.Size(79, 23)
        Me.btnCompareFiles.TabIndex = 5
        Me.btnCompareFiles.Text = "Compare Files"
        '
        'formMain
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(551, 278)
        Me.Controls.Add(Me.btnCompareFiles)
        Me.Controls.Add(Me.grpDifferences)
        Me.Controls.Add(Me.txtFilePath2)
        Me.Controls.Add(Me.txtFilePath1)
        Me.Controls.Add(Me.btnOpenFile2)
        Me.Controls.Add(Me.btnOpenFile1)
        Me.Icon = CType(resources.GetObject("$this.Icon"), System.Drawing.Icon)
        Me.Name = "formMain"
        Me.Text = "Compare 2gether"
        Me.grpDifferences.ResumeLayout(False)
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents btnOpenFile1 As System.Windows.Forms.Button
    Friend WithEvents btnOpenFile2 As System.Windows.Forms.Button
    Friend WithEvents txtFilePath1 As System.Windows.Forms.TextBox
    Friend WithEvents txtFilePath2 As System.Windows.Forms.TextBox
    Friend WithEvents openFile1 As System.Windows.Forms.OpenFileDialog
    Friend WithEvents openFile2 As System.Windows.Forms.OpenFileDialog
    Friend WithEvents grpDifferences As System.Windows.Forms.GroupBox
    Friend WithEvents listDifferences As System.Windows.Forms.ListBox
    Friend WithEvents btnCompareFiles As System.Windows.Forms.Button

End Class
