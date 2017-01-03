<?php
	header ("Refresh: 5;URL=Projet Web Final Version/index.php?page=accueil.php&nav=Accueil");
	if(isset($_POST['Envoyer'])) {
		$to = "damien.drugmand@condorcet.be";
		$subject = "Formulaire de contact";
		$name_field = $_POST['name'];
		$email_field = $_POST['email'];
		$message = $_POST['message'];

		$body = "From: $name_field\n E-Mail: $email_field\n Message:\n $message";
		$message1 = "Votre message a bien été envoyé!<br>Vous allez être à présent rediriger vers la page d'accueil";
		$message2 = "Une erreur s'est produite, veuillez recommencer";

		echo utf8_decode($message1);
		mail($to, $subject, $body);
	} else {
	echo utf8_decode($message2);
	}
?> 