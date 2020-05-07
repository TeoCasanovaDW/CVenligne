<?php

$title = 'Administration';

$style = 'rel="stylesheet" type="text/css" href="./public/css/styleAdminView.css"';

$subtitle = 'Administration';

ob_start();

?>

<div id="create">

	<h3 class="sous-titre">Créer un projet</h3>

	<form id="formCreatePost" action="index.php?action=createPost" method="post">

		<label for="title">Titre :</label>
		<input type="text" name="titleCreated"/>
		<br>
		<label for="project_link">Lien du projet :</label>
		<input type="text" name="project_link"/>
		<br>
		<label for="desc">Description :</label>
		<textarea type="text" name="desc" class="mytextarea"></textarea>
		<br>
		<label>Image :</label>
		<input type="file" name="image"/>
		<input type="submit" name="valider">

	</form>

</div>

<?php
while ($data = $project->fetch()):
?>

<section id="projets">
	
	<h3><?= $data['title'] ?></h3>

	<article>

		<a href="<?= $data['project_link'] ?>">

			<img src="<?= $data['img'] ?>" />

		</a>

		<div class="content"><?= $data['description'] ?></div>

		<a id="updateLink" href="index.php?action=adminUpdatePage&amp;p_id=<?= $data['id'] ?>">Mettre le projet à jour</a>
		<a href="index.php?action=deleteProject&amp;p_id=<?= $data['id'] ?>">Supprimer le projet</a>

	</article>

</section>

<?php
endwhile;
?>

<div id="comments">

	<h3>Commentaires</h3>

	<div id="commentSpace">

		<?php
		while ($comment = $comments->fetch()):
			if ($comment['report'] > 0):
		?>

			<h4>Billet n°<?= htmlspecialchars($comment['project_id']) ?> : </h4>

			<p>
				<?= 'De <strong>' . htmlspecialchars($comment['name']) . '</strong> le ' . $comment['creation_date'] . ' :<br><p id="com">' . htmlspecialchars($comment['content']) . '</p>'?>
			</p>
			<a href="index.php?action=commentEditor&amp;comment_id=<?= $comment['id'] ?>">(Modifier)</a>
			<a href="index.php?action=deleteComment&amp;comment_id=<?= $comment['id'] ?>">(Supprimer)</a>
			<a href="index.php?action=removeReport&amp;comment_id=<?= $comment['id'] ?>">(Enlever le signalement)</a>
			

		<?php
			endif;
		endwhile;
		?>
		<div id="pagination">
		<?php
			for($i=1;$i<=$totalPages;$i++):
				if ($i == $currentPage):
					echo '<p>' . $i . '</p>';
				
				else:
					echo '<a href="index.php?action=adminPage&amp;page='.$i.'">'.$i.'</a>';
				endif;
			endfor;
		?>
		</div>

	</div>

</div>

<?php

$content = ob_get_clean();

require('./view/template.php');

?>