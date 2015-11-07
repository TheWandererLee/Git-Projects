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
        Me.components = New System.ComponentModel.Container
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(formMain))
        Me.contextMain = New System.Windows.Forms.ContextMenuStrip(Me.components)
        Me.conBtnOpenMap = New System.Windows.Forms.ToolStripMenuItem
        Me.conBtnSaveMap = New System.Windows.Forms.ToolStripMenuItem
        Me.conBtnSaveMapAs = New System.Windows.Forms.ToolStripMenuItem
        Me.conSeperator0 = New System.Windows.Forms.ToolStripSeparator
        Me.conBtnRestart = New System.Windows.Forms.ToolStripMenuItem
        Me.conBtnRefresh = New System.Windows.Forms.ToolStripMenuItem
        Me.openFileOBJ = New System.Windows.Forms.OpenFileDialog
        Me.statusLblX = New System.Windows.Forms.ToolStripStatusLabel
        Me.statusLblY = New System.Windows.Forms.ToolStripStatusLabel
        Me.statusLblZoom = New System.Windows.Forms.ToolStripStatusLabel
        Me.statusProgMain = New System.Windows.Forms.ToolStripProgressBar
        Me.statusLblOffset = New System.Windows.Forms.ToolStripStatusLabel
        Me.statusLblMin = New System.Windows.Forms.ToolStripStatusLabel
        Me.statusLblMax = New System.Windows.Forms.ToolStripStatusLabel
        Me.trackSoftness = New System.Windows.Forms.TrackBar
        Me.contextSoftness = New System.Windows.Forms.ContextMenuStrip(Me.components)
        Me.conBtnResetSoftness = New System.Windows.Forms.ToolStripMenuItem
        Me.lblSoftness = New System.Windows.Forms.Label
        Me.statusMain = New System.Windows.Forms.StatusStrip
        Me.saveFileOBJ = New System.Windows.Forms.SaveFileDialog
        Me.openFileMap = New System.Windows.Forms.OpenFileDialog
        Me.saveFileMap = New System.Windows.Forms.SaveFileDialog
        Me.toolSide = New System.Windows.Forms.ToolStrip
        Me.toolBtnMove = New System.Windows.Forms.ToolStripButton
        Me.toolBtnSelect = New System.Windows.Forms.ToolStripButton
        Me.toolBtnZoomIn = New System.Windows.Forms.ToolStripButton
        Me.toolBtnZoomOut = New System.Windows.Forms.ToolStripButton
        Me.toolBtnRefresh = New System.Windows.Forms.ToolStripButton
        Me.toolBtnRestart = New System.Windows.Forms.ToolStripButton
        Me.toolBtnSettings = New System.Windows.Forms.ToolStripButton
        Me.toolBtnPointEditor = New System.Windows.Forms.ToolStripButton
        Me.toolBtnHideSide = New System.Windows.Forms.ToolStripButton
        Me.toolSeparator1 = New System.Windows.Forms.ToolStripSeparator
        Me.toolTop = New System.Windows.Forms.ToolStrip
        Me.toolBtnAbout = New System.Windows.Forms.ToolStripButton
        Me.toolBtnOpen = New System.Windows.Forms.ToolStripDropDownButton
        Me.menuBtnOpenMap = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnOpenCollision = New System.Windows.Forms.ToolStripMenuItem
        Me.toolBtnSave = New System.Windows.Forms.ToolStripDropDownButton
        Me.menuBtnSaveMap = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnSaveMapAs = New System.Windows.Forms.ToolStripMenuItem
        Me.menuSeperator0 = New System.Windows.Forms.ToolStripSeparator
        Me.menuBtnSaveCollision = New System.Windows.Forms.ToolStripMenuItem
        Me.menuBtnSaveCollisionAs = New System.Windows.Forms.ToolStripMenuItem
        Me.toolBtnOptions = New System.Windows.Forms.ToolStripDropDownButton
        Me.toolLblDrawType = New System.Windows.Forms.ToolStripMenuItem
        Me.toolComboDrawType = New System.Windows.Forms.ToolStripComboBox
        Me.toolLblDrawMode = New System.Windows.Forms.ToolStripMenuItem
        Me.toolComboDrawMode = New System.Windows.Forms.ToolStripComboBox
        Me.toolLblPrecision = New System.Windows.Forms.ToolStripMenuItem
        Me.toolComboPrecision = New System.Windows.Forms.ToolStripComboBox
        Me.toolBtnMoreOptions = New System.Windows.Forms.ToolStripMenuItem
        Me.toolBtnAdvanced = New System.Windows.Forms.ToolStripButton
        Me.grpPointEditor = New System.Windows.Forms.GroupBox
        Me.cboxUseColorCoding = New System.Windows.Forms.CheckBox
        Me.cboxShowMeshPoints = New System.Windows.Forms.CheckBox
        Me.grpMainWindow = New System.Windows.Forms.GroupBox
        Me.cboxConstrain = New System.Windows.Forms.CheckBox
        Me.lblMoveSizeV = New System.Windows.Forms.Label
        Me.numMoveSizeH = New System.Windows.Forms.NumericUpDown
        Me.lblMoveSizeH = New System.Windows.Forms.Label
        Me.numMoveSizeW = New System.Windows.Forms.NumericUpDown
        Me.comboDblClick = New System.Windows.Forms.ComboBox
        Me.cboxMaximize = New System.Windows.Forms.CheckBox
        Me.lblDoubleClick = New System.Windows.Forms.Label
        Me.cboxDrawMove = New System.Windows.Forms.CheckBox
        Me.cboxAntiAlias = New System.Windows.Forms.CheckBox
        Me.cboxShowToolTips = New System.Windows.Forms.CheckBox
        Me.cboxAlwaysOnTop = New System.Windows.Forms.CheckBox
        Me.btnOK = New System.Windows.Forms.Button
        Me.lblPreview = New System.Windows.Forms.Label
        Me.btnShowSide = New System.Windows.Forms.Button
        Me.timDashSpin = New System.Windows.Forms.Timer(Me.components)
        Me.picPreview = New System.Windows.Forms.PictureBox
        Me.lblLeakProtection = New System.Windows.Forms.Label
        Me.webBeta = New System.Windows.Forms.WebBrowser
        Me.contextMain.SuspendLayout()
        CType(Me.trackSoftness, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.contextSoftness.SuspendLayout()
        Me.statusMain.SuspendLayout()
        Me.toolSide.SuspendLayout()
        Me.toolTop.SuspendLayout()
        Me.grpPointEditor.SuspendLayout()
        Me.grpMainWindow.SuspendLayout()
        CType(Me.numMoveSizeH, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.numMoveSizeW, System.ComponentModel.ISupportInitialize).BeginInit()
        CType(Me.picPreview, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.SuspendLayout()
        '
        'contextMain
        '
        Me.contextMain.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.conBtnOpenMap, Me.conBtnSaveMap, Me.conBtnSaveMapAs, Me.conSeperator0, Me.conBtnRestart, Me.conBtnRefresh})
        Me.contextMain.Name = "contextMain"
        Me.contextMain.Size = New System.Drawing.Size(162, 120)
        '
        'conBtnOpenMap
        '
        Me.conBtnOpenMap.Font = New System.Drawing.Font("Tahoma", 8.25!, System.Drawing.FontStyle.Bold)
        Me.conBtnOpenMap.Image = Global.BSP_Master.My.Resources.Resources.toolBtnOpen
        Me.conBtnOpenMap.ImageTransparentColor = System.Drawing.Color.Magenta
        Me.conBtnOpenMap.Name = "conBtnOpenMap"
        Me.conBtnOpenMap.Size = New System.Drawing.Size(161, 22)
        Me.conBtnOpenMap.Text = "Open Map"
        '
        'conBtnSaveMap
        '
        Me.conBtnSaveMap.Image = CType(resources.GetObject("conBtnSaveMap.Image"), System.Drawing.Image)
        Me.conBtnSaveMap.Name = "conBtnSaveMap"
        Me.conBtnSaveMap.Size = New System.Drawing.Size(161, 22)
        Me.conBtnSaveMap.Text = "Save Map"
        '
        'conBtnSaveMapAs
        '
        Me.conBtnSaveMapAs.Image = CType(resources.GetObject("conBtnSaveMapAs.Image"), System.Drawing.Image)
        Me.conBtnSaveMapAs.Name = "conBtnSaveMapAs"
        Me.conBtnSaveMapAs.Size = New System.Drawing.Size(161, 22)
        Me.conBtnSaveMapAs.Text = "Save Map As..."
        '
        'conSeperator0
        '
        Me.conSeperator0.Name = "conSeperator0"
        Me.conSeperator0.Size = New System.Drawing.Size(158, 6)
        '
        'conBtnRestart
        '
        Me.conBtnRestart.Image = Global.BSP_Master.My.Resources.Resources.toolBtnRefresh
        Me.conBtnRestart.Name = "conBtnRestart"
        Me.conBtnRestart.Size = New System.Drawing.Size(161, 22)
        Me.conBtnRestart.Text = "Restart View"
        '
        'conBtnRefresh
        '
        Me.conBtnRefresh.Image = Global.BSP_Master.My.Resources.Resources.refresh
        Me.conBtnRefresh.ImageScaling = System.Windows.Forms.ToolStripItemImageScaling.None
        Me.conBtnRefresh.Name = "conBtnRefresh"
        Me.conBtnRefresh.Size = New System.Drawing.Size(161, 22)
        Me.conBtnRefresh.Text = "Refresh View"
        '
        'openFileOBJ
        '
        Me.openFileOBJ.Filter = "Collision OBJ (*.obj)|*.obj|All Files (*.*)|*.*"
        Me.openFileOBJ.Title = "Open Collision .OBJ File"
        '
        'statusLblX
        '
        Me.statusLblX.BackColor = System.Drawing.SystemColors.Control
        Me.statusLblX.Name = "statusLblX"
        Me.statusLblX.Size = New System.Drawing.Size(17, 17)
        Me.statusLblX.Text = "X:"
        Me.statusLblX.ToolTipText = "X:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    The current X-Coordinate of the mouse relative" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "        to this set of po" & _
            "ints."
        '
        'statusLblY
        '
        Me.statusLblY.BackColor = System.Drawing.SystemColors.Control
        Me.statusLblY.Name = "statusLblY"
        Me.statusLblY.Size = New System.Drawing.Size(17, 17)
        Me.statusLblY.Text = "Y:"
        Me.statusLblY.ToolTipText = "Y:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    The current Y-Coordinate of the mouse relative" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "        to this set of po" & _
            "ints."
        '
        'statusLblZoom
        '
        Me.statusLblZoom.BackColor = System.Drawing.SystemColors.Control
        Me.statusLblZoom.Name = "statusLblZoom"
        Me.statusLblZoom.Size = New System.Drawing.Size(37, 17)
        Me.statusLblZoom.Text = "Zoom:"
        Me.statusLblZoom.ToolTipText = "Zoom Factor:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    The current zoom factor of this point set," & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "        determines " & _
            "how far the points are relatively" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "        spaced apart."
        '
        'statusProgMain
        '
        Me.statusProgMain.Name = "statusProgMain"
        Me.statusProgMain.Size = New System.Drawing.Size(100, 16)
        Me.statusProgMain.Style = System.Windows.Forms.ProgressBarStyle.Continuous
        '
        'statusLblOffset
        '
        Me.statusLblOffset.BackColor = System.Drawing.SystemColors.Control
        Me.statusLblOffset.Name = "statusLblOffset"
        Me.statusLblOffset.Size = New System.Drawing.Size(42, 17)
        Me.statusLblOffset.Text = "Offset:"
        Me.statusLblOffset.ToolTipText = "Offset:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    The current offset that is applied to all the points," & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "        movin" & _
            "g them to a visible location."
        '
        'statusLblMin
        '
        Me.statusLblMin.BackColor = System.Drawing.SystemColors.Control
        Me.statusLblMin.Name = "statusLblMin"
        Me.statusLblMin.Size = New System.Drawing.Size(27, 17)
        Me.statusLblMin.Text = "Min:"
        Me.statusLblMin.ToolTipText = "Minimum:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    The lowest coordinates in this point set."
        '
        'statusLblMax
        '
        Me.statusLblMax.BackColor = System.Drawing.SystemColors.Control
        Me.statusLblMax.Name = "statusLblMax"
        Me.statusLblMax.Size = New System.Drawing.Size(31, 17)
        Me.statusLblMax.Text = "Max:"
        Me.statusLblMax.ToolTipText = "Maximum:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    The highest coordinates in this point set."
        '
        'trackSoftness
        '
        Me.trackSoftness.ContextMenuStrip = Me.contextSoftness
        Me.trackSoftness.Cursor = System.Windows.Forms.Cursors.Arrow
        Me.trackSoftness.Location = New System.Drawing.Point(24, 496)
        Me.trackSoftness.Maximum = 255
        Me.trackSoftness.Name = "trackSoftness"
        Me.trackSoftness.Size = New System.Drawing.Size(685, 45)
        Me.trackSoftness.TabIndex = 3
        Me.trackSoftness.Value = 192
        '
        'contextSoftness
        '
        Me.contextSoftness.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.conBtnResetSoftness})
        Me.contextSoftness.Name = "contextSoftness"
        Me.contextSoftness.Size = New System.Drawing.Size(159, 26)
        '
        'conBtnResetSoftness
        '
        Me.conBtnResetSoftness.Name = "conBtnResetSoftness"
        Me.conBtnResetSoftness.Size = New System.Drawing.Size(158, 22)
        Me.conBtnResetSoftness.Text = "Reset Softness"
        '
        'lblSoftness
        '
        Me.lblSoftness.AutoSize = True
        Me.lblSoftness.Location = New System.Drawing.Point(24, 528)
        Me.lblSoftness.Name = "lblSoftness"
        Me.lblSoftness.Size = New System.Drawing.Size(51, 13)
        Me.lblSoftness.TabIndex = 4
        Me.lblSoftness.Text = "Softness:"
        Me.lblSoftness.Visible = False
        '
        'statusMain
        '
        Me.statusMain.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.statusLblMin, Me.statusLblMax, Me.statusLblOffset, Me.statusLblZoom, Me.statusLblX, Me.statusLblY})
        Me.statusMain.Location = New System.Drawing.Point(0, 424)
        Me.statusMain.Name = "statusMain"
        Me.statusMain.Size = New System.Drawing.Size(632, 22)
        Me.statusMain.TabIndex = 6
        Me.statusMain.Text = "Main Status"
        '
        'saveFileOBJ
        '
        Me.saveFileOBJ.Filter = "Collision OBJ (*.obj)|*.obj|All Files(*.*)|*.*"
        Me.saveFileOBJ.Title = "Save As .OBJ File"
        '
        'openFileMap
        '
        Me.openFileMap.Filter = "Halo 2 Map Files (*.map)|*.map|All Files (*.*)|*.*"
        Me.openFileMap.Title = "Open Map File"
        '
        'saveFileMap
        '
        Me.saveFileMap.Filter = "Halo 2 Map Files (*.map)|*.map"
        Me.saveFileMap.Title = "Save As Map File"
        '
        'toolSide
        '
        Me.toolSide.Dock = System.Windows.Forms.DockStyle.Left
        Me.toolSide.GripStyle = System.Windows.Forms.ToolStripGripStyle.Hidden
        Me.toolSide.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.toolBtnMove, Me.toolBtnSelect, Me.toolBtnZoomIn, Me.toolBtnZoomOut, Me.toolBtnRefresh, Me.toolBtnRestart, Me.toolBtnSettings, Me.toolBtnPointEditor, Me.toolBtnHideSide})
        Me.toolSide.Location = New System.Drawing.Point(0, 25)
        Me.toolSide.Name = "toolSide"
        Me.toolSide.Size = New System.Drawing.Size(24, 399)
        Me.toolSide.TabIndex = 7
        Me.toolSide.Text = "Side Tool"
        '
        'toolBtnMove
        '
        Me.toolBtnMove.CheckOnClick = True
        Me.toolBtnMove.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Image
        Me.toolBtnMove.Image = Global.BSP_Master.My.Resources.Resources.toolBtnMove
        Me.toolBtnMove.ImageTransparentColor = System.Drawing.Color.Magenta
        Me.toolBtnMove.Name = "toolBtnMove"
        Me.toolBtnMove.Size = New System.Drawing.Size(21, 20)
        Me.toolBtnMove.Text = "Move"
        Me.toolBtnMove.ToolTipText = "Move:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    Allows you to move points within a radius to a" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "        new X, Y posit" & _
            "ion on the window."
        '
        'toolBtnSelect
        '
        Me.toolBtnSelect.CheckOnClick = True
        Me.toolBtnSelect.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Image
        Me.toolBtnSelect.Image = Global.BSP_Master.My.Resources.Resources.toolBtnSelect
        Me.toolBtnSelect.ImageTransparentColor = System.Drawing.Color.Magenta
        Me.toolBtnSelect.Name = "toolBtnSelect"
        Me.toolBtnSelect.Size = New System.Drawing.Size(21, 20)
        Me.toolBtnSelect.Text = "Select"
        Me.toolBtnSelect.ToolTipText = resources.GetString("toolBtnSelect.ToolTipText")
        '
        'toolBtnZoomIn
        '
        Me.toolBtnZoomIn.CheckOnClick = True
        Me.toolBtnZoomIn.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Image
        Me.toolBtnZoomIn.Image = Global.BSP_Master.My.Resources.Resources.toolBtnZoomIn
        Me.toolBtnZoomIn.ImageTransparentColor = System.Drawing.Color.Magenta
        Me.toolBtnZoomIn.Name = "toolBtnZoomIn"
        Me.toolBtnZoomIn.Size = New System.Drawing.Size(21, 20)
        Me.toolBtnZoomIn.Text = "Zoom In"
        Me.toolBtnZoomIn.ToolTipText = "Zoom In:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    Magnifies a selected area, filling the entire window."
        '
        'toolBtnZoomOut
        '
        Me.toolBtnZoomOut.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Image
        Me.toolBtnZoomOut.Image = Global.BSP_Master.My.Resources.Resources.toolBtnZoomOut
        Me.toolBtnZoomOut.ImageTransparentColor = System.Drawing.Color.Magenta
        Me.toolBtnZoomOut.Name = "toolBtnZoomOut"
        Me.toolBtnZoomOut.Size = New System.Drawing.Size(21, 20)
        Me.toolBtnZoomOut.Text = "Zoom Out"
        Me.toolBtnZoomOut.ToolTipText = "Zoom Out:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    Moves the camera back from the view 200%."
        '
        'toolBtnRefresh
        '
        Me.toolBtnRefresh.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Image
        Me.toolBtnRefresh.Image = CType(resources.GetObject("toolBtnRefresh.Image"), System.Drawing.Image)
        Me.toolBtnRefresh.ImageScaling = System.Windows.Forms.ToolStripItemImageScaling.None
        Me.toolBtnRefresh.ImageTransparentColor = System.Drawing.Color.Magenta
        Me.toolBtnRefresh.Name = "toolBtnRefresh"
        Me.toolBtnRefresh.Size = New System.Drawing.Size(21, 19)
        Me.toolBtnRefresh.Text = "Refresh"
        Me.toolBtnRefresh.ToolTipText = "Reresh:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    Refresh the view and redraws all updated" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "        and existing point" & _
            "s."
        '
        'toolBtnRestart
        '
        Me.toolBtnRestart.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Image
        Me.toolBtnRestart.Image = Global.BSP_Master.My.Resources.Resources.toolBtnRefresh
        Me.toolBtnRestart.ImageTransparentColor = System.Drawing.Color.Magenta
        Me.toolBtnRestart.Name = "toolBtnRestart"
        Me.toolBtnRestart.Size = New System.Drawing.Size(21, 20)
        Me.toolBtnRestart.Text = "Restart"
        Me.toolBtnRestart.ToolTipText = "Restart:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    Resets the view back to the way it was when you" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "        first load" & _
            "ed the map/collision, and refreshes it."
        '
        'toolBtnSettings
        '
        Me.toolBtnSettings.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Image
        Me.toolBtnSettings.Image = Global.BSP_Master.My.Resources.Resources.smallScroll
        Me.toolBtnSettings.ImageTransparentColor = System.Drawing.Color.Magenta
        Me.toolBtnSettings.Name = "toolBtnSettings"
        Me.toolBtnSettings.Size = New System.Drawing.Size(21, 20)
        Me.toolBtnSettings.Text = "Show Settings"
        Me.toolBtnSettings.ToolTipText = "Hide Settings/Show Settings:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    Hides or shows the settings and debug variables" & _
            "" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "        near the bottom of the form."
        '
        'toolBtnPointEditor
        '
        Me.toolBtnPointEditor.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Image
        Me.toolBtnPointEditor.Image = Global.BSP_Master.My.Resources.Resources.pointEditorSmall
        Me.toolBtnPointEditor.ImageTransparentColor = System.Drawing.Color.Magenta
        Me.toolBtnPointEditor.Name = "toolBtnPointEditor"
        Me.toolBtnPointEditor.Size = New System.Drawing.Size(21, 20)
        Me.toolBtnPointEditor.Text = "Point Editor"
        Me.toolBtnPointEditor.ToolTipText = "Point Editor:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    Shows the individual point editor window which" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "        allows" & _
            " you to edit the points by their values" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "        rather than their relative posi" & _
            "tion."
        '
        'toolBtnHideSide
        '
        Me.toolBtnHideSide.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Text
        Me.toolBtnHideSide.Image = Global.BSP_Master.My.Resources.Resources.toolBtnHelp
        Me.toolBtnHideSide.ImageTransparentColor = System.Drawing.Color.Magenta
        Me.toolBtnHideSide.Name = "toolBtnHideSide"
        Me.toolBtnHideSide.Size = New System.Drawing.Size(21, 17)
        Me.toolBtnHideSide.Text = "«"
        Me.toolBtnHideSide.ToolTipText = "Hide Side Menu:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    Hides the side menu from view."
        '
        'toolSeparator1
        '
        Me.toolSeparator1.Name = "toolSeparator1"
        Me.toolSeparator1.Size = New System.Drawing.Size(6, 25)
        '
        'toolTop
        '
        Me.toolTop.GripStyle = System.Windows.Forms.ToolStripGripStyle.Hidden
        Me.toolTop.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.toolBtnAbout, Me.toolBtnOpen, Me.toolBtnSave, Me.toolBtnOptions, Me.toolSeparator1, Me.toolBtnAdvanced})
        Me.toolTop.Location = New System.Drawing.Point(0, 0)
        Me.toolTop.Name = "toolTop"
        Me.toolTop.Size = New System.Drawing.Size(632, 25)
        Me.toolTop.TabIndex = 5
        Me.toolTop.Text = "Main Tool"
        '
        'toolBtnAbout
        '
        Me.toolBtnAbout.Alignment = System.Windows.Forms.ToolStripItemAlignment.Right
        Me.toolBtnAbout.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Image
        Me.toolBtnAbout.Image = Global.BSP_Master.My.Resources.Resources.toolBtnHelp
        Me.toolBtnAbout.ImageTransparentColor = System.Drawing.Color.Magenta
        Me.toolBtnAbout.Name = "toolBtnAbout"
        Me.toolBtnAbout.Size = New System.Drawing.Size(23, 22)
        Me.toolBtnAbout.Text = "About"
        Me.toolBtnAbout.TextImageRelation = System.Windows.Forms.TextImageRelation.TextBeforeImage
        Me.toolBtnAbout.ToolTipText = "About:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    Displays additional information about the program."
        '
        'toolBtnOpen
        '
        Me.toolBtnOpen.DropDownItems.AddRange(New System.Windows.Forms.ToolStripItem() {Me.menuBtnOpenMap, Me.menuBtnOpenCollision})
        Me.toolBtnOpen.Image = Global.BSP_Master.My.Resources.Resources.toolBtnOpen
        Me.toolBtnOpen.ImageTransparentColor = System.Drawing.Color.Magenta
        Me.toolBtnOpen.Name = "toolBtnOpen"
        Me.toolBtnOpen.Size = New System.Drawing.Size(62, 22)
        Me.toolBtnOpen.Text = "Open"
        Me.toolBtnOpen.ToolTipText = "Open:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    Open a .map file, or a .obj collision file."
        '
        'menuBtnOpenMap
        '
        Me.menuBtnOpenMap.Image = Global.BSP_Master.My.Resources.Resources.toolBtnOpen
        Me.menuBtnOpenMap.ImageScaling = System.Windows.Forms.ToolStripItemImageScaling.None
        Me.menuBtnOpenMap.ImageTransparentColor = System.Drawing.Color.Magenta
        Me.menuBtnOpenMap.Name = "menuBtnOpenMap"
        Me.menuBtnOpenMap.Size = New System.Drawing.Size(152, 22)
        Me.menuBtnOpenMap.Text = "Open Map"
        Me.menuBtnOpenMap.ToolTipText = "Open Map:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    Click this to open a Halo 2 .map file of your choice."
        '
        'menuBtnOpenCollision
        '
        Me.menuBtnOpenCollision.Image = Global.BSP_Master.My.Resources.Resources.toolBtnOpen
        Me.menuBtnOpenCollision.ImageScaling = System.Windows.Forms.ToolStripItemImageScaling.None
        Me.menuBtnOpenCollision.ImageTransparentColor = System.Drawing.Color.Magenta
        Me.menuBtnOpenCollision.Name = "menuBtnOpenCollision"
        Me.menuBtnOpenCollision.Size = New System.Drawing.Size(152, 22)
        Me.menuBtnOpenCollision.Text = "Open Collision"
        Me.menuBtnOpenCollision.ToolTipText = "Open Collision:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    Click this to open a .obj file of your choice as collision."
        '
        'toolBtnSave
        '
        Me.toolBtnSave.DropDownItems.AddRange(New System.Windows.Forms.ToolStripItem() {Me.menuBtnSaveMap, Me.menuBtnSaveMapAs, Me.menuSeperator0, Me.menuBtnSaveCollision, Me.menuBtnSaveCollisionAs})
        Me.toolBtnSave.Image = Global.BSP_Master.My.Resources.Resources.toolBtnSave
        Me.toolBtnSave.ImageTransparentColor = System.Drawing.Color.Magenta
        Me.toolBtnSave.Name = "toolBtnSave"
        Me.toolBtnSave.Size = New System.Drawing.Size(60, 22)
        Me.toolBtnSave.Text = "Save"
        Me.toolBtnSave.ToolTipText = "Save:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    Saves these points to a .map, or .obj collision file."
        '
        'menuBtnSaveMap
        '
        Me.menuBtnSaveMap.Image = Global.BSP_Master.My.Resources.Resources.toolBtnSave
        Me.menuBtnSaveMap.Name = "menuBtnSaveMap"
        Me.menuBtnSaveMap.Size = New System.Drawing.Size(177, 22)
        Me.menuBtnSaveMap.Text = "Save Map"
        Me.menuBtnSaveMap.ToolTipText = "Save Map:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    Allows you to save the .map to the same location," & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "        overwri" & _
            "ting the existing one. (Must have a map" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "        currently open)."
        '
        'menuBtnSaveMapAs
        '
        Me.menuBtnSaveMapAs.Image = Global.BSP_Master.My.Resources.Resources.toolBtnSave
        Me.menuBtnSaveMapAs.Name = "menuBtnSaveMapAs"
        Me.menuBtnSaveMapAs.Size = New System.Drawing.Size(177, 22)
        Me.menuBtnSaveMapAs.Text = "Save Map As..."
        Me.menuBtnSaveMapAs.ToolTipText = "Save Map As:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    Allows you to save the .map to a new location" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "        if you h" & _
            "ave opened one."
        '
        'menuSeperator0
        '
        Me.menuSeperator0.Name = "menuSeperator0"
        Me.menuSeperator0.Size = New System.Drawing.Size(174, 6)
        '
        'menuBtnSaveCollision
        '
        Me.menuBtnSaveCollision.Image = Global.BSP_Master.My.Resources.Resources.toolBtnSave
        Me.menuBtnSaveCollision.Name = "menuBtnSaveCollision"
        Me.menuBtnSaveCollision.Size = New System.Drawing.Size(177, 22)
        Me.menuBtnSaveCollision.Text = "Save Collision"
        Me.menuBtnSaveCollision.ToolTipText = "Save Collision:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    Saves the collision vertices as a .obj if you have" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    open" & _
            "ed a .map or .obj collision file."
        '
        'menuBtnSaveCollisionAs
        '
        Me.menuBtnSaveCollisionAs.Image = Global.BSP_Master.My.Resources.Resources.toolBtnSave
        Me.menuBtnSaveCollisionAs.Name = "menuBtnSaveCollisionAs"
        Me.menuBtnSaveCollisionAs.Size = New System.Drawing.Size(177, 22)
        Me.menuBtnSaveCollisionAs.Text = "Save Collision As..."
        Me.menuBtnSaveCollisionAs.ToolTipText = "Save Collision As:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    Allows you to save the collision as a .obj to a" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "        " & _
            "new location if you have a .map or a collision" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "        .obj open."
        '
        'toolBtnOptions
        '
        Me.toolBtnOptions.DropDownItems.AddRange(New System.Windows.Forms.ToolStripItem() {Me.toolLblDrawType, Me.toolLblDrawMode, Me.toolLblPrecision, Me.toolBtnMoreOptions})
        Me.toolBtnOptions.Image = Global.BSP_Master.My.Resources.Resources.toolBtnAdvanced
        Me.toolBtnOptions.ImageTransparentColor = System.Drawing.Color.Magenta
        Me.toolBtnOptions.Name = "toolBtnOptions"
        Me.toolBtnOptions.Size = New System.Drawing.Size(73, 22)
        Me.toolBtnOptions.Text = "Options"
        Me.toolBtnOptions.ToolTipText = "Options:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    Allows you to change the default settings of the" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "        program t" & _
            "o suit your preferences."
        '
        'toolLblDrawType
        '
        Me.toolLblDrawType.Alignment = System.Windows.Forms.ToolStripItemAlignment.Right
        Me.toolLblDrawType.DropDownItems.AddRange(New System.Windows.Forms.ToolStripItem() {Me.toolComboDrawType})
        Me.toolLblDrawType.Name = "toolLblDrawType"
        Me.toolLblDrawType.Size = New System.Drawing.Size(161, 22)
        Me.toolLblDrawType.Text = "Draw Type:"
        Me.toolLblDrawType.ToolTipText = "Draw Type:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    Allows you to control what type of vertices are drawn."
        '
        'toolComboDrawType
        '
        Me.toolComboDrawType.Alignment = System.Windows.Forms.ToolStripItemAlignment.Right
        Me.toolComboDrawType.DropDownStyle = System.Windows.Forms.ComboBoxStyle.DropDownList
        Me.toolComboDrawType.Items.AddRange(New Object() {"Both", "Collision", "Mesh"})
        Me.toolComboDrawType.Name = "toolComboDrawType"
        Me.toolComboDrawType.Size = New System.Drawing.Size(100, 21)
        Me.toolComboDrawType.ToolTipText = resources.GetString("toolComboDrawType.ToolTipText")
        '
        'toolLblDrawMode
        '
        Me.toolLblDrawMode.Alignment = System.Windows.Forms.ToolStripItemAlignment.Right
        Me.toolLblDrawMode.DropDownItems.AddRange(New System.Windows.Forms.ToolStripItem() {Me.toolComboDrawMode})
        Me.toolLblDrawMode.Name = "toolLblDrawMode"
        Me.toolLblDrawMode.Size = New System.Drawing.Size(161, 22)
        Me.toolLblDrawMode.Text = "Draw Mode:"
        Me.toolLblDrawMode.ToolTipText = "Draw Mode:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    Allows you to change the mode in which these vertices are drawn."
        '
        'toolComboDrawMode
        '
        Me.toolComboDrawMode.Alignment = System.Windows.Forms.ToolStripItemAlignment.Right
        Me.toolComboDrawMode.DropDownStyle = System.Windows.Forms.ComboBoxStyle.DropDownList
        Me.toolComboDrawMode.DropDownWidth = 75
        Me.toolComboDrawMode.Items.AddRange(New Object() {"Depth", "Sketch", "Overlay", "Area", "Artistic Circles", "Labels"})
        Me.toolComboDrawMode.Name = "toolComboDrawMode"
        Me.toolComboDrawMode.Size = New System.Drawing.Size(100, 21)
        Me.toolComboDrawMode.ToolTipText = resources.GetString("toolComboDrawMode.ToolTipText")
        '
        'toolLblPrecision
        '
        Me.toolLblPrecision.Alignment = System.Windows.Forms.ToolStripItemAlignment.Right
        Me.toolLblPrecision.DropDownItems.AddRange(New System.Windows.Forms.ToolStripItem() {Me.toolComboPrecision})
        Me.toolLblPrecision.Name = "toolLblPrecision"
        Me.toolLblPrecision.Size = New System.Drawing.Size(161, 22)
        Me.toolLblPrecision.Text = "Precision:"
        Me.toolLblPrecision.ToolTipText = resources.GetString("toolLblPrecision.ToolTipText")
        '
        'toolComboPrecision
        '
        Me.toolComboPrecision.Alignment = System.Windows.Forms.ToolStripItemAlignment.Right
        Me.toolComboPrecision.DropDownStyle = System.Windows.Forms.ComboBoxStyle.DropDownList
        Me.toolComboPrecision.DropDownWidth = 24
        Me.toolComboPrecision.Items.AddRange(New Object() {"10", "9", "8", "7", "6", "5", "4", "3", "2", "1"})
        Me.toolComboPrecision.Name = "toolComboPrecision"
        Me.toolComboPrecision.Size = New System.Drawing.Size(100, 21)
        Me.toolComboPrecision.ToolTipText = "Precision Number:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    10 - Best quality, slowest rendering speed." & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    5 - Bad q" & _
            "uality, fast rendering speed." & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    1 - Worse quality, fastest rendering speed."
        '
        'toolBtnMoreOptions
        '
        Me.toolBtnMoreOptions.Image = Global.BSP_Master.My.Resources.Resources.toolBtnAdvanced
        Me.toolBtnMoreOptions.ImageTransparentColor = System.Drawing.Color.Magenta
        Me.toolBtnMoreOptions.Name = "toolBtnMoreOptions"
        Me.toolBtnMoreOptions.Size = New System.Drawing.Size(161, 22)
        Me.toolBtnMoreOptions.Text = "More Options..."
        Me.toolBtnMoreOptions.ToolTipText = "More Options:" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "    Allows you to change more aspects of the" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "        program that" & _
            " don't affect the render, but" & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "        change other permanent preferences."
        '
        'toolBtnAdvanced
        '
        Me.toolBtnAdvanced.Image = Global.BSP_Master.My.Resources.Resources.open
        Me.toolBtnAdvanced.ImageScaling = System.Windows.Forms.ToolStripItemImageScaling.None
        Me.toolBtnAdvanced.ImageTransparentColor = System.Drawing.Color.Magenta
        Me.toolBtnAdvanced.Name = "toolBtnAdvanced"
        Me.toolBtnAdvanced.Size = New System.Drawing.Size(82, 22)
        Me.toolBtnAdvanced.Text = "Advanced"
        Me.toolBtnAdvanced.ToolTipText = resources.GetString("toolBtnAdvanced.ToolTipText")
        '
        'grpPointEditor
        '
        Me.grpPointEditor.Controls.Add(Me.cboxUseColorCoding)
        Me.grpPointEditor.Controls.Add(Me.cboxShowMeshPoints)
        Me.grpPointEditor.Location = New System.Drawing.Point(27, 325)
        Me.grpPointEditor.Name = "grpPointEditor"
        Me.grpPointEditor.Size = New System.Drawing.Size(182, 65)
        Me.grpPointEditor.TabIndex = 14
        Me.grpPointEditor.TabStop = False
        Me.grpPointEditor.Text = "Point Editor"
        Me.grpPointEditor.Visible = False
        '
        'cboxUseColorCoding
        '
        Me.cboxUseColorCoding.AutoSize = True
        Me.cboxUseColorCoding.Location = New System.Drawing.Point(6, 42)
        Me.cboxUseColorCoding.Name = "cboxUseColorCoding"
        Me.cboxUseColorCoding.Size = New System.Drawing.Size(108, 17)
        Me.cboxUseColorCoding.TabIndex = 1
        Me.cboxUseColorCoding.Text = "Use Color Coding"
        Me.cboxUseColorCoding.UseVisualStyleBackColor = True
        '
        'cboxShowMeshPoints
        '
        Me.cboxShowMeshPoints.AutoSize = True
        Me.cboxShowMeshPoints.Location = New System.Drawing.Point(6, 19)
        Me.cboxShowMeshPoints.Name = "cboxShowMeshPoints"
        Me.cboxShowMeshPoints.Size = New System.Drawing.Size(114, 17)
        Me.cboxShowMeshPoints.TabIndex = 0
        Me.cboxShowMeshPoints.Text = "Show Mesh Points"
        Me.cboxShowMeshPoints.UseVisualStyleBackColor = True
        '
        'grpMainWindow
        '
        Me.grpMainWindow.BackColor = System.Drawing.Color.White
        Me.grpMainWindow.Controls.Add(Me.cboxConstrain)
        Me.grpMainWindow.Controls.Add(Me.lblMoveSizeV)
        Me.grpMainWindow.Controls.Add(Me.numMoveSizeH)
        Me.grpMainWindow.Controls.Add(Me.lblMoveSizeH)
        Me.grpMainWindow.Controls.Add(Me.numMoveSizeW)
        Me.grpMainWindow.Controls.Add(Me.comboDblClick)
        Me.grpMainWindow.Controls.Add(Me.cboxMaximize)
        Me.grpMainWindow.Controls.Add(Me.lblDoubleClick)
        Me.grpMainWindow.Controls.Add(Me.cboxDrawMove)
        Me.grpMainWindow.Controls.Add(Me.cboxAntiAlias)
        Me.grpMainWindow.Controls.Add(Me.cboxShowToolTips)
        Me.grpMainWindow.Controls.Add(Me.cboxAlwaysOnTop)
        Me.grpMainWindow.Location = New System.Drawing.Point(27, 28)
        Me.grpMainWindow.Name = "grpMainWindow"
        Me.grpMainWindow.Size = New System.Drawing.Size(182, 291)
        Me.grpMainWindow.TabIndex = 13
        Me.grpMainWindow.TabStop = False
        Me.grpMainWindow.Text = "Main Window"
        Me.grpMainWindow.Visible = False
        '
        'cboxConstrain
        '
        Me.cboxConstrain.AutoSize = True
        Me.cboxConstrain.Location = New System.Drawing.Point(6, 268)
        Me.cboxConstrain.Name = "cboxConstrain"
        Me.cboxConstrain.Size = New System.Drawing.Size(126, 17)
        Me.cboxConstrain.TabIndex = 17
        Me.cboxConstrain.Text = "Constrain Proportions"
        Me.cboxConstrain.UseVisualStyleBackColor = True
        '
        'lblMoveSizeV
        '
        Me.lblMoveSizeV.AutoSize = True
        Me.lblMoveSizeV.Location = New System.Drawing.Point(6, 226)
        Me.lblMoveSizeV.Name = "lblMoveSizeV"
        Me.lblMoveSizeV.Size = New System.Drawing.Size(100, 13)
        Me.lblMoveSizeV.TabIndex = 19
        Me.lblMoveSizeV.Text = "Move Size - Height:"
        '
        'numMoveSizeH
        '
        Me.numMoveSizeH.BackColor = System.Drawing.SystemColors.Window
        Me.numMoveSizeH.Location = New System.Drawing.Point(6, 242)
        Me.numMoveSizeH.Maximum = New Decimal(New Integer() {510, 0, 0, 0})
        Me.numMoveSizeH.Minimum = New Decimal(New Integer() {4, 0, 0, 0})
        Me.numMoveSizeH.Name = "numMoveSizeH"
        Me.numMoveSizeH.Size = New System.Drawing.Size(170, 20)
        Me.numMoveSizeH.TabIndex = 18
        Me.numMoveSizeH.TextAlign = System.Windows.Forms.HorizontalAlignment.Right
        Me.numMoveSizeH.Value = New Decimal(New Integer() {48, 0, 0, 0})
        '
        'lblMoveSizeH
        '
        Me.lblMoveSizeH.AutoSize = True
        Me.lblMoveSizeH.Location = New System.Drawing.Point(6, 187)
        Me.lblMoveSizeH.Name = "lblMoveSizeH"
        Me.lblMoveSizeH.Size = New System.Drawing.Size(97, 13)
        Me.lblMoveSizeH.TabIndex = 17
        Me.lblMoveSizeH.Text = "Move Size - Width:"
        '
        'numMoveSizeW
        '
        Me.numMoveSizeW.BackColor = System.Drawing.SystemColors.Window
        Me.numMoveSizeW.Location = New System.Drawing.Point(6, 203)
        Me.numMoveSizeW.Maximum = New Decimal(New Integer() {510, 0, 0, 0})
        Me.numMoveSizeW.Minimum = New Decimal(New Integer() {4, 0, 0, 0})
        Me.numMoveSizeW.Name = "numMoveSizeW"
        Me.numMoveSizeW.Size = New System.Drawing.Size(170, 20)
        Me.numMoveSizeW.TabIndex = 16
        Me.numMoveSizeW.TextAlign = System.Windows.Forms.HorizontalAlignment.Right
        Me.numMoveSizeW.Value = New Decimal(New Integer() {48, 0, 0, 0})
        '
        'comboDblClick
        '
        Me.comboDblClick.DropDownStyle = System.Windows.Forms.ComboBoxStyle.DropDownList
        Me.comboDblClick.FormattingEnabled = True
        Me.comboDblClick.Items.AddRange(New Object() {"Open Map", "Open Collision", "Save Map", "Save Collision", "Restart", "Refresh", "Hide/Show Softness", "Hide/Show Side Menu", "Hide/Show Side & Softness", "Open Point Editor", "Open Advanced Window", "Open Options Window"})
        Me.comboDblClick.Location = New System.Drawing.Point(6, 155)
        Me.comboDblClick.Name = "comboDblClick"
        Me.comboDblClick.Size = New System.Drawing.Size(170, 21)
        Me.comboDblClick.TabIndex = 15
        '
        'cboxMaximize
        '
        Me.cboxMaximize.AutoSize = True
        Me.cboxMaximize.Location = New System.Drawing.Point(6, 111)
        Me.cboxMaximize.Name = "cboxMaximize"
        Me.cboxMaximize.Size = New System.Drawing.Size(121, 17)
        Me.cboxMaximize.TabIndex = 8
        Me.cboxMaximize.Text = "Maximize on Startup"
        Me.cboxMaximize.UseVisualStyleBackColor = True
        '
        'lblDoubleClick
        '
        Me.lblDoubleClick.AutoSize = True
        Me.lblDoubleClick.Location = New System.Drawing.Point(6, 139)
        Me.lblDoubleClick.Name = "lblDoubleClick"
        Me.lblDoubleClick.Size = New System.Drawing.Size(145, 13)
        Me.lblDoubleClick.TabIndex = 7
        Me.lblDoubleClick.Text = "Window Double Click Action:"
        '
        'cboxDrawMove
        '
        Me.cboxDrawMove.AutoSize = True
        Me.cboxDrawMove.Location = New System.Drawing.Point(6, 88)
        Me.cboxDrawMove.Name = "cboxDrawMove"
        Me.cboxDrawMove.Size = New System.Drawing.Size(133, 17)
        Me.cboxDrawMove.TabIndex = 5
        Me.cboxDrawMove.Text = "Draw Move Rectangle"
        Me.cboxDrawMove.UseVisualStyleBackColor = True
        '
        'cboxAntiAlias
        '
        Me.cboxAntiAlias.AutoSize = True
        Me.cboxAntiAlias.Location = New System.Drawing.Point(6, 65)
        Me.cboxAntiAlias.Name = "cboxAntiAlias"
        Me.cboxAntiAlias.Size = New System.Drawing.Size(121, 17)
        Me.cboxAntiAlias.TabIndex = 4
        Me.cboxAntiAlias.Text = "Anti-Alias Rendering"
        Me.cboxAntiAlias.UseVisualStyleBackColor = True
        '
        'cboxShowToolTips
        '
        Me.cboxShowToolTips.AutoSize = True
        Me.cboxShowToolTips.Location = New System.Drawing.Point(6, 19)
        Me.cboxShowToolTips.Name = "cboxShowToolTips"
        Me.cboxShowToolTips.Size = New System.Drawing.Size(127, 17)
        Me.cboxShowToolTips.TabIndex = 0
        Me.cboxShowToolTips.Text = "Show Menu ToolTips"
        Me.cboxShowToolTips.UseVisualStyleBackColor = True
        '
        'cboxAlwaysOnTop
        '
        Me.cboxAlwaysOnTop.AutoSize = True
        Me.cboxAlwaysOnTop.Location = New System.Drawing.Point(6, 42)
        Me.cboxAlwaysOnTop.Name = "cboxAlwaysOnTop"
        Me.cboxAlwaysOnTop.Size = New System.Drawing.Size(96, 17)
        Me.cboxAlwaysOnTop.TabIndex = 3
        Me.cboxAlwaysOnTop.Text = "Always on Top"
        Me.cboxAlwaysOnTop.UseVisualStyleBackColor = True
        '
        'btnOK
        '
        Me.btnOK.Location = New System.Drawing.Point(27, 396)
        Me.btnOK.Name = "btnOK"
        Me.btnOK.Size = New System.Drawing.Size(182, 23)
        Me.btnOK.TabIndex = 11
        Me.btnOK.Text = "OK"
        Me.btnOK.UseVisualStyleBackColor = True
        Me.btnOK.Visible = False
        '
        'lblPreview
        '
        Me.lblPreview.AutoSize = True
        Me.lblPreview.Location = New System.Drawing.Point(205, 254)
        Me.lblPreview.Name = "lblPreview"
        Me.lblPreview.Size = New System.Drawing.Size(104, 13)
        Me.lblPreview.TabIndex = 16
        Me.lblPreview.Text = ">----Size Preview---->"
        Me.lblPreview.Visible = False
        '
        'btnShowSide
        '
        Me.btnShowSide.FlatAppearance.BorderSize = 0
        Me.btnShowSide.FlatAppearance.MouseDownBackColor = System.Drawing.Color.Cyan
        Me.btnShowSide.FlatAppearance.MouseOverBackColor = System.Drawing.Color.LightGray
        Me.btnShowSide.FlatStyle = System.Windows.Forms.FlatStyle.Flat
        Me.btnShowSide.Location = New System.Drawing.Point(-7, 197)
        Me.btnShowSide.Name = "btnShowSide"
        Me.btnShowSide.Size = New System.Drawing.Size(19, 40)
        Me.btnShowSide.TabIndex = 17
        Me.btnShowSide.Text = "»"
        Me.btnShowSide.TextAlign = System.Drawing.ContentAlignment.MiddleLeft
        Me.btnShowSide.UseVisualStyleBackColor = False
        '
        'timDashSpin
        '
        '
        'picPreview
        '
        Me.picPreview.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle
        Me.picPreview.Cursor = System.Windows.Forms.Cursors.SizeAll
        Me.picPreview.Image = Global.BSP_Master.My.Resources.Resources.yinYangFull
        Me.picPreview.Location = New System.Drawing.Point(304, 249)
        Me.picPreview.Name = "picPreview"
        Me.picPreview.Size = New System.Drawing.Size(24, 24)
        Me.picPreview.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage
        Me.picPreview.TabIndex = 15
        Me.picPreview.TabStop = False
        Me.picPreview.Visible = False
        '
        'lblLeakProtection
        '
        Me.lblLeakProtection.AutoSize = True
        Me.lblLeakProtection.Location = New System.Drawing.Point(27, 44)
        Me.lblLeakProtection.Name = "lblLeakProtection"
        Me.lblLeakProtection.Size = New System.Drawing.Size(581, 13)
        Me.lblLeakProtection.TabIndex = 18
        Me.lblLeakProtection.Text = "This program has been leaked. It was created by TheWandererLee. Please report lea" & _
            "kage to: webmaster@13willows.com"
        Me.lblLeakProtection.Visible = False
        '
        'webBeta
        '
        Me.webBeta.IsWebBrowserContextMenuEnabled = False
        Me.webBeta.Location = New System.Drawing.Point(1, 243)
        Me.webBeta.MinimumSize = New System.Drawing.Size(20, 20)
        Me.webBeta.Name = "webBeta"
        Me.webBeta.ScrollBarsEnabled = False
        Me.webBeta.Size = New System.Drawing.Size(20, 20)
        Me.webBeta.TabIndex = 19
        Me.webBeta.Visible = False
        '
        'formMain
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.BackColor = System.Drawing.Color.White
        Me.ClientSize = New System.Drawing.Size(632, 446)
        Me.ContextMenuStrip = Me.contextMain
        Me.Controls.Add(Me.webBeta)
        Me.Controls.Add(Me.lblLeakProtection)
        Me.Controls.Add(Me.toolSide)
        Me.Controls.Add(Me.toolTop)
        Me.Controls.Add(Me.statusMain)
        Me.Controls.Add(Me.lblSoftness)
        Me.Controls.Add(Me.picPreview)
        Me.Controls.Add(Me.trackSoftness)
        Me.Controls.Add(Me.grpPointEditor)
        Me.Controls.Add(Me.grpMainWindow)
        Me.Controls.Add(Me.lblPreview)
        Me.Controls.Add(Me.btnOK)
        Me.Controls.Add(Me.btnShowSide)
        Me.Icon = CType(resources.GetObject("$this.Icon"), System.Drawing.Icon)
        Me.Name = "formMain"
        Me.Text = "BSP Master"
        Me.WindowState = System.Windows.Forms.FormWindowState.Maximized
        Me.contextMain.ResumeLayout(False)
        CType(Me.trackSoftness, System.ComponentModel.ISupportInitialize).EndInit()
        Me.contextSoftness.ResumeLayout(False)
        Me.statusMain.ResumeLayout(False)
        Me.statusMain.PerformLayout()
        Me.toolSide.ResumeLayout(False)
        Me.toolSide.PerformLayout()
        Me.toolTop.ResumeLayout(False)
        Me.toolTop.PerformLayout()
        Me.grpPointEditor.ResumeLayout(False)
        Me.grpPointEditor.PerformLayout()
        Me.grpMainWindow.ResumeLayout(False)
        Me.grpMainWindow.PerformLayout()
        CType(Me.numMoveSizeH, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.numMoveSizeW, System.ComponentModel.ISupportInitialize).EndInit()
        CType(Me.picPreview, System.ComponentModel.ISupportInitialize).EndInit()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents contextMain As System.Windows.Forms.ContextMenuStrip
    Friend WithEvents openFileOBJ As System.Windows.Forms.OpenFileDialog
    Friend WithEvents statusLblX As System.Windows.Forms.ToolStripStatusLabel
    Friend WithEvents statusLblY As System.Windows.Forms.ToolStripStatusLabel
    Friend WithEvents statusProgMain As System.Windows.Forms.ToolStripProgressBar
    Friend WithEvents statusLblOffset As System.Windows.Forms.ToolStripStatusLabel
    Friend WithEvents statusLblMin As System.Windows.Forms.ToolStripStatusLabel
    Friend WithEvents statusLblMax As System.Windows.Forms.ToolStripStatusLabel
    Friend WithEvents statusLblZoom As System.Windows.Forms.ToolStripStatusLabel
    Friend WithEvents conBtnRestart As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents trackSoftness As System.Windows.Forms.TrackBar
    Friend WithEvents lblSoftness As System.Windows.Forms.Label
    Friend WithEvents statusMain As System.Windows.Forms.StatusStrip
    Friend WithEvents saveFileOBJ As System.Windows.Forms.SaveFileDialog
    Friend WithEvents openFileMap As System.Windows.Forms.OpenFileDialog
    Friend WithEvents conBtnOpenMap As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents conSeperator0 As System.Windows.Forms.ToolStripSeparator
    Friend WithEvents conBtnSaveMap As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents conBtnSaveMapAs As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents saveFileMap As System.Windows.Forms.SaveFileDialog
    Friend WithEvents conBtnRefresh As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents toolSide As System.Windows.Forms.ToolStrip
    Friend WithEvents toolBtnSelect As System.Windows.Forms.ToolStripButton
    Friend WithEvents toolBtnZoomIn As System.Windows.Forms.ToolStripButton
    Friend WithEvents toolBtnRefresh As System.Windows.Forms.ToolStripButton
    Friend WithEvents toolBtnRestart As System.Windows.Forms.ToolStripButton
    Friend WithEvents toolBtnPointEditor As System.Windows.Forms.ToolStripButton
    Friend WithEvents toolBtnAbout As System.Windows.Forms.ToolStripButton
    Friend WithEvents toolSeparator1 As System.Windows.Forms.ToolStripSeparator
    Friend WithEvents toolTop As System.Windows.Forms.ToolStrip
    Friend WithEvents toolBtnOpen As System.Windows.Forms.ToolStripDropDownButton
    Friend WithEvents menuBtnOpenMap As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnOpenCollision As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents toolBtnSave As System.Windows.Forms.ToolStripDropDownButton
    Friend WithEvents menuBtnSaveMap As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnSaveMapAs As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuSeperator0 As System.Windows.Forms.ToolStripSeparator
    Friend WithEvents menuBtnSaveCollision As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents menuBtnSaveCollisionAs As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents toolBtnAdvanced As System.Windows.Forms.ToolStripButton
    Friend WithEvents toolBtnSettings As System.Windows.Forms.ToolStripButton
    Friend WithEvents contextSoftness As System.Windows.Forms.ContextMenuStrip
    Friend WithEvents conBtnResetSoftness As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents toolBtnHideSide As System.Windows.Forms.ToolStripButton
    Friend WithEvents toolBtnOptions As System.Windows.Forms.ToolStripDropDownButton
    Friend WithEvents toolLblDrawType As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents toolComboDrawType As System.Windows.Forms.ToolStripComboBox
    Friend WithEvents toolLblDrawMode As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents toolComboDrawMode As System.Windows.Forms.ToolStripComboBox
    Friend WithEvents toolLblPrecision As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents toolComboPrecision As System.Windows.Forms.ToolStripComboBox
    Friend WithEvents toolBtnMoreOptions As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents toolBtnMove As System.Windows.Forms.ToolStripButton
    Friend WithEvents grpPointEditor As System.Windows.Forms.GroupBox
    Friend WithEvents cboxShowMeshPoints As System.Windows.Forms.CheckBox
    Friend WithEvents grpMainWindow As System.Windows.Forms.GroupBox
    Friend WithEvents cboxMaximize As System.Windows.Forms.CheckBox
    Friend WithEvents lblDoubleClick As System.Windows.Forms.Label
    Friend WithEvents cboxDrawMove As System.Windows.Forms.CheckBox
    Friend WithEvents cboxAntiAlias As System.Windows.Forms.CheckBox
    Friend WithEvents cboxShowToolTips As System.Windows.Forms.CheckBox
    Friend WithEvents cboxAlwaysOnTop As System.Windows.Forms.CheckBox
    Friend WithEvents btnOK As System.Windows.Forms.Button
    Friend WithEvents comboDblClick As System.Windows.Forms.ComboBox
    Friend WithEvents numMoveSizeW As System.Windows.Forms.NumericUpDown
    Friend WithEvents lblMoveSizeH As System.Windows.Forms.Label
    Friend WithEvents picPreview As System.Windows.Forms.PictureBox
    Friend WithEvents lblPreview As System.Windows.Forms.Label
    Friend WithEvents lblMoveSizeV As System.Windows.Forms.Label
    Friend WithEvents numMoveSizeH As System.Windows.Forms.NumericUpDown
    Friend WithEvents cboxConstrain As System.Windows.Forms.CheckBox
    Friend WithEvents cboxUseColorCoding As System.Windows.Forms.CheckBox
    Friend WithEvents toolBtnZoomOut As System.Windows.Forms.ToolStripButton
    Friend WithEvents btnShowSide As System.Windows.Forms.Button
    Friend WithEvents timDashSpin As System.Windows.Forms.Timer
    Friend WithEvents lblLeakProtection As System.Windows.Forms.Label
    Friend WithEvents webBeta As System.Windows.Forms.WebBrowser
End Class
