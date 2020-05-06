<?php

$title = 'Modification commentaire';

$style = 'rel="stylesheet" type="text/css" href="./public/css/styleModifyCommentView.css"';

$subtitle = 'Modification commentaire';

ob_start();

?>

<section id="modifyComment">

	<h3>Ancien commentaire :</h3>

	<p id="ancienCom"><?= htmlspecialchars($old_comment['content']); ?></p>

	<h3>Nouveau commentaire :</h3>

	<form id="formNewComment" action="index.php?action=editComment&amp;comment_id=<?= $_GET['comment_id'] ?>" method="post">
		
		<input type="text" name="newComment" id="newComment" value="<?= htmlspecialchars($old_comment['content']); ?>" />
		<input type="submit" name="valider" value="Valider" id="valider">

	</form>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('./view/template.php'); ?>