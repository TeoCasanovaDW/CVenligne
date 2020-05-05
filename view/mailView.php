<?php

$title = 'Contact';

$style = 'rel="stylesheet" type="text/css" href="./public/css/styleMailView.css"';

$subtitle = 'Envoi du mail';

ob_start();

?>

<div id="sendMail">
	
	<?php
	    $retour = mail('teo.casanova13@gmail.com', $_POST['objet'], $_POST['message']);
	    if ($retour) {
	        echo '<p>Votre message a bien été envoyé.</p>';
	    }
	    else{
	    	throw new \Exception('Echec de l\'envoi du mail');
	    	
	    }
	?>

</div>

<?php

$content = ob_get_clean();

require('template.php');

?>