<?php

$title = 'Erreur';

$style = 'rel="stylesheet" type="text/css" href="./public/css/styleErrorView.css"';

$subtitle = 'Erreur';

ob_start();

?>

<div id="errorMessage"><?= $errorMessage ?></div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>