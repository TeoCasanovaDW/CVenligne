<?php

$title = 'Accueil';

$style = 'rel="stylesheet" type="text/css" href="./public/css/styleHomeView.css" id="feuilleDeStyle"';

$subtitle = 'Accueil';

ob_start();

?>

<section id="siteDesc">

	<h4>Description du site</h4>
	
	<div>
		
		<p>Bonjour, je vous souhaite la bienvenue sur mon CV en ligne ! Sur cette page d'accueil, vous pouvez retrouver une brève description de moi ainsi que de mon parcours. Ensuite, sur la page Formations & Diplomes, vous retrouverez les formations que j'ai éffectuées. Le plus interressant se trouve sans aucun doute dans la page Portfolio où vous trouverez tout les projets auquels j'ai participé. Pour finir, vous disposez d'une page Contact si vous souhaitez me contacter</p>

	</div>

</section>

<section id="desc" class="sections">

	<h4>Description</h4>

	<div id="text">

		<p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

	</div>

</section>

<?php

$content = ob_get_clean();

require('template.php');

?>