window.addEvent('domready', function() {
	var status = {
		'true': 'open',
		'false': 'close'
	};
	
	mySlide1 = new Fx.Slide('page1', {mode: 'horizontal'});
	mySlide2 = new Fx.Slide('page2', {mode: 'horizontal'});
	mySlide3 = new Fx.Slide('page3', {mode: 'horizontal'});
	mySlide4 = new Fx.Slide('page4', {mode: 'horizontal'});
	mySlide5 = new Fx.Slide('page5', {mode: 'horizontal'});
	mySlide6 = new Fx.Slide('page6', {mode: 'horizontal'});
	//var mySlide7 = new Fx.Slide('page7', {mode: 'horizontal'});
	
	mySlide2.hide();
	mySlide3.hide();
	mySlide4.hide();
	mySlide5.hide();
	mySlide6.hide();
	//mySlide7.hide();

	$('l_slide1').addEvent('click', function(e){
		e.stop();
		$('l_slide1').style.textDecoration = 'underline';
		$('l_slide2').style.textDecoration = 'none';
		$('l_slide3').style.textDecoration = 'none';
		$('l_slide4').style.textDecoration = 'none';
		$('l_slide5').style.textDecoration = 'none';
		$('l_slide6').style.textDecoration = 'none';
		//$('l_slide7').style.textDecoration = 'none';
		mySlide1.slideIn();
		mySlide2.slideOut();
		mySlide3.slideOut();
		mySlide4.slideOut();
		mySlide5.slideOut();
		mySlide6.slideOut();
		//mySlide7.slideOut();
	});
	$('l_slide2').addEvent('click', function(e){
		e.stop();
		$('l_slide1').style.textDecoration = 'none';
		$('l_slide2').style.textDecoration = 'underline';
		$('l_slide3').style.textDecoration = 'none';
		$('l_slide4').style.textDecoration = 'none';
		$('l_slide5').style.textDecoration = 'none';
		$('l_slide6').style.textDecoration = 'none';
		//$('l_slide7').style.textDecoration = 'none';
		mySlide1.slideOut();
		mySlide2.slideIn();
		mySlide3.slideOut();
		mySlide4.slideOut();
		mySlide5.slideOut();
		mySlide6.slideOut();
		//mySlide7.slideOut();
	});
	$('l_slide3').addEvent('click', function(e){
		e.stop();
		$('l_slide1').style.textDecoration = 'none';
		$('l_slide2').style.textDecoration = 'none';
		$('l_slide3').style.textDecoration = 'underline';
		$('l_slide4').style.textDecoration = 'none';
		$('l_slide5').style.textDecoration = 'none';
		$('l_slide6').style.textDecoration = 'none';
		//$('l_slide7').style.textDecoration = 'none';
		mySlide1.slideOut();
		mySlide2.slideOut();
		mySlide3.slideIn();
		mySlide4.slideOut();
		mySlide5.slideOut();
		mySlide6.slideOut();
		//mySlide7.slideOut();
	});
	$('l_slide4').addEvent('click', function(e){
		e.stop();
		$('l_slide1').style.textDecoration = 'none';
		$('l_slide2').style.textDecoration = 'none';
		$('l_slide3').style.textDecoration = 'none';
		$('l_slide4').style.textDecoration = 'underline';
		$('l_slide5').style.textDecoration = 'none';
		$('l_slide6').style.textDecoration = 'none';
		//$('l_slide7').style.textDecoration = 'none';
		mySlide1.slideOut();
		mySlide2.slideOut();
		mySlide3.slideOut();
		mySlide4.slideIn();
		mySlide5.slideOut();
		mySlide6.slideOut();
		//mySlide7.slideOut();
	});
	$('l_slide5').addEvent('click', function(e){
		e.stop();
		$('l_slide1').style.textDecoration = 'none';
		$('l_slide2').style.textDecoration = 'none';
		$('l_slide3').style.textDecoration = 'none';
		$('l_slide4').style.textDecoration = 'none';
		$('l_slide5').style.textDecoration = 'underline';
		$('l_slide6').style.textDecoration = 'none';
		//$('l_slide7').style.textDecoration = 'none';
		mySlide1.slideOut();
		mySlide2.slideOut();
		mySlide3.slideOut();
		mySlide4.slideOut();
		mySlide5.slideIn();
		mySlide6.slideOut();
		//mySlide7.slideOut();
	});
	$('l_slide6').addEvent('click', function(e){
		e.stop();
		$('l_slide1').style.textDecoration = 'none';
		$('l_slide2').style.textDecoration = 'none';
		$('l_slide3').style.textDecoration = 'none';
		$('l_slide4').style.textDecoration = 'none';
		$('l_slide5').style.textDecoration = 'none';
		$('l_slide6').style.textDecoration = 'underline';
		//$('l_slide7').style.textDecoration = 'none';
		mySlide1.slideOut();
		mySlide2.slideOut();
		mySlide3.slideOut();
		mySlide4.slideOut();
		mySlide5.slideOut();
		mySlide6.slideIn();
		//mySlide7.slideOut();
	});
	/*$('l_slide7').addEvent('click', function(e){
		e.stop();
		$('l_slide1').style.textDecoration = 'none';
		$('l_slide2').style.textDecoration = 'none';
		$('l_slide3').style.textDecoration = 'none';
		$('l_slide4').style.textDecoration = 'none';
		$('l_slide5').style.textDecoration = 'none';
		$('l_slide6').style.textDecoration = 'none';
		//$('l_slide7').style.textDecoration = 'underline';
		mySlide1.slideOut();
		mySlide2.slideOut();
		mySlide3.slideOut();
		mySlide4.slideOut();
		mySlide5.slideOut();
		mySlide6.slideOut();
		//mySlide7.slideIn();
	});*/
	
	// When Vertical Slide ends its transition, we check for its status
	// note that complete will not affect 'hide' and 'show' methods
	mySlide1.addEvent('complete', function() {
		//$('vertical_status').set('html', status[myVerticalSlide.open]);
	});

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