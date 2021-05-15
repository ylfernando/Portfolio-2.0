/*Scroll conteúdos*/

$('.nav-scroll a[href^="#"]').click(function(e){
	e.preventDefault();
	var id = $(this).attr('href'),
			menuHeight = $('.header').innerHeight(),
			targetOffset = $(id).offset().top;
	
	$('html, body').animate({
		scrollTop: targetOffset - menuHeight
	}, 500);
});

/*Scroll Footer*/

$('.menu-footer a[href^="#"]').click(function(e){
	e.preventDefault();
	var id = $(this).attr('href'),
			menuHeight = $('.header').innerHeight(),
			targetOffset = $(id).offset().top;
	
	$('html, body').animate({
		scrollTop: targetOffset - menuHeight
	}, 500);
});