var bgPos=0, bgSpeed=1;

window.onload = function() { startBg(); };

function moveBg() {
	document.body.style.backgroundPosition = String(Math.round(bgPos+=bgSpeed)) + "px 0px";
	if (bgPos >= 17) { bgPos = 0; }
}

function stopBg() { clearInterval(movingBackground); delete movingBackground; }
function startBg() { movingBackground = setInterval("moveBg()", 50); }
function toggleBg() { if (typeof(movingBackground) !== "undefined") stopBg(); else startBg(); }

/* Google Analytics Tracking Code */
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-389885-11']);
_gaq.push(['_trackPageview']);

(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();