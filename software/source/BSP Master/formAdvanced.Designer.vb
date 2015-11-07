<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class formAdvanced
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
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(formAdvanced))
        Me.btnExportCollision = New System.Windows.Forms.Button
        Me.btnImportCollision = New System.Windows.Forms.Button
        Me.cboxSaveImmediately = New System.Windows.Forms.CheckBox
        Me.lblFileName = New System.Windows.Forms.Label
        Me.lblMapName = New System.Windows.Forms.Label
        Me.lblMapCollision = New System.Windows.Forms.Label
        Me.btnOpenMap = New System.Windows.Forms.Button
        Me.statusMain = New System.Windows.Forms.StatusStrip
        Me.statusLblStatus = New System.Windows.Forms.ToolStripStatusLabel
        Me.progMain = New System.Windows.Forms.ToolStripProgressBar
        Me.lblMapMesh = New System.Windows.Forms.Label
        Me.cboxAskOverwrite = New System.Windows.Forms.CheckBox
        Me.btnImportMesh = New System.Windows.Forms.Button
        Me.btnExportMesh = New System.Windows.Forms.Button
        Me.openFileImage = New System.Windows.Forms.OpenFileDialog
        Me.picSeparator1 = New System.Windows.Forms.PictureBox
        Me.btnFlipMap = New System.Windows.Forms.Button
        Me.grpOptions = New System.Windows.Forms.GroupBox
        Me.lblApplyTo = New System.Windows.Forms.Label
        Me.radBoth = New System.Windows.Forms.RadioButton
        Me.radMesh = New System.Windows.Forms.RadioButton
        Me.radCollision = New System.Windows.Forms.RadioButton
        Me.pnlFlipOptions = New System.Windows.Forms.Panel
        Me.radFlipZ = New System.Windows.Forms.RadioButton
        Me.radFlipY = New System.Windows.Forms.RadioButton
        Me.radFlipX = New System.Windows.Forms.RadioButton
        Me.btnMorphMap = New System.Windows.Forms.Button
        Me.pnlMorphOptions = New System.Windows.Forms.Panel
        Me.radMorphCone = New System.Windows.Forms.RadioButton
        Me.radMorphBowl = New System.Windows.Forms.RadioButton
        Me.picSeparator2 = New System.Windows.Forms.PictureBox
        Me.picTeam1 = New System.Windows.Forms.PictureBox
        Me.grpTeamColors = New System.Windows.Forms.GroupBox
        Me.picTeamAll = New System.Windows.Forms.PictureBox
        Me.lblTeamAll = New System.Windows.Forms.Label
        Me.lblTeam9 = New System.Windows.Forms.Label
        Me.picTeam9 = New System.Windows.Forms.PictureBox
        Me.lblTeam8 = New System.Windows.Forms.Label
        Me.picTeam8 = New System.Windows.Forms.PictureBox
        Me.lblTeam7 = New System.Windows.Forms.Label
        Me.picTeam7 = New System.Windows.Forms.PictureBox
        Me.lblTeam6 = New System.Windows.Forms.Label
        Me.picTeam6 = New System.Windows.Forms.PictureBox
        Me.lblTeam5 = New System.Windows.Forms.Label
        Me.picTeam5 = New System.Windows.Forms.PictureBox
        Me.lblTeam4 = New System.Windows.Forms.Label
        Me.picTeam4 = New System.Windows.Forms.PictureBox
        Me.lblTeam3 = New System.Windows.Forms.Label
        Me.picTeam3 = New System.Windows.Forms.PictureBox
        Me.lblTeam2 = New System.Windows.Forms.Label
        Me.picTeam2 = New System.Windows.Forms.PictureBox
        Me.lblTeam1 = New System.Windows.Forms.Label
        Me.picSeparator3 = New System.Windows.Forms.PictureBox
        Me.btnSaveMap = New System.Windows.Forms.Button
        Me.picSeparator4 = New System.Windows.Forms.PictureBox
        Me.colorMain = New System.Windows.Forms.ColorDialog
        Me.statusMain.SuspendLayout()
        CType(Me.picSeparator1, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.grpOptions.SuspendLayout()
        Me.pnlFlipOptions.SuspendLayout()
        Me.pnlMorphOptions.SuspendLayout()
        CType(Me.picSeparator2, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.picTeam1, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.grpTeamColors.SuspendLayout()
        CType(Me.picTeamAll, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.picTeam9, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.picTeam8, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.picTeam7, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.picTeam6, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.picTeam5, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.picTeam4, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.picTeam3, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.picTeam2, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.picSeparator3, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.picSeparator4, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.SuspendLayout()
        '
        'btnExportCollision
        '
        Me.btnExportCollision.Location = New System.Drawing.Point(144, 90)
        Me.btnExportCollision.Name = "btnExportCollision"
        Me.btnExportCollision.Size = New System.Drawing.Size(126, 23)
        Me.btnExportCollision.TabIndex = 0
        Me.btnExportCollision.Text = "Export Collision as .OBJ"
        Me.btnExportCollision.UseVisualStyleBackColor = True
        '
        'btnImportCollision
        '
        Me.btnImportCollision.Location = New System.Drawing.Point(12, 90)
        Me.btnImportCollision.Name = "btnImportCollision"
        Me.btnImportCollision.Size = New System.Drawing.Size(126, 23)
        Me.btnImportCollision.TabIndex = 1
        Me.btnImportCollision.Text = "Import .OBJ as Collision"
        Me.btnImportCollision.UseVisualStyleBackColor = True
        '
        'cboxSaveImmediately
        '
        Me.cboxSaveImmediately.AutoSize = True
        Me.cboxSaveImmediately.Checked = True
        Me.cboxSaveImmediately.CheckState = System.Windows.Forms.CheckState.Checked
        Me.cboxSaveImmediately.Location = New System.Drawing.Point(161, 12)
        Me.cboxSaveImmediately.Name = "cboxSaveImmediately"
        Me.cboxSaveImmediately.Size = New System.Drawing.Size(109, 17)
        Me.cboxSaveImmediately.TabIndex = 2
        Me.cboxSaveImmediately.Text = "Save Immediately"
        Me.cboxSaveImmediately.UseVisualStyleBackColor = True
        Me.cboxSaveImmediately.Visible = False
        '
        'lblFileName
        '
        Me.lblFileName.AutoSize = True
        Me.lblFileName.Location = New System.Drawing.Point(12, 9)
        Me.lblFileName.Name = "lblFileName"
        Me.lblFileName.Size = New System.Drawing.Size(104, 13)
        Me.lblFileName.TabIndex = 3
        Me.lblFileName.Text = "Physical Map Name:"
        '
        'lblMapName
        '
        Me.lblMapName.AutoSize = True
        Me.lblMapName.Location = New System.Drawing.Point(12, 22)
        Me.lblMapName.Name = "lblMapName"
        Me.lblMapName.Size = New System.Drawing.Size(100, 13)
        Me.lblMapName.TabIndex = 4
        Me.lblMapName.Text = "Internal Map Name:"
        '
        'lblMapCollision
        '
        Me.lblMapCollision.AutoSize = True
        Me.lblMapCollision.Location = New System.Drawing.Point(12, 48)
        Me.lblMapCollision.Name = "lblMapCollision"
        Me.lblMapCollision.Size = New System.Drawing.Size(113, 13)
        Me.lblMapCollision.TabIndex = 5
        Me.lblMapCollision.Text = "Map Collision Vertices:"
        '
        'btnOpenMap
        '
        Me.btnOpenMap.Location = New System.Drawing.Point(286, 128)
        Me.btnOpenMap.Name = "btnOpenMap"
        Me.btnOpenMap.Size = New System.Drawing.Size(234, 23)
        Me.btnOpenMap.TabIndex = 6
        Me.btnOpenMap.Text = "Open Map"
        Me.btnOpenMap.UseVisualStyleBackColor = True
        '
        'statusMain
        '
        Me.statusMain.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.statusLblStatus, Me.progMain})
        Me.statusMain.Location = New System.Drawing.Point(0, 262)
        Me.statusMain.Name = "statusMain"
        Me.statusMain.Size = New System.Drawing.Size(532, 22)
        Me.statusMain.SizingGrip = False
        Me.statusMain.TabIndex = 7
        Me.statusMain.Text = "Main Status"
        '
        'statusLblStatus
        '
        Me.statusLblStatus.Name = "statusLblStatus"
        Me.statusLblStatus.Size = New System.Drawing.Size(25, 17)
        Me.statusLblStatus.Text = "Idle"
        '
        'progMain
        '
        Me.progMain.Name = "progMain"
        Me.progMain.Size = New System.Drawing.Size(504, 16)
        Me.progMain.Style = System.Windows.Forms.ProgressBarStyle.Continuous
        '
        'lblMapMesh
        '
        Me.lblMapMesh.AutoSize = True
        Me.lblMapMesh.Location = New System.Drawing.Point(12, 61)
        Me.lblMapMesh.Name = "lblMapMesh"
        Me.lblMapMesh.Size = New System.Drawing.Size(101, 13)
        Me.lblMapMesh.TabIndex = 11
        Me.lblMapMesh.Text = "Map Mesh Vertices:"
        '
        'cboxAskOverwrite
        '
        Me.cboxAskOverwrite.AutoSize = True
        Me.cboxAskOverwrite.Checked = True
        Me.cboxAskOverwrite.CheckState = System.Windows.Forms.CheckState.Checked
        Me.cboxAskOverwrite.Location = New System.Drawing.Point(166, 35)
        Me.cboxAskOverwrite.Name = "cboxAskOverwrite"
        Me.cboxAskOverwrite.Size = New System.Drawing.Size(104, 17)
        Me.cboxAskOverwrite.TabIndex = 12
        Me.cboxAskOverwrite.Text = "Ask to Overwrite"
        Me.cboxAskOverwrite.UseVisualStyleBackColor = True
        Me.cboxAskOverwrite.Visible = False
        '
        'btnImportMesh
        '
        Me.btnImportMesh.Location = New System.Drawing.Point(276, 196)
        Me.btnImportMesh.Name = "btnImportMesh"
        Me.btnImportMesh.Size = New System.Drawing.Size(123, 23)
        Me.btnImportMesh.TabIndex = 14
        Me.btnImportMesh.Text = "Import .OBJ as Mesh"
        Me.btnImportMesh.UseVisualStyleBackColor = True
        Me.btnImportMesh.Visible = False
        '
        'btnExportMesh
        '
        Me.btnExportMesh.Location = New System.Drawing.Point(398, 196)
        Me.btnExportMesh.Name = "btnExportMesh"
        Me.btnExportMesh.Size = New System.Drawing.Size(122, 23)
        Me.btnExportMesh.TabIndex = 13
        Me.btnExportMesh.Text = "Export Mesh as .OBJ"
        Me.btnExportMesh.UseVisualStyleBackColor = True
        Me.btnExportMesh.Visible = False
        '
        'openFileImage
        '
        Me.openFileImage.Filter = "Image Files (*.bmp, *.jpg, *.png, *.gif)|*.bmp;*.jpg;*.png;*.gif"
        '
        'picSeparator1
        '
        Me.picSeparator1.Image = Global.BSP_Master.My.Resources.Resources.linksBackground
        Me.picSeparator1.Location = New System.Drawing.Point(276, 0)
        Me.picSeparator1.Name = "picSeparator1"
        Me.picSeparator1.Size = New System.Drawing.Size(4, 190)
        Me.picSeparator1.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage
        Me.picSeparator1.TabIndex = 15
        Me.picSeparator1.TabStop = False
        '
        'btnFlipMap
        '
        Me.btnFlipMap.Location = New System.Drawing.Point(286, 12)
        Me.btnFlipMap.Name = "btnFlipMap"
        Me.btnFlipMap.Size = New System.Drawing.Size(75, 23)
        Me.btnFlipMap.TabIndex = 16
        Me.btnFlipMap.Text = "Flip Map"
        Me.btnFlipMap.UseVisualStyleBackColor = True
        '
        'grpOptions
        '
        Me.grpOptions.Controls.Add(Me.lblApplyTo)
        Me.grpOptions.Controls.Add(Me.radBoth)
        Me.grpOptions.Controls.Add(Me.radMesh)
        Me.grpOptions.Controls.Add(Me.radCollision)
        Me.grpOptions.Location = New System.Drawing.Point(286, 70)
        Me.grpOptions.Name = "grpOptions"
        Me.grpOptions.Size = New System.Drawing.Size(243, 42)
        Me.grpOptions.TabIndex = 17
        Me.grpOptions.TabStop = False
        Me.grpOptions.Text = "Global Options"
        '
        'lblApplyTo
        '
        Me.lblApplyTo.AutoSize = True
        Me.lblApplyTo.Location = New System.Drawing.Point(6, 21)
        Me.lblApplyTo.Name = "lblApplyTo"
        Me.lblApplyTo.Size = New System.Drawing.Size(52, 13)
        Me.lblApplyTo.TabIndex = 19
        Me.lblApplyTo.Text = "Apply To:"
        '
        'radBoth
        '
        Me.radBoth.AutoSize = True
        Me.radBoth.Location = New System.Drawing.Point(190, 19)
        Me.radBoth.Name = "radBoth"
        Me.radBoth.Size = New System.Drawing.Size(47, 17)
        Me.radBoth.TabIndex = 18
        Me.radBoth.Text = "Both"
        Me.radBoth.UseVisualStyleBackColor = True
        '
        'radMesh
        '
        Me.radMesh.AutoSize = True
        Me.radMesh.Checked = True
        Me.radMesh.Location = New System.Drawing.Point(133, 19)
        Me.radMesh.Name = "radMesh"
        Me.radMesh.Size = New System.Drawing.Size(51, 17)
        Me.radMesh.TabIndex = 1
        Me.radMesh.TabStop = True
        Me.radMesh.Text = "Mesh"
        Me.radMesh.UseVisualStyleBackColor = True
        '
        'radCollision
        '
        Me.radCollision.AutoSize = True
        Me.radCollision.Location = New System.Drawing.Point(64, 19)
        Me.radCollision.Name = "radCollision"
        Me.radCollision.Size = New System.Drawing.Size(63, 17)
        Me.radCollision.TabIndex = 0
        Me.radCollision.Text = "Collision"
        Me.radCollision.UseVisualStyleBackColor = True
        '
        'pnlFlipOptions
        '
        Me.pnlFlipOptions.Controls.Add(Me.radFlipZ)
        Me.pnlFlipOptions.Controls.Add(Me.radFlipY)
        Me.pnlFlipOptions.Controls.Add(Me.radFlipX)
        Me.pnlFlipOptions.Location = New System.Drawing.Point(370, 12)
        Me.pnlFlipOptions.Name = "pnlFlipOptions"
        Me.pnlFlipOptions.Size = New System.Drawing.Size(165, 23)
        Me.pnlFlipOptions.TabIndex = 18
        '
        'radFlipZ
        '
        Me.radFlipZ.AutoSize = True
        Me.radFlipZ.Checked = True
        Me.radFlipZ.Location = New System.Drawing.Point(79, 3)
        Me.radFlipZ.Name = "radFlipZ"
        Me.radFlipZ.Size = New System.Drawing.Size(32, 17)
        Me.radFlipZ.TabIndex = 2
        Me.radFlipZ.TabStop = True
        Me.radFlipZ.Text = "Z"
        Me.radFlipZ.UseVisualStyleBackColor = True
        '
        'radFlipY
        '
        Me.radFlipY.AutoSize = True
        Me.radFlipY.Location = New System.Drawing.Point(41, 3)
        Me.radFlipY.Name = "radFlipY"
        Me.radFlipY.Size = New System.Drawing.Size(32, 17)
        Me.radFlipY.TabIndex = 1
        Me.radFlipY.Text = "Y"
        Me.radFlipY.UseVisualStyleBackColor = True
        '
        'radFlipX
        '
        Me.radFlipX.AutoSize = True
        Me.radFlipX.Location = New System.Drawing.Point(3, 3)
        Me.radFlipX.Name = "radFlipX"
        Me.radFlipX.Size = New System.Drawing.Size(32, 17)
        Me.radFlipX.TabIndex = 0
        Me.radFlipX.Text = "X"
        Me.radFlipX.UseVisualStyleBackColor = True
        '
        'btnMorphMap
        '
        Me.btnMorphMap.Location = New System.Drawing.Point(286, 41)
        Me.btnMorphMap.Name = "btnMorphMap"
        Me.btnMorphMap.Size = New System.Drawing.Size(75, 23)
        Me.btnMorphMap.TabIndex = 19
        Me.btnMorphMap.Text = "Morph Map"
        Me.btnMorphMap.UseVisualStyleBackColor = True
        '
        'pnlMorphOptions
        '
        Me.pnlMorphOptions.Controls.Add(Me.radMorphCone)
        Me.pnlMorphOptions.Controls.Add(Me.radMorphBowl)
        Me.pnlMorphOptions.Location = New System.Drawing.Point(370, 41)
        Me.pnlMorphOptions.Name = "pnlMorphOptions"
        Me.pnlMorphOptions.Size = New System.Drawing.Size(165, 23)
        Me.pnlMorphOptions.TabIndex = 19
        '
        'radMorphCone
        '
        Me.radMorphCone.AutoSize = True
        Me.radMorphCone.Enabled = False
        Me.radMorphCone.Location = New System.Drawing.Point(57, 3)
        Me.radMorphCone.Name = "radMorphCone"
        Me.radMorphCone.Size = New System.Drawing.Size(50, 17)
        Me.radMorphCone.TabIndex = 1
        Me.radMorphCone.Text = "Cone"
        Me.radMorphCone.UseVisualStyleBackColor = True
        '
        'radMorphBowl
        '
        Me.radMorphBowl.AutoSize = True
        Me.radMorphBowl.Checked = True
        Me.radMorphBowl.Location = New System.Drawing.Point(3, 3)
        Me.radMorphBowl.Name = "radMorphBowl"
        Me.radMorphBowl.Size = New System.Drawing.Size(48, 17)
        Me.radMorphBowl.TabIndex = 0
        Me.radMorphBowl.TabStop = True
        Me.radMorphBowl.Text = "Bowl"
        Me.radMorphBowl.UseVisualStyleBackColor = True
        '
        'picSeparator2
        '
        Me.picSeparator2.Image = Global.BSP_Master.My.Resources.Resources.linksBackground
        Me.picSeparator2.Location = New System.Drawing.Point(0, 120)
        Me.picSeparator2.Name = "picSeparator2"
        Me.picSeparator2.Size = New System.Drawing.Size(280, 4)
        Me.picSeparator2.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage
        Me.picSeparator2.TabIndex = 20
        Me.picSeparator2.TabStop = False
        '
        'picTeam1
        '
        Me.picTeam1.BorderStyle = System.Windows.Forms.BorderStyle.Fixed3D
        Me.picTeam1.Location = New System.Drawing.Point(87, 19)
        Me.picTeam1.Name = "picTeam1"
        Me.picTeam1.Size = New System.Drawing.Size(32, 16)
        Me.picTeam1.TabIndex = 22
        Me.picTeam1.TabStop = False
        '
        'grpTeamColors
        '
        Me.grpTeamColors.Controls.Add(Me.picTeamAll)
        Me.grpTeamColors.Controls.Add(Me.lblTeamAll)
        Me.grpTeamColors.Controls.Add(Me.lblTeam9)
        Me.grpTeamColors.Controls.Add(Me.picTeam9)
        Me.grpTeamColors.Controls.Add(Me.lblTeam8)
        Me.grpTeamColors.Controls.Add(Me.picTeam8)
        Me.grpTeamColors.Controls.Add(Me.lblTeam7)
        Me.grpTeamColors.Controls.Add(Me.picTeam7)
        Me.grpTeamColors.Controls.Add(Me.lblTeam6)
        Me.grpTeamColors.Controls.Add(Me.picTeam6)
        Me.grpTeamColors.Controls.Add(Me.lblTeam5)
        Me.grpTeamColors.Controls.Add(Me.picTeam5)
        Me.grpTeamColors.Controls.Add(Me.lblTeam4)
        Me.grpTeamColors.Controls.Add(Me.picTeam4)
        Me.grpTeamColors.Controls.Add(Me.lblTeam3)
        Me.grpTeamColors.Controls.Add(Me.picTeam3)
        Me.grpTeamColors.Controls.Add(Me.lblTeam2)
        Me.grpTeamColors.Controls.Add(Me.picTeam2)
        Me.grpTeamColors.Controls.Add(Me.lblTeam1)
        Me.grpTeamColors.Controls.Add(Me.picTeam1)
        Me.grpTeamColors.Location = New System.Drawing.Point(12, 130)
        Me.grpTeamColors.Name = "grpTeamColors"
        Me.grpTeamColors.Size = New System.Drawing.Size(258, 129)
        Me.grpTeamColors.TabIndex = 23
        Me.grpTeamColors.TabStop = False
        Me.grpTeamColors.Text = "Team Colors"
        '
        'picTeamAll
        '
        Me.picTeamAll.BorderStyle = System.Windows.Forms.BorderStyle.Fixed3D
        Me.picTeamAll.Location = New System.Drawing.Point(220, 107)
        Me.picTeamAll.Name = "picTeamAll"
        Me.picTeamAll.Size = New System.Drawing.Size(32, 16)
        Me.picTeamAll.TabIndex = 49
        Me.picTeamAll.TabStop = False
        '
        'lblTeamAll
        '
        Me.lblTeamAll.Location = New System.Drawing.Point(139, 108)
        Me.lblTeamAll.Name = "lblTeamAll"
        Me.lblTeamAll.Size = New System.Drawing.Size(75, 13)
        Me.lblTeamAll.TabIndex = 48
        Me.lblTeamAll.Text = "Change All:"
        Me.lblTeamAll.TextAlign = System.Drawing.ContentAlignment.MiddleRight
        '
        'lblTeam9
        '
        Me.lblTeam9.Location = New System.Drawing.Point(6, 108)
        Me.lblTeam9.Name = "lblTeam9"
        Me.lblTeam9.Size = New System.Drawing.Size(75, 13)
        Me.lblTeam9.TabIndex = 39
        Me.lblTeam9.Text = "Gray Team:"
        Me.lblTeam9.TextAlign = System.Drawing.ContentAlignment.MiddleRight
        '
        'picTeam9
        '
        Me.picTeam9.BorderStyle = System.Windows.Forms.BorderStyle.Fixed3D
        Me.picTeam9.Location = New System.Drawing.Point(87, 107)
        Me.picTeam9.Name = "picTeam9"
        Me.picTeam9.Size = New System.Drawing.Size(32, 16)
        Me.picTeam9.TabIndex = 38
        Me.picTeam9.TabStop = False
        '
        'lblTeam8
        '
        Me.lblTeam8.Location = New System.Drawing.Point(139, 86)
        Me.lblTeam8.Name = "lblTeam8"
        Me.lblTeam8.Size = New System.Drawing.Size(75, 13)
        Me.lblTeam8.TabIndex = 37
        Me.lblTeam8.Text = "Pink Team:"
        Me.lblTeam8.TextAlign = System.Drawing.ContentAlignment.MiddleRight
        '
        'picTeam8
        '
        Me.picTeam8.BorderStyle = System.Windows.Forms.BorderStyle.Fixed3D
        Me.picTeam8.Location = New System.Drawing.Point(220, 85)
        Me.picTeam8.Name = "picTeam8"
        Me.picTeam8.Size = New System.Drawing.Size(32, 16)
        Me.picTeam8.TabIndex = 36
        Me.picTeam8.TabStop = False
        '
        'lblTeam7
        '
        Me.lblTeam7.Location = New System.Drawing.Point(6, 86)
        Me.lblTeam7.Name = "lblTeam7"
        Me.lblTeam7.Size = New System.Drawing.Size(75, 13)
        Me.lblTeam7.TabIndex = 35
        Me.lblTeam7.Text = "Brown Team:"
        Me.lblTeam7.TextAlign = System.Drawing.ContentAlignment.MiddleRight
        '
        'picTeam7
        '
        Me.picTeam7.BorderStyle = System.Windows.Forms.BorderStyle.Fixed3D
        Me.picTeam7.Location = New System.Drawing.Point(87, 85)
        Me.picTeam7.Name = "picTeam7"
        Me.picTeam7.Size = New System.Drawing.Size(32, 16)
        Me.picTeam7.TabIndex = 34
        Me.picTeam7.TabStop = False
        '
        'lblTeam6
        '
        Me.lblTeam6.Location = New System.Drawing.Point(139, 64)
        Me.lblTeam6.Name = "lblTeam6"
        Me.lblTeam6.Size = New System.Drawing.Size(75, 13)
        Me.lblTeam6.TabIndex = 33
        Me.lblTeam6.Text = "Orange Team:"
        Me.lblTeam6.TextAlign = System.Drawing.ContentAlignment.MiddleRight
        '
        'picTeam6
        '
        Me.picTeam6.BorderStyle = System.Windows.Forms.BorderStyle.Fixed3D
        Me.picTeam6.Location = New System.Drawing.Point(220, 63)
        Me.picTeam6.Name = "picTeam6"
        Me.picTeam6.Size = New System.Drawing.Size(32, 16)
        Me.picTeam6.TabIndex = 32
        Me.picTeam6.TabStop = False
        '
        'lblTeam5
        '
        Me.lblTeam5.Location = New System.Drawing.Point(6, 64)
        Me.lblTeam5.Name = "lblTeam5"
        Me.lblTeam5.Size = New System.Drawing.Size(75, 13)
        Me.lblTeam5.TabIndex = 31
        Me.lblTeam5.Text = "Purple Team:"
        Me.lblTeam5.TextAlign = System.Drawing.ContentAlignment.MiddleRight
        '
        'picTeam5
        '
        Me.picTeam5.BorderStyle = System.Windows.Forms.BorderStyle.Fixed3D
        Me.picTeam5.Location = New System.Drawing.Point(87, 63)
        Me.picTeam5.Name = "picTeam5"
        Me.picTeam5.Size = New System.Drawing.Size(32, 16)
        Me.picTeam5.TabIndex = 30
        Me.picTeam5.TabStop = False
        '
        'lblTeam4
        '
        Me.lblTeam4.Location = New System.Drawing.Point(139, 42)
        Me.lblTeam4.Name = "lblTeam4"
        Me.lblTeam4.Size = New System.Drawing.Size(75, 13)
        Me.lblTeam4.TabIndex = 29
        Me.lblTeam4.Text = "Green Team:"
        Me.lblTeam4.TextAlign = System.Drawing.ContentAlignment.MiddleRight
        '
        'picTeam4
        '
        Me.picTeam4.BorderStyle = System.Windows.Forms.BorderStyle.Fixed3D
        Me.picTeam4.Location = New System.Drawing.Point(220, 41)
        Me.picTeam4.Name = "picTeam4"
        Me.picTeam4.Size = New System.Drawing.Size(32, 16)
        Me.picTeam4.TabIndex = 28
        Me.picTeam4.TabStop = False
        '
        'lblTeam3
        '
        Me.lblTeam3.Location = New System.Drawing.Point(6, 42)
        Me.lblTeam3.Name = "lblTeam3"
        Me.lblTeam3.Size = New System.Drawing.Size(75, 13)
        Me.lblTeam3.TabIndex = 27
        Me.lblTeam3.Text = "Yellow Team:"
        Me.lblTeam3.TextAlign = System.Drawing.ContentAlignment.MiddleRight
        '
        'picTeam3
        '
        Me.picTeam3.BorderStyle = System.Windows.Forms.BorderStyle.Fixed3D
        Me.picTeam3.Location = New System.Drawing.Point(87, 41)
        Me.picTeam3.Name = "picTeam3"
        Me.picTeam3.Size = New System.Drawing.Size(32, 16)
        Me.picTeam3.TabIndex = 26
        Me.picTeam3.TabStop = False
        '
        'lblTeam2
        '
        Me.lblTeam2.Location = New System.Drawing.Point(139, 19)
        Me.lblTeam2.Name = "lblTeam2"
        Me.lblTeam2.Size = New System.Drawing.Size(75, 13)
        Me.lblTeam2.TabIndex = 25
        Me.lblTeam2.Text = "Blue Team:"
        Me.lblTeam2.TextAlign = System.Drawing.ContentAlignment.MiddleRight
        '
        'picTeam2
        '
        Me.picTeam2.BorderStyle = System.Windows.Forms.BorderStyle.Fixed3D
        Me.picTeam2.Location = New System.Drawing.Point(220, 19)
        Me.picTeam2.Name = "picTeam2"
        Me.picTeam2.Size = New System.Drawing.Size(32, 16)
        Me.picTeam2.TabIndex = 24
        Me.picTeam2.TabStop = False
        '
        'lblTeam1
        '
        Me.lblTeam1.Location = New System.Drawing.Point(6, 19)
        Me.lblTeam1.Name = "lblTeam1"
        Me.lblTeam1.Size = New System.Drawing.Size(75, 13)
        Me.lblTeam1.TabIndex = 23
        Me.lblTeam1.Text = "Red Team:"
        Me.lblTeam1.TextAlign = System.Drawing.ContentAlignment.MiddleRight
        '
        'picSeparator3
        '
        Me.picSeparator3.Image = Global.BSP_Master.My.Resources.Resources.linksBackground
        Me.picSeparator3.Location = New System.Drawing.Point(276, 118)
        Me.picSeparator3.Name = "picSeparator3"
        Me.picSeparator3.Size = New System.Drawing.Size(259, 4)
        Me.picSeparator3.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage
        Me.picSeparator3.TabIndex = 24
        Me.picSeparator3.TabStop = False
        '
        'btnSaveMap
        '
        Me.btnSaveMap.Location = New System.Drawing.Point(286, 157)
        Me.btnSaveMap.Name = "btnSaveMap"
        Me.btnSaveMap.Size = New System.Drawing.Size(234, 23)
        Me.btnSaveMap.TabIndex = 25
        Me.btnSaveMap.Text = "Save Map"
        Me.btnSaveMap.UseVisualStyleBackColor = True
        '
        'picSeparator4
        '
        Me.picSeparator4.Image = Global.BSP_Master.My.Resources.Resources.linksBackground
        Me.picSeparator4.Location = New System.Drawing.Point(276, 186)
        Me.picSeparator4.Name = "picSeparator4"
        Me.picSeparator4.Size = New System.Drawing.Size(259, 4)
        Me.picSeparator4.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage
        Me.picSeparator4.TabIndex = 26
        Me.picSeparator4.TabStop = False
        '
        'colorMain
        '
        Me.colorMain.AnyColor = True
        Me.colorMain.FullOpen = True
        '
        'formAdvanced
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.BackColor = System.Drawing.SystemColors.Control
        Me.ClientSize = New System.Drawing.Size(532, 284)
        Me.Controls.Add(Me.picSeparator4)
        Me.Controls.Add(Me.btnSaveMap)
        Me.Controls.Add(Me.grpTeamColors)
        Me.Controls.Add(Me.pnlMorphOptions)
        Me.Controls.Add(Me.btnMorphMap)
        Me.Controls.Add(Me.pnlFlipOptions)
        Me.Controls.Add(Me.grpOptions)
        Me.Controls.Add(Me.btnFlipMap)
        Me.Controls.Add(Me.picSeparator1)
        Me.Controls.Add(Me.btnImportMesh)
        Me.Controls.Add(Me.btnExportMesh)
        Me.Controls.Add(Me.cboxAskOverwrite)
        Me.Controls.Add(Me.lblMapMesh)
        Me.Controls.Add(Me.statusMain)
        Me.Controls.Add(Me.btnOpenMap)
        Me.Controls.Add(Me.lblMapCollision)
        Me.Controls.Add(Me.lblMapName)
        Me.Controls.Add(Me.lblFileName)
        Me.Controls.Add(Me.cboxSaveImmediately)
        Me.Controls.Add(Me.btnImportCollision)
        Me.Controls.Add(Me.btnExportCollision)
        Me.Controls.Add(Me.picSeparator2)
        Me.Controls.Add(Me.picSeparator3)
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedSingle
        Me.Icon = CType(resources.GetObject("$this.Icon"), System.Drawing.Icon)
        Me.MaximizeBox = False
        Me.MinimizeBox = False
        Me.Name = "formAdvanced"
        Me.ShowInTaskbar = False
        Me.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen
        Me.Text = "Advanced Functions"
        Me.TopMost = True
        Me.statusMain.ResumeLayout(False)
        Me.statusMain.PerformLayout()
        CType(Me.picSeparator1, System.ComponentModel.ISupportInitialize).EndInit()
        Me.grpOptions.ResumeLayout(False)
        Me.grpOptions.PerformLayout()
        Me.pnlFlipOptions.ResumeLayout(False)
        Me.pnlFlipOptions.PerformLayout()
        Me.pnlMorphOptions.ResumeLayout(False)
        Me.pnlMorphOptions.PerformLayout()
        CType(Me.picSeparator2, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.picTeam1, System.ComponentModel.ISupportInitialize).EndInit()
        Me.grpTeamColors.ResumeLayout(False)
        CType(Me.picTeamAll, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.picTeam9, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.picTeam8, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.picTeam7, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.picTeam6, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.picTeam5, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.picTeam4, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.picTeam3, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.picTeam2, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.picSeparator3, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.picSeparator4, System.ComponentModel.ISupportInitialize).EndInit()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents btnExportCollision As System.Windows.Forms.Button
    Friend WithEvents btnImportCollision As System.Windows.Forms.Button
    Friend WithEvents cboxSaveImmediately As System.Windows.Forms.CheckBox
    Friend WithEvents lblFileName As System.Windows.Forms.Label
    Friend WithEvents lblMapName As System.Windows.Forms.Label
    Friend WithEvents lblMapCollision As System.Windows.Forms.Label
    Friend WithEvents btnOpenMap As System.Windows.Forms.Button
    Friend WithEvents statusMain As System.Windows.Forms.StatusStrip
    Friend WithEvents statusLblStatus As System.Windows.Forms.ToolStripStatusLabel
    Friend WithEvents lblMapMesh As System.Windows.Forms.Label
    Friend WithEvents cboxAskOverwrite As System.Windows.Forms.CheckBox
    Friend WithEvents btnImportMesh As System.Windows.Forms.Button
    Friend WithEvents btnExportMesh As System.Windows.Forms.Button
    Friend WithEvents picSeparator1 As System.Windows.Forms.PictureBox
    Friend WithEvents openFileImage As System.Windows.Forms.OpenFileDialog
    Friend WithEvents btnFlipMap As System.Windows.Forms.Button
    Friend WithEvents grpOptions As System.Windows.Forms.GroupBox
    Friend WithEvents radBoth As System.Windows.Forms.RadioButton
    Friend WithEvents radMesh As System.Windows.Forms.RadioButton
    Friend WithEvents radCollision As System.Windows.Forms.RadioButton
    Friend WithEvents progMain As System.Windows.Forms.ToolStripProgressBar
    Friend WithEvents pnlFlipOptions As System.Windows.Forms.Panel
    Friend WithEvents radFlipZ As System.Windows.Forms.RadioButton
    Friend WithEvents radFlipY As System.Windows.Forms.RadioButton
    Friend WithEvents radFlipX As System.Windows.Forms.RadioButton
    Friend WithEvents btnMorphMap As System.Windows.Forms.Button
    Friend WithEvents pnlMorphOptions As System.Windows.Forms.Panel
    Friend WithEvents radMorphCone As System.Windows.Forms.RadioButton
    Friend WithEvents radMorphBowl As System.Windows.Forms.RadioButton
    Friend WithEvents picSeparator2 As System.Windows.Forms.PictureBox
    Friend WithEvents picTeam1 As System.Windows.Forms.PictureBox
    Friend WithEvents grpTeamColors As System.Windows.Forms.GroupBox
    Friend WithEvents lblTeam1 As System.Windows.Forms.Label
    Friend WithEvents lblTeam9 As System.Windows.Forms.Label
    Friend WithEvents picTeam9 As System.Windows.Forms.PictureBox
    Friend WithEvents lblTeam8 As System.Windows.Forms.Label
    Friend WithEvents picTeam8 As System.Windows.Forms.PictureBox
    Friend WithEvents lblTeam7 As System.Windows.Forms.Label
    Friend WithEvents picTeam7 As System.Windows.Forms.PictureBox
    Friend WithEvents lblTeam6 As System.Windows.Forms.Label
    Friend WithEvents picTeam6 As System.Windows.Forms.PictureBox
    Friend WithEvents lblTeam5 As System.Windows.Forms.Label
    Friend WithEvents picTeam5 As System.Windows.Forms.PictureBox
    Friend WithEvents lblTeam4 As System.Windows.Forms.Label
    Friend WithEvents picTeam4 As System.Windows.Forms.PictureBox
    Friend WithEvents lblTeam3 As System.Windows.Forms.Label
    Friend WithEvents picTeam3 As System.Windows.Forms.PictureBox
    Friend WithEvents lblTeam2 As System.Windows.Forms.Label
    Friend WithEvents picTeam2 As System.Windows.Forms.PictureBox
    Friend WithEvents lblApplyTo As System.Windows.Forms.Label
    Friend WithEvents picSeparator3 As System.Windows.Forms.PictureBox
    Friend WithEvents btnSaveMap As System.Windows.Forms.Button
    Friend WithEvents picSeparator4 As System.Windows.Forms.PictureBox
    Friend WithEvents colorMain As System.Windows.Forms.ColorDialog
    Friend WithEvents lblTeamAll As System.Windows.Forms.Label
    Friend WithEvents picTeamAll As System.Windows.Forms.PictureBox
End Class
