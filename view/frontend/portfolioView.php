<?php

$title = 'Portfolio';

$style = 'rel="stylesheet" type="text/css" href="./public/css/stylePortfolioView.css"';

$subtitle = 'Portfolio';

ob_start();

?>

<section id="portfolio" class="sections">

	<div class="containerpf"></div>

</section>

<?php

$content = ob_get_clean();

?>

<?php require('./view/template.php'); ?>