<!DOCTYPE html>

<html lang="fr">

	<head>

		<title><?= $title ?></title>
		<meta charset="utf-8">

		<!-- Feuilles de style -->

		<link <?= $style ?> />
		<link rel="stylesheet" type="text/css" href="./public/css/style.css" id="feuilleDeStyle">

		<!-- Metatags -->
		<!-- Facebook -->

		<meta property="og:title" content="Téo Casanova">
		<meta property="og:description" content="Ce site est voué à vous montrer mes formations ainsi que mes intégrations et autres projets.">
		<meta property="og:image" content="http://euro-travel-example.com/thumbnail.jpg">
		<meta property="og:url" content="http://euro-travel-example.com/index.htm">

		<!-- Twitter -->

		<meta name="twitter:title" content="Téo Casanova">
		<meta name="twitter:description" content="Ce site est voué à vous montrer mes formations ainsi que mes intégrations et autres projets.">
		<meta name="twitter:image" content=" http://euro-travel-example.com/thumbnail.jpg">
		<meta name="twitter:card" content="summary_large_image">

		<!-- Viewport -->

		<meta name="viewport" content="width=device-width, initial-scale = 1">
		<link rel="stylesheet" type="text/css" media="screen and (max-width: 1050px)" href="./public/css/petite_resolution.css">
		<link rel="stylesheet" type="text/css" media="screen and (max-width: 845px)" href="./public/css/mini_resolution.css">

		<!-- Font-awesome -->

		<script src="https://kit.fontawesome.com/30f5d53ec1.js" crossorigin="anonymous"></script>

		<!-- jQuery -->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

	</head>

<body>

<header>
	
	<nav id="navbar">
		
		<ul id="nav-ul">

			<li class="nav-li"><a href="index.php?action=home" class="scroll nav-a">Accueil</a></li>
			<li class="nav-li"><a href="index.php?action=formation" class="scroll nav-a">Formations</a></li>
			<li class="nav-li"><a href="index.php?action=portfolio" class="scroll nav-a">Portfolio</a></li>
			<li class="nav-li"><a href="index.php?action=contact" class="scroll nav-a">Contact</a></li>
			<li class="nav-li"><a class="nav-a" href="index.php?action=<?php
            if(isset($_SESSION['isLoggedIn'])):
                if($_SESSION['isLoggedIn']):
                    echo 'adminPage';
                else:
                    echo 'connexionPage';
                endif;
            else:
                echo 'connexionPage';
            endif;
                ?>"><?php
            if (isset($_SESSION['isLoggedIn'])):
                if (!$_SESSION['isLoggedIn']):
                    echo 'Connexion';
                else:
                    echo 'Admin';
                endif;
            else:
                echo 'Connexion';
            endif;
            ?></a></li>
            <li class="nav-li"><a class="nav-a" href="index.php?action=deconnexion" style="visibility:<?php
            if (isset($_SESSION['isLoggedIn'])):
                if ($_SESSION['isLoggedIn']):
                    echo "visible";
                else:
                    echo "hidden";
                endif;
            else:
                echo "hidden";
            endif;
            ?>">Déconnexion</a></li>

		</ul>

		<i class="fas fa-bars"></i>

	</nav>

	<div id="back">

		<div id="reseaux" class="allInfosOnMe">

			<div id="words" class="res">
				
				<h2><a href="https://www.linkedin.com/in/t%C3%A9o-casanova-33632613b/">Linkedin</a></h2>
				<h2><a href="https://www.malt.fr/profile/teocasanova">Malt</a></h2>
				<h2><a href="https://github.com/TeoCasanovaDW">Github</a></h2>
				<h2><a href="#">Twitter</a></h2>				

			</div>

			<div id="icons" class="res">

				
				<a href="https://www.linkedin.com/in/t%C3%A9o-casanova-33632613b/"><i class="fab fa-linkedin"></i></a>

				<a href="https://www.malt.fr/profile/teocasanova"><i class="fab fa-medium-m"></i></a>

				<a href="#"><i class="fab fa-github"></i></a>

				<a href="#"><i class="fab fa-twitter"></i></a>

			</div>

		</div>

		<div id="pp">
			
			<div id="bvn">
			
				<span class="letters" id="l1">B</span>
				<span class="letters" id="l2">i</span>
				<span class="letters" id="l3">e</span>
				<span class="letters" id="l4">n</span>
				<span class="letters" id="l5">v</span>
				<span class="letters" id="l6">e</span>
				<span class="letters" id="l7">n</span>
				<span class="letters" id="l8">u</span>
				<span class="letters" id="l9">e</span>

			</div>

		</div>

		

		<div id="infos" class="allInfosOnMe">
			
			<ul>
				
				<li>Téo Casanova</li>
				<li>22ans</li>
				<li>Développeur web</li>
				<li><a href="<?php
				if(isset($_GET['action'])):
					if($_GET['action'] == 'home'):
						echo '#desc';
					else:
						echo 'index.php?action=home';
					endif;
				else:
					echo '#desc';
				endif;
				?>" class="scroll">Plus d'info</a></li>

			</ul>

		</div>

	</div>

</header>

<div id="separator"></div>

<div class="titles">

	<h3><?= $subtitle ?></h3>

	<div class="triangles">
			
		<div class="tri"></div>
		<div class="tri"></div>
		<div class="tri"></div>

	</div>

</div>

<script src="./public/js/index.js"></script>

<?= $content ?>

</body>

</html>