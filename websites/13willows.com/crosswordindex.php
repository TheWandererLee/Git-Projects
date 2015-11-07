<?php ob_start("ob_gzhandler");
if (!isset($_GET['page'])) $_GET['page'] = 'home';

$portfolio = array(     // title, name, date created, link (first char @ if cached), remarks, description)
                        array('East Coast Moving', 'eastcoastmoving',20100101,'http://www.eastcoastmovingllc.com','Developed and designed website from scratch using table-less HTML/CSS3 and PHP','East Coast Moving, LLC, is a full-service moving company for every state along the eastern seaboard when moving in to - or out of, the Carolinas.')
                        ,array('RDI Renewables','rdirenewables',20131023,'http://www.rdirenewables.co.uk','Developed custom CMS to allow easy modification of multiple pages, header, footer, and ticker.Performed CSS/HTML template changes and integrated custom made PHP mailer script/form.','')
                        ,array('Zombie Dog Tags','zombiedogtags',20130719,'http://www.zombiedogtags.com','Developed a responsive realtime Dog Tag Generator using PHP/JavaScript to allow users to create a sample dog tag image with their selected silencer, chain, and color scheme. This script integrates with Joomla and Open Cart to send customer orders to the machine\'s order queue for later production.','')
                        ,array('Elite Wood Classics','elitewoodclassics',20100101,'http://www.elitewoodclassic.com','Created','Description')
                        ,array('Line Rider Share','lineridershare',20070101,'http://linerider.13willows.com','','')
                        ,array('All 4 Free','all4free',20050101,'http://halo2.13willows.com','Created','Description')
                        ,array('Aziomedia','aziomedia',20090101,'http://www.aziomedia.com','Created','Description')
                        ,array('Wingit in Asheville','wingitinasheville',20080101,'http://www.13willows.com/wingitinasheville.com','Created','Description')
                        ,array('Gas Charts','gascharts',0,'http://www.13willows.com/gascharts.com','What I did','Description')
                        ,array('Castle Hayne Dentistry','castlehaynedentistry',0,'http://www.13willows.com/castlehaynedentistry.com','What I did','Description')
                        ,array('Mario Lengauer','mariolengauer',0,'http://www.13willows.com/client/adrianTudorache/index.html','','')
                        ,array('Doran\'s Transmissions','doranstransmissions',20110101,'http://www.13willows.com/doranstransmissions.com/','','')
                        ,array('Game Studio','gamestudio',0,'http://www.13willows.com/gamestudio','','')
                        ,array('Hovel Me','hovelme',0,'http://www.13willows.com/hovelme','','')
                        ,array('Jared Cline Photography','jaredcline',20070101,'http://www.13willows.com/jaredcline.com','','')
                        ,array('King Fish Band','kingfishband',20140716,'http://www.kingfishband.com','','Band site')
                        ,array('Phyllis B. Cook DDS','phylliscook',20120101,'http://www.13willows.com/phylliscook.com/_old-website-6-2012/','','Dentist site, new site at http://13willows.com/phylliscook.com/ and http://cook-perio.com')
                        ,array('Port City Study Club','portcitystudyclub',20120101,'http://www.13willows.com/portcitystudyclub.com/','','')
                        ,array('Prints Charming','printscharming',20100101,'http://www.13willows.com/printscharming.me','','')
                        ,array('Ride With Pride NC','ridewithpridenc',20110101,'http://www.13willows.com/ridewithpridenc.com','All American Custom Canvas and Upholstery','Custom canvas and upholstery services from NC')
                        ,array('Silver Coast Winery','silvercoastwinery',20090601,'http://www.13willows.com/silvercoastwinery.com','','')
                        ,array('Pollard Mortgage Shop','pollardmortgageshop',20130501,'http://www.pollardmortgageshop.co.uk/','','Real estate sales')
                        ,array('Cricky\'s Tags','crickystags',20150101,'http://www.13willows.com/websites/crickystags.co.uk/','Developed realtime JavaScript and PHP module to customize dog tags. Data sent to machine, tags pressed and sold.','Custom dog tag sales from the UK')
                        ,array('Henderson Interactive','hendersoninteractive',20090101,'http://www.davidphenderson.com/','Developed website and images using HTML4.1, CSS2','Portfolio page for Aziomedia website development component.')
                        ,array('13 Willows Software','software',20070101,'http://www.13willows.com/oldindex.php?page=programs','Created all freeware applications, mostly file editors written in VB .Net, UI, website.','Hosts old software created by myself. Source code available on request.')
);

if ($_GET['page'] == 'portfolio' && isset($_GET['option'])) {
    if (is_numeric($_GET['option'])) {
        $_GET['option'] = (int)$_GET['option'];
        header("Location: ".$portfolio[$_GET['option']][3]);
        echo '<a href="'.$portfolio[$_GET['option']][3].'">If you were not redirected, click here</a>';
        exit();
    }
}

$siteSizeLimit = array(96, 192);
?>
<!DOCTYPE html>
<html>
<head>
    <title>13 Willows | <?php echo $_GET['page']; ?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <style type="text/css">
        html, body { background:#FFF;overflow:hidden;height:100%;width:100%; }
        * { margin:0;padding:0; }
        
        a { text-decoration: none; }
        
        div.body { width: 100%; height: 100%; overflow: hidden; position: absolute; }
        
        #grid { background: #EEE; border-collapse: collapse; width: 10000px; position: absolute; left:0;top:0;
        <?php if ($_GET['page'] == 'portfolio') echo 'visibility: hidden;'; else echo 'visibility: visible;'; ?>
        }
        
        #grid div { float: left; color: #BBB; display: inline-block; width: 32px; height: 32px; border-right: 1px solid #999; border-bottom: 1px solid #999;
            line-height: 32px; font-size: 26px; font-family: "Georgia", "Times New Roman", serif; text-align: center; cursor: default;
            -webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none;
            }
        #grid div.clear { width:0;height:0;border:0;clear: both; }
        
        #grid div strong a { color: #262; }
        #grid div a { display: block; color: #933; font-size: 32px; font-family: "Times New Roman"; }
        #grid div b { font-weight: normal; color: #555; }
        #grid div strong { font-weight: bold; color: #555; }
        
        #grid .bold { font-weight: bold; }
        
        #portfolio { position: absolute; left:0; top:0; width: 100%; height: 100%; background: #444;;
        <?php if ($_GET['page'] == 'portfolio') echo 'visibility: visible;'; else echo 'visibility: hidden;'; ?>
        }
        
        #portfolio h1 { font-family: "Arial", sans-serif; font-size: 80px; line-height: 80px; color: rgba(0,50,50,0.3); text-shadow: 1px 4px 8px #DDD, 0 0 0 #000;
        background: #DDD; border-bottom: 1px solid #000; box-shadow: 0 0 32px #000;
        filter: progid:DXImageTransform.Microsoft.DropShadow(offX=2,offY=2,color=ff0000); }
        
        #portfolio #gallery { position: absolute; }
        #portfolio #gallery .cell { width: 96px; height: 54px; float: left; margin: 48px 0 0 72px;
         position: relative; text-align: center;
        }
        #portfolio #gallery .cell div { width: 96px; height: 54px; position: absolute; left: 0; top: 0; background: no-repeat center; outline: 1px solid #BBB; }
        
        #lightContainer { width: 100%; height: 100%; background: rgba(0,0,0,0.8); position: absolute; visibility: hidden; }
        #lightbox { width: 1008px; height: 640px; background: #000; position: relative; margin: 64px auto; box-shadow: 1px 4px 8px #000; }
        #lightImage { width: 992px; height: 512px; }
        #lightText { color: #EEE; }
        
        #debug { clear: both; color: #FFF; position: absolute; }
        
        ::-moz-selection { background: #5af; color: #fff; text-shadow: none; }
        ::selection { background: #5af; color: #fff; text-shadow: none; }
    </style>
    <script type="text/javascript">
        //window.addEventListener("hashchange", windowHashChange, false);
        window.addEventListener("load", windowLoaded, false);
        //window.addEventListener("popstate", windowPopState, false);
        
        function windowLoaded() {
            $('portfolio').addEventListener("mousemove", mouseMoved, false);
        }
        
        var gridOpacity = <?php echo ($_GET['page']=='portfolio'?'0':'1'); ?>;
        
        var intGridFade, gridFadeTo;
        
        <?php echo 'var siteSizeLimit = ['.$siteSizeLimit[0].','.$siteSizeLimit[1].'];'; ?>
        //var siteSizeLimit = [96,192]; // [Min,Max] Width of portfolio cell size. Multiply by 0.5625 for current height ratio (192/108).
        
        function mouseMoved(e) {
            if (gridOpacity) return false;
            
            //$('debug').innerHTML = e.clientX + ',' + e.clientY;
            
            var portfolioCount = <?php echo count($portfolio); ?>;
            for (var i=0; i<portfolioCount; i++) {
                //$('debug').innerHTML += '[From '+i+': '+distanceBetween(e.clientX,e.clientY,,)+']';
                var tmp = findPos($('site'+i)); // Get elements (non moving parent) position
                tmp[0]+=48;tmp[1]+=26;// Get center origin point
                
                var dis = distanceBetween(e.clientX,e.clientY,tmp[0],tmp[1]);
                if (dis > 200 && $('site'+i).style.width == siteSizeLimit+'px') continue;
                var sizeMod = (200 - Math.min(dis,200)) / 200;
                var useWidth = siteSizeLimit[0] + (siteSizeLimit[1]-siteSizeLimit[0])*sizeMod;
                $('site'+i).style.width = Math.round(useWidth/2)*2 + 'px'; $('site'+i).style.left = Math.round((siteSizeLimit[0]-useWidth)/2) + 'px';
                $('site'+i).style.height = Math.round(useWidth*0.5625/2)*2 + 'px'; $('site'+i).style.top = Math.round((siteSizeLimit[0]-useWidth)*0.5625/2) + 'px';
                // Move child accordingly
            }
        }
        
        window.onpopstate = function(e) {
            if (typeof e != 'undefined' && typeof e.state != 'undefined' && e.state != null) {
                stateChanged(e.state.page);
            } else {
                stateChanged('<?php echo $_GET['page']; ?>');
            }
        }
        
        function changeState(url) {
            window.history.pushState({page: url}, url, url);
            stateChanged(url);
        }
        
        function stateChanged(page) {
            if (page == "portfolio") gridFadeTo = 0; else gridFadeTo = 1;
            intGridFade = setInterval(gridFader, 50);
        }
        
        function gridFader() {
            if (gridFadeTo > gridOpacity) {
                gridOpacity = Math.min(gridOpacity + 0.07, gridFadeTo);
            } else if (gridFadeTo < gridOpacity) {
                gridOpacity = Math.max(gridOpacity - 0.07, gridFadeTo);
            }
            $('grid').style.opacity = gridOpacity;
            $('portfolio').style.opacity = 1-gridOpacity;
            
            if ($('grid').style.opacity == 0) $('grid').style.visibility = 'hidden'; else $('grid').style.visibility = 'visible';
            if ($('portfolio').style.opacity == 0) $('portfolio').style.visibility = 'hidden'; else $('portfolio').style.visibility = 'visible';
            
            if (gridOpacity == gridFadeTo) {
                clearInterval(intGridFade);
            }
        }
        
        function lightSelect(num) {
            switch (num) {
                <?php
                    $tmp = array();
                    
                    for ($i=0;$i<count($portfolio);$i++) {
                        echo "\r\ncase ".$i.":";
                        echo "\r\nlightSwitch(\"".implode('","',$portfolio[$i])."\");";
                        echo "break;";
                    }
                ?>
                default:
                    break;
            }
        }
        function lightSwitch(title,src,date,link,remarks,descrip) {
            //alert("Selected this data: "+title+"\r\n"+src);
            window.location = link;
        }
        
        function findPos(obj) {
            var curleft = curtop = 0;
            if (obj.offsetParent) {
                /*do { // Includes original child element
                    curleft += obj.offsetLeft;
                    curtop += obj.offsetTop;
                } while (obj = obj.offsetParent);*/
                
                while (obj = obj.offsetParent) { // Ignores original child element
                    curleft += obj.offsetLeft;
                    curtop += obj.offsetTop;
                }
            }
            return [curleft,curtop];
        }
        function distanceBetween(x1,y1,x2,y2) {
            return Math.sqrt(Math.pow(y2-y1,2)+Math.pow(x2-x1,2));
        }
        function $(id) { return document.getElementById(id); }
    </script>
</head>
<body>
    <div class="body">
        <div id="grid">
        <?php
            $grid = array(); $gridRows = 50; $gridCols = 80;
            $pool = 'ABCDEFGHIKLMNOPRSTUVWY ';
            //$pool = 'ABCDEFGHIKLMNOPRSTUVWY <>;\'/"()#{}&=$!';
            $gridLog = array(); // Array of changes made to the grid
            
            //Generate random
            for ($x=0;$x<$gridCols;$x++) {
                $grid[$x] = array();
                for ($y=0;$y<$gridRows;$y++) {
                    //$grid[$x][$y] = rand(0,6)?chr(65+rand(0,25)):' ';
                    $grid[$x][$y] = substr($pool,rand(0,strlen($pool)-1),1);
                }
            }
            
            //Inject phrases
            gridInject(9,1,"WEBSITE DEVELOPMENT",true,"b");
            gridInject(8,17,"SEARCH ENGINE OPTIMIZATION",false,"b");
            gridInject(25,6,"GRAPHIC DESIGN",true,"b");
            
            gridInject(25,1,"PORTFOLIO ",false,"#portfolio");
            //gridInject(35,1,"CONTACT",false,"#contact");
            gridInject(35,1,"CONTACT",false,"@mailto:webmaster@13willows.com");
            gridInject(1,1,"13 WILLOWS",false,"1/13willows.com/");
            
            
            
            //Draw grid
            for ($y=0;$y<$gridRows;$y++) {
                for ($x=0;$x<$gridCols;$x++) {
                    if (is_array($grid[$x][$y])) {
                        switch (substr($grid[$x][$y][1],0,1)) {
                            case '1': // Within URL link
                                echo '<div><strong><a href="#" onclick="changeState(\''.substr($grid[$x][$y][1],1).'\'); return false">'.$grid[$x][$y][0].'</a></strong></div>'; break;
                            case '#': // Asynchronous hash state change link
                                //echo '<div><a href="#" onclick="changeState(\''.substr($grid[$x][$y][1],1).'\'); return false">'.$grid[$x][$y][0].'</a></div>'; break;
                                echo '<script>document.write(\'<div><a href="#" onclick="changeState(\\\''.substr($grid[$x][$y][1],1).'\\\'); return false">'.$grid[$x][$y][0].'</a></div>\');</script>';
                                echo '<noscript><div><a href="'.substr($grid[$x][$y][1],1).'">'.$grid[$x][$y][0].'</a></div></noscript>';
                                break;
                            case '@': // Direct external link
                                echo '<div><a href="'.substr($grid[$x][$y][1],1).'">'.$grid[$x][$y][0].'</a></div>'; break;
                            case 'b': // Dark text
                                echo '<div><b>'.$grid[$x][$y][0].'</b></div>'; break;
                            case 'B': // Dark and bold text
                                echo '<div><strong>'.$grid[$x][$y][0].'</strong></div>'; break;
                            default:
                                echo '<div>'.$grid[$x][$y][0].'</div>';
                                break;
                        }
                    } else {
                        echo '<div>'.$grid[$x][$y].'</div>';
                    }
                }
                echo '<div class="clear"></div>';
            }
            
            
            function gridInject($xx, $yy, $phrase, $vert=false, $type='') {
                global $grid, $gridLog;
                
                $typechar = substr($type,1,1);
                if ($typechar != '#') { // All except links logged
                    $gridLog[] = array($xx,$yy,strlen($phrase),$vert);
                }
                
                if ($vert) {
                    for ($y=0;$y<strlen($phrase);$y++) {
                        if ($yy+$y >= count($grid[$xx])) break;
                        if (empty($type)) {
                            $grid[$xx][$y+$yy] = substr($phrase,$y,1);
                        } else {
                            $grid[$xx][$y+$yy] = array(substr($phrase,$y,1),$type);
                        }
                    }
                } else {
                    for ($x=0;$x<strlen($phrase);$x++) {
                        if ($xx+$x >= count($grid)) break;
                        if (empty($type)) {
                            $grid[$x+$xx][$yy] = substr($phrase,$x,1);
                        } else {
                            $grid[$x+$xx][$yy] = array(substr($phrase,$x,1),$type);
                        }
                    }
                }
            }
        ?>
        </div>
        
        <div id="portfolio">
            <div class="header">
                <script>document.write('<a href="#" onclick="changeState(\'/13willows.com/\'); return false"><h1>13 Willows</h1></a>');</script>
                <noscript><a href="/13willows.com"><h1>13 Willows</h1></a></noscript>
            </div>
            <div id="gallery">
                <?php
                    for ($i=0;$i<count($portfolio);$i++) {
                        echo '<div class="cell">';
                            //echo '<a href="#" onclick="lightSelect('.$i.'); return false">';
                            
                            echo '<script>document.write(\''.
                            '<a href="#" onclick="lightSelect('.$i.'); return false">'.
                            '<div id="site'.$i.'" style="background-image: url(\\\'images/portfolio/'.$portfolio[$i][1].'.jpg\\\');"></div>'.
                            '</a>\');</script>';
                            
                            //echo '<div id="site'.$i.'" style="background-image: url(\'images/portfolio/'.$portfolio[$i][1].'.jpg\');"></div>';
                            
                            echo '<noscript>
                            <a href="portfolio/'.$i.'">
                            <div id="site'.$i.'" style="background-image: url(\'images/portfolio/'.$portfolio[$i][1].'.jpg\');width:'.round(($siteSizeLimit[0]+$siteSizeLimit[1])/2).'px;height:'.round(($siteSizeLimit[0]+$siteSizeLimit[1])*.28125).'px;"></div>
                            </a></noscript>';
                        echo '</div>';
                    }
                ?>
            </div>
            
            <div id="lightContainer">
                <div id="lightbox">
                    <div id="lightImage"></div>
                    <div id="lightText">The vendor recipe system allows the player to sell items to any town vendor in exchange for a multitude of currency items and equipment. Each recipe requires semi-specific items or combinations of items be put into the sell window at the same time, and the outcome will change based on any recipes that have been matched. Unless noted otherwise, each item may only be involved in a single recipe at a time.
    Items (and their costs) sold by vendors as part of their normal inventory are covered on the vendor page.<br><br>The vendor recipe system allows the player to sell items to any town vendor in exchange for a multitude of currency items and equipment. Each recipe requires semi-specific items or combinations of items be put into the sell window at the same time, and the outcome will change based on any recipes that have been matched. Unless noted otherwise, each item may only be involved in a single recipe at a time.
    Items (and their costs) sold by vendors as part of their normal inventory are covered on the vendor page.</div>
                </div>
                
                <div id="debug">
                    Debug
                </div>
            </div>
        </div>
    </div>
</body>
</html>