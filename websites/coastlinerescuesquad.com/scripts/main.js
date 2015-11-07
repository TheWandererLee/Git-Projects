var titleImage, slideIn, pos, vel;
window.onload = function() {
	titleImage = document.getElementById('titleImage');
	titleImage.style.top = "-256px";
	titleImage.style.display = "block";
	pos = -420;
	vel = 0;
	slideIn = setInterval("slideInI()", 13);
};
function slideInI() {
	vel += 0.3;
	var tmp = pos;
	pos = pos+vel;
	titleImage.style.top = String(Math.round(pos)) + "px";
	if (pos >= 0 && vel > 0) {
		if (vel < 1) { clearInterval(slideIn); }
		vel = -vel/2.5;
	}
}