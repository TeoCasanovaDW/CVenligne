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

	/* MENU RESPONSIVE */

	let navButton = $('.fa-bars');
	let navBar = $('#navbar');
	let navUl = $('#nav-ul');
	let navLi = $('#nav-li');
	let navA = $('#nav-a');
	let navBarIsOpen = false;

	navButton.on('click', ()=>{
		navBar.toggleClass("navBarOpen");		
	});

	/*AJAX/PROJECTS*/

	$.ajax({
	   url : 'http://localhost/CVenligne_wamp/index.php?action=json',
	   type : 'GET',
	   dataType : 'json',
	}).done((data)=>{
		$.each(data.result.projects, (i)=>{
			console.log(data.result.projects);
			$("#image" + (i+1)).attr( "style", "background-image: url(" + data.result.projects[i].img + ")");
			$("#titles" + (i+1)).html(data.result.projects[i].title);
			$("#title" + (i+1)).html(data.result.projects[i].title);
			$("#desc" + (i+1)).html(data.result.projects[i].miniDesc + " ...");
			$("#project_link" + (i+1)).attr( "href", data.result.projects[i].project_link );
			$("#img" + (i+1)).attr( "src", data.result.projects[i].img );
			$("#description" + (i+1)).html(data.result.projects[i].description);
			$("#skill" + (i+1)).html(data.result.projects[i].skills);
			$("#date" + (i+1)).html(data.result.projects[i].creation_date);
		});	
	});

});