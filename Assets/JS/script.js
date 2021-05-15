function menuMobile() {
	var x = document.querySelector('.menu-header-mobile');

	if(x.style.display === 'block') {
		x.style.display = 'none';
	} else {
		x.style.display = 'block';
	}
}


function letreiro(elemento) {
	const textArray = elemento.innerHTML.split('');
	elemento.innerHTML = '';
	textArray.forEach((letra, i) => {
		setTimeout(() => {
			elemento.innerHTML += letra;
		}, 200 * i);
	});

}

const texto = document.querySelector('.p-active');
letreiro(texto);


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