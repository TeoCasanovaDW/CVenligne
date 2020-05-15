<?php 

$title = 'Administration';

$style = 'rel="stylesheet" type="text/css" href="./public/css/styleAdminUpdateView.css"';

$subtitle = 'Mise à jour d\'un projet';

ob_start();

?>

<section id="oldProject">

	<h3>Ancien projet :</h3>
		
	<h3 id="projectTitle"><?= htmlspecialchars($displayProjectToUpdate['title']) ?></h3>

	<article>

		<a href="<?= $displayProjectToUpdate['project_link'] ?>">

			<img src="./uploads/<?= $displayProjectToUpdate['img'] ?>" />

		</a>

		<div class="content"><?= htmlspecialchars($displayProjectToUpdate['description']) ?></div>

		<h5 class="skills">Compétences :</h5>

		<div class="skills"><?= $displayProjectToUpdate['skills'] ?></div>

		<a href="index.php?action=adminPage">Retour à la page d'administration</a>
 
	</article>

</section>

<div id="update">

	<h3>Nouveau projet :</h3>

	<form id="formUpdatePost" action="index.php?action=updateProject&amp;p_id=<?= $displayProjectToUpdate['id'] ?>" method="post" enctype="multipart/form-data">

		<label for="title">Titre :</label>
		<input type="text" name="titleUpdated" value="<?= $displayProjectToUpdate['title'] ?>"/>
		<br>
		<label for="project_link">Lien du projet :</label>
		<input type="text" name="project_linkUpdated" value="<?= $displayProjectToUpdate['project_link'] ?>"/>
		<br>
		<label for="desc">Description :</label>
		<textarea type="text" name="descUpdated" class="mytextarea" value="<?= $displayProjectToUpdate['description'] ?>"></textarea>
		<br>
		<label for="skills">Compétences :</label>
		<input type="text" name="skillsUpdated" id="skillsUpdated" value="<?= $displayProjectToUpdate['skills'] ?>">
		<br>
		<label>Image :</label>
		<input type="file" name="imageUpdated" id="imageUpdated"/>
		<input type="submit" name="valider">

	</form>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('./view/template.php'); ?>