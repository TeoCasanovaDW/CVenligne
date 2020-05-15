$(()=>{

	/* Effet Scroll */

	$('.scroll').on('click', function() {
		let sections = $(this).attr('href');
		$('html, body').animate( { scrollTop: $(sections).offset().top }, 'slow' );
		return false;
	});

	/* PARALLAX */

	const parallax = $('.titles');

	$(document).scroll(()=>{
		parallax.css("backgroundPositionY", "" + -window.scrollY / 4 + "px");
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
	   url : 'http://teo-casanova.alwaysdata.net/CVenligne-_-/index.php?action=json',
	   type : 'GET',
	   dataType : 'json',
	}).done((data)=>{
		$.each(data.result.projects, (i)=>{
			console.log(i+1);
			let nb = data.result.projects[i].id;

			/* CREATE ELEMENTS */

			$('<a href="index.php?action=project&amp;p_id=' + nb + '" id="ocr' + nb + '"></a>').appendTo($('.containerpf'));
			$('<div class="pfelements" id="image' + nb + '"></div>').appendTo($('#ocr' + nb));
			$('<div id="descriptions' + nb + '" class="desc"></div>').appendTo($('#image' + nb));
			$('<h5 id="titles' + nb + '"></h5>').appendTo($('#descriptions' + nb));
			$('<p id="desc' + nb + '"></p>').appendTo($('#descriptions' + nb));

			/* ADD CONTENT */

			$("#image" + nb).attr( "style", "background-image: url(./uploads/" + data.result.projects[i].img + ")");
			$("#desc" + nb).html(data.result.projects[i].miniDesc + " ...");
			$("#titles" + nb).html(data.result.projects[i].title);
			$("#title" + nb).html(data.result.projects[i].title);
			$("#project_link" + nb).attr( "href", data.result.projects[i].project_link );
			$("#img" + nb).attr( "src", "./uploads/" + data.result.projects[i].img );
			$("#description" + nb).html(data.result.projects[i].description);
			$("#skill" + nb).html(data.result.projects[i].skills);
			$("#date" + nb).html(data.result.projects[i].creation_date);
		});	 
	});
});