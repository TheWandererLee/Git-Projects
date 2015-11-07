<?php require 'script/functions.php'; ?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <?php
            $prepareModules = array("headerModule");
            if ($_REQUEST['page'] == 'experiment') { array_push($prepareModules,"chatModule","drawModule","rigorMortisModule"); }
            if ($_REQUEST['page'] == 'draw') { array_push($prepareModules,"drawModule","chatModule"); }
            
            if (isset($_SESSION['uname']) && $_REQUEST['page'] == $_SESSION['uname']) { array_push($prepareModules,"toolboxModule","toolboxToolbar"); }
            
            loadModule('headerModule', array(
            "title"=>"HovelMe :: Test",
            "modules"=>$prepareModules) // Modules must be removed from this list if removed from the page
            );
        ?>
    </head>
    <body>
<div id="viewframe">
    <div id="innerViewframe">
        <div id="upperBody"></div>
        
        <div id="toolbar">
            <form name="logForm" id="logForm" action="?" method="post">
                    <input type="hidden" id="logFormLogout" name="logout" value="">
                <div class="left"><a href="http://server.hovel.me:8350"><h1>HovelMe</h1></a></div>
                    <?php if (isset($_SESSION['uname'])) {
                    echo '<div class="rightText">You are logged in as <a href="?page=' . $_SESSION['uname'] . '">' . $_SESSION['dname'] . '</a>. <a href="#" onclick="userLogout();">Logout</a></div>';
                            } else {
                    echo '<div class="right"><div id="createAccountLabel"><a href="#" onclick="userCreateAccount(true);">Sign Up!</a> | </div>Login: <input type="text" class="text" size="15" value="webmaster@13willows.com" name="u"> Password: <input type="password" class="text" value="" name="p"> <input type="submit" onmousedown="buttonDown(this)" onmouseup="buttonUp(this)" onmouseout="buttonUp(this)" class="button" value="Login" /></div>';
                            echo '<div id="createAccountContainer">';
                            echo '<h2 id="createAccountTitle">Sign Up</h2>';
                            echo '<div id="createAccountHeader">Please fill in all of the fields below.</div>';
                            echo '<div id="createAccountWindow">';
                            
                            echo '<table class="createAccountTable">';
                            echo '<tr><td>First Name:</td><td><input type="text" class="text" /></td></tr>';
                            echo '<tr><td>Last Name:</td><td><input type="text" class="text" /></td></tr>';
                            echo '<tr><td>Email Address:</td><td><input type="text" class="email" /></td></tr>';
                            echo '<tr><td>Birthdate:</td><td>';
                                    echo '<table>';
                                    echo '<tr><td style="padding-right: 8px;"><select><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select></td>';
                                    echo '<td style="padding-right: 8px;"><select>';
                                    for ($i=1; $i<=31; $i++) {
                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                    echo '</select></td>';
                                    echo '<td><select>';
                                    $currentYear = date("Y");
                                    for ($i=$currentYear; $i>=1900; $i--) {
                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                    echo '</select></td></tr>';
                                    echo '</table>';
                            echo '</td></tr>';
                            echo '<tr><td class="continue" colspan="2"><input type="button" class="button" onmousedown="buttonDown(this)" onmouseup="buttonUp(this)" onmouseout="buttonUp(this)" value="Continue --&gt;" style="width: 96px;" /></td></tr>';
                            echo '<tr><td class="continue" colspan="2">The information on this column is only used for identification &amp; password recovery. It will not be shown to other users or 3rd-party applications.</td></tr>';
                            echo '</table>';
                            
                            echo '</div>';
                            echo '<div id="createAccountWindow2">';
                                echo '<table class="createAccountTable">';
                                echo '<tr><td>Username:</td><td><input type="text" class="text" /></td></tr>';
                                echo '<tr><td>Password:</td><td><input type="password" class="text" /></td></tr>';
                                echo '<tr><td>Repeat Password:</td><td><input type="password" class="text" /></td></tr>';
                                echo '<tr><td class="continue" colspan="2"><input type="button" class="button" onmousedown="buttonDown(this)" onmouseup="buttonUp(this)" onmouseout="buttonUp(this)" value="Sign Up" style="width: 96px;" /></td></tr>';
                                echo '</table>';
                            echo '</div>';
                            
                            echo '<div id="createAccountInfo">Your URL will be: <b>http://hovel.me/thisisatest</b></div>';
                            
                            echo '</div>';
                            echo '<div id="createAccountFooter"><a href="#" onclick="userCreateAccount(false);">Nevermind, I don\'t need to create an account.</a></div>';
                } ?>
            </form>
        </div>
        
        <div id="body" style="left: 0px; top: 0px; width: 100%; height: 100%;">
            <div id="edgeFarLeft" style="width: 3px; height: 0px;" class="edge"></div>
            <div id="edgeLeft" style="width: 3px; height: 0px;" class="edge"></div>
            <div id="edgeCenter" style="width: 5px; height: 0px;" class="edge"></div>
            <div id="edgeRight" style="width: 3px; height: 0px;" class="edge"></div>
            <div id="edgeFarRight" style="width: 3px; height: 0px;" class="edge"></div>
            
            <?php if (isset($_SESSION['uname']) && $_REQUEST['page'] == $_SESSION['uname']) { // Current users page ?>
                <div id="con1" class="conText" style="width: 400px; height: 240px; left: -180px; top: 48px;">
                    <div class="conHeader">Con 1</div>
                    First
                    <div class="conResizer"></div>
                </div>
                <div id="con2" class="conMain" style="width: 128px; height: 480px; left: 8px; top: 128px;">
                    <div class="conHeader">Toolbox</div>
                    <?php loadModule('toolboxModule'); ?>
                    <div class="conResizer"></div>
                </div>
                <div id="con3" class="conMain" style="width: 256px; height: 64px; left: 512px; top: 440px;">
                    Three With No Header
                </div>
                <div id="con4" class="conMain" style="width: 768px; height: 504px; left: 240px; top: 64px;">
                    <div class="conHeader">Con 4</div>
                    <div class="conBody" contenteditable="true">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum sodales sem sit amet egestas. Proin nec neque odio, eget vestibulum neque. Nulla justo mauris, malesuada eu sagittis rutrum, malesuada in ante. Suspendisse potenti. Ut eros eros, placerat non gravida vitae, ornare vel tellus. Nunc iaculis, metus at iaculis lacinia, metus tortor volutpat ante, eu scelerisque purus purus eu arcu. Vivamus consectetur felis eu ligula varius commodo. Vestibulum erat nibh, ultricies eu ultrices sit amet, ultrices nec mi. In vehicula massa quis justo adipiscing rutrum. Aenean convallis, lacus nec posuere cursus, diam risus commodo urna, eu porta dui ante vitae metus. Curabitur magna libero, iaculis sed scelerisque viverra, commodo vitae magna.
                    <br><br>Aliquam rutrum tincidunt arcu, sed elementum nibh gravida et. Nam placerat rutrum ipsum, eget viverra sapien eleifend quis. Donec at condimentum mi. Suspendisse sit amet dui at mauris vulputate porta. Morbi sit amet libero ligula. Donec viverra fringilla arcu, a egestas massa fringilla id. Nunc eget metus turpis, nec scelerisque erat. Integer semper ultricies nulla, in sollicitudin felis rutrum ut. Ut pellentesque, mauris sed condimentum ultricies, velit dui sagittis arcu, sed dictum velit tortor in tellus. Curabitur ipsum massa, porttitor quis consequat id, eleifend a dolor. Aliquam leo augue, pharetra vel luctus vel, iaculis scelerisque tellus. Vivamus nec tellus arcu. Curabitur rutrum pretium velit, pellentesque blandit metus dapibus posuere. Fusce sodales interdum scelerisque. Cras laoreet fringilla justo. Cras luctus blandit sodales.
                    </div>
                    <div class="conResizer"></div>
                </div>
            <?php } elseif ($_REQUEST['page'] == 'experiment') { ?>
                <!--<div id="con1" class="conMain" style="width: 400px; height: 240px; left: -180px; top: 48px;">
                    <div class="conHeader">Group Draw</div>
                    <?php loadModule('drawModule'); ?>
                    <div class="conResizer"></div>
                </div>-->
                <div id="con2" class="conMain" style="width: 400px; height: 216px; left: -180px; top: 370px;">
                    <div class="conHeader">Group Chat</div>
                    <?php loadModule('chatModule'); ?>
                    <div class="conResizer"></div>
                </div>
                <div id="con3" class="conMain" style="width: 256px; height: 64px; left: -90px; top: 300px;">
                    <div class="conHeader">Admin</div>
                    <form method="post" action="script/serverControl.php">
                        Password: <input type="password" name="password">
                    </form>
                </div>
                <!--
                <div id="con4" class="conMain" style="width: 768px; height: 504px; left: 240px; top: 64px;">
                    <div class="conHeader">Hovel Assault</div>
                    <?php //loadModule('assaultModule'); ?>
                    <div class="conResizer"></div>
                </div>
                -->
                <div id="con4" class="conMain" style="width: 768px; height: 504px; left: 240px; top: 64px;">
                    <div class="conHeader">Rigor Mortis</div>
                    <?php loadModule('rigorMortisModule'); ?>
                    <div class="conResizer"></div>
                </div>
            <?php } elseif ($_REQUEST['page'] == 'draw') { ?>
                <div id="con1" class="conMain" style="width: 400px; height: 240px; left: -180px; top: 48px;">
                    <div class="conHeader">Group Draw</div>
                    <?php loadModule('drawModule'); ?>
                </div>
                <div id="con2" class="conText" style="width: 400px; height: 216px; left: 352px; top: 32px;">
                    <div class="conHeader">PC &amp; iPhone WebSocket Multi-user Drawing</div>
                        <div style="text-align: center">In this WebSocket demo / HovelMe module, we demonstrate multi user functionality between multiple PCs and mobile devices, specifically iPhones.
                        <br>This demo supports Chrome, Firefox, Opera, &amp; Safari; including both WebSocket protocols Hixie-76 &amp; RFC-6455.
                        <br><br><u>Use the arrow on the top right to CONNECT or DISCONNECT.</u>
                        <br>When it turns green, you are connected to the server.
                        <br><br><a href="http://www.hovel.me">hovel.me</a> / <a href="mailto:webmaster@13willows.com">Email</a>
                        </div>
                    <div class="conResizer"></div>
                </div>
            <?php } else { // Default page ?>
                <div id="con1" class="conText" style="width: 640px; height: 256px; left: 192px; top: 112px;">
                    <div class="conHeader">Click here to drag!</div>
                    <div class="conBody">
                        <div style="width: 214px; height: 72px; float: left;"></div>
                        <div style="padding: 8px;">
                            <b>HovelMe</b>&copy; is a new social networking site that allows users to create your own page. Get creative!
                            <br />Having trouble finding things in another users design? No problem! View their page in a default layout to navigate easily about their page.
                            <br /><br />HovelMe relies heavily on JavaScript and HTML5 technology. We recommend using <a href="http://chrome.google.com">Google&copy; Chrome</a> for best results.
                            <br /><div style="margin-top: 32px; width: 100%; text-align: center;"><em style="color: #C00;">This website is still under construction.</em>
                            <br /><br /><a href="mailto:webmaster@hovel.me">•Contact Us•</a></div>
                        </div>
                    </div>
                </div>
                <div id="con2" class="conMain" style="width: 256px; height: 356px; left: -80px; top: 316px;">
                    <div class="conHeader">Things to work on.</div>
                    <div class="conBody" contenteditable="true"><ul style="padding-left: 16px; text-indent: -16px; list-style: none;">
                        <li style="text-decoration: line-through;">Adding a page height. Browsers Vert-Scrollbar</li>
                        <li>Container attribs: color, border width, border radius, border color, opacity</li>
                        <li>Options/Preferences above page.</li>
                        <li>EditableContent tag.</li>
                        <li style="text-decoration: line-through;">HScrollbar relevant to scroll position</li>
                        <li>Retain text zoom functionality. All browsers but Opera</li>
                        <li>Sandbox mode that does not affect users real page.</li>
                    </ul></div>
                    <div class="conResizer"></div>
                </div>
                <div id="con3" class="conText" style="width: 128px; height: 192px; left: 272px; top: 416px;">
                    <div class="conHeader">Links &amp; Pages</div>
                    <div class="conBody">
                    <a href="?page=experiment" style="background: #FF0; width: 100%; display: inline-block; text-align: center">Experiment</a>
                    <br><br><a href="?page=draw" style="background: #FF0; width: 100%; display: inline-block; text-align: center">Draw</a>
                    <br><br>Container class: <b>conText</b>
                    </div>
                    <div class="conResizer"></div>
                </div>
                <div id="con4" class="conMain" style="width: 256px; height: 192px; left: 416px; top: 416px;">
                    <div class="conHeader">Container 4</div>
                    <div class="conBody">Container class: <b>conMain</b></div>
                    <div class="conResizer"></div>
                </div>
                <div id="con5" class="conMain" style="width: 128px; height: 192px; left: 688px; top: 416px;">
                    <div class="conHeader">Container 5</div>
                    <div class="conBody"></div>
                    <div class="conResizer"></div>
                </div>
                <div id="con6" class="conMain" style="width: 512px; height: 480px; left: 864px; top: 192px;">
                    <div class="conHeader">Changelog.</div>
                    <div class="conBody">
                        <p>5/17: Added vertical scrollbar for variable page height; fixed horizontal scroll bar to glue to bottom of page relative to scroll position; edges scale to plane height rather than browser height</p>
                        <p>5/15: Logo added and very minor cleanup.</p>
                        <p>5/13: 5 Edges added. Far Left [Red], Left [Grey], Center [Green], Right [Grey], Far Right [Red]. Far left right are essentially maximum plane edges, left, right, and center are for additional page alignment. Currently, page defaults to center alignment.</p>
                        <p>4/25 - 5/15: Client side work done, JavaScript, horizontal scroll bar, effects created.</p>
                        <p>4/25/2010: Project started.</p>
                    </div>
                    <div class="conResizer"></div>
                </div>
                <div id="con7" class="conBorderless" style="width: 278px; height: 156px; left: 144px; top: 64px;">
                    <div class="conHeader"><div style="width: 278px; height: 156px; background: url('image/logo.png');"></div></div>
                </div>
            <?php } ?>
        </div>
        
        <div id="slider" onMouseDown="sliderDown();" style="position: absolute; top: 719px; left: 128px; width: 1184px; height: 32px;">
            <div id="slideBar" style="top: 4px; left: 584px; width: 8px; height: 24px;"></div>
            <div id="slideBarClone" style="top: 4px; left: 584px; width: 8px; height: 24px; visibility: hidden;"></div>
            <div id="slideAmount"></div>
        </div>
        
        <div id="arrowLeft" style="opacity: 0;"><div class="sideArrow" style="height: 32px;"></div></div>
        <div id="arrowRight" style="opacity: 0;"><div class="sideArrow" style="height: 32px;"></div></div>
        
        <div id="lowerBody"></div>
    </div>
</div>
        <!--
        <div id="main">
            <div id="container">
                <?php loadModule('drawModule'); ?>
                <?php loadModule('chatModule'); ?>
            </div>
        </div>
        <br><div id="debug"></div>
        <br><a href="log.txt">Additional Server Notes</a>
        -->
    </body>
</html>