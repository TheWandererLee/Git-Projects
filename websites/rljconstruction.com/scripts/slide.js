window.addEvent('domready', function() {
	var status = {
		'true': 'open',
		'false': 'close'
	};
	
	var mySlide1 = new Fx.Slide('page1');
	var mySlide2 = new Fx.Slide('page2');
	var mySlide3 = new Fx.Slide('page3');
	var mySlide4 = new Fx.Slide('page4');
	var mySlide5 = new Fx.Slide('page5');
	var mySlide6 = new Fx.Slide('page6');
	
	mySlide2.hide();
	mySlide3.hide();
	mySlide4.hide();
	mySlide5.hide();
	mySlide6.hide();

	$('l_slide1').addEvent('click', function(e){
		e.stop();
		$('l_slide1').style.textDecoration = 'underline';
		$('l_slide2').style.textDecoration = 'none';
		$('l_slide3').style.textDecoration = 'none';
		$('l_slide4').style.textDecoration = 'none';
		$('l_slide5').style.textDecoration = 'none';
		$('l_slide6').style.textDecoration = 'none';
		mySlide1.slideIn();
		mySlide2.slideOut();
		mySlide3.slideOut();
		mySlide4.slideOut();
		mySlide5.slideOut();
		mySlide6.slideOut();
	});
	$('l_slide2').addEvent('click', function(e){
		e.stop();
		$('l_slide1').style.textDecoration = 'none';
		$('l_slide2').style.textDecoration = 'underline';
		$('l_slide3').style.textDecoration = 'none';
		$('l_slide4').style.textDecoration = 'none';
		$('l_slide5').style.textDecoration = 'none';
		$('l_slide6').style.textDecoration = 'none';
		mySlide1.slideOut();
		mySlide2.slideIn();
		mySlide3.slideOut();
		mySlide4.slideOut();
		mySlide5.slideOut();
		mySlide6.slideOut();
	});
	$('l_slide3').addEvent('click', function(e){
		e.stop();
		$('l_slide1').style.textDecoration = 'none';
		$('l_slide2').style.textDecoration = 'none';
		$('l_slide3').style.textDecoration = 'underline';
		$('l_slide4').style.textDecoration = 'none';
		$('l_slide5').style.textDecoration = 'none';
		$('l_slide6').style.textDecoration = 'none';
		mySlide1.slideOut();
		mySlide2.slideOut();
		mySlide3.slideIn();
		mySlide4.slideOut();
		mySlide5.slideOut();
		mySlide6.slideOut();
	});
	$('l_slide4').addEvent('click', function(e){
		e.stop();
		$('l_slide1').style.textDecoration = 'none';
		$('l_slide2').style.textDecoration = 'none';
		$('l_slide3').style.textDecoration = 'none';
		$('l_slide4').style.textDecoration = 'underline';
		$('l_slide5').style.textDecoration = 'none';
		$('l_slide6').style.textDecoration = 'none';
		mySlide1.slideOut();
		mySlide2.slideOut();
		mySlide3.slideOut();
		mySlide4.slideIn();
		mySlide5.slideOut();
		mySlide6.slideOut();
	});
	$('l_slide5').addEvent('click', function(e){
		e.stop();
		$('l_slide1').style.textDecoration = 'none';
		$('l_slide2').style.textDecoration = 'none';
		$('l_slide3').style.textDecoration = 'none';
		$('l_slide4').style.textDecoration = 'none';
		$('l_slide5').style.textDecoration = 'underline';
		$('l_slide6').style.textDecoration = 'none';
		mySlide1.slideOut();
		mySlide2.slideOut();
		mySlide3.slideOut();
		mySlide4.slideOut();
		mySlide5.slideIn();
		mySlide6.slideOut();
	});
	$('l_slide6').addEvent('click', function(e){
		e.stop();
		$('l_slide1').style.textDecoration = 'none';
		$('l_slide2').style.textDecoration = 'none';
		$('l_slide3').style.textDecoration = 'none';
		$('l_slide4').style.textDecoration = 'none';
		$('l_slide5').style.textDecoration = 'none';
		$('l_slide6').style.textDecoration = 'underline';
		mySlide1.slideOut();
		mySlide2.slideOut();
		mySlide3.slideOut();
		mySlide4.slideOut();
		mySlide5.slideOut();
		mySlide6.slideIn();
	});
	
	// When Vertical Slide ends its transition, we check for its status
	// note that complete will not affect 'hide' and 'show' methods
	mySlide1.addEvent('complete', function() {
		//$('vertical_status').set('html', status[myVerticalSlide.open]);
	});




	//--horizontal
	/* var myHorizontalSlide = new Fx.Slide('horizontal_slide', {mode: 'horizontal'});

	$('h_slidein').addEvent('click', function(e){
		e.stop();
		myHorizontalSlide.slideIn();
	});

	$('h_slideout').addEvent('click', function(e){
		e.stop();
		myHorizontalSlide.slideOut();
	});

	$('h_toggle').addEvent('click', function(e){
		e.stop();
		myHorizontalSlide.toggle();
	});

	$('h_hide').addEvent('click', function(e){
		e.stop();
		myHorizontalSlide.hide();
		$('horizontal_status').set('html', status[myHorizontalSlide.open]);
	});
	
	$('h_show').addEvent('click', function(e){
		e.stop();
		myHorizontalSlide.show();
		$('horizontal_status').set('html', status[myHorizontalSlide.open]);
	});
	
	// When Horizontal Slide ends its transition, we check for its status
	// note that complete will not affect 'hide' and 'show' methods
	myHorizontalSlide.addEvent('complete', function() {
		$('horizontal_status').set('html', status[myHorizontalSlide.open]);
	}); */
});