Public Class formPlugins
    Dim mainPath As String = System.Environment.GetFolderPath(Environment.SpecialFolder.ProgramFiles)
    Dim programFolder As String = "\H-Name\"
    Dim pluginExtension As String = ".dat"
    Dim dockDistance As Integer = 16

    Private Sub formPlugins_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        RefreshWindow()
    End Sub
    Private Sub formPlugins_MoveResize(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Move, Me.Resize
        customDockWindow()
    End Sub

    Private Sub btnWritePlugins_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnWritePlugins.Click
        'Writes the program folder if it can't find it
        If (My.Computer.FileSystem.DirectoryExists(mainPath & programFolder) = False) Then
            My.Computer.FileSystem.CreateDirectory(mainPath & programFolder)
        End If

        Dim backwashPlugin As String = _
        "\22227078 007 Territory 1" & vbCrLf & _
        "\22227086 010 Territory 2" & vbCrLf & _
        "\22227097 012 Territory 3" & vbCrLf & _
        "\22227110 013 Territory 4" & vbCrLf & _
        "\22227173 025 Picked up Energy Sword" & vbCrLf & _
        "\22227978 025 Picked up Plasma Pistol" & vbCrLf

        Dim containmentPlugin As String = _
        "\28833420 010 Territory 1" & vbCrLf & _
        "\28833431 012 Territory 2" & vbCrLf & _
        "\28833444 013 Territory 3" & vbCrLf & _
        "\28833458 017 Territory 4" & vbCrLf & _
        "\28833476 018 Territory 5" & vbCrLf & _
        "\28838817 021 Blocked Teleporter" & vbCrLf & _
        "\28840807 021 Active Camo" & vbCrLf & _
        "\28840783 023 Got An Overshield" & vbCrLf & _
        "\28842274 027 Activate Switch" & vbCrLf

        Dim deltatapPlugin As String = _
        "\24621192 010 Territory 1" & vbCrLf & _
        "\24621203 013 Territory 2" & vbCrLf & _
        "\24621217 012 Territory 3" & vbCrLf & _
        "\24621230 009 Territory 4" & vbCrLf & _
        "\24621240 009 Territory 5" & vbCrLf

        Dim dunePlugin As String = _
        "\19509890 012 Territory 1" & vbCrLf & _
        "\19509903 014 Territory 2" & vbCrLf & _
        "\19509918 009 Territory 3" & vbCrLf & _
        "\19509928 013 Territory 4" & vbCrLf & _
        "\19509942 020 Territory 5" & vbCrLf & _
        "\19510817 025 Plasma Pistol" & vbCrLf & _
        "\19512759 027 Rocket Launcher" & vbCrLf

        Dim elongationPlugin As String = _
        "\23519357 012 Territory 1" & vbCrLf & _
        "\23519370 010 Territory 2" & vbCrLf & _
        "\23519381 013 Territory 3" & vbCrLf & _
        "\23519395 013 Territory 4" & vbCrLf & _
        "\23519409 014 Territory 5" & vbCrLf & _
        "\23565484 028 Respawn in..." & vbCrLf & _
        "\23566893 032 Winning with..." & vbCrLf & _
        "\23567015 031 Losing with..." & vbCrLf

        Dim geminiPlugin As String = _
        "\26700414 015 Territory 1" & vbCrLf & _
        "\26700430 015 Territory 2" & vbCrLf & _
        "\26700446 011 Territory 3" & vbCrLf & _
        "\26700507 025 Energy Sword" & vbCrLf & _
        "\26704596 024 1 Frag Grenade" & vbCrLf & _
        "\26704621 027 2+ Frag Grenades" & vbCrLf & _
        "\26704649 026 1 Plasma Grenade" & vbCrLf & _
        "\26704676 029 2+ Plasma Grenades" & vbCrLf

        Dim triplicatePlugin As String = _
        "\33033353 018 Territory 1" & vbCrLf & _
        "\33033372 021 Territory 2" & vbCrLf & _
        "\33033394 016 Territory 3" & vbCrLf & _
        "\33040699 023 Got an Overshield" & vbCrLf & _
        "\33076364 023 Killed by The Guardians" & vbCrLf & _
        "\33076283 018 [player] quit" & vbCrLf & _
        "\33076302 029 [player] joined" & vbCrLf

        Dim turfPlugin As String = _
        "\31756917 010 Territory 1" & vbCrLf & _
        "\31756928 010 Territory 2" & vbCrLf & _
        "\31756939 013 Territory 3" & vbCrLf & _
        "\31757269 024 Plasma Rifle" & vbCrLf & _
        "\31757535 030 Brute Plasma Rifle" & vbCrLf & _
        "\31802332 027 Control territory" & vbCrLf & _
        "\31802295 036 Other team controls" & vbCrLf

        Dim warlockPlugin As String = _
        "\27505280 013 Territory 1" & vbCrLf & _
        "\27505294 015 Territory 2" & vbCrLf & _
        "\27505310 012 Territory 3" & vbCrLf & _
        "\27505323 014 Territory 4" & vbCrLf & _
        "\27505338 010 Territory 5" & vbCrLf

        Dim ascensionPlugin As String = _
        "\14947446 008 Territory 1" & vbCrLf & _
        "\14947455 018 Territory 2" & vbCrLf & _
        "\14947474 017 Territory 3" & vbCrLf & _
        "\14947492 016 Territory 4" & vbCrLf & _
        "\14947509 015 Territory 5" & vbCrLf & _
        "\14951065 024 Picked up a Sniper Rifle" & vbCrLf & _
        "\14951090 036 1 Round for Sniper Rifle" & vbCrLf & _
        "\14951127 037 2+ Rounds for Sniper Rifle" & vbCrLf & _
        "\14950548 019 Picked up a Shotgun" & vbCrLf & _
        "\14950568 031 1 Shell for Shotgun" & vbCrLf & _
        "\14950600 031 2+ Shells for Shotgun" & vbCrLf

        Dim beavercreekPlugin As String = _
        "\13574267 009 Territory 1" & vbCrLf & _
        "\13574277 013 Territory 2" & vbCrLf & _
        "\13574291 012 Territory 3" & vbCrLf & _
        "\13574304 008 Territory 4" & vbCrLf & _
        "\13578389 018 Picked up the bomb" & vbCrLf & _
        "\13616532 027 You betrayed..." & vbCrLf & _
        "\13616560 026 ...betrayed you" & vbCrLf & _
        "\13616494 037 ... betrayed ..." & vbCrLf

        Dim burial_moundsPlugin As String = _
        "\18228342 010 Territory 1" & vbCrLf & _
        "\18228353 008 Territory 2" & vbCrLf & _
        "\18228362 014 Territory 3" & vbCrLf & _
        "\18228377 008 Territory 4" & vbCrLf & _
        "\18228386 017 Territory 5" & vbCrLf & _
        "\18229755 022 Picked up a Beam Rifle" & vbCrLf & _
        "\18270335 029 You splattered..." & vbCrLf & _
        "\18270365 036 Splattered by..." & vbCrLf & _
        "\18270402 039 ... splattered ..." & vbCrLf

        Dim coagulationPlugin As String = _
        "\20731507 008 Territory 1" & vbCrLf & _
        "\20731516 012 Territory 2" & vbCrLf & _
        "\20731529 013 Territory 3" & vbCrLf & _
        "\20731543 013 Territory 4" & vbCrLf & _
        "\20736537 025 Drive Warthog" & vbCrLf & _
        "\20736563 027 Ride in Warthog" & vbCrLf & _
        "\20736591 034 Operate Warthog Turret" & vbCrLf & _
        "\20736626 025 Flip Warthog" & vbCrLf & _
        "\20736652 031 Board Enemy Warthog" & vbCrLf

        Dim colossusPlugin As String = _
        "\15013493 016 Territory 1" & vbCrLf & _
        "\15013510 010 Territory 2" & vbCrLf & _
        "\15013521 012 Territroy 3" & vbCrLf & _
        "\15013534 013 Territory 4" & vbCrLf

        Dim cyclotronPlugin As String = _
        "\22143604 011 Territory 1" & vbCrLf & _
        "\22143616 013 Territory 2" & vbCrLf & _
        "\22143630 010 Territory 3" & vbCrLf & _
        "\22143641 014 Territory 4" & vbCrLf & _
        "\22143656 013 Territory 5" & vbCrLf

        Dim foundationPlugin As String = _
        "\23278210 009 Territory 1" & vbCrLf & _
        "\23278220 006 Territory 2" & vbCrLf & _
        "\23278227 006 Territory 3" & vbCrLf & _
        "\23278234 006 Territory 4" & vbCrLf & _
        "\23278241 006 Territory 5" & vbCrLf

        Dim headlongPlugin As String = _
        "\29913225 015 Territory 1" & vbCrLf & _
        "\29913241 010 Territory 2" & vbCrLf & _
        "\29913252 009 Territory 3" & vbCrLf & _
        "\29913262 017 Territory 4" & vbCrLf & _
        "\29913280 019 Territory 5" & vbCrLf & _
        "\29913300 020 Territory 6" & vbCrLf

        Dim lockoutPlugin As String = _
        "\17799290 008 Territory 1" & vbCrLf & _
        "\17799299 011 Territory 2" & vbCrLf & _
        "\17799311 008 Territory 3" & vbCrLf & _
        "\17799320 015 Territory 4" & vbCrLf & _
        "\17799336 014 Territory 5" & vbCrLf

        Dim midshipPlugin As String = _
        "\16252528 010 Territory 1" & vbCrLf & _
        "\16252539 009 Territory 2" & vbCrLf & _
        "\16252559 017 Territory 3" & vbCrLf & _
        "\16252577 013 Territory 4" & vbCrLf & _
        "\16252591 011 Territory 5" & vbCrLf

        Dim waterworksPlugin As String = _
        "\22578819 017 Territory 1" & vbCrLf & _
        "\22578837 012 Territory 2" & vbCrLf & _
        "\22578850 013 Territory 3" & vbCrLf & _
        "\22578864 015 Territory 4" & vbCrLf & _
        "\22578880 014 Territory 5" & vbCrLf

        Dim zanzibarPlugin As String = _
        "\29039732 017 Territory 1" & vbCrLf & _
        "\29039750 011 Territory 2" & vbCrLf & _
        "\29039762 008 Territory 3" & vbCrLf & _
        "\29039771 012 Territory 4" & vbCrLf & _
        "\29039784 008 Territory 5" & vbCrLf

        Dim sharedPlugin As String = _
        "\00000000 000 Plugin is Blank" & vbCrLf

        Dim mainmenuPlugin As String = _
        "\15391810 023 Press Start To Continue" & vbCrLf & _
        "\15378928 008 Campaign" & vbCrLf & _
        "\15378960 011 Xbox Live" & vbCrLf & _
        "\15378947 012 Split Screen" & vbCrLf & _
        "\15378960 011 System Link" & vbCrLf & _
        "\15379011 008 Settings" & vbCrLf & _
        "\15379020 015 Player Profiles" & vbCrLf & _
        "\15379036 013 Game Variants" & vbCrLf

        Dim blankPlugin As String = _
        "\00000000 000 Blank Plugin" & vbCrLf & _
        "\00000000 000 " & vbCrLf & _
        "\00000000 000 No plugin has been" & vbCrLf & _
        "\00000000 000 created for this" & vbCrLf & _
        "\00000000 000 map. Create your own" & vbCrLf & _
        "\00000000 000 or wait for the" & vbCrLf & _
        "\00000000 000 developer to create" & vbCrLf & _
        "\00000000 000 a plugin for this map" & vbCrLf

        If writeBackwash.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Backwash" & pluginExtension, backwashPlugin, False)
        If writeContainment.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Containment" & pluginExtension, containmentPlugin, False)
        If writeDeltatap.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Deltatap" & pluginExtension, deltatapPlugin, False)
        If writeDune.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Dune" & pluginExtension, dunePlugin, False)
        If writeElongation.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Elongation" & pluginExtension, elongationPlugin, False)
        If writeGemini.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Gemini" & pluginExtension, geminiPlugin, False)
        If writeTriplicate.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Triplicate" & pluginExtension, triplicatePlugin, False)
        If writeTurf.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Turf" & pluginExtension, turfPlugin, False)
        If writeWarlock.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Warlock" & pluginExtension, warlockPlugin, False)
        If writeAscension.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Ascension" & pluginExtension, ascensionPlugin, False)
        If writeBeaverCreek.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "BeaverCreek" & pluginExtension, beavercreekPlugin, False)
        If writeBurial_Mounds.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Burial_Mounds" & pluginExtension, burial_moundsPlugin, False)
        If writeCoagulation.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Coagulation" & pluginExtension, coagulationPlugin, False)
        If writeColossus.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Colossus" & pluginExtension, colossusPlugin, False)
        If writeCyclotron.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Cyclotron" & pluginExtension, cyclotronPlugin, False)
        If writeFoundation.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Foundation" & pluginExtension, headlongPlugin, False)
        If writeHeadlong.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Headlong" & pluginExtension, headlongPlugin, False)
        If writeLockout.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Lockout" & pluginExtension, lockoutPlugin, False)
        If writeMidship.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Midship" & pluginExtension, midshipPlugin, False)
        If writeWaterworks.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Waterworks" & pluginExtension, waterworksPlugin, False)
        If writeZanzibar.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Zanzibar" & pluginExtension, zanzibarPlugin, False)
        If writeShared.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Shared" & pluginExtension, sharedPlugin, False)
        If writeMainmenu.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Mainmenu" & pluginExtension, mainmenuPlugin, False)
        If writeBlank.Checked = True Then My.Computer.FileSystem.WriteAllText(mainPath & programFolder & "Blank" & pluginExtension, blankPlugin, False)
        RefreshWindow()
    End Sub
    Private Sub btnDeletePlugins_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnDeletePlugins.Click
        If writeBackwash.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Backwash" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Backwash" & pluginExtension)
        If writeContainment.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Containment" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Containment" & pluginExtension)
        If writeDeltatap.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Deltatap" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Deltatap" & pluginExtension)
        If writeDune.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Dune" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Dune" & pluginExtension)
        If writeElongation.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Elongation" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Elongation" & pluginExtension)
        If writeGemini.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Gemini" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Gemini" & pluginExtension)
        If writeTriplicate.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Triplicate" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Triplicate" & pluginExtension)
        If writeTurf.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Turf" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Turf" & pluginExtension)
        If writeWarlock.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Warlock" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Warlock" & pluginExtension)
        If writeAscension.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Ascension" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Ascension" & pluginExtension)
        If writeBeaverCreek.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "BeaverCreek" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "BeaverCreek" & pluginExtension)
        If writeBurial_Mounds.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Burial_Mounds" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Burial_Mounds" & pluginExtension)
        If writeCoagulation.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Coagulation" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Coagulation" & pluginExtension)
        If writeColossus.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Colossus" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Colossus" & pluginExtension)
        If writeCyclotron.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Cyclotron" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Cyclotron" & pluginExtension)
        If writeFoundation.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Foundation" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Foundation" & pluginExtension)
        If writeHeadlong.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Headlong" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Headlong" & pluginExtension)
        If writeLockout.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Lockout" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Lockout" & pluginExtension)
        If writeMidship.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Midship" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Midship" & pluginExtension)
        If writeWaterworks.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Waterworks" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Waterworks" & pluginExtension)
        If writeZanzibar.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Zanzibar" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Zanzibar" & pluginExtension)
        If writeShared.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Shared" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Shared" & pluginExtension)
        If writeMainmenu.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Mainmenu" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Mainmenu" & pluginExtension)
        If writeBlank.Checked = True And My.Computer.FileSystem.FileExists(mainPath & programFolder & "Blank" & pluginExtension) Then My.Computer.FileSystem.DeleteFile(mainPath & programFolder & "Blank" & pluginExtension)
        RefreshWindow()
    End Sub

    Private Sub btnCheckAll_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnCheckAll.Click
        setAllCheckboxes(True)
    End Sub
    Private Sub btnUncheckAll_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnUncheckAll.Click
        setAllCheckboxes(False)
    End Sub
    Private Sub updateAllCheckboxes(ByVal uncheckAllFirst As Boolean)
        'Map Plugin Missing Variables
        Dim missingBackwash As Boolean = False
        Dim missingContainment As Boolean = False
        Dim missingDeltatap As Boolean = False
        Dim missingDune As Boolean = False
        Dim missingElongation As Boolean = False
        Dim missingGemini As Boolean = False
        Dim missingTriplicate As Boolean = False
        Dim missingTurf As Boolean = False
        Dim missingWarlock As Boolean = False
        Dim missingAscension As Boolean = False
        Dim missingBeaverCreek As Boolean = False
        Dim missingBurial_Mounds As Boolean = False
        Dim missingCoagulation As Boolean = False
        Dim missingColossus As Boolean = False
        Dim missingCyclotron As Boolean = False
        Dim missingFoundation As Boolean = False
        Dim missingHeadlong As Boolean = False
        Dim missingLockout As Boolean = False
        Dim missingMidship As Boolean = False
        Dim missingWaterworks As Boolean = False
        Dim missingZanzibar As Boolean = False
        Dim missingShared As Boolean = False
        Dim missingMainMenu As Boolean = False
        Dim missingBlank As Boolean = False
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "backwash" & pluginExtension) = False Then missingBackwash = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "containment" & pluginExtension) = False Then missingContainment = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "deltatap" & pluginExtension) = False Then missingDeltatap = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "dune" & pluginExtension) = False Then missingDune = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "elongation" & pluginExtension) = False Then missingElongation = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "gemini" & pluginExtension) = False Then missingGemini = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "triplicate" & pluginExtension) = False Then missingTriplicate = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "turf" & pluginExtension) = False Then missingTurf = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "warlock" & pluginExtension) = False Then missingWarlock = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "ascension" & pluginExtension) = False Then missingAscension = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "beavercreek" & pluginExtension) = False Then missingBeaverCreek = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "burial_mounds" & pluginExtension) = False Then missingBurial_Mounds = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "coagulation" & pluginExtension) = False Then missingCoagulation = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "colossus" & pluginExtension) = False Then missingColossus = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "cyclotron" & pluginExtension) = False Then missingCyclotron = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "foundation" & pluginExtension) = False Then missingFoundation = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "headlong" & pluginExtension) = False Then missingHeadlong = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "lockout" & pluginExtension) = False Then missingLockout = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "midship" & pluginExtension) = False Then missingMidship = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "waterworks" & pluginExtension) = False Then missingWaterworks = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "zanzibar" & pluginExtension) = False Then missingZanzibar = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "shared" & pluginExtension) = False Then missingShared = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "mainmenu" & pluginExtension) = False Then missingMainMenu = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "blank" & pluginExtension) = False Then missingBlank = True

        'Checks if needed to set all the checkboxes to unchecked first
        If uncheckAllFirst = True Then setAllCheckboxes(False)

        If missingBackwash = True Then writeBackwash.Checked = True
        If missingContainment = True Then writeContainment.Checked = True
        If missingDeltatap = True Then writeDeltatap.Checked = True
        If missingDune = True Then writeDune.Checked = True
        If missingElongation = True Then writeElongation.Checked = True
        If missingGemini = True Then writeGemini.Checked = True
        If missingTriplicate = True Then writeTriplicate.Checked = True
        If missingTurf = True Then writeTurf.Checked = True
        If missingWarlock = True Then writeWarlock.Checked = True
        If missingAscension = True Then writeAscension.Checked = True
        If missingBeaverCreek = True Then writeBeaverCreek.Checked = True
        If missingBurial_Mounds = True Then writeBurial_Mounds.Checked = True
        If missingCoagulation = True Then writeCoagulation.Checked = True
        If missingColossus = True Then writeColossus.Checked = True
        If missingCyclotron = True Then writeCyclotron.Checked = True
        If missingFoundation = True Then writeFoundation.Checked = True
        If missingHeadlong = True Then writeHeadlong.Checked = True
        If missingLockout = True Then writeLockout.Checked = True
        If missingMidship = True Then writeMidship.Checked = True
        If missingWaterworks = True Then writeWaterworks.Checked = True
        If missingZanzibar = True Then writeZanzibar.Checked = True
        If missingShared = True Then writeShared.Checked = True
        If missingMainMenu = True Then writeMainmenu.Checked = True
        If missingBlank = True Then writeBlank.Checked = True
    End Sub
    Private Sub setAllCheckboxes(ByVal checked As Boolean)
        writeBackwash.Checked = checked
        writeContainment.Checked = checked
        writeDeltatap.Checked = checked
        writeDune.Checked = checked
        writeElongation.Checked = checked
        writeGemini.Checked = checked
        writeTriplicate.Checked = checked
        writeTurf.Checked = checked
        writeWarlock.Checked = checked
        writeAscension.Checked = checked
        writeBeaverCreek.Checked = checked
        writeBurial_Mounds.Checked = checked
        writeCoagulation.Checked = checked
        writeColossus.Checked = checked
        writeCyclotron.Checked = checked
        writeFoundation.Checked = checked
        writeHeadlong.Checked = checked
        writeLockout.Checked = checked
        writeMidship.Checked = checked
        writeWaterworks.Checked = checked
        writeZanzibar.Checked = checked
        writeShared.Checked = checked
        writeMainmenu.Checked = checked
        writeBlank.Checked = checked
    End Sub

    Private Sub listDetectedPlugins_SelectedIndexChanged(ByVal sender As Object, ByVal e As System.EventArgs) Handles listDetectedPlugins.SelectedIndexChanged
        If (My.Computer.FileSystem.FileExists(mainPath & programFolder & listDetectedPlugins.SelectedItem & pluginExtension) = True) Then
            formEditPlugin.Hide()
            formEditPlugin.Show()
            formEditPlugin.Text = "Plugin Source: " & listDetectedPlugins.SelectedItem
            formEditPlugin.lblPluginName.Text = listDetectedPlugins.SelectedItem
            formEditPlugin.txtPluginSource.Text = My.Computer.FileSystem.ReadAllText(mainPath & programFolder & listDetectedPlugins.SelectedItem & pluginExtension)
            formEditPlugin.txtPluginSource.Enabled = True
            Me.Select()
        End If
    End Sub
    Private Sub addItemToList(ByVal pluginName As String, ByVal directory As String, ByVal fileType As String)
        Dim i As Integer = 0
        If (My.Computer.FileSystem.FileExists(directory & pluginName & fileType) = True) Then
            While i <= 24
                If (listDetectedPlugins.Items(i) = " ") Then
                    listDetectedPlugins.Items(i) = pluginName
                    GoTo BreakWhile
                End If
                i += 1
            End While
BreakWhile:
        End If
    End Sub
    Private Sub addAllPluginsToList(ByVal directory As String, ByVal fileType As String)
        addItemToList("Backwash", directory, fileType)
        addItemToList("Containment", directory, fileType)
        addItemToList("Deltatap", directory, fileType)
        addItemToList("Dune", directory, fileType)
        addItemToList("Elongation", directory, fileType)
        addItemToList("Gemini", directory, fileType)
        addItemToList("Triplicate", directory, fileType)
        addItemToList("Turf", directory, fileType)
        addItemToList("Warlock", directory, fileType)

        addItemToList("Ascension", directory, fileType)
        addItemToList("BeaverCreek", directory, fileType)
        addItemToList("Burial_Mounds", directory, fileType)
        addItemToList("Coagulation", directory, fileType)
        addItemToList("Colossus", directory, fileType)
        addItemToList("Cyclotron", directory, fileType)
        addItemToList("Foundation", directory, fileType)
        addItemToList("Headlong", directory, fileType)
        addItemToList("Lockout", directory, fileType)
        addItemToList("Midship", directory, fileType)
        addItemToList("Waterworks", directory, fileType)
        addItemToList("Zanzibar", directory, fileType)

        addItemToList("Shared", directory, fileType)
        addItemToList("Mainmenu", directory, fileType)
        addItemToList("Blank", directory, fileType)
    End Sub
    Private Sub clearPluginList()
        Dim i As Integer = 1
        Dim defaultText As String = "--==Plugins==--"
        Dim defaultEmpty As String = " "
        listDetectedPlugins.Items(0) = defaultText
        While i < 25
            listDetectedPlugins.Items(i) = defaultEmpty
            i += 1
        End While
        listDetectedPlugins.Items(25) = defaultText
    End Sub

    Private Sub customDockWindow()
        'Safeguard to keep screen from fighting over window
        If (Me.Left <= dockDistance And Me.Left >= -dockDistance And Me.Right >= My.Computer.Screen.WorkingArea.Width - dockDistance And Me.Right <= My.Computer.Screen.WorkingArea.Width + dockDistance) Then
            Me.Left = 0
            Me.Width = My.Computer.Screen.WorkingArea.Width
        End If
        If (Me.Top <= dockDistance And Me.Top >= -dockDistance And Me.Bottom >= My.Computer.Screen.WorkingArea.Height - dockDistance And Me.Bottom <= My.Computer.Screen.WorkingArea.Height + dockDistance) Then
            Me.Top = 0
            Me.Height = My.Computer.Screen.WorkingArea.Height
        End If
        'Custom docking to the top, bottom, and sides of the screen
        If (Me.Left <= dockDistance And Me.Left >= -dockDistance) Then Me.Left = 0
        If (Me.Top <= dockDistance And Me.Top >= -dockDistance) Then Me.Top = 0
        If (Me.Right >= My.Computer.Screen.WorkingArea.Width - dockDistance And Me.Right <= My.Computer.Screen.WorkingArea.Width + dockDistance) Then Me.Left = My.Computer.Screen.WorkingArea.Width - Me.Width
        If (Me.Bottom >= My.Computer.Screen.WorkingArea.Height - dockDistance And Me.Bottom <= My.Computer.Screen.WorkingArea.Height + dockDistance) Then Me.Top = My.Computer.Screen.WorkingArea.Height - Me.Height
    End Sub
    Private Sub RefreshWindow()
        'Map Plugin Missing Variables
        Dim missingBackwash As Boolean = False
        Dim missingContainment As Boolean = False
        Dim missingDeltatap As Boolean = False
        Dim missingDune As Boolean = False
        Dim missingElongation As Boolean = False
        Dim missingGemini As Boolean = False
        Dim missingTriplicate As Boolean = False
        Dim missingTurf As Boolean = False
        Dim missingWarlock As Boolean = False
        Dim missingAscension As Boolean = False
        Dim missingBeaverCreek As Boolean = False
        Dim missingBurial_Mounds As Boolean = False
        Dim missingCoagulation As Boolean = False
        Dim missingColossus As Boolean = False
        Dim missingCyclotron As Boolean = False
        Dim missingFoundation As Boolean = False
        Dim missingHeadlong As Boolean = False
        Dim missingLockout As Boolean = False
        Dim missingMidship As Boolean = False
        Dim missingWaterworks As Boolean = False
        Dim missingZanzibar As Boolean = False
        Dim missingShared As Boolean = False
        Dim missingMainMenu As Boolean = False
        Dim missingBlank As Boolean = False
        'Uncheck all checkboxes
        'Checks to see which plugin files exist and which are missing
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "backwash" & pluginExtension) = False Then missingBackwash = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "containment" & pluginExtension) = False Then missingContainment = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "deltatap" & pluginExtension) = False Then missingDeltatap = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "dune" & pluginExtension) = False Then missingDune = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "elongation" & pluginExtension) = False Then missingElongation = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "gemini" & pluginExtension) = False Then missingGemini = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "triplicate" & pluginExtension) = False Then missingTriplicate = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "turf" & pluginExtension) = False Then missingTurf = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "warlock" & pluginExtension) = False Then missingWarlock = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "ascension" & pluginExtension) = False Then missingAscension = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "beavercreek" & pluginExtension) = False Then missingBeaverCreek = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "burial_mounds" & pluginExtension) = False Then missingBurial_Mounds = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "coagulation" & pluginExtension) = False Then missingCoagulation = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "colossus" & pluginExtension) = False Then missingColossus = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "cyclotron" & pluginExtension) = False Then missingCyclotron = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "foundation" & pluginExtension) = False Then missingFoundation = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "headlong" & pluginExtension) = False Then missingHeadlong = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "lockout" & pluginExtension) = False Then missingLockout = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "midship" & pluginExtension) = False Then missingMidship = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "waterworks" & pluginExtension) = False Then missingWaterworks = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "zanzibar" & pluginExtension) = False Then missingZanzibar = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "shared" & pluginExtension) = False Then missingShared = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "mainmenu" & pluginExtension) = False Then missingMainMenu = True
        If My.Computer.FileSystem.FileExists(mainPath & programFolder & "blank" & pluginExtension) = False Then missingBlank = True

        clearPluginList()
        updateAllCheckboxes(True)
        addAllPluginsToList(mainPath & programFolder, pluginExtension)
    End Sub
End Class