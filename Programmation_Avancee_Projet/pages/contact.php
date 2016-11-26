<?php
if(isset($_POST['Envoyer'])) {
		$to = "damien.drugmand@condorcet.be";
		$subject = "Formulaire de contact";
		$name_field = $_POST['name'];
		$email_field = $_POST['email'];
		$message = $_POST['message'];

		$body = "From: $name_field\n E-Mail: $email_field\n Message:\n $message";
		
		echo "<p>Votre message a bien été envoyé !</p>";
		mail($to, $subject, $body);
	} 
?>
<h2>Formulaire de contact</h2>

<form method="POST" action="index.php">
<input type="text" name="name" size="19" placeholder="Nom"><br>
<br>
<input type="email" name="email" size="19" placeholder="E-Mail"><br>
<br>
<textarea rows="9" name="message" cols="30" placeholder="Tapez ici votre message"></textarea>
<br>
<br>
<input class="button" type="submit" value="Envoyer" name="Envoyer">
</form>
<h2>Accès</h2>
<p>En voiture : autoroute de Paris, sortie n°24</br>
En train : descendre à la gare de Mons, navette gratuite pour rejoindre le complexe (navette D, 8ème arrêt)</p>
<h2>Où nous trouver</h2>
<p>Demanix Mons</br>
Boulevard André Delvaux, 1</br>
7000 MONS (HAINAUT - BELGIQUE)</p>
<img class="map" src="././admin/images/map.png" alt="contact" />

