<?php

$title = 'Projet';

$style = 'rel="stylesheet" type="text/css" href="./public/css/styleProjectView.css"';

$subtitle = 'Projet';

ob_start();

while ($données = $project->fetch()) {
?>

<section id="projets">
	
	<h3><?= $données['title'] ?></h3>

	<article>

		<a href="<?= $données['project_link'] ?>">

			<img src="<?= $données['img'] ?>" />

		</a>

		<div class="content"><?= $données['description'] ?></div>

		<a href="index.php?action=portfolio">Retour aux projets</a>

	</article>

</section>

<?php
}
?>

<section id="comments">

	<h3>Commentaires</h3>

	<div>
		<?php
		while($comment = $comments->fetch()){
		?>
		
		<p><?= '<span><strong>' . htmlspecialchars($comment['name']) . '</strong> le ' . $comment['creation_date_fr'] . '</span> : ' . htmlspecialchars($comment['content']) ?></p>

		<a href="index.php?action=report&amp;comment_id=<?= $comment['id'] ?>">(Signaler)</a>

		<?php
		}
		?>
	</div>

	<h3>Ajouter un commentaire</h3>
	
	<form method="post" action="index.php?action=addComment&amp;p_id=<?= $_GET['p_id'] ?>">
		<label for="name">Nom :</label>
		<input type="text" name="name" id="name">

		<label for="firstname">Prénom :</label>
		<input type="text" name="firstname" id="firstname">

		<label for="content">Message :</label>
		<textarea name="content" id="content"></textarea>

		<input type="submit" name="Envoyer" value="Envoyer">

	</form>

</section>

<?php

$content = ob_get_clean();

?>

<?php require('template.php'); ?>