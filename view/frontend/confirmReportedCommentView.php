<?php 

$title = 'Connexion Administrateur';

$style = 'rel="stylesheet" type="text/css" href="public/css/styleConfirmReportedCommentView.css"';

$subtitle = 'Commentaire signalé';

ob_start();

?>

<div id="reported">Le commentaire à bien été signalé.</div>

<?php $content = ob_get_clean(); ?>

<?php require('./view/template.php'); ?>