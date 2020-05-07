/* VALIDATION DES FORMULAIRES */

	let form = $("#formAdminConnect");
	let input1 = $('#user');
	let input2 = $('#password');
	let submit = $('#submit');

	form.on('click', ()=>{
		if (input1.val() && input2.val()) {
			submit.prop("disabled", false);
			submit.css('background-color', '#FFF');
		}
		else{
			submit.prop("disabled", true);
			submit.css('background-color', 'grey');
		}
	});