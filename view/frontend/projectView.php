<?php

$title = 'Projet';

$style = 'rel="stylesheet" type="text/css" href="./public/css/styleProjectView.css"';

$subtitle = 'Projet';

ob_start();

while ($données = $project->fetch()):
?>

<section id="projets">
	
	<h3 id="title<?= $données['id'] ?>"></h3>

	<article>

		<a id="project_link<?= $données['id'] ?>">

			<img id="img<?= $données['id'] ?>"/>

		</a>

		<div id="date<?= $données['id'] ?>" class="dates"></div>

		<div id="description<?= $données['id'] ?>" class="content"></div>

		<h5 class="skills">Compétences :</h5>

		<div id="skill<?= $données['id'] ?>" class="skills"></div>

		<a href="index.php?action=portfolio">Retour aux projets</a>

	</article>

</section>

<?php
endwhile;
?>

<section id="comments">

	<h3>Commentaires</h3>

	<div>
		<?php
		while($comment = $comments->fetch()):
		?>
		
		<p><?= '<span><strong>' . htmlspecialchars($comment['name']) . '</strong> le ' . $comment['creation_date_fr'] . '</span> : ' . htmlspecialchars($comment['content']) ?></p>

		<a href="index.php?action=report&amp;comment_id=<?= $comment['id'] ?>">(Signaler)</a>

		<?php
		endwhile;
		?>
	</div>

	<h3>Ajouter un commentaire</h3>
	
	<form method="post" action="index.php?action=addComment&amp;p_id=<?= $_GET['p_id'] ?>" id="formAddComment">
		<label for="name">Nom :</label>
		<input type="text" name="name" id="name">

		<label for="firstname">Prénom :</label>
		<input type="text" name="firstname" id="firstname">

		<label for="content">Message :</label>
		<textarea name="content" id="content"></textarea>

		<input type="submit" name="Envoyer" value="Envoyer" id="submit">

	</form>

</section>

<script type="text/javascript" src="./public/js/projectView.js"></script>

<?php

$content = ob_get_clean();

?>

<?php require('./view/template.php'); ?>