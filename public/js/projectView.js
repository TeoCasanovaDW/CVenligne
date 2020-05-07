/* VALIDATION DES FORMULAIRES */

	let form = $("#formAddComment");
	let input1 = $('#name');
	let input2 = $('#firstname');
	let input3 = $('#content');
	let submit = $('#submit');

	form.on('click', ()=>{
		if (input1.val() && input2.val() && input3.val()) {
			submit.prop("disabled", false);
			submit.css('background-color', '#FFF');
		}
		else{
			submit.prop("disabled", true);
			submit.css('background-color', 'grey');
		}
	});