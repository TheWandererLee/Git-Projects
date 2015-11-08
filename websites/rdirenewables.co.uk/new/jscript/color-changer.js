
jQuery(document).ready(function($){
	jQuery("body").append('<!-- BEGIN #color-select --><div id="color-select"><div id="picker"></div><div id="icon-brush"></div>'+
	
	'<a href="javascript:void(0);" class="color-changer"><span class="color-picker" style="background:#c53c1c;" data-target="scheme">&nbsp;</span><b>Comment Tags</b><span>Color of comment tags right next to article titles</span></a>'+
	
	'<a href="javascript:void(0);" class="color-changer"><span class="color-picker" style="background:#232323;" data-target="links">&nbsp;</span><b>Links Color</b><span>Color of Hyperlinks</span></a>'+
	
	'<a href="javascript:void(0);" class="color-changer"><span class="color-picker" style="background:#f6f6f6;" data-target="background-color">&nbsp;</span><b>Background Color</b><span>Background color &amp; image</span></a>'+
	
	'<span class="texture-changer"><br/>'+
		
		'<b style="margin-left:0px;">Background Texture</b><span style="margin-left:0px;">Choose Background Texture</span>'+
		'<font class="texture-pack">'+
			'<a href="#" class="background-bulb" style="background-image:url(\'images/texture-1.png\');">&nbsp;</a>'+
			'<a href="#" class="background-bulb" style="background-image:url(\'images/texture-2.png\');">&nbsp;</a>'+
			'<a href="#" class="background-bulb" style="background-image:url(\'images/texture-3.png\');">&nbsp;</a>'+
			'<a href="#" class="background-bulb" style="background-image:url(\'images/texture-4.png\');">&nbsp;</a>'+
			'<a href="#" class="background-bulb" style="background-image:url(\'images/texture-5.png\');margin-top:10px;">&nbsp;</a>'+
			'<a href="#" class="background-bulb" style="background-image:url(\'images/texture-6.png\');margin-top:10px;">&nbsp;</a>'+
			'<a href="#" class="background-bulb" style="background-image:url(\'images/texture-7.png\');margin-top:10px;">&nbsp;</a>'+
			'<a href="#" class="background-bulb" style="background-image:url(\'images/texture-8.png\');margin-top:10px;">&nbsp;</a>'+
		'</font>'+
		
	'</span>'+
	
	'<!-- END #color-select --></div>');
	
	$('.color-changer').iris({
		hide: true,
		width: 180,
		change: function(event, ui) {
			$(this).children().eq(0).css('background-color', ui.color.toString());
			var color = ui.color.toString();
			
			if($(this).children()[0].getAttribute('data-target') == "scheme"){
				jQuery("h2 a.article-comment-icon, h3 a.article-comment-icon, h4 a.article-comment-icon").css("color",color);
				jQuery("h2 a.article-comment-icon .comment-icon, h3 a.article-comment-icon .comment-icon, h4 a.article-comment-icon .comment-icon").css("background-color",color);
			}else
			if($(this).children()[0].getAttribute('data-target') == "background-color"){
				jQuery("body").css("background-color",color);
				jQuery("body").css("background-image","none");
			}else
			if($(this).children()[0].getAttribute('data-target') == "links"){
				jQuery(".content a").css("color",color);
			}else
			if($(this).children()[0].getAttribute('data-target') == "background"){
				jQuery("body").css("background",color);
			}
			
		}
	});
	
	$(".color-changer").click(function (){
		$(this).iris('toggle');
	});
	
	$(".background-bulb").click(function (){
		$("body").css('background-image', $(this).css("background-image"));
		return false;
	});
	
	$(".color-changer").mouseover(function (){
		if($(this).children()[0].getAttribute('data-target') == "scheme"){
			jQuery("h2 a.article-comment-icon, h3 a.article-comment-icon, h4 a.article-comment-icon").css("outline","rgba(0,0,0,0.6) dotted 4px");
		}else
		if($(this).children()[0].getAttribute('data-target') == "links"){
			jQuery(".content a").css("outline","rgba(0,0,0,0.6) dotted 4px");
		}
	}).mouseout(function (){
		if($(this).children()[0].getAttribute('data-target') == "scheme"){
			jQuery("h2 a.article-comment-icon, h3 a.article-comment-icon, h4 a.article-comment-icon").css("outline","none");
		}else
		if($(this).children()[0].getAttribute('data-target') == "links"){
			jQuery(".content a").css("outline","none");
		}
	});
	
	jQuery("#icon-brush").click(function(){
		if(jQuery(this).parent().attr('class') == "active"){
			jQuery(this).parent().attr("class","");
			jQuery(".farbtastic").hide();
		}else{
			jQuery(this).parent().attr("class","active");
		}
	});
});