<?php

$title = 'Formation/Diplome';

$style = 'rel="stylesheet" type="text/css" href="./public/css/styleFormationDiplomeView.css"';

$subtitle = 'Formation / Diplomes';

ob_start();

?>


<section id="formation" class="sections">

	<div id="container" class="text">

		<div class="formations">

			<h4>Udemy</h4>
			<p>Formation Complète Développeur Web</p>

		</div>

		<div class="formations">

			<h4>OpenClassRooms</h4>
			<p>Formation Développeur Web Junior</p>

		</div>

	</div>

	<div id="diplome" class="text"></div>

</section>

<?php

$content = ob_get_clean();

require('template.php');

?>