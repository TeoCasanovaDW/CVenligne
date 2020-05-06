<?php

$title = 'Accueil';

$style = 'rel="stylesheet" type="text/css" href="./public/css/styleHomeView.css" id="feuilleDeStyle"';

$subtitle = 'Accueil';

ob_start();

?>

<section id="siteDesc">

	<h4>Description du site</h4>
	
	<div>
		
		<p>Bonjour, je vous souhaite la bienvenue sur mon CV en ligne ! Sur cette page d'accueil, vous pouvez retrouver une brève <a href="#desc">description de moi</a> ainsi que de mon parcours. Ensuite, sur la page <a href="index.php?action=formation">Formations & Diplomes</a>, vous retrouverez les formations que j'ai éffectuées. Le plus interressant se trouve sans aucun doute dans la page <a href="index.php?action=portfolio">Portfolio</a> où vous trouverez tout les projets auquels j'ai participé. Pour finir, vous disposez d'une page <a href="index.php?action=contact">Contact</a> si vous souhaitez me contacter</p>

	</div>

</section>

<section id="desc" class="sections">

	<h4>Description</h4>

	<div id="text">

		<p class="text">Bonjour, je m'apelle Téo Casanova et j'ai 22ans. Ancien nageur en compétition, je me suis premièrement tourné vers le monde de la natation, et, c'est comme cela que j'ai obtenu mon diplôme de maitre Nageur en 2017.<br/>
		Après trois années dans cette profession, je me suis reconverti en développeur web en suivant, premièrement, une formation sur Udemy, puis, une formation sur OpenClassRoom (<a href="https://openclassrooms.com/fr/paths/48-developpeur-web-junior">Développeur Web Junior</a>).
		</p>

	</div>

</section>

<?php

$content = ob_get_clean();

require('./view/template.php');

?>