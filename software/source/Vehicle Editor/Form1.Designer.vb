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
        Me.lblIndexMagic = New System.Windows.Forms.Label
        Me.lblMapMagic = New System.Windows.Forms.Label
        Me.lblIndexHeader = New System.Windows.Forms.Label
        Me.lblFileSize = New System.Windows.Forms.Label
        Me.btnOpenMap = New System.Windows.Forms.Button
        Me.comboVehicles = New System.Windows.Forms.ComboBox
        Me.lblVehicles = New System.Windows.Forms.Label
        Me.lblSVName = New System.Windows.Forms.Label
        Me.lblSVOffset = New System.Windows.Forms.Label
        Me.grpSelectedVehicle = New System.Windows.Forms.GroupBox
        Me.lblWarthogOnly3 = New System.Windows.Forms.Label
        Me.lblWarthogOnly2 = New System.Windows.Forms.Label
        Me.lblWarthogOnly = New System.Windows.Forms.Label
        Me.cboxEnableHUD = New System.Windows.Forms.CheckBox
        Me.cboxFireWeapon = New System.Windows.Forms.CheckBox
        Me.cboxAllFlying = New System.Windows.Forms.CheckBox
        Me.cboxFlying = New System.Windows.Forms.CheckBox
        Me.lblMapName = New System.Windows.Forms.Label
        Me.btnSaveMap = New System.Windows.Forms.Button
        Me.openFileMain = New System.Windows.Forms.OpenFileDialog
        Me.lblMapSaved = New System.Windows.Forms.Label
        Me.timerAfterSave = New System.Windows.Forms.Timer(Me.components)
        Me.grpSelectedVehicle.SuspendLayout()
        Me.SuspendLayout()
        '
        'lblIndexMagic
        '
        Me.lblIndexMagic.AutoSize = True
        Me.lblIndexMagic.Location = New System.Drawing.Point(18, 174)
        Me.lblIndexMagic.Name = "lblIndexMagic"
        Me.lblIndexMagic.Size = New System.Drawing.Size(68, 13)
        Me.lblIndexMagic.TabIndex = 0
        Me.lblIndexMagic.Text = "Index Magic:"
        '
        'lblMapMagic
        '
        Me.lblMapMagic.AutoSize = True
        Me.lblMapMagic.Location = New System.Drawing.Point(23, 187)
        Me.lblMapMagic.Name = "lblMapMagic"
        Me.lblMapMagic.Size = New System.Drawing.Size(63, 13)
        Me.lblMapMagic.TabIndex = 1
        Me.lblMapMagic.Text = "Map Magic:"
        '
        'lblIndexHeader
        '
        Me.lblIndexHeader.AutoSize = True
        Me.lblIndexHeader.Location = New System.Drawing.Point(12, 161)
        Me.lblIndexHeader.Name = "lblIndexHeader"
        Me.lblIndexHeader.Size = New System.Drawing.Size(74, 13)
        Me.lblIndexHeader.TabIndex = 2
        Me.lblIndexHeader.Text = "Index Header:"
        '
        'lblFileSize
        '
        Me.lblFileSize.AutoSize = True
        Me.lblFileSize.Location = New System.Drawing.Point(201, 161)
        Me.lblFileSize.Name = "lblFileSize"
        Me.lblFileSize.Size = New System.Drawing.Size(49, 13)
        Me.lblFileSize.TabIndex = 3
        Me.lblFileSize.Text = "File Size:"
        '
        'btnOpenMap
        '
        Me.btnOpenMap.Location = New System.Drawing.Point(12, 12)
        Me.btnOpenMap.Name = "btnOpenMap"
        Me.btnOpenMap.Size = New System.Drawing.Size(75, 23)
        Me.btnOpenMap.TabIndex = 5
        Me.btnOpenMap.Text = "Open Map"
        '
        'comboVehicles
        '
        Me.comboVehicles.DropDownStyle = System.Windows.Forms.ComboBoxStyle.DropDownList
        Me.comboVehicles.Enabled = False
        Me.comboVehicles.FormattingEnabled = True
        Me.comboVehicles.Items.AddRange(New Object() {"No Map Opened"})
        Me.comboVehicles.Location = New System.Drawing.Point(12, 41)
        Me.comboVehicles.MaxDropDownItems = 100
        Me.comboVehicles.Name = "comboVehicles"
        Me.comboVehicles.Size = New System.Drawing.Size(306, 21)
        Me.comboVehicles.TabIndex = 6
        Me.comboVehicles.Visible = False
        '
        'lblVehicles
        '
        Me.lblVehicles.AutoSize = True
        Me.lblVehicles.Location = New System.Drawing.Point(200, 187)
        Me.lblVehicles.Name = "lblVehicles"
        Me.lblVehicles.Size = New System.Drawing.Size(50, 13)
        Me.lblVehicles.TabIndex = 7
        Me.lblVehicles.Text = "Vehicles:"
        '
        'lblSVName
        '
        Me.lblSVName.AutoSize = True
        Me.lblSVName.Location = New System.Drawing.Point(6, 16)
        Me.lblSVName.Name = "lblSVName"
        Me.lblSVName.Size = New System.Drawing.Size(38, 13)
        Me.lblSVName.TabIndex = 8
        Me.lblSVName.Text = "Name:"
        '
        'lblSVOffset
        '
        Me.lblSVOffset.AutoSize = True
        Me.lblSVOffset.Location = New System.Drawing.Point(6, 29)
        Me.lblSVOffset.Name = "lblSVOffset"
        Me.lblSVOffset.Size = New System.Drawing.Size(73, 13)
        Me.lblSVOffset.TabIndex = 9
        Me.lblSVOffset.Text = "Offset in Map:"
        '
        'grpSelectedVehicle
        '
        Me.grpSelectedVehicle.Controls.Add(Me.lblWarthogOnly3)
        Me.grpSelectedVehicle.Controls.Add(Me.lblWarthogOnly2)
        Me.grpSelectedVehicle.Controls.Add(Me.lblWarthogOnly)
        Me.grpSelectedVehicle.Controls.Add(Me.cboxEnableHUD)
        Me.grpSelectedVehicle.Controls.Add(Me.cboxFireWeapon)
        Me.grpSelectedVehicle.Controls.Add(Me.cboxAllFlying)
        Me.grpSelectedVehicle.Controls.Add(Me.cboxFlying)
        Me.grpSelectedVehicle.Controls.Add(Me.lblSVName)
        Me.grpSelectedVehicle.Controls.Add(Me.lblSVOffset)
        Me.grpSelectedVehicle.Location = New System.Drawing.Point(12, 68)
        Me.grpSelectedVehicle.Name = "grpSelectedVehicle"
        Me.grpSelectedVehicle.RightToLeft = System.Windows.Forms.RightToLeft.No
        Me.grpSelectedVehicle.Size = New System.Drawing.Size(306, 90)
        Me.grpSelectedVehicle.TabIndex = 10
        Me.grpSelectedVehicle.TabStop = False
        Me.grpSelectedVehicle.Text = "Selected Vehicle"
        '
        'lblWarthogOnly3
        '
        Me.lblWarthogOnly3.AutoSize = True
        Me.lblWarthogOnly3.Enabled = False
        Me.lblWarthogOnly3.Font = New System.Drawing.Font("Courier New", 14.25!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lblWarthogOnly3.Location = New System.Drawing.Point(138, 64)
        Me.lblWarthogOnly3.Name = "lblWarthogOnly3"
        Me.lblWarthogOnly3.Size = New System.Drawing.Size(142, 22)
        Me.lblWarthogOnly3.TabIndex = 18
        Me.lblWarthogOnly3.Text = "WARTHOG ONLY"
        Me.lblWarthogOnly3.Visible = False
        '
        'lblWarthogOnly2
        '
        Me.lblWarthogOnly2.AutoSize = True
        Me.lblWarthogOnly2.Enabled = False
        Me.lblWarthogOnly2.Font = New System.Drawing.Font("Courier New", 9.75!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lblWarthogOnly2.Location = New System.Drawing.Point(19, 68)
        Me.lblWarthogOnly2.Name = "lblWarthogOnly2"
        Me.lblWarthogOnly2.Size = New System.Drawing.Size(104, 16)
        Me.lblWarthogOnly2.TabIndex = 17
        Me.lblWarthogOnly2.Text = "WARTHOG ONLY"
        Me.lblWarthogOnly2.Visible = False
        '
        'lblWarthogOnly
        '
        Me.lblWarthogOnly.AutoSize = True
        Me.lblWarthogOnly.Enabled = False
        Me.lblWarthogOnly.Font = New System.Drawing.Font("Courier New", 9.0!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lblWarthogOnly.Location = New System.Drawing.Point(76, 45)
        Me.lblWarthogOnly.Name = "lblWarthogOnly"
        Me.lblWarthogOnly.Size = New System.Drawing.Size(92, 16)
        Me.lblWarthogOnly.TabIndex = 16
        Me.lblWarthogOnly.Text = "WARTHOG ONLY"
        Me.lblWarthogOnly.Visible = False
        '
        'cboxEnableHUD
        '
        Me.cboxEnableHUD.AutoSize = True
        Me.cboxEnableHUD.Enabled = False
        Me.cboxEnableHUD.Location = New System.Drawing.Point(123, 68)
        Me.cboxEnableHUD.Name = "cboxEnableHUD"
        Me.cboxEnableHUD.Size = New System.Drawing.Size(154, 17)
        Me.cboxEnableHUD.TabIndex = 15
        Me.cboxEnableHUD.Text = "Keep HUD on while driving"
        Me.cboxEnableHUD.Visible = False
        '
        'cboxFireWeapon
        '
        Me.cboxFireWeapon.AutoSize = True
        Me.cboxFireWeapon.Enabled = False
        Me.cboxFireWeapon.Location = New System.Drawing.Point(6, 68)
        Me.cboxFireWeapon.Name = "cboxFireWeapon"
        Me.cboxFireWeapon.Size = New System.Drawing.Size(115, 17)
        Me.cboxFireWeapon.TabIndex = 14
        Me.cboxFireWeapon.Text = "Shoot while driving"
        Me.cboxFireWeapon.Visible = False
        '
        'cboxAllFlying
        '
        Me.cboxAllFlying.AutoSize = True
        Me.cboxAllFlying.Enabled = False
        Me.cboxAllFlying.Location = New System.Drawing.Point(61, 45)
        Me.cboxAllFlying.Name = "cboxAllFlying"
        Me.cboxAllFlying.Size = New System.Drawing.Size(109, 17)
        Me.cboxAllFlying.TabIndex = 13
        Me.cboxAllFlying.Text = "Everyone Can Fly"
        Me.cboxAllFlying.Visible = False
        '
        'cboxFlying
        '
        Me.cboxFlying.AutoSize = True
        Me.cboxFlying.Enabled = False
        Me.cboxFlying.Location = New System.Drawing.Point(6, 45)
        Me.cboxFlying.Name = "cboxFlying"
        Me.cboxFlying.Size = New System.Drawing.Size(53, 17)
        Me.cboxFlying.TabIndex = 12
        Me.cboxFlying.Text = "Flying"
        Me.cboxFlying.Visible = False
        '
        'lblMapName
        '
        Me.lblMapName.AutoSize = True
        Me.lblMapName.Location = New System.Drawing.Point(188, 174)
        Me.lblMapName.Name = "lblMapName"
        Me.lblMapName.Size = New System.Drawing.Size(62, 13)
        Me.lblMapName.TabIndex = 11
        Me.lblMapName.Text = "Map Name:"
        '
        'btnSaveMap
        '
        Me.btnSaveMap.Enabled = False
        Me.btnSaveMap.Location = New System.Drawing.Point(93, 12)
        Me.btnSaveMap.Name = "btnSaveMap"
        Me.btnSaveMap.Size = New System.Drawing.Size(75, 23)
        Me.btnSaveMap.TabIndex = 12
        Me.btnSaveMap.Text = "Save Map"
        '
        'openFileMain
        '
        Me.openFileMain.FileName = "Halo 2 Map"
        Me.openFileMain.Filter = "Halo 2 Map Files | *.map"
        '
        'lblMapSaved
        '
        Me.lblMapSaved.AutoSize = True
        Me.lblMapSaved.Location = New System.Drawing.Point(174, 17)
        Me.lblMapSaved.Name = "lblMapSaved"
        Me.lblMapSaved.Size = New System.Drawing.Size(148, 13)
        Me.lblMapSaved.TabIndex = 13
        Me.lblMapSaved.Text = "Map Saved! (Resign the map)"
        Me.lblMapSaved.Visible = False
        '
        'timerAfterSave
        '
        Me.timerAfterSave.Interval = 3000
        '
        'formMain
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.AutoSize = True
        Me.ClientSize = New System.Drawing.Size(330, 208)
        Me.Controls.Add(Me.lblMapSaved)
        Me.Controls.Add(Me.btnSaveMap)
        Me.Controls.Add(Me.lblMapName)
        Me.Controls.Add(Me.grpSelectedVehicle)
        Me.Controls.Add(Me.lblVehicles)
        Me.Controls.Add(Me.comboVehicles)
        Me.Controls.Add(Me.btnOpenMap)
        Me.Controls.Add(Me.lblFileSize)
        Me.Controls.Add(Me.lblIndexHeader)
        Me.Controls.Add(Me.lblMapMagic)
        Me.Controls.Add(Me.lblIndexMagic)
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedSingle
        Me.Icon = CType(resources.GetObject("$this.Icon"), System.Drawing.Icon)
        Me.Name = "formMain"
        Me.Text = "Vehicle Editor"
        Me.grpSelectedVehicle.ResumeLayout(False)
        Me.grpSelectedVehicle.PerformLayout()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents lblIndexMagic As System.Windows.Forms.Label
    Friend WithEvents lblMapMagic As System.Windows.Forms.Label
    Friend WithEvents lblIndexHeader As System.Windows.Forms.Label
    Friend WithEvents lblFileSize As System.Windows.Forms.Label
    Friend WithEvents btnOpenMap As System.Windows.Forms.Button
    Friend WithEvents comboVehicles As System.Windows.Forms.ComboBox
    Friend WithEvents lblVehicles As System.Windows.Forms.Label
    Friend WithEvents lblSVName As System.Windows.Forms.Label
    Friend WithEvents lblSVOffset As System.Windows.Forms.Label
    Friend WithEvents grpSelectedVehicle As System.Windows.Forms.GroupBox
    Friend WithEvents lblMapName As System.Windows.Forms.Label
    Friend WithEvents cboxFlying As System.Windows.Forms.CheckBox
    Friend WithEvents btnSaveMap As System.Windows.Forms.Button
    Friend WithEvents openFileMain As System.Windows.Forms.OpenFileDialog
    Friend WithEvents lblMapSaved As System.Windows.Forms.Label
    Friend WithEvents timerAfterSave As System.Windows.Forms.Timer
    Friend WithEvents cboxAllFlying As System.Windows.Forms.CheckBox
    Friend WithEvents cboxFireWeapon As System.Windows.Forms.CheckBox
    Friend WithEvents cboxEnableHUD As System.Windows.Forms.CheckBox
    Friend WithEvents lblWarthogOnly As System.Windows.Forms.Label
    Friend WithEvents lblWarthogOnly3 As System.Windows.Forms.Label
    Friend WithEvents lblWarthogOnly2 As System.Windows.Forms.Label

End Class
