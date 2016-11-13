<h2>Remplissez le formulaire suivant pour réserver votre ticket :</h2>
<?php
$flag=0;
if(isset($_GET['envoyer']))
{
	if($_GET['nom']!="" && $_GET['prenom']!="" && $_GET['email']!="")
	{
		if(isset($_GET['choix_jour']))
		{
			if(isset($_GET['choix_heure']))
			{
				$flag=1;
				echo "<p class=\"recap\">";
				echo "NOM : ".$_GET['nom']."<br><br>";
				echo "PRENOM : ".$_GET['prenom']."<br><br>";
				echo "EMAIL : ".$_GET['email']."<br><br>";
				echo "Vous avez choisi de voir le film"." ce ".$_GET['choix_jour']." à ".$_GET['choix_heure'];
				$query="INSERT INTO reservation(nom,prenom,email,jour,heure,id_film,nom_film)
				values('".$_GET['nom']."','".$_GET['prenom']."','".$_GET['email']."','".$_GET['choix_jour']."',
				'".$_GET['choix_heure']."',".$_GET['id_film'].",'".$_GET['nom_film']."')";
				$result=pg_query($cnx,$query);
				if($result)
				{
					echo "</br></br>Votre réservation a bien été enregistrée
					<br>Vous allez être à présent rediriger vers la page d'accueil<br><br>";
					header ("Refresh: 15;URL=index.php?page=accueil.php&nav=Accueil");
				}
				echo "</p>";
				}
		}
		else
		{
			echo "<span class='rouge'>Vous devez effectuer un choix</span>";
		}
	}
	else
	{
		echo "<span class='rouge'>Vous devez vous identifier</span>";
	}
}
?>

<?php if($flag==0)
	  { ?>
		<form action="index.php" method="get">
		<table id="inscrire">
			<tr>
				<td><label class="gras" for="nom">Nom</label></td>
				<td><input type="text" name="nom" id="nom" placeholder="Nom"/></td>
			</tr>
			<tr><td>&nbsp </td></tr>
			<tr>
				<td><label class="gras" for="nom">Prénom</label></td>
				<td><input type="text" name="prenom" id="prenom" placeholder="Prénom"/></td>
			</tr>
			<tr><td>&nbsp </td></tr>
			<tr>
				<td><label class="gras" for="nom">E-Mail</label></td>
				<td><input type="email" name="email" id="email" placeholder="E-Mail"/></td>
			</tr>
			<tr><td>&nbsp </td></tr>
			<tr>
				<td class="gras">Sélectionnez le jour qui vous intéresse</td>
			</tr>
			<tr class="choix">
				<td><label for="lundi">Lundi</label></td>
				<td><input type="radio" name="choix_jour" value="lundi"/></td>
			</tr>
			<tr class="choix">
				<td><label for="mardi">Mardi</label></td>
				<td><input type="radio" name="choix_jour" value="mardi"/></td>
			</tr>
			<tr class="choix">
				<td><label for="vendredi">Mercredi</label></td>
				<td><input type="radio" name="choix_jour" value="mercredi"/></td>
			</tr>
			<tr class="choix">
				<td><label for="vendredi">Jeudi</label></td>
				<td><input type="radio" name="choix_jour" value="jeudi"/></td>
			</tr>
			<tr class="choix">
				<td><label for="vendredi">Vendredi</label></td>
				<td><input type="radio" name="choix_jour" value="vendredi"/></td>
			</tr>
			<tr class="choix">
				<td><label for="vendredi">Samedi</label></td>
				<td><input type="radio" name="choix_jour" value="samedi"/></td>
			</tr>
			<tr class="choix">
				<td><label for="vendredi">Dimanche</label></td>
				<td><input type="radio" name="choix_jour" value="dimanche"/></td>
			</tr>
			<tr><td>&nbsp </td></tr>
			<tr class="lignefonce">
				<td class="gras">Sélectionnez l'heure qui vous intéresse</td></br>
			</tr>
			<tr class="choix">
				<td><label for="lundi">14h</label></td>
				<td><input type="radio" name="choix_heure" value="14h"/></td>
			</tr>
			<tr class="choix">
				<td><label for="mardi">17h</label></td>
				<td><input type="radio" name="choix_heure" value="17h"/></td>
			</tr>
			<tr class="choix">
				<td><label for="vendredi">20h</label></td>
				<td><input type="radio" name="choix_heure" value="20h"/></td>
			</tr>
			<tr><td>&nbsp </td></tr>
			<tr>
				<td  class="gras">Film choisi :</td>
				<td><?php echo utf8_decode($_GET['nom_film']); ?></td>
			</tr>
			<tr>
			<td><input type="hidden" value=<?php echo utf8_decode($_GET['nom_film']); ?> name="nom_film" /></td>
			<td></td>
			</tr>
			
			<tr>
			<td><input type="hidden" value=<?php echo utf8_decode($_GET['id_film']); ?> name="id_film" /></td>
			<td></td>
			</tr>
			</br>	
			</br>
			<tr>
				<td><input class="button" type="reset" value="Annuler"></td>
				<td><input class="button" type="submit" value="Confirmer" name="envoyer"></td>
			</tr>

		</table>
		</form>
<?php } ?>