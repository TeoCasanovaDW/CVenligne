$(()=>{

	/* Effet Scroll */

	$('.scroll').on('click', function() {
		let sections = $(this).attr('href');
		$('html, body').animate( { scrollTop: $(sections).offset().top }, 'slow' );
		return false;
	});

	/* Portfolio */

	$("#ocrProject").on("click", ()=>{
		$(".udemy").css("display", "none");
		$(".integration").css("display", "none");
	});

	/* PARALLAX */

	const parallax = $('.titles');

	$(document).scroll(()=>{
		parallax.css("backgroundPositionY", "" + -window.scrollY / 4 + "px");
	});

	/* NOIR BLANC */

	const button = $("#switchRound");
	let feuilleCss = $('#feuilleDeStyle');
	let etat = true;

	button.on('click', ()=>{
		if(etat){
			button.css('left', '10px');
			feuilleCss.attr("href", "blanc.css");
			etat = false;
		}
		else{
			button.css('left', '45px');
			feuilleCss.attr("href", "style.css");
			etat = true;
		}
		
	});

	

});