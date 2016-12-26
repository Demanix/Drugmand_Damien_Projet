<h2>Cliquez sur l'affiche du film pour réserver votre ticket !</h2>
<?php
$liste = new Vue_filmDB($cnx);
$liste_t = $liste->getListeTousFilms();
$nbrT = count($liste_t);

?>
<table>
	<?php
	for($i=0;$i<$nbrT;$i++) { ?>
	<tr>
        <td><?php print $liste_t[$i]->image ?></td><td>&nbsp;&nbsp;&nbsp;</td>
	<td><?php print $liste_t[$i]->nom ?></td><td>&nbsp;&nbsp;&nbsp;</td>
        <td><?php print $liste_t[$i]->description ?></td><td>&nbsp;&nbsp;&nbsp;</td>
        <td><?php print $liste_t[$i]->prix  . " &euro;" ?></td><td>&nbsp;&nbsp;&nbsp;</td>
        <td><?php print $liste_t[$i]->duree  . " minutes" ?></td><td>&nbsp;&nbsp;&nbsp;</td>
        <td><?php print "Salle " . $liste_t[$i]->id_salle ?></td><td>&nbsp;&nbsp;&nbsp;</td>
        <td><?php print $liste_t[$i]->heure_diffusion ?></td><td>&nbsp;&nbsp;&nbsp;</td>
        <td><?php print $liste_t[$i]->nb_places_restantes  . " places restantes" ?></td><td>&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<?php } ?>
</table>