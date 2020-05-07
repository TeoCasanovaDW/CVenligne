<?php 

$title = 'Connexion Administrateur';

$style = 'rel="stylesheet" type="text/css" href="public/css/styleConnexionAdminView.css"';

$subtitle = 'Page de connexion';

ob_start();

?>

<section id="connexion">

	<form id="formAdminConnect" action="index.php?action=adminConnect" method="post">
		
		<label>Identifiant :</label>
		<input type="text" name="user" id="user">
		<label>Mot de passe :</label>
		<input type="password" name="password" id="password">
		<input type="submit" name="valider" id="submit">

	</form>

</section>

<script type="text/javascript" src="./public/js/connexionAdminView.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require('./view/template.php'); ?>