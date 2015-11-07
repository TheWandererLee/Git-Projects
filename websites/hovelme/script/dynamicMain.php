<script>
document.addEventListener("readyEvent", dynamicDocumentReady, false);
function dynamicDocumentReady() {
    
}
<?php
if (isModuleLoaded('toolboxToolbar')) {
    /* echo 'var toolboxToolbar = "';
    echo '<div class=\'toolboxToolbar\'>';
    echo '<input type=\'image\'><input type=\'image\'>This is the \"Toolbox Toolbar\"';
    echo '</div>";';
    */
    ?>
    var toolboxToolbar = "<div class='toolboxToolbar'>This is the \"Toolbox Toolbar\"<a class='save'></a><a class='delete'></a></div>";
    <?php
}
if (isModuleLoaded('drawModule')) {
    echo 'cVars["drawModule"] = [];';
    echo 'cVars["drawModule"]["size"] = ['.$moduleSettings['drawModule']['width'].','.$moduleSettings['drawModule']['height'].'];';
}
if (isModuleLoaded('assaultModule')) {
    echo 'cVars["assaultModule"] = [];';
    echo 'cVars["assaultModule"]["size"] = ['.$moduleSettings['assaultModule']['width'].','.$moduleSettings['assaultModule']['height'].'];';
}
if (isModuleLoaded('rigorMortisModule')) {
    echo 'cVars["rigorMortisModule"] = [];';
    echo 'cVars["rigorMortisModule"]["size"] = ['.$moduleSettings['rigorMortisModule']['width'].','.$moduleSettings['rigorMortisModule']['height'].'];';
}
if (isModuleLoaded('chatModule')) { ?>
    cVars["chatModule"] = [];
    
    function chatMinimize(min) {
        if (typeof min == 'undefined') min = true;
        $('chatArea').style.display = (min)?"none":"block";
        $('chatModule').style.top = (min)?"<?php echo ($moduleSettings['chatModule']['top']+$moduleSettings['chatModule']['height']-24); ?>px":"<?php echo $moduleSettings['chatModule']['top']; ?>px";
        $('chatModule').style.height = (min)?"24px":"<?php echo $moduleSettings['chatModule']['height']; ?>px";
        $('chatBtnMin').style.display = (min)?"none":"block";
        $('chatBtn').style.display = (min)?"block":"none";
        $('chatBtn').innerHTML = '';
        cVars['chatMin'] = min;
    }
<?php } ?>

<?php
    unset($tmp);
    foreach ($modulesLoaded as $val) { $tmp[] = "'$val'"; }
    echo 'var modulesLoaded = [' . implode(',', $tmp) . '];';
?>
</script>