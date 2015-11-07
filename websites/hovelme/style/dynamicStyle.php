<style>
    
    <?php if (isModuleLoaded('chatModule')) { ?>
        #chatModule {
            <?php echo 'width: '.$moduleSettings['chatModule']['width'].'px; height: '.$moduleSettings['chatModule']['height'].'px;'; ?>
            <?php echo 'left: '.$moduleSettings['chatModule']['left'].'px; top: '.$moduleSettings['chatModule']['top'].'px;'; ?>
        }
        #chatArea {
            height: <?php echo ($moduleSettings['chatModule']['height']-24); ?>px;
        }
        #chatModule input#chatInput { width: <?php echo $moduleSettings['chatModule']['width']-182; ?>px; height: 18px; margin-left: 12px; }
    <?php }
    if (isModuleLoaded('drawModule')) { ?>
        #drawModule {
            <?php echo 'width: '.$moduleSettings['drawModule']['width'].'px; height: '.$moduleSettings['drawModule']['height'].'px;'; ?>
        }
    <?php } ?>

</style>