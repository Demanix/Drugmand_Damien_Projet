<h2>Cliquez sur l'affiche du film pour réserver votre ticket !</h2>
<?php
	$query="select * from film";
	$result=pg_query($cnx,$query);
	$nb=pg_num_rows($result);
	
	$tab=array();
	for($i=0;$i<$nb;$i++)
	{
		$tab[$i]=pg_fetch_array($result,$i);
	}?>
<table>
	<?php
	for($i=0;$i<$nb;$i++) {?>
	<tr>
	<td><a href="index.php?page=inscrire.php&amp;nom_film=<?php echo $tab[$i]['nom_film'];?>&amp;id_film=<?php echo $tab[$i]['id_film'];?>">
	<img class ="affiche" src="images/<?php  echo $tab[$i]['image']; ?>" /></a></td>
	<td><h4 align="justified"><?php echo utf8_encode($tab[$i]['nom_film']);?></h4><p align="justified"><?php echo utf8_encode($tab[$i]['description']);?></p>
	</tr>
	<?php } ?>
</table>