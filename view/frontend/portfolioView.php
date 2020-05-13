<?php

$title = 'Portfolio';

$style = 'rel="stylesheet" type="text/css" href="./public/css/stylePortfolioView.css"';

$subtitle = 'Portfolio';

ob_start();

?>

<div id="menu">

	<nav id="menuPf">
			
		<ul>

			<li id="allProject">Tout les projets</li>
			<li id="udemyProject">Udemy</li>
			<li id="ocrProject">OpenClassRooms</li>
			<li id="integrationProject">Intégrations</li>

		</ul>

	</nav>

</div>

<section id="portfolio" class="sections">

	<div class="containerpf">

	<?php
	while ($données = $projects->fetch()):
	?>

		<a href="index.php?action=project&amp;p_id=<?= $données['id'] ?>" class="ocr">
			<div class="pfelements" id="image<?= $données['id'] ?>">
				<div class="desc">
					<h5 id="titles<?= $données['id'] ?>"></h5>
					<p id="desc<?= $données['id'] ?>"></p>
				</div>
			</div>
		</a>
	
	<?php
	endwhile;
	?>

	</div>

</section>

<?php

$content = ob_get_clean();

?>

<?php require('./view/template.php'); ?>