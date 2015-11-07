<?php ob_start("ob_gzhandler"); ?>
<!DOCTYPE html>
<html>
<head>
<title>Project</title>
<style type="text/css">
    #divDebug {
        visibility: hidden;
        outline: 1px #000 solid;
    }
    .btnClick {
        width: 126px; height: 48px;
        position: absolute; left: 200px; top: 200px;
    }
    html, body {
        /*margin: 0;*/
    }
</style>
<script type="text/javascript">
window.addEventListener('mousemove',mouseMoved,true);
window.addEventListener('load',windowLoad,true);

var buttons = new Array(), btn = new Array();
var globInt, btnCount = 100;

function windowLoad() {
    
    for (var i=0; i<btnCount; i++) {
        buttons[i] = document.createElement('input');
        buttons[i].type = 'button'; buttons[i].value = 'Click to Continue'; buttons[i].id = 'btn'+i; buttons[i].className = 'btnClick';
        document.body.appendChild(buttons[i]);
        
        btn[i] = new Array();
        btn[i][0] = Math.min(window.innerWidth-64,Math.max(64,Math.round(Math.random()*window.innerWidth)));
        btn[i][1] = Math.min(window.innerHeight-24,Math.max(24,Math.round(Math.random()*window.innerHeight)));
        btn[i][2] = Math.random()*Math.PI*2-Math.PI;
        
        //Restrictive bounds
        btn[i][0]=Math.min(window.innerWidth-64,Math.max(64,btn[i][0]));
        btn[i][1]=Math.min(window.innerHeight-24,Math.max(24,btn[i][1]));
        
        $('btn'+i).style.left = (btn[i][0]-64)+'px';
        $('btn'+i).style.top = (btn[i][1]-24)+'px';
    }
    
    globInt = setInterval(tick, 17);
}

function tick() {
    for (var i=0;i<btnCount;i++) {
        if (btn[i][0] < 64 || btn[i][0] > window.innerWidth-64) btn[i][2] += Math.PI;
        if (btn[i][1] < 24 || btn[i][1] > window.innerHeight-24) btn[i][2] += Math.PI;
        
        btn[i][0] += Math.cos(btn[i][2])*1.5;
        btn[i][1] += Math.sin(btn[i][2])*1.5;
        
        btn[i][2] += Math.random()*0.6-0.3;
        
        updateBtn(i);
    }
}
function updateBtn(b) {
    $('btn'+b).style.left = Math.round(btn[b][0]-64) + 'px';
    $('btn'+b).style.top = Math.round(btn[b][1]-24) + 'px';
}

function mouseMoved(e) {
    for (var b=0;b<btnCount;b++) {
        var db = distanceBetween(e.clientX,e.clientY,btn[b][0],btn[b][1]);
        
        /*document.getElementById('divDebug').innerHTML = e.clientX + ',' + e.clientY + '<br>' + btn[0] + ',' + btn[1]
        + '<br>' + db
        + '<br>' + Math.round(360-(Math.atan2(btn[1]-e.clientY,btn[0]-e.clientX)*180/Math.PI+180)) + 'deg / ' + Math.atan2(btn[1]-e.clientY,btn[0]-e.clientX) + 'rad'
        + '<br>WxH: ' + window.innerWidth + 'x' + window.innerHeight;
        */
        
        if (db < 400) {
            btn[b][0] += Math.cos(Math.atan2(btn[b][1]-e.clientY,btn[b][0]-e.clientX)) * (400-db)/40
            btn[b][1] += Math.sin(Math.atan2(btn[b][1]-e.clientY,btn[b][0]-e.clientX)) * (400-db)/40;
            
            btn[b][0]=Math.min(window.innerWidth-64,Math.max(64,btn[b][0]));
            btn[b][1]=Math.min(window.innerHeight-24,Math.max(24,btn[b][1]));
            
            //$('btn'+b).value = Math.atan2(btn[b][1]-e.clientY,btn[b][0]-e.clientX);
            
            updateBtn(b);
        }
    }
}
function distanceBetween(x1,y1,x2,y2) {
    return Math.sqrt(Math.pow(x2-x1,2)+Math.pow(y2-y1,2));
}
function $(id) {
    return document.getElementById(id);
}
</script>
</head>
<body>
<div id="divDebug">Debug</div>
    
</body>
</html>