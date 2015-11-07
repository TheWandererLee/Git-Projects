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
        Me.components = New System.ComponentModel.Container
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(formMain))
        Me.listStrings = New System.Windows.Forms.ListBox
        Me.conStringOptions = New System.Windows.Forms.ContextMenuStrip(Me.components)
        Me.btnDisplayFullString = New System.Windows.Forms.ToolStripMenuItem
        Me.openFileMap = New System.Windows.Forms.OpenFileDialog
        Me.progLoadingImages = New System.Windows.Forms.ProgressBar
        Me.lblMapName = New System.Windows.Forms.Label
        Me.grpMapInfo = New System.Windows.Forms.GroupBox
        Me.lblNumberOfStrings = New System.Windows.Forms.Label
        Me.lblMapSize = New System.Windows.Forms.Label
        Me.lblStringID = New System.Windows.Forms.Label
        Me.lblStringLength = New System.Windows.Forms.Label
        Me.lblStringOffset = New System.Windows.Forms.Label
        Me.grpStringEditor = New System.Windows.Forms.GroupBox
        Me.txtStringText = New System.Windows.Forms.TextBox
        Me.btnSaveString = New System.Windows.Forms.Button
        Me.lblEditString = New System.Windows.Forms.Label
        Me.menuStripMain = New System.Windows.Forms.MenuStrip
        Me.menuBtnFile = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnOpenMap = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnSaveMap = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnPreferences = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnImages = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnRecognizeImages = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnDontRecognize = New System.Windows.Forms.ToolStripMenuItem
        Me.StringTableOffsetToolStripMenuItem = New System.Windows.Forms.ToolStripMenuItem
        Me.txtStringTableOffset = New System.Windows.Forms.ToolStripTextBox
        Me.menuBtnSearch = New System.Windows.Forms.ToolStripMenuItem
        Me.comboSearchBar = New System.Windows.Forms.ToolStripComboBox
        Me.menuBtnMatchCase = New System.Windows.Forms.ToolStripMenuItem
        Me.listSearchResults = New System.Windows.Forms.ListBox
        Me.grpSearchResults = New System.Windows.Forms.GroupBox
        Me.btnHideSearch = New System.Windows.Forms.Button
        Me.grpImages = New System.Windows.Forms.GroupBox
        Me.btnHideImages = New System.Windows.Forms.Button
        Me.picPreview = New System.Windows.Forms.PictureBox
        Me.listImages = New System.Windows.Forms.ListBox
        Me.lblStringIndex = New System.Windows.Forms.Label
        Me.lblStringTable = New System.Windows.Forms.Label
        Me.lblMULG = New System.Windows.Forms.Label
        Me.conStringOptions.SuspendLayout()
        Me.grpMapInfo.SuspendLayout()
        Me.grpStringEditor.SuspendLayout()
        Me.menuStripMain.SuspendLayout()
        Me.grpSearchResults.SuspendLayout()
        Me.grpImages.SuspendLayout()
        CType(Me.picPreview, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.SuspendLayout()
        '
        'listStrings
        '
        Me.listStrings.ContextMenuStrip = Me.conStringOptions
        Me.listStrings.FormattingEnabled = True
        Me.listStrings.Items.AddRange(New Object() {"Open a Map"})
        Me.listStrings.Location = New System.Drawing.Point(218, 27)
        Me.listStrings.Name = "listStrings"
        Me.listStrings.Size = New System.Drawing.Size(386, 407)
        Me.listStrings.TabIndex = 2
        '
        'conStringOptions
        '
        Me.conStringOptions.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.btnDisplayFullString})
        Me.conStringOptions.Name = "conStringOptions"
        Me.conStringOptions.ShowImageMargin = False
        Me.conStringOptions.Size = New System.Drawing.Size(157, 26)
        Me.conStringOptions.Text = "String Options"
        '
        'btnDisplayFullString
        '
        Me.btnDisplayFullString.Name = "btnDisplayFullString"
        Me.btnDisplayFullString.Size = New System.Drawing.Size(156, 22)
        Me.btnDisplayFullString.Text = "Display Entire String"
        '
        'openFileMap
        '
        Me.openFileMap.Filter = "Halo 2 Map (.map)|*.map"
        '
        'progLoadingImages
        '
        Me.progLoadingImages.Location = New System.Drawing.Point(218, 411)
        Me.progLoadingImages.Name = "progLoadingImages"
        Me.progLoadingImages.Size = New System.Drawing.Size(386, 23)
        Me.progLoadingImages.Style = System.Windows.Forms.ProgressBarStyle.Continuous
        Me.progLoadingImages.TabIndex = 5
        Me.progLoadingImages.Visible = False
        '
        'lblMapName
        '
        Me.lblMapName.AutoSize = True
        Me.lblMapName.Location = New System.Drawing.Point(6, 16)
        Me.lblMapName.Name = "lblMapName"
        Me.lblMapName.Size = New System.Drawing.Size(62, 13)
        Me.lblMapName.TabIndex = 7
        Me.lblMapName.Text = "Map Name:"
        '
        'grpMapInfo
        '
        Me.grpMapInfo.BackColor = System.Drawing.SystemColors.Control
        Me.grpMapInfo.Controls.Add(Me.lblNumberOfStrings)
        Me.grpMapInfo.Controls.Add(Me.lblMapSize)
        Me.grpMapInfo.Controls.Add(Me.lblMapName)
        Me.grpMapInfo.Location = New System.Drawing.Point(12, 27)
        Me.grpMapInfo.Name = "grpMapInfo"
        Me.grpMapInfo.Size = New System.Drawing.Size(200, 60)
        Me.grpMapInfo.TabIndex = 8
        Me.grpMapInfo.TabStop = False
        Me.grpMapInfo.Text = "Map Information"
        Me.grpMapInfo.Visible = False
        '
        'lblNumberOfStrings
        '
        Me.lblNumberOfStrings.AutoSize = True
        Me.lblNumberOfStrings.Location = New System.Drawing.Point(6, 42)
        Me.lblNumberOfStrings.Name = "lblNumberOfStrings"
        Me.lblNumberOfStrings.Size = New System.Drawing.Size(94, 13)
        Me.lblNumberOfStrings.TabIndex = 9
        Me.lblNumberOfStrings.Text = "Number of Strings:"
        '
        'lblMapSize
        '
        Me.lblMapSize.AutoSize = True
        Me.lblMapSize.Location = New System.Drawing.Point(6, 29)
        Me.lblMapSize.Name = "lblMapSize"
        Me.lblMapSize.Size = New System.Drawing.Size(54, 13)
        Me.lblMapSize.TabIndex = 8
        Me.lblMapSize.Text = "Map Size:"
        '
        'lblStringID
        '
        Me.lblStringID.AutoSize = True
        Me.lblStringID.Location = New System.Drawing.Point(6, 42)
        Me.lblStringID.Name = "lblStringID"
        Me.lblStringID.Size = New System.Drawing.Size(51, 13)
        Me.lblStringID.TabIndex = 2
        Me.lblStringID.Text = "String ID:"
        '
        'lblStringLength
        '
        Me.lblStringLength.AutoSize = True
        Me.lblStringLength.Location = New System.Drawing.Point(6, 29)
        Me.lblStringLength.Name = "lblStringLength"
        Me.lblStringLength.Size = New System.Drawing.Size(73, 13)
        Me.lblStringLength.TabIndex = 1
        Me.lblStringLength.Text = "String Length:"
        '
        'lblStringOffset
        '
        Me.lblStringOffset.AutoSize = True
        Me.lblStringOffset.Location = New System.Drawing.Point(6, 16)
        Me.lblStringOffset.Name = "lblStringOffset"
        Me.lblStringOffset.Size = New System.Drawing.Size(68, 13)
        Me.lblStringOffset.TabIndex = 0
        Me.lblStringOffset.Text = "String Offset:"
        '
        'grpStringEditor
        '
        Me.grpStringEditor.Controls.Add(Me.txtStringText)
        Me.grpStringEditor.Controls.Add(Me.btnSaveString)
        Me.grpStringEditor.Controls.Add(Me.lblEditString)
        Me.grpStringEditor.Controls.Add(Me.lblStringID)
        Me.grpStringEditor.Controls.Add(Me.lblStringLength)
        Me.grpStringEditor.Controls.Add(Me.lblStringOffset)
        Me.grpStringEditor.Location = New System.Drawing.Point(12, 93)
        Me.grpStringEditor.Name = "grpStringEditor"
        Me.grpStringEditor.Size = New System.Drawing.Size(200, 106)
        Me.grpStringEditor.TabIndex = 9
        Me.grpStringEditor.TabStop = False
        Me.grpStringEditor.Text = "String Editor"
        Me.grpStringEditor.Visible = False
        '
        'txtStringText
        '
        Me.txtStringText.Location = New System.Drawing.Point(7, 80)
        Me.txtStringText.Name = "txtStringText"
        Me.txtStringText.Size = New System.Drawing.Size(187, 20)
        Me.txtStringText.TabIndex = 12
        '
        'btnSaveString
        '
        Me.btnSaveString.AutoSize = True
        Me.btnSaveString.Location = New System.Drawing.Point(122, 54)
        Me.btnSaveString.Name = "btnSaveString"
        Me.btnSaveString.Size = New System.Drawing.Size(72, 23)
        Me.btnSaveString.TabIndex = 11
        Me.btnSaveString.Text = "Save String"
        '
        'lblEditString
        '
        Me.lblEditString.AutoSize = True
        Me.lblEditString.Location = New System.Drawing.Point(6, 64)
        Me.lblEditString.Name = "lblEditString"
        Me.lblEditString.Size = New System.Drawing.Size(82, 13)
        Me.lblEditString.TabIndex = 10
        Me.lblEditString.Text = "Edit String Text:"
        '
        'menuStripMain
        '
        Me.menuStripMain.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.menuBtnFile, Me.menuBtnPreferences, Me.menuBtnSearch, Me.comboSearchBar, Me.menuBtnMatchCase})
        Me.menuStripMain.Location = New System.Drawing.Point(0, 0)
        Me.menuStripMain.Name = "menuStripMain"
        Me.menuStripMain.Size = New System.Drawing.Size(606, 24)
        Me.menuStripMain.TabIndex = 10
        Me.menuStripMain.Text = "Main Menu Strip"
        '
        'menuBtnFile
        '
        Me.menuBtnFile.DropDownItems.AddRange(New System.Windows.Forms.ToolStripItem() {Me.menuBtnOpenMap, Me.menuBtnSaveMap})
        Me.menuBtnFile.Name = "menuBtnFile"
        Me.menuBtnFile.Size = New System.Drawing.Size(35, 20)
        Me.menuBtnFile.Text = "&File"
        '
        'menuBtnOpenMap
        '
        Me.menuBtnOpenMap.Name = "menuBtnOpenMap"
        Me.menuBtnOpenMap.Size = New System.Drawing.Size(134, 22)
        Me.menuBtnOpenMap.Text = "Open Map"
        '
        'menuBtnSaveMap
        '
        Me.menuBtnSaveMap.Name = "menuBtnSaveMap"
        Me.menuBtnSaveMap.Size = New System.Drawing.Size(134, 22)
        Me.menuBtnSaveMap.Text = "Save Map"
        '
        'menuBtnPreferences
        '
        Me.menuBtnPreferences.DropDownItems.AddRange(New System.Windows.Forms.ToolStripItem() {Me.menuBtnImages, Me.StringTableOffsetToolStripMenuItem})
        Me.menuBtnPreferences.ForeColor = System.Drawing.SystemColors.ControlText
        Me.menuBtnPreferences.Name = "menuBtnPreferences"
        Me.menuBtnPreferences.Size = New System.Drawing.Size(77, 20)
        Me.menuBtnPreferences.Text = "&Preferences"
        '
        'menuBtnImages
        '
        Me.menuBtnImages.DropDownItems.AddRange(New System.Windows.Forms.ToolStripItem() {Me.menuBtnRecognizeImages, Me.menuBtnDontRecognize})
        Me.menuBtnImages.Image = Global.Alius_Bos.My.Resources.Resources.Checked
        Me.menuBtnImages.ImageTransparentColor = System.Drawing.Color.White
        Me.menuBtnImages.Name = "menuBtnImages"
        Me.menuBtnImages.Size = New System.Drawing.Size(176, 22)
        Me.menuBtnImages.Text = "Images"
        '
        'menuBtnRecognizeImages
        '
        Me.menuBtnRecognizeImages.Image = Global.Alius_Bos.My.Resources.Resources.Checked
        Me.menuBtnRecognizeImages.ImageTransparentColor = System.Drawing.Color.White
        Me.menuBtnRecognizeImages.Name = "menuBtnRecognizeImages"
        Me.menuBtnRecognizeImages.Size = New System.Drawing.Size(200, 22)
        Me.menuBtnRecognizeImages.Text = "Recognize Images"
        '
        'menuBtnDontRecognize
        '
        Me.menuBtnDontRecognize.Image = Global.Alius_Bos.My.Resources.Resources.Unchecked
        Me.menuBtnDontRecognize.ImageTransparentColor = System.Drawing.Color.White
        Me.menuBtnDontRecognize.Name = "menuBtnDontRecognize"
        Me.menuBtnDontRecognize.Size = New System.Drawing.Size(200, 22)
        Me.menuBtnDontRecognize.Text = "Don't Recognize Images"
        '
        'StringTableOffsetToolStripMenuItem
        '
        Me.StringTableOffsetToolStripMenuItem.DropDownItems.AddRange(New System.Windows.Forms.ToolStripItem() {Me.txtStringTableOffset})
        Me.StringTableOffsetToolStripMenuItem.Name = "StringTableOffsetToolStripMenuItem"
        Me.StringTableOffsetToolStripMenuItem.Size = New System.Drawing.Size(176, 22)
        Me.StringTableOffsetToolStripMenuItem.Text = "String Table Offset"
        '
        'txtStringTableOffset
        '
        Me.txtStringTableOffset.Name = "txtStringTableOffset"
        Me.txtStringTableOffset.Size = New System.Drawing.Size(100, 21)
        Me.txtStringTableOffset.Text = "00000000"
        '
        'menuBtnSearch
        '
        Me.menuBtnSearch.Alignment = System.Windows.Forms.ToolStripItemAlignment.Right
        Me.menuBtnSearch.ForeColor = System.Drawing.Color.Black
        Me.menuBtnSearch.Image = Global.Alius_Bos.My.Resources.Resources.customSearchIcon
        Me.menuBtnSearch.ImageTransparentColor = System.Drawing.Color.Black
        Me.menuBtnSearch.Name = "menuBtnSearch"
        Me.menuBtnSearch.Size = New System.Drawing.Size(72, 21)
        Me.menuBtnSearch.Text = "Search!"
        Me.menuBtnSearch.Visible = False
        '
        'comboSearchBar
        '
        Me.comboSearchBar.Alignment = System.Windows.Forms.ToolStripItemAlignment.Right
        Me.comboSearchBar.Name = "comboSearchBar"
        Me.comboSearchBar.Size = New System.Drawing.Size(121, 21)
        Me.comboSearchBar.Visible = False
        '
        'menuBtnMatchCase
        '
        Me.menuBtnMatchCase.Alignment = System.Windows.Forms.ToolStripItemAlignment.Right
        Me.menuBtnMatchCase.Font = New System.Drawing.Font("Tahoma", 8.25!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.menuBtnMatchCase.Image = Global.Alius_Bos.My.Resources.Resources.Unchecked
        Me.menuBtnMatchCase.ImageTransparentColor = System.Drawing.Color.White
        Me.menuBtnMatchCase.Name = "menuBtnMatchCase"
        Me.menuBtnMatchCase.Size = New System.Drawing.Size(91, 20)
        Me.menuBtnMatchCase.Text = "Match Case"
        Me.menuBtnMatchCase.Visible = False
        '
        'listSearchResults
        '
        Me.listSearchResults.FormattingEnabled = True
        Me.listSearchResults.Location = New System.Drawing.Point(6, 19)
        Me.listSearchResults.Name = "listSearchResults"
        Me.listSearchResults.Size = New System.Drawing.Size(188, 82)
        Me.listSearchResults.TabIndex = 11
        '
        'grpSearchResults
        '
        Me.grpSearchResults.Controls.Add(Me.btnHideSearch)
        Me.grpSearchResults.Controls.Add(Me.listSearchResults)
        Me.grpSearchResults.Location = New System.Drawing.Point(12, 311)
        Me.grpSearchResults.Name = "grpSearchResults"
        Me.grpSearchResults.Size = New System.Drawing.Size(200, 112)
        Me.grpSearchResults.TabIndex = 12
        Me.grpSearchResults.TabStop = False
        Me.grpSearchResults.Text = "Search Results"
        Me.grpSearchResults.Visible = False
        '
        'btnHideSearch
        '
        Me.btnHideSearch.Image = Global.Alius_Bos.My.Resources.Resources.buttonDown
        Me.btnHideSearch.Location = New System.Drawing.Point(167, 99)
        Me.btnHideSearch.Name = "btnHideSearch"
        Me.btnHideSearch.Size = New System.Drawing.Size(33, 13)
        Me.btnHideSearch.TabIndex = 14
        Me.btnHideSearch.UseVisualStyleBackColor = True
        '
        'grpImages
        '
        Me.grpImages.Controls.Add(Me.btnHideImages)
        Me.grpImages.Controls.Add(Me.picPreview)
        Me.grpImages.Controls.Add(Me.listImages)
        Me.grpImages.Location = New System.Drawing.Point(12, 205)
        Me.grpImages.Name = "grpImages"
        Me.grpImages.Size = New System.Drawing.Size(200, 100)
        Me.grpImages.TabIndex = 13
        Me.grpImages.TabStop = False
        Me.grpImages.Text = "Images                                   Preview"
        Me.grpImages.Visible = False
        '
        'btnHideImages
        '
        Me.btnHideImages.Image = Global.Alius_Bos.My.Resources.Resources.buttonDown
        Me.btnHideImages.Location = New System.Drawing.Point(167, 87)
        Me.btnHideImages.Name = "btnHideImages"
        Me.btnHideImages.Size = New System.Drawing.Size(33, 13)
        Me.btnHideImages.TabIndex = 13
        Me.btnHideImages.UseVisualStyleBackColor = True
        '
        'picPreview
        '
        Me.picPreview.Location = New System.Drawing.Point(119, 19)
        Me.picPreview.Name = "picPreview"
        Me.picPreview.Size = New System.Drawing.Size(75, 75)
        Me.picPreview.TabIndex = 14
        Me.picPreview.TabStop = False
        '
        'listImages
        '
        Me.listImages.FormattingEnabled = True
        Me.listImages.Location = New System.Drawing.Point(6, 19)
        Me.listImages.Name = "listImages"
        Me.listImages.Size = New System.Drawing.Size(107, 69)
        Me.listImages.TabIndex = 1
        '
        'lblStringIndex
        '
        Me.lblStringIndex.AutoSize = True
        Me.lblStringIndex.Location = New System.Drawing.Point(13, 430)
        Me.lblStringIndex.Name = "lblStringIndex"
        Me.lblStringIndex.Size = New System.Drawing.Size(97, 13)
        Me.lblStringIndex.TabIndex = 14
        Me.lblStringIndex.Text = "String Index Offset:"
        '
        'lblStringTable
        '
        Me.lblStringTable.AutoSize = True
        Me.lblStringTable.Location = New System.Drawing.Point(13, 443)
        Me.lblStringTable.Name = "lblStringTable"
        Me.lblStringTable.Size = New System.Drawing.Size(98, 13)
        Me.lblStringTable.TabIndex = 15
        Me.lblStringTable.Text = "String Table Offset:"
        '
        'lblMULG
        '
        Me.lblMULG.AutoSize = True
        Me.lblMULG.Location = New System.Drawing.Point(13, 456)
        Me.lblMULG.Name = "lblMULG"
        Me.lblMULG.Size = New System.Drawing.Size(119, 13)
        Me.lblMULG.TabIndex = 16
        Me.lblMULG.Text = "MULG Unicode Tables:"
        '
        'formMain
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(606, 496)
        Me.Controls.Add(Me.lblMULG)
        Me.Controls.Add(Me.lblStringTable)
        Me.Controls.Add(Me.lblStringIndex)
        Me.Controls.Add(Me.progLoadingImages)
        Me.Controls.Add(Me.grpImages)
        Me.Controls.Add(Me.menuStripMain)
        Me.Controls.Add(Me.grpMapInfo)
        Me.Controls.Add(Me.grpSearchResults)
        Me.Controls.Add(Me.listStrings)
        Me.Controls.Add(Me.grpStringEditor)
        Me.Icon = CType(resources.GetObject("$this.Icon"), System.Drawing.Icon)
        Me.MainMenuStrip = Me.menuStripMain
        Me.Name = "formMain"
        Me.Text = "Alius Bos"
        Me.conStringOptions.ResumeLayout(False)
        Me.grpMapInfo.ResumeLayout(False)
        Me.grpMapInfo.PerformLayout()
        Me.grpStringEditor.ResumeLayout(False)
        Me.grpStringEditor.PerformLayout()
        Me.menuStripMain.ResumeLayout(False)
        Me.menuStripMain.PerformLayout()
        Me.grpSearchResults.ResumeLayout(False)
        Me.grpImages.ResumeLayout(False)
        CType(Me.picPreview, System.ComponentModel.ISupportInitialize).EndInit()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents listStrings As System.Windows.Forms.ListBox
    Friend WithEvents openFileMap As System.Windows.Forms.OpenFileDialog
    Friend WithEvents progLoadingImages As System.Windows.Forms.ProgressBar
    Friend WithEvents lblMapName As System.Windows.Forms.Label
    Friend WithEvents grpMapInfo As System.Windows.Forms.GroupBox
    Friend WithEvents lblMapSize As System.Windows.Forms.Label
    Friend WithEvents lblStringOffset As System.Windows.Forms.Label
    Friend WithEvents lblStringLength As System.Windows.Forms.Label
    Friend WithEvents conStringOptions As System.Windows.Forms.ContextMenuStrip
    Friend WithEvents btnDisplayFullString As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents lblStringID As System.Windows.Forms.Label
    Friend WithEvents grpStringEditor As System.Windows.Forms.GroupBox
    Friend WithEvents lblEditString As System.Windows.Forms.Label
    Friend WithEvents menuStripMain As System.Windows.Forms.MenuStrip
    Friend WithEvents menuBtnFile As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnOpenMap As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnSaveMap As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnPreferences As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents lblNumberOfStrings As System.Windows.Forms.Label
    Friend WithEvents btnSaveString As System.Windows.Forms.Button
    Friend WithEvents txtStringText As System.Windows.Forms.TextBox
    Friend WithEvents comboSearchBar As System.Windows.Forms.ToolStripComboBox
    Friend WithEvents menuBtnImages As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnRecognizeImages As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnDontRecognize As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnSearch As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents listSearchResults As System.Windows.Forms.ListBox
    Friend WithEvents grpSearchResults As System.Windows.Forms.GroupBox
    Friend WithEvents menuBtnMatchCase As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents grpImages As System.Windows.Forms.GroupBox
    Friend WithEvents listImages As System.Windows.Forms.ListBox
    Friend WithEvents btnHideImages As System.Windows.Forms.Button
    Friend WithEvents btnHideSearch As System.Windows.Forms.Button
    Friend WithEvents picPreview As System.Windows.Forms.PictureBox
    Friend WithEvents StringTableOffsetToolStripMenuItem As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents txtStringTableOffset As System.Windows.Forms.ToolStripTextBox
    Friend WithEvents lblStringIndex As System.Windows.Forms.Label
    Friend WithEvents lblStringTable As System.Windows.Forms.Label
    Friend WithEvents lblMULG As System.Windows.Forms.Label

End Class
