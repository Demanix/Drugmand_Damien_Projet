<?php
$liste = new Vue_filmDB($cnx);
$liste_t = $liste->getListeTousFilms();
$nbrT = count($liste_t);
?>
<div class="pull-center">
    <div class="col-sm-12">
        <div id="gt_carousel" class="carousel slide" data-ride="carousel">
            <!-- Carousel indicators : qui indiquent l'image affichée -->
            <ol class="carousel-indicators">
                <li data-target="#gt_carousel" data-slide-to="0" class="active"></li>
                <li data-target="#gt_carousel" data-slide-to="1"></li>
                <li data-target="#gt_carousel" data-slide-to="2"></li>
                <li data-target="#gt_carousel" data-slide-to="3"></li>
                <li data-target="#gt_carousel" data-slide-to="4"></li>
            </ol>   
            <!-- Wrapper for carousel items -->
            <div class="carousel-inner">
                <div class="item active">
                    <img class="affiche" src="./admin/images/image1.jpg" alt="First Slide">
                </div>
                <div class="item">
                    <img class="affiche" src="./admin/images/image2.jpg" alt="Second Slide">
                </div>
                <div class="item">
                    <img class="affiche" src="./admin/images/image3.jpg" alt="Second Slide">
                </div>
                <div class="item">
                    <img class="affiche" src="./admin/images/image4.jpg" alt="Second Slide">
                </div>
                <div class="item">
                    <img class="affiche" src="./admin/images/image5.jpg" alt="Third Slide">
                </div>
            </div>
            <!-- Carousel controls -->

            <a class="carousel-control left" href="#gt_carousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="carousel-control right" href="#gt_carousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
</div>
</br>&nbsp;</br>&nbsp;
<h2>Cliquez sur l'heure du film de votre choix pour réserver votre ticket !</h2>

</br>&nbsp;</br>&nbsp;
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
            
            <?php if($i<$nbrT && $liste_t[$i]->heure_diffusion == '11h'){?>
            <td><a href="index.php?page=inscrire.php&amp;id_projection=<?php print $liste_t[$i]->id_projection;?>" title= "<?php print $liste_t[$i]->nb_places_restantes  . " places restantes"; ?>" ><?php print $liste_t[$i]->heure_diffusion ?></a></td>
            <?php if($i+1<$nbrT && $liste_t[$i+1]->nom == $liste_t[$i]->nom){$i=$i+1;} ?>
            <?php } else { ?> <td>&nbsp;&nbsp;/&nbsp;&nbsp;</td>
            <?php } ?>
            
            <td>&nbsp;&nbsp;&nbsp;</td>
            
            <?php if($i<$nbrT && $liste_t[$i]->heure_diffusion == '14h'){?>
            <td><a href="index.php?page=inscrire.php&amp;id_projection=<?php print $liste_t[$i]->id_projection;?>" title= "<?php print $liste_t[$i]->nb_places_restantes  . " places restantes"; ?>" ><?php print $liste_t[$i]->heure_diffusion ?></a></td>
            <?php if($i+1<$nbrT && $liste_t[$i+1]->nom == $liste_t[$i]->nom){$i=$i+1;} ?>
            <?php } else { ?> <td>&nbsp;&nbsp;/&nbsp;&nbsp;</td>
            <?php } ?>
            
            <td>&nbsp;&nbsp;&nbsp;</td>
            
            <?php if($i<$nbrT && $liste_t[$i]->heure_diffusion == '17h'){?>
            <td><a href="index.php?page=inscrire.php&amp;id_projection=<?php print $liste_t[$i]->id_projection;?>" title= "<?php print $liste_t[$i]->nb_places_restantes  . " places restantes"; ?>" ><?php print $liste_t[$i]->heure_diffusion ?></a></td>
            <?php if($i+1<$nbrT && $liste_t[$i+1]->nom == $liste_t[$i]->nom){$i=$i+1;} ?>
            <?php } else { ?> <td>&nbsp;&nbsp;/&nbsp;&nbsp;</td>
            <?php } ?>
            
            <td>&nbsp;&nbsp;&nbsp;</td>
            
            <?php if($i<$nbrT && $liste_t[$i]->heure_diffusion == '21h'){?>
            <td><a href="index.php?page=inscrire.php&amp;id_projection=<?php print $liste_t[$i]->id_projection;?>" title= "<?php print $liste_t[$i]->nb_places_restantes  . " places restantes"; ?>" ><?php print $liste_t[$i]->heure_diffusion ?></a></td>
            <?php } else { ?> <td>&nbsp;&nbsp;/&nbsp;&nbsp;</td>
            <?php } ?>
            
            <td>&nbsp;&nbsp;&nbsp;</td>
        </tr>
	<?php } ?>
</table>