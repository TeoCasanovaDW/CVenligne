<?php

$title = 'Contact';

$style = 'rel="stylesheet" type="text/css" href="./public/css/styleContactView.css"';

$subtitle = 'Contact';

ob_start();

?>

<footer id="contact" class="sections">

	<form class="text" action="index.php?action=mail" method="post">
		
		<label>Nom :</label>
		<input type="text" name="nom" placeholder="Saisissez vôtre nom">

		<label>Objet :</label>
		<input type="text" name="objet" placeholder="Saisissez l'objet de vôtre message">

		<label>Message :</label>
		<input type="text" name="message" placeholder="Saisissez vôtre message">

		<input type="submit" name="envoyer" value="Envoyer">

	</form>

</footer>

<?php

$content = ob_get_clean();

require('./view/template.php');

?>