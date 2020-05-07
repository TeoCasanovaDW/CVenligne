/* VALIDATION DES FORMULAIRES */

	let form = $("#formContact");
	let input1 = $('#nom');
	let input2 = $('#objet');
	let input3 = $('#message');
	let submit = $('#submit');

	form.on('click', ()=>{
		if (input1.val() && input2.val() && input3.val()) {
			submit.prop("disabled", false);
			submit.css('background-color', '#FFF');
			submit.css('color', '#103049');
		}
		else{
			submit.prop("disabled", true);
			submit.css('background-color', 'grey');
		}
	});