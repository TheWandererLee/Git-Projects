
var iPhoneVertical = Array(null,320,"css/responsive/phonevertical.css?"+Date());
var iPhoneHorizontal = Array(321,767,"css/responsive/phonehorizontal.css?"+Date());
var iPad = Array(768,1000,"css/responsive/ipad.css?"+Date());
if(!startsizedefault){var startsizedefault = 980;}
if(startsizedefault == 1270){
	var dekstop = Array(1001,1310,"css/responsive/desktop.css?"+Date());
	var full = Array(1311,null,"css/responsive/1270.css?"+Date());
}else{
	var dekstop = Array(1001,1310,"css/responsive/desktop.css?"+Date());
	var full = Array(1311,null,"css/responsive/desktop.css?"+Date());
}

jQuery(document).ready(function(){
	jQuery(window).bind("resize", resizeWindow);
	function resizeWindow(e){
		var newWindowWidth = jQuery(window).width();
		//alert(newWindowWidth+" ; "+full[0]);
		if(newWindowWidth >= full[0]){
			if(enableCuffon){
				Cufon.replace('.font-replace, .main-menu-ul a, .main-under-menu-ul a, .article-main-content h1, .article-main-content h2, .article-main-content h3, .article-main-content h4, .article-main-content h5, .article-main-content h6', {hover: true});
			}
			if(jQuery("#style-responsive").attr("href") == full[2])return;
			jQuery("#style-responsive").attr({href : full[2]});
			jQuery("#navi").attr("class","navi");
		}else if(newWindowWidth >= dekstop[0] && newWindowWidth <= dekstop[1]){
			if(enableCuffon){
				Cufon.replace('.font-replace, .main-menu-ul a, .main-under-menu-ul a, .article-main-content h1, .article-main-content h2, .article-main-content h3, .article-main-content h4, .article-main-content h5, .article-main-content h6', {hover: true});
			}
			if(jQuery("#style-responsive").attr("href") == dekstop[2])return;
			jQuery("#style-responsive").attr({href : dekstop[2]});
			jQuery("#navi").attr("class","navi");
		}else if(newWindowWidth >= iPad[0] && newWindowWidth <= iPad[1]){
			if(jQuery("#style-responsive").attr("href") == iPad[2])return;
			jQuery("#style-responsive").attr({href : iPad[2]});
			jQuery("#navi").attr("class","navi resizednavi");
		}else if(newWindowWidth >= iPhoneHorizontal[0] && newWindowWidth <= iPhoneHorizontal[1]){
			if(jQuery("#style-responsive").attr("href") == iPhoneHorizontal[2])return;
			jQuery("#style-responsive").attr({href : iPhoneHorizontal[2]});
			jQuery("#navi").attr("class","navi resizednavi");
		}else if(newWindowWidth <= iPhoneVertical[1]){
			if(jQuery("#style-responsive").attr("href") == iPhoneVertical[2])return;
			jQuery("#style-responsive").attr({href : iPhoneVertical[2]});
			jQuery("#navi").attr("class","navi resizednavi");
		}
	}
	resizeWindow();
});