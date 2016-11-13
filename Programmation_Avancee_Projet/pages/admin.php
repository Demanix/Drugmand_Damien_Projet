<h2>Liste des réservations :</h2>
<?php 
 $query2="select *
   from reservation";
 $result2=pg_query($cnx,$query2);
 $nb2=pg_num_rows($result2);
 
 $tab2=array();
 for($i2=0;$i2<$nb2;$i2++)
 {
  $tab2[$i2]=pg_fetch_array($result2,$i2);
 }?>
 
 <table class="add">
	 <tr class="gras">
	 <td><h4>NOM<h4></td>
	 <td><h4>PRENOM<h4></td>
	 <td><h4>EMAIL<h4></td>
	 <td><h4>JOUR<h4></td>
	 <td><h4>HEURE<h4></td>
	 <td><h4>FILM<h4></td>
	 </tr>
<?php
 for($i2=0;$i2<$nb2;$i2++)
 {?>
 <tr>
 <td><?php echo utf8_encode($tab2[$i2]['nom']);?></td>
 <td><?php echo utf8_encode($tab2[$i2]['prenom']);?></td>
 <td><?php echo utf8_encode($tab2[$i2]['email']);?></td>
 <td><?php echo utf8_encode($tab2[$i2]['jour']);?></td>
 <td><?php echo utf8_encode($tab2[$i2]['heure']);?></td>
 <td><?php echo utf8_encode($tab2[$i2]['nom_film']);?></td>
 </tr>
 <?php } ?>
 </table>