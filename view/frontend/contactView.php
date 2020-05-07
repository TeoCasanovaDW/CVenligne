<?php

$title = 'Contact';

$style = 'rel="stylesheet" type="text/css" href="./public/css/styleContactView.css"';

$subtitle = 'Contact';

ob_start();

?>

<footer id="contact" class="sections">

	<form id="formContact" class="text" action="index.php?action=mail" method="post">
		
		<label>Nom :</label>
		<input type="text" name="nom" placeholder="Saisissez vôtre nom" id="nom">

		<label>Objet :</label>
		<input type="text" name="objet" placeholder="Saisissez l'objet de vôtre message" id="objet">

		<label>Message :</label>
		<input type="text" name="message" placeholder="Saisissez vôtre message" id="message">

		<input type="submit" name="envoyer" value="Envoyer" id="submit">

	</form>

</footer>

<script type="text/javascript" src="./public/js/contactView.js"></script>

<?php

$content = ob_get_clean();

require('./view/template.php');

?>