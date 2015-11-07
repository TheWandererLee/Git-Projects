<style>
* {margin:0;padding:0;}
input[type="text"] { border: 1px solid #CC0; }

body {
    background: #444;
    color: #FFF;
    font: 12px "Courier New", monospace;
    /* overflow: hidden; */
}

#main {
    margin: 0 auto;
    width: 1290px;
    height: 672px;
    outline: 1px dashed #666;
    position: relative;
}
#container {
    margin: 0 auto;
    width: 1034px;
    height: 540px;
    outline: 1px dotted #AA0;
    position: relative;
}

<?php if (isModuleLoaded('chatModule')) { ?>
#chatModule {
    outline: 1px solid #777;
    width: <?php echo $moduleSettings['chatModule']['width']; ?>px;
    height: <?php echo $moduleSettings['chatModule']['height']; ?>px;
    position: relative;
    left: 0px; top: -<?php echo $moduleSettings['chatModule']['height']; ?>px;
    text-shadow: 1px 1px 0px #000;
}
#chatIE { display: none; text-align: center; }
#chatModule .chatButton { position: absolute; width: 24px; height: 22px; right: 0px; cursor: pointer; text-align: center; }
#chatModule #chatBtnMin { right: 18px; background: url('image/chatMin.png'); }
#chatModule #chatBtn { display: none; background: url('image/chat.png'); }
#chatModule input { font: 12px "Courier New", monospace;  vertical-align: middle; padding:1px; text-shadow: 1px 1px 0px #000; color: #DDD; background: none; }
#chatModule input[type="button"] { padding: 2px 8px; font-weight: bold; border: 1px solid #0C0; }
#chatModule input[type="button"]:hover { cursor: pointer; background: #999; }
#chatModule input#chatInput { width: 320px; height: 18px; margin-left: 12px; }
#chatModule input#chatName { width: 128px; height: 20px; font-size: 14px; font-weight: bold; }
#chatDisconnected { display: block; text-align: center; padding-top: 128px; }
#chatConnected { display: none; }
#chatArea {
    overflow-x: hidden; overflow-y: scroll;
    height: <?php echo ($moduleSettings['chatModule']['height']-24); ?>px;
    width: 100%;
}
#chatArea .clientMsg { color: #AFE; }
#chatArea .clientNote { font-style: italic; color: #3C3; }
#chatArea .clientWarning { font-style: italic; color: #FF3; }
#chatArea .serverNote { font-style: italic; color: #AAA; }
#chatArea .serverWarning { font-weight: bold; color: #F33; }
#chatArea b { color: #CCC; }
<?php }
if (isModuleLoaded('drawModule')) {
?>
#drawModule {
    /*width:100%; height:100%;
    outline: 2px dotted #A00;*/
}
<?php } ?>
</style>