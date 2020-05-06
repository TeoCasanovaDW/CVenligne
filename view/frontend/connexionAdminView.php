<?php 

$title = 'Connexion Administrateur';

$style = 'rel="stylesheet" type="text/css" href="public/css/styleConnexionAdminView.css"';

$subtitle = 'Page de connexion';

ob_start();

?>

<section id="connexion">

	<form id="formAdminConnect" action="index.php?action=adminConnect" method="post">
		
		<label>Identifiant :</label>
		<input type="text" name="user">
		<label>Mot de passe :</label>
		<input type="password" name="password">
		<input type="submit" name="valider">

	</form>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('./view/template.php'); ?>